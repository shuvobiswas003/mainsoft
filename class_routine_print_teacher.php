<?php
include('interdb.php');

// Get school information
$schoolInfoQuery = "SELECT * FROM schoolinfo LIMIT 1";
$schoolInfoResult = mysqli_query($link, $schoolInfoQuery);
$schoolInfo = mysqli_fetch_assoc($schoolInfoResult);

// Get all teachers
$teachersQuery = "SELECT * FROM teacher ORDER BY teachersl ASC, id ASC";
$teachersResult = mysqli_query($link, $teachersQuery);
$allTeachers = [];
while ($teacher = mysqli_fetch_assoc($teachersResult)) {
    $allTeachers[$teacher['id']] = $teacher;
}

// Get all periods for the timetable structure
$periodsQuery = "SELECT * FROM class_periods ORDER BY start_time";
$periodsResult = mysqli_query($link, $periodsQuery);
$periods = [];
while ($row = mysqli_fetch_assoc($periodsResult)) {
    $periods[] = $row;
}

$dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Get all teacher routines at once
$teacherRoutines = [];
foreach ($allTeachers as $teacherId => $teacher) {
    $routineQuery = "SELECT cr.day_of_week, cr.period_id, p.period_name, p.start_time, p.end_time,
                    sg.classname, sg.secgroupname
                    FROM class_routine cr
                    JOIN class_periods p ON cr.period_id = p.id
                    JOIN sectiongroup sg ON cr.section_id = sg.id
                    WHERE cr.teacher_id = $teacherId
                    ORDER BY cr.day_of_week, p.start_time";
    $routineResult = mysqli_query($link, $routineQuery);
    
    $teacherRoutines[$teacherId] = [
        'teacher' => $teacher,
        'classes' => []
    ];
    
    while ($row = mysqli_fetch_assoc($routineResult)) {
        $teacherRoutines[$teacherId]['classes'][$row['day_of_week']][$row['period_id']] = [
            'class' => $row['classname'] . ' - ' . $row['secgroupname'],
            'period_name' => $row['period_name'],
            'start_time' => $row['start_time'],
            'end_time' => $row['end_time']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Teacher Routines - <?= htmlspecialchars($schoolInfo['schoolname']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }
    
    .no-print-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .print-controls {
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 30px;
        border: 1px solid #bdc3c7;
    }
    .btn-print {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        border: none;
        color: white;
        font-weight: 500;
    }
    .btn-print:hover {
        background: linear-gradient(135deg, #162a4e 0%, #1d3b7a 100%);
        color: white;
    }
    .teacher-cell {
        background-color: #e3f2fd !important;
    }

    @media print {
        @page {
            size: A4 landscape;
            margin: 0.5cm;
        }
        
        body {
            padding: 0;
            background-color: white;
            font-size: 10pt;
            color: #000 !important;
        }
        
        .no-print {
            display: none !important;
        }
        
        .print-page {
            page-break-after: always;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .header-text {
            margin-left: 20px;
            text-align: center;
        }
        
        .school-logo {
            height: 70px;
            width: auto;
            border: 2px solid #000 !important;
            border-radius: 5px;
            background-color: white !important;
            padding: 3px;
        }
        
        .routine-table {
            width: 100%;
            border-collapse: collapse;
            page-break-inside: avoid;
            margin-bottom: 15px;
            border: 2px solid #000 !important;
        }
        
        .routine-table th {
            background: #f0f0f0 !important;
            color: #000 !important;
            border: 2px solid #000 !important;
            padding: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 10pt;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        .routine-table td {
            border: 2px solid #000 !important;
            padding: 8px;
            text-align: center;
            background-color: white !important;
            font-size: 9pt;
            color: #000 !important;
        }
        
        .day-header {
            background: #e0e0e0 !important;
            color: #000 !important;
            font-weight: bold;
            border: 2px solid #000 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        .teacher-routine-title {
            page-break-after: avoid;
            margin: 15px 0;
            background: #d0d0d0 !important;
            color: #000 !important;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            border: 2px solid #000 !important;
            font-size: 12pt;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        .class-name {
            font-size: 9pt;
            font-weight: 600;
            color: #000 !important;
        }
        
        .period-time {
            font-size: 8pt;
            color: #555 !important;
            font-weight: bold;
        }
        
        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            page-break-inside: avoid;
        }
        
        .signature-box {
            width: 45%;
            border-top: 2px solid #000 !important;
            padding-top: 8px;
            color: #000 !important;
            font-weight: bold;
            font-size: 10pt;
            text-align: center;
        }
        
        .signature-name {
            font-weight: bold;
            margin-top: 40px;
            font-size: 11pt;
        }
        
        .signature-designation {
            font-size: 9pt;
        }
        
        .print-date {
            text-align: right;
            margin-bottom: 10px;
            font-size: 9pt;
        }
        
        .teacher-info {
            background: #e0e0e0 !important;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #000 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        
        .teacher-info-label {
            font-weight: bold;
            margin-right: 5px;
        }
    }
    </style>
</head>
<body>
    <div class="no-print-container no-print">
        <div class="print-controls">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="mb-0" style="color: #1e3c72;">
                    <i class="bi bi-person-vcard"></i> All Teacher Routines
                </h1>
                <div>
                    <button onclick="window.print()" class="btn btn-print me-2">
                        <i class="bi bi-printer"></i> Print All
                    </button>
                    <a href="dashboard.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Dashboard
                    </a>
                </div>
            </div>
            <div class="alert alert-primary">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="mb-1">
                        <span class="info-badge"><i class="bi bi-building"></i> School</span>
                        <?= htmlspecialchars($schoolInfo['schoolname']) ?>
                    </div>
                    <div class="mb-1">
                        <span class="info-badge"><i class="bi bi-geo-alt"></i> Address</span>
                        <?= htmlspecialchars($schoolInfo['schooladdress']) ?>
                    </div>
                    <div class="mb-1">
                        <span class="info-badge"><i class="bi bi-123"></i> EIIN</span>
                        <?= htmlspecialchars($schoolInfo['eiin']) ?>
                    </div>
                    <div>
                        <span class="info-badge"><i class="bi bi-people"></i> Teachers</span>
                        <?= count($teacherRoutines) ?> Teachers
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($teacherRoutines as $teacherId => $teacherData): ?>
        <div class="print-page">
            <!-- School Header -->
            <div class="header-content">
                <img src="./img/lego.png" class="school-logo" height="100px" alt="School Logo">
                <div class="header-text">
                    <h2 style="margin: 0; font-weight: 700;"><?= htmlspecialchars($schoolInfo['schoolname']) ?></h2>
                    <p style="margin: 5px 0 0; font-size: 11pt;"><?= htmlspecialchars($schoolInfo['schooladdress']) ?></p>
                    <div style="font-size: 9pt; margin-top: 5px;">
                        EIIN: <?= htmlspecialchars($schoolInfo['eiin']) ?> | 
                        ESTD: <?= htmlspecialchars($schoolInfo['estd']) ?>
                    </div>
                </div>
            </div>
            
            <div class="print-date">
                Printed: <?= date('d/m/Y h:i A') ?>
            </div>

            <!-- Teacher Info -->
            <div class="teacher-info">
                <div><span class="teacher-info-label">Teacher Name:</span> <?= htmlspecialchars($teacherData['teacher']['name']) ?></div>
                <div><span class="teacher-info-label">Designation:</span> <?= htmlspecialchars($teacherData['teacher']['degnation']) ?></div>
                <div><span class="teacher-info-label">Mobile:</span> <?= htmlspecialchars($teacherData['teacher']['mob']) ?></div>
                <div><span class="teacher-info-label">Joining Date:</span> <?= htmlspecialchars($teacherData['teacher']['joindate']) ?></div>
            </div>

            <!-- Teacher Routine -->
            <h3 class="teacher-routine-title">
                <i class="bi bi-calendar-week"></i> TEACHER ROUTINE
            </h3>
            
            <table class="routine-table">
                <thead>
                    <tr>
                        <th width="12%">DAY / PERIOD</th>
                        <?php foreach ($periods as $period): ?>
                            <th>
                                <div><?= htmlspecialchars($period['period_name']) ?></div>
                                <div class="period-time">
                                    <?= htmlspecialchars($period['start_time']) ?> - <?= htmlspecialchars($period['end_time']) ?>
                                </div>
                            </th>
                        <?php endforeach; ?>
                        <th width="12%">DAY / PERIOD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dayNames as $dayIndex => $dayName): ?>
                        <tr>
                            <td class="day-header"><?= strtoupper(htmlspecialchars($dayName)) ?></td>
                            <?php foreach ($periods as $period): ?>
                                <?php 
                                $periodId = $period['id'];
                                $class = $teacherData['classes'][$dayIndex][$periodId] ?? null;
                                ?>
                                <td class="<?= $class ? 'teacher-cell' : '' ?>">
                                    <?php if ($class): ?>
                                        <div class="class-name">
                                            <?= htmlspecialchars($class['class']) ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-muted">-</div>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                            <td class="day-header"><?= strtoupper(htmlspecialchars($dayName)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <!-- Footer -->
           
        </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        if (window.location.search.includes('print=1')) {
            window.print();
        }
    </script>
</body>
</html>