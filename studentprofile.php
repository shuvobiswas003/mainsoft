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

                        
<!--Above System Part. After bootstrap row col-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Student Information</h3>
            </div>
            <!--Insert END-->
           
        <div class="panel-body">
        <?php
            $id=$_REQUEST['id'];
            require "interdb.php";
            $count=1;
            $sel_query="Select * from student where id='$id';";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
                $stuuniqid=$row['uniqid'];
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
        <!--Print School Info END-->
        <div class="col-md-12">
            <center>
                <h2>Student Information</h2>
                <!--Image Part Start-->
            
            <!--Img Start-->
            <?php
            $imgsl=$row["imgname"];
            if($imgsl=="IMG_0.png" OR $imgsl=""){
            ?>
            <img src="img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg" style="height: 150px;width:150px;border-radius: 50%;">
            <?php
            }else{
            ?>
            <img src="img/student/<?php echo $row['imgname'];?>" style="height: 150px;width:150px;border-radius: 50%;">

            <?php
            }
            ?>
            <!--Img End-->
            <br>
                
                <h4>
                <?php echo $row['name'];?><br> <?php echo $row['classname'];?> (<?php echo $row['classnumber'];?>) <br>
                Roll:<?php echo $row['roll'];?>
                Section:<?php echo $row['secgroup'];?>
                </h4>
            </center>
        </div>
        <div class="col-md-12">
            <center>
            <h2>Student Details Information</h2>
            </center>
        </div>
        <div class="col-md-6">
            <center>
            <h3> Student Part(Bangla) </h3>
            </center>
            <div class="from-group">
                <label for="" class="col-md-3">শিক্ষার্থীর নাম</label>
                <h4><?php echo $row['nameb']?></h4>
            </div>
            <div class="from-group">
                <label for="" class="col-md-3">পিতার নাম</label>
                <h4><?php echo $row['fnameb']?></h4>
            </div>
            <div class="from-group">
                <label for="" class="col-md-3">মাতার নাম</label>
                <h4><?php echo $row['mnameb']?></h4>
            </div>
        </div>
        <div class="col-md-6">
            <center>
            <h3> Student Part(English) </h3>
            </center>
            <div class="from-group">
                <label for="" class="col-md-3">Student Name</label>
                <h4><?php echo $row['name']?></h4>
            </div>
            <div class="from-group">
                <label for="" class="col-md-3">Father's Name</label>
                <h4><?php echo $row['fname']?></h4>
            </div>
            <div class="from-group">
                <label for="" class="col-md-3">Mother's Name</label>
                <h4><?php echo $row['mname']?></h4>
            </div>
        </div>

        <div class="col-md-12">
            <center>
                <h3>National Data Information</h3>
            </center>
        </div>
            <div class="col-md-6">
                <div class="from-group">
                <label for="" class="col-md-3">Birth ID No</label>
                <h4><?php echo $row['birthid']?></h4>
                <div class="from-group">
                    <label for="" class="col-md-3">Date Of Birth</label>
                    <h4><?php echo $row['dob']?></h4>
                </div>
            </div>
            
            </div>
            <div class="col-md-6">
                    
            <div class="from-group">
                <label for="" class="col-md-3">Father's NID</label>
                <h4><?php echo $row['fnid']?></h4>
            </div>
            <div class="from-group">
                <label for="" class="col-md-3">Mother's NID</label>
                <h4><?php echo $row['mnid']?></h4>
            </div>
                    
            </div>

        <div class="col-md-12">
            <center>
                <h3>Academic And Contuct Info</h3>
            </center>
        </div>
        
        <div class="col-md-6">
            <div class="from-group">
                <label for="" class="col-md-3">Address</label>
                <h4><?php echo $row['address']?></h4>
            </div>
        </div>
        <div class="col-md-6">
             <div class="from-group">
                <label for="" class="col-md-3">Mobile Number</label>
                <h4><?php echo $row['mobile']?></h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="from-group">
                <label for="" class="col-md-3">Roll</label>
                <h4><?php echo $row['roll']?></h4>
            </div>
        </div>
        <div class="col-md-6">
             <div class="from-group">
                <label for="" class="col-md-3">Section</label>
                <h4><?php echo $row['secgroup']?></h4>
            </div>
        </div>

            

        </div>
    
<?php $count++; } ?>




<!--Below System Part -->
</div>
</div>
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>