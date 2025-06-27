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
                                <div class="page-header">
                                    <h4 class="page-title">Grade Management</h4>
                                    <ol class="breadcrumb">
                                        <li><a href="#">Dashboard</a></li>
                                        <li class="active">Grades</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Add Grade Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-plus-circle"></i> Add New Grade</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                $gradename = $_POST['gradename'];
                                                $fullmark = $_POST['fullmark'];
                                                $gradecode = $_POST['gradecode'];
                                                require "interdb.php";
                                                $sql = "INSERT INTO gradename(gradename,fullmark,gradecode) VALUES ('$gradename','$fullmark','$gradecode')"; 
                                                
                                                if(mysqli_query($link, $sql)){
                                                    echo '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Success!</strong> Grade added successfully.
                                                          </div>';
                                                } else {
                                                    echo '<div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Error!</strong> Grade already exists or invalid data.
                                                          </div>';
                                                }
                                                mysqli_close($link);
                                            }
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="gradename">Grade Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="gradename" name="gradename" class="form-control" placeholder="e.g. First Grade, Second Grade" required>
                                                    <span class="help-block"><small>The name of the grade level</small></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="fullmark">Full Mark</label>
                                                <div class="col-md-10">
                                                    <input type="number" id="fullmark" name="fullmark" class="form-control" placeholder="e.g. 100" required>
                                                    <span class="help-block"><small>The maximum mark for this grade</small></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="gradecode">Grade Code</label>
                                                <div class="col-md-10">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">GR</span>
                                                        <input type="text" id="gradecode" name="gradecode" class="form-control" placeholder="001" required>
                                                    </div>
                                                    <span class="help-block"><small>Unique code for the grade (e.g. gr001)</small></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-offset-2 col-md-10">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        <i class="fa fa-save"></i> Add Grade
                                                    </button>
                                                    <button type="reset" class="btn btn-default waves-effect">
                                                        <i class="fa fa-refresh"></i> Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Grade List -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-color panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Grade List</h3>
                                        <div class="panel-options">
                                            <a href="#" data-toggle="panel">
                                                <span class="collapse-icon">&ndash;</span>
                                                <span class="expand-icon">+</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Grade Name</th>
                                                            <th>Full Mark</th>
                                                            <th>Grade Code</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            require "interdb.php";
                                                            $count = 1;
                                                            $sel_query = "SELECT * FROM `gradename` ORDER BY id ASC;";
                                                            $result = mysqli_query($link, $sel_query);
                                                            while($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $count; ?></td>
                                                                <td><?php echo htmlspecialchars($row["gradename"]); ?></td>
                                                                <td><?php echo htmlspecialchars($row["fullmark"]); ?></td>
                                                                <td><?php echo htmlspecialchars($row["gradecode"]); ?></td>
                                                                <td>
                                                                    <a href="delgradename.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Grade?');">
                                                                        <i class="fa fa-trash-o"></i> Delete
                                                                    </a>
                                                                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                                                        <i class="fa fa-pencil"></i> Edit
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            
                                                            <!-- Edit Modal (Placeholder - you'll need to implement the actual edit functionality) -->
                                                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="editModalLabel">Edit Grade</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="editgradename.php" method="POST">
                                                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                                                <div class="form-group">
                                                                                    <label>Grade Name</label>
                                                                                    <input type="text" name="gradename" class="form-control" value="<?php echo htmlspecialchars($row['gradename']); ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Full Mark</label>
                                                                                    <input type="number" name="fullmark" class="form-control" value="<?php echo htmlspecialchars($row['fullmark']); ?>" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Grade Code</label>
                                                                                    <input type="text" name="gradecode" class="form-control" value="<?php echo htmlspecialchars($row['gradecode']); ?>" required>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                            $count++;
                                                            } 
                                                            mysqli_close($link);
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div> <!-- container -->       
                </div> <!-- content -->
                
                <footer class="footer text-right">
                    &copy; <?php echo date('Y'); ?> - School Management System
                </footer>
                
            </div> <!-- content-page -->
<?php include'inc/footer.php'?>