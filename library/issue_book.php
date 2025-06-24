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
                                issue_book(); // Call the addClass function
                            ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Cust-name"> Select Date of Issue</label>
                                <div class="col-md-9">
                                    <input type="date" id="Cust-name" name="sdate" class="form-control" placeholder="Enter Date" required="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Cust-name">Select Date of Expiry</label>
                                <div class="col-md-9">
                                    <input type="date" id="Cust-name" name="edate" class="form-control" placeholder="Enter Date" required="1">
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

                            <!-- Section View Part Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">View Class</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                                viewBookIssue(); // Call the viewClasses function
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section View Part END -->
                        </div><!-- End of panel Body -->
                    </div>
                </div>
            </div>
        </div> <!-- End container -->       
    </div> <!-- End content -->
</div>
<?php include'inc/footer.php'?>
