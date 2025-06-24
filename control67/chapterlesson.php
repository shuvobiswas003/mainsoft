<?php
require "../interdb.php";
// Check the connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Prepare the INSERT statement for the 'chapter' table
$stmtChapter = $link->prepare("INSERT INTO chapter (classnumber, secgroupname, subcode, subname, chapterno, chaptername, chapteruniid) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Prepare the INSERT statement for the 'lesson' table
$stmtLesson = $link->prepare("INSERT INTO lesson (classnumber, secgroupname, subcode, subname, chapterno, chaptername, lno, lname, lpis, lpic, lpit, uni) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Define the subject information
$classnumber = 7;
$secgroupname = "B";
$subcode = 5;
$subname = "ইতিহাস ও সামাজিক বিজ্ঞান";

// Array of chapter names and lesson counts
$chapterNames = ["Chapter 1", "Chapter 2", "Chapter 3","Chapter 4", "Chapter 5", "Chapter 6","Chapter 7"];
$lessonCounts = [2,2,1,1,1,1,2];

// Insert chapters and lessons
for ($i = 0; $i < count($chapterNames); $i++) {
    $chapterno = $i + 1;
    $chaptername = $chapterNames[$i];
    echo $chaptername;
    $chapteruniid = $classnumber.$secgroupname.$subcode.$chapterno;

    // Insert into 'chapter' table
    $stmtChapter->bind_param("isissss", $classnumber, $secgroupname, $subcode, $subname, $chapterno, $chaptername, $chapteruniid);
    $stmtChapter->execute();

    // Retrieve the inserted chapter ID
    $chapterId = $stmtChapter->insert_id;

    // Insert lessons for the chapter
    for ($j = 1; $j <= $lessonCounts[$i]; $j++) {
        $lno = $j;
        $lname = "Lesson " . $j;
        $lpis = "Good";
        $lpic = "Better";
        $lpit = "Best";
        $uni = $classnumber.$secgroupname.$subcode.$chapterno.$lno;

        // Insert into 'lesson' table
        $stmtLesson->bind_param("ssssssssssss", $classnumber, $secgroupname, $subcode, $subname, $chapterno, $chaptername, $lno, $lname, $lpis, $lpic, $lpit, $uni);
        $stmtLesson->execute();
    }
}

// Close the prepared statements
$stmtChapter->close();
$stmtLesson->close();

// Close the database connection
$link->close();

?>