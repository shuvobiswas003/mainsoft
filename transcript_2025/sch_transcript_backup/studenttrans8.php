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
	<style type="text/css">
		*{
		margin:0 auto;
		padding:0 auto;
		}
		#qr{
	height: 130px;
	width: 130px;
}
		.warper{
			width:725px;
			height:1035px;
			border:4px solid black;
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
		width: 29%;
		height: auto;
		font-size: 13px;
		margin-left: 29px;
	    margin-top:10px;
	}
	.end_leftt{
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
		width: 25%;
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
        $secgroupname=$_REQUEST['secgroupname'];
		require "../interdb.php";
		$count=1;
		$sel_query="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
		$result = mysqli_query($link,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
		$roll=$row['roll'];
	?>
	<div class="warper">
		<div class="header_part">
		<center>
			<h1>
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
			</h2>
			<span id="ada">Academic Transcript</span>
		</center>
		</div>
		<div class="header_part_top">
			<div class="lego">
			     <!--Img Start-->
			<?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg?<?php echo time();?>">
            <?php
            }else{
            ?>
            <img src="../img/student/<?php echo $row['imgname'];?>"?<?php echo time();?>>

            <?php
            }
            ?>
            <!--Img End-->
			  </div>
			<div class="lego"><img id="img"src="../img/lego.png?<?php echo time();?>" alt="School Lego" /></div>
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
						<td id="td">70-74</td>
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
			<table border="1" cellpadding="0" cellspacing="0" id="alok">
			<tr>
				<td id="ss"> <b>Student Name's</b></td>
				<th id="ss1"><i><?php echo strtoupper($row["name"]); ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Father's Name</b></td>
				<th id="ss1"><i><?php 
					echo strtoupper($row["fname"]);
				
				 ?></i></th>
			</tr>
			<tr>
				<td id="ss"><b>Mother's Name</b></td>
				<th id="ss1"><i>
					<?php 
			
					echo strtoupper($row["mname"]);
				
				
				 ?>
				</i></th>
			</tr>
			<tr>
				<td id="ss"><b>Gender: </b></td>
				<th id="ss1"><i><?php echo $row["sex"]; ?></i></th>
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
		<!--Bangla Part Start-->
		<tr>
				<?php
				$suniqid=$row['uniqid'];
				$count2=1;
				require "../interdb.php";
			    $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='101'ORDER BY subcode ASC;";
				$result2 = mysqli_query($link,$sel_query1);
				while($row2 = mysqli_fetch_assoc($result2)){
				$sel_query2="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='102'ORDER BY subcode ASC;";
				$result3 = mysqli_query($link,$sel_query2);
				while($row3 = mysqli_fetch_assoc($result3)){
				?>
				    <td><?php echo $row2['subname'];?></td>
				    <td><?php echo $row2['subcode'];?></td>
        				    <td>
                			    <?php
                			    require "../interdb.php";
                			    $subcode=$row2['subcode'];
                			    $count5=1;
                			    $sel_query5="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
                			    $result5 = mysqli_query($link,$sel_query5);
                			    while($row5 = mysqli_fetch_assoc($result5)) {?>
                			    	<?php echo $row5['subfullmarks'];?>
                			    	<?php $count5++; }?>
        			        </td>
					<td><?php echo $row2['cq'];?></td>
					<td><?php echo $row2['mcq'];?></td>
					<td><?php echo $row2['practical'];?></td>
					<td><?php echo $row2['total']?></td>
					<td rowspan="2">
					<?php
						$bfail;
						$btotal=$row2['total']+$row3['total'];
						$b1letterpoint=$row2['letterpoint'];
						$b2letterpoint=$row3['letterpoint'];
						if(($btotal>49)){
							echo "PASS";
							$bfail=0;
						}else{
							echo "Fail";
							$bfail=1;
						}
					?>
					</td>
					<td rowspan="2">
					    <?php
					if(($btotal>49)){
                    $btotal=$row2['total']+$row3['total'];
					if($btotal>119){
						echo "A+";
					}elseif($btotal>104){
						echo "A";
					}
					elseif($btotal>89){
						echo "A-";
					}
					elseif($btotal>74){
						echo "B";
					}elseif($btotal>59){
						echo "C";
					}elseif($btotal>49){
						echo "D";
					}
					}else{
							echo "F";
						}
					?>
					</td>
					<td rowspan="2">
					<?php
					$bgp;
                    if(($btotal>49)){
                    $btotal=$row2['total']+$row3['total'];
					if($btotal>119){
						echo "5";
						$bgp=5;
					}elseif($btotal>104){
						echo "4";
						$bgp=4;
					}
					elseif($btotal>89){
						echo "3.5";
						$bgp=3.5;
					}
					elseif($btotal>74){
						echo "3";
						$bgp=3;
					}elseif($btotal>59){
						echo "2";
						$bgp=2;
					}elseif($btotal>49){
						echo "1";
						$bgp=1;
					}
					}else{
						echo "0";
						$bgp=0;
					}
					?>
					</td>
				</tr>
				<?php } }?>
				<?php $count2++?>
				<tr>
					<?php
						$count3=1;
						require "../interdb.php";
						$sel_query3="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='102'ORDER BY subcode ASC;";
						$result4 = mysqli_query($link,$sel_query3);
						while($row4 = mysqli_fetch_assoc($result4)){?>
        			<td><?php echo $row4['subname'];?></td>
				    <td><?php echo $row4['subcode'];?></td>
        			<td>
    			    <?php
    			    require "../interdb.php";
    			    $subcode=$row4['subcode'];
    			    $count5=1;
    			    $sel_query5="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
    			    $result5 = mysqli_query($link,$sel_query5);
    			    while($row5 = mysqli_fetch_assoc($result5)) {?>
    			    	<?php echo $row5['subfullmarks'];?>
    			    	<?php $count5++; }?>
        			</td>
					<td><?php echo $row4['cq'];?></td>
					<td><?php echo $row4['mcq'];?></td>
					<td><?php echo $row4['practical'];?></td>
					<td><?php echo $row4['total']?></td>
					<?php }
					$count3++;
					?>
				</tr>
		<!--Bangla Part END-->
		<!--English part Start-->
		<tr>
				<?php
				$suniqid=$row['uniqid'];
				$count2=1;
				require "../interdb.php";
			    $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='107'ORDER BY subcode ASC;";
				$result2 = mysqli_query($link,$sel_query1);
				while($row2 = mysqli_fetch_assoc($result2)){
				$sel_query2="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='108'ORDER BY subcode ASC;";
				$result3 = mysqli_query($link,$sel_query2);
				while($row3 = mysqli_fetch_assoc($result3)){
				?>
				    <td><?php echo $row2['subname'];?></td>
				    <td><?php echo $row2['subcode'];?></td>
        				    <td>
                			    <?php
                			    require "../interdb.php";
                			    $subcode=$row2['subcode'];
                			    $count5=1;
                			    $sel_query5="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
                			    $result5 = mysqli_query($link,$sel_query5);
                			    while($row5 = mysqli_fetch_assoc($result5)) {?>
                			    	<?php echo $row5['subfullmarks'];?>
                			    	<?php $count5++; }?>
        			        </td>
					<td><?php echo $row2['cq'];?></td>
					<td><?php echo $row2['mcq'];?></td>
					<td><?php echo $row2['practical'];?></td>
					<td><?php echo $row2['total']?></td>
					<td rowspan="2">
					<?php
						$efail;
						$btotal=$row2['total']+$row3['total'];
						$b1letterpoint=$row2['letterpoint'];
						$b2letterpoint=$row3['letterpoint'];
						if(($btotal>49)){
							echo "PASS";
							$efail=0;
						}else{
							echo "Fail";
							$efail=1;
						}
					?>
					</td>
					<td rowspan="2">
					<?php
                if(($btotal>49)){
					$btotal=$row2['total']+$row3['total'];
					if($btotal>119){
						echo "A+";
					}elseif($btotal>104){
						echo "A";
					}
					elseif($btotal>89){
						echo "A-";
					}
					elseif($btotal>74){
						echo "B";
					}elseif($btotal>59){
						echo "C";
					}elseif($btotal>49){
						echo "D";
					}
						}else{
							echo "F";
							$efail=1;
						}
					?>
					</td>
					<td rowspan="2">
					<?php
					$egp;
                    if(($btotal>49)){
                    $btotal=$row2['total']+$row3['total'];
					if($btotal>119){
						echo "5";
						$egp=5;
					}elseif($btotal>104){
						echo "4";
						$egp=4;
					}
					elseif($btotal>89){
						echo "3.5";
						$egp=3.5;
					}
					elseif($btotal>74){
						echo "3";
						$egp=3;
					}elseif($btotal>59){
						echo "2";
						$egp=2;
					}elseif($btotal>49){
						echo "1";
						$egp=1;
					}
						}else{
						echo "0";
						$egp=0;
						}
					?>
					</td>
				</tr>
				<?php } }?>
				<?php $count2++?>
				<tr>
					<?php
						$count3=1;
						require "../interdb.php";
						$sel_query3="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid'AND substatus='1' AND subcode='108'ORDER BY subcode ASC;";
						$result4 = mysqli_query($link,$sel_query3);
						while($row4 = mysqli_fetch_assoc($result4)){?>
        			<td><?php echo $row4['subname'];?></td>
				    <td><?php echo $row4['subcode'];?></td>
        			<td>
    			    <?php
    			    require "../interdb.php";
    			    $subcode=$row4['subcode'];
    			    $count5=1;
    			    $sel_query5="SELECT * From subject WHERE subcode='$subcode'AND classnumber='$classnumber' AND secgroup='$secgroupname'";
    			    $result5 = mysqli_query($link,$sel_query5);
    			    while($row5 = mysqli_fetch_assoc($result5)) {?>
    			    	<?php echo $row5['subfullmarks'];?>
    			    	<?php $count5++; }?>
        			</td>
					<td><?php echo $row4['cq'];?></td>
					<td><?php echo $row4['mcq'];?></td>
					<td><?php echo $row4['practical'];?></td>
					<td><?php echo $row4['total']?></td>
					<?php }
					$count3++;
					?>
				</tr>
		<!--English part END-->
		<?php
		$suniqid=$row['uniqid'];
        require "../interdb.php";
        $count1=1;
        $sel_query1="SELECT * FROM `exammark` WHERE examid='$examid' AND substatus='1' AND suniqid='$suniqid' and subcode NOT IN(SELECT subcode from exammark where examid='$examid' AND suniqid='$suniqid' AND (subcode='101' OR subcode='102' OR subcode='107' OR subcode='108')) ORDER BY subcode ASC";
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

				<!--Total exam mark Held Start-->

				    

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

				<!--Total exam mark Held END-->

				

				

				

				<!--Obtain Point calcluate with 4th sub Start-->

				<td  class="futter_table">Total Obtain Point</td>

				<td  class="futter_table">

				    <b>

				    <?php

				    $totalgpa='';

				    $totalgpawithout4;

				    $totalcalwith4;

				    //geting bangla gpa

				    $banglagpa=$bgp;

				    

				    //getting english gpa

				    $englishgpa=$egp;

				    

				    //getting other sub-gpa

				    $othergpa='';

				    $sel_query1="SELECT sum(letterpoint) FROM `exammark` WHERE examid='$examid' AND suniqid='$suniqid' and substatus='1' and subcode NOT IN(SELECT subcode from exammark where examid='$examid' AND suniqid='$suniqid' AND (subcode='101' OR subcode='102' OR subcode='107' OR subcode='108'))";

                    $result1 = mysqli_query($link,$sel_query1);

                    while($row1 = mysqli_fetch_assoc($result1)) {

                        $othergpa=$row1['sum(letterpoint)'];

                    }

                    //getting 4th gpa

                    $fouthsubgpa='';

                    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=4";

				    $result2 = mysqli_query($link,$sel_query2);

				    while($row2 = mysqli_fetch_assoc($result2)) {

				        $fouthsubgpa=$row2['sum(letterpoint)'];

				    }

                    // total gpa

                    $totalgpa=$banglagpa+$englishgpa+$othergpa+$fouthsubgpa;

                    echo $totalgpa;

                    

                    //total gpa without 4subject

                    $totalgpawithout4=$banglagpa+$englishgpa+$othergpa;

                    

                    

				    //cutting 4th su gpa

				    $fourcuttinggpa;

				    switch ($fouthsubgpa) {

				    	case '5':

				    		$fourcuttinggpa=3;

				    		break;

			    		case '4':

			    		$fourcuttinggpa=2;

			    		break;

			    		case '3':

				    		$fourcuttinggpa=1;

				    		break;

				    	

				    	default:

				    		$fourcuttinggpa=0;

				    		break;

				    }

				    

				    //total gpa without 4th sub;

				    $totalcalwith4=$totalgpawithout4+$fourcuttinggpa;

				    ?>

					</b>

				</td>

				<!--Obtain Point calcluate with 4th sub Start-->

				</tr>

				

				<tr>

				<!--Total Obtain Mark Start -->

				<td  class="futter_table">Total Obtain Mark</td>

				<td  class="futter_table">

				    <b>

        				<?php

        			    require "../interdb.php";

        			    $suniqid=$row['uniqid'];

        			    $count2=1;

        			    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";

        			    $result2 = mysqli_query($link,$sel_query2);

        			    while($row2 = mysqli_fetch_assoc($result2)) {?>

        			    <?php echo $row2['sum(total)'];?>

        			    <?php $count2++; }?>

				    </b>

				</td>

				<!--Total Obtain Mark Start -->

				

				

				<!--Total Obtain Point without 4th subject Start -->	

				<td rowspan="" id="total">Total Point (Without 4th sub)</td>

				<td rowspan="">

				    <b>

        				<?php echo $totalgpawithout4?>

					</b>

				</td>

				<!--Total Obtain Point without 4th subject END -->

				</tr>

				

				

				<tr>

				    <!--Total GPA without 4th subject-->

					<td  class="futter_table">G.P.A (without 4th sub)</td>

					<td  class="futter_table">

                        <b>

                            <?php

                            //counting subject

                            require "../interdb.php";

            			    $suniqid=$row['uniqid'];

            			    $countsub;

            			    $sel_query2="SELECT count(subcode) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";

            			    $result2 = mysqli_query($link,$sel_query2);

            			    while($row2 = mysqli_fetch_assoc($result2)) {

            			     $countsub=$row2['count(subcode)'];

            			     $countsub=$countsub-2;

            			    }

            			    $gpawithout4=$totalgpawithout4/$countsub;
            			    //counting other sub fail

    					$otherfail=''; 

    				    $sel_query1="SELECT count(lettergrade) FROM `exammark` WHERE examid='$examid' AND substatus=1 AND lettergrade='F' AND suniqid='$suniqid' and subcode NOT IN(SELECT subcode from exammark where examid='$examid' AND suniqid='$suniqid' AND (subcode='101' OR subcode='102' OR subcode='107' OR subcode='108'))";

                        $result1 = mysqli_query($link,$sel_query1);

                        while($row1 = mysqli_fetch_assoc($result1)) {

                            $otherfail=$row1['count(lettergrade)'];

                        }

                        $totalfail=$otherfail+$bfail+$efail;
                        if($totalfail>0){
                            echo "";
                        }else{

            			    $gpawithout4=number_format((float)$gpawithout4, 2, '.', '');

            			    echo $gpawithout4;

                        }

                            ?>

                            

                        </b>

        			</td>

					

					<!--Total GPA without 4th subject-->

					

					<!--Gpa Start-->

					<td  class="futter_table">G.P.A</td>

					<td  class="futter_table">

					    <b>

					        <?php
					        
					   

					   //getting total gpa with 4th sub cutting
                        if($totalfail>0){
                            echo "";
                        }else{
					        $gpa=$totalcalwith4/$countsub;

					        $gpa=number_format((float)$gpa, 2, '.', '');

					         if($gpa>5){

					            echo "5.00";

					            $gpa=5;

					        }else{

					             echo $gpa;

					        }
                        }

					        ?>

					    </b>

					</td>

					<!--Gpa END-->

				</tr>

				

				

				<tr>

			    <!--Total Fail Count-->

				<td  class="futter_table">Total  Fail</td>

				<td  class="futter_table">

				    <b>

    					<?php

    					//counting other sub fail

    					$otherfail=''; 

    				    $sel_query1="SELECT count(lettergrade) FROM `exammark` WHERE examid='$examid' AND substatus=1 AND lettergrade='F' AND suniqid='$suniqid' and subcode NOT IN(SELECT subcode from exammark where examid='$examid' AND suniqid='$suniqid' AND (subcode='101' OR subcode='102' OR subcode='107' OR subcode='108'))";

                        $result1 = mysqli_query($link,$sel_query1);

                        while($row1 = mysqli_fetch_assoc($result1)) {

                            $otherfail=$row1['count(lettergrade)'];

                        }

                        $totalfail=$otherfail+$bfail+$efail;

                        echo $totalfail;

                        

    			        ?>

					</b>

				</td>

				<!--Fail Count end-->



					<td>Letter Grade</td>

					<td  class="futter_table"><b>

				<?php

			    if($totalfail>0){

			    	echo "F";

			    }else{

			    	if($gpa>4.99){

			    	echo "A+";

			    }elseif ($gpa>3.99) {

			    	echo "A";

			    }

			    elseif ($gpa>3.49) {

			    	echo "A-";

			    }elseif ($gpa>2.99) {

			    	echo "B";

			    }elseif ($gpa>1.99) {

			    	echo "C";

			    }

			    elseif ($gpa>0.99) {

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
			<div class="end_leftt">Guardian's Sign</div>
			<div class="end_leftt">Class Teacher's Sign</div>
			<div class="end_left">
			    <img src="../admit/hmsign.png"><br>
			    <b>Pradyut Kumar Bhadra</b><br>Head Teacher
			 </div>
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
<h6>Verify to Scan QR</h6>
					</div>
<!--QR CODE END-->
			</center></div>
		</div>
		<center><h5>Developed By Black Code IT</h5></center>
	</div>
	<?php $count++; } ?>
	</section>
</body>
</html>