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

// Handle sample file download
if (isset($_GET['download_sample'])) {
    require_once 'vendor/autoload.php';
    
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Set headers
    $sheet->setCellValue('A1', 'Class Number');
    $sheet->setCellValue('B1', 'Section');
    $sheet->setCellValue('C1', 'Subject Name');
    $sheet->setCellValue('D1', 'Subject Code');
    $sheet->setCellValue('E1', 'Full Marks');
    $sheet->setCellValue('F1', 'Grade Code');
    $sheet->setCellValue('G1', 'Teacher Name');
    $sheet->setCellValue('H1', 'Barcode');
    
    // Sample data
    $sampleData = [
        ['6', 'A', 'Mathematics', '101', '100', 'gr001', 'John Smith', '123456'],
        ['6', 'A', 'Science', '102', '100', 'gr001', 'Sarah Johnson', '123457'],
        ['6', 'B', 'Mathematics', '101', '100', 'gr001', 'Robert Brown', '123458'],
        ['7', 'A', 'English', '201', '100', 'gr002', 'Emily Davis', '123459'],
        ['7', 'B', 'Science', '102', '100', 'gr002', 'Michael Wilson', '123460']
    ];
    
    // Add sample data starting from row 2
    $sheet->fromArray($sampleData, null, 'A2');
    
    // Set column widths
    $sheet->getColumnDimension('A')->setWidth(15);
    $sheet->getColumnDimension('B')->setWidth(10);
    $sheet->getColumnDimension('C')->setWidth(20);
    $sheet->getColumnDimension('D')->setWidth(15);
    $sheet->getColumnDimension('E')->setWidth(12);
    $sheet->getColumnDimension('F')->setWidth(12);
    $sheet->getColumnDimension('G')->setWidth(20);
    $sheet->getColumnDimension('H')->setWidth(15);
    
    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="sample_subjects.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}

// Process Excel file upload for preview
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["import_file"]) && empty($_POST["confirm_import"])) {
    require_once 'vendor/autoload.php';
    
    $file = $_FILES["import_file"]["tmp_name"];
    $file_name = $_FILES["import_file"]["name"];
    
    try {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        
        // Store first 5 rows for preview
        $preview_data = array_slice($rows, 0, 5);
        $show_preview = true;
        
        // Store file in session for actual import
        $_SESSION["import_file"] = [
            'tmp_name' => $file,
            'name' => $file_name
        ];
        
    } catch (Exception $e) {
        $error_message = "Error reading file: " . $e->getMessage();
    }
}

// Handle cancel action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel_import"])) {
    unset($_SESSION["import_file"]);
    $show_preview = false;
}

// Process actual import after preview confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_import"])) {
    require_once 'vendor/autoload.php';
    
    if (!isset($_SESSION["import_file"])) {
        $error_message = "No file to import. Please upload again.";
    } else {
        $file = $_SESSION["import_file"]['tmp_name'];
        
        try {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();
            
            $link->begin_transaction();
            $import_count = 0;
            
            // Skip header row (row 1)
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];
                
                // Skip empty rows
                if (empty($row[0])) continue;
                
                $classnumber = trim($row[0]);
                $secgroup = trim($row[1]);
                $subname = trim($row[2]);
                $subcode = trim($row[3]);
                $subfullmarks = trim($row[4]);
                $gradecode = trim($row[5]);
                $teachername = trim($row[6]);
                $barcode = !empty($row[7]) ? trim($row[7]) : NULL;
                
                // Get class details
                $class = $link->query("SELECT * FROM class WHERE classnumber='$classnumber'")->fetch_assoc();
                if (!$class) {
                    throw new Exception("Class not found: $classnumber");
                }
                
                // Get teacher ID
                $teacher = $link->query("SELECT id FROM teacher WHERE name='$teachername'")->fetch_assoc();
                if (!$teacher) {
                    throw new Exception("Teacher not found: $teachername");
                }
                
                // Generate uni value
                $uni = $classnumber  . $secgroup . $subcode;
                
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
                    $teacher['id'],
                    $uni, 
                    $barcode
                );
                $stmt->execute();
                $import_count++;
            }
            
            $link->commit();
            $success_message = "Successfully imported $import_count subjects!";
            unset($_SESSION["import_file"]);
            
        } catch (Exception $e) {
            $link->rollback();
            $error_message = "Import failed: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        .card-header {
            background-color: #4e73df;
            color: white;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        .alert-fixed {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 300px;
        }
        .preview-table {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <?php if ($success_message): ?>
            <div class="alert alert-success alert-dismissible fade show alert-fixed" role="alert">
                <?= $success_message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if ($error_message): ?>
            <div class="alert alert-danger alert-dismissible fade show alert-fixed" role="alert">
                <?= $error_message ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-file-import me-2"></i>Import Subjects</h5>
            </div>
            <div class="card-body">
                <?php if (!$show_preview): ?>
                    <!-- File Upload Form -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="import_file" class="form-label">Select Excel File (CSV/XLS/XLSX)</label>
                            <input class="form-control" type="file" id="import_file" name="import_file" accept=".csv,.xls,.xlsx" required>
                        </div>
                        
                        <div class="mb-4">
                            <h5>Excel File Format:</h5>
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Class Number</th>
                                        <th>Section</th>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Full Marks</th>
                                        <th>Grade Code</th>
                                        <th>Teacher Name</th>
                                        <th>Barcode (Optional)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>6</td>
                                        <td>A</td>
                                        <td>Mathematics</td>
                                        <td>101</td>
                                        <td>100</td>
                                        <td>gr001</td>
                                        <td>John Smith</td>
                                        <td>123456</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="?download_sample=1" class="btn btn-sm btn-outline-primary mt-2">
                                <i class="fas fa-download me-1"></i> Download Sample File
                            </a>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="subject_management.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to Subjects
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> Preview Import
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <!-- Preview and Confirm Form -->
                    <div class="mb-4">
                        <h5>Preview of <?= htmlspecialchars($_SESSION['import_file']['name']) ?></h5>
                        <div class="preview-table">
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Class Number</th>
                                        <th>Section</th>
                                        <th>Subject Name</th>
                                        <th>Subject Code</th>
                                        <th>Full Marks</th>
                                        <th>Grade Code</th>
                                        <th>Teacher Name</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($preview_data as $index => $row): ?>
                                        <tr>
                                            <?php for ($i = 0; $i < 8; $i++): ?>
                                                <td><?= $index === 0 ? '<strong>' . htmlspecialchars($row[$i] ?? '') . '</strong>' : htmlspecialchars($row[$i] ?? '') ?></td>
                                            <?php endfor; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i> Showing first 5 rows of the file. Total rows: <?= count($rows) ?>
                        </div>
                    </div>
                    
                    <form method="post">
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="cancel_import" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </button>
                            <button type="submit" name="confirm_import" class="btn btn-success">
                                <i class="fas fa-check me-1"></i> Confirm Import
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
</body>
</html>