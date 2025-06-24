<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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
      require '../interdb.php';
      $id=$_REQUEST['id'];
      
      $query = "SELECT * from paycat where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
     

?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_POST['id'];
$pcatname= $_POST['pcatname'];
$amount=$_POST['amount'];


$sql="UPDATE paycat set pcatname='$pcatname',amount='$amount' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Update Successfully<h2>";
echo "<h4>Pay cat pdate Susseccfully <a href='paycat.php'>View Paycat</a></h4>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Payment Heading</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="pcatname" class="form-control" placeholder="Pay Heading Name" value="<?php echo $row['pcatname'];?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Payment Amount</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="amount" class="form-control" placeholder="Pay Amount" value="<?php echo $row['amount'];?>" autofocus="autofocus">
        </div>
    </div>

   

<div class="col-md-12">   
    <center> 
        <input type="submit" class="btn btn-primary" Value="Edit Heading">
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