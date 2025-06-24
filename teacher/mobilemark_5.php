<?php
require '../interdb.php';

$examid = $_POST['examid'] ?? null;
$classnumber = $_POST['classnumber'] ?? null;
$secgroupname = $_POST['secgroupname'] ?? null;
$subcode = $_POST['subcode'] ?? null;
$notInsertedRolls = isset($_POST['remaining_rolls']) ? explode(',', $_POST['remaining_rolls']) : [];

$subname = "";
$subfullmarks = "";
$gradecode = "";

// Get subject details
if ($examid && $classnumber && $secgroupname && $subcode) {
    $sel_query = "SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname'";
    $result = mysqli_query($link, $sel_query);
    $subject = mysqli_fetch_assoc($result);

    if ($subject) {
        $subname = $subject['subname'];
        $subfullmarks = $subject['subfullmarks'];
        $gradecode = $subject['gradecode'];
    }
}

// Fetch rolls not yet inserted in `exammark`
if (empty($notInsertedRolls)) {
    $query = "SELECT roll 
              FROM sturegsubject 
              WHERE classnumber = '$classnumber' 
              AND secgroupname = '$secgroupname' 
              AND subcode = '$subcode' ORDER BY roll ASC";

    $result = mysqli_query($link, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $roll = $row['roll'];
            $checkQuery = "SELECT COUNT(*) 
                           FROM exammark 
                           WHERE examid = '$examid' AND classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode = '$subcode' 
                           AND roll = '$roll'";
            $checkResult = mysqli_query($link, $checkQuery);
            $checkRow = mysqli_fetch_row($checkResult);
            if ($checkRow[0] == 0) {
                $notInsertedRolls[] = $roll;
            }
        }
    } else {
        echo "Error fetching roll numbers from sturegsubject.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new']) && $_POST['new'] == 1) {
    $roll = $_POST['roll'];
    $suniqid = $classnumber . $secgroupname . $roll;
    $cq = $_POST['cq'];
    $mcq = $_POST['cq_70'];
    $practical = $_POST['ca'];
    $total = $_POST['total_marks'];

    // Fetch letter grade and point
    $letterpoint = '';
    $lettergrade = '';
    $sel_query = "SELECT * FROM grademark WHERE gradecode='$gradecode' AND ($total BETWEEN markfrom AND markupto)";
    $result = mysqli_query($link, $sel_query);
    if ($row = mysqli_fetch_assoc($result)) {
        $letterpoint = $row['letterpoint'];
        $lettergrade = $row['lettergrade'];
    }

    // Fetch subject status
    $substatus = '';
    $unisubregstatus = $classnumber . $secgroupname . $roll . $subcode;
    $sel_query = "SELECT * FROM sturegsubject WHERE unisubstatus='$unisubregstatus'";
    $result = mysqli_query($link, $sel_query);
    if ($row = mysqli_fetch_assoc($result)) {
        $substatus = $row['substatus'];
    }

    // Insert into exammark table
    $unisubstatus = $classnumber . $secgroupname . $roll . $examid . $subcode;
    $sql = "INSERT INTO exammark(classnumber, secgroupname, roll, suniqid, examid, subcode, subname, substatus, gradecode, cq, mcq, practical, total, letterpoint, lettergrade, examuni, fullmarks, examdate, barcode)
            VALUES ('$classnumber', '$secgroupname', '$roll', '$suniqid', '$examid', '$subcode', '$subname', '$substatus', '$gradecode', '$cq', '$mcq', '$practical', '$total', '$letterpoint', '$lettergrade', '$unisubstatus', '$subfullmarks', '0000-00-00', '0')
            ON DUPLICATE KEY UPDATE cq='$cq', mcq='$mcq', practical='$practical', total='$total', letterpoint='$letterpoint', lettergrade='$lettergrade';";

    if (mysqli_query($link, $sql)) {
        array_shift($notInsertedRolls); // Move to the next roll
    } else {
        echo '<script>alert("Error inserting marks");</script>';
    }
}

$nextRoll = $notInsertedRolls[0] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Student Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .form-container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .form-header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h3>Student Mark Entry</h3>
            <p>Subject Name: <?php echo $subname; ?></p>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="new" value="1" />
            <input type="hidden" name="examid" value="<?php echo $examid; ?>">
            <input type="hidden" name="classnumber" value="<?php echo $classnumber; ?>">
            <input type="hidden" name="secgroupname" value="<?php echo $secgroupname; ?>">
            <input type="hidden" name="subcode" value="<?php echo $subcode; ?>">
            <input type="hidden" name="remaining_rolls" value="<?php echo implode(',', $notInsertedRolls); ?>">

            <div class="mb-3">
                <label for="roll" class="form-label">Name: 
                <?php 
                $stuid = $classnumber . $secgroupname . $nextRoll;
                $sel_query = "SELECT name FROM student WHERE uniqid='$stuid'";
                $result = mysqli_query($link, $sel_query);
                if ($row = mysqli_fetch_assoc($result)) {
                    echo $row['name'];
                }
                ?>
                </label>
            </div>

            <div class="mb-3">
                <label for="roll" class="form-label">Roll Number</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php echo $nextRoll; ?>" required>
            </div>

            <div class="mb-3">
                <label for="cq" class="form-label">CQ (100%)</label>
                <input type="number" class="form-control" id="cq100" name="cq" max="100" min="0" required autofocus="autofocus">
            </div>

            <div class="mb-3">
                <label for="cq_70" class="form-label">CQ 80%</label>
                <input type="number" class="form-control" id="cq_70" name="cq_70" readonly>
            </div>

            <div class="mb-3">
                <label for="ca" class="form-label">CA (20%)</label>
                <input type="number" class="form-control" id="ca" name="ca" max="30" min="0" required>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" class="form-control" id="total" name="total_marks" readonly>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

        <?php
        if (!empty($notInsertedRolls)) {
            echo "<p style='color: red;'>Roll Numbers Not Inserted: " . implode(', ', $notInsertedRolls) . "</p>";
        } else {
            echo "<p style='color: green;'>All rolls have been processed!</p>";
        }
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cqInput = document.getElementById('cq100');
    const cq70Input = document.getElementById('cq_70');
    const caInput = document.getElementById('ca');
    const totalInput = document.getElementById('total');

    function updateFields() {
        const cqValue = parseFloat(cqInput.value) || 0;
        const caValue = parseFloat(caInput.value) || 0;
        const cq70Value = Math.round((cqValue * 80) / 100);
        cq70Input.value = cq70Value;
        totalInput.value = cq70Value + caValue;
    }

    cqInput.addEventListener('input', () => {
        updateFields();
        setTimeout(() => { caInput.focus(); }, 2000);
    });
    caInput.addEventListener('input', updateFields);
});
</script>
</body>
</html>
