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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Subject</h3>
            </div>
            <div class="panel-body">
<?php
require "../interdb.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $sub_code=$_POST['sub_code'];
    $pr2_heading=$_POST['pr2_heading'];
   

   

        $sql ="INSERT INTO noipunno_pr2(classnumber,subject_code,heading_name) VALUES ('$classnumber','$sub_code','$pr2_heading') ON DUPLICATE KEY UPDATE classnumber='$classnumber'";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Subject Added</h1>.";
    } else{
       echo "<h3 style='color:red;'>Subject Already Exists</h1>";
    }
    
    
}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                            <option value="">Select Class</option>
                        <?php
                        $count=1;
                        $sel_query="Select * from class Order By classnumber;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            
                        <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="sub_code" required="1">
                            <option value="">Select Subject</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT * FROM subject WHERE classnumber = 6 AND secgroup='A';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
               
                
               
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Heading</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="pr2_heading" class="form-control" placeholder="paper_heading" required="1">
                    </div>
                </div>
               
            
               
                <input type="submit" class="btn btn-primary" Value="Add">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Class Number</th>
                        
                        <th>Subject Code</th>
                
                        <th>Heading</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                        <?php
                        $count=1;
                        $sel_query="SELECT * FROM `noipunno_pr2`";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["subject_code"]; ?></td>
                                <td><?php echo $row["heading_name"]; ?></td>
                                
                                <td>
                                <a href="delete_pr2.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');">Delete</button> </a>
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