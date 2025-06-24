<?php
// Set headers to force download
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=book_list.xlsx");
header("Pragma: no-cache");
header("Expires: 0");

// Path to the Excel file
$excelFile = "../excel_template/book_list.xlsx";

// Read the file contents and output
readfile($excelFile);
?>
