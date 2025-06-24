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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Bulk Payment</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            

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
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Payment Heading</label>

                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="paycat" required="1">
                        <option value="">Select Payment Heading</option>
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from paycat;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['pcatname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>

            
            
            <input type="submit" class="btn btn-primary" Value="Genarate Invoice">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];

$paycat=$_POST['paycat'];

?>
<form action="bulk_student_payment_data.php" method="POST">
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
            <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
            <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Payment ID</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="payid" required="1">
            <option value="<?php echo $paycat;?>"><?php echo $paycat;?></option>
            </select>
        </div>
    </div>
    

    <br>
    
   
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <center>
        <h3>Invoice Information</h3>
        </center>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Total</th>
                        <th>Previous Pay</th>
                        <th>Previous Due</th>
                        <th>New Pay</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    $count=1;
    $sel_query="SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll";
    $result = mysqli_query($link, $sel_query);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td>
            <select name="roll[]" id="" class="form-control">
                <option value="<?php echo $row['roll'];?>"><?php echo $row['roll'];?></option>
            </select>
        </td>
        <td>
            <?php
            $roll = $row['roll'];
            $stuuniqid = $classnumber . $secgroupname . $roll;
            $count1 = 1;
            $sel_query1 = "SELECT * from student where uniqid='$stuuniqid'";
            $result1 = mysqli_query($link, $sel_query1);
            while($row1 = mysqli_fetch_assoc($result1)) {
            ?>
            <select name="name[]" id="" class="form-control">
                <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
            </select>
            <?php $count1++; } ?>
        </td>
        <td>
            <select name="suniqid[]" id="" class="form-control">
                <option value="<?php echo $row['uniqid'];?>"><?php echo $row['uniqid'];?></option>
            </select>
        </td>
        <td>
            <input type="date" name="paydate[]" class="form-control" required="1" value="<?php echo date('Y-m-d')?>">
        </td>
        <td>
            <textarea name="des[]" class="form-control" required="1" cols="40"><?php
            $puniid = $paycat . $row['uniqid'];
            require "../interdb.php";
            $sql7 = "SELECT * from studentpayment where puniid='$puniid'";
            $result9 = $link->query($sql7);
            if ($result9->num_rows > 0) {
                while ($row9 = $result9->fetch_assoc()) {
                    echo $row9['des'];
                }
            }
            ?></textarea>
        </td>
        <td>
            <select name="total[]" id="" class="form-control" style="width: 90px;">
            <?php
            $puniid = $paycat . $row['uniqid'];
            require "../interdb.php";
            $sql8 = "SELECT * from studentpayment where puniid='$puniid'";
            $result10 = $link->query($sql8);
            if ($result10->num_rows > 0) {
                while ($row10 = $result10->fetch_assoc()) {
            ?>
                <option value="<?php echo $row10['total']?>"><?php echo $row10['total']?></option>
            <?php
                }
            }
            ?>
            </select>
        </td>
        <td>
            <select name="prev_pay[]" id="" class="form-control" style="width: 90px;">
            <?php
            $puniid = $paycat . $row['uniqid'];
            require "../interdb.php";
            $sql8 = "SELECT * from studentpayment where puniid='$puniid'";
            $result10 = $link->query($sql8);
            if ($result10->num_rows > 0) {
                while ($row10 = $result10->fetch_assoc()) {
            ?>
                <option value="<?php echo $row10['totalpay']?>"><?php echo $row10['totalpay']?></option>
            <?php
                }
            }
            ?>
            </select>
        </td>
        <td>
            <select name="prev_due[]" id="" class="form-control" style="width: 90px;">
            <?php
            $puniid = $paycat . $row['uniqid'];
            require "../interdb.php";
            $sql8 = "SELECT * from studentpayment where puniid='$puniid'";
            $result10 = $link->query($sql8);
            if ($result10->num_rows > 0) {
                while ($row10 = $result10->fetch_assoc()) {
                    $prev_due = $row10['due'];
            ?>
                <option value="<?php echo $prev_due?>"><?php echo $prev_due?></option>
            <?php
                }
            }
            ?>
            </select>
        </td>
        <td>
            <input type="number" name="new_pay[]" class="form-control" style="width: 90px" required="1" autofocus="autofocus" min="0" value="0">
        </td>
    </tr>
    <?php $count++; } ?>
</tbody>


                
            </table>
    </div>
</div>


    <input type="submit" value="Make Pay Slip" class="btn btn-primary">
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
<?php include'inc/footer.php'?>s