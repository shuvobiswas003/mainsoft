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
                <h3 class="panel-title">Add Gradename</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $gradename= $_POST['gradename'];
        $fullmark= $_POST['fullmark'];
        $gradecode=$_POST['gradecode'];
        require "interdb.php";
        $sql ="INSERT INTO gradename(gradename,fullmark,gradecode) VALUES ('$gradename','$fullmark','$gradecode') "; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Grade Added</h1>.";
    } else{
       echo "<h3 style='color:red;'>Grade Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Grade Name </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="gradename" class="form-control" placeholder="Write Grade Name" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Full Mark </label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="fullmark" class="form-control" placeholder="Write Grade Name" required="1">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Grade Code</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="gradecode" class="form-control" placeholder="Write Grade Code Like 'gr001'" required="1">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Grade">
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
    <h3 class="panel-title">View Section/Group </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Gradename</th>
                        <th>Fullmark</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `gradename`;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["gradename"]; ?></td>
                                <td><?php echo $row["fullmark"]; ?></td>
                                <td>
                                <a href="delgradename.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Grade?');">Delete</button> </a>
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