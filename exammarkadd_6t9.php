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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Exam Mark Entry</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Exam ID</label>
                    <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam where exid='$examid';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?>
                    </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    <?php $count++; } ?>
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
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM examroutine WHERE exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Start Mark Entry">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
?>
<form action="addmarkentrydata_6t9.php" method="POST">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Exam ID</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
            <option value="<?php echo $examid;?>"><?php echo $examid;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
            <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
            <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Subject Code</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
            <option value="<?php echo $subcode;?>"><?php echo $subcode;?></option>
            </select>
        </div>
    </div>
    <br>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subname" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subname']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Full Marks</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subfullmarks" required="1">
                    <?php
                    require "interdb.php";
                    $subjectfullmark;
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $subjectfullmark=$row['subfullmarks'];
                        ?>
                    <option value="<?php echo $row['subfullmarks']?>"><?php echo $row['subfullmarks']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Grade Code</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="gradecode" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['gradecode']?>"><?php echo $row['gradecode']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
   
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <center>
        <h3>Enter The Mark</h3>
        </center>
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Roll</th>
            <th>Student Name</th>
            <th>St ID</th>
            <th>CQ (100%)</th>
            <th>CQ (70%)</th>
            <th>CA (30%)</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Getting student data
        $sel_query1 = "SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC";
        $result1 = mysqli_query($link, $sel_query1);

        while ($row1 = mysqli_fetch_assoc($result1)) {
            $uniqid = $row1['uniqid'];

            // Checking registration data
            $sel_query = "SELECT * FROM sturegsubject 
                          WHERE classnumber='$classnumber' 
                          AND secgroupname='$secgroupname' 
                          AND uniqid='$uniqid' 
                          AND subcode='$subcode' 
                          AND (substatus=1 OR substatus=4)";
            $result = mysqli_query($link, $sel_query);

            while ($row = mysqli_fetch_assoc($result)) {
                $examuni = $uniqid . $examid . $subcode;

                // Fetching marks if already exist
                $sel_query2 = "SELECT * FROM exammark WHERE examuni='$examuni'";
                $result2 = mysqli_query($link, $sel_query2);
                $existing_marks = mysqli_fetch_assoc($result2);

                $cq = isset($existing_marks['cq']) ? $existing_marks['cq'] : '';
                $ca = isset($existing_marks['mcq']) ? $existing_marks['practical'] : '';

                // Ensure values are numeric, and calculate CQ (70%) and Total
                $cq_70 = is_numeric($cq) ? round(($cq * 70) / 100) : '';
                $total = is_numeric($cq_70) && is_numeric($ca) ? $cq_70 + $ca : '';
        ?>
                <tr>
                    <td>
                        <select name="roll[]" class="form-control">
                            <option value="<?php echo $row['roll']; ?>"><?php echo $row['roll']; ?></option>
                        </select>
                    </td>
                    <td>
                        <select name="name[]" class="form-control">
                            <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
                        </select>
                    </td>
                    <td>
                        <select name="suniqid[]" class="form-control">
                            <option value="<?php echo $row['uniqid']; ?>"><?php echo $row['uniqid']; ?></option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="cq[]" class="form-control cq-input" max="100" min="0" value="<?php echo $cq; ?>" required>
                        <span class="error-message text-danger" style="display:none;">Value must be between 0 and 100</span>
                    </td>
                    <td>
                        <input type="number" name="cq_70[]" class="form-control" value="<?php echo $cq_70; ?>" readonly>
                    </td>
                    <td>
                        <input type="number" name="ca[]" class="form-control ca-input" max="30" min="0" value="<?php echo $ca; ?>" required>
                        <span class="error-message text-danger" style="display:none;">Value must be between 0 and 30</span>
                    </td>
                    <td>
                        <input type="number" name="total[]" class="form-control" value="<?php echo $total; ?>" readonly>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

    </div>
</div>






        
    <input type="submit" value="Process Mark" class="btn btn-primary">
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
    document.addEventListener('DOMContentLoaded', function () {
        // Handle input validation and movement
        const table = document.querySelector('table');
        table.addEventListener('input', function (event) {
            const input = event.target;
            const max = parseFloat(input.getAttribute('max')) || Infinity;
            const min = parseFloat(input.getAttribute('min')) || -Infinity;
            const value = parseFloat(input.value) || 0;
            const errorMessage = input.nextElementSibling;

            // Reset error message
            errorMessage.style.display = 'none';

            if (value > max || value < min) {
                // Show error message
                errorMessage.style.display = 'inline';
                return; // Stop further actions
            }

            if (input.classList.contains('cq-input')) {
                // Calculate CQ (70%)
                const row = input.closest('tr');
                const cq70Field = row.querySelector('input[name="cq_70[]"]');
                const caField = row.querySelector('input[name="ca[]"]');
                const totalField = row.querySelector('input[name="total[]"]');
                
                // Round CQ (70%) to nearest integer
                cq70Field.value = Math.round((value * 70) / 100);

                // Move focus to CA field when 2 digits are entered
                if (input.value.length === 2) {
                    caField.focus();
                }

                // Update total if CA is already filled
                const caValue = parseFloat(caField.value) || 0;
                totalField.value = Math.round(parseFloat(cq70Field.value) + caValue);
            } 
            
            else if (input.classList.contains('ca-input')) {
                // Update total and move to next CQ field
                const row = input.closest('tr');
                const cq70Field = row.querySelector('input[name="cq_70[]"]');
                const totalField = row.querySelector('input[name="total[]"]');

                const cq70Value = parseFloat(cq70Field.value) || 0;
                const caValue = parseFloat(input.value) || 0;

                // Round total to nearest integer
                totalField.value = Math.round(cq70Value + caValue);

                // Move focus to next CQ input
                if (input.value.length === 2) {
                    const nextRow = row.nextElementSibling;
                    if (nextRow) {
                        const nextCQInput = nextRow.querySelector('input[name="cq[]"]');
                        if (nextCQInput) {
                            nextCQInput.focus();
                        }
                    }
                }
            }
        });
    });
</script>
    </body>
</html>