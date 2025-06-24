<?php
require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
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
	<title>transcripct</title>
	<link rel="icon" href="logo-top-1.ico">
	<link rel="stylesheet" href="my_trans.css">
	
</head>
<body>
<section class="transcript">
	<?php
		$examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
		require "../interdb.php";
		$count=1;
		$sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		$roll=$row['roll'];
	?>
	
	<div class="warper">
	<div id="in_m">
	<div id="in_b">
		<div class="header_part">
		<center>
			<table>
				<tr>
					<td>
						<img id="sch_lego"src="../img/lego.png?<?php echo time();?>" alt="School Lego" />
					</td>
					<td>
						<h1 style="font-weight: 800;">
							<?php
							$headname='';
			                $count2=1;
			                $sel_query2="Select * from schoolinfo";
			                $result2 = mysqli_query($link,$sel_query2);
			                while($row2 = mysqli_fetch_assoc($result2)) {
			                    $headname=$row2['headname'];
			            ?>
			            <?php echo $row2['schoolname']?>
			            <?php $count2++; } ?>
						</h1>
					</td>
					
				</tr>
			</table>
			
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
			<span id="ada" style="font-weight: bold;">Academic Transcript</span>
		</center>
		</div>
		<div class="header_part_top">
			
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
						<td id="td">0</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="information">
			<br>
			<table cellpadding="0" cellspacing="0" id="alok">
			<tr>
				<td id="ss"> <b>Student Name's</b></td>
				<th id="ss1">: <i><?php echo strtoupper($row["name"]); ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Father's Name</b></td>
				<th id="ss1"><i>: <?php 
				
					echo strtoupper($row["fname"]);
				
				
				 ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Mother's Name</b></td>
				<th id="ss1">: <i>
					<?php 
				
					echo strtoupper($row["mname"]);
			
				
				 ?>
				</i></th>
			</tr>
			<tr>
				<td id="ss"><b>Gender </b></td>
				<th id="ss1">: <i><?php echo $row["sex"]; ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Class</b></td>
				<td id="ss1">: <b><?php echo $row["classnumber"]; ?></b> </td>
			</tr>
			<tr>
				<td id="ss"><b>Group/Sec</b></td>
				<td id="ss1">: <b><?php echo $row["secgroup"]; ?></b> </td>
			</tr>
			<tr>
				<th id="ss">Roll</th>
				<th id="ss1">: <b><?php echo $row["roll"]; ?></b></th>
			</tr>
			</table>
		</div>

<div class="information">
			<table border="1" cellpadding="0" cellspacing="0" id="sss">
		<tr>
			<th id="result_table">Subject Name</th>
			<th id="result_table">Code</th>
			<th id="result_table">Subject <br /> Mark</th>
			<th id="result_table">C.Q(100%)</th>
			<th id="result_table">CQ (70%)<br>A</th>
			<th id="result_table">CA (30%)<br>B</th>
			<th id="result_table">Obtain <br /> Mark(A+B)</th>
			<th id="result_table">Height <br /> Mark</th>
			<th id="result_table">Pass/Fail</th>
			<th id="result_table">L.G</th>
			<th id="result_table">G.P</th>
		</tr>
		<?php
		$suniqid=$row['uniqid'];
        require "../interdb.php";
        $count1=1;
        $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' ORDER by subcode ASC;";
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
				$sel_query40="SELECT max(total) FROM exammark WHERE examid='$examid'AND (substatus='1' OR substatus='4') AND subcode='$subcode' ORDER by subcode ASC LIMIT 1;";
			    $result40 = mysqli_query($link,$sel_query40);
			    while($row40 = mysqli_fetch_assoc($result40)) {
			    	echo $row40['max(total)'];
			    }
				?>
			</td>
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
				$sel_query40="SELECT max(total) FROM exammark WHERE examid='$examid'AND (substatus='1' OR substatus='4') AND subcode='$subcode' ORDER by subcode ASC LIMIT 1;";
			    $result40 = mysqli_query($link,$sel_query40);
			    while($row40 = mysqli_fetch_assoc($result40)) {
			    	echo $row40['max(total)'];
			    }
				?>
			</td>
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
		<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $totalfail;
			    $count2=1;
			    $sel_query2="SELECT count(lettergrade) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND lettergrade='F'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {
			    	$totalfail=$row2['count(lettergrade)'];
}
			    	?>
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
					if($totalfail>0){
			    	echo "F";
			    }else{
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT AVG(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus='1'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $gpanot4=$row2['AVG(letterpoint)'];
			    	echo number_format((float)$gpanot4, 2, '.', '');
			    	?>
			    	<?php $count2++; }}?>
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
			    if($totalfail>0){
			    	echo "F";
			    }else{
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
}
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
 if($totalfail>0){
    echo "";
}else{
echo $row5['curpos'];
}
$count6++; }
?>
					</th>
				</tr>
			</table>
		</div>
		



		<div class="end_part">
		    <center>
			<div class="end_leftt">Guardian's Sign</div>
			<div class="end_leftt">Class Teacher's Sign</div>
			<div class="end_left">
			    
			    <img src="../img/hmsign.png" style="width: 120px"><br>
			    <b><?php echo $headname;?></b><br>Head Teacher
			</div>
			</center>
			<div class="barcode" style="margin-top:10px;"><center>
			<!--QR CODE START-->
<div style='text-align: center;'>
<?php
	$baselink;
	$softlink;
    $count2=1;
    $sel_query2="Select * from schoolinfo";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    $softlink=$row2['softlink'];
 $count2++; } ?>
<?php
$classnumber=$row['classnumber'];
$transdir;
switch ($classnumber) {
	case '8':
		$transdir="/transcript/pubstutrans8.php";
		break;
	case '9':
		$transdir="/transcript/pubstutrans910.php";
		break;
	case '10':
		$transdir="/transcript/pubstutrans910.php";
		break;
	default:
		$transdir="/transcript/index.php";
		break;
}
$stuid=$row['uniqid'];
$text = $softlink.$transdir."?stuid=".$stuid."&examid=".$examid."";

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
						?>
<h6></h6>
					</div>
<!--QR CODE END-->
			</center></div>
			
		</div>
		
	</div><!--END WRAPWR-->
</div><!--END bm-->
</div><!--END out1-->
	
</div>
	<?php $count++; } ?>
	</section>
</body>
</html>