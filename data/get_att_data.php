<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the 'data' field exists in the POST request
    if (isset($_POST["data"])) {
        // Get the JSON-encoded data from the POST request
        $jsonData = $_POST["data"];

        // Decode the JSON data into a PHP array
        $dataArray = json_decode($jsonData, true);

foreach ($dataArray as $entry) {
    echo "ID: " . $entry["id"] . "<br>";
    echo "Machine ID: " . $entry["machineid"] . "<br>";
    echo "Student ID: " . $entry["stuid"] . "<br>";
    echo "Attendance Date: " . $entry["adate"] . "<br>";
    echo "Time: " . $entry["ctime"] . "<br>";
    echo "Cinout: " . $entry["cinout"] . "<br>";
    echo "Cinout ID: " . $entry["cinoutid"] . "<br>";
    echo "Unique Attendance ID: " . $entry["uniqattid"] . "<br>";
    echo "Status: " . $entry["status"] . "<br>";
    echo "<br>"; // Add a line break for separation

    $id = $entry["id"];
    $machineid = $entry["machineid"];
    $stuid = $entry["stuid"];
    $adate = $entry["adate"];
    $ctime = $entry["ctime"];
    $cinout = $entry["cinout"];
    $cinoutid = $entry["cinoutid"];
    $uniqattid = $entry["uniqattid"];
    $status = $entry["status"];

    require "../interdb.php";
    // SQL query to insert data
   $sql = "INSERT IGNORE INTO stuattdancedata (id, machineid, stuid, adate, ctime, cinout, cinoutid, uniqattid, status) 
        VALUES ('$id', '$machineid', '$stuid', '$adate', '$ctime', '$cinout', '$cinoutid', '$uniqattid', '$status')";

    if ($link->query($sql) === TRUE) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Error inserting data: " . $link->error . "<br>";
    }

} //ending for each
    } else {
        echo "No 'data' field found in the POST request.";
    }
} else {
    echo "This page should only be accessed via a POST request.";
}
?>
