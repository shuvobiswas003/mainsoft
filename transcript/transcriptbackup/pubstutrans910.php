<?php
$examid=$_REQUEST['examid'];
$stuid=$_REQUEST['stuid'];
require"../interdb.php";
$pubstatus=0;
$sel_query="Select * from resultpub WHERE examid='$examid';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
$pubstatus=$row['status'];
}

if($pubstatus=='0'){
	echo "<center>";
	echo "<h1 style='font-size:100px;color:red;'>";
	echo "Result NOT YET PUBLISHED";
	echo "</h1>";
	echo "</center>";
}else{

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>transcripct</title>
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
		
		require "../interdb.php";
		$count=1;
		$sel_query="Select * from student WHERE uniqid='$stuid';";
		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		$roll=$row['roll'];
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
			<div class="lego"><img src="../img/student/<?php echo $row["imgname"]; ?>" alt="Student Picture" /></div>
			<div class="lego"><img id="img"src="../img/lego.png" alt="School Lego" /></div>
			<div class="lego">
				<table border="1" cellpadding="0" cellspacing="0" id="table">
					<tr>
						<th id="th">Latter Grade</th>
						<th id="th">Class Interval</th>
						<th id="th">Gread Point</th>
					</tr>
					<tr>
						<td id="td">A+</td>
						<td id="td">100-80</td>
						<td id="td">5</td>
					</tr>
					<tr>
						<td id="td">A</td>
						<td id="td">70-79</td>
						<td id="td">4</td>
					</tr>
					<tr>
						<td id="td">A-</td>
						<td id="td">60-69</td>
						<td id="td">3.5</td>
					</tr>
					<tr>
						<td id="td">B</td>
						<td id="td">50-59</td>
						<td id="td">3</td>
					</tr>
					<tr>
						<td id="td">C</td>
						<td id="td">40-49</td>
						<td id="td">2</td>
					</tr>
					<tr>
						<td id="td">D</td>
						<td id="td">33-39</td>
						<td id="td">1</td>
					</tr>
					<tr>
						<td id="td">F</td>
						<td id="td">0-32</td>
						<td id="td">5</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="information">
			<br>
			<table border="1" cellpadding="0" cellspacing="0" id="alok">
			<tr>
				<td id="ss"> <b>Student's Name</b></td>
				<th id="ss1"><i><?php echo $row["name"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Father's Name</b></td>
				<th id="ss1"><i><?php echo $row["fname"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Mother's Name</b></td>
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
		<div class="information">
			<table border="1" cellpadding="0" cellspacing="0" id="sss">
		<tr>
			<th id="result_table">Subject Name</th>
			<th id="result_table">Code</th>
			<th id="result_table">Subject <br /> Mark</th>
			<th id="result_table">C.Q</th>
			<th id="result_table">M.C.Q</th>
			<th id="result_table">Practical</th>
			<th id="result_table">Obtain <br /> Mark</th>
			<th id="result_table">Pass/Fail</th>
			<th id="result_table">Letter Grade</th>
			<th id="result_table">G.P.A</th>
		</tr>
		<?php
		$suniqid=$row['uniqid'];
        require "../interdb.php";
        $count1=1;
        $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1';";
        $result1 = mysqli_query($link,$sel_query1);
        while($row1 = mysqli_fetch_assoc($result1)) {?>
        <tr>
            <td><?php echo $row1['subname'];?></td>
            <td><?php echo $row1['subcode'];?></td>
            <td>
			    <?php
			    require "../interdb.php";
			    $subcode=$row1['subcode'];
			    $count2=1;
			    $sel_query2="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['subfullmarks'];?>
			    	<?php $count2++; }?>
			</td>
			<td><?php echo $row1['cq'];?></td>
			<td><?php echo $row1['mcq'];?></td>
			<td><?php echo $row1['practical'];?></td>
			<td><?php echo $row1['total'];?></td>
			<td>
				<?php
				$lettergrade=$row1['lettergrade'];
				switch ($lettergrade) {
					case 'F':
						echo "Fail";
						break;
					case '0':
					echo "Not Enrolled";
					break;
					default:
						echo "Pass";
						break;
				}
				?>
			</td>
			<td><?php echo $row1['lettergrade'];?></td>
			<td><?php echo $row1['letterpoint'];?></td>
            <?php $count1++; } ?>
    	</tr>
    	<tr>
    		<td colspan="10">
    			<b>Addtional Subject/4th Subject</b>
    		</td>
    	</tr>
    	<?php
		$suniqid=$row['uniqid'];
        require "../interdb.php";
        $count1=1;
        $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='4';";
        $result1 = mysqli_query($link,$sel_query1);
        while($row1 = mysqli_fetch_assoc($result1)) {?>
        <tr>
            <td><?php echo $row1['subname'];?></td>
            <td><?php echo $row1['subcode'];?></td>
            <td>
			    <?php
			    require "../interdb.php";
			    $subcode=$row1['subcode'];
			    $count2=1;
			    $sel_query2="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['subfullmarks'];?>
			    	<?php $count2++; }?>
			</td>
			<td><?php echo $row1['cq'];?></td>
			<td><?php echo $row1['mcq'];?></td>
			<td><?php echo $row1['practical'];?></td>
			<td><?php echo $row1['total'];?></td>
			<td>
				<?php
				$lettergrade=$row1['lettergrade'];
				switch ($lettergrade) {
					case 'F':
						echo "Fail";
						break;
					case '0':
					echo "Not Enrolled";
					break;
					default:
						echo "Pass";
						break;
				}
				?>
			</td>
			<td><?php echo $row1['lettergrade'];?></td>
			<td><?php echo $row1['letterpoint'];?></td>
            <?php $count1++; } ?>
			</table>
		</div>
		<div class="futter_part">
			<table border="1" cellpadding="0" cellspacing="0" id="futter_table">
				<tr>
					<td class="futter_table">Total Mark</td>
					<th  class="futter_table"><b>
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT sum(fullmarks) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['sum(fullmarks)'];?>
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
			    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['sum(total)'];?>
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
			    	<?php $gpanot4=$row2['AVG(letterpoint)'];
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
					<!--Total Fail Count-->
					<td  class="futter_table">Total  Fail</td>
					<td  class="futter_table"><b>
					<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $totalfail;
			    $count2=1;
			    $sel_query2="SELECT count(lettergrade) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND lettergrade='F'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {
			    	$totalfail=$row2['count(lettergrade)'];
			    	?>
			    	<?php echo $row2['count(lettergrade)'];?>
			    	<?php $count2++; }?>
					</b></td>
					<!--Fail Count end-->
					<td>Letter Grade</td>
					<td  class="futter_table"><b>
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
			    if($totalfail>0){
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
				<tr>
					<th colspan="4">
						Merit Position: 
<?php
$stuuniqid=$row['uniqid'];
$uniqm=$examid.$stuuniqid;
require "../interdb.php";
$count6=1;
$sel_query5="SELECT * from meritlist where uniqm='$uniqm'";
$result5 = mysqli_query($link,$sel_query5);
while($row5 = mysqli_fetch_assoc($result5)) {
echo $row5['curpos'];
$count6++; }
?>
					</th>
				</tr>
			</table>
		</div>
		<div class="end_part">
			<div class="end_left">Guradian's Sign</div>
			<div class="end_left">
			Class Teacher's Sign
			</div>
			<div class="end_left">
			Headmaster's Sign</div>
			<div class="barcode" style="margin-top:10px;"><center>
			<div style='text-align: center;'>
				<?php
				$sec=$row['secgroup'];
				$barcodesec=str_split($sec,3);
				?>
							<img alt='Black Code IT'
							   src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $row["classnumber"];?><?php echo $barcodesec[0];?><?php echo $row["roll"];?>&code=Code39FullASCII&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' style="height:70px;"/>
			</div>
			</center></div>
		</div>
	</div>
	<?php $count++; } ?>
	</section>
</body>
</html>
<?php
}
?>
