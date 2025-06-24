<?php
$pathCurrent = __DIR__ . '/sslcommerz_config.json';
$pathMain = __DIR__ . '/../sslcommerz_config.json';

$configFile = file_exists($pathCurrent) ? $pathCurrent : (file_exists($pathMain) ? $pathMain : null);

if (!$configFile) {
    die("SSLCommerz configuration file not found.");
}

$config = json_decode(file_get_contents($configFile), true);

if (!$config) {
    die("Invalid SSLCommerz configuration JSON.");
}

if (!defined('PROJECT_PATH')) {
    define('PROJECT_PATH', $config['PROJECT_PATH']);
}

if (!defined('IS_SANDBOX')) {
    define('IS_SANDBOX', filter_var($config['IS_SANDBOX'], FILTER_VALIDATE_BOOLEAN));
}

if (!defined('STORE_ID')) {
    define('STORE_ID', $config['STORE_ID']);
}

if (!defined('STORE_PASSWORD')) {
    define('STORE_PASSWORD', $config['STORE_PASSWORD']);
}

return [
    'success_url' => $config['success_url'],
    'failed_url' => $config['failed_url'],
    'cancel_url' => $config['cancel_url'],
    'ipn_url' => $config['ipn_url'],

    'projectPath' => PROJECT_PATH,
    'apiDomain' => IS_SANDBOX ? 'https://sandbox.sslcommerz.com' : 'https://securepay.sslcommerz.com',
    'apiCredentials' => [
        'store_id' => STORE_ID,
        'store_password' => STORE_PASSWORD,
    ],
    'apiUrl' => [
        'make_payment' => "/gwprocess/v4/api.php",
        'order_validate' => "/validator/api/validationserverAPI.php",
    ],
    'connect_from_localhost' => false,
    'verify_hash' => true,
];
