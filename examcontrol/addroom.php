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
                                <h4 class="pull-left page-title">Room</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add Room</h3>
            </div>
            <div class="panel-body">
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $bnumber= $_POST['bnumber'];
        $roomfloor= $_POST['roomfloor'];
        $roomname= $_POST['roomname'];
        $roomnumber= $_POST['roomnumber'];
        $seatcaicity= $_POST['seatcaicity'];
        $rowofbench= $_POST['rowofbench'];
        $uniid=$bnumber.$roomnumber;
        require "../interdb.php";
        $sql ="INSERT INTO buildingroom(bnumber,roomfloor,roomname,roomnumber,seatcapacity,rowofbench,uniid) VALUES ('$bnumber','$roomfloor','$roomname','$roomnumber','$seatcaicity','$rowofbench','$uniid')ON DUPLICATE KEY UPDATE bnumber='$bnumber',roomfloor='$roomfloor',roomname='$roomname',roomnumber='$roomnumber',seatcapacity='$seatcaicity',rowofbench='$rowofbench'"; 
    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Room Added</h1>.";
    } else{
        echo "<h3 style='color:red;'>Room Updated</h1>";
    }
    mysqli_close($link);

    }
?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label" for="Cust-name">Select Building</label>
                <div class="col-md-9">
                    <select class="form-control" data-placeholder="Select Class" name="bnumber" required="1">
                    <?php
                    require "../interdb.php";
                    $count=1;
                    $sel_query="Select * from building;";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <option value="<?php echo $row['bnumber']?>"><?php echo $row['bname']?></option>
                    <?php $count++; } ?> 
                    </select>
                </div>
             </div>

             <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Room Floor</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="roomfloor" class="form-control" placeholder="Enter Room Floor">
                    </div>
                </div>

              <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Room Name</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="roomname" class="form-control" placeholder="Enter Room Name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Room Number</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="roomnumber" class="form-control" placeholder="Enter Room Number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Seat Capacity</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="seatcaicity" class="form-control" placeholder="Enter Seat Capacity">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="Cust-name">Collumn Of Bench</label>
                    <div class="col-md-9">
                        <input type="text" id="Cust-name" name="rowofbench" class="form-control" placeholder="Enter Class Name">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" Value="Add Room">
            </form>
            <br>
            <br>

<!--Section View Part Start-->
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">View Room</h3>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Buinding ID</th>
                        <th>Building Name</th>
                        <th>Room Floor</th>
                        <th>Room Name</th>
                        <th>Room Number</th>
                        <th>Total Seat</th>
                        <th>Col of Bench</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        require "../interdb.php";
                        $count=1;
                        $sel_query="Select * from buildingroom";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row['bnumber']; ?></td>
                                <td>
                                <?php
                                $bnumber=$row['bnumber'];
                                $sel_query1="SELECT * FROM building where bnumber='$bnumber'";
                                $result1 = mysqli_query($link,$sel_query1);
                                while($row1 = mysqli_fetch_assoc($result1)) {
                                    echo $row1['bname'];
                                }
                                    ?>
                                </td>
                                <td><?php echo $row['roomfloor']; ?></td>
                                <td><?php echo $row['roomname']; ?></td>
                                <td><?php echo $row['roomnumber']; ?></td>
                                <td><?php echo $row['seatcapacity']; ?></td>
                                <td><?php echo $row['rowofbench']; ?></td>
                                <th>
                                    <a href="deleteroom.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Room?');">Delete</button> </a>
                                </th>
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