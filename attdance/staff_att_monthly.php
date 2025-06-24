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

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
             

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

        $startdate=$_POST['startdate'];
        $sdate=date( "Y-m-d", strtotime($startdate));
        $enddate=$_POST['enddate'];
        $edate=date( "Y-m-d", strtotime($enddate));
        
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Begain Date</th>
                        <th>END Date</th>
                        <th>Total Days</th>
                        <th>Present Days</th>
                        <th>Friday's</th>
                        <th>Saturday's</th>
                        <th>Holyday's</th>
                        <th>Personal Holyday's</th>
                        <th>Absent Days</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from staff ORDER BY teachersl ASC";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $uniqid=$row['teachersl'];
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td>
                                	<?php echo $row['name']?>
                                </td>
               
                                <td><?php echo $sdate?></td>
                                <td><?php echo $edate?></td>
                                <td>
    <?php
    $now = strtotime($edate);
    $your_date = strtotime($sdate);
    $datediff = $now - $your_date;
    $daysc= round($datediff / (60 * 60 * 24));
    $totalday=$daysc+1;
    echo "<span style='color:black;'>".$totalday."</span>";
    ?>
                                </td>
<!--Present Part Start-->
<th>
<?php
$presentdays;
require 'interdb.php';
$sql1="Select count(adate) from stuattdancedata where stuid='$uniqid' AND status='Present' AND (adate BETWEEN '$sdate' AND '$edate') GROUP BY adate;";

if ($result4=mysqli_query($link,$sql1))
  {
  $rowcount=mysqli_num_rows($result4);
  $status=$rowcount;
  $presentdays=$status;
  echo "<span style='color:green;'>".$presentdays."</span>";
  // Free result set
  mysqli_free_result($result4);
  }
?>
                                
</td>
<!--Present Part END-->

<!--Friday Count Start-->
<td>
    <?php
    $totalfriday;
    // input start and end date
    $startDate = $sdate;
    $endDate = $edate;
    
    $resultDays = array('Monday' => 0,
    'Tuesday' => 0,
    'Wednesday' => 0,
    'Thursday' => 0,
    'Friday' => 0,
    'Saturday' => 0,
    'Sunday' => 0);

    // change string to date time object
    $startDate = new DateTime($startDate);
    $endDate = new DateTime($endDate);

    // iterate over start to end date
    while($startDate <= $endDate ){
        // find the timestamp value of start date
        $timestamp = strtotime($startDate->format('d-m-Y'));

        // find out the day for timestamp and increase particular day
        $weekDay = date('l', $timestamp);
        $resultDays[$weekDay] = $resultDays[$weekDay] + 1;

        // increase startDate by 1
        $startDate->modify('+1 day');
    }

    // print the result
    $totalfriday=$resultDays['Friday'];
    echo $totalfriday;
?>

</td>
<!--Friday Count END-->

<!--Saturday Count Start-->
<td>
    <?php
    $totalfriday;
    // input start and end date
    $startDate = $sdate;
    $endDate = $edate;
    
    $resultDays = array('Monday' => 0,
    'Tuesday' => 0,
    'Wednesday' => 0,
    'Thursday' => 0,
    'Friday' => 0,
    'Saturday' => 0,
    'Sunday' => 0);

    // change string to date time object
    $startDate = new DateTime($startDate);
    $endDate = new DateTime($endDate);

    // iterate over start to end date
    while($startDate <= $endDate ){
        // find the timestamp value of start date
        $timestamp = strtotime($startDate->format('d-m-Y'));

        // find out the day for timestamp and increase particular day
        $weekDay = date('l', $timestamp);
        $resultDays[$weekDay] = $resultDays[$weekDay] + 1;

        // increase startDate by 1
        $startDate->modify('+1 day');
    }

    // print the result
    $totalsat=$resultDays['Saturday'];
    echo $totalsat;
?>

</td>
<!--Saturday Count END-->

<!--Public Holyday Count Start-->
<td>
<?php
    $publicholyday;
    $sel_query2="Select sum(actualday) from publicholyday where (sdate BETWEEN '$sdate' AND '$edate')";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $publicholyday=$row2['sum(actualday)'];
    }
    if(empty($publicholyday)){
        $publicholyday=0;
    }
    echo $publicholyday;
?>
</td>
<!--Public Holyday Count END-->

<!--Personal Holyday Count Start-->

<td>
    <?php
    $personalleave;
    $sel_query2="Select sum(actualday) from personalholyday where stuid='$uniqid'AND (sdate BETWEEN '$sdate' AND '$edate')";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $personalleave=$row2['sum(actualday)'];
    }
    if(empty($personalleave)){
        $personalleave=0;
    }
    echo $personalleave;
?>
</td>

<!--Personal Holyday Count END-->


<!--Absent Part Start-->
<th>
<?php

    $now = strtotime($edate);
    $your_date = strtotime($sdate);
    $datediff = $now - $your_date;
    $daysc= round($datediff / (60 * 60 * 24));
    $totalpresent=$presentdays+$totalfriday+$totalsat+$publicholyday+$personalleave;
    $absentdays= $totalday-$totalpresent;

    if ($absentdays < 0) {
    $absentdays = 0;
    }

    echo "<span style='color:red;'>".$absentdays."</span>";
    
?>                              
</th>
<!--Absent Part END-->

                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
           
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