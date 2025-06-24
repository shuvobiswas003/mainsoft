<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !=='teacher'){
    header("location: login.php");
    exit;
}
?>
<?php
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
require "../interdb.php";
$sql = "SELECT * FROM lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER BY classnumber ASC, secgroupname ASC,subcode ASC,chapterno ASC,lno ASC;";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
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
        <h1>Lesson Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Class Number</th>
                    <th>Section Group Name</th>
                    <th>Subcode</th>
                    <th>Subname</th>
                    <th>Chapter No</th>
                    <th>Chapter Name</th>
                    <th>LNo</th>
                    <th>LName</th>
                    <th>LPIS</th>
                    <th>LPIC</th>
                    <th>LPIT</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?php echo $row['classnumber']; ?></td>
    <td><?php echo $row['secgroupname']; ?></td>
    <td><?php echo $row['subcode']; ?></td>
    <td>
        <?php
        $rawcode = $row['subname'];
        // Convert to UTF-8 (if it's not already)
        $subname = mb_convert_encoding($rawcode, "UTF-8", "auto");
        echo $subname;
        ?>
    </td>
    <td><?php echo $row['chapterno']; ?></td>
    <td><?php echo $row['chaptername']; ?></td>
    <td><?php echo $row['lno']; ?></td>
    <td><?php echo $row['lname']; ?></td>
    <td><?php echo $row['lpis']; ?></td>
    <td><?php echo $row['lpic']; ?></td>
    <td><?php echo $row['lpit']; ?></td>
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
