<?php
require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$roll=$_REQUEST['roll'];
$passingYear=$_REQUEST['passingYear'];
require "../interdb.php";

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Testimonial</title>
<style type="text/css">
	@font-face {
    font-family: 'testibody'; /* This is the name you'll use to refer to the font */
    src: url('testibody.ttf') format('truetype');
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
	background:url(frame.png);
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
    font-size: 40px;
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
    margin-top: -100px;
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
            $headname;
            $sel_query2="Select * from schoolinfo";
            $result2 = mysqli_query($link,$sel_query2);
            while($row2 = mysqli_fetch_assoc($result2)) {
            $softlink=$row2['softlink'];
            $headname=$row2['headname'];
            ?>
            <img src="../img/lego.png?<?php echo time();?>" alt="" id='sch_lego'>
            <center>
            <h1 id="schname">
            <?php echo $row2['schoolname'];?>
            </h1>
            <span id='schtext'>
            <i>
            <h1>ESTD: <?php echo $row2['estd']?>; EIIN: <?php echo $row2['eiin']?>; School Code: <?php echo $row2['schoolcode']?>;<?php $voccode=$row2['voccode'];if($voccode>0){?> Vocational Code: <?php echo $row2['voccode'];?><?php }?></h1>
            <h1><?php echo $row2['schooladdress']?>
            <h1>
            	Email: 
            <?php
            echo $row2['schmail'];
            echo "  Web: ";
            echo $row2['website'];
            ?>
            </h1>
            </i>
            </span>
            <?php $count2++; } ?>
			</center>
			<img src="bdlego.png" alt="" id='bdlego'>
			<div class="clear"></div>

			<center><h1 style="font-weight:800;font-family: Old English Text MT;font-size: 50px;margin-top: -20px;">Testimonial</h1></center>
<?php
$count10=1;
$sel_query10="Select * from testimonials WHERE roll='$roll' AND passingYear='$passingYear'";
$result10 = mysqli_query($link,$sel_query10);
while($row10 = mysqli_fetch_assoc($result10)) {
?>
<p id="testi_text">This is certify that, <b id='name'><?php echo $row10['studentName'];?></b>, Son/Daughter of, <b id='name'><?php echo $row10['fatherName'];?></b> AND <b id='name'><?php echo $row10['motherName'];?></b>. Village/House: ..<b id='name'><?php echo $row10['village'];?>..</b> Post: ..<b id='name'><?php echo $row10['post'];?>..</b> PS: <b id='name'>..<?php echo $row10['ps'];?>..</b> District: <b id='name'>..<?php echo $row10['ds'];?>..</b> He/She has been passed his/her : <b id='name'>S.S.C(<?php echo $row10['passingYear']?>)</b> Exam (Taken By Dhaka Board) bearing G.P.A: <b id='name'><?php echo $row10['gpa'];?></b> with letter grade: <b id='name'><?php echo $row10['grade'];?></b> from <b id='name'><?php echo $row10['studentGroup'];?></b> group. <br><br>

In this exam his/her Roll No: <b id='name'><?php echo $row10['roll'];?></b> and Registration no: <b id='name'><?php echo $row10['registration'];?></b>. According to school admission book, his/ her date of birth: <b id='name'><?php echo $row10['dob'];?></b>. <br><br>

He/She has a good Character. I wish him/her all the success in life.

</p>
<!--QR CODE START-->
					
<?php

$text ="Roll ".$roll."REG ".$row10['registration']."";

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
						?>
<!--QR CODE END-->
 <h4 style="margin-left:67px;">ISSUE DATE: <?php echo $row10['issuedate']?></h4>

<?php $count10++; } ?>

<div style="width: 300px;
    float: right;
    margin-right: 220px;
    margin-top: -85px;
    border-top: 2px solid black;">
<span style="border-top: 1px solid black; margin-top:-10px;" >
	<center>
	<h3><?php echo $headname;?></h3>
	<h4>Head Teacher</h4>
	</center>
</span>
</div>
<center><h3 style="margin-top: 10px;margin-left: -173px;">Developed By Black Code IT</h3></center>

		</div>
		</div>
</body>
</html>