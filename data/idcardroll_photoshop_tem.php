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
<h3 class="panel-title">Exam Mark Entry</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">BRIS BD PDF TEXT</label>
                <div class="col-md-9">
                    <textarea name="studentsroll" id="" cols="30" rows="10" class="form-control" required="1"></textarea>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Data">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$studentsroll=$_POST['studentsroll'];
?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Class</th>
            <th>Sec/Group</th>
            <th>Roll</th>
            <th>Name</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $rolln=explode(",", $studentsroll);
    for ($i = 0; $i < count($rolln); $i++) {
        $newroll =$rolln[$i];
    ?>
    <?php
        require "../interdb.php";
        $sel_query="Select * from student where classnumber=$classnumber AND roll=$newroll;";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row["classnumber"]; ?></td>
            <td><?php echo $row["secgroup"]; ?></td>
            <td><?php echo $row["roll"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["imgname"]; ?></td>
        </tr>
    <?php } ?>
    <?php
    }
    ?>
    </tbody>
    
</table>

              
<?php 
} 
?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>