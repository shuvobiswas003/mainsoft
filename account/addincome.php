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
                                <h4 class="pull-left page-title">Datatable</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>

                                    <li><a href="#">Tables</a></li>

                                    <li class="active">Datatable</li>

                                </ol>

                            </div>

                        </div>



<div class="row">

<div class="col-md-12">

    <div class="panel panel-default">

        <div class="panel-heading">

            <h3 class="panel-title">Add Income</h3>

        </div>

        <div class="panel-body">

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$date= $_POST['date'];
$dob= date("Y-m-d", strtotime($date));
$des=$_POST['des'];
$amount=$_POST['amount'];
require "../interdb.php";
$sql ="INSERT INTO income(date,des,amount) VALUES ('$dob','$des','$amount') "; 
if(mysqli_query($link, $sql)){
echo "Income inserted successfully.";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">



<div class="form-group">

    <label class="col-md-3 control-label" for="Cust-name">Date</label>

    <div class="col-md-9">

        <input type="date" id="Cust-name" name="date" class="form-control" placeholder="Enter date">

    </div>

</div>

<div class="form-group">

    <label class="col-md-3 control-label" for="Cust-name">Description </label>

    <div class="col-md-9">

        <input type="text" id="Cust-name" name="des" class="form-control" placeholder="Enter Description">

    </div>

</div>



<div class="form-group">

    <label class="col-md-3 control-label" for="Cust-name">Amount</label>

    <div class="col-md-9">

        <input type="number" id="Cust-name" name="amount" class="form-control" placeholder="Enter Amount">

    </div>

</div>
<input type="submit" class="btn btn-primary" Value="Add Expense">

</form>

<div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                    <?php
                            require "../interdb.php";
                            $count=1;
                            $sel_query="Select * from income;";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><?php echo $row["des"]; ?></td>
                                <td><?php echo $row["amount"]; ?></td>
                            <td class="actions">
                            <a href="printincome.php?id=<?php echo $row['id'];?>" target="_blank"><button type="button" class="btn btn-primary">Print</button></a>
                            <a href="deleteincome.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" target="_blank">Delete</button> </a>
                            </td>
                        </tr>
                        <?php $count++; } ?>                  


                                    </tbody>
                                </table>

                                            </div>

</div>
</div>
</div>
</div>
</div> <!-- End Row -->
</div> <!-- container -->
</div> <!-- content -->
<?php include'inc/footer.php'?>