<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'sms.php';
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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">S.M.S</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->

<!-- SMS Form -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
<div class="form-group">
    <label for="class">Select Class:</label>
    <select class="form-control" id="class" name="class" required>
        <option value="">Select a class</option>
        <?php
        require "interdb.php";
        // Query the database to get distinct class values
        $classQuery = "SELECT DISTINCT classnumber FROM student ORDER BY classnumber";
        $classResult = mysqli_query($link, $classQuery);
        while ($classRow = mysqli_fetch_assoc($classResult)) {
            $classValue = $classRow['classnumber'];
            echo "<option value='$classValue'>Class $classValue</option>";
        }
        mysqli_free_result($classResult);
        ?>
    </select>
</div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send SMS</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class = $_POST['class'];
    $message = $_POST['message'];
    require "interdb.php";
    // Query the database to get students of the selected class
    $sql = "SELECT * FROM student WHERE classnumber = ?";
    $stmt = $link->prepare($sql);
    if (!$stmt) {
        die("Error preparing query: " . mysqli_error($link));
    }
    
    $stmt->bind_param("s", $class);
    if (!$stmt->execute()) {
        die("Error executing query: " . mysqli_error($link));
    }
    
    $studentsResult = $stmt->get_result();

    if (!$studentsResult) {
        die("Error getting result: " . mysqli_error($link));
    }

    while ($student = $studentsResult->fetch_assoc()) {
        $studentRecipientNumber = $student['mobile'];
        
        // Send SMS to each student
        if (sendSMS($studentRecipientNumber, $message)) {
            echo "<p style='color:green;'>SMS sent to {$student['name']}</p>";
        } else {
            echo "<p style='color:red;'>SMS failed for {$student['name']}</p>";
        }
    }
    
    $stmt->close();
}

    ?>
<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>