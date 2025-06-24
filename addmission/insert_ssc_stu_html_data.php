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
            <!-- Raw Div Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Exam Mark Entry</h3>
                        </div>
                        <!-- 2nd Form Part Start -->
                        <div class="panel-body">
                            <div class="row">
                                
                                    <?php
                            function get_string_between($string, $start, $end){
                                $string = ' ' . $string;
                                $ini = strpos($string, $start);
                                if ($ini == 0) return '';
                                $ini += strlen($start);
                                $len = strpos($string, $end, $ini) - $ini;
                                return substr($string, $ini, $len);
                            }


                        function getWordBeforeFathersName($fullstring) {
                        // Find the position of "Father's Name"
                        $pos = strpos($fullstring, "Father's Name");

                        if ($pos === false) {
                            return null; // "Father's Name" not found
                        }

                        // Get the substring before "Father's Name"
                        $substring = substr($fullstring, 0, $pos);

                        // Split the substring into words
                        $words = preg_split('/\s+/', trim($substring));

                        // Get the last word in the substring (which is before "Father's Name")
                        return end($words);
                    }

$classnumber = $_POST['classnumber'];
$secgroupname = $_POST['secgroupname'];
$folder_name=$_POST['folder_name'];

    $classname="";

    switch ($classnumber) {
    case '6':
        $classname = "Class Six";
        break;
    case '7':
        $classname = "Class Seven";
        break;
    case '8':
        $classname = "Class Eight";
        break;
    case '9':
        $classname = "Class Nine";
        break;
    case '10':
        $classname = "Class Ten";
        break;
    case '11':
        $classname = "Class Eleven";
        break;
    case '12':
        $classname = "Class Twelve";
        break;
    default:
        $classname = "Unknown Class";
        break;
}




                            $directory = "../ssc_result/".$folder_name."/";
                            // Open directory
                            if ($handle = opendir($directory)) {
                                // Iterate over files in the directory
                                while (false !== ($file = readdir($handle))) {
                                    // Check if the file is a regular file
                                    if (is_file($directory . $file)) {
                                        // Open the file for reading
                                        $handle_file = fopen($directory . $file, "r");

                                        // Check if file was opened successfully
                                        if ($handle_file) {
                                            // Read the content of the file into a string
                                            $contents = fread($handle_file, filesize($directory . $file));

                                            // Remove HTML tags
                                            $cleanedContent = strip_tags($contents);

                                            // Close the file handle
                                            fclose($handle_file);
?>

<div class="col-md-4" style="border: 2px solid black;">
<!--Updated Image -->
<?php
$file_parts = explode(".", $file);
$roll = $file_parts[0];
require "../interdb.php";

$img_src="";
$db_img_src="";
// Assuming $stuuniqid contains the value you want to search for
$stuuniqid = $classnumber.$secgroupname.$roll;

// Prepare SQL statement
$sql20 = "SELECT * FROM imagesl WHERE stuuniqid = '$stuuniqid'";
$result20 = $link->query($sql20);

// Check if any rows are returned
if ($result20->num_rows > 0) {
    // Fetch and display the data
    while ($row20 = $result20->fetch_assoc()) {
        $img_src="../img/student/".$row20['imgname'];
        $db_img_src=$row20['imgname'];
    }
} else {
    $img_src="../img/student/".$classnumber."/".$roll.".png";
    // Check if the PNG image exists
if (file_exists($img_src)) {
    // If the PNG image exists, use it
    $img_src = $img_src;
    $db_img_src=$classnumber."/".$roll.".png";
} else {
    // If the PNG image does not exist, format the path to JPG
    $img_src = "../img/student/" . $classnumber . "/" . $roll . ".jpg";
    $db_img_src=$classnumber."/".$roll.".jpg";
}
}
?>
<center>
    <img src="../img/student/<?php echo $roll;?>.jpg?<?php echo time();?>" alt="<?php echo $img_src;?>" style="height: 200px;">
</center>

</div>
<div class="col-md-8" style="border: 2px solid black;">
<?php
                                            // Perform your operations here
                                            $fullstring = $cleanedContent;
                                            $fullstring = str_replace(array("\r", "\n"), ' ', $fullstring);




                                

                                        

                                        echo "<center><h2>Class:- ".$classnumber."</center></h2>";
                                        echo "<center><h2>Section/Group:- ".$secgroupname."</center></h2>";
                                        echo "<center><h2>Roll:- ".$roll."</center></h2>";

$name = get_string_between($fullstring, 'Name', 'Board');
$name=trim($name);
$name=strtoupper($name);
echo $name . "<br>";

$board=getWordBeforeFathersName($fullstring);

if($board == 'TECHNICAL'){
$fname = get_string_between($fullstring, "Father's Name", 'Trade');
$fname=trim($fname);
echo $fname . "<br>";  
}else{
$fname = get_string_between($fullstring, "Father's Name", 'Group');
$fname=trim($fname);
echo $fname . "<br>"; 
}



$mname = get_string_between($fullstring, "Mother's Name", 'Type');
$mname=trim($mname);
echo $mname . "<br>";

$nameb = "Not Avliable";
echo $nameb . "<br>";

$fnameb = "Not Avliable";;
echo $fnameb . "<br>";

$mnameb = "Not Avliable";;
echo $mnameb . "<br>";

$sex="N/A";
$marital="N/A";
$religion="N/A";
$blood="";
$f_opc="";
$f_income="";
$l_name="";
$l_opc="";
$l_income="";
$l_phone="";


$birthid='0';
$dob = get_string_between($fullstring, "Date of Birth", 'Result');
$dob=trim($dob);
$dob=date("Y-m-d", strtotime($dob));
$fnid='0';
$mnid='0';
$address="Not Avliable";



$uniqid=$classnumber.$secgroupname.$roll;

//ssc_info
    $mobile="";
    $ssc_reg="";

    $sel_query50="Select * from addmission_ssc_student where stuid='$uniqid';";
    $result50 = mysqli_query($link,$sel_query50);
    while($row50 = mysqli_fetch_assoc($result50)) {
        $mobile=$row50['l_phone'];
        $ssc_reg=$row50['ssc_reg'];
    }
    echo "SSC REGESTRATION".$ssc_reg."<br>";
    $ssc_roll=get_string_between($fullstring, "Roll No", 'Name');
    echo "SSC Roll".$ssc_reg."<br>";


    $passingYear=get_string_between($fullstring, "Result", 'Roll');
    echo "passingYear".$passingYear."<br>";


    


    

    var_dump($board);

    echo "board".$board."<br>";

    $gpa=get_string_between($fullstring, "GPA", "Grade Sheet");
    echo "gpa".$gpa."<br>";

    $passing_school=get_string_between($fullstring, "Institute", 'GPA');
    echo "passing_school".$passing_school."<br>";

$imgname=$roll.".jpg";

echo $imgname . "<br>";

  require "../interdb.php";

        $sql ="INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname)
VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$dob', '$birthid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$sex', '$imgname')
ON DUPLICATE KEY UPDATE
    classnumber = VALUES(classnumber),
    classname = VALUES(classname),
    secgroup = VALUES(secgroup),
    roll = VALUES(roll),
    name = VALUES(name),
    fname = VALUES(fname),
    mname = VALUES(mname),
    nameb = VALUES(nameb),
    fnameb = VALUES(fnameb),
    mnameb = VALUES(mnameb),
    dob = VALUES(dob),
    birthid = VALUES(birthid),
    fnid = VALUES(fnid),
    mnid = VALUES(mnid),
    address = VALUES(address),
    mobile = VALUES(mobile),
    uniqid = VALUES(uniqid),
    sex = VALUES(sex),
    imgname = VALUES(imgname);
";

    if(mysqli_query($link, $sql)){
        echo "<h1 style='color:green;'>Student Admited Successfully</h1>.";
   }

$sql2 = "INSERT INTO addmission_ssc_student (
    classnumber, section, roll, stuid, ssc_roll, ssc_reg, name, passingYear, board, gpa, passing_school, 
    f_opq, f_income, l_name, l_opc, l_income, l_phone, marital, religion, blood
) VALUES (
    \"$classnumber\", \"$secgroupname\", \"$roll\", \"$uniqid\", \"$ssc_roll\", \"$ssc_reg\", \"$name\", \"$passingYear\", 
    \"$board\", \"$gpa\", \"$passing_school\", \"$f_opc\", \"$f_income\", \"$l_name\", \"$l_opc\", \"$l_income\", \"$l_phone\", 
    \"$marital\", \"$religion\", \"$blood\"
) ON DUPLICATE KEY UPDATE
    ssc_roll = VALUES(ssc_roll),
    passingYear = VALUES(passingYear),
    board = VALUES(board),
    gpa = VALUES(gpa),
    passing_school = VALUES(passing_school),
    f_opq = VALUES(f_opq),
    f_income = VALUES(f_income),
    l_name = VALUES(l_name),
    l_opc = VALUES(l_opc),
    l_income = VALUES(l_income);";

if (mysqli_query($link, $sql2)) {
    echo "<h1 style='color:green;'>SSC Information Inserted</h1>.";
} else {
    echo "<h1 style='color:red;'>Error: " . mysqli_error($link) . "</h1>";
}


?>

                                </div>
                        

<?php

            } else {
                // Error opening file
                echo "Error opening file: " . $directory . $file . "<br>";
            }
        }
    }
    // Close the directory handle
    closedir($handle);
} else {
    // Error opening directory
    echo "Error opening directory.";
}

?>

 </div><!--Ending Row Div-->
                            
                            <br><br><br>
                            <div class="col-md-12">   
                                <center> 
                                    <input type="submit" value="Admit Student" class="btn btn-primary">
                                </center>
                            </div>
                        </div>
                        <!-- 2nd Form Part End -->
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<?php include 'inc/footer.php'?>
