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
                                <h4 class="pull-left page-title">Chapter Add</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Chapter</h3>
            </div>
            <div class="panel-body">
<?php

    
?>
            <form action="printbarcode.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Barcode Value</label>
                    <div class="col-md-9">
                        <input type="text" name="barcode" class="form-control">
                    </div>
                </div>
                
                
                <input type="submit" class="btn btn-primary" Value="Add Chapter">
            </form>
            <br>
            <br>

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>