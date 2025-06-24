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

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Upload</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Student File</h3>
            </div>
            <div class="panel-body">

<?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
            
?>
<table class="table table-bordered">
<thead>
    <tr>
    <th>Class</th>
    <th>Sec</th>
    <th>Roll</th>
    <th>Name</th>
    </tr>
</thead>
<tbody>
<?php
          
    require "../interdb.php";
    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    $c = 0;
    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
    $classnumber=$filesop[0];
    $secgroupname=$filesop[1];
    $roll=$filesop[2];
    
    $classname="";
    $sel_query4="SELECT * FROM class WHERE classnumber='$classnumber'";
            $result4 = mysqli_query($link,$sel_query4);
            while($row4 = mysqli_fetch_assoc($result4)) {
           
            $classname=$row4['classname'];
            }


    $nameb="Not Avliable";
    $fnameb="Not Avliable";
    $mnameb="Not Avliable";

    $name=$filesop[3];
    $name = strtoupper($name);

    $fname=$filesop[4];
    $fname = strtoupper($fname);
   
    $mname=$filesop[5];
    $mname = strtoupper($mname);
   
    $sex=$filesop[6];

    $brithid=0;
    $sdob=$filesop[7];
    $dob=date("Y-m-d", strtotime($sdob));
    $fnid=0;
    $mnid=0;
    
    
    $address=$filesop[8];
    $mobiler=$filesop[9];
    $mobile=$filesop[9];
    $uniqid=$classnumber.$secgroupname.$roll;

    $imagesl=0;
    $imgname=$classnumber."/".$roll.".jpg";
    if($c>0){
?>
<tr>
    <td><?php echo $classnumber;?></td>
    <td><?php echo $secgroupname;?></td>
    <td><?php echo $roll;?></td>
    <td><?php echo $name;?></td>
</tr>

<?php
   
    //insert to database
    
   $sql ="
INSERT INTO student(classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname) 
VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$dob', '$brithid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$sex', '$imgname') 
ON DUPLICATE KEY UPDATE 

roll = VALUES(roll),secgroup = VALUES(secgroup),classname = VALUES(classname),name = VALUES(name),fname = VALUES(fname),mname = VALUES(mname),dob = VALUES(dob),sex = VALUES(sex),address = VALUES(address),mobile = VALUES(mobile),uniqid = VALUES(uniqid)";
    $stmt = mysqli_prepare($link,$sql);
    mysqli_stmt_execute($stmt);
    
}
    $c = $c + 1;
           }//ending while loop

            if($sql){
               echo "<h3 style='color:green;'>Upload Success Fully</h3>";
             } 
         else
         {
            echo "<h3 style='color:Red;'>Unable To Upload. Please Cheak File Format</h3>";
          }

    }
?>
</tbody>
</table>
        <div class="col-md-12">
            <center>
                <caption><h3>Sample Excel Sheet format</h3></caption>
            </center>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Class</th>
                    <th>Sec</th>
                    <th>Roll</th>
                    <th>Name</th>
                    <th>F Name</th>
                    <th>M Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    </tr>
                </thead>
            </table>
            <br><br><br>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Number</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classnumber']?></option>
                    <?php $count++; } ?>
                    </select>
                </div>
            </div>
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
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                    </select>
                </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Upload Student</label>
                    <div class="col-md-7">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary" Value="Upload Student">
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