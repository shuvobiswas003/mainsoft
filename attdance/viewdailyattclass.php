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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>
<?php
$classnumber=$_REQUEST['classnumber'];
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
                    <label class="col-md-3 control-label" for="Cust-name">Select Start Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="startdate" class="form-control" placeholder="Enter Class Name" required="1">
                    </div>
                </div>

                
                
                
                <input type="submit" class="btn btn-primary" Value="View Attdance">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Attdance</h3>
    </div>
<div class="panel-body">
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $classnumber=$_POST['classnumber'];
        $startdate=$_POST['startdate'];
        $sdate=date( "Y-m-d", strtotime($startdate));
        $sdatef=date( "Ymd", strtotime($startdate));

$totalstu=0;
$presentstu=0;
$absentstu=0;
$onleave=0;        
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Student ID</th>
                        <th>RFID CARD</th>
                        <th>Class</th>
                        <th>Student Name</th>
                        <th>Group</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from student where classnumber='$classnumber' ORDER BY roll ASC";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td>
                                    <?php echo $row['uniqid']?>
                                </td>
                <td>
                <?php
                    $uniqid=$row['uniqid'];
                    $count2=1;
                    $sel_query2="Select * from rfid where stuid='$uniqid'";
                    $result2 = mysqli_query($link,$sel_query2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <?php echo $row2['rfid'];?>
                <?php $count2++; } ?>
                </td>
                                <td><?php echo $row['classnumber']?></td>
                                <td>
                                    <?php echo $row['name']?>
                                </td>
                                <td><?php echo $row['secgroup']?></td>

                                <td><?php echo $startdate;?></td>
                                
<!--Present Part Start-->
<?php

require "interdb.php";
    $sql7 = "SELECT * FROM personalholyday Where stuid='$uniqid' AND sdate <= '$sdate' AND edate >= '$sdate'";
    $result5 = $link->query($sql7);
    // Check if any rows were returned
    if ($result5->num_rows > 0) {
    echo "<th>";
    echo "<span style='color:blue;'>On Leave</span>";
    echo "</th>";
    $onleave++;
    $totalstu++;
   
    }else{
        $sql8 = "SELECT * FROM stuattdancedata Where stuid='$uniqid' AND adate='$sdate' AND (cinoutid=1 OR cinoutid=0)";
        $result2 = $link->query($sql8);
        if ($result2->num_rows > 0) {
        echo "<th>";
        echo "<span style='color:Green;'>Present</span>";
        echo "</th>";
        $presentstu++;
        $totalstu++;
        }else{
            echo "<th>";
            echo "<span style='color:Red;'>Absent</span>";
            echo "</th>";
            $absentstu++;
            $totalstu++;
        }

    } 
?>
<!--Present Part END-->


                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
            <center>
                <h2>Total Students: <?php echo $totalstu;?></h2>
                <h2>Present Students: <?php echo $presentstu;?></h2>
                <h2>On Leave Students: <?php echo $onleave;?></h2>
                <h2>Absent Students: <?php echo $absentstu;?></h2>
            </center>
        </div>
    </div>
    <a href="printdailyattclass.php?classnumber=<?php echo $classnumber?>&sdate=<?php echo $sdate?>" target="_blank"><button class="btn btn-primary">Print Data</button></a>
<?php }?>
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