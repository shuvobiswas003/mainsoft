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
                                <h4 class="pull-left page-title">Datatable</h4>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Student </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Roll</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Name</th>
                                        <td>Status</td>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            $classnumber=$_REQUEST['classnumber'];
                            $secgroupname=$_REQUEST['secgroupname'];
                            require "interdb.php";
                            $count=1;
                            $sel_query="SELECT * FROM student WHERE classnumber='$classnumber'AND secgroup='$secgroupname';";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["secgroup"]; ?></td>
                                <?php
                                require "interdb.php";
                                $uniqid=$row['uniqid'];
                                $count1=1;
                                $sel_query1="SELECT * FROM student WHERE uniqid='$uniqid';";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) {
                                ?>
                                <td>
                                    <?php echo $row1['name'];?>
                                </td>
                                <?php $count1++; } ?>

                                <td>
                                    <?php
$sql1="Select * from sturegstatus where uniqid='$uniqid';";

if ($result4=mysqli_query($link,$sql1))
  {
  $rowcount=mysqli_num_rows($result4);
  $status=$rowcount;
  if($status=='1'){
?>
<button type="button" class="btn btn-success">Complete</button>
<?php
  }else{
    ?>
<button type="button" class="btn btn-danger">Uncomplete</button>
<a href="sturegperun.php?uniqid=<?php echo $uniqid;?>&classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $secgroupname?>" target="_blank"><button type="button" class="btn btn-success">Add Reg</button> </a>
<?php
  }
  mysqli_free_result($result4);
  }
?>

                                </td>
                            <td class="actions">
                            
                            <a href="viewsinglestureg.php?uniqid=<?php echo $row['uniqid'];?>" target="_blank"><button type="button" class="btn btn-success">Details</button> </a>

                            <a href="sturegperun.php?uniqid=<?php echo $uniqid;?>&classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $secgroupname?>" class="btn btn-info">
                            <span class="glyphicon glyphicon-pencil"></span> EDIT 
                            </a>

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
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>