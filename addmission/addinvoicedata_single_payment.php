<?php
// Include database connection
require "../interdb.php";
require "../sms.php";
// Initialize variables
$classnumber = $_POST['classnumber'];
$r_stuid = $_POST['r_stuid'];
$secgroupname = $_POST['secgroupname'];
$getdate = $_POST['pdate'];
$date = date("Y-m-d", strtotime($getdate));
$receive_amount = $_POST['receive_amount']; // Total amount to be received

// Arrays of form data
$payid = $_POST['payid'];
$roll = $_POST['roll'];
$name = $_POST['name'];
$suniqid = $_POST['suniqid'];
$mobile="";
$s_name="";
$sql7 = "SELECT * FROM student WHERE uniqid='$r_stuid'";
$result9 = $link->query($sql7);
if ($result9->num_rows > 0) {
    while ($row9 = $result9->fetch_assoc()) {
        $mobile=$row9['mobile'];
        $s_name=$row9['name'];
    }
}

echo $mobile;

$massage="Dear ".$s_name." Your Payment ".$receive_amount." BDT is received successfully. Payment Date: ".$getdate." Thanks by Kazi Montu College. PW by Black Code IT";
echo $massage;

// if (sendSMS($mobile, $massage)) {
//        echo "<p style='color:green;'>SMS sent ".$s_name." </p>";
//    } else {
//        echo "<p style='color:red;'>SMS failed</p>";
//    }

$des = $_POST['des'];
$total = $_POST['total'];

// Initialize arrays for invoice data
$invoice_data = [];
$processed_invoices = []; // Array to store processed payment IDs
$puniid_list = []; // Array to store all puniid

for ($i = 0; $i < count($roll); $i++) {
    $rolln = $roll[$i];
    $namen = $name[$i];
    $suniqidn = $suniqid[$i];
    $desn = trim($des[$i]);
    $totaln = $total[$i];
    $payidn = $payid[$i];
    $puniid = $payidn . $suniqidn;

    $puniid_list[] = $puniid; // Add puniid to the list

    // Get total paid so far for this invoice
    $totalpay = 0;
    $sql7 = "SELECT totalpay FROM studentpayment WHERE puniid='$puniid'";
    $result9 = $link->query($sql7);
    if ($result9->num_rows > 0) {
        while ($row9 = $result9->fetch_assoc()) {
            $totalpay = $row9['totalpay'];
        }
    }

    $newdue = $totaln - $totalpay;
    $status = ($newdue <= 0) ? 'Paid' : 'Unpaid';

    // Save invoice data
    $invoice_data[] = [
        'puniid' => $puniid,
        'total' => $totaln,
        'due' => $newdue,
        'status' => $status
    ];

    // Insert/update invoice
    $sql = "INSERT INTO `studentpayment` (`pcatid`, `classnumber`, `secgroupname`, `stuid`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `puniid`, `date`, `roll`)
            VALUES ('$payidn','$classnumber','$secgroupname','$suniqidn','$namen','$desn','$totaln','0','$totaln','Unpaid','$puniid','$date','$rolln')
            ON DUPLICATE KEY UPDATE secgroupname='$secgroupname', stuid='$suniqidn', total='$totaln', des='$desn', due='$newdue', totalpay='$totalpay', status='$status', date='$date', roll='$rolln';";

    if (mysqli_query($link, $sql)) {
        echo "<span style='color:green'>Invoice Generated Successfully for $puniid</span><br>";
    } else {
        echo "Error: " . mysqli_error($link) . "<br>";
    }
}

// Step 2: Process payments
foreach ($invoice_data as &$invoice) {
    if ($receive_amount <= 0) {
        break; // Stop if no more amount to receive
    }

    $puniid = $invoice['puniid'];
    $due = $invoice['due'];
    $amount_to_pay = min($receive_amount, $due);

    // Check if the invoice is not fully paid
    if ($invoice['status'] != 'Paid') {
        // Insert into invoicetrx

        $pay_date = $date;
        $sql_trx = "INSERT INTO invoicetrx (iid, amount, date) VALUES ('$puniid', '$amount_to_pay', '$pay_date')";

        if (mysqli_query($link, $sql_trx)) {
            // Update studentpayment table
            $totalpay = $amount_to_pay + ($invoice['total'] - $invoice['due']);
            $new_due = $due - $amount_to_pay;
            $status = ($new_due <= 0) ? 'Paid' : 'Unpaid';

            $update_query = "UPDATE studentpayment SET totalpay = '$totalpay', due = '$new_due', status = '$status' WHERE puniid = '$puniid'";
            if (mysqli_query($link, $update_query)) {
                echo "Payment of $amount_to_pay recorded successfully for invoice $puniid.<br>";
                $processed_invoices[] = $puniid; // Add to processed invoices
            } else {
                echo "<h3 style='color:red;'>Error: Unable to update student payment.</h3>";
            }

            // Reduce the remaining amount to receive
            $receive_amount -= $amount_to_pay;
        } else {
            echo "<h3 style='color:red;'>Error: Unable to insert invoice transaction.</h3>";
        }
    } else {
        echo "Invoice $puniid is already fully paid. No transaction recorded.<br>";
    }
}

// Serialize the arrays for the next form
$serialized_data = [
    'suniqid' => $suniqid,
    'all_puniids' => $puniid_list // Include all puniid data
];

$serialized_data_json = json_encode($serialized_data); // Convert array to JSON string
?>
<form action="../studentpayment/mult_paid_slip_one.php" method="POST">
    <input type="hidden" name="serialized_data" value='<?php echo htmlspecialchars($serialized_data_json); ?>'>
    <button type="submit">Print My Slip</button>
</form>

<?php
// Close database connection
mysqli_close($link);
?>
