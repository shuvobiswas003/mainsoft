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
                                <h4 class="pull-left page-title">Lesson Add</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Lesson</h3>
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
    //getting chapter info
    $chapter=$_POST['chapter'];
    $chapterbr=explode(',', $chapter);
    $chapterno=$chapterbr[0];
    $chaptername;
    require "../interdb.php";
     $sel_query="SELECT * FROM chapter WHERE classnumber='$classnumber' AND secgroupname='$secgroupname' AND chapterno='$chapterno'";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
            $chaptername=$row['chaptername'];
            }

    //lession parametrer
    $lno=$_POST['lno'];
    $lname=$_POST['lname'];
    $lpis=$_POST['lpis'];
    $lpic=$_POST['lpic'];
    $lpit=$_POST['lpit'];
    
    $uni=$classnumber.$secgroupname.$subcode.$chapterno.$lno;

    //insert to database

        

        $sql ="INSERT INTO lesson(classnumber,secgroupname,subcode,subname,chapterno,chaptername,lno,lname,lpis,lpic,lpit,uni 
) VALUES ('$classnumber','$secgroupname','$subcode','$subname','$chapterno','$chaptername','$lno','$lname','$lpis','$lpic','$lpit','$uni') ON DUPLICATE KEY UPDATE chaptername='$chaptername',chapterno='$chapterno',lname='$lname',lpis='$lpis',lpic='$lpic',lpit='$lpit'";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Lesson Added/Edited</h1>.";
    } else{
       echo "<h3 style='color:red;'>Lesson Already Exists</h1>";
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
                    <label class="col-md-3 control-label" for="Cust-name">Chapter No</label>
                    <div class="col-md-9">
                        <input type="number" name="chapter" class="form-control" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Lesson No</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="lno" class="form-control" placeholder="Write Lesson Number" required="1">
                    </div>
                </div>
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Lesson  Name </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lname" class="form-control" placeholder="Write Lesson Name" required="1">
                    </div>
                </div>

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">PI For Square</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpis" class="form-control" placeholder="Write PI For Square" required="1">
                    </div>
                </div>

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Pi For Circle</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpic" class="form-control" placeholder="Write PI for Circle" required="1">
                    </div>
                </div>
            

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">PI For Triangle</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpit" class="form-control" placeholder="Write PI For Triangle" required="1">
                    </div>
                </div>
               
                <input type="submit" class="btn btn-primary" Value="Add PI">
            </form>
            <br>
            <br>
</div>
<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Lesson </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Chapter No</th>
                        <th>Chapter Name</th>
                        <th>Lesson No</th>
                        <th>Lesson Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `lesson` where classnumber='$classnumber' AND secgroupname='$secgroupname'ORDER BY classnumber ASC,chapterno ASC, lno ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["chapterno"]; ?></td>
                                
                                <td><?php echo $row["chaptername"]; ?></td>
                                <td><?php echo $row["lno"]; ?></td>
                                <td><?php echo $row["lname"]; ?></td>
                                <td>
                                    <a href="updatelesson.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroupname'];?>"><button type="button" class="btn btn-primary" >Edit</button> </a>

                                <a href="deletelesson.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row["classnumber"];?>&secgroupname=<?php echo $row['secgroupname'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Chapter?');">Delete</button> </a>


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