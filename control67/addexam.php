<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
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
                                <h4 class="pull-left page-title">Subject </h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Subject</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $exname= $_POST['exname'];
        $year= $_POST['year'];
        $exdate=$_POST['exdate'];
        $nexdate=date("Y-m-d", strtotime($exdate));
        
require "../interdb.php";
$sql ="INSERT INTO exam67(examname,year,startdate) VALUES ('$exname','$year','$nexdate') "; 
if(mysqli_query($link, $sql)){
echo "Exam Add Successfully.";
} else{
echo "<span style='color:red;'>EXAM Already Added</span>";
}
mysqli_close($link);

}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="exname" class="form-control" placeholder="Enter Exam Name" required="1">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Year</label>
        <div class="col-md-9">
            <input type="number" id="Cust-name" name="year" class="form-control" placeholder="Enter Exam Year" required="1">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Exam Start Date</label>
        <div class="col-md-9">
            <input type="date" id="Cust-name" name="exdate" class="form-control" placeholder="Enter Start Date" required="1">
        </div>
    </div>

    

    <input type="submit" class="btn btn-primary" Value="Add Exam">
</form>
        </div>
        </div>
<h1><i class="fa fa-triangle"></i></h1>
<table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Exam Name</th>
                        <th>Year</th>
                        <th>Startdate</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from exam67";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["exid"]; ?></td>
                                <td><?php echo $row["examname"]; ?></td>
                                <td><?php echo $row["year"]; ?></td>
                                <td><?php echo $row["startdate"]; ?></td>
                                <td>
                                    <a href="deleteexam.php?id=<?php echo $row['exid'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Exam?');">Delete</button> </a>
                                </td>
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
    </div>
</div>

</div> <!-- End Row -->
</div> <!-- container -->
</div> <!-- content -->
<?php include'inc/footer.php'?>