
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $dob = $_POST['dob'];
    $village = $_POST['village'];
    $post = $_POST['post'];
    $ps = $_POST['ps'];
    $ds = $_POST['ds'];
    $passingYear = $_POST['passingYear'];
    $group = $_POST['group'];
    $gpa = $_POST['gpa'];
    $grade = $_POST['grade'];
    $result = $_POST['result'];
    $roll = $_POST['roll'];
    $registration = $_POST['registration'];
    $todayDate = date("Y-m-d");

    require "../interdb.php";

    // Define the SQL query using INSERT ... ON DUPLICATE KEY UPDATE
    $sql = "INSERT INTO testimonials (studentName, fatherName, motherName, dob, village, post, ps, ds, passingYear, studentGroup, gpa, grade, result, roll, registration, issuedate)
            VALUES ('$studentName', '$fatherName', '$motherName', '$dob', '$village', '$post', '$ps', '$ds', '$passingYear', '$group', '$gpa', '$grade', '$result', '$roll', '$registration', '$todayDate')
            ON DUPLICATE KEY UPDATE
            studentName = VALUES(studentName),
            fatherName = VALUES(fatherName),
            motherName = VALUES(motherName),
            dob = VALUES(dob),
            village = VALUES(village),
            post = VALUES(post),
            ps = VALUES(ps),
            ds = VALUES(ds),
            passingYear = VALUES(passingYear),
            studentGroup = VALUES(studentGroup),
            gpa = VALUES(gpa),
            grade = VALUES(grade),
            result = VALUES(result),
            registration = VALUES(registration),
            issuedate = VALUES(issuedate)";

    if (mysqli_query($link, $sql)) {
        echo "<h3 style='color:green;'>Testimonial Added</h3>";
    } else {
        echo "<h3 style='color:red;'>Failed to Add Testimonial</h3>";
    }
    mysqli_close($link);
    echo "<h1 style='color:green'>";
    echo "<a href='printtesti.php?roll=".$roll."&passingYear=".$passingYear."'>Print Testimonial</a>";
    echo "</h1>";
}
?>
