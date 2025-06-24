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
                    <h4 class="pull-left page-title">Class</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Class</h3>
                        </div>
                        <div class="panel-body">
                            <?php
if(isset($_GET['id'])) {
    $publisherId = $_GET['id'];  
}
// Check if the form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['publisher_id'])) {
    $publisherId = $_POST['publisher_id'];
    $publisherName = $_POST['pub_name'];

    // Call the editPublisher function to update the publisher
    if(editPublisher($publisherId, $publisherName)){
        echo "Publisher Updated Successfully";
        echo "<br />";
        echo "Go Back To Publisher Dashboard<br>";
        echo "<a href='add_publisher.php'>Publisher View/Add</a>";
    } else {
        // If update fails, display an error message
        echo "Error updating publisher.";
    }
}
?>
                            
                            <?php
                            if(isset($_GET['id']) && !($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['publisher_id']))) {
                                // Display the edit form only if the form is not submitted
                                editPublisherForm($publisherId);
                            }
                            ?>
                        </div><!-- End of panel Body -->
                    </div>
                </div>
            </div>
        </div> <!-- End container -->       
    </div> <!-- End content -->
</div>
<?php include'inc/footer.php'?>
