<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>WelCome To Your School</title>

        <!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="../css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="../css/waves-effect.css" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />



        
        <link href="../assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="../assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>




        <script src="../js/modernizr.min.js"></script>
        
    </head>
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
<h3 class="panel-title">Student Admission</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
      
         <?php
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        ?>   
       <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <
                    <option value="<?php echo $classnumber?>"><?php echo $classnumber?></option>
                    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
       <video id="preview"></video>
      
 
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" id="myForm">
        
<input type="text" name="qrResult" id="qrResult" value="">
<input type="submit" value="Submit" class="btn-primary">
        </form>
       
        
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 // Retrieve the scanned QR code data
  $qrResult = $_POST['qrResult'];

// URL of the website to fetch data from
$url = $qrResult;
$fullstring;
// Initialize cURL
$curl = curl_init($url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Execute the cURL request
$response = curl_exec($curl);

$html = $response; // Your HTML string

// Find the starting and ending positions of the <body> tag
$startPos = strpos($html, '<body>');
$endPos = strrpos($html, '</body>');

if ($startPos !== false && $endPos !== false) {
    // Extract the content between the <body> tag
    $bodyContent = substr($html, $startPos + 6, $endPos - $startPos - 6);

    // Remove any remaining HTML tags
    $text = strip_tags($bodyContent);

    $fullstring=$text;
}


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>
<form action="addstubrisbdqr.php" method="POST" target="_blank">
   <div class="col-md-12">
   	<div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">BRIS QR</label>
        <div class="col-md-9">
            <select name="brisqr" class="form-control" for="Cust-name">
            	<option value="<?php echo $qrResult?>"><?php echo $qrResult?></option>
            </select>
        </div>
    </div>
   </div>
<div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <?php
            $name = get_string_between($fullstring, 'Registered Person Name', 'মাতার নাম');
            $name=trim($name);
            if(empty($name)){
                $name="No Data ON BRIS BD";
            }
            ?>
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name"  value="<?php echo $name?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <?php
            $fname = get_string_between($fullstring, "Father's Name", 'পিতার জাতীয়তা');
            $fname=trim($fname);
            if(empty($fname)){
                $fname="No Data ON BRIS BD";
            }
            ?>
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <?php
            $mname = get_string_between($fullstring, "Mother's Name", 'মাতার জাতীয়তা');
            $mname=trim($mname);
            if(empty($mname)){
                $mname="No Data ON BRIS BD";
            }
            ?>
            <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother's Name" value="<?php echo $mname?>">
        </div>
    </div>
</div>


    <div class="col-md-6">
        <center>
        <h3> Student Part(Bangla) </h3>
        </center>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">নাম</label>
        <div class="col-md-9">
            <?php
            $nameb = get_string_between($fullstring, "নিবন্ধনাধীন বাক্তির নাম", "Registered Person Name");
            $nameb=trim($nameb)
            ?>
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" value="<?php echo $nameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            <?php
            $fnameb = get_string_between($fullstring, "পিতার নাম", "Father's Name");
            $fnameb=trim($fnameb)
            ?>
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1" value="<?php echo $fnameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
            <?php
            $mnameb = get_string_between($fullstring, "মাতার নাম", "Mother's Name");
            $mnameb=trim($mnameb)
            ?>
            <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1" value="<?php echo $mnameb?>">
        </div>
    </div>

    
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <?php
            $pos=strpos($fullstring,"FEMALE");
            if($pos=="0"){
                $gender="MALE";
            }else{
                $gender="FEMALE";
            }
            ?>
            <input type="text" name="sex" class="form-control" value="<?php echo $gender;?>">
        </div>
    </div>
</div>

    <!--National Data Section Start-->
    <div class="col-md-12">
        <center>
            <h3>National Data Section</h3>
        </center>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Birth ID No</label>
                <div class="col-md-9">
            <?php
            $arrayName = explode(" Sex", $fullstring);
            $bdata=$arrayName[1];
            $bdata=trim($bdata);
            $data=explode(" ", $bdata);
            $birthid=$data[34];
                
            ?>
                    <input type="text" id="Cust-name" name="brithid" class="form-control" placeholder="Student Birth ID no" required="1" value="<?php echo $birthid;?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <?php
                     $arrayName = explode("Sex", $fullstring);
                    $bdata=$arrayName[1];
                    $bdata=trim($bdata);
                    $data=explode(" ", $bdata);
                    $date=$data[0];
                    $month=$data[1];
                    $year=$data[2];
                    $daten=$date."-".$month."-".$year;
                    
                    $dob=date("Y-m-d", strtotime($daten));
                     ?>

                    <input type="date" id="Cust-name" name="sdob" class="form-control" placeholder="Student Date Of Birth" required="1" 
                    value="<?php echo $dob;?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="fnid" class="form-control" placeholder="Father NID Number" required="1" value="0">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Mother NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mnid" class="form-control" placeholder="Mother Nid Number" required="1" value="0">
                </div>
        </div>
    </div>
<!--End of National Data Section-->
<!--Academic & Contuct Part Start-->
    <div class="col-md-12">
        <center>
            <h3>Academic Part And Contuct Info</h3>
        </center>
    </div>


    <div class="col-md-6">
                    <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1" id="country">
                    <option value="">Select Class</option>
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM class ORDER BY classnumber;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classnumber']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
    </div>

    
    <div class="col-md-6">
        <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                <div class="col-md-9">
                    <select class="form-control" name="secgroupname" id="state" required="1">
                    <option value="">Select Class First</option>
                    </select>
                </div>
            </div>
    </div>
    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" value="" autofocus="autofocus" required="1">
                </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mobile" class="form-control" placeholder="Student Gurdian Phone Number" required="1" value="">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Image SL</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="imagesl" class="form-control" placeholder="Image Serial number" required="1" value="">
                </div>
        </div>
    </div>
<!--Academic & Contuct Part End-->



<br><br><br>
<div class="col-md-12">   
<center> 
<input type="submit" value="Admit Student" class="btn btn-primary">
</center>
</div>

        
    
</form>                              
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>


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
        <!-- sweet alerts -->
        <script src="../assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="../assets/sweet-alert/sweet-alert.init.js"></script>
         <!-- flot Chart -->
        <script src="../assets/flot-chart/jquery.flot.js"></script>
        <script src="../assets/flot-chart/jquery.flot.time.js"></script>
        <script src="../assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="../assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="../assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="../assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="../assets/flot-chart/jquery.flot.crosshair.js"></script>
         <!-- Counter-up -->
        <script src="../assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="../assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="../js/jquery.app.js"></script>

        <script src="../assets/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/select2/select2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.quicksearch.js"></script>
    
        <script src="../assets/select2/select2.min.js" type="text/javascript"></script>

        <!-- Dashboard -->
        <script src="../js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="../js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="../js/jquery.todo.js"></script>

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
function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}

$("#image").change(function () {
    imagePreview(this);
});

        </script>
<script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

        scanner.addListener('scan', function (content) {
            document.getElementById('qrResult').value = content;
            document.getElementById('myForm').submit();
        });

         Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            if (cameras.length > 1) {
                scanner.start(cameras[1]);
            } else {
                scanner.start(cameras[0]);
            }
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
    </script>
<script>
$(document).ready(function(){
    $('#country').on('change', function(){
        var classnumber = $(this).val();
        
        if(classnumber){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:{
                    
                    classnumber:classnumber,
                },
                success:function(html){
                    $('#state').html(html);
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Subject First</option>');
        }
    });
});
</script>
    </body>
</html>