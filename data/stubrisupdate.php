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
<!--Raw Div Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Student BRIS BD INFO</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        $id=$_REQUEST['id'];
        require "../interdb.php";
        $count=1;
        $sel_query="Select * from student where id='$id';";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
             
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select ID</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="id" required="1">
                    <option value="<?php echo $row['id']?>"><?php echo $row['id']?></option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Section Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                    <option value="<?php echo $row['secgroup'];?>"><?php echo $row['secgroup'];?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="roll" required="1">
                    <option value="<?php echo $row['roll'];?>"><?php echo $row['roll'];?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="name" required="1">
                    <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Mobile Number</label>
                <div class="col-md-9">
                    <input type="number" name="mobile" class="form-control" required="1" value="<?php echo $row['mobile'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Image SL number</label>
                <div class="col-md-9">
                    <input type="number" name="imagesl"class="form-control" required="1" value='<?php echo $row['imgname'];?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">BRIS BD PDF TEXT</label>
                <div class="col-md-9">
                    <textarea name="brisbdtext" id="" cols="30" rows="10" class="form-control" required="1" autofocus="autofocus"></textarea>
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Data">
        </form>
        <?php
        $count++;
        }
        ?>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id=$_POST['id'];
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$mobile=$_POST['mobile'];
$imgage=$_POST['imagesl'];
$rawstring=$_POST['brisbdtext'];
$fullstring=$rawstring;
$fullstring = str_replace(array("\r", "\n"), ' ', $fullstring);

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>
<form action="addstubrisbdupdate.php" method="POST" target="_blank">
    <div class="col-md-12">
        <center>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select ID</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="id" required="1">
                    <option value="<?php echo $id;?>"><?php echo $id;?></option>
                    </select>
                </div>
            </div>
            <h3>Raw Data</h3>
            <?php
            $arrayName = explode("REGISTERED PERSON
NAME", $fullstring);
            echo "<pre>";
            print_r($rawstring);
            echo "<pre>";
            
            ?>

        </center>
    </div>
<div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <?php
            $name = get_string_between($fullstring, 'NAME', 'জন্মস্থান');
            $name=trim($name);
            if(empty($name)){
                $name="N/A";
            }
            ?>
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" autofocus="autofocus" value="<?php echo $name?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <?php
            $fnameraw = get_string_between($fullstring, "FATHER'S", "পিতার");
            $explodemname=explode('NAME', $fnameraw);
            $fname=$explodemname[1];
            $fname=trim($fname);
            if(empty($fname)){
                $fname="N/A";
            }
            ?>
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <?php
            $mnameraw = get_string_between($fullstring, "MOTHER'S", "মাতার");
            $explodemname=explode('NAME', $mnameraw);
            $mname=$explodemname[1];
            $mname=trim($mname);
             if(empty($mname)){
                $mname="N/A";
            }
            ?>
            <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother's Name" value="<?php echo $mname?>">
        </div>
    </div>
</div>


    <div class="col-md-6">
        <center>
        <h3> Student Part(Bangla) </h3>
        </center>
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">নাম</label>
        <div class="col-md-9">
            <?php
            $nameb = get_string_between($fullstring, "নাম", "REGISTERED");
            $nameb=trim($nameb)
            ?>
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" value="<?php echo $nameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            <?php
            $fnamebraw = get_string_between($fullstring, "পিতার", "FATHER'S");
            $explodemname=explode('নাম', $fnamebraw);
            $fnameb=$explodemname[1];
            $fnameb=trim($fnameb);
            ?>
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1" value="<?php echo $fnameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
            <?php
            $mnamebraw = get_string_between($fullstring, "মাতার", "MOTHER'S");
            $explodemname=explode('নাম', $mnamebraw);
            $mnameb=$explodemname[1];
            $mnameb=trim($mnameb);
            ?>
            <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1" value="<?php echo $mnameb?>">
        </div>
    </div>

    
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <?php
            $pos=strpos($fullstring,"FEMALE");
            if($pos=="0"){
                $gender="MALE";
            }else{
                $gender="FEMALE";
            }
            ?>
            <input type="text" name="sex" class="form-control" value="<?php echo $gender;?>">
        </div>
    </div>
</div>
    <!--National Data Section Start-->
    <div class="col-md-12">
        <center>
            <h3>National Data Section</h3>
        </center>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Birth ID No</label>
                <div class="col-md-9">
            <?php
            $arrayName = explode("SEX", $fullstring);
            $bdata=$arrayName[1];
            $bdata=trim($bdata);
            $data=explode(" ", $bdata);
            $birthid=$data[3];
                
            ?>
                    <input type="number" id="Cust-name" name="birthid" class="form-control" placeholder="Student Birth ID no" required="1" value="<?php echo $birthid;?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <?php
                    $arrayName = explode("SEX", $fullstring);
                    $bdata=$arrayName[1];
                    $bdata=trim($bdata);
                    $data=explode(" ", $bdata);
                    $date=$data[0];
                    $month=$data[1];
                    $year=$data[2];
                    $daten=$date."-".$month."-".$year;
                    
                    $dob=date("Y-m-d", strtotime($daten));
                     ?>

                    <input type="date" id="Cust-name" name="sdob" class="form-control" placeholder="Student Date Of Birth" required="1" 
                    value="<?php echo $dob;?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="fnid" class="form-control" placeholder="Father NID Number" required="1" value="0">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Mother NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mnid" class="form-control" placeholder="Mother Nid Number" required="1" value="0">
                </div>
        </div>
    </div>
<!--End of National Data Section-->
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
            <label class="col-md-3 control-label" for="Cust-name">Select Group/Section</label>
            <div class="col-md-9">
                <input type="text" id="Cust-name" name="secgroupname" class="form-control" placeholder="Write Group" required="1" value="<?php echo $secgroupname;?>">
            </div>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" value="<?php echo $roll;?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Address</label>
                <div class="col-md-9">
                    <?php
                    $addressraw = get_string_between($fullstring, "PLACE", "মাতার");
                    $explodemname=explode('BIRTH', $addressraw);
                    $address=$explodemname[1];
                    $address=trim($address);
                    ?>
                    <input type="text" name="address" class="form-control" value="<?php echo $address;?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
                <div class="col-md-9">
                   <input type="number" id="Cust-name" name="mobile" class="form-control"placeholder="Student Gurdian Phone Number" required="1" value="<?php echo $mobile;?>">
                </div>
        </div>
    </div>
<!--Academic & Contuct Part End-->

<br><br><br><br><br><br>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="text" name ="image" id="image" class="form-control" value="<?php echo $imgage;?>">
            </div>
        </div>
    </div>
    
</div>

<br><br><br>
<div class="col-md-12">   
<center> 
<input type="submit" value="UPDATE Student" class="btn btn-primary">
<a href="../data/studentdashboard.php?classnumber=<?php echo $classnumber;?>"><button type="button" class="btn btn-warning">Back To Dashboard</button></a>
</center>
</div>

        
    
</form>                              
    <?php } ?>
    </div>
 <!--2nd Form Part Start-->
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
</div>
<?php include'inc/footer.php'?>