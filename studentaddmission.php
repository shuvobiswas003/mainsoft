<?php
// Initialize the session
session_start();
 
// Check if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$classnumber = $_REQUEST['classnumber'] ?? '';
$secgroupname = $_REQUEST['secgroupname'] ?? '';

// Process form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Collect form data
    $student_data = [
        'nameb' => $_POST['nameb'] ?? '',
        'fnameb' => $_POST['fnameb'] ?? '',
        'mnameb' => $_POST['mnameb'] ?? '',
        'name' => $_POST['name'] ?? '',
        'fname' => $_POST['fname'] ?? '',
        'mname' => $_POST['mname'] ?? '',
        'sex' => $_POST['sex'] ?? 'Male',
        'brithid' => $_POST['brithid'] ?? '',
        'sdob' => $_POST['sdob'] ?? '',
        'dob' => !empty($_POST['sdob']) ? date("Y-m-d", strtotime($_POST['sdob'])) : '',
        'fnid' => $_POST['fnid'] ?? '',
        'mnid' => $_POST['mnid'] ?? '',
        'classnumber' => $_POST['classnumber'] ?? '',
        'classname' => $_POST['classname'] ?? '',
        'secgroupname' => $_POST['secgroupname'] ?? '',
        'roll' => $_POST['roll'] ?? '',
        'address' => $_POST['address'] ?? '',
        'mobile' => $_POST['mobile'] ?? '',
        'uniqid' => $_POST['classnumber'].$_POST['secgroupname'].$_POST['roll']
    ];

    // Handle image upload - prioritize cropped image over file upload
    $imgname = 'default.png';
    $target_dir = "img/student/";
    
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // First check for cropped image
    if (!empty($_POST['cropped_image'])) {
        $cropped_image = $_POST['cropped_image'];
        $img_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $cropped_image));
        $imgname = uniqid() . '.jpg';
        file_put_contents($target_dir . $imgname, $img_data);
    } 
    // Then check for file upload
    elseif (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imgname = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $imgname);
    }

    // Insert to database
    require "interdb.php";
    $sql = "INSERT INTO student(classnumber,classname,secgroup,roll,name,fname,mname,nameb,fnameb,mnameb,dob,birthid,fnid,mnid,address,mobile,uniqid,sex,imgname) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", 
        $student_data['classnumber'], $student_data['classname'], $student_data['secgroupname'], 
        $student_data['roll'], $student_data['name'], $student_data['fname'], 
        $student_data['mname'], $student_data['nameb'], $student_data['fnameb'], 
        $student_data['mnameb'], $student_data['dob'], $student_data['brithid'], 
        $student_data['fnid'], $student_data['mnid'], $student_data['address'], 
        $student_data['mobile'], $student_data['uniqid'], $student_data['sex'], $imgname);

    if(mysqli_stmt_execute($stmt)){
        $success_message = "Student Admitted Successfully";
    } else {
        $error_message = "Error: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CropperJS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <style>
        .form-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .photo-container {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto;
            cursor: pointer;
        }
        .photo-container img {
            max-width: 100%;
            max-height: 100%;
        }
        .required-field::after {
            content: " *";
            color: red;
        }
        @media (max-width: 768px) {
            .photo-container {
                width: 120px;
                height: 120px;
            }
            .form-section {
                padding: 15px;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-person-plus me-2"></i>Student Admission</h4>
                    </div>
                    
                    <div class="card-body">
                        <?php if(isset($success_message)): ?>
                            <div class="alert alert-success"><?= $success_message ?></div>
                        <?php endif; ?>
                        <?php if(isset($error_message)): ?>
                            <div class="alert alert-danger"><?= $error_message ?></div>
                        <?php endif; ?>
                        
                        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                            <!-- Photo Section -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="bi bi-camera-fill me-2"></i>Student Photo
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <img id="previewImg" src="img/student/default.png" class="img-thumbnail mb-3" style="width:150px;height:150px;object-fit:cover;">
                                        <div class="text-muted small">Current Photo</div>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                            <i class="bi bi-camera-fill me-2"></i> Change Photo
                                        </button>
                                        <small class="text-muted d-block mt-2">Click to upload a new photo or take one with your camera</small>
                                        <input type="hidden" name="cropped_image" id="croppedImage" value="">
                                        <input type="file" id="imageInput" name="image" accept="image/*" class="d-none">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Rest of your form remains the same -->
                            <!-- Student Information -->
                            <div class="form-section">
                                <h5 class="text-center mb-4"><i class="bi bi-person-vcard me-2"></i>Student Information</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label required-field">Name (English)</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nameb" class="form-label required-field">নাম (Bangla)</label>
                                        <input type="text" class="form-control" id="nameb" name="nameb" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="fname" class="form-label required-field">Father's Name (English)</label>
                                        <input type="text" class="form-control" id="fname" name="fname" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fnameb" class="form-label required-field">পিতার নাম (Bangla)</label>
                                        <input type="text" class="form-control" id="fnameb" name="fnameb" required>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="mname" class="form-label">Mother's Name (English)</label>
                                        <input type="text" class="form-control" id="mname" name="mname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mnameb" class="form-label">মাতার নাম (Bangla)</label>
                                        <input type="text" class="form-control" id="mnameb" name="mnameb">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="sex" class="form-label required-field">Gender</label>
                                        <select class="form-select" id="sex" name="sex" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sdob" class="form-label required-field">Date of Birth</label>
                                        <input type="date" class="form-control" id="sdob" name="sdob" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- National Data -->
                            <div class="form-section">
                                <h5 class="text-center mb-4"><i class="bi bi-file-earmark-text me-2"></i>National Data</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="brithid" class="form-label">Birth ID No</label>
                                        <input type="text" class="form-control" id="brithid" name="brithid">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fnid" class="form-label">Father's NID</label>
                                        <input type="text" class="form-control" id="fnid" name="fnid">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mnid" class="form-label">Mother's NID</label>
                                        <input type="text" class="form-control" id="mnid" name="mnid">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Academic Information -->
                            <div class="form-section">
                                <h5 class="text-center mb-4"><i class="bi bi-book me-2"></i>Academic Information</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="classnumber" class="form-label required-field">Class Number</label>
                                        <select class="form-select" id="classnumber" name="classnumber" required>
                                            <option value="<?= htmlspecialchars($classnumber) ?>" selected><?= htmlspecialchars($classnumber) ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="classname" class="form-label required-field">Class Name</label>
                                        <select class="form-select" id="classname" name="classname" required>
                                            <?php
                                            if(!empty($classnumber)){
                                                require "interdb.php";
                                                $sel_query = "SELECT * FROM class WHERE classnumber='".mysqli_real_escape_string($link, $classnumber)."'";
                                                $result = mysqli_query($link, $sel_query);
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.htmlspecialchars($row['classname']).'">'.htmlspecialchars($row['classname']).'</option>';
                                                }
                                                mysqli_close($link);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="secgroupname" class="form-label required-field">Section/Group</label>
                                        <select class="form-select" id="secgroupname" name="secgroupname" required>
                                            <option value="<?= htmlspecialchars($secgroupname) ?>" selected><?= htmlspecialchars($secgroupname) ?></option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="roll" class="form-label required-field">Roll Number</label>
                                        <input type="number" class="form-control" id="roll" name="roll" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contact Information -->
                            <div class="form-section">
                                <h5 class="text-center mb-4"><i class="bi bi-telephone me-2"></i>Contact Information</h5>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mobile" class="form-label required-field">Mobile Number</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-save me-2"></i>Submit Admission
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
                        <i class="bi bi-camera me-2"></i>Update Student Photo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img id="currentImg" src="img/student/default.png" class="img-thumbnail mb-3" style="width:200px;height:200px;object-fit:cover;">
                            <div class="d-grid gap-2">
                                <button type="button" id="captureBtn" class="btn btn-primary">
                                    <i class="bi bi-camera-fill me-2"></i> Take Photo
                                </button>
                                <label for="fileInput" class="btn btn-outline-primary">
                                    <i class="bi bi-upload me-2"></i> Upload Photo
                                </label>
                                <input type="file" id="fileInput" accept="image/*" class="d-none">
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
                height: 533,  // 3:4 aspect ratio
                fillColor: '#fff',
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high'
            });
            
            if (canvas) {
                const croppedImage = canvas.toDataURL('image/jpeg', 0.9);
                // Update preview image
                document.getElementById('previewImg').src = croppedImage;
                // Set the hidden input value for form submission
                document.getElementById('croppedImage').value = croppedImage;
                // Also update the modal preview
                document.getElementById('currentImg').src = croppedImage;
                
                // Hide the crop container
                document.getElementById('cropContainer').style.display = 'none';
                
                // Show success message
                const toast = document.createElement('div');
                toast.className = 'alert alert-success alert-dismissible fade show';
                toast.innerHTML = `
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Photo updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                
                // Insert toast after the form header
                const cardHeader = document.querySelector('.card-header');
                cardHeader.parentNode.insertBefore(toast, cardHeader.nextSibling);
                
                // Remove toast after animation
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }
        });
        
        // Reset cropper when modal is closed
        document.getElementById('imageModal').addEventListener('hidden.bs.modal', function () {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            document.getElementById('cropContainer').style.display = 'none';
        });
    </script>
</body>
</html>