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
	
	</style>
</head>
<body>
	<?php
	$classnumber=$_POST['classnumber'];
	$secgroupname=$_POST['secgroupname'];
	$paycat=$_POST['paycat'];
	?>
<?php
require "../interdb.php";
$count=1;
$sel_query="Select * from studentpayment where classnumber='$classnumber' AND secgroupname='$secgroupname' AND pcatid='$paycat';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
$stuid=$row['stuid'];
?>
	<div class="container">
			<div class="leftpart">
				<div class="invoice_border">
					<center><h5>School Copy</h5></center>
					<center><h2 style="margin-top:-10px; font-size:30px;">
				<?php
				
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
					<td><b><h3>Date: <?php echo $row['date'];?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
						</tr>
						<tr>
							<td style="height:330px;"><?php echo $row['des'];?></td>
							<td><?php echo $row['total'];?></td>
							<td><?php echo $row['totalpay'];?></td>
						</tr>
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
							require '../barcode/vendor/autoload.php';
							$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
							$data=$row['puniid'];
							echo $generator->getBarcode($data, $generator::TYPE_CODE_128,1,50);
							echo $data;
							?>
							</center>
							</span>
							</td>
							<td><span style="border-top:1px solid black; text-align:center">Cash Receiver  Sign</span></td>
						</tr>
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

					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<td>
					<td><b><h3>Date: <?php echo $row['date'];?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th style="width:340px;">Description</th>
							<th style="width:100px;">Total</th>
							<th style="width:100px;">Pay</th>
						</tr>
						<tr>
							<td style="height:330px;"><?php echo $row['des'];?></td>
							<td><?php echo $row['total'];?></td>
							<td><?php echo $row['totalpay'];?></td>
						</tr>
					</table>
					<h3 style="margin-left:20px;">In Total Paid: <?php echo $row['totalpay'];?> Tk Only</h3>
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
							require '../barcode/vendor/autoload.php';
							$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
							$data=$row['puniid'];
							echo $generator->getBarcode($data, $generator::TYPE_CODE_128,1,50);
							echo $data;
							?>
							</center>
							</span>
							</td>
							<td><span style="border-top:1px solid black; text-align:center">Cash Receiver  Sign</span></td>
						</tr>
					</table>
					</center>
				</div>
			</div>
			
	</div>
<?php $count1++; } ?>
<?php $count++; } ?>
	
</body>
</html>
