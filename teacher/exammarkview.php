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
            
            <input type="submit" class="btn btn-primary" Value="View Mark">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$examid=$_POST['examid'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$subcode=$_POST['subcode'];
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
            <center>
                 <h3>Class:<?php echo $classnumber;?> </h3>
                 <h3>Section:<?php echo $secgroupname;?> </h3>
                <h3>Subject Code:<?php echo $subcode;?> </h3>
                <h3>Subject Name:
                    <?php 
                    require "../interdb.php";
                    $sub_quary="SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode='$subcode'";
                    $sub_result=mysqli_query($link,$sub_quary);
                     while($row1 = mysqli_fetch_assoc($sub_result)) {
                         echo $row1['subname'];
                     }
                    ?>
                </h3>
            </center>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>CQ</th>
                        <th>CQ <br> (Converted)</th>
                        <th>CA</th>
                        <th>Total</th>
                        <th>Lettergrade</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>


                <tbody>
                    <?php
                        
                        $count=1;
                        $sel_query="SELECT * FROM `exammark` where classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' AND examid='$examid' ORDER BY roll ASC";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {
                        $sturoll=$row["roll"];
                        ?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                
                                <td>
                                    <?php 
                                    require "../interdb.php";
                                    $sub_quary="SELECT * FROM student WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND roll='$sturoll'";
                                    $sub_result=mysqli_query($link,$sub_quary);
                                     while($row1 = mysqli_fetch_assoc($sub_result)) {
                                         echo $row1['name'];
                                     }
                                    ?>
                                </td>
                                <td><?php echo $row["cq"]; ?></td>
                                <td><?php echo $row["mcq"]; ?></td>
                                <td><?php echo $row["practical"]; ?></td>
                                <td><?php echo $row["total"]; ?></td>
                                <td><?php echo $row["lettergrade"]; ?></td>
                                <td>
                                    <?php 
                                     $dirtrans = ""; // Initialize the variable

                                    // Check if $classnumber is set and is a valid number
                                    if (isset($classnumber) && is_numeric($classnumber)) {
                                        // Assign $dirtrans based on the value of $classnumber
                                        if ($classnumber >= -2 && $classnumber <= 5) {
                                            $dirtrans = "mobilemarkedit_primary.php";
                                           
                                        } elseif ($classnumber >= 6 && $classnumber <= 9) {
                                            $dirtrans = "mobilemarkedit_6t9.php";
                                            
                                        } else {
                                            $dirtrans = "#";
                                        }
                                    } else {
                                        echo "Invalid or undefined classnumber.";
                                    }
                                    
                                    ?>
                                    <a href="<?php echo $dirtrans;?>?id=<?php echo $row['id'];?>" target="_blank"><button type="button" class="btn btn-primary">Edit</button> </a>
                                    
                                     <a href="delete_exam_mark.php?id=<?php echo $row['id'];?>" target="_blank"><button type="button" class="btn btn-danger">Delete</button> </a>
                                    
                                </td>
                                
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
            <a href="export_mark_pdf.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $secgroupname?>&examid=<?php echo $examid?>&subcode=<?php echo $subcode?>" class="btn btn-primary">
                   DOWNLOAD PDF (<?php echo $subcode;?>)
                </a>
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