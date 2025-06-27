 <div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="img/lego.png" alt="" class="thumb-md img-circle">
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

       <li>
            <a href="class_teacher_subject.php" class="waves-effect"><i class="md md-class"></i><span>Class/Teacher/Subject</span></a>
        </li>
    
        <li>
            <a href="student_panel.php" class="waves-effect"><i class="md md-class"></i><span>Student Panel</span></a>
        </li>



    <!--rfid Attdence Menu Start-->

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>Student Attdence</span><span class="pull-right"><i class="md md-add"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="uploadattexcel.php"><i class="ion-person-add"></i>Upload CSV File</a></li>
            <li><a href="holydaybulk.php"><i class="ion-person-add"></i>Add Public Holyday</a></li>
            <li><a href="holydaypersonal.php"><i class="ion-person-add"></i>Personal Leave</a></li>
            <li><a href="viewstuattdancedaily.php"><i class="ion-person-add"></i>View Attdance (Daily)</a></li>
            <li><a href="viewstuattdancemonthly.php"><i class="ion-person-add"></i>View Attdance (Monthly)</a></li>
            

            <!--Spacial Menu class Section Menu Start-->
            <li class="has_sub">
                <!--Name Secondery 1st sub-->
                <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Asign RFID</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                
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
                                    <a href="assignrfid.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>" target="_blank">
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
    <!--Spacial Menu class Section Menu END-->
                <li><a href="takeattdence.php"><i class="ion-person-add"></i>Take Attdence</a></li>
        </ul>
    </li>
    <!--rfid Attdence Menu END-->
    
    <!--Sms Panel Start-->
    
    <li class="has_sub">
            <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>SMS Panel</span><span class="pull-right"><i class="md md-add"></i></span></a>
            <ul class="list-unstyled">
                <li><a href="sms_single.php"><i class="ion-person-add"></i>Send SMS</a></li>
                
                <li><a href="sms_class.php"><i class="ion-person-add"></i>Send SMS(Class)</a></li>
                
                <li><a href="sms_section.php"><i class="ion-person-add"></i>Send SMS(Section)</a></li>
                 <li><a href="sms_result.php"><i class="ion-person-add"></i>Send Result SMS(Class)</a></li>
                
                  <li><a href="remainsmsdash.php"><i class="ion-person-add"></i>SMS REPORT</a></li>
                
            </ul>
           
        </li>
    <!--SMS PPAnel END-->

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
        <!--insert bulk regestration Start-->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <span>
                    <i class=" md-add-box"></i>Bulk Regestration
                </span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <?php
                require "interdb.php";
                $count=1;
               $sel_query = "SELECT * FROM class WHERE classnumber BETWEEN -5 AND 9 ORDER BY classnumber";
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
                            <a href="addbulkreg.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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
        <!--insert bulk regestration END-->

        <!--insert bulk regestration Start 9 and10 -->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <span>
                    <i class=" md-add-box"></i>Bulk Reg(10 to UP)
                </span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <?php
                require "interdb.php";
                $count=1;
                $sel_query="SELECT * FROM class WHERE classnumber NOT IN (6, 7, 8, 9) ORDER BY classnumber;";
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
                            <a href="bulkreg910.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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
        <!--insert bulk regestration END 90&10-->
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
            <li><a href="examview.php"><i class="ion-person-add"></i>View/Edit Exam</a></li>
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
<!--Download Subject For Exam Routine-->
<li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>Download Subject
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
                            <a href="downloadsubject.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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
    <!--Exam Routine Upload-->
    <li>
        <a href="uploadexamroutine.php" class="waves-effect"><i class="md md-home"></i><span>Upload Routine</span></a>
    </li>


    </ul>
    </li>
    <!--Exam Routine Munu END-->

    <!--Student Single admit Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Admit (By roll)</span>
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
                <li><a href="admitsingle.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>
        <!--Student Single Admit Menu END-->

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

    <!-- Admit V2  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Admit(v2)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="admit/student_admitcard_v2.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
    <!-- Avdmit v2 Item  END-->

    <!-- Secoend Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>
                Seatplan
            </span> 
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        
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

    <!-- Third Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>
                Attdance Sheet
            </span> 
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        
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
                            <a href="admit/examattsheet.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
    <!-- Third Item  END-->

    <!-- Third Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect">
            <span>
                <i class=" md-add-box"></i>
                Attdance Sheet V.2
            </span> 
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        
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
                            <a href="admit/exam_att_sheet_v2.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
    <!-- Third Item  END-->
    
    
   

    </ul>
    </li>
    <!--Admit/Seatplan/exam Att Menu END-->

    <!--Barcode Exam Start-->

    
    <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Barcode Exam</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul class="list-unstyled">

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><span><i class="md-add-box"></i>Asign Paper</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                        <ul style="">
                            <?php
                            require "interdb.php";
                            $count=1;
                            $sel_query="Select * from exam Order By exid";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <li>
                                <a href="barcodesinglepaper.php?exid=<?php echo $row['exid'];?>">
                                    <span><i class="md-view-stream"></i>
                                        <?php echo $row['examname'];?>
                                    </span>
                                </a>
                            </li>
                            <?php $count++; } ?>
                        </ul>
                    </li>

                    <!-- Secoend Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Paper</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="barcodepaperview.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
                    <li>
                        <a href="barcodepapermarkentry.php">
                            <i class="md-add-circle"></i>
                            Mark Entry Barcode
                        </a>
                    </li>
                    
                    </ul>
        </li>

   

    <!--Barcode Exam  End-->
    
    <!--mark entry form-->
    <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Mark Form</span>
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
                                            <a href="markentryform.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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

    <!--Exam MArk Entry Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Exam Markentry</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Add/Edit Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <?php
							$dirtrans = ""; // Initialize the variable

							// Check if $classnumber is set and is a valid number
							if (isset($classnumber) && is_numeric($classnumber)) {
							    // Assign $dirtrans based on the value of $classnumber
							    if ($classnumber >= -2 && $classnumber <= 5) {
							        $dirtrans = "exammarkadd_primary.php";
							    } elseif ($classnumber >= 6 && $classnumber <= 9) {
							        $dirtrans = "exammarkadd_6t9.php";
							    } else {
							        $dirtrans = "exammarkadd.php";
							    }
							} else {
							    echo "Invalid or undefined classnumber.";
							}

							
							?>  
                            <a href="<?php echo $dirtrans?>?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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

    <!-- Scan marrk  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Scan Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="scanmarkentry.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- Scan marrk Item  END-->

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
    
    <!--Excel Entry Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Excel Mark Entry</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="exammarkaddexcel.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!--excelentry END-->
    <!-- Secoend Item  Start-->
    <li>

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Mark Entry Status</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                <a href="enrollsubmark.php?examid=<?php echo $row['exid'];?>" target="_blank">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
            </li>
            <?php $count++;}?>
        </ul>

    </li>

    </ul>
    </li>
    <!--Exam MArk Entry Menu END-->

    <!--Exam Result Menu Start-->
 
<li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Result Part</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">

<!--Cal cluate Result Start-->
    <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Clacluate Result</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                    <?php
                    $classnumber=$row1['classnumber'];
                    $dirtrans;
                    switch($classnumber){
                        case'10':
                            $dirtrans='stumerit910.php';
                            break;
                        case'9':
                            $dirtrans='stumerit910.php';
                            break;
                        case'8':
                        $dirtrans='stumerit8.php';
                        break;
                        default:
                            $dirtrans='stumerit.php';
                    }
                    ?>
                    
                    <li>
                        <a href="transcript/<?php echo $dirtrans;?>?classnumber=<?php echo $row1['classnumber'];?>&examid=<?php echo $gexid;?>" target="_blank">
                            <span>
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                    </li>
                    <?php $count1++;}?>
                </ul>
                <!--Insert Class Data END-->
            </li>
            <?php $count++;}?>
        </ul>
    </li>
<!--Cal cluate Result END-->

<!--Transcript Start-->
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
                     <?php
							$dirtrans = ""; // Initialize the variable

							// Check if $classnumber is set and is a valid number
							if (isset($classnumber) && is_numeric($classnumber)) {
							    // Assign $dirtrans based on the value of $classnumber
							    if ($classnumber >= -2 && $classnumber <= 5) {
							        $dirtrans = "transcript/studenttrans.php";
							    } elseif ($classnumber >= 6 && $classnumber <= 9) {
							        $dirtrans = "transcript/studenttrans_9t9.php";
							    } else {
							        $dirtrans = "transcript/studenttrans.php";
							    }
							} else {
							    echo "Invalid or undefined classnumber.";
							}

							
							?>
                        
                            <li>  
                            <a href="<?php echo $dirtrans?>?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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

<!--Transcript END-->

    <!-- Tabulation Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Tabulation Sheet</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="transcript/stutabulation.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
    <!-- Tabulation Item  END-->


<!--View Merit List  Start-->
<li>
<a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Merit List</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                        <a href="transcript/viewmeritlist.php?classnumber=<?php echo $row1['classnumber'];?>&examid=<?php echo $gexid;?>" target="_blank">
                            <span>
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                    </li>
                    <?php $count1++;}?>
                </ul>
                <!--Insert Class Data END-->
            </li>
            <?php $count++;}?>
        </ul>
    </li>
<!--View Merit List END-->

<!--View Pass/Fail List  Start-->
<li>
<a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Pass/Fail List</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                        <a href="transcript/viewpassfaillist.php?classnumber=<?php echo $row1['classnumber'];?>&examid=<?php echo $gexid;?>" target="_blank">
                            <span>
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                    </li>
                    <?php $count1++;}?>
                </ul>
                <!--Insert Class Data END-->
            </li>
            <?php $count++;}?>
        </ul>
    </li>
<!--View Pass/Fail List END-->

<!--View Fail List  Start-->
<li>
<a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View Fail List</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                        <a href="transcript/viewfaillist.php?classnumber=<?php echo $row1['classnumber'];?>&examid=<?php echo $gexid;?>" target="_blank">
                            <span>
                                <i class="fa fa-circle"></i>
                                <?php echo $row1['classname'];?>
                                <i class="md md-add">
                                </i>
                            </span>
                        </a>
                    </li>
                    <?php $count1++;}?>
                </ul>
                <!--Insert Class Data END-->
            </li>
            <?php $count++;}?>
        </ul>
    </li>
<!--View Fail List END-->


    <!--Result Summery  All Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Reult Summery</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                <a href="transcript/resultsummery.php?examid=<?php echo $gexid;?>" target="_blank">
                    <span>
                        <i class="fa fa-bars"></i>
                        <?php echo $row['examname'];?>
                        <i class="md md-add">
                        </i>
                    </span>
                </a>
                
            </li>
            <?php $count++;}?>
        </ul>
    </li>

    <!--Result Summery  All END-->

    <!--Publish RESULT START-->
<li>
<a href="publishresult.php" class="waves-effect"><i class="md md-home"></i><span> PUBLISH RESULT </span></a>
</li>
    <!--PUBLISH RESULT END-->
    </ul>
    </li>

    <!--Exam Result Menu END-->

<!--rEPORT Menu Start-->
        <li>
            <?php
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$folder = dirname($_SERVER['SCRIPT_NAME']);

$baseUrl = $protocol . $host . $folder;
            ?>
            <a href="<?php echo $baseUrl;?>/testimonial/" target="_blank" class="waves-effect"><i class="md md-home"></i><span>Report Manager</span></a>
        </li>
        <!--rEPORT Menu END-->


    <!--School Setting and Login Part Start-->
    <li class="has_sub">
        <a href="#" class="waves-effect">
            <i class=" md-add-box"></i>
            <span>Login & Setting</span>
            <span class="pull-right">
                <i class="md md-add"></i>
            </span>
        </a>
        <ul class="list-unstyled">

            <li>
            <a href="schoolsetting.php" class="waves-effect"><i class="md md-home"></i><span> School Setting </span></a>
            </li>

            <li><a href="teacherloginadd.php"><i class="ion-person-add"></i>Add Teacher Login</a></li>
           <li><a href="teacherlogin_log.php"><i class="ion-person-add"></i>Teacher_Log</a></li>

            <li><a href="accountantadd.php" target="_blank"><i class="ion-person-add"></i>Add Accountant</a></li>

            <li><a href="accountantview.php"s><i class="ion-person-add"></i>View Accountant</a></li>
            <li><a href="libary_add_libariyan.php" target="_blank"><i class="ion-person-add"></i>Add Librarian</a></li>

            <li><a href="libary_view_libariyan.php"s><i class="ion-person-add"></i>View Librarian</a></li>


        </ul>
    </li>

    <!--School Setting and Login Part END-->
        
        
    


    </ul><!--Main Ul END-->
    <div class="clearfix"></div>
</div>
<!--Main Side Bar Menu END-->



    <div class="clearfix"></div>
    </div>
</div>