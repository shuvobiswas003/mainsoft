<?php
// Initialize the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include header files
include 'inc/header.php';
include 'inc/topheader.php';
include 'inc/leftmenu.php';

// Get class and section from request
$classnumber = $_REQUEST['classnumber'];
$secgroupname = $_REQUEST['secgroupname'];
require "interdb.php";

// Start content container
?>
<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Student Registration Processing</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default" style="border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                        <div class="panel-heading" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; border-radius: 10px 10px 0 0;">
                            <h3 class="panel-title" style="font-weight: 300;">
                                <i class="fa fa-users"></i> Processing Class <?php echo $classnumber; ?> - <?php echo $secgroupname; ?>
                            </h3>
                        </div>
                        <div class="panel-body" style="padding: 20px; background-color: #f8f9fa; border-radius: 0 0 10px 10px;">
                            <?php
                            // First delete existing records for this class/section
                            $query = "DELETE FROM sturegsubject WHERE classnumber=$classnumber AND secgroupname='$secgroupname'";
                            $delete_result = mysqli_query($link, $query);
                            
                            if($delete_result) {
                                echo "<div class='alert alert-success' style='border-radius: 5px;'>
                                    <i class='fa fa-check-circle'></i> Cleared previous registration data for Class $classnumber - $secgroupname
                                </div>";
                            } else {
                                echo "<div class='alert alert-danger' style='border-radius: 5px;'>
                                    <i class='fa fa-exclamation-circle'></i> Error clearing previous data: " . mysqli_error($link) . "
                                </div>";
                            }

                            // Query to get all students in the specified class and section/group
                            $sel_query = "SELECT * FROM student WHERE classnumber = $classnumber AND secgroup = '$secgroupname' ORDER BY roll";
                            $result = mysqli_query($link, $sel_query);

                            if(mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $roll = $row['roll'];
                                    $uniqid = $row['uniqid'];
                                    $religion = strtolower($row['religion']); // Normalize religion to lowercase
                                    $student_name = $row['name'];

                                    // Insert into sturegstatus table
                                    $regstatus = 1;
                                    $sql = "INSERT INTO sturegstatus(classnumber, secgroupname, roll, uniqid, regstatus) 
                                            VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$regstatus') 
                                            ON DUPLICATE KEY UPDATE regstatus='$regstatus'";
                                    
                                    echo "<div class='student-card' style='background: white; border-radius: 5px; padding: 15px; margin-bottom: 15px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);'>
                                            <h4 style='margin-top: 0; color: #333;'>
                                                <i class='fa fa-user'></i> Roll $roll - $student_name
                                            </h4>";
                                    
                                    if (mysqli_query($link, $sql)) {
                                        echo "<p style='color: #28a745; margin-bottom: 10px;'>
                                                <i class='fa fa-check'></i> Registration status updated successfully
                                            </p>";
                                    } else {
                                        echo "<p style='color: #dc3545; margin-bottom: 10px;'>
                                                <i class='fa fa-exclamation-triangle'></i> Error updating registration status: " . mysqli_error($link) . "
                                            </p>";
                                    }

                                    // Get all subjects except religion subjects (110,111,112,113)
                                    $sel_query1 = "SELECT * FROM subject WHERE subcode NOT IN (110, 111, 112, 113) and classnumber='$classnumber' AND secgroup='$secgroupname'";
                                    $result1 = mysqli_query($link, $sel_query1);

                                    echo "<div class='subject-list' style='margin-left: 20px;'>";
                                    echo "<h5 style='color: #6c757d; margin-bottom: 10px;'>Core Subjects:</h5>";
                                    
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $subcode = $row1['subcode'];
                                        $subname = $row1['subname'];
                                        $substatus = 1;

                                        // Unique identifier for subject status
                                        $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;

                                        // Insert into sturegsubject table
                                        $sql = "INSERT INTO sturegsubject(classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                                VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$subcode', '$subname', '$substatus', '$unisubstatus') 
                                                ON DUPLICATE KEY UPDATE substatus='$substatus'";
                                        if (mysqli_query($link, $sql)) {
                                            echo "<p style='color: #17a2b8; margin-bottom: 5px;'>
                                                    <i class='fa fa-book'></i> $subcode - $subname
                                                </p>";
                                        }
                                    }
                                    echo "</div>";

                                    // Add religion-specific subject based on the student's religion and class range
                                    echo "<div class='religion-subject' style='margin-left: 20px; margin-top: 10px;'>";
                                    echo "<h5 style='color: #6c757d; margin-bottom: 10px;'>Religion Subject:</h5>";
                                    
                                    $religion_subject_added = false;
                                    
                                    if ($classnumber >= 3 && $classnumber <= 9) {
                                        $substatus = 1;
                                        
                                        // Determine religion subject code based on religion
                                        switch($religion) {
                                            case 'hindu':
                                                $subcode = 111;
                                                $subname = "Hindu Religion Studies";
                                                break;
                                            case 'islam':
                                                $subcode = 110;
                                                $subname = "Islamic Studies";
                                                break;
                                            case 'christian':
                                                $subcode = 112;
                                                $subname = "Christian Religion Studies";
                                                break;
                                            case 'bouddha':
                                                $subcode = 113;
                                                $subname = "Buddhist Studies";
                                                break;
                                            default:
                                                $subcode = 110; // Default to Islamic Studies
                                                $subname = "Religion";
                                        }
                                        
                                        $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;
                                        $sql = "INSERT INTO sturegsubject(classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                                VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$subcode', '$subname', '$substatus', '$unisubstatus') 
                                                ON DUPLICATE KEY UPDATE substatus='$substatus'";
                                        if (mysqli_query($link, $sql)) {
                                            echo "<p style='color: #6f42c1; margin-bottom: 5px;'>
                                                    <i class='fa fa-star'></i> $subcode - $subname (Religion: " . ucfirst($religion) . ")
                                                </p>";
                                            $religion_subject_added = true;
                                        }
                                    }
                                    
                                    if (!$religion_subject_added) {
                                        echo "<p style='color: #6c757d; font-style: italic;'>
                                                <i class='fa fa-info-circle'></i> No religion subject required for this class
                                            </p>";
                                    }
                                    
                                    echo "</div>";
                                    echo "</div>"; // Close student-card
                                }
                            } else {
                                echo "<div class='alert alert-warning' style='border-radius: 5px;'>
                                    <i class='fa fa-exclamation-triangle'></i> No students found in Class $classnumber - $secgroupname
                                </div>";
                            }
                            ?>
                            
                            <div class="text-center" style="margin-top: 20px;">
                                <a href="viewstureg.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $secgroupname; ?>" class="btn btn-primary" style="border-radius: 5px;">
                                    <i class="fa fa-arrow-left"></i> Back to Registration View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>