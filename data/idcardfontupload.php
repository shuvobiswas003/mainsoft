<?php

// Initialize the session

session_start();

 

// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){

    header("location: login.php");

    exit;

}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"])) {
        $file_name = "idf.png";
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_size = $_FILES["image"]["size"];
        $file_error = $_FILES["image"]["error"];

        // Check for errors in the uploaded file
        if ($file_error !== UPLOAD_ERR_OK) {
            die("Error uploading file: " . $file_error);
        }

        // Move the uploaded file to the desired location
        $upload_path = "idcard/"; // Folder where you want to store the uploaded images
        $file_destination = $upload_path . $file_name;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error uploading image.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Image Upload</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Select Image:</label>
                                <input type="file" id="image" name="image" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
