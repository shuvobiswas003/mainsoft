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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Exam Mark Entry By Scan</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $examid=$_REQUEST['examid'];
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Exam ID</label>
                    <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam where exid='$examid';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?>
                    </select>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM examroutine WHERE exid='$examid' AND class='$classnumber' AND cgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Paste Mark</label>
                    <div class="col-md-7">
                        <textarea name="scanmark" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
            </div>
            <input type="submit" class="btn btn-primary" Value="Start Mark Entry">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$subcode=$_POST['subcode'];
$secgroupname=$_POST['secgroupname'];
$scanmark=$_POST['scanmark'];
?>
<form action="addmarkentrydata.php" method="POST">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Exam ID</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="examid" required="1">
            <option value="<?php echo $examid;?>"><?php echo $examid;?></option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
            <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
            <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
            </select>
        </div>
    </div>
    <br>
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Subject Code</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
            <option value="<?php echo $subcode;?>"><?php echo $subcode;?></option>
            </select>
        </div>
    </div>
    <br>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subname" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subname']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject Full Marks</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subfullmarks" required="1">
                    <?php
                    require "interdb.php";
                    $subjectfullmark;
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $subjectfullmark=$row['subfullmarks'];
                        ?>
                    <option value="<?php echo $row['subfullmarks']?>"><?php echo $row['subfullmarks']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Grade Code</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="gradecode" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE subcode='$subcode' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['gradecode']?>"><?php echo $row['gradecode']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
   
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <center>
        <h3>Enter The Mark</h3>
        </center>
<?php
$colarr = explode("\n", $scanmark);
$sizeofcol=count($colarr);
for($x = 0; $x<$sizeofcol; $x++){
    echo "Row".$x." ".$colarr[$x];
    echo "<br>";
}
?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>St ID</th>
                    <th>CQ</th>
                    <th>MCQ</th>
                    <th>Practical</th>
                </tr>
            </thead>


<tbody>
<?php
$rowarr = explode("\n", $scanmark);
$sizeofrow=count($rowarr);
for($x = 0; $x<$sizeofrow; $x++){
    //explodeing row
    $colraw=$rowarr[$x];
    $colarr = explode(",", $colraw);

    $roll=$colarr[0];
    $roll=str_replace(" ","",$roll);
    $roll=trim($roll);

    $cq=$colarr[1];
    $cq=str_replace(" ","",$cq);
    $cq=trim($cq);

    $mcq=$colarr[2];
    if(empty($mcq)){
        $mcq=0;
    }else{
    $mcq=str_replace(" ","",$mcq);
    $mcq=trim($mcq);
    }

    $pract=$colarr[3];
    if(empty($pract)){
        $pract=0;
    }else{
    $pract=str_replace(" ","",$pract);
    $pract=trim($pract);
    }

    $uniqid=$classnumber.$secgroupname.$roll;

//cheaking reg data
                    $count=1;
                    $sel_query="SELECT * FROM sturegsubject WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND uniqid='$uniqid' AND subcode='$subcode' AND (substatus=1 OR substatus=4) ";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {  
                    $uniqid=$row['uniqid'];
                    if(!empty($uniqid)){

                    ?>
                    <tr>
                        <td>
                        <select name="roll[]" id="" class="form-control">
                            <option value="<?php echo $roll;?>"><?php echo $roll;?></option>
                        </select>
                        </td>
                        <td>
                    
                        <select name="name[]" id="" class="form-control">
                            <?php
                            $uniqid=$classnumber.$secgroupname.$roll;
                            $count2=1;
                            $sel_query2="SELECT * from student where uniqid='$uniqid'";
                            $result2 = mysqli_query($link,$sel_query2);
                            while($row2 = mysqli_fetch_assoc($result2)) {
                            $des=$row2['name'];
                            if(!empty($des)){?>
                                <option value="<?php echo $des;?>"><?php echo $des;?></option>
                            <?php
                            }
                            $count1++; }
                            ?>
                        </select>
                        
                        </td>
                        <td>
                        <select name="suniqid[]" id="" class="form-control">
                            <option value="<?php echo $uniqid;?>"><?php echo $uniqid;?></option>
                        </select>
                        </td>
                        <td>
                            <input type="number" name="cq[]" class="form-control" autofocus="autofocus"  required="1" value="<?php echo $cq;?>">
                        </td>
                        <td>
                            <input type="number" name="mcq[]" value="<?php echo $mcq;?>" class="form-control"  required="1"
                            >
                        </td>
                        <td>
                            <input type="number" name="practical[]" class="form-control" required="1" value="<?php echo $pract;?>" 
                            >
                        </td>
                        
                    </tr>
                    <?php }?>
                    <?php $count++; } ?>
<?php
}
?>
</tbody>


</table>
    </div>
</div>






        
    <input type="submit" value="Process Mark" class="btn btn-primary">
</form>                              
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>s