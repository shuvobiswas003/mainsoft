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
                                <h4 class="pull-left page-title">Section/Group</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Section/Group</h3>
            </div>
            <div class="panel-body">
<?php
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $classname= $_POST['classname'];
        $classnumber= $_POST['classnumber'];
        $secgroupname=$_POST['secgroupname'];
        $uninumber=$classnumber.$secgroupname;
        require "interdb.php";
        $sql ="INSERT INTO sectiongroup(classname,classnumber,secgroupname,uninumber) VALUES ('$classname','$classnumber','$secgroupname','$uninumber') "; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Section/Group Added</h1>.";
    } else{
       echo "<h3 style='color:red;'>Section/Group Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <?php
             $classnumber=$_REQUEST['classnumber'];
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from class where classnumber='$classnumber';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                        
                        <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name"> Class Group/Section </label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="secgroupname" class="form-control" placeholder="Write Class Group/Sec" required="1" autofocus="autofocus">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Sec/Grroup">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h3 class="panel-title">View Section/Group </h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            

        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Class Number</th>
                        <th>Class Name</th>
                        <th>Section/Group Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="SELECT * FROM `sectiongroup` where classnumber='$classnumber'ORDER BY classnumber ASC;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["classname"]; ?></td>
                                <td><?php echo $row["secgroupname"]; ?></td>
                                <td>
                                <a href="deletesection.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row['classnumber'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Class?');">Delete</button> </a>
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
</div>
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>