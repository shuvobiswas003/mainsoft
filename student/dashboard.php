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

                      <div class="row">
                          <marquee behavior="slow" direction="">
                            <h1 style="color: green;">
                                Welcome to Student One Point Service
                            </h1>
                        </marquee>
                      </div>
                       

<!--1st Form Start-->
    <div class="panel-body">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name" style="font-size: 20px">Scan Card</label>
                    <div class="col-md-9">
                        <input type="text" name="card" style="font-size: 20px"  class="form-control" autofocus="autofocus">
                    </div>
                </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Details">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
require "../interdb.php";

$uniqid="";
$card=$_POST['card'];

$sel_query="SELECT * FROM rfid WHERE rfid='$card'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $uniqid=$row['stuid'];
        }
?>

<div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered table-dark">
        <tbody>

       <?php
require "../interdb.php";
$sel_query3 = "SELECT * FROM student WHERE uniqid= '$uniqid'";
$result3 = mysqli_query($link, $sel_query3);
while ($row3 = mysqli_fetch_assoc($result3)) {
?>
<tr>
    <td rowspan="4">
        <center>
        <!--Img Start-->
        <?php
        $imgsl = $row3["imgname"];
        if ($imgsl == "IMG_0.png" OR $imgsl = "") {
        ?>
            <img src="../img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" style="height: 200px;">
        <?php
        } else {
        ?>
            <img src="../img/student/<?php echo $row3['imgname']; ?>" style="height: 200px;">
        <?php
        }
        ?>
        </center>
        <!--Img End-->
    </td>
<tr>
    <td style="font-size:30px;color: black;">Name:</td>
    <td style="font-size:30px;color: black;"><?php echo $row3['name']; ?></td>
</tr>
<tr>
    <td style="font-size:30px;color: black;">Class:</td>
    <td style="font-size:30px;color: black;"><?php echo $row3['classnumber']; ?></td>
</tr>
<tr>
    <td style="font-size:30px;color: black;">Section/Group:</td>
    <td style="font-size:30px;color: black;"><?php echo $row3['secgroup']; ?></td>
</tr>


</tbody>
    </table>
</div>
</div>


    <div class="col-md-12">
        <div class="header">
            <h1>Quick Menu</h1>
        </div>
        
        <div class="grid-container">
            <a href="multislipsingle_card.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">টাকা জমার রসিদ প্রিন্ট</a>
            <a href="multi_paid_slip.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">জমাকৃত টাকার রশিদ প্রিন্ট</a>
            <a href="takepayment_single.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">টাকা জমা (একক রশিদ)</a>
            <a href="multipay_single.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">টাকা জমা (একাধিক রশিদ)</a>
            <a href="singlestuattdance.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">হাজিরা তথ্য</a>
            <a href="library_information.php?stuid=<?php  echo $row3['uniqid']?>" class="grid-item" target="_blank">লাইব্রেরী তথ্য</a>
            <a href="admitsingle.php?classnumber=<?php  echo $row3['classnumber']?>&secgroupname=<?php  echo $row3['secgroup']?>&roll=<?php  echo $row3['roll']?>" class="grid-item" target="_blank">প্রবেশপত্র</a>
            <a href="create_protyon.php?stuid=<?php  echo $row3['uniqid']?>&card_no=<?php echo $card;?>" class="grid-item" target="_blank">প্রত্যয়ন পত্র</a>
            <a href="" class="grid-item">প্রশংসাপত্র</a>
            <a href="" class="grid-item">ছাড়পত্র</a>
            
            
            <!-- Additional grid items can be added here -->
        </div>
    </div>




<div class="form-primary" style="margin-top: 40px;">
   

</div>
        
                    

</div>
                
        </div>

</form>  
<?php
} //ending student information
?>

    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
                        
                        


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>