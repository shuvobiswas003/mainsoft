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
    $sdate=$_REQUEST['sdate'];
    require "interdb.php";
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
            <h1>Punch Details: <?php echo $sdate?></h1>
      <h1>Class: <?php echo $classnumber?> </h1>
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
                        <th>Clock IN</th>
                        <th>Clock IN Time</th>
                        <th>Clock Out</th>
                        <th>Clock Out Time</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from student where classnumber='$classnumber' ORDER BY roll ASC";
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
                <td><?php echo $sdate?></td>
<th>
    <?php
// SQL query to count the number of records in the table
$sql2 = "SELECT COUNT(*) as total FROM machineattlog WHERE stuid='$uniqid' AND cstateid=1 AND adate='$sdate'";

// Execute the query
$result2 = $link->query($sql2);

// Get the total number of records
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $total = $row2["total"];
    $color;
    if($total>1){
        $color="red";
    }else{
        $color="green";
    }
    echo "<span style='color:".$color."'>";
    echo $total;
    echo "</span>";
} else {
    echo "0";
}
    ?>
</th>

<td>
    <?php
// SQL query to select all records where name = 'rony'
$sql5 = "SELECT * FROM machineattlog WHERE stuid='$uniqid' AND cstateid=1 AND adate='$sdate'";

// Execute the query
$result5 = $link->query($sql5);

// Check if any records were found
if ($result5->num_rows > 0) {
    // Loop through each record and print the values
    while($row5 = $result5->fetch_assoc()) {
        echo $row5['atime'];
        echo "<br>";
    }
} else {
    echo "No records";
}

    ?>
</td>

<th>
    <?php
// SQL query to count the number of records in the table
$sql2 = "SELECT COUNT(*) as total FROM machineattlog WHERE stuid='$uniqid' AND cstateid=2 AND adate='$sdate'";

// Execute the query
$result2 = $link->query($sql2);

// Get the total number of records
if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $total = $row2["total"];
    $color;
    if($total>1){
        $color="red";
    }else{
        $color="green";
    }
    echo "<span style='color:".$color."'>";
    echo $total;
    echo "</span>";
} else {
    echo "0";
}
    ?>
</th>

<td>
    <?php
// SQL query to select all records where name = 'rony'
$sql5 = "SELECT * FROM machineattlog WHERE stuid='$uniqid' AND cstateid=2 AND adate='$sdate'";

// Execute the query
$result5 = $link->query($sql5);

// Check if any records were found
if ($result5->num_rows > 0) {
    // Loop through each record and print the values
    while($row5 = $result5->fetch_assoc()) {
        echo $row5['atime'];
        echo "<br>";
    }
} else {
    echo "No records";
}

    ?>
</td>
                                

                </tr>
                <?php $count++; } ?>
            </tbody>
            </table>
            
            
        </div>
      </div>
    </div>
    


</body>
</html>