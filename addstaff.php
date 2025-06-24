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
                                <h4 class="pull-left page-title"></h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Staff</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name= $_POST['name'];
        $tfname= $_POST['tfname'];
        $tmname=$_POST['tmname'];
        $tdob= $_POST['tdob'];
        $leatestdegree=$_POST['leatestdegree'];
        $mob= $_POST['mob'];
        $deg=$_POST['deg'];
        $teachersl= $_POST['teachersl'];
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

        require "interdb.php";
        $sql = "INSERT INTO staff (name, tfname, tmname, tdob, leatestdegree, mob, degnation, teachersl, joindate) 
        VALUES ('$name', '$tfname', '$tmname', '$tdob', '$leatestdegree', '$mob', '$deg', '$teachersl', '$joindate') 
        ON DUPLICATE KEY UPDATE 
        name = VALUES(name),
        tfname = VALUES(tfname),
        tmname = VALUES(tmname),
        tdob = VALUES(tdob),
        leatestdegree = VALUES(leatestdegree),
        mob = VALUES(mob),
        degnation = VALUES(degnation),
        joindate = VALUES(joindate)";
 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Staff Added Successfully</h1>.";
    } else{
       echo "<h3 style='color:red;'>Staff Already Exists</h1>". mysqli_error($link);
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
                <!--Staff Info-->
                <h4><center>Personal Biodata</center></h4>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Staff's Name" required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="tfname" class="form-control" placeholder="Father's Name" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="tmname" class="form-control" placeholder="Mother's Name" >
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="tdob" class="form-control" placeholder="Mother's Name"  required="1">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Letest Degree</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="leatestdegree" class="form-control" placeholder="Enter Last Obtain Degree"  required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mob" class="form-control" placeholder="Personal Contuct Number"  required="1">
        </div>
    </div>
</div>
<h4><center>School Related Info</center></h4>
<div class="col-md-6">
   
           <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Degenation</label>
        <div class="col-md-9">
           <input type="text" class="form-control" name="deg"  required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Join Date</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="joindate" class="form-control" placeholder=""  required="1">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Staff Sl Number</label>
        <div class="col-md-9">
            <input type="number" id="Cust-name" name="teachersl" class="form-control" placeholder=" Sl Number"  required="1">
        </div>
    </div>
    <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="File" id="Cust-name" name="image" class="form-control" placeholder="Upload Picture">
            </div>
    </div>

</div>

    
<input type="submit" class="btn btn-primary" Value="Add ">
 

</form>
<br>
<br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View  </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Post</th>
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from staff";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["degnation"]; ?></td>
                                <td><?php echo $row["joindate"]; ?></td>
                                <td>
                                    <a href="view_staff.php?id=<?php echo $row['id'];?>" target="_blank"><button type="button" class="btn btn-primary" >Profile</button> </a>
                                    <a href="staffedit.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary" >Edit</button> </a>
                                    <a href="deletestaff.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this ?');">Delete</button> </a>
                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
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