<?php
require 'interdb.php';
// Initialize variables
$classnumber = isset($_GET['classnumber']) ? intval($_GET['classnumber']) : 0;
$secgroupname = isset($_GET['secgroupname']) ? $_GET['secgroupname'] : '';
$message = '';
$error = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['optional_subjects']) || isset($_POST['notchoice_subjects'])) {
        $successCount = 0;
        
        // Process optional subjects (status 4)
        if (isset($_POST['optional_subjects'])) {
            foreach ($_POST['optional_subjects'] as $uniqid => $subcodes) {
                if (!empty($subcodes)) {
                    $subcodeArray = array_map('trim', explode(',', $subcodes));
                    
                    foreach ($subcodeArray as $subcode) {
                        if (!empty($subcode) && $subcode != '0') {
                            // Get student roll number for unisubstatus
                            $rollSql = "SELECT roll FROM student WHERE uniqid = ?";
                            $rollStmt = $link->prepare($rollSql);
                            $rollStmt->bind_param("s", $uniqid);
                            $rollStmt->execute();
                            $rollResult = $rollStmt->get_result();
                            $student = $rollResult->fetch_assoc();
                            $roll = $student['roll'];
                            $rollStmt->close();
                            
                            $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;
                            
                            // Check if subject exists for this student
                            $checkSql = "SELECT id FROM sturegsubject WHERE uniqid = ? AND subcode = ?";
                            $checkStmt = $link->prepare($checkSql);
                            $checkStmt->bind_param("ss", $uniqid, $subcode);
                            $checkStmt->execute();
                            $checkStmt->store_result();
                            
                            if ($checkStmt->num_rows == 0) {
                                // Insert new registration with status 4
                                $insertSql = "INSERT INTO sturegsubject (classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                             SELECT ?, ?, s.roll, ?, ?, sub.subname, 4, ?
                                             FROM student s 
                                             JOIN subject sub ON sub.subcode = ?
                                             WHERE s.uniqid = ? AND s.classnumber = ? AND s.secgroup = ?";
                                
                                $insertStmt = $link->prepare($insertSql);
                                $insertStmt->bind_param("issssssis", $classnumber, $secgroupname, $uniqid, $subcode, $unisubstatus, $subcode, $uniqid, $classnumber, $secgroupname);
                                
                                if ($insertStmt->execute()) {
                                    $successCount++;
                                }
                                $insertStmt->close();
                            } else {
                                // Update existing registration to status 4
                                $updateSql = "UPDATE sturegsubject SET substatus = 4, unisubstatus = ? WHERE uniqid = ? AND subcode = ?";
                                $updateStmt = $link->prepare($updateSql);
                                $updateStmt->bind_param("sss", $unisubstatus, $uniqid, $subcode);
                                $updateStmt->execute();
                                $updateStmt->close();
                            }
                            $checkStmt->close();
                        }
                    }
                }
            }
        }
        
        // Process not-choice subjects (status 0)
        if (isset($_POST['notchoice_subjects'])) {
            foreach ($_POST['notchoice_subjects'] as $uniqid => $subcodes) {
                if (!empty($subcodes)) {
                    $subcodeArray = array_map('trim', explode(',', $subcodes));
                    
                    foreach ($subcodeArray as $subcode) {
                        if (!empty($subcode) && $subcode != '0') {
                            // Get student roll number for unisubstatus
                            $rollSql = "SELECT roll FROM student WHERE uniqid = ?";
                            $rollStmt = $link->prepare($rollSql);
                            $rollStmt->bind_param("s", $uniqid);
                            $rollStmt->execute();
                            $rollResult = $rollStmt->get_result();
                            $student = $rollResult->fetch_assoc();
                            $roll = $student['roll'];
                            $rollStmt->close();
                            
                            $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;
                            
                            // Check if subject exists for this student
                            $checkSql = "SELECT id FROM sturegsubject WHERE uniqid = ? AND subcode = ?";
                            $checkStmt = $link->prepare($checkSql);
                            $checkStmt->bind_param("ss", $uniqid, $subcode);
                            $checkStmt->execute();
                            $checkStmt->store_result();
                            
                            if ($checkStmt->num_rows == 0) {
                                // Insert new registration with status 0
                                $insertSql = "INSERT INTO sturegsubject (classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                             SELECT ?, ?, s.roll, ?, ?, sub.subname, 0, ?
                                             FROM student s 
                                             JOIN subject sub ON sub.subcode = ?
                                             WHERE s.uniqid = ? AND s.classnumber = ? AND s.secgroup = ?";
                                
                                $insertStmt = $link->prepare($insertSql);
                                $insertStmt->bind_param("issssssis", $classnumber, $secgroupname, $uniqid, $subcode, $unisubstatus, $subcode, $uniqid, $classnumber, $secgroupname);
                                
                                if ($insertStmt->execute()) {
                                    $successCount++;
                                }
                                $insertStmt->close();
                            } else {
                                // Update existing registration to status 0
                                $updateSql = "UPDATE sturegsubject SET substatus = 0, unisubstatus = ? WHERE uniqid = ? AND subcode = ?";
                                $updateStmt = $link->prepare($updateSql);
                                $updateStmt->bind_param("sss", $unisubstatus, $uniqid, $subcode);
                                $updateStmt->execute();
                                $updateStmt->close();
                            }
                            $checkStmt->close();
                        }
                    }
                }
            }
        }
        
        $message = "Successfully processed subjects for $successCount students.";
    } else {
        $error = "No student data submitted.";
    }
}

// Get students for the selected class and section group
$students = [];
if ($classnumber && $secgroupname) {
    $studentSql = "SELECT roll, name, fname, uniqid, religion FROM student 
                   WHERE classnumber = ? AND secgroup = ? 
                   ORDER BY roll ASC";
    $studentStmt = $link->prepare($studentSql);
    $studentStmt->bind_param("is", $classnumber, $secgroupname);
    $studentStmt->execute();
    $result = $studentStmt->get_result();
    $students = $result->fetch_all(MYSQLI_ASSOC);
    $studentStmt->close();
}

// Get registered subjects for these students
$optionalSubjects = [];
$notchoiceSubjects = [];
if (!empty($students)) {
    $uniqids = array_column($students, 'uniqid');
    $placeholders = implode(',', array_fill(0, count($uniqids), '?'));
    
    // Get optional subjects (status 4)
    $optSubSql = "SELECT uniqid, subcode FROM sturegsubject 
                  WHERE uniqid IN ($placeholders) AND substatus = 4";
    $optSubStmt = $link->prepare($optSubSql);
    $optSubStmt->bind_param(str_repeat('s', count($uniqids)), ...$uniqids);
    $optSubStmt->execute();
    $result = $optSubStmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        if (!isset($optionalSubjects[$row['uniqid']])) {
            $optionalSubjects[$row['uniqid']] = [];
        }
        $optionalSubjects[$row['uniqid']][] = $row['subcode'];
    }
    $optSubStmt->close();
    
    // Get not-choice subjects (status 0)
    $notSubSql = "SELECT uniqid, subcode FROM sturegsubject 
                  WHERE uniqid IN ($placeholders) AND substatus = 0";
    $notSubStmt = $link->prepare($notSubSql);
    $notSubStmt->bind_param(str_repeat('s', count($uniqids)), ...$uniqids);
    $notSubStmt->execute();
    $result = $notSubStmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        if (!isset($notchoiceSubjects[$row['uniqid']])) {
            $notchoiceSubjects[$row['uniqid']] = [];
        }
        $notchoiceSubjects[$row['uniqid']][] = $row['subcode'];
    }
    $notSubStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Subject Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .student-row:nth-child(even) {
            background-color: #f8f9fa;
        }
        .student-row:hover {
            background-color: #e9ecef;
        }
        .religion-badge {
            background-color: #6f42c1;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.8em;
        }
        .subject-list {
            margin-top: 5px;
            font-size: 0.85rem;
        }
        .input-group-text {
            font-size: 0.8rem;
        }
        .optional-badge {
            background-color: #28a745;
        }
        .notchoice-badge {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Bulk Subject Registration</h2>
        
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-header">
                <h5>Class <?php echo htmlspecialchars($classnumber); ?> - <?php echo htmlspecialchars($secgroupname); ?></h5>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Roll</th>
                                    <th>Student Name</th>
                                    <th>Father's Name</th>
                                    <th>Religion Subject</th>
                                    <th>Optional Subjects (status 4)</th>
                                    <th>Not-Choice Subjects (status 0)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($students)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No students found for this class and section group.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($students as $student): ?>
                                        <tr class="student-row">
                                            <td><?php echo htmlspecialchars($student['roll']); ?></td>
                                            <td><?php echo htmlspecialchars($student['name']); ?></td>
                                            <td><?php echo htmlspecialchars($student['fname']); ?></td>
                                            <td>
                                                <?php
                                                $religion_subject_added = false;
                                                if ($classnumber >= 3 && $classnumber <= 9) {
                                                    switch(strtolower($student['religion'])) {
                                                        case 'hindu':
                                                            $subcode = 111;
                                                            $subname = "Hindu Religion Studies";
                                                            break;
                                                        case 'islam':
                                                            $subcode = 110;
                                                            $subname = "Islamic Studies";
                                                            break;
                                                        case 'christian':
                                                            $subcode = 112;
                                                            $subname = "Christian Religion Studies";
                                                            break;
                                                        case 'bouddha':
                                                            $subcode = 113;
                                                            $subname = "Buddhist Studies";
                                                            break;
                                                        default:
                                                            $subcode = 110;
                                                            $subname = "Religion";
                                                    }
                                                    
                                                    echo "<span class='religion-badge'><i class='fas fa-star'></i> $subname</span>";
                                                    $religion_subject_added = true;
                                                }
                                                
                                                if (!$religion_subject_added) {
                                                    echo "<span class='text-muted'><i class='fas fa-info-circle'></i> Not required</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" 
                                                           name="optional_subjects[<?php echo htmlspecialchars($student['uniqid']); ?>]" 
                                                           class="form-control" 
                                                           value="<?php 
                                                           if (isset($optionalSubjects[$student['uniqid']])) {
                                                               echo htmlspecialchars(implode(',', $optionalSubjects[$student['uniqid']]));
                                                           }
                                                           ?>"
                                                           placeholder="e.g., 134,135">
                                                    <span class="input-group-text optional-badge text-white">Status: 4</span>
                                                </div>
                                                <?php if (isset($optionalSubjects[$student['uniqid']])): ?>
                                                    <div class="subject-list text-muted">
                                                        <small>Current: <?php echo htmlspecialchars(implode(', ', $optionalSubjects[$student['uniqid']])); ?></small>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" 
                                                           name="notchoice_subjects[<?php echo htmlspecialchars($student['uniqid']); ?>]" 
                                                           class="form-control" 
                                                           value="<?php 
                                                           if (isset($notchoiceSubjects[$student['uniqid']])) {
                                                               echo htmlspecialchars(implode(',', $notchoiceSubjects[$student['uniqid']]));
                                                           }
                                                           ?>"
                                                           placeholder="e.g., 136,137">
                                                    <span class="input-group-text notchoice-badge text-white">Status: 0</span>
                                                </div>
                                                <?php if (isset($notchoiceSubjects[$student['uniqid']])): ?>
                                                    <div class="subject-list text-muted">
                                                        <small>Current: <?php echo htmlspecialchars(implode(', ', $notchoiceSubjects[$student['uniqid']])); ?></small>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php if (!empty($students)): ?>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save All Subjects</button>
                            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>