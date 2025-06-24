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
                require "../interdb.php";
                $count=1;
                $sel_query="Select * from class Order By classnumber";
                $result = mysqli_query($link,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {?>
                <li><a href="studentdashboard.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student Information End-->











<!--PI MArk Entry Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>PI_Entry</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    
         <!-- BArcode Item Multi Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Barcode</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="exam_mark_add_multi_barpi_all.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- BArcode Item Multi END-->



    <!-- BArcode Item Multi Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Manual</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="exam_mark_add_multi_pi_all.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- BArcode Item Multi END-->


   


    <!-- Secoend Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>View PI</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                            <a href="exammarkview67.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
<!--Student Mark Entry End-->




<!--PI MArk Entry Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>PI_Entry(Single)</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    

    <!-- BArcode Item Multi Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Barcode(Single)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="1single_barcode_mark_ready.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- BArcode Item Multi END-->


    <!-- BArcode Item Multi Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Manual(Single)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="exam_mark_add_multi_roll.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- BArcode Item Multi END-->

    


    
    </ul>
    </li>
    <!--Exam MArk Entry Menu END-->
<!--Student Mark Entry End-->






<!--PI MArk Entry Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Delete</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    
         <!-- BArcode Item Multi Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Delete_Mark</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="deletemark.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- BArcode Item Multi END-->



   
    </ul>
    </li>
    <!--Exam MArk Entry Menu END-->
<!--Student Mark Delete-->









<!--PI PRINT Entry Print Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>PI Print</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
    <!-- Frist Item  Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Tabulation</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                    $sel_query1="Select * from class Where classnumber=6 OR classnumber= 7 ORDER BY classnumber";
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
                            <a href="pitabulation67.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Transcript</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                            <a href="printtranscrtipt.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Transcript(Roll)</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
        <ul style="">
            <?php
            require "../interdb.php";
            $gexid;
            $count=1;
            $sel_query="Select * from exam67";
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
                            <a href="pitrans.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- Third  Item  END-->
    </ul>
    </li>
    <!--Exam MArk Entry Menu END-->
<!--PI PRINT End-->



<!--Report Card Start-->
    <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Report Card (Roll)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
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
                            <a href="print_report_card_dash.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
        </li>
<!--Report Card END-->




                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>