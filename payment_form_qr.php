<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Payment</title>
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
        video {
            width: 100%;
            border-radius: 10px;
        }
        .modal-body {
            text-align: center;
        }
    </style>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>

<!-- School Info Start -->
<?php
    require "interdb.php";
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
<?php } ?>
<!-- School Info END -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Scan QR Code to Pay</div>
                <div class="card-body">
                    <div class="text-center">
                        <video id="preview" style="width: 100%; border-radius: 10px;"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden form to submit the scanned QR code via POST -->
    <form id="qrForm" action="payment_process_qr_web.php" method="POST">
        <input type="hidden" id="qrResultInput" name="qrResult">
    </form>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        
        // Listener when QR code is scanned
        scanner.addListener('scan', function (content) {
            console.log("Scanned content: " + content);
            
            // Set the scanned content to the hidden input field
            $('#qrResultInput').val(content);

            // Submit the form to send the QR code via POST
            $('#qrForm').submit();
        });

        // Initialize the camera
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                // Try to use the back camera if available
                let backCamera = cameras.find(camera => camera.name.toLowerCase().includes('back'));
                if (backCamera) {
                    scanner.start(backCamera);
                } else {
                    scanner.start(cameras[0]); // Start first available camera if no back camera
                }
            } else {
                alert('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
            alert('Error accessing the camera. Please try again.');
        });
    });
</script>

</body>
</html>
