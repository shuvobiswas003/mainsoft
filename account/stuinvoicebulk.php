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


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Student </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

<!--Custom Form-->
<form action="addpaymetdata.php" method="POST">
    <table  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Select Student</th>
                <th>Student ID</th>
                <th>Roll</th>
                <th>Name</th>
            </tr>
        </thead>

                     
    <tbody>
    <?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];
    require "../interdb.php";
    $count=1;
    $sel_query="Select * from student where classnumber=$classnumber AND secgroup='$secgroupname';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {?>
    <tr>
        <td><input type="checkbox" class="form-control" name="stuselect[]"></td>
        <td>
            <select name="stuid[]" id="" class="form-control">
                <option value="<?php echo $row["uniqid"]; ?>">
                    <?php echo $row["uniqid"]; ?>
                </option>
            </select>
        </td>
        <td>
            <select name="sturoll[]" id="" class="form-control">
                <option value="<?php echo $row["roll"]; ?>">
                    <?php echo $row["roll"]; ?>
                </option>
            </select>
        </td>
        <td>
            <select name="stuname[]" id="" class="form-control">
                <option value="<?php echo $row["name"]; ?>">
                    <?php echo $row["name"]; ?>
                </option>
            </select>
        </td>
</tr>
<?php $count++; } ?>                  


</tbody>
</table>
<input type="submit" value="Add Payment" class="btn btn-primary">
</form>
<!--Custom Form End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>