<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../interdb.php";

// Function to validate and sanitize input
function sanitize($data, $link) {
    return $link->real_escape_string(htmlspecialchars(trim($data)));
}

// Read config file
$configFile = '../sslcommerz_config.json';
$config = json_decode(file_get_contents($configFile), true);

if (!$config) {
    die("<div class='alert alert-danger'>Error: Unable to read SSLCommerz configuration file</div>");
}

// Transaction ID from POST
if (!isset($_POST['trx_id']) || empty($_POST['trx_id'])) {
    die("<div class='alert alert-danger'>Error: Transaction ID is required</div>");
}

$tran_id = sanitize($_POST['trx_id'], $link);
$store_id = urlencode($config['STORE_ID']);
$store_passwd = urlencode($config['STORE_PASSWORD']);

// Determine API endpoint based on sandbox mode
if ($config['IS_SANDBOX']) {
    $apiBaseUrl = 'https://sandbox.sslcommerz.com/validator/api/merchantTransIDvalidationAPI.php';
} else {
    $apiBaseUrl = 'https://securepay.sslcommerz.com/validator/api/merchantTransIDvalidationAPI.php';
}

$requested_url = $apiBaseUrl . "?tran_id=$tran_id&store_id=$store_id&store_passwd=$store_passwd&format=json";

// Initialize cURL
$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
$error = curl_error($handle);
curl_close($handle);

if ($code != 200 || !$result) {
    die("<div class='alert alert-danger'>Failed to connect with SSLCommerz. HTTP Code: $code<br>Error: $error</div>");
}

$result = json_decode($result, true);

if (!$result || !isset($result['APIConnect']) || $result['APIConnect'] !== 'DONE') {
    die("<div class='alert alert-danger'>API connection failed or invalid credentials</div>");
}

if (!isset($result['element']) || empty($result['element'])) {
    die("<div class='alert alert-warning'>No transaction records found for this ID</div>");
}

// Process each transaction
foreach ($result['element'] as $transaction) {
    // Extract and sanitize transaction details
    $status = "Done";
    $tran_date = sanitize($transaction['tran_date'], $link);
    $tran_id = sanitize($transaction['tran_id'], $link);
    $val_id = sanitize($transaction['val_id'], $link);
    $amount = sanitize($transaction['amount'], $link);
    $store_amount = sanitize($transaction['store_amount'], $link);
    $bank_tran_id = sanitize($transaction['bank_tran_id'], $link);
    $card_type = sanitize($transaction['card_type'], $link);
    $data_a = sanitize($transaction['value_a'], $link);
    $data_b = sanitize($transaction['value_b'], $link);

    // Insert or update transaction in database
    $sql = "INSERT INTO sslcommerz_transaction (status, tran_date, tran_id, val_id, amount, store_amount, bank_tran_id, card_type, data_a, data_b) 
            VALUES ('$status', '$tran_date', '$tran_id', '$val_id', '$amount', '$store_amount', '$bank_tran_id', '$card_type', '$data_a', '$data_b')
            ON DUPLICATE KEY UPDATE 
            status=VALUES(status),
            tran_date=VALUES(tran_date),
            amount=VALUES(amount),
            store_amount=VALUES(store_amount),
            bank_tran_id=VALUES(bank_tran_id),
            card_type=VALUES(card_type),
            data_a=VALUES(data_a),
            data_b=VALUES(data_b)";

    if (!$link->query($sql)) {
        die("<div class='alert alert-danger'>Database Error: " . $link->error . "</div>");
    }

    // Process payment IDs
    $payment_ids = explode(',', $data_a);
    $stuid_for = $payment_ids[0];
    $student_id = "";
    $date = date('Y-m-d', strtotime($tran_date));

    // Get student ID from payment record
    $sel_query3 = "SELECT * FROM studentpayment WHERE id= '$stuid_for'";
    $result3 = $link->query($sel_query3);
    if ($result3 && $result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $student_id = $row3['stuid'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .receipt-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-print {
            margin: 5px;
        }
        .student-photo {
            border: 1px solid #ddd;
            padding: 5px;
            background: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="receipt-header text-center">
                <h2>Payment Receipt</h2>
                <p>Transaction ID: <?php echo htmlspecialchars($tran_id); ?></p>
                <p>Date: <?php echo htmlspecialchars($tran_date); ?></p>
            </div>
            
            <table class="table table-bordered">
                <tbody>
                    <?php
                    $sel_query3 = "SELECT * FROM student WHERE uniqid= '$student_id'";
                    $result3 = $link->query($sel_query3);
                    if ($result3 && $result3->num_rows > 0) {
                        $row3 = $result3->fetch_assoc();
                    ?>
                    <tr>
                        <td colspan="2" class="text-center">
                            <div class="d-flex justify-content-center">
                                <a href="../studentpayment/student_payment_online.php?data_a=<?php echo urlencode($data_a); ?>&data_b=<?php echo urlencode($data_b); ?>" 
                                   target="_blank" class="btn btn-primary btn-print">
                                    Print Payment Slip
                                </a>
                                <a href="../admit/admit_print_roll_pub.php?data_a=<?php echo urlencode($data_a); ?>&data_b=<?php echo urlencode($data_b); ?>" 
                                   target="_blank" class="btn btn-success btn-print">
                                    Print Admit Card
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <div class="student-photo">
                                <?php
                                $imgsl = $row3["imgname"];
                                $imgPath = "../img/student/";
                                if ($imgsl == "IMG_0.png" || $imgsl == "") {
                                    $imgFile = $imgPath . $row3['classnumber'] . "/" . $row3['roll'] . ".jpg";
                                    if (file_exists($imgFile)) {
                                        echo "<img src='$imgFile' style='height: 150px;'>";
                                    } else {
                                        echo "<div class='text-muted'>No photo available</div>";
                                    }
                                } else {
                                    $imgFile = $imgPath . $row3['imgname'];
                                    if (file_exists($imgFile)) {
                                        echo "<img src='$imgFile' style='height: 150px;'>";
                                    } else {
                                        echo "<div class='text-muted'>No photo available</div>";
                                    }
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th width="30%">Student Name:</th>
                        <td><?php echo htmlspecialchars($row3['name']); ?></td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo htmlspecialchars($row3['classnumber']); ?></td>
                    </tr>
                    <tr>
                        <th>Section/Group:</th>
                        <td><?php echo htmlspecialchars($row3['secgroup']); ?></td>
                    </tr>
                    <tr>
                        <th>Roll Number:</th>
                        <td><?php echo htmlspecialchars($row3['roll']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h4 class="mt-4">Payment Details</h4>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Invoice ID</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($payment_ids as $idn) {
                        $sel_query = "SELECT * FROM studentpayment WHERE id='$idn'";
                        $result = $link->query($sel_query);
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            
                            // Update payment status
                            $iid = $row['id'];
                            $prevpaytk = $row['totalpay'];
                            $due = $row['due'];
                            $totalpay_tk = $row['total'];
                            
                            $update_sql = "UPDATE studentpayment SET totalpay='$totalpay_tk', due='0', status='Paid' WHERE id='$iid'";
                            $link->query($update_sql);
                            
                            $link->query("UPDATE inviceid SET status='Paid' WHERE invoice_id='$iid'");
                            
                            if ($due > 0) {
                                $invoice_id = $row['puniid'];
                                $link->query("INSERT INTO invoicetrx(iid, amount, date, method) VALUES ('$invoice_id', '$due', '$date', '$card_type')");
                            }
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td>
                            <?php 
                            $pcatid = $row['pcatid'];
                            $sel_query10 = "SELECT * FROM paycat WHERE id='$pcatid'";
                            $result10 = $link->query($sel_query10);
                            if ($result10 && $result10->num_rows > 0) {
                                $row10 = $result10->fetch_assoc();
                                echo htmlspecialchars($row10['pcatname']);
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['total']); ?></td>
                        <td><?php echo htmlspecialchars($totalpay_tk); ?></td>
                        <td>
                            <?php 
                            if ($due <= 0) {
                                echo "<span class='badge badge-success'>Paid</span>";
                            } else {
                                echo "<span class='badge badge-danger'>Due: ".htmlspecialchars($due)."</span>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            
            <div class="alert alert-success mt-4">
                <h4><i class="fas fa-check-circle"></i> Payment Successful</h4>
                <p>Transaction ID: <?php echo htmlspecialchars($tran_id); ?></p>
                <p>Amount: <?php echo htmlspecialchars($amount); ?> BDT</p>
                <p>Payment Method: <?php echo htmlspecialchars($card_type); ?></p>
                <p>Bank Transaction ID: <?php echo htmlspecialchars($bank_tran_id); ?></p>
            </div>
        </div>
    </div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>