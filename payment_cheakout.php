<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

# This is a sample page to understand how to connect payment gateway

require_once(__DIR__ . "/lib/SslCommerzNotification.php");


use SslCommerz\SslCommerzNotification;

# Organize the submitted/inputted data
$post_data = array();

$post_data['total_amount'] = $_POST['total_amount'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();

# CUSTOMER INFORMATION
$post_data['cus_name'] = isset($_POST['customer_name']) ? $_POST['customer_name'] : "John Doe";
$post_data['cus_email'] = isset($_POST['customer_email']) ? $_POST['customer_email'] : "john.doe@email.com";
$post_data['cus_add1'] = $_POST['cus_add1'];
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = isset($_POST['customer_mobile']) ? $_POST['customer_mobile'] : "01711111111";
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data["shipping_method"] = "YES";
$post_data['ship_name'] = "Store Test";
$post_data['ship_add1'] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_phone'] = "";
$post_data['ship_country'] = "Bangladesh";

$post_data['emi_option'] = "1";
$post_data["product_category"] = "Electronic";
$post_data["product_profile"] = "general";
$post_data["product_name"] = "Computer";
$post_data["num_of_item"] = "1";

$post_data['convenience_fee'] = "3";

// Optional parameters
$ids = $_POST['id'];
$string_ids = implode(', ', $ids);
$post_data['value_a'] = $string_ids;
$post_data['value_b'] = $_POST['stuid'];

	


 # Call the Payment Gateway Library
    $sslcz = new SslCommerzNotification();
    $msg = $sslcz->makePayment($post_data, 'hosted');
    if (!is_array($msg)) {
        echo $msg;
    }


