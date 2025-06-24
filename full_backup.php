<?php
include_once('Mysqldump.php');
require "dbconfig.php"; // Include dbconfig.php to access database configuration

// Get current date and time
$currentDateTime = date('Y-m-d_H-i-s');

// Define the filename with date and time appended
$backupFilename = 'backup/dump_' . $currentDateTime . '.sql';

try {
    // Create the MySQL dump with both structure and data
    $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Start the dump and save it with the dynamically generated filename
    $dump->start($backupFilename);

    // Success message
    echo "<h1 style='color: green;'>Backup created successfully!</h1>";

    // Provide a download link for the SQL file
    echo "<p><a id='downloadLink' href='$backupFilename' download>Download SQL Backup</a></p>";

    // JavaScript to close window immediately after download link is clicked
    echo "<script>
            document.getElementById('downloadLink').addEventListener('click', function() {
                window.close();
            });

            // Close window after 10 seconds if download link is not clicked
            setTimeout(function() {
                if (!document.getElementById('downloadLink').clicked) {
                    window.close();
                }
            }, 10000);
          </script>";

} catch (\Exception $e) {
    // Error message
    echo "<h1 style='color: red;'>Error: {$e->getMessage()}</h1>";
}
?>
