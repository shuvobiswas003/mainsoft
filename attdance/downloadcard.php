<?php
    require "interdb.php";
	$softlink;
    $sel_query2="Select * from schoolinfo";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    $softlink=$row2['softlink'];
    }

// URL of live host PHP file
$url = $softlink.'/data/mycard.php';

// Initialize cURL
$curl = curl_init();

// Set the cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($curl);

// Close the cURL session
curl_close($curl);

// Decode the response into an array
$data = json_decode($response, true);

$counter=count($data);

echo $counter;
for ($i=0; $i <$counter; $i++) {
$id = $data[$i]['id'];
$stuid = $data[$i]['stuid'];
$rfid = $data[$i]['rfid'];

$query = "INSERT into rfid(stuid,rfid) VALUES ('$stuid','$rfid') ON DUPLICATE KEY UPDATE stuid='$stuid',rfid='$rfid'";


require "interdb.php";
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query
if ($link->query($query) === TRUE) {
    echo "Data inserted successfully";
    echo "STUID: ".$name = $data[$i]['stuid'];
    echo "<br>";
} else {
    echo "Error inserting data: " . $conn->error;
}

}
?>