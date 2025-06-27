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
                                <h4 class="pull-left page-title">Dashboard</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="border:none; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <div class="panel-heading" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; border-radius: 8px 8px 0 0;">
                <h3 class="panel-title" style="font-weight: 300; letter-spacing: 0.5px;">School Management System</h3>
            </div>
<div class="panel-body" style="background-color: #f8f9fa; border-radius: 0 0 8px 8px;">
<!--Main View Part Start-->


<div class="row">
   <!-- Student Admission Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 120, 212, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f5fbff 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #0078d4 0%, #004e8c 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-user-plus" style="margin-right: 8px;"></i> Student Admission
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="panel-group" id="admissionAccordion" style="margin-bottom: 0;">
                <?php
                require "interdb.php";
                $sel_query = "Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                    <div class="panel-heading" style="background-color: #f5f5f5; padding: 0; border-bottom: 1px solid #e1e1e1;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#admissionClass<?php echo $row['classnumber']; ?>" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                <i class="fa fa-graduation-cap" style="color: #0078d4; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                            </a>
                        </h4>
                    </div>
                    <div id="admissionClass<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                        <div class="panel-body" style="padding: 0;">
                            <div class="list-group" style="margin-bottom: 0;">
                                <?php
                                $classnumber = $row['classnumber'];
                                $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                <a href="studentaddmission.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                    <i class="fa fa-users" style="color: #004e8c; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Student Promotion Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(106, 90, 205, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f9f8ff 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #6a5acd 0%, #483d8b 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-level-up" style="margin-right: 8px;"></i> Student Promotion
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="panel-group" id="promotionAccordion" style="margin-bottom: 0;">
                <?php
                require "interdb.php";
                $sel_query = "Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                    <div class="panel-heading" style="background-color: #f5f5f5; padding: 0; border-bottom: 1px solid #e1e1e1;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#promotionClass<?php echo $row['classnumber']; ?>" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                <i class="fa fa-graduation-cap" style="color: #6a5acd; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                            </a>
                        </h4>
                    </div>
                    <div id="promotionClass<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                        <div class="panel-body" style="padding: 0;">
                            <div class="list-group" style="margin-bottom: 0;">
                                <?php
                                $classnumber = $row['classnumber'];
                                $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                <a href="studentdashboard_2024.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                    <i class="fa fa-users" style="color: #483d8b; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Student Information Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(75, 192, 192, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f5fffd 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #4bc0c0 0%, #2d8c8c 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-info-circle" style="margin-right: 8px;"></i> Student Information
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="list-group" style="margin-bottom: 0;">
                <?php
                require "interdb.php";
                $sel_query = "Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                <a href="studentdashboard.php?classnumber=<?php echo $row['classnumber']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                    <i class="fa fa-graduation-cap" style="color: #4bc0c0; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
<!-- Student Details Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(255, 159, 64, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #fffbf5 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #ffa040 0%, #ff8000 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-id-card" style="margin-right: 8px;"></i> Student Details
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="list-group" style="margin-bottom: 0;">
                <?php
                require "interdb.php";
                $sel_query = "Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                <a href="studentdetailsdash.php?classnumber=<?php echo $row['classnumber']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                    <i class="fa fa-graduation-cap" style="color: #ff8000; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Student Details (Bangla) Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(54, 162, 235, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f5f9ff 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #36a2eb 0%, #1e78c1 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-id-card-o" style="margin-right: 8px;"></i> Student Details (Bangla)
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="list-group" style="margin-bottom: 0;">
                <?php
                require "interdb.php";
                $sel_query = "Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                <a href="studentdetailsdashbangla.php?classnumber=<?php echo $row['classnumber']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                    <i class="fa fa-graduation-cap" style="color: #36a2eb; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Student Details (Bangla) Panel -->
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(54, 162, 235, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f5f9ff 100%);">
        <div class="panel-heading" style="background: linear-gradient(135deg, #36a2eb 0%, #1e78c1 100%); color: white; padding: 15px 20px; border-bottom: none;">
            <h3 class="panel-title" style="font-weight: 400;">
                <i class="fa fa-id-card-o" style="margin-right: 8px;"></i> Student Bulk Option
                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
            </h3>
        </div>
        <div class="panel-body" style="padding: 0;">
            <div class="list-group" style="margin-bottom: 0;">
                
                <a href="bulk_student_entry.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                    <i class="fa fa-graduation-cap" style="color: #36a2eb; margin-right: 10px;"></i> Studnt Bulk Entry
                </a>
               
            </div>
        </div>
    </div>
</div>



</div>


<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>
