<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    
    $nameb=$_POST['nameb'];
    $fnameb=$_POST['fnameb'];
    $mnameb=$_POST['mnameb'];

    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $sex=$_POST['sex'];

    $birthid=$_POST['birthid'];
    $sdob=$_POST['sdob'];
    $dob=date("Y-m-d", strtotime($sdob));
    $fnid=$_POST['fnid'];
    $mnid=$_POST['mnid'];
    
    $classnumber=$_POST['classnumber'];
    $classname=$_POST['classname'];
    $secgroupname=$_POST['secgroupname'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $uniqid=$classnumber.$secgroupname.$roll;

    //insert photo
    $imgname=$_POST['image'];
    

    //insert to database

        require "../interdb.php";

        $sql ="UPDATE student SET classnumber='$classnumber',classname='$classname',secgroup='$secgroupname',roll='$roll',name='$name',fname='$fname',mname='$mname',nameb='$nameb',fnameb='$fnameb',mnameb='$mnameb',sex='$sex',dob='$dob',birthid='$birthid',fnid='$fnid',mnid='$mnid',address='$address',mobile='$mobile',imgname='$imgname',uniqid='$uniqid' WHERE id='$id'";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student UPDATED Successfully</h1>.";
    }
     echo '<script> window.setTimeout("window.close()", 2000); </script>';

}


?>