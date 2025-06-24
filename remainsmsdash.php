<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        
<?php
require "interdb.php";

// Fetch SMS balance information from smsbal table
$balance_query = "SELECT totalsms, bal FROM smsbal WHERE id = 1";
$balance_result = mysqli_query($link, $balance_query);

function getUsedSMSCount() {
    require "interdb.php"; // Make sure to include your database connection here
    
    $used_sms_query = "SELECT COUNT(*) AS used_count FROM smslog";
    $used_sms_result = mysqli_query($link, $used_sms_query);
    
    if ($used_sms_result) {
        $used_sms_row = mysqli_fetch_assoc($used_sms_result);
        return $used_sms_row['used_count'];
    } else {
        return 0; // Default value if there's an error
    }
}

if ($balance_result) {
    $balance_row = mysqli_fetch_assoc($balance_result);
    $allsms = $balance_row['totalsms'];
    $availableBalance = $balance_row['bal'];
    $ssms = getUsedSMSCount(); // Define this function to get used SMS count
    $rsms = $allsms - $ssms;
} else {
    // Default values in case of error
    $allsms = 0;
    $availableBalance = 0;
    $ssms = 0;
    $rsms = 0;
}
?>
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">SMS Dashboard</h4>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-4" style="border:2px solid green;border-radius: 10px;padding: 10px 10px 50px 10px;">
    <Center>
        <h1>Total SMS</h1>
        <br><br>
        <h1 style="font-size: 100px;color: green"><?php echo $allsms; ?></h1>
    </Center>
</div>

<div class="col-md-4" style="border:2px solid green;border-radius: 10px;padding: 2px 10px 50px 10px;">
    <Center>
        <h1>Used SMS</h1>
        <br><br>
        <h1 style="font-size: 100px;color: purple;"><?php echo $ssms; ?></h1>
    </Center>
</div>

<div class="col-md-4" style="border:2px solid green;border-radius: 10px;padding: 10px 10px 50px 10px;">
    <Center>
        <h1>Remaining SMS</h1>
        <br><br>
        <h1 style="font-size: 100px;color: red;"><?php echo $rsms; ?></h1>
    </Center>
</div>

                            </div>      
                        
                            
                        </div> <!-- End Row -->
                        
                        <div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Last 100 SMS</h3>
            </div>
            <div class="panel-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Text</th>
                            <th>Number</th>
                            <th>Status</th>
                            <th>Characters</th>
                            <th>Used SMS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $log_query = "SELECT text, number, status, charector, usedsms FROM smslog ORDER BY id DESC LIMIT 100";
                        $log_result = mysqli_query($link, $log_query);
                        while ($row = mysqli_fetch_assoc($log_result)) {
                            echo "<tr>";
                            echo "<td>" . $row['text'] . "</td>";
                            echo "<td>" . $row['number'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['charector'] . "</td>";
                            echo "<td>" . $row['usedsms'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>