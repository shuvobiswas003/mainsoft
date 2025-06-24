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

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}

require "../../interdb.php";
?>
<!DOCTYPE HTML>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ID Card - Vertical</title>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .a4-page {
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
        padding: 0mm; /* Increased padding to better fit the content */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        font-family: 'SutonnyOMJ', sans-serif; /* Updated Bangla font */
        page-break-after: always; /* Ensure each A4 page is separate */
    }

    .id-card {
        width: 58mm;
        height: 90mm;
        padding: 3mm; /* Padding for the safety area */
        margin: 2mm; /* Adjust margin for space between cards */
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: 1px solid black; /* 1px border */
        background-color: #d0f1ff; /* Light background */
        page-break-inside: avoid; /* Prevents card breaking across pages */
    }

    .id-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2mm; /* Reduced gap */
    }

    .left-part {
        width: 30%;
    }

    .right-part {
        width: 70%;
        text-align: left;
        font-size: 16px; /* Increased font size */
        font-weight: bold;
        line-height: 1.2;
        color: black; /* Set text color to black */
    }

    .id-body {
        font-size: 16px;
        text-align: center;
    }

    #student_photo {
        height: 110px;
        width: 90px;
        margin: 0 auto;
        border-radius: 5px;
        border: 1px solid #000;
    }

    .qr-code {
        height: 50px;
        width: 50px;
        display: block;
        float: right;
        margin-top: -8px;
        margin-right: 12px;
    }

    .label {
        font-size: 16px;
        font-weight: bold;
        color: black;
    }

    .info {
        font-size: 16px;
        margin-bottom: 3px;
        text-align: left;
        font-weight: bold;
        color: black;
    }

    .info-text {
        font-weight: bold;
        color: black;
        font-family: 'SutonnyOMJ', sans-serif;
    }

    .logo {
        width: 50px;
        height: 50px;
    }

    .identity-text {
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: red;
        margin-bottom: 2mm;
        margin-top: -18px;
    }

    .signature {
        position: absolute;
        bottom: 25px;
        left: 15px;
        width: 50px;
        height: 30px;
    }

    .principal-title {
        position: absolute;
        bottom: 5px;
        left: 15px;
        font-size: 16px;
        font-weight: bold;
        color: black;
        font-family: 'SutonnyOMJ', sans-serif;
        text-align: center;
    }

    /* Ensure the page does not break within a card */
    .id-card {
        page-break-inside: avoid;
    }
    </style>
</head>
<body>
    <div class="a4-page">
        <?php
        require "../../interdb.php";
        // Fetch students from class 11 and Science group
        $sel_query = "SELECT * FROM student WHERE classnumber='11' AND secgroup='Humanities' AND roll<300";
        $result = mysqli_query($link, $sel_query);
        $count = 0; // Counter for tracking how many cards are on the page
        while ($row = mysqli_fetch_assoc($result)) {
            if ($count > 0 && $count % 9 == 0) {
                echo '</div><div class="a4-page">'; // Start a new page after 9 cards
            }
            $name = $row['name']; 
            $mobile = $row['mobile'];
            $roll = $row['roll'];
            $img_name = $row['imgname'];
            $imgdir = "../../img/student/" . $img_name;
        ?>
        
        <div class="id-card">

            <div class="id-header">
                <div class="left-part">
                    <img src="../../img/bdlego.png" class="logo" alt="College Logo">
                </div>

                <div class="right-part">
                    <div style="font-size: 18px;">সরকারি নজরুল কলেজ</div>
                    <div>সাতপাড়, গোপালগঞ্জ</div>
                </div>
            </div>

            <div class="identity-text">পরিচয় পত্র</div>

            <div class="id-body">
                <?php if (file_exists($imgdir)): ?>
                    <img src="../../img/student/<?php echo $row['imgname']; ?>?<?php echo time(); ?>" id="student_photo">
                <?php endif; ?>

                <div class="info"><span class="label">নাম:</span> <?php echo $name; ?></div>
                <div class="info"><span class="label">রোল নং:</span> <span style="font-family: SutonnyMJ"><?php echo $roll; ?></span> শিক্ষাবর্ষ: ২০২৪-২৫</div>
                <div class="info">শ্রেণি: ১১-১২ | বিভাগ: মানবিক</div>
                <div class="info"><span class="label">মোবাইল:</span> <span style="font-family: SutonnyMJ"><?php echo $mobile; ?></span></div>

                <?php
                $stuid = $row['uniqid'];
                $text = "https://www.govtnazrulcollege.edu.bd/student_corner_auto?stuid=" . $stuid;

                $qr_code = QrCode::create($text);
                $writer = new PngWriter;
                $result5 = $writer->write($qr_code);
                $imageData = base64_encode($result5->getString());
                ?>
                <img src="../../img/hmsign.png" class="signature" alt="Principal Signature">
                <img src="data:image/png;base64,<?php echo $imageData; ?>" class="qr-code" />
                <div class="principal-title">অধ্যক্ষ</div>

            </div>
        </div>
        <?php $count++; } ?>
    </div>
</body>
</html>
