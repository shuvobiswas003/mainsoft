<!DOCTYPE html>
<html>
<head>
    <title>Mark Entry 6 & 7</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">
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



<form action="" method="POST">
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
        <label class="col-md-3 control-label" for="Cust-name">Student ID</label>
        <div class="col-md-9">
            <input type="text" name="stuid" class="form-control" autofocus="autofocus" required="1">

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
                           <?php echo $classnumber.".".$nchapterno.".". $nchapterno;?>
                        </option>
                    </select>
                </td>
                <td>
            <input type="text" name="pi[]" class="form-control" required="1" autofocus="autofocus" >
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
$suniqid=$_POST['stuid'];

//array data
$chapternoaray=$_POST['chapterno'];
$lessonnoaray=$_POST['lessonno'];
$codepiaray=$_POST['pi'];



for ($i = 0; $i < count($chapternoaray); $i++) {
   $chapterno=$chapternoaray[$i];
   $lessonno=$lessonnoaray[$i];
   $codepi=$codepiaray[$i];
   $pi;
switch ($codepi) {
    case '6A1':
    $pi=1;  
    break;
    
    case '6A3':
    $pi=2;  
    break;

    case '6A5':
    $pi=3;  
    break;
    
    default:
    $pi=4; 
    break;
    $roll;
}
require('../interdb.php');
$sel_query="Select * from student where uniqid='$suniqid';";
$result = mysqli_query($link,$sel_query);
if (mysqli_num_rows($result) > 0) {
    // student found, display data
    $row = mysqli_fetch_assoc($result);
    $roll=$row['roll'];
$uni=$examid.$subcode.$chapterno.$lessonno.$suniqid;

//insert to database
    echo "<center>";
    echo   "<br><br>";
    echo "<h2>Student Name".$row['name']."</h2>";

$shape = $pi;
echo "<br>";
if ($shape == 1) {
    echo $classnumber.".".$chapterno.".".$lessonno;
  echo "<img src='../img/markicon/tf.png' id='markicon'>";
}
elseif ($shape == 2) {
  echo "<img src='../img/markicon/cf.png' id='markicon'>";
}
elseif ($shape == 3) {
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

} else {
    // student not found
    echo "<h1 style='color:red'>No student found with ID</h1>";
}
    
    
}//ending for loop




echo "</center>";


}
?>
</div><!--Ending Panel Body-->
</div><!--Ending Col-->
</div>
</div><!--Ending Row-->
</body>
</html>