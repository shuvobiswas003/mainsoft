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
<?php
if (isset($_POST['date'])) {
    $date=$_POST['date'];
}else{
   $date=date('Y-m-d'); 
}
?>


<!--1st Form Start-->
    <div class="panel-body">
        <a href="takepaymentbarcodefullqr.php"><button class="btn btn-primary">Take Payment (Mobile Qr CODE Scanner)</button></a><br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Student ID</label>
                    <div class="col-md-9">
                        <input type="text" name="stu_id" placeholder="Student ID" autofocus="autofocus" class="form-control" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Date</label>
                    <div class="col-md-9">
                        <input type="Date" name="date" placeholder="Scan Barcode" value="<?php echo $date;?>" class="form-control">
                    </div>
                </div>
            
            <input type="submit" class="btn btn-primary" Value="Take Payment">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$student_id=$_POST['stu_id'];
$date=$_POST['date'];

?>
<div class="col-md-3"></div>
<div class="col-md-6">

<table class="table table-striped table-bordered">

    <tbody>

       <?php
require "../interdb.php";
$sel_query3 = "SELECT * FROM student WHERE uniqid= '$student_id'";
$result3 = mysqli_query($link, $sel_query3);
while ($row3 = mysqli_fetch_assoc($result3)) {
?>
<tr>
    <td colspan="2">
        <!--Img Start-->
        <?php
        $imgsl = $row3["imgname"];
        if ($imgsl == "IMG_0.png" OR $imgsl = "") {
        ?>
            <img src="../img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" style="height: 130px;">
        <?php
        } else {
        ?>
            <img src="../img/student/<?php echo $row3['imgname']; ?>" style="height: 130px;">
        <?php
        }
        ?>
        <!--Img End-->
    </td>
</tr>
<tr>
    <td>Name:</td>
    <td><?php echo $row3['name']; ?></td>
</tr>
<tr>
    <td>Class:</td>
    <td><?php echo $row3['classnumber']; ?></td>
</tr>
<tr>
    <td>Section/Group:</td>
    <td><?php echo $row3['secgroup']; ?></td>
</tr>
<?php
}
?>

</tbody>

<tbody style="margin-top:20px;">

        <?php
            require "../interdb.php";
            $due;
            $prevpaytk;
            $count=1;
            $sel_query = "SELECT sp.* FROM studentpayment sp INNER JOIN inviceid ii ON sp.id = ii.invoice_id WHERE sp.stuid = '$student_id' AND ii.status='Unpaid'";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td>Invoice_ ID</td>
            <th><?php echo $row['id'];?></th>
        </tr>
        <tr>
            <td>Description:</td>
            <th>
                <?php 
		    $pcatid= $row['pcatid'];
		    $sel_query10="SELECT * FROM paycat WHERE id='$pcatid' ";
        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $lettergrade=$row10['pcatname'];
        }
		    ?>
                
            </th>
        </tr>
        <tr>
            <td>Total Amount: </td>
            <th><?php echo $row['total'];?></th>
        </tr>
        <tr>
            <td>Total Paid: </td>
            <th><?php echo $row['totalpay'];?></th>
        </tr>
        <tr>
            <td>Total DUE: </td>
            <th style="color: red;"><?php echo $row['due'];?></th>
        </tr>
        <tr>
            <td colspan="2">
<?php
    $iid=$row['id'];
    $prevpaytk=$row['totalpay'];
    $due=$row['due'];
    $totalpay_tk=$row['total'];
    $sql5="UPDATE studentpayment SET totalpay='$totalpay_tk',due='0',status='Paid' where id='$iid'";
    if(mysqli_query($link, $sql5)){
    echo "<h2 style='color:green'>Amount:".$due." Received Successfully<h2>";
    
    $sql9="UPDATE inviceid SET status='Paid' where invoice_id='$iid'";
    if(mysqli_query($link, $sql9)){
        echo "Slip Paid";
    }

    }
    if($due<=0){
        echo "<h1>No Payment Due</h1>";
    }else{
    $invoice_id=$row['puniid'];
       //invoice trxid
    $sql6 ="INSERT INTO invoicetrx(iid,amount,date) VALUES ('$invoice_id','$due','$date')";
    if(mysqli_query($link, $sql6)){
        echo "<h3 style='color:green;'>Trxid  Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    } 
    }
    
?>

            </td>
        </tr>
        <?php $count++; } ?>

    </tbody>
</table>
</div>
        
                    

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