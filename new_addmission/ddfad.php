<?php
// Database connection
include('../interdb.php');

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch student data
    $query = "SELECT * FROM admissions WHERE id = $id";
    $result = mysqli_query($link, $query);
    $row = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    // Fetch school info
    $school_query = "SELECT * FROM schoolinfo WHERE id = 1";  // Assuming the school info ID is 1
    $school_result = mysqli_query($link, $school_query);
    $school = $school_result && mysqli_num_rows($school_result) > 0 ? mysqli_fetch_assoc($school_result) : null;

    if (!$row) {
        echo "No record found.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

// QR code generation for current link (using Google Chart API for demonstration)
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$qr_code_url = "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=" . urlencode($current_url);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Admission Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { width: 90%; margin: 20px auto; page-break-after: always; }
        .header { text-align: center; margin-bottom: 30px; }
        .header img { max-height: 80px; }
        .header h1 { font-size: 1.8em; text-transform: uppercase; margin-top: 0; }
        .school-info, .student-info, .parent-info { margin-top: 30px; }
        .section-title { font-size: 1.2em; font-weight: bold; margin-top: 30px; text-align: left; color: #333; }
        .form-table { width: 100%; border-collapse: collapse; margin-top: 20px; table-layout: fixed; }
        .form-table td, .form-table th { padding: 8px; border: 1px solid #ddd; text-align: left; font-size: 0.9em; }
        .form-label { font-weight: bold; background-color: #f4f4f4; width: 30%; }
        .photo { max-width: 100px; height: auto; border: 1px solid #ddd; margin: 5px; }
        .photo-cell { text-align: center; padding: 10px; color: red; }
        .print-button { text-align: center; margin: 20px 0; }
        @media print { .print-button { display: none; } }
        .page-break { page-break-before: always; }
    </style>
</head>
<body>

<div class="container">
    <!-- School Information Section -->
    <div class="header">
        <?php if ($school) { ?>
            <img src="../img/logo.png" alt="School Logo">
            <h1><?php echo htmlspecialchars($school['schoolname']); ?></h1>
            <p><?php echo htmlspecialchars($school['schooladdress']); ?> | Phone: <?php echo htmlspecialchars($school['mobile']); ?> | Website: <?php echo htmlspecialchars($school['website']); ?></p>
        <?php } ?>
    </div>

    <!-- Student Information Section -->
    <div class="section-title">Student Information</div>
    <table class="form-table">
        <table class="form-table">
            <tr>
                <td class="form-label">Student Name (English)</td>
                <td><?php echo htmlspecialchars($row['student_name_eng']); ?></td>
                <td rowspan="5" class="photo-cell">
                    <?php if ($row['student_picture']) { ?>
                        <img src="<?php echo $row['student_picture']; ?>" class="photo" alt="Student Picture">
                    <?php } else { echo "Student picture not available"; } ?>
                </td>
            </tr>
            <tr><td class="form-label">Student Name (Bengali)</td><td><?php echo htmlspecialchars($row['student_name_bn']); ?></td></tr>
            <tr><td class="form-label">Current Class</td><td><?php echo htmlspecialchars($row['current_class']); ?></td></tr>
            <tr><td class="form-label">Desired Class</td><td><?php echo htmlspecialchars($row['desired_class']); ?></td></tr>
            <tr><td class="form-label">School Name</td><td><?php echo htmlspecialchars($row['running_school_name']); ?></td></tr>
        </table>
    </table>

    <!-- QR Code for Current Link -->
    <div class="print-button">
        <img src="<?php echo $qr_code_url; ?>" alt="QR Code for this Form">
    </div>

    <!-- Page Break for Father and Mother Information -->
    <div class="page-break"></div>

    <!-- Father Information Section -->
    <div class="section-title">Father Information</div>
    <table class="form-table">
            <tr>
                <td class="form-label">Father's Name (English)</td>
                <td><?php echo htmlspecialchars($row['father_name_eng']); ?></td>
                <td rowspan="5" class="photo-cell">
                    <?php if ($row['father_picture']) { ?>
                        <img src="<?php echo $row['father_picture']; ?>" class="photo" alt="Father Picture">
                    <?php } else { echo "Father picture not available"; } ?>
                </td>
            </tr>
            <tr><td class="form-label">Father's Name (Bengali)</td><td><?php echo htmlspecialchars($row['father_name_bn']); ?></td></tr>
            <tr><td class="form-label">Father NID</td><td><?php echo htmlspecialchars($row['father_nid']); ?></td></tr>
            <tr><td class="form-label">Father's Phone</td><td><?php echo htmlspecialchars($row['father_phone']); ?></td></tr>
            <tr><td class="form-label">Father's Occupation</td><td><?php echo htmlspecialchars($row['father_occupation']); ?></td></tr>
        </table>

    <!-- Page Break -->
    <div class="page-break"></div>

    <!-- Mother Information Section -->
    <div class="section-title">Mother Information</div>
   <table class="form-table">
            <tr>
                <td class="form-label">Mother's Name (English)</td>
                <td><?php echo htmlspecialchars($row['mother_name_eng']); ?></td>
                <td rowspan="5" class="photo-cell">
                    <?php if ($row['mother_picture']) { ?>
                        <img src="<?php echo $row['mother_picture']; ?>" class="photo" alt="Mother Picture">
                    <?php } else { echo "Mother picture not available"; } ?>
                </td>
            </tr>
            <tr><td class="form-label">Mother's Name (Bengali)</td><td><?php echo htmlspecialchars($row['mother_name_bn']); ?></td></tr>
            <tr><td class="form-label">Mother NID</td><td><?php echo htmlspecialchars($row['mother_nid']); ?></td></tr>
            <tr><td class="form-label">Mother's Phone</td><td><?php echo htmlspecialchars($row['mother_phone']); ?></td></tr>
            <tr><td class="form-label">Mother's Occupation</td><td><?php echo htmlspecialchars($row['mother_occupation']); ?></td></tr>
        </table>

         <div class="section-title">Additional Details</div>
        <table class="form-table">
            <tr><td class="form-label">Date of Birth</td><td><?php echo htmlspecialchars($row['dob']); ?></td></tr>
            <tr><td class="form-label">Blood Group</td><td><?php echo htmlspecialchars($row['blood_group']); ?></td></tr>
            <tr><td class="form-label">Sex</td><td><?php echo htmlspecialchars($row['sex']); ?></td></tr>
            <tr><td class="form-label">Religion</td><td><?php echo htmlspecialchars($row['religion']); ?></td></tr>
            <tr><td class="form-label">Nationality</td><td><?php echo htmlspecialchars($row['nationality']); ?></td></tr>
            <tr><td class="form-label">Present Address (English)</td><td><?php echo htmlspecialchars($row['present_address_eng']); ?></td></tr>
            <tr><td class="form-label">Present Address (Bengali)</td><td><?php echo htmlspecialchars($row['present_address_bn']); ?></td></tr>
            <tr><td class="form-label">Permanent Address (English)</td><td><?php echo htmlspecialchars($row['permanent_address_eng']); ?></td></tr>
            <tr><td class="form-label">Permanent Address (Bengali)</td><td><?php echo htmlspecialchars($row['permanent_address_bn']); ?></td></tr>
            <tr><td class="form-label">Running Roll</td><td><?php echo htmlspecialchars($row['running_roll']); ?></td></tr>
            <tr><td class="form-label">Status</td><td><?php echo htmlspecialchars($row['status']); ?></td></tr>
        </table>
    <!-- Page Break for Birth ID, FNID, and MNID Attachments -->
    <div class="page-break"></div>

    <!-- Birth ID Attachment -->
    <div class="section-title">Birth ID Attachment</div>
    <table class="form-table">
         <tr><td class="form-label">Birth ID Attachment</td><td class="photo-cell">
                <?php if ($row['birth_id_attachment']) { ?>
                    <img src="<?php echo $row['birth_id_attachment']; ?>" class="photo" alt="Birth ID Attachment">
                <?php } else { echo "Birth ID attachment not available"; } ?>
            </td></tr>
    </table>

    <!-- Page Break for FNID -->
    <div class="page-break"></div>

    <!-- FNID Attachment -->
    <div class="section-title">Father NID Attachment</div>
    <table class="form-table">
        <tr><td class="form-label">Father NID Attachment</td><td class="photo-cell">
                <?php if ($row['father_nid_attachment']) { ?>
                    <img src="<?php echo $row['father_nid_attachment']; ?>" class="photo" alt="Father NID Attachment">
                <?php } else { echo "Father NID attachment not available"; } ?>
            </td></tr>
    </table>

    <!-- Page Break for MNID -->
    <div class="page-break"></div>

    <!-- MNID Attachment -->
    <div class="section-title">Mother NID Attachment</div>
    <tr><td class="form-label">Mother NID Attachment</td><td class="photo-cell">
                <?php if ($row['mother_nid_attachment']) { ?>
                    <img src="<?php echo $row['mother_nid_attachment']; ?>" class="photo" alt="Mother NID Attachment">
                <?php } else { echo "Mother NID attachment not available"; } ?>
            </td></tr>

    <div class="print-button">
        <button onclick="window.print()">Print Form</button>
    </div>
</div>
</body>
</html>
