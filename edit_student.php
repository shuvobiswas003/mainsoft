<?php
require "interdb.php";

// Check if user is logged in
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Get student ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch student data
$student = [];
if ($id > 0) {
    $query = "SELECT id, roll, name, fname, mname, sex, dob, birthid, fnid, mnid, 
                     address, mobile, uniqid, religion, classname, secgroup 
              FROM student WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $fname = $_POST['fname'] ?? '';
    $mname = $_POST['mname'] ?? '';
    $sex = $_POST['sex'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $birthid = $_POST['birthid'] ?? '';
    $fnid = $_POST['fnid'] ?? '';
    $mnid = $_POST['mnid'] ?? '';
    $address = $_POST['address'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $religion = $_POST['religion'] ?? '';
    
    $updateQuery = "UPDATE student SET 
                    name = ?,
                    fname = ?,
                    mname = ?,
                    sex = ?,
                    dob = ?,
                    birthid = ?,
                    fnid = ?,
                    mnid = ?,
                    address = ?,
                    mobile = ?,
                    religion = ?
                    WHERE id = ?";
    
    $stmt = $link->prepare($updateQuery);
    $stmt->bind_param("sssssssssssi", 
        $name, $fname, $mname, $sex, $dob, 
        $birthid, $fnid, $mnid, $address, $mobile, 
        $religion, $id);
    
    if ($stmt->execute()) {
        $success = "Student record updated successfully!";
        // Refresh student data
        $query = "SELECT id, roll, name, fname, mname, sex, dob, birthid, fnid, mnid, 
                         address, mobile, uniqid, religion, classname, secgroup 
                  FROM student WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();
    } else {
        $error = "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-container">
                    <h2 class="text-center">Edit Student Record</h2>
                    
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <?php if (empty($student)): ?>
                        <div class="alert alert-danger">Student not found.</div>
                    <?php else: ?>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Roll Number</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($student['roll']); ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Student Name*</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Father's Name*</label>
                                        <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($student['fname']); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Mother's Name*</label>
                                        <input type="text" name="mname" class="form-control" value="<?php echo htmlspecialchars($student['mname']); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Gender*</label>
                                        <select name="sex" class="form-control" required>
                                            <option value="Male" <?php echo $student['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo $student['sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                            <option value="Other" <?php echo $student['sex'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth*</label>
                                        <input type="date" name="dob" class="form-control" value="<?php echo htmlspecialchars($student['dob']); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Birth Certificate ID</label>
                                        <input type="text" name="birthid" class="form-control" value="<?php echo htmlspecialchars($student['birthid']); ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Father's NID</label>
                                        <input type="text" name="fnid" class="form-control" value="<?php echo htmlspecialchars($student['fnid']); ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Mother's NID</label>
                                        <input type="text" name="mnid" class="form-control" value="<?php echo htmlspecialchars($student['mnid']); ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <select name="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option value="Islam" <?php echo $student['religion'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                            <option value="Hindu" <?php echo $student['religion'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                            <option value="Christianity" <?php echo $student['religion'] == 'Christianity' ? 'selected' : ''; ?>>Christianity</option>
                                            <option value="Buddhism" <?php echo $student['religion'] == 'Buddhism' ? 'selected' : ''; ?>>Buddhism</option>
                                            <option value="Other" <?php echo !in_array($student['religion'], ['Islam', 'Hindu', 'Christianity', 'Buddhism']) && !empty($student['religion']) ? 'selected' : ''; ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <textarea name="address" class="form-control" required><?php echo htmlspecialchars($student['address']); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number*</label>
                                        <input type="text" name="mobile" class="form-control" value="<?php echo htmlspecialchars($student['mobile']); ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Student
                                </button>
                                <a href="javascript:window.close()" class="btn btn-default">
                                    <i class="fa fa-times"></i> Close
                                </a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>