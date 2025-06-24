	<div class="information">
	    <table class="result_part_table">
	    <tr style="border:1px solid black;">
	        
	        <td style="border:1px solid black;width:34%;">
	            <table class="result_part_table_baby">
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:75%;">
	                        <b>Merit Position: </b>
	                    </td>
	                    <td style="border:1px solid black;width:25%;">
	                        <b>
	                            <?php
                                $stuuniqid=$row['uniqid'];
                                $uniqm=$examid.$stuuniqid;
                                require "../interdb.php";
                                $count6=1;
                                $sel_query5="SELECT * from meritlist where uniqm='$uniqm'";
                                $result5 = mysqli_query($link,$sel_query5);
                                while($row5 = mysqli_fetch_assoc($result5)) {
                                 if($totalfail>0){
                                    echo "";
                                }else{
                                echo $row5['curpos'];
                                }
                                $count6++; }
                                ?>
	                        </b>
	                    </td>
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:75%;">
	                        <b>GPA (Without 4th): </b>
	                    </td>
	                    <td style="border:1px solid black;width:25%;">
	                        <b>
            				<?php
            					if($totalfail>0){
            			    	echo "F";
            			    }else{
            			    require "../interdb.php";
            			    $suniqid=$row['uniqid'];
            			    $count2=1;
            			    $sel_query2="SELECT AVG(letterpoint) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND substatus='1'";
            			    $result2 = mysqli_query($link,$sel_query2);
            			    while($row2 = mysqli_fetch_assoc($result2)) {?>
            			    	<?php $gpanot4=$row2['AVG(letterpoint)'];
            			    	echo number_format((float)$gpanot4, 2, '.', '');
            			    	?>
            			    	<?php $count2++; }}?>
            				</b>
	                    </td>
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:75%;">
	                        <b>Failed Subject(s): </b>
	                    </td>
	                    <td style="border:1px solid black;width:25%;">
	                        <b>
	                            <b>
            					<?php
            			    require "../interdb.php";
            			    $suniqid=$row['uniqid'];
            			    $totalfail;
            			    $count2=1;
            			    $sel_query2="SELECT count(lettergrade) From exammark WHERE examid='$examid'AND suniqid='$suniqid' AND lettergrade='F'";
            			    $result2 = mysqli_query($link,$sel_query2);
            			    while($row2 = mysqli_fetch_assoc($result2)) {
            			    	$totalfail=$row2['count(lettergrade)'];
            			    	?>
            			    	<?php echo $row2['count(lettergrade)'];?>
            			    	<?php $count2++; }?>
            					</b>
	                        </b>
	                    </td>
	                </tr>
	                
	                
	                
	            </table>
	        </td>
	        
	        
	        <td style="border:1px solid black;width:33%;">
	             <table class="result_part_table_baby">
	                <tr style="border:1px solid black">
	                    <td colspan="4" style="border:1px solid black;">
	                       <b> Moral & Behavior Evaluation</b>
	                    </td>
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:20%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:30%;">
	                        <b>Best</b>
	                    </td>
	                    <td style="border:1px solid black;width:20%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:30%;">
	                        <b>Good</b>
	                    </td>
	
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:20%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:30%;">
	                        <b>Better</b>
	                    </td>
	                    <td style="border:1px solid black;width:20%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:30%;font-size:10px;">
	                        <b>Need Improvement</b>
	                    </td>
	
	                </tr>
	            </table>
	        </td>
	        
	        
	        <td style="border:1px solid black;width:33%;">
	             <table class="result_part_table_baby">
	                <tr style="border:1px solid black">
	                    <td colspan="4" style="border:1px solid black;">
	                       <b> Co-Curricular Activities</b>
	                    </td>
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:10%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:40%;font-size:10px;">
	                        <b>Sports</b>
	                    </td>
	                    <td style="border:1px solid black;width:10%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:40%;font-size:10px;">
	                        <b>Cultural Funct.</b>
	                    </td>
	
	                </tr>
	                <tr style="border:1px solid black">
	                    <td style="border:1px solid black;width:10%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:40%;font-size:10px;">
	                        <b>Scout/BNCC</b>
	                    </td>
	                    <td style="border:1px solid black;width:10%;">
	                        
	                    </td>
	                    <td style="border:1px solid black;width:40%;font-size:10px;">
	                        <b>Math Olympiad</b>
	                    </td>
	
	                </tr>
	            </table>
	        </td>
	    </tr>
	</table>