<?php
include '../interdb.php';
$imgDir = '../img/student/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cropped_image'])) {
    $class = $_POST['class'];
    $section = $_POST['section'];
    $roll = $_POST['roll'];
    $imageData = $_POST['cropped_image'];

    if (strpos($imageData, 'data:image') === 0) {
        $image_parts = explode(";base64,", $imageData);
        $image_base64 = base64_decode($image_parts[1]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid image data']);
        exit;
    }

    $stmt = $link->prepare("SELECT * FROM student WHERE classnumber=? AND secgroup=? AND roll=?");
    $stmt->bind_param("ssi", $class, $section, $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($student) {
        // Delete old image if exists
        if ($student['imgname'] && file_exists($imgDir . $student['imgname']) && $student['imgname'] !== 'default.png') {
            unlink($imgDir . $student['imgname']);
        }

        $imgName = 'IMG_' . $student['uniqid'] . '_' . time() . '.png';
        $imgPath = $imgDir . $imgName;
        
        if (file_put_contents($imgPath, $image_base64)) {
            $link->query("UPDATE student SET imgname='$imgName' WHERE id='{$student['id']}'");
            echo json_encode(['status' => 'success', 'message' => 'Image uploaded successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to save image']);
        }
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
        exit;
    }
}

if (isset($_GET['fetch']) && $_GET['fetch'] === 'image') {
    $class = $_GET['class'];
    $section = $_GET['section'];
    $roll = $_GET['roll'];

    $stmt = $link->prepare("SELECT * FROM student WHERE classnumber=? AND secgroup=? AND roll=?");
    $stmt->bind_param("ssi", $class, $section, $roll);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    if ($student) {
        $img = $student['imgname'] ?: 'default.png';
        $name = $student['name'];
        echo json_encode(['status' => 'success', 'img' => $img, 'name' => $name]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Student not found']);
    }
    exit;
}

$classes = $link->query("SELECT DISTINCT classnumber FROM student ORDER BY classnumber ASC");
$sections = $link->query("SELECT DISTINCT secgroup FROM student ORDER BY secgroup ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Image Upload</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary-color: #4e73df;
      --secondary-color: #f8f9fc;
      --accent-color: #2e59d9;
    }
    
    body {
      background-color: var(--secondary-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .card {
      border-radius: 0.5rem;
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
      border: none;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    
    .btn-primary:hover {
      background-color: var(--accent-color);
      border-color: var(--accent-color);
    }
    
    .preview-container {
      border: 2px dashed #d1d3e2;
      border-radius: 0.5rem;
      background-color: white;
      padding: 1.5rem;
      transition: all 0.3s;
    }
    
    .preview-container:hover {
      border-color: var(--primary-color);
    }
    
    .student-image {
      max-width: 100%;
      max-height: 300px;
      height: auto;
      border-radius: 0.35rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .cropper-container {
      margin: 0 auto;
    }
    
    .toast-container {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1100;
    }
    
    .step-indicator {
      display: flex;
      justify-content: space-between;
      margin-bottom: 2rem;
    }
    
    .step {
      text-align: center;
      flex: 1;
      position: relative;
    }
    
    .step-number {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #e9ecef;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 10px;
      font-weight: bold;
      color: #6c757d;
    }
    
    .step.active .step-number {
      background-color: var(--primary-color);
      color: white;
    }
    
    .step-title {
      font-size: 0.9rem;
      color: #6c757d;
    }
    
    .step.active .step-title {
      color: var(--primary-color);
      font-weight: 500;
    }
    
    .step:not(:last-child)::after {
      content: '';
      position: absolute;
      top: 20px;
      left: 60%;
      width: 80%;
      height: 2px;
      background-color: #e9ecef;
      z-index: -1;
    }
    
    @media (max-width: 768px) {
      .step-title {
        font-size: 0.75rem;
      }
    }
  </style>
</head>
<body>
  <div class="toast-container"></div>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-header bg-white py-3">
            <h4 class="mb-0 text-center text-primary">
              <i class="bi bi-camera-fill me-2"></i>Student Image Upload
            </h4>
          </div>
          <div class="card-body p-4">
            <!-- Step Indicator -->
            <div class="step-indicator">
              <div class="step active" id="step1">
                <div class="step-number">1</div>
                <div class="step-title">Select Student</div>
              </div>
              <div class="step" id="step2">
                <div class="step-number">2</div>
                <div class="step-title">Upload Image</div>
              </div>
              <div class="step" id="step3">
                <div class="step-number">3</div>
                <div class="step-title">Crop & Submit</div>
              </div>
            </div>
            
            <!-- Step 1: Select Student -->
            <div id="selectStudentStep">
              <form id="studentForm" class="row g-3">
                <div class="col-md-4">
                  <label for="classSelect" class="form-label">Class</label>
                  <select name="class" id="classSelect" class="form-select" required>
                    <option value="" selected disabled>Select Class</option>
                    <?php while ($row = $classes->fetch_assoc()) echo "<option value='{$row['classnumber']}'>{$row['classnumber']}</option>"; ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="sectionSelect" class="form-label">Section</label>
                  <select name="section" id="sectionSelect" class="form-select" required>
                    <option value="" selected disabled>Select Section</option>
                    <?php while ($row = $sections->fetch_assoc()) echo "<option value='{$row['secgroup']}'>{$row['secgroup']}</option>"; ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="rollInput" class="form-label">Roll Number</label>
                  <input type="number" name="roll" id="rollInput" class="form-control" placeholder="Enter roll number" required>
                </div>
                <div class="col-12 text-center mt-3">
                  <button type="button" id="fetchImage" class="btn btn-primary px-4">
                    <i class="bi bi-search me-2"></i>Find Student
                  </button>
                </div>
              </form>
            </div>
            
            <!-- Step 2: Preview & Upload -->
            <div id="previewSection" class="d-none mt-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="preview-container text-center h-100">
                    <h3 id="studentName" class="mb-4"></h3>
                    <img id="previewImage" src="" class="student-image" alt="Student Image">
                    <div class="mt-3">
                      <small class="text-muted">Current student photo</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                  <div class="preview-container text-center h-100 d-flex flex-column justify-content-center">
                    <i class="bi bi-camera text-muted mb-3" style="font-size: 3rem;"></i>
                    <h5 class="mb-3">Upload New Image</h5>
                    <p class="text-muted mb-4">Capture or select a new image for this student</p>
                    <div>
                      <label for="uploadInput" class="btn btn-primary px-4">
                        <i class="bi bi-camera-fill me-2"></i>Choose Image
                      </label>
                      <input type="file" id="uploadInput" accept="image/*" capture="environment" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Step 3: Crop Image -->
            <div id="cropSection" class="d-none mt-4">
              <div class="row">
                <div class="col-lg-8">
                  <div class="border rounded p-2 bg-white">
                    <img id="cropImage" class="img-fluid d-block mx-auto" style="max-height: 400px;">
                  </div>
                </div>
                <div class="col-lg-4 mt-3 mt-lg-0">
                  <div class="card">
                    <div class="card-header bg-light">
                      <h5 class="mb-0">Crop Controls</h5>
                    </div>
                    <div class="card-body">
                      <div class="d-grid gap-2">
                        <button type="button" id="previewBtn" class="btn btn-outline-primary">
                          <i class="bi bi-eye-fill me-2"></i>Preview Crop
                        </button>
                        <button type="button" id="rotateLeftBtn" class="btn btn-outline-secondary">
                          <i class="bi bi-arrow-counterclockwise me-2"></i>Rotate Left
                        </button>
                        <button type="button" id="rotateRightBtn" class="btn btn-outline-secondary">
                          <i class="bi bi-arrow-clockwise me-2"></i>Rotate Right
                        </button>
                        <button type="button" id="resetBtn" class="btn btn-outline-danger">
                          <i class="bi bi-arrow-repeat me-2"></i>Reset
                        </button>
                      </div>
                      <hr>
                      <div class="text-center">
                        <p><strong>Image Size: <span id="imageSizeKB">0</span> KB</strong></p>
                        <button type="button" id="uploadBtn" class="btn btn-success px-4 d-none">
                          <i class="bi bi-check-circle-fill me-2"></i>Submit Image
                        </button>
                        <div id="progressBarContainer" class="mt-3" style="display: none;">
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                 id="uploadProgress" role="progressbar" style="width: 0%">
                              <span class="visually-hidden">Upload Progress</span>
                            </div>
                          </div>
                          <small class="text-muted mt-1 d-block">Uploading image...</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Crop Preview Modal -->
  <div class="modal fade" id="cropPreviewModal" tabindex="-1" aria-labelledby="cropPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-light">
          <h5 class="modal-title">Crop Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img id="previewCroppedImage" class="img-fluid rounded" alt="Cropped Image Preview">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="bi bi-x-circle me-2"></i>Cancel
          </button>
          <button type="button" id="confirmBtn" class="btn btn-primary">
            <i class="bi bi-check-circle me-2"></i>Confirm
          </button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>
  <script>
    let cropper;
    let currentStep = 1;

    // Show toast notification
    function showToast(type, message) {
      const toastContainer = document.querySelector('.toast-container');
      const toast = document.createElement('div');
      toast.className = `toast show align-items-center text-white bg-${type} border-0`;
      toast.role = 'alert';
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

    // Update step indicator
    function updateStepIndicator(step) {
      document.querySelectorAll('.step').forEach((el, index) => {
        if (index + 1 <= step) {
          el.classList.add('active');
        } else {
          el.classList.remove('active');
        }
      });
      currentStep = step;
    }

    // Find student
    document.getElementById("fetchImage").addEventListener("click", function() {
      const form = document.getElementById("studentForm");
      const formData = new FormData(form);
      
      // Validate form
      let isValid = true;
      form.querySelectorAll('[required]').forEach(input => {
        if (!input.value) {
          input.classList.add('is-invalid');
          isValid = false;
        } else {
          input.classList.remove('is-invalid');
        }
      });
      
      if (!isValid) {
        showToast('danger', 'Please fill all required fields');
        return;
      }
      
      const params = new URLSearchParams(formData).toString();
      
      fetch(`?fetch=image&${params}`)
        .then(res => res.json())
        .then(data => {
          if (data.status === 'success') {
            document.getElementById("studentName").textContent = data.name;
            document.getElementById("previewImage").src = `../img/student/${data.img}`;
            
            // Show preview section
            document.getElementById("selectStudentStep").classList.add('d-none');
            document.getElementById("previewSection").classList.remove('d-none');
            updateStepIndicator(2);
          } else {
            showToast('danger', data.message || 'Student not found!');
          }
        })
        .catch(error => {
          showToast('danger', 'Error fetching student data');
          console.error(error);
        });
    });

    // Handle image upload
    document.getElementById("uploadInput").addEventListener("change", function(e) {
      const file = e.target.files[0];
      if (!file) return;
      
      // Validate file type
      if (!file.type.match('image.*')) {
        showToast('danger', 'Please select an image file');
        return;
      }
      
      // Validate file size (max 5MB)
      if (file.size > 5 * 1024 * 1024) {
        showToast('danger', 'Image size should be less than 5MB');
        return;
      }
      
      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById("cropImage").src = event.target.result;
        
        // Show crop section
        document.getElementById("previewSection").classList.add('d-none');
        document.getElementById("cropSection").classList.remove('d-none');
        updateStepIndicator(3);
        
        // Initialize cropper
        if (cropper) cropper.destroy();
        cropper = new Cropper(document.getElementById("cropImage"), {
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
    });

    // Rotate buttons
    document.getElementById("rotateLeftBtn").addEventListener("click", function() {
      cropper.rotate(-90);
    });
    
    document.getElementById("rotateRightBtn").addEventListener("click", function() {
      cropper.rotate(90);
    });
    
    // Reset button
    document.getElementById("resetBtn").addEventListener("click", function() {
      cropper.reset();
    });

    // Preview crop
    document.getElementById("previewBtn").addEventListener("click", function() {
      const canvas = cropper.getCroppedCanvas({
        maxWidth: 800,
        maxHeight: 800,
        fillColor: '#fff',
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high'
      });
      
      if (!canvas) {
        showToast('danger', 'Please select a valid crop area');
        return;
      }
      
      canvas.toBlob(blob => {
        const reader = new FileReader();
        reader.onloadend = () => {
          document.getElementById("previewCroppedImage").src = reader.result;
          document.getElementById("uploadBtn").classList.remove('d-none');
          
          // Show image size
          const sizeKB = (blob.size / 1024).toFixed(2);
          document.getElementById("imageSizeKB").textContent = sizeKB;
          
          // Show modal
          new bootstrap.Modal(document.getElementById('cropPreviewModal')).show();
        };
        reader.readAsDataURL(blob);
      }, 'image/jpeg', 0.85);
    });

    // Confirm and upload
    document.getElementById("confirmBtn").addEventListener("click", function() {
      const canvas = cropper.getCroppedCanvas({
        maxWidth: 800,
        maxHeight: 800,
        fillColor: '#fff',
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high'
      });
      
      canvas.toBlob(blob => {
        const formData = new FormData(document.getElementById("studentForm"));
        const reader = new FileReader();
        
        reader.onloadend = () => {
          formData.append("cropped_image", reader.result);
          
          // Show progress bar
          document.getElementById("progressBarContainer").style.display = "block";
          document.getElementById("uploadProgress").style.width = "0%";
          
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "", true);
          
          xhr.upload.addEventListener("progress", function(e) {
            if (e.lengthComputable) {
              const percent = Math.round((e.loaded / e.total) * 100);
              document.getElementById("uploadProgress").style.width = percent + "%";
              document.getElementById("uploadProgress").setAttribute('aria-valuenow', percent);
            }
          });
          
          xhr.onload = function() {
            if (xhr.status === 200) {
              try {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                  showToast('success', response.message);
                  setTimeout(() => location.reload(), 1500);
                } else {
                  showToast('danger', response.message || 'Upload failed');
                }
              } catch (e) {
                showToast('danger', 'Error processing response');
              }
            } else {
              showToast('danger', 'Upload error: ' + xhr.statusText);
            }
          };
          
          xhr.onerror = function() {
            showToast('danger', 'Upload failed. Please try again.');
          };
          
          xhr.send(formData);
        };
        reader.readAsDataURL(blob);
      }, 'image/jpeg', 0.85);
      
      // Hide modal
      bootstrap.Modal.getInstance(document.getElementById('cropPreviewModal')).hide();
    });

    // Back button functionality (optional)
    // You can add back buttons to navigate between steps if needed
  </script>
</body>
</html>