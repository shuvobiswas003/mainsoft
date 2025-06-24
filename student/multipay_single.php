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

<div class="panel-body">
<center>
    <h1 style="color: red;">
        যে রশিদের টাকাগুলো জমা হবে সেই রশিদ গুলো টেবিলের মধ্যে রাখতে হবে বাকিগুলো বাম পাশের টিক চিহ্ন দিয়ে রিমুভ বাটনে ক্লিক করে মুছে দিতে হবে
    </h1>
</center>
<?php

$uniqid=$_REQUEST['stuid'];;

?>
<form action="multipayment.php" method="POST" target="_blank">
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

<input type="submit" name="" value="Pay Now" class="btn btn-primary">

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