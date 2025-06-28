<?php
session_start();
require 'interdb.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
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

// Get distinct sections from database
$sections_query = "SELECT DISTINCT secgroup FROM student ORDER BY secgroup";
$sections_result = $link->query($sections_query);

// Define all possible columns with their labels and default N/A values
$all_columns = [
    'name' => ['label' => 'Name (English)', 'default' => 'N/A'],
    'fname' => ['label' => 'Father\'s Name (English)', 'default' => 'N/A'],
    'mname' => ['label' => 'Mother\'s Name (English)', 'default' => 'N/A'],
    'nameb' => ['label' => 'Name (Bengali)', 'default' => 'N/A'],
    'fnameb' => ['label' => 'Father\'s Name (Bengali)', 'default' => 'N/A'],
    'mnameb' => ['label' => 'Mother\'s Name (Bengali)', 'default' => 'N/A'],
    'sex' => ['label' => 'Gender', 'default' => 'N/A'],
    'religion' => ['label' => 'Religion', 'default' => 'N/A'],
    'birthid' => ['label' => 'Birth ID', 'default' => 'N/A'],
    'dob' => ['label' => 'Date of Birth', 'default' => null],
    'fnid' => ['label' => 'Father\'s NID', 'default' => 'N/A'],
    'mnid' => ['label' => 'Mother\'s NID', 'default' => 'N/A'],
    'address' => ['label' => 'Address', 'default' => 'N/A'],
    'mobile' => ['label' => 'Mobile Number', 'default' => 'N/A'],
    'class_group' => ['label' => 'Class Group', 'default' => 'N/A'],
    'roll' => ['label' => 'Roll Number', 'default' => '0']
];

// Process form submission for step 1 (column selection)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['step']) && $_POST['step'] == '1') {
    $selected_columns = $_POST['columns'] ?? [];
    // Ensure required fields are always included
    $required_columns = ['name', 'fname', 'roll'];
    $_SESSION['bulk_columns'] = array_unique(array_merge($selected_columns, $required_columns));
    header("Location: student_bulk_add.php?step=2");
    exit;
}

// Process form submission for step 2 (student data entry)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['step']) && $_POST['step'] == '2') {
    $classnumber = intval($_POST['classnumber'] ?? 0);
    $secgroup = mysqli_real_escape_string($link, $_POST['secgroup'] ?? '');
    $students = $_POST['students'] ?? [];
    $selected_columns = $_SESSION['bulk_columns'] ?? [];
    
    // Begin transaction
    $link->begin_transaction();
    
    try {
        $success_count = 0;
        $default_img = 'IMG_0.png';
        
        foreach ($students as $student_id => $student_data) {
            // Initialize data array with defaults
            $data = [];
            foreach ($all_columns as $col => $config) {
                if (in_array($col, $selected_columns)) {
                    $data[$col] = $student_data[$col] ?? $config['default'];
                } else {
                    $data[$col] = $config['default'];
                }
            }
            
            // Sanitize all inputs
            $name = mysqli_real_escape_string($link, $data['name']);
            $fname = mysqli_real_escape_string($link, $data['fname']);
            $mname = mysqli_real_escape_string($link, $data['mname']);
            $nameb = mysqli_real_escape_string($link, $data['nameb']);
            $fnameb = mysqli_real_escape_string($link, $data['fnameb']);
            $mnameb = mysqli_real_escape_string($link, $data['mnameb']);
            $sex = mysqli_real_escape_string($link, $data['sex']);
            $religion = mysqli_real_escape_string($link, $data['religion']);
            $birthid = mysqli_real_escape_string($link, $data['birthid']);
            $dob = !empty($data['dob']) ? date("Y-m-d", strtotime($data['dob'])) : null;
            $fnid = mysqli_real_escape_string($link, $data['fnid']);
            $mnid = mysqli_real_escape_string($link, $data['mnid']);
            $address = mysqli_real_escape_string($link, $data['address']);
            $mobile = mysqli_real_escape_string($link, $data['mobile']);
            $class_group = mysqli_real_escape_string($link, $data['class_group']);
            $roll = intval($data['roll']);
            
            $uniqid = $classnumber . $secgroup . $roll;
            $classname = $classMap[$classnumber] ?? 'Class ' . $classnumber;
            
            // Check if student already exists
            $check_sql = "SELECT id FROM student WHERE classnumber = $classnumber AND secgroup = '$secgroup' AND roll = $roll";
            $check_result = $link->query($check_sql);
            
            if ($check_result->num_rows > 0) {
                // Update existing record
                $update_sql = "UPDATE student SET 
                    name = '$name', 
                    fname = '$fname', 
                    mname = '$mname', 
                    nameb = '$nameb', 
                    fnameb = '$fnameb', 
                    mnameb = '$mnameb', 
                    sex = '$sex', 
                    religion = '$religion', 
                    birthid = '$birthid', 
                    dob = " . ($dob ? "'$dob'" : "NULL") . ", 
                    fnid = '$fnid', 
                    mnid = '$mnid', 
                    address = '$address', 
                    mobile = '$mobile', 
                    classname = '$classname', 
                    uniqid = '$uniqid', 
                    class_group = '$class_group'
                    WHERE classnumber = $classnumber AND secgroup = '$secgroup' AND roll = $roll";
                
                if (!$link->query($update_sql)) {
                    throw new Exception("Update failed for student ID $student_id: " . $link->error);
                }
            } else {
                // Insert new record
                $insert_sql = "INSERT INTO student (
                    name, fname, mname, nameb, fnameb, mnameb, 
                    sex, religion, birthid, dob, fnid, mnid, 
                    address, mobile, classnumber, classname, secgroup, 
                    roll, uniqid, imgname, class_group
                ) VALUES (
                    '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', 
                    '$sex', '$religion', '$birthid', " . ($dob ? "'$dob'" : "NULL") . ", '$fnid', '$mnid', 
                    '$address', '$mobile', $classnumber, '$classname', '$secgroup', 
                    $roll, '$uniqid', '$default_img', '$class_group'
                )";
                
                if (!$link->query($insert_sql)) {
                    throw new Exception("Insert failed for student ID $student_id: " . $link->error);
                }
            }
            
            $success_count++;
        }
        
        // Commit transaction
        $link->commit();
        
        $status = [
            'type' => 'success',
            'message' => $success_count . ' students processed successfully!'
        ];
        unset($_SESSION['bulk_columns']);
    } catch (Exception $e) {
        $link->rollback();
        $status = [
            'type' => 'danger',
            'message' => 'Error: ' . $e->getMessage()
        ];
    }
}

// Display step 2 if in session
$current_step = isset($_GET['step']) ? intval($_GET['step']) : 1;
if ($current_step == 2 && !isset($_SESSION['bulk_columns'])) {
    $current_step = 1;
    $status = [
        'type' => 'warning',
        'message' => 'Your session expired. Please start again.'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Student Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .student-entry {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
        }
        .remove-student {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            color: #dc3545;
        }
        #students-container {
            max-height: 60vh;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        .column-checkbox {
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 10px;
            min-width: 150px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Bulk Student Entry</h2>
        
        <?php if (isset($status)): ?>
        <div class="alert alert-<?= $status['type'] ?> alert-dismissible fade show">
            <?= $status['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
        <?php if ($current_step == 1): ?>
        <!-- Step 1: Column Selection -->
        <form method="post" action="student_bulk_add.php">
            <input type="hidden" name="step" value="1">
            
            <div class="card mb-4">
                <div class="card-header">Select Columns to Include</div>
                <div class="card-body">
                    <?php foreach ($all_columns as $col => $config): ?>
                        <div class="form-check column-checkbox">
                            <input class="form-check-input" type="checkbox" 
                                   name="columns[]" value="<?= $col ?>" id="col_<?= $col ?>"
                                   <?= in_array($col, ['name', 'fname', 'roll']) ? 'checked disabled' : '' ?>>
                            <label class="form-check-label" for="col_<?= $col ?>">
                                <?= $config['label'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
        
        <?php elseif ($current_step == 2): ?>
        <!-- Step 2: Student Data Entry -->
        <?php 
        $selected_columns = $_SESSION['bulk_columns'] ?? [];
        // Ensure required fields are included
        if (!in_array('roll', $selected_columns)) {
            $selected_columns[] = 'roll';
        }
        ?>
        
        <form method="post" action="student_bulk_add.php">
            <input type="hidden" name="step" value="2">
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="classnumber" class="form-label">Class</label>
                    <select class="form-select" id="classnumber" name="classnumber" required>
                        <option value="">Select Class</option>
                        <?php foreach ($classMap as $num => $name): ?>
                            <option value="<?= $num ?>"><?= $name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="secgroup" class="form-label">Section</label>
                    <select class="form-select" id="secgroup" name="secgroup" required>
                        <option value="">Select Section</option>
                        <?php 
                        // Reset pointer and fetch sections again
                        $sections_result->data_seek(0);
                        while ($section = $sections_result->fetch_assoc()): ?>
                            <option value="<?= $section['secgroup'] ?>"><?= $section['secgroup'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            
            <div id="students-container">
                <div class="student-entry" id="student-1">
                    <span class="remove-student" onclick="removeStudent(1)">✕</span>
                    <h5>Student #1</h5>
                    <div class="row">
                        <?php foreach ($selected_columns as $col): ?>
                            <div class="col-md-4 mb-3">
                                <label for="<?= $col ?>-1" class="form-label"><?= $all_columns[$col]['label'] ?></label>
                                <?php if ($col == 'sex'): ?>
                                    <select class="form-select" name="students[1][<?= $col ?>]" id="<?= $col ?>-1">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                <?php elseif ($col == 'dob'): ?>
                                    <input type="date" class="form-control" name="students[1][<?= $col ?>]" id="<?= $col ?>-1">
                                <?php elseif ($col == 'roll'): ?>
                                    <input type="number" class="form-control" name="students[1][<?= $col ?>]" id="<?= $col ?>-1" min="1" required>
                                <?php else: ?>
                                    <input type="text" class="form-control" name="students[1][<?= $col ?>]" id="<?= $col ?>-1">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <button type="button" class="btn btn-secondary" onclick="addStudent()">Add Another Student</button>
            </div>
            
            <button type="submit" class="btn btn-success">Submit All Students</button>
            <a href="student_bulk_add.php" class="btn btn-danger">Cancel</a>
        </form>
        
        <script>
            let studentCount = 1;
            
            function addStudent() {
                studentCount++;
                const container = document.getElementById('students-container');
                const newStudent = document.createElement('div');
                newStudent.className = 'student-entry';
                newStudent.id = `student-${studentCount}`;
                
                let html = `<span class="remove-student" onclick="removeStudent(${studentCount})">✕</span>
                            <h5>Student #${studentCount}</h5>
                            <div class="row">`;
                
                <?php foreach ($selected_columns as $col): ?>
                    html += `<div class="col-md-4 mb-3">
                                <label for="<?= $col ?>-${studentCount}" class="form-label"><?= $all_columns[$col]['label'] ?></label>`;
                    <?php if ($col == 'sex'): ?>
                        html += `<select class="form-select" name="students[${studentCount}][<?= $col ?>]" id="<?= $col ?>-${studentCount}">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>`;
                    <?php elseif ($col == 'dob'): ?>
                        html += `<input type="date" class="form-control" name="students[${studentCount}][<?= $col ?>]" id="<?= $col ?>-${studentCount}">`;
                    <?php elseif ($col == 'roll'): ?>
                        html += `<input type="number" class="form-control" name="students[${studentCount}][<?= $col ?>]" id="<?= $col ?>-${studentCount}" min="1" required>`;
                    <?php else: ?>
                        html += `<input type="text" class="form-control" name="students[${studentCount}][<?= $col ?>]" id="<?= $col ?>-${studentCount}">`;
                    <?php endif; ?>
                    html += `</div>`;
                <?php endforeach; ?>
                
                html += `</div></div>`;
                newStudent.innerHTML = html;
                container.appendChild(newStudent);
            }
            
            function removeStudent(id) {
                if (studentCount > 1) {
                    const studentDiv = document.getElementById(`student-${id}`);
                    studentDiv.remove();
                    // Re-number remaining students
                    const students = document.querySelectorAll('.student-entry');
                    students.forEach((student, index) => {
                        student.id = `student-${index + 1}`;
                        student.querySelector('h5').textContent = `Student #${index + 1}`;
                        // Update all input names to match new numbering
                        const inputs = student.querySelectorAll('input, select');
                        inputs.forEach(input => {
                            const name = input.name.replace(/\[\d+\]/, `[${index + 1}]`);
                            input.name = name;
                        });
                    });
                    studentCount = students.length;
                } else {
                    alert("You must have at least one student entry.");
                }
            }
        </script>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>