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
                                <h4 class="pull-left page-title">Datatable</h4>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Student </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php
$classnumber=$_REQUEST['classnumber'];
require "interdb.php";
$count=1;
$sel_query="Select * from sectiongroup where classnumber='$classnumber';";
$result = mysqli_query($link,$sel_query);
?>

<table style="border-collapse: collapse; border: 1px solid black; padding: 8px;">
    <tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <td style="border: 1px solid black; padding: 8px;">
                <a href="export_stu_csv_bangla.php?classnumber=<?php echo $row['classnumber']?>&secgroupname=<?php echo $row['secgroupname']?>" class="btn btn-primary">
                    Download Excel (<?php echo $row['classnumber']?>-<?php echo $row['secgroupname']?>)
                </a>
                <br>
                <a href="export_studet_pdf.php?classnumber=<?php echo $row['classnumber']?>&secgroupname=<?php echo $row['secgroupname']?>" class="btn btn-primary">
                    PDF (<?php echo $row['classnumber']?>-<?php echo $row['secgroupname']?>)
                </a>
                <br>
                <a href="export_student_all_excel.php?classnumber=<?php echo $row['classnumber']?>&secgroupname=<?php echo $row['secgroupname']?>" class="btn btn-primary">
                    Export All (<?php echo $row['classnumber']?>-<?php echo $row['secgroupname']?>)
                </a>
            </td>
        <?php $count++; } ?>
    </tr>
</table>
<a href="export_student_all_excel_allclass.php" class="btn btn-primary">
    Export Student Table
</a>




                                            
                            <table  class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Section/Group</th>
                                        <th>Roll</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                        <th>Date Of Birth</th>
                                        <th>Birth ID</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                    
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            
                            require "interdb.php";
                            $count=1;
                            $sel_query="Select * from student where classnumber=$classnumber ORDER By roll;";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["secgroup"]; ?></td>
                                <td><?php echo $row["roll"]; ?></td>
                               
                                <td><?php echo $row["nameb"]; ?></td>
                                <td><?php echo $row["fnameb"]; ?></td>
                                <td><?php echo $row["mnameb"]; ?></td>
                                <td><?php echo $row["dob"]; ?></td>
                                <td><?php echo $row["birthid"]; ?></td>
                                <td><?php echo $row["sex"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["mobile"]; ?></td>
                            
                        </tr>
                        <?php $count++; } ?>                  


                        </tbody>
                    </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>