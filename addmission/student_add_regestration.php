<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}

require "../interdb.php";
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
                                <h4 class="pull-left page-title">Class</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Class</h3>
            </div>
            <div class="panel-body">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
             
                
               <div class="form-group">
    <label for="class">Select Class:</label>
    <select class="form-control" id="class" name="classnumber" required>
        <option value="">Select a class</option>
        <?php
        require "../interdb.php";
        // Query the database to get distinct class values
        $classQuery = "SELECT DISTINCT classnumber FROM class ORDER BY classnumber";
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
    <select class="form-control" id="secgroup" name="secgroupname" required>
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

<div class="form-group">
    <label for="secgroup">Raw Text</label>
    <textarea name="raw_data" class="form-control" rows="20" cols="100" placeholder="Paste your raw data here..." required></textarea><br>
</div>

                <input type="submit" class="btn btn-primary" Value="Add Student">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title"></h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

// Retrieve raw data from form submission
$classnumber = $_POST['classnumber'];
$secgroupname= $_POST['secgroupname'];
$raw_data = $_POST['raw_data'];

// Split data into blocks based on serial numbers (SL.No.)
$blocks = preg_split('/\n(?=\d+\n)/', trim($raw_data));

// Array to store the extracted entries
$entries = [];

foreach ($blocks as $block) {
    $lines = explode("\n", trim($block));
    
    $entry = [
        "SL.No." => array_shift($lines),
        "Candidate's Name" => array_shift($lines),
        "Father's Name" => array_shift($lines),
        "Mother's Name" => array_shift($lines),
        "Section" => array_shift($lines),
        "Roll" => array_shift($lines),
        "Gender" => array_shift($lines),
        "Group" => array_shift($lines),
        "Shift" => array_shift($lines),
        "Version" => array_shift($lines),
        "Subjects" => implode(' ', array_slice($lines, 0, 4)),
        "Opt. Sub" => implode(' ', array_slice($lines, 4, 2)),
        "Pass Year" => $lines[6],
        "Roll No" => $lines[7],
        "Board" => $lines[8],
        "RegNo" => $lines[9]
    ];
    
    $entries[] = $entry;
}

// Output extracted entries
echo "<h2>Processed Entries</h2>";
foreach ($entries as $entry) {
    echo "<h3>Entry {$entry['SL.No.']}</h3>";
    echo "<p><strong>Candidate's Name:</strong> {$entry["Candidate's Name"]}</p>";
    echo "<p><strong>Father's Name:</strong> {$entry["Father's Name"]}</p>";
    echo "<p><strong>Mother's Name:</strong> {$entry["Mother's Name"]}</p>";
    echo "<p><strong>Section:</strong> {$entry["Section"]}</p>";
    echo "<p><strong>Roll Number:</strong> {$entry["Roll"]}</p>";
    echo "<p><strong>Gender:</strong> {$entry["Gender"]}</p>";
    echo "<p><strong>Group:</strong> {$entry["Group"]}</p>";
    echo "<p><strong>Shift:</strong> {$entry["Shift"]}</p>";
    echo "<p><strong>Version:</strong> {$entry["Version"]}</p>";
    echo "<p><strong>Subjects:</strong> {$entry["Subjects"]}</p>";
    echo "<p><strong>Optional Subjects:</strong> {$entry["Opt. Sub"]}</p>";
    echo "<p><strong>Pass Year:</strong> {$entry["Pass Year"]}</p>";
    echo "<p><strong>Roll No:</strong> {$entry["Roll No"]}</p>";
    echo "<p><strong>Board:</strong> {$entry["Board"]}</p>";
    echo "<p><strong>Registration Number:</strong> {$entry["RegNo"]}</p>";
    $roll = intval($entry["Roll"]);


    $nameb = "Not Avliable";
    $fnameb = "Not Avliable";
    $mnameb = "Not Avliable";

    $name = $entry["Candidate's Name"];
    $fname = $entry["Father's Name"];
    $mname = $entry["Mother's Name"];
    $sex = $entry["Gender"];

    $brithid = '0';
    $sdob = "2000-01-01";
    $dob = date("Y-m-d", strtotime($sdob));
    $fnid = '0';
    $mnid = '0';

    $classname = '';
    require '../interdb.php';

    // Finding Class name
    $sel_query2 = "SELECT * FROM class WHERE classnumber='$classnumber'";
    $result2 = mysqli_query($link, $sel_query2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $classname = $row2['classname'];
    }

    $roll = $roll;
    $address = "Not Avliable";
    $mobile = "Not Avliable";
    $uniqid = $classnumber . $secgroupname . $roll;

    // Insert photo
    $imgname = $classnumber.$roll.'.jpg';
    

    // Insert to database with ON DUPLICATE KEY UPDATE
    $sql = "INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname) VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$dob', '$brithid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$sex', '$imgname') 
    ON DUPLICATE KEY UPDATE 
    classnumber=VALUES(classnumber), 
    classname=VALUES(classname), 
    secgroup=VALUES(secgroup), 
    roll=VALUES(roll), 
    name=VALUES(name), 
    fname=VALUES(fname), 
    mname=VALUES(mname), 
    nameb=VALUES(nameb), 
    fnameb=VALUES(fnameb), 
    mnameb=VALUES(mnameb), 
    dob=VALUES(dob), 
    birthid=VALUES(birthid), 
    fnid=VALUES(fnid), 
    mnid=VALUES(mnid), 
    address=VALUES(address), 
    mobile=VALUES(mobile), 
    uniqid=VALUES(uniqid), 
    sex=VALUES(sex), 
    imgname=VALUES(imgname)";
  
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Class Already Exists</h1>";
    }


    // Assign data to variables
     
     

        $l_phone = '0';
        $blood = '0';
        $ssc_roll = $entry["Roll No"];
        $ssc_reg = $entry["RegNo"];
       

        $sql2="INSERT INTO addmission_ssc_student (classnumber, section, roll, stuid, ssc_roll, ssc_reg,name,passingYear,board,gpa,passing_school,f_opq,f_income,l_name,l_opc,l_income,l_phone,marital,religion,blood)
VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$ssc_roll', '$ssc_reg','','','','','','','','','','','$l_phone','','','$blood')
ON DUPLICATE KEY UPDATE
    classnumber = VALUES(classnumber),
    section = VALUES(section),
    roll = VALUES(roll),
    stuid = VALUES(stuid),
    ssc_roll = VALUES(ssc_roll),
    ssc_reg = VALUES(ssc_reg);";
 if(mysqli_query($link, $sql2)){
        echo "<h1 style='color:green;'>SSC Information Inserted</h1>.";
   }



$regstatus=1;
//insert to sturegstatus
require "../interdb.php";
        $sql5 ="INSERT INTO sturegstatus(classnumber,secgroupname,roll,uniqid,regstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$regstatus') ON DUPLICATE KEY UPDATE regstatus='$regstatus'"; 
    if(mysqli_query($link, $sql5)){
        echo "<h3 style='color:green;'>Regestration Successfull</h1>.";
    } 


//assign main Subject
    $subcode = explode(' ', $entry["Subjects"]);
    for ($i = 0; $i < count($subcode); $i++) {
    $subcoden =$subcode[$i];
    $subnamen="";   

        require "../interdb.php";
    $sel_query="SELECT * FROM subject WHERE subcode='$subcoden'";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
               $subnamen=$row['subname'];
            }

    
    $substatusn ='1';
    $unisubstatus=$classnumber.$secgroupname.$roll.$subcoden;

    require "../interdb.php";
       $sql10 ="INSERT INTO sturegsubject(classnumber,secgroupname,roll,uniqid,subcode,subname,substatus,unisubstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$subcoden','$subnamen','$substatusn','$unisubstatus') ON DUPLICATE KEY UPDATE substatus='$substatusn'";
        if(mysqli_query($link, $sql10)){
            echo "<span style='color:green'>Subject ".$subcoden." Inserted Successfully(Main)</span><br>";
    } else{
    echo "Already Added This Subject to this Regestration";
    }
    }//eending main subject


    //assign 4th Subject
    $subcode = explode(' ', $entry["Opt. Sub"]);
    for ($i = 0; $i < count($subcode); $i++) {
    $subcoden =$subcode[$i];
    $subnamen="";   

        require "../interdb.php";
    $sel_query="SELECT * FROM subject WHERE subcode='$subcoden'";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
               $subnamen=$row['subname'];
            }

    
    $substatusn ='4';
    $unisubstatus=$classnumber.$secgroupname.$roll.$subcoden;

    require "../interdb.php";
       $sql10 ="INSERT INTO sturegsubject(classnumber,secgroupname,roll,uniqid,subcode,subname,substatus,unisubstatus) VALUES ('$classnumber','$secgroupname','$roll','$uniqid','$subcoden','$subnamen','$substatusn','$unisubstatus') ON DUPLICATE KEY UPDATE substatus='$substatusn'";
        if(mysqli_query($link, $sql10)){
            echo "<span style='color:green'>Subject ".$subcoden." Inserted Successfully (4th)</span><br>";
    } else{
    echo "Already Added This Subject to this Regestration";
    }
    }//eending main subject



} //ending array loop


    }//ending server request
?>
            
        </div>
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
<?php include'inc/footer.php'?>