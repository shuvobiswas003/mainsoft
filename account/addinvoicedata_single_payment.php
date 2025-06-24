<?php
// Include database connection
require "../interdb.php";

// Initialize variables
$classnumber = $_POST['classnumber'];
$secgroupname = $_POST['secgroupname'];
$getdate = $_POST['pdate'];
$date = date("Y-m-d", strtotime($getdate));
$receive_amount = $_POST['receive_amount']; // Total amount to be received

// Arrays of form data
$payid = $_POST['payid'];
$roll = $_POST['roll'];
$name = $_POST['name'];
$suniqid = $_POST['suniqid'];
$des = $_POST['des'];
$total = $_POST['total'];

// Process each invoice and insert/update in studentpayment table
$invoice_data = [];
for ($i = 0; $i < count($roll); $i++) {
    $rolln = $roll[$i];
    $namen = $name[$i];
    $suniqidn = $suniqid[$i];
    $desn = trim($des[$i]);
    $totaln = $total[$i];
    $payidn = $payid[$i];
    $puniid = $payidn . $suniqidn;

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
        'id' => $i,
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

// Process payments
foreach ($invoice_data as $invoice) {
    if ($receive_amount <= 0) {
        break; // Stop if no more amount to receive
    }

    $puniid = $invoice['puniid'];
    $due = $invoice['due'];
    $amount_to_pay = min($receive_amount, $due);

    // Insert into invoicetrx
    $pay_date = $_POST['pay_date']; // Assuming this is a single date for all payments
    $pay_date = date("Y-m-d", strtotime($pay_date));
    $sql_trx = "INSERT INTO invoicetrx (iid, amount, date) VALUES ('$puniid', '$amount_to_pay', '$pay_date')";

    if (mysqli_query($link, $sql_trx)) {
        // Update studentpayment table
        $totalpay = $amount_to_pay + $invoice['total'] - $invoice['due'];
        $new_due = $invoice['due'] - $amount_to_pay;
        $status = ($new_due <= 0) ? 'Paid' : 'Unpaid';

        $update_query = "UPDATE studentpayment SET totalpay = '$totalpay', due = '$new_due', status = '$status' WHERE puniid = '$puniid'";
        mysqli_query($link, $update_query);

        echo "Payment of $amount_to_pay recorded successfully for invoice $puniid.<br>";

        // Reduce the remaining amount to receive
        $receive_amount -= $amount_to_pay;
    } else {
        echo "<h3 style='color:red;'>Error: Unable to insert invoice transaction.</h3>";
    }
}

mysqli_close($link);
?>
