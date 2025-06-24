<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Delete Student</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Student</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
<?php
//single data
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$subname=$_POST['subname'];
$gradecode=$_POST['gradecode'];
$subfullmarks=$_POST['subfullmarks'];
//array date
$roll=$_POST['roll'];
$cq=$_POST['cq'];
$mcq=$_POST['mcq'];
$practical=$_POST['practical'];

echo "<h1><a href='exammarkadd.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."&examid=".$examid."'>Back To Mark Entry Dashboard</a></h1>";
//insert to sturegsubject
    for ($i = 0; $i < count($roll); $i++) {
    $rolln =$roll[$i];
    $rolln=trim($rolln);
    $suniqidn =$classnumber.$secgroupname.$roll[$i];
    $cqn =$cq[$i];
    $mcqn =$mcq[$i];
    $practicaln =$practical[$i];
    $total=$cqn+$mcqn+$practicaln;
    //get lettter point
    $letterpoint;
    $lettergrade;
    //reqire database
    require "../interdb.php";
    //fatch data from grade
    $sel_query="SELECT * FROM grademark WHERE gradecode='$gradecode' AND ($total BETWEEN markfrom AND markupto)";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
        $letterpoint=$row['letterpoint'];
        $lettergrade=$row['lettergrade'];
    }

    //fatch data from regestration
    $substatus;
    $unisubregstatus=$classnumber.$secgroupname.$rolln.$subcode;
    $sel_query="SELECT * FROM sturegsubject WHERE unisubstatus='$unisubregstatus'";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
        $substatus=$row['substatus'];
    }

    //exam uni id
    $unisubstatus=$classnumber.$secgroupname.$rolln.$examid.$subcode;


    echo "Class: ".$classnumber."<br>";
    echo "Section/Group: ".$secgroupname."<br>";
    echo "Roll: ".$rolln."<br>";
    echo "Stdent ID: ".$suniqidn."<br>";
    echo "Exam ID: ".$examid."<br>";
    echo "Subject Code: ".$subcode."<br>";
    echo "Subject Name: ".$subname."<br>";
    echo "Grade Code: ".$gradecode."<br>";
    echo "Subject Status: ".$substatus."<br>";
    echo "CQ Mark: ".$cqn."<br>";
    echo "MCQ Mark: ".$mcqn."<br>";
    echo "Practical Mark: ".$practicaln."<br>";
    echo "Total: ".$total."<br>";
    echo "Letter Point: ".$letterpoint."<br>";
    echo "Letter Grade: ".$lettergrade."<br>";
    echo "Exam Paper Uniq Code: ".$unisubstatus."<br>";

    echo '<br>';
    echo '<br>';
    //insert to database
    $sql ="INSERT INTO exammark(classnumber,secgroupname,roll,suniqid,examid,subcode,subname,substatus,gradecode,cq,mcq,practical,total,letterpoint,lettergrade,examuni,fullmarks,examdate,barcode) VALUES ('$classnumber','$secgroupname','$rolln','$suniqidn','$examid','$subcode','$subname','$substatus','$gradecode','$cqn','$mcqn','$practicaln','$total','$letterpoint','$lettergrade','$unisubstatus','$subfullmarks','0000-00-00','0') ON DUPLICATE KEY UPDATE cq='$cqn',mcq='$mcqn',practical='$practicaln',total='$total',lettergrade='$lettergrade',letterpoint='$letterpoint',substatus='$substatus'"; 
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Subject Mark".$unisubstatus." Inserted Successfully</span><br>";
    } else{
    echo "Already Exists This Subject Mark to this Exam";
    }
    



    mysqli_close($link);

}

//getting teacher log
require "../interdb.php";
$teachername=$_SESSION["teachername"];
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Dhaka');
$date = date('m/d/Y h:i:s a', time());
//insert to database
    $sql ="INSERT INTO markentrylog(teachername,loginip,logintime,classnumber,subcode,examid) VALUES ('$teachername','$ip','$date','$classnumber','$subcode','$examid')"; 
        if(mysqli_query($link, $sql)){
            echo "p";
    } else{
    }
mysqli_close($link);

?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>