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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Datatable</h4>
                                
                            </div>
                        </div>
    <?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];
    $did=$_REQUEST['did'];
    ?>
<?php
$dip;
$dport;

require "interdb.php";
$sel_query="Select * from devices WHERE id='$did'";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
    $dip=$row['dip'];
    $dport=$row['dport'];      
}

require_once('zklib/ZKLib.php');
$zk = new ZKLib($dip,$dport);
$ret = $zk->connect();

?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Student </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Machine ID</th>
                                        <th>RFID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            
                            require "interdb.php";
                            $count=1;
                            $sel_query="SELECT * FROM student";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                
                                <td>
                                <?php
                            	$suniqid=$row['uniqid'];
                                require "interdb.php";
                                $count1=1;
                                $sel_query1="SELECT * FROM machinedata WHERE stuid='$suniqid'";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) {?>
                                <?php 
                                $mid=$row1['mid'];
                                $fmid;
                                if(empty($mid)){
                                    echo "Not Added";
                                    $fmid=0;
                                }else{
                                    echo $row1['mid'];
                                    $fmid=$row1['mid'];
                                }
                                ?>
                                </td>
                                <?php $count1++; }?>
                                
                                <td>
                                <?php
                                    $uniqid=$row['uniqid'];
                                    $count2=1;
                                    $cardno=0;
                                    $sel_query2="Select * from rfid where stuid='$uniqid'";
                                    $result2 = mysqli_query($link,$sel_query2);
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <?php echo $row2['rfid'];
                                $cardno=$row2['rfid'];
                                ?>
                                <?php $count2++; } ?>
                                </td>
                                <td><?php echo $row["name"]; ?></td>
<td>

<?php
$nc;
if(empty($cardno)){
    $nc=0;
}else{
$nc=intval($cardno);
}
$name=$row["name"];
$upl=$zk->setUser($fmid, $fmid, $name, '', ZK\Util::LEVEL_USER,intval($nc));
if($upl){
echo "Problem to Upload";
}else{
    echo "Uploaded";
}


?>
</td>
                        </tr>
                        <?php $count++; } ?>                  

<?php
$zk->setUser(1, '1', 'Shuvo', '1122', ZK\Util::LEVEL_ADMIN,'0');

?>
                        </tbody>
                    </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>