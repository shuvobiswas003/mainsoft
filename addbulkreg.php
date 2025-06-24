<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];


require "interdb.php";
echo"<h3><a href='studentregadd.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."'>ADD Another Regestration Dashboard</a></h3>";
$count=1;
$sel_query="Select * from student where classnumber=$classnumber AND secgroup='$secgroupname';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

$roll=$row['roll'];
$uniqid=$row['uniqid'];

//getting subject
require "interdb.php";
$count1=1;
$sel_query1="Select * from subject where classnumber=$classnumber AND secgroup='$secgroupname';";
$result1 = mysqli_query($link,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) {
$subcode=$row1['subcode'];
$subname=$row1['subname'];
$substatus=1;

$regstatus=1;
//insert to sturegstatus
require "interdb.php";
        $sql ="INSERT INTO sturegstatus(classnumber,secgroupname,roll,uniqid,regstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$regstatus') ON DUPLICATE KEY UPDATE regstatus='$regstatus'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Regestration Successfull</h1>.";
    } else{
       echo "<h3 style='color:red;'>Already Regestred</h1>".mysqli_error($link);
    }

    $unisubstatus=$classnumber.$secgroupname.$roll.$subcode;

    require "interdb.php";
       $sql ="INSERT INTO sturegsubject(classnumber,secgroupname,roll,uniqid,subcode,subname,substatus,unisubstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$subcode','$subname','$substatus','$unisubstatus') ON DUPLICATE KEY UPDATE substatus='$substatus'";
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Subject ".$subcode." Inserted Successfully</span><br>";
    } 

$count1++;} 
$count++; }
?>