<?php
require_once '../../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}
require "../../interdb.php";

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ID Card</title>
<style type="text/css">
	*{
	margin:0;
	padding:0;
	}
.clear{
	clear: both;
}
	.wraper{
	width:685px;
	margin: 0 auto;
	}
	.main_part{
	background:url(../idcard/idf.png);
	height: 1054px;
	width:685px;
	}
	
	#student_photo{
	    height: 285px;
    padding-left: 380px;
    margin-top: -165px;
	}
	
	#classnumber{
	padding-top: 484px;
    padding-left: 148px;
    font-size: 60px;
	}
	
	
	#sec{
	padding-top: 47px;
    padding-left: 117px;
    font-size: 50px;
    color: black;
    
	}
	
	#roll{
padding-top: 30px;
    padding-left: 110px;
    font-size: 50px;
    color: black;
   
	}
	#ID_image{
	   height: 220px;
    margin-left: 420px;
    margin-top: 370px;
	}
	
	#qr{
	height: 233px;
    width: 233px;
    margin-top: -161px;
    margin-left: 408px;
}
	}
	</style>
</head>
<body>
    <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$studentsroll=$_POST['studentsroll'];
?>
    
	<div class="wraper">
		<?php 
    $rolln=explode(",", $studentsroll);
    for ($i = 0; $i < count($rolln); $i++) {
        $newroll =$rolln[$i];
   
        require "../../interdb.php";
        $sel_query="Select * from student where classnumber=$classnumber AND roll=$newroll;";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
    ?>
		<div class="main_part">
        <h1 id="classnumber">
            <?php echo $row['classnumber']; ?>
        </h1>

        <!-- Img Start -->
        <?php
        $imgsl = $row["imgname"];
        if ($imgsl == "IMG_0.png" || $imgsl == "" || $imgsl == "IMG_.png") :
        ?>
            <img src="../../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg?<?php echo time() ?>" id="student_photo">
        <?php else : ?>
            <img src="../../img/student/<?php echo $row['imgname']; ?>?<?php echo time() ?>" id="student_photo">
        <?php endif; ?>
        <!-- Img End -->

        <h1 id="name" style=" padding-top: 31px;padding-left: 120px;font-size: 40px;color: black;">
            <?php
            $name = $row['name'];
            echo $name;
            ?>
        </h1>
        <h1 id="sec">
            <?php
            $section = $row['secgroup'];

            echo $section;

            ?>
        </h1>
        <h1 id="roll">
            <?php
            $roll = $row['roll'];
            $roll_padded = sprintf("%03d", $roll);
            $classnumber = $row['classnumber'];
            $rclassnumber = sprintf("%02d", $classnumber);
            echo "2024" . $rclassnumber . $roll_padded;
            ?>
        </h1>

        <?php
        $stuid = $row['uniqid'];
        $text = "https://rabeyaali.edu.bd/myschool/public/verstu/student_prof_login.php?stuid=" . $stuid;

        $qr_code = QrCode::create($text);

        $writer = new PngWriter;
        $result5 = $writer->write($qr_code);

        // Get the base64-encoded image data
        $imageData = base64_encode($result5->getString());
        echo '<img src="data:image/png;base64,' . $imageData . '" id="qr"/>';

        // Inserting data into the database
        date_default_timezone_set('Asia/Dhaka');
        $stuid = $row['uniqid'];
        $pdate = date('Y-m-d');
        $ptime = date('H:i:sa');

        /*
        $sql = "INSERT INTO cardprintstatus(stuid,date,time) VALUES ('$stuid','$pdate','$ptime') ";
        mysqli_query($link, $sql);
        */
        ?>

    </div>
		<?php  } ?>
<?php } ?>
		
		</div>

		
		
		
		
		
		
		
	
	</div>
	
<?php 
} //ending form
?>
</body>
</html>