<?php
// dbconfig.php

$configPath = __DIR__ . '/config.json';

// If config file missing, create default one (optional)
if (!file_exists($configPath)) {
    $defaultConfig = [
        "DB_SERVER" => "localhost",
        "DB_USERNAME" => "root",
        "DB_PASSWORD" => "",
        "DB_NAME" => "sch_main"
    ];
    file_put_contents($configPath, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}

$config = json_decode(file_get_contents($configPath), true);

$link = mysqli_connect(
    $config['DB_SERVER'],
    $config['DB_USERNAME'],
    $config['DB_PASSWORD'],
    $config['DB_NAME']
);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
