<?php
// URL of live host PHP file
$url = 'http://blackcodeit.net/school/rskhs/data/mycurl.php';

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
$classnumber = $data[$i]['classnumber'];
$classname = $data[$i]['classname'];
$secgroup = $data[$i]['secgroup'];
$roll = $data[$i]['roll'];
$name = $data[$i]['name'];
$fname = $data[$i]['fname'];
$mname = $data[$i]['mname'];
$nameb = $data[$i]['nameb'];
$fnameb = $data[$i]['fnameb'];
$mnameb = $data[$i]['mnameb'];
$sex = $data[$i]['sex'];
$dob = $data[$i]['dob'];
$birthid = $data[$i]['birthid'];
$fnid = $data[$i]['fnid'];
$mnid = $data[$i]['mnid'];
$address =$data[$i]['address'];
$mobile =$data[$i]['mobile'];
$uniqid =$data[$i]['uniqid'];
$imgname=$data[$i]['imgname'];

$query = "INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, sex, dob, birthid, fnid, mnid, address, mobile, uniqid, imgname) VALUES ('$classnumber', '$classname', '$secgroup', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$sex', '$dob', '$birthid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$imgname') ON DUPLICATE KEY UPDATE  classnumber='$classnumber', classname='$classname', secgroup='$secgroup', roll='$roll', name='$name', fname='$fname', mname='$mname', nameb='$nameb', fnameb='$fnameb', mnameb='$mnameb', sex='$sex', dob='$dob', birthid='$birthid', fnid='$fnid', mnid='$mnid', address='$address', mobile='$mobile', uniqid='$uniqid', imgname='$imgname'";


require "interdb.php";
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query
if ($link->query($query) === TRUE) {
    echo "Data inserted successfully";
    echo "Name: ".$name = $data[$i]['name'];
    echo "<br>";
} else {
    echo "Error inserting data: " . $conn->error;
}

}
?>