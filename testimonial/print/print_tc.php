<?php
require_once '../../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
// Initialize the session
session_start();
 
$id=$_REQUEST['id'];
require "../../interdb.php";

// Function to convert English numbers to Bengali text
function convertToBengali($number) {
    $bengali_numbers = array(
        0 => '০',
        1 => '১',
        2 => '২',
        3 => '৩',
        4 => '৪',
        5 => '৫',
        6 => '৬',
        7 => '৭',
        8 => '৮',
        9 => '৯'
    );
    return strtr($number, $bengali_numbers);
}

// Function to add Bengali ordinal suffixes
function addBengaliSuffix($number) {
    switch ($number) {
        case 6:
            return convertToBengali($number) . 'ষ্ঠ';
        case 7:
            return convertToBengali($number) . 'ম';
        case 8:
            return convertToBengali($number) . 'ম';
        case 9:
            return convertToBengali($number) . 'ম';
        case 10:
            return convertToBengali($number) . 'ম';
        case 11:
            return convertToBengali($number) . 'দশ';
        case 12:
            return convertToBengali($number) . 'দশ';
        default:
            return convertToBengali($number); // For other numbers, just return the number in Bengali
    }
}


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>TC</title>
<style type="text/css">
	@font-face {
    font-family: 'testibody'; /* This is the name you'll use to refer to the font */
    src: url('testibody.ttf') format('truetype');
	}


	@font-face {
            font-family: 'SutonnyOMJ'; /* Font family name */
            src: url('../../fonts/SutonnyOMJ.ttf') format('truetype'); /* Font file path */
        }

        @font-face {
            font-family: 'SutonnyMJ'; /* Font family name */
            src: url('../../fonts/SutonnyMJ-Regular.ttf') format('truetype'); /* Font file path */
        }
	*{
	margin:0;
	padding:0;
	}
.clear{
	clear: both;
}
	.wraper{
	width:1086px;
	height:725px;
	}
	.main_part{
	padding: 15px;
	background:url(tc_frame.png);
	height: 725px;
	width:1086px;
	background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
	}
	#sch_lego{
		margin-top: 38px;
    width: 120px;
    height: 120px;
    margin-left: 50px;
	}
	#schname{
		margin-top:-130px;
    font-size: 50px;
    font-family: Baskerville Old Face;
    font-weight: 600;
	}
	#schtext{
		font-size: 8px;
	}
	#bdlego{
	height: 120px;
    width: 120px;
    margin-left: 910px;
    margin-top: -283px;
}

#testi_text{
	margin-left: 75px;
    text-align: justify;
    font-size: 25px;
    font-weight: 400px;
    margin-right: 100px;
    font-family:testibody ;
}
#name{
	
	font-size: 28px;

}
#qr{
	width: 120px;
    height: 120px;
    margin-left: 67px;
    margin-top: 15px;
}
#headsign{
	margin-left: 630px;
    margin-top: -100px;
    border-top: 1px solid black;
    margin-right: 241px;
}
#headtitle{
    
    
}
	</style>

</head>
<body>
	<div class="wraper">
		
		<div class="main_part">
			<!--School name And Info-->
			<?php
			$baselink;
			$softlink;
            $count2=1;
            $headnameb;
            $deg_bangla;
            $schoolnameb;
            $sel_query2="Select * from schoolinfo";
            $result2 = mysqli_query($link,$sel_query2);
            while($row2 = mysqli_fetch_assoc($result2)) {
            $softlink=$row2['softlink'];
            $headnameb=$row2['headnameb'];
            $schoolnameb=$row2['schoolnameb'];
            $deg_bangla=$row2['head_deg_bangla'];
            ?>
            <img src="../../img/lego.png?<?php echo time();?>" alt="" id='sch_lego'>
            <center>
            <h1 id="schname" style="font-size:50px;font-family: SutonnyOMJ;">
            <?php echo $row2['schoolnameb'];?>
            </h1>
            <span id='schtext'>
            <i>
            <h1>
            স্থাপিত: <span style="font-family: SutonnyMJ"><?php echo $row2['estd']?></span>
                                ; 
            ই.আই.আই.এন: <span style="font-family: SutonnyMJ"><?php echo $row2['eiin']?></span>; 
            স্কুল কোড: <span style="font-family: SutonnyMJ"><?php echo $row2['schoolcode']?></span>,
            <?php $voccode=$row2['voccode'];if($voccode>0){?> ,
            ভোকেশনাল কোড: <span style="font-family: SutonnyMJ"><?php echo $row2['voccode'];?></span><?php }?>	
            </h1>

            <h1 style="font-family: SutonnyOMJ;"><b><?php echo $row2['schooladdressb']?></b></h1>

            <h1>
            	ইমেইল: 
            <?php
            echo $row2['schmail'];
            echo "  ওয়েবসাইট ";
            echo $row2['website'];
            ?>
            </h1>

            </i>
            </span>
            <?php $count2++; } ?>
			</center>
			<img src="../../img/rlego.png?<?php echo time();?>" alt="" id='bdlego'>
			<div class="clear"></div>

			<center><h1 style="font-weight:800;font-family: SutonnyOMJ;font-size: 80px;margin-top: -20px;">ছাড়পত্র</h1></center>

<?php
$count10=1;
$sel_query10="Select * from tc WHERE id='$id'";
$result10 = mysqli_query($link,$sel_query10);
while($row10 = mysqli_fetch_assoc($result10)) {
?>
<div class="date_memorial">
	<p style="float: left;
    margin-left: 55px;
    margin-top: -20px;">স্মারক নং: <?php echo $row10['memorial_no']; ?></p>


<p style="float:right;margin-right: 55px;
    margin-top: -20px;">তারিখ:
<span style="font-size:25px;font-family: SutonnyMJ;">
  <?php
    $formatted_date = date('d-m-Y', strtotime($row10['pdate']));
    echo $formatted_date;
?>
</span>
</p>

</div>

<div class="clear"></div>


<p id="testi_text">
	<?php 
	//getting student information
	$stuid=$row10['stu_id'];
	$sel_query2="Select * from student WHERE uniqid='$stuid'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
	?>
	ছাত্র/ছাত্রীর নাম: <?php echo $row2['nameb']?> পিতা: <?php echo $row2['fnameb']?>  মাতা: <?php echo $row2['mnameb']?>  গ্রাম: <?php echo $row10['village']?> ডাকঘর: <?php echo $row10['post']?> উপজেলা: <?php echo $row10['ps']?> জেলা: <?php echo $row10['ds']?> । 
	<span style="font-family:SutonnyMJ">
	<?php
	 $formatted_date = date('d-m-Y', strtotime($row10['pdate']));
     echo $formatted_date;
	?>
	</span>


	তারিখ পর্যন্ত এই বিদ্যালয়ে অধ্যয়ন করেছ। তার জন্ম তারিখ ভর্তি অনুযায়ী 
	<span style="font-family:SutonnyMJ">
	<?php               
    $formatted_date = date('d-m-Y', strtotime($row2['dob']));
    echo $formatted_date;
    ?>
	</span>
    খ্রি ।
    <?php 
    // Convert strings to DateTime objects
	$dob = new DateTime($row2['dob']);
	$pdate = new DateTime($row10['pdate']);

	// Calculate the difference between the two dates
	$interval = $dob->diff($pdate);

	// Extract the difference into variables
	$years = $interval->y;
	$months = $interval->m;
	$days = $interval->d;
    ?> 
    তার বর্তমান বয়স <span style="font-family:SutonnyMJ"><?php echo $years?></span> বৎসর <span style="font-family:SutonnyMJ"><?php echo $months?></span> মাস <span style="font-family:SutonnyMJ"><?php echo $days?></span> দিন । 

    সে এই বিদ্যালয়ে 
    <span style="font-family:SutonnyMJ">
    	<?php 
    	$class_number=$row2['classnumber'];
    	$bengali_number = addBengaliSuffix($class_number);
    	echo $bengali_number;?>
    </span> 
    শ্রেনী পর্যন্ত/লেখা পড়া করেছে এবং গত বার্ষিক পরীক্ষায় উত্তীর্ণ হয়েছে/হয় নাই। তার নিকট, হতে বিদ্যালয়ের যাবতীয় পাওনা 
    <span style="font-family:SutonnyMJ">
    <?php
	 $formatted_date = date('d-m-Y', strtotime($row10['pdate']));
     echo $formatted_date;
	?>
	</span>
	তাখ্রি পর্যন্ত বুঝে নেওয়া হয়েছে। 
	<br><br>
	আমি তার সর্বাঙ্গীন মঙ্গল ও উজ্জ্বল ভবিষ্যৎ কামনা করি ।

	<?php }?>
</p>
<!--QR CODE START-->
					
<?php

$text ="ID ".$row10['id']."Memorial_no ".$row10['memorial_no'];

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
						?>
<!--QR CODE END-->
 <h4 style="margin-left:67px;">ISSUE DATE: <?php echo $row10['pdate']?></h4>

<?php $count10++; } ?>

<div style="width: 190px;
    float: left;
    margin-left: 220px;
    margin-top: -85px;
    border-top: 2px solid black;">
<span style="border-top: 1px solid black; margin-top:-10px;" >
	<center>
	<h3>লেখক</h3>
	</center>
</span>
</div>


<div style="width: 300px;
    float: right;
    margin-right: 220px;
    margin-top: -85px;
    border-top: 2px solid black;">
<span style="border-top: 1px solid black; margin-top:-10px;" >
	<center>
	<h3><?php echo $headnameb;?></h3>
	<h4><?php echo $deg_bangla;?></h4>
	<h4><?php echo $schoolnameb;?></h4>
	</center>
</span>
</div>
<center><h3 style="margin-top: 0px;margin-left: -173px;">Developed By Black Code IT</h3></center>

		</div>
		</div>
</body>
</html>