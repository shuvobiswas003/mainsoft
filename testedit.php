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
	  $id=56;
	  
	  $query = "SELECT * from studentsix where id='".$id."'";
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
                                        <h3 class="panel-title">Edit Student</h3>
                                    </div>

                                    <div class="panel-body">
                                       <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_POST['id'];
$nameb=$_POST['nameb'];
$fnameb=$_POST['fnameb'];
$mnameb=$_POST['mnameb'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$bid=$_POST['bid'];
$dob=$_POST['dob'];
$fnid=$_POST['fnid'];
$fdob=$_POST['fdob'];
$mnid=$_POST['mnid'];
$mdob=$_POST['mdob'];
$address=$_POST['address'];
$sex=$_POST['sex'];
$sec=$_POST['sec'];
$roll=$_POST['roll'];
$mobile=$_POST['mobile'];

//photo insert
if(isset($_FILES['photo'])){
$info       = pathinfo($_FILES['photo']['name']);
$ext    = $info['extension'];
$filename=$roll.".".$ext;
$filetmp=$_FILES['photo']['tmp_name'];
move_uploaded_file($filetmp,"img/student/six/".$filename);
}
//photo insert end

$sql="UPDATE studentsix set nameb='$nameb',fnameb='$fnameb',mnameb='$mnameb',name='$name',fname='$fname',mname='$mname',bid='$bid',dob='$dob',fnid='$fnid',fdob='$fdob',mnid='$mnid',mdob='$mdob',address='$address',sex='$sex',sec='$sec',roll='$roll',mobile='$mobile' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Student Update Successfully<h2>";

} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo '<p style="color:green"> Go To Student Page <a href="viewstudentsix.php"> View Student </a> </p>';
}else {
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <input type="hidden" name="new" value="1" />
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
      <!--Student Form Part Start-->
      <marquee behavior="slow" direction="left"><h2 style="color:red;">If You Change Roll Please Reselect Picture</h2></marquee>
      								<div class="col-md-6">
                                            <center>
                                            <h3> Student Part(Bangla) </h3>
                                            </center>
                                          <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">নাম</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" autofocus="autofocus"value="<?php echo $row['nameb'];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">পিতার নাম</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1" value="<?php echo $row['fnameb'];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">মাতার নাম</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1" value="<?php echo $row['mnameb'];?>">
                                                </div>
                                            </div>

                                            
                                            </div>
                                            <div class="col-md-6">
                                            <center>
                                            <h3> Student Part(English) </h3>
                                            </center>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" required="1" value="<?php echo $row['name'];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">Father's Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" required="1" value="<?php echo $row['fname'];?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="Cust-name">Mother's Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother's Name" required="1" value="<?php echo $row['mname'];?>">
                                                </div>
                                            </div>
                                        </div>
<div class="row">
    <div class="col-md-12">
        <center>
            <h3>National Data Section</h3>
        </center>



    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Birth ID No</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="bid" class="form-control" placeholder="Student Birth ID no" required="1" value="<?php echo $row['bid'];?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="dob" class="form-control" placeholder="Student Date Of Birth" required="1" value="<?php echo $row['dob'];?>">
                </div>
        </div>
    </div>
<!--father Part-->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Father's NID</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="fnid" class="form-control" placeholder="Fatehr's NID number" required="1" value="<?php echo $row['fnid'];?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Father's DOB</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="fdob" class="form-control" placeholder="Father's Date Of Birth" required="1" value="<?php echo $row['fdob'];?>">
                </div>
        </div>
    </div>

<!--Mother Part-->
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Mother's NID</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="mnid" class="form-control" placeholder="Mother's NID number" required="1" value="<?php echo $row['mnid'];?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Mother's DOB</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="mdob" class="form-control" placeholder="Mother's Date Of Birth" required="1" value="<?php echo $row['mdob'];?>">
                </div>
        </div>
    </div>



    </div>
</div>
<!--End of National Data Section-->

<!--Academic Information Start-->
    <div class="row">
        <center>
            <h3>Academic And Contuct Info</h3>
        </center>
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-md-1 control-label" for="Cust-name">Address</label>
                    <div class="col-md-10">
                        <input type="text" id="Cust-name" name="address" class="form-control" placeholder="Enter Student Address" required="1" value="<?php echo $row['address'];?>">
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Sex</label>
                <div class="col-md-8">
                    <select name="sex" id="Cust-name" class="form-control" required="1">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Section</label>
                <div class="col-md-8">
                    <select name="sec" id="Cust-name" class="form-control" required="1">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Roll</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="roll" class="form-control" placeholder="Enter Student Roll" required="1" value="<?php echo $row['roll'];?>">
                </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-2 control-label" for="Cust-name">Mobile Number</label>
                <div class="col-md-8">
                    <input type="text" id="Cust-name" name="mobile" class="form-control" placeholder="Enter Student Gurdian Mobile Number" required="1" value="<?php echo $row['mobile'];?>">
                </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="col-md-1 control-label" for="Cust-name">Photo</label>
            <div class="col-md-10">
                <input type="File" id="Cust-name" name="photo" class="form-control" placeholder="Upload Picture">
            </div>
        </div>
    </div>



      <!--Student Form Part END-->
    <input type="submit" class="btn btn-primary" Value="Edit Student">
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