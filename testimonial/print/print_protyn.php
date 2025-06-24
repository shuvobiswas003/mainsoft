<?php
require_once '../../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
$id=$_REQUEST['id'];
require "../../interdb.php";

$count=1;
$sel_query="Select * from protyon WHERE id='$id'";
$result = mysqli_query($link,$sel_query);

?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangla Protyon Potro</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        @font-face {
            font-family: 'SutonnyOMJ'; /* Font family name */
            src: url('../../fonts/SutonnyOMJ.ttf') format('truetype'); /* Font file path */
        }

        @font-face {
            font-family: 'SutonnyMJ'; /* Font family name */
            src: url('../../fonts/SutonnyMJ-Regular.ttf') format('truetype'); /* Font file path */
        }
        
        body {
            margin-top: 0.5in;
        }

        #schtext h1{
            margin-top: -10px;
        }


        .float-left {
            float: left;
        }

        .float-right {
            float: right;
            padding-right: 20px;
        }
        #qr{
            height: 150px;
            width: 150px;
        }
         @media print {
            
           
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <img src="../../img/lego.png?<?php echo time();?>" alt="" id='sch_lego' style="max-height: 150px;max-width: 150px;margin: 0;">
           
                <?php
                $baselink;
                $softlink;
                $count2=1;
                $headname;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                    $softlink=$row2['softlink'];
                    $headname=$row2['headname'];
                ?>
                <div style="margin-top: -170px;">
                <center>
                    <h1 style="font-size:40px;font-family: SutonnyOMJ;">
                        <b>
                            <?php echo $row2['schoolnameb'];?>
                        </b>
                    </h1>
                    <h1 style="font-size:30px;margin-top: -20px;">
                        <b>
                            <?php echo $row2['schoolname'];?>
                        </b>
                    </h1>
                    <span id='schtext'>
                        <h1 style="font-size:20px;font-family: SutonnyOMJ;">
                            <b>স্থাপিত: <span style="font-family: SutonnyMJ"><?php echo $row2['estd']?></span>
                                ; 
                            ই.আই.আই.এন: <span style="font-family: SutonnyMJ"><?php echo $row2['eiin']?></span>; 
                            স্কুল কোড: <span style="font-family: SutonnyMJ"><?php echo $row2['schoolcode']?></span>,
                            <?php $voccode=$row2['voccode'];if($voccode>0){?> ,
                            ভোকেশনাল কোড: <span style="font-family: SutonnyMJ"><?php echo $row2['voccode'];?></span><?php }?>
                        </b>
                    </h1>
                    <h1 style="font-size:25px;font-family: SutonnyOMJ;"><b><?php echo $row2['schooladdressb']?></b></h1>
                    <h1 style="font-size:20px;font-family: SutonnyOMJ;"><b>
                        ইমেইল: 
                        <?php
                        echo $row2['schmail'];
                        echo "  ওয়েবসাইট ";
                        echo $row2['website'];
                        ?>
                    </b></h1>
                </span>
                <?php $count2++; } ?>
                </center>
                </div>
                 
            </div>

        </div>
    </div>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div  style="border-top:3px solid black;padding-bottom: 5px;"></div>
        </div>
    </div>
</div>


<?php
while($row = mysqli_fetch_assoc($result)) {
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <p class="float-left">স্মারক নং: <?php echo $row['memorial_no']; ?></p>
        </div>
        <div class="col-md-6">
            <p class="float-right">তারিখ: 
                <span style="font-size:25px;font-family: SutonnyMJ;">
                    <?php
                        $formatted_date = date('d-m-Y', strtotime($row['pdate']));
                        echo $formatted_date;
                    ?>
                </span>
            </p>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1 style="font-family: SutonnyOMJ;
                    font-weight: bold;
                    font-size: 60px;
                    padding-top: 5px;
                    padding-bottom: 10px;">
                    <span style="border-bottom: 2px solid black;">প্রত্যয়ন পত্র</span></h1>
                </center>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-12 justify-text">
                <?php 
                //find student data
                $stuid=$row['stu_id'];
                $sel_query2="Select * from student WHERE uniqid='$stuid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <p style="font-weight: 100;font-size: 25px;text-align: justify;margin: 50px;">
                    এই মর্মে প্রত্যয়ন করা যাচ্ছে যে ,<?php echo $row2['nameb'];?>  , পিতা - <?php echo $row2['fnameb'];?> ,  মাতা - <?php echo $row2['mnameb'];?> , গ্রাম - <?php echo $row['village'];?> , ডাকঘর - <?php echo $row['post'];?> , উপজেলা: <?php echo $row['ps'];?> জেলা: <?php echo $row['ds'];?> । সে এই বিদ্যালয়ে <span style="font-family:SutonnyMJ"><?php echo $current_year = date('Y');?></span> শিক্ষাবর্ষের <span style="font-family:SutonnyMJ"><?php echo $row2['classnumber'];?></span> শেণির একজন নিয়মিত শিক্ষার্থী । তার শ্রেণী রোল নং -<span style="font-family:SutonnyMJ"><?php echo $row2['roll'];?> </span> শাখা - <?php echo $row2['secgroup'];?> । ভর্তি বহি অনুযায়ী তার জন্ম তারিখ - <span style="font-family:SutonnyMJ">
                        <?php 
                      
                        $formatted_date = date('d-m-Y', strtotime($row2['dob']));
                        echo $formatted_date;
                        ?> 
                        । আমার জানামতে সে সৎ ও নৈতিক চরিত্রের অধিকারী । 
                    <br><br>
                    আমি তার সর্বাঙ্গীণ মঙ্গল ও উজ্জ্বল ভবিষ্যৎ কামনা করি  ।
                </p>

                <?php }?>
            </div>
        </div>
    </div>


<br><br><br><br>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="head_sign" style="width:300px;float: right;margin-right: 120px;">
                <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                    $softlink=$row2['softlink'];
                    $headname=$row2['headname'];
                ?>
                    <center>
                        <h1 style="font-size:15px;">
                            <b>
                                <?php echo $row2['headnameb'];?><br>
                                <?php echo $row2['head_deg_bangla'];?><br>
                                <?php echo $row2['schoolnameb'];?><br>
                                <?php echo $row2['schooladdressb'];?><br>
                                <?php echo $row2['mobileb'];?>
                            </b>
                        </h1>
                    </center>
                    <?php $count2++; } ?>
                </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="qr" style="width:300px;float: left;margin-left: 120px;">
            <!--QR CODE START-->
                                
            <?php

            $text ="Student ID: ".$row['stu_id']." Memrial_no ".$row['memorial_no']."";

            $qr_code = QrCode::create($text);

            $writer = new PngWriter;
            $result5 = $writer->write($qr_code);

            // Get the base64-encoded image data
            $imageData = base64_encode($result5->getString());
            echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
                                    ?>
            <!--QR CODE END-->
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>Developed By: Black Code IT</center>
        </div>
    </div>
</div>

<?php $count++; } ?><!--ending protyon table-->
    
</body>
</html>
