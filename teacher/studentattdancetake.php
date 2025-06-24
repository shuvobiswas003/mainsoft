<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
$classnumber=$_REQUEST['classnumber'];
$secgroupname=$_REQUEST['secgroupname'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classnumber=$_POST['classnumber'];
    $secgroupname=$_POST['secgroupname'];
    
    //array data
    $roll=$_POST['roll'];
    $name=$_POST['name'];
    $status=$_POST['status'];
   
    for ($i = 0; $i < count($roll); $i++) {
        $rolln =$roll[$i];
        $namen =$name[$i];
        $statusn =$status[$i];
        $uniqid=$classnumber.$secgroupname.$rolln;
        $color;
        if($statusn == 'Absent'){
            $color="red";
        }else{
            $color="green";
        }
        //getting date
        date_default_timezone_set('Asia/Dhaka');
        $adate=date("Y-m-d");
        $todayatt = date("Ymd");
        $uniqattid=$uniqid.$todayatt;
        require "../interdb.php";

       $sql = "INSERT INTO stuattdancedata (machineid, stuid, adate, ctime, cinout, cinoutid, uniqattid, status) 
                    VALUES ('0', '$uniqid', '$adate', NOW(), '', '', '$uniqattid', '$statusn') 
                    ON DUPLICATE KEY UPDATE status = '$statusn';";


        if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Roll:".$rolln."<span style='color:".$color."'> ".$statusn." </span></h1>.";
        } else{
           echo "<h3 style='color:red;'>Subject Already Exists</h1>";
        }


    }

echo "<script>
  setTimeout(function() {
      window.close()
  }, 5000);
</script>";
    
}
?>




<div class="container">
    	<div class="row">
    		<div class="col-md-12 col-lg-12">

    <center>
        <!--Print School Info Start-->
        <?php
                require "../interdb.php";
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            
                    <center>
                        <h1 style="font-size: 50px;color: black;">
                            <?php echo $row2['schoolname']?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['schooladdress'];?>
                        </h1>
                        <h1 style="font-size: 20px;">
                            <?php echo $row2['website'];?>
                        </h1>
                    </center>
                
            
            <?php $count2++; } ?>
        <!--Print School Info END-->
    </center>            

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
            <div class="col-md-6">
                <select name="classnumber" id="" class="form-control">
                     <option value="<?php echo $classnumber;?>">
                        <?php echo $classnumber;?>
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Cust-name">Select Class</label>
            <div class="col-md-6">
                <select name="secgroupname" id="" class="form-control">
                    <option value="<?php echo $secgroupname;?>">
                        <?php echo $secgroupname;?>
                    </option>
                </select>
            </div>
       </div>

        

        

<table class="table table-bordered">
    <caption><h1>
        <center>
            Student List
        </center>
    </h1></caption>
  <thead>
    <tr>
      <th>Roll</th>
      <th>Name</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    
    			
<?php
    require "../interdb.php";
    $count=1;
    $sel_query="Select * from student where classnumber='$classnumber' AND secgroup='$secgroupname' ORDER BY roll ASC;";
    $result = mysqli_query($link,$sel_query);
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <th>
        <select name="roll[]" id="" class="form-control">
            <option value="<?php echo $row['roll'];?>">
                <?php echo $row['roll'];?>
            </option>
        </select>
      </th>

       <td>
            <select name="name[]" id="" class="form-control">
                <option value="<?php echo $row['name'];?>">
                    <?php echo $row['name'];?>
                </option>
            </select>
        </td>
      <td>
          <select name="status[]" id="" class="form-control">
<?php
date_default_timezone_set('Asia/Dhaka');
$uniqid=$row['uniqid'];
$todayatt = date("Ymd");
$uniqattid =$uniqid.$todayatt;
$count2=1;
$sel_query2="SELECT * from stuattdancedata where uniqattid ='$uniqattid'";
$result2 = mysqli_query($link,$sel_query2);
while($row2 = mysqli_fetch_assoc($result2)) {
$des=$row2['status'];
if(!empty($des)){?>
    <option value="<?php echo $row2['status']?>" selected> Already<?php echo $row2['status']?></option>
<?php
}else{
    ?>
<?php
}
$count1++; }
?>
              <option value="Present"><span style="color: green;">Present</span></option>
              <option value="Absent"><span style="color: red;">Absent</span></option>
          </select>
      </td>
    </tr>
    <?php $count++;}?>
  </tbody>
</table>
                    
<input type="submit" class="btn btn-primary" Value="Take Attdance">
    
</form>

</div>
</div>
</div>
</body>
</html>