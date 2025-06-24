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
<h3 class="panel-title">Exam Mark Entry</h3>
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
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
            

           
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Enter Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" required="1">
                </div>
            </div>
           
            
            <input type="submit" class="btn btn-primary" Value="Genarate Invoice">
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
?>
<form action="addinvoicedata_single_date.php" method="POST" target="_blank">
    
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
                        <th>Date</th>
                        <th>Description</th>
                        <th>Total</th>
                    </tr>
                </thead>

    <input type="button" value="Select All" onclick="selectAll()" class="btn btn-primary">

    <INPUT type="button" value="Remove" onclick="deleteRow('multiSlip')" class="btn btn-danger"/>
                


                <tbody>
                    <?php
                    $count=1;
                    $sel_query="SELECT * FROM paycat ORDER BY id";
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
    <input type="date" name="invoice_date[]" class="form-control" required="1" value="<?php echo date('Y-m-d'); ?>" required="1">
</td>



                        <td>
                        <textarea name="des[]" class="form-control"  required="1" cols="40">
                        <?php echo $row['pcatname'];?>
                        </textarea>
                        </td>
                        <td>
                            <input type="total" name="total[]" class="form-control" required="1"  autofocus='autofocus'>
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