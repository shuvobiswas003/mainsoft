<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="../css/waves-effect.css" rel="stylesheet">
    <style>
        .main{
            width: 800px;
            min-height: 1120px;
            margin: 0 auto;
            border-radius: 10px;
            background: 
        }
        .clear{
            clear: both;
        }
        #llego{
            width: 150px;
            height: 150px;
            float: left;
            padding: 10px;
        }
        #rlego{
            width: 150px;
            height: 150px;
            float: right;
            padding: 10px;
            margin-top: -12px;
        }
        .shoptitle{
        }
        .shoptitle h1{
            font-size: 50px;
            margin-top: 10px;
            font-family: 'Lobster', cursive;

        }
        .shoptitle h3{
            font-size: 20px;
            margin-top: 5px;
            font-family: 'Dosis', sans-serif;
        }
        .cus{
            font-size: 20px;
            padding:10px;
            border: 2px solid black;
            font-size: 20px;
            border-radius: 10px;
        }
        .barcode{
            width: 220px;
            height: 80px;
            margin-top: -120px;
            margin-left: 550px;
        }
        .custinformation{
            min-height: 150px;
        }
        .shopleft{
            padding-left: 10px;
            width: 50%;
            height: 150px;
            float: left;
        }
        .shopleft h4,h1,h4,h5{
            margin: 3px;
        }
        .shopleft>h3{
            margin: 3px;
        }
        .customarright{
            width: 50%;
            float: right;
        }
        .customarright>h3{
            margin: 3px;
        }
        .fleft{
            width: 50%;
            float: left;
        }
        .fright{
            width: 50%;
            float: right;
        }
        .fright_top h3{
            font-size: 65px;
            font-weight: 1000;
            transform: rotate(-45deg);
            margin: -10px;

        }
        .fright_top h4{
           
        }
        
    </style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Kanit:ital,wght@1,500&family=Lobster&display=swap" rel="stylesheet">

<script src="../js/modernizr.min.js"></script>
</head>
<body>
   <?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $date=$_POST['sdate'];
   ?>
    <div class="main">
        <div class="shoptitle">
        <center>
            <center>
            <h1>
            <?php
            require "../../interdb.php";
               $count2=1;
               $sel_query2="Select * from schoolinfo";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
            </h1>
        </center>
           
        </center>
    
        </div>
   
       

    <div class="invoice_info">
    <table class="table table-bordered">
    <thead>
        <center>
            <br>
            <h1>Expense Details</h1>
            <h3>Date: <?php echo $date;?></h3>
        </center>
        <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Description</th>
        <th>Amount</th>
        </tr>
    </thead>
<tbody>
<?php
require "../../interdb.php";
$count=1;
$sel_query="Select * from expense where date='$date';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<tr>
<th><?php echo $row['id']?></th>
<th><?php echo $row['date']?></th>
<th><?php echo $row['des']?></th>
<th><?php echo $row['amount']?></th>
</tr>
<?php $count++; } ?>

</tbody>

</table>

<?php
require "../../interdb.php";
$count=1;
$sel_query="Select sum(amount) from expense where date='$date';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {?>
<h1 style="color:red;">Total Expense <?php echo $row['sum(amount)']?></h1>
<?php $count++; } ?>



    </div>
        <div class="fright">
            <div class="fright_top">
                <h3>
                    
                </h3>
                <br><br><br>
                <center><h4>Authorised Signature & Seal</h4></center>
            </div>

        </div>

    </div>



    </div>
<?php }?>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/waves.js"></script>
<script src="../../js/wow.min.js"></script>
<script src="../../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../../js/jquery.scrollTo.min.js"></script>
<script src="../../assets/jquery-detectmobile/detect.js"></script>
<script src="../../assets/fastclick/fastclick.js"></script>
<script src="../../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../../assets/jquery-blockui/jquery.blockUI.js"></script>
</body>
</html>