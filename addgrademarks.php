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
                                <h4 class="pull-left page-title">Grade</h4>
                            </div>
                        </div>
<!--form 1st Part Start-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Grade Mark</h3>
            </div>
            <div class="panel-body">
<?php
    $gradecode=$_REQUEST['gradecode'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $gradecode= $_POST['gradecode'];
        $markfrom= $_POST['markfrom'];
        $markupto=$_POST['markupto'];
        $lettergrade=$_POST['lettergrade'];
        $lpoint;
        switch ($lettergrade) {
            case 'A+':
                $lpoint=5;
                break;
            case 'A':
                $lpoint=4;
                break;
            case 'A-':
                $lpoint=3.5;
                break;
            case 'B':
                $lpoint=3;
                break;
            case 'C':
                $lpoint=2;
                break;
            case 'D':
                $lpoint=1;
                break;
            case 'F': 
                $lpoint=0;
                break;
            }
        $uni=$gradecode.$lettergrade;

        //insert to database

        require "interdb.php";

        $sql ="INSERT INTO grademark(gradecode,markfrom,markupto,lettergrade,letterpoint,uni) VALUES ('$gradecode','$markfrom','$markupto','$lettergrade','$lpoint','$uni') ";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Grademark Added</h1>.";
    } else{
       echo "<h3 style='color:red;'>Grade Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Grade Code</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="gradecode" required="1">
                        
                        <option value="<?php echo $gradecode;?>"><?php echo $gradecode;?></option>
                        </select>
                    </div>
                </div>
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Mark From </label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="markfrom" class="form-control" placeholder="Write Grade Name" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Mark Up To</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="markupto" class="form-control" placeholder="Write Grade Name" required="1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Letter Grade</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="lettergrade" required="1">
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                        </select>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Add Grade Mark">
            </form>
            <br>
            <br>
<!--form 1st Part END-->


<!--Form 2nd Part Start-->
<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Grade Mark </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Mark From</th>
                        <th>Mark Upto</th>
                        <th>Letter Grade</th>
                        <th>Letter Point</th>
                        <th>Grade Code</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `grademark` where gradecode='$gradecode';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["markfrom"]; ?></td>
                                <td><?php echo $row["markupto"]; ?></td>
                                <td><?php echo $row["lettergrade"]; ?></td>
                                <td><?php echo $row["letterpoint"]; ?></td>
                                <td><?php echo $row["gradecode"]; ?></td>
                                <td>
                                <a href="deletemarkongrade.php?id=<?php echo $row['id'];?>&gradecode=<?php echo $row["gradecode"];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Grade?');">Delete</button> </a>
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
<!--Form 2nd Part END-->
                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>