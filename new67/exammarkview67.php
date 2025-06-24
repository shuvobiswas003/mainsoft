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
<h3 class="panel-title">Exam Mark View</h3>
</div>
<!--1st Form Start-->
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
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from exam67 where exid='$examid';";
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
                <label class="col-md-3 control-label" for="Cust-name">Select Section</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="subcode" required="1" id="country">
                    <option value="">Select Subject</option>
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Chapter And Lesson</label>
                <div class="col-md-9">
                    <select class="form-control" name="chapterlesson" id="state">
                    <option value="">Select Subject First</option>
                    </select>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Start PI Entry">
        </form>
    </div>
 <!--1st Form End-->
 <!--1st Form End-->

 <!--2nd Form Part Start-->

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
$chapterlesson=$_POST['chapterlesson'];
//getting chapter lesson  info
    $chapterlessonbr=explode(',', $chapterlesson);
    $chapterno=$chapterlessonbr[0];
    $lessonno=$chapterlessonbr[1];
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Mark </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Section/Group</th>
                        <th>Subject Code</th>
                        <th>Chapter No</th>
                        <th>Lesson NO</th>
                        <th>PI</th>
                       
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `exammark67` where classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' AND examid='$examid' AND chapterno='$chapterno'AND lno='$lessonno'";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {
                            $stuid=$row["stuid"];
                            ?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["secgroupname"]; ?></td>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["chapterno"]; ?></td>
                                <td><?php echo $row["lno"]; ?></td>
                                <td>
                                    <?php
$uni=$examid.$subcode.$chapterno.$lessonno.$stuid;
$pi=$row['pi'];
//cheaking Square;
$cpi=3;
if($cpi==$pi){
    echo "<img src='../img/markicon/sf.png' style='width:20px;height=20px;float:left;paddingleft:2px;'>";
}else{
    echo "<img src='../img/markicon/sb.png' style='width:20px;height=20px;float:left;paddingleft:2px;'>";
}
//cheaking Circle;
$cpi=2;
if($cpi==$pi){
    echo "<img src='../img/markicon/cf.png' style='width:20px;height=20px;float:left;margin-left:2px;'>";
}else{
    echo "<img src='../img/markicon/cb.png' style='width:20px;height=20px;float:left;margin-left:2px;'>";
}
//cheaking Circle;
$cpi=1;
if($cpi==$pi){
    echo "<img src='../img/markicon/tf.png' style='width:20px;height=20px;float:left;margin-left:2px;'>";
}else{
    echo "<img src='../img/markicon/tb.png' style='width:20px;height=20px;float:left;margin-left:2px;'>";
}

                                    ?>
                                </td>
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

                  
    <?php } ?>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>s