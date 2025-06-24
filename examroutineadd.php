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
<h3 class="panel-title">Add Examdate on Subject</h3>
</div>
<!--main Part Avove Start-->
    <?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];
    ?>
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

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
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="exid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" Value="Get List">
        </form>
    </div>
 <!--main Part Avove END-->

 <!--Main Below Part Start-->
 <!--Data Table Start-->
 <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    $exid =$_POST['exid'];
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Add Subject</h3>
    </div>
<div class="panel-body">
    <form action="examroutineindata.php" method="POST">
        
       <table class="table table-striped table-bordered" id="multiSlip">
    <input type="button" value="Select All" onclick="selectAll()" class="btn btn-primary">
    <INPUT type="button" value="Remove" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Exam ID</td>
                    <td>Class</td>
                    <td>Group</td>
                    <td>Subject Code</td>
                    <td>Subject Name</td>
                    <td>Exam Date</td>
                    <td>Exam Time</td>
                    <td>Align</td>
                    <td>Exam Status</td>
                </tr>
            </thead>
        <tbody>
        <?php
        require "interdb.php";
        $count=1;
        $sel_query="Select * from subject where classnumber='$classnumber' AND secgroup='$secgroupname';";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><INPUT type="checkbox" name="chk" value="<?php echo $row2['id']?>"class="form-control"/></td>
                <td>
                    <select name="exid[]" id="" class="form-control">
                        <option value="<?php echo $exid;?>"><?php echo $exid;?></option>
                    </select>
                </td>
                <td>
                    <select name="classnumber[]" id="" class="form-control">
                        <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                    </select>
                </td>
                <td>
                    <select name="secgroupname[]" id="" class="form-control">
                        <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </td>
                <td>
                    <select name="subcode[]" id="" class="form-control">
                        <option value="<?php echo $row['subcode'];?>"><?php echo $row['subcode'];?></option>
                    </select>
                </td>
                <td>
                    <select name="subname[]" id="" class="form-control">
                        <option value="<?php echo $row['subname'];?>"><?php echo $row['subname'];?></option>
                    </select>
                </td>
                <td>
                   <input type="date" name="exdate[]" class="form-control" 
<?php
$examuniid = $exid . $classnumber . $row['subcode'] . $secgroupname;
$count2 = 1;
$sel_query2 = "SELECT * FROM examroutine WHERE exid='$exid' AND class='$classnumber' AND subcode='" . $row['subcode'] . "'";
$result2 = mysqli_query($link, $sel_query2);

while ($row2 = mysqli_fetch_assoc($result2)) {
    $des = $row2['examdate'];
    ?>
    value="<?php echo !empty($des) ? $des : '0'; ?>"
    <?php
    $count2++;
}
?>
                    >
                </td>
                <td>
                    <input type="text" name="extime[]" class="form-control" 
<?php
$examuniid = $exid . $classnumber . $row['subcode'] . $secgroupname;
$count2 = 1;
$sel_query2 = "SELECT * FROM examroutine WHERE exid='$exid' AND class='$classnumber' AND subcode='" . $row['subcode'] . "'";
$result2 = mysqli_query($link, $sel_query2);

while ($row2 = mysqli_fetch_assoc($result2)) {
    $des = $row2['examtime'];
    ?>
    value="<?php echo !empty($des) ? $des : '0'; ?>"
    <?php
    $count2++;
}
?>
                    >
                </td>
                <td>
                    <select name="align[]" id="" class="form-control">
<?php
$examuniid=$exid.$classnumber.$row['subcode'].$secgroupname;
$count2=1;
$sel_query2 = "SELECT * FROM examroutine WHERE exid='$exid' AND class='$classnumber' AND subcode='" . $row['subcode'] . "'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['align'];
$align;
if(!empty($des)){
if($des=='l'){
    $align="Left (Defult)";
}else{
    $align="Right (Defult)";
}
    ?>
    <option value="<?php echo $des;?>"><?php echo $align;?></option>
<?php
}
$count1++; }
?>
                        <option value="l">Left</option>
                        <option value="r">Right</option>
                    </select>
                </td>
                <td>
                    <select name="active[]" id="" class="form-control">
                        <option value="1">Taken</option>
                        <option value="0">Not Taken</option>
                    </select>
                </td>
            </tr>
        <?php $count++;}?>
        </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Add Routine" class="btn btn-primary">
            </div>
        </div>
    </form>
        
</div>
<?php }?>
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