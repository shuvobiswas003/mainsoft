<html>
<head>
    <title>ZK Test</title>
</head>

<body>
<?php
$dip=$_REQUEST['dip'];
$dport=$_REQUEST['dport'];
    $enableGetDeviceInfo = true;
    $enableGetUsers = true;
    $enableGetData = true;

    require_once('zklib/ZKLib.php');

    $zk = new ZKLib($dip,$dport);

    $ret = $zk->connect();
    if ($ret) {
        $zk->disableDevice();
        date_default_timezone_set('Asia/Dhaka');
        echo date('Y-m-d H:i:s');
        $zk->setTime(date('Y-m-d H:i:s')); // Synchronize time
        ?>
        <?php if($enableGetDeviceInfo === true) { ?>
        <table border="1" cellpadding="5" cellspacing="2">
            <tr>
                <td><b>Status</b></td>
                <td>Connected</td>
                <td><b>Version</b></td>
                <td><?php echo($zk->version()); ?></td>
                <td><b>OS Version</b></td>
                <td><?php echo($zk->osVersion()); ?></td>
                <td><b>Platform</b></td>
                <td><?php echo($zk->platform()); ?></td>
            </tr>
            <tr>
                <td><b>Firmware Version</b></td>
                <td><?php echo($zk->fmVersion()); ?></td>
                <td><b>WorkCode</b></td>
                <td><?php echo($zk->workCode()); ?></td>
                <td><b>SSR</b></td>
                <td><?php echo($zk->ssr()); ?></td>
                <td><b>Pin Width</b></td>
                <td><?php echo($zk->pinWidth()); ?></td>
            </tr>
            <tr>
                <td><b>Face Function On</b></td>
                <td><?php echo($zk->faceFunctionOn()); ?></td>
                <td><b>Serial Number</b></td>
                <td><?php echo($zk->serialNumber()); ?></td>
                <td><b>Device Name</b></td>
                <td><?php echo($zk->deviceName()); ?></td>
                <td><b>Get Time</b></td>
                <td><?php echo($zk->getTime()); ?></td>
            </tr>
        </table>
        <?php } ?>
        <hr/>
        
<?php
$zk->enableDevice();
$zk->disconnect();
}
?>
</body>
</html>
