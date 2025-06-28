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
    // 1. Get student info including uniqid
    $query = "SELECT * FROM student WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $studentID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        throw new Exception("No record found with ID $studentID");
    }

    $row = mysqli_fetch_assoc($result);
    $studentUniqId = $row['uniqid']; // Assuming 'stuid' is the uniqid field

    // 2. Delete unpaid payment records (totalpay=0)
    $deletePaymentsQuery = "DELETE FROM studentpayment WHERE stuid = ? AND totalpay = 0";
    $deletePaymentsStmt = mysqli_prepare($link, $deletePaymentsQuery);
    mysqli_stmt_bind_param($deletePaymentsStmt, "s", $studentUniqId);
    mysqli_stmt_execute($deletePaymentsStmt);
    $deletedRows = mysqli_affected_rows($link);

    // 3. Move student to deactive table
    $columns = implode(", ", array_keys($row));
    $placeholders = implode(", ", array_fill(0, count($row), "?"));
    $insertQuery = "INSERT INTO student_deactive ($columns) VALUES ($placeholders)";
    $insertStmt = mysqli_prepare($link, $insertQuery);

    $values = array_values($row);
    $types = str_repeat("s", count($values));
    mysqli_stmt_bind_param($insertStmt, $types, ...$values);
    mysqli_stmt_execute($insertStmt);

    // 4. Delete from active student table
    $deleteQuery = "DELETE FROM student WHERE id = ?";
    $deleteStmt = mysqli_prepare($link, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $studentID);
    mysqli_stmt_execute($deleteStmt);

    // Commit transaction
    mysqli_commit($link);

    echo "Success! Deleted $deletedRows unpaid payment records and moved student to deactive list.";
} catch (Exception $e) {
    mysqli_rollback($link);
    echo "Error: " . $e->getMessage();
}

// Clean up
if (isset($stmt)) mysqli_stmt_close($stmt);
if (isset($deletePaymentsStmt)) mysqli_stmt_close($deletePaymentsStmt);
if (isset($insertStmt)) mysqli_stmt_close($insertStmt);
if (isset($deleteStmt)) mysqli_stmt_close($deleteStmt);
mysqli_close($link);
?>

<button class="btn btn-primary"><a href="student_panel.php">Back to Student Panel</a></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>