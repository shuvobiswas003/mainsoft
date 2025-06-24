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
	$paycat=$_REQUEST['paycat'];
	$classnumber=$_REQUEST['classnumber'];
	$secgroupname=$_REQUEST['secgroupname'];
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
			<h2>Payment Heading:
			<?php
            $payhead;
                $count2=1;
                $sel_query2="Select * from paycat where id='$paycat' ";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['pcatname']?>
            <?php $payhead= $row2['pcatname']?>
            <?php $count2++; } ?>
			</h2>
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
        <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>StuID</th>
                        <th>Name</th>
                        <th>Invoice Date</th>
                        <th>Description</th>
                        <th>Total</th>
                        <th>Pay</th>
                        <th>Due</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
<?php
$count=1;
$sel_query="Select * from studentpayment where pcatid='$paycat' AND classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER BY roll ASC;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row["stuid"]; ?></td>
                <td><?php echo $row["stuname"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["des"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
                <td><?php echo $row["totalpay"]; ?></td>
                <td>
                <span style="color: red;"><?php 
                $total=$row['total'];
                $totalpay=$row['totalpay'];
                $due=$total-$totalpay;
                echo $due;
                ?>
                </span>
                </td>
                <th>
<?php $status= $row['status'];
if($status=="Unpaid"){
    echo "<span style='color:red;'>Unpaid</span>";
}else{
    echo "<span style='color:green;'>Paid</span>";
}
?>
                </th>
                
            </tr>
        <?php $count++; } ?>
</tbody>
</table>    
            
	   
        
        </div>
        </div>

</body>
</html>