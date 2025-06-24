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
                    <h4 class="pull-left page-title">Class</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Testimonial</h3>
                        </div>
                        <div class="panel-body">


<form action="addtesti.php" method="POST" class="form-horizontal" role="form" target="_blank">
<div class="form-group">
    <label class="col-md-3 control-label" for="studentName">Student Name</label>
    <div class="col-md-9">
        <input type="text" id="studentName" name="studentName" class="form-control" placeholder="Enter Student Name" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="fatherName">Father Name</label>
    <div class="col-md-9">
        <input type="text" id="fatherName" name="fatherName" class="form-control" placeholder="Enter Father Name" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="motherName">Mother Name</label>
    <div class="col-md-9">
        <input type="text" id="motherName" name="motherName" class="form-control" placeholder="Enter Mother Name" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="dob">Date of Birth</label>
    <div class="col-md-9">
        <input type="text" id="motherName" name="dob" class="form-control" placeholder="dd-mm-yyyy" required="1">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="village">Village</label>
    <div class="col-md-9">
        <input type="text" id="village" name="village" class="form-control" placeholder="Enter Village" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="post">Post</label>
    <div class="col-md-9">
        <input type="text" id="post" name="post" class="form-control" placeholder="Enter Post" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ps">PS (Police Station)</label>
    <div class="col-md-9">
        <input type="text" id="ps" name="ps" class="form-control" placeholder="Enter Police Station" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="ds">DS (District)</label>
    <div class="col-md-9">
        <input type="text" id="ds" name="ds" class="form-control" placeholder="Enter District" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="passingYear">Passing Year</label>
    <div class="col-md-9">
        <input type="text" id="passingYear" name="passingYear" class="form-control" placeholder="Enter Passing Year" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="group">Group</label>
    <div class="col-md-9">
        <select id="group" name="group" class="form-control" required>
            <option value="" disabled selected>Select Group</option>
            <option value="Science">Science</option>
            <option value="Arts">Arts</option>
            <option value="Commerce">Commerce</option>
            <option value="68-Computer & Information Technology">68-Computer & Information Technology</option>
            <option value="71-Dress Making">71-Dress Making</option>
            <option value="81-Apparel Manufacturing Basics
">81-Apparel Manufacturing Basics
</option>
<option value="88-IT Support and IoT Basies">88-IT Support and IoT Basies
</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="gpa">GPA</label>
    <div class="col-md-9">
        <input type="text" id="gpa" name="gpa" class="form-control" placeholder="Enter GPA" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="grade">Grade</label>
    <div class="col-md-9">
        <select id="grade" name="grade" class="form-control" required>
            <option value="" disabled selected>Select Grade</option>
            <option value="A+">A+</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="result">Result</label>
    <div class="col-md-9">
        <select id="result" name="result" class="form-control" required>
            <option value="pass">Pass</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="roll">Roll</label>
    <div class="col-md-9">
        <input type="text" id="roll" name="roll" class="form-control" placeholder="Enter Roll" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="registration">Registration</label>
    <div class="col-md-9">
        <input type="text" id="registration" name="registration" class="form-control" placeholder="Enter Registration" required>
    </div>
</div>


                                

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Your View Class section can remain unchanged -->

        </div><!-- End of container -->
    </div><!-- End of content -->
</div><!-- End of content-page -->
<?php include 'inc/footer.php'?>
