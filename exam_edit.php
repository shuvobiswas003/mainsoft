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
                                <h4 class="pull-left page-title">Datatable</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Datatable</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Student</h3>
                                    </div>


<?php
      require 'interdb.php';
      $exid=$_REQUEST['exid'];
      
      $query = "SELECT * from exam where exid='".$exid."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
     

?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$exid=$_POST['exid'];
$exname= $_POST['exname'];
$year= $_POST['year'];
$exdate=$_POST['exdate'];
$nexdate=date("Y-m-d", strtotime($exdate));


$sql="UPDATE exam set examname='$exname',year='$year',startdate='$nexdate' WHERE exid='$exid'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Student Update Successfully<h2>";
echo "<h4> Exam update Susseccfully <a href='examview.php'>View Exam</a></h4>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="exid" value="<?php echo $row['exid'];?>">

<div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="exname" class="form-control" placeholder="Enter Exam Name" required="1" value="<?php echo $row['examname'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Year</label>
        <div class="col-md-9">
            <input type="number" id="Cust-name" name="year" class="form-control" placeholder="Enter Exam Year" required="1" value="<?php echo $row['year'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Start Date</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="exdate" class="form-control" placeholder="Enter Start Date" required="1" value="<?php echo $row['startdate'];?>">
        </div>
    </div>

<div class="col-md-12">   
    <center> 
        <input type="submit" class="btn btn-primary" Value="Edit Exam">
    </center>
</div>

</form>
<?php } ?>
</div>
</div>
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>