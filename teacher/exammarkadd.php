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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Exam Mark Entry</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $tid=$_SESSION["id"];
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
                    require "../interdb.php";
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
                    require "../interdb.php";
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
                    require "../interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subjectteacher WHERE tid='$tid' AND classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subcode']?>">
                        <?php
                    $subcode=$row['subcode'];
                    $count2=1;
                    $sel_query2="SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode='$subcode';";
                    $result2 = mysqli_query($link,$sel_query2);
                    while($row2 = mysqli_fetch_assoc($result2)) {
                    echo $row2['subname'];
                    ?>
                    <?php $count2++; } ?>   
                    </option>
                    <?php $count++; } ?>  
                    </select>
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
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
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
    <br>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
            <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
            </select>
        </div>
    </div>
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
                    //getting student data
                    $count1=1;
                    $sel_query1="SELECT * from student where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                    $uniqid=$row1['uniqid'];
                    //cheaking reg data
                    $count=1;
                    $sel_query="SELECT * FROM sturegsubject WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND uniqid='$uniqid' AND subcode='$subcode' AND (substatus=1 OR substatus=4) ";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                        <select name="roll[]" id="" class="form-control">
                            <option value="<?php echo $row['roll'];?>"><?php echo $row['roll'];?></option>
                        </select>
                        </td>
                        <td>
                        <?php
                        
                        ?>
                        <select name="name[]" id="" class="form-control">
                            <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
                        </select>
                        
                        </td>
                        <td>
                        <select name="suniqid[]" id="" class="form-control">
                            <option value="<?php echo $row['uniqid'];?>"><?php echo $row['uniqid'];?></option>
                        </select>
                        </td>
                        <td>
                            <input type="number" name="cq[]" class="form-control" maxlength="2" oninput="moveToNextInput(this, 2)" autofocus="autofocus"  required="1" max="100" min="0"
<?php
$examuni=$uniqid.$examid.$subcode;
$count2=1;
$sel_query2="SELECT * from exammark where examuni='$examuni'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['cq'];
if(!empty($des)){?>
    value="<?php echo $des;?>"
<?php
}else{
    ?>
    value="0"
<?php
}
$count1++; }
?>
        min="0">
                        </td>
                        <td>
                            <input type="number" name="mcq[]" class="form-control" maxlength="2" oninput="moveToNextInput(this, 2)" required="1"  min="0" max="100"
<?php
$examuni=$uniqid.$examid.$subcode;
$count2=1;
$sel_query2="SELECT * from exammark where examuni='$examuni'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['mcq'];
if(!empty($des)){?>
    value="<?php echo $des;?>"
<?php
}else{
    ?>
    value="0"
<?php
}
$count1++; }
?>
                            >
                        </td>
                        <td>
                            <input type="number" name="practical[]" class="form-control" maxlength="2" oninput="moveToNextInput(this, 2)"required="1"  min="0" max="100"
<?php
$examuni=$uniqid.$examid.$subcode;
$count2=1;
$sel_query2="SELECT * from exammark where examuni='$examuni'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['practical'];
if(!empty($des)){?>
    value="<?php echo $des;?>"
<?php
}else{
    ?>
    value="0"
<?php
}
$count1++; }
?>
                            >
                        </td>
                        
                    </tr>
                    <?php $count++; } ?>
                    <?php $count1++; }?>
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