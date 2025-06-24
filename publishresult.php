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
                                <h4 class="pull-left page-title">Class</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Class</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $examid= $_POST['examid'];
        $status= $_POST['status'];
        require "interdb.php";
        $sql ="INSERT INTO resultpub(examid,status) VALUES ('$examid','$status') ON DUPLICATE KEY UPDATE status='$status'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>RESULT Published</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Exam ID</label>
                    <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam ORDER BY exid ASC;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?>
                    </select>
                    </div>
            </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Status</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="status" required="1">
                   
                    <option value="0">Not Published</option>
                    <option value="1">Published</option>
                    </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Publish Result">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Class</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Exam ID</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from resultpub";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row["examid"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
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