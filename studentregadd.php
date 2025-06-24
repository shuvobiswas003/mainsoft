<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
<h3 class="panel-title">Student Regestration</h3>
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
                    require "interdb.php";
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
                    <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="roll" class="form-control" placeholder="Write Roll Number" required="1" autofocus="autofocus">
                    </div>
            </div>

            
            <input type="submit" class="btn btn-primary" Value="Verify Student">
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
require 'interdb.php';
$count=1;
$sel_query="SELECT * FROM student WHERE uniqid='$uniqid'";
$result = mysqli_query($link,$sel_query);
 while($row = mysqli_fetch_assoc($result)) {

?>

<!--Print School Info Start-->
        <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h1 style="font-size: 50px;color: black;">
                            <?php echo $row2['schoolname']?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['schooladdress'];?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['website'];?>
                        </h1>
                    </center>
                </div>
            </div>
            
            <?php $count2++; } ?>
            <center>
                <h2 style="color: green;">Online Regestration</h2>
            </center>
        <!--Print School Info END-->
        <!--Print Student INFO Start-->
        <div class="col-md-12">
            <center>
                <h2>Student Information</h2>
                <img src="img/student/<?php echo $row['imgname'];?>" alt="" style="height: 150px;width:150px;border-radius: 50%;"><br>
                <h4>
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
        </div>
        <!--Print Student INFO END-->
<form action="addsturegdata.php" method="POST" target="_blank">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
            <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
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
        <label class="col-md-3 control-label" for="Cust-name">Select Roll</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="roll" required="1">
            <option value="<?php echo $roll;?>"><?php echo $roll;?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select UniqID</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="uniqid" required="1">
            <option value="<?php echo $uniqid;?>"><?php echo $uniqid;?></option>
            </select>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <center>
        <h3>Subject Choice List</h3>
        </center>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE classnumber='$classnumber'AND secgroup='$secgroupname'";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                        <select class="form-control" data-placeholder="Select Class" name="subcode[]" required="1">
                            <option value="<?php echo $row['subcode'];?>"><?php echo $row['subcode'];?></option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" data-placeholder="Select Class" name="subname[]" required="1">
                            <option value="<?php echo $row['subname'];?>"><?php echo $row['subname'];?></option>
                        </select>
                    </td>

                    <td>
                       <select name="substatus[]" id="" class="form-control">
                           <option value="1">Compoulsary Subject</option>
                           <option value="4">Optional Subject</option>
                           <option value="0">Not For Choihe</option>
                       </select>
                    </td>
                    </tr>
                    <?php $count1++; } ?>
            </tbody>
            </table>
    </div>
</div>






        
    <input type="submit" value="Finish Regestration" class="btn btn-primary">
</form>                               
    <?php $count++; }?>
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