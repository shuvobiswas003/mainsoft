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
<a href="cratetesti.php" class="waves-effect"><i class="md md-home"></i><span> Create Testimonial</span></a>
</li>

<li>
<a href="cratetestibyresult.php" class="waves-effect"><i class="md md-home"></i><span> Create Testimonial(byresult)</span></a>
</li>


<li>
<a href="viewtesti.php" class="waves-effect"><i class="md md-home"></i><span>View Testimonial</span></a>
</li>

<li>
<a href="create_protyon.php" class="waves-effect"><i class="md md-home"></i><span>প্রত্যয়ন পত্র</span></a>
</li>

<li>
<a href="view_protyon.php" class="waves-effect"><i class="md md-home"></i><span>View প্রত্যয়ন পত্র</span></a>
</li>

<li>
<a href="create_tc.php" class="waves-effect"><i class="md md-home"></i><span>Create TC</span></a>
</li>

<li>
<a href="view_tc.php" class="waves-effect"><i class="md md-home"></i><span>View TC</span></a>
</li>







<!--Student Payment Start
<li class="has_sub">
    <a href="#" class="waves-effect">
        <i class=" md-add-box"></i>
        <span>Take Payment</span>
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
        <li><a href="takepayment.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
        <?php $count++; } ?>
    </ul>
</li>
Student Payment END-->


                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>