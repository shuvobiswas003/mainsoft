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
                                <h4 class="pull-left page-title">School Setting</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">School Setting</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //getting form data
        $id=1;
        $schoolname= $_POST['schname'];
        $schooladdress= $_POST['schaddress'];
        $mobile= $_POST['schmobile'];
        $website= $_POST['schweb'];
        $schoolnameb= $_POST['schnameb'];
        $schooladdressb= $_POST['schaddressb'];
        $mobileb= $_POST['schmobileb'];
        $schmail= $_POST['schmail'];
        $shortcode=$_POST['shortcode'];
        $softlink=$_POST['softlink'];
        //insert Lego 
        if(isset($_FILES['image'])){
        $info       = pathinfo($_FILES['image']['name']);
        $ext    = $info['extension'];
        $filename="lego".".".$ext;
        $filetmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($filetmp,"../img/college/".$filename);
        }


        //insert to database
        require "interdb.php";
        $sql ="INSERT INTO schoolinfo(id,schoolname,schooladdress,mobile,website,schoolnameb,schooladdressb,mobileb,schmail,shortcode,softlink) VALUES ('$id','$schoolname','$schooladdress','$mobile','$website','$schoolnameb','$schooladdressb','$mobileb','$schmail','$shortcode','$softlink') ON DUPLICATE KEY UPDATE schoolname='$schoolname',schooladdress='$schooladdress',mobile='$mobile',website='$website',schoolnameb='$schoolnameb',schooladdressb='$schooladdressb',mobileb='$mobileb',schmail='$schmail',shortcode='$shortcode',softlink='$softlink'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Info Updated Sucessfully</h1>.";
    } else{
        echo "<h3 style='color:red;'>Info Cant Updated Sucessfully</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from schoolinfo where id=1;";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Name</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schname" class="form-control" autofocus="autofocus" value="<?php echo $row['schoolname'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Address</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schaddress" class="form-control" value="<?php echo $row['schooladdress'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Mobile</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schmobile" class="form-control" value="<?php echo $row['mobile'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Email</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schmail" class="form-control"value="<?php echo $row['schmail'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Website</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schweb" class="form-control" value="<?php echo $row['website'];?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Software Link</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="softlink" class="form-control" value="<?php echo $row['softlink'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Name (Bangla)</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schnameb" class="form-control" value="<?php echo $row['schoolnameb'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Address(Bangla)</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schaddressb" class="form-control" value="<?php echo $row['schooladdressb'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Mobile(Bangla)</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="schmobileb" class="form-control" value="<?php echo $row['mobileb'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">College/School Short Code</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="shortcode" class="form-control" value="<?php echo $row['shortcode'];?>">
                    </div>
                </div>
                <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Cust-name">Lego</label>
                        <div class="col-md-9">
                            <input type="file" name ="image" id="image" class="form-control" placeholder="Image Must Be PNG"><p style="color: red;">Image Must Be PNG</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <center>
                    <div id="preview"></div>
                    </center>
                </div>
                </div>
            <?php $count++; } ?>
        <input type="submit" class="btn btn-primary" Value="Update Setting">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">College Information</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from schoolinfo where id=1;";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <center>
                    <h1><?php echo $row['schoolname'];?></h1>
                    <img src="../img/college/lego.jpg" alt="">
                    <h4>Mobile:<?php echo $row['mobile'];?></h4>
                    <h4>Email:<?php echo $row['schmail'];?></h4>
                    <h4>Website:<?php echo $row['website'];?></h4>
                    
                

            
                <h3>Software LINK: <?php echo $row['softlink'];?></h3>
                </center>
            <div class="col-md-6">
                <center>
                    <h2>Information (English)</h2>
                </center>
                <h3>Name: <?php echo $row['schoolname'];?></h3>
                <h3>Address: <?php echo $row['schooladdress'];?></h3>
                <h3>Mobile:<?php echo $row['mobile'];?></h3>
            </div>
            <div class="col-md-6">
                <center>
                    <h2>তথ্য (বাংলা)</h2>
                </center>
                <h3>নাম: <?php echo $row['schoolnameb'];?></h3>
                <h3>ঠিকানা: <?php echo $row['schooladdressb'];?></h3>
                <h3>মোবাইল:<?php echo $row['mobileb'];?></h3>

            </div>
        </div>
        <?php $count++; } ?>
    </div>
</div>
</div>
</div>
</div>
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>