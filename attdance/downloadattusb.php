<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
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
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "interdb.php";
          $handle = $_FILES['file']['tmp_name'];
          $file = fopen($handle, "r");
          if ($file) {
            ?>
<table class="table table-bordered">
<thead>
<tr>
    <th>Device ID</th>
    <th>Student ID</th>
    <th>Date</th>
    <th>Time</th>
    <th>Type</th>
    <th>Download</th>
</tr>
</thead>

<tbody>
    <?php
    while (($line = fgets($file)) !== false) {
        // Split the line into individual values
        $data = explode("\t", $line);
        ?>
<tr>
            <td><?php echo $mid = trim($data[0]);?></td>
            <td>
              <?php
              $machineid=$mid;
              $stuid;
              $sel_query="SELECT * FROM machinedata WHERE mid='$machineid'";
          $result = mysqli_query($link,$sel_query);
          while($row = mysqli_fetch_assoc($result)) {
            $stuid=$row['stuid'];
          }
        echo $stuid;
              ?>
            </td>
            
            
            <td><?php 
            $adate=trim($data[1]);
            $adate=(date("Y-m-d", strtotime($adate)));
            echo $adate;
            ?></td>
            <td><?php
            $time = explode(" ",$data[1]);
            $atime=$time[1];
            $atime=(date("H:i:s", strtotime($atime))); 
            echo $atime;
            ?></td>
            <td>

            <?php 
// Get the current time
$current_time = (date("H:i:s", strtotime($adate)));
$current_time=strtotime($current_time);
// Set the start and end times for "Clock IN" and "Clock Out"
$clock_in_start_time = strtotime('8:00 AM');
$clock_in_end_time = strtotime('12:00 PM');
$clock_out_start_time = strtotime('12:01 PM');
$clock_out_end_time = strtotime('5:00 PM');
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

echo $cstate;
?>
</td>
<!--Sending data to server-->                    
<td>
<?php
//insert machinelog
$atimemachine=strtotime($adate);
$atimestamp=$machineid.$atimemachine;


$sql ="INSERT IGNORE into machineattlog(mid,state,adate,atime,cinout,uniid,stuid,cstateid) VALUES ('$machineid','Card/Fingerprint','$adate','$atime','$cstate','$atimestamp','$stuid','$cstateid')"; 
if(mysqli_query($link, $sql)){
echo "<span style='color:green;'>*</span>";
} else{
echo "<h3 style='color:red;'>Class Already Exists</h1>";
}

//insert studance attlog
$atimemachine=strtotime($adate);
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
    }//ending while loop

    // Close the file
    fclose($file);
?>
</tbody>
</table>
<?php
} else {
    echo "Error opening the file.";
}



    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload FILE</label>
                    <div class="col-md-7">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Upload Attdance">
            </form>
            <br>
            <br>



        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>