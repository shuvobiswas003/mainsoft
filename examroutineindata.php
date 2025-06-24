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
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Exam</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Routine</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php
$exid=$_POST['exid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$subname=$_POST['subname'];
$exdate=$_POST['exdate'];
$align=$_POST['align'];
$active=$_POST['active'];
$extime=$_POST['extime'];

for ($i = 0; $i < count($exid); $i++) {
        $exidn=$exid[$i];
        $classn=$classnumber[$i];
        $groupn=$secgroupname[$i];
        $subcoden=$subcode[$i];
        $subnamen=$subname[$i];
        $exdaten=$exdate[$i];
        $exdatenn=date("Y-m-d", strtotime($exdaten));
        $alignn=$align[$i];
        $uexid=$exidn.$classn.$subcoden.$groupn;
        $activen=$active[$i];
        $extimen=$extime[$i];

//insert to database
require "interdb.php";
       $sql ="INSERT INTO examroutine(exid,class,cgroup,subcode,subname,examdate,align,uexid,active,examtime) VALUES ('$exidn','$classn','$groupn','$subcoden','$subnamen','$exdatenn','$alignn','$uexid','$activen','$extimen') ON DUPLICATE KEY UPDATE examdate='$exdatenn',examtime='$extimen',align='$alignn',subname='$subnamen',subcode='$subcoden',active='$activen'"; 
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green;font-size:25px;'>Record Inserted Successfully</span><br>";
    } else{
    echo "<h3 style='color:red'>Already Added This Subject On Exam Rroutine</h3>";
    }
    mysqli_close($link);
    echo"<h3><a href='examroutineview.php?classnumber=".$classn."&secgroupname=".$groupn."'>View Routine</a></h3>";

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