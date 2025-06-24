<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style type="text/css">
        #seat{
            float: left;
            width: 140px;
        }

        #seat li{
           font-size: 15px;
        }
    </style>
</head>
<body>
	<?php
	$paycat=$_POST['paycat'];
	$classnumber=$_POST['classnumber'];
	$secgroupname=$_POST['secgroupname'];
	require "../../interdb.php";
	?>

	<center>
			<h1>
			<?php
               $count2=1;
               $sel_query2="Select * from schoolinfo";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
			</h1>
            <h1>
                Invoice Summery 
            </h1>
             <h1>
                Class:<?php echo $classnumber;?> & Section: <?php echo $secgroupname;?>
            </h1>
			<h2>Payment Heading:
			<?php
            $payhead;
                $count2=1;
                $sel_query2="Select * from paycat where id='$paycat'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['pcatname']?>
            <?php $payhead= $row2['pcatname']?>
            <?php $count2++; } ?>
			</h2>

            <h4>Payment Description:
            <?php
            $count2=1;
            $sel_query2="SELECT * FROM studentpayment WHERE pcatid='$paycat' AND classnumber='$classnumber' AND secgroupname='$secgroupname' LIMIT 1";
            $result2 = mysqli_query($link,$sel_query2);
            while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['des']?>
            
            <?php $count2++; } ?>
            </h4>
		</center>

<center>
    
<?php
$sel_query="Select sum(total),sum(due),sum(totalpay) from studentpayment where pcatid='$paycat' AND classnumber='$classnumber'AND secgroupname='$secgroupname';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
?>
<h3>Total Amount:<?php echo $row['sum(total)']?></h3>
<h3 style="color: green">Total Paid Amount:<?php echo $row['sum(totalpay)']?></h3>
<h3 style="color: red">Total Due Amount:<?php echo $row['sum(due)']?></h3>
<?php }?>
<?php date_default_timezone_set("Asia/Dhaka");?>
<h3>Print Date: <?php echo date("Y-m-d h:i:sa")?></h3>
</center>




        <div class="row">
            <div class="container">
                
            
	   <table class="table" border="1" style="margin-left: 20px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barcode</th>
                <th>Roll</th>
                <th>Name</th>
                <th>Total</th>
                <th>Payment</th>
                <th>DUE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $count=1;
        $sel_query="SELECT * FROM studentpayment WHERE pcatid='$paycat' AND classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER BY roll ASC";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        
        <tr>
            <td><?php echo $count?></td>
    <td>
    <center>
    <?php
    require '../../barcode/vendor/autoload.php';
    $data=$row['puniid'];
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,60)) . '">';
    echo "<br>";
    echo $data;
    ?>
    </center>
    </td>
    <td>
        <?php echo $row['roll']?>
    </td>
     <td>
        <?php echo $row['stuname']?>
    </td>
        <th><?php echo $row['total']?></th>
        <th><span style="color: green;"><?php echo $row['totalpay']?></span></th>
        <th><span style="color: red;"><?php echo $row['due']?></span></th>
        </tr>
        
        <?php $count++;}?>
        </tbody>
        </table>
        
        </div>
        </div>

</body>
</html>