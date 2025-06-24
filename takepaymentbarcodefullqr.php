<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>Welcome To Your School</title>
    <!-- Base Css Files -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Icons -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- animate css -->
    <link href="../css/animate.css" rel="stylesheet" />
    <!-- Waves-effect -->
    <link href="../css/waves-effect.css" rel="stylesheet">
    <!-- sweet alerts -->
    <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom Files -->
    <link href="../css/helper.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
    <link href="../assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="../assets/select2/select2.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="../js/modernizr.min.js"></script>
    <style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
    }

    .video-container video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
</head>
<?php
include 'inc/topheader.php';
include 'inc/leftmenu.php';
?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Make Payment</h3>
                        </div>
                        <?php
                        $date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');
                        ?>
                        <!-- 1st Form Start -->
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" id="myForm">
<div class="col-md-12">
    <div class="video-container">
        <video id="preview" controls></video>
    </div>
</div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Payment ID(Scan Or Write)</label>
                                    <div class="col-md-9">
                                       <input type="text" name="stu_id" id="stu_id" placeholder="Payment ID(Scan Or Write)" autofocus="autofocus" class="form-control" required="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Date</label>
                                    <div class="col-md-9">
                                        <input type="Date" name="date" placeholder="Scan Barcode" value="<?php echo $date;?>" class="form-control">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" Value="Take Payment">
                            </form>
                        </div>
                        <!-- 1st Form End -->
                        
                        <!-- 2nd Form Part Start -->
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $payment_id = $_POST['stu_id'];
                            $payment_ids = explode(',', $payment_id);
                            $stuid_for = $payment_ids[0];
                            
                            $student_id = "";

                            $sel_query3 = "SELECT * FROM studentpayment WHERE id= '$stuid_for'";
                            $result3 = mysqli_query($link, $sel_query3);
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                $student_id = $row3['stuid'];
                            }
                            $date = $_POST['date'];
                        ?>
                        <div class="panel-body">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <?php
                                        $sel_query3 = "SELECT * FROM student WHERE uniqid= '$student_id'";
                                        $result3 = mysqli_query($link, $sel_query3);
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                        ?>
                                        <tr>
                                            <td colspan="2">
                                                <center>
                                                <!-- Img Start -->
                                                <?php
                                                $imgsl = $row3["imgname"];
                                                if ($imgsl == "IMG_0.png" OR $imgsl = "") {
                                                ?>
                                                <img src="../img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" style="height: 130px;">
                                                <?php
                                                } else {
                                                ?>
                                                <img src="../img/student/<?php echo $row3['imgname']; ?>" style="height: 130px;">
                                                <?php
                                                }
                                                ?>
                                                <!-- Img End -->
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Name:</td>
                                            <td><?php echo $row3['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Class:</td>
                                            <td><?php echo $row3['classnumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Section/Group:</td>
                                            <td><?php echo $row3['secgroup']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tbody style="margin-top:20px;">
                                        <?php
                                        $count = 1;
                                        foreach ($payment_ids as $idn) {
                                            $sel_query = "SELECT * FROM studentpayment WHERE id='$idn'";
                                            $result = mysqli_query($link, $sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td>Invoice_ ID</td>
                                            <th><?php echo $row['id'];?></th>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            <th>
                                                <?php 
                                                $pcatid = $row['pcatid'];
                                                $sel_query10 = "SELECT * FROM paycat WHERE id='$pcatid'";
                                                $result10 = mysqli_query($link, $sel_query10);
                                                while($row10 = mysqli_fetch_assoc($result10)) {
                                                    echo $lettergrade = $row10['pcatname'];
                                                }
                                                ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Total Amount: </td>
                                            <th><?php echo $row['total'];?></th>
                                        </tr>
                                        <tr>
                                            <td>Total Paid: </td>
                                            <th><?php echo $row['totalpay'];?></th>
                                        </tr>
                                        <tr>
                                            <td>Total DUE: </td>
                                            <th style="color: red;"><?php echo $row['due'];?></th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?php
                                                $iid = $row['id'];
                                                $prevpaytk = $row['totalpay'];
                                                $due = $row['due'];
                                                $totalpay_tk = $row['total'];
                                                $sql5="UPDATE studentpayment SET totalpay='$totalpay_tk',due='0',status='Paid' where id='$iid'";
                                                if(mysqli_query($link, $sql5)){
                                                    echo "<h2 style='color:green'>Amount:".$due." Received Successfully<h2>";
                                                    $sql9="UPDATE inviceid SET status='Paid' where invoice_id='$iid'";
                                                    if(mysqli_query($link, $sql9)){
                                                        echo "Slip Paid";
                                                    }
                                                }
                                                if($due<=0){
                                                    echo "<h1>No Payment Due</h1>";
                                                } else {
                                                    $invoice_id = $row['puniid'];
                                                    $sql6 ="INSERT INTO invoicetrx(iid,amount,date) VALUES ('$invoice_id','$due','$date')";
                                                    if(mysqli_query($link, $sql6)){
                                                        echo "<h3 style='color:green;'>Trxid  Added</h1>.";
                                                    } else {
                                                        echo "<h3 style='color:red;'>Class Already Exists</h1>";
                                                    } 
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- 2nd Form Part End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="side-bar right-bar nicescroll">
    <h4 class="text-center">Chat</h4>
    <div class="contact-list nicescroll">
        <ul class="list-group contacts-list">
            <!-- Contact list -->
        </ul>  
    </div>
</div>

<script>
    var resizefunc = [];
</script>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/waves.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../assets/jquery-detectmobile/detect.js"></script>
<script src="../assets/fastclick/fastclick.js"></script>
<script src="../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../assets/jquery-blockui/jquery.blockUI.js"></script>
<script src="../assets/sweet-alert/sweet-alert.min.js"></script>
<script src="../assets/sweet-alert/sweet-alert.init.js"></script>
<script src="../assets/flot-chart/jquery.flot.js"></script>
<script src="../assets/flot-chart/jquery.flot.time.js"></script>
<script src="../assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="../assets/flot-chart/jquery.flot.resize.js"></script>
<script src="../assets/flot-chart/jquery.flot.pie.js"></script>
<script src="../assets/flot-chart/jquery.flot.selection.js"></script>
<script src="../assets/flot-chart/jquery.flot.stack.js"></script>
<script src="../assets/flot-chart/jquery.flot.crosshair.js"></script>
<script src="../assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="../assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="../js/jquery.app.js"></script>
<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables/dataTables.bootstrap.js"></script>
<script src="../assets/select2/select2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/jquery-multi-select/jquery.multi-select.js"></script>
<script type="text/javascript" src="../assets/jquery-multi-select/jquery.quicksearch.js"></script>
<script src="../assets/select2/select2.min.js" type="text/javascript"></script>
<script src="../js/jquery.dashboard.js"></script>
<script src="../js/jquery.chat.js"></script>
<script src="../js/jquery.todo.js"></script>
<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
<script>
    jQuery(document).ready(function() {
        jQuery(".select2").select2({
            width: '100%'
        });
    });
</script>
<script>
    // Check if the browser supports getUserMedia and if it doesn't, display an error message
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert('Your browser does not support getUserMedia API.');
    } else {
        // Initialize the QR scanner
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        // Add a listener for the 'scan' event
        scanner.addListener('scan', function (content) {
            // Once a QR code is scanned, fill the form field
            document.getElementById('stu_id').value = content;
            document.getElementById('myForm').submit();
           
        });

        // Start the QR scanner
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]); // Use the first available camera
            } else {
                alert('No cameras found.');
            }
        }).catch(function (e) {
            console.error('Error accessing camera:', e);
        });
    }
</script>
</body>
</html>
