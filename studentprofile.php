<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        
<!--Above System Part. After bootstrap row col-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Student Information</h3>
            </div>
            <!--Insert END-->
           
        <div class="panel-body">
        <?php
            $id=$_REQUEST['id'];
            require "interdb.php";
            $count=1;
            $sel_query="Select * from student where id='$id';";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
                $stuuniqid=$row['uniqid'];
        ?>
        <!--Print School Info Start-->
        <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h1 style="font-size: 50px;color: #337ab7;">
                            <?php echo $row2['schoolname']?>
                        </h1>
                        <h1 style="font-size: 20px;color: #5bc0de;">
                            <?php echo $row2['schooladdress'];?>
                        </h1>
                        <h1 style="font-size: 20px;color: #5cb85c;">
                            <?php echo $row2['website'];?>
                        </h1>
                    </center>
                </div>
            </div>
            
            <?php $count2++; } ?>
        <!--Print School Info END-->
        <div class="col-md-12">
            <center>
                <h2 style="color: #d9534f;">Student Information</h2>
                <!--Image Part Start-->
            
            <!--Img Start-->
            <?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl==""){
            ?>
            <img src="img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg" style="height: 150px;width:150px;border-radius: 50%;border: 5px solid #5cb85c;">
            <?php
            }else{
            ?>
            <img src="img/student/<?php echo $row['imgname'];?>" style="height: 150px;width:150px;border-radius: 50%;border: 5px solid #5cb85c;">

            <?php
            }
            ?>
            <!--Img End-->
            <br>
                
                <h4 style="color: #337ab7;">
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <center><h3> Student Part (Bangla) </h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">শিক্ষার্থীর নাম</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['nameb']?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">পিতার নাম</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['fnameb']?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">মাতার নাম</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['mnameb']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <center><h3> Student Part (English) </h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Student Name</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['name']?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Father's Name</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['fname']?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Mother's Name</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $row['mname']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <center><h3>National Data Information</h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Birth ID No</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['birthid']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Date Of Birth</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['dob']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Father's NID</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['fnid']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mother's NID</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['mnid']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <center><h3>Academic And Contact Info</h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Address</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['address']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Roll</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['roll']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Mobile Number</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['mobile']?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Section</label>
                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo $row['secgroup']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payment Information Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #5bc0de;color: white;">
                        <h3 class="panel-title">Payment Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="background-color: #337ab7;color: white;">
                                        <th>#</th>
                                        <th>Payment Category</th>
                                        <th>Total Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Payment Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $payment_query = "SELECT * FROM studentpayment WHERE stuid='$stuuniqid'";
                                    $payment_result = mysqli_query($link, $payment_query);
                                    $payment_count = 1;
                                    
                                    while($payment_row = mysqli_fetch_assoc($payment_result)) {
                                        // Get payment details from invoicetrx
                                        $iid = $payment_row['puniid'];
                                        $payment_details_query = "SELECT * FROM invoicetrx WHERE iid='$iid'";
                                        $payment_details_result = mysqli_query($link, $payment_details_query);
                                        $payment_details = mysqli_fetch_assoc($payment_details_result);
                                    ?>
                                    <tr>
                                        <td><?php echo $payment_count; ?></td>
                                        <td><?php echo $payment_row['pcatid']; ?></td>
                                        <td><?php echo $payment_row['total']; ?></td>
                                        <td><?php echo $payment_row['totalpay']; ?></td>
                                        <td><?php echo $payment_row['due']; ?></td>
                                        <td>
                                            <?php if($payment_row['status'] == 'Paid'): ?>
                                                <span class="label label-success"><?php echo $payment_row['status']; ?></span>
                                            <?php else: ?>
                                                <span class="label label-danger"><?php echo $payment_row['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $payment_row['date']; ?></td>
                                        <td>
                                            <?php if(!empty($payment_details)): ?>
                                                Amount: <?php echo $payment_details['amount']; ?><br>
                                                Date: <?php echo $payment_details['date']; ?><br>
                                                Method: <?php echo ($payment_details['method'] == '' || $payment_details['method'] == 'manual') ? 'Offline' : $payment_details['method']; ?>
                                            <?php else: ?>
                                                No payment details found
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php $payment_count++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Attendance Information Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #5cb85c;color: white;">
                        <h3 class="panel-title">Attendance Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="background-color: #337ab7;color: white;">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Clock In/Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $attendance_query = "SELECT * FROM stuattdancedata WHERE stuid='$stuuniqid' ORDER BY adate DESC LIMIT 100";
                                    $attendance_result = mysqli_query($link, $attendance_query);
                                    $attendance_count = 1;
                                    
                                    while($attendance_row = mysqli_fetch_assoc($attendance_result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $attendance_count; ?></td>
                                        <td><?php echo $attendance_row['adate']; ?></td>
                                        <td><?php echo $attendance_row['ctime']; ?></td>
                                        <td>
                                            <?php if($attendance_row['status'] == 'Present'): ?>
                                                <span class="label label-success"><?php echo $attendance_row['status']; ?></span>
                                            <?php else: ?>
                                                <span class="label label-danger"><?php echo $attendance_row['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $attendance_row['cinout']; ?></td>
                                    </tr>
                                    <?php $attendance_count++; } ?>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

<?php $count++; } ?>

</div>
</div>
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>