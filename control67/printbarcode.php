<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $barcode=$_POST['barcode'];
    for ($i=1; $i <5 ; $i++) { 
    require '../barcode/vendor/autoload.php';
    $data=$i;
    echo "<center>";
     echo "<br>";
    echo "<br>";
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,2,100)) . '">';
    echo "<br>";

   

    echo "<br>";
    echo "</center>";
    }

}

?>