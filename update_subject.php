<?php
require "interdb.php";

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_subject'])) {
    try {
        $id = $_POST['edit_subject'];
        $class_id = $_POST['class_id'];
        $section_id = $_POST['section_id'];
        $subname = $_POST['subname'];
        $subcode = $_POST['subcode'];
        $subfullmarks = $_POST['subfullmarks'];
        $gradecode = $_POST['gradecode'];
        $subteacher = $_POST['subteacher'];
        $teacherid = $_POST['teacherid'];
        $barcode = !empty($_POST['barcode']) ? $_POST['barcode'] : NULL;
        
        // Get class and section details
        $class = $link->query("SELECT * FROM class WHERE id = $class_id")->fetch_assoc();
        $section = $link->query("SELECT * FROM sectiongroup WHERE id = $section_id")->fetch_assoc();
        
        // Generate uni value
        $uni = $class['classnumber'] . '.' . $section['secgroupname'] . '.' . $subcode;
        
        $stmt = $link->prepare("UPDATE subject SET 
                              classname = ?, classnumber = ?, secgroup = ?, 
                              subname = ?, subcode = ?, subfullmarks = ?, 
                              gradecode = ?, subteacher = ?, teacherid = ?, 
                              uni = ?, barcode = ?
                              WHERE id = ?");
        
        $stmt->bind_param("ssssiissssi", 
            $class['classname'], $class['classnumber'], $section['secgroupname'],
            $subname, $subcode, $subfullmarks,
            $gradecode, $subteacher, $teacherid,
            $uni, $barcode, $id);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Subject updated successfully';
        } else {
            $response['message'] = 'Error updating subject';
        }
    } catch (Exception $e) {
        $response['message'] = 'Error: ' . $e->getMessage();
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>