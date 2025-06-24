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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Subject</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Student Addmission</h3>
            </div>
            <div class="panel-body">
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameb=$_POST['nameb'];
    $fnameb=$_POST['fnameb'];
    $mnameb=$_POST['mnameb'];

    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $sex=$_POST['sex'];

    $brithid=$_POST['brithid'];
    $sdob=$_POST['sdob'];
    $dob=date("Y-m-d", strtotime($sdob));
    $fnid=$_POST['fnid'];
    $mnid=$_POST['mnid'];
    
    $classnumber=$_POST['classnumber'];
    $classname=$_POST['classname'];
    $secgroupname=$_POST['secgroupname'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $uniqid=$classnumber.$secgroupname.$roll;

    //insert photo
    if(isset($_FILES['image'])){
    $info       = pathinfo($_FILES['image']['name']);
    $ext    = $info['extension'];
    $filename=$uniqid.".".$ext;
    $filetmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($filetmp,"img/student/".$filename);
    }

    //insert to database

        require "interdb.php";

        $sql ="INSERT INTO student(classnumber,classname,secgroup,roll,name,fname,mname,nameb,fnameb,mnameb,dob,birthid,fnid,mnid,address,mobile,uniqid,sex) VALUES ('$classnumber','$classname','$secgroupname','$roll','$name','$fname','$mname','$nameb','$fnameb','$mnameb','$dob','$brithid','$fnid','$mnid','$address','$mobile','$uniqid','$sex') ";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student Admited Successfully</h1>.";
    }

}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" autofocus="autofocus">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother's Name" >
        </div>
    </div>
</div>


    <div class="col-md-6">
        <center>
        <h3> Student Part(Bangla) </h3>
        </center>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">নাম</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1">
        </div>
    </div>

    
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="sex" required="1">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>
    <!--National Data Section Start-->
    <div class="col-md-12">
        <center>
            <h3>National Data Section</h3>
        </center>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Birth ID No</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="brithid" class="form-control" placeholder="Student Birth ID no" required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <input type="date" id="Cust-name" name="sdob" class="form-control" placeholder="Student Date Of Birth" required="1">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="fnid" class="form-control" placeholder="Father NID Number" required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Mother NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mnid" class="form-control" placeholder="Mother Nid Number" required="1">
                </div>
        </div>
    </div>
<!--End of National Data Section-->
<!--Academic & Contuct Part Start-->
    <div class="col-md-12">
        <center>
            <h3>Academic Part And Contuct Info</h3>
        </center>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Class Number</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                
                <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Group/Section</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                
                <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                
                </select>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Address</label>
                <div class="col-md-9">
                    <input type="text" name="address" class="form-control">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mobile" class="form-control" placeholder="Student Gurdian Phone Number" required="1">
                </div>
        </div>
    </div>
<!--Academic & Contuct Part End-->

<br><br><br><br><br><br>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="file" name ="image" id="image" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <center>
        <div id="preview"></div>
        </center>
    </div>
</div>
<div class="col-md-12">   
<center> 
<input type="submit" class="btn btn-primary" Value="Admit Student">
</center>
</div>
</form>
            
</div><!--End of panel Body-->
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>