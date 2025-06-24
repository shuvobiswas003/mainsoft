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
                                <h4 class="pull-left page-title">Devices</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Devices</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $dnumber= $_POST['dnumber'];
        $dname= $_POST['dname'];
        $dip= $_POST['dip'];
        $dport= $_POST['dport'];

    $enableGetDeviceInfo = true;
    $enableGetUsers = true;
    $enableGetData = true;

    require_once('zklib/ZKLib.php');

    $zk = new ZKLib($dip,$dport);

    $ret = $zk->connect();
    if ($ret) {
        $zk->disableDevice();
        ?>
        <?php if($enableGetDeviceInfo === true) { ?>
        <h1>Device 1: (IP: 192.168.1.210)</h1>
        <table class="table table-bordered">
            <tr>
                <td><h4><b>Status</b></h4></td>
                <td><h4>Connected</h4></td>
                <td><h4><b>Version</b></h4></td>
                <td><h4><?php echo($zk->version()); ?></h4></td>
                <td><h4><b>OS Version</b></h4></td>
                <td><h4><?php echo($zk->osVersion()); ?></h4></td>
                <td><h4><b>Device Time</b></h4></td>
                <td><h4><?php echo($zk->getTime()); ?></h4></td>
            </tr>
        </table>
        <?php 
            } 
            }
        ?>
    <?php
    require "interdb.php";
    $sql ="INSERT INTO devices(dnumber,dname,dip,dport) VALUES ('$dnumber','$dname','$dip','$dport') ON DUPLICATE KEY UPDATE dnumber='$dnumber',dname='$dname',dip='$dip',dport='$dport'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Class Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Devices Number</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="dnumber" class="form-control" placeholder="Enter Devices Number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Devices Name</label>
                    <div class="col-md-9">
                        <input type="name" id="Cust-name" name="dname" class="form-control" placeholder="Enter  Name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Devics  IP</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="dip" class="form-control" placeholder="Enter IP number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Devics  PORT</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="dport" class="form-control" placeholder="Enter PORT number">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Device">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Devices</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>D/Number</th>
                        <th>D/Name</th>
                        <th>D/IP</th>
                        <th>D/PORT</th>
                        <th>Status</th>
                        <th>D Time</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from devices";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["dnumber"]; ?></td>
                                <td><?php echo $row["dname"]; ?></td>
                                <td><?php echo $row["dip"]; ?></td>
                                <td><?php echo $row["dport"]; ?></td>
                                
<?php

$dip=$row["dip"];
$dport=$row["dport"];
require_once('zklib/ZKLib.php');
$zk = new ZKLib($dip,$dport);
$ret = $zk->connect();
?>
<?php
if ($ret) {?>
<td>
<span><h4 style="color: green">Connected</h4></span>

</td>
<?php
}else{
?>
<td>
<span><h4 style="color: red">Disconnected</h4></span>
</td>
<?php
}
?>    
<!--Getting Devices Time-->
<td>
    <?php echo($zk->getTime()); ?>
</td>
                
                                <td>
                                <a href="deletedevices.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Class?');">Delete</button> </a>

                                <a href="settime.php?dip=<?php echo $row['dip'];?>&dport=<?php echo $row['dport'];?>" target="_blank"><button type="button" class="btn btn-primary">Time</button> </a>
                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
        </div>
    </div>
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
<?php include'inc/footer.php'?>