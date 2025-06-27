<?php
// Initialize the session
session_start();
 
// Check if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include database connection
require "interdb.php";

// Get teacher ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : die('<div class="alert alert-danger">ERROR: Teacher ID not found.</div>');

// Fetch teacher data
$query = "SELECT * FROM teacher WHERE id = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$teacher = $result->fetch_assoc();

if(!$teacher) {
    die('<div class="alert alert-danger">ERROR: Teacher not found.</div>');
}

// Initialize variables for form data
$name = $teacher['name'];
$tfname = $teacher['tfname'];
$tmname = $teacher['tmname'];
$tdob = $teacher['tdob'];
$leatestdegree = $teacher['leatestdegree'];
$mob = $teacher['mob'];
$deg = $teacher['degnation'];
$teachersl = $teacher['teachersl'];
$joindate = $teacher['joindate'];
$imgname = $teacher['image'];

// Process form data when submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get form data
    $name = $_POST['name'];
    $tfname = $_POST['tfname'];
    $tmname = $_POST['tmname'];
    $tdob = $_POST['tdob'];
    $leatestdegree = $_POST['leatestdegree'];
    $mob = $_POST['mob'];
    $deg = $_POST['deg'];
    $teachersl = $_POST['teachersl'];
    $joindate = $_POST['joindate'];
    
    // Handle image upload if new image is provided
    if (isset($_POST['cropped_image']) && !empty($_POST['cropped_image'])) {
        $imageData = $_POST['cropped_image'];
        if (strpos($imageData, 'data:image') === 0) {
            $image_parts = explode(";base64,", $imageData);
            $image_base64 = base64_decode($image_parts[1]);
            $imgname = $name . '_' . time() . '.png';
            $destination = "img/" . $imgname;
            
            // Delete old image if it exists
            if($teacher['image'] && file_exists("img/" . $teacher['image'])) {
                unlink("img/" . $teacher['image']);
            }
            
            if(!file_put_contents($destination, $image_base64)) {
                $error_msg = "Failed to save the new image. Please try again.";
            }
        }
    }

    // Update query
    $sql = "UPDATE teacher SET 
            name = ?, 
            tfname = ?, 
            tmname = ?, 
            tdob = ?, 
            leatestdegree = ?, 
            mob = ?, 
            degnation = ?, 
            teachersl = ?, 
            joindate = ?, 
            image = ? 
            WHERE id = ?";
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ssssssssssi", $name, $tfname, $tmname, $tdob, $leatestdegree, $mob, $deg, $teachersl, $joindate, $imgname, $id);
    
    if($stmt->execute()){
        $success_msg = "Teacher updated successfully!";
        // Refresh teacher data
        $query = "SELECT * FROM teacher WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $teacher = $result->fetch_assoc();
    } else {
        $error_msg = "Error updating teacher: " . $stmt->error;
    }
    
    $stmt->close();
}
$link->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --success-color: #1cc88a;
            --danger-color: #e74a3b;
            --warning-color: #f6c23e;
            --light-bg: #f8f9fc;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
        }
        
        .teacher-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        }
        
        .form-section {
            background: white;
            padding: 1.5rem;
            border-radius: 0.35rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0.15rem 0.5rem rgba(0, 0, 0, 0.05);
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }
        
        .alert-success {
            background-color: rgba(28, 200, 138, 0.1);
            border-color: rgba(28, 200, 138, 0.3);
            color: #1a9367;
        }
        
        .alert-danger {
            background-color: rgba(231, 74, 59, 0.1);
            border-color: rgba(231, 74, 59, 0.3);
            color: #c0342a;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        
        #cropContainer {
            display: none;
        }
        
        .cropper-container {
            max-height: 400px;
        }
        
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }
        
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
            animation: slideIn 0.5s forwards, fadeOut 0.5s 4.5s forwards;
        }
        
        @keyframes slideIn {
            from { right: -100%; opacity: 0; }
            to { right: 20px; opacity: 1; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Floating Alert for Success/Error Messages -->
                <?php if(isset($success_msg)): ?>
                    <div class="floating-alert alert alert-success alert-dismissible fade show shadow">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <?php echo $success_msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($error_msg)): ?>
                    <div class="floating-alert alert alert-danger alert-dismissible fade show shadow">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?php echo $error_msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="bi bi-pencil-square me-2"></i>Edit Teacher
                        </h4>
                        <a href="addteacher.php" class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="teacherForm">
                            <div class="row">
                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="bi bi-person-lines-fill me-2"></i>Personal Information
                                        </h5>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Father's Name</label>
                                            <input type="text" name="tfname" class="form-control" value="<?php echo htmlspecialchars($tfname); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Mother's Name</label>
                                            <input type="text" name="tmname" class="form-control" value="<?php echo htmlspecialchars($tmname); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" name="tdob" class="form-control" value="<?php echo htmlspecialchars($tdob); ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional Information -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="bi bi-briefcase-fill me-2"></i>Professional Information
                                        </h5>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Highest Degree <span class="text-danger">*</span></label>
                                            <input type="text" name="leatestdegree" class="form-control" value="<?php echo htmlspecialchars($leatestdegree); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Contact Number <span class="text-danger">*</span></label>
                                            <input type="text" name="mob" class="form-control" value="<?php echo htmlspecialchars($mob); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="deg" class="form-control" value="<?php echo htmlspecialchars($deg); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Teacher SL Number <span class="text-danger">*</span></label>
                                            <input type="number" name="teachersl" class="form-control" value="<?php echo htmlspecialchars($teachersl); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Join Date <span class="text-danger">*</span></label>
                                            <input type="date" name="joindate" class="form-control" value="<?php echo htmlspecialchars($joindate); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo Upload Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="bi bi-camera-fill me-2"></i>Teacher Photo
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <img id="previewImg" src="img/<?php echo $imgname ? $imgname : 'default.png'; ?>" class="teacher-img mb-3">
                                        <div class="text-muted small">Current Photo</div>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                            <i class="bi bi-camera-fill me-2"></i> Change Photo
                                        </button>
                                        <small class="text-muted d-block mt-2">Click to upload a new photo or take one with your camera</small>
                                        <input type="hidden" name="cropped_image" id="croppedImage" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                
                                <a href="addteacher.php" class="btn btn-sm btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i> Back to List
                                </a>

                                <button type="reset" class="btn btn-outline-secondary me-2">
                                    <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save-fill me-2"></i> Update Teacher
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Upload Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">
                        <i class="bi bi-camera me-2"></i>Update Teacher Photo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img id="currentImg" src="img/<?php echo $imgname ? $imgname : 'default.png'; ?>" class="teacher-img mb-3">
                            <div class="d-grid gap-2">
                                <button type="button" id="captureBtn" class="btn btn-primary">
                                    <i class="bi bi-camera-fill me-2"></i> Take Photo
                                </button>
                                <label for="fileInput" class="btn btn-outline-primary">
                                    <i class="bi bi-upload me-2"></i> Upload Photo
                                </label>
                                <input type="file" id="fileInput" accept="image/*" capture="environment" class="d-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="cropContainer">
                                <div class="img-container mb-3">
                                    <img id="imageToCrop" class="img-fluid rounded">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="button" id="rotateLeftBtn" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-counterclockwise me-2"></i> Rotate Left
                                    </button>
                                    <button type="button" id="rotateRightBtn" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise me-2"></i> Rotate Right
                                    </button>
                                    <button type="button" id="cropBtn" class="btn btn-success">
                                        <i class="bi bi-check-circle me-2"></i> Crop & Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & Cropper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
    <script>
        let cropper;
        
        // Open camera/file selection
        document.getElementById('captureBtn').addEventListener('click', function() {
            document.getElementById('fileInput').setAttribute('capture', 'environment');
            document.getElementById('fileInput').click();
        });

        // Handle file selection
        document.getElementById('fileInput').addEventListener('change', function(e) {
            if (e.target.files.length) {
                const file = e.target.files[0];
                
                // Validate file type
                if (!file.type.match('image.*')) {
                    alert('Please select an image file (JPEG, PNG)');
                    return;
                }
                
                // Validate file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Image size should be less than 5MB');
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('imageToCrop').src = event.target.result;
                    document.getElementById('cropContainer').style.display = 'block';
                    
                    // Initialize cropper
                    if (cropper) cropper.destroy();
                    cropper = new Cropper(document.getElementById('imageToCrop'), {
                        aspectRatio: 3/4,
                        viewMode: 1,
                        autoCropArea: 0.8,
                        responsive: true,
                        restore: true,
                        guides: true,
                        center: true,
                        highlight: true,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        // Rotate buttons
        document.getElementById('rotateLeftBtn').addEventListener('click', function() {
            cropper.rotate(-90);
        });
        
        document.getElementById('rotateRightBtn').addEventListener('click', function() {
            cropper.rotate(90);
        });

        // Crop image
        document.getElementById('cropBtn').addEventListener('click', function() {
            const canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400,
                fillColor: '#fff',
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            
            if (canvas) {
                const croppedImage = canvas.toDataURL('image/jpeg', 0.9);
                document.getElementById('previewImg').src = croppedImage;
                document.getElementById('croppedImage').value = croppedImage;
                
                // Hide modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('imageModal'));
                modal.hide();
                
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'floating-alert alert alert-success alert-dismissible fade show shadow';
                toast.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Photo updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                document.body.appendChild(toast);
                
                // Remove toast after animation
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }
        });
    </script>
</body>
</html>