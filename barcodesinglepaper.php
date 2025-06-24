<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
                                <h4 class="pull-left page-title">Add Exam Paper</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Exam Paper Single</h3>
            </div>
            <div class="panel-body">
<?php
    $exid=$_REQUEST['exid'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $admitbarcode= $_POST['admitbarcode'];
        $paperbarcode= $_POST['paperbarcode'];
        $exid= $_POST['exid'];
        $subcode;

        //fatch data from student table
        require "interdb.php";
        $classnumber='';
        $secgroupname="";
        $roll='';
        $suniqid='';
        //validting value
        $substatus='';


        $sel_query="SELECT * FROM student WHERE uniqid='$admitbarcode'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $classnumber=$row['classnumber'];
        $secgroupname=$row['secgroup'];
        $roll=$row['roll'];
        $suniqid=$row['uniqid'];
        }


        if(!empty($suniqid)){
        //fatch sub code
        $examdate=date("Y-m-d");
        $sel_query="Select * from examroutine where exid='$exid' AND class='$classnumber' AND cgroup='$secgroupname' AND examdate='$examdate';";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $subcode=$row['subcode'];
        //finding exam date
        if(!empty($subcode)){
            $subcoden="";
            $subname="";
            $substatus="";
            //fatchduplicatedata
            $sel_query1="Select * from sturegsubject where uniqid='$admitbarcode' AND (substatus=1 OR substatus=4) AND subcode='$subcode';";
            $result1 = mysqli_query($link,$sel_query1);
            while($row1 = mysqli_fetch_assoc($result1)) {
                $subcoden=$row1['subcode'];
                $subname=$row1['subname'];
                $substatus=$row1['substatus'];

        //sub code is not found
        if(!empty($substatus)){
        //fatch gradecode
        $gradecode;
        $subfullmarks;
        $subuni=$classnumber.$secgroupname.$subcode;
        $sel_query="SELECT * FROM subject WHERE uni='$subuni'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $gradecode=$row['gradecode'];
        $subfullmarks=$row['subfullmarks'];
        }

        //examunicode
        $examuni=$classnumber.$secgroupname.$roll.$exid.$subcoden;
        //insert to database
    if(!empty($suniqid)){
    $sql ="INSERT INTO exammark(classnumber,secgroupname,roll,suniqid,examid,subcode,subname,substatus,gradecode,cq,mcq,practical,total,letterpoint,lettergrade,examuni,fullmarks,barcode,examdate) VALUES ('$classnumber','$secgroupname','$roll','$suniqid','$exid','$subcoden','$subname','$substatus','$gradecode','0','0','0','0','0','0','$examuni','$subfullmarks','$paperbarcode','$examdate') ON DUPLICATE KEY UPDATE barcode='$paperbarcode',subcode='$subcoden',subname='$subname',substatus='$substatus',gradecode='$gradecode',examuni='$examuni',fullmarks='$subfullmarks',examdate='$examdate'";
    if(mysqli_query($link, $sql)){
    echo "<span style='color:green;font-size:20px;'>Paper".$paperbarcode." Inserted Successfully</span><br>";
    } else{
    echo "Already Exixts this paper to this Exam";
    }

                }


            }
    
    }
            
        }
}
}

if(empty($suniqid)){
    echo  "<h1 style='color:red;'>Student Data not found </h1>";
}
if(empty($suniqid)){

}else{
if(empty($subcode)){
    echo  "<h1 style='color:red;'>No Exam Held Today </h1>";
}
}

if(empty($subcode)){

}else{
if(empty($substatus)){
    echo  "<h1 style='color:red;'>No Subject Found to this Student. Cheak Regestration</h1>";
}
}




}
    
?>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Exam Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="exid" required="1">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from exam where exid='$exid';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $exid;?>"><?php echo $row['examname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Admit Barcode</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="admitbarcode" class="form-control" placeholder="Scan Admit Barcode" autofocus="autofocus" required="1">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Paper Barcode</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="paperbarcode" class="form-control" placeholder="Scan Paper Code" required="1">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Paper">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Paper</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Section/Group</th>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Exam Date</th>
                        <th>Full Marks</th>
                        <th>Paper Barcode</th>
                        
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $examdate=date("Y-m-d");
                        $count=1;
                        $sel_query="Select * from exammark where examdate='$examdate' AND examid='$exid'";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["secgroupname"]; ?></td>
                                <td><?php echo $row["roll"]; ?></td>
                                <!--Getting Student Name-->
                                <?php
                                require "interdb.php";
                                $suniqid=$row['suniqid'];
                                $count1=1;
                                $sel_query1="Select * from student where uniqid='$suniqid';";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) {?>
                                <td><?php echo $row1["name"]; ?></td>
                                <?php $count1++; } ?>


                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["examdate"]; ?></td>
                                <td><?php echo $row["fullmarks"]; ?></td>
                                <td><?php echo $row["barcode"]; ?></td>
                                
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