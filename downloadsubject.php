<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
require "interdb.php";
$sql = "SELECT * FROM subject Where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY subcode ASC";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Subject Data</title>
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
        <h1>Student Data</h1>
        <table>
            <thead>
                <tr>
                    <th>EXID</th>
                    <th>Class</th>
                    <th>Section/Group</th>
                    <th>Sub Code</th>
                    <th>Sub Name</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Align</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $row['classnumber']; ?></td>
                        <td><?php echo $row['secgroup']; ?></td>
                        <td><?php echo $row['subcode']; ?></td>
                        <td><?php echo $row['subname']; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);
?>
