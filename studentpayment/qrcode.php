<?php
// Include the QR code library
require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

$text = "My QR";

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result->getString());

// Display the QR code image in a table cell
echo '<table>';
echo '<tr>';
echo '<td>QR Code:</td>';
echo '<td><img src="data:image/png;base64,'.$imageData.'" /></td>';
echo '</tr>';
echo '</table>';
?>