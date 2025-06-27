<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
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
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"><i class="fa fa-graduation-cap"></i> Class Management</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                                        <li class="breadcrumb-item active"><i class="fa fa-graduation-cap"></i> Classes</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Add Class Form and Stats -->
                        <div class="row">
                            <!-- Add Class Form -->
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-plus-circle"></i> Add New Class</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                                $classname = $_POST['classname'];
                                                $classnumber = $_POST['classnumber'];
                                                require "interdb.php";
                                                $sql = "INSERT INTO class(classname, classnumber) VALUES ('$classname','$classnumber')"; 
                                                
                                                if(mysqli_query($link, $sql)){
                                                    echo '<div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                                                            Class added successfully.
                                                        </div>';
                                                } else {
                                                    echo '<div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                                            Class already exists or invalid data.
                                                        </div>';
                                                }
                                                mysqli_close($link);
                                            }
                                        ?>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="classname" class="col-sm-3 control-label">Class Name</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                        <input type="text" id="classname" name="classname" class="form-control" placeholder="Enter Class Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="classnumber" class="col-sm-3 control-label">Class Number</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                                        <input type="number" id="classnumber" name="classnumber" class="form-control" placeholder="Enter class number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-plus-circle"></i> Add Class
                                                    </button>
                                                    <button type="reset" class="btn btn-default">
                                                        <i class="fa fa-undo"></i> Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Class List Table -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-list"></i> Class List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="bg-light">
                                                        <th class="text-center">#</th>
                                                        <th><i class="fa fa-hashtag"></i> Class Number</th>
                                                        <th><i class="fa fa-book"></i> Class Name</th>
                                                        <th class="text-center"><i class="fa fa-cogs"></i> Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require "interdb.php";
                                                        $count = 1;
                                                        $sel_query = "SELECT * FROM class ORDER BY classnumber ASC";
                                                        $result = mysqli_query($link, $sel_query);
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $count; ?></td>
                                                                <td><?php echo $row["classnumber"]; ?></td>
                                                                <td><strong><?php echo $row["classname"]; ?></strong></td>
                                                                <td class="text-center">
                                                                    <a href="deleteclass.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Class?');">
                                                                        <i class="fa fa-trash"></i> Delete
                                                                    </a>
                                                                    
                                                                </td>
                                                            </tr>
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

                    </div> <!-- container-fluid -->       
                </div> <!-- content -->

<?php include'inc/footer.php'?>