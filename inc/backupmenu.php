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
                            <!--Class/Section Section Started-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-book"></i><span>Class/Section/Group</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                 <li><a href="addclass.php"></i>Add/View Class</a></li>

                                 <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><span>View/Add Section</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                        <ul style="">
                                            <?php
                                            require "interdb.php";
                                            $count=1;
                                            $sel_query="Select * from class order by classnumber";
                                            $result = mysqli_query($link,$sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {?>
                                            <li><a href="addsection.php?class=<?php echo $row['classnumber'];?>"><span><?php echo $row['classname'];?></span></a>
                                            <?php $count++; } ?>
                                        </ul>
                                    </li>
                                </ul>
                            <!--Class/Section Section Started-->

                            <!--Teacher Section Started-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-people"></i><span>Teacher</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="addteacher.php">Add/View Teacher</a>
                                    </li>
                                </ul>
                            </li>
                            <!--Class/Section Section END-->

    <!--Grade/Subject Section Started-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md-book"></i><span>Grade/Subject</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                 <li><a href="addgradename.php"><i class="md-add-circle"></i>Add/View Grade</a></li>

                                 <li class="has_sub">
                                        <a href="javascript:void(0);" class="waves-effect"><span><i class="md-add-box"></i>Add Grademarks</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                        <ul style="">
                                            <?php
                                            require "interdb.php";
                                            $count=1;
                                            $sel_query="Select * from gradename";
                                            $result = mysqli_query($link,$sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {?>
                                            <li><a href="addgrademarks.php?gradecode=<?php echo $row['gradecode'];?>"><span><i class="md-view-stream"></i><?php echo $row['gradename'];?></span></a>
                                            </li>
                                            <?php $count++; } ?>
                                        </ul>
                                    </li>
<!--Subject spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Subject</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li><a href="addsubject.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--Subject spachial Menu-->
                                </ul>
                            </li>
                            <!--Grade/Subject Section END-->

                            <!--Student Admission Start-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Admission</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <?php
                                            require "interdb.php";
                                            $count=1;
                                            $sel_query="Select * from class Order By classnumber";
                                            $result = mysqli_query($link,$sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {?>
                                            <li><a href="studentaddmission.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                                            <?php $count++; } ?>
                                    
                                </ul>
                            </li>

                            <!--Student Admission END-->

                            <!--Student Information Start-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Information</span><span class="pull-right"><i class="md md-add"></i></span></a>
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
                            <!--Student Information END-->

<!--Student Regestration Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Student Regestration</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Add Regestration</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li><a href="studentregadd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--REG spachial Menu-->

<!--View Regestration Status START-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Regestration</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li><a href="viewstureg.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--View Regestration Status START-->
    </ul>
</li>
<!--Regestration Part End-->




<!--Exam Part Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Exam</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="examadd.php"><i class="ion-person-add"></i>Add Exam</a></li>
        <li><a href="examview.php"><i class="ion-person-add"></i>View Exam</a></li>
    </ul>
</li>
<!--Exam Part END-->



<!--Student Exam Part Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Exam Routine</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Add Exam Routine</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li><a href="examroutineadd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--REG spachial Menu-->

<!--View Regestration Status START-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Exam Rroutine</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li><a href="examroutineview.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--View Regestration Status START-->
    </ul>
</li>
<!--Exam Routine Part End-->
                            
<!--Student Exam Mark Entry Part Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Admit/Seatpan/Other</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Admit</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="admit/stdentadmitprint.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--Spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Seatplan</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="seatplan/studentseatplanprint.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
    </ul>
</li>
<!--Exam Admit Entry Part End-->



<!--Student Exam Mark Entry Part Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Exam Markentry</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Add Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="exammarkadd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--Spachial Mark Entry  Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="exammarkview.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--View Mark Entry Status START-->

<!--View Regestration Status START-->
    </ul>
</li>
<!--Exam Mark Entry Part End-->




<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Admit/Seatpan/Other</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Admit</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="admit/stdentadmitprint.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>





                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--Spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Seatplan</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="seatplan/studentseatplanprint.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
    </ul>
</li>
<!--Exam Admit Entry Part End-->



<!--Student REsult Part Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Result Part</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
<!--Regs spachial Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Transcript</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li>
                        <a href="javascript:void(0);">
                            <span>
                                <i class="md-view-stream"></i>
                                <?php echo $row['examname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                    <!--Insert Class Start -->
                    <ul style="">
                        <?php 
                        $count1=1;
                        $sel_query1="Select * from class ORDER BY classnumber";
                        $result1 = mysqli_query($link,$sel_query1);
                        while($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                        <li>
                        <a href="javascript:void(0);">
                            <span>
                                <i class="md-view-"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Start-->
                        <ul style="">
                        <?php
                        $classnumber=$row1['classnumber'];
                        $count3=1;
                        $sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <li>
                            <a href="transcript/studenttrans.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
                            <span>
                                <i class="chevron-circle-down"></i>
                                <?php echo $row2['secgroupname'];?>
                                
                                </i>
                            </span>
                            </a>
                        </li>
                        <?php $count3++; } ?>
                        </ul>
                        <!--Insert Section Start-->
                        </li>
                        <?php $count1++; } ?>
                    </ul>
                    <!--Insert Class END-->

                    </li>
            <?php $count++; } ?>
        </ul>
    </li>
<!--Spachial Mark Entry  Menu-->
<li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                <ul style="">
                    <?php
                    require "interdb.php";
                    $gexid;
                    $count=1;
                    $sel_query="Select * from exam";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {
                        $gexid=$row['exid'];
                        ?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['examname'];?><i class="md md-add"></i> </span></a>
<!--Insert Class Section Start-->
                <ul style="">
                    <?php
                    require "interdb.php";
                    $count=1;
                    $sel_query="Select * from class Order By classnumber";
                    $result = mysqli_query($link,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <li><a href="javascript:void(0);"><span><i class="md-view-stream"></i><?php echo $row['classname'];?><i class="md md-add"></i> </span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $classnumber=$row['classnumber'];
                            $count1=1;
                            $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                            $result1 = mysqli_query($link,$sel_query1);
                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                            <li>
<a href="exammarkview.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>&examid=<?php echo $gexid;?>">
    <span>
        <i class=" md-radio-button-on"></i>
        <?php echo $row1['secgroupname'];?></span>
    </a>
                            </li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>


<!--Insert Class Section End-->


                    </li>
                    <?php $count++; } ?>
                </ul>
    </li>
<!--View Mark Entry Status START-->

<!--View Regestration Status START-->
    </ul>
</li>
<!--Exam Result Part End-->


<!--Student Payment Start-->
<li class="has_sub">
    <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Payment</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <ul class="list-unstyled">
        <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="studentpayment.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
        
    </ul>
</li>

<!--Student Payment END-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Exam Seatplan</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="seatplansix.php"><i class="ion-person-add"></i>Class Six</a></li>
                                     <li><a href="seatplanseven.php"><i class="ion-person-add"></i>Class Seven</a></li>
                                     <li><a href="seatplaneight.php"><i class="ion-person-add"></i>Class eight</a></li>
                                    <li><a href="seatplannine.php"><i class="ion-person-add"></i>Class Nine</a></li>
                                    <li><a href="seatplanten.php"><i class="ion-person-add"></i>Class Ten</a></li>
                                    
                                </ul>
                            </li>

                            <!--Attdence Menu Start-->

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Attdence</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="rfidasigncard.php"><i class="ion-person-add"></i>Card Asign</a></li>
                                    <li><a href="takeattdence.php"><i class="ion-person-add"></i>Take Attdence</a></li>
                                </ul>
                            </li>
                            <!--Attdence Menu Start-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Demo Menu</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="seatplansix.php"><i class="ion-person-add"></i>Class Six</a></li>
                                     <li><a href="seatplanseven.php"><i class="ion-person-add"></i>Class Seven</a></li>
                                     <li><a href="seatplaneight.php"><i class="ion-person-add"></i>Class eight</a></li>
                                    <li><a href="seatplannine.php"><i class="ion-person-add"></i>Class Nine</a></li>
                                    <li><a href="seatplanten.php"><i class="ion-person-add"></i>Class Ten</a></li>
                                    
                                </ul>
                            </li>

                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>