<?php
include_once('Mysqldump.php');

// Read database configuration from config.json
$configFile = file_get_contents('config.json');
$config = json_decode($configFile, true);

// Get database credentials from config
$dbServer = $config['DB_SERVER'];
$dbUsername = $config['DB_USERNAME'];
$dbPassword = $config['DB_PASSWORD'];
$dbName = $config['DB_NAME'];

// Get current date and time
$currentDateTime = date('Y-m-d_H-i-s');

// Define the filename with dbname and time (format: dbname_time.sql)
$backupFilename = 'backup/' . $dbName . '_' . $currentDateTime . '.sql';

try {
    // Create the MySQL dump with both structure and data
    $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=$dbServer;dbname=$dbName", $dbUsername, $dbPassword);

    // Start the dump and save it with the dynamically generated filename
    $dump->start($backupFilename);

    // Success message
    echo "<h1 style='color: green;'>Backup created successfully!</h1>";
    echo "<p>File saved as: $backupFilename</p>";

    // Provide a download link for the SQL file
    echo "<p><a id='downloadLink' href='$backupFilename' download>Download SQL Backup</a></p>";

    // JavaScript to close window immediately after download link is clicked
    echo "<script>
            var linkClicked = false;
            document.getElementById('downloadLink').addEventListener('click', function() {
                linkClicked = true;
                setTimeout(function() {
                    window.close();
                }, 500);
            });

            // Close window after 10 seconds if download link is not clicked
            setTimeout(function() {
                if (!linkClicked) {
                    window.close();
                }
            }, 10000);
          </script>";

} catch (\Exception $e) {
    // Error message
    echo "<h1 style='color: red;'>Error: {$e->getMessage()}</h1>";
    echo "<script>
            setTimeout(function() {
                window.close();
            }, 10000);
          </script>";
}
?>