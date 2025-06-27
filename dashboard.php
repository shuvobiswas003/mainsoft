<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
require "interdb.php";

// Get selected date or default to today
$selectedDate = isset($_POST['report_date']) ? $_POST['report_date'] : date('Y-m-d');
$formattedDate = date('F j, Y', strtotime($selectedDate));

// Function to normalize payment methods
function normalizeMethod($m) {
    $m = trim($m);
    if ($m === '' || strtolower($m) === 'manual') {
        return 'Offline';
    }
    return ucfirst(strtolower($m));
}

// Function to normalize names
function normalizeName($name) {
    $name = trim($name);
    return ucfirst(strtolower($name));
}

// Get school name
$schoolname = mysqli_fetch_assoc(mysqli_query($link, "SELECT schoolname FROM schoolinfo LIMIT 1"))['schoolname'];

// ================= COLLECTION DATA =================
$headers = [];
$hdrSQL = "SELECT DISTINCT sp.des FROM invoicetrx it
           JOIN studentpayment sp ON sp.puniid = it.iid
           WHERE it.date = '$selectedDate'";
$res = mysqli_query($link, $hdrSQL);
while ($r = mysqli_fetch_assoc($res)) {
    $headers[] = $r['des'];
}

$students = [];
$colTotals = array_fill_keys($headers, 0);
$classTotals = [];
$sectionTotals = [];
$method_totals = [];

$mainSQL = "
  SELECT it.iid, it.amount, it.method,
         sp.stuid, sp.des, s.name, s.classnumber, s.secgroup, s.roll
  FROM invoicetrx it
  JOIN studentpayment sp ON sp.puniid = it.iid
  JOIN student s ON s.uniqid = sp.stuid
  WHERE it.date = '$selectedDate'
  ORDER BY s.classnumber, s.secgroup, s.roll";
$res2 = mysqli_query($link, $mainSQL);

while ($row = mysqli_fetch_assoc($res2)) {
    $stuid = $row['stuid'];
    $des = $row['des'];
    $amt = $row['amount'];

    $meth = normalizeMethod($row['method']);
    $cls = normalizeName($row['classnumber']);
    $sec = normalizeName($row['secgroup']);
    $roll = $row['roll'];

    $key = "{$cls}|{$sec}|{$roll}|{$stuid}";
    if (!isset($students[$key])) {
        $students[$key] = [
            'name' => $row['name'],
            'class' => $cls,
            'section' => $sec,
            'roll' => $roll,
            'payments' => [],
            'total' => 0,
            'methods' => [],
        ];
    }

    $students[$key]['payments'][$des] = $amt;
    $students[$key]['total'] += $amt;
    $students[$key]['methods'][$meth] = ($students[$key]['methods'][$meth] ?? 0) + $amt;

    $colTotals[$des] += $amt;
    $classTotals[$cls] = ($classTotals[$cls] ?? 0) + $amt;
    $sectionKey = "{$cls}|{$sec}";
    $sectionTotals[$sectionKey] = ($sectionTotals[$sectionKey] ?? 0) + $amt;
    $method_totals[$meth] = ($method_totals[$meth] ?? 0) + $amt;
}

$grandTotal = array_sum($colTotals);

// ================= ATTENDANCE DATA =================
$attendanceQuery = "SELECT 
    s.classname, 
    s.secgroup, 
    COUNT(*) as total_students,
    SUM(CASE WHEN a.stuid IS NOT NULL AND a.adate = '$selectedDate' AND a.cinoutid = 1 THEN 1 ELSE 0 END) as present_count
    FROM student s
    LEFT JOIN stuattdancedata a ON s.uniqid = a.stuid AND a.adate = '$selectedDate' AND a.cinoutid = 1
    GROUP BY s.classname, s.secgroup
    ORDER BY s.classnumber, s.secgroup";
$attendanceResult = mysqli_query($link, $attendanceQuery);

// Check for holidays and leaves
$isFriday = (date('N', strtotime($selectedDate)) == 5);
$isSaturday = (date('N', strtotime($selectedDate)) == 6);

// Check public holidays
$publicHolidayQuery = "SELECT holydayname FROM publicholyday WHERE '$selectedDate' BETWEEN sdate AND edate";
$publicHolidayResult = mysqli_query($link, $publicHolidayQuery);
$publicHoliday = mysqli_fetch_assoc($publicHolidayResult);

// Get students on leave and count leave by class and section
$leaveQuery = "SELECT p.stuid, s.name, s.classname, s.secgroup, p.holydayname 
               FROM personalholyday p
               JOIN student s ON p.stuid = s.uniqid
               WHERE '$selectedDate' BETWEEN p.sdate AND p.edate";
$leaveResult = mysqli_query($link, $leaveQuery);
$studentsOnLeave = [];
$leaveCountByClassSection = [];

while ($row = mysqli_fetch_assoc($leaveResult)) {
    $studentsOnLeave[] = $row;
    $classSectionKey = $row['classname'] . '|' . $row['secgroup'];
    $leaveCountByClassSection[$classSectionKey] = ($leaveCountByClassSection[$classSectionKey] ?? 0) + 1;
}

$attendanceData = [];
$classAttendance = [];
$sectionAttendance = [];
$totalPresent = 0;
$totalStudents = 0;
$totalLeaves = count($studentsOnLeave);

while ($row = mysqli_fetch_assoc($attendanceResult)) {
    $classSectionKey = $row['classname'] . '|' . $row['secgroup'];
    $leaveCount = $leaveCountByClassSection[$classSectionKey] ?? 0;
    $absent = $row['total_students'] - $row['present_count'] - $leaveCount;
    $percentage = $row['total_students'] > 0 ? ($row['present_count'] / $row['total_students']) * 100 : 0;
    
    $attendanceData[] = [
        'class' => $row['classname'],
        'section' => $row['secgroup'],
        'present' => $row['present_count'],
        'absent' => $absent,
        'leave' => $leaveCount,
        'total' => $row['total_students'],
        'percentage' => $percentage
    ];
    
    // Class totals
    $classAttendance[$row['classname']]['present'] = ($classAttendance[$row['classname']]['present'] ?? 0) + $row['present_count'];
    $classAttendance[$row['classname']]['absent'] = ($classAttendance[$row['classname']]['absent'] ?? 0) + $absent;
    $classAttendance[$row['classname']]['leave'] = ($classAttendance[$row['classname']]['leave'] ?? 0) + $leaveCount;
    $classAttendance[$row['classname']]['total'] = ($classAttendance[$row['classname']]['total'] ?? 0) + $row['total_students'];
    
    // Section totals
    $sectionAttendance[$classSectionKey] = [
        'present' => $row['present_count'],
        'absent' => $absent,
        'leave' => $leaveCount,
        'total' => $row['total_students'],
        'percentage' => $percentage
    ];
    
    $totalPresent += $row['present_count'];
    $totalStudents += $row['total_students'];
}

$overallAttendance = $totalStudents > 0 ? ($totalPresent / $totalStudents) * 100 : 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Welcome To Your School</title>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/morris/morris.css">
        <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- Custom Styles -->
      <style>
    /* Vibrant Color Scheme */
    :root {
        --primary: #3498db;
        --success: #2ecc71;
        --info: #1abc9c;
        --warning: #f39c12;
        --danger: #e74c3c;
        --purple: #9b59b6;
        --pink: #e84393;
        --dark: #34495e;
        --light: #ecf0f1;
    }
    
    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Modern Panel Styling */
    .panel {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        margin-bottom: 25px;
        border: none;
        background: white;
        transition: all 0.3s ease;
    }
    
    .panel:hover {
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }
    
    .panel-heading {
        border-radius: 8px 8px 0 0 !important;
        padding: 18px 25px;
        font-weight: 600;
        font-size: 16px;
        color: white !important;
        border-bottom: none !important;
    }
    
    .panel-primary .panel-heading { background: var(--primary); }
    .panel-success .panel-heading { background: var(--success); }
    .panel-info .panel-heading { background: var(--info); }
    .panel-warning .panel-heading { background: var(--warning); }
    .panel-danger .panel-heading { background: var(--danger); }
    .panel-purple .panel-heading { background: var(--purple); }
    .panel-pink .panel-heading { background: var(--pink); }
    .panel-dark .panel-heading { background: var(--dark); }
    
    .panel-body {
        padding: 20px;
    }
    
    /* Stat Cards */
    .stat-card {
        padding: 25px;
        border-radius: 8px;
        color: white;
        margin-bottom: 25px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    
    .stat-card i {
        font-size: 42px;
        margin-bottom: 15px;
        opacity: 0.9;
    }
    
    .stat-card .count {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .stat-card .label {
        font-size: 15px;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .bg-primary { background: var(--primary) !important; }
    .bg-success { background: var(--success) !important; }
    .bg-info { background: var(--info) !important; }
    .bg-warning { background: var(--warning) !important; }
    .bg-danger { background: var(--danger) !important; }
    .bg-purple { background: var(--purple) !important; }
    .bg-pink { background: var(--pink) !important; }
    .bg-dark { background: var(--dark) !important; }
    
    /* Quick Actions */
    .quick-action {
        text-align: center;
        padding: 20px 15px;
        border-radius: 8px;
        background: white;
        margin-bottom: 25px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
        color: var(--dark);
    }
    
    .quick-action:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        text-decoration: none;
        color: var(--dark);
    }
    
    .quick-action i {
        font-size: 36px;
        margin-bottom: 15px;
        display: block;
    }
    
    .quick-action h5 {
        font-weight: 600;
        margin: 0;
    }
    
    /* Colorful quick actions */
    .quick-action-primary { border-top: 4px solid var(--primary); }
    .quick-action-primary:hover { background: rgba(52, 152, 219, 0.1); }
    .quick-action-primary i { color: var(--primary); }
    
    .quick-action-success { border-top: 4px solid var(--success); }
    .quick-action-success:hover { background: rgba(46, 204, 113, 0.1); }
    .quick-action-success i { color: var(--success); }
    
    .quick-action-info { border-top: 4px solid var(--info); }
    .quick-action-info:hover { background: rgba(26, 188, 156, 0.1); }
    .quick-action-info i { color: var(--info); }
    
    .quick-action-warning { border-top: 4px solid var(--warning); }
    .quick-action-warning:hover { background: rgba(243, 156, 18, 0.1); }
    .quick-action-warning i { color: var(--warning); }
    
    .quick-action-danger { border-top: 4px solid var(--danger); }
    .quick-action-danger:hover { background: rgba(231, 76, 60, 0.1); }
    .quick-action-danger i { color: var(--danger); }
    
    .quick-action-purple { border-top: 4px solid var(--purple); }
    .quick-action-purple:hover { background: rgba(155, 89, 182, 0.1); }
    .quick-action-purple i { color: var(--purple); }
    
    /* Table Styling */
    .table-responsive {
        overflow-x: auto;
        border-radius: 8px;
    }
    
    .table > thead > tr > th {
        background-color: #f8f9fa;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        color: var(--dark);
    }
    
    .clickable-cell {
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .clickable-cell:hover {
        background-color: #f5f5f5;
    }
    
    /* Progress Bars */
    .progress-sm {
        height: 16px;
        margin-bottom: 0;
        border-radius: 8px;
        background-color: #ecf0f1;
    }
    
    .progress-bar {
        border-radius: 8px;
    }
    
    /* Badges */
    .attendance-badge {
        font-size: 12px;
        padding: 4px 10px;
        border-radius: 12px;
        font-weight: 600;
    }
    
    /* Form Elements */
    .date-picker-container {
        margin-bottom: 25px;
    }
    
    .date-picker-container .form-control {
        height: 46px;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: none;
    }
    
    .date-picker-container .btn {
        height: 46px;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
    }
    
    /* Buttons */
    .btn-modern {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    /* Marquee */
    marquee {
        padding: 10px;
        background: linear-gradient(90deg, #f8f9fa, #e9ecef, #f8f9fa);
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    /* Charts */
    .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 25px;
    }
    
    /* Modal */
    .modal-lg {
        width: 90%;
        max-width: 1200px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .stat-card {
            padding: 20px 15px;
        }
        
        .stat-card .count {
            font-size: 24px;
        }
        
        .quick-action {
            padding: 15px 10px;
        }
        
        .quick-action i {
            font-size: 30px;
        }
        
        .panel-heading {
            padding: 15px 20px;
        }
        
        .chart-container {
            height: 250px;
        }
    }
    
    @media (max-width: 480px) {
        .stat-card {
            margin-bottom: 15px;
        }
        
        .quick-action {
            margin-bottom: 15px;
        }
        
        .btn-modern {
            padding: 8px 15px;
        }
    }
</style>

        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="assets/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    </head>
    
    <body>
        <?php include 'inc/topheader.php'?>
        <?php include 'inc/leftmenu.php'?>
        
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">Dashboard</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="#">School</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>

                    <!-- Welcome Marquee -->
                    <div class="row">
                        <div class="col-md-12">
                            <marquee behavior="scroll" direction="left">
                                <h4 style="margin: 0;"><i class="fa fa-bullhorn"></i> Welcome to Digital School Management System</h4>
                            </marquee>
                        </div>
                    </div>

                    <!--Custom-->

                                        <!-- Date Selection Form -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel dashboard-panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Select Report Date</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" class="form-inline">
                                    <div class="form-group">
                                        <label for="report_date" class="control-label">Select Date: </label>
                                        <input type="date" class="form-control" id="report_date" name="report_date" 
                                               value="<?php echo htmlspecialchars($selectedDate); ?>" required
                                               style="margin: 0 10px;">
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-refresh"></i> Load Report
                                    </button>
                                    <button type="button" class="btn btn-info" onclick="window.print()" style="margin-left: 10px;">
                                        <i class="fa fa-print"></i> Print Report
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Stats -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card bg-primary">
                            <i class="fa fa-calendar"></i>
                            <div class="count"><?php echo $formattedDate; ?></div>
                            <div class="label">Report Date</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card bg-success">
                            <i class="fa fa-money"></i>
                            <div class="count">৳<?php echo number_format($grandTotal, 2); ?></div>
                            <div class="label">Total Collection</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card bg-info">
                            <i class="fa fa-check-circle"></i>
                            <div class="count"><?php echo $totalPresent; ?></div>
                            <div class="label">Students Present</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card bg-purple">
                            <i class="fa fa-check-circle"></i>
                            <i class="fa fa-percent"></i>
                            <div class="count"><?php echo number_format($overallAttendance, 1); ?>%</div>
                            <div class="label">Attendance Rate</div>
                        </div>
                    </div>
                </div>

                
<!-- Quick Actions -->
<div class="row">
    <div class="col-md-12">
        <h4 class="header-title m-t-0 m-b-20" style="color: var(--dark); font-weight: 700; border-bottom: 3px solid var(--primary); padding-bottom: 12px; text-transform: uppercase; letter-spacing: 1px;">
            <i class="fa fa-bolt" style="color: var(--warning); margin-right: 10px;"></i> Quick Actions
        </h4>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./attdance" target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(52, 152, 219, 0.1) 0%, rgba(52, 152, 219, 0.2) 100%); border-left: 4px solid var(--primary);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--primary); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-check-square-o" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--primary); font-weight: 600;">Attdance Panel</h5>
        </a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./account" target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(46, 204, 113, 0.1) 0%, rgba(46, 204, 113, 0.2) 100%); border-left: 4px solid var(--success);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--success); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-money" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--success); font-weight: 600;">Account Panel</h5>
        </a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./examcontrol" target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(26, 188, 156, 0.1) 0%, rgba(26, 188, 156, 0.2) 100%); border-left: 4px solid var(--info);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--info); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-file-text" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--info); font-weight: 600;">Exam Panel</h5>
        </a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./teacher" target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(243, 156, 18, 0.1) 0%, rgba(243, 156, 18, 0.2) 100%); border-left: 4px solid var(--warning);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--warning); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-envelope" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--warning); font-weight: 600;">Teacher Panel</h5>
        </a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./library"  target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(231, 76, 60, 0.1) 0%, rgba(231, 76, 60, 0.2) 100%); border-left: 4px solid var(--danger);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--danger); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-user-plus" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--danger); font-weight: 600;">Library Panel</h5>
        </a>
    </div>
    
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a href="./new_addmission" target="_blank" class="quick-action" style="background: linear-gradient(135deg, rgba(155, 89, 182, 0.1) 0%, rgba(155, 89, 182, 0.2) 100%); border-left: 4px solid var(--purple);">
            <div class="action-icon" style="width: 50px; height: 50px; background: var(--purple); border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                <i class="fa fa-cog" style="color: white; font-size: 22px;"></i>
            </div>
            <h5 style="color: var(--purple); font-weight: 600;">Admission Panel</h5>
        </a>
    </div>
</div>

                <!-- Main Content -->
                <div class="row">
                    <!-- Collection Summary -->
                    <div class="col-md-6">
                        <div class="panel dashboard-panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Collection Summary</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="chart-container">
                                            <canvas id="methodChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 style="color: var(--success);">Total: ৳<?php echo number_format($grandTotal, 2); ?></h4>
                                        <div class="m-t-20">
                                            <?php foreach ($method_totals as $method => $amount): ?>
                                            <p>
                                                <i class="fa fa-circle text-<?php echo $method == 'Online' ? 'success' : 'warning'; ?>"></i>
                                                <strong><?php echo $method; ?>:</strong> 
                                                ৳<?php echo number_format($amount, 2); ?>
                                                <small>(<?php echo number_format(($amount/$grandTotal)*100, 1); ?>%)</small>
                                            </p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 class="page-header" style="color: var(--dark); border-bottom-color: #eee;">
                                    <i class="fa fa-list"></i> Class-wise Collection
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Amount</th>
                                                <th>% of Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($classTotals as $class => $amount): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($class); ?></td>
                                                <td>৳<?php echo number_format($amount, 2); ?></td>
                                                <td>
                                                    <div class="progress progress-sm m-b-0">
                                                        <div class="progress-bar progress-bar-success" 
                                                             style="width: <?php echo ($amount/$grandTotal)*100; ?>%">
                                                            <span class="sr-only"><?php echo number_format(($amount/$grandTotal)*100, 1); ?>%</span>
                                                        </div>
                                                    </div>
                                                    <small><?php echo number_format(($amount/$grandTotal)*100, 1); ?>%</small>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
<!-- Attendance Summary -->
<div class="col-md-6">
    <div class="panel dashboard-panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Attendance Summary</h3>
        </div>
        <div class="panel-body">
            <?php if ($publicHoliday): ?>
                <div class="alert alert-warning">
                    <strong>Public Holiday:</strong> <?php echo htmlspecialchars($publicHoliday['holydayname']); ?>
                </div>
            <?php elseif ($isFriday || $isSaturday): ?>
                <div class="alert alert-info">
                    <strong>Weekend:</strong> Today is <?php echo $isFriday ? 'Friday' : 'Saturday'; ?> (Weekly Holiday)
                </div>
            <?php endif; ?>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="chart-container">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 style="color: var(--info);">Total Students: <?php echo $totalStudents; ?></h4>
                    <h4 class="text-success">Present: <?php echo $totalPresent; ?></h4>
                    <h4 class="text-danger">Absent: <?php echo $totalStudents - $totalPresent - $totalLeaves; ?></h4>
                    <h4 class="text-warning">On Leave: <?php echo $totalLeaves; ?></h4>
                    <h4>Attendance Rate: <?php echo number_format($overallAttendance, 1); ?>%</h4>
                </div>
            </div>
            
            <?php if (!empty($studentsOnLeave)): ?>
                <div class="alert alert-info">
                    <h4>Students on Leave (<?php echo count($studentsOnLeave); ?>)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Leave Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($studentsOnLeave as $student): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                                    <td><?php echo htmlspecialchars($student['classname']); ?></td>
                                    <td><?php echo htmlspecialchars($student['secgroup']); ?></td>
                                    <td><?php echo htmlspecialchars($student['holydayname']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            
            <h4 class="page-header" style="color: var(--dark); border-bottom-color: #eee;">
                <i class="fa fa-list"></i> Class-wise Attendance
            </h4>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Leave</th>
                            <th>Total</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($classAttendance as $class => $data): 
                            $percentage = ($data['total'] > 0) ? ($data['present'] / $data['total']) * 100 : 0;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($class); ?></td>
                            <td><?php echo $data['present']; ?></td>
                            <td><?php echo $data['absent']; ?></td>
                            <td><?php echo $data['leave']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                            <td>
                                <span class="badge attendance-badge bg-<?php 
                                    echo $percentage >= 90 ? 'success' : 
                                        ($percentage >= 75 ? 'primary' : 
                                        ($percentage >= 50 ? 'warning' : 'danger'));
                                ?>">
                                    <?php echo number_format($percentage, 1); ?>%
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <h4 class="page-header" style="color: var(--dark); border-bottom-color: #eee;">
                <i class="fa fa-list"></i> Section-wise Attendance
            </h4>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Leave</th>
                            <th>Total</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sectionAttendance as $key => $data): 
                            list($class, $section) = explode('|', $key);
                            $percentage = ($data['total'] > 0) ? ($data['present'] / $data['total']) * 100 : 0;
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($class); ?></td>
                            <td><?php echo htmlspecialchars($section); ?></td>
                            <td><?php echo $data['present']; ?></td>
                            <td><?php echo $data['absent']; ?></td>
                            <td><?php echo $data['leave']; ?></td>
                            <td><?php echo $data['total']; ?></td>
                            <td>
                                <span class="badge attendance-badge bg-<?php 
                                    echo $percentage >= 90 ? 'success' : 
                                        ($percentage >= 75 ? 'primary' : 
                                        ($percentage >= 50 ? 'warning' : 'danger'));
                                ?>">
                                    <?php echo number_format($percentage, 1); ?>%
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                
                <!-- Detailed Section Reports -->
                <div class="row">
                    <!-- Section-wise Collection -->
                    <div class="col-md-6">
                        <div class="panel dashboard-panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Section-wise Collection</h3>
                            </div>
                            <div class="panel-body">
                                <div class="chart-container">
                                    <canvas id="sectionCollectionChart"></canvas>
                                </div>
                                <div class="table-responsive m-t-20">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sectionTotals as $key => $amount): 
                                                list($class, $section) = explode('|', $key);
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($class); ?></td>
                                                <td><?php echo htmlspecialchars($section); ?></td>
                                                <td>৳<?php echo number_format($amount, 2); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section-wise Attendance -->
                    <div class="col-md-6">
                        <div class="panel dashboard-panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Section-wise Attendance</h3>
                            </div>
                            <div class="panel-body">
                                <div class="chart-container">
                                    <canvas id="sectionAttendanceChart"></canvas>
                                </div>
                                <div class="table-responsive m-t-20">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Section</th>
                                                <th>Present</th>
                                                <th>%</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sectionAttendance as $key => $data): 
                                                list($class, $section) = explode('|', $key);
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($class); ?></td>
                                                <td><?php echo htmlspecialchars($section); ?></td>
                                                <td><?php echo $data['present']; ?></td>
                                                <td>
                                                    <div class="progress progress-sm m-b-0">
                                                        <div class="progress-bar progress-bar-<?php 
                                                            echo $data['percentage'] >= 90 ? 'success' : 
                                                                ($data['percentage'] >= 75 ? 'primary' : 
                                                                ($data['percentage'] >= 50 ? 'warning' : 'danger'));
                                                        ?>" style="width: <?php echo $data['percentage']; ?>%">
                                                            <span class="sr-only"><?php echo number_format($data['percentage'], 1); ?>%</span>
                                                        </div>
                                                    </div>
                                                    <small><?php echo number_format($data['percentage'], 1); ?>%</small>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                            <!--Custom-->

                    <!-- Class Chart Report -->                        
                    <div class="row">
                        <?php require "interdb.php"; ?>
                        
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Report Class-Wise</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Number of Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $countQuery = "SELECT classname, COUNT(*) as student_count FROM student GROUP BY classname ORDER BY classnumber ASC;";
                                                $countResult = $link->query($countQuery);

                                                while ($countRow = $countResult->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($countRow["classname"]) . "</td>";
                                                    echo "<td>" . htmlspecialchars($countRow["student_count"]) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Chart (Class-Wise)</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="chart-container">
                                        <canvas id="studentBarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->

                    <!-- Male Female Chart Report -->                        
                    <div class="row">
                        <?php
                        // Query to count male students
                        $maleQuery = "SELECT COUNT(*) as male_count FROM student WHERE UPPER(sex) = 'MALE';";
                        $maleResult = $link->query($maleQuery);
                        $maleCount = $maleResult->fetch_assoc()["male_count"];

                        // Query to count female students
                        $femaleQuery = "SELECT COUNT(*) as female_count FROM student WHERE UPPER(sex) = 'FEMALE';";
                        $femaleResult = $link->query($femaleQuery);
                        $femaleCount = $femaleResult->fetch_assoc()["female_count"];
                        ?>    
                        
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Male and Female Student Counts</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Gender</th>
                                                    <th>Number of Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Male</td>
                                                    <td><?php echo htmlspecialchars($maleCount); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Female</td>
                                                    <td><?php echo htmlspecialchars($femaleCount); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Gender Distribution</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="chart-container">
                                        <canvas id="genderPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End row-->

                    <!-- Section Chart Report -->                        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Report Section-Wise</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class (Section)</th>
                                                    <th>Number of Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $countQuery3 = "SELECT classname, secgroup, COUNT(*) as student_count 
                                                               FROM student 
                                                               GROUP BY classname, secgroup 
                                                               ORDER BY classnumber ASC, secgroup ASC;";
                                                $countResult3 = $link->query($countQuery3);

                                                while ($countRow3 = $countResult3->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($countRow3["classname"]) . " - " . htmlspecialchars($countRow3["secgroup"]) . "</td>";
                                                    echo "<td>" . htmlspecialchars($countRow3["student_count"]) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                                            


                    <!-- Gender Distribution by Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Gender Distribution by Section</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class (Section)</th>
                                                    <th>Total Students</th>
                                                    <th>Male Students</th>
                                                    <th>Female Students</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $genderQuery = "SELECT classname, secgroup, 
                                                               COUNT(*) AS total_students, 
                                                               SUM(CASE WHEN sex = 'Male' THEN 1 ELSE 0 END) AS male_students,
                                                               SUM(CASE WHEN sex = 'Female' THEN 1 ELSE 0 END) AS female_students
                                                               FROM student 
                                                               GROUP BY classname, secgroup 
                                                               ORDER BY classnumber ASC, secgroup ASC;";
                                                $genderResult = $link->query($genderQuery);

                                                while ($row = $genderResult->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row["classname"]) . " - " . htmlspecialchars($row["secgroup"]) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row["total_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-gender='Male' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["male_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-gender='Female' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["female_students"]) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Religion Distribution by Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Religion Distribution by Section</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class (Section)</th>
                                                    <th>Total</th>
                                                    <th>Islam</th>
                                                    <th>Hindu</th>
                                                    <th>Christianity</th>
                                                    <th>Buddhism</th>
                                                    <th>Other</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $religionQuery = "SELECT classname, secgroup, 
                                                                COUNT(*) AS total_students,
                                                                SUM(CASE WHEN religion = 'Islam' THEN 1 ELSE 0 END) AS islam_students,
                                                                SUM(CASE WHEN religion = 'Hindu' THEN 1 ELSE 0 END) AS hindu_students,
                                                                SUM(CASE WHEN religion = 'Christianity' THEN 1 ELSE 0 END) AS christian_students,
                                                                SUM(CASE WHEN religion = 'Buddhism' THEN 1 ELSE 0 END) AS buddhist_students,
                                                                SUM(CASE WHEN religion IS NULL OR religion NOT IN ('Islam', 'Hindu', 'Christianity', 'Buddhism') THEN 1 ELSE 0 END) AS other_students
                                                                FROM student 
                                                                GROUP BY classname, secgroup 
                                                                ORDER BY classnumber ASC, secgroup ASC;";
                                                $religionResult = $link->query($religionQuery);

                                                while ($row = $religionResult->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row["classname"]) . " - " . htmlspecialchars($row["secgroup"]) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row["total_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-religion='Islam' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["islam_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-religion='Hindu' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["hindu_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-religion='Christianity' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["christian_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-religion='Buddhism' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["buddhist_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-religion='Other' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["other_students"]) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Age Group Distribution by Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Student Age Group Distribution by Section (8+ to 18+)</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Class (Section)</th>
                                                    <th>Total</th>
                                                    <th>8+</th>
                                                    <th>9+</th>
                                                    <th>10+</th>
                                                    <th>11+</th>
                                                    <th>12+</th>
                                                    <th>13+</th>
                                                    <th>14+</th>
                                                    <th>15+</th>
                                                    <th>16+</th>
                                                    <th>17+</th>
                                                    <th>18+</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ageQuery = "SELECT classname, secgroup, 
                                                            COUNT(*) AS total_students,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 8 THEN 1 ELSE 0 END) AS age_8,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 9 THEN 1 ELSE 0 END) AS age_9,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 10 THEN 1 ELSE 0 END) AS age_10,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 11 THEN 1 ELSE 0 END) AS age_11,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 12 THEN 1 ELSE 0 END) AS age_12,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 13 THEN 1 ELSE 0 END) AS age_13,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 14 THEN 1 ELSE 0 END) AS age_14,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 15 THEN 1 ELSE 0 END) AS age_15,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 16 THEN 1 ELSE 0 END) AS age_16,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) = 17 THEN 1 ELSE 0 END) AS age_17,
                                                            SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) >= 18 THEN 1 ELSE 0 END) AS age_18
                                                            FROM student 
                                                            GROUP BY classname, secgroup 
                                                            ORDER BY classnumber ASC, secgroup ASC;";
                                                
                                                $ageResult = $link->query($ageQuery);

                                                while ($row = $ageResult->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . htmlspecialchars($row["classname"]) . " - " . htmlspecialchars($row["secgroup"]) . "</td>";
                                                    echo "<td>" . htmlspecialchars($row["total_students"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='8' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_8"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='9' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_9"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='10' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_10"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='11' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_11"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='12' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_12"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='13' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_13"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='14' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_14"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='15' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_15"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='16' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_16"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='17' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_17"]) . "</td>";
                                                    echo "<td class='clickable-cell' data-class='" . htmlspecialchars($row["classname"]) . "' data-section='" . htmlspecialchars($row["secgroup"]) . "' data-age='18' data-toggle='modal' data-target='#studentModal'>" . htmlspecialchars($row["age_18"]) . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Backup Button -->
                    <div class="row">
                        <div class="col-md-3">
                            <a href="full_backup.php" target="_blank" class="btn btn-primary btn-modern">
                                <i class="fa fa-database"></i> Generate Full Backup
                            </a>
                        </div>
                    </div>

                </div> <!-- container -->
            </div> <!-- content -->
        </div>

        <!-- Student Details Modal -->
        <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="studentModalLabel">Student Details</h4>
                    </div>
                    <div class="modal-body">
                        <div id="studentDetails">
                            <p>Loading student details...</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="side-bar right-bar nicescroll">
            <h4 class="text-center">Chat</h4>
            <div class="contact-list nicescroll">
                <ul class="list-group contacts-list">
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-1.jpg" alt="">
                            </div>
                            <span class="name">Chadengle</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-2.jpg" alt="">
                            </div>
                            <span class="name">Tomaslau</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            <div class="avatar">
                                <img src="images/users/avatar-3.jpg" alt="">
                            </div>
                            <span class="name">Stillnotdavid</span>
                            <i class="fa fa-circle online"></i>
                        </a>
                        <span class="clearfix"></span>
                    </li>
                </ul>  
            </div>
        </div>
        <!-- /Right-bar -->
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        
        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>
        
        <!-- flot Chart -->
        <script src="assets/flot-chart/jquery.flot.js"></script>
        <script src="assets/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/flot-chart/jquery.flot.crosshair.js"></script>
        
        <!-- Counter-up -->
        <script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
    
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>
        
        <!--Morris Chart-->
        <script src="assets/morris/morris.min.js"></script>
        <script src="assets/morris/raphael.min.js"></script>
        <script src="assets/morris/morris.init.js"></script>

        <script>
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        
        <script>
            $(document).ready(function() {
                $('#datatable').dataTable();
            });
        </script>
        
        <script>
            // Class-wise student bar chart
            <?php
            $countResult = $link->query("SELECT classname, COUNT(*) as student_count FROM student GROUP BY classname ORDER BY classnumber ASC;");
            if (!$countResult) {
                die("Error in SQL query: " . $link->error);
            }
            ?>
            
            var classData = <?php echo json_encode($countResult->fetch_all(MYSQLI_ASSOC)); ?>;
            var classNames = classData.map(function(item) {
                return item.classname;
            });
            var studentCounts = classData.map(function(item) {
                return item.student_count;
            });

            var ctx = document.getElementById('studentBarChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: classNames,
                    datasets: [{
                        label: 'Number of Students',
                        data: studentCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        </script>

        <script>
            // Gender pie chart
            var pieCtx = document.getElementById('genderPieChart').getContext('2d');
            var pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.formattedValue + ' students';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        </script>

        <script>
            // Handle click on clickable cells to show student details
            $(document).on('click', '.clickable-cell', function() {
                var className = $(this).data('class');
                var section = $(this).data('section');
                var gender = $(this).data('gender');
                var religion = $(this).data('religion');
                var age = $(this).data('age');
                
                var modalTitle = 'Students in ' + className + ' - ' + section;
                var filterType = '';
                var filterValue = '';
                
                if (gender) {
                    modalTitle += ' (Gender: ' + gender + ')';
                    filterType = 'gender';
                    filterValue = gender;
                } else if (religion) {
                    modalTitle += ' (Religion: ' + religion + ')';
                    filterType = 'religion';
                    filterValue = religion;
                } else if (age) {
                    modalTitle += ' (Age: ' + age + '+ years)';
                    filterType = 'age';
                    filterValue = age;
                }
                
                $('#studentModalLabel').text(modalTitle);
                
                // Show loading message
                $('#studentDetails').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x"></i><p>Loading student details...</p></div>');
                
                // AJAX request to fetch student details
                $.ajax({
                    url: 'get_students.php',
                    type: 'POST',
                    data: {
                        class: className,
                        section: section,
                        filter_type: filterType,
                        filter_value: filterValue
                    },
                    success: function(response) {
                        $('#studentDetails').html(response);
                    },
                    error: function() {
                        $('#studentDetails').html('<div class="alert alert-danger">Error loading student details. Please try again.</div>');
                    }
                });
            });
        </script>

        <!--Custom java Script-->

        <!-- Chart.js Scripts -->
    <script>
    // Method-wise Collection Chart
    var methodCtx = document.getElementById('methodChart').getContext('2d');
    var methodChart = new Chart(methodCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_keys($method_totals)); ?>,
            datasets: [{
                data: <?php echo json_encode(array_values($method_totals)); ?>,
                backgroundColor: [
                    '#2ecc71', // Online - green
                    '#f39c12', // Offline - orange
                    '#3498db', // Other - blue
                    '#e74c3c'  // Other - red
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ৳';
                            }
                            label += context.raw.toLocaleString();
                            return label;
                        }
                    }
                }
            }
        }
    });

    // Attendance Chart
    var attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(attendanceCtx, {
        type: 'pie',
        data: {
            labels: ['Present', 'Absent'],
            datasets: [{
                data: [<?php echo $totalPresent; ?>, <?php echo $totalStudents - $totalPresent; ?>],
                backgroundColor: [
                    '#1abc9c', // Present - teal
                    '#e74c3c'  // Absent - red
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + ' students';
                        }
                    }
                }
            }
        }
    });

    // Section-wise Collection Chart
    var sectionCollectionCtx = document.getElementById('sectionCollectionChart').getContext('2d');
    var sectionLabels = [];
    var sectionAmounts = [];
    
    <?php 
    foreach ($sectionTotals as $key => $amount) {
        list($class, $section) = explode('|', $key);
        echo "sectionLabels.push('" . addslashes($class) . " - " . addslashes($section) . "');";
        echo "sectionAmounts.push($amount);";
    }
    ?>
    
    var sectionCollectionChart = new Chart(sectionCollectionCtx, {
        type: 'bar',
        data: {
            labels: sectionLabels,
            datasets: [{
                label: 'Collection Amount',
                data: sectionAmounts,
                backgroundColor: 'rgba(241, 196, 15, 0.7)',
                borderColor: 'rgba(241, 196, 15, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '৳' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return '৳' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Section-wise Attendance Chart
    var sectionAttendanceCtx = document.getElementById('sectionAttendanceChart').getContext('2d');
    var sectionAttendanceLabels = [];
    var sectionAttendancePercents = [];
    
    <?php 
    foreach ($sectionAttendance as $key => $data) {
        list($class, $section) = explode('|', $key);
        echo "sectionAttendanceLabels.push('" . addslashes($class) . " - " . addslashes($section) . "');";
        echo "sectionAttendancePercents.push(" . $data['percentage'] . ");";
    }
    ?>
    
    var sectionAttendanceChart = new Chart(sectionAttendanceCtx, {
        type: 'bar',
        data: {
            labels: sectionAttendanceLabels,
            datasets: [{
                label: 'Attendance Percentage',
                data: sectionAttendancePercents,
                backgroundColor: 'rgba(231, 76, 60, 0.7)',
                borderColor: 'rgba(231, 76, 60, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y.toFixed(1) + '%';
                        }
                    }
                }
            }
        }
    });
    </script>
    </body>
</html>