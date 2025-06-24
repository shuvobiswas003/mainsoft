<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        #seat{
            float: left;
            width: 120px;
        }
    </style>
</head>
<body>
    <?php
    $classnumber=$_REQUEST['classnumber'];
    $sdate=$_REQUEST['sdate'];
    $edate=$_REQUEST['edate'];
    require "interdb.php";
    ?>
    

    <center>
            <h1>
            <?php

               $count2=1;
               $sel_query2="Select * from schoolinfo";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
            </h1>
            <h1>Monthly Attdance Report: <?php echo $sdate?> To <?php echo $edate?></h1>
      <h1>Class: <?php echo $classnumber?> </h1>
        </center>
    <div class="row">
    <div class="container">
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
$uniqid=$row['uniqid'];
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
    $uniqid=$row['uniqid'];
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
    </div>
    


</body>
</html>