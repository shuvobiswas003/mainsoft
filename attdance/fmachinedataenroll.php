<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
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
                                <h4 class="pull-left page-title">Upload</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Student File</h3>
            </div>
            <div class="panel-body">

<?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];
?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classnumber']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
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
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
              

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Time Table</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="time_table" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from att_time_table;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['id']?>-Cin Start(<?php echo $row['clock_in_start_time']?>) to Cout(<?php echo $row['clock_out_end_time']?>)</option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
               

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">User Type</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="user_type" required="1">
                    <option value="student">Student</option>
                    </select>
                </div>
            </div>


            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Add Machine ID</label>
                    <div class="col-md-7">
                        <input type="number" name="idstart" id="file" class="form-control" required='1'>
                    </div>
                </div> 
                <input type="submit" class="btn btn-primary" Value="Asign ID">
            </form>
            <br>
            <br>


<div class="col-md-12">
    <?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classname=$_POST['classname'];
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    $machineID= $_POST['idstart'];
    $time_table= $_POST['time_table'];
    $user_type=$_POST['user_type'];

    ?>
<table class="table table-bordered">
<thead>
    <tr>
    <th>Class Name</th>
    <th>Machine ID</th>
    <th>Student ID</th>
    <th>Roll</th>
    <th>Name</th>
    <th>GENDER</th>
    <th>DOB(YYYY-MM-DD)</th>
    <th>MOBILE</th>
    </tr>
</thead>
<tbody>
<?php
  require "interdb.php";
    $count=1;
    $sel_query="Select * from student where classnumber=$classnumber AND secgroup='$secgroupname' ORDER BY roll ASC;";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {  
    $roll=$row['roll'];
    $name=$row['name'];
    $studentid=$row['uniqid'];      
    $sex=$row['sex'];
    $dob=$row['dob'];
    $mobile=$row['mobile'];
    $address=$row['address'];
    $stumachineID=$roll+$machineID;

    //insert into finger data
   
   $sql = "INSERT INTO machinedata (mid, stuid, timetable, type,mobile,name) 
        VALUES ('$stumachineID', '$studentid', '$time_table', '$user_type','$mobile','$name') 
        ON DUPLICATE KEY UPDATE 
        mid = VALUES(mid), 
        stuid = VALUES(stuid), 
        mobile = VALUES(mobile),
        name = VALUES(name),
        timetable = VALUES(timetable), 
        type = VALUES(type)";
    if(mysqli_query($link, $sql)){
       
    
?>
<tr>
    <td><?php echo $classname;?></td>
    <td><?php echo $stumachineID;?></td>
    <td><?php echo $studentid;?></td>
    <td><b><?php echo $roll;?></b></td>
    <td><?php echo $name;?></td>
    <td><?php echo $sex;?></td>
    <td><?php echo $dob;?></td>
    <td><?php echo $mobile;?></td>
</tr>
<?php 
        
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }
        $count++; 
        }//ending getting Student
    }
   
?>
</tbody>
</table>
</div>
        </div><!--End of panel Body-->
    
    </div>
</div>


                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>