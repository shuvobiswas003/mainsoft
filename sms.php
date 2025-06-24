<?php
function sendSMS($recipientNumber, $message) {
    require "interdb.php";
    
    // Check available balance before sending SMS
    $balanceCheckSql = "SELECT bal FROM smsbal WHERE id = 1";
    $balanceResult = mysqli_query($link, $balanceCheckSql);
    
    if (!$balanceResult) {
        return false; // Error in checking balance
    }
    
    $row = mysqli_fetch_assoc($balanceResult);
    $availableBalance = $row['bal'];

    if($availableBalance>0){
    
    $url = "http://bulksmsbd.net/api/smsapi";
    $api_key = "Okgk4fAo3BfPiV0Qry1o";
    $senderid = "8809617617446";
    $number = $recipientNumber;
    
    $data = [
        "api_key" => $api_key,
        "senderid" => $senderid,
        "number" => $number,
        "message" => $message
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    
    if ($response === false) {
        return false; // Error in sending SMS
    }
    
    }
    $charCount = strlen($message);
    
    if ($charCount <= 160) {
        $nof_sms = 1;
    } elseif ($charCount <= 260) {
        $nof_sms = 2;
    } else {
        $nof_sms = 3;
    }
    
    // Check if SMS cost is greater than available balance
    if ($nof_sms > $availableBalance) {
        return false; // Not enough balance to send SMS
    }
    
    // Deduct SMS cost from balance
    $updatedBalance = $availableBalance - $nof_sms;
    
    $updateBalanceSql = "UPDATE smsbal SET bal = $updatedBalance WHERE id = 1";
    $updateResult = mysqli_query($link, $updateBalanceSql);
    
    if (!$updateResult) {
        return false; // Error in updating balance
    }
    
    // Insert SMS record
    $insertSmsSql = "INSERT INTO smslog (text, number, status, charector, usedsms) VALUES ('$message', '$recipientNumber', 'Sent', '$charCount', '$nof_sms')";
    if (mysqli_query($link, $insertSmsSql)) {
        return true; // SMS sent successfully
    } else {
        return false; // Error in inserting SMS record
    }
}
?>
