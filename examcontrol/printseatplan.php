<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        #seat{
            float: left;
            width: 120px;
        }
    </style>
</head>
<body>
	<?php
	$examid=$_REQUEST['examid'];
	$bnumber=$_REQUEST['bnumber'];
	$roomnumber=$_REQUEST['roomnmber'];
	$colofbench=$_REQUEST['colofbench'];
	require "../interdb.php";
	?>
    <?php

    //getting Start Roll
    $startroll;
    $endroll;
    $classnumber;
    $section;
    $sel_query="SELECT * FROM examseatplan WHERE roomnumber='$roomnumber' AND examid='$examid'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $startroll=$row['startroll'];
            $endroll=$row['endroll'];
            $classnumber=$row['classnumber'];
            $section=$row['section'];

        }
    //getting student
        $studentcounter=0;
        require "../interdb.php";
        $sql7 = "SELECT roll FROM student Where classnumber='$classnumber' AND secgroup='$section' AND roll BETWEEN $startroll AND $endroll  ORDER BY roll ASC ";
        $result = $link->query($sql7);

        // Create an empty array to store the results
        $data = array();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
        // Loop through each row and add it to the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        } 
        
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
                $sel_query2="Select * from exam where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>
			</h2>

			<h1><span id="ada">Seat Plan(Class:<?php echo $classnumber?> Section: <?php echo $section?>)</span></h1>
			<h2>
			<?php
               $count2=1;
               $sel_query2="Select * from building WHERE bnumber='$bnumber'";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['bname']?>

            <?php $count2++; } ?>
            <?php echo "Room Number: ".$roomnumber?>

            <?php
               $count2=1;
               $sel_query2="Select * from building WHERE bnumber='$bnumber'";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['bname']?>

            <?php $count2++; } ?>

        	</h2>
		</center>
	
    <?php
	

    //getting bench collumn
        $count=1;
        $sel_query="SELECT * FROM buildingroom WHERE roomnumber='$roomnumber' AND bnumber='$bnumber'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $colofbech=$row['rowofbench'];
        ?>
        <center>
        <table border="1" style="margin-left: 20px">
        <tr>
        <td>
            Entry
        </td>
        <?php
        //getting each collumn row of bench;
        for ($a=1; $a<=$colofbech; $a++) {
        ?>
        <td>
        <?php
        $count1=1;
        $sel_query1="SELECT * FROM buildingroombench WHERE roomnumber='$roomnumber' AND rownumber='$a'";
        $result1 = mysqli_query($link,$sel_query1);
        while($row1 = mysqli_fetch_assoc($result1)) {
            $numberrow=$row1['numberofbench'];
            $tablestartroll=$startroll;
            $tableendroll=$startroll+($numberrow*2);
            $startroll=$tableendroll;
            $tablecountervar=$tablestartroll+$numberrow;
            for ($j=1; $j<=$numberrow; $j++) { 
                $benchrow=$j;
            ?>

            
        <?php 
        while ($tablestartroll<$tablecountervar) {
        ?>
        
        

        <!--1st Col Start-->
      
            <center>Bench Column NO: <?php echo $a;?></center>
        <ul id="seat">
        <?php
        for ($k=0; $k <$numberrow ; $k++) { 
        $benchrow=$k+1;

        ?>
        
        <div class="left_bench" style="float:left;">
    
        <li>Roll:
        <?php
if (isset($data[$studentcounter]['roll'])) {
  echo $data[$studentcounter]['roll'];
} else {
  echo "N/A";
}
        
        $studentcounter++;
        $tablestartroll++;
        ?>
        </li>
        
        <?php } ?>
        </ul>


        <ul id="seat">
        <?php
        for ($k=0; $k <$numberrow ; $k++) { 
        $benchrow=$k+1;

        ?>
        
        <div class="left_bench" style="float:left;">
    
        <li>Roll:
        <?php
if (isset($data[$studentcounter]['roll'])) {
  echo $data[$studentcounter]['roll'];
} else {
  echo "N/A";
}
        
        $studentcounter++;
        $tablestartroll++;
        ?>
        </li>
        
        <?php } ?>
        </ul>
        <!--1st Col End-->


        

        <?php } ?>
        <?php } 
        $count1++;
        } //ending each each row of bench
        ?>
    </td>
        <td>
            Entry
        </td>
        <?php
        }//ending  column for loop
        ?>

        <?php
        echo "</tr>";
        echo "</table>";
        echo "</center>";
        $count++;
        }
	?>


</body>
</html>