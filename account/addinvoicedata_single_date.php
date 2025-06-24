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

//array date
$payid=$_POST['payid'];
$roll=$_POST['roll'];
$name=$_POST['name'];
$suniqid=$_POST['suniqid'];
$des=$_POST['des'];
$total=$_POST['total'];

$invoice_date=$_POST['invoice_date'];

//insert to sturegsubject
    for ($i = 0; $i < count($roll); $i++) {
    $rolln =$roll[$i];
    $namen =$name[$i];
    $suniqidn =$suniqid[$i];
    $desn =$des[$i];
    $tdesn=trim($desn);
    $totaln =$total[$i];
    $invoice_date_raw=$invoice_date[$i];
    $invoice_date_for=date( "Y-m-d", strtotime($invoice_date_raw));
    $payidn=$payid[$i];
    $puniid=$payidn.$suniqidn;
    



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


$sec_group="";
 $sel_query20="SELECT * FROM student WHERE uniqid='$suniqidn'";
            $result20 = mysqli_query($link,$sel_query20);
            while($row20 = mysqli_fetch_assoc($result20)) {
            $sec_group=$row20['secgroup'];
            }


    echo "Class: ".$classnumber."<br>";
    echo "Section/Group: ".$sec_group."<br>";
    echo "Roll: ".$rolln."<br>";
    echo "Stdent ID: ".$suniqidn."<br>";
    echo "Total: ".$totaln."<br>";
    echo "Date: ".$invoice_date_for."<br>";
    echo "Invoice Uni ID: ".$puniid."<br>";
    echo "Status: ".$status."<br>";
    echo '<br>';
    echo '<br>';





    //insert to database
    $sql ="INSERT INTO `studentpayment`(`pcatid`, `classnumber`, `secgroupname`, `stuid`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `puniid`,`date`,`roll`) VALUES ('$payidn','$classnumber','$sec_group','$suniqidn','$namen','$tdesn','$totaln','0','$totaln','Unpaid','$puniid','$invoice_date_for','$rolln') ON DUPLICATE KEY UPDATE secgroupname='$sec_group',stuid='$suniqidn',total=$totaln,des='$tdesn',total='$totaln',due='$newdue',totalpay='$totalpay',status='$status',date='$invoice_date_for',roll='$rolln';";

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