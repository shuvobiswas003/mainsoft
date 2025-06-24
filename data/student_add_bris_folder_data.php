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

$classnumber = $_POST['classnumber'];
$secgroupname = $_POST['secgroupname'];

    $classname="";

    switch ($classnumber) {
        case '0':
        $classname = "Child Class";
        break;
    case '1':
        $classname = "Class One";
        break;
    case '2':
        $classname = "Class Two";
        break;
    case '3':
        $classname = "Class Three";
        break;
    case '4':
        $classname = "Class Four";
        break;
    case '5':
        $classname = "Class Five";
        break;
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




                            $directory = "../bris_folder/".$classnumber."/".$secgroupname ."/";
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
    <img src="<?php echo $img_src;?>?<?php echo time();?>" alt="<?php echo $img_src;?>" style="height: 200px;">
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


$name = get_string_between($fullstring, 'Registered Person Name', 'জন্মস্থান');
$name = trim($name);
if (empty($name)) {
    $name = "No Data ON BRIS BD";
}
$name=strtoupper($name);
echo $name . "<br>";

$fname = get_string_between($fullstring, "Father's Name", 'পিতার জাতীয়তা');
$fname=trim($fname);
if(empty($fname)){
    $fname="No Data ON BRIS BD";
}
$fname=strtoupper($fname);

echo $fname . "<br>";

$mname = get_string_between($fullstring, "Mother's Name", 'মাতার জাতীয়তা');
$mname=trim($mname);
if(empty($mname)){
    $mname="No Data ON BRIS BD";
}
$mname=strtoupper($mname);

echo $mname . "<br>";

$nameb = get_string_between($fullstring, "নিবন্ধিত ব্যক্তির নাম", "Registered Person Name");
            $nameb=trim($nameb);

echo $nameb . "<br>";

$fnameb = get_string_between($fullstring, "পিতার নাম", "Father's Name");
            $fnameb=trim($fnameb);

echo $fnameb . "<br>";

$mnameb = get_string_between($fullstring, "মাতার নাম", "Mother's Name");
            $mnameb=trim($mnameb);

echo $mnameb . "<br>";

$pos=strpos($fullstring,"FEMALE");
            if($pos=="0"){
                $gender="MALE";
            }else{
                $gender="FEMALE";
            }
echo $gender . "<br>";

$arrayName = explode("Sex", $fullstring);
$bdata=$arrayName[1];
$bdata=trim($bdata);
$data=explode(" ", $bdata);
$birthid=$data[35];
echo $birthid . "<br>";

$arrayName = explode("Sex", $fullstring);
$bdata=$arrayName[1];
$bdata=trim($bdata);
$data=explode(" ", $bdata);
$date=$data[0];
$month=$data[1];
$year=$data[2];
$daten=$date."-".$month."-".$year;
$dob=date("Y-m-d", strtotime($daten));

echo $dob . "<br>";

$fnid=0;
$mnid=0;

$addressraw = get_string_between($fullstring, "Place of Birth", "মাতার");
                    $address=$addressraw;
                    $address=trim($address);
echo $address . "<br>";
$mobile=0;

$uniqid=$classnumber.$secgroupname.$roll;

$imgname=$db_img_src;

echo $imgname . "<br>";

 $sql = "INSERT INTO student(classnumber,classname,secgroup,roll,name,fname,mname,nameb,fnameb,mnameb,dob,birthid,fnid,mnid,address,mobile,uniqid,sex,imgname) 
        VALUES ('$classnumber','$classname','$secgroupname','$roll','$name','$fname','$mname','$nameb','$fnameb','$mnameb','$dob','$birthid','$fnid','$mnid','$address','$mobile','$uniqid','$gender','$imgname') 
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
        imgname = VALUES(imgname)";


    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student Admited Successfully</h1>.";

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
