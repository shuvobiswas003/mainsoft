<?php
session_start();
include('interdb.php');

// Initialize variables
$currentSectionId = isset($_GET['section_id']) ? (int)$_GET['section_id'] : null;
$currentSectionName = '';
$dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['assign_teacher'])) {
        // Assign teacher to multiple periods
        $section_id = (int)$_POST['section_id'];
        $teacher_id = (int)$_POST['teacher_id'];
        $periods_to_assign = $_POST['periods'] ?? [];
        
        // Get section info
        $sectionQuery = "SELECT classnumber, secgroupname FROM sectiongroup WHERE id = ?";
        $stmt = mysqli_prepare($link, $sectionQuery);
        mysqli_stmt_bind_param($stmt, 'i', $section_id);
        mysqli_stmt_execute($stmt);
        $sectionResult = mysqli_stmt_get_result($stmt);
        $sectionData = mysqli_fetch_assoc($sectionResult);
        $classnumber = $sectionData['classnumber'];
        $sectionname = $sectionData['secgroupname'];
        
        foreach ($periods_to_assign as $period_data) {
            list($day, $period_id) = explode('-', $period_data);
            $day = (int)$day;
            $period_id = (int)$period_id;
            
            // Get period time info
            $periodQuery = "SELECT start_time, end_time FROM class_periods WHERE id = ?";
            $stmt = mysqli_prepare($link, $periodQuery);
            mysqli_stmt_bind_param($stmt, 'i', $period_id);
            mysqli_stmt_execute($stmt);
            $periodResult = mysqli_stmt_get_result($stmt);
            $periodData = mysqli_fetch_assoc($periodResult);
            $period_start = $periodData['start_time'];
            $period_end = $periodData['end_time'];
            
            // Check if this period is already assigned to another section
            $conflictCheck = "SELECT cr.id, sg.classname, sg.secgroupname 
                            FROM class_routine cr
                            JOIN sectiongroup sg ON cr.section_id = sg.id
                            WHERE cr.day_of_week = ? AND cr.period_id = ? AND cr.section_id != ?";
            $stmt = mysqli_prepare($link, $conflictCheck);
            mysqli_stmt_bind_param($stmt, 'iii', $day, $period_id, $section_id);
            mysqli_stmt_execute($stmt);
            $conflictResult = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($conflictResult) > 0) {
                $conflict = mysqli_fetch_assoc($conflictResult);
                $_SESSION['error'] = "Conflict detected! This period is already assigned to {$conflict['classname']}-{$conflict['secgroupname']}";
                header("Location: teacher_panel.php?section_id=$section_id");
                exit;
            }
            
            // Check if already assigned to this section
            $check = "SELECT id FROM class_routine 
                     WHERE section_id = ? AND day_of_week = ? AND period_id = ?";
            $stmt = mysqli_prepare($link, $check);
            mysqli_stmt_bind_param($stmt, 'iii', $section_id, $day, $period_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            if (mysqli_stmt_num_rows($stmt) > 0) {
                // Update existing assignment
                $update = "UPDATE class_routine SET 
                          teacher_id = ?,
                          period_start = ?,
                          period_end = ?,
                          classnumber = ?,
                          sectionname = ?
                          WHERE section_id = ? AND day_of_week = ? AND period_id = ?";
                $stmt = mysqli_prepare($link, $update);
                mysqli_stmt_bind_param($stmt, 'issssiii', $teacher_id, $period_start, $period_end, 
                                      $classnumber, $sectionname, $section_id, $day, $period_id);
            } else {
                // Insert new assignment
                $insert = "INSERT INTO class_routine 
                          (section_id, day_of_week, period_id, teacher_id, 
                          period_start, period_end, classnumber, sectionname) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($link, $insert);
                mysqli_stmt_bind_param($stmt, 'iiiissss', $section_id, $day, $period_id, $teacher_id,
                                      $period_start, $period_end, $classnumber, $sectionname);
            }
            
            mysqli_stmt_execute($stmt);
        }
        
        header("Location: teacher_panel.php?section_id=$section_id");
        exit;
    } elseif (isset($_POST['remove_assignment'])) {
        // Remove assignment
        $id = (int)$_POST['assignment_id'];
        $section_id = (int)$_POST['section_id'];
        
        $delete = "DELETE FROM class_routine WHERE id = ?";
        $stmt = mysqli_prepare($link, $delete);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        
        header("Location: teacher_panel.php?section_id=$section_id");
        exit;
    }
}

// Get all sections
$sectionsQuery = "SELECT * FROM sectiongroup ORDER BY classnumber, secgroupname";
$sectionsResult = mysqli_query($link, $sectionsQuery);
$sections = [];
while ($row = mysqli_fetch_assoc($sectionsResult)) {
    $sections[] = $row;
}

// Get all teachers
$teachersQuery = "SELECT id, name FROM teacher ORDER BY name";
$teachersResult = mysqli_query($link, $teachersQuery);
$teachers = [];
while ($row = mysqli_fetch_assoc($teachersResult)) {
    $teachers[] = $row;
}

// Get all periods
$periodsQuery = "SELECT * FROM class_periods ORDER BY start_time";
$periodsResult = mysqli_query($link, $periodsQuery);
$periods = [];
while ($row = mysqli_fetch_assoc($periodsResult)) {
    $periods[] = $row;
}

// Get routine for selected section
$routine = [];
if ($currentSectionId) {
    $routineQuery = "SELECT cr.*, p.period_name, t.name as teacher_name 
                     FROM class_routine cr
                     JOIN class_periods p ON cr.period_id = p.id
                     JOIN teacher t ON cr.teacher_id = t.id
                     WHERE cr.section_id = ?
                     ORDER BY cr.day_of_week, p.start_time";
    $stmt = mysqli_prepare($link, $routineQuery);
    mysqli_stmt_bind_param($stmt, 'i', $currentSectionId);
    mysqli_stmt_execute($stmt);
    $routineResult = mysqli_stmt_get_result($stmt);
    
    while ($row = mysqli_fetch_assoc($routineResult)) {
        $routine[$row['day_of_week']][$row['period_id']] = $row;
    }
    
    // Get current section name
    $sectionQuery = "SELECT classname, secgroupname FROM sectiongroup WHERE id = ?";
    $stmt = mysqli_prepare($link, $sectionQuery);
    mysqli_stmt_bind_param($stmt, 'i', $currentSectionId);
    mysqli_stmt_execute($stmt);
    $sectionResult = mysqli_stmt_get_result($stmt);
    $sectionData = mysqli_fetch_assoc($sectionResult);
    $currentSectionName = $sectionData ? $sectionData['classname'] . ' - ' . $sectionData['secgroupname'] : '';
    
    // Get teacher summary with detailed information
    $summaryQuery = "SELECT t.id, t.name, 
                GROUP_CONCAT(DISTINCT CONCAT(sg.classname, '-', sg.secgroupname)) as sections,
                GROUP_CONCAT(DISTINCT p.period_name) as periods,
                GROUP_CONCAT(DISTINCT CASE cr.day_of_week 
                                      WHEN 0 THEN 'Sunday'
                                      WHEN 1 THEN 'Monday'
                                      WHEN 2 THEN 'Tuesday'
                                      WHEN 3 THEN 'Wednesday'
                                      WHEN 4 THEN 'Thursday'
                                      WHEN 5 THEN 'Friday'
                                      WHEN 6 THEN 'Saturday'
                                      END) as days,
                COUNT(cr.id) as period_count
                FROM teacher t
                LEFT JOIN class_routine cr ON t.id = cr.teacher_id
                LEFT JOIN sectiongroup sg ON cr.section_id = sg.id
                LEFT JOIN class_periods p ON cr.period_id = p.id
                WHERE cr.section_id = ?
                GROUP BY t.id
                ORDER BY t.name";
    $stmt = mysqli_prepare($link, $summaryQuery);
    mysqli_stmt_bind_param($stmt, 'i', $currentSectionId);
    mysqli_stmt_execute($stmt);
    $summaryResult = mysqli_stmt_get_result($stmt);
    $teacherSummary = [];
    while ($row = mysqli_fetch_assoc($summaryResult)) {
        $teacherSummary[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Assignment Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #f8f9fa;
            font-size: 0.9rem;
        }
        .container-fluid {
            padding: 20px;
        }
        .section-card {
            cursor: pointer;
            transition: all 0.2s;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 15px;
            border: 1px solid #dee2e6;
        }
        .section-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .routine-table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
        }
        .routine-table th, 
        .routine-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }
        .routine-table th {
            background-color: #343a40;
            color: white;
            font-weight: bold;
        }
        .day-header {
            background-color: #e9ecef;
            font-weight: bold;
        }
        .period-cell {
            min-height: 60px;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        .period-cell:hover {
            background-color: #f8f9fa;
        }
        .period-cell.assigned {
            background-color: #d4edda;
        }
        .period-cell.selected-period {
            background-color: #fff3cd !important;
        }
        .teacher-name {
            font-size: 0.8rem;
            margin-top: 3px;
            font-weight: 500;
        }
        .remove-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: #dc3545;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s;
            border: none;
            padding: 0;
        }
        .period-cell:hover .remove-btn {
            opacity: 1;
        }
        .teacher-list {
            max-height: 500px;
            overflow-y: auto;
        }
        .teacher-item {
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }
        .teacher-item:hover {
            background-color: #f0f7ff;
        }
        .teacher-item.selected {
            background-color: #e2f0fd;
            border-left: 3px solid #0d6efd;
        }
        .teacher-item img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .section-title {
            color: #495057;
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 1.5rem;
        }
        .period-time {
            font-size: 0.7rem;
            color: #6c757d;
        }
        .summary-card {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            height: 100%;
        }
        .summary-item {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .selected-count {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0d6efd;
            color: white;
            padding: 10px 15px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        .print-only {
            display: none;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            .print-only {
                display: block;
            }
            body {
                padding: 0;
                background-color: white;
                font-size: 10pt;
            }
            .routine-table {
                page-break-inside: avoid;
            }
            .routine-table th, 
            .routine-table td {
                padding: 4px;
            }
            .summary-card {
                border: none;
                padding: 0;
            }
        }
        .fixed-header {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 100;
            padding: 15px 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Section Selection Panel -->
        <div id="sectionPanel" class="<?= $currentSectionId ? 'd-none' : '' ?>">
            <div class="fixed-header">
                <h2 class="text-center section-title">Select Class & Section</h2>
            </div>
            <div class="row" id="sectionsContainer">
                <?php if (empty($sections)): ?>
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-info">No sections found</div>
                    </div>
                <?php else: ?>
                    <?php foreach ($sections as $section): ?>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <a href="teacher_panel.php?section_id=<?= $section['id'] ?>" class="card section-card text-decoration-none">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= htmlspecialchars($section['classname']) ?></h5>
                                    <p class="card-text text-muted mb-1">Section: <?= htmlspecialchars($section['secgroupname']) ?></p>
                                    <span class="badge bg-primary">Click to assign</span>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Routine Panel -->
        <div id="routinePanel" class="<?= $currentSectionId ? '' : 'd-none' ?>">
            <div class="fixed-header no-print">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="teacher_panel.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Sections
                    </a>
                    <button onclick="window.print()" class="btn btn-primary">
                        <i class="bi bi-printer"></i> Print Routine
                    </button>
                </div>
                <h2 id="currentSectionHeading" class="text-center mt-3"><?= htmlspecialchars($currentSectionName) ?></h2>
            </div>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error'] ?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            
            <?php if ($currentSectionId): ?>
                <div class="row g-3 mt-2">
                    <!-- Teachers Column -->
                    <div class="col-xl-2 col-lg-3 d-print-none">
                        <div class="summary-card">
                            <h5 class="mb-3"><i class="bi bi-people"></i> Teachers</h5>
                            <div class="teacher-list" id="teachersList">
                                <?php foreach ($teachers as $teacher): ?>
                                    <div class="teacher-item" 
                                         onclick="assignTeacherToSelected(<?= $teacher['id'] ?>, '<?= htmlspecialchars(addslashes($teacher['name'])) ?>')">
                                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($teacher['name']) ?>&background=random&size=36">
                                        <div>
                                            <div class="fw-bold"><?= htmlspecialchars($teacher['name']) ?></div>
                                            <small class="text-muted">Click to assign to selected periods</small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Routine Grid -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="summary-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0"><i class="bi bi-calendar-week"></i> Weekly Routine</h5>
                                <small class="text-muted">Click on cells to select multiple periods</small>
                            </div>
                            <div class="table-responsive">
                                <table class="routine-table">
                                    <thead>
                                        <tr>
                                            <th>Day / Period</th>
                                            <?php foreach ($periods as $period): ?>
                                                <th>
                                                    <?= htmlspecialchars($period['period_name']) ?>
                                                    <div class="period-time"><?= htmlspecialchars($period['start_time']) ?> - <?= htmlspecialchars($period['end_time']) ?></div>
                                                </th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dayNames as $dayIndex => $dayName): ?>
                                            <tr>
                                                <td class="day-header"><?= htmlspecialchars($dayName) ?></td>
                                                
                                                <?php foreach ($periods as $period): ?>
                                                    <?php 
                                                    $periodId = $period['id'];
                                                    $assignment = $routine[$dayIndex][$periodId] ?? null;
                                                    ?>
                                                    
                                                    <td class="period-cell <?= $assignment ? 'assigned' : '' ?>" 
                                                         data-day="<?= $dayIndex ?>" 
                                                         data-period="<?= $periodId ?>"
                                                         onclick="togglePeriodSelection(this, <?= $dayIndex ?>, <?= $periodId ?>)">
                                                        <?php if ($assignment): ?>
                                                            <form method="post" class="d-inline">
                                                                <input type="hidden" name="assignment_id" value="<?= $assignment['id'] ?>">
                                                                <input type="hidden" name="section_id" value="<?= $currentSectionId ?>">
                                                                <button type="submit" name="remove_assignment" class="remove-btn no-print" onclick="return confirm('Are you sure you want to remove this assignment?')">
                                                                    <i class="bi bi-x"></i>
                                                                </button>
                                                            </form>
                                                            <div class="teacher-name">
                                                                <i class="bi bi-person-fill"></i> <?= htmlspecialchars($assignment['teacher_name']) ?>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="text-muted">Click to select</div>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Summary Column -->
                    <div class="col-xl-2 col-lg-2">
                        <div class="summary-card">
                            <h5 class="mb-3"><i class="bi bi-list-check"></i> Teacher Assignments</h5>
                            <div class="teacher-list">
                                <?php if (empty($teacherSummary)): ?>
                                    <div class="alert alert-info py-2">No assignments yet</div>
                                <?php else: ?>
                                    <?php foreach ($teacherSummary as $teacher): ?>
                                        <div class="summary-item">
                                            <div class="fw-bold"><?= htmlspecialchars($teacher['name']) ?></div>
                                            <small class="text-muted d-block">Periods: <?= $teacher['period_count'] ?></small>
                                            <?php if (!empty($teacher['days'])): ?>
                                                <small class="text-muted d-block">Days: <?= htmlspecialchars($teacher['days']) ?></small>
                                            <?php endif; ?>
                                            <?php if (!empty($teacher['periods'])): ?>
                                                <small class="text-muted d-block">Times: <?= htmlspecialchars($teacher['periods']) ?></small>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Selected count display -->
                <div class="selected-count no-print">
                    Selected: <span id="selectedCount">0</span> periods
                </div>
                
                <!-- Print Header -->
                <div class="print-only text-center mb-4">
                    <h2><?= htmlspecialchars($currentSectionName) ?> - Class Routine</h2>
                    <p>Generated on <?= date('F j, Y') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let selectedPeriods = [];
        
        function togglePeriodSelection(element, day, period) {
            const periodKey = `${day}-${period}`;
            const index = selectedPeriods.indexOf(periodKey);
            
            if (index === -1) {
                // Add to selection
                selectedPeriods.push(periodKey);
                element.classList.add('selected-period');
            } else {
                // Remove from selection
                selectedPeriods.splice(index, 1);
                element.classList.remove('selected-period');
            }
            
            updateSelectionCount();
        }
        
        function updateSelectionCount() {
            const countElement = document.getElementById('selectedCount');
            if (countElement) {
                countElement.textContent = selectedPeriods.length;
            }
        }
        
        function assignTeacherToSelected(teacherId, teacherName) {
            if (selectedPeriods.length === 0) {
                alert('Please select at least one period first');
                return;
            }
            
            if (confirm(`Assign ${teacherName} to ${selectedPeriods.length} selected periods?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';
                
                // Add hidden inputs for each selected period
                selectedPeriods.forEach(period => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'periods[]';
                    input.value = period;
                    form.appendChild(input);
                });
                
                // Add other required fields
                const teacherInput = document.createElement('input');
                teacherInput.type = 'hidden';
                teacherInput.name = 'teacher_id';
                teacherInput.value = teacherId;
                form.appendChild(teacherInput);
                
                const sectionInput = document.createElement('input');
                sectionInput.type = 'hidden';
                sectionInput.name = 'section_id';
                sectionInput.value = <?= $currentSectionId ?>;
                form.appendChild(sectionInput);
                
                const assignInput = document.createElement('input');
                assignInput.type = 'hidden';
                assignInput.name = 'assign_teacher';
                assignInput.value = '1';
                form.appendChild(assignInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>