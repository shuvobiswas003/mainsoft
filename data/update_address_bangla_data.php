<?php
require "../interdb.php";
//array date
$roll=$_POST['roll'];
$suniqid=$_POST['suniqid'];
$name=$_POST['name'];
$vill=$_POST['vill'];
$post=$_POST['post'];
$ps=$_POST['ps'];
$ds=$_POST['ds'];

// Loop through the data and insert or update into the table
for ($i = 0; $i < count($roll); $i++) {
    $rolln = mysqli_real_escape_string($link, $roll[$i]);
    $suniqidn = mysqli_real_escape_string($link, $suniqid[$i]);
    $namen = mysqli_real_escape_string($link, $name[$i]);
    $villn = mysqli_real_escape_string($link, $vill[$i]);
    $postn = mysqli_real_escape_string($link, $post[$i]);
    $psn = mysqli_real_escape_string($link, $ps[$i]);
    $dsn = mysqli_real_escape_string($link, $ds[$i]);
    
    // SQL query with ON DUPLICATE KEY UPDATE
    $query = "INSERT INTO stuaddressbangla (stuid, name, roll, village, post, ps, ds) 
              VALUES ('$suniqidn', '$namen', '$rolln', '$villn', '$postn', '$psn', '$dsn') 
              ON DUPLICATE KEY UPDATE 
              stuid = VALUES(stuid), name = VALUES(name), roll = VALUES(roll), 
              village = VALUES(village), post = VALUES(post), ps = VALUES(ps), ds = VALUES(ds)";
    
    // Execute the query
    $result = mysqli_query($link, $query);
    
    // Check if the query was successful
    if ($result) {
        echo "Data inserted or updated successfully!<br>";
    } else {
        echo "Error inserting or updating data: " . mysqli_error($link) . "<br>";
    }
    
   
    
}
