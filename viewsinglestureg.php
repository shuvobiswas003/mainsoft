<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
                                <h4 class="pull-left page-title">Student Regestration</h4>
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
require 'interdb.php';
$uniqid=$_REQUEST['uniqid'];
$count=1;
$sel_query="SELECT * FROM student WHERE uniqid='$uniqid'";
$result = mysqli_query($link,$sel_query);
 while($row = mysqli_fetch_assoc($result)) {

?>
<!--Print School Info Start-->
            <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h1 style="font-size: 50px;color: black;">
                            <?php echo $row2['schoolname']?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['schooladdress'];?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['website'];?>
                        </h1>
                    </center>
                </div>
            </div>
            
            <?php $count2++; } ?>
            <center>
                <h2 style="color: green;">Online Regestration</h2>
            </center>
        <!--Print School Info END-->
        <!--Print Student INFO Start-->
        <div class="col-md-12">
            <center>
                <h2>Student Information</h2>
                <img src="img/student/<?php echo $row['imgname'];?>" alt="" style="height: 150px;width:150px;border-radius: 50%;"><br>
                <h4>
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
        </div>

        <div class="col-md-12">
            <table  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Subject Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $count2=1;
                $sel_query2="Select * from sturegsubject WHERE uniqid='$uniqid' AND (substatus=1 OR substatus=4)";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                <tr>
                    <td><?php echo $row2['subcode']?></td>
                    <td><?php echo $row2['subname']?></td>
                    <td>
                        <?php 
                        $substatus= $row2['substatus'];
                        switch ($substatus) {
                            case '1':
                                echo "Compoulsary Subject";
                                break;
                            case '4':
                                echo "Optional Subject(4th Subject)";
                                break;
                            
                            default:
                                echo "Not For Choiche";
                                break;
                        }
                        ?>
                        
                    </td>
                </tr>
                <?php $count2++; } ?>
                </tbody>
            </table>

        </div>
        <!--Print Student INFO END-->
        <?php $count1++; } ?>


<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>