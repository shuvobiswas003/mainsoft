<?php
require "interdb.php";
$examid=$_REQUEST['examid'];
// Assuming you have already established a database connection

// Fetch subjects from the subject table for classnumber = 8, 9, or 10
$class_numbers = array(6,7,8, 9, 10);
$query_subjects = "SELECT * FROM subject WHERE classnumber IN (" . implode(",", $class_numbers) . ") ORDER BY classnumber DESC, secgroup ASC, subcode ASC";
$result_subjects = mysqli_query($link, $query_subjects);

// Array to store the enrolled subjects
$enrolledSubjects = [];

// Fetch enrolled subjects from the exammark table and store them in the array
$query_enrolled_subjects = "SELECT DISTINCT classnumber, secgroupname, subname, subcode FROM exammark WHERE classnumber IN (" . implode(",", $class_numbers) . ") AND examid='$examid'";
$result_enrolled_subjects = mysqli_query($link, $query_enrolled_subjects);
while ($row_enrolled_subjects = mysqli_fetch_assoc($result_enrolled_subjects)) {
    $enrolledSubjects[] = $row_enrolled_subjects;
}

// Close the database connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Subjects</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Enrolled Subjects for Class 6,7,8, 9, and 10</h1>
    <table>
        <thead>
            <tr>
                <th>Class Number</th>
                <th>Section/Group</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Enrolled</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row_subjects = mysqli_fetch_assoc($result_subjects)): ?>
                <?php
                $classnumber = $row_subjects['classnumber'];
                $secgroupname = $row_subjects['secgroup'];
                $subname = $row_subjects['subname'];
                $subcode = $row_subjects['subcode'];
                $enrolled = in_array(['classnumber' => $classnumber, 'secgroupname' => $secgroupname, 'subname' => $subname, 'subcode' => $subcode], $enrolledSubjects);
                ?>
                <tr>
                    <td><?php echo $classnumber; ?></td>
                    <td><?php echo $secgroupname; ?></td>
                    <td><?php echo $subname; ?></td>
                    <td><?php echo $subcode; ?></td>
                    <td><?php echo $enrolled ? 'Enrolled' : 'Not Enrolled'; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
