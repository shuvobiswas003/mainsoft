 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="img/admin/1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars($_SESSION["username"]); ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="dashboard.php" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
<li>
<a href="export_att_data.php" class="waves-effect"><i class="md md-home"></i><span>Send Att Data</span></a>
</li>

<li>
<a href="schoolsetting.php" class="waves-effect"><i class="md md-home"></i><span>School Setting</span></a>
</li>
<!--Devices Add Start-->
<li>
    <a href="adddevices.php" class="waves-effect">
        <i class="md md-home"></i>
        <span> Add/View Devices </span>
    </a>
</li>

<li>
    <a href="time_table_assign.php" class="waves-effect" target="_blank">
        <i class="md md-home"></i>
        <span> Time Table </span>
    </a>
</li>
<!--Devices END-->

<!--Download Data -->
        <li class="has_sub">
            <a href="#" class="waves-effect"><i class="fa fa-book"></i><span>Download</span><span class="pull-right"><i class="md md-add"></i></span></a>
            <ul class="list-unstyled">
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>
                            <i class="fa fa-bars"></i>Download Attdance
                        </span> 
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>

                    <ul style="">
                        <?php
                        require "interdb.php";
                        $count=1;
                        $sel_query="Select * from devices order by dnumber";
                        $result = mysqli_query($link,$sel_query);
                        while($row = mysqli_fetch_assoc($result)) {?>
                        <li><a href="downloadatt.php?id=<?php echo $row['id'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row['dname'];?></span></a>
                        <?php $count++; } ?>
                    </ul>

                </li>

                
            </ul>
        </li>
        <!--Download Menu END-->
<li>
    <a href="downloadattusb.php" class="waves-effect">
        <i class="md md-home"></i>
        <span> Download by USB </span>
    </a>
</li>

<!--Send data to server-->

<li>
    <a href="teacher_att_dash.php" class="waves-effect">
        <i class="md md-home"></i>
        <span>Teacher/Staff Attdance</span>
    </a>
</li>

<!--View Daily Attdance by Class-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Daily Att(Class)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="viewdailyattclass.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>
<!--View Daily Attdnce By Class END-->

<!--View Daily Attdance by Section Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Daily Att(Section)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li>
                    <a href="javascript:void(0);">
                        <span>
                            <i class="md-view-stream"></i>
                            <?php echo $row['classname'];?>
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul style="">
                        <?php
                        require "interdb.php";
                        $classnumber=$row['classnumber'];
                        $count1=1;
                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                        <li>
                            <a href="viewdailyattsec.php?classnumber=<?php echo $classnumber;?>&secgroup=<?php echo $row1['secgroupname'];?>">
                                <span>
                                    <i class=" md-radio-button-on"></i>
                                    <?php echo $row1['secgroupname'];?>
                                </span>
                            </a>
                        </li>
                        <?php $count1++; } ?>
                    </ul>
                </li>
                <?php $count++; } ?>
            </ul>
        </li>
<!--View Daily attdance by sec END-->



<!--View Monthly Attdance by Class-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Mothly Att(Class)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="viewattdancemonthly.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>
<!--View Monltly Attdnce By Class END-->

<!--View Monthly Attdance by Section Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Monthly Att(Section)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li>
                    <a href="javascript:void(0);">
                        <span>
                            <i class="md-view-stream"></i>
                            <?php echo $row['classname'];?>
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul style="">
                        <?php
                        require "interdb.php";
                        $classnumber=$row['classnumber'];
                        $count1=1;
                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                        <li>
                            <a href="viewmonthlyattsec.php?classnumber=<?php echo $classnumber;?>&secgroup=<?php echo $row1['secgroupname'];?>">
                                <span>
                                    <i class=" md-radio-button-on"></i>
                                    <?php echo $row1['secgroupname'];?>
                                </span>
                            </a>
                        </li>
                        <?php $count1++; } ?>
                    </ul>
                </li>
                <?php $count++; } ?>
            </ul>
        </li>
<!--View Monthly attdance by sec END-->

<!--View Monthly Attdance by Section Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>হাজিরা খাতা(Sec/Group)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li>
                    <a href="javascript:void(0);">
                        <span>
                            <i class="md-view-stream"></i>
                            <?php echo $row['classname'];?>
                            <i class="md md-add"></i>
                        </span>
                    </a>
                    <ul style="">
                        <?php
                        require "interdb.php";
                        $classnumber=$row['classnumber'];
                        $count1=1;
                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                        <li>
                            <a href="viewattdancemonthlysec_sum.php?classnumber=<?php echo $classnumber;?>&secgroup=<?php echo $row1['secgroupname'];?>">
                                <span>
                                    <i class=" md-radio-button-on"></i>
                                    <?php echo $row1['secgroupname'];?>
                                </span>
                            </a>
                        </li>
                        <?php $count1++; } ?>
                    </ul>
                </li>
                <?php $count++; } ?>
            </ul>
        </li>
<!--View Monthly attdance by sec END-->

<!--Leavee Menu Start-->

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Leave & Holyday</span><span class="pull-right"><i class="md md-add"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="holydaybulk.php"><i class="ion-person-add"></i>Add Public Holyday</a></li>
            <li><a href="holydaypersonal.php"><i class="ion-person-add"></i>Personal Leave</a></li>
        </ul>
    </li>

    <!--Leave menu Attdence Menu END-->
<!--Punch Menu Start-->
<li>
    <a href="punchdetails.php" class="waves-effect">
        <i class="fa fa-info" aria-hidden="true"></i>
        <span>Punch Details</span>
    </a>
</li>
<!--Punch menu Attdence Menu END-->

<!--Student Attdance Menu Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Studen Att(Single)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="singlestuattdance.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>
<!--Student Attdance Menu END-->



<!--Server Part-->
<br>
<li>
    <a href="#" class="waves-effect">
        <i class="fa fa-server" aria-hidden="true"></i>
        <span> Server Part & Basic</span>
        <i class="fa fa-arrow-down" aria-hidden="true"></i>
    </a>
</li>


<li>
    <a href="fmachinedataenrollt.php" class="waves-effect">
        <i class="md md-home"></i>
        <span>ID Assign Teacher</span>
    </a>
</li>

<li>
    <a href="fmachinedataenrolls.php" class="waves-effect">
        <i class="md md-home"></i>
        <span>ID Assign Staff</span>
    </a>
</li>
<!--Student Finger Enroll Menu EXCEL Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>ID Assign Student</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
                            <ul style="">
                                <?php
                                require "interdb.php";
                                $count=1;
                                $sel_query="Select * from class Order By classnumber";
                                $result = mysqli_query($link,$sel_query);
                                while($row = mysqli_fetch_assoc($result)) {?>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>
                                            <i class="md-view-stream"></i>
                                            <?php echo $row['classname'];?>
                                            <i class="md md-add"></i>
                                        </span>
                                    </a>
                                    <ul style="">
                                        <?php
                                        require "interdb.php";
                                        $classnumber=$row['classnumber'];
                                        $count1=1;
                                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                        $result1 = mysqli_query($link,$sel_query1);
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                                        <li>
                                            <a href="fmachinedataenroll.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
                                                <span>
                                                    <i class=" md-radio-button-on"></i>
                                                    <?php echo $row1['secgroupname'];?>
                                                </span>
                                            </a>
                                        </li>
                                        <?php $count1++; } ?>
                                    </ul>
                                </li>
                                <?php $count++; } ?>
                            </ul>
                        </li>
<!--Student Finger Enroll Menu EXCEL END-->




<!--See Student Finger Information Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student FP Info</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="studentfpinfo.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student Finger Information End-->



<!--RFID User Start-->
            <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Add Card</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
    <ul style="">
        <?php
        require "interdb.php";
        $count=1;
        $sel_query="Select * from class Order By classnumber";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {?>
        <li>
            <a href="javascript:void(0);">
                <span>
                    <i class="md-view-stream"></i>
                    <?php echo $row['classname'];?>
                    <i class="md md-add"></i>
                </span>
            </a>
<!--Insert Section Data Start-->
<ul style="">
<?php
$classnumber=$row['classnumber'];
$count3=1;
$sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
    <li>  
    <a href="assignrfid.php?classnumber=<?php echo $row['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>">
    <span>
        <i class="fa fa-circle-o"></i>
        <?php echo $row2['secgroupname'];?>
    </span>
    </a>
<!--Insert Section Data End-->

    </li>
<?php $count3++;}?>
</ul>
<!--Insert Section Data End-->    
                </li>
                <?php $count++; } ?>
            </ul>
        </li>
<!--RFID USER Menu END-->

<!--Upload User Start-->
            <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Upload Card to Device</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
    <ul style="">
        <?php
        require "interdb.php";
        $count=1;
        $sel_query="Select * from class Order By classnumber";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {?>
        <li>
            <a href="javascript:void(0);">
                <span>
                    <i class="md-view-stream"></i>
                    <?php echo $row['classname'];?>
                    <i class="md md-add"></i>
                </span>
            </a>
<!--Insert Section Data Start-->
<ul style="">
<?php
$classnumber=$row['classnumber'];
$count3=1;
$sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
?>
    <li>  
    <a href="javascript:void(0);">
    <span>
        <i class="fa fa-circle-o"></i>
        <?php echo $row2['secgroupname'];?>
    </span>
    </a>
<!--Insert Devices Data Start-->
        <ul style="list-style: circle;">
        <?php
        $count4=1;
        $sel_query4="Select * from devices";
        $result4 = mysqli_query($link,$sel_query4);
        while($row4 = mysqli_fetch_assoc($result4)) {
        ?>
            <li>  
            <a href="uploaduser.php?classnumber=<?php echo $row['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&did=<?php echo $row4['id'];?>">
            <span>
                <i class="fa fa-circle-o"></i>
                <?php echo $row4['dname'];?>
            </span>
            </a>
            </li>
        <?php $count4++;}?>
        </ul>
<!--Insert Section Data End-->

    </li>
<?php $count3++;}?>
</ul>
<!--Insert Section Data End-->    
                    </li>
                    <?php $count++; } ?>
                </ul>
            </li>
<!--Upload USER Menu END-->


<li>
    <a href="downloadstudent.php" class="waves-effect" target="_blank">
        <i class="fa fa-download" aria-hidden="true"></i>
        <span>Download Student(live)</span>
    </a>
</li>

<li>
    <a href="downloadcard.php" class="waves-effect" target="_blank">
        <i class="fa fa-download" aria-hidden="true"></i>
        <span>Download RFID CARD(live)</span>
    </a>
</li>


<!--See Student Information Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student Information</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="studentdashboard.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student Information End-->
<!--Add Rfid Excel Start-->
    <li class="">
            <a href="rfidaddexcel.php">
                <i class="md-book"></i>
                <span>RFID Add Excel Roll</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
        </li>


<!--<li>-->
<!--<a href="deletecardstu.php" class="waves-effect"><i class="md md-home"></i><span> INIT STU & CARD </span></a>-->
<!--</li>-->



                        </ul><!--Main Menu UL-->
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>