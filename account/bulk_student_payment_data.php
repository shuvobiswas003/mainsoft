<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account") {
    header("location: login.php");
    exit;
}

include 'inc/header.php';
include 'inc/topheader.php';
include 'inc/leftmenu.php';
?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice Data</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Student</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php
                                    require "../interdb.php";

                                    // Single data
                                    $classnumber = $_POST['classnumber'];
                                    $secgroupname = $_POST['secgroupname'];
                                    $payid = $_POST['payid'];

                                    echo "<pre>";
                                    echo "Class Number: $classnumber\n";
                                    echo "Section/Group Name: $secgroupname\n";
                                    echo "Payment ID: $payid\n";

                                    // Array data
                                    $roll = $_POST['roll'];
                                    $name = $_POST['name'];
                                    $suniqid = $_POST['suniqid'];
                                    $getdate = $_POST['paydate'];
                                    $des = $_POST['des'];
                                    $total = $_POST['total'];
                                    $previous_pay = $_POST['prev_pay'];
                                    $prev_due = $_POST['prev_due'];
                                    $new_pay = $_POST['new_pay'];

                                    for ($i = 0; $i < count($roll); $i++) {
                                        $invoice_id=$payid.$suniqid[$i];
                                        echo "Processing student $i:\n";
                                        echo "Roll: " . $roll[$i] . "\n";
                                        echo "Name: " . $name[$i] . "\n";
                                        echo "Unique ID: " . $suniqid[$i] . "\n";
                                        echo "Payment Date: " . $getdate[$i] . "\n";
                                        echo "Description: " . $des[$i] . "\n";
                                        echo "Total: " . $total[$i] . "\n";
                                        echo "Previous Payment: " . $previous_pay[$i] . "\n";
                                        echo "Previous Due: " . $prev_due[$i] . "\n";
                                        echo "New Payment: " . $new_pay[$i] . "\n";

                                        if ($new_pay[$i] == 0) {
                                            echo "Payment is 0";
                                        }else{
                                            $current_totalpay = $previous_pay[$i] + $new_pay[$i];
                                            $current_due = $total[$i] - $current_totalpay;
                                            $status = $current_due == 0 ? 'Paid' : 'Unpaid';

                                            echo "Current Total Pay: $current_totalpay\n";
                                            echo "Current Due: $current_due\n";
                                            echo "Status: $status\n";

                                            // Update studentpayment table
                                            $update_query = "UPDATE studentpayment SET classnumber='$classnumber', secgroupname='$secgroupname', roll='" . $roll[$i] . "', stuname='" . $name[$i] . "', des='" . $des[$i] . "', total='" . $total[$i] . "', totalpay='$current_totalpay', due='$current_due', status='$status', date='" . $getdate[$i] . "' WHERE puniid='" .$invoice_id. "'";
                                            if ($link->query($update_query) === TRUE) {
                                                echo "Record updated successfully\n";
                                            } else {
                                                echo "Error updating record: " . $link->error . "\n";
                                            }

                                            // Insert into invoicetrx table
                                            $method = 'Manual'; // Specify the payment method if required
                                            $insert_query = "INSERT INTO invoicetrx (iid, amount, date, method) VALUES ('$invoice_id', '" . $new_pay[$i] . "', '" . $getdate[$i] . "', '$method')";
                                            if ($link->query($insert_query) === TRUE) {
                                                echo "New record created successfully\n";
                                            } else {
                                                echo "Error inserting record: " . $link->error . "\n";
                                            }
                                        }
                                        echo "\n";
                                    }

                                    echo "</pre>";

                                    // Close connection
                                    $link->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
<?php include 'inc/footer.php'; ?>
