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

	<title></title>

	<style type="text/css">

	*{

	margin;0 auto;

	padding:0 auto;

	}	

	 h1{

	font-size: 19px;

	margin-left: 159px;

}

	th{

	text-align:center;

	font-size:10px;

	width:77px !important;

	height:35px

	}

	td{

	font-size: 10px;

	text-align: center;

	line-height: 21px;

	}

	#thh{

		width:10% !important;

	}

	

	</style>

	<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>

<?php

$examid=$_REQUEST['examid'];

$classnumber=$_REQUEST['classnumber'];

$secgroupname=$_REQUEST['secgroupname'];



?>

<center>

<h1 style="font-size:40px;">

<?php

require "../interdb.php";

$count2=1;

$sel_query2="Select * from schoolinfo";

$result2 = mysqli_query($link,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) {

?>

<?php echo $row2['schoolname']?>



<?php $count2++; } ?>

</h1>

</center>

<center><h1 style="font-size:25px;margin-top:-15px;">Exam Name: 

<?php

require "../interdb.php";

$count2=1;

$sel_query2="Select * from exam where exid='$examid'";

$result2 = mysqli_query($link,$sel_query2);

while($row2 = mysqli_fetch_assoc($result2)) {

?>

<?php echo $row2['examname']?>



<?php $count2++; } ?>



</h1></center>

<center><h1 style="font-size:25px;margin-top:-15px;">Tabulation Sheet Of Class 

<?php echo $classnumber;?></h1></center>

<p></p>

		<center>

		<div class="container-fluid">

			<div class="row">

				

			

		<div class="col-lg-12">

		<table class="table table-bordered">

		<tbody>

			

	<?php

    $count=1;

    $sel_query="Select * from student where classnumber=$classnumber and secgroup='$secgroupname' ORDER BY roll ASC;";

    $result = mysqli_query($link,$sel_query);

    while($row = mysqli_fetch_assoc($result)) {?>

	<tr>

		<th> <b><?php echo $row['roll'];?></b></th>

		<th > <b><?php echo $row['name'];?></b></th>
		<th > <b><?php echo $row['groupsec'];?></b></th>
		

	

	<?php

	$suniqid=$row['uniqid'];

    require "../interdb.php";

    $count1=1;

    $sel_query1="SELECT * FROM exammark WHERE examid='$examid'AND suniqid='$suniqid' ORDER BY subcode;";

    $result1 = mysqli_query($link,$sel_query1);

    while($row1 = mysqli_fetch_assoc($result1)) {?>

    		<td colspan="3"><?php echo $row1['subname'];?></td>

    		

    			<td><?php echo $row1['cq'];?></td>

    			<td><?php echo $row1['mcq'];?></td>

    			<td><?php echo $row1['practical'];?></td>

	<?php $count1++; }?>

	<td><b>

		<!-- GPA Counting Start-->

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

			    </b>

					</td>

					<!--Gpa END-->

	<?php $count++;} ?>

	</tr>

	</tbody>

		</table>

	</div>

	</div>

		</div>

	</center>

</body>

</html>