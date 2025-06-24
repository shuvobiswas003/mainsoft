<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Take Attdence</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Punch RFID</label>
                    <div class="col-md-9">
                        <input type="number" name="rfidcardnumber" autofocus="autofocus" class="form-control">
                    </div>
                </div>
            
            <input type="submit" class="btn btn-primary" Value="Get List">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$rfidcardnumber=$_POST['rfidcardnumber'];
// insert to student data log
require 'interdb.php';
$count=1;
$sel_query="SELECT * FROM rfid WHERE rfid='$rfidcardnumber'";
$result = mysqli_query($link,$sel_query);
 while($row = mysqli_fetch_assoc($result)) {

?>

<?php
    $stuid=$row['stuid'];
    $count1=1;
    $sel_query1="SELECT * FROM student WHERE uniqid='$stuid'";
    $result1 = mysqli_query($link,$sel_query1);
    while($row1 = mysqli_fetch_assoc($result1)) {
?>

    <div class="col-md-12">
        <center>
            <h2>Student Information</h2>
            <img src="img/student/<?php echo $row1['uniqid'];?>.jpg" alt="" style="height: 150px;width:150px;border-radius: 50%;"><br>
            <h4>
            <?php echo $row1['name'];?><br> <?php echo $row1['classname'];?> (<?php echo $row1['classnumber'];?>) <br>
            Roll:<?php echo $row1['roll'];?>
            Section:<?php echo $row1['secgroup'];?>
            </h4>
        </center>
    </div>

    <?php 
       

//getting machine id
$mid='';
$sel_query12="SELECT * FROM machinedata WHERE stuid='$stuid'";
    $result12 = mysqli_query($link,$sel_query12);
    while($row12 = mysqli_fetch_assoc($result12)) {
        $mid=$row12['mid'];
    }

echo $mid;
$adate=date("Y-m-d");
$atime = date("H:i:s");
$current_time = date("H:i:s");
$current_time=strtotime($current_time);
// Set the start and end times for "Clock IN" and "Clock Out"
// Database connection (you need to have dbconfig.php included here)
require_once 'dbconfig.php';


// Query the shift timings from att_time_table (example structure)
$sql10 = "SELECT * FROM att_time_table WHERE id = 1"; // Adjust the WHERE clause as per your table structure or logic
$result10 = mysqli_query($link, $sql10);

if (mysqli_num_rows($result10) > 0) {
    $row10 = mysqli_fetch_assoc($result10);

    // Extract shift timings from the fetched row
    $clock_in_start_time = strtotime($row10['clock_in_start_time']);
    $clock_in_end_time = strtotime($row10['clock_in_end_time']);

    // Set the start and end times for "Clock Out" (assuming static values for demonstration)
    $clock_out_start_time = strtotime($row10['clock_out_start_time']);
    $clock_out_end_time = strtotime($row10['clock_out_end_time']);

    // Determine the state based on the current time
    if ($current_time >= $clock_in_start_time && $current_time <= $clock_in_end_time) {
        $cstate = "Clock IN";
        $cstateid = 1;
    } else if ($current_time >= $clock_out_start_time && $current_time <= $clock_out_end_time) {
        $cstate = "Clock Out";
        $cstateid = 2;
    } else {
        $cstate = "Unknown";
        $cstateid = 3;
    }

    echo $cstate;
} else {
    echo "No shift timings found in the database.";
}


$cstate;
$cstateid;
// Determine the state based on the current time
if ($current_time >= $clock_in_start_time && $current_time <= $clock_in_end_time) {
    $cstate = "Clock IN";
    $cstateid=1;
} else if ($current_time >= $clock_out_start_time && $current_time <= $clock_out_end_time) {
    $cstate = "Clock Out";
    $cstateid=2;
} else {
    $cstate = "Unknown";
    $cstateid=3;
}

?>
</td>
<!--Sending data to server-->                    
<td>
    <?php
   $current_time = date("Y-m-d H:i:s"); // Gets the current date and time
echo "Current time: " . $current_time . "<br>";

$atimestamp = strtotime($current_time); // Convert current time to timestamp
echo "Timestamp: " . $atimestamp;
    

    $sql ="INSERT IGNORE into machineattlog(mid,state,adate,atime,cinout,uniid,stuid,cstateid) VALUES ('$mid','card','$adate','$atime','$cstate','$atimestamp','$stuid','$cstateid')"; 
    if(mysqli_query($link, $sql)){
        echo "<span style='color:green;'>*</span>";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }

    //insert studance attlog
   
    $uniqattid2=$atimestamp.$cstateid;
    $sql ="INSERT IGNORE into stuattdancedata(`machineid`, `stuid`, `adate`, `ctime`, `cinout`, `cinoutid`, `uniqattid`, `status`) VALUES ('$mid','$stuid','$adate','$atime','$cstate','$cstateid','$uniqattid2','Present')"; 
    if(mysqli_query($link, $sql)){
        echo "<span style='color:green;'>Download</span>";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }


     date_default_timezone_set('Asia/Dhaka');
        $mob=$row1['mobile'];
        $time=date("h:i:sa");
        $text="Student Name".$row1['name']."Class:".$row1['classnumber'].". Roll:".$row1['roll']."Present Time:".$time." (".$cstate.") Thanks. P.W Black Code IT";
    
        include 'sms.php';

         if (sendSMS($mob, $text)) {
            echo "<p style='color:green;'>SMS sent to</p>";
        } else {
            echo "<p style='color:red;'>SMS failed for</p>";
        }





    ?>

<?php $count1++;}?>
                              
    <?php $count++; }?>
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>