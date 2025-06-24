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
<h3 class="panel-title">Make Payment</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Enter/Scan Card</label>
                    <div class="col-md-9">
                        <input type="number" name="card_no" value="Get Details" class="form-control">
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
$card_no=$_POST['card_no'];
$classnumber="";
$sectiongroup="";
$roll="";
$uniqid="";

$sel_query2="Select * from rfid Where rfid='$card_no'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
    $uniqid=$row2['stuid'];
}
?>

<div class="col-md-12">
    <?php  
    require "../interdb.php";
    $count=1;
    $sel_query="Select * from student where uniqid='$uniqid';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <center>
                <h2>Student Information</h2>
                <!--Image Part Start-->
            
           <!--Img Start-->
           <?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg?<?php echo time();?>" style="height: 130px;">
            <?php
            }else{
            ?>
            <img src="../img/student/<?php echo $row['imgname'];?>?<?php echo time();?>" style="height: 130px;">
            

            <?php
            }
            ?>
            <!--Img End-->
            <br>
                
                <h4>
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
        </div>
        <?php $count++;} ?>
</div>

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
                <a href="../studentpayment/studentpaytrx.php?iid=<?php echo $row['puniid'];?>" target="_blank">
                <button class="btn btn-primary">View TRX</button>
                </a>

            </td>
        </tr>
        <?php $count++; } ?>
    </tbody>
</table>
        
                    

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