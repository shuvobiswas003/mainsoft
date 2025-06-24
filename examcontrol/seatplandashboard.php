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
                                <h4 class="pull-left page-title">Catagory</h4>
                            </div>
                        </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Page Title</h3>
            </div>
<div class="panel-body">
<!--Main View Part Start-->

<div class="col-md-4">
<div id="sidebar-menu">
<ul>
        
        <!--Admit/Seatplan/exam Att Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><h2><i class="md-book"></i><span>Seatplan</span><span class="pull-right"><i class="md md-add"></i></span></h2></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><h3><span><i class=" md-add-box"></i>Seatplan I System</span> <span class="pull-right"><i class="md md-add"></i></span></h3></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam";
            $result = mysqli_query($link,$sel_query);
            while($row = mysqli_fetch_assoc($result)) {
            $gexid=$row['exid'];
            ?>
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <h4>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                        </h4>
                    </span>
                </a>
                <!--Insert Class Data Start-->
                <ul style="">
                    <?php 
                    $count1=1;
                    $sel_query1="Select * from building Order By bnumber";
                    $result1 = mysqli_query($link,$sel_query1);
                    while($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <li>
                        <a href="javascript:void(0);">
                            <h4>
                            <span>
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['bname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                            </h4>
                        </a>
                        <!--Insert Section Data Start-->
                        <ul style="">
                        <?php
                        $bnumber=$row1['bnumber'];
                        $count3=1;
                        $sel_query2="Select * from buildingroom where bnumber='$bnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <li>  
                            <a href="printseatplan.php?bnumber=<?php echo $row1['bnumber'];?>&roomnmber=<?php echo $row2['roomnumber'];?>&examid=<?php echo $gexid;?>&colofbench=<?php echo $row2['rowofbench'];?>" target="_blank">
                                <h4>
                                <span>
                                    <i class="fa fa-circle-o"></i>
                                    <?php echo $row2['roomname'];?>
                                </span>
                                </h4>
                            </a>
                            </li>
                        <?php $count3++;}?>
                        </ul>
                        <!--Insert Section Data End-->
                    </li>
                    <?php $count1++;}?>
                </ul>
                <!--Insert Class Data END-->
            </li>
            <?php $count++;}?>
        </ul>

    </li>
    <!-- Frist Item  END-->

    </ul>
    </li>
    <!--Admit/Seatplan/exam Att Menu END-->

</ul>
</div>
</div>
<!--Main View Part End-->
</div><!--End of panel Body--> 
</div>
</div>

                            
</div> <!-- End Row -->
</div> <!-- container -->       
</div> <!-- content -->
<?php include'inc/footer.php'?>