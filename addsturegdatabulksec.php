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
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Student Regestration</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Student</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php

//getting form variable
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$subname=$_POST['subname'];
$substatus=$_POST['substatus'];



    require "interdb.php";
    
    //getting ready for bulk student
    $count4=1;
    $sel_query2="Select * from student where secgroup='$secgroupname' AND classnumber='$classnumber'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $roll=$row2['roll'];
        $uniqid=$row2['uniqid'];
        echo $roll;
        echo "<br>";


    for ($i = 0; $i < count($subcode); $i++) {
    $subcoden =$subcode[$i];
    $subnamen =$subname[$i];
    $substatusn =$substatus[$i];
    $unisubstatus=$classnumber.$secgroupname.$roll.$subcoden;
    
    //insert stu reg SUB JECT data
    $sql ="INSERT INTO sturegsubject(classnumber,secgroupname,roll,uniqid,subcode,subname,substatus,unisubstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$subcoden','$subnamen','$substatusn','$unisubstatus') ON DUPLICATE KEY UPDATE substatus='$substatusn'";
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Subject ".$subcoden." Inserted Successfully</span><br>";

    }

    }

    //INSERTING 
    $regstatus=1;
    //insert to sturegstatus
    require "interdb.php";
    $sql ="INSERT INTO sturegstatus(classnumber,secgroupname,roll,uniqid,regstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$regstatus') ON DUPLICATE KEY UPDATE regstatus='$regstatus'"; 
    if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Regestration Successfull</h1>";
        }

    $count4++;
    }






?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>