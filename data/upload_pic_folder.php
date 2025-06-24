<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Folder</title>
</head>
<body>
    <h2>Upload Multiple Images</h2>
    <form action="upload_pic_folder_data.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple required>
        <input type="text" name="uploadDir" value="../img/student/2025/6/A">  <!-- Hidden input for directory -->
        <button type="submit" name="upload">Upload Files</button>
    </form>
</body>
</html>
