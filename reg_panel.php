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
                            <!-- Main View Part Start -->

                            <div class="row">
                                <!-- RFID Attendance Panel -->
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(101, 148, 255, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f8faff 100%);">
                                        <div class="panel-heading" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 20px; border-bottom: none;">
                                            <h3 class="panel-title" style="font-weight: 400;">
                                                <i class="fa fa-calendar-check-o" style="margin-right: 8px;"></i> Student Attendance
                                                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                                            </h3>
                                        </div>
                                        <div class="panel-body" style="padding: 0;">
                                            <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                                                <a href="uploadattexcel.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-upload" style="color: #667eea; margin-right: 10px;"></i> Upload CSV File
                                                </a>
                                                <a href="holydaybulk.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-calendar-times-o" style="color: #667eea; margin-right: 10px;"></i> Add Public Holiday
                                                </a>
                                                <a href="holydaypersonal.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-user-times" style="color: #667eea; margin-right: 10px;"></i> Personal Leave
                                                </a>
                                                <a href="viewstuattdancedaily.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-eye" style="color: #667eea; margin-right: 10px;"></i> View Attendance (Daily)
                                                </a>
                                                <a href="viewstuattdancemonthly.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-eye" style="color: #667eea; margin-right: 10px;"></i> View Attendance (Monthly)
                                                </a>
                                                <a href="takeattdence.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-check-square-o" style="color: #667eea; margin-right: 10px;"></i> Take Attendance
                                                </a>
                                                
                                                <!-- Assign RFID Section -->
                                                <div class="panel-group" id="rfidAccordion" style="margin-bottom: 0;">
                                                    <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                        <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#rfidAccordion" href="#rfidCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                                    <i class="fa fa-id-card" style="color: #764ba2; margin-right: 10px;"></i> Assign RFID
                                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="rfidCollapse" class="panel-collapse collapse">
                                                            <div class="panel-body" style="padding: 0;">
                                                                <div class="list-group" style="margin-bottom: 0;">
                                                                    <?php
                                                                    require "interdb.php";
                                                                    $sel_query1 = "Select * from class ORDER BY classnumber";
                                                                    $result1 = mysqli_query($link,$sel_query1);
                                                                    while($row1 = mysqli_fetch_assoc($result1)) {
                                                                    ?>
                                                                    <div class="panel-group" id="classAccordion<?php echo $row1['classnumber']; ?>" style="margin-bottom: 0;">
                                                                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 0;">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse" data-parent="#classAccordion<?php echo $row1['classnumber']; ?>" href="#classCollapse<?php echo $row1['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                        <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row1['classname']; ?>
                                                                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="classCollapse<?php echo $row1['classnumber']; ?>" class="panel-collapse collapse">
                                                                                <div class="panel-body" style="padding: 0;">
                                                                                    <div class="list-group" style="margin-bottom: 0;">
                                                                                        <?php
                                                                                        $classnumber = $row1['classnumber'];
                                                                                        $sel_query2 = "Select * from sectiongroup WHERE classnumber='$classnumber'";
                                                                                        $result2 = mysqli_query($link,$sel_query2);
                                                                                        while($row2 = mysqli_fetch_assoc($result2)) {
                                                                                        ?>
                                                                                        <a href="assignrfid.php?classnumber=<?php echo $row1['classnumber']; ?>&secgroupname=<?php echo $row2['secgroupname']; ?>" target="_blank" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                            <i class="fa fa-circle-o" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row2['secgroupname']; ?>
                                                                                        </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SMS Panel -->
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(101, 148, 255, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f8faff 100%);">
                                        <div class="panel-heading" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 20px; border-bottom: none;">
                                            <h3 class="panel-title" style="font-weight: 400;">
                                                <i class="fa fa-comments" style="margin-right: 8px;"></i> SMS Panel
                                                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                                            </h3>
                                        </div>
                                        <div class="panel-body" style="padding: 0;">
                                            <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                                                <a href="sms_single.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-send" style="color: #667eea; margin-right: 10px;"></i> Send SMS
                                                </a>
                                                <a href="sms_class.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-users" style="color: #667eea; margin-right: 10px;"></i> Send SMS (Class)
                                                </a>
                                                <a href="sms_section.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-group" style="color: #667eea; margin-right: 10px;"></i> Send SMS (Section)
                                                </a>
                                                <a href="sms_result.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-graduation-cap" style="color: #667eea; margin-right: 10px;"></i> Send Result SMS (Class)
                                                </a>
                                                <a href="remainsmsdash.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                    <i class="fa fa-bar-chart" style="color: #667eea; margin-right: 10px;"></i> SMS Report
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Student Registration Panel -->
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(101, 148, 255, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f8faff 100%);">
                                        <div class="panel-heading" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 20px; border-bottom: none;">
                                            <h3 class="panel-title" style="font-weight: 400;">
                                                <i class="fa fa-user-plus" style="margin-right: 8px;"></i> Student Registration
                                                <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                                            </h3>
                                        </div>
                                        <div class="panel-body" style="padding: 0;">
                                            <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                                                <!-- Add Registration Section -->
                                                <div class="panel-group" id="addRegAccordion" style="margin-bottom: 0;">
                                                    <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                        <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#addRegAccordion" href="#addRegCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                                    <i class="fa fa-plus-circle" style="color: #764ba2; margin-right: 10px;"></i> Add Registration
                                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="addRegCollapse" class="panel-collapse collapse">
                                                            <div class="panel-body" style="padding: 0;">
                                                                <div class="list-group" style="margin-bottom: 0;">
                                                                    <?php
                                                                    require "interdb.php";
                                                                    $sel_query = "Select * from class Order By classnumber";
                                                                    $result = mysqli_query($link,$sel_query);
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <div class="panel-group" id="addClassAccordion<?php echo $row['classnumber']; ?>" style="margin-bottom: 0;">
                                                                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 0;">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse" data-parent="#addClassAccordion<?php echo $row['classnumber']; ?>" href="#addClassCollapse<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                        <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="addClassCollapse<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                                                <div class="panel-body" style="padding: 0;">
                                                                                    <div class="list-group" style="margin-bottom: 0;">
                                                                                        <?php
                                                                                        $classnumber = $row['classnumber'];
                                                                                        $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                                                        $result1 = mysqli_query($link,$sel_query1);
                                                                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                                                                        ?>
                                                                                        <a href="studentregadd.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                            <i class="fa fa-circle-o" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                                                                        </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- View Registration Section -->
                                                <div class="panel-group" id="viewRegAccordion" style="margin-bottom: 0;">
                                                    <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                        <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#viewRegAccordion" href="#viewRegCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                                    <i class="fa fa-eye" style="color: #764ba2; margin-right: 10px;"></i> View Registration
                                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="viewRegCollapse" class="panel-collapse collapse">
                                                            <div class="panel-body" style="padding: 0;">
                                                                <div class="list-group" style="margin-bottom: 0;">
                                                                    <?php
                                                                    require "interdb.php";
                                                                    $sel_query = "Select * from class Order By classnumber";
                                                                    $result = mysqli_query($link,$sel_query);
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <div class="panel-group" id="viewClassAccordion<?php echo $row['classnumber']; ?>" style="margin-bottom: 0;">
                                                                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 0;">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse" data-parent="#viewClassAccordion<?php echo $row['classnumber']; ?>" href="#viewClassCollapse<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                        <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="viewClassCollapse<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                                                <div class="panel-body" style="padding: 0;">
                                                                                    <div class="list-group" style="margin-bottom: 0;">
                                                                                        <?php
                                                                                        $classnumber = $row['classnumber'];
                                                                                        $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                                                        $result1 = mysqli_query($link,$sel_query1);
                                                                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                                                                        ?>
                                                                                        <a href="viewstureg.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                            <i class="fa fa-circle-o" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                                                                        </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bulk Registration Section -->
                                                <div class="panel-group" id="bulkRegAccordion" style="margin-bottom: 0;">
                                                    <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                        <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#bulkRegAccordion" href="#bulkRegCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                                    <i class="fa fa-users" style="color: #764ba2; margin-right: 10px;"></i> Bulk Registration
                                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="bulkRegCollapse" class="panel-collapse collapse">
                                                            <div class="panel-body" style="padding: 0;">
                                                                <div class="list-group" style="margin-bottom: 0;">
                                                                    <?php
                                                                    require "interdb.php";
                                                                    $sel_query = "SELECT * FROM class WHERE classnumber BETWEEN -5 AND 8 ORDER BY classnumber";
                                                                    $result = mysqli_query($link,$sel_query);
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <div class="panel-group" id="bulkClassAccordion<?php echo $row['classnumber']; ?>" style="margin-bottom: 0;">
                                                                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 0;">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse" data-parent="#bulkClassAccordion<?php echo $row['classnumber']; ?>" href="#bulkClassCollapse<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                        <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="bulkClassCollapse<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                                                <div class="panel-body" style="padding: 0;">
                                                                                    <div class="list-group" style="margin-bottom: 0;">
                                                                                        <?php
                                                                                        $classnumber = $row['classnumber'];
                                                                                        $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                                                        $result1 = mysqli_query($link,$sel_query1);
                                                                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                                                                        ?>
                                                                                        <a href="addbulkreg.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" target="_blank" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                            <i class="fa fa-circle-o" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                                                                        </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bulk Registration (10 & Up) Section -->
                                                <div class="panel-group" id="bulkReg910Accordion" style="margin-bottom: 0;">
                                                    <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                        <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#bulkReg910Accordion" href="#bulkReg910Collapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                                    <i class="fa fa-users" style="color: #764ba2; margin-right: 10px;"></i> Bulk Registration (9 & Up)
                                                                    <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="bulkReg910Collapse" class="panel-collapse collapse">
                                                            <div class="panel-body" style="padding: 0;">
                                                                <div class="list-group" style="margin-bottom: 0;">
                                                                    <?php
                                                                    require "interdb.php";
                                                                    $sel_query = "SELECT * FROM class WHERE classnumber>8 ORDER BY classnumber";
                                                                    $result = mysqli_query($link,$sel_query);
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                    <div class="panel-group" id="bulkClass910Accordion<?php echo $row['classnumber']; ?>" style="margin-bottom: 0;">
                                                                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 0;">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse" data-parent="#bulkClass910Accordion<?php echo $row['classnumber']; ?>" href="#bulkClass910Collapse<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                        <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="bulkClass910Collapse<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                                                <div class="panel-body" style="padding: 0;">
                                                                                    <div class="list-group" style="margin-bottom: 0;">
                                                                                        <?php
                                                                                        $classnumber = $row['classnumber'];
                                                                                        $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                                                        $result1 = mysqli_query($link,$sel_query1);
                                                                                        while($row1 = mysqli_fetch_assoc($result1)) {
                                                                                        ?>
                                                                                        <a href="bulkreg910.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" target="_blank" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                                            <i class="fa fa-circle-o" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                                                                        </a>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Main View Part End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- content-page -->

<?php include 'inc/footer.php'?>