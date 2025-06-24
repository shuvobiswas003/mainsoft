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
	<title>Exam Contoral</title>
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
		
		}
		.warper h1{
		color:
		#131212;
		font-size: 32px;
		font-family: Gabriola;
		}
		.warper h2{
		font-size:25px;
		padding-bottom:6px;
		
		}
		.warper h3{
		font-size: 18px;
		font-family: Century Gothic;
		}
		.header_left{
			float:left;
			margin-left: 10px;
		}
		.header_right{
		float:right;
		}
		.header_left h4{
		font-size: 24px;
		line-height: 29px;
		margin-left: 29px;
		font-family: Gabriola;
		margin-top:0px;
		}
		.header_right img{
		width:124px;
		height:124px;
		margin-right:29px;
		}
		
		.futter{
		margin-top: 22%;
		width: 100%;
		}
		#table{
		width: 92%;
		height: auto;
		}
		th{
		height: 35px;
		font-family: BrowalliaUPC;
		font-size: 15px;
		}
		td{
		height: 50px;
		font-family: Rockwell;
		text-align: center;
		text-transform: capitalize;
		}
		#es{
			width:120px;
		}
		#td{
			width:150px;
		}
		.end_part_left{
		float: left;
		width: 19%;
		border-top: 1px solid black;
		margin-top: 58px;
		margin-left: 29px;
		}
		.end_part_middile{

			float:left;
			margin-left:100px;
			margin-top:5px;
		}
		.end_part_right{
		float:right;
		width:30%;
		
		margin-top: 58px;
		margin-right: 29px;
		}
		.end_part_left h5{
		 font-family: Lucida Calligraphy;
		font-size: 11px;
		 }
		 .end_part_right h5{
		 font-family: Lucida Calligraphy;
		font-size: 11px;
		 }
	</style>
</head>
<body>
<?php
	$examid=$_REQUEST['examid'];
	$classnumber=$_REQUEST['classnumber'];
	$secgroupname=$_REQUEST['secgroupname'];
	require "../interdb.php";
	$count=1;
	$sel_query="Select * from student Where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll;";
	$result = mysqli_query($link,$sel_query);
	while($row = mysqli_fetch_assoc($result)) {?>
	
	<div class="warper">
		<div class="head_part">
			<center>
			<table>
				<tr>
					<td>
						<img src="../img/lego.png?<?php echo time()?>"  alt="" height="100px;">
					</td>
					<td>
						<!--School name And Info-->
			
			<h1>
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
			<center><h3>Exam Attendence Sheet</h3></center>
					</td>
				</tr>
			</table>
		
			
		</div>
		<div class="header_bottom">
			<div class="header_left">
				<h4><font style="font-weight:200">Student Name: </font><b><?php echo $row['name'];?></b></h4>
				<h4><font style="font-weight:200">Father Name:</font> <b><?php echo $row['fname'];?></b></h4>
				<h4><font style="font-weight:200">Mother Name: </font><b><?php echo $row['mname'];?></b></h4>
				
				<h4><font style="font-weight:200">Class: <b><?php echo $row['classnumber'];?></b>    Roll:    <big style="font-size:40px"> <b><?php echo ' '.$row['roll'].' ';?> </b> </big>  Sec: <b><?php echo $row['secgroup'];?></b></font></h4>
			</div>
			<div class="header_right">
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
			
			</div>
		</div>
		<div class="futter">

				<table border="1" cellpadding="0" cellspacing="0" id="table">
					<tr>
						<th>Sub Code</th>
						<th>Sub Name</th>
						<th>Exam Date</th>
						<th>Exam Time</th>
						<th>Student sign</th>
						<th>Invigilator Sign </th>
						<th>Paper Barcode</th>
					</tr>
						
						<?php
			            $count3=1;
			            $sel_query3="Select * from examroutine where exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname' AND active='1' Order by examdate";
			            $result3 = mysqli_query($link,$sel_query3);
			            while($row3 = mysqli_fetch_assoc($result3)) {
			            	$subcode=$row3['subcode'];
			        	?>
			        	<?php
						$uniqid=$row["uniqid"];
			            $count2=1;
			            $sel_query2="Select * from sturegsubject where uniqid='$uniqid' AND (substatus=1 OR substatus=4) AND subcode='$subcode';";
			            $result2 = mysqli_query($link,$sel_query2);
			            while($row2 = mysqli_fetch_assoc($result2)) {
			        	?>
					<tr>
						<td><?php echo $row3['subcode'];?></td>
						<td><?php echo $row3['subname'];?></td>
						<td><?php echo $row3['examdate'];?></td>
						<td><?php echo $row3['examtime'];?></td>
						<td id="es"></td>
						<td id="es"></td>
						<td id="td"></td>

					</tr>
					<?php $count3++; } ?>
					<?php $count2++; } ?>
					
				</table>
		</div>
		<div class="end_part">
			<div class="end_part_left"><h5>Exam Controlar sign</h5></div>
			<div class="end_part_middile">
			<div style='text-align: center;'>
			 <?php
    require '../barcode/vendor/autoload.php';
    $data=$row['uniqid'];
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,60)) . '">';
    echo "<br>";
    echo $data;
    ?>
			</div>
			</div>
			<div class="end_part_right">
				<center>
			    <img src='../img/hmsign.png?<?php echo time()?>' style="width:90px;height:30px;">
			    <h5><?php echo $headname?></h5>
			    <h5><?php echo $deg?></h5>
			    </center>
			    </div>
		</div>
	</div>
	<?php $count++; } ?>
</body>
</html>