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
                                <h4 class="pull-left page-title">Subject</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Add Subject</h3>
            </div>
            <div class="panel-body">
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
    $sel_query="Select * from teacher where id='$subteachersl';";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
        $subteacher= $row['name'];
    }
    $uni=$classnumber.$secgroupname.$subcode;

    //insert to database

        require "interdb.php";

        $sql ="INSERT INTO subject(classname,classnumber,secgroup,subname,subcode,subfullmarks,gradecode,subteacher,uni,teacherid) VALUES ('$classname','$classnumber','$secgroupname','$subname','$subcode','$subfullmarks','$gradecode','$subteacher','$uni','$subteachersl') ON DUPLICATE KEY UPDATE subcode='$subcode',subfullmarks='$subfullmarks',gradecode='$gradecode',subteacher='$subteacher',teacherid='$subteachersl'";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Subject Added</h1>.";
    } else{
       echo "<h3 style='color:red;'>Subject Already Exists</h1>";
    }
    
    
}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                    $sel_query="Select * from teacher ORDER BY id;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
            </div>
               
                <input type="submit" class="btn btn-primary" Value="Add Subject">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Subject </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Class Number</th>
                        <th>Class Name</th>
                        <th>Section/Group Name</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Full Marks</th>
                        <th>Grade Code</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `subject` where classnumber='$classnumber' AND secgroup='$secgroupname'ORDER BY classnumber ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["classname"]; ?></td>
                                <td><?php echo $row["secgroup"]; ?></td>
                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["subfullmarks"]; ?></td>
                                <td><?php echo $row["gradecode"]; ?></td>
                                <td>
                                <a href="deletesubject.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroup'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');">Delete</button> </a>
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
</div>
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>