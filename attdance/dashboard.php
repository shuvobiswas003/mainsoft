<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher") {
    header("location: login.php");
    exit;
}

// Include database connection
require 'interdb.php';

// Fetch classes and sections from student table
$sqlClassesSections = "SELECT DISTINCT classnumber, secgroup FROM student";
$resultClassesSections = $link->query($sqlClassesSections);

$classesSections = [];
if ($resultClassesSections->num_rows > 0) {
    while ($row = $resultClassesSections->fetch_assoc()) {
        $classesSections[] = [
            'classnumber' => $row['classnumber'],
            'secgroup' => $row['secgroup']
        ];
    }
}

// Initialize report arrays
$attendanceReport = [];
$percentageReport = [];

// Current date
$currentDate = date('Y-m-d');

foreach ($classesSections as $cs) {
    // Get total number of students in the class and section
    $sqlTotalStudents = "
        SELECT COUNT(*) AS total_students
        FROM student
        WHERE classnumber = '{$cs['classnumber']}'
        AND secgroup = '{$cs['secgroup']}'
    ";
    $resultTotal = $link->query($sqlTotalStudents);
    $totalStudents = $resultTotal->fetch_assoc()['total_students'];
    
    // Get number of present students
    $sqlPresentStudents = "
        SELECT COUNT(DISTINCT a.stuid) AS present_count
        FROM stuattdancedata a
        LEFT JOIN student s
            ON s.uniqid = a.stuid
            AND a.adate = '{$currentDate}'
            AND a.cinoutid = 1
        WHERE s.classnumber = '{$cs['classnumber']}'
        AND s.secgroup = '{$cs['secgroup']}'
    ";
    $resultPresent = $link->query($sqlPresentStudents);
    $presentCount = $resultPresent->fetch_assoc()['present_count'];

    // Calculate absent students
    $absentCount = $totalStudents - $presentCount;

    // Store the report
    $attendanceReport["{$cs['classnumber']}-{$cs['secgroup']}"] = [
        'total_students' => $totalStudents,
        'present_count' => $presentCount,
        'absent_count' => $absentCount
    ];

    // Fetch daily present percentage report
    $sqlPercentage = "
        SELECT 
            (COUNT(DISTINCT a.stuid) / COUNT(DISTINCT s.uniqid)) * 100 AS present_percentage
        FROM student s
        LEFT JOIN stuattdancedata a
            ON s.uniqid = a.stuid
            AND a.adate = CURDATE()
            AND a.cinoutid = 1
        WHERE s.classnumber = '{$cs['classnumber']}'
        AND s.secgroup = '{$cs['secgroup']}'
    ";
    $resultPercentage = $link->query($sqlPercentage);
    $percentage = $resultPercentage->fetch_assoc();
    $percentageReport["{$cs['classnumber']}-{$cs['secgroup']}"] = isset($percentage['present_percentage']) ? $percentage['present_percentage'] : 0;
}
?>

<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome!</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <marquee behavior="slow" direction="">
                <h1 style="color:green;">Welcome <?php echo htmlspecialchars($_SESSION["teachername"]);?></h1>
            </marquee>

            <div class="container">
                <h2 class="text-center">Attendance Dashboard by Class and Section</h2>

                <!-- Daily Present Percentage Table -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daily Present Percentage</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-summary">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Present Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($classesSections as $cs): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cs['classnumber']); ?></td>
                                        <td><?php echo htmlspecialchars($cs['secgroup']); ?></td>
                                        <td><?php echo number_format($percentageReport["{$cs['classnumber']}-{$cs['secgroup']}"], 2); ?>%</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Attendance Report Table -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Attendance Report</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Total Students</th>
                                    <th>Present Students</th>
                                    <th>Absent Students</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($classesSections as $cs): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cs['classnumber']); ?></td>
                                        <td><?php echo htmlspecialchars($cs['secgroup']); ?></td>
                                        <td><?php echo htmlspecialchars($attendanceReport["{$cs['classnumber']}-{$cs['secgroup']}"]['total_students']); ?></td>
                                        <td><?php echo htmlspecialchars($attendanceReport["{$cs['classnumber']}-{$cs['secgroup']}"]['present_count']); ?></td>
                                        <td><?php echo htmlspecialchars($attendanceReport["{$cs['classnumber']}-{$cs['secgroup']}"]['absent_count']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


  

         
                <h2 class="text-center">Attendance Dashboard by Class and Section</h2>

                <!-- Daily Present Percentage Chart -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daily Present Percentage</h3>
                    </div>
                    <div class="panel-body">
                        <canvas id="presentPercentageChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Attendance Report Chart -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Attendance Report</h3>
                    </div>
                    <div class="panel-body">
                        <canvas id="attendanceReportChart" width="400" height="200"></canvas>
                    </div>
                </div>
        


            </div> <!-- container -->
        </div> <!-- content -->
<?php include 'inc/footer.php'?>
