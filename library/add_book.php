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
                        <div class="panel-body">

                            <a href="excel_book_list_upform.php"><button class="btn btn-primary">Excel Upload</button></a>
                            <?php
                                add_Book(); // Call the addClass function
                            ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="publisher_name">Select Publisher</label>
                                    <div class="col-md-9">
                                        <select name="publisher_name" id="publisher_name" required="1" class="select2">
                                            <option value="">Select Publisher</option>
                                            <?php
                                                $publishers = getPublishers(); // Fetch publishers from database
                                                foreach ($publishers as $publisher) {
                                                    echo "<option value='{$publisher['pub_name']}'>{$publisher['pub_name']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="author_name">Select Author</label>
                                    <div class="col-md-9">
                                        <select name="author_name" id="author_name" required="1" class="select2">
                                            <option value="">Select Author</option>
                                            <?php
                                                $authors = getAuthors(); // Fetch authors from database
                                                foreach ($authors as $author) {
                                                    echo "<option value='{$author['author_name']}'>{$author['author_name']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="book_name">Book Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="book_name" required class="form-control" autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="book_barcode">Book Barcode</label>
                                    <div class="col-md-9">
                                        <input type="text" name="book_barcode" required class="form-control">
                                    </div>
                                </div>
                                
                               
                                <input type="submit" class="btn btn-primary" Value="Add Book">
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
                                                viewBooklist(); // Call the viewClasses function
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
