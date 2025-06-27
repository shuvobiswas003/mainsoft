<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "interdb.php";

// Initialize variables
$id = $_GET['id'] ?? '';
$name = $tfname = $tmname = $tdob = $leatestdegree = $mob = $deg = $teachersl = $joindate = $image = '';
$error = '';

// Fetch existing staff data
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($id)) {
    $sql = "SELECT * FROM staff WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $tfname = $row['tfname'];
                $tmname = $row['tmname'];
                $tdob = $row['tdob'];
                $leatestdegree = $row['leatestdegree'];
                $mob = $row['mob'];
                $deg = $row['degnation'];
                $teachersl = $row['teachersl'];
                $joindate = $row['joindate'];
                $image = $row['image'];
            } else {
                $error = "No staff member found with that ID.";
            }
        } else {
            $error = "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'] ?? '';
    $tfname = $_POST['tfname'] ?? '';
    $tmname = $_POST['tmname'] ?? '';
    $tdob = $_POST['tdob'] ?? '';
    $leatestdegree = $_POST['leatestdegree'] ?? '';
    $mob = $_POST['mob'] ?? '';
    $deg = $_POST['deg'] ?? '';
    $teachersl = $_POST['teachersl'] ?? '';
    $joindate = $_POST['joindate'] ?? '';
    $imgname = $_POST['existing_image'] ?? '';

    // Handle image upload if new image was cropped
    if (isset($_POST['cropped_image']) && !empty($_POST['cropped_image'])) {
        $imageData = $_POST['cropped_image'];
        if (strpos($imageData, 'data:image') === 0) {
            $image_parts = explode(";base64,", $imageData);
            $image_base64 = base64_decode($image_parts[1]);
            $imgname = preg_replace('/[^a-zA-Z0-9]/', '_', $name) . '_' . time() . '.png';
            $destination = "img/" . $imgname;
            
            if (!is_dir('img')) {
                mkdir('img', 0755, true);
            }
            
            // Delete old image if it exists and is being replaced
            if (!empty($_POST['existing_image']) && file_exists("img/" . $_POST['existing_image'])) {
                unlink("img/" . $_POST['existing_image']);
            }
            
            if (!file_put_contents($destination, $image_base64)) {
                $error = "Error saving image.";
            }
        }
    }

    // Update database
    $sql = "UPDATE staff SET 
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

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssssi", $name, $tfname, $tmname, $tdob, $leatestdegree, $mob, $deg, $teachersl, $joindate, $imgname, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Staff member updated successfully!";
            header("location: addstaff.php");
            exit;
        } else {
            $error = "Error updating record: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Member</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- CropperJS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <style>
        .teacher-img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
        }
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .img-container {
            max-height: 500px;
            overflow: hidden;
        }
        #cameraContainer {
            position: relative;
            display: none;
        }
        #cameraPreview {
            width: 100%;
        }
        #captureFromCameraBtn {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: none;
        }
        #imageToCrop {
            max-width: 100%;
        }
        .toast-container {
            z-index: 1100;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 mb-0">Edit Staff Member</h2>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='addstaff.php'">
                        <i class="bi bi-arrow-left me-1"></i> Back to Staff List
                    </button>
                </div>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <!-- Edit Staff Form -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Staff Information</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="existing_image" value="<?php echo $image; ?>">
                            
                            <div class="row">
                                <!-- Personal Info -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="mb-3 text-primary">Personal Information</h5>
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Father's Name</label>
                                            <input type="text" name="tfname" class="form-control" value="<?php echo $tfname; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mother's Name</label>
                                            <input type="text" name="tmname" class="form-control" value="<?php echo $tmname; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="tdob" class="form-control" value="<?php echo $tdob; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional Info -->
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5 class="mb-3 text-primary">Professional Information</h5>
                                        <div class="mb-3">
                                            <label class="form-label">Highest Degree</label>
                                            <input type="text" name="leatestdegree" class="form-control" value="<?php echo $leatestdegree; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" name="mob" class="form-control" value="<?php echo $mob; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Designation</label>
                                            <input type="text" name="deg" class="form-control" value="<?php echo $deg; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Staff SL Number</label>
                                            <input type="number" name="teachersl" class="form-control" value="<?php echo $teachersl; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Join Date</label>
                                            <input type="date" name="joindate" class="form-control" value="<?php echo $joindate; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo Upload -->
                            <div class="mb-3">
                                <label class="form-label">Photo</label>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <?php if (!empty($image)): ?>
                                        <img src="img/<?php echo $image; ?>" alt="Current Photo" class="teacher-img">
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                        <i class="bi bi-camera-fill"></i> Change Photo
                                    </button>
                                </div>
                                <input type="hidden" name="cropped_image" id="croppedImage">
                                <div class="mt-2">
                                    <img id="previewImg" src="" alt="New Photo Preview" class="teacher-img d-none">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save-fill"></i> Update Staff
                                </button>
                                <a href="deletestaff.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff member?')">
                                    <i class="bi bi-trash-fill"></i> Delete Staff
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-camera me-2"></i>Edit Photo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="img-container mb-3">
                                <!-- Camera preview will go here -->
                                <div id="cameraContainer">
                                    <video id="cameraPreview" autoplay playsinline></video>
                                    <button id="captureFromCameraBtn" class="btn btn-primary">
                                        <i class="bi bi-camera-fill me-2"></i> Capture Photo
                                    </button>
                                </div>
                                <!-- Image for cropping will go here -->
                                <img id="imageToCrop" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-grid gap-2 mb-3">
                                <button type="button" id="captureBtn" class="btn btn-primary">
                                    <i class="bi bi-camera-fill me-2"></i> Choose Image
                                </button>
                                <input type="file" id="fileInput" accept="image/*" class="d-none">
                            </div>
                            
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Crop Tools</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <button type="button" id="zoomIn" class="btn btn-outline-secondary">
                                            <i class="bi bi-zoom-in"></i>
                                        </button>
                                        <button type="button" id="zoomOut" class="btn btn-outline-secondary">
                                            <i class="bi bi-zoom-out"></i>
                                        </button>
                                        <button type="button" id="rotateLeft" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>
                                        <button type="button" id="rotateRight" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-clockwise"></i>
                                        </button>
                                        <button type="button" id="resetCrop" class="btn btn-outline-danger">
                                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                                        </button>
                                    </div>
                                    <button type="button" id="cropBtn" class="btn btn-success w-100">
                                        <i class="bi bi-check-circle-fill me-2"></i> Apply Crop
                                    </button>
                                </div>
                            </div>
                            
                            <div class="alert alert-info small">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                Drag the corners or edges to resize the crop area. You can also move the crop box.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Options Modal -->
    <div class="modal fade" id="optionsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Select Option</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="optionsModalBody">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="useCameraBtn">
                            <i class="bi bi-camera-video-fill me-2"></i> Use Camera
                        </button>
                        <button class="btn btn-outline-primary" id="uploadPhotoBtn">
                            <i class="bi bi-upload me-2"></i> Upload Photo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3"></div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CropperJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            let stream = null;
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            const optionsModal = new bootstrap.Modal(document.getElementById('optionsModal'));
            
            // Show options when capture button is clicked
            document.getElementById('captureBtn').addEventListener('click', function() {
                optionsModal.show();
            });
            
            // Handle camera selection
            document.getElementById('useCameraBtn').addEventListener('click', async function() {
                optionsModal.hide();
                await startCamera();
                imageModal.show();
            });
            
            // Handle upload selection
            document.getElementById('uploadPhotoBtn').addEventListener('click', function() {
                optionsModal.hide();
                document.getElementById('fileInput').click();
            });
            
            // Start camera function
            async function startCamera() {
                try {
                    // Stop any existing stream
                    if (stream) {
                        stream.getTracks().forEach(track => track.stop());
                    }
                    
                    // Get camera stream
                    stream = await navigator.mediaDevices.getUserMedia({ 
                        video: { 
                            facingMode: 'environment',
                            width: { ideal: 1280 },
                            height: { ideal: 720 }
                        },
                        audio: false 
                    });
                    
                    const videoElement = document.getElementById('cameraPreview');
                    videoElement.srcObject = stream;
                    
                    // Show camera container and hide image cropper
                    document.getElementById('cameraContainer').style.display = 'block';
                    document.getElementById('imageToCrop').style.display = 'none';
                    document.getElementById('captureFromCameraBtn').style.display = 'block';
                    
                } catch (err) {
                    console.error("Camera error: ", err);
                    showToast('Could not access camera: ' + err.message, 'danger');
                    // Fall back to file upload
                    document.getElementById('fileInput').click();
                }
            }
            
            // Capture photo from camera
            document.getElementById('captureFromCameraBtn').addEventListener('click', function() {
                const video = document.getElementById('cameraPreview');
                const canvas = document.createElement('canvas');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                
                // Stop camera
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                    stream = null;
                }
                
                // Hide camera preview and show the captured image
                document.getElementById('cameraContainer').style.display = 'none';
                const imageElement = document.getElementById('imageToCrop');
                imageElement.src = canvas.toDataURL('image/jpeg');
                imageElement.style.display = 'block';
                
                // Initialize cropper
                initCropper(imageElement);
            });
            
            // Handle file selection
            document.getElementById('fileInput').addEventListener('change', function(e) {
                if (e.target.files && e.target.files.length) {
                    const file = e.target.files[0];
                    
                    // Validate file type
                    if (!file.type.match('image.*')) {
                        showToast('Please select an image file (JPEG, PNG)', 'danger');
                        return;
                    }
                    
                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        showToast('Image size should be less than 5MB', 'danger');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imageElement = document.getElementById('imageToCrop');
                        imageElement.src = event.target.result;
                        imageElement.style.display = 'block';
                        document.getElementById('cameraContainer').style.display = 'none';
                        
                        initCropper(imageElement);
                        imageModal.show();
                    };
                    reader.onerror = function() {
                        showToast('Error reading image file', 'danger');
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Initialize cropper with free aspect ratio
            function initCropper(imageElement) {
                if (cropper) {
                    cropper.destroy();
                }
                
                cropper = new Cropper(imageElement, {
                    aspectRatio: NaN, // Free aspect ratio
                    viewMode: 1,     // Restrict crop box to canvas
                    autoCropArea: 0.8, // Initial crop area size
                    responsive: true,
                    restore: true,
                    guides: true,
                    center: true,
                    highlight: true,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false,
                    minCanvasWidth: 100,
                    minCanvasHeight: 100,
                    minCropBoxWidth: 50,
                    minCropBoxHeight: 50
                });
            }
            
            // Setup control buttons
            document.getElementById('zoomIn').addEventListener('click', function() {
                cropper && cropper.zoom(0.1);
            });
            
            document.getElementById('zoomOut').addEventListener('click', function() {
                cropper && cropper.zoom(-0.1);
            });
            
            document.getElementById('rotateLeft').addEventListener('click', function() {
                cropper && cropper.rotate(-45);
            });
            
            document.getElementById('rotateRight').addEventListener('click', function() {
                cropper && cropper.rotate(45);
            });
            
            document.getElementById('resetCrop').addEventListener('click', function() {
                cropper && cropper.reset();
            });
            
            // Crop image
            document.getElementById('cropBtn').addEventListener('click', function() {
                if (!cropper) {
                    showToast('Please select an image first', 'warning');
                    return;
                }
                
                const canvas = cropper.getCroppedCanvas({
                    minWidth: 100,
                    minHeight: 100,
                    maxWidth: 2000,
                    maxHeight: 2000,
                    fillColor: '#fff',
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high'
                });
                
                if (canvas) {
                    const croppedImage = canvas.toDataURL('image/jpeg', 0.9);
                    
                    // Update the preview image
                    const previewImg = document.getElementById('previewImg');
                    if (previewImg) {
                        previewImg.src = croppedImage;
                        previewImg.classList.remove('d-none');
                    }
                    
                    // Set the hidden input value
                    document.getElementById('croppedImage').value = croppedImage;
                    
                    // Hide modal
                    imageModal.hide();
                    
                    showToast('Image cropped successfully!', 'success');
                } else {
                    showToast('Error cropping image', 'danger');
                }
            });
            
            // Clean up when modal is closed
            document.getElementById('imageModal').addEventListener('hidden.bs.modal', function() {
                if (stream) {
                    stream.getTracks().forEach(track => track.stop());
                    stream = null;
                }
                if (cropper) {
                    cropper.destroy();
                    cropper = null;
                }
                document.getElementById('cameraContainer').style.display = 'none';
                document.getElementById('imageToCrop').style.display = 'none';
                document.getElementById('captureFromCameraBtn').style.display = 'none';
            });
            
            // Show toast message
            function showToast(message, type) {
                const toastContainer = document.querySelector('.toast-container');
                const toast = document.createElement('div');
                toast.className = `toast show align-items-center text-white bg-${type}`;
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
                toast.innerHTML = `
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;
                toastContainer.appendChild(toast);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 300);
                }, 5000);
            }
        });
    </script>
</body>
</html>