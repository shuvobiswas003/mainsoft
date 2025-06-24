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
                                <h4 class="pull-left page-title">Chapter Add</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Chapter</h3>
            </div>
            <div class="panel-body">
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    //gettting sub code and name
    $subjectnamecode=$_POST['subjectnamecode'];
    $subjectnamecodebr=explode(',', $subjectnamecode);

    $subcode=$subjectnamecodebr[0];
    $subname=$subjectnamecodebr[1];

    $chapterno=$_POST['chapterno'];
    $chaptername=$_POST['chaptername'];
    
    $uni=$classnumber.$secgroupname.$subcode.$chapterno;

    //insert to database

        require "../interdb.php";

        $sql ="INSERT INTO chapter(`classnumber`, `secgroupname`, `subcode`, `subname`, `chapterno`, `chaptername`, `chapteruniid`) VALUES ('$classnumber','$secgroupname','$subcode','$subname','$chapterno','$chaptername','$uni') ON DUPLICATE KEY UPDATE chaptername='$chaptername',chapterno='$chapterno'";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Chapter Added/Edited</h1>.";
    } else{
       echo "<h3 style='color:red;'>Chapter Already Exists</h1>";
    }
    //update Chapter
    $sql2="UPDATE lesson SET chapterno='$chapterno',chaptername='$chaptername' WHERE chapterno='$chapterno'";
    if(mysqli_query($link, $sql2)){
        echo "<h3 style='color:green;'>Lesson Updated</h1>.";
    } else{
       echo "<h3 style='color:red;'>No Lesson Add to this Chapter</h1>";
    }

    
}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                        <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Group/Section</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="subjectnamecode" required="1">
                        <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from subject where classnumber='$classnumber' AND secgroup='$secgroupname';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['subcode']?>,<?php echo $row['subname']?>"><?php echo $row['subname']?>(<?php echo $row['subcode']?>)</option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Chapter No </label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="chapterno" class="form-control" placeholder="Write Chapter Number" required="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Chaper Name </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="chaptername" class="form-control" placeholder="Write Chapter Name" required="1">
                    </div>
                </div>
            </div>
               
                <input type="submit" class="btn btn-primary" Value="Add Chapter">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Chapter </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Class Number</th>
                        <th>Section/Group Name</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Chapter No</th>
                        <th>Chapter Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `chapter` where classnumber='$classnumber' AND secgroupname='$secgroupname'ORDER BY classnumber ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                
                                <td><?php echo $row["secgroupname"]; ?></td>
                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["chapterno"]; ?></td>
                                <td><?php echo $row["chaptername"]; ?></td>
                                <td>
                                <a href="deletechapter.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroupname'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Chapter?');">Delete</button> </a>
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
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>