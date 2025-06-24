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

<!DOCTYPE HTML>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ID Card - Back Side (Black & White with QR Code)</title>
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
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
       
    }

    .id-card-back {
         font-family: 'SutonnyOMJ', sans-serif;
        width: 58mm;
        height: 90mm;
        padding: 3mm;
        margin: 5px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid black;
        background-color: white;
        text-align: center;
    }

    .logo {
        width: 45px;
        height: 45px;
        margin-bottom: 8px;
        filter: grayscale(100%);
    }

    .qr-code {
        height: 45px;
        width: 45px;
        margin-bottom: 8px;
    }

    .return-message {
        font-size: 14px;
        font-weight: bold;
        color: black;
        line-height: 1.3;
    }

    .college-name {
        font-size: 18px;
        font-weight: bold;
        color: black;
        margin-top: 8px;
    }

    .address {
        font-size: 14px;
        font-weight: bold;
        color: black;
        margin-top: 4px;
    }

    .validity {
        font-size: 12px;
        font-weight: bold;
        color: black;
        margin-top: 8px;
        margin-bottom: 5px;
    }
    </style>
</head>
<body>
    
       
        <div class="id-card-back">
            <!-- Validity Date -->
            <div class="validity">মেয়াদ: ৩১ জুলাই ২০২৬</div>

            <!-- College Logo (Black & White) -->
            <img src="../../img/lego.png" class="logo" alt="College Logo">

            <!-- Return Message in Bangla -->
            <div class="return-message">
                <p>এই কার্ডটি অন্য কোনো স্থানে পাওয়া গেলে, অনুগ্রহ করে নিম্নলিখিত ঠিকানায় ফেরত প্রদানের জন্য বিনীত অনুরোধ করা হলো:</p>
            </div>

            <!-- College Name and Address -->
            <div class="college-name">সরকারি নজরুল কলেজ</div>
            <div class="address">সাতপাড়, গোপালগঞ্জ সদর, গোপালগঞ্জ</div>
            <div class="address">মোবাইল: ০১৩০৯১০৯৪৮৪</div>
            <div class="address">ইমেইল: nazrulcollege@gmail.com</div>

            <!-- QR Code -->
            <?php
            // Generate QR Code with college information
            $qr_text = "https://www.govtnazrulcollege.edu.bd/\nGovernment Nazrul College\nAddress: Satpar, Gopalganj Sadar, Gopalganj\nEmail: nazrulcollege@gmail.com";
            $qr_code = QrCode::create($qr_text);
            $writer = new PngWriter;
            $result = $writer->write($qr_code);
            $imageData = base64_encode($result->getString());
            ?>
            <img src="data:image/png;base64,<?php echo $imageData; ?>" class="qr-code" alt="QR Code" />
        </div>
       
    </div>
</body>
</html>
