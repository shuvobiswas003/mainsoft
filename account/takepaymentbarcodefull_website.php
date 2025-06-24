<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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
                        <a href="takepaymentbarcodefullqr.php"><button class="btn btn-primary">Take Payment (Mobile Qr CODE Scanner)</button></a><br><br>
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Payment ID(Scan Or Write)</label>
                                    <div class="col-md-9">
                                        <input type="text" name="stu_id" placeholder="Payment ID(Scan Or Write)" autofocus="autofocus" class="form-control" required="1">
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

<?php include 'inc/footer.php'; ?>
