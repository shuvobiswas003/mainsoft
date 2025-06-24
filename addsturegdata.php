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
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$uniqid=$_POST['uniqid'];
$subcode=$_POST['subcode'];
$subname=$_POST['subname'];
$substatus=$_POST['substatus'];

$regstatus=1;
//insert to sturegstatus
require "interdb.php";
        $sql ="INSERT INTO sturegstatus(classnumber,secgroupname,roll,uniqid,regstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$regstatus') ON DUPLICATE KEY UPDATE regstatus='$regstatus'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Regestration Successfull</h1>.";
    } else{
       echo "<h3 style='color:red;'>Already Regestred</h1>".mysqli_error($link);
    }
//insert to sturegsubject
    for ($i = 0; $i < count($subcode); $i++) {
    $subcoden =$subcode[$i];
    $subnamen =$subname[$i];
    $substatusn =$substatus[$i];
    $unisubstatus=$classnumber.$secgroupname.$roll.$subcoden;

    require "interdb.php";
       $sql ="INSERT INTO sturegsubject(classnumber,secgroupname,roll,uniqid,subcode,subname,substatus,unisubstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$subcoden','$subnamen','$substatusn','$unisubstatus') ON DUPLICATE KEY UPDATE substatus='$substatusn'";
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Subject ".$subcoden." Inserted Successfully</span><br>";
    } else{
    echo "Already Added This Subject to this Regestration";
    }


    mysqli_close($link);

}
echo"<h3><a href='studentregadd.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."'>ADD Another Regestration Dashboard</a></h3>";
 echo "<script>
  setTimeout(function() {
      window.close()
  }, 5000);
</script>"
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