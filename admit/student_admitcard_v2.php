<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Seatplan</title>
    <style type="text/css">
        *{
        margin:0 auto;
        padding:0 auto;
        }
        .wraper{
            width:1100px;
            margin:0 auto;
        }
        
        .main_part{
            float: left;
                width: 516px;
    height: 270px;
            border: 1px solid;
            margin-top: 10px;
           margin-left: 30px;
            border: 2px solid black;
            border-radius: 10px;
            background-size: 344px 240px;
        }
    .main_part h1{
    color: #000000;
    font-size: 22px;
    padding-bottom: 5px;
    margin-top: -30px;
        }
    .main_part h2{
    padding-left: 50px;
    color: #100f0f;
    padding-top: 6px;
    font-size:15px;
    }
    .main_part h3{
    color: #000000;
    font-size: 18px;
    margin-top: -35px;
    }
    .main_left{
    float:left;
    width: 75%;
    }

    .main_left h4{
    padding-left: 5px;
    color: black;
    font-size: 17px;
    line-height: 25px;
    }
    .main_right{
    float:right;
    width: 25%;
    margin-top: -65px;
    }
    .main_right img{
   width: 90px;
    height: 90px;
    padding-right: 15px;
    margin-left: 18px;
   
    }
    
    #roll{
   width: 107px;
    height: 29px;
    border: 2px solid black;
    border-radius: 23px;
    line-height: 28px;
    margin-bottom: 23px;
    font-size: 24px;
}

    

#qr{
    height: 70px;
    width: 70px;
       margin-top: -20px;
}

#id{
    border: 1px sllid black;
}
#footer_table{
    
    width: 510px;
    margin-top: -45px;
}
    </style>
</head>
<body>
    <div class="wraper">
        <?php
        $examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        
        require "../interdb.php";
        $count=1;
        $sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $classnumber=$row['classnumber'];
            $secgroupname=$row['secgroup'];
            $stuid=$row['uniqid'];
        ?>
        
        <div class="main_part">
            <table>
                <tr>
                    <td><img style="height: 80px;width:80px"src="../img/lego.png?<?php echo time();?>" alt="School Lego" /></td>
                    <td>
                        <center><h1>
                <?php
                $baselink;
                $softlink;
                $headname;
                $deg;
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                $softlink=$row2['softlink'];
                $headname=$row2['headname'];
            ?>
            <?php echo $row2['schoolname']?>
            <?php
            $baselink=$row2['website'];
            $headname=$row2['headname'];
            $deg=$row2['head_deg'];
            ?>

            <?php $count2++; } ?>

            </h1></center>


                    </td>
                </tr>
            </table>
            <!-- Content for main_part div goes here -->
            <!--School name And Info-->
            
            
            <!--Exam Name-->
            <center><h3>
                <?php
                $count2=1;
                $sel_query2="Select * from exam where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>

            </h3></center>


            <center>
                
                    <h3 style="border: 4px solid black;
    width: 125px;
    padding: 5px;
    margin-top: 2px;
    border-radius: 5%;">Admit Card</h3>
                
            </center>


            <div class="main_left">
                <h4>Student's Name: <?php echo strtoupper($row["name"]);?></h4>
                
                <h4>Class:<?php echo $row['classnumber'];?>Section/Group:<?php echo $row["secgroup"];?></h4>
                
            </div>
            <div class="main_right">
                <!--Img Start-->
            <?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg">
            <?php
            }else{
            ?>
            <img src="../img/student/<?php echo $row['imgname'];?>">

            <?php
            }
            ?>
            <!--Img End-->
                <h4 id="roll"><center>Roll: <?php echo $row["roll"];?></center></h4>
                
            </div>
            
        <div class="clear"></div>
        <table id="footer_table">
            <tr>
                <td width="130px">
                    <center>
                <br><br>
                <h5>Class Teacher Sign</h5>
                </center>
                </td>

                <td>
                    <div style='text-align: center;'>
                        <?php
    $classnumber=$row['classnumber'];
    $transdir;
    switch ($classnumber) {
        case '8':
            $transdir="/transcript/pubstutrans8.php";
            break;
        case '9':
            $transdir="/transcript/pubstutrans910.php";
            break;
        case '10':
            $transdir="/transcript/pubstutrans910.php";
            break;
        default:
            $transdir="/transcript/index.php";
            break;
    }
    $text = $softlink.$transdir."?stuid=".$stuid."&examid=".$examid."";

    $qr_code = QrCode::create($text);

    $writer = new PngWriter;
    $result5 = $writer->write($qr_code);

    // Get the base64-encoded image data
    $imageData = base64_encode($result5->getString());
    echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
                        ?>

                    </div>
                </td>

                <td>
                    <center>
                    <img src='../img/hmsign.png' style="width:70px;height:25px;margin-top: -70px;">
                    <br>
    <h4><?php echo $headname;?></h4>
    <h5><?php echo $deg;?></h5>
</center>
                </td>
            </tr>
        </table>    
        </div><!--Main Part END-->
        <?php } ?>
    </div>
</body>
</html>
