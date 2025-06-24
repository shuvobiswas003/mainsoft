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

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Invoice(List) Print</span>
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
                                            <a href="invoicedataprinttable.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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



<!--Student Attdance Memu Start-->
<li class="has_sub">
<a href="#" class="waves-effect">
    <i class="md-book"></i>
    <span>Student Attdance</span>
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
                                <a href="studentattdancetake.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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
                <li><a href="viewstuattdancedaily.php"><i class="ion-person-add"></i>View Attdance (Daily)</a></li>
                
                </ul>

                
            </li>
<!--Student attdance menu end-->

<!--Student Mark Entry Start-->
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
                            <a href="exammarkaddmobile.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>">
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
<!--Student Mark Entry End-->


<?php
require "../interdb.php";
$tid = $_SESSION["id"];

// Get permitted classes and sections for the teacher
$permissionQuery = "SELECT DISTINCT c.classnumber, c.classname, s.secgroupname
                   FROM classteacher p
                   JOIN class c ON p.classnumber = c.classnumber
                   JOIN sectiongroup s ON p.classnumber = s.classnumber AND p.secgroupname = s.secgroupname
                   WHERE p.tid = '$tid'";
$permissionResult = mysqli_query($link, $permissionQuery);

$permissions = [];
while ($row = mysqli_fetch_assoc($permissionResult)) {
    $permissions[$row['classnumber']]['classname'] = $row['classname'];
    $permissions[$row['classnumber']]['sections'][] = $row['secgroupname'];
}
mysqli_free_result($permissionResult);
?>

<!-- Exam Result Menu Start -->
<li class="has_sub">
    <a href="#" class="waves-effect">
        <i class="md-book"></i><span>Result Part</span>
        <span class="pull-right"><i class="md md-add"></i></span>
    </a>
    <ul class="list-unstyled">

        <!-- Transcript Section -->
        <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class="md-add-box"></i> Transcript
        <span class="pull-right"><i class="md md-add"></i></span>
    </a>
    <ul>
        <?php
        $examQuery = "SELECT exid, examname FROM exam";
        $examResult = mysqli_query($link, $examQuery);
        while ($exam = mysqli_fetch_assoc($examResult)) {
        ?>
            <li class="has_sub">
                <a href="javascript:void(0);">
                    <i class="fa fa-bars"></i> <?php echo $exam['examname']; ?>
                    <span class="pull-right"><i class="md md-add"></i></span>
                </a>
                <ul>
                    <?php foreach ($permissions as $classNumber => $classData) { ?>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="fa fa-circle"></i> <?php echo $classData['classname']; ?>
                                <span class="pull-right"><i class="md md-add"></i></span>
                            </a>
                            <?php
                            $dirtrans = "../transcript/studenttrans.php"; // Default

                            // Adjust $dirtrans based on class number
                            if ($classNumber >= 6 && $classNumber <= 9) {
                                $dirtrans = "../transcript/studenttrans_9t9.php";
                            }
                            ?>
                            <ul>
                                <?php foreach ($classData['sections'] as $section) { ?>
                                    <li>
                                        <a href="<?php echo $dirtrans; ?>?classnumber=<?php echo $classNumber; ?>&secgroupname=<?php echo $section; ?>&examid=<?php echo $exam['exid']; ?>" target="_blank">
                                            <i class="fa fa-circle-o"></i> <?php echo $section; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</li>

        <!-- Tabulation Section -->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-add-box"></i>Tabulation Sheet
                <span class="pull-right"><i class="md md-add"></i></span>
            </a>
            <ul>
                <?php
                mysqli_data_seek($examResult, 0); // Reset the result pointer
                while ($exam = mysqli_fetch_assoc($examResult)) {
                    ?>
                    <li class="has_sub">
                        <a href="javascript:void(0);">
                            <i class="fa fa-bars"></i> <?php echo $exam['examname']; ?>
                            <span class="pull-right"><i class="md md-add"></i></span>
                        </a>
                        <ul>
                            <?php foreach ($permissions as $classNumber => $classData) { ?>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="fa fa-circle"></i> <?php echo $classData['classname']; ?>
                                    </a>
                                    <ul>
                                        <?php foreach ($classData['sections'] as $section) { ?>
                                            <li>
                                                <a href="../transcript/stutabulation.php?classnumber=<?php echo $classNumber; ?>&secgroupname=<?php echo $section; ?>&examid=<?php echo $exam['exid']; ?>" target="_blank">
                                                    <i class="fa fa-circle-o"></i> <?php echo $section; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </li>

        <!-- View Merit List -->
        <li>
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-add-box"></i>View Merit List
                <span class="pull-right"><i class="md md-add"></i></span>
            </a>
            <ul>
                <?php
                mysqli_data_seek($examResult, 0);
                while ($exam = mysqli_fetch_assoc($examResult)) {
                    ?>
                    <li>
                        <a href="../transcript/viewmeritlist.php?classnumber=<?php echo $classNumber; ?>&examid=<?php echo $exam['exid']; ?>" target="_blank">
                            <i class="fa fa-circle"></i> <?php echo $exam['examname']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

        <!-- View Pass/Fail List -->
        <li>
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-add-box"></i>View Pass/Fail List
                <span class="pull-right"><i class="md md-add"></i></span>
            </a>
            <ul>
                <?php
                mysqli_data_seek($examResult, 0);
                while ($exam = mysqli_fetch_assoc($examResult)) {
                    ?>
                    <li>
                        <a href="../transcript/viewpassfaillist.php?classnumber=<?php echo $classNumber; ?>&examid=<?php echo $exam['exid']; ?>" target="_blank">
                            <i class="fa fa-circle"></i> <?php echo $exam['examname']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

    </ul>
</li>
<?php
mysqli_free_result($examResult);
?>
<!-- Exam Result Menu End -->



















                            

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>