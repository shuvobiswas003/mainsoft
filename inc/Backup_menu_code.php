<!--
<!--Student Payment Start-->
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect">
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
<!--Student Payment END-->

<!--Barcode Full PAyment Start-->
<li>
<a href="takepaymentbarcodefull.php" class="waves-effect"><i class="md md-home"></i><span>Barcode(Full Payment)</span></a>
</li>

<!--Barcode Full Payment END-->

<!--Barcode Full PAyment Start-->
<li>
<a href="takepaymentbarcodepart.php" class="waves-effect"><i class="md md-home"></i><span>Barcode(Part Payment)</span></a>
</li>

<!--Barcode Full Payment END-->

<!--Student Payment Report Start-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Payment Report</span>
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
                                            <a href="paymentreport.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>">
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
<!--Student Payment END-->

<!--Student Payment Report all Start-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Payment Report(All)</span>
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
                                            <a href="paymentreportall.php?classnumber=<?php echo $classnumber;?>&secgroupname=<?php echo $row1['secgroupname'];?>" target="_blank">
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
<!--Student Payment All END-->

<!--INCOME EXPENSE Start-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Income/Expense</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
    <!--Level 1 Menu Start-->
    <ul style="">
        <!--Sub 1.2 Start-->
        <li>
            <a href="javascript:void(0);">
                <span>
                    <i class="md-view-stream"></i>
                    Income
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <li>
                    <a href="addincome.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Add Income
                        </span>
                    </a>
                </li>
                <li>
                    <a href="viewincome.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            View Income
                        </span>
                    </a>
                </li>
                <li>
                    <a href="dailyincomereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Daily Report
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="monthlyincomereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Monthly Report
                        </span>
                    </a>
                </li>
                
            </ul>
        </li>
        <!--Sub 1.2 END-->

        <!--Sub 1.2 Start-->
        <li>
            <a href="javascript:void(0);">
                <span>
                    <i class="md-view-stream"></i>
                    Expense
                    <i class="md md-add"></i>
                </span>
            </a>
            <ul style="">
                <li>
                    <a href="addexpense.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Add Expense
                        </span>
                    </a>
                </li>
                <li>
                    <a href="viewexpense.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            View Expense
                        </span>
                    </a>
                </li>
                <li>
                    <a href="dailyexpensereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Daily Report
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="monthlyexpensereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Monthly Report
                        </span>
                    </a>
                </li>
                
            </ul>
        </li>
        <!--Sub 1.2 END-->
    
    </ul>
    <!--Level 1 Menu END-->
</li>
<!--INCOME EXPENSE-->

<!--Collection EXPENSE Start-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Collection</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
    <!--Level 1 Menu Start-->
    <ul style="">
        <!--Sub 1.2 Start-->
        <li>
                <li>
                    <a href="dailycollectreport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Daily Collection
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="monthlycollectreport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Monthly Collection
                        </span>
                    </a>
                </li>
                
           
        </li>

        
    
    </ul>
    <!--Level 1 Menu END-->
</li>
<!--Collection EXPENSE-->


<!--Balance  Report Start-->

<li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
                <i class="md-book"></i>
                <span>Balance Report</span>
                <span class="pull-right">
                    <i class="md md-add"></i>
                </span>
            </a>
    <!--Level 1 Menu Start-->
    <ul style="">
        <!--Sub 1.2 Start-->
        <li>
                <li>
                    <a href="dailybalancereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Daily Balance
                        </span>
                    </a>
                </li>
                 <li>
                    <a href="monthlybalancereport.php">
                        <span>
                            <i class=" md-radio-button-on"></i>
                            Monthly Balance
                        </span>
                    </a>
                </li>
                
           
        </li>

        
    
    </ul>
    <!--Level 1 Menu END-->
</li>
<!--Balance  Report-->

-->                        