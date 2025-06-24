<?php
// Include the database connection
require "interdb.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $student_id = $_POST['id'];
    $new_roll = $_POST['new_roll'];
    $classnumber = $_POST['classnumber'];
   $new_classnumber = $classnumber + 1;
$classname = '';

// Check if the class number is between 1 and 12
if ($new_classnumber >= 1 && $new_classnumber <= 12) {
    // Define an array for class names from 1 to 12
    $class_names = [
        1 => 'Class One', 
        2 => 'Class Two', 
        3 => 'Class Three', 
        4 => 'Class Four', 
        5 => 'Class Five', 
        6 => 'Class Six', 
        7 => 'Class Seven', 
        8 => 'Class Eight', 
        9 => 'Class Nine', 
        10 => 'Class Ten', 
        11 => 'Class Eleven', 
        12 => 'Class Twelve'
    ];
    
    // Assign the class name for the new class number
    $classname = $class_names[$new_classnumber];
} else {
    // For any other class number, return "Class X"
    $classname = "Class $new_classnumber";
}

echo $classname; // Output the class name
echo "<img src='img/student/2025/{$new_classnumber}/{$new_roll}.jpg'>";



    // Retrieve the student data from the current table
    $select_query = "SELECT * FROM student_2024 WHERE id = $student_id";
    $result = mysqli_query($link, $select_query);
    $student = mysqli_fetch_assoc($result);

    if ($student) {
        $img_name='2025/'.$new_classnumber."/".$new_roll.".jpg";
        $new_uniid=$new_classnumber.$student['secgroup'].$new_roll;
        // Copy the data to the new table (student_2024 or any new class table)
        $insert_query = "INSERT INTO student 
                 (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, sex, dob, birthid, fnid, mnid, address, mobile, uniqid, imgname, brisqr, addmission_id)
                 VALUES 
                 ('$new_classnumber', '$classname', '{$student['secgroup']}', '$new_roll', 
                  '{$student['name']}', '{$student['fname']}', '{$student['mname']}', 
                  '{$student['nameb']}', '{$student['fnameb']}', '{$student['mnameb']}', 
                  '{$student['sex']}', '{$student['dob']}', '{$student['birthid']}', 
                  '{$student['fnid']}', '{$student['mnid']}', '{$student['address']}', 
                  '{$student['mobile']}', '$new_uniid', '$img_name', 
                  '{$student['brisqr']}', '{$student['addmission_id']}')
                 ON DUPLICATE KEY UPDATE
                 classnumber = VALUES(classnumber),
                 classname = VALUES(classname),
                 secgroup = VALUES(secgroup),
                 roll = VALUES(roll),
                 name = VALUES(name),
                 fname = VALUES(fname),
                 mname = VALUES(mname),
                 nameb = VALUES(nameb),
                 fnameb = VALUES(fnameb),
                 mnameb = VALUES(mnameb),
                 sex = VALUES(sex),
                 dob = VALUES(dob),
                 birthid = VALUES(birthid),
                 fnid = VALUES(fnid),
                 mnid = VALUES(mnid),
                 address = VALUES(address),
                 mobile = VALUES(mobile),
                 uniqid = VALUES(uniqid),
                 imgname = VALUES(imgname),
                 brisqr = VALUES(brisqr),
                 addmission_id = VALUES(addmission_id)";


        if (mysqli_query($link, $insert_query)) {
            // Optionally, delete or update the student record in the current class (student table)
            // For example, if you want to remove the student from the current class:
           
        } else {
            echo "Error promoting student: " . mysqli_error($link);
        }
    } else {
        echo "Student not found.";
    }
}
?>

<img src='img/2025/'.$new_classnumber.'/'.$new_roll.'.jpg'>
