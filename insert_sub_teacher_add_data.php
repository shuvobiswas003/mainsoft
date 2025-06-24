<?php
require_once "interdb.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $classNumbers = $_POST['classnumber'];
    $secGroups = $_POST['secgroupname'];
    $subCodes = $_POST['subcode'];
    $teacherIDs = $_POST['teacher'];

    // Loop through each row in the form
    for ($i = 0; $i < count($classNumbers); $i++) {
        $classNumber = mysqli_real_escape_string($link, $classNumbers[$i]);
        $secGroup = mysqli_real_escape_string($link, $secGroups[$i]);
        $subCode = mysqli_real_escape_string($link, $subCodes[$i]);
        $teacherID = mysqli_real_escape_string($link, $teacherIDs[$i]);

        // Check if the combination of classnumber, secgroup, and subcode already exists in the subjectteacher table
        $sql = "SELECT * FROM subjectteacher WHERE classnumber = '$classNumber' AND secgroup = '$secGroup' AND subcode = '$subCode'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            // If the record exists, perform an update
            $updateSql = "UPDATE subjectteacher SET tid = '$teacherID' WHERE classnumber = '$classNumber' AND secgroup = '$secGroup' AND subcode = '$subCode'";
            mysqli_query($link, $updateSql);
        } else {
            // If the record doesn't exist, perform an insert
            $insertSql = "INSERT INTO subjectteacher (classnumber, secgroup, subcode, tid) VALUES ('$classNumber', '$secGroup', '$subCode', '$teacherID')";
            mysqli_query($link, $insertSql);
        }
    }

    // Redirect to a page or show a success message
    echo "Subject Teacher ADD or updated";
     echo"<h3><a href='subject_teacher_view.php?classnumber=".$classNumber."&secgroupname=".$secGroup."'>View Data</a></h3>";
    exit;
}
?>
