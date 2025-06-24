<?php
date_default_timezone_set('Asia/Dhaka');
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
					<img src="../img/lego.png" alt="" style="height: 100px;
    margin-left: 20px;
    margin-top: -15px;">
					<center><h2 style="margin-top:-140px; font-size:30px;">
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
					<center><span id="cash">Cash Receipt</span></center>
					
					<table>

					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<b><h3  style="margin-left:20px; font-size:20px;margin-top:-20px;">Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
						
							<th style="width:300px;">Description</th>
							<th style="width:50px;">Total</th>
							<th style="width:50px;">Pay</th>
						</tr>
<?php
for ($i = 0; $i < count($iid); $i++) {
    $idn = $iid[$i];
    $count = 1;
    $sel_query = "SELECT * FROM studentpayment WHERE id = $idn;";
    $result = mysqli_query($link, $sel_query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Your HTML table row here
    ?>
        
        <?php
        // Update the row in the database (example)
        $total=$row['total'];
        $due = '0'; 
       	

       	$running_due=$row['due'];
       	$puniid=$row['puniid'];
        // Update query
        $update_query = "UPDATE studentpayment SET totalpay = '$total', due = '$due',status='Paid' WHERE id = $idn;";
        
        // Execute the update query
        mysqli_query($link, $update_query);

        // Check if running_due is not 0
if ($running_due != '0') {
    $date = $_POST['pay_date'];
    $date=date("Y-m-d", strtotime($date));
    $sql = "INSERT INTO invoicetrx(iid, amount, date) VALUES ('$puniid', '$running_due', '$date')";

    // Execute the insert query
    if (mysqli_query($link, $sql)) {
        echo "";
    } else {
        echo "<h3 style='color:red;'>Error: Unable to insert invoice transaction.</h3>";
    }
}

        $count1++;
    }
}//ending Payment Loop

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
					<h3 style="margin-left:20px;">In Total: <?php echo $totalamount;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Total Pay: <?php echo $totalpay;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Due Amount: <?php echo $totaldue;?> Tk Only</h3>
					<center>

						<?php
						require '../sms.php';
						$text="Dear ".$row1['name']." Your Total Payment ".$totalpay." is received successfully. Your Due amount is ".$totaldue." Thanks by ".$short_code." PW by Black Code IT";
						$mobile=$row1['mobile'];
									// Send SMS to each student
			        if (sendSMS($mobile, $text)) {
			           
			        } else {
			            echo "<p style='color:red;'>SMS failed for </p>";
			        }

						?>
					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    $data=$iid_string;
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
 echo "<br>";  
$text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
echo "<br><center>";
echo $text;
echo "</center>";
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
				
			</div><!--Ending Single part Left Side-->
<div class="leftpart">
				<div class="invoice_border">
					<center><h3>College Copy</h3></center>
					<img src="../img/lego.png" alt="" style="height: 100px;
    margin-left: 20px;
    margin-top: -15px;">
					<center><h2 style="margin-top:-140px; font-size:30px;">
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
					<center><span id="cash">Cash Receipt</span></center>
					
					<table>

					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<b><h3  style="margin-left:20px; font-size:20px;margin-top:-20px;">Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
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
					<h3 style="margin-left:20px;">In Total: <?php echo $totalamount;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Total Pay: <?php echo $totalpay;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Due Amount: <?php echo $totaldue;?> Tk Only</h3>
					<center>
					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    $data=$iid_string;
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
 echo "<br>";  
$text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
echo "<br><center>";
echo $text;
echo "</center>";
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
				
			</div><!--Ending Single part Left Side-->

<!--Start Single part Right Side-->
			<div class="leftpart">
				<div class="invoice_border">
					<center><h3>Bank Copy</h3></center>
					<img src="../img/lego.png" alt="" style="height: 100px;
    margin-left: 20px;
    margin-top: -15px;">
					<center><h2 style="margin-top:-140px; font-size:30px;">
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
					<center><span id="cash">Cash Receipt</span></center>
					
					<table>

					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<b><h3  style="margin-left:20px; font-size:20px;margin-top:-20px;">Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
						
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
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
					<h3 style="margin-left:20px;">In Total: <?php echo $totalamount;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Total Pay: <?php echo $totalpay;?> Tk Only</h3>
					<h3 style="margin-left:20px;">Due Amount: <?php echo $totaldue;?> Tk Only</h3>
					<center>
					    
					    
<?php
	require '../barcode/vendor/autoload.php';
	$iid_string = implode(',', $iid);

    $data=$iid_string;
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 0px">';
  
 echo "<br>";  
$text = $iid_string;

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
echo "<br><center>";
echo $text;
echo "</center>";
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
