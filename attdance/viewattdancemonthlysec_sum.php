<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>WelCome To Your School</title>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <style>
        @media print {
            /* Define your print styles here */
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
            
            th {
                background-color: #f2f2f2;
            }
            
            .green {
                color: green !important;
            }

            .yellow {
                color: purple !important;
            }

            .red {
                color: red !important;
            }
        }

        .green {
                color: green !important;
            }

            .yellow {
                color: purple !important;
            }

            .red {
                color: red !important;
            }
    </style>

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

        <!-- DataTables -->
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />



        
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />

        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
    </head>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroup=$_REQUEST['secgroup'];
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Attdance View</h3>
            </div>
            <div class="panel-body">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from class Where classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Section</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroup" required="1">
                        
                        <option value="<?php echo $secgroup?>"><?php echo $secgroup;?></option>
                        </select>
                    </div>
                </div>

              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Start Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="startdate" class="form-control" placeholder="Enter Class Name" required="1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select End Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="enddate" class="form-control" placeholder="Enter Class Name" required="1">
                    </div>
                </div>
                
                
                <input type="submit" class="btn btn-primary" Value="View Attdance">
                <button type="button" class="btn btn-success" id="printBtn">Print</button>
                        
            </form>
            <br>
            <br>
<!--Section View Part Start-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Attendance</h3>
            </div>
            <div class="panel-body" id="attendanceTable">
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $classnumber = $_POST['classnumber'];
                    $secgroup = $_POST['secgroup'];
                    $startdate = $_POST['startdate'];
                    $sdate = date("Y-m-d", strtotime($startdate));
                    $enddate = $_POST['enddate'];
                    $edate = date("Y-m-d", strtotime($enddate));


            


                    // Fetch student data for the selected class and section
                    require "interdb.php"; // Make sure to include your database connection file
                    $sql = "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroup' ORDER BY roll ASC";
                    $result = mysqli_query($link, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // Calculate number of days between start and end date
                        $start = new DateTime($sdate);
                        $end = new DateTime($edate);
                        $interval = new DateInterval('P1D');
                        $period = new DatePeriod($start, $interval, $end);


            // Display class name, section group name, and month name above the table
echo "<center>";
$sel_query2 = "SELECT * FROM schoolinfo";
$result2 = mysqli_query($link, $sel_query2);
while ($row2 = mysqli_fetch_assoc($result2)) {
    $schoolname = $row2['schoolname'];

    echo "<h1>".$schoolname."</h1>";
    echo "<h1>Student Attdance</h1>";
    $softlink = $row2['softlink'];
    $headname = $row2['headname'];
    $baselink = $row2['website'];
}

            
            echo "<h2>Class: $classnumber, Section: $secgroup</h2>";
           echo "<h3>Start Date: $startdate, End Date: $enddate, Month: " . $start->format("F") . "</h3>";

            echo "</center>";

                        // Display table headers with date and day name
                       echo "<table class='table table-striped' border='1'>";
                        echo "<thead><tr><th>Roll</th><th>Name</th><th>ID</th>";
                        foreach ($period as $date) {
                            echo "<th>" . $date->format("d") . " (" . $date->format("D") . ")</th>";
                        }
                        echo "</tr></thead>";
                        echo "<tbody>";

                       // Loop through each student
while ($row = mysqli_fetch_assoc($result)) {
    $student_roll = $row['roll'];
    $student_name = $row['name'];
    $student_id = $row['uniqid'];
    echo "<tr>";
    echo "<td>$student_roll</td>";
    echo "<td>$student_name</td>";
    echo "<td>$student_id</td>";

    // Fetch attendance data for the student within the specified date range
    $attendance_query = "SELECT adate, cinoutid FROM stuattdancedata WHERE stuid='$student_id' AND adate BETWEEN '$sdate' AND '$edate'";
    $attendance_result = mysqli_query($link, $attendance_query);
    $attendance = array();

    // Store attendance data in an array
    while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
        $attendance[$attendance_row['adate']][] = $attendance_row['cinoutid'];
    }

    foreach ($period as $date) {
    // Skip calculation for Saturdays and Fridays
    if ($date->format("D") === 'Sat' || $date->format("D") === 'Fri') {
        echo "<td style='background-color: #ccc;'>ছুটি</td>";
        continue;
    }

    $formatted_date = $date->format("Y-m-d");
    $status = '-';
    
    // Check if attendance data exists for this date
    if (isset($attendance[$formatted_date])) {
        $clock_in_out = $attendance[$formatted_date];
        // Check if both clock in and clock out entries exist for the date
        if (in_array(1, $clock_in_out) && in_array(2, $clock_in_out)) {
            $status = '<span class="green">P</span>'; // Green P
        } elseif (in_array(1, $clock_in_out)) {
            $status = '<span class="yellow">P</span>'; // Yellow P
        } else {
            $status = '<span class="red">A</span>'; // Red A
        }
    } else {
        $status = '<span class="red">A</span>'; // Red A
    }
    echo "<th>$status</th>";
}
    echo "</tr>";
}                       echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "No students found for the selected class and section.";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--Section View Part END-->



        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
    
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

        <script type="text/javascript">
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
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        
       <script>
            jQuery(document).ready(function() {

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>
        <script>
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

$("#image").change(function () {
    imagePreview(this);
});

        </script>
<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        var printContents = document.getElementById('attendanceTable').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
</script>
    </body>
</html>
