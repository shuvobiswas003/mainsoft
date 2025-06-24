<?php
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
	<title>Invoice</title>
	
	<style type="text/css">
	.container{
		width:1220px;
		margin:0 auto;
	}
	.leftpart{
		float:left;
		width:50%;
	}
	.rightpart{
		flaot:right;
		width:50%;
		margin-left:620px;
	}
		.invoice_border{
			border:3px solid black;
			height:850px;
 		}
		#cash{
			padding:10px 20px 10px 20px;
			border: 2px solid Black;
			border-radius:10px;
			font-size:20px;
			font-wight:600;
		}
		#qr {
            width: 100px;
            height: 100px;
        }
	
	</style>
</head>
<body>
	<?php
	$id=$_REQUEST['id'];
	$stuid=$_REQUEST['stuid'];
	?>
	<div class="container">
		<div class="leftpart">
				<div class="invoice_border">
					<center><h5>School/College Copy</h5></center>
					<center><h2 style="margin-top:-10px; font-size:30px;">
				<?php
				require "../interdb.php";
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
					</h2></center>
					<center><span id="cash">Cash Receipt</span></center>
					
					<table>
					<?php
					$count=1;
					$sel_query="Select * from studentpayment where id=$id;";
					$result = mysqli_query($link,$sel_query);
					while($row = mysqli_fetch_assoc($result)) {

					//getting Student data
					$count1=1;
					$sel_query1="Select * from student where uniqid='$stuid';";
					$result1 = mysqli_query($link,$sel_query1);
					while($row1 = mysqli_fetch_assoc($result1)) {

					?>
					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<td>
					<td><b><h3>Print Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
						</tr>
						<tr>
							<td style="min-height:200px;"><?php echo $row['des'];?></td>
							<td><?php echo $row['total'];?></td>
							<td><?php echo $row['totalpay'];?></td>
						</tr>
					</table>
					<center>
                    <h3>Payment Information</h3>
                    </center>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Date</th>
							<th style="width:100px;">Method</th>
							<th style="width:100px;">Amount</th>
							<th style="width:100px;">Due Balance</th>
						</tr>
						<?php
					$iid=$row['puniid'];
					$count3=1;
					$prevamount=0;
					$sel_query3="Select * from invoicetrx where iid='$iid';";
                    $result3 = mysqli_query($link,$sel_query3);

                    while($row3 = mysqli_fetch_assoc($result3)) {
                 
						?>
						<tr>
							<td style="height:20px;"><?php echo $row3['date'];?></td>
							<td>
								<?php echo isset($row3['method']) ? $row3['method'] : 'Cash/Offline'; ?>
							</td>		
							<td><?php echo $row3['amount'];?></td>
							<td><?php
								$totalamount=$row['total'];
								$amount=$row3['amount']+$prevamount;
								$prevamount=$amount;
								$duebal=$totalamount-$amount;
								echo $duebal;
							?></td>
						</tr>
					<?php $count3++; } ?>
					</table>


					<h3 style="margin-left:20px;">In Total: <?php echo $row['totalpay'];?> Tk Only</h3>
					<h3 style="margin-left:20px;">Due Amount: <?php echo $row['due'];?> Tk Only</h3>
					<center>
					<table style="width:650px; text-align:center; margin-left:-20px;margin-top: -12px;">
						<tr>
							<td>
								<span style="border-top:1px solid black; text-align:center">Student Sign</span>
							</td>
							
							<td width="200px">
							<span style="margin-top: -10px">
							<center>
							<?php
							
							$data=$row['puniid'];
							
		                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		                    

		                    $qr_code = QrCode::create($data);
		                    $writer = new PngWriter();
		                    $result5 = $writer->write($qr_code);
		                    $imageData = base64_encode($result5->getString());
		                    echo '<img src="data:image/png;base64,' . $imageData . '" id="qr"/>';
		                    echo "<br><center>" . $data . "</center>";
							?>
							</center>
							</span>
							</td>
							<td><span style="border-top:1px solid black; text-align:center">Cash Receiver  Sign</span></td>
						</tr>
			<?php $count1++; } ?>
			<?php $count++; } ?>
			</table>
			</center>
			</div>
		</div>

		<div class="rightpart">
				<div class="invoice_border">
					<center><h5>Student Copy</h5></center>
					<center><h2 style="margin-top:-10px; font-size:30px;">
				<?php
				require "../interdb.php";
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
					</h2></center>
					<center><span id="cash">Cash Receipt</span></center>
					
					<table>
					<?php
					$count=1;
					$sel_query="Select * from studentpayment where id=$id;";
					$result = mysqli_query($link,$sel_query);
					while($row = mysqli_fetch_assoc($result)) {

					//getting Student data
					$count1=1;
					$sel_query1="Select * from student where uniqid='$stuid';";
					$result1 = mysqli_query($link,$sel_query1);
					while($row1 = mysqli_fetch_assoc($result1)) {

					?>
					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<td>
					<td><b><h3>Print Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
						</tr>
						<tr>
							<td style="min-height:200px;"><?php echo $row['des'];?></td>
							<td><?php echo $row['total'];?></td>
							<td><?php echo $row['totalpay'];?></td>
						</tr>
					</table>
					<center>
                    <h3>Payment Information</h3>
                    </center>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Date</th>
							<th style="width:100px;">Method</th>
							<th style="width:100px;">Amount</th>
							<th style="width:100px;">Due Balance</th>
						</tr>
						<?php
					$iid=$row['puniid'];
					$count3=1;
					$prevamount=0;
					$sel_query3="Select * from invoicetrx where iid='$iid';";
                    $result3 = mysqli_query($link,$sel_query3);

                    while($row3 = mysqli_fetch_assoc($result3)) {
                 
						?>
						<tr>
							<td style="height:20px;"><?php echo $row3['date'];?></td>
							<td>
								<?php echo isset($row3['method']) ? $row3['method'] : 'Cash/Offline'; ?>
							</td>		
							<td><?php echo $row3['amount'];?></td>
							<td><?php
								$totalamount=$row['total'];
								$amount=$row3['amount']+$prevamount;
								$prevamount=$amount;
								$duebal=$totalamount-$amount;
								echo $duebal;
							?></td>
						</tr>
					<?php $count3++; } ?>
					</table>

					<h3 style="margin-left:20px;">In Total: <?php echo $row['totalpay'];?> Tk Only</h3>
					<h3 style="margin-left:20px;">Due Amount: <?php echo $row['due'];?> Tk Only</h3>
					<center>
					<table style="width:650px; text-align:center; margin-left:-20px;margin-top: -12px;">
						<tr>
							<td>
								<span style="border-top:1px solid black; text-align:center">Student Sign</span>
							</td>
							
							<td width="200px">
							<span style="margin-top: -10px">
							<center>
							<?php
							
							$data=$row['puniid'];
							$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		                
		                    $qr_code = QrCode::create($data);
		                    $writer = new PngWriter();
		                    $result5 = $writer->write($qr_code);
		                    $imageData = base64_encode($result5->getString());
		                    echo '<img src="data:image/png;base64,' . $imageData . '" id="qr"/>';
		                    echo "<br><center>" . $data . "</center>";
							?>
							</center>
							</span>
							</td>
							<td><span style="border-top:1px solid black; text-align:center">Cash Receiver  Sign</span></td>
						</tr>
			<?php $count1++; } ?>
			<?php $count++; } ?>
			</table>
			</center>
			</div>
		</div>


			
	</div>
	
</body>
</html>
