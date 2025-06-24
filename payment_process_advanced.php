<?php
require 'interdb.php'; // Ensure this file is correct and available

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $roll = $_POST['roll'];
    $classnumber = $_POST['classnumber'];
    $secgroupname = $_POST['secgroupname'];
    $stuid = $classnumber . $secgroupname . $roll;

    require 'interdb.php';
} else {
    echo "No Valid Data";
}

// Initialize total due
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
        }
        .card-body {
            padding: 1rem;
        }
        .card-footer {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #28a745;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .img-thumbnail {
            max-height: 120px;
        }
    </style>
    <title>Student Payment</title>
</head>
<body>
<div class="container mt-4">
    <!-- School Info Card -->
    <div class="card">
        <div class="card-header text-center">
            <?php
            $sel_query2 = "SELECT * FROM schoolinfo";
            $result2 = mysqli_query($link, $sel_query2);
            if ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <img src="img/lego.png?<?php echo time()?>" alt="School Logo" style="height: 80px;">
                <h1 class="mt-2"><?php echo $row2['schoolname']?></h1>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Search Results Card -->
    <div class="card">
        <div class="card-header text-center">
            Search Results
        </div>
        <div class="card-body">
            <form action="payment_cheakout.php" method="POST">
                <!-- Student Info -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <?php
                        $sel_query3 = "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND roll='$roll'";
                        $result3 = mysqli_query($link, $sel_query3);
                        if ($row3 = mysqli_fetch_assoc($result3)) {
                            $imgsl = $row3["imgname"];
                            if ($imgsl == "IMG_0.png" || $imgsl == "") {
                                ?>
                                <img src="img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" class="img-thumbnail">
                                <?php
                            } else {
                                ?>
                                <img src="img/student/<?php echo $row3['imgname']; ?>" class="img-thumbnail">
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-8">
                        <h5><?php echo $row3['name']; ?></h5>
                        <p>Class: <?php echo $row3['classnumber']; ?></p>
                        <p>Section/Group: <?php echo $row3['secgroup']; ?></p>
                        <p>Roll: <?php echo $row3['roll']; ?></p>
                    <?php
                    }
                    ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="paymentTable">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_due = 0;
                            $today = date('Y-m-d'); // Get today's date

                            $sel_query4 = "SELECT * FROM studentpayment WHERE stuid='$stuid' AND status='Unpaid'";
                            $result4 = mysqli_query($link, $sel_query4);
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                $total_due += $row4["due"];

                                $payment_date = $row4['date']; // Payment date from database
                                $date_diff = (strtotime($today) - strtotime($payment_date)) / (60 * 60 * 24); // Difference in days

                                $isDeletable = $date_diff <= 1; // Allow deletion only if payment is within 180 days (6 months)
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="id[]" value="<?php echo $row4['id']; ?>" 
                                           class="payment-checkbox" data-amount="<?php echo $row4['total']; ?>" 
                                           checked onchange="updateTotal()">
                                </td>
                                <td><?php echo $row4['id']; ?></td>
                                <td><?php echo $row4['des']; ?> (Date: <?php echo $row4['date']; ?>)</td>
                                <td class="amount"><?php echo $row4['total']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm delete-row" 
                                            <?php echo !$isDeletable ? 'disabled' : ''; ?>>Delete</button>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold">Total Due:</td>
                                <td class="font-weight-bold text-danger" id="total_due_display"><?php echo $total_due; ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <input type="hidden" name="customer_name" value="<?php echo $row3['name']; ?>">
                <input type="hidden" name="cus_add1" value="<?php echo $row3['address']; ?>">
                <input type="hidden" name="customer_mobile" value="<?php echo $row3['mobile']; ?>">
                <input type="hidden" name="stuid" value="<?php echo $row3['uniqid']; ?>">
                <input type="hidden" value="<?php echo $total_due; ?>" name="total_amount" id="total_amount" required/>

                <div class="card-footer text-center">
                    <input type="submit" value="Pay Online" class="btn btn-primary btn-lg">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.payment-checkbox:checked').forEach(checkbox => {
        total += parseFloat(checkbox.getAttribute('data-amount'));
    });
    document.getElementById('total_due_display').textContent = total;
    document.getElementById('total_amount').value = total;
}

document.querySelectorAll('.delete-row').forEach(button => {
    button.addEventListener('click', function() {
        if (this.disabled) return; // Prevents deleting non-deletable rows

        let row = this.closest('tr');
        let amount = parseFloat(row.querySelector('.amount').textContent);
        row.remove();

        // Update total after row deletion
        let totalDueElement = document.getElementById('total_due_display');
        let totalAmountInput = document.getElementById('total_amount');
        let currentTotal = parseFloat(totalDueElement.textContent);
        
        let newTotal = currentTotal - amount;
        totalDueElement.textContent = newTotal;
        totalAmountInput.value = newTotal;
    });
});
</script>

</body>
</html>
