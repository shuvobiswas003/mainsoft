<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Assuming these variables are passed via GET request or POST form
$examid = $_REQUEST['examid'];
$classnumber = $_REQUEST['classnumber'];
$secgroupname = $_REQUEST['secgroupname'];

// Database connection
require "../interdb.php"; // Assuming this file contains your database connection logic

// Fetching students
$sel_query = "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll";
$result = mysqli_query($link, $sel_query);

// Fetching school information
$sel_query2 = "SELECT * FROM schoolinfo";
$result2 = mysqli_query($link, $sel_query2);
$row2 = mysqli_fetch_assoc($result2); // Assuming there's only one row in schoolinfo

// Fetching exam information
$sel_query3 = "SELECT * FROM exam WHERE exid='$examid'";
$result3 = mysqli_query($link, $sel_query3);
$row3 = mysqli_fetch_assoc($result3); // Assuming there's only one row for the exam

// Fetching subjects and exam dates
$sel_query4 = "SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname'";
$result4 = mysqli_query($link, $sel_query4);
$row_count = mysqli_num_rows($result4);

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Exam Control</title>
    <link rel="icon" href="logo-top-1.ico">
    <!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <style type="text/css">
        #table {
            width: 92%;
            height: auto;
        }
        th {
            height: 35px;
            font-family: BrowalliaUPC;
            font-size: 15px;
            text-align: center;
        }
        td {
            height: 50px;
            font-family: Rockwell;
            text-align: center;
            text-transform: capitalize;
        }
        .end_part {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .end_part_left, .end_part_right {
            width: 30%;
           
            text-align: center;
        }
        .end_part_left h5, .end_part_right h5 {
            font-family: Lucida Calligraphy;
            font-size: 11px;
        }
        #es{
            width:120px;!important
        }
        #photo{
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body>
<div class="warper">
    <div class="head_part">

               
            
        <center> <img src="../img/lego.png?<?php echo time()?>"  alt="" height="100px;">
            <h1><?php echo $row2['schoolname']; ?></h1></center>
        <center><h3><?php echo $row3['examname'] . " - " . $row3['year']; ?></h3></center>
        <center><h3>Exam Attendance Sheet</h3></center>
        <center><h2>Class: <?php echo $classnumber ?> Section/Group: <?php echo $secgroupname ?></h2></center>
    </div>
    <div class="futter">
        <center>
            <table border="1" cellpadding="0" cellspacing="0" id="table">
                <thead>
                <tr>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <?php
                    mysqli_data_seek($result4, 0); // Reset result pointer
                    while ($row4 = mysqli_fetch_assoc($result4)) {
                        echo "<th>{$row4['subname']}</th>"; // Display subjects for each student
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <th><?php echo $row['roll']; ?></th>
                        <th><?php echo $row['name']; ?></th>
                        <th>
                            <!--Img Start-->
                            <?php
                            $imgsl=$row["imgname"];
                            if($imgsl=="IMG_0.png" OR $imgsl=="" OR $imgsl=="IMG_.png"){
                            ?>
                            <img id="photo" src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg">
                            <?php
                            }else{
                            ?>
                            <img id="photo" src="../img/student/<?php echo $row['imgname'];?>">

                            <?php
                            }
                            ?>
                            <!--Img End-->
                        </th>   
                        <?php
                        mysqli_data_seek($result4, 0); // Reset result pointer
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                            echo "<td id='es'></td>"; // Placeholder for student sign
                        }
                        ?>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="<?php echo $row_count + 3; ?>" style="text-align: center;">
                        <div class="end_part">
                            <div class="end_part_left"><h5>Exam Controller Sign</h5></div>
                            <div class="end_part_right">
                                <img src="../img/hmsign.png?<?php echo time(); ?>" style="width:90px;height:30px;">
                                <h5><?php echo $row2['headname']; ?></h5>
                                <h5><?php echo $row2['head_deg']; ?></h5>
                            </div>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </center>
    </div>
</div>
</body>
</html>
