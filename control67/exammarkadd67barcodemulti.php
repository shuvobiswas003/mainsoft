<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
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
<h3 class="panel-title">Make Payment</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                    <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subcode" required="1" id="country">
                    <option value="">Select Subject</option>
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
            <input type="submit" class="btn btn-primary" Value="Select Lesson ">
        </form>
    </div>
 <!--1st Form End-->
 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
?>
<form action="markadd67barcode_many.php" method="POST" target="_blank">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                        <option value="<?php echo $examid;?>"><?php echo $examid;?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                        <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Subcode</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
                        <option value="<?php echo $subcode?>"><?php echo $subcode?></option>
                        </select>
                    </div>
                </div>
    <table class="table table-striped table-bordered" id="multiSlip">
    <input type="button" value="Select All" onclick="selectAll()" class="btn btn-primary">      
    <INPUT type="button" value="Delete" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
    <?php
    $count=1;
    $sel_query2="SELECT * FROM lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' ORDER BY chapterno ASC,lno ASC";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    ?>
    <tr>
        <td><INPUT type="checkbox" name="chk" value="<?php echo $row2['id']?>"class="form-control"/></td>
          <td><?php echo $count;?></td>
          <td><?php echo $classnumber.".".$row2['chapterno'].".".$row2['lno'];?></td>
        <td>
            <SELECT name="chapterno[]" class="form-control">
                <option value="<?php echo $row2['chapterno']?>">
                    <?php echo $row2['chaptername']?>
                </option>
            </SELECT>
        </td>
        <td>
            <SELECT name="lessonno[]" class="form-control">
                <option value="<?php echo $row2['lno']?>">
                    <?php echo $row2['lname']?>
                </option>
            </SELECT>
        </td>
    </tr>
    <?php $count++; }?>
    </table>
<br><br><br>
<input type="submit" name="" value="Start Entry" class="btn btn-primary">
</form>
</div>
        </div>
</form>                               
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