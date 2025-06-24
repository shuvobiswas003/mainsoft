
                <?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $totalfail;
			    $count2=1;
			    $sel_query2="SELECT count(lettergrade) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND lettergrade='F'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {
			    	$totalfail=$row2['count(lettergrade)'];
                }
			    ?>
        
            	<tr>
    	    <td>
    	    <b style="float:right;">Total Exam Marks=</b>
    	    </td>
    	    
    	    <td>
    	       <b>
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT sum(fullmarks) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php echo $row2['sum(fullmarks)'];?>
			    	<?php $count2++; }?>
			    </b>
			</td>
			
			<td colspan="3">
			    <b></b>
			</td>
    	    
    	    <td>
    	        <?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $count2=1;
			    $sel_query2="SELECT sum(total) From exammark WHERE examid='$examid'AND suniqid='$suniqid'";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    <b><?php echo $row2['sum(total)'];?></b>
			    <?php $count2++; }?>
    	    </td>
    	    
    	    
    	    <td colspan="2">
    	        <b>
					<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $maingpa;
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $maingpa=$row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
				<!--Total Subject Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $countsub;
			    $count2=1;
			    $sel_query2="SELECT count(subcode) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $countsub=$row2['count(subcode)'];?>
			    	<?php $count2++; }?>
			    <!--Cheaking 4th sub point-->
			    <?php 
			    $new4thpoint;
			    $fouthgpa=0;
			    if($fouthgpa>3){
			    	$new4thpoint=$fouthgpa-2;
			    }else{
			    	$new4thpoint=0;
			    }
			    ?>
			    <!--Publish Final Result-->
			    <?php
			    $cheakgolden=$countsub*5;
			    if($maingpa>=$cheakgolden){
			    	$finagpa=$maingpa;
			    }else{
			    	$finagpa=$new4thpoint+$maingpa;
			    }
			    $ncountsub;
			    switch ($countsub) {
			    	case '0':
			    		$ncountsub=1;
			    		break;
			    	
			    	default:
			    		$ncountsub=$countsub;
			    		break;
			    }
			    $resultgpa=$finagpa/$ncountsub;
			    if($resultgpa>5){
			    	$resultgpa=5;
			    }else{
			    	$resultgpa;
			    }
			    $gresultgrade=number_format((float)$resultgpa, 2, '.', '');
			    
			    if($totalfail>0){
			    	echo "F";
			    }else{
			    	if($resultgpa>4.99){
			    	echo "A+";
			    }elseif ($resultgpa>3.99) {
			    	echo "A";
			    }
			    elseif ($resultgpa>3.49) {
			    	echo "A-";
			    }elseif ($resultgpa>2.99) {
			    	echo "B";
			    }elseif ($resultgpa>1.99) {
			    	echo "C";
			    }
			    elseif ($resultgpa>0.99) {
			    	echo "D";
			    }else{
			    	echo "F";
			    }
			    }
			    
			    
			    ?>
			    	</b>
    	    </td>
    	    
    	    <td colspan="2">
    	        <b>
					<!--4th Subject GPA Counting-->
					<?php
				    require "../interdb.php";
				    $suniqid=$row['uniqid'];
				    $fouthgpa;
				    $count2=1;
				    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=4";
				    $result2 = mysqli_query($link,$sel_query2);
				    while($row2 = mysqli_fetch_assoc($result2)) {?>
				    	<?php $fouthgpa=$row2['sum(letterpoint)'];?>
				    	<?php $count2++; }?>
				 <!--Main Subject GPA Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $maingpa;
			    $count2=1;
			    $sel_query2="SELECT sum(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $maingpa=$row2['sum(letterpoint)'];?>
			    	<?php $count2++; }?>
				<!--Total Subject Counting-->
				<?php
			    require "../interdb.php";
			    $suniqid=$row['uniqid'];
			    $countsub;
			    $count2=1;
			    $sel_query2="SELECT count(subcode) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus=1";
			    $result2 = mysqli_query($link,$sel_query2);
			    while($row2 = mysqli_fetch_assoc($result2)) {?>
			    	<?php $countsub=$row2['count(subcode)'];?>
			    	<?php $count2++; }?>
			    <!--Cheaking 4th sub point-->
			    <?php 
			    $new4thpoint;
			    if($fouthgpa>3){
			    	$new4thpoint=$fouthgpa-2;
			    }else{
			    	$new4thpoint=0;
			    }
			    ?>
			    <!--Publish Final Result-->
			    <?php
			    if($totalfail>0){
			    	echo "F";
			    }else{
			    $cheakgolden=$countsub*5;
			    if($maingpa>=$cheakgolden){
			    	$finagpa=$maingpa;
			    }else{
			    	$finagpa=$new4thpoint+$maingpa;
			    }
			    $ncountsub;
			    switch ($countsub) {
			    	case '0':
			    		$ncountsub=1;
			    		break;
			    	
			    	default:
			    		$ncountsub=$countsub;
			    		break;
			    }
			    $resultgpa=$finagpa/$ncountsub;
			    if($resultgpa>5){
			    	$resultgpa=5;
			    }else{
			    	$resultgpa;
			    }
			    echo number_format((float)$resultgpa, 2, '.', '');
}
			    ?>
					</b>
    	    </td>
    	    
    	    
    	    
    	</tr>