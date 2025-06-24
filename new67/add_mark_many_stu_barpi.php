<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}
?>
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
        <link href="../css/custom_formcontrol.css" rel="stylesheet" type="text/css" />



        
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
        <style>
             table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
        color: black;
        font-size: 15px;
    }
        </style>
</head>
<body>
    <div class="row">
        <div class="container">
        <div class="col-md-12">
    <div class="panel-body">
<?php

require('../interdb.php');
//single data
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$suniqid=$_POST['stuid'];

//array data
$chapternoaray=$_POST['chapterno'];
$lessonnoaray=$_POST['lessonno'];
$codepiaray=$_POST['pi'];





for ($j = 0; $j < count($suniqid); $j++) {
$suniqidn=$suniqid[$j];

$sel_query="Select * from student where uniqid='$suniqidn';";
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

   $chapterno=$chapternoaray[$j];
   $lessonno=$lessonnoaray[$j];
   $codepi=$codepiaray[$j];
   $pi;
include "a_pi_barcode_var.php";

$uni=$examid.$subcode.$chapterno.$lessonno.$suniqidn;

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


    $sql ="INSERT INTO exammark67(examid,classnumber,secgroupname,roll,stuid,subcode,chapterno,lno,pi,uni) VALUES ('$examid','$classnumber','$secgroupname','$roll','$suniqidn','$subcode','$chapterno','$lessonno','$pi','$uni') ON DUPLICATE KEY UPDATE pi='$pi'"; 
if(mysqli_query($link, $sql)){
    echo "<h1><span style='color:green'>PI Added</span></h1>";
} else {
    echo "Error: " . mysqli_error($link);
}

    


} else {
    // student not found
    echo "<h1 style='color:red'>No student found with ID</h1>";
}

}//ending for Student  loop



echo "</center>";

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