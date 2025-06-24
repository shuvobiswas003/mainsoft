<?php
require "../../interdb.php";
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card (Class : <?php echo $classnumber; ?>, Sec: <?php echo $secgroupname; ?>, Roll: <?php echo $roll; ?>)</title>

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
        }

        .container {
            width: 210mm;
            height: 297mm;
            margin: auto; /* Optional: Center the container on the page */
        }

        .page {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            padding: 20px; /* Optional: Add padding for content */
        }

         /* Additional styling for each page if needed */
        .page_1 {
            background: url('bcimage/6_report_card_1 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        .page_2 {
            background: url('bcimage/6_report_card_2 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        .page_3 {
           background: url('bcimage/6_report_card_3 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        .page_4 {
            background: url('bcimage/6_report_card_4 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        .page_5 {
            background: url('bcimage/6_report_card_5 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        .page_6 {
            background: url('bcimage/6_report_card_6 copy.jpg') no-repeat center center;
            background-size: 100%;
        }

        #schoolname{
            margin-top: 450px;
            margin-left: 180px;
        }
        #student_name{
             margin-top: 10px;
            margin-left: 155px;
        }
        #student_id{
            margin-top: -45px;
            margin-left: 560px;
        }
        #running_year{
            margin-top: -10px;
            margin-left: 560px;
        }
        #developer_text{
            margin-top: 450px;
            margin-left: 270px;
        }
.stuid_pageno{
    margin-top: 1012px;
}
    </style>

    <link rel="stylesheet" href="6print_report.css">
</head>
<body>
    
<?php
function calculateLevel($stuid, $var, $link) {
    // Splitting values and escaping them
    $values = explode(',', $var);
    $escaped_values = array_map(function ($value) use ($link) {
        return "'" . mysqli_real_escape_string($link, trim($value)) . "'";
    }, $values);
    $placeholders = implode(',', $escaped_values);

    // Variables declaration
    $no_of_t = 0;
    $no_of_c = 0;
    $no_of_s = 0;
    $num_of_total_pi = 0;
    $num_of_absent = 0;

    
    // Query to fetch data
    $query = "SELECT stuid, subcode, chapterno, lno,pi
              FROM exammark67
              WHERE stuid='$stuid' AND CONCAT(subcode, '.', chapterno, '.', lno) IN ($placeholders)
              GROUP BY stuid, subcode, chapterno, lno ORDER BY pi DESC";
    $result2 = mysqli_query($link, $query);

    // Process query result
    if ($result2) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            $pi = $row2['pi'];

            switch ($pi) {
                case '1':
                    $no_of_t++;
                    $num_of_total_pi++;
                    break;
                case '2':
                    $no_of_c++;
                    $num_of_total_pi++;
                    break;
                case '3':
                    $no_of_s++;
                    $num_of_total_pi++;
                    break;
                default:
                    $num_of_absent++;
                    $num_of_total_pi++;
                    break;
            }
        }
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($link);
    }
    $level_count = 0;
    if($num_of_total_pi == '0'){
        $level_count = 0;
    }else{
    // Calculate percentage
    $counting_percent = (($no_of_t - $no_of_s) / $num_of_total_pi) * 100;
    $counting_percent = round($counting_percent);
    

    // Determine level count
    if ($counting_percent == 100) {
        $level_count = 7;
    } elseif ($counting_percent > 49 && $counting_percent < 100) {
        $level_count = 6;
    } elseif ($counting_percent > 24 && $counting_percent < 50) {
        $level_count = 5;
    } elseif ($counting_percent > -1 && $counting_percent < 25) {
        $level_count = 4;
    } elseif ($counting_percent > -24 && $counting_percent < 0) {
        $level_count = 3;
    } elseif ($counting_percent > -49 && $counting_percent <= -25) {
        $level_count = 2;
    } elseif ($counting_percent > -101 && $counting_percent <= -50) {
        $level_count = 1;
    }

        // Output level boxes
        for ($i = 0; $i < $level_count; $i++) {
        echo '<div id="lavel_box"></div>';
        }
    }
}
?>

<!--Genarating PHP FUNCTION-->

<?php

// Six Bangla
$six_b_L1 = "1.1.1,1.1.2,1.2.1,1.2.2";
$six_b_L2 = "1.3.1,1.3.2,1.3.3,1.4.1";
$six_b_L3 = "1.5.1,1.5.2,1.5.3";
$six_b_L4 = "1.6.1,1.6.2";
$six_b_L5 = "1.6.2";

// Six English
$six_E_L1 = "2.1.1,2.1.2,2.1.3";
$six_E_L2 = "2.2.1,2.2.2";
$six_E_L3 = "2.3.1,2.3.2";
$six_E_L4 = "2.4.1,2.4.2";

// Six Math
$six_M_L1 = "3.1.1,3.1.2";
$six_M_L2 = "3.2.1,3.3.1,3.3.2,3.6.1";
$six_M_L3 = "3.4.1";
$six_M_L4 = "3.5.1,3.5.2,3.8.1";
$six_M_L5 = "3.7.1,3.7.2";

// Six Science
$six_S_L1 = "4.1.1,4.1.2,4.2.1,4.2.2";
$six_S_L2 = "4.3.1,4.3.2,4.4.1,4.4.2,4.8.1,4.8.2";
$six_S_L3 = "4.5.1,4.5.2";
$six_S_L4 = "4.6.1,4.6.2,4.7.1,4.7.2";
$six_S_L5 = "4.9.1,4.9.2,4.10.1,4.10.2";

// Six History
$six_H_L1 = "5.2.1,5.2.2,5.3.1";
$six_H_L2 = "5.4.1";
$six_H_L3 = "5.5.1,5.6.1";
$six_H_L4 = "5.1.1,5.1.2,5.1.3,5.7.1,5.7.2";
$six_H_L5 = "5.8.1";

// Six Digital
$six_D_L1 = "6.1.1,6.4.1";
$six_D_L2 = "6.5.1";
$six_D_L3 = "6.2.1,6.3.1";
$six_D_L4 = "6.6.1,6.7.1,6.8.1,6.9.1,6.10.1";

// Six Wellbeing
$six_W_L1 = "7.1.1,7.1.2,7.2.1,7.2.2";
$six_W_L2 = "7.3.1,7.4.1";
$six_W_L3 = "7.5.1,7.5.2,7.6.1,7.6.2";

// Six Jibon jibika
$six_JJ_L1 = "8.3.1,8.4.1,8.4.2,8.5.1";
$six_JJ_L2 = "8.1.1,8.1.2";
$six_JJ_L3 = "8.2.2,8.7.1,8.7.2";
$six_JJ_L4 = "8.6.1,8.6.2";

// Six Shilpo Songskriti
$six_SS_L1 = "9.1.1,9.1.2,9.2.1";
$six_SS_L2 = "9.3.1,9.4.1";
$six_SS_L3 = "9.5.1";

// Six Islam
$six_I_L1 = "10.1.1,10.1.2";
$six_I_L2 = "10.2.1";
$six_I_L3 = "10.3.1,10.3.2";

// Six Hindu
$six_H_L1 = "11.1.1,11.1.2";
$six_H_L2 = "11.2.1,11.2.2";
$six_H_L3 = "11.3.1,11.3.2";


//six BI
$six_BI_L1 = "18.1.1,18.1.2,18.1.9,18.1.10";
$six_BI_L2 = "18.1.3,18.1.4,18.1.5,18.1.6";
$six_BI_L3 = "18.1.7,18.1.8";

?>






    <div class="container">
        
<?php
    $count=1;
    $stuid="";
    $sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
    $stuid=$row['uniqid'];
    ?>
        


 <div class="page page_1">
     
<?php
$count2=1;
$sel_query2="Select * from schoolinfo";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
<h1 id="schoolname">
    <?php echo $row2['schoolnameb']?>
</h1>
<?php $count2++; } ?>

   
    <h2 id="student_name">
    <?php echo $row['name'];?>
    </h2>
    <h2 id="student_id">
    <?php echo $row['uniqid'];?>
    </h2>

    <h2 id="running_year">২০২৩</h2>
 <div class="stuid_pagenoss" style="margin-top:420px;">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>
</div>


<div class="page page_2">

    <!--Bangla Part Start-->

    <div class="box_bangla_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        
        calculateLevel($stuid, $six_b_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_bangla_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        calculateLevel($stuid, $six_b_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_bangla_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
      
        calculateLevel($stuid, $six_b_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_bangla_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_b_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_bangla_5_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.2";
        calculateLevel($stuid, $six_b_L5, $link);  // Pass $link as an argument
        ?>
    </div>
    <!--Bangla Part END-->

    <!--English Part Start-->

    <div class="box_english_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_E_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_english_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_E_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_english_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_E_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_english_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_E_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <!--English Part END-->

    <!--Math Part Start-->

    <div class="box_math_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.1.2,1.1.1,1.2.1";
        calculateLevel($stuid, $six_M_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_math_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.3.1,1.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_M_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_math_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_M_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_math_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_M_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_math_5_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.2";
        calculateLevel($stuid, $six_M_L5, $link);  // Pass $link as an argument
        ?>
    </div>
    <!--Math Part END-->
<div class="stuid_pageno">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>

</div><!--Ending Page2 DIV-->



        <div class="page page_3">
         
    <!--BIGGAN Part Start-->

    <div class="box_biggan_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.1.2,1.1.1,1.2.1";
        calculateLevel($stuid, $six_S_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_biggan_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.3.1,1.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_S_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_biggan_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_S_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_biggan_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_S_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_biggan_5_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.2";
        calculateLevel($stuid, $six_S_L5, $link);  // Pass $link as an argument
        ?>
    </div>
    <!--BIGGAN Part END-->


    <!--ICT Part Start-->

    <div class="box_ICT_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_D_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_ICT_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_D_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_ICT_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_D_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_ICT_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_D_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <!--ICT Part END-->

    <!--etihas Part Start-->

    <div class="box_etihas_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.1.2,1.1.1,1.2.1";
        calculateLevel($stuid, $six_H_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_etihas_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.3.1,1.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_H_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_etihas_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_H_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_etihas_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $six_H_L4, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_etihas_5_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.2";
        calculateLevel($stuid, $six_H_L5, $link);  // Pass $link as an argument
        ?>
    </div>
    <!--etihas Part END-->
<div class="stuid_pageno">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>
        

</div>


        <div class="page page_4">
    <!--jibon Part Start-->
    <div class="box_jibon_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.1.2,1.1.1,1.2.1";
        calculateLevel($stuid, $six_JJ_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_jibon_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.3.1,1.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_JJ_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_jibon_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_JJ_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_jibon_4_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.6.1,1.6.2";
        calculateLevel($stuid, $var, $link);  // Pass $link as an argument
        ?>
    </div>
    <!--jibon Part END-->


<!--dhormo Part Start-->

<?php
$sql10 = "SELECT * FROM exammark67 WHERE  stuid='$stuid' AND subcode='11' ";
$result10 = mysqli_query($link, $sql10);
if (mysqli_num_rows($result10) > 0) {
$row10 = mysqli_fetch_assoc($result10); // Fetch the row
    ?>
    <div class="box_dhormo_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_H_L1, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_dhormo_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_H_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_dhormo_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_H_L3, $link);  // Pass $link as an argument
        ?>
    </div>
<?php } ?>


<?php
$sql10 = "SELECT * FROM exammark67 WHERE  stuid='$stuid' AND subcode='10' ";
$result10 = mysqli_query($link, $sql10);
if (mysqli_num_rows($result10) > 0) {
$row10 = mysqli_fetch_assoc($result10); // Fetch the row
    ?>
    <div class="box_dhormo_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_H_L1, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_dhormo_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_H_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_dhormo_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_H_L3, $link);  // Pass $link as an argument
        ?>
    </div>
<?php } ?>
    <!--dhormo Part END-->

    <!--health Part Start-->

    <div class="box_health_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_W_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_health_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_W_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_health_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_W_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <!--health Part END-->

    <!--shilpo Part Start-->

    <div class="box_shilpo_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.1.2,2.1.1,2.2.1";
        calculateLevel($stuid, $six_SS_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_shilpo_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "2.3.1,2.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_SS_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_shilpo_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_SS_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <!--shilpo Part END-->
<div class="stuid_pageno">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>


        </div>
        <div class="page page_5">
            <!-- Content for page 5 goes here -->
    
            <!--BI Part Start-->
    <div class="box_BI_1_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.1.2,1.1.1,1.2.1";
        calculateLevel($stuid, $six_BI_L1, $link);  // Pass $link as an argument
        ?>
    </div>


    <div class="box_BI_2_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.3.1,1.3.2,1.3.3,1.4.1";
        calculateLevel($stuid, $six_BI_L2, $link);  // Pass $link as an argument
        ?>
    </div>

    <div class="box_BI_3_lavel">
        <?php
        $stuid = $row['uniqid'];  // Make sure to define $stuid
        $var = "1.5.1,1.5.2,1.5.3";
        calculateLevel($stuid, $six_BI_L3, $link);  // Pass $link as an argument
        ?>
    </div>

    <!--BI Part END-->
<div style="margin-top:1012px">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>
        </div>
        <div class="page page_6">
            
            <!-- Content for page 6 goes here -->
<div style="margin-top:1012px">
    <center>
    <br>
    <br>
    <br>
    <?php echo $stuid?>
    </center>
</div>
        </div>

    <!--Ending Student PHP CODE-->
<?php $count++; } ?>
    </div>
</body>
</html>
