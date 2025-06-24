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


 <!--2nd Form Part Start-->
<div class="panel-body">
<?php

require "../interdb.php";

$uniqid=$_REQUEST['stuid'];

?>

<div class="col-md-12">
    <table class="table">
        <tbody>

       <?php
require "../interdb.php";
$sel_query3 = "SELECT * FROM student WHERE uniqid= '$uniqid'";
$result3 = mysqli_query($link, $sel_query3);
while ($row3 = mysqli_fetch_assoc($result3)) {
?>
<tr>
    <td colspan="2">
        <center>
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
        </center>
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
    </table>
</div>
<br><br><br>
<form action="../studentpayment/multislipsingleprint.php" method="POST" target="_blank">
    <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">ইনভয়েস আইডি</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="invoice_id" required="1">
                            <?php
                            require "../interdb.php";
                            //getting last id from table
                            $sql15 = "SELECT MAX(id) AS latest_id FROM inviceid";
                            $result15 = mysqli_query($link, $sql15);
                            if ($result15) {
                                // Fetch the result as an associative array
                                $row15 = mysqli_fetch_assoc($result15);

                                // Retrieve the latest auto-incremented value
                                $latestID = $row15['latest_id'];
                            }

                            $invoice_id=$latestID+1;
                            ?>
                            <option value="<?php echo $invoice_id;?>"><?php echo $invoice_id;?></option>
                        </select>
                    </div>
                </div>
    
    
    
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Student ID</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="stuid" required="1">
                        <option value="<?php echo $uniqid?>"><?php echo $uniqid?></option>
                        </select>
                    </div>
                </div>

    <table class="table table-striped table-bordered" id="multiSlip">
    <input type="button" value="Select All" onclick="selectAll()" class="btn btn-primary">
    <INPUT type="button" value="Remove" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
    <?php
    $count=1;
    $sel_query2="SELECT * FROM studentpayment WHERE stuid='$uniqid' AND status='Unpaid'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    ?>
    <tr>
        <td><INPUT type="checkbox" name="chk" value="<?php echo $row2['id']?>"class="form-control"/></td>
        <td>
            <SELECT name="id[]" class="form-control">
                <option value="<?php echo $row2['id']?>">
                    <?php echo $row2['id']?>
                </option>
            </SELECT>
        </td>
        <td>
            <?php echo $row2['des']?>
        </td>
        <td><?php echo $row2['total']?></td>
    </tr>
    <?php $count++; }?>

    </table>

<br><br><br>

<input type="submit" name="" value="Print Slip" class="btn btn-primary">

</form>
        
                    

</div>
                
        </div>

</form>                               
    
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>