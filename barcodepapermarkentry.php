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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Class</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $barcode= $_POST['barcode'];
        $cq= $_POST['cq'];
        $mcq= $_POST['mcq'];
        $prac= $_POST['prac'];
        $total=$cq+$mcq+$prac;

        //find grade code
        $gradecode;
        require "interdb.php";
        $sel_query="SELECT * FROM exammark WHERE barcode='$barcode'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
        $gradecode=$row['gradecode'];
        }
        //get lettter point
        $letterpoint;
        $lettergrade;
        //fatch data from grade
        $sel_query="SELECT * FROM grademark WHERE gradecode='$gradecode' AND ($total BETWEEN markfrom AND markupto)";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $letterpoint=$row['letterpoint'];
            $lettergrade=$row['lettergrade'];
        }
        
       $sql="UPDATE exammark set cq='$cq',mcq='$mcq',practical='$prac',total='$total',letterpoint='$letterpoint',lettergrade='$lettergrade' WHERE barcode='$barcode'";
        if(mysqli_query($link, $sql)){
        echo "<h4 style='color:green'>Mark Insert Successfully</h4>";

        } else{
        echo "Cheak Barcode";
        }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Scan Paper Barcode</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="barcode" class="form-control" placeholder="Scan Barcode" autofocus="autofocus" required="1">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">CQ Number</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="cq" class="form-control" placeholder="Enter class number" required="1" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">MCQ Number</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="mcq" class="form-control" placeholder="Enter class number" value="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Practical Number</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="prac" class="form-control" placeholder="Enter class number" value="0">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Mark">
            </form>
            <br>
            <br>

<!--Section View Part Start-->

<!--Section View Part END-->

        </div><!--End of panel Body-->
    
    </div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>