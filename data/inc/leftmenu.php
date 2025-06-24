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
<!--Student Addmission QR CODE-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Student Add QR</span>
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
                                            <a href="qrbrisaddmission.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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

<!--Student adddmission qr code end--> 

<!--Student Admission Menu Start Br file-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Stu Add BR(html)</span>
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
                                            <a href="stuaddbrisbdfile.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Admission Menu BRIS END-->

<!--Student Admission FOLDER -->
<li>
    <a href="student_add_bris_folder.php" class="waves-effect"><i class="md md-home"></i><span>Stu Add BRIS Folder</span></a>
</li>




<!--Student Admission Menu Start ssc file-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Stu Add (SSC)</span>
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
                                            <a href="stuaddsscresult.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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

<!--Student Admission Menu Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Student Add BR(M)</span>
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
                                            <a href="stuaddbrisbd.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Admission Menu BRIS END-->

<!--Student Admission Short Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Student Addmission</span>
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
                                            <a href="studentaddmission.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Admission Menu Short END-->

<!--Student Admission Menu EXCEL Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Student Add(CSV)</span>
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
                                            <a href="stuaddexcel.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
        <!--Student Admission Menu EXCEL END-->
<li>
    <a href="import_student_excel_form.php" class="waves-effect"><i class="md md-home"></i><span> Import Student(EXCEL) </span></a>
</li>


 <li>
    <a href="update_address.php" class="waves-effect"><i class="md md-home"></i><span>Update Address</span></a>
</li>
<li>
    <a href="update_address_bangla.php" class="waves-effect"><i class="md md-home"></i><span>Update Address (Bangla)</span></a>
</li>
<li>
    <a href="update_mobile.php" class="waves-effect"><i class="md md-home"></i><span>Update Mobile</span></a>
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

<!--Student section download start-->

<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Download Section</span>
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
                <li><a href="downloadsection.php?classnumber=<?php echo $row['classnumber'];?>" target="_blank"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--Student section download END-->

<!--Student section Upload start-->
<li>
<a href="uploadsection.php" class="waves-effect"><i class="md md-home"></i><span>Upload(Roll&Sec) Change</span></a>
</li>
<!--Student section upload END-->

<!--Student DATA Menu EXCEL Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student DATA Status</span>
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
                <li><a href="printdatastatus.php?classnumber=<?php echo $row['classnumber'];?>" target="_blank"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>
        <!--Student DATA STATUS Menu EXCEL END-->

<!--Student Finger Enroll Menu EXCEL Start-->
        <li class="has_sub">
            <a href="#" class="waves-effect">
                <i class="md-book"></i>
                <span>Student_ID(Att)Map</span>
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
                <span>Student ID(ATT)_Info</span>
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
                <li><a href="studentfpinfo.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student Finger Information End-->

<!--Student Image Menu EXCEL Start-->
        <li class="">
            <a href="imageaddexcel.php">
                <i class="md-book"></i>
                <span>Student Image ADD</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
        </li>
<!--Student Image Menu EXCEL END-->

<!--See Student picture Information Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student Pic Info</span>
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
                <li><a href="studentpicinfo.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student picture Information End-->


<!--See Student Login Information Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student Login Add</span>
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
                <li><a href="addstudentlogin.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student Login Information End-->

<!--See Student Short INFO Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>Student Short Info</span>
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
                <li><a href="stushortinfo.php?classnumber=<?php echo $row['classnumber'];?>" target="_blank"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--See Student  Short INFO End-->

<!--ID Card Template Upload-->

<li class="">
    <a href="idcardfontupload.php" target="_blank">
        <i class="md-book"></i>
        <span>ID Font Upload</span>
        <span class="pull-right">
            <i class="md md-add"></i>
        </span>
    </a>
</li>

<!--ID Card Upload Template END-->

<li class="">
    <a href="idcardroll.php">
        <i class="md-book"></i>
        <span>ID Print Bulk</span>
        <span class="pull-right">
            <i class="md md-add"></i>
        </span>
    </a>
</li>

<!--Print Student ID Card Start-->
<li class="has_sub">
            <a href="#" class="waves-effect">
                <i class=" md-add-box"></i>
                <span>ID Print(Roll)</span>
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
                <li><a href="printidcardroll.php?classnumber=<?php echo $row['classnumber'];?>"><span><i class="md-view-stream"></i><?php echo $row['classname'];?></span></a>
                <?php $count++; } ?>
            </ul>
        </li>

<!--Print Student ID Card END-->

<!--rfid Enroll Menu Start-->

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class=" md-add-box"></i><span>RFID</span><span class="pull-right"><i class="md md-add"></i></span></a>
        <ul class="list-unstyled">
            

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
        </ul>
    </li>
    <!--rfid  Menu END-->

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

     <li class="">
            <a href="rfidaddexcel_sec.php">
                <i class="md-book"></i>
                <span>RFID Add Excel (Sec_Roll)</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
        </li>
        
<li>
    <a href="upload_pic_folder.php"  target="_blank"class="waves-effect"><i class="md md-home"></i><span>Upload Picture Folder</span></a>
</li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>