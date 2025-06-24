<?php
require "interdb.php";
// Assuming you have a teacher ID available as $teacher_id
$query = "SELECT * FROM staff WHERE id = $teacher_id";
$result = mysqli_query($link, $query);

// Check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($link));
}

// Fetch the data for the teacher
$teacher = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Staff Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <!--Print School Info Start-->
        <?php
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>
            
            <?php $count2++; } ?>
        <!--Print School Info END-->
    <div class="card-header">
                    <h3 class="text-center">Teacher Profile</h3>
                </div>
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <div class="card">
                    
                    
                    <div class="card-body">
                        <p><strong>ID:</strong> <?php echo $teacher['id']; ?></p>
                        <img src="img/<?php echo $teacher['name']; ?>.jpg" alt="" width='200px' height='200px'>
                        <p><strong>Name:</strong> <?php echo $teacher['name']; ?></p>
                        <p><strong>Father's Name:</strong> <?php echo $teacher['tfname']; ?></p>
                        <p><strong>Mother's Name:</strong> <?php echo $teacher['tmname']; ?></p>
                        <p><strong>Date of Birth:</strong> <?php echo $teacher['tdob']; ?></p>
                        <p><strong>Latest Degree:</strong> <?php echo $teacher['leatestdegree']; ?></p>
                        <p><strong>Mobile:</strong> <?php echo $teacher['mob']; ?></p>
                        <p><strong>Designation:</strong> <?php echo $teacher['degnation']; ?></p>
                        <p><strong>Staff SL Index:</strong> <?php echo $teacher['teachersl']; ?></p>
                        <p><strong>Join Date:</strong> <?php echo $teacher['joindate']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
