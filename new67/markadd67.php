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
$chapterlesson=$_POST['chapterlesson'];
//getting chapter lesson  info
    $chapterlessonbr=explode(',', $chapterlesson);
    $chapterno=$chapterlessonbr[0];
    $lessonno=$chapterlessonbr[1];
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

<?php
$count2=1;
$sel_query2="Select * from lesson WHERE lno='$lessonno' AND chapterno='$chapterno' AND classnumber='$classnumber'AND secgroupname='$secgroupname' AND subcode='$subcode'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
<h2>Chapter Name: <?php echo $row2['chaptername']?></h2>
<h2>Lesson Name: <?php echo $row2['lname']?></h2>
<h1 style="color: red">
	Performance Indecator(PI)
</h1>

<h4 style="color: red;">
Value(1) For Triangle:  <?php echo $row2['lpit'];?>
</h4>

<h4 style="color: red;">
Value(2) For Circle:  <?php echo $row2['lpic'];?>
</h4>
<h4 style="color: red;">
Value(3) For Square:  <?php echo $row2['lpis'];?>
</h4>
<h4 style="color: red;">
Value(4) For Absent
</h4>

<?php $count2++; } ?>



		</center>



<form action="addmarkentrydata67.php" method="POST">
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
        <label class="col-md-3 control-label" for="Cust-name">Select Chapter No</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="chapterno" required="1">
            <option value="<?php echo $chapterno;?>"><?php echo $chapterno;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Lesson No</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="lessonno" required="1">
            <option value="<?php echo $lessonno;?>"><?php echo $lessonno;?></option>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>PI</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                   
                    //getting student data
                    $count1=1;
                    $sel_query1="SELECT * from student where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC";
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
                            <select name="suniqid[]" id="" class="form-control" >
                            <option value="<?php echo $row1['uniqid'];?>"><?php echo $row1['uniqid'];?></option>
                        </select>
                        </td>
                        <td >
                        <select name="name[]" id="" class="form-control">
                            <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
                        </select>
                        
                        </td>
                        
                        
                        <td><?php echo $row1['roll']?></td>
                        <td>
                        	<input type="number" name="pi[]" class="form-control" required="1" autofocus="autofocus" max="4" min="1" oninput="moveToNextInput(this, 1)"
<?php
$uni=$examid.$subcode.$chapterno.$lessonno.$uniqid;
$count2=1;
$sel_query2="SELECT * from exammark67 where uni='$uni'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['pi'];
if(!empty($des)){?>
    value="<?php echo $des;?>"
<?php
}else{
    ?>
    value="0"
<?php
}
$count1++; }
?>
>
</td>

</tr>
<?php $count1++; }?>
            </tbody>
            </table>
    </div>
</div>        
    <input type="submit" value="Submit Mark" class="btn btn-primary">
</form>                              
    <?php } ?>
    </div><!--Ending Panel Body-->
</div><!--Ending Col-->
</div>
</div><!--Ending Row-->
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

</script>
</body>
</html>