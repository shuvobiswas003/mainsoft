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
<h3 class="panel-title">Assign RFID Card</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                
                <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="secgroupname" required="1">
                
                <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Student Roll </label>
            <div class="col-md-9">
                <input type="number" id="Cust-name" name="roll" class="form-control" placeholder="Write Student roll" required="1" autofocus="autofocus">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Scan RFID CARD </label>
            <div class="col-md-9">
                <input type="number" id="Cust-name" name="rfid" class="form-control" placeholder="Punch The Card to Reader" required="1">
            </div>
        </div>
            
            <input type="submit" class="btn btn-primary" Value="Assign Card">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$rfid=$_POST['rfid'];
$squniqid=$classnumber.$secgroupname.$roll;

require "../interdb.php";
$sql = "SELECT * FROM student WHERE uniqid='$squniqid'";
$result = $link->query($sql);

// Check if any row was returned
if ($result->num_rows > 0) {
  require '../interdb.php';
$sql="INSERT into rfid(stuid,rfid) VALUES ('$squniqid','$rfid') ON DUPLICATE KEY UPDATE stuid='$squniqid',rfid='$rfid'";
if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Rfid Asign Successfuly </h1>.";
    } else{
       echo "<h3 style='color:red;'>RFID CARD Already Exists</h1>";
    } 

    $quary2="SELECT * FROM student WHERE uniqid='$squniqid'";
    $result2 = mysqli_query($link,$quary2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    echo "<h3 style='color:green;'>".$row2['name']."</h1>.";
        }


} else {
  echo "<h3 style='color:red;'>No Student Found</h3>";
}


                    
} ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>