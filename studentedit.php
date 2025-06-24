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
                                <h4 class="pull-left page-title">Datatable</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Datatable</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Edit Student</h3>
                                    </div>


<?php
      require 'interdb.php';
      $id=$_REQUEST['id'];
      
      $query = "SELECT * from student where id='".$id."'";
      $result = mysqli_query($link, $query) or die ( mysqli_error());
      $row = mysqli_fetch_assoc($result);
      $stuidg=$row['uniqid'];

?>
<div class="panel-body">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1){


 // Retrieve posted data
    $stupevid = $_POST['stupevid'];
    $id = $_POST['id'];
    $nameb = $_POST['nameb'];
    $fnameb = $_POST['fnameb'];
    $mnameb = $_POST['mnameb'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sex = $_POST['sex'];
    $brithid = $_POST['brithid'];
    $sdob = $_POST['sdob'];
    $dob = date("Y-m-d", strtotime($sdob));
    $fnid = $_POST['fnid'];
    $mnid = $_POST['mnid'];
    $classnumber = $_POST['classnumber'];
    $classname = $_POST['classname'];
    $secgroup = $_POST['secgroup'];
    $roll = $_POST['roll'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    
    // Generate new uniqid
    $uniqid = $classnumber . $secgroup . $roll;

    



$sql="UPDATE student set nameb='$nameb',fnameb='$fnameb',mnameb='$mnameb',name='$name',fname='$fname',mname='$mname',birthid='$brithid',dob='$dob',fnid='$fnid',mnid='$mnid',address='$address',sex='$sex',secgroup='$secgroup',roll='$roll',mobile='$mobile',uniqid='$uniqid' WHERE id='$id'";
if(mysqli_query($link, $sql)){
echo "<h2 style='color:green'>Student Update Successfully<h2>";


if ($uniqid != $stupevid) {
        // Clear previous registration if uniqid has changed
        $query = "DELETE FROM sturegsubject WHERE uniqid='$stupevid'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        echo "<span style='color:red;font-size:30px;'>Section/Roll is changed. Please Add registration.</span>";

        $query = "DELETE FROM sturegstatus WHERE uniqid='$stupevid'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<br>Previous Registration Cleared<br>";

        echo "<a href='sturegperun.php?uniqid=".$uniqid."' target='_blank'><button type='button' class='btn btn-primary'>Click Here to Add Registration</button></a>";
        echo "<br><br>";

       

        // Step 2: Retrieve all rows with matching stuid from studentpayment table
$selectQuery = "SELECT * FROM studentpayment WHERE stuid = '$stupevid'";
$selectResult = mysqli_query($link, $selectQuery);

if (mysqli_num_rows($selectResult) > 0) {
    while ($row = mysqli_fetch_assoc($selectResult)) {
        // Step 1: Store the previous puniid and retrieve paycatid
        $previous_puniid = $row['puniid'];
        $paycatid = $row['pcatid'];

        // Create new puniid from retrieved values
        $new_puniid = $paycatid . $uniqid;

        // Step 3: Update each matching record in studentpayment table with new details
        $updateStudentPaymentQuery = "
            UPDATE studentpayment 
            SET secgroupname = '$secgroup', 
                stuid = '$uniqid', 
                roll = '$roll', 
                puniid = '$new_puniid' 
            WHERE puniid = '$previous_puniid'
        ";
        mysqli_query($link, $updateStudentPaymentQuery) or die(mysqli_error($link));

        // Step 4: Update corresponding record in invoicetrx table
        $updateInvoiceQuery = "UPDATE `invoicetrx` SET iid = '$new_puniid' WHERE iid = '$previous_puniid'";
        mysqli_query($link, $updateInvoiceQuery) or die(mysqli_error($link));

        echo "<span style='color:green;'>Payment and invoice records updated with new puniid: $new_puniid for paycat ID $paycatid.</span><br>";
    }
} else {
    echo "<span style='color:red;'>Error: Unable to find any records in studentpayment table for stuid $stupevid.</span>";
}

}

} else{
echo "<h1 style='color:red;'>Unable to Update. Please Cheak the Roll And Section<h1>";
}
echo "<h4> Student update Susseccfully <a href='studentdashboard.php?classnumber=".$classnumber."'>View Student</a></h4>";


}else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
<input type="hidden" name="new" value="1" />
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<input type="hidden" name="stupevid" value="<?php echo $row['uniqid'];?>" />
    <!--Student Form Part END-->
     <div class="col-md-6">
    <center>
    <h3> Student Part(English) </h3>
    </center>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="name" class="form-control" placeholder="Student Name" value="<?php echo $row['name'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Father's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="fname" class="form-control" placeholder="Father's Name" value="<?php echo $row['fname'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Mother's Name</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mname" class="form-control" placeholder="Mother's Name" value="<?php echo $row['mname'];?>"value="<?php echo $row['name'];?>">
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
            <input type="text" id="Cust-name" name="nameb" class="form-control" placeholder="শিক্ষার্থীর নাম" required="1" autofocus="autofocus" value="<?php echo $row['nameb'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">পিতার নাম</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="fnameb" class="form-control" placeholder="পিতার নাম" required="1"value="<?php echo $row['fnameb'];?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">মাতার নাম</label>
        <div class="col-md-9">
            <input type="text" id="Cust-name" name="mnameb" class="form-control" placeholder="মাতার নাম" required="1"value="<?php echo $row['mnameb'];?>">
        </div>
    </div>

    
    </div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Select Gender</label>
        <div class="col-md-9">
            <select class="form-control" data-placeholder="Select Class" name="sex" required="1">
            <option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?>(Default)</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select>
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
                    <input type="number" id="Cust-name" name="brithid" class="form-control" placeholder="Student Birth ID no" required="1" value="<?php echo $row['birthid'];?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Date Of Birth</label>
                <div class="col-md-9">
                    <input type="date" id="Cust-name" name="sdob" class="form-control" placeholder="Student Date Of Birth" required="1" value="<?php echo $row['dob'];?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Father NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="fnid" class="form-control" placeholder="Father NID Number" required="1"value="<?php echo $row['fnid'];?>">
                </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Mother NID</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mnid" class="form-control" placeholder="Mother Nid Number" required="1"value="<?php echo $row['mnid'];?>">
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
                
                <option value="<?php echo $row['classnumber'];?>"><?php echo $row['classnumber'];?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class Name</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="classname" required="1">
                
                <option value="<?php echo $row['classname']?>"><?php echo $row['classname']?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Group</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroup" required="1">
                <option value="<?php echo $row['secgroup']?>" selected><?php echo $row['secgroup']?> (Defalut)</option>
                <?php
                require "interdb.php";
                $classnumber=$row['classnumber'];
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
                    <input type="number" name="roll" class="form-control" value="<?php echo $row['roll'];?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Address</label>
                <div class="col-md-9">
                    <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>">
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Contuct Number</label>
                <div class="col-md-9">
                    <input type="number" id="Cust-name" name="mobile" class="form-control" placeholder="Student Gurdian Phone Number" required="1" value="<?php echo $row['mobile'];?>">
                </div>
        </div>
    </div>
<!--Academic & Contuct Part End-->


<div class="col-md-12">   
<center> 
<input type="submit" class="btn btn-primary" Value="Edit Student">
</center>
</div>

    <!--Student Form Part END-->
</form>
<?php } ?>
</div>
</div>
</div>
</div>

</div> <!-- End Row -->


</div> <!-- container -->

</div> <!-- content -->
<?php include'inc/footer.php'?>