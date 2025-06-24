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
<h3 class="panel-title">View Subject data</h3>
</div>
<!--main Part Avove Start-->
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <?php
            $classnumber=$_REQUEST['classnumber'];
            $secgroupname=$_REQUEST['secgroupname'];
            ?>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="classnumber" required="1">
                    <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option> 
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Group</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="secgroupname" required="1">
                    <
                    <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                    </select>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="View Teacher">
        </form>
    </div>
 <!--main Part Avove END-->

 <!--Main Below Part Start-->
 <!--Data Table Start-->
 <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Subject Teacher</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Section/Group</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Teacher ID</th>
                        <th>Subject Teacher</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from subjectteacher where classnumber='$classnumber' AND secgroup='$secgroupname';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $classnumber; ?></td>
                                <td><?php echo $secgroupname; ?></td>
                                <td>
<?php
$subcode=$row['subcode'];
$sel_query2="Select * from subject where subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
echo $row2['subname'];
}
?>
                                </td>
<td><?php echo $row["subcode"]; ?></td>
<td><?php echo $row["tid"]; ?></td>
<td>

   <?php
$tid=$row['tid'];
$sel_query2="Select * from teacherlogin where id='$tid';";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
echo $row2['name'];
}
?>
        
</td>
                               
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
        <?php }?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--Data table END-->
 <!--Main Below Part END-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>