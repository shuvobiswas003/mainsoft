<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
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
                                <h4 class="pull-left page-title">Upload</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Attdance</h3>
            </div>
            <div class="panel-body">
        
        <div class="col-md-12">
    <!--Device 1 Start-->
    <?php
    $id=$_REQUEST['id'];
    $enableGetDeviceInfo = true;
    $enableGetUsers = true;
    $enableGetData = true;

    $dip;
    $dport;

    require "interdb.php";
    $sel_query="Select * from devices WHERE id='$id'";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
         $dip=$row['dip'];
         $dport=$row['dport'];      
    }

    require_once('zklib/ZKLib.php');




    $zk = new ZKLib($dip,$dport);

    $ret = $zk->connect();
    if ($ret) {
        $zk->disableDevice();
        ?>
        <?php if($enableGetDeviceInfo === true) { ?>
        <h1>Device 1: (IP: <?php echo $dip;?>)</h1>
        <table class="table table-bordered">
            <tr>
                <td><h4><b>Status</b></h4></td>
                <td><h4>Connected</h4></td>
                <td><h4><b>Version</b></h4></td>
                <td><h4><?php echo($zk->version()); ?></h4></td>
                <td><h4><b>OS Version</b></h4></td>
                <td><h4><?php echo($zk->osVersion()); ?></h4></td>
            </tr>
        </table>
        <?php 
    		} 
			}
        ?>
        <?php
        require "interdb.php";
        ?>

<br>
<br>
<center><h1>Attdance Data</h1></center>
<div class="table-responsive-lg">
<table class="table table-bordered">
<thead>
<tr>
    <th>Attdance Sl</th>
    <th>Device ID</th>
    <th>Student ID</th>
    <th>T_Table</th>
    <th>Type</th>
    <th>Name</th>
    <th>State</th>
    <th>Date</th>
    <th>Time</th>
    <th>Type</th>
    <th>Download</th>
</tr>
</thead>

<tbody>
		<?php if ($enableGetData === true) { ?>
        <?php
        	$users = $zk->getUser();
            $attendance = $zk->getAttendance();
            if (count($attendance) > 0) {
                $attendance = array_reverse($attendance, true);
                sleep(1);
                foreach ($attendance as $attItem) {
                    ?>
                    <tr>
              		<td><?php echo($attItem['uid']); ?></td>
                    <td><?php echo($attItem['id']); ?></td>
                    <td>
                    	<?php
                    	$machineid=$attItem['id'];
                    	$stuid;
                        $time_table='';
                        $type='';
                    	$sel_query="SELECT * FROM machinedata WHERE mid='$machineid'";
				          $result = mysqli_query($link,$sel_query);
				          while($row = mysqli_fetch_assoc($result)) {
				            $stuid=$row['stuid'];
                            $time_table=$row['timetable'];
                            $type=$row['type'];
				          }
				        echo $stuid;
                    	?>
                    </td>
                    <td><?php echo $time_table;?></td>
                    <td><?php echo $type;?></td>
                    <td><?php echo(isset($users[$attItem['id']]) ? $users[$attItem['id']]['name'] : $attItem['id']); ?></td>
                    <td><?php
                    $fr;
                    $fr=(ZK\Util::getAttState($attItem['state']));
                    echo $fr; ?>
                     </td>
                    <td><?php 
                    $adate;
                    $adate=(date("Y-m-d", strtotime($attItem['timestamp'])));
                    echo $adate;
                    ?></td>
                    <td><?php
                    $atime;
                    $atime=(date("H:i:s", strtotime($attItem['timestamp']))); 
                    echo $atime;
                    ?></td>
                    <td>

                    <?php 
// Get the current time
$current_time = (date("H:i:s", strtotime($attItem['timestamp'])));
$current_time=strtotime($current_time);
// Set the start and end times for "Clock IN" and "Clock Out"
// Database connection (you need to have dbconfig.php included here)
require_once 'dbconfig.php';


// Query the shift timings from att_time_table (example structure)
$sql = "SELECT * FROM att_time_table WHERE id = '$time_table'"; // Adjust the WHERE clause as per your table structure or logic
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Extract shift timings from the fetched row
    $clock_in_start_time = strtotime($row['clock_in_start_time']);
    $clock_in_end_time = strtotime($row['clock_in_end_time']);

    // Set the start and end times for "Clock Out" (assuming static values for demonstration)
    $clock_out_start_time = strtotime($row['clock_out_start_time']);
    $clock_out_end_time = strtotime($row['clock_out_end_time']);

    // Determine the state based on the current time
    if ($current_time >= $clock_in_start_time && $current_time <= $clock_in_end_time) {
        $cstate = "Clock IN";
        $cstateid = 1;
    } else if ($current_time >= $clock_out_start_time && $current_time <= $clock_out_end_time) {
        $cstate = "Clock Out";
        $cstateid = 2;
    } else {
        $cstate = "Late/Early Leave";
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
	//insert machinelog
	$atimemachine=strtotime($attItem['timestamp']);

	$atimestamp=$machineid.$atimemachine;
	

	$sql ="INSERT IGNORE into machineattlog(mid,state,adate,atime,cinout,uniid,stuid,cstateid) VALUES ('$machineid','$fr','$adate','$atime','$cstate','$atimestamp','$stuid','$cstateid')"; 
    if(mysqli_query($link, $sql)){
        echo "<span style='color:green;'>*</span>";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }

    //insert studance attlog
	$atimemachine=strtotime($attItem['timestamp']);
	$uniqattid2=$machineid.$atimemachine.$cstateid;
	$sql ="INSERT IGNORE into stuattdancedata(`machineid`, `stuid`, `adate`, `ctime`, `cinout`, `cinoutid`, `uniqattid`, `status`) VALUES ('$machineid','$stuid','$adate','$atime','$cstate','$cstateid','$uniqattid2','Present')"; 
    if(mysqli_query($link, $sql)){
        echo "<span style='color:green;'>Download</span>";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }

	?>
</td>
            </tr>
            <?php
                } //ending foreach
            }//ending machine 1 data
        ?>
    </tbody>
 </table>
<?php
    if (count($attendance) > 0) {
        $zk->clearAttendance(); 
    }
?>
<?php } ?>

</div>
<!--Machine 1 Ending-->

        </div><!--End of Collumn Div-->
    
    </div>
</div>

</div><!--End of panel Body-->                   
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>