<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Attdance View</h3>
            </div>
            <div class="panel-body">
<?php
$stuid=$_REQUEST['stuid'];
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Enter Roll</label>
                    <div class="col-md-9">
                        <input type="text" name="stuid" class="form-control" autofocus="autofocus" value="<?php echo $stuid;?>">
                    </div>
                </div>

<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name"> Select Start Date</label>
<div class="col-md-9">
<input type="date" id="Cust-name" name="date" class="form-control" placeholder="Enter Date" required="1">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name"> Select End Date</label>
<div class="col-md-9">
<input type="date" id="Cust-name" name="date2" class="form-control" placeholder="Enter Date" required="1">
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

$sturoll=$_POST['stuid'];
$uniqid=$sturoll;
$pdate=$_POST['date'];
$sdate=date("Y-m-d", strtotime($pdate));
$date2=$_POST['date2'];
$edate=date("Y-m-d", strtotime($date2));

$startdate=$pdate;
$sdate=date( "Y-m-d", strtotime($startdate));
$sdatef=date( "Ymd", strtotime($startdate));      
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
    require "../interdb.php";
    $count=1;
    $sel_query="Select * from student where uniqid='$uniqid';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
        $stuuniqid=$row['uniqid'];
        ?>
        <!--Print School Info Start-->
        <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h1 style="font-size: 50px;color: black;">
                            <?php echo $row2['schoolname']?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['schooladdress'];?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['website'];?>
                        </h1>
                    </center>
                </div>
            </div>
            
            <?php $count2++; } ?>
        <!--Print School Info END-->
        <div class="col-md-12">
            <center>
                <h2>Student Information</h2>
                <!--Image Part Start-->
            <?php
                $count2=1;
                $sel_query2="Select * from imagesl WHERE stuuniqid='$stuuniqid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            
            <!--Img Start-->
            <?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg" style="height: 150px;width:150px;border-radius: 50%;">
            <?php
            }else{
            ?>
            <img src="img/student/<?php echo $row['imgname'];?>" style="height: 150px;width:150px;border-radius: 50%;">

            <?php
            }
            ?>
            <!--Img End-->
            <br>
            
            <?php $count2++; } ?>
            <!--Image Part END-->
        
                
                <h4>
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
            <?php }?>
        </div>
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                    </tr>
                </thead>

                <tbody>
<?php
//Count Parameter:
$totalday=0;
$friday=0;
$satuday=0;
$publicholyday=0;
$privateholyday=0;
$presentday=0;
$absentday=0;



$start_date = $sdate;
$end_date = $edate;

$current_date = strtotime($start_date);
$end_date = strtotime($end_date);
while ($current_date <= $end_date) {
$dbdate= date('Y-m-d', $current_date);
$sdate=$dbdate;
?>
<tr>
<th><?php echo $sdate;?></th>

<!--Present Part Start-->
<?php
$date = "$dbdate"; // format: yyyy-mm-dd
$dayOfWeek = date('w', strtotime($date)); // w returns 0 (for Sunday) through 6 (for Saturday)

if ($dayOfWeek == 5) {
echo "<th>";
echo "<span style='color:blue;'>Friday</span>";
echo "</th>";
$totalday++;
$friday++;
} elseif ($dayOfWeek == 6) {
    echo "<th>";
echo "<span style='color:blue;'>Saturday</span>";
echo "</th>";
$totalday++;
$satuday++;
}
else {
//getting Public Holy day
require "../interdb.php";
$sql10 = "SELECT * FROM publicholyday Where sdate <= '$sdate' AND edate >= '$sdate'";
$result10 = $link->query($sql10);
if ($result10->num_rows > 0) {
echo "<th>";
echo "<span style='color:blue;'>Public Holyday</span>";
echo "</th>";
$totalday++;
$publicholyday++;
}else{
//default present part   
require "../interdb.php";
$sql7 = "SELECT * FROM personalholyday Where stuid='$uniqid' AND sdate <= '$sdate' AND edate >= '$sdate'";
$result5 = $link->query($sql7);
// Check if any rows were returned
if ($result5->num_rows > 0) {
echo "<th>";
echo "<span style='color:blue;'>On Leave</span>";
echo "</th>";
$totalday++;
$privateholyday++;
}else{
$sql8 = "SELECT * FROM stuattdancedata Where stuid='$uniqid' AND adate='$sdate' AND cinoutid=1";
$result2 = $link->query($sql8);
if ($result2->num_rows > 0) {
echo "<th>";
echo "<span style='color:Green;'>Present</span>";
echo "</th>";
$totalday++;
$presentday++;
}else{
echo "<th>";
echo "<span style='color:Red;'>Absent</span>";
echo "</th>";
$totalday++;
$absentday++;
}
}
//ending Default Part
}//ending public holyday
}//ending cheak friday or saturday
?>
<!--Present Part END-->
<th>
   <?php
// SQL query to select all records where name = 'rony'
$sql12 = "SELECT * FROM machineattlog WHERE stuid='$uniqid' AND cstateid=1 AND adate='$sdate'";

// Execute the query
$result12 = $link->query($sql12);

// Check if any records were found
if ($result12->num_rows > 0) {
    // Loop through each record and print the values
    while($row12 = $result12->fetch_assoc()) {
        echo $row12['atime'];
        echo "<br>";
    }
} else {
    echo "No records";
}

    ?> 
</th>
<th>
    
</th>
</tr>
<?php 
$current_date = strtotime('+1 day', $current_date);
}
?>
</tbody>
</table>
<center>
    <h1>Total Days:<?php echo $totalday?></h1>
    <h1>Friday Days:<?php echo $friday?></h1>
    <h1>Saturday Days:<?php echo $satuday?></h1>
    <h1>Public Holy Days:<?php echo $publicholyday?></h1>
    <h1>Personal Leave:<?php echo $privateholyday?></h1>
    <h1>Present:<?php echo $presentday?></h1>
    <h1>Absent:<?php echo $absentday?></h1>
</center>
           
        </div>
    </div>
    
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