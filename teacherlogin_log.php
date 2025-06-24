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
                <h3 class="panel-title">Login Log</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->
<table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User_name</th>
                        <th>Teacher Name</th>
                        <th>Time</th>
                        <th>Login IP</th>
                        <th>Details</th>
                    </tr>
                </thead>

                             
            <tbody>
            <?php
            require "interdb.php";
            $count=1;
            $sel_query="Select * from a_teacherlogin_logs ORDER BY id DESC LIMIT 200 ;";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td>
                    <?php
$username=$row['username'];
$sel_query2="Select * from teacherlogin where username='$username';";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
echo $row2['name'];
}
?>
                </td>
                <td><?php echo $row["time"]; ?></td>
                <td><?php echo $row["ip"]; ?></td>
                <td><?php echo $row["reason"]; ?></td>
            
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