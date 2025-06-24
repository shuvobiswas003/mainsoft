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
                                <h4 class="pull-left page-title">Holyday</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Public Holyday</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $holydayname= $_POST['holydayname'];
        $holydaynumber= $_POST['holydaynumber'];
        $startdate=$_POST['startdate'];
        $sdate=date( "Y-m-d", strtotime($startdate));
        $enddate=$_POST['enddate'];
        $edate=date( "Y-m-d", strtotime($enddate));
        $numoffriday;

    //count Friday
    $startDate = $sdate;
    $endDate = $edate;

    $resultDays = array('Monday' => 0,
    'Tuesday' => 0,
    'Wednesday' => 0,
    'Thursday' => 0,
    'Friday' => 0,
    'Saturday' => 0,
    'Sunday' => 0);

    // change string to date time object
    $startDate = new DateTime($startDate);
    $endDate = new DateTime($endDate);

    // iterate over start to end date
    while($startDate <= $endDate ){
        // find the timestamp value of start date
        $timestamp = strtotime($startDate->format('d-m-Y'));

        // find out the day for timestamp and increase particular day
        $weekDay = date('l', $timestamp);
        $resultDays[$weekDay] = $resultDays[$weekDay] + 1;

        // increase startDate by 1
        $startDate->modify('+1 day');
    }

    // print the result
    $numoffriday= $resultDays['Friday'];
    $numofsaturday= $resultDays['Saturday'];

    $actual=$holydaynumber-($numoffriday+$numofsaturday);

    require "interdb.php";
    $sql ="INSERT INTO publicholyday(holydayname,numofday,sdate,edate,friday,actualday) VALUES ('$holydayname','$holydaynumber','$sdate','$edate','$numoffriday','$actual') "; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Holyday Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Holyday Already Exists</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Holyday Name</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="holydayname" class="form-control" placeholder="Enter Holyday Name" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Number Of Days</label>
                    <div class="col-md-9">
                        <input type="number" id="Cust-name" name="holydaynumber" class="form-control" placeholder="Number Of Days">
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select Start Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="startdate" class="form-control" placeholder="Number of Holydays" required="1">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Select End Date</label>
                    <div class="col-md-9">
                        <input type="date" id="Cust-name" name="enddate" class="form-control" placeholder="Enter Class Name" required="1">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" Value="Add Holyday">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Holyday</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Holyday Name</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Number Of Days</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from publicholyday";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["holydayname"]; ?></td>
                                <td><?php echo $row["sdate"]; ?></td>
                                <td><?php echo $row["edate"]; ?></td>
                                <td><?php echo $row["numofday"]; ?></td>
                                <td>
                                <a href="holydaydelete.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Holyday?');">Delete</button> </a>
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