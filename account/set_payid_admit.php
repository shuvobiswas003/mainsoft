<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
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
                                        <h3 class="panel-title">Set Pay ID</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $classnumber= $_POST['classnumber'];
        $secgroupname=$_POST['secgroupname'];
        $exid=$_POST['exid'];
        $pay_id=$_POST['pay_id'];

require "../interdb.php";
$pay_ids = explode(',', $pay_id);
foreach ($pay_ids as $single_pay_id) {
$uni=$classnumber.$secgroupname.$exid.$single_pay_id;
    $query = "INSERT INTO set_admit_id (examid, classnumber, secgroupname, payid,uni) 
              VALUES ('$exid', '$classnumber', '$secgroupname', '$single_pay_id','$uni') 
              ON DUPLICATE KEY UPDATE 
              examid = VALUES(examid), 
              classnumber = VALUES(classnumber), 
              secgroupname = VALUES(secgroupname), 
              payid = VALUES(payid),
              uni = VALUES(uni)";
    if(mysqli_query($link, $query)){
        echo "<h3 style='color:green'>Expense inserted successfully.</h3>"; 
        } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="classnumber" required="1">      
                    <option value="<?php echo $classnumber?>"><?php echo $classnumber?></option>
                </select>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Section</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="secgroupname" required="1">      
                    <option value="<?php echo $secgroupname?>"><?php echo $secgroupname?></option>
                </select>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Exam</label>
            <div class="col-md-9">
                <select class="form-control" data-placeholder="Select Class" name="exid" required="1">
                    <option value="">Select Exam</option>
                <?php
                require "../interdb.php";
                $count=1;
                $sel_query="Select * from exam;";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <option value="<?php echo $row['exid']?>"><?php echo $row['examname']?></option>
                <?php $count++; } ?> 
            
                </select>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Pay ID</label>
            <div class="col-md-9">
                <input type="text" name="pay_id" class="form-control">
            </div>
        </div>
                                                      
        <input type="submit" class="btn btn-primary" Value="Set Pay ID">
    </form>
                                    


<div class="panel-body">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Secction</th>
                    <th>Exam ID</th>
                    <th>Exam Name</th>
                    <th>Pay ID</th>
                </tr>
            </thead>

     
    <tbody>
    <?php
    require "../interdb.php";
    $sel_query = "SELECT s.id, s.classnumber, s.secgroupname, s.examid, e.examname, GROUP_CONCAT(s.payid) AS pay_ids 
                  FROM set_admit_id s
                  INNER JOIN exam e ON s.examid = e.exid
                  GROUP BY s.id";
    $result = mysqli_query($link, $sel_query);
    while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["classnumber"]; ?></td>
            <td><?php echo $row["secgroupname"]; ?></td>
            <td><?php echo $row["examid"]; ?></td>
            <td><?php echo $row["examname"]; ?></td>
            <td><?php echo $row["pay_ids"]; ?></td>
            
        </tr>
    <?php } ?>
</tbody>
</table>

    </div>
</div>
</div><!--Panel Body-->

</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>