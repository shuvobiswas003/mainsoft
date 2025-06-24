<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
$classnumber=$_REQUEST['classnumber'];
$examid=$_REQUEST['examid'];
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <br><center>
                    <img id="img"src="../img/lego.png" alt="School Lego" width="100px" height="100px" />
                </center>
                <center>
                <h1 style="font-size:40px;">
                <?php
                require "../interdb.php";
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <?php echo $row2['schoolname']?>

                <?php $count2++; } ?>
                </h1>
                

                <h1 style="font-size:30px;">
                    Meriit List of
                    <?php
                    $count2=1;
                    $sel_query2="Select * from exam where exid='$examid'";
                    $result2 = mysqli_query($link,$sel_query2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <?php echo $row2['examname']?> Year: <?php echo $row2['year']?> 

                    <?php $count2++; } ?>

                </h1>
                <h1>
                    Class: <?php echo $classnumber;?>
                </h1>
                </center>
            </div>
        </div>
    </div>    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Current Roll</th>
            <th>Previous Roll</th>
            <th>Student Name</th>
            <th>Section/Group</th>
            <th>Status</th>
            <th>Total Mark</th>
            <th>Total Obtain Mark</th>
            <th>Total Fail Sub</th>
            <th>G.P.A</th>
            <th>G.P.A (without 4th subject)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require "../interdb.php";
        $count2=1;
        $sel_query2="Select * from meritlist where examid='$examid' AND classnumber='$classnumber'ORDER BY curpos ASC";
        $result2 = mysqli_query($link,$sel_query2);
        while($row2 = mysqli_fetch_assoc($result2)) {
        ?>
        <tr>
            <th style="color:green;"><?php echo $row2['curpos']?></th>
            <th style="color:red;"><?php echo $row2['prevpos']?></th>
            
            <?php
                $stuid=$row2['uniqid'];
                $count3=1;
                $sel_query3="Select * from student where uniqid='$stuid'";
                $result3 = mysqli_query($link,$sel_query3);
                while($row3 = mysqli_fetch_assoc($result3)) {
                ?>
                <th>
                <?php echo $row3['name']?>
                </th>
                <th>
                <?php echo $row3['secgroup']?>
                </th>
                <?php $count2++; } ?>
            
            <th <?php
                $status=$row2['status'];
                if($status == "Fail"){
                    $color="Red";
                }else{
                    $color="Green";
                }
                ?> style="color: <?php echo $color;?>;">
                <?php echo $row2['status']?>
                    
            </th>
            <th><?php echo $row2['totalmark']?></th>
            <th><?php echo $row2['obtainmark']?></th>
            <th<?php
                $failsub=$row2['failsub'];
                if($failsub>0){
                    $color = 'red';
                }
                ?> style="color: <?php echo $color;?>">
                <?php echo $row2['failsub']?>        
            </th>
            <?php
            if($row2['failsub']>0){
                echo "<th colspan='2'>";

                $query10 = "SELECT * FROM exammark WHERE examid='$examid' AND suniqid='$stuid' AND substatus=1 ORDER by subcode ASC";
                $result10 = mysqli_query($link, $query10);

                // Array to store the failed subjects
                $failedSubjects = [];

                // Variables to store the total marks for Bangla 1st Paper and 2nd Paper
                $banglaTotalMark = 0;
                $englishTotalMark = 0;
                // Iterate through the rows
                while ($row10 = mysqli_fetch_assoc($result10)) {
                    $subjectName = $row10['subname'];
                    $mark = $row10['total'];
                    $lettergrade=$row10['lettergrade'];
                    if($lettergrade == 'F') {
                        $failedSubjects[] = $subjectName;
                    }
                }

               
                // Display the failed subjects
                if (count($failedSubjects) > 0) {
                    echo "Failed Subjects: " . implode(', ', $failedSubjects);
                } else {
                    echo "No subjects failed.";
                }

                echo "</th>";
            } else {
                echo "<th>";
                echo $row2['gpa'];
                echo "</th>";
            }
            ?>

            <?php
            if($row2['failsub']>0){
               
            } else {
               echo "<th>";
               echo $row2['gpa4th'];
               echo "</th>";
            }?>
        </tr>

        <?php $count2++; } ?>
    </tbody>
</table>
            </div>
        </div>
    </div>

</body>
</html>
