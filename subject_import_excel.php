<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require "interdb.php";

$success_message = "";
$error_message = "";
$preview_data = [];
$show_preview = false;
$rows = [];

// Sample download
if (isset($_GET['download_sample'])) {
    require_once 'vendor/autoload.php';

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Class Number');
    $sheet->setCellValue('B1', 'Section');
    $sheet->setCellValue('C1', 'Subject Name');
    $sheet->setCellValue('D1', 'Subject Code');
    $sheet->setCellValue('E1', 'Full Marks');
    $sheet->setCellValue('F1', 'Grade Code');
    $sheet->setCellValue('G1', 'Teacher Name');
    $sheet->setCellValue('H1', 'Barcode');

    $sheet->fromArray([
        ['6', 'A', 'Mathematics', '101', '100', 'gr001', 'John Smith', '123456'],
        ['6', 'A', 'Science', '102', '100', 'gr001', 'Sarah Johnson', '123457'],
        ['7', 'A', 'English', '201', '100', 'gr002', 'Emily Davis', '123459'],
    ], null, 'A2');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="sample_subjects.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}

// Handle preview
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["import_file"]) && empty($_POST["confirm_import"])) {
    require_once 'vendor/autoload.php';

    $file = $_FILES["import_file"]["tmp_name"];
    $file_name = $_FILES["import_file"]["name"];

    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true); // Columns as A,B,C...

        $_SESSION["import_rows"] = $rows;
        $_SESSION["import_filename"] = $file_name;

        $preview_data = array_filter(array_slice($rows, 1), function($row) {
            return !empty(array_filter($row));
        });
        $show_preview = true;
    } catch (Exception $e) {
        $error_message = "Error reading file: " . $e->getMessage();
    }
}

// Cancel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel_import"])) {
    unset($_SESSION["import_rows"]);
    unset($_SESSION["import_filename"]);
    $show_preview = false;
}

// Confirm Import
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_import"])) {
    if (!isset($_SESSION["import_rows"])) {
        $error_message = "No data to import. Please upload again.";
    } else {
        try {
            $rows = $_SESSION["import_rows"];
            $link->begin_transaction();
            $import_count = 0;

            foreach ($rows as $index => $row) {
                if ($index == 1) continue; // skip header
                if (empty($row['A'])) continue;

                $classnumber = trim($row['A']);
                $secgroup = trim($row['B']);
                $subname = trim($row['C']);
                $subcode = trim($row['D']);
                $subfullmarks = trim($row['E']);
                $gradecode = trim($row['F']);
                $teachername = trim($row['G']);
                $barcode = !empty($row['H']) ? trim($row['H']) : NULL;

                $class = $link->query("SELECT * FROM class WHERE classnumber='$classnumber'")->fetch_assoc();
                if (!$class) throw new Exception("Class not found: $classnumber");

                $teacher = $link->query("SELECT id FROM teacher WHERE name='$teachername'")->fetch_assoc();
                if (!$teacher) {
                    $teachername = 'Test';
                    $teacherId = 1;
                } else {
                    $teacherId = $teacher['id'];
                }

                $uni = $classnumber . $secgroup . $subcode;

                $stmt = $link->prepare("INSERT INTO subject 
                    (classname, classnumber, secgroup, subname, subcode, subfullmarks, gradecode, subteacher, teacherid, uni, barcode) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE
                    classname = VALUES(classname),
                    classnumber = VALUES(classnumber),
                    secgroup = VALUES(secgroup),
                    subname = VALUES(subname),
                    subcode = VALUES(subcode),
                    subfullmarks = VALUES(subfullmarks),
                    gradecode = VALUES(gradecode),
                    subteacher = VALUES(subteacher),
                    teacherid = VALUES(teacherid),
                    uni = VALUES(uni),
                    barcode = VALUES(barcode)");

                $stmt->bind_param("ssssiissssi",
                    $class['classname'],
                    $classnumber,
                    $secgroup,
                    $subname,
                    $subcode,
                    $subfullmarks,
                    $gradecode,
                    $teachername,
                    $teacherId,
                    $uni,
                    $barcode
                );

                $stmt->execute();
                $import_count++;
            }

            $link->commit();
            $success_message = "Successfully imported $import_count subjects!";
            unset($_SESSION["import_rows"]);
            unset($_SESSION["import_filename"]);
        } catch (Exception $e) {
            $link->rollback();
            $error_message = "Import failed: " . $e->getMessage();
        }
    }
}
?>


<!-- HTML Output (same as before) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { border-radius: 0.5rem; box-shadow: 0 0.15rem 1rem rgba(0,0,0,0.1); }
        .card-header { background: #4e73df; color: white; }
        .alert-fixed { position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px; }
        .preview-table { max-height: 400px; overflow-y: auto; }
    </style>
</head>
<body>
<div class="container py-4">
    <?php if ($success_message): ?>
        <div class="alert alert-success alert-fixed alert-dismissible fade show"><?= $success_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if ($error_message): ?>
        <div class="alert alert-danger alert-fixed alert-dismissible fade show"><?= $error_message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header"><h5>Import Subjects</h5></div>
        <div class="card-body">
            <?php if (!$show_preview && !isset($_SESSION["import_rows"])): ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Select Excel File</label>
                        <input type="file" name="import_file" class="form-control" accept=".xls,.xlsx" required>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead class="table-dark"><tr><th>Class</th><th>Sec</th><th>Name</th><th>Code</th><th>Marks</th><th>Grade</th><th>Teacher</th><th>Barcode</th></tr></thead>
                            <tbody><tr><td>6</td><td>A</td><td>Math</td><td>101</td><td>100</td><td>gr001</td><td>John</td><td>123456</td></tr></tbody>
                        </table>
                        <a href="?download_sample=1" class="btn btn-outline-primary btn-sm mt-2">Download Sample File</a>
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <a href="bulk_subject.php" class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Preview Import</button>
                    </div>
                </form>
            <?php else: ?>
                <div class="preview-table">
                    <h6>Preview of <?= htmlspecialchars($_SESSION["import_filename"]) ?></h6>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary"><tr><th>Class</th><th>Sec</th><th>Name</th><th>Code</th><th>Marks</th><th>Grade</th><th>Teacher</th><th>Barcode</th></tr></thead>
                        <tbody>
                        <?php foreach ($preview_data as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['A'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['B'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['C'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['D'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['E'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['F'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['G'] ?? '') ?></td>
                                <td><?= htmlspecialchars($row['H'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <form method="post" class="mt-3 d-flex justify-content-between">
                    <button name="cancel_import" class="btn btn-secondary">Cancel</button>
                    <button name="confirm_import" class="btn btn-success">Confirm Import</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>setTimeout(() => { document.querySelectorAll('.alert').forEach(el => el.remove()); }, 5000);</script>
</body>
</html>
