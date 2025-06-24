<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher") {
    header("location: login.php");
    exit;
}

require '../interdb.php';
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/topheader.php'; ?>
<?php include 'inc/leftmenu.php'; ?>

<div class="content-page">
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Upload</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Upload Student File</h3>
                        </div>
                        <div class="panel-body">

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
                                $file = $_FILES['file']['tmp_name'];
                                $handle = fopen($file, "r");
                                $c = 0;

                                echo '<table class="table table-bordered">';
                                echo '<thead>
                                        <tr>
                                            <th>Class</th>
                                            <th>Section/Group</th>
                                            <th>Roll</th>
                                            <th>Student ID</th>
                                            <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>';

                                while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
                                    // Skip the header row
                                    if ($c == 0) {
                                        $c++;
                                        continue;
                                    }

                                    $id = $filesop[0];
                                    $class = $filesop[1];
                                    $sec = $filesop[2];
                                    $roll = $filesop[4];
                                    $cardno = $filesop[6];
                                    $uniqid = $class . $sec . $roll;

                                    // Retrieve class name
                                    $classname = "";
                                    $sel_query = "SELECT classname FROM class WHERE classnumber = '$class'";
                                    $result = mysqli_query($link, $sel_query);
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $classname = $row['classname'];
                                    }

                                    // Update RFID card
                                    if (!empty($cardno)) {
                                        $sql3 = "UPDATE rfid SET stuid = '$uniqid' WHERE rfid = '$cardno'";
                                        if (!mysqli_query($link, $sql3)) {
                                            echo "<tr><td colspan='5' style='color:red;'>Error updating RFID: " . mysqli_error($link) . "</td></tr>";
                                            continue;
                                        }
                                    }

                                    // Retrieve the student record
                                    $stupevid = null;
                                    $sel_query = "SELECT uniqid FROM student WHERE id = '$id'";
                                    $result = mysqli_query($link, $sel_query);
                                    if ($row = mysqli_fetch_assoc($result)) {
                                        $stupevid = $row['uniqid'];
                                    }

                                    // Clear and re-register if uniqid has changed
                                    if ($uniqid != $stupevid) {
                                        mysqli_query($link, "DELETE FROM sturegsubject WHERE uniqid = '$stupevid'") or die(mysqli_error($link));
                                        mysqli_query($link, "DELETE FROM sturegstatus WHERE uniqid = '$stupevid'") or die(mysqli_error($link));

                                        // Update payment and invoice records
                                        $selectQuery = "SELECT * FROM studentpayment WHERE stuid = '$stupevid'";
                                        $selectResult = mysqli_query($link, $selectQuery);

                                        if ($selectResult && mysqli_num_rows($selectResult) > 0) {
                                            while ($row10 = mysqli_fetch_assoc($selectResult)) {
                                                $previous_puniid = $row10['puniid'];
                                                $paycatid = $row10['pcatid'];
                                                $new_puniid = $paycatid . $uniqid;

                                                mysqli_query($link, "UPDATE studentpayment SET secgroupname = '$sec', stuid = '$uniqid', roll = '$roll', puniid = '$new_puniid' WHERE puniid = '$previous_puniid'") or die(mysqli_error($link));
                                                mysqli_query($link, "UPDATE invoicetrx SET iid = '$new_puniid' WHERE iid = '$previous_puniid'") or die(mysqli_error($link));
                                            }
                                        }

                                        echo "<tr><td>$class</td><td>$sec</td><td>$roll</td><td>$uniqid</td><td style='color:orange;'>Re-registered</td></tr>";
                                    } else {
                                        echo "<tr><td>$class</td><td>$sec</td><td>$roll</td><td>$uniqid</td><td style='color:green;'>No Change</td></tr>";
                                    }

                                    // Update student record
                                    $sql2 = "UPDATE student SET secgroup = '$sec', uniqid = '$uniqid', classname = '$classname', classnumber = '$class', roll = '$roll' WHERE id = '$id'";
                                    if (!mysqli_query($link, $sql2)) {
                                        echo "<tr><td colspan='5' style='color:red;'>Error updating student: " . mysqli_error($link) . "</td></tr>";
                                    }

                                    $c++;
                                }

                                echo '</tbody></table>';
                                fclose($handle);
                            }
                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="file">Upload Section</label>
                                    <div class="col-md-7">
                                        <input type="file" name="file" id="file" class="form-control" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Upload Section">
                            </form>

                        </div><!-- End of panel Body -->
                    </div>
                </div>
            </div> <!-- End Row -->

        </div> <!-- container -->
    </div> <!-- content -->
</div>

<?php include 'inc/footer.php'; ?>
