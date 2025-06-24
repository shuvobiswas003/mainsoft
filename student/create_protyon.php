<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Exam Mark Entry</h3>
</div>


 <!--2nd Form Part Start-->
<div class="panel-body">
<?php


//getting Student Data
$card_no=$_REQUEST['card_no'];
        $stuid = $_REQUEST['stuid'];
       
?>
<form action="add_protyon.php" method="POST" class="form-horizontal" role="form" target="_blank">
<?php
require "../interdb.php";
?>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">ID</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="id" required="1">
                <?php
                // Assuming $link is your MySQL connection

                // Getting the last ID from the table
                $sql = "SELECT MAX(id) AS latest_id FROM protyon";
                $result = mysqli_query($link, $sql);

                if ($result) {
                    // Fetch the result as an associative array
                    $row = mysqli_fetch_assoc($result);

                    // Retrieve the latest auto-incremented value
                    $latestID = $row['latest_id'];

                    // Increment the ID
                    $invoice_id = $latestID + 1;
                } else {
                    // Handle the case where the query fails
                    echo "Error: " . mysqli_error($link);
                }
                ?>
                <option value="<?php echo $invoice_id;?>"><?php echo $invoice_id;?></option>
            </select>
        </div>
    </div>
<div class="form-group">
    <label class="col-md-3 control-label" for="stu_card">Student RFID Card Bo</label>
    
    <div class="col-md-9">
        <select name="stu_card" id="" class="form-control">
            <option value="<?php echo $card_no?>"><?php echo $card_no?></option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="stu_id">Student ID</label>
    
    <div class="col-md-9">
        <select name="stu_id" id="" class="form-control">
            <option value="<?php echo $stuid?>"><?php echo $stuid?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="Cust-name"> Select Date</label>
    <div class="col-md-9">
        <input type="date" id="Cust-name" name="sdate" class="form-control" placeholder="Enter Date" required="1">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="memorial_no">Memorial no</label>
    <div class="col-md-9">
        <input type="text" name="memorial_no" class="form-control" autofocus='autofocus'>
    </div>
</div>


<?php


$stuid = $stuid;

$query = "SELECT * FROM stuaddressbangla WHERE stuid = '$stuid'";
$result = mysqli_query($link, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $village = $row['village'];
    $post = $row['post'];
    $ps = $row['ps'];
    $ds = $row['ds'];
} else {
    $village = "";
    $post = "";
    $ps = "";
    $ds = "";
}
?>


<div class="form-group">
    <label class="col-md-3 control-label" for="village">Village</label>
    <div class="col-md-9">
        <input type="text" id="village" name="village" class="form-control" placeholder="Enter Village" required='1'  value="<?php echo $village; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="post">Post</label>
    <div class="col-md-9">
        <input type="text" id="post" name="post" class="form-control" placeholder="Enter Post" required='1' value="<?php echo $post; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ps">PS (Police Station)</label>
    <div class="col-md-9">
        <input type="text" id="ps" name="ps" class="form-control" placeholder="Enter Police Station" required='1' value="<?php echo $ps; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ds">DS (District)</label>
    <div class="col-md-9">
        <input type="text" id="ds" name="ds" class="form-control" placeholder="Enter District" required='1' value="<?php echo $ds; ?>">
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-primary">Submit Protyon</button>
    </div>
</div>

    </form>                            
    
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>