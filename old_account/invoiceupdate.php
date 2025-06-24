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
      
      $query = "SELECT * from studentpayment where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);

?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$des=$_POST['des'];
$total=$_POST['total'];
$totalpay=$_POST['totalpay'];
$due=$total-$totalpay;

$sql="UPDATE studentpayment set des='$des',total='$total',totalpay='$totalpay',due='$due' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Invoice Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<h4> Student update Susseccfully</h4>";


}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <!--Student Form Part END-->

    <div class="col-md-12">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Student Namr</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="" required="1" autofocus="autofocus" value="<?php echo $row['stuname'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Desciption</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="des" class="form-control" placeholder="পিতার নাম" required="1"value="<?php echo $row['des'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Total Amount</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="total" class="form-control" placeholder="" required="1"value="<?php echo $row['total'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Paid Amount</label>
        <div class="col-md-9">
            <select name="totalpay" class="form-control">
                <option value="<?php echo $row['totalpay'];?>"><?php echo $row['totalpay'];?></option>
            </select>
        </div>
    </div>

    
    </div>


<center> 
<input type="submit" class="btn btn-primary" Value="Update Invoice">
</center>

    <!--Student Form Part END-->
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