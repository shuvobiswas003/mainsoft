<?php
require_once '../vendor/autoload.php';

// Extend TCPDF to include custom header and footer
class MYPDF extends TCPDF {
    private $school_name;
    private $exam_name;
    private $exam_year;

    public function setCustomHeader($school_name, $exam_name, $exam_year) {
        $this->school_name = $school_name;
        $this->exam_name = $exam_name;
        $this->exam_year = $exam_year;
    }

    public function Header() {
        // Add school name
        $this->SetFont('dejavusans', 'B', 14);
        $this->Cell(0, 10, $this->school_name, 0, 1, 'C');
        
        // Add exam name and year
        $this->SetFont('dejavusans', '', 12);
        $this->Cell(0, 10, $this->exam_name . ' - ' . $this->exam_year, 0, 1, 'C');
        
        $this->Ln(10); // Adds 10 units of space after the header
    }

    // Page footer
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('dejavusans', '', 8);
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' / ' . $this->getAliasNbPages(), 0, false, 'C');
    }
}

// Create a new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Organization');
$pdf->SetTitle('Exam Marks Report');
$pdf->SetSubject('Exam Report');
$pdf->SetKeywords('TCPDF, PDF, exam, marks, report');

// Set margins
$pdf->SetMargins(10, 30, 10); // Adjust top margin to leave space for header
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(15);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Fetch school name, exam name, and subject data
require "../interdb.php";
$classnumber = $_REQUEST['classnumber'];
$secgroupname = $_REQUEST['secgroupname'];
$examid = $_REQUEST['examid'];
$subcode = $_REQUEST['subcode'];

// Fetch school name
$school_query = "SELECT schoolname FROM schoolinfo LIMIT 1";
$school_result = mysqli_query($link, $school_query);
$school_name = mysqli_fetch_assoc($school_result)['schoolname'] ?? 'School Name';

// Fetch exam name and year
$exam_query = "SELECT examname, year FROM exam WHERE exid='$examid'";
$exam_result = mysqli_query($link, $exam_query);
$exam_data = mysqli_fetch_assoc($exam_result);

$exam_name = $exam_data['examname'] ?? 'Exam Name';
$exam_year = $exam_data['year'] ?? 'Year Not Found';

// Set custom header information (school name, exam name, and year)
$pdf->setCustomHeader($school_name, $exam_name, $exam_year);

// Add a page
$pdf->AddPage('P');

// Set font
$pdf->SetFont('dejavusans', '', 10);

// Output class and subject info before the table
$class_info = "Class: $classnumber | Section/Group: $secgroupname";
$subject_info = "Subject Code: $subcode | Subject Name: $subject_name";

$pdf->Ln(10); // Adds space before class and subject info
$pdf->MultiCell(0, 10, $class_info, 0, 'L');
$pdf->MultiCell(0, 10, $subject_info, 0, 'L');

// Create table header and content
$html = '<table border="1" cellpadding="5" style="margin-top:20px;">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Roll</th>';
$html .= '<th>Name</th>';
$html .= '<th>CQ</th>';
$html .= '<th>MCQ</th>';
$html .= '<th>Practical</th>';
$html .= '<th>Total</th>';
$html .= '<th>Letter Grade</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

// Fetch all students even if marks are not found
$sel_query = "
    SELECT s.roll, s.name AS student_name, em.cq, em.mcq, em.practical, em.total, em.lettergrade
    FROM student s
    LEFT JOIN exammark em 
    ON s.classnumber = em.classnumber AND s.secgroup = em.secgroupname AND s.roll = em.roll 
       AND em.examid = '$examid' AND em.subcode = '$subcode'
    WHERE s.classnumber = '$classnumber' AND s.secgroup = '$secgroupname'
    ORDER BY s.roll ASC;
";

$result = mysqli_query($link, $sel_query);

while ($row = mysqli_fetch_assoc($result)) {
    // Ensure roll number is always printed even if no marks are found
    $total = $row['total'] ?? 'Not Enrolled';
    $lettergrade = $row['lettergrade'] ?? 'N/A';
    $cq = $row['cq'] ?? 'N/A';
    $mcq = $row['mcq'] ?? 'N/A';
    $practical = $row['practical'] ?? 'N/A';

    // Use a background color if no marks are found
    $style = is_null($row['cq']) ? 'style="background-color: #ffcccc;"' : '';

    $html .= '<tr ' . $style . '>';
    $html .= '<td>' . $row['roll'] . '</td>';
    $html .= '<td>' . $row['student_name'] . '</td>';
    $html .= '<td>' . $cq . '</td>';
    $html .= '<td>' . $mcq . '</td>';
    $html .= '<td>' . $practical . '</td>';
    $html .= '<td>' . $total . '</td>';
    $html .= '<td>' . $lettergrade . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Generate the filename in the format: exam_name_classnumber_secgroupname_subcode.pdf
$filename = $exam_name . '_' . $classnumber . '_' . $secgroupname . '_' . $subcode . '.pdf';

// Close and output PDF document with the dynamically generated filename
$pdf->Output($filename, 'D');
?>
