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

        <!--Student Admission Menu Start ssc file-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Addmission Form</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
                            <ul style="">
                                <?php
                                require "../interdb.php";
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
                                        
                                        $classnumber=$row['classnumber'];
                                        $count1=1;
                                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                        $result1 = mysqli_query($link,$sel_query1);
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                                        <li>
                                            <a href="student_add_ssc.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Admission Menu ssc END-->

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

<li>
    <a href="addmission_dashboard.php" class="waves-effect"><i class="md md-home"></i><span>Print Addmission Form</span></a>
</li>

<li>
    <a href="single_page_invoice_andprint.php" class="waves-effect"><i class="md md-home"></i><span>Single Page Pay(Card)</span></a>
</li>

<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Single Page Pay(Roll)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
                            <ul style="">
                                <?php
                                require "../interdb.php";
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
                                        
                                        $classnumber=$row['classnumber'];
                                        $count1=1;
                                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                        $result1 = mysqli_query($link,$sel_query1);
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                                        <li>
                                            <a href="single_page_invoice_andprint_roll.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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

   

<!--Student Miltislip Single Print Start-->
<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Print Paid Slip</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
                            <ul style="">
                                <?php
                                require "../interdb.php";
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
                                        require "../interdb.php";
                                        $classnumber=$row['classnumber'];
                                        $count1=1;
                                        $sel_query1="Select * from sectiongroup where classnumber='$classnumber'";
                                        $result1 = mysqli_query($link,$sel_query1);
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                                        <li>
                                            <a href="multipay_single_paid.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Miltislip Single Print END-->




 <li>
    <a href="data_dashboard.php" class="waves-effect"><i class="md md-home"></i><span>Data Controll</span></a>
        </li>

    </ul>
    <div class="clearfix"></div>
</div>
                    <div class="clearfix"></div>
                </div>
            </div>