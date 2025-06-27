<?php
require "interdb.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $link->prepare("SELECT * FROM subject WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $subject = $result->fetch_assoc();
    
    header('Content-Type: application/json');
    echo json_encode($subject);
}
?>