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
    <!-- Class Menu Panel -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(101, 148, 255, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f8faff 100%);">
            <div class="panel-heading" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 20px; border-bottom: none;">
                <h3 class="panel-title" style="font-weight: 400;">
                    <i class="fa fa-book" style="margin-right: 8px;"></i> Class/Section/Group
                    <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                </h3>
            </div>
            <div class="panel-body" style="padding: 0;">
                <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                    <a href="addclass.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                        <i class="fa fa-plus-circle" style="color: #667eea; margin-right: 10px;"></i> Add/View Class
                    </a>
                    <div class="panel-group" id="classAccordion" style="margin-bottom: 0;">
                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                            <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#classAccordion" href="#classCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                        <i class="fa fa-object-group" style="color: #764ba2; margin-right: 10px;"></i> View/Add GROUP/Section
                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="classCollapse" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 0;">
                                    <div class="list-group" style="margin-bottom: 0;">
                                        <?php
                                        require "interdb.php";
                                        $sel_query = "Select * from class order by classnumber";
                                        $result = mysqli_query($link,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <a href="addsection.php?classnumber=<?php echo $row['classnumber']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 30px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                            <i class="fa fa-caret-right" style="color: #667eea; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                        </a>
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

    <!-- Teacher Menu Panel -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(70, 201, 177, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #f8fffc 100%);">
            <div class="panel-heading" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; padding: 15px 20px; border-bottom: none;">
                <h3 class="panel-title" style="font-weight: 400;">
                    <i class="md-people" style="margin-right: 8px;"></i> Teacher/Staff
                    <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                </h3>
            </div>
            <div class="panel-body" style="padding: 0;">
                <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                    <a href="addteacher.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                        <i class="fa fa-user-plus" style="color: #43e97b; margin-right: 10px;"></i> Add/View Teacher
                    </a>
                    <a href="addstaff.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s;">
                        <i class="fa fa-users" style="color: #38f9d7; margin-right: 10px;"></i> Add/View Staff
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Grade/Subject Menu Panel -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(255, 179, 71, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #fffbf8 100%);">
            <div class="panel-heading" style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); color: white; padding: 15px 20px; border-bottom: none;">
                <h3 class="panel-title" style="font-weight: 400;">
                    <i class="md-book" style="margin-right: 8px;"></i> Grade/Subject
                    <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                </h3>
            </div>
            <div class="panel-body" style="padding: 0;">
                <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                    <a href="addgradename.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                        <i class="fa fa-star" style="color: #ff9a9e; margin-right: 10px;"></i> Add/View Grade
                    </a>
                    
                    <div class="panel-group" id="gradeAccordion" style="margin-bottom: 0;">
                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                            <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#gradeAccordion" href="#gradeCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                        <i class="fa fa-graduation-cap" style="color: #fad0c4; margin-right: 10px;"></i> Add Grademarks
                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="gradeCollapse" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 0;">
                                    <div class="list-group" style="margin-bottom: 0;">
                                        <?php
                                        require "interdb.php";
                                        $sel_query = "Select * from gradename";
                                        $result = mysqli_query($link,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <a href="addgrademarks.php?gradecode=<?php echo $row['gradecode']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 10px 20px 10px 30px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                            <i class="fa fa-level-up" style="color: #ff9a9e; margin-right: 10px;"></i> <?php echo $row['gradename']; ?>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-group" id="subjectAccordion" style="margin-bottom: 0;">
                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                            <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#subjectAccordion" href="#subjectCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                        <i class="fa fa-book" style="color: #ff9a9e; margin-right: 10px;"></i> Subject Management
                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="subjectCollapse" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 0;">
                                    <div class="list-group" style="margin-bottom: 0;">
                                        <?php
                                        require "interdb.php";
                                        $sel_query = "Select * from class Order By classnumber";
                                        $result = mysqli_query($link,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="panel-group" style="margin-bottom: 0;">
                                            <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                <div class="panel-heading" style="background-color: #f5f5f5; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#subjectClass<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                            <i class="fa fa-cubes" style="color: #fad0c4; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                            <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="subjectClass<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body" style="padding: 0;">
                                                        <div class="list-group" style="margin-bottom: 0;">
                                                            <?php
                                                            $classnumber = $row['classnumber'];
                                                            $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                            $result1 = mysqli_query($link,$sel_query1);
                                                            while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                                            <a href="addsubject.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 8px 20px 8px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                <i class="fa fa-cube" style="color: #43e97b; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <a href="uploadsubject.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s;">
                                            <i class="fa fa-upload" style="color: #667eea; margin-right: 10px;"></i> Upload Subject
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Class/Subject Teacher Panel -->
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="panel" style="border: none; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(255, 138, 138, 0.15); margin-bottom: 25px; background: linear-gradient(to bottom, #ffffff 0%, #fff8f8 100%);">
            <div class="panel-heading" style="background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%); color: white; padding: 15px 20px; border-bottom: none;">
                <h3 class="panel-title" style="font-weight: 400;">
                    <i class="fa fa-users" style="margin-right: 8px;"></i> Class/Subject Teacher
                    <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
                </h3>
            </div>
            <div class="panel-body" style="padding: 0;">
                <div class="list-group" style="margin-bottom: 0; border-radius: 0;">
                    <a href="assign_classteacher.php" class="list-group-item" style="border-left: none; border-right: none; padding: 12px 20px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                        <i class="fa fa-user-plus" style="color: #ff758c; margin-right: 10px;"></i> Add Class Teacher
                    </a>
                    
                    <div class="panel-group" id="teacherAccordion" style="margin-bottom: 0;">
                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                            <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#teacherAccordion" href="#teacherCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                        <i class="fa fa-pencil-square" style="color: #667eea; margin-right: 10px;"></i> Add Subject Teacher
                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="teacherCollapse" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 0;">
                                    <div class="list-group" style="margin-bottom: 0;">
                                        <?php
                                        require "interdb.php";
                                        $sel_query = "Select * from class Order By classnumber";
                                        $result = mysqli_query($link,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="panel-group" style="margin-bottom: 0;">
                                            <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                <div class="panel-heading" style="background-color: #f5f5f5; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#teacherClass<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                            <i class="fa fa-cubes" style="color: #764ba2; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                            <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="teacherClass<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body" style="padding: 0;">
                                                        <div class="list-group" style="margin-bottom: 0;">
                                                            <?php
                                                            $classnumber = $row['classnumber'];
                                                            $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                            $result1 = mysqli_query($link,$sel_query1);
                                                            while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                                            <a href="insert_subject_teacher.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 8px 20px 8px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                <i class="fa fa-cube" style="color: #ff7eb3; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
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
                    
                    <div class="panel-group" id="viewTeacherAccordion" style="margin-bottom: 0;">
                        <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                            <div class="panel-heading" style="background-color: #f9f9f9; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#viewTeacherAccordion" href="#viewTeacherCollapse" style="display: block; padding: 12px 20px; color: #555; text-decoration: none; transition: all 0.3s;">
                                        <i class="fa fa-eye" style="color: #667eea; margin-right: 10px;"></i> View Subject Teacher
                                        <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="viewTeacherCollapse" class="panel-collapse collapse">
                                <div class="panel-body" style="padding: 0;">
                                    <div class="list-group" style="margin-bottom: 0;">
                                        <?php
                                        require "interdb.php";
                                        $sel_query = "Select * from class Order By classnumber";
                                        $result = mysqli_query($link,$sel_query);
                                        while($row = mysqli_fetch_assoc($result)) { ?>
                                        <div class="panel-group" style="margin-bottom: 0;">
                                            <div class="panel" style="box-shadow: none; border-radius: 0; border: none;">
                                                <div class="panel-heading" style="background-color: #f5f5f5; padding: 0; border-bottom: 1px solid #f1f1f1;">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#viewTeacherClass<?php echo $row['classnumber']; ?>" style="display: block; padding: 10px 20px 10px 30px; color: #555; text-decoration: none; transition: all 0.3s;">
                                                            <i class="fa fa-cubes" style="color: #764ba2; margin-right: 10px;"></i> <?php echo $row['classname']; ?>
                                                            <span class="pull-right"><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="viewTeacherClass<?php echo $row['classnumber']; ?>" class="panel-collapse collapse">
                                                    <div class="panel-body" style="padding: 0;">
                                                        <div class="list-group" style="margin-bottom: 0;">
                                                            <?php
                                                            $classnumber = $row['classnumber'];
                                                            $sel_query1 = "Select * from sectiongroup where classnumber='$classnumber'";
                                                            $result1 = mysqli_query($link,$sel_query1);
                                                            while($row1 = mysqli_fetch_assoc($result1)) { ?>
                                                            <a href="subject_teacher_view.php?classnumber=<?php echo $classnumber; ?>&secgroupname=<?php echo $row1['secgroupname']; ?>" class="list-group-item" style="border-left: none; border-right: none; padding: 8px 20px 8px 40px; border-color: #f1f1f1; color: #555; transition: all 0.3s; border-bottom: 1px solid #f1f1f1;">
                                                                <i class="fa fa-cube" style="color: #ff7eb3; margin-right: 10px;"></i> <?php echo $row1['secgroupname']; ?>
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
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>
