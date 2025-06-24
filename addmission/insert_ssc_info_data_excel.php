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
        $classnumber = $rowData[0][0];
        $secgroupname = $rowData[0][1];
        $roll = $rowData[0][2];
        $uniqid = $classnumber.$secgroupname.$roll;

        $l_phone = $rowData[0][3];
        $blood = $rowData[0][4];
        $ssc_roll = $rowData[0][5];
        $ssc_reg = $rowData[0][6];
       

        $sql2="INSERT INTO addmission_ssc_student (classnumber, section, roll, stuid, ssc_roll, ssc_reg,name,passingYear,board,gpa,passing_school,f_opq,f_income,l_name,l_opc,l_income,l_phone,marital,religion,blood)
VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$ssc_roll', '$ssc_reg','','','','','','','','','','','$l_phone','','','$blood')
ON DUPLICATE KEY UPDATE
    classnumber = VALUES(classnumber),
    section = VALUES(section),
    roll = VALUES(roll),
    stuid = VALUES(stuid),
    ssc_roll = VALUES(ssc_roll),
    ssc_reg = VALUES(ssc_reg);";
 if(mysqli_query($link, $sql2)){
        echo "<h1 style='color:green;'>SSC Information Inserted</h1>.";
   }
        
    }
}


?>