<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
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
                                <h4 class="pull-left page-title">Daily Balance Report</h4>
                            </div>
                        </div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Monthly expense Report</h3>
</div>
<div class="panel-body">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form">
<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name"> Select Start Date</label>
<div class="col-md-9">
<input type="date" id="Cust-name" name="date" class="form-control" placeholder="Enter Date" required="1">
</div>
</div>
<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name"> Select End Date</label>
<div class="col-md-9">
<input type="date" id="Cust-name" name="date2" class="form-control" placeholder="Enter Date" required="1">
</div>
</div>
<input type="submit" class="btn btn-primary" Value="Get Data">
</form>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$pdate=$_POST['date'];
$sdate=date("Y-m-d", strtotime($pdate));
$date2=$_POST['date2'];
$edate=date("Y-m-d", strtotime($date2));
?>
<br>
<br>
<br>
<form action="report/printmonthlyexpense.php" method="POST" target="_blank">
<div class="col-md-12">
<center>
<h1>expense Report</h1>
<h4>Date: <?php echo $sdate?> TO <?php echo $edate?></h4>
<select name="sdate" id="" class="form-control">
<option value="<?php echo $sdate?>"><?php echo $sdate?></option>
</select>
<select name="edate" id="" class="form-control">
<option value="<?php echo $edate?>"><?php echo $edate?></option>
</select>
</div>

<div class="col-md-12" style="margin-left: 20px; ">
<table class="table">
<thead>
<center>
<h1>expense Details</h1>
</center>
<tr>
<th>ID</th>
<th>Date</th>
<th>Description</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<?php
require "../interdb.php";
$count=1;
$sel_query="Select * from expense where (date BETWEEN '$sdate' AND '$edate');";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<tr>
<th><?php echo $row['id']?></th>
<th><?php echo $row['date']?></th>
<th><?php echo $row['des']?></th>
<th><?php echo $row['amount']?></th>
</tr>
<?php $count++; } ?>

</tbody>

</table>

</div>

</center>

<input type="submit" value="Print Data" class="btn btn-primary">
</form>
<?php }?>
</div>
</div>
</div>
</div>

                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>