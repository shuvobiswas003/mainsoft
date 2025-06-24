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
        $estd=$_POST['estd'];
        $eiin=$_POST['eiin'];
        $schcode=$_POST['schcode'];
        $voccode=$_POST['voccode'];
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
        $headname=$_POST['headname'];
        $headnameb=$_POST['headnameb'];
        $head_deg=$_POST['head_deg'];
        $head_deg_bangla=$_POST['head_deg_bangla'];
        
        // Insert Lego
if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
    $info = pathinfo($_FILES['image']['name']);
    $ext = $info['extension'];
    $filename = "lego" . "." . $ext;
    $filetmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($filetmp, "img/" . $filename);
}

// Insert HMSign
if(isset($_FILES['hmsign']) && $_FILES['hmsign']['error'] === UPLOAD_ERR_OK){
    $info = pathinfo($_FILES['hmsign']['name']);
    $ext = $info['extension'];
    $filename = "hmsign" . "." . $ext;
    $filetmp = $_FILES['hmsign']['tmp_name'];
    move_uploaded_file($filetmp, "img/" . $filename);
}

        //insert to database
        require "interdb.php";
        $sql ="INSERT INTO schoolinfo(id,schoolname,schooladdress,mobile,website,schoolnameb,schooladdressb,mobileb,schmail,shortcode,softlink,estd,eiin,schoolcode,voccode,headname,headnameb,head_deg,head_deg_bangla) VALUES ('$id','$schoolname','$schooladdress','$mobile','$website','$schoolnameb','$schooladdressb','$mobileb','$schmail','$shortcode','$softlink','$estd','$eiin','$schcode','$voccode','$headname','$headnameb','$head_deg','$head_deg_bangla') ON DUPLICATE KEY UPDATE schoolname='$schoolname',schooladdress='$schooladdress',mobile='$mobile',website='$website',schoolnameb='$schoolnameb',schooladdressb='$schooladdressb',mobileb='$mobileb',schmail='$schmail',shortcode='$shortcode',softlink='$softlink',estd='$estd',eiin='$eiin',schoolcode='$schcode',voccode='$voccode',headname='$headname',headnameb='$headnameb',head_deg='$head_deg',head_deg_bangla='$head_deg_bangla'"; 
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
<label class="col-md-3 control-label" for="Cust-name">ESTD</label>
<div class="col-md-9">
    <input type="text" id="Cust-name" name="estd" class="form-control" value="<?php echo $row['estd'];?>">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name">EIIN</label>
<div class="col-md-9">
    <input type="text" id="Cust-name" name="eiin" class="form-control" value="<?php echo $row['eiin'];?>">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name">School/College Code</label>
<div class="col-md-9">
    <input type="text" id="Cust-name" name="schcode" class="form-control" value="<?php echo $row['schoolcode'];?>">
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label" for="Cust-name">Voc Code</label>
<div class="col-md-9">
    <input type="text" id="Cust-name" name="voccode" class="form-control" value="<?php echo $row['voccode'];?>">
</div>
</div>

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
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Head Teacher Name</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="headname" class="form-control" value="<?php echo $row['headname'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Head Teacher Name(Bangla)</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="headnameb" class="form-control" value="<?php echo $row['headnameb'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Designation</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="head_deg" class="form-control" value="<?php echo $row['head_deg'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Designation(Bangla</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="head_deg_bangla" class="form-control" value="<?php echo $row['head_deg_bangla'];?>">
                    </div>
                </div>

                <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="Cust-name">Lego</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="image" class="form-control" placeholder="Image Must Be PNG"><p style="color: red;">Image Must Be PNG</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <center>
                    <div id="preview"></div>
                    </center>
                </div>
<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Head Teacher Sign</label>
        <div class="col-md-9">
           <input type="file" name="hmsign" id="hmsign_image" class="form-control" placeholder="Image Must Be PNG"><p style="color: red;">Image Must Be PNG</p>
        </div>
    </div>
</div>
                <div class="col-md-6">
                    <center>
                    <div id="hmsign_preview"></div>
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
    <h3 class="panel-title">School Information</h3>
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
                    <img src="img/lego.png?<?php echo time()?>" alt="">
                    <h4>ESTD:<?php echo $row['estd'];?> ,Eiin:<?php echo $row['eiin'];?>, School Code: <?php echo $row['schoolcode'];?>, Voccode: <?php echo $row['voccode'];?></h4>
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


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>
         <!-- flot Chart -->
        <script src="assets/flot-chart/jquery.flot.js"></script>
        <script src="assets/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/flot-chart/jquery.flot.crosshair.js"></script>
         <!-- Counter-up -->
        <script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
    
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        
       <script>
            jQuery(document).ready(function() {

                // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>
        
        <script>
        function moveToNextInput(input, maxLength) {
            const inputValue = input.value;
            if (inputValue.length === maxLength) {
                const inputs = document.querySelectorAll('input[type="number"]');
                const currentIndex = Array.from(inputs).indexOf(input);
                const nextIndex = (currentIndex + 1) % inputs.length;
                inputs[nextIndex].focus();
            }
        }
    </script>
    </body>
</html>