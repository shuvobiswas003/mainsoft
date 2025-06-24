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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Attdance View</h3>
            </div>
            <div class="panel-body">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from class ORDER BY classnumber ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Start Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="startdate" class="form-control" placeholder="Enter Class Name" required="1">
                    </div>
                </div>

                
                
                
                <input type="submit" class="btn btn-primary" Value="View Attdance">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Attdance</h3>
    </div>
<div class="panel-body">
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $classnumber=$_POST['classnumber'];
        $startdate=$_POST['startdate'];
        $sdate=date( "Y-m-d", strtotime($startdate));
        
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Student ID</th>
                        <th>RFID CARD</th>
                        <th>Class</th>
                        <th>Student Name</th>
                        <th>Group</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from student where classnumber='$classnumber' ORDER BY roll ASC";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td>
                                	<?php echo $row['uniqid']?>
                                </td>
                <td>
                <?php
                    $uniqid=$row['uniqid'];
                    $count2=1;
                    $sel_query2="Select * from rfid where stuid='$uniqid'";
                    $result2 = mysqli_query($link,$sel_query2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <?php echo $row2['rfid'];?>
                <?php $count2++; } ?>
                </td>
                                <td><?php echo $row['classnumber']?></td>
                                <td>
                                    <?php echo $row['name']?>
                                </td>
                                <td><?php echo $row['secgroup']?></td>

                                <td></td>
                                
<!--Present Part Start-->
<th>
<?php
date_default_timezone_set('Asia/Dhaka');
$uniqid=$row['uniqid'];
$todayatt = date("Ymd");
$uniqattid =$uniqid.$todayatt;
$count2=1;
$sel_query2="SELECT * from stuattdancedata where uniqattid ='$uniqattid'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$status=$row2['status'];
$color;
switch ($status) {
    case 'Present':
        $color="green";
        break;
    
    default:
        $color="red";
        break;
}

echo "<span style='color:".$color."'>".$status."</span>";
$count1++; }

?>                    
</td>
<!--Present Part END-->


                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
        </div>
    </div>
<?php }?>
</div>
</div>
</div>
</div>

<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>