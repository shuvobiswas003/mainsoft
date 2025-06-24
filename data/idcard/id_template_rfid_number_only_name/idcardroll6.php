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
$id=$_REQUEST['id'];
require "../../interdb.php";

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ID Card</title>
<style type="text/css">
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
    margin-top: -135px;
}
	
	
	#classnumber{
	padding-top: 478px;
    padding-left: 128px;
    font-size: 35px;
	}
	
	
	#sec{
	padding-top: 12px;
    padding-left: 235px;
    font-size: 56px;
    color: black;
    font-family: SutonnyOMJ;
    
	}
	
	#roll{
padding-top: 0px;
    padding-left: 235px;
    font-size: 52px;
    color: black;
    font-family: SutonnyMJ;
   
	}
	#ID_image{
	   height: 220px;
    margin-left: 420px;
    margin-top: 370px;
	}
	
	#qr{
	height: 230px;
    width: 230px;
    margin-top: -102px;
    margin-left: 390px;
}
	</style>
</head>
<body>
	<div class="wraper">
		<?php
		
		
		$rclassnumber;
		$count=1;
		$sel_query = "SELECT * FROM student WHERE id = '$id' AND imgname != 'IMG_0.png' AND uniqid NOT IN (SELECT stuid FROM rfid) ORDER BY roll ASC;";

		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		    $classnumber=$row['classnumber'];
		    $secgroupname=$row['secgroup'];
		    $roll=$row['roll'];
		    $img_name=$row['imgname'];
		    $imgdir="../../img/student/".$img_name;

		?>
		<?php if (file_exists($imgdir)) : ?>
    <div class="main_part">
        <h1 id="classnumber">
<?php
$classnumber = $row['classnumber'];

switch ($classnumber) {
    case 6:
        echo '৬ষ্ঠ';
        break;
    case 7:
        echo '৭ম';
        break;
    case 8:
        echo '৮ম';
        break;
    case 9:
        echo '৯ম';
        break;
    case 10:
        echo '১০ম';
        break;
    default:
        echo 'Unknown class';
}
?>
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

        <h1 id="name" style="
    padding-top: 5px;
    padding-left: 120px;
    font-size: 50px;
    color: black;
    font-family: SutonnyOMJ;
    ">
            <?php
            $name = $row['nameb'];
            echo $name;
            ?>
        </h1>
        <h1 id="sec">
            <?php
            $section = $row['secgroup'];

            switch ($section) {
            	case 'A':
            		echo "রোজ";
            		break;
            	case 'B':
            		echo "লোটাস";
            		break;
            	case 'C':
            		echo "গ";
            		break;
            }

            ?>
        </h1>
        <h1 id="roll">
            <?php
            $roll = $row['roll'];
            echo $roll;
            ?>
        </h1>

        <?php
        $stuid = $row['uniqid'];
        $text = "https://blackcodeit.net/school/gkuip/public/verstu/student_prof_login.php?stuid=" . $stuid;

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
<?php endif; ?>

		<?php $count++; } ?>
		</div>

		
		
		
		
		
		
		
	
	</div>
</body>
</html>