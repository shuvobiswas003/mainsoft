<?php 
// Include the database config file 
include_once '../interdb.php'; 
$subjectcode=$_POST["subcode"];
$classnumber=$_POST["classnumber"];
$secgroupname=$_POST["secgroupname"];
if(!empty($subjectcode)){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM lesson WHERE subcode='$subjectcode' AND classnumber='$classnumber' AND secgroupname='$secgroupname' ORDER by subcode ASC,chapterno ASC,lno ASC"; 
    $result = $link->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Lesson AND Chapter</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['chapterno'].','.$row['lno'].'">'.$row['chaptername'].'('.$row['lname'].')</option>'; 
        } 
    }else{ 
        echo '<option value="">Lesson not available</option>'; 
    } 
}elseif(!empty($_POST["state_id"])){ 
    // Fetch city data based on the specific state 
    $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select city</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">City not available</option>'; 
    } 
} 
?>