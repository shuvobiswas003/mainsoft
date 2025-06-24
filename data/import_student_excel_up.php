<?php
require '../vendor/autoload.php'; // Include PhpSpreadsheet library autoload file

use PhpOffice\PhpSpreadsheet\IOFactory;

// Check if the form is submitted and the file is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["excel_file"])) {
    require "../interdb.php";

    // Get the uploaded file details
    $file = $_FILES["excel_file"];
    $fileTmpName = $file["tmp_name"];

    // Load Excel file
    $spreadsheet = IOFactory::load($fileTmpName);

    // Get worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Start from row 2 to ignore the header row
    $startRow = 2;

    // Get highest row and column counts
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();

    // Loop through each row of the worksheet
    for ($row = $startRow; $row <= $highestRow; $row++) {
        // Read data from the current row
        $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        // Assign data to variables
        $id = $rowData[0][0];
        $classnumber = $rowData[0][1];
        $classname = $rowData[0][2];
        $secgroup = $rowData[0][3];
        $roll = $rowData[0][4];
        $name = $rowData[0][5];
        $fname = $rowData[0][6];
        $mname = $rowData[0][7];
        $nameb = $rowData[0][8];
        $fnameb = $rowData[0][9];
        $mnameb = $rowData[0][10];
        $sex = $rowData[0][11];
        $dob = $rowData[0][12];
        $birthid = $rowData[0][13];
        $fnid = $rowData[0][14];
        $mnid = $rowData[0][15];
        $address = $rowData[0][16];
        $mobile = $rowData[0][17];
        $uniqid = $rowData[0][18];
        $imgname = $rowData[0][19];

        // SQL query to insert or update data into the database table
        $sql = "INSERT INTO student (id, classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, sex, dob, birthid, fnid, mnid, address, mobile, uniqid, imgname) 
                VALUES ('$id', '$classnumber', '$classname', '$secgroup', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$sex', '$dob', '$birthid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$imgname') 
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
                imgname = VALUES(imgname)";

        // Execute SQL query
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Data Inserted Successfully</h3>";
        } else{
            echo "<h3 style='color:red;'>Error: " . mysqli_error($link) . "</h3>";
        }
    }
}


?>