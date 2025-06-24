<?php
$classnumber=$_REQUEST['classnumber'];
require "../interdb.php";
$sql = "SELECT id, classnumber, secgroup, roll, uniqid,name,UPPER(sex) FROM student Where classnumber='$classnumber' ORDER BY roll ASC";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student Data</title>
        <style>
            table {
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class Number</th>
                    <th>Section Group</th>
                    <th>Gender</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>RFID</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['classnumber']; ?></td>
                        <td><?php echo $row['secgroup']; ?></td>
                        <td><?php echo $row['UPPER(sex)']; ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td><?php echo $row['name']; ?></td>
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
                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($link);
?>
