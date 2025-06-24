<?php
// Initialize the session
session_start();
// Check if the user is either logged in or is a teacher, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || ($_SESSION["loggedin"] !== true && $_SESSION["loggedin"] !== 'teacher')) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
    @media print {
    .failed-mark {
        color: red !important;
    }
    /* Add any other print-specific styles here */
}
        * {
            margin: 0 auto;
            padding: 0 auto;
        }

        h1 {
            font-size: 19px;
            margin-left: 159px;
        }

        th {
            text-align: center;
            font-size: 15px;
            width: 77px !important;
            height: 35px
        }

        th {
            font-size: 15px;
            text-align: center;
            line-height: 21px;
        }

        #thh {
            width: 10% !important;
        }
        th.vertical-text {
            writing-mode: vertical-lr;
            text-orientation: mixed; /* Optional: Adjust text orientation */
            transform: rotate(180deg);
            white-space: nowrap;
            text-align: center; /* Optional: Align text horizontally */
            height: 55px;
        }
        .failed-mark{
            color: red;
        font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php
    require "../interdb.php";

    $examid = $_REQUEST['examid'];
    $classnumber = $_REQUEST['classnumber'];
    $secgroupname = $_REQUEST['secgroupname'];
    
    $subcodesToDisplayPractical = array(134,154);

if ($classnumber == 9 && $secgroupname == 'Science') {
    $subcodesToDisplayPractical = array(126,134,136,137,138,154);
} elseif ($classnumber == 9 && $secgroupname == 'Arts') {
    $subcodesToDisplayPractical = array(134,154);
}elseif ($classnumber == 10 && $secgroupname == 'Science') {
    $subcodesToDisplayPractical = array(126,134,136,137,138,154);
}elseif ($classnumber == 10 && $secgroupname == 'Arts') {
    $subcodesToDisplayPractical = array(134,154);
}
    
    

    $schoolname = "";
    $examname = "";

    $school_query = "SELECT schoolname FROM schoolinfo";
    $school_result = mysqli_query($link, $school_query);
    if ($school_row = mysqli_fetch_assoc($school_result)) {
        $schoolname = $school_row['schoolname'];
    }

    $exam_query = "SELECT examname FROM exam WHERE exid='$examid'";
    $exam_result = mysqli_query($link, $exam_query);
    if ($exam_row = mysqli_fetch_assoc($exam_result)) {
        $examname = $exam_row['examname'];
    }

    $subject_query = "SELECT DISTINCT subname, subcode,fullmarks FROM exammark WHERE examid='$examid' AND classnumber='$classnumber'  ORDER BY subcode";
    $subject_result = mysqli_query($link, $subject_query);
    $subjects = mysqli_fetch_all($subject_result, MYSQLI_ASSOC);

    $student_query = "SELECT * FROM student WHERE classnumber=$classnumber  ORDER BY roll ASC";
    $student_result = mysqli_query($link, $student_query);
    ?>

    <center>
        <h1 style="font-size:40px;"><?php echo $schoolname; ?></h1>
        <h1 style="font-size:25px;margin-top:-15px;">Exam Name: <?php echo $examname; ?></h1>
        <h1 style="font-size:25px;margin-top:-15px;">Tabulation Sheet Of Class <?php echo $classnumber; ?> </h1>
    </center>

    <p></p>

    <center>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                       <thead>
    <tr>
        <th rowspan='2'>Roll</th>
        <th rowspan='2'>Name</th>
        <?php
        foreach ($subjects as $subject) {
            // Include columns for CQ, MCQ, and Practical for all subjects
            echo "<th colspan='3'>" . $subject['subname'] . " (" . $subject['subcode'] . ')-' . $subject['fullmarks'] . "</th>";
        }
        ?>
        <th rowspan='2'>Total Mark</th>
    </tr>
    <tr>
        <?php
        foreach ($subjects as $subject) {
            // Add vertical text for CQ, MCQ, and Practical
            echo "<th class='vertical-text'>CQ</th>";
            echo "<th class='vertical-text'>CQ(Convert)</th>";
            echo "<th class='vertical-text'>CA</th>";
        }
        ?>
    </tr>
</thead>
<tbody>
    <?php
    while ($student_row = mysqli_fetch_assoc($student_result)) {
        echo '<tr>';
        echo '<th>' . $student_row['roll'] . '</th>';
        echo '<th>' . strtoupper($student_row['name']) . '</th>';

        foreach ($subjects as $subject) {
            $subcode = $subject['subcode'];
            $mark_query = "SELECT cq, mcq, practical FROM exammark WHERE examid='$examid' AND suniqid='{$student_row['uniqid']}' AND subcode='$subcode'";
            $mark_result = mysqli_query($link, $mark_query);
            
            if ($mark_row = mysqli_fetch_assoc($mark_result)) {
                $cq_mark = $mark_row['cq'];
                $mcq_mark = $mark_row['mcq'];
                $practical_mark = $mark_row['practical'];

                // Output marks
                echo '<th>' . $cq_mark . '</th>';
                echo '<th>' . $mcq_mark . '</th>';
                echo '<th>' . $practical_mark . '</th>';
            } else {
                // Marks not available for this subject
                echo '<th></th>';
                echo '<th></th>';
                echo '<th></th>';
            }
        }

        // Calculate and display total marks
        $totakmark = '';
        $sel_query2 = "SELECT SUM(total) AS total_marks FROM exammark WHERE examid='$examid' AND suniqid='{$student_row['uniqid']}'";
        $result2 = mysqli_query($link, $sel_query2);
        if ($row2 = mysqli_fetch_assoc($result2)) {
            $totakmark = $row2['total_marks'];
        }
        echo '<th>' . $totakmark . '</th>';
        echo '</tr>';
    }
    ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
       
    </center>
</body>

</html>
