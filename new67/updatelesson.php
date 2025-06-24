<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher') {
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
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatable</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Lesson</h3>
                        </div>

                        <?php
                        require '../interdb.php';
                        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

                        if ($id !== null) {
                            $query = "SELECT * from lesson where id='" . $id . "'";
                            $result = mysqli_query($link, $query) or die(mysqli_error());
                            $row = mysqli_fetch_assoc($result);
                           
                        }
                        ?>

                        <div class="panel-body">
                            <?php
                            $status = "";
                            if (isset($_POST['new']) && $_POST['new'] == 1) {
                                $id = $_POST['id'];
                                $classnumber = $_POST['classnumber'];
                                $secgroupname = $_POST['secgroupname'];
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

   $sql = "UPDATE lesson SET 
                                    subcode = '$subcode',
                                    subname = '$subname',
                                    chapterno = '$chapterno',
                                    chaptername = '$chaptername',
                                    lname = '$lname',
                                    lpis = '$lpis',
                                    lpic = '$lpic',
                                    lpit = '$lpit',
                                    uni = '$uni'
                                    WHERE id = '$id'";

                                if (mysqli_query($link, $sql)) {
                                    echo "<h2 style='color:green'>Student Update Successfully<h2>";
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                }
                                echo "<h4> Student update Successfully <a href='addlesson.php?classnumber=" . $classnumber . "&secgroupname=" . $secgroupname . "'>View Lesson</a></h4>";
                            } else {
?>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                        
                        <option value="<?php echo $row['classnumber'];?>"><?php echo $row['classnumber'];?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Group/Section</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                        <option value="<?php echo $row['secgroupname'];?>"><?php echo $row['secgroupname'];?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="subjectnamecode" required="1">
                        <?php
                        $classnumber=$row['classnumber'];
                        $secgroupname=$row['secgroupname'];
                        $subcode=$row['subcode'];
                        require "../interdb.php";
                        $count2=1;
                        $sel_query1="Select * from subject where classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode='$subcode';";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                        <option value="<?php echo $row1['subcode']?>,<?php echo $row1['subname']?>"><?php echo $row1['subname']?>(<?php echo $row1['subcode']?>)</option>
                        <?php $count2++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Chapter No</label>
                    <div class="col-md-9">
                        <input type="number" name="chapter" class="form-control"  value="<?php echo $row['chapterno']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Lesson No</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="lno" class="form-control" value="<?php echo $row['lno']?>" required="1">
                    </div>
                </div>
            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Lesson  Name </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lname" class="form-control" value="<?php echo $row['lname']?>" required="1" autofocus="autofocus">
                    </div>
                </div>

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">PI For Square</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpis" class="form-control" value="<?php echo $row['lpis']?>" required="1">
                    </div>
                </div>

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Pi For Circle</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpic" class="form-control" value="<?php echo $row['lpic']?>" required="1">
                    </div>
                </div>
            

            <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">PI For Triangle</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="lpit" class="form-control" value="<?php echo $row['lpit']?>" required="1">
                    </div>
                </div>
               
                <input type="submit" class="btn btn-primary" Value="Add PI">
             </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- End Row -->
    </div> <!-- container -->
</div> <!-- content -->
<?php include 'inc/footer.php'?>