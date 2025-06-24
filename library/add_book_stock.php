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
                    <h4 class="pull-left page-title">Book</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Book</h3>
                        </div>
                        <a href="excel_template_download_booklist_datasheet.php" target="_blank"><button class="btn btn-primary">Download Data Sheet</button></a>

                        <div class="panel-body">
                            <form action="excel_book_stock_up.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="publisher_name">Select Excel File</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="excel_file">
                                    </div>
                                </div>
                                 <input type="submit" class="btn btn-primary" Value="Upload">
                            </form>



                        </div><!-- End of panel Body -->
                    </div>
                </div>

                 <!-- Section View Part Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">View Class</h3>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                                viewBook_stock(); // Call the viewClasses function
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section View Part END -->
            </div>
        </div> <!-- End container -->       
    </div> <!-- End content -->
</div>
<?php include'inc/footer.php'?>
