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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Search admit</h3>
            </div>
            <div class="panel-body">
<?php
$classnumber=$_REQUEST['classnumber'];
?>
            <form action="admit/admitrollprint.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" target="_blank">
        <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Class Number</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                
                <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                </select>
            </div>
        </div>
  
        <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from sectiongroup where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
        </div>

        <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="roll" class="form-control" placeholder="Write Roll Number" required="1">
                    </div>
        </div>
                <input type="submit" class="btn btn-primary" Value="Print Admit">
            </form>
            



        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>