<?php
require "../interdb.php";

// Query to fetch books whose date_of_expiry has passed and not returned
$query = "SELECT * FROM library_book_issue WHERE date_of_expiry < CURRENT_DATE() AND status <> 'Returned'";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overdue Books Report</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="shoptitle">
        <center>
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
            
        </center>
           
    
    
        </div>
        <div class="container">
            <center>
    <h2>Overdue Books Report</h2>
    </center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Book Barcode</th>
                <th>Date of Issue</th>
                <th>Date of Expiry</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are rows returned from the query
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row of the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $row['book_barcode']; ?></td>
                        <td><?php echo $row['date_of_issue']; ?></td>
                        <td><?php echo $row['date_of_expiry']; ?></td>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['section']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                // If no rows returned from the query
                ?>
                <tr>
                    <td colspan="11">No overdue books found.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
