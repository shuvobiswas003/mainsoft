<?php
// Set headers to force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="student_data.csv"');

// Output buffer to capture CSV data
$output = fopen('php://output', 'w');

// Define the CSV header row
$csvHeader = array(
    'Class',
    'Section/Group',
    'Roll',
    'Name',
    'Father Name',
    'Mother Name',
    'Date Of Birth',
    'Birth ID',
    'Gender',
    'Address',
    'Mobile'
);

// Write the CSV header row to the output
fputcsv($output, $csvHeader);

// Fetch data from the database and write it to the CSV
$classnumber = $_REQUEST['classnumber'];
$secgroupname = $_REQUEST['secgroupname'];
require "interdb.php";
$sel_query = "Select * from student where classnumber=$classnumber AND secgroup='$secgroupname';";
$result = mysqli_query($link, $sel_query);

while ($row = mysqli_fetch_assoc($result)) {
    $rowData = array(
        $row["classnumber"],
        $row["secgroup"],
        $row["roll"],
        $row["name"],
        $row["fname"],
        $row["mname"],
        $row["dob"],
        $row["birthid"],
        $row["sex"],
        $row["address"],
        $row["mobile"]
    );

    // Write the data row to the CSV
    fputcsv($output, $rowData);
}

// Close the output buffer
fclose($output);

// Exit to prevent additional content from being sent
exit;
?>
