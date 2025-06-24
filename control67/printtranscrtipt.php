<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}
?>
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
$examid=$_REQUEST['examid'];
?>
<?php
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>transcripct</title>
	<link rel="icon" href="logo-top-1.ico">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		*{
		margin:0 auto;
		padding:0 auto;
		}
		.warper{
			width:725px;
			height:auto;
			border:2px solid black;
			margin-top: 15px
		}
		.header_part{
			height:95px;
		}
		.header_part h1{
			font-size: 39px;
			font-family: Gabriola;
			padding-top: -1px;
		}
		.header_part h2{
			font-size:24px;
			font-family: sans-serif;
			margin-top: -12px;
		}
		.header_part_top{
			height:auto;
		}
		.lego{
			float:left;
			width:auto;
			height:auto;
		}
		.lego img{
			width: 112px;
			height: 108px;
			margin-left: 29px;
			margin-top:35px;
			margin-right: 45px;
		}
	#img{
		width: 80px;
		height: 80px;
		border-radius: 100%;
		border: 2px solid;
		}
	#table{
		width: 223px !important;
		background: #efeeeead;
		margin-left:85px;
		margin-top:54px;
	}
	td{
		text-align:center;
		font-size:15px;
	}
	#th{
		font-size:15px;
		font-weight: 700;
	}
	#alok{
		width: 678px;
		height: 111px;
		float: left;
		margin-left: 29px;
	}
	#ss{
		width:169px;
	}
	#sss{
		width: 92%;
		height: auto;
	    margin-top: 340px;
	}
	#result_table{
		height:60px;
		font-size: 14px;
	}
	.result_table{
		height:26px;
		font-size:21px;
		font-family:BrowalliaUPC;
		font-weight:600;
	}
	#futter_table{
		width: 92%;
		height: 100px;
		margin-top: 7px;
		background: #e0ddddc4;
	}
	.futter_table{
		font-size: 14px;
		font-family: cursive;
	}
	.end_left{
		float: left;
		width: 15%;
		height: auto;
		font-size: 13px;
		margin-left: 29px;
		border-top: 1px solid black;
		margin-top: 58px;
	}
	.barcode{
		float: right;
		width: 39%;
		height: auto;
		margin-right: 28px;
		margin-top: 58px;
	}
	#ss{
		font-size:18px;
	}
	#ada{
	font-size: 29px;
    font-family: Candara;
	}
	#ss1{
	 width: 248px;
    font-size: 18px;
	}
	</style>
	<style type="text/css">
            #markicon{
                width:15px;
                height:15px;
            }
        </style>
</head>
<body>
	<?php
		$stuid="";
		require "../interdb.php";
		$sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		$roll=$row['roll'];
	?>
	<div class="warper">
		<div class="header_part">
		
			<table>
				<tr>
					<td><img id="img"src="../img/lego.png" alt="School Lego" /></td>
	<td>
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
	<h2>একাডেমিক ট্রান্সক্রিপ্ট</h2>
	<h2>
	<?php
        $count2=1;
        $sel_query2="Select * from exam67 where exid='$examid'";
        $result2 = mysqli_query($link,$sel_query2);
        while($row2 = mysqli_fetch_assoc($result2)) {
    ?>
    <?php echo $row2['examname']?>-<?php echo $row2['year']?>
    <?php $count2++; } ?>
	</h2>

					</td>
					<td></td>
				</tr>
			</table>
			
		</div>
		
		<div class="information">
			<br>
			<center>
			<table border="1" cellpadding="0" cellspacing="0" id="alok">
			<tr>
				<td id="ss"> <b>Student's Name</b></td>
				<th id="ss1" colspan="2"><i><?php echo $row["name"]; ?></i></th>
				<td id="ss"><b>Date Of Birth</b></td>
				<th id="ss1" colspan="2"><i><?php echo $row["dob"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Father's Name</b></td>
				<th id="ss1" colspan="2"><i><?php echo $row["fname"]; ?></i></th>
				<td id="ss"><b>Mother's Name</b></td>
				<th id="ss1" colspan="2"><i><?php echo $row["mname"]; ?></i></th>
			</tr>
		
			<tr>
				<td id="ss"><b>Class</b></td>
				<td id="ss1"><b><?php echo $row["classnumber"]; ?></b> </td>
				<td id="ss"><b>Group/Sec:</b></td>
				<td id="ss1"><b><?php echo $row["secgroup"]; ?></b> </td>
				<td id="ss"><b>Roll:</b></td>
				<td id="ss1"><b><?php echo $row["roll"]; ?></b> </td>
			</tr>
			
			</table>
			</center>
		</div>
		<!--Subject Part Start-->
		<div class="clearfix"></div><br><br>
<?php
$count2=1;
$sel_query2="Select * from subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$subcode=$row2['subcode'];
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<td><h4><b>Subject Name:</b></h4></td>
			<td><h4><b><?php echo $row2['subname']?></b></h4></td>
		</tr>
	</thead>
</table>
<table class="table table-striped table-bordered">
<!--Getting Lesson Name-->
<?php
$count4=1;
$sel_query4="Select * from exam67lesson WHERE classnumber='$classnumber' AND subcode='$subcode' AND exid='$examid' ORDER BY subcode ASC, chapterno ASC, lno ASC;";
$result4 = mysqli_query($link,$sel_query4);
while($row4 = mysqli_fetch_assoc($result4)) {
$lessonno=$row4['lno'];
$chapterno=$row4['chapterno'];

$sel_query3="Select * from lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' AND lno='$lessonno' AND chapterno='$chapterno' ORDER BY subcode ASC, chapterno ASC, lno ASC;";
$result3 = mysqli_query($link,$sel_query3);
while($row3 = mysqli_fetch_assoc($result3)) {
?>
<tr>
<?php
$chapterno=$row3['chapterno'];
$lessonno=$row3['lno'];
$stuid=$row['uniqid'];
$uni=$examid.$subcode.$chapterno.$lessonno.$stuid;
?>
	<td><?php echo $classnumber;?>.<?php echo $row3['chapterno']?>.<?php echo $row3['lno']?>  <?php echo $row3['lname']?></td>
<!--Fininding  Lesson Mark-->
<?php
$sel_query10="SELECT * FROM `exammark67` where uni='$uni'";
$result10 = mysqli_query($link, $sel_query10);
if (mysqli_num_rows($result10) > 0) {
while ($row10 = mysqli_fetch_assoc($result10)) {
    $pi=$row10['pi'];
//cheaking Square;
$cpi=3;
if($cpi==$pi){
	echo "<td>";
	echo "<center>";
    echo "<img src='../img/markicon/sf.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpis'];
    echo "</center>";
    echo "</td>";
}else{
   	echo "<td>";
   	echo "<center>";
    echo "<img src='../img/markicon/sb.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpis'];
    echo "</center>";
    echo "</td>";
}
//cheaking Circle;
$cpi=2;
if($cpi==$pi){
    echo "<td>";
    echo "<center>";
    echo "<img src='../img/markicon/cf.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpic'];
    echo "</center>";
    echo "</td>";
}else{
    echo "<td>";
    echo "<center>";
    echo "<img src='../img/markicon/cb.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpic'];
    echo "</center>";
    echo "</td>";
}
//cheaking Triangle;
$cpi=1;
if($cpi==$pi){
    echo "<td>";
    echo "<center>";
    echo "<img src='../img/markicon/tf.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpit'];
    echo "</center>";
    echo "</td>";
}else{
    echo "<td>";
    echo "<center>";
    echo "<img src='../img/markicon/tb.png'id='markicon'>";
    echo "<br>";
    echo $row3['lpit'];
    echo "</center>";
    echo "</td>";
}
}
}else{
    ?>
   <td>
   	<img src="../img/markicon/sb.png" id='markicon'><br>
   	<?php echo $row3['lpis'];?>
   </td>
   <td>
   	<img src="../img/markicon/cb.png" id='markicon'><br>
   	<?php echo $row3['lpic'];?>
   </td>
   <td>
   	<img src="../img/markicon/tb.png" id='markicon'><br>
   	<?php echo $row3['lpit'];?>
   </td>
<?php
}
?>		
</tr>
<?php } ?>
<?php $count4++; } ?>
</table>
<?php $count2++; } ?><!--Ending Subject-->
	</div>
<?php } ?>
</body>
</html>