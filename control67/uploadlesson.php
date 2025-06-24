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
    <th>Class Number</th>
    <th>Section Group Name</th>
    <th>Subcode</th>
    <th>Subname</th>
    <th>Chapter No</th>
    <th>Chapter Name</th>
    <th>LNo</th>
    <th>LName</th>
    <th>LPIS</th>
    <th>LPIC</th>
    <th>LPIT</th>
</thead>
<tbody>
<?php
    require "../interdb.php";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
    $classnumber = $filesop[0];
    $secgroupname = $filesop[1];
    $subcode = $filesop[2];
    $subname = $filesop[3];

    $chapterno = $filesop[4];
    $chaptername = $filesop[5];
    $lno = $filesop[6];
    $lname = $filesop[7];
    $lpis = $filesop[8];
    $lpic = $filesop[9];
    $lpit = $filesop[10];
    $uni=$classnumber.$secgroupname.$subcode.$chapterno.$lno;
    if($c>0){
?>
<tr>
    <td><?php echo $classnumber;?></td>
    <td><?php echo $secgroupname;?></td>
    <td><?php echo $subcode;?></td>
    <td><?php echo $subname;?></td>
    <td><?php echo $chapterno;?></td>
    <td><?php echo $chaptername;?></td>
    <td><?php echo $lno;?></td>
    <td><?php echo $lname;?></td>
    <td><?php echo $lpis;?></td>
    <td><?php echo $lpic;?></td>
    <td><?php echo $lpit;?></td>
</tr>
<?php
    //insert to database
    $sql ="INSERT INTO lesson(classnumber,secgroupname,subcode,subname,chapterno,chaptername,lno,lname,lpis,lpic,lpit,uni 
) VALUES ('$classnumber','$secgroupname','$subcode','$subname','$chapterno','$chaptername','$lno','$lname','$lpis','$lpic','$lpit','$uni') ON DUPLICATE KEY UPDATE subname='$subname',chaptername='$chaptername',chapterno='$chapterno',lname='$lname',lpis='$lpis',lpic='$lpic',lpit='$lpit'";

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
            <th>Class Number</th>
            <th>Section Group Name</th>
            <th>Subcode</th>
            <th>Subname</th>
            <th>Chapter No</th>
            <th>Chapter Name</th>
            <th>LNo</th>
            <th>LName</th>
            <th>LPIS</th>
            <th>LPIC</th>
            <th>LPIT</th>
                    </tr>
                </thead>
            </table>
            <br><br><br>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload IMAGE SL</label>
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