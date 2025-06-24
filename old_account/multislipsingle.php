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
                    <label class="col-md-3 control-label" for="Cust-name">Enter Roll</label>
                    <div class="col-md-9">
                        <input type="number" name="roll" value="Get Details" class="form-control">
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
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$uniqid=$classnumber.$secgroupname.$roll;

?>
<form action="../studentpayment/multislipsingleprint.php" method="POST" target="_blank">
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
    <INPUT type="button" value="Delete" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
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
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>