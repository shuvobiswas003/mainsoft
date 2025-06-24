<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
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
                <h3 class="panel-title">S.M.S</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->

<!-- SMS Form -->
    <!-- SMS Form -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
    <label for="class">Select Class:</label>
    <select class="form-control" id="class" name="class" required>
        <option value="">Select a class</option>
        <?php
        require "../interdb.php";
        // Query the database to get distinct class values
        $classQuery = "SELECT DISTINCT classnumber FROM student ORDER BY classnumber";
        $classResult = mysqli_query($link, $classQuery);
        while ($classRow = mysqli_fetch_assoc($classResult)) {
            $classValue = $classRow['classnumber'];
            echo "<option value='$classValue'>Class $classValue</option>";
        }
        mysqli_free_result($classResult);
        ?>
    </select>
</div>

<div class="form-group">
    <label for="secgroup">Select secgroup:</label>
    <select class="form-control" id="secgroup" name="secgroup" required>
        <option value="">Select a secgroup</option>
        <?php
        // Query the database to get distinct secgroup values
        $secgroupQuery = "SELECT DISTINCT secgroup FROM student ORDER BY secgroup";
        $secgroupResult = mysqli_query($link, $secgroupQuery);
        while ($secgroupRow = mysqli_fetch_assoc($secgroupResult)) {
            $secgroupValue = $secgroupRow['secgroup'];
            echo "<option value='$secgroupValue'>$secgroupValue</option>";
        }
        mysqli_free_result($secgroupResult);
        ?>
    </select>
</div>

    
    <button type="submit" class="btn btn-primary">Open Form</button>
    <button type="button" class="btn btn-success" id="printBtn">Print</button>
</form>


<div class="panel-body" id="attendanceTable">
<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class = $_POST['class'];
    $secgroup = $_POST['secgroup'];
    ?>
    <form action="update_mobile_data.php" method="POST">
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>St ID</th>
                        <th>Mobile</th>
                       
                    </tr>
                </thead>


                <tbody>
                    <?php
                    //getting student data
                    $count1=1;
                    $sel_query1="SELECT * from student where classnumber='$class' AND secgroup='$secgroup' ORDER BY roll ASC";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                    $uniqid=$row1['uniqid'];
                    
                    ?>
                    <tr>
                        <td>
                        <select name="roll[]" id="" class="form-control">
                            <option value="<?php echo $row1['roll'];?>"><?php echo $row1['roll'];?></option>
                        </select>
                        </td>
                        <td>
                        <?php
                        
                        ?>
                        <select name="name[]" id="" class="form-control">
                            <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
                        </select>
                        
                        </td>
                        <td>
                        <select name="suniqid[]" id="" class="form-control" >
                            <option value="<?php echo $row1['uniqid'];?>"><?php echo $row1['uniqid'];?></option>
                        </select>
                        </td>
                        <td>
<input type="text" name="mobile[]" class="form-control" required='1'

    value="<?php echo $row1['mobile'];?>"
>
</td>


                        
                    </tr>
            
                    <?php $count1++; }?>
            </tbody>
            </table>
        <input type="submit" value="Submit Address" class="btn btn-primary">
    </form>
    
    
<?php
} //ending pst loop
    ?>
</div>
<!--Main View Part End-->
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

<script>
    document.getElementById('printBtn').addEventListener('click', function() {
        var printContents = document.getElementById('attendanceTable').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
</script>

    </body>
</html>