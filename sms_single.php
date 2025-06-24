<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'sms.php';
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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">S.M.S</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->

<!-- SMS Form -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="recipientNumber">Recipient Phone Number:</label>
            <input type="text" class="form-control" id="recipientNumber" name="recipientNumber" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send SMS</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipientNumber = $_POST['recipientNumber'];
    $message = $_POST['message'];
    
    if (sendSMS($recipientNumber, $message)) {
        echo "<h3 style='color:green;'>SMS SENT</h3>";
    } else {
        echo "<h3 style='color:red;'>SMS FAILED/ NOT Sufficent Balance</h3>";
    }
}

    ?>
<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>