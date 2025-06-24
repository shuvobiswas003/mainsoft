<?php
// Include PHPExcel library autoload file
require '../interdb.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new PHPExcel object
$spreadsheet = new Spreadsheet();

// Set worksheet title
$spreadsheet->getActiveSheet()->setTitle('Data Sheet');

// Set column headers
$spreadsheet->getActiveSheet()->setCellValue('A1', 'Book ID');
$spreadsheet->getActiveSheet()->setCellValue('B1', 'Publisher Name');
$spreadsheet->getActiveSheet()->setCellValue('C1', 'Author Name');
$spreadsheet->getActiveSheet()->setCellValue('D1', 'Book Name');
$spreadsheet->getActiveSheet()->setCellValue('E1', 'Book Barcode');
$spreadsheet->getActiveSheet()->setCellValue('F1', 'Total'); // Corrected column index

$sql = "SELECT * FROM libary_book_list";
$result = mysqli_query($link, $sql);
$rowIndex = 2;
while ($row = $result->fetch_assoc()) {
    $spreadsheet->getActiveSheet()->setCellValue('A' . $rowIndex, $row['id']);
    $spreadsheet->getActiveSheet()->setCellValue('B' . $rowIndex, $row['publisher_name']);
    $spreadsheet->getActiveSheet()->setCellValue('C' . $rowIndex, $row['author_name']);
    $spreadsheet->getActiveSheet()->setCellValue('D' . $rowIndex, $row['book_name']);
    $spreadsheet->getActiveSheet()->setCellValue('E' . $rowIndex, $row['book_barcode']);
    $book_id = $row['id'];
    $total="0";
    // Fetch total amount from the second table based on book_id
    $sql_total = "SELECT total FROM libary_book_stock WHERE bookid = '$book_id'";
    $result_total = mysqli_query($link, $sql_total);
    $total = 0; // Default total value
    if ($row_total = mysqli_fetch_assoc($result_total)) {
        $total = $row_total['total']; // Update total if found
    }

    $spreadsheet->getActiveSheet()->setCellValue('F' . $rowIndex, $total); // Set total value
    $rowIndex++;
}

// Save Excel file to temporary directory
$writer = new Xlsx($spreadsheet);
$filename = 'book_list.xlsx';
$filePath = sys_get_temp_dir() . '/' . $filename;
$writer->save($filePath);

// Set headers to force download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename);
header('Pragma: no-cache');
header('Expires: 0');

// Output the Excel file
readfile($filePath);

// Delete the temporary Excel file
unlink($filePath);
?>