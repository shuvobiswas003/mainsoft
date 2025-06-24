<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}
?>

<?php include('../interdb.php'); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Invoice Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .remove-row { cursor: pointer; color: red; font-weight: bold; }
  </style>
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Generate Invoices for Students</h4>
    </div>
    <div class="card-body">
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $classnumber = $_POST['classnumber'];
          $secgroup = $_POST['secgroup'];
          $paycat_ids = $_POST['paycatid'];
          $paycat_amounts = $_POST['amount'];
          $paycat_dates = $_POST['paydate'];

          if (empty($classnumber) || empty($secgroup) || empty($paycat_ids)) {
              echo '<div class="alert alert-danger">Please select class, section, and at least one pay category.</div>';
          } else {
              $students = mysqli_query($link, "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroup'");
              $count = 0;
              $output = "";

              $output .= "<div class='alert alert-success'>Invoice entries processed: <b>";

              // Start output table
              $output .= "<div class='table-responsive mt-4'><table class='table table-bordered'>";
              $output .= "<thead class='table-primary'><tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Category</th>
                            <th>Previous Total</th>
                            <th>Previous Paid</th>
                            <th>Previous Due</th>
                            <th>New Total</th>
                            <th>New Due</th>
                            <th>Status</th>
                            <th>Message</th>
                          </tr></thead><tbody>";

              while ($student = mysqli_fetch_assoc($students)) {
                  $stuid = $student['uniqid'];
                  $roll = $student['roll'];
                  $stuname = $student['nameb'];

                  for ($i = 0; $i < count($paycat_ids); $i++) {
                      $pcatid = intval($paycat_ids[$i]);
                      $amount = floatval($paycat_amounts[$i]);
                      $paydate = mysqli_real_escape_string($link, $paycat_dates[$i]);
                      if ($amount <= 0 || empty($paydate)) continue;

                      $paycat = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM paycat WHERE id = '$pcatid'"));
                      $pcatname = $paycat['pcatname'];
                      $puniid = $pcatid . $stuid;

                      // Previous data
                      $existing = mysqli_fetch_assoc(mysqli_query($link, "SELECT total, totalpay, due FROM studentpayment WHERE puniid = '$puniid'"));
                      $prevTotal = isset($existing['total']) ? floatval($existing['total']) : 0;
                      $prevPaid = isset($existing['totalpay']) ? floatval($existing['totalpay']) : 0;
                      $prevDue = isset($existing['due']) ? floatval($existing['due']) : ($amount);

                      // New due
                      $newDue = $amount - $prevPaid;
                      if ($newDue < 0) $newDue = 0;

                      $status = ($newDue > 0) ? 'Unpaid' : 'Paid';

                      $sql = "INSERT INTO studentpayment 
                          (pcatid, classnumber, secgroupname, stuid, roll, stuname, des, total, totalpay, due, status, date, puniid)
                          VALUES (
                              '$pcatid',
                              '$classnumber',
                              '$secgroup',
                              '$stuid',
                              '$roll',
                              '$stuname',
                              '$pcatname',
                              '$amount',
                              $prevPaid,
                              $newDue,
                              '$status',
                              '$paydate',
                              '$puniid'
                          )
                          ON DUPLICATE KEY UPDATE
                              date = '$paydate',
                              total = VALUES(total),
                              totalpay = VALUES(totalpay),
                              due = VALUES(total) - totalpay,
                              status = CASE 
                                          WHEN (VALUES(total) - totalpay) > 0 THEN 'Unpaid' 
                                          ELSE 'Paid' 
                                      END";

                      mysqli_query($link, $sql);
                      $message = $prevTotal > 0 ? 'Updated' : 'Inserted';

                      $output .= "<tr>
                          <td>$stuid</td>
                          <td>$stuname</td>
                          <td>$roll</td>
                          <td>$pcatname</td>
                          <td>$prevTotal</td>
                          <td>$prevPaid</td>
                          <td>$prevDue</td>
                          <td>$amount</td>
                          <td>$newDue</td>
                          <td>Due</td>
                          <td>$message</td>
                        </tr>";

                      $count++;
                  }
              }

              $output .= "</tbody></table></div>";
              $output = str_replace("<b>", "<b>$count</b></div>", $output);
              echo $output;
          }
      }
      ?>

      <form method="POST" action="#" enctype="multipart/form-data" target="_blank">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label fw-bold">Select Class</label>
            <select name="classnumber" class="form-select" required>
              <option value="">-- Class --</option>
              <?php
              $classResult = mysqli_query($link, "SELECT DISTINCT classnumber FROM student ORDER BY classnumber");
              while ($row = mysqli_fetch_assoc($classResult)) {
                  echo "<option value='{$row['classnumber']}'>Class {$row['classnumber']}</option>";
              }
              ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-bold">Select Section</label>
            <select name="secgroup" class="form-select" required>
              <option value="">-- Section --</option>
              <?php
              $sectionResult = mysqli_query($link, "SELECT DISTINCT secgroup FROM student ORDER BY secgroup");
              while ($row = mysqli_fetch_assoc($sectionResult)) {
                  echo "<option value='{$row['secgroup']}'>{$row['secgroup']}</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <label class="form-label fw-bold">Payment Categories</label>
        <div class="table-responsive mb-3">
          <table class="table table-bordered align-middle text-center">
            <thead class="table-secondary">
              <tr>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="paycat-body">
              <?php
              $paycats = mysqli_query($link, "SELECT * FROM paycat");
              while ($pc = mysqli_fetch_assoc($paycats)) {
                  echo "
                    <tr>
                      <td>
                        {$pc['pcatname']}
                        <input type='hidden' name='paycatid[]' value='{$pc['id']}'>
                      </td>
                      <td>
                        <input type='number' step='0.01' min='0' name='amount[]' class='form-control amount-input' value='{$pc['amount']}' required>
                      </td>
                      <td>
                        <input type='date' name='paydate[]' class='form-control' required>
                      </td>
                      <td>
                        <span class='remove-row' onclick='this.closest(\"tr\").remove(); updateTotal();'>×</span>
                      </td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

        <!-- Dynamic total amount display -->
        <div class="mb-3 text-end">
          <strong>Total Amount: ৳ <span id="totalAmount">0.00</span></strong>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-success">Generate Invoices</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function updateTotal() {
    let total = 0;
    document.querySelectorAll('input[name="amount[]"]').forEach(input => {
      let val = parseFloat(input.value);
      if (!isNaN(val) && val > 0) {
        total += val;
      }
    });
    document.getElementById('totalAmount').textContent = total.toFixed(2);
  }

  // Update total on page load
  updateTotal();

  // Update total whenever amount input changes
  document.querySelectorAll('input[name="amount[]"]').forEach(input => {
    input.addEventListener('input', updateTotal);
  });

  // Also update total when a row is removed (already handled in onclick attribute)
</script>
</body>
</html>
