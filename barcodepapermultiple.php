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
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        $examid=$_REQUEST['examid'];
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name"> Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    
                    <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Section /Group</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Exam Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam where exid='$examid';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $examid;?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Subect Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                        <?php
                        require "interdb.php";
                        $tdate=2021-12-23;
                        $count=1;
                        $sel_query="Select * from examroutine where exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname' AND examdate='2021-12-23';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Subect Code</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                        <?php
                        require "interdb.php";
                        $tdate=2021-12-23;
                        $count=1;
                        $sel_query="Select * from examroutine where exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname' AND examdate='2021-12-23';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subcode']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
            
            <input type="submit" class="btn btn-primary" Value="Get List">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$pid=$_POST['pid'];
require 'interdb.php';
$count=1;
$sel_query="";
$result = mysqli_query($link,$sel_query);
 while($row = mysqli_fetch_assoc($result)) {

?>
<form action="addproductdata.php" method="POST">







        
    <input type="submit" value="Add Product" class="btn btn-primary">
</form>                               
    <?php $count++; }?>
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>