<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}

// Include necessary files
include 'inc/header.php';
include 'inc/topheader.php';
include 'inc/leftmenu.php';
?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Row Div Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Expert Data Entry Panel</h3>
                        </div>

                        <a href="insert_ssc_info_form_excel.php"><button class="btn btn-primary btn-large">SSC INFO ENTRY(EXCEL)</button></a>
                       

                       	<a href="insert_ssc_stu_form_html.php"><button class="btn btn-primary btn-large">STUDENT ENTRY  SSC FOLDER</button></a>

                        <a href="student_add_regestration.php"><button class="btn btn-primary btn-large">Student Add (Regestration)</button></a>


                        <a href="update_gender.php"><button class="btn btn-primary btn-large">Update Gender</button></a>

                         <a href="update_dob.php"><button class="btn btn-primary btn-large">Update DOB</button></a>
                         
                         <a href="update_bid_nid.php"><button class="btn btn-primary btn-large">Update BID AND NID</button></a>
                         
                         
                          <a href="student_add_regestration_12.php"><button class="btn btn-primary btn-large">Student Add Class 12 (Regestration)</button></a>
                       <br><br>
                       <br>
                       <br>
                    </div>
                </div>

       
            </div>
            <!-- Row Div End -->
        </div>
        

    </div>
    <!-- Content Div End -->
</div>
<?php include 'inc/footer.php'; ?>
