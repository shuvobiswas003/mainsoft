<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require 'interdb.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT * FROM student WHERE id = ?";
$init_stmt = $link->prepare($query);
$init_stmt->bind_param("i", $id);
$init_stmt->execute();
$result = $init_stmt->get_result();
$row = $result->fetch_assoc();
$init_stmt->close();

if (!$row) {
    die("No student found with ID: $id");
}

// Class number to name mapping
$classMap = [
    -1 => 'Nursery',
    0 => 'KG',
    1 => 'Class One',
    2 => 'Class Two',
    3 => 'Class Three',
    4 => 'Class Four',
    5 => 'Class Five',
    6 => 'Class Six',
    7 => 'Class Seven',
    8 => 'Class Eight',
    9 => 'Class Nine',
    10 => 'Class Ten',
    11 => 'Class Eleven',
    12 => 'Class Twelve'
];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new']) && $_POST['new'] == 1) {
    $stupevid = $_POST['stupevid'] ?? '';
    $id = intval($_POST['id'] ?? 0);
    $nameb = mysqli_real_escape_string($link, $_POST['nameb'] ?? '');
    $fnameb = mysqli_real_escape_string($link, $_POST['fnameb'] ?? '');
    $mnameb = mysqli_real_escape_string($link, $_POST['mnameb'] ?? '');
    $name = mysqli_real_escape_string($link, $_POST['name'] ?? '');
    $fname = mysqli_real_escape_string($link, $_POST['fname'] ?? '');
    $mname = mysqli_real_escape_string($link, $_POST['mname'] ?? '');
    $sex = mysqli_real_escape_string($link, $_POST['sex'] ?? '');
    $religion = mysqli_real_escape_string($link, $_POST['religion'] ?? '');
    $brithid = mysqli_real_escape_string($link, $_POST['brithid'] ?? '');
    $sdob = $_POST['sdob'] ?? '';
    $dob = date("Y-m-d", strtotime($sdob));
    $fnid = mysqli_real_escape_string($link, $_POST['fnid'] ?? '');
    $mnid = mysqli_real_escape_string($link, $_POST['mnid'] ?? '');
    $classnumber = intval($_POST['classnumber'] ?? 0);
    $classname = $classMap[$classnumber] ?? '';
    $secgroup = mysqli_real_escape_string($link, $_POST['secgroup'] ?? '');
    $roll = intval($_POST['roll'] ?? 0);
    $address = mysqli_real_escape_string($link, $_POST['address'] ?? '');
    $mobile = mysqli_real_escape_string($link, $_POST['mobile'] ?? '');

    $imgname = $row['imgname'] ?? '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['profile_pic']['tmp_name'];

        if (is_uploaded_file($tmpName) && getimagesize($tmpName) !== false) {
            $uploadDir = 'img/student/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $fileExt = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
            $fileName = 'student_' . $id . '_' . time() . '.' . $fileExt;
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($tmpName, $targetPath)) {
                if (!empty($row['imgname']) && file_exists($uploadDir . $row['imgname'])) {
                    unlink($uploadDir . $row['imgname']);
                }
                $imgname = $fileName;
            }
        }
    }

    $uniqid = $classnumber . $secgroup . $roll;

    $sql = "UPDATE student SET 
            nameb=?, fnameb=?, mnameb=?, name=?, fname=?, mname=?, 
            birthid=?, dob=?, fnid=?, mnid=?, address=?, sex=?, religion=?,
            classnumber=?, classname=?, secgroup=?, roll=?, mobile=?, uniqid=?, imgname=?
            WHERE id=?";

    $stmt = $link->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $link->error);
    }

    $stmt->bind_param(
        "ssssssssssssssisssssi",
        $nameb, $fnameb, $mnameb, $name, $fname, $mname,
        $brithid, $dob, $fnid, $mnid, $address, $sex, $religion,
        $classnumber, $classname, $secgroup, $roll, $mobile, $uniqid, $imgname,
        $id
    );

    if ($stmt->execute()) {
        $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Student updated successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

        // Refresh student data
        $refresh_stmt = $link->prepare("SELECT * FROM student WHERE id = ?");
        $refresh_stmt->bind_param("i", $id);
        $refresh_stmt->execute();
        $result = $refresh_stmt->get_result();
        $row = $result->fetch_assoc();
        $refresh_stmt->close();
    } else {
        $status = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error!</strong> Unable to update student: " . $stmt->error . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }

    $stmt->close();
}

// Fetch available classes from database
$classes_query = "SELECT DISTINCT classnumber FROM student ORDER BY classnumber";
$classes_result = $link->query($classes_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student - School Management System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #3b7ddd;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        .profile-image-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 20px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }
        
        .profile-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-image-upload {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .profile-image-upload:hover {
            background: rgba(0, 0, 0, 0.7);
        }
        
        .form-section {
            background: #fff;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .form-section h3 {
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .required-field::after {
            content: " *";
            color: var(--danger-color);
        }
        
        .bangla-font {
            font-family: 'SolaimanLipi', 'Siyam Rupali', Arial, sans-serif;
        }
        
        .nav-tabs .nav-link {
            color: var(--secondary-color);
            font-weight: 500;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(59, 125, 221, 0.25);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #2c6ecb;
            border-color: #2a67c1;
        }
        
        .image-cropper-modal .modal-dialog {
            max-width: 800px;
        }
        
        .cropper-container {
            margin: 0 auto;
        }
        
        @media (max-width: 768px) {
            .profile-image-container {
                width: 150px;
                height: 150px;
            }
            
            .form-section {
                padding: 15px;
            }
        }
        
        .camera-options {
            display: none;
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            text-align: center;
        }
        
        .camera-options.show {
            display: block;
        }
        
        .camera-btn {
            margin: 0 5px;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        
        .camera-btn.file {
            background-color: var(--primary-color);
        }
        
        .camera-btn.camera {
            background-color: var(--success-color);
        }
        
        #video {
            background-color: #000;
            max-width: 100%;
            max-height: 400px;
        }
        
        #camera-notice {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-school me-2"></i>School Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php"><i class="fas fa-home me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="studentdashboard.php?classnumber=<?php echo $row['classnumber']?>"><i class="fas fa-users me-1"></i> Students</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2">
                            <span><?php echo htmlspecialchars($_SESSION['username'] ?? 'Admin'); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header bg-white border-bottom-0 py-3">
                        <h2 class="h4 mb-0 d-flex align-items-center">
                            <i class="fas fa-user-edit me-2 text-primary"></i>
                            Edit Student
                        </h2>
                    </div>
                    
                    <div class="card-body">
                        <?php if(isset($status)) echo $status; ?>
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="new" value="1">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <input type="hidden" name="stupevid" value="<?php echo htmlspecialchars($row['uniqid']); ?>">
                            
                            <!-- Profile Picture Section -->
                            <div class="row mb-4">
                                <div class="col-md-3 mx-auto text-center">
                                    <div class="profile-image-container">
                                        <?php if(!empty($row['imgname'])): ?>
                                            <img src="img/student/<?php echo htmlspecialchars($row['imgname']); ?>" id="profile-pic-preview" alt="Student Photo">
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/200" id="profile-pic-preview" alt="Student Photo">
                                        <?php endif; ?>
                                        <div class="profile-image-upload" id="upload-trigger">
                                            <i class="fas fa-camera me-1"></i> Change Photo
                                        </div>
                                        <div class="camera-options" id="camera-options">
                                            <div class="camera-btn file" id="file-upload-btn">
                                                <i class="fas fa-folder-open me-1"></i> Choose File
                                            </div>
                                            <div class="camera-btn camera" id="camera-upload-btn">
                                                <i class="fas fa-camera me-1"></i> Take Photo
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" id="profile-pic-input" name="profile_pic" accept="image/*" style="display: none;">
                                    <small class="text-muted">Max 2MB (JPG, PNG)</small>
                                </div>
                            </div>

                            <div class="row">
                                <!-- English Information Section -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3><i class="fas fa-user me-2"></i> Student Information (English)</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Name</label>
                                            <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($row['name']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Father's Name</label>
                                            <input type="text" name="fname" class="form-control" required value="<?php echo htmlspecialchars($row['fname']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Mother's Name</label>
                                            <input type="text" name="mname" class="form-control" required value="<?php echo htmlspecialchars($row['mname']); ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- Bangla Information Section -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3 class="bangla-font"><i class="fas fa-user me-2"></i> শিক্ষার্থীর তথ্য (বাংলা)</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field bangla-font">নাম</label>
                                            <input type="text" name="nameb" class="form-control bangla-font" required value="<?php echo htmlspecialchars($row['nameb']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field bangla-font">পিতার নাম</label>
                                            <input type="text" name="fnameb" class="form-control bangla-font" required value="<?php echo htmlspecialchars($row['fnameb']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field bangla-font">মাতার নাম</label>
                                            <input type="text" name="mnameb" class="form-control bangla-font" required value="<?php echo htmlspecialchars($row['mnameb']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3><i class="fas fa-info-circle me-2"></i> Personal Information</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Gender</label>
                                            <select name="sex" class="form-select" required>
                                                <option value="Male" <?php echo $row['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                                <option value="Female" <?php echo $row['sex'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                                <option value="Other" <?php echo $row['sex'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Religion</label>
                                            <select name="religion" class="form-select">
                                                <option value="">Select Religion</option>
                                                <option value="Islam" <?php echo $row['religion'] == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                                                <option value="Hindu" <?php echo $row['religion'] == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                                                <option value="Christianity" <?php echo $row['religion'] == 'Christianity' ? 'selected' : ''; ?>>Christianity</option>
                                                <option value="Buddhism" <?php echo $row['religion'] == 'Buddhism' ? 'selected' : ''; ?>>Buddhism</option>
                                                <option value="Other" <?php echo !empty($row['religion']) && !in_array($row['religion'], ['Islam', 'Hindu', 'Christianity', 'Buddhism']) ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Date of Birth</label>
                                            <input type="date" name="sdob" class="form-control" required value="<?php echo htmlspecialchars($row['dob']); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3><i class="fas fa-id-card me-2"></i> National ID Information</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Birth ID No</label>
                                            <input type="text" name="brithid" class="form-control" value="<?php echo htmlspecialchars($row['birthid']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Father's NID</label>
                                            <input type="text" name="fnid" class="form-control" value="<?php echo htmlspecialchars($row['fnid']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Mother's NID</label>
                                            <input type="text" name="mnid" class="form-control" value="<?php echo htmlspecialchars($row['mnid']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Academic Information Section -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3><i class="fas fa-graduation-cap me-2"></i> Academic Information</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Class Number</label>
                                            <select name="classnumber" class="form-select" required id="classnumber">
                                                <?php 
                                                if($classes_result->num_rows > 0) {
                                                    $classes_result->data_seek(0); // Reset pointer
                                                    while($class = $classes_result->fetch_assoc()): 
                                                        $selected = ($class['classnumber'] == $row['classnumber']) ? 'selected' : '';
                                                ?>
                                                    <option value="<?php echo $class['classnumber']; ?>" <?php echo $selected; ?>>
                                                        <?php echo $classMap[$class['classnumber']] ?? 'Class '.$class['classnumber']; ?>
                                                    </option>
                                                <?php endwhile; 
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Class Name</label>
                                            <input type="text" name="classname" class="form-control" readonly 
                                                value="<?php echo $classMap[$row['classnumber']] ?? ''; ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Section</label>
                                            <select name="secgroup" class="form-select" required id="secgroup">
                                                <?php
                                                $current_class = $row['classnumber'];
                                                $section_query = "SELECT DISTINCT secgroup FROM student WHERE classnumber = ? ORDER BY secgroup";
                                                $section_stmt = $link->prepare($section_query);
                                                $section_stmt->bind_param("i", $current_class);
                                                $section_stmt->execute();
                                                $section_result = $section_stmt->get_result();
                                                
                                                if($section_result->num_rows > 0) {
                                                    while($section = $section_result->fetch_assoc()): 
                                                        $selected = ($section['secgroup'] == $row['secgroup']) ? 'selected' : '';
                                                ?>
                                                    <option value="<?php echo $section['secgroup']; ?>" <?php echo $selected; ?>>
                                                        <?php echo $section['secgroup']; ?>
                                                    </option>
                                                <?php endwhile; 
                                                } else { ?>
                                                    <option value="<?php echo htmlspecialchars($row['secgroup']); ?>" selected>
                                                        <?php echo htmlspecialchars($row['secgroup']); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Roll Number</label>
                                            <input type="number" name="roll" class="form-control" required value="<?php echo htmlspecialchars($row['roll']); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h3><i class="fas fa-address-book me-2"></i> Contact Information</h3>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Address</label>
                                            <textarea name="address" class="form-control" required><?php echo htmlspecialchars($row['address']); ?></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label required-field">Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control" required value="<?php echo htmlspecialchars($row['mobile']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="studentdashboard.php?classnumber=<?php echo htmlspecialchars($row['classnumber']); ?>" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Students
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Update Student
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Cropper Modal -->
    <div class="modal fade" id="imageCropperModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image-to-crop" src="" alt="Picture to crop" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop-image-btn">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Camera Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Take Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="camera-notice" class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Camera access requires HTTPS or localhost. Please use Chrome or Firefox.
                    </div>
                    <video id="video" width="100%" autoplay style="display: none;"></video>
                    <canvas id="canvas" style="display:none;"></canvas>
                </div>
                <div class="modal-footer">
                    <button id="switch-camera-btn" class="btn btn-secondary" style="display:none;">
    Switch Camera
</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="take-photo-btn" style="display: none;">
                        <i class="fas fa-camera me-1"></i> Take Photo
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="text-muted">© <?php echo date('Y'); ?> School Management System</span>
                </div>
                <div class="col-md-6 text-md-end">
                    <span class="text-muted">Version 1.0.0</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Cropper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    
<script>
    $(document).ready(function() {
        // Class number to name mapping
        const classMap = {
            '-1': 'Nursery',
            '0': 'KG',
            '1': 'Class One',
            '2': 'Class Two',
            '3': 'Class Three',
            '4': 'Class Four',
            '5': 'Class Five',
            '6': 'Class Six',
            '7': 'Class Seven',
            '8': 'Class Eight',
            '9': 'Class Nine',
            '10': 'Class Ten',
            '11': 'Class Eleven',
            '12': 'Class Twelve'
        };

        // Initialize variables
        let cropper;
        const image = document.getElementById('image-to-crop');
        const cropperModal = new bootstrap.Modal(document.getElementById('imageCropperModal'));
        const cameraModal = new bootstrap.Modal(document.getElementById('cameraModal'));
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        let stream = null;
        let currentFacingMode = 'environment'; // Default to back camera

        // Update class name when class number changes
        $('#classnumber').change(function() {
            const classnumber = $(this).val();
            const className = classMap[classnumber] || 'Class ' + classnumber;
            $('input[name="classname"]').val(className);
            
            // Load sections for the selected class
            loadSections(classnumber);
        });

        // Load sections for the current class
        function loadSections(classnumber) {
            $.ajax({
                url: 'get_sections.php?classnumber=' + classnumber,
                type: 'GET',
                success: function(data) {
                    $('#secgroup').html(data);
                    // Set the selected value after loading new options
                    $('#secgroup').val("<?php echo $row['secgroup']; ?>");
                },
                error: function() {
                    $('#secgroup').html('<option value="<?php echo $row['secgroup']; ?>" selected><?php echo $row['secgroup']; ?></option>');
                }
            });
        }

        // Image upload and cropping functionality
        $('#upload-trigger').click(function(e) {
            e.preventDefault();
            $('#camera-options').toggleClass('show');
        });
        
        $('#file-upload-btn').click(function() {
            $('#profile-pic-input').click();
            $('#camera-options').removeClass('show');
        });
        
        $('#camera-upload-btn').click(function() {
            $('#camera-options').removeClass('show');
            startCamera();
        });
        
        // Switch camera button
        $('#switch-camera-btn').click(function() {
            if (stream) {
                // Stop current stream
                stream.getTracks().forEach(track => track.stop());
                // Switch camera
                currentFacingMode = currentFacingMode === 'user' ? 'environment' : 'user';
                startCamera();
            }
        });
        
        $('#profile-pic-input').change(function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size should be less than 2MB');
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    image.src = event.target.result;
                    cropperModal.show();
                }
                
                reader.readAsDataURL(file);
            }
        });
        
        // Initialize cropper with free aspect ratio
        $('#imageCropperModal').on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: NaN, // Free aspect ratio
                viewMode: 1,
                autoCropArea: 0.8,
                responsive: true,
                guides: false,
                movable: true,
                zoomable: true,
                rotatable: true
            });
        }).on('hidden.bs.modal', function() {
            if (cropper) {
                cropper.destroy();
            }
        });
        
        // Crop and save the image
        $('#crop-image-btn').click(function() {
            const canvas = cropper.getCroppedCanvas({
                minWidth: 256,
                minHeight: 256,
                maxWidth: 4096,
                maxHeight: 4096,
                fillColor: '#fff',
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            
            if (canvas) {
                canvas.toBlob(function(blob) {
                    const url = URL.createObjectURL(blob);
                    
                    // Update preview image
                    $('#profile-pic-preview').attr('src', url);
                    
                    // Create a new file from the blob
                    const file = new File([blob], 'cropped-profile.jpg', {type: 'image/jpeg'});
                    
                    // Create a new DataTransfer object and add the file
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    
                    // Update the file input with the new file
                    $('#profile-pic-input')[0].files = dataTransfer.files;
                    
                    // Hide the modal
                    cropperModal.hide();
                }, 'image/jpeg', 0.8);
            }
        });
        
        // Camera functionality - starts with back camera by default
        function startCamera() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ 
                    video: { 
                        width: { ideal: 1280 },
                        height: { ideal: 720 },
                        facingMode: currentFacingMode
                    } 
                })
                .then(function(mediaStream) {
                    stream = mediaStream;
                    video.srcObject = stream;
                    video.style.display = 'block';
                    $('#take-photo-btn').show();
                    $('#switch-camera-btn').show();
                    cameraModal.show();
                })
                .catch(function(error) {
                    console.error("Error accessing camera:", error);
                    // Fallback to front camera if back camera fails
                    if (currentFacingMode === 'environment') {
                        currentFacingMode = 'user';
                        startCamera();
                    } else {
                        alert("Could not access camera: " + error.message);
                    }
                });
            } else {
                alert("Camera access is not supported by your browser");
            }
        }

        // Take photo button click handler - shows cropping modal
        $('#take-photo-btn').click(function() {
            if (!stream) return;
            
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Stop all video tracks
            stream.getTracks().forEach(track => track.stop());
            stream = null;
            
            // Convert canvas to blob and show cropping modal
            canvas.toBlob(function(blob) {
                const url = URL.createObjectURL(blob);
                
                // Close camera modal first
                cameraModal.hide();
                
                // Set the captured image for cropping
                image.src = url;
                cropperModal.show();
                
            }, 'image/jpeg', 0.8);
        });

        // Clean up camera when modal is closed
        $('#cameraModal').on('hidden.bs.modal', function() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            video.style.display = 'none';
            $('#take-photo-btn').hide();
            $('#switch-camera-btn').hide();
        });

        // Form validation
        $('form').submit(function() {
            let isValid = true;
            
            // Check required fields
            $('[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
            
            // Validate mobile number format
            const mobileInput = $('input[name="mobile"]');
            const mobileRegex = /^[0-9]{11}$/;
            if (mobileInput.val() && !mobileRegex.test(mobileInput.val())) {
                isValid = false;
                mobileInput.addClass('is-invalid');
                mobileInput.after('<div class="invalid-feedback">Please enter a valid 11-digit mobile number</div>');
            } else {
                mobileInput.removeClass('is-invalid');
                mobileInput.next('.invalid-feedback').remove();
            }
            
            // Validate birth date (not in future)
            const dobInput = $('input[name="sdob"]');
            if (dobInput.val()) {
                const dob = new Date(dobInput.val());
                const today = new Date();
                if (dob > today) {
                    isValid = false;
                    dobInput.addClass('is-invalid');
                    dobInput.after('<div class="invalid-feedback">Date of birth cannot be in the future</div>');
                } else {
                    dobInput.removeClass('is-invalid');
                    dobInput.next('.invalid-feedback').remove();
                }
            }
            
            return isValid;
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

</body>
</html>