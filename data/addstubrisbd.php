<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nameb=$_POST['nameb'];
    $fnameb=$_POST['fnameb'];
    $mnameb=$_POST['mnameb'];

    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $sex=$_POST['sex'];

    $brithid=$_POST['brithid'];
    $sdob=$_POST['sdob'];
    $dob=date("Y-m-d", strtotime($sdob));
    $fnid=$_POST['fnid'];
    $mnid=$_POST['mnid'];
    
    $classnumber=$_POST['classnumber'];
    $classname;
    require '../interdb.php';
    //finding Class name
    $sel_query2="Select * from class WHERE classnumber='$classnumber'";
    $result2 = mysqli_query($link,$sel_query2);
    while($row2 = mysqli_fetch_assoc($result2)) {
$classname=$row2['classname'];
    }

    $secgroupname=$_POST['secgroupname'];
    $roll=$_POST['roll'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $uniqid=$classnumber.$secgroupname.$roll;

    //insert photo
    $imgsl=$_POST['imagesl'];
    $imgname="IMG_".$imgsl.".png";
    

    //insert to database

        require "../interdb.php";

        $sql ="INSERT INTO student(classnumber,classname,secgroup,roll,name,fname,mname,nameb,fnameb,mnameb,dob,birthid,fnid,mnid,address,mobile,uniqid,sex,imgname) VALUES ('$classnumber','$classname','$secgroupname','$roll','$name','$fname','$mname','$nameb','$fnameb','$mnameb','$dob','$brithid','$fnid','$mnid','$address','$mobile','$uniqid','$sex','$imgname') ";

    if(mysqli_query($link, $sql)){
        echo "<h3 style='color:green;'>Student Admited Successfully</h1>.";
?>
<script>
setTimeout(function() {
    window.close();
}, 2000);
</script>
<?php    }

}

?>
