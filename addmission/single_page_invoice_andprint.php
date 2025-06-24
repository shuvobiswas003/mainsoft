<?php
date_default_timezone_set('Asia/Dhaka');
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
<h3 class="panel-title">Exam Mark Entry</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Enter Date</label>
                <div class="col-md-9">
                    <input type="date" name="date" class="form-control" required="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Scan/Write Card Number:</label>
                <div class="col-md-9">
                    <input type="number" name="card_no" class="form-control" required="1" autofocus="1">
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $card_no = $_POST['card_no'];
    $date= $_POST['date'];
    $date=date("Y-m-d", strtotime($date));
// Fetch student details based on card number
    $sel_query2 = "SELECT * FROM rfid WHERE rfid='$card_no'";
    $result2 = mysqli_query($link, $sel_query2);
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $uniqid = $row2['stuid'];
    }

$classnumber = '';
$secgroupname = '';
$roll = '';
$sel_query3 = "SELECT * FROM student WHERE uniqid='$uniqid';";
    $result3 = mysqli_query($link, $sel_query3);
    if ($row3 = mysqli_fetch_assoc($result3)) {
        $classnumber = $row3['classnumber'];
        $secgroupname = $row3['secgroup'];
        $roll = $row3['roll'];}
$r_stuid=$classnumber.$secgroupname.$roll;
?>
<form action="addinvoicedata_single_payment.php" method="POST" target="_blank">
    
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
        <label class="col-md-3 control-label" for="Cust-name">Select Stuid</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="r_stuid" required="1">
            <option value="<?php echo $r_stuid;?>"><?php echo $r_stuid;?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Date</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="pdate" required="1">
            <option value="<?php echo $date;?>"><?php echo $date;?></option>
            </select>
        </div>
    </div>

    <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Enter Receiving Amount</label>
                <div class="col-md-9">
                    <input type="number" name="receive_amount" class="form-control" required="1" value="">
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
        <table class="table table-striped table-bordered" id="multiSlip">
            <thead>
                    <tr>
                        <th>Select</th>
                        <th>Payment ID</th>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Description</th>
                        <th>Total</th>
                    </tr>
                </thead>

    <input type="button" value="Select All" onclick="selectAll()" class="btn btn-primary">

    <INPUT type="button" value="Remove" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
                


                <tbody>
                    <?php
                    $count=1;
                    $sel_query="SELECT * FROM paycat WHERE amount IS NOT NULL ORDER BY id;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><INPUT type="checkbox" name="chk" value="<?php echo $row2['id']?>"class="form-control"/></td>
                        <td>
            <select class="form-control" data-placeholder="Select Class" name="payid[]" required="1">
            <option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
            </select>
                        </td>

                        <td>
                        <select name="roll[]" id="" class="form-control">
                            <option value="<?php echo $roll;?>"><?php echo $roll;?></option>
                        </select>
                        </td>
                        <td>
                        <?php
                        $roll=$roll;
                        $stuuniqid=$classnumber.$secgroupname.$roll;
                        $count1=1;
                        $sel_query1="SELECT * from student where uniqid='$stuuniqid'";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                        <select name="name[]" id="" class="form-control">
                            <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
                        </select>
                       
                        </td>
                        <td>
                        <select name="suniqid[]" id="" class="form-control">
                            <option value="<?php echo $row1['uniqid'];?>"><?php echo $row1['uniqid'];?></option>
                        </select>
                        </td>

                         <?php $count1++; }?>
<td>
<textarea name="des[]" class="form-control"  required="1" cols="40">
<?php echo $row['pcatname'];?>
</textarea>
</td>
                        <td>
                            <input type="total" name="total[]" class="form-control" required="1"  autofocus='autofocus' value="<?php echo $row['amount'];?>">
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