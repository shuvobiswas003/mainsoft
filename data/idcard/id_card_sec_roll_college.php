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
    padding-left: 260px;
    margin-top: 365px;
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
    margin-top: -135px;
    margin-left: 405px;
}
    </style>
</head>
<body>
    <div class="wraper">
        <?php
        
        
        $rclassnumber;
        $count=1;
        $sel_query = "SELECT * 
FROM student 
WHERE classnumber = '11' 
  AND secgroup = 'Humanities' 
  AND roll BETWEEN 401 AND 402 
  AND imgname != 'IMG_0.png'  
ORDER BY roll ASC;";

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
    ">GROUP:
            <?php
           echo  $name = $row['secgroup'];
            ?>
        </h1>
        
        <h1 id="name" style="
             
    padding-left: 105px;
    font-size: 30px;
    color: black;
    ">SESSION:2024-25
        </h1>
        
        
        <h1 id="roll">ROLL:
            <?php
            $roll = $row['roll'];
            echo $roll;
            ?>
        </h1>
        
        <h1 id="name" style="
              
    padding-left: 105px;
    font-size: 30px;
    color: black;
    "><i class="fa fa-mobile"></i>
            <?php
           echo  $name = $row['mobile'];
            ?>
        </h1>

        <h1 id="name" style="
              
    padding-left: 105px;
    font-size: 30px;
    color: red;
    ">Blood:
            <?php
           $stuid=$row['uniqid'];
            $sel_query10 = "SELECT * FROM addmission_ssc_student WHERE stuid = '$stuid';";

        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $row10['blood'];
        }
            ?>
        </h1>

        <?php
        $stuid = $row['uniqid'];
        $text = "https://kazimontucollege.edu.bd/student_corner_auto?stuid=" . $stuid;

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