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
<h3 class="panel-title">Exam Mark Entry</h3>
</div>
<!--1st Form Start-->
    <div class="panel-body">
        <?php
        
        $classnumber=$_REQUEST['classnumber'];
        $secgroupname=$_REQUEST['secgroupname'];

        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from class where classnumber='$classnumber';";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['classnumber']?>"><?php echo $row['classname']?></option>
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
                <label class="col-md-3 control-label" for="Cust-name">Student Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" autofocus="autofocus" required="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Student Mobile Number</label>
                <div class="col-md-9">
                    <input type="number" name="mobile" class="form-control" required="1">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Chose Bris BD HTML</label>
                <div class="col-md-9">
                   <input type="file" name="bris_file" required="1">
                </div>
            </div>
            
            <input type="submit" class="btn btn-primary" Value="Get Data">
        </form>
    </div>
 <!--1st Form End-->

 <!--2nd Form Part Start-->
<div class="panel-body">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$classnumber=$_POST['classnumber'];
$secgroupname=$_POST['secgroupname'];
$roll=$_POST['roll'];
$mobile=$_POST['mobile'];

$file = $_FILES['bris_file']['tmp_name'];
$handle = fopen($file, "r");

// Read the content of the file into a string
$contents = fread($handle, filesize($file));

// Remove HTML tags
$cleanedContent = strip_tags($contents);


$fullstring=$cleanedContent;
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


<div class="col-md-12">
    <?php
    require "../interdb.php";
    $img_name="";
    $sel_query10="SELECT * FROM `imagesl` where classnumber='$classnumber' AND secgroup='$secgroupname' AND roll= '$roll' ORDER BY classnumber ASC;";
                        $result10 = mysqli_query($link,$sel_query10);
                        while($row10 = mysqli_fetch_assoc($result10)) {
                            $img_name=$row10['imgname'];
                        }
    ?>
    
    <center>
        <img src="../img/student/<?php echo $img_name;?>" height="200px">
    </center>
    <br>
</div>

<form action="addstubrisbdfile_pic.php" method="POST" target="_blank" enctype="multipart/form-data">
   <div class="col-md-12">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">BRIS QR</label>
        <div class="col-md-9">
            <select name="brisqr" class="form-control" for="Cust-name">
                <option value="NA">NOT-Avliavle</option>
            </select>
        </div>
    </div>
   </div>
<div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <?php
            $name = get_string_between($fullstring, 'Registered Person Name', 'জন্মস্থান');
            $name=trim($name);
            if(empty($name)){
                $name="No Data ON BRIS BD";
            }
            ?>
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name"  value="<?php echo $name?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <?php
            $fname = get_string_between($fullstring, "Father's Name", 'পিতার জাতীয়তা');
            $fname=trim($fname);
            if(empty($fname)){
                $fname="No Data ON BRIS BD";
            }
            ?>
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $fname?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <?php
            $mname = get_string_between($fullstring, "Mother's Name", 'মাতার জাতীয়তা');
            $mname=trim($mname);
            if(empty($mname)){
                $mname="No Data ON BRIS BD";
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
            $nameb = get_string_between($fullstring, "নিবন্ধিত ব্যক্তির নাম", "Registered Person Name");
            $nameb=trim($nameb)
            ?>
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" value="<?php echo $nameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            <?php
            $fnameb = get_string_between($fullstring, "পিতার নাম", "Father's Name");
            $fnameb=trim($fnameb)
            ?>
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1" value="<?php echo $fnameb?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
            <?php
            $mnameb = get_string_between($fullstring, "মাতার নাম", "Mother's Name");
            $mnameb=trim($mnameb)
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
            $arrayName = explode("Sex", $fullstring);

            $bdata=$arrayName[1];
            $bdata=trim($bdata);
            $data=explode(" ", $bdata);
            $birthid=$data[35];
                
            ?>
                    <input type="text" id="Cust-name" name="brithid" class="form-control" placeholder="Student Birth ID no" required="1" value="<?php echo $birthid;?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <?php
                     $arrayName = explode("Sex", $fullstring);
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
            <label class="col-md-3 control-label" for="Cust-name">Select Group/Section</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">
                
                <option value="<?php echo $secgroupname;?>"><?php echo $secgroupname;?></option>
                
                </select>
            </div>
        </div>
    </div>

    

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Roll</label>
                <div class="col-md-9">
                    <input type="number" name="roll" class="form-control" value="<?php echo $roll?>" autofocus="autofocus" required="1">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Address</label>
                <div class="col-md-9">
                    <?php
                    $addressraw = get_string_between($fullstring, "Place of Birth", "মাতার");
                    
                    $address=$addressraw;
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
                    <input type="number" id="Cust-name" name="mobile" class="form-control" placeholder="Student Gurdian Phone Number" required="1" value="<?php echo $mobile?>">
                </div>
        </div>
    </div>
    
    <br><br><br><br><br><br>
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Photo</label>
            <div class="col-md-9">
                <input type="file" name ="image" id="image" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <center>
        <div id="preview"></div>
        </center>
    </div>
</div>
<!--Academic & Contuct Part End-->



<br><br><br>
<div class="col-md-12">   
<center> 
<input type="submit" value="Admit Student" class="btn btn-primary">
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