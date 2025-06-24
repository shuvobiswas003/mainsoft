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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">View Accountant </h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->

<table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from accountuser";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td>
                                    <b>
                                        <?php echo $row["username"]; ?>
                                    </b>
                                </td>
                                <td>
                                <a href="accountpasswordchange.php?username=<?php echo $row['username'];?>">
                                    <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to Change Password ?');">
                                        Change Password
                                    </button> 
                                </a>
                                <a href="accounttantdelete.php?id=<?php echo $row['id'];?>">
                                    <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this User?');">
                                        Delete
                                    </button> 
                                </a>

                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>

<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>