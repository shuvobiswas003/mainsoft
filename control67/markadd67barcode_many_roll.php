<!DOCTYPE html>
<html>
<head>
    <title>Mark Entry 6 & 7</title>
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

        <script src="../js/modernizr.min.js"></script>
        
        <style type="text/css">
            #markicon{
                width:50px;
                height:50px;
            }
        </style>
</head>
<body>
    <div class="row">
        <div class="container">
        <div class="col-md-12">
    <div class="panel-body">
<?php
require "../interdb.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$chapterno=$_POST['chapterno'];
$lessonno=$_POST['lessonno'];
?>
<center>
        <h1>
            <?php
               $count2=1;
               $sel_query2="Select * from schoolinfo";
               $result2 = mysqli_query($link,$sel_query2);
               while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
            </h1>
            <h2>
            <?php
                $count2=1;
                $sel_query2="Select * from exam67 where exid='$examid'";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['examname']?>-<?php echo $row2['year']?>

            <?php $count2++; } ?>
            </h2>





        </center>



<form action="" method="POST" name="markForm">
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
        <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
        <div class="col-md-9">
            <input type="number" name="roll" class="form-control" autofocus="autofocus" required="1">

        </div>
    </div> 
    <div class="form-group">
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Chapter No</th>
        <th>Lesson No</th>
        <th>PI</th>
        <th>Mark</th>
        
    </tr>
    </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($chapterno); $i++) {
                $no=$i+1;
                $nchapterno=$chapterno[$i];
                $lessonnon=$lessonno[$i];
            ?>
            <tr>
                <td>
               <?php echo $no;?>
                </td>
                <td>
                    <select name="chapterno[]" id="" class="form-control">
                        <option value="<?php echo $nchapterno;?>">
                            <?php echo $nchapterno;?>
                        </option>
                    </select>
                </td>
                <td>
                    <select name="lessonno[]" id="" class="form-control">
                        <option value="<?php echo $lessonnon;?>">
                            <?php echo $lessonnon;?>
                        </option>
                    </select>
                </td>
                <td>
                    <select name="PI_I" id="" class="form-control">
                        <option value="<?php echo $nchapterno;?>">
                           <?php echo $classnumber.".".$nchapterno.".". $lessonnon;?>
                        </option>
                    </select>
                </td>
                <td>
            <input type="number" name="pi[]" class="form-control" required="1" autofocus="autofocus" max="4" min="1" oninput="moveToNextInput(this, 1)">
            </td>
            </tr>
            <?php } ?>
        </tbody>
 </table>
    </div>    
   

</div>        
    <input type="submit" value="Submit Mark" class="btn btn-primary" name="form2">
</form>                              
    <?php } ?>

<?php
if (isset($_POST['form2'])) {
//single data
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$roll=$_POST['roll'];
$suniqid=$classnumber.$secgroupname.$roll;

//array data
$chapternoaray=$_POST['chapterno'];
$lessonnoaray=$_POST['lessonno'];
$codepiaray=$_POST['pi'];

require('../interdb.php');
$sel_query="Select * from student where uniqid='$suniqid';";
$result = mysqli_query($link,$sel_query);
if (mysqli_num_rows($result) > 0) {
    // student found, display data
    $row = mysqli_fetch_assoc($result);
    $roll=$row['roll'];
    $name=$row['name'];
echo "<center>";
echo "<br>";

echo "<h1>";
echo "Roll: ".$roll;
echo "</h1>";

echo "<h1>";
echo "Name: ".$name;
echo "</h1>";
echo "</center>";

echo "<center>";
for ($i = 0; $i < count($chapternoaray); $i++) {
   $chapterno=$chapternoaray[$i];
   $lessonno=$lessonnoaray[$i];
   $codepi=$codepiaray[$i];
   $pi;
switch ($codepi) {
    case '1':
    $pi=1;  
    break;
    
    case '2':
    $pi=2;  
    break;

    case '3':
    $pi=3;  
    break;
    
    default:
    $pi=4; 
    break;
    $roll;
}

$uni=$examid.$subcode.$chapterno.$lessonno.$suniqid;

//insert to database
    echo "<center>";
   echo "<br>";

$shape = $pi;
echo "<br>";
if ($shape == 1) {
    echo $classnumber.".".$chapterno.".".$lessonno;
    echo "<br>";
  echo "<img src='../img/markicon/tf.png' id='markicon'>";
}
elseif ($shape == 2) {
    echo $classnumber.".".$chapterno.".".$lessonno;
    echo "<br>";
  echo "<img src='../img/markicon/cf.png' id='markicon'>";
}
elseif ($shape == 3) {
    echo $classnumber.".".$chapterno.".".$lessonno;
    echo "<br>";
  echo "<img src='../img/markicon/sf.png' id='markicon'>";
}
else {
    
  echo "<h1 style='color:red'>ABSENT</h1>";
}


    $sql ="INSERT INTO exammark67(examid,classnumber,secgroupname,roll,stuid,subcode,chapterno,lno,pi,uni) VALUES ('$examid','$classnumber','$secgroupname','$roll','$suniqid','$subcode','$chapterno','$lessonno','$pi','$uni') ON DUPLICATE KEY UPDATE pi='$pi'"; 
if(mysqli_query($link, $sql)){
    echo "<h1><span style='color:green'>PI Added</span></h1>";
} else {
    echo "Error: " . mysqli_error($link);
}

    
    
}//ending for loop
} else {
    // student not found
    echo "<h1 style='color:red'>No student found with ID</h1>";
}




echo "</center>";


}
?>
</div><!--Ending Panel Body-->
</div><!--Ending Col-->
</div>
</div><!--Ending Row-->

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
    function moveToNextInput(input, requiredDigits) {
        const inputValue = input.value;
        if (inputValue.length === requiredDigits) {
            const inputs = document.querySelectorAll('input[name="pi[]"]');
            const currentIndex = Array.from(inputs).indexOf(input);
            const nextIndex = (currentIndex + 1) % inputs.length;

            if (nextIndex === 0) {
                // If nextIndex is 0, it means we are at the last input, so submit the form
                document.getElementById("lastPi").blur(); // Remove focus from the last input
                document.querySelector('form').submit(); // Submit the form
            } else {
                inputs[nextIndex].focus(); // Focus on the next input
            }
        }
    }

    function checkAndSubmitForm() {
        const piInputs = document.querySelectorAll('input[name="pi[]"]');
        const lastPiInput = piInputs[piInputs.length - 1];

        const allPisFilled = Array.from(piInputs).every(input => input.value.trim() !== '');
        if (allPisFilled) {
            lastPiInput.removeEventListener('input', checkAndSubmitForm); // Remove the input event listener
            document.querySelector('form[name="markForm"]').submit(); // Submit the form
        }
    }

    const lastPiInput = document.querySelector('input[name="pi[]"]:last-child');
    lastPiInput.addEventListener('input', function () {
        moveToNextInput(this, 1);
        checkAndSubmitForm();
    });
</script>
</body>
</html>