<?php
$data = array(
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '1234567890'
);
// Encode data as JSON
$json_data = json_encode($data);

$url = "https://blackcodeit.net/school/rskhs/attdance/reciveattdata.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close curl handle
curl_close($ch);


?>