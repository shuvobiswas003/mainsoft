<!--New Fresh Menu Start-->
<li class="has_sub">
    <!--Menu Main Item Name Start-->
    <a href="#" class="waves-effect"><i class="md-book"></i><span>Result Part</span><span class="pull-right"><i class="md md-add"></i></span></a>
    <!--Menu Main Item Name End-->

    <ul class="list-unstyled">
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
                            <li>  
                            <a href="transcript/studenttrans.php?classnumber=<?php echo $row1['classnumber'];?>&secgroupname=<?php echo $row2['secgroupname'];?>&examid=<?php echo $gexid;?>" target="_blank">
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
    </ul>
</li>
<!--New Fresh Menu End-->