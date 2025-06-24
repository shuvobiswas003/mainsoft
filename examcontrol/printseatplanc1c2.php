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
            width: 140px;
        }

        #seat li{
           font-size: 15px;
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

    //getting Start Roll C1 & C2
    $startroll;
    $endroll;
    $classnumber;
    $section;
    //getting c2 information
    $startroll2;
    $endroll2;
    $classnumber2;
    $section2;


    $sel_query="SELECT * FROM examseatplanc1c2 WHERE roomnumber='$roomnumber' AND examid='$examid'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $startroll=$row['startroll'];
            $endroll=$row['endroll'];
            $classnumber=$row['classnumber'];
            $section=$row['section'];

            //getting c2
            $startroll2=$row['startroll2'];
            $endroll2=$row['endroll2'];
            $classnumber2=$row['classnumber2'];
            $section2=$row['section2'];
        }

    //getting student C1
        $studentcounter=0;
        require "../interdb.php";
        $sql7 = "SELECT * FROM student Where classnumber='$classnumber' AND secgroup='$section' AND roll BETWEEN $startroll AND $endroll  ORDER BY roll ASC ";
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


        //getting student C1
        $studentcounter2=0;
        require "../interdb.php";
        $sql7 = "SELECT * FROM student Where classnumber='$classnumber2' AND secgroup='$section2' AND roll BETWEEN $startroll2 AND $endroll2  ORDER BY roll ASC ";
        $result = $link->query($sql7);

        // Create an empty array to store the results
        $data2 = array();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
        // Loop through each row and add it to the array
        while ($row = $result->fetch_assoc()) {
            $data2[] = $row;
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

			<h1><span id="ada">Seat Plan(Class:<?php echo $classnumber?> Section: <?php echo $section?> Roll(<?php echo $startroll;?>-<?php echo $endroll;?>))&(Class:<?php echo $classnumber2?> Section: <?php echo $section2?> Roll(<?php echo $startroll2;?>-<?php echo $endroll2;?>)</span></h1>
			<h2>
            <?php
               $count2=1;
               $sel_query2="Select * from building WHERE bnumber='$bnumber'";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['bname']?>

            <?php $count2++; } ?>
            -
            <?php echo "Room Number: ".$roomnumber?>
            (
            <?php
               $count2=1;
               $sel_query2="Select * from buildingroom WHERE roomnumber='$roomnumber'";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['roomfloor']?>

            <?php $count2++; } ?>
            )
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
                <?php
                for ($a=1; $a<=$colofbech; $a++) {
                ?>
                <td></td>
                <td colspan="2">
                    <center>
                    Bench Column NO:<?php echo $a?>
                    </center>
                </td>

            <?php }?>
            </tr>
        <tr>
        <td>
            Entry
        </td>
        <?php
        //getting each collumn row of bench;
        for ($a=1; $a<=$colofbech; $a++) {
        ?>
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

        
    
        
        

        <!--Left Seat-->
        <td>
        <ul id="seat">
        <?php
        for ($k=0; $k <$numberrow ; $k++) { 
        $benchrow=$k+1;
        ?>

        <li>
        <?php

        if (isset($data[$studentcounter]['roll'])) {
        echo "C-".$data[$studentcounter]['classnumber'];
        echo " Roll-".$data[$studentcounter]['roll'];
        } else {
        echo "N/A";
        }

        $studentcounter++;
        $tablestartroll++;
        ?>

        </li>

        <?php } ?>

        </ul>
        </td>

        <!--Middle Seat-->
        <td>
        <ul id="seat">
        <?php
        for ($k=0; $k <$numberrow ; $k++) { 
        $benchrow=$k+1;
        ?>

        <li>
        <?php

        if (isset($data2[$studentcounter2]['roll'])) {
        echo "C-".$data2[$studentcounter2]['classnumber'];
        echo " Roll-".$data2[$studentcounter2]['roll'];
        } else {
        echo "N/A";
        }

        $studentcounter2++;
        $tablestartroll++;
        ?>

        </li>

        <?php } ?>

        </ul>
        </td>

    
        
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