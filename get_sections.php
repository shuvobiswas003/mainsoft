<?php
// Database connection
require 'interdb.php';

// Get the class number from the request
$classnumber = isset($_GET['classnumber']) ? intval($_GET['classnumber']) : 0;

// Query to get sections for the selected class
$query = "SELECT DISTINCT secgroup FROM student WHERE classnumber = ? ORDER BY secgroup";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $classnumber);
$stmt->execute();
$result = $stmt->get_result();

// Start building the options
$options = '';

// If sections found, create options
if ($result->num_rows > 0) {
    while ($section = $result->fetch_assoc()) {
        $secgroup = $section['secgroup'];
        // Skip empty sections
        if (!empty($secgroup)) {
            $options .= '<option value="' . htmlspecialchars($secgroup) . '">' . 
                       htmlspecialchars($secgroup) . '</option>';
        }
    }
}

// If no sections found or all were empty, use defaults
if (empty($options)) {
    $defaultSections = ['A', 'B', 'C', 'D'];
    foreach ($defaultSections as $section) {
        $options .= '<option value="' . htmlspecialchars($section) . '">' . 
                   htmlspecialchars($section) . '</option>';
    }
}

// Close statement and connection
$stmt->close();
$link->close();

// Set the content type
header('Content-Type: text/html');

// Return the options
echo $options;
?>