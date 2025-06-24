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
// Check if the user is either logged in or is a teacher, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || ($_SESSION["loggedin"] !== true && $_SESSION["loggedin"] !== 'teacher')) {
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
						<th id="th">Letter Grade</th>
						<th id="th">Class Interval</th>
						<th id="th">Grade Point</th>
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
				<td id="ss"> <b>Student's Name</b></td>
				<th id="ss1">: <?php echo strtoupper($row["name"]); ?></th>
			</tr>
			<tr>
				<td id="ss"><b>Father's Name</b></td>
				<th id="ss1">: <?php 
				
					echo strtoupper($row["fname"]);
				
				
				 ?></th>
			</tr>
			<tr>
				<td id="ss"><b>Mother's Name</b></td>
				<th id="ss1">: 
					<?php 
				
					echo strtoupper($row["mname"]);
			
				
				 ?>
				</th>
			</tr>
			<tr>
				<td id="ss"><b>Gender </b></td>
				<th id="ss1">: <?php echo $row["sex"]; ?></th>
			</tr>
			<tr>
				<td id="ss"><b>Class</b></td>
				<td id="ss1">
                : <b>
                    <?php 
                    $classMap = [
                        -1 => "Nursery",
                        0 => "KG",
                        1 => "One",
                        2 => "Two",
                        3 => "Three",
                        4 => "Four",
                        5 => "Five",
                        6 => "Six",
                        7 => "Seven",
                        8 => "Eight",
                        9 => "Nine",
                        10 => "Ten",
                        11 => "Eleven",
                        12 => "Twelve"
                    ];
            
                    echo isset($classMap[$row["classnumber"]]) 
                        ? $classMap[$row["classnumber"]] 
                        : "Unknown Class";
                    ?>
                </b>
            </td>
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
<br><br><br>
<div class="information">
	<table border="1" cellpadding="0" cellspacing="0" id="sss">
	    
	    
		<tr>
			<th id="result_table">Subject</th>
		
			<th id="result_table">Full <br /> Marks</th>
			<th id="result_table">C.Q</th>
			<th id="result_table">MCQ/<br>Converted</th>
			<th id="result_table">CA</th>
			<th id="result_table">Obtaining <br /> Marks</th>
			<th id="result_table">Highest <br /> Marks</th>
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
			$sel_query40="SELECT max(total) FROM exammark WHERE examid='$examid'AND classnumber='$classnumber' AND subcode='$subcode' ORDER by subcode ASC LIMIT 1;";
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
    	</tr>
    	<?php $count1++; } ?>
    	
    	
        <!--Result Row Start-->
        <?php include"inc/student_trans_result_row.php"?>
        
        <!--Result Row END-->
	</table>
	</div>
		
		
	<!--Activity Row Start-->
    <?php include "inc/student_trans_activity.php"?>
    
    <!--Activity Row END-->
		

	
	
	<div class="information">
	    <table class="result_part_table">
	       <tr style="border:1px solid black">
	           <td style="border:1px solid black;width:3%;">
	               <span style="display: inline-block; transform: rotate(-90deg);"><b>Comments</b></span>
	           </td>
	           
	            <td style="border:1px solid black;width:97%;">
	           </td>
	           
	       </tr>
	    </table>
	</div>
	
	
	<div class="information">
	    <table class="result_part_table1">
	       <tr style="">
	           <td style="width:165px;">
	               
	           </td>
	           
	            <td style="width:25%;">
                    <?php 
                        $classnumber = $row["classnumber"]; // Assuming $row["classnumber"] contains the class number
                        $imagePath = "../img/" . $classnumber . ".png"; // Construct the image path
                        
                        // Check if the image file exists
                        if (file_exists($imagePath)) {
                            echo "<img src='$imagePath' alt='Signature for Class $classnumber' style='width:100px; height:auto;'>";
                        }
                    ?>
                </td>
	            <td style="width:25%;">
	                <center>
	                    <img src="../img/hmsign.png" style="width: 120px">
	                </center>
	            </td>
	            <td style="width:25%;" rowspan="2">
	                <div style='text-align: center;'>
<?php
	$baselink;
	$softlink;
	$deg="";
    $count2=1;
    $sel_query2="Select * from schoolinfo";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    $softlink=$row2['softlink'];
    $deg=$row2['head_deg'];
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
$text = $softlink."/transcript/pubstutrans.php"."?stuid=".$stuid."&examid=".$examid."";

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
	            </td>
	           
	       </tr>
	       
	       <tr style="">
	           <td style="width:25%;">
	               <b>Guardian's Sign</b>
	           </td>
	           
	            <td style="width:25%;">
	                <b>Class Teacher's Sign</b>
	            </td>
	            <td style="width:25%;">
	                
	                
			    <b><?php echo $headname;?></b><br><?php echo $deg;?>
	            </td>
	            
	           
	       </tr>
	       
	    </table>
	</div>
		



		
		
	</div><!--END WRAPWR-->
</div><!--END bm-->
</div><!--END out1-->
	
</div>
	<?php $count++; } ?>
	</section>
</body>
</html>