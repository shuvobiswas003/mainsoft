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
<h3 class="panel-title">Add  on Subject</h3>
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
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Add Subject Teacher</h3>
    </div>
<div class="panel-body"> 
    <form action="insert_sub_teacher_add_data.php" method="POST" target="_blank">
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Class</td>
                    <td>Group</td>
                    <td>Subject Code</td>
                    <td>Subject Name</td>
                    <td>Teacher</td>
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
<?php
// Include config file and connect to the database
require_once "interdb.php";

// Fetch data from the teacherlogin table to get all teacher IDs
$teacherIDs = array();
$sql5 = "SELECT id FROM teacherlogin";
$result5 = mysqli_query($link, $sql5);
while ($row5 = mysqli_fetch_assoc($result5)) {
    $teacherIDs[] = $row5['id'];
}
$subcode=$row['subcode'];

$sql6 = "SELECT tid FROM subjectteacher WHERE classnumber = $classnumber AND secgroup = '$secgroupname' AND subcode = '$subcode'";
$result6 = mysqli_query($link, $sql6);

// Check if a row is returned before fetching data
if ($result6 && mysqli_num_rows($result6) > 0) {
    $row6 = mysqli_fetch_assoc($result6);
    $assignedTeacherID = $row6['tid'];
} else {
    // Assign a default value when no teacher is assigned
    $assignedTeacherID = '';
}


?>

<select name="teacher[]" class="form-control">
    <?php
    // If a teacher is assigned, show that teacher's ID as the default option
    $defaultTeacherID = $assignedTeacherID ?? ''; // Use null coalescing operator to provide a default value
    if ($defaultTeacherID && in_array($defaultTeacherID, $teacherIDs)) {
        $sql10 = "SELECT name FROM teacherlogin WHERE id = $defaultTeacherID";
            $result10 = mysqli_query($link, $sql10);
            $row10 = mysqli_fetch_assoc($result10);
            $teacherName = $row10['name'];
        echo '<option value="' . $defaultTeacherID . '">' . $defaultTeacherID . ' - ' . $teacherName . '</option>';
    }
    ?>
    
    <option value="" disabled>--- Other Teacher IDs ---</option>
    
    <?php
    // Show other teacher IDs as additional options
    foreach ($teacherIDs as $teacherID) {
        if ($teacherID !== $defaultTeacherID) {
            $sql10 = "SELECT name FROM teacherlogin WHERE id = $teacherID";
            $result10 = mysqli_query($link, $sql10);
            $row10 = mysqli_fetch_assoc($result10);
            $teacherName = $row10['name'];
            echo '<option value="' . $teacherID . '">' . $teacherID . ' - ' . $teacherName . '</option>';
        }
    }
    ?>
</select>

                </td>
            </tr>
        <?php $count++;}?>
        </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="submit" value="Add Teacher" class="btn btn-primary">
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