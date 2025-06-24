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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
?>
<table class="table table-bordered">
<thead>
    <th>Exam ID</th>
    <th>Class Number</th>
    <th>Subcode</th>
    <th>Chapter NO</th>
    <th>Lesson No</th>
</thead>
<tbody>
<?php
    require "../interdb.php";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
    $exid = $filesop[0];
    $classnumber = $filesop[1];
    $subcode = $filesop[2];
    $chapterno = $filesop[3];
    $lessonno = $filesop[4];
    $uni=$exid.$classnumber.$subcode.$chapterno.$lessonno;
    if($c>0){
?>
<tr>
    <td><?php echo $exid;?></td>
    <td><?php echo $classnumber;?></td>
    <td><?php echo $subcode;?></td>
    <td><?php echo $subname;?></td>
    <td><?php echo $chapterno;?></td>
    <td><?php echo $lessonno;?></td>
</tr>
<?php
    //insert to database
    $sql ="INSERT INTO exam67lesson (exid, classnumber, subcode, chapterno, lno, uniqid)
VALUES ('$exid', '$classnumber', '$subcode', '$chapterno', '$lessonno', '$uni')
ON DUPLICATE KEY UPDATE
  exid = VALUES(exid),
  classnumber = VALUES(classnumber),
  subcode = VALUES(subcode),
  chapterno = VALUES(chapterno),
  lno = VALUES(lno),
  uniqid = VALUES(uniqid);";

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
                <th>Exam ID</th>
                <th>Class Number</th>
                <th>Subcode</th>
                <th>Chapter NO</th>
                <th>Lesson No</th>
            </tr>
                </thead>
            </table>
            <br><br><br>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload CSV</label>
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