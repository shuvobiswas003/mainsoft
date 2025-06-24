<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
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
                                        <h3 class="panel-title">Edit Mark</h3>
                                    </div>


<?php
      require '../interdb.php';
      $id=$_REQUEST['id'];
      
      $query = "SELECT * from exammark where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_POST['id'];
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$gradecode=$_POST['gradecode'];

echo $gradecode;
$cq=$_POST['cq'];
$mcq=0;
$practical=$_POST['practical'];
$total=$cq+$mcq+$practical;



// Fetch letter grade and point
    $letterpoint = '';
    $lettergrade = '';
    $sel_query = "SELECT * FROM grademark WHERE gradecode='$gradecode' AND ($total BETWEEN markfrom AND markupto)";
    $result = mysqli_query($link, $sel_query);
    if ($row = mysqli_fetch_assoc($result)) {
        $letterpoint = $row['letterpoint'];
        $lettergrade = $row['lettergrade'];
    }

    

$sql="UPDATE exammark set cq='$cq',mcq='$mcq',practical='$practical',total='$total',letterpoint='$letterpoint',lettergrade='$lettergrade' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Mark Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<h2 style='color:green;'><a href='exammarkview.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."&examid=".$examid."'>View Mark Dashboard</a></h2>";
}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<input type="hidden" name="classnumber" value="<?php echo $row['classnumber'];?>">
<input type="hidden" name="secgroupname" value="<?php echo $row['secgroupname'];?>">
<input type="hidden" name="examid" value="<?php echo $row['examid'];?>">
<input type="hidden" name="gradecode" value="<?php echo $row['gradecode'];?>">

<div class="form-group">
    <label class="col-md-3 control-label" for="Cust-name">Roll</label>
    <div class="col-md-9">
        <select name="roll" id="" class="form-control">
            <option value="<?php echo $row['roll'];?>"><?php echo $row['roll'];?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="Cust-name">CQ</label>
    <div class="col-md-9">
        <input type="number" name="cq" value="<?php echo $row['cq']?>" class="form-control" autofocus>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label" for="Cust-name">CA</label>
    <div class="col-md-9">
        <input type="number" name="practical" value="<?php echo $row['practical']?>" class="form-control">
    </div>
</div>
    
<div class="col-md-12">   
<center> 
<input type="submit" class="btn btn-primary" Value="Edit Mark">
</center>
</div>

    <!--Student Form Part END-->
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