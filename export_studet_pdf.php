<?php
require_once 'vendor/autoload.php';
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];

// Extend TCPDF to include custom header and footer
class MYPDF extends TCPDF {
    // Page header
    public function Header() {
        // Set font
        $this->SetFont('dejavusans', '', 10);
        // Title
        $this->Cell(0, 10, 'Student Data', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('dejavusans', '', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Shuvo Biswas');
$pdf->SetAuthor('Black Code IT');
$pdf->SetTitle('Student Data');
$pdf->SetSubject('Student Data Export');
$pdf->SetKeywords('TCPDF, PDF, student, data, export');

// Set default header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage('L');

// Set font for the entire table
$pdf->SetFont('dejavusans', '', 8);

// Fetch data from the database
require "interdb.php";
$sel_query = "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC;";
$result = mysqli_query($link, $sel_query);

// Create a table to display the data
$html = '<table border="1" cellpadding="5">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>id</th>';
$html .= '<th>Class Number</th>';
$html .= '<th>Class Name</th>';
$html .= '<th>Section/Group</th>';
$html .= '<th>Roll</th>';
$html .= '<th>Name</th>';
$html .= '<th>Father Name</th>';
$html .= '<th>Mother Name</th>';
$html .= '<th>Sex</th>';
$html .= '<th>Date of Birth</th>';
$html .= '<th>Birth ID</th>';
$html .= '<th>Mobile</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $row['id'] . '</td>';
    $html .= '<td>' . $row['classnumber'] . '</td>';
    $html .= '<td>' . $row['classname'] . '</td>';
    $html .= '<td>' . $row['secgroup'] . '</td>';
    $html .= '<td>' . $row['roll'] . '</td>';
    $html .= '<td>' . $row['name'] . '</td>';
    $html .= '<td>' . $row['fname'] . '</td>';
    $html .= '<td>' . $row['mname'] . '</td>';
    $html .= '<td>' . $row['sex'] . '</td>';
    $html .= '<td>' . $row['dob'] . '</td>';
    $html .= '<td>' . $row['birthid'] . '</td>';
    $html .= '<td>' . $row['mobile'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('student_data.pdf', 'D');
?>
