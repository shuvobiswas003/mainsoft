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
<h3 class="panel-title">View Exam Rouine</h3>
</div>
<!--main Part Avove Start-->
    <div class="panel-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <?php
            $classnumber=$_REQUEST['classnumber'];
            $secgroupname=$_REQUEST['secgroupname'];
            ?>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="classnumber" required="1">
                    <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option> 
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Group</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="secgroupname" required="1">
                    <
                    <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Chose a Customar" name="exid" required="1">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from exam;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" Value="View Routine">
        </form>
    </div>
 <!--main Part Avove END-->

 <!--Main Below Part Start-->
 <!--Data Table Start-->
 <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $exid=$_POST['exid'];
    $secgroupname=$_POST['secgroupname'];
?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Subject</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Group</th>
                        <th>Exam Date</th>
                        <th>Taken Status</th>
                        <th>Admit Card Align</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from examroutine where class='$classnumber' AND exid='$exid' AND cgroup='$secgroupname'";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["subname"]; ?></td>
                                <td><?php echo $row["subcode"]; ?></td>
                                <td><?php echo $row["cgroup"]; ?></td>
                                <td><?php echo $row["examdate"]; ?></td>

                                <td>
                                <?php
                                $status=$row["active"];
                                switch ($status) {
                                    case '1':
                                        echo "<span class='btn btn-primary'>To Take</span>";
                                        break;
                                    
                                    default:
                                        echo "<span class='btn btn-danger'>Not To Take</span>";
                                        break;
                                }
                                ?>
                                    
                                </td>

                                <td>
                                    <?php
                                    $align=$row['align'];
                                    switch ($align) {
                                        case 'l':
                                            echo "<button type='button' class='btn btn-primary'>Left</button>";
                                            break;
                                        
                                        default:
                                            echo "<button type='button' class='btn btn-primary'>Right</button>";
                                            break;
                                    }
                                    ?>

                                </td>
                                <td>
                                <a href="examroutinedel.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row['class'];?>&secgroupname=<?php echo $row['cgroup'];?>"><button type="button" class="btn btn-danger">Delete</button> </a>
                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
        <?php }?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--Data table END-->
 <!--Main Below Part END-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>