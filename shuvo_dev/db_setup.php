<?php
// Initialize the session
session_start();

// Check if the user is logged in as 'account'
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}

// Relative paths for config files
$pathCurrent = 'config.json';    // current folder (project/developer)
$pathMain = '../config.json';    // parent folder (project)

function ensureFolderExists($filePath) {
    $dir = dirname($filePath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Create default config if missing
$defaultConfig = [
    "DB_SERVER" => "localhost",
    "DB_USERNAME" => "root",
    "DB_PASSWORD" => "",
    "DB_NAME" => "sch_main"
];

if (!file_exists($pathCurrent)) {
    ensureFolderExists($pathCurrent);
    file_put_contents($pathCurrent, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}
if (!file_exists($pathMain)) {
    ensureFolderExists($pathMain);
    file_put_contents($pathMain, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}

$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newConfig = [
        "DB_SERVER" => trim($_POST['db_server']),
        "DB_USERNAME" => trim($_POST['db_username']),
        "DB_PASSWORD" => trim($_POST['db_password']),
        "DB_NAME" => trim($_POST['db_name'])
    ];

    $savedCurrent = file_put_contents($pathCurrent, json_encode($newConfig, JSON_PRETTY_PRINT));
    $savedMain = file_put_contents($pathMain, json_encode($newConfig, JSON_PRETTY_PRINT));

    if ($savedCurrent !== false && $savedMain !== false) {
        $message = "Configuration updated successfully in both folders.";
    } else {
        $message = "Failed to save configuration in one or both folders.";
    }
}

// Load current config to pre-fill form (from current folder preferred)
$currentConfig = json_decode(file_get_contents($pathCurrent), true);
?>

<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!--Raw Div Start-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Developer</h3>
                        </div>
                        <!--1st Form Start-->
                        <div class="panel-body">
                            <?php if ($message): ?>
                                <div class="alert <?= strpos($message, 'Failed') === false ? 'alert-success' : 'alert-danger' ?>">
                                    <?= htmlspecialchars($message) ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="db_server">Database Server</label>
                                    <input type="text" name="db_server" id="db_server" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['DB_SERVER'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="db_username">Database Username</label>
                                    <input type="text" name="db_username" id="db_username" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['DB_USERNAME'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="db_password">Database Password</label>
                                    <input type="password" name="db_password" id="db_password" class="form-control"
                                        value="<?= htmlspecialchars($currentConfig['DB_PASSWORD'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="db_name">Database Name</label>
                                    <input type="text" name="db_name" id="db_name" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['DB_NAME'] ?? '') ?>">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Configuration</button>
                            </form>
                        </div>
                        <!--1st Form End-->

                        <!--2nd Form Part Start-->
                        <!-- (You can put more content here if needed) -->
                        <!--2nd Form Part End-->
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<?php include 'inc/footer.php'?>
