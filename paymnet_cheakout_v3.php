<?php
// Initialize post data array
$post_data = array();
$post_data['store_id'] = "black623d3defabb5b";
$post_data['store_passwd'] = "black623d3defabb5b@ssl";
$post_data['total_amount'] = $_POST['total_amount'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://localhost/sch_digital_pay/pg_redirection/success.php";
$post_data['fail_url'] = "http://localhost/sch_digital_pay/pg_redirection/fail.php";
$post_data['cancel_url'] = "http://localhost/sch_digital_pay/pg_redirection/cancel.php";
// $post_data['multi_card_name'] = "mastercard,visacard,amexcard"; // Disable to display all available

// Customer information
$post_data['cus_name'] = $_POST['cus_name'];
$post_data['cus_email'] = "test@test.com";
$post_data['cus_add1'] = $_POST['cus_add1'];
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $_POST['cus_phone'];
$post_data['cus_fax'] = "01711111111";

// Optional parameters
$ids = $_POST['id'];
$string_ids = implode(', ', $ids);
$post_data['value_a'] = $string_ids;

# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
    curl_close( $handle);
    $sslcommerzResponse = $content;
} else {
    curl_close( $handle);
    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
    exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
    echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
    # header("Location: ". $sslcz['GatewayPageURL']);
    exit;
} else {
    echo "JSON Data parsing error!";
}