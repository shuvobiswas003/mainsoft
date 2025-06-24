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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">PI Tabulation</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        
        ?>
        <form action="dowlnload_lesson_for_csv_allsec.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data" target="_blank">
            

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section</label>
                <div class="col-md-9">
                   <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="SELECT DISTINCT secgroupname 
              FROM sectiongroup 
              WHERE secgroupname NOT IN ('Science', 'Commerce', 'Arts') 
              ORDER BY secgroupname ASC;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
           
            <input type="submit" class="btn btn-primary" Value="Download Lesson">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->

 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>s