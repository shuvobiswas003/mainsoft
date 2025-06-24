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
                                <h4 class="pull-left page-title">PI Entry</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Performance Indecator(PI)</h3>
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
$chapterno=$_POST['chapterno'];
$lessonno=$_POST['lessonno'];
//array date
$roll=$_POST['roll'];
$suniqid=$_POST['suniqid'];
$pi=$_POST['pi'];

echo "<h1><a href='exammarkadd67.php?classnumber=".$classnumber."&secgroupname=".$secgroupname."&examid=".$examid."'>Back To PI Entry Dashboard</a></h1>";
//insert to sturegsubject
    for ($i = 0; $i < count($roll); $i++) {
    $rolln =$roll[$i];
    $suniqidn =$suniqid[$i];
    $pin =$pi[$i];
    

    
    //exam uni id
$uni=$examid.$subcode.$chapterno.$lessonno.$suniqidn;

    echo "Class: ".$classnumber."<br>";
    echo "Section/Group: ".$secgroupname."<br>";
    echo "Roll: ".$rolln."<br>";
    echo "Stdent ID: ".$suniqidn."<br>";
    echo "Exam ID: ".$examid."<br>";
    echo "Subject Code: ".$subcode."<br>";
    echo "Chapter NO: ".$chapterno."<br>";
    echo "Lesson NO: ".$lessonno."<br>";
    echo "Performance Indecator(PI): ".$pin."<br>";
    echo "Exam Paper Uniq Code: ".$uni."<br>";
    echo '<br>';
    echo '<br>';
    //insert to database
    $sql ="INSERT INTO exammark67(examid,classnumber,secgroupname,roll,stuid,subcode,chapterno,lno,pi,uni) VALUES ('$examid','$classnumber','$secgroupname','$rolln','$suniqidn','$subcode','$chapterno','$lessonno','$pin','$uni') ON DUPLICATE KEY UPDATE pi='$pin'"; 
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Subject Mark".$uni." Inserted Successfully</span><br>";
    } else{
    echo "Already Exists This Subject Mark to this Exam";
    }

}
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