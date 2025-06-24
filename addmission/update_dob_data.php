<?php
require "../interdb.php";
//array date
$suniqid=$_POST['suniqid'];
$gender=$_POST['dob'];

// Loop through the data and insert or update into the table
for ($i = 0; $i < count($suniqid); $i++) {
   
    $suniqidn = mysqli_real_escape_string($link, $suniqid[$i]);

    $gendern = $gender[$i];
   
    
    
  
    
    $update_quart="UPDATE student SET dob='$gendern' WHERE uniqid='$suniqidn'";
    echo $update_quart;
    // Execute the query
    $result2 = mysqli_query($link, $update_quart);
    
    // Check if the query was successful
    if ($result2) {
        echo "Student Table updated successfully!<br>";
    } else {
        echo "Error inserting or updating data: " . mysqli_error($link) . "<br>";
    }
    
    
}