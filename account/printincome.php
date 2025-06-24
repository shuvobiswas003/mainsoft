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
	<title>Income</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="../css/waves-effect.css" rel="stylesheet">
	<style>
		.main{
			width: 580px;
			height: 800px;
			margin: 0 auto;
			border: 3px solid black;
			border-radius: 10px;
		}
		.clear{
			clear: both;
		}
		#llego{
			width: 100px;
			height: 100px;
			float: left;
			padding: 10px;
		}
		#rlego{
			width: 100px;
			height: 100px;
			float: right;
			padding: 10px;
		}
		.shoptitle h1{
			font-size: 35px;
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
		.cuninfo{
			width: 100%;
			margin-top: 20px;
			min-height: 350px;
		}
		.information{
			width:564px;
			float: left;
			padding-left: 15px;
		}
		.information h3{
			font-size: 15px;
			margin-top: 0px;
			font-weight: bold;
		}
	</style>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Kanit:ital,wght@1,500&family=Lobster&display=swap" rel="stylesheet">

<script src="js/modernizr.min.js"></script>
</head>
<body>
	<div class="main">
		<div class="shoptitle">
		<center>
			<center>
			<h1>
			<?php
			require "../interdb.php";
               $count2=1;
               $sel_query2="Select * from schoolinfo";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
			</h1>
		</center>
			<br>
			<span class="cus">
				Income Slip
			</span>
		</center>
		<div class="clear"></div>
		</div>
<br><br><br><br>
	
	<div class="information">
	

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $id=$_REQUEST['id'];
        require "../interdb.php";
        $count=1;
        $sel_query="Select * from income where id='$id';";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {?>
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["date"]; ?></td>
        <td><?php echo $row["des"]; ?></td>
        <td><?php echo $row["amount"]; ?></td>
        </tr>
        <?php $count++; } ?>                 
        </tbody>
    </table>
    
        <br><br><br><br>
        <span style="text-align: right;"> 
        <h5>Authorised Signature</h5>
        </span>
    
	</div>
	</div>
	<div class="clear"></div>
    <br>
    <br>
    <br>
    
	</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/waves.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../assets/jquery-detectmobile/detect.js"></script>
<script src="../assets/fastclick/fastclick.js"></script>
<script src="../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../assets/jquery-blockui/jquery.blockUI.js"></script>
</body>
</html>