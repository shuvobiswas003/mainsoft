<?php
$cheakdata=$_POST['stuselect'];
$stuid=$_POST['stuid'];
$sturoll=$_POST['sturoll'];
$stuname=$_POST['stuname'];

for ($i = 0; $i < count($cheakdata); $i++) {
	$cheakdatan =$cheakdata[$i];
	$stunamen=$stuname[$i];
	echo $cheakdatan.$stunamen;
	echo "<br>";
}
?>