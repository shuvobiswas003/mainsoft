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
                <h3 class="panel-title">Upload Subject File</h3>
            </div>
            <div class="panel-body">

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "interdb.php";
    $csvFile = $_FILES['file']['tmp_name'];

// Check the database connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the CSV file
if (($handle = fopen($csvFile, "r")) !== false) {
    // Skip the header row
    fgetcsv($handle);

    // Process each row of the CSV file
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        // Prepare the SQL statement
        $sql = "INSERT INTO subject (classname, classnumber, secgroup, subname, subcode, subfullmarks, gradecode, subteacher, teacherid, uni, barcode)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $link->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssiiisiss", $classname, $classnumber, $secgroup, $subname, $subcode, $subfullmarks, $gradecode, $subteacher, $teacherid, $uni, $barcode);

        // Extract data from the current row
        list(
            $classname,
            $classnumber,
            $secgroup,
            $subname,
            $subcode,
            $subfullmarks,
            $gradecode,
            $subteacher,
            $teacherid,
            $uni,
            $barcode
        ) = $data;

        // Execute the prepared statement
        $stmt->execute();

        // Close the prepared statement
        $stmt->close();
    }

    // Close the CSV file
    fclose($handle);

    echo "Data uploaded successfully!";
} else {
    echo "Failed to open the CSV file.";
}

// Close the database connection
$link->close();


}
?>

        <div class="col-md-12">
    <center>
    <caption><h3>Sample Excel Sheet format</h3></caption>
    </center>
            <table class="table table-bordered">
    <thead>
    <tr>
      <th>Class Name</th>
      <th>Class Number</th>
      <th>Section Group</th>
      <th>Subject Name</th>
      <th>Subject Code</th>
      <th>Subject Full Marks</th>
      <th>Grade Code</th>
      <th>Subject Teacher</th>
      <th>Teacher ID</th>
      <th>Unicode(classnumber+sec+subcode)</th>
      <th>Barcode</th>
    </tr>
  </thead>
            </table>
            <br><br><br>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload Subject</label>
                    <div class="col-md-7">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Upload Subject">
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