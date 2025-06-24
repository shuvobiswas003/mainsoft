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
                                <h4 class="pull-left page-title">Delete Seat Plan</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Seatplan</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php
require '../interdb.php';
$id=$_REQUEST['id'];
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
$examid=$_REQUEST['examid'];
$roomnumber=$_REQUEST['roomnumber'];

$query = "DELETE FROM examseatplanc1c2c3 WHERE id=$id";
$query1="DELETE FROM examseatinfo WHERE roomnumber=$roomnumber AND examid='$examid'";
$result = mysqli_query($link,$query) or die ( mysqli_error());
$result2 = mysqli_query($link,$query1) or die ( mysqli_error());
echo "Seatplan Deleted  Successfully";
echo"<br />";
echo "Go Back To Seat Plan Dashboard<br>";
echo"<a href='addstudentc1c2c1.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."&examid=".$examid."'>Seatplan View</a>";
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