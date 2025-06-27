<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require "interdb.php";

$success_message = "";
$error_message = "";

// Check if subject ID is provided
if (!isset($_GET['id'])) {
    header("location: subject_management.php");
    exit;
}

$subject_id = $_GET['id'];
$return_class = isset($_GET['class_id']) ? $_GET['class_id'] : null;
$return_section = isset($_GET['section_name']) ? $_GET['section_name'] : null;

// Fetch all necessary data
$classes = $link->query("SELECT * FROM class ORDER BY classnumber")->fetch_all(MYSQLI_ASSOC);
$sections = $link->query("SELECT DISTINCT secgroupname FROM sectiongroup ORDER BY secgroupname")->fetch_all(MYSQLI_ASSOC);
$grades = $link->query("SELECT * FROM gradename")->fetch_all(MYSQLI_ASSOC);
$teachers = $link->query("SELECT id, name, teachersl FROM teacher")->fetch_all(MYSQLI_ASSOC);

// Fetch subject data
$stmt = $link->prepare("SELECT * FROM subject WHERE id = ?");
$stmt->bind_param("i", $subject_id);
$stmt->execute();
$result = $stmt->get_result();
$subject = $result->fetch_assoc();

if (!$subject) {
    header("location: bulk_subject.php");
    exit;
}

// Find class ID for the subject
$class_result = $link->query("SELECT id FROM class WHERE classnumber='" . $subject['classnumber'] . "'");
$class_id = $class_result->fetch_assoc()['id'];

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get class details
        $class = $link->query("SELECT * FROM class WHERE id=" . (int)$_POST['class_id'])->fetch_assoc();
        $classname = mysqli_real_escape_string($link, $class['classname']);
        $classnumber = mysqli_real_escape_string($link, $class['classnumber']);
        $secgroup = mysqli_real_escape_string($link, $_POST['section_name']);
        $subname = mysqli_real_escape_string($link, $_POST['subname']);
        $subcode = (int)$_POST['subcode'];
        $subfullmarks = (int)$_POST['subfullmarks'];
        $gradecode = mysqli_real_escape_string($link, $_POST['gradecode']);
        $subteacher = mysqli_real_escape_string($link, $_POST['subteacher']);
        $teacherid = (int)$_POST['teacherid'];

        // Generate uni
        $uni = mysqli_real_escape_string($link, $classnumber . $secgroup .$_POST['subcode']);

        // Optional barcode
        $barcode = !empty($_POST['barcode']) ? "'" . mysqli_real_escape_string($link, $_POST['barcode']) . "'" : "NULL";

        $subject_id = (int)$_POST['subject_id'];

        // Final query
        $sql = "UPDATE subject SET 
                classname='$classname',
                classnumber='$classnumber',
                secgroup='$secgroup',
                subname='$subname',
                subcode=$subcode,
                subfullmarks=$subfullmarks,
                gradecode='$gradecode',
                subteacher='$subteacher',
                teacherid=$teacherid,
                uni='$uni',
                barcode=$barcode
                WHERE id=$subject_id";

        if ($link->query($sql)) {
            $success_message = "Subject updated successfully!";
            header("Location: bulk_subject.php?class_id=" . urlencode($_POST['class_id']) . "&section_name=" . urlencode($_POST['section_name']) . "&success=" . urlencode($success_message));
            exit();
        } else {
            $error_message = "Error updating subject: " . $link->error;
        }
    } catch (Exception $e) {
        $error_message = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-edit me-2"></i>Edit Subject</h2>
        <a href="bulk_subject.php?class_id=<?php echo $return_class; ?>&section_name=<?php echo urlencode($return_section); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Subjects
        </a>
    </div>

    <?php if ($error_message): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $error_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Subject Details</h5>
        </div>
        <div class="card-body">
            <form method="post">
                <input type="hidden" name="subject_id" value="<?php echo htmlspecialchars($subject['id']); ?>">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Class</label>
                        <select name="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            <?php foreach ($classes as $class): ?>
                                <option value="<?php echo $class['id']; ?>" <?php echo $class['id'] == $class_id ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($class['classname']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <select name="section_name" class="form-select" required>
                            <option value="">Select Section</option>
                            <?php foreach ($sections as $section): ?>
                                <option value="<?php echo htmlspecialchars($section['secgroupname']); ?>" <?php echo $subject['secgroup'] == $section['secgroupname'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($section['secgroupname']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="subname" value="<?php echo htmlspecialchars($subject['subname']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Subject Code</label>
                        <input type="number" class="form-control" name="subcode" value="<?php echo htmlspecialchars($subject['subcode']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Full Marks</label>
                        <select name="subfullmarks" class="form-select" required>
                            <?php foreach ($grades as $grade): ?>
                                <option value="<?php echo $grade['fullmark']; ?>" <?php echo $grade['fullmark'] == $subject['subfullmarks'] ? 'selected' : ''; ?>>
                                    <?php echo $grade['fullmark']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Grade</label>
                        <select name="gradecode" class="form-select" required>
                            <?php foreach ($grades as $grade): ?>
                                <option value="<?php echo $grade['gradecode']; ?>" <?php echo $grade['gradecode'] == $subject['gradecode'] ? 'selected' : ''; ?>>
                                    <?php echo $grade['gradename']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Teacher</label>
                        <select name="teacherid" class="form-select teacher-select" required>
                            <option value="">Select Teacher</option>
                            <?php foreach ($teachers as $teacher): ?>
                                <option value="<?php echo $teacher['id']; ?>"
                                        data-teacher-name="<?php echo htmlspecialchars($teacher['name']); ?>"
                                    <?php echo $teacher['id'] == $subject['teacherid'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($teacher['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="subteacher" id="subteacher" value="<?php echo htmlspecialchars($subject['subteacher']); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Barcode</label>
                        <input type="number" class="form-control" name="barcode" value="<?php echo htmlspecialchars($subject['barcode']); ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">UNI Code</label>
                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($subject['uni']); ?>" readonly>
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Changes
                        </button>
                        <a href="subject_management.php?class_id=<?php echo $return_class; ?>&section_name=<?php echo urlencode($return_section); ?>" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.teacher-select').change(function () {
            var teacherName = $(this).find('option:selected').data('teacher-name') || '';
            $('#subteacher').val(teacherName);
        });

        setTimeout(function () {
            $('.alert').alert('close');
        }, 5000);
    });
</script>
</body>
</html>
