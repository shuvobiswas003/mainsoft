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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Page Title</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->
<?php 
$bnumber=$_REQUEST['bnumber'];
$roomnumber=$_REQUEST['roomnumber'];
$numofbench=$_REQUEST['numofbench'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
$bnumber=$_POST['bnumber'];
$roomnumber=$_POST['roomnumber'];
$numberofbench=$_POST['numberofbench'];
for ($i = 0; $i < count($numberofbench); $i++) {
    $numberofbenchn=$numberofbench[$i];
    $rownumber=$i+1;
    $uninumber=$bnumber.$roomnumber.$rownumber;

    require "../interdb.php";
        $sql ="INSERT INTO buildingroombench(bnumber,roomnumber,rownumber,numberofbench,uninum) VALUES ('$bnumber','$roomnumber','$rownumber','$numberofbenchn','$uninumber')ON DUPLICATE KEY UPDATE bnumber='$bnumber',roomnumber='$roomnumber',rownumber='$rownumber',numberofbench='$numberofbenchn'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Bench Asign Successfully</h1>.";
    } else{
        echo "<h3 style='color:red;'>Bench Asign is not Successfully</h1>";
    }

}
}

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Building Number</label>
        <div class="col-md-9">
            <select name="bnumber" id="Cust-name" class="form-control">
                <option value="<?php echo $bnumber;?>"><?php echo $bnumber;?></option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Room Number</label>
        <div class="col-md-9">
           <select name="roomnumber" id="Cust-name" class="form-control">
                <option value="<?php echo $roomnumber;?>"><?php echo $roomnumber;?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Bench Number of ROW</label>
        <div class="col-md-9">
           <select name="numofbench" id="Cust-name" class="form-control">
                <option value="<?php echo $numofbench;?>"><?php echo $numofbench;?></option>
            </select>
        </div>
    </div>

    <?php
    for ($i=1; $i<=$numofbench ; $i++) { 
    ?>
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Row Number: <?php echo $i?>, Number OF Bench</label>
            <div class="col-md-9">
               <input type="number" name="numberofbench[]" class="form-control">
            </div>
        </div>

    <?php
    }
    ?>

<input type="submit" class="btn btn-primary" value="Asign Bench">
</form>






<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>