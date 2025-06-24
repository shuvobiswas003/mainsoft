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
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}

$id=$_REQUEST['id'];
$stuid=$_REQUEST['stuid'];
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
		
	.warper {
    width: 1000px;
    min-height: 1400px;
    margin-top: 15px;
    background: url(ad_bg.png?<?php echo time(); ?>) no-repeat;
    background-size: cover;
	}
		#form_no{
	padding-left: 220px;
    margin-top: -16px;
		}
		#session{
		padding-top: 12px;
    padding-left: 165px;
			
		}
		#roll{
	padding-left: 190px;
    padding-top: 15px;
		}
	#section{
	    padding-left: 150px;
    padding-top: 14px;
	}
    
	
	</style>

	<link rel="stylesheet" href="mycss.css">
</head>
<body>

<?php
require '../interdb.php';
$sel_query2="Select * from addmission_ssc_student WHERE id='$id'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {

$sel_query3="Select * from student WHERE uniqid='$stuid'";
$result3 = mysqli_query($link,$sel_query3);
while($row3 = mysqli_fetch_assoc($result3)) {

?>
<section class="transcript">
	
	<div class="warper">
		<div class="mainpart">
			<!--Img Start-->
            <?php
            $imgsl=$row3["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            
            <?php
            }else{
            ?>
            <img src="../img/student/<?php echo $row3['imgname'];?>" id="stu_img" style="    height: 200px;
    		margin-left: 835px;
    		padding-top: 10px;
            ">

            <?php
            }
            ?>
            <!--Img End-->


		<h2 id="form_no">
			<?php echo $row2['id']?>
		</h2>
		<h2 id="session">2024-2025</h2>
		

		<h2 id="roll"><?php echo $row3['roll']?></h2>
		<h2 id="section"><?php echo $row3['secgroup']?></h2>
		
		<span>
		<?php
		$text = $row3['name'].",".$row2['ssc_roll'].",".$row2['ssc_reg'];

		$qr_code = QrCode::create($text);

		$writer = new PngWriter;
		$result5 = $writer->write($qr_code);

		// Get the base64-encoded image data
		$imageData = base64_encode($result5->getString());
		echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
		?>
		</span>

		<h2 id="stu_name"><?php echo $row3['name']?></h2>

		<h2 id="bris_no"><?php echo $row3['birthid']?></h2>

		<h2 id="date_of_birth"><?php echo $row3['dob']?></h2>
		<h2 id="fname"><?php echo $row3['fname']?></h2>
		<h2 id="fnid"><?php echo $row3['fnid']?></h2>
		<h2 id="f_opq"><?php echo $row2['f_opq']?></h2>
		<h2 id="f_income"><?php echo $row2['f_income']?></h2>
		<h2 id="mobile"><?php echo $row3['mobile']?></h2>
		<h2 id="fname"><?php echo $row3['mname']?></h2>
		<h2 id="fnid"><?php echo $row3['mnid']?></h2>

		<h2 id="l_name"><?php echo $row2['l_name']?></h2>
		<h2 id="l_opc"><?php echo $row2['l_opc']?></h2>
		<h2 id="l_income"><?php echo $row2['l_income']?></h2>
		<h2 id="l_mobile"><?php echo $row2['l_phone']?></h2>

		<h2 id="marital"><?php echo $row2['marital']?></h2>
		<h2 id="sex"><?php echo $row3['sex']?></h2>
		<h2 id="religion"><?php echo $row2['religion']?></h2>
		<h2 id="blood"><?php echo $row2['blood']?></h2>

		<h2 id="address"><?php echo $row3['address']?></h2>


		

		<h2 id="ssc_roll"><?php echo $row2['ssc_roll']?></h2>
		<h2 id="ssc_reg"><?php echo $row2['ssc_reg']?></h2>
		<h2 id="passingYear"><?php echo $row2['passingYear']?></h2>

		<h2 id="board"><?php echo $row2['board']?></h2>
		<h2 id="gpa"><?php echo $row2['gpa']?></h2>
		<h2 id="passing_school"><?php echo $row2['passing_school']?></h2>

	
	<?php 
// Database connection (assuming $link is your database connection variable)
// Example: $link = new mysqli('host', 'user', 'password', 'database');

// Fetch data from the database
$sql10 = "SELECT * FROM sturegsubject WHERE uniqid='$stuid' AND (substatus=1 OR substatus=4) ORDER BY substatus ASC, subcode ASC";
$result10 = $link->query($sql10);

$data = [];
if ($result10->num_rows > 0) {
    while ($row10 = $result10->fetch_assoc()) {
        $data[] = $row10;
    }
} else {
    echo "0 results";
}

function getSubjectStatus($subcode, $substatus) {
    $mandatoryCodes = [101, 102, 107, 108, 275];
    
    if (in_array($subcode, $mandatoryCodes)) {
        return 'Mandatory';
    } elseif ($substatus == 4) {
        return '4th Subject';
    } else {
        return 'Compulsory';
    }
}

// Separate the data into categories
$mandatory = [];
$compulsory = [];
$fourthSubject = [];

foreach ($data as $subject) {
    $status = getSubjectStatus($subject['subcode'], $subject['substatus']);
    if ($status == 'Mandatory') {
        $mandatory[] = $subject;
    } elseif ($status == 'Compulsory') {
        $compulsory[] = $subject;
    } else {
        $fourthSubject[] = $subject;
    }
}

// Generate the HTML table
echo '<table border="1" id="my-table">';
echo '<tr>';
echo '<th>Subject Code</th>';
echo '<th>Subject Name</th>';
echo '<th>Subject Status</th>';
echo '<th>Subject Code</th>';
echo '<th>Subject Name</th>';
echo '<th>Subject Status</th>';
echo '</tr>';

// Add Mandatory subjects first
for ($i = 0; $i < count($mandatory); $i += 2) {
    echo '<tr>';
    
    echo '<td>' . $mandatory[$i]['subcode'] . '</td>';
    echo '<td>' . $mandatory[$i]['subname'] . '</td>';
    echo '<td>' . getSubjectStatus($mandatory[$i]['subcode'], $mandatory[$i]['substatus']) . '</td>';
   
    if (isset($mandatory[$i + 1])) {
        echo '<td>' . $mandatory[$i + 1]['subcode'] . '</td>';
        echo '<td>' . $mandatory[$i + 1]['subname'] . '</td>';
        echo '<td>' . getSubjectStatus($mandatory[$i + 1]['subcode'], $mandatory[$i + 1]['substatus']) . '</td>';
    } else {
        echo '<td colspan="3"></td>';
    }
}

// Add a gap after the Mandatory subjects if there are any
if (count($mandatory) > 0) {
    echo '<tr><td colspan="6"></td></tr>';
}

// Add Compulsory subjects next
for ($i = 0; $i < count($compulsory); $i += 2) {
    echo '<tr>';
    
    echo '<td>' . $compulsory[$i]['subcode'] . '</td>';
    echo '<td>' . $compulsory[$i]['subname'] . '</td>';
    echo '<td>' . getSubjectStatus($compulsory[$i]['subcode'], $compulsory[$i]['substatus']) . '</td>';
   
    if (isset($compulsory[$i + 1])) {
        echo '<td>' . $compulsory[$i + 1]['subcode'] . '</td>';
        echo '<td>' . $compulsory[$i + 1]['subname'] . '</td>';
        echo '<td>' . getSubjectStatus($compulsory[$i + 1]['subcode'], $compulsory[$i + 1]['substatus']) . '</td>';
    } else {
        echo '<td colspan="3"></td>';
    }
}

// Add a gap after the Compulsory subjects if there are any
if (count($compulsory) > 0) {
    echo '<tr><td colspan="6"></td></tr>';
}

// Add 4th Subject subjects last
for ($i = 0; $i < count($fourthSubject); $i += 2) {
    echo '<tr>';
    
    echo '<th>' . $fourthSubject[$i]['subcode'] . '</th>';
    echo '<th>' . $fourthSubject[$i]['subname'] . '</th>';
    echo '<th>' . getSubjectStatus($fourthSubject[$i]['subcode'], $fourthSubject[$i]['substatus']) . '</th>';
   
    if (isset($fourthSubject[$i + 1])) {
        echo '<th>' . $fourthSubject[$i + 1]['subcode'] . '</th>';
        echo '<th>' . $fourthSubject[$i + 1]['subname'] . '</th>';
        echo '<th>' . getSubjectStatus($fourthSubject[$i + 1]['subcode'], $fourthSubject[$i + 1]['substatus']) . '</th>';
    } else {
        echo '<th colspan="3"></th>';
    }
}

echo '</table>';
?>



	</div>

	</section>

<?php
}//ending student

} //ending student ssc
?>
</body>
</html>