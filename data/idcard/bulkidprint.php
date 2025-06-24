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
$classnumber=$_REQUEST['classnumber'];
$secgroup=$_REQUEST['secgroup'];
$studentsroll=$_POST['studentsroll'];

require "../../interdb.php";

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>ID Card</title>
    <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
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
.main_part {
    background: url("../idcard/idf.png?<?php echo time(); ?>");
    height: 1054px;
    width: 685px;
}
    
    #student_photo{
    height: 250px;
    margin-left: 370px;
    margin-top: -125px;
    border: 5px solid green;
}
    
    
    #classnumber{
    padding-top: 478px;
    padding-left: 128px;
    font-size: 35px;
    }
    
    
    #sec{
    padding-top: 0px;
    padding-left: 265px;
    font-size: 56px;
    color: black;
    font-family: SutonnyOMJ;
    
    }
    
    #roll{
    padding-top: 10px;
    padding-left: 104px;
    font-size: 30px;
    color: black;
    margin-top: -7px;
   
    }
    #ID_image{
       height: 220px;
    margin-left: 420px;
    margin-top: 370px;
    }
    
    #qr{
height: 230px;
    width: 230px;
    margin-top: -65px;
    margin-left: 405px;
}
    </style>
</head>
<body>
    <div class="wraper">
        <?php
        
        
       $rolln=explode(",", $studentsroll);
    for ($i = 0; $i < count($rolln); $i++) {
        $newroll =$rolln[$i];

        $rclassnumber;
       
        $sel_query = "SELECT * FROM student WHERE classnumber = '$classnumber' AND secgroup='$secgroup' AND roll='$newroll' ORDER BY secgroup ASC, roll ASC;";

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
        

        <h1 id="name" style="
            padding-left: 100px;
    font-size: 50px;
    color: black;
    padding-top: 433px;
            ">
                    <?php
                   echo    $row['classnumber'];
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
    padding-left: 105px;
    font-size: 40px;
    color: black;
    ">
            <?php
           echo  $name = $row['name'];
            ?>
        </h1>
        
        <h1 id="name" style="
         padding-left: 105px;
    font-size: 25px;
    color: black;
   
    ">FATHER'S NAME:
            <?php
           echo  $name = $row['fname'];
            ?>
        </h1>
        
        <h1 id="name" style="
              padding-left: 105px;
    font-size: 25px;
    color: black;
  
    ">MOTHER'S NAME:
            <?php
           echo  $name = $row['mname'];
            ?>
        </h1>
        
        <h1 id="name" style="
              
    padding-left: 105px;
    font-size: 30px;
    color: black;
    ">Section:
            <?php
           echo  $name = $row['secgroup'];
            ?>
        </h1>
        
        <h1 id="name" style="
             
    padding-left: 105px;
    font-size: 30px;
    color: black;
    ">SESSION:2025
        </h1>
        
        
        <h1 id="roll">ROLL:
            <?php
            $roll = $row['roll'];
            echo $roll;
            ?>
        </h1>
        
       
       

        <?php
        $stuid = $row['id'];
        $text = "https://zpsc.edu.bd/mysoft/2025/payment_process_qr.php?stuid=" . $stuid;

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

      
        $sql = "INSERT INTO cardprintstatus(stuid,date,time) VALUES ('$stuid','$pdate','$ptime') ";
        mysqli_query($link, $sql);
     
        ?>

    </div>
<?php endif; ?>

<?php $count++; } ?>
<?php  } ?>
        </div>
    </div>
</body>
</html>