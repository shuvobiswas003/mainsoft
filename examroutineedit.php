<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
	  require 'interdb.php';
	  $id=$_REQUEST['id'];
	  $query = "SELECT * from examroutine where id='".$id."'";
	  $result = mysqli_query($link, $query) or die ( mysqli_error());
	  $row = mysqli_fetch_assoc($result);
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
                                        <h3 class="panel-title">Edit Routine</h3>
                                    </div>

                                    <div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_POST['id'];
$class=$_POST['classnum'];
$cgroup=$_POST['cgroup'];
$active=$_POST['active'];
$align=$_POST['align'];
$exdate=$_POST['exdate'];
$nexdate=date("Y-m-d", strtotime($exdate));
$sql="UPDATE examroutine set active='$active',examdate='$nexdate',align='$align' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Record Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<p style='color:green'> Go To Routine page <a href='examroutineview.php?classnumber=".$class."&secgroupname=".$cgroup."'> View Routine </a> </p>";
}else {
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
            
            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Class</label>
            <div class="col-md-8">
                <select class="form-control" data-placeholder="Select Class" name="classnum" required="1">
                <?php
                require "interdb.php";
                $classnumber=$row['classnumber'];
                $count1=1;
                $sel_query1="Select * from examroutine where id='$id';";
                $result1 = mysqli_query($link,$sel_query1);
                while($row1 = mysqli_fetch_assoc($result1)) {?>
                <option value="<?php echo $row1['class']?>"><?php echo $row1['class']?></option>
                <?php $count1++; } ?> 
                </select>
            </div>
            </div>

           <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Section/Group</label>
            <div class="col-md-8">
                <select class="form-control" data-placeholder="Select Class" name="cgroup" required="1">
                <?php
                require "interdb.php";
                $classnumber=$row['classnumber'];
                $count1=1;
                $sel_query1="Select * from examroutine where id='$id';";
                $result1 = mysqli_query($link,$sel_query1);
                while($row1 = mysqli_fetch_assoc($result1)) {?>
                <option value="<?php echo $row1['cgroup']?>"><?php echo $row1['cgroup']?></option>
                <?php $count1++; } ?> 
                </select>
            </div>
            </div>
            
            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Exam Date</label>
            <div class="col-md-8">
                <input type="date" id="Cust-name" name="exdate" class="form-control" placeholder="Exam Date" required="1"
<?php
$count2=1;
$sel_query2="SELECT * from examroutine where id='$id'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['examdate'];
if(!empty($des)){?>
    value="<?php echo $des;?>"
<?php
}else{
    ?>
    value="0"
<?php
}
$count1++; }
?>

                >
            </div>
          </div>

            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Status</label>
            <div class="col-md-8">
                <select name="active" id="" class="form-control">
                        <option value="1">To Take</option>
                        <option value="0">Not To Take</option>
                </select>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Admit Align</label>
            <div class="col-md-8">
                <select name="align" id="" class="form-control">
                        <option value="l">Left</option>
                        <option value="r">Right</option>
                </select>
            </div>
            </div>

    <input type="submit" class="btn btn-primary" Value="Edit Routine">
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