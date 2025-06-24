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
                                        <h3 class="panel-title">Edit Staff</h3>
                                    </div>


<?php
      require 'interdb.php';
      $id=$_REQUEST['id'];
      
      $query = "SELECT * from staff where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);

?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

        $name= $_POST['name'];
        $tfname= $_POST['tfname'];
        $tmname=$_POST['tmname'];
        $tdob= $_POST['tdob'];
        $leatestdegree=$_POST['leatestdegree'];
        $mob= $_POST['mob'];
        $deg=$_POST['deg'];
        $teachersl=$_POST['teachersl'];
       
        $joindate= $_POST['joindate'];
 if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $imgname = $name . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        $destination = "img/" . $imgname;

        if (move_uploaded_file($filetmp, $destination)) {
            echo "<h3 style='color:green;'>Picture Added Successfully</h3>";
        } else {
            echo "<h3 style='color:red;'>Error uploading image.</h3>";
        }
    }


$sql="UPDATE staff 
          SET name = '$name', tfname = '$tfname', tmname = '$tmname', tdob = '$tdob',
              leatestdegree = '$leatestdegree', mob = '$mob', degnation = '$deg',joindate = '$joindate',teachersl='$teachersl'
          WHERE id = $id";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Staff Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "<h4> Staff update Susseccfully <a href='addstaff.php'>View Staff</a></h4>";


}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">

<!--Staff Info-->
                <h4><center>Personal Biodata</center></h4>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Staff's Name" value="<?php echo $row['name']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="tfname" class="form-control" placeholder="Father's Name" value="<?php echo $row['tfname']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="tmname" class="form-control" placeholder="Mother's Name" value="<?php echo $row['tmname']?>">
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="tdob" class="form-control" placeholder="Mother's Name" value="<?php echo $row['tdob']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Letest Degree</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="leatestdegree" class="form-control" placeholder="Enter Last Obtain Degree" value="<?php echo $row['leatestdegree']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mob" class="form-control" placeholder="Personal Contuct Number" value="<?php echo $row['mob']?>">
        </div>
    </div>
</div>
<h4><center>School Related Info</center></h4>
<div class="col-md-6">
   
           <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Degenation</label>
        <div class="col-md-9">
           <input type="text" class="form-control" name="deg" value="<?php echo $row['degnation']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Join Date</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="joindate" class="form-control" placeholder="" value="<?php echo $row['joindate']?>">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Staff Sl Number</label>
        <div class="col-md-9">
            <input type="number" id="Cust-name" name="teachersl" class="form-control"  value="<?php echo $row['teachersl']?>" placeholder="Staff Sl Number" >
        </div>
    </div>
    <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="File" id="Cust-name" name="image" class="form-control" placeholder="Upload Picture">
            </div>
    </div>

</div>


<div class="col-md-12">   
<center> 
<input type="submit" class="btn btn-primary" Value="Edit Staff">
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