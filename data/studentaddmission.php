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
                                <h4 class="pull-left page-title">Subject</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Student Addmission</h3>
            </div>
            <div class="panel-body">
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameb=$_POST['name'];
    $fnameb=$_POST['fname'];
    $mnameb=$_POST['mname'];

    $name=$_POST['name'];
    $fname=$_POST['fname'];
    if(empty($fname)){
       $fname="N/A"; 
       $fnameb="N/A";
    }
    $mname=$_POST['mname'];
    if(empty($mname)){
       $mname="N/A"; 
       $mnameb="N/A"; 
    }
    
    $sex=$_POST['sex'];

    if(empty($sex)){
       $sex="MALE"; 
    }
    $brithid="0";
    $sdob=$_POST['sdob'];
    $dob=date("Y-m-d", strtotime($sdob));
    $fnid="0";;
    $mnid="0";
    
    $classnumber=$_POST['classnumber'];
    $classname=$_POST['classname'];
    $secgroupname=$_POST['secgroupname'];
    $roll=$_POST['roll'];
    $address="N/A";
    $mobile="0";
    $uniqid=$classnumber.$secgroupname.$roll;
    
    $imgnameRAw=$_POST['img_sl'];
    
    $imgname="IMG_".$imgnameRAw.".png";
   

    //insert to database

        require "../interdb.php";

        $sql ="INSERT INTO student(classnumber,classname,secgroup,roll,name,fname,mname,nameb,fnameb,mnameb,dob,birthid,fnid,mnid,address,mobile,uniqid,sex,imgname) VALUES ('$classnumber','$classname','$secgroupname','$roll','$name','$fname','$mname','$nameb','$fnameb','$mnameb','$dob','$brithid','$fnid','$mnid','$address','$mobile','$uniqid','$sex','$imgname') ";


    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student Admited Successfully</h1>.";
    }

}
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="col-md-12">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" autofocus="autofocus">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father Name" autofocus="autofocus">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother Name" autofocus="autofocus">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="sex" required="1">
                <option value="">Select Gender</option>
            <option value="MALE">MALE</option>
            <option value="FEMALE">FEMALE</option>
            </select>
        </div>
    </div>
    <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <input type="date" id="Cust-name" name="sdob" class="form-control" placeholder="Student Date Of Birth" required="1" VALUE="2024-01-01">
                </div>
        </div>


    
</div>


    

<!--Academic & Contuct Part Start-->
    <div class="col-md-12">
        <center>
            <h3>Academic Part And Contuct Info</h3>
        </center>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Class Number</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class number" name="classnumber" required="1">
                
                <option value="<?php echo $classnumber;?>"><?php echo $classnumber;?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                <?php
                require "../interdb.php";
                $count=1;
                $sel_query="Select * from class where classnumber='$classnumber';";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option>
                <?php $count++; } ?> 
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Group</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                 <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?> (Default)</option>
                <?php
                require "../interdb.php";
                $count1=1;
                $sel_query1="Select * from sectiongroup where classnumber='$classnumber';";
                $result1 = mysqli_query($link,$sel_query1);
                while($row1 = mysqli_fetch_assoc($result1)) {?>
                <option value="<?php echo $row1['secgroupname']?>"><?php echo $row1['secgroupname']?></option>
                <?php $count1++; } ?> 
                </select>
            </div>
        </div>
    
    </div>
    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" required="1">
                </div>
        </div>
    </div>
    
     <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Image Sl</label>
                <div class="col-md-9">
                    <input type="number" name="img_sl" class="form-control">
                </div>
        </div>
    </div>
   
    
<!--Academic & Contuct Part End-->


<div class="col-md-12">   
<center> 
<input type="submit" class="btn btn-primary" Value="Admit Student">
</center>
</div>
</form>
            
</div><!--End of panel Body-->
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>