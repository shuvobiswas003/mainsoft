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
                                <h4 class="pull-left page-title">Upload</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Attdance</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "interdb.php";
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
          
          $machineid = $filesop[0];
          $date = $filesop[1];
          $ndate=date("Y-m-d", strtotime($date));
          //getting stuid
          
          $stuid;
          $sel_query="SELECT * FROM machinedata WHERE mid='$machineid'";
          $result = mysqli_query($link,$sel_query);
          while($row = mysqli_fetch_assoc($result)) {
            $stuid=$row['stuid'];
          }
          $uniqdate=date("Ymd", strtotime($date));
          $uniqattid=$stuid.$uniqdate;

          $sql = "INSERT IGNORE into stuattdancedata(machineid,adate,stuid,uniqattid,status) values ('$machineid','$ndate','$stuid','$uniqattid','Present')";
          $stmt = mysqli_prepare($link,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "<h3 style='color:green;'>Upload Success Fully</h3>";
             } 
         else
         {
            echo "<h3 style='color:Red;'>Unable To Upload. Please Cheak File Format</h3>";
          }

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload Attdance C.S.V File</label>
                    <div class="col-md-7">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Upload Attdance">
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