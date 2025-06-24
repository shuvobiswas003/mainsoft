<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Seatplan</title>
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
			height: 180px;
			border: 1px solid;
			margin-top: 10px;
			margin-left: 11px;
			border: 2px solid black;
			border-radius: 10px;
			background-size: 344px 240px;
		}
		.plain_part h1{
			font-size: 20px;
		}
		.plain_part h3{
			font-size: 18px;
		}
		
		.plan_top_left{
		float:left;
		width:60%;
		height:auto;
		margin-top: 7px;
		}
		.plan_top_right{
			float: right;
		    width: 40%;
		    height: auto;
		    margin-top: -25px;
		}
		
		.plan_top_right img{
			width: 80px;
			height: 80px;
			margin-top: -1px;
			margin-left: 38px;
			border: 1px solid;
			border-radius: 50%;
		}
		.plan_top_left>h2{
			font-size: 15px;
			margin-left: 15px;
			line-height: 21px;
			margin-top: -3px;
		}
		#roll{
			width:100px;
			height:10px;
			background:#fff;
		}
		.box h2{
			font-size: 17px;
			margin-top: 15px;
			margin-left: 15px;
			margin-top: -4px;
		}
	</style>
</head>
<body>
	<div class="wraper">
		<div class="main_part">
			<?php
			$examid=$_REQUEST['examid'];
        	$classnumber=$_REQUEST['classnumber'];
        	$secgroupname=$_REQUEST['secgroupname'];
        	
			require "../interdb.php";
			$count=1;
			$sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
			$result = mysqli_query($link,$sel_query);
			while($row = mysqli_fetch_assoc($result)) {
			?>
			<div class="plain_part">
				<center><h1>
					
				<?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
				</h1></center>
			<center><h3>
				<?php
                $count2=1;
                $sel_query2="Select * from exam where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>
			</h3></center>

			<div class="plan_top" style="font-weight: 600">
				<div class="box"><h2><font style="font-weight:600;">Name:</font><?php echo $row['name'];?></h2></div>
					<div class="plan_top_left">
					<h2><font style="font-weight:600;">Class: </font><?php echo $row['classnumber'];?></h2>
					<h2><font style="font-weight:600;">Sec/Group: </font><?php echo $row['secgroup'];?></h2> <br />
					<h2 id="roll"><font style="font-weight: 600;
    font-size: 45px;">Roll:<?php echo $row['roll'];?></font></h2>
					
					
					</div>
					<div class="plan_top_right">
					    <!--Img Start-->
			<?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg">
            <?php
            }else{
            ?>
            <img src="../img/student/<?php echo $row['imgname'];?>">

            <?php
            }
            ?>
            <!--Img End-->
					</div>
				</div>
			</div>

			<?php $count++; } ?>
			
		</div>
	</div>
</body>
</html>