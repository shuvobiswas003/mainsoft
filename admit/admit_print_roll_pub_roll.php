<?php

require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;



?>

<?php
// Include the database connection
include '../interdb.php';  // This will include your db connection where $link is defined

// Get the student ID from the request
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$stuid = $classnumber.$secgroupname.$roll;

// SQL query to check if the student has paid
$sql = "
    SELECT sp.status
    FROM set_admit_id sai
    JOIN studentpayment sp ON sai.payid = sp.pcatid
    WHERE sp.stuid = ?";

// Prepare the statement
if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind the student ID to the SQL query
    mysqli_stmt_bind_param($stmt, "s", $stuid);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Bind the result
    mysqli_stmt_bind_result($stmt, $status);
    
    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        // Check if the payment status is "paid"
        if ($status === "Paid") {
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
	width:793px;
	margin: 0 auto;
	}
	.main_part{
	margin-top: 7px;
	margin-bottom: 30px;
    border: 3px solid black;
    height: 543px;
    background-size: 795px 543px;
    padding-bottom: 0px;
    border-radius: 21px;
	}
	.main_part h1{
	color: #100101;
    font-size: 29px;
    padding-top: 10px;
	padding-bottom:5px;
	}
	.main_part h2{
	padding-left: 50px;
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
	margin-left: -65px;
	}
	.main_left h4{
	padding-left: 50px;
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
	font-size: 10px;
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
	padding-top: 20px;
}
.footerpart_left{
	height: 100px;
	float:left;
	text-align: left;
  margin-top: -14px;
  margin-left: 20px;
}
.footerpart_middle{
	height: 100px;
	width: 400px;
	float:left;
}
.footerpart_middle img{
	margin-left: auto;
  margin-right: auto;
}
.footerpart_right{
	text-align: right;
  margin-right: -50px;
    margin-top: -27px;
}
#qr{
	height: 100px;
	width: 100px;
}

	</style>
</head>
<body>
	<div class="wraper">
	<?php

		$examid='1';
        

		require "../interdb.php";
		$count=1;
		$sel_query="Select * from student WHERE uniqid='$stuid'ORDER BY roll;";
		$result = mysqli_query($link,$sel_query);
			while($row = mysqli_fetch_assoc($result)) {
				$classnumber=$row['classnumber'];
				$secgroupname=$row['secgroup'];
				$stuid=$row['uniqid'];
				?>
		
		<div class="main_part">
			<!--School name And Info-->
			<div style="float: left;">
				<img src="../img/lego.png?<?php echo time()?>"  alt="" height="100px;">
			</div>
			<center><h1>
				<?php
				$baselink;
				$softlink;
				$deg;
				$headname;
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                $softlink=$row2['softlink'];
            ?>
            <?php echo $row2['schoolname']?>
            <?php
            $baselink=$row2['website'];
            $headname=$row2['headname'];
            $deg=$row2['head_deg'];
            ?>

            <?php $count2++; } ?>

			</h1></center>

			<!--Exam Name-->
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


			<center><h3>Admit Card</h3></center>
			<div class="main_left">
				<h2><font style="font-weight:200;">Student's Name:   </font> <?php echo strtoupper($row["name"]);?></h2>
				<h4><font style="font-weight:175;">Father's Name: </font> <?php echo strtoupper($row["fname"]);?></h4>
				<h4><font style="font-weight:175;">Mother's Name:</font> <?php echo strtoupper($row["mname"]);?></h4>
				<h4><font style="font-weight:175;">Date Of Birth:</font> <?php echo $row["dob"];?></h4>
				<h4><font style="font-weight:175;">Class:</font> <?php echo $row['classnumber'];?>  <font style="font-weight:175;">Section/Group:</font><b><?php echo $row["secgroup"];?></b> <font style="font-weight:175;">Examinee Type:</font>Regular</h4>
			</div>
			<div class="main_right">
				<!--Img Start-->
			<?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=="" OR $imgsl=="IMG_.png"){
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
				<h4 id="roll"><center><font style="font-weight:175;">Roll: </font><?php echo $row["roll"];?></center></h4>
				
			</div>
			<div class="main_top">
			<h5></h5>
			<center>
				<div class="tablepart">
				<div class="tableleft">
					<div class='table-fix'>
						<center>
						<table border="0" id="subtab">
						<tr>
							<th>Sub. Code</th>
							<th>Sub. Name</th>
							<th>Exam Date</th>
							<th>Exam Time</th>
						</tr>
						<?php
						require "../interdb.php";
						
			        	?>
						<?php
						
						require "../interdb.php";
			            $count3=1;
			            $sel_query3="Select * from examroutine where exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname' AND active='1'AND align='l' ORDER BY examdate ASC";
			            $result3 = mysqli_query($link,$sel_query3);
			            while($row3 = mysqli_fetch_assoc($result3)) {
			        	?>
			        	<tr>
							<td><?php echo $row3['subcode'];?></td>
							<td><?php echo $row3['subname'];?></td>
							<td><?php echo $row3['examdate'];?></td>
							<td><?php echo $row3['examtime'];?></td>
						</tr>
					
						<?php $count3++; } ?>
						
						</table>
						</center>
					</div>

				</div>
				<div class="tableright">
					<div class='table-fix'>
						<center>
						<table border="0" id="subtab">
						<tr>
							<th>Sub. Code</th>
							<th>Sub. Name</th>
							<th>Exam Date</th>
							<th>Exam Time</th>
						</tr>
						<?php
						require "../interdb.php";
						
			        	?>
						<?php
						
						require "../interdb.php";
			            $count3=1;
			            $sel_query3="Select * from examroutine where exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname' AND active='1'AND align='r' ORDER BY examdate ASC";
			            $result3 = mysqli_query($link,$sel_query3);
			            while($row3 = mysqli_fetch_assoc($result3)) {
			        	?>
			        	<tr>
							<td><?php echo $row3['subcode'];?></td>
							<td><?php echo $row3['subname'];?></td>
							<td><?php echo $row3['examdate'];?></td>
							<td><?php echo $row3['examtime'];?></td>
						</tr>
					
						<?php $count3++; } ?>
						
						</table>
						</center>
					</div>
				</div>
				</div>
					
				</center>
				</div>
		<div class="clear"></div>
		<div class="footer_part">
			<div class="footerpart_left">
				<center>
				
				
			   
				
				<h5 style="margin-top: 60px;">Class Teacher Sign</h5>
				</center>
			</div>
			<div class="footerpart_middle">
					<div style='text-align: center;'>
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
$text = $softlink.$transdir."?stuid=".$stuid."&examid=".$examid."";

$qr_code = QrCode::create($text);

$writer = new PngWriter;
$result5 = $writer->write($qr_code);

// Get the base64-encoded image data
$imageData = base64_encode($result5->getString());
echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
						?>
<h6>Scan This QR Code To See Result After Publish</h6>
					</div>
			</div>
			<div class="footerpart_right">
				<center>
					
					<img src='../img/hmsign.png' style="width:90px;height:30px;margin-top: 40px;">
					<h4><?php echo $headname;?></h4>
					<h5><?php echo $deg?></h5>
				</center>
			</div>
		</div>

		</div>

		
		<?php $count++; } ?>
		
		
		
		
		
	
	</div>

	<?php
        } else {
            echo "Payment not completed. Redirecting back to the payment page.";
            // Redirect back to the student payment page
            header("Location: ../payment_process_qr.php?stuid=$stuid"); // Change to your actual payment page
            exit;
        }
    } else {
        // No matching record found
        echo "Student not found or no payment record available.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle query preparation error
    echo "Error preparing the query: " . mysqli_error($link);
}

// Close the database connection if necessary (optional, based on your usage)
mysqli_close($link);
?>
</body>
</html>

