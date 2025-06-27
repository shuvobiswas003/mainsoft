<?php
session_start();
require "interdb.php";

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

$action = $_GET['action'] ?? $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'get_subjects':
            $classNumber = $_GET['classnumber'] ?? null;
            $section = $_GET['secgroup'] ?? null;
            
            $query = "SELECT s.*, c.classname, g.gradename, t.name as subteacher 
                      FROM subject s 
                      JOIN class c ON s.classnumber = c.classnumber 
                      LEFT JOIN gradename g ON s.gradecode = g.gradecode 
                      LEFT JOIN teacher t ON s.teacherid = t.id";
            
            $conditions = [];
            $params = [];
            $types = '';
            
            if ($classNumber) {
                $conditions[] = "s.classnumber = ?";
                $params[] = $classNumber;
                $types .= 's';
            }
            
            if ($section) {
                $conditions[] = "s.secgroup = ?";
                $params[] = $section;
                $types .= 's';
            }
            
            if (!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
            
            $query .= " ORDER BY c.classnumber, s.secgroup, s.subname";
            
            $stmt = mysqli_prepare($link, $query);
            
            if (!empty($params)) {
                mysqli_stmt_bind_param($stmt, $types, ...$params);
            }
            
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Database query failed: " . mysqli_error($link));
            }
            
            $result = mysqli_stmt_get_result($stmt);
            
            $subjects = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $subjects[] = [
                    'id' => (int)$row['id'],
                    'classname' => $row['classname'],
                    'classnumber' => $row['classnumber'],
                    'secgroup' => $row['secgroup'],
                    'subname' => $row['subname'],
                    'subcode' => (int)$row['subcode'],
                    'subfullmarks' => (int)$row['subfullmarks'],
                    'gradecode' => $row['gradecode'],
                    'gradename' => $row['gradename'],
                    'subteacher' => $row['subteacher'],
                    'teacherid' => (int)$row['teacherid']
                ];
            }
            
            echo json_encode($subjects);
            break;
            
        case 'get_subject':
            $id = (int)($_GET['id'] ?? 0);
            
            if ($id <= 0) {
                throw new Exception("Invalid subject ID");
            }
            
            $query = "SELECT * FROM subject WHERE id = ?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Database query failed: " . mysqli_error($link));
            }
            
            $result = mysqli_stmt_get_result($stmt);
            
            if ($subject = mysqli_fetch_assoc($result)) {
                // Convert numeric fields to proper types
                $subject['id'] = (int)$subject['id'];
                $subject['subcode'] = (int)$subject['subcode'];
                $subject['subfullmarks'] = (int)$subject['subfullmarks'];
                $subject['teacherid'] = (int)$subject['teacherid'];
                
                echo json_encode($subject);
            } else {
                throw new Exception("Subject not found");
            }
            break;
            
        case 'save_subjects':
            // Validate required parameters
            if (empty($_POST['classnumber'])) {
                throw new Exception("Class number is required");
            }
            
            if (empty($_POST['secgroup'])) {
                throw new Exception("Section is required");
            }
            
            if (empty($_POST['subjects'])) {
                throw new Exception("Subjects data is required");
            }
            
            $classNumber = $_POST['classnumber'];
            $section = $_POST['secgroup'];
            $subjects = json_decode($_POST['subjects'], true);
            
            // Validate JSON decoding
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Invalid subjects data format");
            }
            
            // Start transaction
            mysqli_begin_transaction($link);
            
            try {
                // First delete existing subjects for this class and section
                $deleteQuery = "DELETE FROM subject WHERE classnumber = ? AND secgroup = ?";
                $stmt = mysqli_prepare($link, $deleteQuery);
                mysqli_stmt_bind_param($stmt, 'ss', $classNumber, $section);
                
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to clear existing subjects: " . mysqli_error($link));
                }
                
                // Insert new subjects
                $insertQuery = "INSERT INTO subject (classnumber, secgroup, subname, subcode, subfullmarks, gradecode, teacherid) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($link, $insertQuery);
                
                foreach ($subjects as $subject) {
                    // Validate subject data
                    if (empty($subject['subname']) || empty($subject['subcode'])) {
                        throw new Exception("Subject name and code are required");
                    }
                    
                    $teacherid = !empty($subject['teacherid']) ? (int)$subject['teacherid'] : 0;
                    
                    mysqli_stmt_bind_param($stmt, 'ssssisi', 
                        $classNumber, 
                        $section, 
                        trim($subject['subname']), 
                        (int)$subject['subcode'], 
                        (int)$subject['subfullmarks'], 
                        trim($subject['gradecode']), 
                        $teacherid
                    );
                    
                    if (!mysqli_stmt_execute($stmt)) {
                        throw new Exception("Failed to save subject: " . mysqli_error($link));
                    }
                }
                
                // Commit transaction
                mysqli_commit($link);
                echo json_encode(['success' => true, 'message' => 'Subjects saved successfully']);
            } catch (Exception $e) {
                // Rollback on error
                mysqli_rollback($link);
                throw $e;
            }
            break;
            
        case 'update_subject':
            // Validate required parameters
            $id = (int)($_POST['id'] ?? 0);
            
            if ($id <= 0) {
                throw new Exception("Invalid subject ID");
            }
            
            if (empty($_POST['subname'])) {
                throw new Exception("Subject name is required");
            }
            
            if (empty($_POST['subcode'])) {
                throw new Exception("Subject code is required");
            }
            
            $subname = $_POST['subname'];
            $subcode = (int)$_POST['subcode'];
            $subfullmarks = (int)$_POST['subfullmarks'];
            $gradecode = $_POST['gradecode'];
            $teacherid = (int)$_POST['teacherid'];
            
            $query = "UPDATE subject SET 
                      subname = ?, 
                      subcode = ?, 
                      subfullmarks = ?, 
                      gradecode = ?, 
                      teacherid = ? 
                      WHERE id = ?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 'sisisi', 
                trim($subname), 
                $subcode, 
                $subfullmarks, 
                trim($gradecode), 
                $teacherid, 
                $id
            );
            
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to update subject: " . mysqli_error($link));
            }
            
            if (mysqli_stmt_affected_rows($stmt) === 0) {
                throw new Exception("No changes made or subject not found");
            }
            
            echo json_encode(['success' => true, 'message' => 'Subject updated successfully']);
            break;
            
        case 'delete_subject':
            $id = (int)($_POST['id'] ?? 0);
            
            if ($id <= 0) {
                throw new Exception("Invalid subject ID");
            }
            
            $query = "DELETE FROM subject WHERE id = ?";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to delete subject: " . mysqli_error($link));
            }
            
            if (mysqli_stmt_affected_rows($stmt) === 0) {
                throw new Exception("Subject not found");
            }
            
            echo json_encode(['success' => true, 'message' => 'Subject deleted successfully']);
            break;
            
        case 'bulk_action':
            // Validate required parameters
            if (empty($_POST['classnumber'])) {
                throw new Exception("Class number is required");
            }
            
            if (empty($_POST['secgroup'])) {
                throw new Exception("Section is required");
            }
            
            if (empty($_POST['bulkAction'])) {
                throw new Exception("Action is required");
            }
            
            $classNumber = $_POST['classnumber'];
            $section = $_POST['secgroup'];
            $bulkAction = $_POST['bulkAction'];
            
            if ($bulkAction === 'delete') {
                $query = "DELETE FROM subject WHERE classnumber = ? AND secgroup = ?";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, 'ss', $classNumber, $section);
                
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to delete subjects: " . mysqli_error($link));
                }
                
                $affectedRows = mysqli_stmt_affected_rows($stmt);
                echo json_encode([
                    'success' => true, 
                    'message' => "Deleted $affectedRows subjects successfully"
                ]);
            } else {
                // For update, you might want to add specific update logic here
                echo json_encode(['success' => true, 'message' => 'Bulk update completed']);
            }
            break;
            
        case 'get_sections':
            if (empty($_GET['classnumber'])) {
                throw new Exception("Class number is required");
            }
            
            $classNumber = $_GET['classnumber'];
            
            // First try to get sections from subject table
            $query = "SELECT DISTINCT secgroup FROM subject WHERE classnumber = ? ORDER BY secgroup";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 's', $classNumber);
            
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to fetch sections: " . mysqli_error($link));
            }
            
            $result = mysqli_stmt_get_result($stmt);
            $sections = [];
            
            while ($row = mysqli_fetch_assoc($result)) {
                $sections[] = $row['secgroup'];
            }
            
            // If no sections found in subjects, get from class_sections table if exists
            if (empty($sections)) {
                $tableExists = mysqli_query($link, "SHOW TABLES LIKE 'class_sections'");
                
                if (mysqli_num_rows($tableExists) > 0) {
                    $query = "SELECT DISTINCT section_name FROM class_sections WHERE class_id = ? ORDER BY section_name";
                    $stmt = mysqli_prepare($link, $query);
                    mysqli_stmt_bind_param($stmt, 's', $classNumber);
                    
                    if (mysqli_stmt_execute($stmt)) {
                        $result = mysqli_stmt_get_result($stmt);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sections[] = $row['section_name'];
                        }
                    }
                }
            }
            
            echo json_encode($sections);
            break;
            
        case 'get_grades':
            $query = "SELECT * FROM gradename ORDER BY gradecode";
            $result = mysqli_query($link, $query);
            
            if (!$result) {
                throw new Exception("Failed to fetch grades: " . mysqli_error($link));
            }
            
            $grades = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $grades[] = $row;
            }
            
            echo json_encode($grades);
            break;
            
        case 'get_teachers':
            $query = "SELECT id, name FROM teacher ORDER BY name";
            $result = mysqli_query($link, $query);
            
            if (!$result) {
                throw new Exception("Failed to fetch teachers: " . mysqli_error($link));
            }
            
            $teachers = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $teachers[] = [
                    'id' => (int)$row['id'],
                    'name' => $row['name']
                ];
            }
            
            echo json_encode($teachers);
            break;
            
        case 'import_subjects':
            // Validate required parameters
            if (empty($_POST['classnumber'])) {
                throw new Exception("Class number is required");
            }
            
            if (empty($_POST['secgroup'])) {
                throw new Exception("Section is required");
            }
            
            if (empty($_FILES['excelFile']) || $_FILES['excelFile']['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Please upload a valid Excel file");
            }
            
            $classNumber = $_POST['classnumber'];
            $section = $_POST['secgroup'];
            
            // Check if PHPExcel/PhpSpreadsheet is available
            if (!class_exists('PhpOffice\PhpSpreadsheet\IOFactory')) {
                throw new Exception("PHPExcel/PhpSpreadsheet library is required for Excel import");
            }
            
            $filePath = $_FILES['excelFile']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            
            // Skip header row
            array_shift($rows);
            
            // Start transaction
            mysqli_begin_transaction($link);
            
            try {
                // First delete existing subjects for this class and section
                $deleteQuery = "DELETE FROM subject WHERE classnumber = ? AND secgroup = ?";
                $stmt = mysqli_prepare($link, $deleteQuery);
                mysqli_stmt_bind_param($stmt, 'ss', $classNumber, $section);
                
                if (!mysqli_stmt_execute($stmt)) {
                    throw new Exception("Failed to clear existing subjects: " . mysqli_error($link));
                }
                
                // Insert new subjects
                $insertQuery = "INSERT INTO subject (classnumber, secgroup, subname, subcode, subfullmarks, gradecode, teacherid) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($link, $insertQuery);
                
                $importedCount = 0;
                foreach ($rows as $row) {
                    if (count($row) >= 5) {
                        $subname = trim($row[0] ?? '');
                        $subcode = (int)($row[1] ?? 0);
                        $subfullmarks = (int)($row[2] ?? 0);
                        $gradecode = trim($row[3] ?? '');
                        $teacherid = (int)($row[4] ?? 0);
                        
                        // Skip empty rows
                        if (empty($subname) || $subcode <= 0) {
                            continue;
                        }
                        
                        mysqli_stmt_bind_param($stmt, 'ssssisi', 
                            $classNumber, 
                            $section, 
                            $subname, 
                            $subcode, 
                            $subfullmarks, 
                            $gradecode, 
                            $teacherid
                        );
                        
                        if (!mysqli_stmt_execute($stmt)) {
                            throw new Exception("Failed to import subject: " . mysqli_error($link));
                        }
                        
                        $importedCount++;
                    }
                }
                
                // Commit transaction
                mysqli_commit($link);
                echo json_encode([
                    'success' => true, 
                    'message' => "Successfully imported $importedCount subjects"
                ]);
            } catch (Exception $e) {
                // Rollback on error
                mysqli_rollback($link);
                throw $e;
            }
            break;
            
        default:
            throw new Exception("Invalid action");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}