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
            <!-- Raw Div Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">File Entry</h3>
                        </div>
                        <!-- 2nd Form Part Start -->
                        <div class="panel-body">
                            <form action="student_add_bris_folder_data.php" method="POST" enctype="multipart/form-data">
                                
    


                <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count10=1;
                    $sel_query10="Select * from class;";
                    $result10 = mysqli_query($link,$sel_query10);
                    while($row10 = mysqli_fetch_assoc($result10)) {?>
                    <option value="<?php echo $row10['classnumber']?>"><?php echo $row10['classnumber']?></option>
                    <?php $count10++; } ?>
                    </select>
                </div>
            </div>


 <div class="form-group">

        <label class="col-md-3 control-label" for="Cust-name">Section Name</label>

        <div class="col-md-7">

            <input type="text" name="secgroupname" id="secgroupname" class="form-control">

        </div>

    </div>




                            <br><br><br>
                            <div class="col-md-12">   
                                <center> 
                                    <input type="submit" value="Start Entry" class="btn btn-primary">
                                </center>
                            </div>
                            </form>
                        </div>
                        <!-- 2nd Form Part End -->
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<?php include 'inc/footer.php'?>
