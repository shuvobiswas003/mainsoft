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
<!--Main Side Bar Menu Start-->
<div id="sidebar-menu">
    <ul>
        <!--Dashboard Menu Start-->
        <li>
            <a href="dashboard.php" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
        </li>
        <!--Dashboard Menu END-->

        <!--Class Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect"><i class="fa fa-book"></i><span>Class/Section/Group</span><span class="pull-right"><i class="md md-add"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="addclass.php"><i class="fa fa-bars"></i>Add/View Class</a></li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>
                            <i class="fa fa-bars"></i>View/Add Section
                        </span> 
                        <span class="pull-right">
                            <i class="md md-add"></i>
                        </span>
                    </a>

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
        </li>
        <!--Class Menu END-->

        <!--Teacher Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-people"></i>
                <span>Teacher</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                <li>
                    <a href="addteacher.php">
                        <i class="fa fa-bars"></i>
                    Add/View Teacher
                    </a>
                </li>
            </ul>
        </li>
        <!--Teacher Menu End-->

        <!--Grade/Subject Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Grade/Subject</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">
                    <li>
                        <a href="addgradename.php">
                            <i class="md-add-circle"></i>
                            Add/View Grade
                        </a>
                    </li>

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
                    
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect">
                            <span>
                                <i class=" md-add-box"></i>Subject
                            </span> 
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
                                            <a href="addsubject.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
                    </ul>
        </li>
        <!--Grade/Subject Menu End-->

        <!--Student Admission Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Admission</span><span class="pull-right"><i class="md md-add"></i></span></a>
            <ul class="list-unstyled">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li>
                    <a href="studentaddmission.php?classnumber=<?php echo $row['classnumber'];?>">
                        <span><i class="md-view-stream"></i>
                            <?php echo $row['classname'];?>
                        </span>
                    </a>
                <?php $count++; } ?>
            </ul>
        </li>
        <!--Student Admission Menu END-->

        <!--Student Information Menu Start-->
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
        <!--Student Information Menu END-->

        <!--Student Regestration Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect"><i class="md-book"></i>
                <span>Student Regestration</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
        <ul class="list-unstyled">
        
        <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect">
                    <span>
                        <i class=" md-add-box"></i>Add Regestration
                    </span>
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
                            <li><a href="studentregadd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                            <?php $count1++; } ?>
                        </ul>
                    </li>
                    <?php $count++; } ?>
                </ul>
        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <span>
                    <i class=" md-add-box"></i>View Regestration
                </span>
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
                            <a href="viewstureg.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
    </ul>
    </li>
    <!--Student Regestration Menu END-->

    <!--Exam Menu Start-->
    <li class="has_sub">
        <a href="#" class="waves-effect">
            <i class=" md-add-box"></i>
            <span>Exam</span>
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        <ul class="list-unstyled">
            <li><a href="examadd.php"><i class="ion-person-add"></i>Add Exam</a></li>
            <li><a href="examview.php"><i class="ion-person-add"></i>View Exam</a></li>
        </ul>
    </li>
    <!--Exam Menu END-->

    <!--Exam Routine Munu Start-->
    <li class="has_sub">
    <a href="#" class="waves-effect">
        <i class="md-book"></i>
        <span>Exam Routine</span>
        <span class="pull-right">
            <i class="md md-add"></i>
        </span>
    </a>
    <ul class="list-unstyled">
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>Add Exam Routine
            </span>
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
                    <li><a href="examroutineadd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>"><span><i class=" md-radio-button-on"></i><?php echo $row1['secgroupname'];?></span></a></li>
                    <?php $count1++; } ?>
                </ul>
            </li>
            <?php $count++; } ?>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>View Exam Rroutine
            </span>
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
                            <a href="examroutineview.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
    </ul>
    </li>
    <!--Exam Routine Munu END-->

    <!--Admit/Seatplan/exam Att Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Admit/Seatplan</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
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
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                <!--Insert Class Data Start-->
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
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Data Start-->
                        <ul style="">
                        <?php
                        $classnumber=$row1['classnumber'];
                        $count3=1;
                        $sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <li>  
                            <a href="admit/stdentadmitprint.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
                                <span>
                                    <i class="fa fa-circle-o"></i>
                                    <?php echo $row2['secgroupname'];?>
                                </span>
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

    <!-- Secoend Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
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
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                <!--Insert Class Data Start-->
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
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Data Start-->
                        <ul style="">
                        <?php
                        $classnumber=$row1['classnumber'];
                        $count3=1;
                        $sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <li>  
                            <a href="seatplan/studentseatplanprint.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
                                <span>
                                    <i class="fa fa-circle-o"></i>
                                    <?php echo $row2['secgroupname'];?>
                                </span>
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
    <!-- Secoend Item  END-->
    </ul>
    </li>
    <!--Admit/Seatplan/exam Att Menu END-->


    <!--Exam MArk Entry Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Exam Markentry</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
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
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                <!--Insert Class Data Start-->
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
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Data Start-->
                        <ul style="">
                        <?php
                        $classnumber=$row1['classnumber'];
                        $count3=1;
                        $sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <li>  
                            <a href="exammarkadd.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
                                <span>
                                    <i class="fa fa-circle-o"></i>
                                    <?php echo $row2['secgroupname'];?>
                                </span>
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

    <!-- Secoend Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
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
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                <!--Insert Class Data Start-->
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
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Data Start-->
                        <ul style="">
                        <?php
                        $classnumber=$row1['classnumber'];
                        $count3=1;
                        $sel_query2="Select * from sectiongroup WHERE classnumber='$classnumber'";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                            <li>  
                            <a href="exammarkview.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
                                <span>
                                    <i class="fa fa-circle-o"></i>
                                    <?php echo $row2['secgroupname'];?>
                                </span>
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
    <!-- Secoend Item  END-->
    </ul>
    </li>
    <!--Exam MArk Entry Menu END-->

    <!--Exam Result Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Result Part</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
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
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                <!--Insert Class Data Start-->
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
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                        <!--Insert Section Data Start-->
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
                                <i class="fa fa-circle-o"></i>
                                <?php echo $row2['secgroupname'];?>
                            </span>
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
    <!--Exam Result Menu END-->

    </ul><!--Main Ul END-->
    <div class="clearfix"></div>
</div>
<!--Main Side Bar Menu END-->



    <div class="clearfix"></div>
    </div>
</div>