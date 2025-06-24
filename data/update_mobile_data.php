<?php
require "../interdb.php";
//array date
$roll=$_POST['roll'];
$suniqid=$_POST['suniqid'];
$name=$_POST['name'];
$mobile=$_POST['mobile'];

// Loop through the data and insert or update into the table
for ($i = 0; $i < count($roll); $i++) {
    $rolln = mysqli_real_escape_string($link, $roll[$i]);
    $suniqidn = mysqli_real_escape_string($link, $suniqid[$i]);
    $namen = mysqli_real_escape_string($link, $name[$i]);
    $mobilen = mysqli_real_escape_string($link, $mobile[$i]);
   
    
    
  
    
    $update_quart="UPDATE student SET mobile='$mobilen' WHERE uniqid='$suniqidn'";
    
    // Execute the query
    $result2 = mysqli_query($link, $update_quart);
    
    // Check if the query was successful
    if ($result2) {
        echo "Student Table updated successfully!<br>";
    } else {
        echo "Error inserting or updating data: " . mysqli_error($link) . "<br>";
    }
    
    
}
