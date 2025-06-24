<?php
require "interdb.php";
// SQL query to select all data from your table
$sql = "SELECT * FROM stuattdancedata";

// Execute the query
$result = $link->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Create a file handle for writing the CSV data
    $file = fopen("data.csv", "w");

    // Output the header row
    $header = array("ID", "Machine ID", "Student ID", "Date", "Time", "Cinout", "Cinout ID", "Unique Attendance ID", "Status");
    fputcsv($file, $header);

    // Loop through the rows and write them to the CSV file
    while ($row = $result->fetch_assoc()) {
        // Output data of each row
        fputcsv($file, $row);
    }

    // Close the CSV file
    fclose($file);
    
    // Provide a download link for the generated CSV file
    header("Content-Disposition: attachment; filename=data.csv");
    header("Content-Type: application/csv");
    readfile("data.csv");
} else {
    echo "No data found.";
}

// Close the database connection
$link->close();
?>
