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
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <marquee behavior="slow" direction="left">
                                    <h1>Welcome to Noipunno Help Dashboard</h1>
                                </marquee>
                            </div>
                        </div>
                            
                        
                        <!-- End row-->

    <div class="row">
        <div class="col-md-12">
            <center>
                <h1>পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক</h1>
            </center>
            <form action="print_pr2.php" method="POST" target="_blank">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                            <option value="">Select Class</option>
                        <?php
                        $count=1;
                        $sel_query="Select * from class Order By classnumber;";
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
                            <option value="">Select Section</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT secgroupname FROM sectiongroup;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="sub_code" required="1">
                            <option value="">Select Subject</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT * FROM subject WHERE classnumber = 6 AND secgroup='A';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <input type="submit" value="Print" class="btn btn-primary">
            </form>
        </div>
    </div>





    <div class="row">
        <div class="col-md-12">
            <center>
                <h1>পরিশিষ্ট ৪ লিখিত উত্তরপত্র মূল্যায়ন ছক</h1>
            </center>
            <form action="print_pr4.php" method="POST" target="_blank">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                            <option value="">Select Class</option>
                        <?php
                        $count=1;
                        $sel_query="Select * from class Order By classnumber;";
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
                            <option value="">Select Section</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT secgroupname FROM sectiongroup;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="sub_code" required="1">
                            <option value="">Select Subject</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT * FROM subject WHERE classnumber = 6 AND secgroup='A';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <input type="submit" value="Print" class="btn btn-primary">
            </form>
        </div>
    </div>



<div class="row">
        <div class="col-md-12">
            <center>
                <h1>পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক</h1>
            </center>
            <form action="print_pr5.php" method="POST" target="_blank">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                            <option value="">Select Class</option>
                        <?php
                        $count=1;
                        $sel_query="Select * from class Order By classnumber;";
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
                            <option value="">Select Section</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT secgroupname FROM sectiongroup;";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['secgroupname']?>"><?php echo $row['secgroupname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Subject</label>
                    <div class="col-md-9">
                        <select class="form-control" data-placeholder="Select Class" name="sub_code" required="1">
                            <option value="">Select Subject</option>
                        <?php
                        $count=1;
                        $sel_query="SELECT DISTINCT * FROM subject WHERE classnumber = 6 AND secgroup='A';";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        
                        <option value="<?php echo $row['subcode']?>"><?php echo $row['subname']?></option>
                        <?php $count++; } ?> 
                        </select>
                    </div>
                </div>
                <input type="submit" value="Print" class="btn btn-primary">
            </form>
        </div>
    </div>
                        <div class="row">
                            <center><h1>03-07-2024</h1></center>
                            <div class="col-md-6">
                                <center>
                                    <h3>Class 6 (Bangla)</h3>
                                     <?php
                                    require "../interdb.php";
                                    $count=1;
                                    $sel_query="Select * from class Where classnumber='6'";
                                    $result = mysqli_query($link,$sel_query);
                                    while($row = mysqli_fetch_assoc($result)) {?>


                                     <?php
                                    require "../interdb.php";
                                    $classnumber=$row['classnumber'];
                                    $count1=1;
                                    $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                    $result1 = mysqli_query($link,$sel_query1);
                                    while($row1 = mysqli_fetch_assoc($result1)) {?>

                                    <a href="print_6_bangla_pr2.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <a href="print_6_bangla_pr4.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৪ লিখিত উত্তরপত্র মূল্যায়ন ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                     <a href="print_6_bangla_pi.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <?php $count1++; } ?>
                                    <?php $count++; } ?>
                                </center>
                                
                            </div>

                            <div class="col-md-6">
                                <center>
                                    <h3>Class 7 (Religion)</h3>
                                     <?php
                                    require "../interdb.php";
                                    $count=1;
                                    $sel_query="Select * from class Where classnumber='7'";
                                    $result = mysqli_query($link,$sel_query);
                                    while($row = mysqli_fetch_assoc($result)) {?>


                                     <?php
                                    require "../interdb.php";
                                    $classnumber=$row['classnumber'];
                                    $count1=1;
                                    $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                    $result1 = mysqli_query($link,$sel_query1);
                                    while($row1 = mysqli_fetch_assoc($result1)) {?>

                                    <a href="print_7_dhormo_pr2.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <a href="print_7_dhormo_pr4.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৪ লিখিত উত্তরপত্র মূল্যায়ন ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                     <a href="print_7_dhormo_pi.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <?php $count1++; } ?>
                                    <?php $count++; } ?>
                                </center>
                                
                            </div>

                            <div class="col-md-6">
                                <center>
                                    <h3>Class 8 (জীবন ও জীবিকা)</h3>
                                     <?php
                                    require "../interdb.php";
                                    $count=1;
                                    $sel_query="Select * from class Where classnumber='8'";
                                    $result = mysqli_query($link,$sel_query);
                                    while($row = mysqli_fetch_assoc($result)) {?>


                                     <?php
                                    require "../interdb.php";
                                    $classnumber=$row['classnumber'];
                                    $count1=1;
                                    $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                    $result1 = mysqli_query($link,$sel_query1);
                                    while($row1 = mysqli_fetch_assoc($result1)) {?>

                                    <a href="print_8_jj_pr2.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <a href="print_8_jj_pr4.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৪ লিখিত উত্তরপত্র মূল্যায়ন ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                     <a href="print_8_jj_pi.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <?php $count1++; } ?>
                                    <?php $count++; } ?>
                                </center>
                                
                            </div>

                             <div class="col-md-6">
                                <center>
                                    <h3>Class 9 (ইতিহাস)</h3>
                                     <?php
                                    require "../interdb.php";
                                    $count=1;
                                    $sel_query="Select * from class Where classnumber='9'";
                                    $result = mysqli_query($link,$sel_query);
                                    while($row = mysqli_fetch_assoc($result)) {?>


                                     <?php
                                    require "../interdb.php";
                                    $classnumber=$row['classnumber'];
                                    $count1=1;
                                    $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                    $result1 = mysqli_query($link,$sel_query1);
                                    while($row1 = mysqli_fetch_assoc($result1)) {?>

                                    <a href="print_9_eti_pr2.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <a href="print_9_eti_pr4.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৪ লিখিত উত্তরপত্র মূল্যায়ন ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                     <a href="print_9_jj_pi.php?c=<?php echo $row['classnumber']?>&s=<?php echo $row1['secgroupname']?>" target="_blank">
                                        <button class="btn btn-primary btn-lg">
                                            পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক
                                            <br>(<?php echo $row['classname'];?> <?php echo $row1['secgroupname'];?>)
                                        </button>
                                        <br>
                                    </a>

                                    <br>

                                    <?php $count1++; } ?>
                                    <?php $count++; } ?>
                                </center>
                                
                            </div>
                        </div><!-- End row-->

                        



                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>