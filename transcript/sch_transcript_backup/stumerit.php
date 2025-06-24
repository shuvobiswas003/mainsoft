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
	<title>Merit list</title>
	<link rel="icon" href="logo-top-1.ico">
	<style type="text/css">
		*{
		margin:0 auto;
		padding:0 auto;
		}
		
		.warper{
			width:725px;
			height:1086px;
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
		}
	#img{
		margin-left: 162px;
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
		width: 386px;
		height: 111px;
		float: left;
		margin-top:-85px;
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
</head>
<body>
<section class="transcript">
	<?php
		$examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname;
        $uniqid;
        $roll;
        $stusex;
		require "../interdb.php";
		$count=1;
		$sel_query="Select * from student WHERE classnumber='$classnumber' ORDER BY roll;";
		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		$roll=$row['roll'];
		$secgroupname=$row['secgroup'];
		$uniqid=$row['uniqid'];
		$stusex=$row['sex'];

	?>
	
	<div class="warper">
		<div class="header_part">
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
			<h2>
			<?php
                $count2=1;
                $sel_query2="Select * from exam where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>
			</h2>
			<span id="ada">Academic Transcript</span>
		</center>
		</div>
		<div class="header_part_top">
			<br>
			<br>
			<br>
			<br><br>
			<div class="lego">
				
			</div>
		</div>
		<div class="information">
			<br>
			<table border="1" cellpadding="0" cellspacing="0" id="alok">
			<tr>
				<td id="ss"> <b>Student Name</b></td>
				<th id="ss1"><i><?php echo $row["name"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Father Name</b></td>
				<th id="ss1"><i><?php echo $row["fname"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Mother Name</b></td>
				<th id="ss1"><i><?php echo $row["mname"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Date Of Birth</b></td>
				<th id="ss1"><i><?php echo $row["dob"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Class</b></td>
				<td id="ss1"><b><?php echo $row["classnumber"]; ?></b> </td>
			</tr>
			<tr>
				<td id="ss"><b>Group/Sec:</b></td>
				<td id="ss1"><b><?php echo $row["secgroup"]; ?></b> </td>
			</tr>
			<tr>
				<th id="ss">Roll</th>
				<th id="ss1"><b><?php echo $row["roll"]; ?></b></th>
			</tr>
			</table>
		</div>
		<br><br><br>
		<div class="futter_part">
			<table border="1" cellpadding="0" cellspacing="0" id="futter_table">
				<tr>
					<td class="futter_table">Total Mark</td>
					<th  class="futter_table"><b>
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $totalmark;
			    $count2=1;
			    $sel_query2="SELECT sum(fullmarks) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php 
			    	$totalmark=$row2['sum(fullmarks)'];
			    	echo $row2['sum(fullmarks)'];?>
			    	<?php $count2++; }?>
					</b></th>
					<td  class="futter_table">Total Obtain Point</td>
					<td  class="futter_table"><b>
					<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
					</b></td>
				</tr>
				<tr>
					<td  class="futter_table">Total Obtain Mark</td>
					<td  class="futter_table"><b>
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $obtainmark;
			    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php 
			    	$obtainmark=$row2['sum(total)'];
			    	echo $row2['sum(total)'];?>
			    	<?php $count2++; }?>
					</b></td>
					<td rowspan="" id="total">Total Point (Without 4th sub)</td>
					<td rowspan=""><b>
					<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
					</b></td>
				</tr>
				<tr>
					<td  class="futter_table">G.P.A (without 4th sub)</td>
					<td  class="futter_table"><b>
					<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT AVG(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus='1'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php 
			    	
			    	$gpanot4=$row2['AVG(letterpoint)'];
			    	$gpa4=$gpanot4;
			    	echo number_format((float)$gpanot4, 2, '.', '');
			    	?>
			    	<?php $count2++; }?>
					</b></td>
					<!--Gpa Start-->
					<td  class="futter_table">G.P.A</td>
					<td  class="futter_table"><b>
					<!--4th Subject GPA Counting-->
					<?php
				    require "../interdb.php";
				    $suniqid=$row['uniqid'];
				    $fouthgpa;
				    $count2=1;
				    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=4";
				    $result2 = mysqli_query($link,$sel_query2);
				    while($row2 = mysqli_fetch_assoc($result2)) {?>
				    	<?php $fouthgpa=$row2['sum(letterpoint)'];?>
				    	<?php $count2++; }?>
				 <!--Main Subject GPA Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $maingpa;
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $maingpa=$row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
				<!--Total Subject Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $countsub;
			    $count2=1;
			    $sel_query2="SELECT count(subcode) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $countsub=$row2['count(subcode)'];?>
			    	<?php $count2++; }?>
			    <!--Cheaking 4th sub point-->
			    <?php 
			    $new4thpoint;
			    if($fouthgpa>3){
			    	$new4thpoint=$fouthgpa-2;
			    }else{
			    	$new4thpoint=0;
			    }
			    ?>
			    <!--Publish Final Result-->
			    <?php
			    $cheakgolden=$countsub*5;
			    if($maingpa>=$cheakgolden){
			    	$finagpa=$maingpa;
			    }else{
			    	$finagpa=$new4thpoint+$maingpa;
			    }
			    $ncountsub;
			    switch ($countsub) {
			    	case '0':
			    		$ncountsub=1;
			    		break;
			    	
			    	default:
			    		$ncountsub=$countsub;
			    		break;
			    }
			    $resultgpa=$finagpa/$ncountsub;
			    if($resultgpa>5){
			    	$resultgpa=5;
			    }else{
			    	$resultgpa;
			    }
			    echo number_format((float)$resultgpa, 2, '.', '');
			    ?>
					</b></td>
					<!--Gpa END-->
				</tr>
				<tr>
					<td  class="futter_table">Total  Fail</td>
					<td  class="futter_table"><b>
					<?php
				$totalgpam;
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $failsub;
			    $sel_query2="SELECT count(lettergrade) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND lettergrade='F'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php  
			    	$failsub=$row2['count(lettergrade)'];
			    	echo $row2['count(lettergrade)'];?>
			    	<?php $count2++; }?>
					</b></td>
					<!--Print Letter Grade-->
					<td>Letter Grade</td>
					<td>
					<b>
						
<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $maingpa;
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $maingpa=$row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
				<!--Total Subject Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $countsub;
			    $count2=1;
			    $sel_query2="SELECT count(subcode) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $countsub=$row2['count(subcode)'];?>
			    	<?php $count2++; }?>
			    <!--Cheaking 4th sub point-->
			    <?php 
			    $new4thpoint;
			    if($fouthgpa>3){
			    	$new4thpoint=$fouthgpa-2;
			    }else{
			    	$new4thpoint=0;
			    }
			    ?>
			    <!--Publish Final Result-->
			    <?php
			    $cheakgolden=$countsub*5;
			    if($maingpa>=$cheakgolden){
			    	$finagpa=$maingpa;
			    }else{
			    	$finagpa=$new4thpoint+$maingpa;
			    }
			    $ncountsub;
			    switch ($countsub) {
			    	case '0':
			    		$ncountsub=1;
			    		break;
			    	
			    	default:
			    		$ncountsub=$countsub;
			    		break;
			    }
			    $resultgpa=$finagpa/$ncountsub;
			    if($resultgpa>5){
			    	$resultgpa=5;
			    }else{
			    	$resultgpa;
			    }
			    $gresultgrade=number_format((float)$resultgpa, 2, '.', '');
			    $totalgpam=$gresultgrade;
			    if($failsub>0){
			    	echo "F";
			    }else{
			    	if($resultgpa>4.99){
			    	echo "A+";
			    }elseif ($resultgpa>3.99) {
			    	echo "A";
			    }
			    elseif ($resultgpa>3.49) {
			    	echo "A-";
			    }elseif ($resultgpa>2.99) {
			    	echo "B";
			    }elseif ($resultgpa>1.99) {
			    	echo "C";
			    }
			    elseif ($resultgpa>0.99) {
			    	echo "D";
			    }else{
			    	echo "F";
			    }
			    }

			    
			    
			    ?>

			    	</b>
					</td>
				<!--Print Letter Grade End-->
				</tr>
			</table>
		</div>
<?php
//ready to insert meritlist
$classnumber;
$examid;
$uniqid;
$totalmark;
$obtainmark;
$totalgpam;
$totalgpam=number_format((float)$totalgpam, 2, '.', '');
$gpa4;
$gpa4=number_format((float)$gpa4, 2, '.', '');
$failsub;
$status;
if($failsub>0){
	$status="Fail";
}else{
	$status="Pass";
}
$pervpos=$roll;
$curpos=0;
$examuni=$examid.$uniqid;

echo $classnumber;
echo "<br>";
echo $examid;
echo "<br>";
echo $uniqid;
echo "<br>";
echo $totalmark;
echo "<br>";
echo $obtainmark;
echo "<br>";
echo $totalgpam;
echo "<br>";
echo $gpa4;
echo "<br>";
echo $failsub;
echo "<br>";
echo $pervpos;
echo "<br>";
echo $curpos;
echo "<br>";
echo $examuni;
//insert into merit
 $sql ="INSERT INTO `meritlist`(`classnumber`, `examid`, `uniqid`, `totalmark`, `obtainmark`, `gpa`, `gpa4th`, `failsub`, `prevpos`, `curpos`, `uniqm`,`sex`,`status`) VALUES ('$classnumber','$examid','$uniqid','$totalmark','$obtainmark','$totalgpam','$gpa4','$failsub','$pervpos','$curpos','$examuni','$stusex','$status') ON DUPLICATE KEY UPDATE classnumber='$classnumber',examid='$examid',uniqid='$uniqid',totalmark='$totalmark',obtainmark='$obtainmark',gpa='$totalgpam',gpa4th='$gpa4',failsub='$failsub',prevpos='$pervpos',curpos='$curpos',status='$status'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Merit possition calcluted</h1>.";
    } else{
    }
?>
	</div>
	<?php $count++; } ?>
	</section>

	<?php
	require '../interdb.php';
	$count=1;
	$sel_query="SELECT * FROM meritlist WHERE examid='$examid' AND classnumber='$classnumber' ORDER BY failsub ASC,gpa DESC,obtainmark DESC;";
	$result = mysqli_query($link,$sel_query);
	while($row = mysqli_fetch_assoc($result)) {
		$id=$row['id'];
		$curpos=$count;
		//insert into merit
 $sql ="UPDATE meritlist set curpos='$curpos' WHERE id='$id'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Merit possition calcluted </h1>.";
        echo $curpos;
        echo "<br>";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }
	$count++;
	}
	?>
</body>
</html>