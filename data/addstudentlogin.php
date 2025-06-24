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
                <h3 class="panel-title">Upload Student Login File</h3>
            </div>
            <div class="panel-body">

<?php
    $classnumber=$_REQUEST['classnumber'];


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $classname=$_POST['classname'];
            $classnumber=$_POST['classnumber'];
?>
<table class="table table-bordered">
<thead>
    <tr>
    <th>User Id</th>
    <th>Plain Password</th>
    <th>MD5</th>
    </tr>
</thead>
<tbody>
<?php
          
    require "../interdb.php";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
       
    $userid=$filesop[0];
    $plainpass=$filesop[1];
    $password=password_hash($plainpass, PASSWORD_DEFAULT);
    if($c>0){
?>
<tr>
    <td><?php echo $userid;?></td>
    <td><?php echo $plainpass;?></td>
    <td><?php echo $password;?></td>
    
</tr>

<?php
   
    //insert to database
    
    $sql ="INSERT INTO studentlogin(username,password,plainpass) VALUES ('$userid','$password','$plainpass') ON DUPLICATE KEY UPDATE plainpass='$plainpass',password='$password'";
    $stmt = mysqli_prepare($link,$sql);
    mysqli_stmt_execute($stmt);
    
}
    $c = $c + 1;
           }//ending while loop

            if($sql){
               echo "<h3 style='color:green;'>Upload Success Fully</h3>";
             } 
         else
         {
            echo "<h3 style='color:Red;'>Unable To Upload. Please Cheak File Format</h3>";
          }

    }
?>
</tbody>
</table>
        <div class="col-md-12">
            <center>
                <caption><h3>Sample Excel Sheet format</h3></caption>
            </center>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>User Id</th>
                    <th>Password</th>
                    </tr>
                </thead>
            </table>
            <br><br><br>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
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
                    require "../interdb.php";
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
                    <label class="col-md-3 control-label" for="Cust-name">Upload Login Info</label>
                    <div class="col-md-7">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Upload Student">
            </form>
            <br>
            <br>



        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>