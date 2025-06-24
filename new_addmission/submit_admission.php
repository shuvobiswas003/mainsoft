<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.0/cropper.min.css" />

    <style>
        body {
            background: linear-gradient(to right, #f0f4f7, #d9e8f5);
            font-family: Arial, sans-serif;
            padding-top: 40px;
        }
        .card {
            margin: 0 auto;
            max-width: 900px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: none;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 26px;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .form-control, .form-control-file, {
            border: 1px solid #ced4da;
        }
        .btn-primary {
            border-radius: 10px;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .d-none {
            display: none !important;
        }
        .is-invalid {
    border-color: red; /* Change the border color to red for invalid fields */
}

    </style>

 
</head>
<body>
<!-- School Info Start -->
<?php
    require "../interdb.php";
    $sel_query2 = "SELECT * FROM schoolinfo";
    $result2 = mysqli_query($link, $sel_query2);
    $schoolName = '';
    while ($row2 = mysqli_fetch_assoc($result2)) {
    $schoolName = $row2['schoolname'];
?>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <img src="../img/lego.png?<?php echo time()?>" alt="School Logo" style="height: 120px; width: 120px;">
            <h1 class="mt-3"><?php echo $row2['schoolname'] ?></h1>
        </div>
    </div>
<?php } ?>
<!-- School Info END -->

<div class="container">
    <div class="card">
        <div class="card-header">
            Student Admission Form
        </div>
        <div class="card-body">

<?php

error_reporting(E_ALL & ~E_WARNING);
require '../interdb.php';

function uploadFile($file, $targetDir) {
    // Create the target directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Set the target file path
    $fileName = basename($file["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = array("jpg", "jpeg", "png", "gif", "pdf");

    // Check if file is a valid image or PDF type
    if (!in_array($fileType, $allowedTypes)) {
        
        return null;
    }

    // Move the file if it passes checks
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile; // Return the path of the uploaded file
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    return null; // Return null if upload fails
}

function renameFile($filePath, $id, $targetDir) {
    // Ensure the file has an extension and a complete path
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
    $newFileName = $targetDir . $id . "_" . basename($filePath);

    if (file_exists($filePath) && $fileExtension) {
        if (rename($filePath, $newFileName)) {
            echo "File renamed successfully to " . $newFileName;
            return $newFileName;
        } else {
            echo "Sorry, there was an error renaming your file.";
        }
    } else {
        echo "File does not exist or is missing an extension.";
    }
    return null;
}
// Form data

$admissionType = $_POST['add_type'];

$currentRoll = isset($_POST['current_roll']) && $admissionType == "Old" ? $_POST['current_roll'] : null;

$current_class = $link->real_escape_string($_POST['current_class']);
$desired_class = $link->real_escape_string($_POST['desired_class']);
$running_school_name = $link->real_escape_string($_POST['running_school_name']);
$student_name_eng = $link->real_escape_string($_POST['student_name_eng']);
$student_name_bn = $link->real_escape_string($_POST['student_name_bn']);
$father_name_eng = $link->real_escape_string($_POST['father_name_eng']);
$father_name_bn = $link->real_escape_string($_POST['father_name_bn']);
$mother_name_eng = $link->real_escape_string($_POST['mother_name_eng']);
$mother_name_bn = $link->real_escape_string($_POST['mother_name_bn']);
$father_nid = $link->real_escape_string($_POST['father_nid']);
$mother_nid = $link->real_escape_string($_POST['mother_nid']);
$father_phone = $link->real_escape_string($_POST['father_phone']);
$mother_phone = $link->real_escape_string($_POST['mother_phone']);
$father_occupation = $link->real_escape_string($_POST['father_occupation']);
$mother_occupation = $link->real_escape_string($_POST['mother_occupation']);
$dob = $link->real_escape_string($_POST['dob']);
$birth_id = $link->real_escape_string($_POST['birth_id']);
$blood_group = $link->real_escape_string($_POST['blood_group']);
$sex = $link->real_escape_string($_POST['sex']);
$religion = $link->real_escape_string($_POST['religion']);
$nationality = $link->real_escape_string($_POST['nationality']);
$present_address_eng = $link->real_escape_string($_POST['present_address_eng']);
$present_address_bn = $link->real_escape_string($_POST['present_address_bn']);
$permanent_address_eng = $link->real_escape_string($_POST['permanent_address_eng']);
$permanent_address_bn = $link->real_escape_string($_POST['permanent_address_bn']);

// File uploads
$uploadsDir = '../img/admission/';
$student_picture = isset($_FILES['student_picture']) ? uploadFile($_FILES['student_picture'], $uploadsDir) : null;
$birth_id_attachment = isset($_FILES['birth_id_attachment']) ? uploadFile($_FILES['birth_id_attachment'], $uploadsDir) : null;
$father_picture = isset($_FILES['father_picture']) ? uploadFile($_FILES['father_picture'], $uploadsDir) : null;
$father_nid_attachment = isset($_FILES['father_nid_attachment']) ? uploadFile($_FILES['father_nid_attachment'], $uploadsDir) : null;
$mother_picture = isset($_FILES['mother_picture']) ? uploadFile($_FILES['mother_picture'], $uploadsDir) : null;
$mother_nid_attachment = isset($_FILES['mother_nid_attachment']) ? uploadFile($_FILES['mother_nid_attachment'], $uploadsDir) : null;


// Step 1: Check if the birth_id exists in the student table
$sqlCheckBirthId = "SELECT roll FROM student WHERE birthid = '$birth_id'";
$resultCheck = $link->query($sqlCheckBirthId);

if ($resultCheck && $resultCheck->num_rows > 0) {
    // If birth_id exists, get the roll number
    $row = $resultCheck->fetch_assoc();
    $next_roll = $row['roll']; // Use the existing roll number
} else {
    // If birth_id does not exist, find the maximum roll from the student table for the desired class
    $sqlMaxRoll = "SELECT MAX(roll) as max_roll FROM student WHERE classname = '$desired_class' AND secgroup='Admission'";
    $resultMaxRoll = $link->query($sqlMaxRoll);

    if ($resultMaxRoll && $resultMaxRoll->num_rows > 0) {
        $row = $resultMaxRoll->fetch_assoc();
        $next_roll = $row['max_roll'] + 1; // Calculate the next roll number
    } else {
        $next_roll = 1; // Default to 1 if no rolls exist
    }
}

// Prepare SQL query for admissions table
$sql = "INSERT INTO admissions 
    (current_class, desired_class, running_school_name, student_name_eng, student_name_bn, 
    father_name_eng, father_name_bn, mother_name_eng, mother_name_bn, father_nid, mother_nid, 
    father_phone, mother_phone, father_occupation, mother_occupation, dob, birth_id, blood_group, 
    sex, religion, nationality, present_address_eng, present_address_bn, permanent_address_eng, 
    permanent_address_bn, student_picture, birth_id_attachment, father_picture, father_nid_attachment, 
    mother_picture, mother_nid_attachment,running_student,running_roll,status) 
VALUES 
    ('$current_class', '$desired_class', '$running_school_name', '$student_name_eng', '$student_name_bn', 
    '$father_name_eng', '$father_name_bn', '$mother_name_eng', '$mother_name_bn', '$father_nid', '$mother_nid', 
    '$father_phone', '$mother_phone', '$father_occupation', '$mother_occupation', '$dob', '$birth_id', '$blood_group', 
    '$sex', '$religion', '$nationality', '$present_address_eng', '$present_address_bn', '$permanent_address_eng', 
    '$permanent_address_bn', '$student_picture', '$birth_id_attachment', '$father_picture', '$father_nid_attachment', 
    '$mother_picture', '$mother_nid_attachment','$admissionType','$currentRoll','Pending') 
ON DUPLICATE KEY UPDATE 
    current_class = VALUES(current_class), desired_class = VALUES(desired_class), 
    running_school_name = VALUES(running_school_name), student_name_eng = VALUES(student_name_eng), 
    student_name_bn = VALUES(student_name_bn), father_name_eng = VALUES(father_name_eng), 
    father_name_bn = VALUES(father_name_bn), mother_name_eng = VALUES(mother_name_eng), 
    mother_name_bn = VALUES(mother_name_bn), father_nid = VALUES(father_nid), 
    mother_nid = VALUES(mother_nid), father_phone = VALUES(father_phone), 
    mother_phone = VALUES(mother_phone), father_occupation = VALUES(father_occupation), 
    mother_occupation = VALUES(mother_occupation), dob = VALUES(dob), birth_id = VALUES(birth_id), 
    blood_group = VALUES(blood_group), sex = VALUES(sex), religion = VALUES(religion), 
    nationality = VALUES(nationality), present_address_eng = VALUES(present_address_eng), 
    present_address_bn = VALUES(present_address_bn), permanent_address_eng = VALUES(permanent_address_eng), 
    permanent_address_bn = VALUES(permanent_address_bn), student_picture = VALUES(student_picture), 
    birth_id_attachment = VALUES(birth_id_attachment), father_picture = VALUES(father_picture), 
    father_nid_attachment = VALUES(father_nid_attachment), mother_picture = VALUES(mother_picture), 
    mother_nid_attachment = VALUES(mother_nid_attachment),running_student = VALUES(running_student),running_roll = VALUES(running_roll),status = VALUES(status)";

$uniqid = $desired_class . "Admission" . $next_roll; // Generate a unique ID

if ($link->query($sql) === TRUE) {
    // If a new row was inserted, get the last inserted ID
    if ($link->affected_rows > 0 && $link->insert_id != 0) {
        $last_id = $link->insert_id;
    } else {
        // If the row was updated, retrieve the existing ID based on a unique identifier
        $query = "SELECT id FROM admissions WHERE birth_id = '$birth_id'";
        $result = $link->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_id = $row['id'];
        } else {
            die("Error: Could not retrieve the ID.");
        }
    }
    
    echo $last_id;

    // Rename uploaded files with ID as prefix
$file_types = [
    'student_picture' => 'student_picture',
    'birth_id_attachment' => 'birth_id_attachment',
    'father_picture' => 'father_picture',
    'father_nid_attachment' => 'father_nid_attachment',
    'mother_picture' => 'mother_picture',
    'mother_nid_attachment' => 'mother_nid_attachment'
];
$updated_file_paths = [];

foreach ($file_types as $key => $file_column) {
    $file_path = $uploadsDir . basename($_FILES[$key]["name"]);
    $new_file_name = $uploadsDir . $last_id . '_' . basename($_FILES[$key]["name"]);
    
    if (file_exists($file_path)) {
        rename($file_path, $new_file_name);
        $updated_file_paths[$file_column] = $new_file_name; // Save the new file name for later update
    }
}

$update_sql = "UPDATE admissions SET 
    student_picture = '{$updated_file_paths['student_picture']}',
    birth_id_attachment = '{$updated_file_paths['birth_id_attachment']}',
    father_picture = '{$updated_file_paths['father_picture']}',
    father_nid_attachment = '{$updated_file_paths['father_nid_attachment']}',
    mother_picture = '{$updated_file_paths['mother_picture']}',
    mother_nid_attachment = '{$updated_file_paths['mother_nid_attachment']}'
    WHERE id = $last_id";

if ($link->query($update_sql) === TRUE) {
    echo "Admission record updated with renamed file paths.";
} else {
    echo "Error updating admissions table: " . $link->error;
}


// Step 2: Insert into the student table with the new roll number
$student_picture_path = isset($updated_file_paths['student_picture']) ? $updated_file_paths['student_picture'] : NULL;

// Map class numbers to class names
$class_map = [
    '-1' => 'Class Nursery',
    '0'  => 'Class KG',
    '1'  => 'Class One',
    '2'  => 'Class Two',
    '3'  => 'Class Three',
    '4'  => 'Class Four',
    '5'  => 'Class Five',
    '6'  => 'Class Six',
    '7'  => 'Class Seven',
    '8'  => 'Class Eight',
    '9'  => 'Class Nine',
    '10' => 'Class Ten',
    '11' => 'Class Eleven',
    '12' => 'Class Twelve',
];

// Set classname based on the desired classnumber
$classname = isset($class_map[$desired_class]) ? $class_map[$desired_class] : 'Unknown';

// SQL query to insert or update the student data
$student_sql = "INSERT INTO student (
    classnumber, classname, secgroup, roll, name, fname, mname, 
    nameb, fnameb, mnameb, sex, dob, birthid, fnid, mnid, 
    address, mobile, uniqid, imgname, brisqr, addmission_id
) VALUES (
    '$desired_class', '$classname', 'Admission', '$next_roll', 
    '$student_name_eng', '$father_name_eng', '$mother_name_eng', 
    '$student_name_bn', '$father_name_bn', '$mother_name_bn', 
    '$sex', '$dob', '$birth_id', '$father_nid', '$mother_nid', 
    '$present_address_eng', '$father_phone', '$uniqid', '$student_picture_path', NULL, '$last_id'
) ON DUPLICATE KEY UPDATE 
    classnumber = VALUES(classnumber), classname = VALUES(classname), 
    secgroup = VALUES(secgroup), roll = VALUES(roll), 
    name = VALUES(name), fname = VALUES(fname), mname = VALUES(mname), 
    nameb = VALUES(nameb), fnameb = VALUES(fnameb), 
    mnameb = VALUES(mnameb), sex = VALUES(sex), dob = VALUES(dob), 
    birthid = VALUES(birthid), fnid = VALUES(fnid), 
    mnid = VALUES(mnid), address = VALUES(address), 
    mobile = VALUES(mobile), uniqid = VALUES(uniqid), 
    imgname = VALUES(imgname), brisqr = VALUES(brisqr), 
    addmission_id = VALUES(addmission_id)";

if ($link->query($student_sql) === TRUE) {
    echo "Student added successfully with roll number: $next_roll";
} else {
    echo "Error adding student: " . $link->error;
}
if($admissionType == 'New'){
    
    $date = date("Y-m-d");    // Setting the current date if $date is not defined
    $paycat_ids = [1,2,3,4,5]; // Array of paycat IDs for which invoices are needed

    // Retrieve the descriptions and amounts from paycat table
    $paycat_query = "SELECT id, pcatname, amount FROM paycat WHERE id IN (" . implode(",", $paycat_ids) . ")";
    $paycat_result = mysqli_query($link, $paycat_query);

    if ($paycat_result) {
        while ($row = mysqli_fetch_assoc($paycat_result)) {
            $puniid = $pcatid . $uniqid; 
            $pcatid = $row['id'];
            $description = $row['pcatname'];
            $amount = $row['amount'];

            $payment_sql = "INSERT INTO `studentpayment` (`pcatid`, `classnumber`, `secgroupname`, `stuid`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `puniid`, `date`, `roll`) 
            VALUES ('$pcatid', '$desired_class', 'Admission', '$uniqid', '$student_name_eng', '$description', '$amount', '0', '$amount', 'Unpaid', '$puniid', '$date', '$next_roll') 
            ON DUPLICATE KEY UPDATE 
                `secgroupname` = 'Admission', 
                `stuid` = '$uniqid', 
                `total` = '$amount', 
                `des` = '$description', 
                `due` = '$amount', 
                `totalpay` = '0', 
                `status` = 'Unpaid', 
                `date` = '$date', 
                `roll` = '$next_roll'";

            if (mysqli_query($link, $payment_sql)) {
                echo "<span style='color:green'>Invoice Generated Successfully for paycat ID $pcatid: $puniid</span><br>";
            } else {
                echo "Error in generating invoice for paycat ID $pcatid: " . $link->error . "<br>";
            }
        }
    } else {
        echo "Error fetching paycat data: " . $link->error;
    }
}else{
    $date = date("Y-m-d");    // Setting the current date if $date is not defined
    $paycat_ids = [2,3,4,5]; // Array of paycat IDs for which invoices are needed

    // Retrieve the descriptions and amounts from paycat table
    $paycat_query = "SELECT id, pcatname, amount FROM paycat WHERE id IN (" . implode(",", $paycat_ids) . ")";
    $paycat_result = mysqli_query($link, $paycat_query);

    if ($paycat_result) {
        while ($row = mysqli_fetch_assoc($paycat_result)) {
            $puniid = $pcatid . $uniqid; 
            $pcatid = $row['id'];
            $description = $row['pcatname'];
            $amount = $row['amount'];

            $payment_sql = "INSERT INTO `studentpayment` (`pcatid`, `classnumber`, `secgroupname`, `stuid`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `puniid`, `date`, `roll`) 
            VALUES ('$pcatid', '$desired_class', 'Admission', '$uniqid', '$student_name_eng', '$description', '$amount', '0', '$amount', 'Unpaid', '$puniid', '$date', '$next_roll') 
            ON DUPLICATE KEY UPDATE 
                `secgroupname` = 'Admission', 
                `stuid` = '$uniqid', 
                `total` = '$amount', 
                `des` = '$description', 
                `due` = '$amount', 
                `totalpay` = '0', 
                `status` = 'Unpaid', 
                `date` = '$date', 
                `roll` = '$next_roll'";

            if (mysqli_query($link, $payment_sql)) {
                echo "<span style='color:green'>Invoice Generated Successfully for paycat ID $pcatid: $puniid</span><br>";
            } else {
                echo "Error in generating invoice for paycat ID $pcatid: " . $link->error . "<br>";
            }
        }
        } else {
            echo "Error fetching paycat data: " . $link->error;
        }
}//ending Old Student





} else {
    echo "Error adding File record: " . $link->error;
}

// Close the linkection
$link->close();
?>



            <a href="print_admission_form.php?id=<?php echo $last_id;?>" target="_blank"><h1><button class="btn btn-primary">Print Addmission Form</button></h1></a>

            <a href="../payment_process_qr.php?stuid=<?php echo $uniqid;?>" target="_blank"><h1><button class="btn btn-primary">Pay Fees</button></h1></a>
        </div>
    </div>
</div>



</body>
</html>
