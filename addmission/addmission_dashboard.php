<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
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
                                        <h3 class="panel-title">View Admission Form </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Group</th>
                                        <th>Roll</th>
                                        <th>Name</th>
                                        <td>Date</td>
                                        <th>SSC Roll</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            require "../interdb.php";
                            $count=1;
                            $sel_query="Select * from addmission_ssc_student";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["section"]; ?></td>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["add_date"]; ?></td>
                                <td><?php echo $row["ssc_roll"]; ?></td>
                                
                            <td class="actions">
                           
                            
                            <a href="print_add_form.php?id=<?php echo $row['id'];?>&stuid=<?php echo $row["stuid"]?>" target="_blank"><button type="button" class="btn btn-success">Print</button> </a>
                            
                             
                            
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