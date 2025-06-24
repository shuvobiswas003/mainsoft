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
		width:1600px;
		margin:0 auto;
	}
	.leftpart{
		float:left;
		width:32%;
		margin-left: 10px;
	}
	
		.invoice_border{
			border:3px solid black;
			min-height:1000px;
 		}
		#cash{
			padding:10px 20px 10px 20px;
			border: 2px solid Black;
			border-radius:10px;
			font-size:20px;
			font-wight:600;
		}
		#qr{
		    width:100px;
		    height:100px;
		}
	
	</style>
</head>
<body>
<?php
$stuid=$_POST['stuid'];
$iid=$_POST['id'];


	?>
<?php
require "../interdb.php";
//getting Student data
$count1=1;
$sel_query1="Select * from student where uniqid='$stuid';";
$result1 = mysqli_query($link,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) {

?>
	<div class="container">
<div class="leftpart">
				<div class="invoice_border">
					<center><h3>Student Copy</h3></center>

					<table style="margin-top: -80px;">
						<tr>
							<td>
								<img src="../img/lego.png" alt="" style="height: 100px;margin-left: 20px;margin-top:25px;">
							</td>
							<td>
								<center><h2 style=" font-size:30px;">
								<?php
				                $count2=1;
				                $sel_query2="Select * from schoolinfo";
				                $result2 = mysqli_query($link,$sel_query2);
				                while($row2 = mysqli_fetch_assoc($result2)) {
				            ?>
				            <br>
						    <span style="margin-top: -10px;">
						            <?php echo $row2['schoolname']?>
						     </span>
				            <?php $count2++; } ?>
							</h2></center>
							</td>
						</tr>
					</table>
					
					
					<center><span id="cash">Cash Receipt</span></center>
					
					<table style="margin-left: 25px; margin-top: 20px; border-collapse: collapse; border: 1px solid black;text-align: left;">
					    <tr>
					        <th colspan="3" style="font-size:23px; border: 1px solid black; width: 475px;">
					            Student Name: <?php echo $row1['name'];?>
					        </th>
					    </tr>
					    <tr style="font-size:23px;">
					        <th style="border: 1px solid black;">
					            Class: <?php echo $row1['classnumber'];?>
					        </th>
					        <th style="border: 1px solid black;">
					            Section: <?php echo $row1['secgroup'];?>
					        </th>
					        <th style="border: 1px solid black;">
					        	Roll: <?php echo $row1['roll'];?>
					        </th>
					    </tr>
					    <tr style="font-size:20px;">
					        
					        <th style="border: 1px solid black;" colspan="3">
					             Mobile: <?php echo $row1['mobile'];?>
					      ||
					        	Print Date: <?php echo date('Y-m-d');?>
					        </th>
					    </tr>
					</table>	
					
					<br><br>
					
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
						
							<th style="width:270px;">Description</th>
							<th style="width:100px;">Payment Date</th>
							<th style="width:50px;">Total</th>
							<th style="width:50px;">Pay</th>
						</tr>
<?php
$totaldue=0;
$totalamount=0;
$totalpay=0;
for ($i = 0; $i < count($iid); $i++) {
$idn =$iid[$i];
$count=1;
$sel_query="Select * from studentpayment where id=$idn;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

?>
	<tr>
		

		<td>
		    <?php 
		    $pcatid= $row['pcatid'];
		    $sel_query10="SELECT * FROM paycat WHERE id='$pcatid' ";
        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $lettergrade=$row10['pcatname'];
        }
		    ?>
		 </td>
		 <td>
		 <?php
		    $v_iid = $row['puniid'];
		    $sel_query25 = "SELECT * FROM invoicetrx WHERE iid='$v_iid'";
		    $result25 = mysqli_query($link, $sel_query25);

		    // Initialize an array to store dates
		    $dates = [];

		    while ($row25 = mysqli_fetch_assoc($result25)) {
		        // Add each date to the dates array
		        $dates[] = $row25['date'];
		    }

		    // Join the dates with commas and display
		    echo implode(', ', $dates);
			?>
		 </td>
		<td><?php echo $row['total'];?></td>
		<td><?php echo $row['totalpay'];?></td>

		<?php
		$totaldue=$totaldue+$row['due'];
		$totalamount=$totalamount+$row['total'];
		$totalpay=$totalpay+$row['totalpay'];
		?>
	</tr>
					
<?php 
$count1++; } 
}
?>
</table>


<center>
<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px; font-size: 20px;width: 400px;">
	<caption><b>Payment Summery</b></caption>
	<tr>
		<th>Total</th>
		<th>Paid</th>
		<th>Due</th>
	</tr>
	<tr>
		<th><?php echo $totalamount;?></th>
		<th style="color: green"><?php echo $totalpay;?></th>
		<th style="color: red"><?php echo $totaldue;?></th>
	</tr>
</table>
<br>
</center>	

<center>					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    // $data=$iid_string;
    // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
//  echo "<br>";  
 $text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
?>
						<table style="text-align:center; margin-left:-20px;margin-top: -12px;">
						<tr>
							<td><br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Student Sign</span>
							</td>
							
							<td width="150px">
							
							</td>
							<td>
								<br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Cash Receiver  Sign</span></td>
						</tr>
					</table>
					</center>
				</div>
				
			</div><!--Ending Single part Right Side-->


			<div class="leftpart">
				<div class="invoice_border">
					<center><h3>College Copy</h3></center>

					<table style="margin-top: -80px;">
						<tr>
							<td>
								<img src="../img/lego.png" alt="" style="height: 100px;margin-left: 20px;margin-top:25px;">
							</td>
							<td>
								<center><h2 style=" font-size:30px;">
								<?php
				                $count2=1;
				                $sel_query2="Select * from schoolinfo";
				                $result2 = mysqli_query($link,$sel_query2);
				                while($row2 = mysqli_fetch_assoc($result2)) {
				            ?>
				            <br>
						    <span style="margin-top: -10px;">
						            <?php echo $row2['schoolname']?>
						     </span>
				            <?php $count2++; } ?>
							</h2></center>
							</td>
						</tr>
					</table>
					
					
					<center><span id="cash">Cash Receipt</span></center>
					
					<table style="margin-left: 25px; margin-top: 20px; border-collapse: collapse; border: 1px solid black;text-align: left;">
					    <tr>
					        <th colspan="3" style="font-size:23px; border: 1px solid black; width: 475px;">
					            Student Name: <?php echo $row1['name'];?>
					        </th>
					    </tr>
					    <tr style="font-size:23px;">
					        <th style="border: 1px solid black;">
					            Class: <?php echo $row1['classnumber'];?>
					        </th>
					        <th style="border: 1px solid black;">
					            Section: <?php echo $row1['secgroup'];?>
					        </th>
					        <th style="border: 1px solid black;">
					        	Roll: <?php echo $row1['roll'];?>
					        </th>
					    </tr>
					    <tr style="font-size:20px;">
					        
					        <th style="border: 1px solid black;" colspan="3">
					             Mobile: <?php echo $row1['mobile'];?>
					      ||
					        	Print Date: <?php echo date('Y-m-d');?>
					        </th>
					    </tr>
					</table>	
					
					<br><br>
					
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
						
							<th style="width:270px;">Description</th>
							<th style="width:100px;">Payment Date</th>
							<th style="width:50px;">Total</th>
							<th style="width:50px;">Pay</th>
						</tr>
<?php
$totaldue=0;
$totalamount=0;
$totalpay=0;
for ($i = 0; $i < count($iid); $i++) {
$idn =$iid[$i];
$count=1;
$sel_query="Select * from studentpayment where id=$idn;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

?>
	<tr>
		

		<td>
		    <?php 
		    $pcatid= $row['pcatid'];
		    $sel_query10="SELECT * FROM paycat WHERE id='$pcatid' ";
        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $lettergrade=$row10['pcatname'];
        }
		    ?>
		 </td>
		 <td>
		 <?php
		    $v_iid = $row['puniid'];
		    $sel_query25 = "SELECT * FROM invoicetrx WHERE iid='$v_iid'";
		    $result25 = mysqli_query($link, $sel_query25);

		    // Initialize an array to store dates
		    $dates = [];

		    while ($row25 = mysqli_fetch_assoc($result25)) {
		        // Add each date to the dates array
		        $dates[] = $row25['date'];
		    }

		    // Join the dates with commas and display
		    echo implode(', ', $dates);
			?>
		 </td>
		<td><?php echo $row['total'];?></td>
		<td><?php echo $row['totalpay'];?></td>

		<?php
		$totaldue=$totaldue+$row['due'];
		$totalamount=$totalamount+$row['total'];
		$totalpay=$totalpay+$row['totalpay'];
		?>
	</tr>
					
<?php 
$count1++; } 
}
?>
</table>


<center>
<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px; font-size: 20px;width: 400px;">
	<caption><b>Payment Summery</b></caption>
	<tr>
		<th>Total</th>
		<th>Paid</th>
		<th>Due</th>
	</tr>
	<tr>
		<th><?php echo $totalamount;?></th>
		<th style="color: green"><?php echo $totalpay;?></th>
		<th style="color: red"><?php echo $totaldue;?></th>
	</tr>
</table>
<br>
</center>	

<center>					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    // $data=$iid_string;
    // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
//  echo "<br>";  
// $text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
?>
						<table style="text-align:center; margin-left:-20px;margin-top: -12px;">
						<tr>
							<td><br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Student Sign</span>
							</td>
							
							<td width="150px">
							
							</td>
							<td>
								<br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Cash Receiver  Sign</span></td>
						</tr>
					</table>
					</center>
				</div>
				
			</div><!--Ending Single part Right Side-->


<!--Start Single part Right Side-->
			<div class="leftpart">
				<div class="invoice_border">
					<center><h3>Bank Copy</h3></center>

					<table style="margin-top: -80px;">
						<tr>
							<td>
								<img src="../img/lego.png" alt="" style="height: 100px;margin-left: 20px;margin-top:25px;">
							</td>
							<td>
								<center><h2 style=" font-size:30px;">
								<?php
				                $count2=1;
				                $sel_query2="Select * from schoolinfo";
				                $result2 = mysqli_query($link,$sel_query2);
				                while($row2 = mysqli_fetch_assoc($result2)) {
				            ?>
				            <br>
						    <span style="margin-top: -10px;">
						            <?php echo $row2['schoolname']?>
						     </span>
				            <?php $count2++; } ?>
							</h2></center>
							</td>
						</tr>
					</table>
					
					
					<center><span id="cash">Cash Receipt</span></center>
					
					<table style="margin-left: 25px; margin-top: 20px; border-collapse: collapse; border: 1px solid black;text-align: left;">
					    <tr>
					        <th colspan="3" style="font-size:23px; border: 1px solid black; width: 475px;">
					            Student Name: <?php echo $row1['name'];?>
					        </th>
					    </tr>
					    <tr style="font-size:23px;">
					        <th style="border: 1px solid black;">
					            Class: <?php echo $row1['classnumber'];?>
					        </th>
					        <th style="border: 1px solid black;">
					            Section: <?php echo $row1['secgroup'];?>
					        </th>
					        <th style="border: 1px solid black;">
					        	Roll: <?php echo $row1['roll'];?>
					        </th>
					    </tr>
					    <tr style="font-size:20px;">
					        
					        <th style="border: 1px solid black;" colspan="3">
					             Mobile: <?php echo $row1['mobile'];?>
					      ||
					        	Print Date: <?php echo date('Y-m-d');?>
					        </th>
					    </tr>
					</table>	
					
					<br><br>
					
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
						
							<th style="width:270px;">Description</th>
							<th style="width:100px;">Payment Date</th>
							<th style="width:50px;">Total</th>
							<th style="width:50px;">Pay</th>
						</tr>
<?php
$totaldue=0;
$totalamount=0;
$totalpay=0;
for ($i = 0; $i < count($iid); $i++) {
$idn =$iid[$i];
$count=1;
$sel_query="Select * from studentpayment where id=$idn;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

?>
	<tr>
		

		<td>
		    <?php 
		    $pcatid= $row['pcatid'];
		    $sel_query10="SELECT * FROM paycat WHERE id='$pcatid' ";
        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $lettergrade=$row10['pcatname'];
        }
		    ?>
		 </td>
		 <td>
		 <?php
		    $v_iid = $row['puniid'];
		    $sel_query25 = "SELECT * FROM invoicetrx WHERE iid='$v_iid'";
		    $result25 = mysqli_query($link, $sel_query25);

		    // Initialize an array to store dates
		    $dates = [];

		    while ($row25 = mysqli_fetch_assoc($result25)) {
		        // Add each date to the dates array
		        $dates[] = $row25['date'];
		    }

		    // Join the dates with commas and display
		    echo implode(', ', $dates);
			?>
		 </td>
		<td><?php echo $row['total'];?></td>
		<td><?php echo $row['totalpay'];?></td>

		<?php
		$totaldue=$totaldue+$row['due'];
		$totalamount=$totalamount+$row['total'];
		$totalpay=$totalpay+$row['totalpay'];
		?>
	</tr>
					
<?php 
$count1++; } 
}
?>
</table>


<center>
<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px; font-size: 20px;width: 400px;">
	<caption><b>Payment Summery</b></caption>
	<tr>
		<th>Total</th>
		<th>Paid</th>
		<th>Due</th>
	</tr>
	<tr>
		<th><?php echo $totalamount;?></th>
		<th style="color: green"><?php echo $totalpay;?></th>
		<th style="color: red"><?php echo $totaldue;?></th>
	</tr>
</table>
<br>
</center>	

<center>					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    // $data=$iid_string;
    // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
//  echo "<br>";  
// $text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
?>
						<table style="text-align:center; margin-left:-20px;margin-top: -12px;">
						<tr>
							<td><br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Student Sign</span>
							</td>
							
							<td width="150px">
							
							</td>
							<td>
								<br><br><br>
								<span style="border-top:1px solid black; text-align:center;margin-top: 20px">Cash Receiver  Sign</span></td>
						</tr>
					</table>
					</center>
				</div>
				<?php $count++; } ?>
			</div><!--Ending Single part Right Side-->
			
	</div>
	
</body>
</html>
