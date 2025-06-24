<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account"){
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <marquee behavior="slow" direction="">
                            <h1 style="color:green;">Welcome <?php echo $_SESSION["name"];?></h1>
                        </marquee>

<div class="row">
    <div class="col-md-4">
        <a href="addexpense.php">
            <button class="btn btn-primary btn-lg" style="width:300px">
                খরচ যুক্ত
            </button>
        </a><br><br>
        <a href="dailyexpensereport.php">
            <button class="btn btn-primary btn-lg" style="width:300px">
                দৈনিক খরচ দেখুন
            </button>
        </a><br><br>
        <a href="addexpensecat.php">
            <button class="btn btn-primary btn-lg" style="width:300px">
                খরচ খাত
            </button>
        </a><br><br>

    </div>
    <div class="col-md-4">
        <a href="dailycollectreport.php">
            <button class="btn btn-primary btn-lg" style="width:300px">
                দৈনিক কালেকশন
            </button>
        </a><br><br>
    </div>
    <div class="col-md-4">
        <a href="dailybalancereport.php">
            <button class="btn btn-primary btn-lg" style="width:300px">
                দৈনিক ব্যালান্স
            </button><br>
        </a><br>
    </div>
</div>


                        
<div class="row">
    
<div class="col-md-4">
        <center>
        <h1>ধাপ এক:রশিদ তৈরী</h1>
        </center>
        <div id="sidebar-menu">
        <ul>
        <!--Student Payment Genarator Start-->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>একক রশিদ</span>
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
                                            <a href="invoicedata.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
        <!--Student Payment Genarator END-->

        <!--Student Payment Genarator Start-->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>বিস্তারিত রশিদ (ছেলে/মেয়ে) </span>
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
                                            <a href="invoice_data_with_gender.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
        <!--Student Payment Genarator END-->


        <!--Student Payment Genarator Start-->
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>রশিদ (শিক্ষার্থী প্রতি)</span>
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
                                            <a href="invoicedata_single_make.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
        <!--Student Payment Genarator END-->

        </ul>
        </div>
</div>
   
<div class="col-md-4">
        <center>
        <h1>ধাপ 2: রশিদ প্রিন্ট</h1>
        </center>
        <div id="sidebar-menu">
        <ul>
        <!--Student Miltislip Single Print Start-->
         <!--Student Miltislip Single Print Start Card-->
        <li>
            <a href="multislipsingle_card.php" class="waves-effect"><i class="md md-home"></i><span>একাধিক রশিদ প্রিন্ট (কার্ড)</span></a>
        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>একাধিক রশিদ প্রিন্ট (রোল)</span>
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
                                            <a href="multislipsingle.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
                <!--Student Payment Start-->
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class=" md-add-box"></i>
        <span>একক রশিদ প্রিন্ট</span>
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


<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>সকল জমার রশিদ(রোল)</span>
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
                                            <a href="all_paid_slip.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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


    <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>সকল বাকির রশিদ(রোল)</span>
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
                                            <a href="all_due_slip.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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

    <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>সকল রশিদ(রোল)</span>
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
                                            <a href="all_slip.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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

    

        </ul>
        </div>
</div>


<div class="col-md-4">
        <center>
        <h1>রশিদের টাকা জমা</h1>
        </center>
        <div id="sidebar-menu">
        <ul>
       <li>
            <a href="takepaymentbarcodefullqr.php" class="waves-effect"><i class="md md-home"></i><span>QR কোডের মাধ্যমে</span></a>
        </li>

        <!--Student Payment Start-->

<li>
    <a href="takepaymentcard.php" class="waves-effect"><i class="md md-home"></i><span>একক রশিদের টাকা জমা (কার্ড)</span></a>
</li>

<!--Student Payment END-->


<!--Student Payment Start-->
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
        <i class=" md-add-box"></i>
        <span>একক রশিদের টাকা জমা (রোল)</span>
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
<!--Student Payment END-->
<!--Student Miltipaymnet Single Print Start-->
<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>একাধিক  রশিদের টাকা জমা (রোল)</span>
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
                                            <a href="multipaysingle.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Miltipaymnet Single Print END-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>একাধিক শিক্ষার্থীর টাকা জমা</span>
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
                                            <a href="bulk_student_payment.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Miltipaymnet Single Print END-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>একক শিক্ষার্থীর টাকা জমা(Date)</span>
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
                                            <a href="bulk_student_payment_stu_date.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Miltipaymnet Single Print END-->

        </ul>
        </div>
</div>


</div> <!--End Row-->

<div class="row" style="background-color: #d4edda; padding: 10px; border-radius: 5px;">
    <div class="col-md-12">
        <form action="../pg_redirection/trx_id.php" method="POST" class="form-inline" role="form" enctype="multipart/form-data" target="_blank">
            <label for="Cust-name" class="mr-2">Enter TRX ID</label>
            <input type="text" name="trx_id" placeholder="SSL TRX ID" class="form-control mr-2">
            <input type="submit" class="btn btn-primary" value="UPDATE">
        </form>
    </div>
</div>





                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php include'inc/footer.php'?>