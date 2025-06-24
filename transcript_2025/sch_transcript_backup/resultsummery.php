<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
	<style>
		.toppage{
			height:1086px;
			border: 5px solid black;
			margin-top: 10px;
		}
		
	</style>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
$examid=$_REQUEST['examid'];
?>

<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<center>
				<div class="toppage">
					<h1 style="font-size: 90px;">Result Summery</h1>
					<br>
					<br>
					<br>
					<h1 style="font-size:75px;">OF</h1>
					<br><br>
				<br>
					<img id="img"src="../img/lego.png" alt="School Lego" width="100px" height="100px" />
				
				
				<h1 style="font-size:60px;">
				<?php
				require "../interdb.php";
				$count2=1;
				$sel_query2="Select * from schoolinfo";
				$result2 = mysqli_query($link,$sel_query2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				?>
				<?php echo $row2['schoolname']?>

				<?php $count2++; } ?>
				</h1>
				<br><br><br>

				<h1 style="font-size:75px;font-weight: 700;">
					
					<?php
					$count2=1;
					$sel_query2="Select * from exam where exid='$examid'";
					$result2 = mysqli_query($link,$sel_query2);
					while($row2 = mysqli_fetch_assoc($result2)) {
					?>
					<?php echo $row2['examname']?> Year: <?php echo $row2['year']?> 

					<?php $count2++; } ?>

				</h1>
				
				
			</div>
		</center>
		</div>
	</div>	
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<center>
				<h1 style="font-size:55px;font-weight: 700;">Class Wise Report</h1>
			<?php
				require "../interdb.php";
				$count2=1;
				$sel_query2="Select * from class order by classnumber";
				$result2 = mysqli_query($link,$sel_query2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				?>
				
				<h3 style="font-size:40px;font-weight: 400;"><?php echo $row2['classname'];?></h3>
				
				<h3><b>Total Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</b>
				</h3>

				<h3 style="color:green">
				Number OF Passed Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND status='Pass' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</h3>
				<h3 style="color:red">
				Number OF Failed Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND status='Fail' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</h3>
				<?php $count2++; } ?>
				
		
		</center>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<center>
				<h1 style="font-size:40px;font-weight: 700;">Class Based (Gender Wise) Report</h1>
			<?php
				require "../interdb.php";
				$count2=1;
				$sel_query2="Select * from class order by classnumber";
				$result2 = mysqli_query($link,$sel_query2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				?>
				
				<h3 style="font-size:30px;font-weight:800;"><?php echo $row2['classname'];?></h3>
				
				<h3><b>Total Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</b>
				</h3>

				<h3>
				<b>
				Number OF Male Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Male' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</b>
				<br>
				<span style="color:green;">
				Number Of Passed(Male):
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Male' AND status='Pass'order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</span>
				<br>
				<span style="color:red;">
				Number Of Failed(Male):
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Male' AND status='Fail'order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</span>
				</h3>

				<h3>
				<b>
				Number OF Female Student:
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Female' order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</b>
				<br>
				<span style="color:green;">
				Number Of Passed(Female):
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Female' AND status='Pass'order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</span>
				<br>
				<span style="color:red;">
				Number Of Failed(Female):
				<?php 
				$classnumber=$row2['classnumber'];
				$sel_query3="Select count(uniqid) from meritlist where classnumber='$classnumber' AND examid='$examid' AND sex='Female' AND status='Fail'order by classnumber";
				$result3 = mysqli_query($link,$sel_query3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					echo $row3['count(uniqid)'];
				}
				?>
				</span>
				</h3>
				<?php $count2++; } ?>
				
		
		</center>
		</div>
	</div>
</div>



</body>
</html>