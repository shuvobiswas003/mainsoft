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
                    <label class="col-md-3 control-label" for="Cust-name">Scan Barcode</label>
                    <div class="col-md-9">
                        <input type="text" name="id" placeholder="Scan Barcode" autofocus="autofocus" class="form-control" required="1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Amount</label>
                    <div class="col-md-9">
                        <input type="text" name="payamount" placeholder="Enter Amount" autofocus="autofocus" class="form-control" required="1">
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
   $id=$_POST['id'];
    $payamount=$_POST['payamount'];
    $duec;
    $sel_query="Select * from studentpayment where puniid='$id';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
    $duec=$row['due'];   
    }
    if($payamount>$duec){
        echo "<h3><span style='color:red;'>Wrorg Entry... Pay amount is not getter than due amount</span></h3>";
    }else{
    //declear Variable
    $iid;
    $total;
    $totalpay;
    $statusn;
    $stuid;
    //getting data
    require "../interdb.php";
    $sel_query1="Select * from studentpayment where puniid='$id';";
    $result1 = mysqli_query($link,$sel_query1);
    while($row1 = mysqli_fetch_assoc($result1)) {
        $total=$row1['total'];
        $totalpay=$row1['totalpay'];
        $iid=$row1['puniid'];
        $stuid=$row1['stuid'];
    }

    //calculation
    $totalpayn=$totalpay+$payamount;
    $duec=$total-$totalpayn;
    switch ($duec) {
        case '0':
            $statusn="Paid";
            break;
        
        default:
            $statusn="Unpaid";
            break;
    }

    
    //update statemet
    $sql="UPDATE studentpayment SET totalpay='$totalpayn',due='$duec',status='$statusn' where puniid='$id'";
    if(mysqli_query($link, $sql)){
    echo "<h2 style='color:green'>Payment Received Successfully<h2>";

    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if($due<=0){
        echo "<h1>No Payment Due</h1>";
    }else{
       //invoice trxid
    $sql ="INSERT INTO invoicetrx(iid,amount,date) VALUES ('$iid','$due','$date')";
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Trxid  Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    } 
    }
    ?>
    <table class="table table-striped table-bordered">

    <tbody>
        <?php
            require "../interdb.php";
            $due;
            $prevpaytk;
            $count=1;
            $sel_query="Select * from studentpayment where puniid='$id';";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td>Name: </td>
            <td><?php echo $row['stuname'];?></td>
        </tr>
        <tr>
            <td>Class: </td>
            <td><?php echo $row['classnumber'];?></td>
        </tr>
        <tr>
            <td>Section: </td>
            <td><?php echo $row['secgroupname'];?></td>
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
        <?php $count++; } ?>

    </tbody>
</table>

    <?php
    }//ending for else for due amount                        
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