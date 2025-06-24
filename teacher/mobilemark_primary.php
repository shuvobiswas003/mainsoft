<?php
require '../interdb.php';

$examid = $_POST['examid'] ?? null;
$classnumber = $_POST['classnumber'] ?? null;
$secgroupname = $_POST['secgroupname'] ?? null;
$subcode = $_POST['subcode'] ?? null;

$subname = "";
$subfullmarks = "";
$gradecode = "";
$notInsertedRolls = [];

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

if (empty($notInsertedRolls)) {
    // Fetch all rolls from sturegsubject for the given classnumber, secgroupname, and subcode
    $query = "SELECT roll 
              FROM sturegsubject 
              WHERE classnumber = '$classnumber' 
              AND secgroupname = '$secgroupname' 
              AND subcode = '$subcode' ORDER BY roll ASC";

    $result = mysqli_query($link, $query);

    if ($result) {
        // Store all roll numbers in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $notInsertedRolls[] = $row['roll'];
        }

        // Now, check which rolls are not in the exammark table
        if (!empty($notInsertedRolls)) {
            $notInsertedRollsTemp = [];
            foreach ($notInsertedRolls as $roll) {
                // Query to check if the roll number exists in the exammark table for the given examid and subcode
                $checkQuery = "SELECT COUNT(*) 
                               FROM exammark 
                               WHERE examid = '$examid'AND classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode = '$subcode' 
                               AND roll = '$roll'";


                $checkResult = mysqli_query($link, $checkQuery);

                if ($checkResult) {
                    $checkRow = mysqli_fetch_row($checkResult);
                    if ($checkRow[0] == 0) {
                        // If not found in exammark, add the roll to the notInsertedRollsTemp array
                        $notInsertedRollsTemp[] = $roll;
                    }
                } else {
                    echo "Error checking exammark for roll: $roll";
                }
            }
           
            // Update the original array with the non-inserted rolls
            $notInsertedRolls = $notInsertedRollsTemp;
        }

        if (empty($notInsertedRolls)) {
            echo "All rolls have been inserted into the exammark table.";
        } else {
           
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
    $mcq = '0';
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
    $sql = "INSERT INTO exammark (classnumber, secgroupname, roll, suniqid, examid, subcode, subname, substatus, gradecode, cq, mcq, practical, total, letterpoint, lettergrade, examuni, fullmarks, examdate, barcode)
            VALUES ('$classnumber', '$secgroupname', '$roll', '$suniqid', '$examid', '$subcode', '$subname', '$substatus', '$gradecode', '$cq', '$mcq', '$practical', '$total', '$letterpoint', '$lettergrade', '$unisubstatus', '$subfullmarks', '0000-00-00', '0')
            ON DUPLICATE KEY UPDATE cq='$cq', mcq='$mcq', practical='$practical', total='$total', letterpoint='$letterpoint', lettergrade='$lettergrade'";

    if (mysqli_query($link, $sql)) {
        array_shift($notInsertedRolls); // Shift to next roll
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
                <label for="cq" class="form-label">CQ</label>
                <input type="number" class="form-control" id="cq100" name="cq" max="100" min="0" required autofocus="autofocus" oninput="moveToNextInput(this, 2)">
            </div>

            <div class="mb-3">
                <label for="ca" class="form-label">CA</label>
                <input type="number" class="form-control" id="ca" name="ca" max="100" min="0" required oninput="moveToNextInput(this, 2)">
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total (CQ+CA)</label>
                <input type="number" class="form-control" id="total" name="total_marks" readonly>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>

        <?php
        if (!empty($notInsertedRolls)) {
            echo "<p style='color: red;'>Roll Numbers Not Inserted: " . implode(', ', $notInsertedRolls) . "</p>";
        }
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cqInput = document.getElementById('cq100');
    const caInput = document.getElementById('ca');
    const totalInput = document.getElementById('total');

    function updateFields() {
        const cqValue = parseFloat(cqInput.value) || 0;
        const caValue = parseFloat(caInput.value) || 0;
        totalInput.value = cqValue + caValue;
    }

    caInput.addEventListener('input', updateFields);
});

function moveToNextInput(input, maxLength) {
    const inputValue = input.value;
    if (parseInt(inputValue, 10) === 10) {
        setTimeout(() => {
            const inputs = document.querySelectorAll('input[type="number"]');
            const currentIndex = Array.from(inputs).indexOf(input);
            const nextIndex = (currentIndex + 1) % inputs.length;
            inputs[nextIndex].focus();
        }, 1000);
    } else if (inputValue.length === maxLength) {
        const inputs = document.querySelectorAll('input[type="number"]');
        const currentIndex = Array.from(inputs).indexOf(input);
        const nextIndex = (currentIndex + 1) % inputs.length;
        inputs[nextIndex].focus();
    }
}
</script>
</body>
</html>
