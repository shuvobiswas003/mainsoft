<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require "interdb.php";

$success_message = "";
$error_message = "";

// Fetch all necessary data
$classes = $link->query("SELECT * FROM class ORDER BY classnumber")->fetch_all(MYSQLI_ASSOC);
$sections = $link->query("SELECT DISTINCT secgroupname FROM sectiongroup ORDER BY secgroupname")->fetch_all(MYSQLI_ASSOC);
$grades = $link->query("SELECT * FROM gradename")->fetch_all(MYSQLI_ASSOC);
$teachers = $link->query("SELECT id, name, teachersl FROM teacher")->fetch_all(MYSQLI_ASSOC);

// Process form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['delete_subject'])) {
            // Handle subject deletion
            $stmt = $link->prepare("DELETE FROM subject WHERE id = ?");
            $stmt->bind_param("i", $_POST['delete_subject']);
            $stmt->execute();
            $success_message = "Subject deleted successfully!";
        } 
        elseif (isset($_POST['class_id'])) {
            // Handle subject addition
            $link->begin_transaction();
            
            $stmt = $link->prepare("INSERT INTO subject (classname, classnumber, secgroup, subname, subcode, subfullmarks, gradecode, subteacher, teacherid, uni, barcode) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            $class_id = $_POST['class_id'];
            $section_name = $_POST['section_name'];
            
            // Get class details
            $class = $link->query("SELECT * FROM class WHERE id=$class_id")->fetch_assoc();
            
            $classname = $class['classname'];
            $classnumber = $class['classnumber'];
            
            // Loop through all submitted subjects
            for ($i = 0; $i < count($_POST['subname']); $i++) {
                $subname = $_POST['subname'][$i];
                $subcode = $_POST['subcode'][$i];
                $subfullmarks = $_POST['subfullmarks'][$i];
                $gradecode = $_POST['gradecode'][$i];
                $subteacher = $_POST['subteacher'][$i];
                $teacherid = $_POST['teacherid'][$i];
                
                // Generate uni value
                $uni = $classnumber  . $section_name  . $subcode;
                
                $barcode = !empty($_POST['barcode'][$i]) ? $_POST['barcode'][$i] : NULL;
                
                $stmt->bind_param("ssssiissssi", 
                    $classname, $classnumber, $section_name, $subname, $subcode, 
                    $subfullmarks, $gradecode, $subteacher, $teacherid, $uni, $barcode);
                
                $stmt->execute();
            }
            
            $link->commit();
            $success_message = "Subjects added successfully!";
        }
    } catch (Exception $e) {
        $link->rollback();
        $error_message = "Error: " . $e->getMessage();
    }
}

// Get selected class and section for viewing
$view_class = isset($_GET['class_id']) ? $_GET['class_id'] : null;
$view_section = isset($_GET['section_name']) ? $_GET['section_name'] : null;

// Fetch subjects for viewing
$subjects = [];
if ($view_class && $view_section) {
    $class = $link->query("SELECT * FROM class WHERE id=$view_class")->fetch_assoc();
    
    $query = "SELECT s.* FROM subject s 
              WHERE s.classnumber = ? AND s.secgroup = ? 
              ORDER BY s.subname";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ss", $class['classnumber'], $view_section);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --dark-color: #5a5c69;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', sans-serif;
        }
        
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            border: none;
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border-radius: 0.5rem 0.5rem 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        .table thead th {
            background-color: var(--dark-color);
            color: white;
            vertical-align: middle;
            padding: 0.75rem 1rem;
        }
        
        .subject-row:hover {
            background-color: rgba(78, 115, 223, 0.05);
        }
        
        .action-btn {
            min-width: 80px;
        }
        
        .alert-fixed {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <?php if ($success_message): ?>
            <div class="alert alert-success alert-dismissible fade show alert-fixed" role="alert">
                <?php echo $success_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($error_message): ?>
            <div class="alert alert-danger alert-dismissible fade show alert-fixed" role="alert">
                <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    
<div class="card border-0 shadow-lg">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center p-3" style="
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 0.5rem 0.5rem 0 0 !important;">
        
        <h5 class="mb-2 mb-md-0 text-white fw-bold">
            <i class="fas fa-book-open me-2"></i>Subject Management
        </h5>
        
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <button type="button" class="btn btn-light btn-sm shadow-sm text-primary fw-bold" 
                    onclick="window.open('subject_import_excel.php', '_blank')"
                    style="min-width: 110px;">
                <i class="bi bi-file-excel me-1"></i> Import Excel
            </button>
            
            <button type="button" class="btn btn-outline-light btn-sm shadow-sm fw-bold" 
                    onclick="window.location.href='class_teacher_subject.php'"
                    style="min-width: 90px;">
                <i class="bi bi-house-fill me-1"></i> Back to Panel
            </button>
        </div>
    </div>
</div>

            

            <div class="card-body">
                <!-- View Subjects Section -->
                <div class="view-subjects mb-4">
                    <h5 class="mb-3"><i class="fas fa-eye me-2"></i>View Subjects</h5>
                    <form method="get" class="row g-3">
                        <div class="col-md-5">
                            <select name="class_id" class="form-select" required>
                                <option value="">Select Class</option>
                                <?php foreach ($classes as $class): ?>
                                    <option value="<?php echo $class['id']; ?>" <?php echo $view_class == $class['id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($class['classname']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="section_name" class="form-select" required>
                                <option value="">Select Section</option>
                                <?php foreach ($sections as $section): ?>
                                    <option value="<?php echo htmlspecialchars($section['secgroupname']); ?>" <?php echo $view_section == $section['secgroupname'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($section['secgroupname']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-1"></i> View
                            </button>
                        </div>
                    </form>

                    <?php if (!empty($subjects)): ?>
                        <div class="table-responsive mt-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Full Marks</th>
                                        <th>Grade</th>
                                        <th>Teacher</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($subjects as $subject): ?>
                                        <tr class="subject-row">
                                            <td><?php echo htmlspecialchars($subject['subname']); ?></td>
                                            <td><?php echo htmlspecialchars($subject['subcode']); ?></td>
                                            <td><?php echo htmlspecialchars($subject['subfullmarks']); ?></td>
                                            <td><?php echo htmlspecialchars($subject['gradecode']); ?></td>
                                            <td><?php echo htmlspecialchars($subject['subteacher']); ?></td>
                                            <td>
                                                <a href="edit_subject.php?id=<?php echo $subject['id']; ?>&class_id=<?php echo $view_class; ?>&section_name=<?php echo urlencode($view_section); ?>" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form method="post" class="d-inline">
                                                    <input type="hidden" name="delete_subject" value="<?php echo $subject['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php elseif ($view_class && $view_section): ?>
                        <div class="alert alert-info mt-3">
                            No subjects found for this class and section.
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Add Subjects Section -->
                <div class="subject-form">
                    <h5 class="mb-3"><i class="fas fa-plus-circle me-2"></i>Add Subjects</h5>
                    <form method="post">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <select name="class_id" class="form-select" required>
                                    <option value="">Select Class</option>
                                    <?php foreach ($classes as $class): ?>
                                        <option value="<?php echo $class['id']; ?>">
                                            <?php echo htmlspecialchars($class['classname']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select name="section_name" class="form-select" required>
                                    <option value="">Select Section</option>
                                    <?php foreach ($sections as $section): ?>
                                        <option value="<?php echo htmlspecialchars($section['secgroupname']); ?>">
                                            <?php echo htmlspecialchars($section['secgroupname']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div id="subjectRows">
                            <div class="row g-3 mb-3 subject-row">
                                <div class="col-md-3">
                                    <input type="text" name="subname[]" class="form-control" placeholder="Subject Name" required>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="subcode[]" class="form-control" placeholder="Code" required>
                                </div>
                                <div class="col-md-2">
                                    <select name="subfullmarks[]" class="form-select" required>
                                        <?php foreach ($grades as $grade): ?>
                                            <option value="<?php echo $grade['fullmark']; ?>"><?php echo $grade['fullmark']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="gradecode[]" class="form-select" required>
                                        <?php foreach ($grades as $grade): ?>
                                            <option value="<?php echo $grade['gradecode']; ?>"><?php echo $grade['gradename']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="teacherid[]" class="form-select teacher-select" required>
                                        <option value="">Select Teacher</option>
                                        <?php foreach ($teachers as $teacher): ?>
                                            <option value="<?php echo $teacher['id']; ?>" data-teacher-name="<?php echo htmlspecialchars($teacher['name']); ?>">
                                                <?php echo htmlspecialchars($teacher['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="subteacher[]" class="teacher-name-input">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-row" disabled>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" id="addRow" class="btn btn-primary">
                                <i class="fas fa-plus-circle me-1"></i> Add Another Subject
                            </button>
                            <div>
                                <button type="reset" class="btn btn-secondary me-2">
                                    <i class="fas fa-undo me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Save All
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Update teacher name when selection changes
            $(document).on('change', '.teacher-select', function() {
                var teacherName = $(this).find('option:selected').data('teacher-name');
                $(this).closest('.col-md-2').find('.teacher-name-input').val(teacherName);
            });

            // Add new row
            $('#addRow').click(function() {
                var newRow = $('#subjectRows .subject-row:first').clone();
                newRow.find('input').val('');
                newRow.find('select').val('');
                newRow.find('.remove-row').prop('disabled', false);
                $('#subjectRows').append(newRow);
            });

            // Remove row
            $(document).on('click', '.remove-row', function() {
                if ($('#subjectRows .subject-row').length > 1) {
                    $(this).closest('.subject-row').remove();
                }
            });

            // Auto-dismiss alerts
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
</body>
</html>