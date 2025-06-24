<?php
require_once 'barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<br><br>
				<h1>Online QR Code Genarator</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
				    <div class="form-group">
				        <label class="col-md-3 control-label" for="Cust-name">QR Code</label>
				        <div class="col-md-9">
				            <input type="text" id="Cust-name" name="qr_text" class="form-control" placeholder="QR TEXT" required="1">
				        </div>
				    </div>
				    <input type="submit" class="btn btn-primary btn-lg">
				</form>

	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$qr_text= $_POST['qr_text'];
	$qr_code = QrCode::create($qr_text);

    $writer = new PngWriter;
    $result5 = $writer->write($qr_code);

    // Get the base64-encoded image data
    $imageData = base64_encode($result5->getString());
    echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';


	}
	?>
			</div>
		</div>
	</div>
</body>
</html>