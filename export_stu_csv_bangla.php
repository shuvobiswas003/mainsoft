<?php
// Include PHPSpreadsheet library
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Fetch data from the database
require "interdb.php";
$classnumber = $_REQUEST['classnumber'];
$secgroupname = $_REQUEST['secgroupname'];
$sel_query = "SELECT * FROM student WHERE classnumber = '$classnumber' AND secgroup = '$secgroupname' ORDER BY roll;";
$result = mysqli_query($link, $sel_query);

// Set the worksheet title
$spreadsheet->getActiveSheet()->setTitle('Student Data');

// Set the headers
$spreadsheet->getActiveSheet()->fromArray(array(
    'Class',
    'Section/Group',
    'Roll',
    'Name',
    'Father Name',
    'Mother Name',
    'Date Of Birth',
    'Birth ID',
    'Gender',
    'Address',
    'Mobile'
), null, 'A1');

// Fill the data
$row = 2;
while ($data = mysqli_fetch_assoc($result)) {
    $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $data['classnumber']);
    $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $data['secgroup']);
    $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $data['roll']);
    $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $data['nameb']);
    $spreadsheet->getActiveSheet()->setCellValue('E' . $row, $data['fnameb']);
    $spreadsheet->getActiveSheet()->setCellValue('F' . $row, $data['mnameb']);
    $spreadsheet->getActiveSheet()->setCellValue('G' . $row, $data['dob']);
    $spreadsheet->getActiveSheet()->setCellValue('H' . $row, $data['birthid']);
    $spreadsheet->getActiveSheet()->setCellValue('I' . $row, $data['sex']);
    $spreadsheet->getActiveSheet()->setCellValue('J' . $row, $data['address']);
    $spreadsheet->getActiveSheet()->setCellValue('K' . $row, $data['mobile']);
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
