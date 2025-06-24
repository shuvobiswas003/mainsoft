<!DOCTYPE html>
<html>
<head>
	<title>Mark Entry 6 & 7</title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">
	<!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="../css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="../css/waves-effect.css" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        
        <style type="text/css">
            #markicon{
                width:10px;
                height:10px;
                float:left;
                margin-left:2px;
            }
        </style>

</head>
<body>
	<div class="row">
    <div class="container">
<?php
require "../interdb.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
?>
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
                $sel_query2="Select * from exam67 where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>
            <?php $count2++; } ?>
			</h2>
            <h2>
            Class: <?php echo $classnumber?>
            </h2>
            <h2>
            Section: <?php echo $secgroupname?>
            </h2>
            <h2>Subject Code: <?php echo $subcode?></h2>
            <?php
               $count2=1;
               $sel_query2="Select * from subject where classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode='$subcode'";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            
            <h2>
            Subject Name: <?php echo $row2['subname']?>
            </h2>
            <?php $count2++; } ?>


<span style="font-size: 10px;">
<table class="table table-striped table-bordered">
<thead>
<tr>
    <td>Roll</td>
    <td>Student Name</td>
<?php
$count2=1;
$sel_query2="Select * from lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' ORDER BY subcode ASC, chapterno ASC, lno ASC;";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
    <td><?php echo $classnumber;?>.<?php echo $row2['chapterno']?>.<?php echo $row2['lno']?></td>
<?php $count2++; } ?>
</tr>
</thead>

<?php
$count2=1;
$sel_query2="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
<tr>
    <td><?php echo $row2['roll'];?></td>
    <td><?php 
    $stuname=$row2['name'];
    if ($stuname=="na" OR $stuname=="NA" OR  $stuname=="N/A") {
        echo "";
    }else{
        echo $stuname;
    }
    ;?></td>
<!--Getting Lessons -->
<?php
$count2=1;
$sel_query3="Select * from lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' ORDER BY subcode ASC, chapterno ASC, lno ASC;";
$result3 = mysqli_query($link,$sel_query3);
while($row3 = mysqli_fetch_assoc($result3)) {
$chapterno=$row3['chapterno'];
$lessonno=$row3['lno'];
$stuid=$row2['uniqid'];
$uni=$examid.$subcode.$chapterno.$lessonno.$stuid;

?>
    <td>
<?php
$sel_query10="SELECT * FROM `exammark67` where uni='$uni'";
$result10 = mysqli_query($link, $sel_query10);
if (mysqli_num_rows($result10) > 0) {
while ($row10 = mysqli_fetch_assoc($result10)) {
    $pi=$row10['pi'];
//cheaking Square;
$cpi=3;
if($cpi==$pi){
    echo "<img src='../img/markicon/sf.png'id='markicon'>";
}else{
    echo "<img src='../img/markicon/sb.png' id='markicon'>";
}
//cheaking Circle;
$cpi=2;
if($cpi==$pi){
    echo "<img src='../img/markicon/cf.png' id='markicon'>";
}else{
    echo "<img src='../img/markicon/cb.png' id='markicon'>";
}
//cheaking Triangle;
$cpi=1;
if($cpi==$pi){
    echo "<img src='../img/markicon/tf.png' id='markicon'>";
}else{
    echo "<img src='../img/markicon/tb.png' id='markicon'>";
}
}
}else{
    ?>
<img src="../img/markicon/sb.png" id='markicon'>
<img src="../img/markicon/cb.png" id='markicon'>
<img src="../img/markicon/tb.png" id='markicon'>

<?php
}
?>

    </td>
<?php $count2++; } ?>



</tr>
<?php $count2++; } ?>

</table>
</span>




</center>
<?php } ?>
</div><!--Ending Col-->
</div>
</div><!--Ending Row-->
</body>
</html>