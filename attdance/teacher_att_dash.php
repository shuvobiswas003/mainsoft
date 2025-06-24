<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){
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

                      <div class="row">
                          <marquee behavior="slow" direction="">
                            <h1 style="color: green;">
                                Welcome to Student One Point Service
                            </h1>
                        </marquee>
                      </div>
                       


 <!--2nd Form Part Start-->
<div class="panel-body">




    <div class="col-md-12">
        <div class="header">
            <h1>Quick Menu</h1>
        </div>
        
        <div class="grid-container">
            <a href="teacher_att_daily.php" class="grid-item">Teacher Daily Attdance</a>
            <a href="teacher_att_monthly.php" class="grid-item">Teacher Monthly Attdance</a>
            <a href="teacher_att_punch.php" class="grid-item">Teacher Punch Details</a>
             <a href="staff_att_daily.php" class="grid-item">Staff Daily Attdance</a>
             <a href="staff_att_monthly.php" class="grid-item">Staff Monthly Attdance</a>
             <a href="staff_att_punch.php" class="grid-item">Staff Punch Details</a>
            
            
            <!-- Additional grid items can be added here -->
        </div>
    </div>




<div class="form-primary" style="margin-top: 40px;">
   

</div>
        
                    

</div>
                
        </div>

</form>  


    
    </div>
 <!--2nd Form Part Start-->
                        
                        


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>