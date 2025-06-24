<?php
// Include PHPSpreadsheet library
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Fetch data from the database
require "interdb.php";

$sel_query = "SELECT * FROM student ORDER BY id ASC;";
$result = mysqli_query($link, $sel_query);

// Set the worksheet title
$spreadsheet->getActiveSheet()->setTitle('Student Data');

// Set the headers
$spreadsheet->getActiveSheet()->fromArray(array(
    'ID',
    'Class Number',
    'Class Name',
    'Section/Group',
    'Roll',
    'Name',
    'Father Name',
    'Mother Name',
    'Nameb',
    'Fnameb',
    'Mnameb',
    'Sex',
    'DOB',
    'Birth ID',
    'FNID',
    'MNID',
    'Address',
    'Mobile',
    'UniqID',
    'ImgName',
    'BriSQR'
), null, 'A1');

// Fill the data
$row = 2;
while ($data = mysqli_fetch_assoc($result)) {
    $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $data['id']);
    $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $data['classnumber']);
    $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $data['classname']);
    $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $data['secgroup']);
    $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $data['roll']);
    $spreadsheet->getActiveSheet()->setCellValue('F' . $row, $data['name']);
    $spreadsheet->getActiveSheet()->setCellValue('G' . $row, $data['fname']);
    $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $data['mname']);
    $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $data['nameb']);
    $spreadsheet->getActiveSheet()->setCellValue('J' . $row, $data['fnameb']);
    $spreadsheet->getActiveSheet()->setCellValue('K' . $row, $data['mnameb']);
    $spreadsheet->getActiveSheet()->setCellValue('L' . $row, $data['sex']);
    $spreadsheet->getActiveSheet()->setCellValue('M' . $row, $data['dob']);
    // Set column N as text format
    $spreadsheet->getActiveSheet()->setCellValueExplicit('N' . $row, $data['birthid'], DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValue('O' . $row, $data['fnid']);
    $spreadsheet->getActiveSheet()->setCellValue('P' . $row, $data['mnid']);
    // Set column Q as text format
    $spreadsheet->getActiveSheet()->setCellValueExplicit('Q' . $row, $data['address'], DataType::TYPE_STRING);
    $spreadsheet->getActiveSheet()->setCellValue('R' . $row, $data['mobile']);
    $spreadsheet->getActiveSheet()->setCellValue('S' . $row, $data['uniqid']);
    $spreadsheet->getActiveSheet()->setCellValue('T' . $row, $data['imgname']);
    $spreadsheet->getActiveSheet()->setCellValue('U' . $row, $data['brisqr']);
    $row++;
}

// Set the writer
$writer = new Xls($spreadsheet);

// Set the header and output the file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="student_data.xls"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
