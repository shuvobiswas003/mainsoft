<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style type="text/css">
        #seat{
            float: left;
            width: 140px;
        }

        #seat li{
           font-size: 15px;
        }
    </style>
</head>
<body>
	<?php
	$classnumber=$_REQUEST['classnumber'];
	$secgroupname=$_REQUEST['secgroupname'];
	require "../interdb.php";
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
            <h1>
                Student Summery 
            </h1>
			
		</center>

<center>
<h2>Class: <?php echo $classnumber;?>  Sec/Group: <?php echo $secgroupname;?></h2>
<h3>Print Date: <?php echo date("Y-m-d h:i:sa")?></h3>
</center>




        <div class="row">
            <div class="container">
                
    <center>   
	   <table class="table" border="1" style="margin-left: 20px">
        <thead>
            <tr>
                <th>Class</th>
                <th>Section</th>
                <th>StuID</th> 
                <th>Photo</th>
                <th>Roll</th>
                <th>Name</th>
                <th>Barcode</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $count=1;
        $sel_query="SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        
    <tr>
    <td><?php echo $row['classnumber'];?></td>
    <td><?php echo $row['secgroup'];?></td>
    <td><?php echo $row['uniqid'];?></td>
    <td>
        <!--Img Start-->
        <?php
        $imgsl=$row["imgname"];
        if($imgsl=="IMG_0.png" OR $imgsl=""){
        ?>
        <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg" style="height: 130px;">
        <?php
        }else{
        ?>
        <img src="../img/student/<?php echo $row['imgname'];?>" style="height: 130px;">

        <?php
        }
        ?>
        <!--Img End-->

    </td>
    
    
    <th><?php echo $row['roll'];?></th>
    <td><?php echo $row['name'];?></td>
    <td style="padding: 40px">
    <center>
    <?php
    require '../barcode/vendor/autoload.php';
    $data=$row['uniqid'];
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,60)) . '">';
    echo "<br>";
    echo $data;
    ?>
    </center>
    </td>
        </tr>
        
        <?php $count++;}?>
        </tbody>
        </table>
        </center>
        
        </div>
        </div>

</body>
</html>