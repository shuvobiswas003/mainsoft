<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "library"){
        header("location: login.php");
        exit;
    }

    require 'functions.php'; // Include functions.php file
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Issue Book</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">

                            
                           <?php
                           require "../interdb.php";
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $rdate = $_POST['rdate'];
                            $end_date = date("Y-m-d", strtotime($rdate));

                            $book_barcode = $_POST['book_barcode'];
                            $rfid_number = $_POST['rfid_number'];

                            //getting Student Data
                            $stuid = "";
                            $sel_query = "SELECT * FROM rfid WHERE CAST(rfid AS UNSIGNED) = " . (int)$rfid_number;
                            $result = mysqli_query($link, $sel_query);
                            while($row = mysqli_fetch_assoc($result)) {
                                $stuid = $row['stuid'];
                            }


                           $update_query = "UPDATE library_book_issue SET return_date='$end_date', status='Returned' WHERE book_barcode = '$book_barcode' AND student_id='$stuid' AND status='to_lend'";

        
                                if(mysqli_query($link, $update_query)) {
            
                                    echo "<h1 style='color:green'>Book Returned</h1>";
                                } else {
                                    echo "Error updating running amount: " . mysqli_error($link);
                                }

                                $update_query = "UPDATE libary_book_stock SET running_amount = running_amount + 1 WHERE book_barcode = '$book_barcode'";
        
                                if(mysqli_query($link, $update_query)) {
                                    echo "<h1 style='color:green'>Book Stock Updated</h1>";
                                } else {
                                    echo "Error updating running amount: " . mysqli_error($link);
                                }
                        }

                           ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                            

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Cust-name">Select Return Date</label>
                                <div class="col-md-9">
                                    <input type="date" id="Cust-name" name="rdate" class="form-control" placeholder="Enter Date" required="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Cust-name">Book Barcode</label>
                                <div class="col-md-9">
                                    <input type="text" id="Cust-name" name="book_barcode" class="form-control" placeholder="Enter Book Barcode" required="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Cust-name">Scan Student Card</label>
                                <div class="col-md-9">
                                    <input type="text" id="Cust-name" name="rfid_number" class="form-control" placeholder="Scan / Write Card Number" required="1">
                                </div>
                            </div>
                                <input type="submit" class="btn btn-primary" Value="Issue Book">
                            </form>
                            <br>
                            <br>

                            
                        </div><!-- End of panel Body -->
                    </div>
                </div>
            </div>
        </div> <!-- End container -->       
    </div> <!-- End content -->
</div>
<?php include'inc/footer.php'?>
