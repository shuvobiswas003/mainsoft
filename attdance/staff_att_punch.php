<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect them to the login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
    header("location: login.php");
    exit;
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
                    <h4 class="pull-left page-title">Category</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Attendance View</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Enter Teacher SL</label>
                                    <div class="col-md-9">
                                        <input type="number" name="teachersl" class="form-control" autofocus="autofocus">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Select Start Date</label>
                                    <div class="col-md-9">
                                        <input type="date" name="date" class="form-control" required="1">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Select End Date</label>
                                    <div class="col-md-9">
                                        <input type="date" name="date2" class="form-control" required="1">
                                    </div>
                                </div>
                                
                                <input type="submit" class="btn btn-primary" Value="View Attendance">
                            </form>
                            <br><br>

                            <!-- Section View Part Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">View Attendance</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                                                $uniqid = $_POST['teachersl'];
                                                $startdate = $_POST['date'];
                                                $enddate = $_POST['date2'];

                                                require "interdb.php";

                                                $sel_query = "SELECT * FROM staff WHERE teachersl='$uniqid'";
                                                $result = mysqli_query($link, $sel_query);
                                                
                                                if (mysqli_num_rows($result) > 0) {
                                                    $teacher_info = mysqli_fetch_assoc($result);
                                                    
                                                    // Display school info
                                                    $school_query = "SELECT * FROM schoolinfo";
                                                    $school_result = mysqli_query($link, $school_query);
                                                    $school_info = mysqli_fetch_assoc($school_result);

                                                    echo "<center>";
                                                    echo "<h1 style='font-size: 50px;color: black;'>{$school_info['schoolname']}</h1>";
                                                    echo "<h1 style='font-size: 20px;'>{$school_info['schooladdress']}</h1>";
                                                    echo "<h1 style='font-size: 20px;'>{$school_info['website']}</h1>";
                                                    echo "</center>";

                                                    // Display teacher info
                                                    echo "<center>";
                                                    echo "<h2>Staff Information</h2>";
                                                    echo "<img src='../img/{$teacher_info['name']}.jpg' style='height: 150px;width:150px;border-radius: 50%;'><br><br>";
                                                   

                                                    echo "<h2>{$teacher_info['name']}</h2><br><br>";
                                                     echo "</center>";
                                                    // Display attendance table
                                                    echo "<table class='table table-striped table-bordered'>";
                                                    echo "<thead>";
                                                    echo "<tr>";
                                                    echo "<th>Date</th>";
                                                    echo "<th>Status</th>";
                                                    echo "<th>Clock In</th>";
                                                    echo "<th>Clock Out</th>";
                                                    echo "</tr>";
                                                    echo "</thead>";
                                                    echo "<tbody>";

                                                    $current_date = strtotime($startdate);
                                                    $end_date = strtotime($enddate);

                                                    while ($current_date <= $end_date) {
                                                        $dbdate = date('Y-m-d', $current_date);
                                                        echo "<tr>";
                                                        echo "<th>{$dbdate}</th>";

                                                        // Determine the day of the week
                                                        $dayOfWeek = date('w', strtotime($dbdate));

                                                        if ($dayOfWeek == 5) { // Friday
                                                            echo "<th><span style='color:blue;'>Friday</span></th>";
                                                        } elseif ($dayOfWeek == 6) { // Saturday
                                                            echo "<th><span style='color:blue;'>Saturday</span></th>";
                                                        } else {
                                                            // Check for public holidays
                                                            $holiday_query = "SELECT * FROM publicholyday WHERE sdate <= '$dbdate' AND edate >= '$dbdate'";
                                                            $holiday_result = mysqli_query($link, $holiday_query);

                                                            if (mysqli_num_rows($holiday_result) > 0) {
                                                                echo "<th><span style='color:blue;'>Public Holiday</span></th>";
                                                            } else {
                                                                // Check for personal holidays
                                                                $personal_holiday_query = "SELECT * FROM personalholyday WHERE stuid='$uniqid' AND sdate <= '$dbdate' AND edate >= '$dbdate'";
                                                                $personal_holiday_result = mysqli_query($link, $personal_holiday_query);

                                                                if (mysqli_num_rows($personal_holiday_result) > 0) {
                                                                    echo "<th><span style='color:blue;'>On Leave</span></th>";
                                                                } else {
                                                                    // Check for attendance
                                                                    $attendance_query = "SELECT * FROM stuattdancedata WHERE stuid='$uniqid' AND adate='$dbdate' AND cinoutid=1";
                                                                    $attendance_result = mysqli_query($link, $attendance_query);

                                                                    if (mysqli_num_rows($attendance_result) > 0) {
                                                                        echo "<th><span style='color:Green;'>Present</span></th>";
                                                                    } else {
                                                                        echo "<th><span style='color:Red;'>Absent</span></th>";
                                                                    }
                                                                }
                                                            }
                                                        }

                                                        // Display all clock-in times
                                                        echo "<th>";
                                                        $clock_in_query = "SELECT ctime FROM stuattdancedata WHERE stuid='$uniqid' AND adate='$dbdate' AND cinoutid=1";
                                                        $clock_in_result = mysqli_query($link, $clock_in_query);
                                                        if (mysqli_num_rows($clock_in_result) > 0) {
                                                            while($clock_in_info = mysqli_fetch_assoc($clock_in_result)) {
                                                                echo $clock_in_info['ctime'] . "<br>";
                                                            }
                                                        } else {
                                                            echo "No records";
                                                        }
                                                        echo "</th>";

                                                        // Display all clock-out times
                                                        echo "<th>";
                                                        $clock_out_query = "SELECT ctime FROM stuattdancedata WHERE stuid='$uniqid' AND adate='$dbdate' AND cinoutid=2";
                                                        $clock_out_result = mysqli_query($link, $clock_out_query);
                                                        if (mysqli_num_rows($clock_out_result) > 0) {
                                                            while($clock_out_info = mysqli_fetch_assoc($clock_out_result)) {
                                                                echo $clock_out_info['ctime'] . "<br>";
                                                            }
                                                        } else {
                                                            echo "No records";
                                                        }
                                                        echo "</th>";

                                                        echo "</tr>";

                                                        $current_date = strtotime('+1 day', $current_date);
                                                    }

                                                    echo "</tbody>";
                                                    echo "</table>";
                                                } else {
                                                    echo "<p>No teacher found with SL: $uniqid</p>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section View Part END -->
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->       
    </div> <!-- content -->
</div>

<?php include'inc/footer.php'?>
