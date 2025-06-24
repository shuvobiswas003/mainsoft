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
                                <h4 class="pull-left page-title">Datatable</h4>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">View Student </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Sec/Group</th>
                                        <th>Roll</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Card No</th>
                                        <th>Print Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                             
                            <tbody>
                            <?php
                            $classnumber=$_REQUEST['classnumber'];
                            require "../interdb.php";
                            $count=1;
                            $sel_query="Select * from student where classnumber=$classnumber ORDER BY roll ASC;";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $row["classnumber"]; ?></td>
                                <td><?php echo $row["secgroup"]; ?></td>
                                <td><?php echo $row["roll"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td>
                                    <!--Img Start-->
                                    <?php
                                    $imgsl=$row["imgname"];
                                    if($imgsl=="IMG_0.png" OR $imgsl=""){
                                    ?>
                                    <img src="../img/student/<?php echo $row['classnumber']; ?>/<?php echo $row['roll']; ?>.jpg?<?php echo time();?>" style="height: 130px;">
                                    <?php
                                    }else{
                                    ?>
                                    <img src="../img/student/<?php echo $row['imgname'];?>?<?php echo time();?>" style="height: 130px;">
                                    <?php echo $row['imgname'];?>

                                    <?php
                                    }
                                    ?>
                                    <!--Img End-->
                                    
                                </td>
                                <td>
                                    <?php
                                    $uniqid=$row['uniqid'];
                                    $count2=1;
                                    $sel_query2="Select * from rfid where stuid='$uniqid'";
                                    $result2 = mysqli_query($link,$sel_query2);
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <?php echo $row2['rfid'];?>
                                <?php $count2++; } ?>
                                </td>
                                <td>
                                    <?php
                                    $uniqid=$row['uniqid'];
                                    $count2=1;
                                    $sel_query2="Select * from cardprintstatus where stuid='$uniqid'";
                                    $result2 = mysqli_query($link,$sel_query2);
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                ?>
                                <?php echo $row2['date'];?>-<?php echo $row2['time'];?>
                                <?php $count2++; } ?>
                                </td>
                            <td class="actions">
                            
                            
                            
                            <a href="studenteditinfo.php?id=<?php echo $row['id'];?>"  target="_blank"><button type="button" class="btn btn-primary">Edit</button> </a>
                            
                            
                            <a href="studentphotoedit.php?id=<?php echo $row['id'];?>" target="_blank" ><button type="button"  class="btn btn-success">Picture</button> </a>
                            <?php
                            $classnumber=$row['classnumber'];
                            $dirtrans;
                            switch($classnumber){
                                case'11':
                                    $dirtrans='idcardroll10.php';
                                    break;
                                case'10':
                                $dirtrans='idcardroll10.php';
                                break;
                                case'9':
                                    $dirtrans='idcardroll69.php';
                                    break;
                                case'8':
                                $dirtrans='idcardroll8.php';
                                break;
                                case'7':
                                $dirtrans='idcardroll7.php';
                                break;
                                case'6':
                                $dirtrans='idcardroll6.php';
                                break;
                                default:
                                    $dirtrans='idcardroll69.php';
                            }
                            ?>
                            <a href="../data/idcard/idcardroll_stu.php?id=<?php echo $row['id'];?>" target="_blank"><button type="button" class="btn btn-success">Print ID</button> </a>


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
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>