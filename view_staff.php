<?php
require "interdb.php";

// Check if the teacher ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $teacher_id = $_GET['id'];
    // Include the profile page and it will display the data for the provided teacher ID
    include 'staffprofile.php';
} else {
    // Redirect to a page with an error message if the teacher ID is not provided
    header('Location: error.php');
    exit();
}
?>
