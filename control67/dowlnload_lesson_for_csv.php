<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher') {
    header("location: login.php");
    exit;
}
?>
<?php

require "../interdb.php";
$sql = "SELECT * FROM lesson WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' ORDER BY subcode ASC;";
$result = mysqli_query($link, $sql);

// Check if the query was successful
if ($result) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Lesson Data</title>
        <style>
            table {
                border-collapse: collapse;
            }

            th,
            td {
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
                <?php
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['classnumber'] . "</td>";
                        echo "<td>" . $row['secgroupname'] . "</td>";
                        echo "<td>" . $row['subcode'] . "</td>";
$rawcode= $row['subname'];
// Convert to UTF-8 (if it's not already)
$subname = mb_convert_encoding($rawcode, "UTF-8", "auto");

                        echo "<td>".$subname."</td>";
                        echo "<td>" . $row['chapterno'] . "</td>";
                        echo "<td>" . $row['chaptername'] . "</td>";
                        echo "<td>" . $row['lno'] . "</td>";
                        echo "<td>" . $row['lname'] . "</td>";
                        echo "<td>" . $row['lpis'] . "</td>";
                        echo "<td>" . $row['lpic'] . "</td>";
                        echo "<td>" . $row['lpit'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found.</td></tr>";
                }
                ?>
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
