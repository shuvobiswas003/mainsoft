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
	$classnumber=$_REQUEST['classnumber'];
	$secgroup=$_REQUEST['secgroup'];
	$sdate=$_REQUEST['sdate'];
	require "interdb.php";
  $totalstu=0;
  $presentstu=0;
  $absentstu=0;
  $onleave=0;    
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
			<h1>Daily Attdance Report: <?php echo $sdate?></h1>
      <h1>Class: <?php echo $classnumber?> Section/Group: <?php echo $secgroup?></h1>
		</center>
	<div class="row">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Student ID</th>
                        <th>RFID CARD</th>
                        <th>Class</th>
                        <th>Student Name</th>
                        <th>Group</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from student where classnumber='$classnumber' AND secgroup='$secgroup'ORDER BY roll ASC";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td>
                                    <?php echo $row['uniqid']?>
                                </td>
                <td>
                <?php
                    $uniqid=$row['uniqid'];
                    $count2=1;
                    $sel_query2="Select * from rfid where stuid='$uniqid'";
                    $result2 = mysqli_query($link,$sel_query2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <?php echo $row2['rfid'];?>
                <?php $count2++; } ?>
                </td>
                                <td><?php echo $row['classnumber']?></td>
                                <td>
                                    <?php echo $row['name']?>
                                </td>
                                <td><?php echo $row['secgroup']?></td>

                                <td><?php echo $sdate;?></td>
                                
<!--Present Part Start-->
<?php

require "interdb.php";
    $sql7 = "SELECT * FROM personalholyday Where stuid='$uniqid' AND sdate <= '$sdate' AND edate >= '$sdate'";
    $result5 = $link->query($sql7);
    // Check if any rows were returned
    if ($result5->num_rows > 0) {
    echo "<th>";
    echo "<span style='color:blue;'>On Leave</span>";
    echo "</th>";
    $onleave++;
    $totalstu++;
   
    }else{
        $sql8 = "SELECT * FROM stuattdancedata Where stuid='$uniqid' AND adate='$sdate' AND cinoutid=1";
        $result2 = $link->query($sql8);
        if ($result2->num_rows > 0) {
        echo "<th>";
        echo "<span style='color:Green;'>Present</span>";
        echo "</th>";
        $presentstu++;
        $totalstu++;
        }else{
            echo "<th>";
            echo "<span style='color:Red;'>Absent</span>";
            echo "</th>";
            $absentstu++;
            $totalstu++;
        }

    } 
?>
<!--Present Part END-->


                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
            <center>
                <h2>Total Students: <?php echo $totalstu;?></h2>
                <h2>Present Students: <?php echo $presentstu;?></h2>
                <h2>On Leave Students: <?php echo $onleave;?></h2>
                <h2>Absent Students: <?php echo $absentstu;?></h2>
            </center>
        </div>
      </div>
    </div>
    


</body>
</html>