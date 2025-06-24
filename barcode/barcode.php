<?php
require 'vendor/autoload.php';
$redColor = [255, 0, 0];

// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128,2,50);
echo "<br>";
echo "<br>";
echo $generator->getBarcode('6A10', $generator::TYPE_CODE_128,1,50);

echo "<br>";
echo "<br>";
echo $generator->getBarcode('6A10', $generator::TYPE_CODE_128,2,50);