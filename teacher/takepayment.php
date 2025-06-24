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
        $classnumber=$_REQUEST['classnumber'];
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
                    <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="sectiongroup" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from sectiongroup where classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Enter Roll</label>
                    <div class="col-md-9">
                        <input type="number" name="roll" value="Get Details" class="form-control">
                    </div>
                </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Details">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$sectiongroup=$_POST['sectiongroup'];
$roll=$_POST['roll'];
$uniqid=$classnumber.$sectiongroup.$roll;

?>

<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Payment Heading</th>
        <th>Total Amount</th>
        <th>Total Pay</th>
        <th>Due</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
            require "../interdb.php";
            $count=1;
            $sel_query="Select * from studentpayment where stuid='$uniqid';";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td>
                <?php 
                    $stuid=$row['stuid'];
                    $stuname;
                    $sel_query1="Select * from student where uniqid='$stuid';";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $stuname=$row1['name'];
                    }
                ?>
                <?php echo $stuname;?>
            </td>
            <td>
                <?php 
                    $pid=$row['pcatid'];
                    $payheadname;
                    $sel_query1="Select * from paycat where id='$pid';";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                        $payheadname=$row1['pcatname'];
                    }
                ?>
                <?php echo $payheadname;?>
            </td>
            <td><?php echo $row['total'];?></td>
            <td><?php echo $row['totalpay'];?></td>
            <td><span style="color: red;"><?php 
            $total=$row['total'];
            $totalpay=$row['totalpay'];
            $due=$total-$totalpay;
            echo $due;
            ?></span></td>
            <td>
                <?php $status= $row['status'];
                if($status=="Unpaid"){
                    echo "<span style='color:red;'>Unpaid</span>";
                }else{
                    echo "<span style='color:green;'>Paid</span>";
                }
                ?>
            </td>
            <td>
                <?php
                $status=$row['status'];
                if ($status=='Unpaid') {
                ?>
                <a href="payinvoice.php?id=<?php echo $row['id'];?>" target="_blank">
                <button class="btn btn-primary">Pay Now</button>
                </a>
                <?php
                }
                ?>
                <a href="../studentpayment/studentpayinvoice.php?id=<?php echo $row['id'];?>&stuid=<?php echo $row['stuid'];?>" target="_blank">
                <button class="btn btn-primary">Print Slip</button>
                </a>

            </td>
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>
        
                    

</div>
                
        </div>





        
<input type="submit" value="Add Product" class="btn btn-primary">
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