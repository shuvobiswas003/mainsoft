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
                                <h4 class="pull-left page-title">Seat Plan</h4>
                            </div>
                        </div>
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
$examid=$_REQUEST['examid'];
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Sealplan C1-C2-C1</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $examid=$_POST['examid'];
        //getting room and building info
        $romm_bnumber= $_POST['romm_bnumber'];
        $br=explode(',', $romm_bnumber);
        $roomnumber=$br[0];
        $bnumber=$br[1];

        //getting class and section info
        $classnumber=$_POST['classnumber'];
        $section=$_POST['secgroupname'];

        //getting other perameter;
        $startroll=$_POST['startroll'];
        $endroll=$_POST['endroll'];
        $studentstartroll=$startroll;
        $studentendroll;
        $totalstudent=1;


        
        //getting student-c1
        $studentcounter=0;
        require "../interdb.php";
        $sql7 = "SELECT * FROM student Where classnumber='$classnumber' AND secgroup='$section' AND roll BETWEEN $startroll AND $endroll  ORDER BY roll ASC ";
        $result = $link->query($sql7);

        // Create an empty array to store the results
        $data = array();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
        // Loop through each row and add it to the array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        } 

        //getting student-c2
        //getting C2 parameters
        $startrollc2=$_POST['startrollc2'];
        $endrollc2=$_POST['endrollc2'];
        $studentstartrollc2=$startrollc2;
        $studentendrollc2;

        $c2sec= $_POST['c2_c_s'];
        $br=explode(',', $c2sec);
        $class2=$br[0];
        
        $sec2=$br[1];
    

        $studentcounter2=0;
        require "../interdb.php";
        $sql8 = "SELECT * FROM student Where classnumber='$class2' AND secgroup='$sec2' AND roll BETWEEN $startrollc2 AND $endrollc2  ORDER BY roll ASC ";
        $result = $link->query($sql8);

        // Create an empty array to store the results
        $data2 = array();

        // Check if any rows were returned
        if ($result->num_rows > 0) {
        // Loop through each row and add it to the array
        while ($row = $result->fetch_assoc()) {
            $data2[] = $row;
        }
        } 



        ?>
        
        <?php
        require "../interdb.php";
        //getting bench collumn
        $count=1;
        $sel_query="SELECT * FROM buildingroom WHERE roomnumber='$roomnumber' AND bnumber='$bnumber'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $colofbech=$row['rowofbench'];
        //getting each collumn row of bench;
        for ($a=1; $a<=$colofbech; $a++) {
        echo "<br>";
        echo "Bench Column no".$a;
        echo "<br>";
        
        $count1=1;
        $sel_query1="SELECT * FROM buildingroombench WHERE roomnumber='$roomnumber' AND rownumber='$a'";
        $result1 = mysqli_query($link,$sel_query1);
        while($row1 = mysqli_fetch_assoc($result1)) {
            $numberrow=$row1['numberofbench'];
            $tablestartroll=$startroll;
            $tableendroll=$startroll+($numberrow*2);
            $startroll=$tableendroll;
            $tablecountervar=$tablestartroll+$numberrow;
            for ($j=1; $j<=$numberrow; $j++) { 
                $benchrow=$j;
            ?>
        
        <?php 
        while ($tablestartroll<$tablecountervar) {
        ?>

<!--1st Col Start-->
    <div style="width: 220px;float: left;">
    <?php         
    for ($k=0; $k <$numberrow ; $k++) { 
    $benchrow=$k+1;
    ?>
    
    <div class="left" style="float:left;">
        <?php
        if (isset($data[$studentcounter]['roll'])) {
        echo "C- ".$data[$studentcounter]['classnumber'];  
        echo " Roll- ".$data[$studentcounter]['roll'];
        $studentendroll=$data[$studentcounter]['roll'];
        $totalstudent++;
        $studentcounter++;
        $uniid=$examid.$bnumber.$roomnumber.$classnumber.$studentendroll;
        $sql ="INSERT INTO examseatinfo(examid,bnumber,roomnumber,classnumber,studentroll,benchcol,benchrow,align,uniid) VALUES ('$examid','$bnumber','$roomnumber','$classnumber','$studentendroll','$a','$benchrow','L','$uniid')ON DUPLICATE KEY UPDATE examid='$examid',bnumber='$bnumber',roomnumber='$roomnumber',classnumber='$classnumber',studentroll='$studentendroll',benchcol='$a',benchrow='$benchrow',uniid='$uniid',align='L'"; 
        if(mysqli_query($link, $sql)){
            echo "Add";
        } else{
            echo "Seatplan Updated";
        }
        } else {
         echo "N/A";
        }
        ?>
        
        
        </div>
        
        <?php 
        echo "<br>";
        $tablestartroll++;
        } ?>
    </div>

<!--1st Col END-->

<!--Middle c2 Col Start-->
    <div style="width: 120px;float: left;">
    <?php 
           
    for ($k=0; $k <$numberrow ; $k++) { 
    $benchrow=$k+1;
    ?>
    
    <div class="left" style="float:left;">
    
        <?php
        if (isset($data2[$studentcounter2]['roll'])) {
        $classnumber2=$data2[$studentcounter2]['classnumber'];
         echo "C- ".$data2[$studentcounter2]['classnumber'];  
         echo " Roll- ". $data2[$studentcounter2]['roll'];
        $studentendrollc2=$data2[$studentcounter2]['roll'];
        $totalstudent++;
        
        
        $uniid=$examid.$bnumber.$roomnumber.$classnumber2.$studentendrollc2;
        $sql ="INSERT INTO examseatinfo(examid,bnumber,roomnumber,classnumber,studentroll,benchcol,benchrow,align,uniid) VALUES ('$examid','$bnumber','$roomnumber','$classnumber2','$studentendrollc2','$a','$benchrow','R','$uniid')ON DUPLICATE KEY UPDATE examid='$examid',bnumber='$bnumber',roomnumber='$roomnumber',classnumber='$classnumber2',studentroll='$studentendrollc2',benchcol='$a',benchrow='$benchrow',uniid='$uniid',align='R'"; 
        if(mysqli_query($link, $sql)){
            echo "Add";
        } else{
            echo "Seatplan Updated";
        }
        } else {
         echo "N/A";
        }
        ?>
        

        </div>
        
        <?php 
        $studentcounter2++;
        echo "<br>";
        $tablestartroll++;
        } ?>
    </div>

<!--Middle  Col-c2 END-->



    
<!--2nd col Start-->            
            
<?php
    }//ending while loop Main Seat plan col Area
?>

            

            <?php
            $count1++;
            } //ending each each row of bench
            
            echo "<br>";
            }//ending  column for loop

            $count++;
            }

        

    }
    $totalstudent=$totalstudent-1;

// insertting room seat plan summery
$seatplanuniid=$examid.$bnumber.$roomnumber;
$sql ="INSERT INTO examseatplanc1c2(examid,bnumber,roomnumber,classnumber,section,startroll,endroll,uniqid,totalstudent,classnumber2,section2,startroll2,endroll2) VALUES ('$examid','$bnumber','$roomnumber','$classnumber','$section','$studentstartroll','$studentendroll','$seatplanuniid','$totalstudent','$class2','$sec2','$studentstartrollc2','$studentendrollc2')ON DUPLICATE KEY UPDATE roomnumber='$roomnumber',bnumber='$bnumber',classnumber='$classnumber',section='$section',startroll='$studentstartroll',endroll='$studentendroll',totalstudent='$totalstudent',classnumber2='$class2',section2='$sec2',startroll2='$studentstartrollc2',endroll2='$studentendrollc2'"; 
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Seatplan Added</h1>.";
        } else{
            echo "<h3 style='color:red;'>Seatplan Updated</h1>";
        }

}//ending from 
    
?>

<div class="row">
        <div class="col-md-12">
            <br><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from exam Where exid='$examid' ORDER BY exid;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    
                    
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    
                    <?php $count++;} ?>
                    </select>
                </div>
             </div>

             <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class C1</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class Where classnumber='$classnumber' ORDER BY classnumber;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    
                    
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    
                    <?php $count++;} ?>
                    </select>
                </div>
             </div>

             <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section C1</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from sectiongroup Where classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER BY classnumber;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    
                    
                    <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                    
                    <?php $count++;} ?>
                    </select>
                </div>
             </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select C2 Class & Sec</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="c2_c_s" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class ORDER BY classnumber;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    
                    <?php
                    $count1=1;
                    $classnumber=$row['classnumber'];
                    $sel_query1="Select * from sectiongroup WHERE classnumber='$classnumber';";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <option value="<?php echo $row['classnumber']?>,<?php echo $row1['secgroupname']?>">
                     Class:<?php echo $row['classnumber']?>  (Sec/Group: <?php echo $row1['secgroupname']?>)</option>
                    <?php $count1++;}?>
                    <?php $count++;} ?>
                    </select>
                </div>
             </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Room number</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="romm_bnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from buildingroom ORDER BY roomnumber;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    
                    <?php
                    $count1=1;
                    $bnumber=$row['bnumber'];
                    $sel_query1="Select * from building WHERE bnumber='$bnumber';";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <option value="<?php echo $row['roomnumber']?>,<?php echo $row1['bnumber']?>">
                    <?php echo $row1['bname']?>  Room Name:<?php echo $row['roomname']?>  (Room Number<?php echo $row['roomnumber']?>)</option>
                    <?php $count1++;}?>
                    <?php $count++;} ?>
                    </select>
                </div>
             </div>

             


                
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Start Roll C1:</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="startroll" class="form-control" placeholder="Enter Start Roll">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">End Roll C1:</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="endroll" class="form-control" placeholder="Enter END Roll">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Start Roll C2:</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="startrollc2" class="form-control" placeholder="Enter Start Roll">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">End Roll C2:</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="endrollc2" class="form-control" placeholder="Enter END Roll">
                    </div>
                </div>


                <input type="submit" class="btn btn-primary" Value="Add Seatplan">
            </form>
        </div>
    </div>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Room Seat Plan</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php
           $classnumber=$_REQUEST['classnumber'];
            ?>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>EXAM ID</th>
                        <th>C-1</th>
                        <th>C1-Sec</th>
                        <th>C1-SR</th>
                        <th>C1-ER</th>
                        <th>C-2</th>
                        <th>C2-Sec</th>
                        <th>C2-SR</th>
                        <th>C2-ER</th>
                        <th>B ID</th>
                        <th>Building Name</th>
                        <th>Room Number</th>
                        <th>Total Student</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from examseatplanc1c2 Where (classnumber='$classnumber' OR classnumber2='$classnumber') AND( section='$secgroupname' OR section2='$secgroupname') AND examid='$examid'";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row['examid']; ?></td>

                                <td><?php echo $row['classnumber']; ?></td>

                                <td><?php echo $row['section']; ?></td>

                                <td><?php echo $row['startroll']; ?></td>

                                <td><?php echo $row['endroll']; ?></td>

                                <td><?php echo $row['classnumber2']; ?></td>

                                <td><?php echo $row['section2']; ?></td>

                                <td><?php echo $row['startroll2']; ?></td>

                                <td><?php echo $row['endroll2']; ?></td>


                                <td><?php echo $row['bnumber']; ?></td>
                                <td>
                                <?php
                                $bnumber=$row['bnumber'];
                                $sel_query1="SELECT * FROM building where bnumber='$bnumber'";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) {
                                    echo $row1['bname'];
                                }
                                    ?>
                                </td>
                                <td><?php echo $row['roomnumber']; ?></td>

                                <td><?php echo $row['totalstudent']; ?></td>
                                
                
<th>
<a href="deleteseatplanc1c2.php?id=<?php echo $row['id'];?>&roomnumber=<?php echo $row['roomnumber'];?>&classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $secgroupname;?>&examid=<?php echo $examid;?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this seatplan?');">Delete</button> </a>

<?php
$colofbench;
$bnumber=$row['bnumber'];
$roomnumber=$row['roomnumber'];
$sel_query2="Select * from buildingroom where bnumber='$bnumber' AND roomnumber='$roomnumber'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$colofbench=$row2['rowofbench'];
}
?>

<a href="printseatplanc1c2.php?bnumber=<?php echo $row['bnumber'];?>&roomnmber=<?php echo $row['roomnumber'];?>&examid=<?php echo $row['examid']?>&colofbench=<?php echo $colofbench;?>" target="_blank">
<button type="button" class="btn btn-primary">Print</button>
</a>
</th>
                            

                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
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