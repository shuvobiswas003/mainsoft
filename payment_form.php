<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f7;
        }
        .card {
            margin-top: 40px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            border: none;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 26px;
            padding: 15px;
            border-radius: 10px 10px 0 0;
        }
        h1 {
            font-size: 40px;
            font-weight: 700;
            color: #333;
        }
        h3 {
            font-size: 20px;
            font-weight: 600;
        }
        .form-control {
            height: 50px;
            font-size: 16px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        button {
            font-size: 18px;
            padding: 12px 25px;
            border-radius: 10px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-qr {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-qr:hover {
            background-color: #218838;
            border-color: #218838;
        }
        img {
            border-radius: 50%;
            border: 4px solid #007bff;
        }
        #preview {
            width: 100%;
            border-radius: 10px;
            display: none;
        }
        @media (max-width: 576px) {
            h1 {
                font-size: 30px;
            }
            button {
                width: 100%;
            }
        }
    </style>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>
<body>

<!-- School Info Start -->
<?php
    require "interdb.php";
    $count2 = 1;
    $sel_query2 = "SELECT * FROM schoolinfo";
    $result2 = mysqli_query($link, $sel_query2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
?>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <img src="img/lego.png?<?php echo time()?>" alt="School Logo" style="height: 120px; width: 120px;">
            <h1 class="mt-3"><?php echo $row2['schoolname'] ?></h1>
        </div>
    </div>
<?php $count2++; } ?>
<!-- School Info END -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Student Payments</div>
                <div class="card-body">
                    <form id="paymentForm" method="post" action="payment_process.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class" class="form-label">Select Class:</label>
                                    <select class="form-control" id="class" name="classnumber" required>
                                        <option value="">Select a class</option>
                                        <?php
                                        require "interdb.php";
                                        $classQuery = "SELECT DISTINCT classnumber FROM class ORDER BY classnumber";
                                        $classResult = mysqli_query($link, $classQuery);
                                        while ($classRow = mysqli_fetch_assoc($classResult)) {
                                            $classValue = $classRow['classnumber'];
                                            echo "<option value='$classValue'>Class $classValue</option>";
                                        }
                                        mysqli_free_result($classResult);
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="secgroup" class="form-label">Select Section Group:</label>
                                    <select class="form-control" id="secgroup" name="secgroupname" required>
                                        <option value="">Select a section group</option>
                                        <?php
                                        $secgroupQuery = "SELECT DISTINCT secgroup FROM student ORDER BY secgroup";
                                        $secgroupResult = mysqli_query($link, $secgroupQuery);
                                        while ($secgroupRow = mysqli_fetch_assoc($secgroupResult)) {
                                            $secgroupValue = $secgroupRow['secgroup'];
                                            echo "<option value='$secgroupValue'>$secgroupValue</option>";
                                        }
                                        mysqli_free_result($secgroupResult);
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="roll" class="form-label"><h3>Student Roll:</h3></label>
                                    <input type="text" class="form-control" id="roll" name="roll" required>
                                </div>
                            </div>
                        </div>

                        

                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Search</button>
                            </div>
                        </div>
                        <center>
                            <h3>OR</h3>
                        </center>
                        <!-- QR Scanner Start -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-qr btn-lg" data-toggle="modal" data-target="#qrScannerModal">Scan QR Code</button> 
                                <a href="https://shahs.edu.bd/student_corner" target="_blank">
                                 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="">Student Login</button></a>
                                <input type="hidden" id="qrResult" name="qrResult">
                            </div>
                        </div>
                        <!-- QR Scanner End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for QR Code Scanner -->
<div class="modal fade" id="qrScannerModal" tabindex="-1" aria-labelledby="qrScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrScannerModalLabel">Scan QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="preview" style="width: 100%; border-radius: 10px;"></video>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        let scanner;

        // Initialize the QR Code Scanner when the modal is shown
        $('#qrScannerModal').on('shown.bs.modal', function () {
            if (typeof Instascan === 'undefined') {
                console.error('Instascan is not loaded');
                return;
            }
            
            scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                // Set the scanned content to the hidden input field
                document.getElementById('qrResult').value = content;

                // Change form action to the QR-specific link
                document.getElementById('paymentForm').action = 'payment_process_qr_web.php';

                // Automatically submit the form after scanning
                document.getElementById('paymentForm').submit();
            });
            
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    // Try using the back camera first, if available
                    let backCamera = cameras.find(camera => camera.name && camera.name.toLowerCase().includes('back'));
                    if (backCamera) {
                        scanner.start(backCamera);
                    } else {
                        // If no back camera is found, use the first available camera
                        scanner.start(cameras[0]);
                    }
                    document.getElementById('preview').style.display = 'block';
                } else {
                    alert('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });

        // Stop scanner when the modal is closed
        $('#qrScannerModal').on('hidden.bs.modal', function () {
            if (scanner) {
                scanner.stop();
                document.getElementById('preview').style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
