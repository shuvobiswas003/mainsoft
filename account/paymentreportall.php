<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <style type="text/css">
    td {
            font-size: 20px; /* Adjust the desired font size */
        }
    </style>
</head>
<body>
	<?php
	$classnumber=$_REQUEST['classnumber'];
	$secgroupname=$_REQUEST['secgroupname'];
	require "../interdb.php";
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
                Invoice Summery(All)
            </h1>
            <h3>
                Class: <?php echo $classnumber?> , Section: <?php echo $secgroupname?>
            </h3>
			
		</center>

<center>
    
<?php
$sel_query="Select sum(total),sum(due),sum(totalpay) from studentpayment where classnumber='$classnumber'AND secgroupname='$secgroupname';";
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




        <table  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
<?php
$count=1;
$sel_query="Select * from paycat ORDER BY id ASC;";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
 ?>
<th>
    <?php echo $row['pcatname'];?>
</th>
<?php $count++; } ?>

                        <th>Total</th>
                        <th>Pay</th>
                        <th>Due</th>
                    </tr>
                </thead>


                <tbody>
<?php
//getting student data

$count4=1;
$sel_query4="Select * from student where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC;";
$result4 = mysqli_query($link,$sel_query4);
while($row4 = mysqli_fetch_assoc($result4)) {


?>
    <tr>
        <td><?php echo $row4["roll"]; ?></td>
        <td><?php echo $row4["name"]; ?></td>
        <?php
//getting paycat data
$count3=1;
$sel_query3="Select * from paycat ORDER BY id ASC;";
$result3 = mysqli_query($link,$sel_query3);
while($row3 = mysqli_fetch_assoc($result3)) {
?>
<td>
<?php
$roll = $row4['roll'];
$paycatid = $row3['id'];
$sel_query = "SELECT * FROM studentpayment WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND roll='$roll' AND pcatid='$paycatid' ORDER BY roll ASC;";
$result = mysqli_query($link, $sel_query);

if (mysqli_num_rows($result) == 0) {
    // No rows were found, so print "0"
    echo "0";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check the value of 'status' and set the font color accordingly
        if ($row['status'] == 'Paid') {
            echo '<span style="color: green;">' . $row['total'] . '</span>';
        } else {
            echo '<span style="color: red;">' . $row['total'] . '</span>';
        }
    }
}

?>
</td>
<?php $count3++; } ?>
<td style="color:black">
    <?php
$sel_query = "SELECT sum(total) FROM studentpayment WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND roll='$roll'  ORDER BY roll ASC;";
$result = mysqli_query($link, $sel_query);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['sum(total)'];
}
    ?>
</td>

<td style="color:green">
    <?php
$sel_query = "SELECT sum(totalpay) FROM studentpayment WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND roll='$roll'  ORDER BY roll ASC;";
$result = mysqli_query($link, $sel_query);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['sum(totalpay)'];
}
    ?>
</td>

<td style="color:red">
    <?php
$sel_query = "SELECT sum(due) FROM studentpayment WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND roll='$roll'  ORDER BY roll ASC;";
$result = mysqli_query($link, $sel_query);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['sum(due)'];
}
    ?>
</td>
        
    </tr>       
<?php $count4++; } ?>
</tbody>
</table>    
            
	   
        
       
</body>
</html>