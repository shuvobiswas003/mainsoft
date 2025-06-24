<?php
if (isset($_POST['upload'])) {
    $uploadDir = isset($_POST['uploadDir']) ? $_POST['uploadDir'] : "uploads/"; // Get directory from form

    // Create directory if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $files = $_FILES['files'];
    $totalFiles = count($files['name']);
    
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = basename($files['name'][$i]);
        $fileTmpName = $files['tmp_name'][$i];
        $targetFilePath = $uploadDir . $fileName;

        // Validate file type (allow only images)
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png", "gif", "bmp");

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                echo "File {$fileName} uploaded successfully.<br>";
            } else {
                echo "Error uploading {$fileName}.<br>";
            }
        } else {
            echo "Invalid file type for {$fileName}. Only images allowed.<br>";
        }
    }
} else {
    echo "No files uploaded.";
}
?>
