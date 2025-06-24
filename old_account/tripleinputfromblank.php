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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">View Subject</h3>
</div>
<!--main Part Avove Start-->
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            
            <input type="submit" class="btn btn-primary" Value="Get List">
        </form>
    </div>
 <!--main Part Avove END-->

 <!--Main Below Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$pid=$_POST['pid'];
require 'interdb.php';
$count=1;
$sel_query="Select * from purchase WHERE pid='".$pid."' AND enroll='nenroll'";
$result = mysqli_query($link,$sel_query);
 while($row = mysqli_fetch_assoc($result)) {

?>
<form action="addproductdata.php" method="POST">
<div class="form-group">
<label class="col-md-3 control-label">Purchase ID</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="pid" class="form-control">
    <option value="<?php echo $row['pid']?>"><?php echo $row['pid']?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Catagory ID</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="catid" class="form-control">
    <option value="<?php echo $row['catid']?>"><?php echo $row['catid']?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Model ID</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="mid" class="form-control">
    <option value="<?php echo $row['mid']?>"><?php echo $row['mid']?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Purchase Date</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="pdate" class="form-control">
    <option value="<?php echo $row['pdate']?>"><?php echo $row['pdate']?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Purchase Value</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="pvalue" class="form-control">
    <option value="<?php echo $row['prate']?>"><?php echo $row['prate']?></option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Sold Value</label>
<div class="col-md-9">
<select data-placeholder="Chose a Catagory" name="svalue" class="form-control">
    <option value="<?php echo $row['srate']?>"><?php echo $row['srate']?></option>
</select>
</div>
</div>


        <?php 
           $count=$row['quanity'];
           for ($i=0; $i <$count; $i++) { 
        ?>
        <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Product Number<?php echo $i+1;?></label>
        <div class="col-md-9">
        <input type="text" id="Cust-name" name="productno[]" class="form-control" placeholder="Scan Product No" autofocus="autofocus">
        </div>
        </div>
        <?php }?>
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>                               
    <?php $count++; }?>
    <?php } ?>
    </div>
 <!--Main Below Part END-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>