<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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

    $subject_query = "SELECT DISTINCT subname, subcode,fullmarks FROM exammark WHERE examid='$examid' AND classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER BY subcode";
    $subject_result = mysqli_query($link, $subject_query);
    $subjects = mysqli_fetch_all($subject_result, MYSQLI_ASSOC);

    $student_query = "SELECT * FROM student WHERE classnumber=$classnumber AND secgroup='$secgroupname' ORDER BY roll ASC";
    $student_result = mysqli_query($link, $student_query);
    ?>

    <center>
        <h1 style="font-size:40px;"><?php echo $schoolname; ?></h1>
        <h1 style="font-size:25px;margin-top:-15px;">Exam Name: <?php echo $examname; ?></h1>
        <h1 style="font-size:25px;margin-top:-15px;">Tabulation Sheet Of Class <?php echo $classnumber; ?> Group/Section: <?php echo $secgroupname; ?></h1>
    </center>

    <p></p>

    <center>
        <?php
        if($classnumber=='8'){
        ?>
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
                                    echo "<th colspan='" . (in_array($subject['subcode'], $subcodesToDisplayPractical) ? 3 : 2) . "'>" . $subject['subname'] . " (" . $subject['subcode'] . ')-'.$subject['fullmarks'].'</th>';
                                }
                                ?>
                                <th rowspan='2'>Total Mark</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($subjects as $subject) {
                                    if (in_array($subject['subcode'], $subcodesToDisplayPractical)) {
                                        echo "<th class='vertical-text'>CQ</th>";
                                        echo "<th class='vertical-text'>MCQ</th>";
                                        echo "<th class='vertical-text'>Pract</th>";
                                    } else {
                                        echo "<th class='vertical-text'>CQ</th>";
                                        echo "<th class='vertical-text'>MCQ</th>";
                                    }
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
        $mark_query = "SELECT cq, mcq, practical, fullmarks, letterpoint,sum(total) FROM exammark WHERE examid='$examid' AND suniqid='{$student_row['uniqid']}' AND subcode='$subcode'";
        $mark_result = mysqli_query($link, $mark_query);
        if ($mark_row = mysqli_fetch_assoc($mark_result)) {
            // Get the CQ and MCQ marks
            $cq_mark = $mark_row['cq'];
            $mcq_mark = $mark_row['mcq'];
            $practical_mark = $mark_row['practical'];
            $fullmarks = $mark_row['fullmarks'];
            $letterpoint = $mark_row['letterpoint'];
    
    $totakmark='';          
    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='{$student_row['uniqid']}'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $totakmark=$row2['sum(total)'];
    }
            
            
            $cq_class = '';
            $mcq_class = '';

            // Check if letterpoint is greater than 0 and apply CSS class accordingly
            if ($letterpoint <= 0) {
                $cq_class = 'failed-mark';
                $mcq_class = 'failed-mark';
            }

            // Output the marks with appropriate CSS class
            echo '<th class="' . $cq_class . '">' . $cq_mark . '</th>';

            // Check if the subject code is 107 or 108, if not, print the MCQ mark
            if ($subcode != '107' && $subcode != '108') {
                echo '<th class="' . $mcq_class . '">' . $mcq_mark . '</th>';
            } else {
                echo "<th></th>";
            }

            if (in_array($subcode, $subcodesToDisplayPractical)) {
                // Output practical marks with appropriate CSS class
                echo '<th>' . $practical_mark . '</th>';
            }
        } else {
            // Student marks not found for this subject
            if (in_array($subcode, $subcodesToDisplayPractical)) {
                echo '<th></th>';
                echo '<th></th>';
                echo '<th></th>';
            } else {
                echo '<th></th>';
                echo '<th></th>';
            }
        }
    }
    echo '<th>';
    echo $totakmark;
    echo '</th>';
    
    echo '</tr>';
}
?>

</tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <?php }else{?>
        
        
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
                                    echo "<th colspan='" . (in_array($subject['subcode'], $subcodesToDisplayPractical) ? 3 : 2) . "'>" . $subject['subname'] . " (" . $subject['subcode'] . ')</th>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                foreach ($subjects as $subject) {
                                    if (in_array($subject['subcode'], $subcodesToDisplayPractical)) {
                                        echo "<th class='vertical-text'>CQ</th>";
                                        echo "<th class='vertical-text'>MCQ</th>";
                                        echo "<th class='vertical-text'>Pract</th>";
                                    } else {
                                        echo "<th class='vertical-text'>CQ</th>";
                                        echo "<th class='vertical-text'>MCQ</th>";
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                       <tbody>
    <?php
    while ($student_row = mysqli_fetch_assoc($student_result)) {
        echo '<tr>';
        echo '<th>' . $student_row['roll'] . '</th>';
        echo '<th>' .strtoupper($student_row['name']). '</th>';

        foreach ($subjects as $subject) {
            $subcode = $subject['subcode'];
            $mark_query = "SELECT cq, mcq, practical,fullmarks,letterpoint FROM exammark WHERE examid='$examid' AND suniqid='{$student_row['uniqid']}' AND subcode='$subcode'";
            $mark_result = mysqli_query($link, $mark_query);
            if ($mark_row = mysqli_fetch_assoc($mark_result)) {
                // Get the CQ and MCQ marks
                $cq_mark = $mark_row['cq'];
                $mcq_mark = $mark_row['mcq'];
                $practical_mark = $mark_row['practical'];
                $fullmarks=$mark_row['fullmarks'];
    $totakmark='';          
    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='{$student_row['uniqid']}'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
        $totakmark=$row2['sum(total)'];
    }
                
                
        if ($practical_mark <= 0 AND $subcode != '154') {
            $cq_passing_threshold = round((($fullmarks * 70) / 100) / 3); // Adjust this as per your requirement
            $mcq_passing_threshold = round((($fullmarks * 30) / 100) / 3); // Adjust this as per your requirement
            $cq_failed = ($cq_mark < $cq_passing_threshold);
            $mcq_failed = ($mcq_mark < $mcq_passing_threshold);

            // Apply the CSS class 'failed-mark' to the failed marks
            $cq_class = $cq_failed ? 'failed-mark' : '';
            $mcq_class = $mcq_failed ? 'failed-mark' : '';

            // Output the marks with appropriate CSS class
            echo '<th class="' . $cq_class . '">' . $cq_mark . '</th>';
            
            // Check if the subject code is 107 or 108, if not, print the MCQ mark
            if ($subcode != '107' && $subcode != '108') {
                echo '<th class="' . $mcq_class . '">' . $mcq_mark . '</th>';
            }else{
                echo "<th></th>";
            }

            if (in_array($subcode, $subcodesToDisplayPractical)) {
                // Output practical marks with appropriate CSS class
                echo '<th>' . $practical_mark . '</th>';
            }
        }elseif($subcode != '154'){
            $cq_passing_threshold = round((($fullmarks * 50) / 100) / 3); // Adjust this as per your requirement
            $mcq_passing_threshold = round((($fullmarks * 25) / 100) / 3); // Adjust this as per your requirement
            $cq_failed = ($cq_mark < $cq_passing_threshold);
            $mcq_failed = ($mcq_mark < $mcq_passing_threshold);

            // Apply the CSS class 'failed-mark' to the failed marks
            $cq_class = $cq_failed ? 'failed-mark' : '';
            $mcq_class = $mcq_failed ? 'failed-mark' : '';

            // Output the marks with appropriate CSS class
            echo '<th class="' . $cq_class . '">' . $cq_mark . '</th>';
            
            // Check if the subject code is 107 or 108, if not, print the MCQ mark
            if ($subcode != '107' && $subcode != '108') {
                echo '<th class="' . $mcq_class . '">' . $mcq_mark . '</th>';
            }else{
                echo "<th></th>";
            }

            if (in_array($subcode, $subcodesToDisplayPractical)) {
                // Output practical marks with appropriate CSS class
                echo '<th>' . $practical_mark . '</th>';
            }
        }elseif($subcode == '154'){
            $cq_passing_threshold = 0; // Adjust this as per your requirement
            $mcq_passing_threshold = round((($fullmarks * 25) / 100) / 3); // Adjust this as per your requirement
            $cq_failed = ($cq_mark < $cq_passing_threshold);
            $mcq_failed = ($mcq_mark < $mcq_passing_threshold);

            // Apply the CSS class 'failed-mark' to the failed marks
        
            $mcq_class = $mcq_failed ? 'failed-mark' : '';

            // Output the marks with appropriate CSS class
            echo '<th>' . $cq_mark . '</th>';
            
            // Check if the subject code is 107 or 108, if not, print the MCQ mark
            if ($subcode != '107' && $subcode != '108') {
                echo '<th class="' . $mcq_class . '">' . $mcq_mark . '</th>';
            }else{
                echo "<th></th>";
            }

            if (in_array($subcode, $subcodesToDisplayPractical)) {
                // Output practical marks with appropriate CSS class
                echo '<th>' . $practical_mark . '</th>';
            }
            }//ending ict loop
               
               
            } else {
                // Student marks not found for this subject
                if (in_array($subcode, $subcodesToDisplayPractical)) {
                    echo '<th></th>';
                    echo '<th></th>';
                    echo '<th></th>';
                } else {
                    echo '<th></th>';
                    echo '<th></th>';
                }
            }
        }
        
    echo '<th>';
    echo $totakmark;
    echo '</th>';
        echo '</tr>';
    }
    ?>
</tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }?>
    </center>
</body>

</html>
