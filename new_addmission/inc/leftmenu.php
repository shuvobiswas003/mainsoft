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
            <a href="stuaddbrisbdfile.php" target="_blank" class="waves-effect"><i class="md md-home"></i><span>New Admission </span></a>
        </li>
        <!--Student Admission Menu Start ssc file-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Addmission List</span>
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
                                while($row = mysqli_fetch_assoc($result)) {
                                    $classnumber= $row['classnumber'];?>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>
                                            <i class="md-view-stream"></i>
                                            <?php echo $row['classname'];?>
                                            <i class="md md-add"></i>
                                        </span>
                                    </a>
                                    <ul style="">
                                       
                                        <li>
                                            <a href="admission_list.php?classnumber=<?php echo $classnumber;?>&secgroupname=Admission">
                                                <span>
                                                    <i class=" md-radio-button-on"></i>
                                                    Admission
                                                </span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <?php $count++; } ?>
                            </ul>
                        </li>
<!--Student Admission Menu ssc END-->

 

    </ul>
    <div class="clearfix"></div>
</div>
                    <div class="clearfix"></div>
                </div>
            </div>