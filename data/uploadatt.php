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
                <h3 class="panel-title">Upload Attdance</h3>
            </div>
            <div class="panel-body">

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



        
        <div class="col-md-12">
            <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require "../interdb.php";
        ?>
        <table class="table table-bordered">
            <thead>
                <th>Mchine ID</th>
                <th>Student ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>In/OUT</th>
            </thead>
            <tbody>
        
        <?php
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
          
          $machineid = $filesop[0];
          $date = $filesop[1];
          $ndate=date("Y-m-d", strtotime($date));
          $time=date("H:i:s", strtotime($date));
          $cinout=$filesop[3];

          //getting stuid
          
          $stuid;
          $sel_query="SELECT * FROM machinedata WHERE mid='$machineid'";
          $result = mysqli_query($link,$sel_query);
          while($row = mysqli_fetch_assoc($result)) {
            $stuid=$row['stuid'];
          }
          $uniqdate=date("Ymd", strtotime($date));
          $uniqattid=$stuid.$uniqdate.$cinout;
          ?>
          <tr>
              <td><?php echo $machineid;?></td>
              <td><?php echo $stuid;?></td>
              <td><?php echo $ndate;?></td>
              <td><?php echo $time;?></td>
              <td><?php echo $cinout;?></td>
          </tr>

          <?php
          
          $sql = "INSERT IGNORE into stuattdancedata(machineid,adate,ctime,cinout,stuid,uniqattid,status) values ('$machineid','$ndate','$time','$cinout','$stuid','$uniqattid','Present')";
          $stmt = mysqli_prepare($link,$sql);
          mysqli_stmt_execute($stmt);

         
           }

            if($sql){
               echo "<h3 style='color:green;'>Upload Success Fully</h3>";
             } 
         else
         {
            echo "<h3 style='color:Red;'>Unable To Upload. Please Cheak File Format</h3>";
          }
          
          $c = $c + 1;

    }

?>
</tbody>
</table>

        </div>
    
    </div>
</div>

</div><!--End of panel Body-->                   
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>