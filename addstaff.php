<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Initialize variables
$imgname = '';
$name = $tfname = $tmname = $tdob = $leatestdegree = $mob = $deg = $teachersl = $joindate = '';

// Create img directory if it doesn't exist
if (!is_dir('img')) {
    mkdir('img', 0755, true);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ?? '';
    $tfname = $_POST['tfname'] ?? '';
    $tmname = $_POST['tmname'] ?? '';
    $tdob = $_POST['tdob'] ?? '';
    $leatestdegree = $_POST['leatestdegree'] ?? '';
    $mob = $_POST['mob'] ?? '';
    $deg = $_POST['deg'] ?? '';
    $teachersl = $_POST['teachersl'] ?? '';
    $joindate = $_POST['joindate'] ?? '';
    $imgname = '';

    if (isset($_POST['cropped_image']) && !empty($_POST['cropped_image'])) {
        $imageData = $_POST['cropped_image'];
        if (strpos($imageData, 'data:image') === 0) {
            $image_parts = explode(";base64,", $imageData);
            $image_base64 = base64_decode($image_parts[1]);
            $imgname = preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '_' . time() . '.png';
            $destination = "img/" . $imgname;
            
            if (file_put_contents($destination, $image_base64)) {
                // Image saved successfully
            } else {
                echo '<div class="alert alert-danger">Error saving image. Please check directory permissions.</div>';
            }
        }
    }

    require "interdb.php";
    $sql = "INSERT INTO staff (name, tfname, tmname, tdob, leatestdegree, mob, degnation, teachersl, joindate, image) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $tfname, $tmname, $tdob, $leatestdegree, $mob, $deg, $teachersl, $joindate, $imgname);

    if(mysqli_stmt_execute($stmt)){
        echo '<div class="alert alert-success">Staff added successfully!</div>';
        // Reset form fields after successful submission
        $name = $tfname = $tmname = $tdob = $leatestdegree = $mob = $deg = $teachersl = $joindate = '';
        $imgname = '';
    } else {
        echo '<div class="alert alert-danger">Error: ' . mysqli_error($link) . '</div>';
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CropperJS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <style>
        .teacher-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .img-container {
            max-height: 400px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
        }
        #imageToCrop {
            max-width: 100%;
            max-height: 400px;
        }
        .floating-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
            animation: slideIn 0.5s forwards, fadeOut 0.5s 4.5s forwards;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        .section-title {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .img-container {
                max-height: 300px;
            }
            #imageToCrop {
                max-height: 300px;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 mb-0">Staff Management</h2>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='class_teacher_subject.php'">
                        <i class="bi bi-house-fill me-1"></i> Back to Panel
                    </button>
                </div>
                
                <!-- Add Teacher Form -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Add New Staff</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="staffForm">
                            <div class="row">
                                <!-- Personal Info -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="bi bi-person-fill me-2"></i>Personal Information
                                        </h5>
                                        <div class="mb-3">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($name); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Father's Name</label>
                                            <input type="text" name="tfname" class="form-control" value="<?php echo htmlspecialchars($tfname); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mother's Name</label>
                                            <input type="text" name="tmname" class="form-control" value="<?php echo htmlspecialchars($tmname); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" name="tdob" class="form-control" required value="<?php echo htmlspecialchars($tdob); ?>">
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional Info -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="bi bi-briefcase-fill me-2"></i>Professional Information
                                        </h5>
                                        <div class="mb-3">
                                            <label class="form-label">Highest Degree <span class="text-danger">*</span></label>
                                            <input type="text" name="leatestdegree" class="form-control" required value="<?php echo htmlspecialchars($leatestdegree); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="text" name="mob" class="form-control" required value="<?php echo htmlspecialchars($mob); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="deg" class="form-control" required value="<?php echo htmlspecialchars($deg); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Staff SL Number <span class="text-danger">*</span></label>
                                            <input type="number" name="teachersl" class="form-control" required value="<?php echo htmlspecialchars($teachersl); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Join Date <span class="text-danger">*</span></label>
                                            <input type="date" name="joindate" class="form-control" required value="<?php echo htmlspecialchars($joindate); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo Upload Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="bi bi-camera-fill me-2"></i>Staff Photo
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

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save-fill"></i> Save Staff
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Teacher List -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Staff List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Join Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require "interdb.php";
                                        $sel_query = "SELECT * FROM staff ORDER BY id ASC";
                                        $result = mysqli_query($link, $sel_query);
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>
                                                <td>'.$row["id"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["degnation"].'</td>
                                                <td>'.$row["joindate"].'</td>
                                                <td>
                                                    <a href="view_staff.php?id='.$row['id'].'" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                    <a href="staffedit.php?id='.$row['id'].'" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <a href="deletestaff.php?id='.$row['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>';
                                        }
                                        mysqli_close($link);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Image Upload Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">
                        <i class="bi bi-camera me-2"></i>Update Staff Photo
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
                            <div id="cropContainer" style="display: none;">
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CropperJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    
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
                        aspectRatio: NaN,
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