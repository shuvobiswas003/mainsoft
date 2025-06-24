<?php
require '../vendor/autoload.php'; // Include PhpSpreadsheet library autoload file

use PhpOffice\PhpSpreadsheet\IOFactory;

// Check if the form is submitted and the file is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["excel_file"])) {
    require "../interdb.php";

    echo "Book Deleted  Successfully";
    echo"<br />";
    echo "Go Back To Book Dashboard<br>";
    echo"<h1><a href='add_book.php'>Book View/Add</a></h1>";
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
        $id = $rowData[0][0];
        $publisher_name = $rowData[0][1];
        $author_name = $rowData[0][2];
        $book_name = $rowData[0][3];
        $book_barcode = $rowData[0][4];

        // SQL query to insert or update data into the database table
        $sql = "INSERT INTO libary_book_list (id, publisher_name, author_name, book_name, book_barcode) 
                VALUES ('$id', '$publisher_name', '$author_name', '$book_name', '$book_barcode') 
                ON DUPLICATE KEY UPDATE publisher_name = VALUES(publisher_name), 
                                          author_name = VALUES(author_name), 
                                          book_name = VALUES(book_name), 
                                          book_barcode = VALUES(book_barcode)";

        // Execute SQL query
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Book Added</h1>.";
        } else{
            echo "<h3 style='color:red;'>Book Already Exists</h1>";
        }
    }

    
}
?>
