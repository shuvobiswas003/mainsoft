<?php
include('../interdb.php');

$message = '';
$results = [];
$inserted = false;
$logPreview = [];

// Get class and section options
$classOptions = mysqli_query($link, "SELECT DISTINCT classnumber FROM student ORDER BY classnumber ASC");
$secOptions = mysqli_query($link, "SELECT DISTINCT secgroup FROM student ORDER BY secgroup ASC");

// Get paycat options for dropdown
$paycatOptions = mysqli_query($link, "SELECT id, pcatname FROM paycat ORDER BY pcatname ASC");

// Prepare paycat options HTML
$paycatOptionsHTML = '';
mysqli_data_seek($paycatOptions, 0);
while ($row = mysqli_fetch_assoc($paycatOptions)) {
    $paycatOptionsHTML .= '<option value="' . $row['id'] . '">' . htmlspecialchars($row['pcatname']) . '</option>';
}

// Function to get paycat name
function getPaycatNameById($id, $link) {
    $id = intval($id);
    $result = mysqli_query($link, "SELECT pcatname FROM paycat WHERE id = $id");
    if ($result && $row = mysqli_fetch_assoc($result)) {
        return $row['pcatname'];
    }
    return "Unknown";
}

// Function to split old payments
function split_old_payments_custom($old_totalpay, $old_due, $new_paycats, $trx_history) {
    $split = [];
    $total_new_amount = 0;
    foreach ($new_paycats as $np) {
        $total_new_amount += $np['amount'];
    }

    $first_old_payment = 0;
    if (!empty($trx_history)) {
        $first_old_payment = floatval($trx_history[0]['amount']);
    }

    $remaining_old_payment = $old_totalpay - $first_old_payment;

    $first_new = $new_paycats[0];
    // Cap the from_old amount at the new amount
    $from_old = min($first_old_payment, $first_new['amount']);
    $first_due = $first_new['amount'] - $from_old;
    
    $split[] = [
        'id' => $first_new['id'],
        'name' => $first_new['name'],
        'amount' => $first_new['amount'],
        'from_old' => $from_old,
        'due' => $first_due,
    ];

    // Calculate remaining old payment after first split
    $remaining_old_payment = $old_totalpay - $from_old;

    for ($i = 1; $i < count($new_paycats); $i++) {
        $newamt = $new_paycats[$i]['amount'];
        if ($remaining_old_payment >= $newamt) {
            $from_old = $newamt;
            $due = 0;
            $remaining_old_payment -= $newamt;
        } else {
            $from_old = $remaining_old_payment;
            $due = $newamt - $from_old;
            $remaining_old_payment = 0;
        }
        $split[] = [
            'id' => $new_paycats[$i]['id'],
            'name' => $new_paycats[$i]['name'],
            'amount' => $newamt,
            'from_old' => $from_old,
            'due' => $due,
        ];
    }

    return $split;
}

// Handle Preview
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['preview'])) {
    $classnumber = mysqli_real_escape_string($link, $_POST['classnumber']);
    $secgroupname = mysqli_real_escape_string($link, $_POST['secgroupname']);
    $oldPaycatId = intval($_POST['old_paycatid']);

    $newPaycats = [];
    for ($i = 0; $i < count($_POST['new_paycats_id']); $i++) {
        $id = intval($_POST['new_paycats_id'][$i]);
        $amt = floatval($_POST['new_paycats_amount'][$i]);
        if ($id > 0 && $amt > 0) {
            $newPaycats[] = [
                'id' => $id,
                'amount' => $amt,
                'name' => getPaycatNameById($id, $link),
            ];
        }
    }

    if (empty($newPaycats)) {
        $message = '<div class="alert alert-danger">Please enter valid new Paycat IDs and amounts.</div>';
    } else {
        $sql = "SELECT sp.*, s.name AS stuname, s.roll 
                FROM studentpayment sp
                JOIN student s ON sp.stuid = s.uniqid
                WHERE sp.classnumber='$classnumber' 
                AND sp.secgroupname='$secgroupname' 
                AND sp.pcatid=$oldPaycatId";
        $res = mysqli_query($link, $sql);

        if (mysqli_num_rows($res) === 0) {
            $message = '<div class="alert alert-warning">No invoices found for the selected criteria.</div>';
        } else {
            while ($row = mysqli_fetch_assoc($res)) {
                $totalPaid = floatval($row['totalpay']);
                $totalDue = floatval($row['due']);
                $total = $totalPaid + $totalDue;

                $trxHistory = [];
                $trxRes = mysqli_query($link, "SELECT * FROM invoicetrx WHERE iid='" . mysqli_real_escape_string($link, $row['puniid']) . "'");
                while ($trxRow = mysqli_fetch_assoc($trxRes)) {
                    $trxHistory[] = $trxRow;
                }

                $splitDetails = split_old_payments_custom($totalPaid, $totalDue, $newPaycats, $trxHistory);

                $newTotal = array_sum(array_column($splitDetails, 'amount'));
                $status = ($total < $newTotal) ? 'Short Payment' : (($total > $newTotal) ? 'Extra Charged' : 'Match');

                $results[] = [
                    'classnumber' => $classnumber,
                    'secgroupname' => $secgroupname,
                    'stuid' => $row['stuid'],
                    'roll' => $row['roll'],
                    'stuname' => $row['stuname'],
                    'old_puniid' => $row['puniid'],
                    'old_pcatid' => $row['pcatid'],
                    'old_totalpay' => $totalPaid,
                    'old_due' => $totalDue,
                    'old_total' => $total,
                    'old_date' => $row['date'],
                    'trx_history' => $trxHistory,
                    'split' => $splitDetails,
                    'status' => $status
                ];
            }
        }
    }
}

// Handle Insert
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert']) && isset($_POST['split_data'])) {
    $splitData = json_decode($_POST['split_data'], true);
    mysqli_autocommit($link, false);

    try {
        foreach ($splitData as $student) {
            $oldPuniid = mysqli_real_escape_string($link, $student['old_puniid']);
            $classnumber = mysqli_real_escape_string($link, $student['classnumber']);
            $secgroupname = mysqli_real_escape_string($link, $student['secgroupname']);
            $stuid = mysqli_real_escape_string($link, $student['stuid']);
            $roll = mysqli_real_escape_string($link, $student['roll']);
            $stuname = mysqli_real_escape_string($link, $student['stuname']);
            $oldDate = $student['old_date'];

            // Create the split payments
            foreach ($student['split'] as $split) {
                $paycatid = intval($split['id']);
                $paycatname = mysqli_real_escape_string($link, $split['name']);
                $amount = floatval($split['amount']);
                $newPuniid = $paycatid.$stuid;

                $insertSplitSql = "INSERT INTO studentpayment 
                (pcatid, classnumber, secgroupname, stuid, roll, stuname, des, total, totalpay, due, status, date, puniid) 
                VALUES ($paycatid, '$classnumber', '$secgroupname', '$stuid', '$roll', '$stuname', 
                '$paycatname', $amount, {$split['from_old']}, {$split['due']}, 
                '" . ($split['due'] > 0 ? 'Unpaid' : 'Paid') . "', '$oldDate', '$newPuniid')
                ON DUPLICATE KEY UPDATE
                    total = VALUES(total),
                    totalpay = VALUES(totalpay),
                    due = VALUES(due),
                    status = VALUES(status),
                    date = VALUES(date)";

                if (!mysqli_query($link, $insertSplitSql)) {
                    throw new Exception("Failed to insert split invoice: " . mysqli_error($link));
                }

                // Only insert transaction if from_old amount > 0
                if ($split['from_old'] > 0) {
                    // Find the original transaction method
                    $originalMethod = 'Cash'; // Default if no original method exists
                    if (!empty($student['trx_history'])) {
                        // Use the method from the first transaction
                        $originalMethod = mysqli_real_escape_string($link, $student['trx_history'][0]['method']);
                    }

                    $trxSql = "INSERT INTO invoicetrx (iid, amount, date, method) 
                            VALUES ('$newPuniid', {$split['from_old']}, '$oldDate', '$originalMethod')";
                    if (!mysqli_query($link, $trxSql)) {
                        throw new Exception("Failed to record transaction: " . mysqli_error($link));
                    }
                }
            }
        }

        mysqli_commit($link);
        $inserted = true;
        $message = '<div class="alert alert-success">Invoice split and saved successfully.</div>';
    } catch (Exception $e) {
        mysqli_rollback($link);
        $message = '<div class="alert alert-danger">Transaction failed: ' . $e->getMessage() . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Split Student Invoices</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script>
        function addRow() {
            let table = document.getElementById("splitTable");
            let rowCount = table.rows.length;
            let row = table.insertRow(rowCount);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            cell1.innerHTML = `<select name="new_paycats_id[]" class="form-select" required>
                <?= $paycatOptionsHTML ?>
            </select>`;
            cell2.innerHTML = `<input type="number" step="0.01" name="new_paycats_amount[]" class="form-control" placeholder="Amount" required />`;
        }

        function removeRow() {
            let table = document.getElementById("splitTable");
            let rowCount = table.rows.length;
            if (rowCount > 1) {
                table.deleteRow(rowCount - 1);
            }
        }
    </script>
</head>
<body>
<div class="container my-4">
    <h2 class="mb-4">Split Student Invoices by Paycat</h2>
    <?= $message ?>

    <form method="POST" class="mb-5">
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="classnumber" class="form-label">Class</label>
                <select id="classnumber" name="classnumber" class="form-select" required>
                    <option value="">Select Class</option>
                    <?php
                    mysqli_data_seek($classOptions, 0);
                    while ($row = mysqli_fetch_assoc($classOptions)) {
                        $selected = (isset($_POST['classnumber']) && $_POST['classnumber'] == $row['classnumber']) ? 'selected' : '';
                        echo "<option value='{$row['classnumber']}' $selected>{$row['classnumber']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="secgroupname" class="form-label">Section</label>
                <select id="secgroupname" name="secgroupname" class="form-select" required>
                    <option value="">Select Section</option>
                    <?php
                    mysqli_data_seek($secOptions, 0);
                    while ($row = mysqli_fetch_assoc($secOptions)) {
                        $selected = (isset($_POST['secgroupname']) && $_POST['secgroupname'] == $row['secgroup']) ? 'selected' : '';
                        echo "<option value='{$row['secgroup']}' $selected>{$row['secgroup']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-3">
                <label for="old_paycatid" class="form-label">Old Paycat</label>
                <select id="old_paycatid" name="old_paycatid" class="form-select" required>
                    <option value="">Select Old Paycat</option>
                    <?php
                    mysqli_data_seek($paycatOptions, 0);
                    while ($row = mysqli_fetch_assoc($paycatOptions)) {
                        $selected = (isset($_POST['old_paycatid']) && $_POST['old_paycatid'] == $row['id']) ? 'selected' : '';
                        echo "<option value='{$row['id']}' $selected>{$row['pcatname']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <h5>New Paycats & Amounts</h5>
        <table class="table" id="splitTable">
            <thead>
            <tr>
                <th>Paycat</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <select name="new_paycats_id[]" class="form-select" required>
                        <?= $paycatOptionsHTML ?>
                    </select>
                </td>
                <td>
                    <input type="number" step="0.01" name="new_paycats_amount[]" class="form-control" placeholder="Amount" required />
                </td>
            </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary btn-sm" onclick="addRow()">Add Row</button>
        <button type="button" class="btn btn-danger btn-sm" onclick="removeRow()">Remove Row</button>

        <div class="mt-4">
            <button type="submit" name="preview" class="btn btn-primary">Preview Split</button>
        </div>
    </form>

<?php if (!$inserted && !empty($results)) : ?>
    <h3>Preview Split Invoices</h3>
    <form method="POST">
        <?php
        // Output the split data as JSON hidden input for the insert process
        $splitDataForInsert = [];

        foreach ($results as $res) {
            echo "<hr>";
            echo "<h5>Student: {$res['stuname']} (Roll: {$res['roll']})</h5>";
            $oldPaycatName = getPaycatNameById($res['old_pcatid'], $link);
            echo "<p>Old Invoice ID: {$res['old_puniid']} | Paycat: {$oldPaycatName} | Total Paid: {$res['old_totalpay']} | Due: {$res['old_due']} | Total: {$res['old_total']} | Date: {$res['old_date']}</p>";
            echo '<p>Status: ';
            switch ($res['status']) {
                case 'Match':
                    echo '<span class="badge bg-success">Match</span>';
                    break;
                case 'Short Payment':
                    echo '<span class="badge bg-danger">Short Payment</span>';
                    break;
                case 'Extra Charged':
                    echo '<span class="badge bg-warning text-dark">Extra Charged</span>';
                    break;
                default:
                    echo '<span class="badge bg-secondary">Unknown</span>';
            }
            echo '</p>';

            echo '<h6>Original Transactions</h6>';
            if (empty($res['trx_history'])) {
                echo '<p>No transaction history.</p>';
            } else {
                echo '<table class="table table-sm table-bordered"><thead><tr><th>ID</th><th>Amount</th><th>Date</th><th>Method</th></tr></thead><tbody>';
                foreach ($res['trx_history'] as $trx) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($trx['iid']) . '</td>';
                    echo '<td>' . number_format($trx['amount'], 2) . '</td>';
                    echo '<td>' . htmlspecialchars($trx['date']) . '</td>';
                    echo '<td>' . htmlspecialchars($trx['method']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            echo '<h6>Split Details</h6>';
            echo '<table class="table table-sm table-bordered">';
            echo '<thead><tr><th>Paycat</th><th>Split Amount</th><th>From Old Payment</th><th>Due</th></tr></thead><tbody>';
            foreach ($res['split'] as $split) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($split['name']) . '</td>';
                echo '<td>' . number_format($split['amount'], 2) . '</td>';
                echo '<td>' . number_format($split['from_old'], 2) . '</td>';
                echo '<td>' . number_format($split['due'], 2) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';

            // Add data for insert
            $splitDataForInsert[] = [
                'old_puniid' => $res['old_puniid'],
                'classnumber' => $_POST['classnumber'],
                'secgroupname' => $_POST['secgroupname'],
                'stuid' => $res['stuid'],
                'roll' => $res['roll'],
                'stuname' => $res['stuname'],
                'old_date' => $res['old_date'],
                'trx_history' => $res['trx_history'],
                'split' => $res['split']
            ];
        }
        ?>
        <input type="hidden" name="split_data" value="<?= htmlspecialchars(json_encode($splitDataForInsert)) ?>" />
        <button type="submit" name="insert" class="btn btn-success">Insert Split Invoices</button>
    </form>
<?php elseif ($inserted): ?>
    <h3>Split Process Completed</h3>
    <p>All split invoices inserted with original payment methods preserved.</p>
<?php endif; ?>

</div>
</body>
</html>