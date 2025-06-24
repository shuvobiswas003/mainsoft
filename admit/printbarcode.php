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
	<title>Admit</title>
	<style type="text/css">
	*{
	margin:0;
	padding:0;
	}
.clear{
	clear: both;
}
	.wraper{
	width:795px;
	margin: 0 auto;
	}
	.main_part{
	background:url(../images/image.jpg);
	height: 543px;
	background-size: 795px 543px;
	}
	.main_part h1{
	color: #100101;
    font-size: 40px;
    padding-top: 53px;
	padding-bottom:5px;
	}
	.main_part h2{
	padding-left: 68px;
    color: #100f0f;
    padding-top: 6px;
	font-size:15px;
	}
	.main_part h3{
	color:#100101;
	font-size: 26px;
	margin-top: -12px;
	}
	.main_left{
	float:left;
	}
	.main_left h4{
	padding-left: 68px;
    color: black;
    font-size: 12px;
    line-height: 25px;
	
	}
	.main_right{
	float:right;
	}
	.main_right img{
	width: 90px;
    height: 90px;
    padding-right: 70px;
    padding-bottom: 4px;
	}
	
	#roll{
	width: 90px;
    height: 25px;
    border: 2px solid black;
    border-radius: 23px;
    line-height: 28px;
    margin-bottom: 23px;
	}

	.tablepart{
		width:780px;
		margin: 0 auto;
		min-height: 210px;
	}
	.tableleft{
		width: 350px;
		float: left;
		margin-top: 10px;
		height: 170px;
		margin-left: 44px;
	}
	.tableright{
		width: 350px;
		float: left;
		margin-top: -12px;
		height: 170px;
		margin-left: -5px;
	}

.tableright table{
  font-family: arial, sans-serif;
  border-collapse:collapse ;
  width: 340px;
  
	}

.tableleft table{
  font-family: arial, sans-serif;
  border-collapse:collapse ;
  width: 343px;
	}
th{
	font-size: 12px;
}
td{
	font-size: 12px;
    text-align: center;
}
tr{
width:auto;
height:21px;
}
tr:nth-child(odd) {
  background-color: #dddddd;
}
.footer_part{
	width:705px;
	margin: 0 auto;
}
.footerpart_left{
	height: 100px;
	width:10px;
	float:left;
}
.footerpart_middle{
	height: 100px;
	width:235px;
	float:left;
}
.footerpart_right{
	height: 100px;
	width:235px;
	float:right;
}

	</style>
</head>
<body>
	<div class="wraper">
			<?php
			$startsl=1001;
			$endsl=1050;
			for( $i=$startsl; $i<=$endsl; $i++ )
			{
			?>
	
		<div class="main_part">
			<!--School name And Info-->
			<center><h1>
				<?php
				require "interdb.php";
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolnameb']?>

            <?php $count2++; } ?>

			</h1></center>

			<!--Exam Name-->
			<center><h3>
				<?php
                $count2=1;
                $sel_query2="Select * from exam where exid='1'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>

			</h3></center>


			<center><h3>Answer Paper</h3></center>
			<br>
			<br>
			<br><br>
		
				<div style='text-align: center;'>
				  <!-- insert your custom barcode setting your data in the GET parameter "data" -->
				  <img alt='Barcode Generator TEC-IT'
				       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $i;?>&code=Code128&translate-esc=on'/>
				</div>

		</div>
	<?php }?>

</div>

		
		
		
		
		
		
		
</body>
</html>