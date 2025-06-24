<?php
require 'interdb.php'; // Ensure this file is correct and available
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $roll = $_POST['roll'];
    $classnumber = $_POST['classnumber'];
    $secgroupname = $_POST['secgroupname'];
    $stuid=$classnumber.$secgroupname.$roll;

   require 'interdb.php';
}else{
    echo " NO Vaild Data";
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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

                <!-- Payment Details -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_due = 0;
                            $sel_query4 = "SELECT * FROM studentpayment WHERE stuid='$stuid' AND status='Unpaid' AND date < CURDATE()";
                            $result4 = mysqli_query($link, $sel_query4);
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                            ?>
                            <tr>
                                <td>
                                    <SELECT name="id[]" class="form-control form-control-sm">
                                        <option value="<?php echo $row4['id']?>"><?php echo $row4['id']?></option>
                                    </SELECT>
                                </td>
                                <td><?php echo $row4['des']?>(Date: <?php echo $row4['date']?>)</td>
                                <td><?php echo $row4['total']?></td>
                            </tr>
                            <?php 
                            $total_due += $row4["due"];
                            } ?>
                            <tr>
                                <td colspan="2" class="text-right font-weight-bold">Total Due:</td>
                                <td class="font-weight-bold text-danger"><?php echo $total_due?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                
                <input type="hidden" name="customer_name" value="<?php echo $row3['name'];?>">
                <input type="hidden" name="cus_add1" value="<?php echo $row3['address'];?>">
                <input type="hidden" name="customer_mobile" value="<?php echo $row3['mobile'];?>">
                <input type="hidden" name="stuid" value="<?php echo $row3['uniqid'];?>">

                <div class="card-footer text-center">
                    <input type="submit" value="Pay Online" class="btn btn-primary btn-lg">
                    <input type="hidden" value="<?php echo $total_due?>" name="total_amount" id="total_amount" required/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
