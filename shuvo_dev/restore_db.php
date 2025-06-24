<?php
// Initialize the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("Location: login.php");
    exit;
}

// Read database configuration from config.json
$config = json_decode(file_get_contents('../config.json'), true);

// Database credentials
$dbServer = $config['DB_SERVER'];
$dbUsername = $config['DB_USERNAME'];
$dbPassword = $config['DB_PASSWORD'];
$dbName = $config['DB_NAME'];

// Backup directory
$backupDir = '../backup/';

// Function to drop all tables
function dropAllTables($conn, $dbName) {
    $conn->select_db($dbName);
    $conn->query("SET FOREIGN_KEY_CHECKS = 0");
    
    $tables = [];
    $result = $conn->query("SHOW TABLES");
    while($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
    
    $log = [];
    foreach($tables as $table) {
        $sql = "DROP TABLE IF EXISTS `$table`";
        if ($conn->query($sql)) {
            $log[] = "Dropped table: $table";
        } else {
            $log[] = "Error dropping table $table: " . $conn->error;
        }
    }
    
    $conn->query("SET FOREIGN_KEY_CHECKS = 1");
    return $log;
}

// Function to restore database
function restoreDatabase($filePath, $dbServer, $dbUsername, $dbPassword, $dbName) {
    $conn = new mysqli($dbServer, $dbUsername, $dbPassword);
    if ($conn->connect_error) {
        return ["Error: Connection failed - " . $conn->connect_error];
    }
    
    $log = [];
    $log[] = "Starting database restoration...";
    
    // Create database if not exists
    if ($conn->query("CREATE DATABASE IF NOT EXISTS `$dbName`")) {
        $log[] = "Database verified: $dbName";
    } else {
        $log[] = "Error creating database: " . $conn->error;
        return $log;
    }
    
    // Drop all existing tables
    $dropLog = dropAllTables($conn, $dbName);
    $log = array_merge($log, $dropLog);
    
    // Process SQL file
    $file = fopen($filePath, 'r');
    if (!$file) {
        $log[] = "Error: Could not open SQL file";
        return $log;
    }
    
    $query = '';
    $successCount = 0;
    $errorCount = 0;
    
    while (!feof($file)) {
        $line = fgets($file);
        
        // Skip comments and empty lines
        if (substr(trim($line), 0, 2) == '--' || trim($line) == '') {
            continue;
        }
        
        $query .= $line;
        
        // Execute complete queries
        if (substr(trim($line), -1) == ';') {
            if ($conn->query($query)) {
                $successCount++;
            } else {
                $errorCount++;
                $log[] = "Error executing query: " . $conn->error;
            }
            $query = '';
        }
    }
    fclose($file);
    
    $log[] = "Restoration complete. Successful queries: $successCount, Errors: $errorCount";
    $conn->close();
    
    return $log;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restore'])) {
    $selectedFile = $_POST['backup_file'];
    $filePath = $backupDir . $selectedFile;
    
    if (file_exists($filePath)) {
        $restoreLog = restoreDatabase($filePath, $dbServer, $dbUsername, $dbPassword, $dbName);
        $_SESSION['restore_log'] = $restoreLog;
        $_SESSION['restore_file'] = $selectedFile;
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        $message = "<div class='error'>Selected file doesn't exist!</div>";
    }
}

// Get all SQL files
$backupFiles = glob($backupDir . '*.sql');
rsort($backupFiles);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Restore</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .success { color: green; }
        .error { color: red; }
        .log { 
            background: #f5f5f5; 
            border: 1px solid #ddd; 
            padding: 15px; 
            margin: 10px 0; 
            max-height: 300px; 
            overflow-y: auto; 
        }
        .log-entry { margin: 5px 0; padding: 3px; }
        select, button { padding: 8px; margin: 5px 0; }
        button { background: #f44336; color: white; border: none; cursor: pointer; }
        button:hover { background: #d32f2f; }
        .file-info { color: #666; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Restore</h1>
        <p>Restore database: <strong><?php echo $dbName; ?></strong></p>
        
        <?php if (isset($message)) echo $message; ?>
        
        <?php if (isset($_SESSION['restore_log'])): ?>
            <h3>Restoration Log for <?php echo $_SESSION['restore_file']; ?></h3>
            <div class="log">
                <?php foreach ($_SESSION['restore_log'] as $entry): ?>
                    <div class="log-entry"><?php echo htmlspecialchars($entry); ?></div>
                <?php endforeach; ?>
            </div>
            <?php unset($_SESSION['restore_log']); unset($_SESSION['restore_file']); ?>
        <?php endif; ?>
        
        <?php if (empty($backupFiles)): ?>
            <p>No backup files found.</p>
        <?php else: ?>
            <form method="post" onsubmit="return confirm('WARNING: This will DROP ALL TABLES and restore from backup! Continue?');">
                <div>
                    <label>Select Backup File:</label><br>
                    <select name="backup_file" style="width: 100%;" required>
                        <?php foreach ($backupFiles as $file): ?>
                            <option value="<?php echo htmlspecialchars(basename($file)); ?>">
                                <?php echo htmlspecialchars(basename($file)); ?>
                                <span class="file-info">
                                    (<?php echo round(filesize($file)/1024); ?> KB, 
                                    <?php echo date("Y-m-d H:i", filemtime($file)); ?>)
                                </span>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="restore">Restore Database</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>