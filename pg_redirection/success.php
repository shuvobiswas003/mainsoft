<?php
######
# THIS FILE IS ONLY AN EXAMPLE. PLEASE MODIFY AS REQUIRED.
# Contributors: 
#       Md. Rakibul Islam <rakibul.islam@sslwireless.com>
#       Prabal Mallick <prabal.mallick@sslwireless.com>
######

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../interdb.php";

// Function to validate and sanitize input
function sanitize($data, $link) {
    return $link->real_escape_string(htmlspecialchars(trim($data)));
}

$val_id = sanitize($_POST['val_id'], $link);
$store_id = "zpscedubdlive";
$store_passwd = "671A016324DC690368";
$requested_url = "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !(curl_errno($handle))) {
    $result = json_decode($result);

    # TRANSACTION INFO
    $status = sanitize($result->status, $link);
    $tran_date = sanitize($result->tran_date, $link);
    $tran_id = sanitize($result->tran_id, $link);
    $val_id = sanitize($result->val_id, $link);
    $amount = sanitize($result->amount, $link);
    $store_amount = sanitize($result->store_amount, $link);
    $bank_tran_id = sanitize($result->bank_tran_id, $link);
    $card_type = sanitize($result->card_type, $link);

    # MY DATA INFO
    $data_a = sanitize($result->value_a, $link);
    $data_b = sanitize($result->value_b, $link);

    // Create SQL query with ON DUPLICATE KEY UPDATE
    $sql = "INSERT INTO sslcommerz_transaction (status, tran_date, tran_id, val_id, amount, store_amount, bank_tran_id, card_type, data_a, data_b) 
            VALUES ('$status', '$tran_date', '$tran_id', '$val_id', '$amount', '$store_amount', '$bank_tran_id', '$card_type', '$data_a', '$data_b')
            ON DUPLICATE KEY UPDATE 
            status=VALUES(status),
            tran_date=VALUES(tran_date),
            tran_id=VALUES(tran_id),
            val_id=VALUES(val_id),
            amount=VALUES(amount),
            store_amount=VALUES(store_amount),
            bank_tran_id=VALUES(bank_tran_id),
            card_type=VALUES(card_type),
            data_a=VALUES(data_a),
            data_b=VALUES(data_b)";

    if ($link->query($sql) === TRUE) {
        echo "<center><h1 style='color:green'>Transaction added or updated successfully</h1></center>";

    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

    $payment_id = $data_a;
    $payment_ids = explode(',', $payment_id);
    $stuid_for = $payment_ids[0];

    $student_id = "";

    $sel_query3 = "SELECT * FROM studentpayment WHERE id= '$stuid_for'";
    $result3 = mysqli_query($link, $sel_query3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $student_id = $row3['stuid'];
    }
    $date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Invoice</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <table class="table table-striped table-bordered">
                <tbody>
                    <?php
                    $sel_query3 = "SELECT * FROM student WHERE uniqid= '$student_id'";
                    $result3 = mysqli_query($link, $sel_query3);
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                    ?>
                    <tr>
                        <td colspan="2">
                    <center>
                    <?php
                    
                    echo "<a href='../studentpayment/student_payment_online.php?data_a=$data_a&data_b=$data_b' target='_blank'><button type='button' class='btn btn-primary btn-lg'>Print Slip</button></a>";
                    ?>

                    
                    </center>
                </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                            <!-- Img Start -->
                            <?php
                            $imgsl = $row3["imgname"];
                            if ($imgsl == "IMG_0.png" OR $imgsl == "") {
                            ?>
                            <img src="../img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" style="height: 130px;">
                            <?php
                            } else {
                            ?>
                            <img src="../img/student/<?php echo $row3['imgname']; ?>" style="height: 130px;">
                            <?php
                            }
                            ?>
                            <!-- Img End -->
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td><?php echo $row3['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Class:</td>
                        <td><?php echo $row3['classnumber']; ?></td>
                    </tr>
                    <tr>
                        <td>Section/Group:</td>
                        <td><?php echo $row3['secgroup']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tbody style="margin-top:20px;">
                    <?php
                    $count = 1;
                    foreach ($payment_ids as $idn) {
                        $sel_query = "SELECT * FROM studentpayment WHERE id='$idn'";
                        $result = mysqli_query($link, $sel_query);
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>Invoice ID:</td>
                        <th><?php echo $row['id'];?></th>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <th>
                            <?php 
                            $pcatid = $row['pcatid'];
                            $sel_query10 = "SELECT * FROM paycat WHERE id='$pcatid'";
                            $result10 = mysqli_query($link, $sel_query10);
                            while($row10 = mysqli_fetch_assoc($result10)) {
                                echo $lettergrade = $row10['pcatname'];
                            }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td>Total Amount: </td>
                        <th><?php echo $row['total'];?></th>
                    </tr>
                    <tr>
                        <td>Total Paid: </td>
                        <th><?php echo $row['totalpay'];?></th>
                    </tr>
                    <tr>
                        <td>Total DUE: </td>
                        <th style="color: red;"><?php echo $row['due'];?></th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php
                            $iid = $row['id'];
                            $prevpaytk = $row['totalpay'];
                            $due = $row['due'];
                            $totalpay_tk = $row['total'];
                            $sql5="UPDATE studentpayment SET totalpay='$totalpay_tk',due='0',status='Paid' WHERE id='$iid'";
                            if(mysqli_query($link, $sql5)){
                                echo "<h2 style='color:green'>Amount: $due Received Successfully</h2>";
                                $sql9="UPDATE inviceid SET status='Paid' WHERE invoice_id='$iid'";
                                if(mysqli_query($link, $sql9)){
                                    echo "Slip Paid";
                                }
                            }
                            if($due <= 0){
                                echo "<h1>No Payment Due</h1>";
                            } else {
                                $invoice_id = $row['puniid'];
                                $sql6 ="INSERT INTO invoicetrx(iid, amount, date, method) VALUES ('$invoice_id', '$due', '$date', '$card_type')";
                                if(mysqli_query($link, $sql6)){
                                    echo "<h3 style='color:green;'>Transaction ID Added</h3>";
                                } else {
                                    echo "<h3 style='color:red;'>Class Already Exists</h3>";
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                        }
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php

} else {
    echo "Failed to connect with SSLCOMMERZ";
}
?>
