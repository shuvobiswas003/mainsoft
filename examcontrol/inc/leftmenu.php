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
                                <a href="addbuilding.php" class="waves-effect"><i class="md md-home"></i><span>Add Building</span></a>
                            </li>
                            <li>
                                <a href="addroom.php" class="waves-effect"><i class="md md-home"></i><span>Add/View Room</span></a>
                            </li>
                            <li>
                                <a href="addbench.php" class="waves-effect"><i class="md md-home"></i><span>Bench Asign</span></a>
                            </li>

<!--Exam Result Menu Start-->
    <li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Seat</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
        
        
    <!-- Seat Item I Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Class-1 I Sys</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="addstudent.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- seat Item  END-->

    <!-- Seat Item c1-c2 I Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Seat C1-C2</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="addstudentc1c2.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- seat Item  END-->

    <!-- Seat Item c1-c2-c1 I Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Seat C1-C2-C1</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="addstudentc1c2c1.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- seat Item  END-->

    <!-- Seat Item c1-c2-c3 I Start-->
    <li class="has_sub">

        <!--Name Secondery 1st sub-->
        <a href="javascript:void(0);" class="waves-effect"><span><i class=" md-add-box"></i>Seat C1-C2-C3</span> <span class="pull-right"><i class="md md-add"></i></span></a>
        
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
                            <a href="addstudentc1c2c3.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
    <!-- seat Item  END-->








    
    </ul>
    </li>
    <!--Exam Result Menu END-->

    
        
       


                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>