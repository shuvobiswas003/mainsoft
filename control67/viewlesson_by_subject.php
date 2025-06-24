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
                                <h4 class="pull-left page-title">View Lesson</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Payment Report</h3>
            </div>
            <div class="panel-body">
                <?php
                $classnumber=$_REQUEST['classnumber'];
                $secgroupname=$_REQUEST['secgroupname'];
                ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
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
                    <label class="col-md-3 control-label" for="Cust-name">Select Section/Group</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        
                        <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                        
                        </select>
                    </div>
                </div>
                
               <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="subcode" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from subject where classnumber='$classnumber' AND secgroup='$secgroupname';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?>(<?php echo $row['subcode']?>)</option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="View Lesson">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Lesson</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //geting variable
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    $subcode=$_POST['subcode'];
?>
<table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Chapter No</th>
                        <th>Chapter Name</th>
                        <th>Lesson No</th>
                        <th>Lesson Name</th>
                        <th>PI</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `lesson` where classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode'ORDER BY classnumber ASC,chapterno ASC, lno ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["chapterno"]; ?></td>
                                
                                <td><?php echo $row["chaptername"]; ?></td>
                                <td><?php echo $row["lno"]; ?></td>
                                <td><?php echo $row["lname"]; ?></td>
                                <td><?php echo $row["classnumber"]; ?>.<?php echo $row["chapterno"]; ?>.<?php echo $row["lno"]; ?></td>
                                <td>
    <a href="updatelesson.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroupname'];?>" target="_blank"><button type="button" class="btn btn-primary" >Edit</button> </a>

                                <a href="deletelesson.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroupname'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Chapter?');">Delete</button> </a>


                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
            
<?php
}
?>
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