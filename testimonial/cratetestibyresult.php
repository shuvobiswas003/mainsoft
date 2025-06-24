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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <h1 style="color:red">GO TO SSC Result AND Find the result and Copy Paste ON this Field</h1>
            <h2><a href="http://www.educationboardresults.gov.bd/" target="_blank">Click Here</a></h2>
        
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Result TEXT</label>
                <div class="col-md-9">
                    <textarea name="resulttext" id="" cols="30" rows="10" class="form-control" required="1" autofocus='autofocus'></textarea>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Data">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$resulttext=$_POST['resulttext'];


$fullstring=$resulttext;
$fullstring = str_replace(array("\r", "\n"), ' ', $fullstring);
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>
<form action="addtesti.php" method="POST" class="form-horizontal" role="form" target="_blank">
<div class="form-group">
    <label class="col-md-3 control-label" for="studentName">Student Name</label>
    <?php
    $name = get_string_between($fullstring, 'Name', 'Board');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="studentName" name="studentName" class="form-control" placeholder="Enter Student Name" required="1" value="<?php echo $name; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="fatherName">Father Name</label>
    <?php
    $name = get_string_between($fullstring, "Father's Name", 'Group');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="fatherName" name="fatherName" class="form-control" placeholder="Enter Father Name" required="1" value="<?php echo $name; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="motherName">Mother Name</label>
    <?php
    $name = get_string_between($fullstring, "Mother's Name", 'Type');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="motherName" name="motherName" class="form-control" placeholder="Enter Mother Name" required="1" value="<?php echo $name; ?>">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="dob">Date of Birth</label>
    <?php
    $name = get_string_between($fullstring, "Date of Birth", 'Result');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="motherName" name="dob" class="form-control" placeholder="Enter Date OF Birth" required="1" value="<?php echo $name; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="village">Village</label>
    <div class="col-md-9">
        <input type="text" id="village" name="village" class="form-control" placeholder="Enter Village" required='1' autofocus='autofocus'>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="post">Post</label>
    <div class="col-md-9">
        <input type="text" id="post" name="post" class="form-control" placeholder="Enter Post" required='1'>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ps">PS (Police Station)</label>
    <div class="col-md-9">
        <input type="text" id="ps" name="ps" class="form-control" placeholder="Enter Police Station" required='1'>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ds">DS (District)</label>
    <div class="col-md-9">
        <input type="text" id="ds" name="ds" class="form-control" placeholder="Enter District" required='1'>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="passingYear">Passing Year</label>
    <?php
    $name = get_string_between($fullstring, "Result", 'Roll');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="passingYear" name="passingYear" class="form-control" placeholder="Enter Passing Year" required="1" value="<?php echo $name; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="group">Group</label>
    <?php
    $name = get_string_between($fullstring, "Group", "Mother's");
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="group" name="group" class="form-control" placeholder="Enter Group" required="1" value="<?php echo $name; ?>">
    </div>
    
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="board">Board</label>
    <?php
    $gpa = substr($fullstring, -4);
    ?>
    <div class="col-md-9">
         <input type="text" id="gpa" name="gpa" class="form-control" placeholder="Enter GPA" required="1" value="<?php echo $gpa; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="gpa">GPA</label>
    <?php
    $gpa = substr($fullstring, -4);
    ?>
    <div class="col-md-9">
         <input type="text" id="gpa" name="gpa" class="form-control" placeholder="Enter GPA" required="1" value="<?php echo $gpa; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="grade">Grade</label>
    <?php 
    $gpa=(float)($gpa);
    $grade;
    if ($gpa >= 5) {
        $grade = 'A+';
    } elseif ($gpa >= 4) {
        $grade = 'A';
    } elseif ($gpa >= 3.5) {
        $grade = 'A-';
    } elseif ($gpa >= 3) {
        $grade = 'B';
    } elseif ($gpa >= 2) {
        $grade = 'C';
    } elseif ($gpa >= 1) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }
    ?>
    <div class="col-md-9">
        <div class="col-md-9">
         <input type="text" id="grade" name="grade" class="form-control" placeholder="Enter GPA" required="1" value="<?php echo $grade; ?>">
    </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="result">Result</label>
    <div class="col-md-9">
        <select id="result" name="result" class="form-control" required>
            <option value="pass">Pass</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="roll">Roll</label>
    <?php
    $name = get_string_between($fullstring, "Roll No", 'Name');
    $name=trim($name);
    ?>
    <div class="col-md-9">
        <input type="text" id="roll" name="roll" class="form-control" placeholder="Enter Roll" required="1" value="<?php echo $name; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="registration">Registration</label>
    <div class="col-md-9">
        <input type="text" id="registration" name="registration" class="form-control" placeholder="Enter Registration" required>
    </div>
</div>


                                

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                                    </div>
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
<?php include'inc/footer.php'?>