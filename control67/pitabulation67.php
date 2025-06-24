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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">PI Tabulation</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        ?>
        <form action="printtabulation67.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" target="_blank">
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Exam ID</label>
                    <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from exam67 where exid='$examid';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?>
                    </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" Value="Print Tabulation">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->

 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>s