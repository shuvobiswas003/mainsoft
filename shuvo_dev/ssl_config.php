<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account') {
    header("location: login.php");
    exit;
}

$pathCurrent = 'sslcommerz_config.json';
$pathMain = '../sslcommerz_config.json';

function ensureFolderExists($filePath) {
    $dir = dirname($filePath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

$defaultConfig = [
    "PROJECT_PATH" => "https://zpsc.edu.bd/mysoft/2025",
    "IS_SANDBOX" => false,
    "STORE_ID" => "zpscedubdlive",
    "STORE_PASSWORD" => "671A016324DC690368",
    "success_url" => "pg_redirection/success.php",
    "failed_url" => "pg_redirection/fail.php",
    "cancel_url" => "pg_redirection/cancel.php",
    "ipn_url" => "pg_redirection/ipn.php"
];

// Create default config files if missing
if (!file_exists($pathCurrent)) {
    ensureFolderExists($pathCurrent);
    file_put_contents($pathCurrent, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}
if (!file_exists($pathMain)) {
    ensureFolderExists($pathMain);
    file_put_contents($pathMain, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newConfig = [
        "PROJECT_PATH" => trim($_POST['project_path']),
        "IS_SANDBOX" => isset($_POST['is_sandbox']),
        "STORE_ID" => trim($_POST['store_id']),
        "STORE_PASSWORD" => trim($_POST['store_password']),
        "success_url" => trim($_POST['success_url']),
        "failed_url" => trim($_POST['failed_url']),
        "cancel_url" => trim($_POST['cancel_url']),
        "ipn_url" => trim($_POST['ipn_url']),
    ];

    $savedCurrent = file_put_contents($pathCurrent, json_encode($newConfig, JSON_PRETTY_PRINT));
    $savedMain = file_put_contents($pathMain, json_encode($newConfig, JSON_PRETTY_PRINT));

    if ($savedCurrent !== false && $savedMain !== false) {
        $message = "SSLCommerz configuration updated successfully.";
    } else {
        $message = "Failed to save SSLCommerz configuration.";
    }
}

$currentConfig = json_decode(file_get_contents($pathCurrent), true);
?>

<?php include 'inc/header.php' ?>
<?php include 'inc/topheader.php' ?>
<?php include 'inc/leftmenu.php' ?>

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">SSLCommerz Configuration</h3>
                        </div>
                        <div class="panel-body">
                            <?php if ($message): ?>
                                <div class="alert <?= strpos($message, 'Failed') === false ? 'alert-success' : 'alert-danger' ?>">
                                    <?= htmlspecialchars($message) ?>
                                </div>
                            <?php endif; ?>

                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="project_path">Project Path</label>
                                    <input type="text" id="project_path" name="project_path" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['PROJECT_PATH'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="is_sandbox">
                                        <input type="checkbox" id="is_sandbox" name="is_sandbox"
                                            <?= !empty($currentConfig['IS_SANDBOX']) ? 'checked' : '' ?>>
                                        Use Sandbox Mode
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="store_id">Store ID</label>
                                    <input type="text" id="store_id" name="store_id" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['STORE_ID'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="store_password">Store Password</label>
                                    <input type="text" id="store_password" name="store_password" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['STORE_PASSWORD'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="success_url">Success URL</label>
                                    <input type="text" id="success_url" name="success_url" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['success_url'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="failed_url">Failed URL</label>
                                    <input type="text" id="failed_url" name="failed_url" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['failed_url'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="cancel_url">Cancel URL</label>
                                    <input type="text" id="cancel_url" name="cancel_url" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['cancel_url'] ?? '') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="ipn_url">IPN URL</label>
                                    <input type="text" id="ipn_url" name="ipn_url" class="form-control" required
                                        value="<?= htmlspecialchars($currentConfig['ipn_url'] ?? '') ?>">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Configuration</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<?php include 'inc/footer.php' ?>
