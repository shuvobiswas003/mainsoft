<?php
include '../sms.php';
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">PI Tabulation</h3>
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameb=$_POST['nameb'];
    $fnameb=$_POST['fnameb'];
    $mnameb=$_POST['mnameb'];

    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $sex=$_POST['sex'];

    $marital=$_POST['marital'];
    $religion=$_POST['religion'];
    $blood=$_POST['blood'];
    $f_opc=$_POST['f_opc'];
    $f_income=$_POST['f_income'];
    $l_name=$_POST['l_name'];
    $l_opc=$_POST['l_opc'];
    $l_income=$_POST['l_income'];
    $l_phone=$_POST['l_phone'];

    $brithid=$_POST['brithid'];
    $sdob=$_POST['sdob'];
    $dob=date("Y-m-d", strtotime($sdob));
    $birthid=$_POST['brithid'];
    $fnid=$_POST['fnid'];
    $mnid=$_POST['mnid'];
    
    $classnumber=$_POST['classnumber'];
    $classname;
    require '../interdb.php';
    //finding Class name
    $sel_query2="Select * from class WHERE classnumber='$classnumber'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
$classname=$row2['classname'];
    }

    $secgroupname=$_POST['secgroupname'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $uniqid=$classnumber.$secgroupname.$roll;

   
    

    //ssc_info

    $ssc_roll=$_POST['ssc_roll'];
    $ssc_reg=$_POST['ssc_reg'];
    $passingYear=$_POST['passingYear'];
    $board=$_POST['board'];
    $gpa=$_POST['gpa'];
    $passing_school=$_POST['passing_school'];
    //insert to database

// Insert photo
    $imgname = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $imgname = $filename . "." . $ext;
        $filetmp = $_FILES['image']['tmp_name'];

        // Check if the directory exists and is writable
        $target_dir = "../img/student/";
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            echo "<h3 style='color:red;'>Upload directory does not exist or is not writable.</h3>";
        } else {
            if (move_uploaded_file($filetmp, $target_dir . $imgname)) {
                echo "<h3 style='color:green;'>Image uploaded successfully.</h3>";
            } else {
                echo "<h3 style='color:red;'>Failed to move uploaded file.</h3>";
            }
        }
    } else {
        echo "<h3 style='color:red;'>Error uploading file: " . $_FILES['image']['error'] . "</h3>";
    }






        require "../interdb.php";

        $sql ="INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname)
VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$dob', '$birthid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$sex', '$imgname')
ON DUPLICATE KEY UPDATE
    classnumber = VALUES(classnumber),
    classname = VALUES(classname),
    secgroup = VALUES(secgroup),
    roll = VALUES(roll),
    name = VALUES(name),
    fname = VALUES(fname),
    mname = VALUES(mname),
    nameb = VALUES(nameb),
    fnameb = VALUES(fnameb),
    mnameb = VALUES(mnameb),
    dob = VALUES(dob),
    birthid = VALUES(birthid),
    fnid = VALUES(fnid),
    mnid = VALUES(mnid),
    address = VALUES(address),
    mobile = VALUES(mobile),
    uniqid = VALUES(uniqid),
    sex = VALUES(sex),
    imgname = VALUES(imgname);
";

    if(mysqli_query($link, $sql)){
        echo "<h1 style='color:green;'>Student Admited Successfully</h1>.";
   }

//send sms 
                $sch_name='';
                $short_code='';
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                    $sch_name=$row2['schoolname'];
                    $short_code=$row2['shortcode'];
                }
   $text="Dear ".$name.". You have Successfully Admited into ".$sch_name." into Class ".$classnumber." Bearing Roll: ".$roll." Group: ".$secgroupname." Thanks by ".$short_code." PW by Black Code IT";

   echo $text;
   echo $mobile;

   // // Send SMS to each student
   //      if (sendSMS($mobile, $text)) {
   //          echo "<p style='color:green;'>SMS sent </p>";
   //      } else {
   //          echo "<p style='color:red;'>SMS failed for </p>";
   //      }

   //insert to addmission Menu



   $sql2="INSERT INTO addmission_ssc_student (classnumber, section, roll, stuid, ssc_roll, ssc_reg,name,passingYear,board,gpa,passing_school,f_opq,f_income,l_name,l_opc,l_income,l_phone,marital,religion,blood)
VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$ssc_roll', '$ssc_reg','$name','$passingYear','$board','$gpa','$passing_school','$f_opc','$f_income','$l_name','$l_opc','$l_income','$l_phone','$marital','$religion','$blood')
ON DUPLICATE KEY UPDATE
    classnumber = VALUES(classnumber),
    section = VALUES(section),
    roll = VALUES(roll),
    stuid = VALUES(stuid),
    ssc_roll = VALUES(ssc_roll),
    ssc_reg = VALUES(ssc_reg),
    passingYear = VALUES(passingYear),
    board = VALUES(board),
    gpa = VALUES(gpa),
    passing_school= VALUES(passing_school),
    f_opq=VALUES(f_opq),
    f_income = VALUES(f_income),
    l_name = VALUES(l_name),
    l_opc = VALUES(l_opc),
    l_income = VALUES(l_income),
    l_phone = VALUES(l_phone),
    marital = VALUES(marital),
    religion= VALUES(religion),
    blood= VALUES(blood);";
 if(mysqli_query($link, $sql2)){
        echo "<h1 style='color:green;'>SSC Information Inserted</h1>.";
   }

echo "<a href='sturegperun.php?uniqid=".$uniqid."'><button type='button' class='btn btn-primary'>Click Here to Add Regestration</button></a>";


}
?>


 <!--2nd Form Part Start-->

 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>s