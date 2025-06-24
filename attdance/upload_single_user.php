<?php
// Start session
session_start();

// Include the database connection file
require "interdb.php";
require_once('zklib/ZKLib.php');

// Initialize variables for feedback messages
$message = "";
$error = "";

// Fetch devices for the dropdown
$devices_query = "SELECT id, dname FROM devices";
$devices_result = mysqli_query($link, $devices_query);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $rfid = $_POST['rfid'];
    $device_id = $_POST['device'];

    // Fetch device details
    $device_query = "SELECT dip, dport FROM devices WHERE id='$device_id'";
    $device_result = mysqli_query($link, $device_query);
    $device = mysqli_fetch_assoc($device_result);

    if ($device) {
        $dip = $device['dip'];
        $dport = $device['dport'];

        // Connect to the device
        $zk = new ZKLib($dip, $dport);
        $ret = $zk->connect();

        if ($ret) {
            // Device connected
            $zk->disableDevice(); // Disable the device for operations
            $upload_status = $zk->setUser($userid, $userid, $name, '', ZK\Util::LEVEL_USER, intval($rfid));

            if ($upload_status) {
               
                $error = "Failed to upload user. Please check the User ID or RFID and try again.";
            } else {
                 $message = "User uploaded successfully to the device!";
            }

            $zk->enableDevice(); // Re-enable the device
            $zk->disconnect();
        } else {
            // Device connection failed
            $error = "Failed to connect to the device at IP: $dip and Port: $dport. Please check the device settings.";
        }
    } else {
        $error = "Invalid device selected.";
    }
}
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/topheader.php'; ?>
<?php include 'inc/leftmenu.php'; ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Upload User Information</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add User</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Display Success or Error Message -->
                            <?php if (!empty($message)): ?>
                                <div class="alert alert-success"><?php echo $message; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($error)): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>

                            <!-- Form for User Input -->
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="userid">User ID</label>
                                    <input type="text" class="form-control" id="userid" name="userid" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="rfid">RFID</label>
                                    <input type="text" class="form-control" id="rfid" name="rfid" required>
                                </div>
                                <div class="form-group">
                                    <label for="device">Select Device</label>
                                    <select class="form-control" id="device" name="device" required>
                                       
                                        <?php
                                        if (mysqli_num_rows($devices_result) > 0) {
                                            while ($device = mysqli_fetch_assoc($devices_result)) {
                                                echo "<option value='{$device['id']}'>{$device['dname']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<?php include 'inc/footer.php'; ?>
