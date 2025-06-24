<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Catagory</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pcatname= $_POST['pcatname'];
        $amount= $_POST['amount'];
        require "../interdb.php";
        $sql ="INSERT INTO paycat(pcatname,amount) VALUES ('$pcatname','$amount') "; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Catagory Added Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Catagory Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Payment Heading</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="pcatname" class="form-control" placeholder="Pay Heading Name">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Amount</label>
                    
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="amount" class="form-control" placeholder="Amount">
                    </div>
                </div>
                
                
                <input type="submit" class="btn btn-primary" Value="Add Pay Catagory">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Pay Catagory</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from paycat";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["pcatname"]; ?></td>
<td>

<a href="paycat_edit.php?id=<?php echo $row["id"];?>">
    <button class="btn btn-primary">EDIT</button>
</a>

<?php
require '../interdb.php';
$pid=$row["id"];
$pdelete="";
$sql1 = "SELECT * FROM studentpayment WHERE  pcatid= '$pid' LIMIT 1";
$result1 = mysqli_query($link, $sql1);
while($row1 = mysqli_fetch_assoc($result1)) {
   $pdelete=$row1['pcatid'];
}
if ($pdelete==$pid) {
echo "<h4 style='color:red'>Cant Delete(Enrolled)</h4>";
}else{
    ?>
    <a href="deletepaycat.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" target="_blank">Delete</button> </a>
    <?php
}

?>


</td>
                                
                            </tr>
                    <?php $count++; } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>