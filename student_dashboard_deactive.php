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
                                        <th>Student ID</th>
                                        <th>Group</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            $classnumber=$_REQUEST['classnumber'];
                            require "interdb.php";
                            $count=1;
                            $sel_query="Select * from student_deactive where classnumber=$classnumber;";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["uniqid"]; ?></td>
                                <td><?php echo $row["secgroup"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["sex"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["mobile"]; ?></td>
                            <td class="actions">
                            
                            
                            <a href="student_active.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row['classnumber'];?>&uniqid=<?php echo $row['uniqid'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to Active this item?');">Active</button> </a>
                            
                           
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