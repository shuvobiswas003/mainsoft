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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">View Payment Report</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Payment Report</h3>
            </div>
            <div class="panel-body">
                <?php
                $classnumber=$_REQUEST['classnumber'];
                $secgroupname=$_REQUEST['secgroupname'];
                ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from class where classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        
                        <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                        
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Payment Catagory</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="pcatid" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from paycat;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['pcatname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="View Report">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Payment Report</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //geting variable
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    $pcatid=$_POST['pcatid'];
?>
<center>
    
<?php
$sel_query="Select sum(total),sum(due),sum(totalpay) from studentpayment where pcatid='$pcatid' AND classnumber='$classnumber'AND secgroupname='$secgroupname';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
?>
<h1>Total Amount:<?php echo $row['sum(total)']?></h1>
<h1 style="color: green">Total Paid Amount:<?php echo $row['sum(totalpay)']?></h1>
<h1 style="color: red">Total Due Amount:<?php echo $row['sum(due)']?></h1>
<?php }?>
</center>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>StuID</th>
                        <th>Name</th>
                        <th>Invoice Date</th>
                        <th>Description</th>
                        <th>Total</th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from studentpayment where pcatid='$pcatid' AND classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["stuid"]; ?></td>
                                <td><?php echo $row["stuname"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><?php echo $row["des"]; ?></td>
                                <td><?php echo $row["total"]; ?></td>
                                <td><?php echo $row["totalpay"]; ?></td>
                                <td>
                                <span style="color: red;"><?php 
                                $total=$row['total'];
                                $totalpay=$row['totalpay'];
                                $due=$total-$totalpay;
                                echo $due;
                                ?>
                                </span>
                                </td>
                                <th>
                <?php $status= $row['status'];
                if($status=="Unpaid"){
                    echo "<span style='color:red;'>Unpaid</span>";
                }else{
                    echo "<span style='color:green;'>Paid</span>";
                }
                ?>
                                </th>
                                
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
            <a href="report/printinvoicereport.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $secgroupname?>&paycat=<?php echo $pcatid?>" target="_blank"><button class="btn btn-primary">Print Data</button></a>
<?php
}
?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>