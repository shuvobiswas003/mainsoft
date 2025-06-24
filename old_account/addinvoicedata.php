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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice Data</h4>
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
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$payid=$_POST['payid'];
$getdate=$_POST['pdate'];
$date = date( "Y-m-d", strtotime($getdate));;
//array date
$roll=$_POST['roll'];
$name=$_POST['name'];
$suniqid=$_POST['suniqid'];
$des=$_POST['des'];
$total=$_POST['total'];

//insert to sturegsubject
    for ($i = 0; $i < count($roll); $i++) {
    $rolln =$roll[$i];
    $namen =$name[$i];
    $suniqidn =$suniqid[$i];
    $desn =$des[$i];
    $tdesn=trim($desn);
    $totaln =$total[$i];
    $puniid=$payid.$suniqidn;



    //getting total pay
    require "../interdb.php";
    $totalpay;
    $sql7 = "SELECT * from studentpayment where puniid='$puniid'";
    $result9 = $link->query($sql7);
    if ($result9->num_rows > 0) {
// Loop through each row and add it to the array
    while ($row9 = $result9->fetch_assoc()) {
    $totalpay= $row9['totalpay'];
    }
    }else{
        $totalpay=0;
    } 

$newdue=$totaln-$totalpay;

$status;
if($newdue=='0'){
    $status='Paid';
}else{
    $status='Unpaid';
}





    echo "Class: ".$classnumber."<br>";
    echo "Section/Group: ".$secgroupname."<br>";
    echo "Roll: ".$rolln."<br>";
    echo "Stdent ID: ".$suniqidn."<br>";
    echo "Total: ".$totaln."<br>";
    
    echo "Invoice Uni ID: ".$puniid."<br>";
    echo "Status: ".$status."<br>";
    echo '<br>';
    echo '<br>';





    //insert to database
    $sql ="INSERT INTO `studentpayment`(`pcatid`, `classnumber`, `secgroupname`, `stuid`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `puniid`,`date`,`roll`) VALUES ('$payid','$classnumber','$secgroupname','$suniqidn','$namen','$tdesn','$totaln','0','$totaln','Unpaid','$puniid','$date','$rolln') ON DUPLICATE KEY UPDATE stuid='$suniqidn',total=$totaln,des='$tdesn',total='$totaln',due='$newdue',totalpay='$totalpay',status='$status',date='$date',roll='$rolln';";

        if(mysqli_query($link, $sql)){
            echo "<span style='color:green'>Invoice Generated Sucessfully".$puniid." Inserted Successfully</span><br>";
    } else{
    echo "Already Exists This Invoice";
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