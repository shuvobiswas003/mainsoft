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
                                <h4 class="pull-left page-title">Daily Collection Report</h4>
                            </div>
                        </div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Daily Balance Report</h3>
</div>
<div class="panel-body">

<form action="" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name"> Select Date</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="date" class="form-control" placeholder="Enter Date" required="1">
        </div>
    </div>
    <input type="submit" class="btn btn-primary" Value="Get Data">
</form>


<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pdate=$_POST['date'];
    $date=date("Y-m-d", strtotime($pdate));
?>
<br>
<br>
<br>
<form action="report/printdailcollect.php" method="POST" target="_blank">
<div class="col-md-12">
    <center>
    <h1>Balance Report</h1>
    <h4>Date: <?php echo $date?></h4>
    <select name="sdate" id="" class="form-control">
        <option value="<?php echo $date?>"><?php echo $date?></option>
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
<tr>
<th><?php echo $date?></th>
<th>
    Student Collection:
</th>
<th>
    <?php
require '../interdb.php';
$sql1 = "SELECT sum(amount) FROM invoicetrx WHERE date = '$date'";
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
$sql2 = "SELECT sum(amount) FROM income WHERE date = '$date'";
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
$sql3 = "SELECT sum(amount) FROM expense WHERE date = '$date'";
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
        </tbody>

        </table>


    </div>
        
    </center>
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