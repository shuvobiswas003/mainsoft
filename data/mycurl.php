<?php
      
$studentcounter=0;
require "../interdb.php";
// Execute a MySQL query
$query = "SELECT * FROM student";
$result = mysqli_query($link, $query);

// Fetch the query results as an array
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the MySQL connection
mysqli_close($link);

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

?>