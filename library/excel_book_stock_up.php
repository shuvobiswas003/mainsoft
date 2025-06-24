<?php
require '../vendor/autoload.php'; // Include PhpSpreadsheet library autoload file
require "../interdb.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

// Check if the form is submitted and the file is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["excel_file"])) {
    echo "Book Stock Added Successfully";
    echo "<br />";
    echo "Go Back To Book Dashboard<br>";
    echo "<h1><a href='add_book_stock.php'>Book View/Add</a></h1>";

    // Get the uploaded file details
    $file = $_FILES["excel_file"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];

    // Load Excel file
    $spreadsheet = IOFactory::load($fileTmpName);

    // Get worksheet
    $worksheet = $spreadsheet->getActiveSheet();

    // Start from row 2 to ignore the header row
    $startRow = 2;

    // Get highest row and column counts
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();

    // Loop through each row of the worksheet
    for ($row = $startRow; $row <= $highestRow; $row++) {
        // Read data from the current row
        $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
        $bookid = $rowData[0][0]; // Assuming bookid is in column B (index 1)
        $publisher_name = mysqli_real_escape_string($link, $rowData[0][1]); // Assuming publisher_name is in column C (index 2)
        $author_name = mysqli_real_escape_string($link, $rowData[0][2]); // Assuming author_name is in column D (index 3)
        $book_name = mysqli_real_escape_string($link, $rowData[0][3]); // Assuming book_name is in column E (index 4)
        $book_barcode = mysqli_real_escape_string($link, $rowData[0][4]); // Assuming book_barcode is in column F (index 5)
        $total = $rowData[0][5]; // Assuming total is in column G (index 6)

        // Find running total
        $sql_total = "SELECT total, running_amount FROM libary_book_stock WHERE bookid = '$bookid'";
        $result_total = mysqli_query($link, $sql_total);
        $table_total = 0; // Default total value
        $running_total = 0; // Default running total value
        if ($row_total = mysqli_fetch_assoc($result_total)) {
            $table_total = $row_total['total']; // Update total if found
            $running_total = $row_total['running_amount']; // Update running total if found
        }

        // Calculate running total
        $running_total_up = $running_total + ($total - $table_total);

        // SQL query to insert or update data into the database table
        $sql = "INSERT INTO libary_book_stock (bookid, publisher_name, author_name, book_name, book_barcode, total, running_amount) 
                VALUES ('$bookid', '$publisher_name', '$author_name', '$book_name', '$book_barcode', '$total', '$running_total_up') 
                ON DUPLICATE KEY UPDATE 
                publisher_name = VALUES(publisher_name), 
                author_name = VALUES(author_name), 
                book_name = VALUES(book_name), 
                book_barcode = VALUES(book_barcode), 
                total = VALUES(total),
                running_amount = '$running_total_up'";
                
        // Execute SQL query
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Book Added</h3>";
        } else{
            echo "<h3 style='color:red;'>Book Already Exists</h3>";
        }
    }

    echo "Book Data Uploaded Successfully!";
}
?>
