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
                                        <h3 class="panel-title">Edit Subject</h3>
                                    </div>


<?php
      require 'interdb.php';
      $id=$_REQUEST['id'];
      
      $query = "SELECT * from subject where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
?>                                   <div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_POST['id'];
    $classname=$_POST['classname'];
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    $subname=$_POST['subname'];
    $subcode=$_POST['subcode'];
    $subfullmarks=$_POST['subfullmarks'];
    $gradecode=$_POST['gradecode'];
    $subteachersl=$_POST['subteachersl'];
    $subteacher;
    //teacher name collection
    require 'interdb.php';
    $count=1;
    $sel_query="Select * from teacher where teachersl='$subteachersl';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
        $subteacher= $row['name'];
    }
    $uni=$classnumber.$secgroupname.$subcode;
    


$sql="UPDATE student set nameb='$nameb',fnameb='$fnameb',mnameb='$mnameb',name='$name',fname='$fname',mname='$mname',birthid='$brithid',dob='$dob',fnid='$fnid',mnid='$mnid',address='$address',sex='$sex',secgroup='$secgroup',roll='$roll',mobile='$mobile',uniqid='$uniqid',imgname='$imgname' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Student Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<h4> Student update Susseccfully <a href='studentdashboard.php?classnumber=".$classnumber."'>View Student</a></h4>";
}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from class where classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                        
                        <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Group/Section</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Subject Name </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="subname" class="form-control" placeholder="Write Subject Name" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Subject Code </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="subcode" class="form-control" placeholder="Write Subject Code" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Subject Full Marks </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="subfullmarks" class="form-control" placeholder="Write Subject Marks" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Grade</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="gradecode" required="1">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from gradename;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['gradecode']?>"><?php echo $row['gradename']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Subject Teacher Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subteachersl" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from teacher ORDER BY teachersl;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['teachersl']?>"><?php echo $row['name']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
            </div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>