<?php
require 'vendor/autoload.php'; // Include PhpSpreadsheet library autoload file

use PhpOffice\PhpSpreadsheet\IOFactory;
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

                <h3 class="panel-title">Upload Exam Routine</h3>

            </div>

            <div class="panel-body">



<?php





    if($_SERVER['REQUEST_METHOD'] == 'POST'){

?>

<table class="table table-bordered">

<thead>
    <tr>
        <th>EXID</th>
        <th>Class</th>
        <th>Section/Group</th>
        <th>Sub Code</th>
        <th>Sub Name</th>
        <th>Exam Date</th>
        <th>Exam Time</th>
        <th>Align</th>
    </tr>
</thead>
<tbody>

<?php


    // Get the uploaded file details
    $file = $_FILES["excel_file"];
    $fileTmpName = $file["tmp_name"];

    // Load Excel file
    $spreadsheet = IOFactory::load($fileTmpName);

    // Get worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Start from row 2 to ignore the header row
    $startRow = 2;

    // Get highest row and column counts
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();

    // Loop through each row of the worksheet
    for ($row = $startRow; $row <= $highestRow; $row++) {
        // Read data from the current row
        $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        $exid = $rowData[0][0];
$class = $rowData[0][1];
$sec = $rowData[0][2];
$subcode = $rowData[0][3];
$subname = $rowData[0][4];

// Convert the date from the Excel file to the desired format
$examdate = $rowData[0][5];
if (is_numeric($examdate)) {
    // Excel date to Unix timestamp conversion
    $unixDate = ($examdate - 25569) * 86400;
    $exdate = gmdate("Y-m-d", $unixDate);
} else {
    try {
        $date = new DateTime($examdate);
        $exdate = $date->format('Y-m-d');
    } catch (Exception $e) {
        // Handle the exception if the date format is invalid
        echo "Error: Invalid date format for $examdate";
        continue; // Skip this row and continue with the next
    }
}

$extime = $rowData[0][6];
$align = $rowData[0][7];
$active = 1;
$uexid = $exid . $class . $subcode . $sec;
        // SQL query to insert or update data into the database table
        //insert to database
    require "interdb.php";
       $sql ="INSERT INTO examroutine(exid,class,cgroup,subcode,subname,examdate,align,uexid,active,examtime) VALUES ('$exid','$class','$sec','$subcode','$subname','$exdate','$align','$uexid','$active','$extime') ON DUPLICATE KEY UPDATE examdate='$exdate',examtime='$extime',align='$align',subname='$subname',subcode='$subcode',active='$active'"; 
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green;font-size:25px;'>Record Inserted Successfully</span><br>";
    } else{
    echo "<h3 style='color:red'>Already Added This Subject On Exam Rroutine</h3>";
    }
    mysqli_close($link);
    echo"<h3><a href='examroutineview.php?classnumber=".$class."&secgroupname=".$sec."'>View Routine</a></h3>";
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
                    <th>EXID</th>
                    <th>Class</th>
                    <th>Section/Group</th>
                    <th>Sub Code</th>
                    <th>Sub Name</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Align</th>
                </tr>
            </thead>

            </table>

            <br><br><br>

            </div>



            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">



            

              <div class="form-group">

                    <label class="col-md-3 control-label" for="Cust-name">Upload Section</label>

                    <div class="col-md-7">

                        <input type="file" name="excel_file" id="excel_file" class="form-control">

                    </div>

                </div>

                

                <input type="submit" class="btn btn-primary" Value="Upload Section">

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