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
                                        <h3 class="panel-title">View TESTIMONIAL </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Passing Year</th>
                                        <th>Roll</th>
                                        <th>Regestration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            require "../interdb.php";
                            $count=1;
                            $sel_query="Select * from testimonials";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["studentName"]; ?></td>
                                <td><?php echo $row["passingYear"]; ?></td>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["registration"]; ?></td>
                                
                            <td class="actions">
                           
                            
                            <a href="printtesti.php?roll=<?php echo $row['roll'];?>&passingYear=<?php echo $row["passingYear"]?>" target="_blank"><button type="button" class="btn btn-success">Print</button> </a>
                            
                             <a href="printtestivoc.php?roll=<?php echo $row['roll'];?>&passingYear=<?php echo $row["passingYear"]?>" target="_blank"><button type="button" class="btn btn-success">Print Voc</button> </a>
                            
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