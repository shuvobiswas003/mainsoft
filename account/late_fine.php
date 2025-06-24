<?php
include '../interdb.php';

$step = 'form'; // default view
$students = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['preview'])) {
        // STEP 2: PREVIEW
        $existing_pcatid = $_POST['existing_pcatid'];
        $new_pcatid = $_POST['new_pcatid'];
        $new_description = $_POST['new_description'];
        $new_date = $_POST['new_date'];
        $fine_amount = $_POST['fine_amount'];

        $query = "SELECT * FROM studentpayment WHERE pcatid = ? AND status = 'Unpaid'";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $existing_pcatid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        $step = 'preview';
    }

   if (isset($_POST['insert'])) {
    // STEP 3: INSERT
    $existing_pcatid = $_POST['existing_pcatid'];
    $new_pcatid = $_POST['new_pcatid'];
    $new_description = $_POST['new_description'];
    $new_date = $_POST['new_date'];
    $fine_amount = $_POST['fine_amount'];

    $query = "SELECT * FROM studentpayment WHERE pcatid = ? AND status = 'Unpaid'";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $existing_pcatid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $inserted = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $puniid = $new_pcatid . $row['stuid']; // Concatenate puniid

        // Check if the same puniid already exists to prevent duplicate insert
        $check_query = "SELECT id FROM studentpayment WHERE puniid = ?";
        $check_stmt = mysqli_prepare($link, $check_query);
        mysqli_stmt_bind_param($check_stmt, "s", $puniid);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) === 0) {
            // Escape and assign variables
            $classnumber   = mysqli_real_escape_string($link, $row['classnumber']);
            $secgroupname  = mysqli_real_escape_string($link, $row['secgroupname']);
            $stuid         = mysqli_real_escape_string($link, $row['stuid']);
            $roll          = mysqli_real_escape_string($link, $row['roll']);
            $stuname       = mysqli_real_escape_string($link, $row['stuname']);
            $description   = mysqli_real_escape_string($link, $new_description);
            $date          = mysqli_real_escape_string($link, $new_date);
            $escaped_puniid = mysqli_real_escape_string($link, $puniid);
            $status        = 'Unpaid';
            $totalpay      = 0;

            $insert_query = "
                INSERT INTO studentpayment 
                (pcatid, classnumber, secgroupname, stuid, roll, stuname, des, total, totalpay, due, status, date, puniid)
                VALUES (
                    '$new_pcatid',
                    '$classnumber',
                    '$secgroupname',
                    '$stuid',
                    '$roll',
                    '$stuname',
                    '$description',
                    '$fine_amount',
                    '$totalpay',
                    '$fine_amount',
                    '$status',
                    '$date',
                    '$escaped_puniid'
                )
            ";

            if (mysqli_query($link, $insert_query)) {
                $inserted++;
            }
        }

        mysqli_stmt_close($check_stmt); // close check statement each time
    }

    mysqli_stmt_close($stmt);
    $step = 'done';

    echo "$inserted record(s) inserted successfully.";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Late Fine Management</title>
</head>
<body>
<h2>🔧 Late Fine Panel</h2>

<?php if ($step === 'form'): ?>
    <!-- STEP 1: FORM -->
    <form method="POST">
        <label>Existing Pay Category ID:</label><br>
        <input type="number" name="existing_pcatid" required><br><br>

        <label>New Fine Pay Category ID:</label><br>
        <input type="number" name="new_pcatid" required><br><br>

        <label>Fine Description:</label><br>
        <input type="text" name="new_description" required><br><br>

        <label>Fine Date:</label><br>
        <input type="date" name="new_date" required><br><br>

        <label>Fine Amount:</label><br>
        <input type="number" step="0.01" name="fine_amount" required><br><br>

        <button type="submit" name="preview">🔍 Preview Students</button>
    </form>

<?php elseif ($step === 'preview'): ?>
    <!-- STEP 2: PREVIEW -->
    <h3>👀 Preview Students (Unpaid - PayCat ID <?= htmlspecialchars($existing_pcatid) ?>)</h3>
    <form method="POST">
        <table border="1" cellpadding="5">
            <tr>
                <th>Student ID</th><th>Name</th><th>Roll</th><th>Section</th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['stuid']) ?></td>
                    <td><?= htmlspecialchars($student['stuname']) ?></td>
                    <td><?= htmlspecialchars($student['roll']) ?></td>
                    <td><?= htmlspecialchars($student['secgroupname']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <!-- Hidden values -->
        <input type="hidden" name="existing_pcatid" value="<?= htmlspecialchars($existing_pcatid) ?>">
        <input type="hidden" name="new_pcatid" value="<?= htmlspecialchars($new_pcatid) ?>">
        <input type="hidden" name="new_description" value="<?= htmlspecialchars($new_description) ?>">
        <input type="hidden" name="new_date" value="<?= htmlspecialchars($new_date) ?>">
        <input type="hidden" name="fine_amount" value="<?= htmlspecialchars($fine_amount) ?>">

        <br><button type="submit" name="insert">✅ Confirm & Insert Fines</button>
    </form>
    <br><a href="late_fine.php">🔄 Back to Form</a>

<?php elseif ($step === 'done'): ?>
    <!-- STEP 3: DONE -->
    <h3>✅ Late fine inserted successfully for unpaid students with PayCat ID <?= htmlspecialchars($existing_pcatid) ?>.</h3>
    <a href="late_fine.php">➕ Add More</a>
<?php endif; ?>

</body>
</html>
