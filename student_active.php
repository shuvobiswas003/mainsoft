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
                                <h4 class="pull-left page-title">Delete Student</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Student</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php
// Include the database connection file
include('interdb.php');

// Get the student ID from the request
$studentID = $_REQUEST['id'];

// Check if the ID is valid
if (empty($studentID) || !is_numeric($studentID)) {
    die("Invalid student ID.");
}

// Start transaction
mysqli_begin_transaction($link);

try {
    // Fetch the row from the student table
    $query = "SELECT * FROM student_deactive WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $studentID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        throw new Exception("No record found with ID $studentID");
    }

    // Fetch row data
    $row = mysqli_fetch_assoc($result);

    // Insert the row into the student_dective table
    $columns = implode(", ", array_keys($row));
    $placeholders = implode(", ", array_fill(0, count($row), "?"));
    $insertQuery = "INSERT INTO student ($columns) VALUES ($placeholders)";
    $insertStmt = mysqli_prepare($link, $insertQuery);

    // Dynamically bind parameters
    $values = array_values($row);
    $types = str_repeat("s", count($values)); // Assuming all fields are strings
    mysqli_stmt_bind_param($insertStmt, $types, ...$values);
    mysqli_stmt_execute($insertStmt);

    // Delete the row from the student table
    $deleteQuery = "DELETE FROM student_deactive WHERE id = ?";
    $deleteStmt = mysqli_prepare($link, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $studentID);
    mysqli_stmt_execute($deleteStmt);

    // Commit the transaction
    mysqli_commit($link);

    echo "Record moved successfully!";
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($link);
    echo "Error: " . $e->getMessage();
}

// Close the prepared statements and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>