<?php
require '../interdb.php';

$room = mysqli_real_escape_string($link, $_GET['room']);

$sql = "SELECT * FROM buildingroombench WHERE roomnumber = '$room' ORDER BY rownumber ASC, id ASC";
$res = mysqli_query($link, $sql);

$benches = [];

while ($row = mysqli_fetch_assoc($res)) {
    $benches[] = [
        'bnumber' => $row['bnumber'],
        'roomnumber' => $row['roomnumber'],
        'rownumber' => $row['rownumber'],
        'numberofbench' => $row['numberofbench'],
        'uninum' => $row['uninum']
    ];
}

header('Content-Type: application/json');
echo json_encode($benches);
