<?php
require "../interdb.php";
// Assuming you have already established a database connection

$classNumber = 6;
$section = 'A';
$totalChapters = 4;
$subcode = 2;
$subname = 'গণিত';

// Loop to insert chapters
for ($i = 1; $i <= $totalChapters; $i++) {
    $chapterNumber = $i;
    $chapterName = "Chapter $i"; // Replace with your chapter name
    $uni = $classNumber . $section . $subcode . $chapterNumber;
$sql ="INSERT INTO `chapter`(`classnumber`, `secgroupname`, `subcode`, `subname`, `chapterno`, `chaptername`, `chapteruniid`) VALUES ('$classNumber','$section','$subcode','$subname','$chapterNumber','$chapterName','$uni')"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Chapter Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }
    
}

echo "All chapters inserted successfully.";
?>
