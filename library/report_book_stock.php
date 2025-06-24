<?php
// Database connection code (assuming $link is the database connection)

// Query to fetch book stock data
require "../interdb.php";
$query = "SELECT * FROM libary_book_stock";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Stock Report</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .shoptitle{
        }
        .shoptitle h1{
            font-size: 50px;
            margin-top: 10px;
            font-family: 'Lobster', cursive;

        }
        .shoptitle h3{
            font-size: 20px;
            margin-top: 5px;
            font-family: 'Dosis', sans-serif;
        }
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
    <h2>Book Stock Report</h2>
</center>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book ID</th>
                <th>Publisher Name</th>
                <th>Author Name</th>
                <th>Book Name</th>
                <th>Book Barcode</th>
                <th>Total</th>
                <th>Running Amount</th>
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
                        <td><?php echo $row['bookid']; ?></td>
                        <td><?php echo $row['publisher_name']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['book_barcode']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['running_amount']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                // If no rows returned from the query
                ?>
                <tr>
                    <td colspan="8">No data found.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
