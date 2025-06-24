<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Delete Devices</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Class</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php

require "interdb.php";
// SQL query to retrieve all data from your table
$sql = "SELECT * FROM stuattdancedata WHERE serverstatus IS NULL";

$result = $link->query($sql);

$dataArray = array(); // Initialize an empty array to store the data

// Check if there are any rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Append each row to the data array
        $dataArray[] = $row;


    }
    
} else {
    echo "No records found";
}



// Now $dataArray contains all the data from your table
?>

<?php
$softlink;
    $sel_query2="Select * from schoolinfo";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
    $softlink=$row2['softlink'];
    }
// URL of live host PHP file
$url = $softlink.'/data/get_att_data.php';

// Assuming you already have $dataArray populated
$jsonData = json_encode($dataArray);
?>

<form method="post" action="<?php echo $url;?>" target="_blank">
    <input type="hidden" name="data" value='<?php echo $jsonData; ?>'>
    <input type="submit" value="Send Data to Server" class="btn btn-primary">
</form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>