<?php
// Get the card number from the request
$card_no = $_REQUEST['card_no'];

// Initialize variables
$student_id = "";
$classnumber="";
$secgroupname="";
$roll="";
$data = [];
$data2 = [];

// Include the database connection file
require "../interdb.php";

$query = "SELECT * FROM rfid WHERE CAST(rfid AS UNSIGNED) = " . (int)$card_no;
$result = mysqli_query($link, $query);

if ($result) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);
    
    if ($row) {
        // Get the value of the 'stuid' column
        $student_id = $row['stuid'];
    }
} else {
    // Handle query error
    die("Error: " . mysqli_error($link));
}

//getting student_other Parameter
$sel_query = "SELECT * FROM student WHERE uniqid ='$student_id'";
$result = mysqli_query($link, $sel_query);
while($row = mysqli_fetch_assoc($result)) {
    $classnumber=$row['classnumber'];
    $secgroupname=$row['secgroup'];
    $roll=$row['roll'];
}



// Check if student ID is found
if (!empty($student_id)) {
    // Execute a MySQL query to retrieve student information
    $query = "SELECT * FROM student WHERE uniqid='$student_id'";
    $result = mysqli_query($link, $query);
    // Fetch the query results as an array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Execute a MySQL query to retrieve payment information
    $query2 = "SELECT * FROM studentpayment WHERE stuid='$student_id'";
    $result2 = mysqli_query($link, $query2);
    // Fetch the query results as an array
    $data2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);


    $query3 = "SELECT * FROM stuattdancedata WHERE stuid='$student_id'";
    $result3 = mysqli_query($link, $query3);
    // Fetch the query results as an array
    $data3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);



    // Execute a MySQL query to retrieve payment information
    $query4 = "SELECT sp.id,puniid, it.* FROM studentpayment sp JOIN invoicetrx it ON sp.puniid = it.iid WHERE sp.stuid='$student_id'";
    $result4 = mysqli_query($link, $query4);
    // Fetch the query results as an array
    $data4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);


    //getting book Info
    $query6 = "SELECT * FROM library_book_issue WHERE student_id='$student_id'";
    $result6 = mysqli_query($link, $query6);
    // Fetch the query results as an array
    $data6 = mysqli_fetch_all($result6, MYSQLI_ASSOC);


}

//Build the image URL
$imageUrl = '';
if (isset($row["imgname"]) && ($row["imgname"] == "IMG_0.png" || $row["imgname"] == "")) {
    if (isset($row['classnumber'])) {
        $imageUrl = "../img/student/{$row['classnumber']}/{$row['roll']}.jpg";
    } else {
        // Handle case where 'classnumber' is not set
        // Maybe provide a default image URL or handle it differently
        $imageUrl = "default_image.jpg";
    }
} elseif (isset($row["imgname"])) {
    $imageUrl = "../img/student/{$row['imgname']}";
} else {
    // Handle case where 'imgname' is not set
    // Maybe provide a default image URL or handle it differently
    $imageUrl = "default_image.jpg";
}

// Combine data into a single array including the image URL
$response = [
    'student_info' => $data,
    'payment_info' => $data2,
    'image_url' => $imageUrl,
    'attdance_data'=> $data3,
    'invoice_trx'=>$data4,
    'issued_book'=>$data6,
];

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close database connection
mysqli_close($link);
?>
