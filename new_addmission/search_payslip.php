<?php
require_once '../barcode/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style type="text/css">
        .container {
            width: 1200px;
            margin: 0 auto;
        }
        .leftpart {
            float: left;
            width: 47%;
            margin-left: 10px;
        }
        .invoice_border {
            border: 3px solid black;
            
        }
        #cash {
            padding: 10px 20px 10px 20px;
            border: 2px solid Black;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 600;
        }
        #qr {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<?php
require "../interdb.php";
$birth_id = intval($_POST['birth_id']);


$admission_id='';
//getting admission id
 $sel_query3="SELECT * FROM admissions WHERE birth_id='$birth_id'";
        $result3 = mysqli_query($link,$sel_query3);
        while($row3 = mysqli_fetch_assoc($result3)) {
           
            $admission_id=$row3['id'];
        }
//getting student id
$stuid ="";

    $sel_query3="SELECT * FROM student WHERE addmission_id='$admission_id'";
        $result3 = mysqli_query($link,$sel_query3);
        while($row3 = mysqli_fetch_assoc($result3)) {
            $stuid=$row3['uniqid'];
        } 
// Getting data from student payment
$iid = []; // Initialize an empty array

$sel_query3 = "SELECT * FROM studentpayment WHERE stuid='$stuid'";
$result3 = mysqli_query($link, $sel_query3);

while ($row3 = mysqli_fetch_assoc($result3)) {
    $iid[] = $row3['id']; // Add each iid to the array
}


$sel_query1 = "SELECT * FROM student WHERE uniqid='$stuid'";
$result1 = mysqli_query($link, $sel_query1);
if ($row1 = mysqli_fetch_assoc($result1)) {
?>
    <div class="container">
        <div class="leftpart">
            <div class="invoice_border">
                <center><h5>Student Copy</h5></center>
                <center><h2 style="margin-top:-10px; font-size:30px;">
                    <?php
                    $softlink='';
                    $sel_query2 = "SELECT * FROM schoolinfo";
                    $result2 = mysqli_query($link, $sel_query2);
                    if ($row2 = mysqli_fetch_assoc($result2)) {
                        echo $row2['schoolname'];
                        $softlink=$row2['softlink'];
                    }
                    ?>
                </h2></center>
                <center><span id="cash">Cash Receipt</span></center>
                <table>
                    <tr>
                        <td>
                            <h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name']; ?> </h3>
                            <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber']; ?></p></h3>
                            <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll']; ?></p></h3>
                            <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup']; ?></p></h3>
                            <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile']; ?></p></h3>
                        </td>
                        <td>
                            <b><h3>Print Date: <?php echo date('Y-m-d'); ?></h3></b>
                        </td>
                    </tr>
                </table>
                <table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;margin-right:20px;">
                    <tr>
                        <th style="width:400px;">Description(Date)</th>
                        <th style="width:50px;">Total</th>
                        <th style="width:50px;">Pay</th>
                        <th style="width:50px;">Satus</th>
                    </tr>
                    <?php
                    $totaldue = 0;
                    $totalamount = 0;
                    $totalpay = 0;

                    $totaldues = 0;
                    $totalamounts = 0;
                    $totalpays = 0;
                    foreach ($iid as $idn) {
                        $sel_query = "SELECT * FROM studentpayment WHERE id='$idn'";
                        $result = mysqli_query($link, $sel_query);
                        if ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php
                            $pcatid = $row['pcatid'];
                            $sel_query10 = "SELECT * FROM paycat WHERE id='$pcatid'";
                            $result10 = mysqli_query($link, $sel_query10);
                            if ($row10 = mysqli_fetch_assoc($result10)) {
                                echo $row10['pcatname'];
                                echo "(";
                                echo $row['date'];
                                echo ")";
                            }
                            ?>
                        </td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['totalpay']; ?></td>
                        <th>
                            <?php
                            $color=""; 
                             if ($row['status']== "Paid") {
                                 $color="green";
                             }
                            else{
                                $color="red";
                             }
                            ?>
                            <span style="color:<?php echo $color?>">
                                <?php echo $row['status'];?>
                            </span>
                        </th>
                    </tr>
                    <?php
                            $totaldue += $row['due'];
                            $totalamount += $row['total'];
                            $totalpay += $row['totalpay'];
                        }
                    }
                    ?>
                </table>
                    <center>
                    <table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;margin-right:20px;">
                        <caption><h3>Online Payment Info(Last 5)</h3></caption>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            
                        </tr>
                         <?php
                        $count25 = 1;
                        $sel_query21 = "SELECT * FROM sslcommerz_transaction WHERE data_b='$stuid'";
                        $result21 = mysqli_query($link, $sel_query21);
                        while ($row21 = mysqli_fetch_assoc($result21)) {
                        ?>
                            <tr>
                                <td><?php echo $row21['tran_date']; ?></td>
                                <td><?php echo $row21['card_type']; ?></td>
                                <td><?php echo $row21['amount']; ?></td>
                            </tr>
                        <?php
                            $count25++;
                        }
                        ?>
                    </table>
                </center>

                <h3 style="margin-left:20px;">In Total: <?php echo $totalamount; ?> Tk Only</h3>
                <h3 style="margin-left:20px;">Total Pay: <?php echo $totalpay; ?> Tk Only</h3>
                <h3 style="margin-left:20px;">Due Amount: <?php echo $totaldue; ?> Tk Only</h3>
                <center>
                   
                    <br><br><br>
                    <?php
                        

                        $text = $softlink."/payment_process_qr.php?stuid=".$stuid."";

                        $qr_code = QrCode::create($text);

                        $writer = new PngWriter;
                        $result5 = $writer->write($qr_code);

                        // Get the base64-encoded image data
                        $imageData = base64_encode($result5->getString());
                        echo '<img src="data:image/png;base64,'.$imageData.'" id="qr"/>';
                        ?>
                        <h6>Scan This QR Code to Payment</h6>
                </center>
            </div>
        </div>

        

        
    </div>
<?php
}
?>
</body>
</html>
