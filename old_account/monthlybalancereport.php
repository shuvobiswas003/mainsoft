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
                                <h4 class="pull-left page-title">Monthly Collection Report</h4>
                            </div>
                        </div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Monthly Balance Report</h3>
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
<form action="report/printmonthlybalreport.php" method="POST" target="_blank">
<div class="col-md-12">
    <center>
    <h1>Balance Report</h1>
    <h4>Date: <?php echo $sdate?> TO <?php echo $edate?></h4>
<select name="sdate" id="" class="form-control">
<option value="<?php echo $sdate?>"><?php echo $sdate?></option>
</select>
<select name="edate" id="" class="form-control">
<option value="<?php echo $edate?>"><?php echo $edate?></option>
</select>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <center>
                    <h1>Balance Details</h1>
                </center>
                <tr>
                <th>Date</th>
                <th>Student Collection</th>
                <th>Amount</th>
                <th>Income</th>
                <th>Amount</th>
                <th>Expense</th>
                <th>Amount</th>
                </tr>
            </thead>
        <tbody>
<?php
$start_date = $sdate;
$end_date = $edate;

$current_date = strtotime($start_date);
$end_date = strtotime($end_date);
while ($current_date <= $end_date) {
$dbdate= date('Y-m-d', $current_date);
?>
<tr>
<th><?php echo $dbdate?></th>
<th>
    Student Collection:
</th>
<th>
    <?php
require '../interdb.php';
$sql1 = "SELECT sum(amount) FROM invoicetrx WHERE date = '$dbdate'";
$result1 = mysqli_query($link, $sql1);
$stucollection;
while($row1 = mysqli_fetch_assoc($result1)) {
   $stucollection=$row1['sum(amount)'];
}
if ($stucollection== null) {
    echo "0";
}else{
    echo $stucollection;
}
?>
</th>

<th>
    Another Income:
</th>
<th>
<?php
require '../interdb.php';
$sql2 = "SELECT sum(amount) FROM income WHERE date = '$dbdate'";
$income;
$result2 = mysqli_query($link, $sql2);
    while($row2 = mysqli_fetch_assoc($result2)) {
       $income= $row2['sum(amount)'];
    }
if ($income== null) {
    echo "0";
}else{
    echo $income;
}

    ?>
</th>

<th style="color: red;">
    Expense:
</th>
<th style="color: red;">
    <?php
$sql3 = "SELECT sum(amount) FROM expense WHERE date = '$dbdate'";
$result3 = mysqli_query($link, $sql3);
$expense;
// Loop through the rows and print the data
while($row3 = mysqli_fetch_assoc($result3)) {
$expense=$row3['sum(amount)'];
}
if ($expense== null) {
    echo "0";
}else{
    echo $expense;
}
?>
</th>

</tr>
<?php 
$current_date = strtotime('+1 day', $current_date);
}
?>
        </tbody>

        </table>


    </div>
        
    </center>
<?php
$count=1;
$sel_query="Select sum(amount) from invoicetrx where (date BETWEEN '$sdate' AND '$edate');";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<h1 style="color:green;">Total Student Collection <?php echo $row['sum(amount)']?></h1>
<?php $count++; } ?>

<?php
$count=1;
$sel_query="Select sum(amount) from income where (date BETWEEN '$sdate' AND '$edate');";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<h1 style="color:green;">Another Income: <?php echo $row['sum(amount)']?></h1>
<?php $count++; } ?>

<?php
$count=1;
$sel_query="Select sum(amount) from expense where (date BETWEEN '$sdate' AND '$edate');";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<h1 style="color:red;">Expense: <?php echo $row['sum(amount)']?></h1>
<?php $count++; } ?>

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