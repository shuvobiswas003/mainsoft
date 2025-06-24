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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Subject</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Payment</h3>
            </div>
            <div class="panel-body">
<?php
$id=$_REQUEST['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $payamount=$_POST['payamount'];
    $duec=$_POST['due'];
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
    $sel_query1="Select * from studentpayment where id='$id';";
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
    $sql="UPDATE studentpayment SET totalpay='$totalpayn',due='$duec',status='$statusn' where id='$id'";
    if(mysqli_query($link, $sql)){
    echo "<h2 style='color:green'>Payment Received Successfully<h2>";

    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    //invoice trxid
    $date = date('Y-m-d');
    $sql ="INSERT INTO invoicetrx(iid,amount,date) VALUES ('$iid','$payamount','$date')";
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Trxid  Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }

    //getting student information
    $name;
    $mobile;
    $sel_query2="Select * from student where uniqid='$stuid';";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $name=$row2['name'];
        $mobile=$row2['mobile'];
    }

    //getting School short code.
    $shortcode;
    $sel_query3="Select * from schoolinfo";
    $result3 = mysqli_query($link,$sel_query3);
    while($row3 = mysqli_fetch_assoc($result3)) {
        $shortcode=$row3['shortcode'];
    }

    //SEND SMS
    $text="Hello ".$name."Your Cash Amount ".$payamount." is received. Due amount".$duec."Thanks By".$shortcode." Powered By Black Code IT";
    
    $url = "http://66.45.237.70/api.php";
        $data= array(
        'username'=>"01783808373",
        'password'=>"@Shuvo001",
        'number'=>"$mobile",
        'message'=>"$text"
        );
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

    }
    
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

        <?php
            require "../interdb.php";
            $count=1;
            $sel_query="Select * from studentpayment where id='$id';";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
        ?>

              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select ID</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="id" required="1">
                        
                        <option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Total Amount</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                        
                        <option value="<?php echo $row['total'];?>"><?php echo $row['total'];?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Due</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="due" required="1">
            <option value="<?php 
            $total=$row['total'];
            $totalpay=$row['totalpay'];
            $due=$total-$totalpay;
            echo $due;
            ?>">
            <?php 
            $total=$row['total'];
            $totalpay=$row['totalpay'];
            $due=$total-$totalpay;
            echo $due;
            ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Pay Amount</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="payamount" class="form-control" placeholder="Payment Amount" required="1" autofocus="autofocus">
                    </div>
                </div>
                
        <?php $count++; } ?>       
                <input type="submit" class="btn btn-primary" Value="Add Payment">

            </form>
            <br>
            <br>



        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>