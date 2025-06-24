<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Short Info</title>
	<style type="text/css">
		*{
		margin:0 auto;
		padding:0 auto;
		}
		.wraper{
			width:1086px;
			margin:0 auto;
		}
		
		.plain_part{
			float: left;
			width: 344px;
			height: 244px;
			border: 1px solid;
			margin-top: 16px;
			margin-left: 11px;
			background:url(image.jpg);
			background-size: 344px 240px;
		}
		.plain_part h1{
			font-size: 14px;
		}
		.plain_part h3{
			font-size: 18px;
		}
		
		.plan_top_left{
		float:left;
		width:50%;
		height:auto;
		margin-top: 7px;
		}
		.plan_top_right{
			float:right;
			width:50%;
			height:auto;
		}
		.plan_top_right img{
			width: 120px;
			height: 120px;
			margin-top: -1px;
			margin-left: 38px;
			border: 1px solid;
		}
		.plan_top_left>h2{
			font-size: 15px;
			margin-left: 10px;
			line-height: 21px;
			margin-top: -3px;
		}
		
		.box h2{
			font-size: 15px;
			margin-top: 15px;
			
		}
	</style>
</head>
<body>
	<div class="wraper">
		<div class="main_part">
			<?php
			
        	$classnumber=$_REQUEST['classnumber'];
        	
			require "../interdb.php";
			$count=1;
			$sel_query="Select * from student WHERE classnumber='$classnumber' ORDER BY roll;";
			$result = mysqli_query($link,$sel_query);
			while($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="plain_part">
				
			

			<div class="plan_top">
				<div class="box"><h2><font style="font-weight:200;margin-left: 5px;font-size: 20px;">Name:</font><?php echo $row['name'];?></h2></div>
					<div class="plan_top_left">
					<h2><font style="font-weight:200;">F Name: </font><?php echo $row['fname'];?></h2>
					<h2><font style="font-weight:200;">M Name: </font><?php echo $row['mname'];?></h2>
					<h2><font style="font-weight:200;">Gender: </font><?php echo $row['sex'];?></h2>
					<h2 id="roll">
						<font style="font-weight:600;font-size:15px;">Class: <?php echo $row['classnumber'];?></font>
						<font style="font-weight:600;font-size:15px;">Sec/Group: <?php echo $row['secgroup'];?></font>
						<font style="font-weight:600;font-size:15px;">Roll: <?php echo $row['roll'];?></font>
					</h2>
					<h2><font style="font-weight:200;">Mobile: </font><?php echo $row['mobile'];?></h2>
					
					</div>
					<div class="plan_top_right">
						<img src="../img/student/<?php echo $row['imgname'];?>" alt="" />
					</div>
				</div>
			</div>

			<?php $count++; } ?>
			
		</div>
	</div>
</body>
</html>