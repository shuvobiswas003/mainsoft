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
			min-height:1100px;
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
$stuid=$_POST['stuid'];
$iid=$_POST['id'];
$invoice_date=$_POST['invoice_date'];
$paid_amount=$_POST['paid_amount'];

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
			


<!--Start Single part Right Side-->
			<div class="leftpart">
				<div class="invoice_border">
					<center><h5>Student Copy</h5></center>
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

					<tr><td>
					<h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
					<h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
					<td>
					<td><b><h3>Date: <?php echo date('Y-m-d');?></h3></b></td>
					</tr>
					</table>
					<table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
						<tr>
							<th>
							Status
							</th>
							
						</tr>
<?php
$totaldue = 0;
$totalamount = 0;
$totalpay = 0;

for ($i = 0; $i < count($iid); $i++) {
    $idn = $iid[$i];
    $invoice_daten=$invoice_date[$i];
    $trx_date=date("Y-m-d", strtotime($invoice_daten));
    $paid_amountn=$paid_amount[$i];


    $count = 1;
    $sel_query = "SELECT * FROM studentpayment WHERE id = $idn;";
    $result = mysqli_query($link, $sel_query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Your HTML table row here
    ?>
        <tr>
        	<th><h3>Payment Received Successfully</h3></th>
        </tr>
        <?php
        // Update the row in the database (example)
        $total=$row['total'];
        $prev_due=$row['due'];
        $prev_pay=$row['totalpay'];

        $new_due=$prev_due-$paid_amountn;
        $new_total_pay=$prev_pay+$paid_amountn;
        
        $status='';
        if($new_due<=0){
        $status='Paid';
   		 }else{
   		 $status='Unpaid';
   		}
       	
       	$puniid=$row['puniid'];
        // Update query
        $update_query = "UPDATE studentpayment SET totalpay = '$new_total_pay', due = '$new_due',status='$status' WHERE id = $idn;";
        
        // Execute the update query
        mysqli_query($link, $update_query);

        //invoice trxid
    $date = date('Y-m-d');
    $sql ="INSERT INTO invoicetrx(iid,amount,date,method) VALUES ('$puniid','$paid_amountn','$trx_date','Manual')";
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Trxid  Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }

        $count1++;
    }
}
?>
</table>
					
					
				</div>
				<?php $count++; } ?>
			</div><!--Ending Single part Right Side-->
			
	</div>
	
</body>
</html>
