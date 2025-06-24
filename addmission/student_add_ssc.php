<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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
<h3 class="panel-title">Online Addmission System</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];

        ?>
        <h1 style="color:red">GO TO SSC Result AND Find the result and Copy Paste ON this Field</h1>
            <h2><a href="http://www.educationboardresults.gov.bd/" target="_blank">Click Here</a></h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
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
                <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" autofocus="autofocus" required="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Mobile Number</label>
                <div class="col-md-9">
                    <input type="number" name="mobile" class="form-control" required="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Image SL number</label>
                <div class="col-md-9">
                    <input type="number" name="imagesl"class="form-control" required="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">SSC Regestration</label>
                <div class="col-md-9">
                    <input type="number" name="ssc_reg"class="form-control" required="1">
                </div>
            </div>
            

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Chose SSC Result HTML file</label>
                <div class="col-md-9">
                   <input type="file" name="bris_file" required="1">
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Data">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$classnumber = $_POST['classnumber'];
$secgroupname = $_POST['secgroupname'];
$roll = $_POST['roll'];
$mobile = $_POST['mobile'];
$imagesl = $_POST['imagesl'];
$imgage = "IMG_" . $imagesl . ".png";
$ssc_reg = $_POST['ssc_reg'];

$file = $_FILES['bris_file']['tmp_name'];
$handle = fopen($file, "r");

// Read the content of the file into a string
$contents = fread($handle, filesize($file));

// Remove HTML tags
$cleanedContent = strip_tags($contents);


$fullstring=$cleanedContent;



        function get_string_between($string, $start, $end) {
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
    ?>
<form action="addstubrisbd.php" method="POST"  enctype="multipart/form-data">
    <div class="col-md-12">
        <center>
            <h3>Raw Data</h3>
            <?php
            $arrayName = explode("REGISTERED PERSON
NAME", $fullstring);
     
            print_r($fullstring);
    
            
            ?>

        </center>
    </div>

    <?php

    ?>
<div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
    <?php
    $name = get_string_between($fullstring, 'Name', 'Board');
    $name=trim($name);
    ?>
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" autofocus="autofocus" value="<?php echo $name?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
    <?php
    $name = get_string_between($fullstring, "Father's Name", 'Group');
    $fname=trim($name);
    ?>
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <?php
    $name = get_string_between($fullstring, "Mother's Name", 'Type');
    $mname=trim($name);
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
           
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" value="Not Avliable">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1" value="Not Avliable">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
           
            <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1" value="Not Avliable">
        </div>
    </div>

    
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="sex" required="1">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Marital Status</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="marital" required="1">
            <option value="">Select Marital Status</option>
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
            </select>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Religion</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="religion" required="1">
            <option value="">Select Religion</option>
            <option value="Islam">Islam</option>
            <option value="Hindu">Hindu</option>
            <option value="Cristian">Cristian</option>
            <option value="Buddhism">Buddhism</option>
            </select>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Blood Group</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="blood" required="1">
            <option value="">Select Blood Group</option>
            <option value="A(+ve)">A(+ve)</option>
            <option value="A(-ve)">A(-ve)</option>
            <option value="B(+ve)">B(+ve)</option>
            <option value="B(-ve)">B(-ve)</option>
            <option value="AB(+ve)">AB(+ve)</option>
            <option value="AB(-ve)">AB(-ve)</option>
            <option value="O(+ve)">O(+ve)</option>
            <option value="O(-ve)">O(-ve)</option>
            <option value="N/A">N/A</option>
            </select>
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
          
                    <input type="number" id="Cust-name" name="brithid" class="form-control" placeholder="Student Birth ID no" required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <?php
    $name = get_string_between($fullstring, "Date of Birth", 'Result');
    $dob=trim($name);
    $dob=date("Y-m-d", strtotime($dob));
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

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">SSC Roll</label>
                <div class="col-md-9">
                    <?php
    $ssc_roll = get_string_between($fullstring, "Roll No", 'Name');
    $ssc_roll=trim($ssc_roll);
    ?>
                    <input type="number" id="Cust-name" name="ssc_roll" class="form-control" placeholder="SSC Roll" required="1" value="<?php echo $ssc_roll;?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">SSC REGESTRATION</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="ssc_reg" class="form-control" placeholder="Mother Nid Number" required="1" value="<?php echo $ssc_reg;?>">
                </div>
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
    <label class="col-md-3 control-label" for="gpa">Board</label>
    <?php
    $board = get_string_between($fullstring, "Board", "Father's Name");
    $board=trim($board);
    ?>
    <div class="col-md-9">
         <input type="text" id="gpa" name="board" class="form-control" placeholder="Enter GPA" required="1" value="Dhaka">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="gpa">GPA</label>
    <?php
    $gpa = get_string_between($fullstring, "GPA", "Grade Sheet");
    $gpa=trim($gpa);
    ?>
    <div class="col-md-9">
         <input type="text" id="gpa" name="gpa" class="form-control" placeholder="Enter GPA" required="1" value="<?php echo $gpa; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="gpa">Passing School</label>
    <?php
    $board = get_string_between($fullstring, "Institute", 'GPA');
    $board=trim($board);
    ?>
    <div class="col-md-9">
         <input type="text" id="gpa" name="passing_school" class="form-control" placeholder="Enter GPA" required="1" value="<?php echo $board; ?>">
    </div>
</div>

<div class="col-md-12">
    <center>
        <h3>Father And Legal Guardians Info</h3>
    </center>
</div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father Occupation</label>
                <div class="col-md-9">
          
                    <input type="text" id="Cust-name" name="f_opc" class="form-control" placeholder="Father Occupation" required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father Monthly Income</label>
                <div class="col-md-9">
          
                    <input type="number" id="Cust-name" name="f_income" class="form-control" placeholder="Father Monthly Income" required="1">
                </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Legal Guardians Name  </label>
                <div class="col-md-9">
                    <input type="text" id="Cust-name" name="l_name" class="form-control" placeholder="Legal Guardians Name " required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Legal Guardians Occpupation</label>
                <div class="col-md-9">
                    <input type="text" id="Cust-name" name="l_opc" class="form-control" placeholder="Legal Guardians Occpupation" required="1">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Legal Guardians Monthly Income</label>
                <div class="col-md-9">
                    <input type="text" id="Cust-name" name="l_income" class="form-control" placeholder="Legal Guardians Monthly Income" required="1">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Legal Guardians Mobile</label>
                <div class="col-md-9">
                    <input type="text" id="Cust-name" name="l_phone" class="form-control" placeholder="Legal Guardians Mobile" required="1">
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
            <label class="col-md-3 control-label" for="Cust-name">Class Number</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                
                <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                <?php
                require "../interdb.php";
                $count=1;
                $sel_query="Select * from class where classnumber='$classnumber';";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option>
                <?php $count++; } ?> 
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Group/Section</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                
                <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                
                </select>
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" value="<?php echo $roll;?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Address</label>
                <div class="col-md-9">
                    
                   <input type="text" name="address" class="form-control">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mobile" class="form-control" placeholder="Student Gurdian Phone Number" required="1" value="<?php echo $mobile?>">
                </div>
        </div>
    </div>
<!--Academic & Contuct Part End-->

<br><br><br><br><br><br>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="file" name ="image" id="image" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <center>
        <div id="preview"></div>
        </center>
    </div>
</div>
<br><br><br>
<div class="col-md-12">   
<center> 
<input type="submit" value="Admit Student" class="btn btn-primary">
</center>
</div>

</form>                              
   <?php
            
    }
    ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>