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
                    <h4 class="pull-left page-title">Publisher</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Publisher</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                addClass(); // Call the addClass function
                            ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="Cust-name">Publisher Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="Cust-name" name="pub_name" class="form-control" placeholder="Enter Publisher Name">
                                    </div>
                                </div>
                                
                               
                                <input type="submit" class="btn btn-primary" Value="Add Class">
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
                                                viewClasses(); // Call the viewClasses function
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
