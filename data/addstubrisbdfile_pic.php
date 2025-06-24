<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nameb = $_POST['nameb'];
    $fnameb = $_POST['fnameb'];
    $mnameb = $_POST['mnameb'];

    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $sex = $_POST['sex'];

    $brithid = $_POST['brithid'];
    $sdob = $_POST['sdob'];
    $dob = date("Y-m-d", strtotime($sdob));
    $fnid = $_POST['fnid'];
    $mnid = $_POST['mnid'];

    $classnumber = $_POST['classnumber'];
    $classname = '';
    require '../interdb.php';

    // Finding Class name
    $sel_query2 = "SELECT * FROM class WHERE classnumber='$classnumber'";
    $result2 = mysqli_query($link, $sel_query2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $classname = $row2['classname'];
    }

    $secgroupname = $_POST['secgroupname'];
    $roll = $_POST['roll'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $uniqid = $classnumber . $secgroupname . $roll;

    // Insert photo
    $imgname = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $imgname = $filename . "." . $ext;
        $filetmp = $_FILES['image']['tmp_name'];

        // Check if the directory exists and is writable
        $target_dir = "../img/student/";
        if (!is_dir($target_dir) || !is_writable($target_dir)) {
            echo "<h3 style='color:red;'>Upload directory does not exist or is not writable.</h3>";
        } else {
            if (move_uploaded_file($filetmp, $target_dir . $imgname)) {
                echo "<h3 style='color:green;'>Image uploaded successfully.</h3>";
            } else {
                echo "<h3 style='color:red;'>Failed to move uploaded file.</h3>";
            }
        }
    } else {
        echo "<h3 style='color:red;'>Error uploading file: " . $_FILES['image']['error'] . "</h3>";
    }

    // Insert to database with ON DUPLICATE KEY UPDATE
    $sql = "INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname) VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', '$nameb', '$fnameb', '$mnameb', '$dob', '$brithid', '$fnid', '$mnid', '$address', '$mobile', '$uniqid', '$sex', '$imgname') 
    ON DUPLICATE KEY UPDATE 
    classnumber=VALUES(classnumber), 
    classname=VALUES(classname), 
    secgroup=VALUES(secgroup), 
    roll=VALUES(roll), 
    name=VALUES(name), 
    fname=VALUES(fname), 
    mname=VALUES(mname), 
    nameb=VALUES(nameb), 
    fnameb=VALUES(fnameb), 
    mnameb=VALUES(mnameb), 
    dob=VALUES(dob), 
    birthid=VALUES(birthid), 
    fnid=VALUES(fnid), 
    mnid=VALUES(mnid), 
    address=VALUES(address), 
    mobile=VALUES(mobile), 
    uniqid=VALUES(uniqid), 
    sex=VALUES(sex), 
    imgname=VALUES(imgname)";

    if (mysqli_query($link, $sql)) {
        echo "<h3 style='color:green;'>Student Admitted Successfully</h3>";
        ?>
        <script>
        setTimeout(function() {
            window.close();
        }, 2000);
        </script>
        <?php
    } else {
        echo "<h3 style='color:red;'>Error: " . mysqli_error($link) . "</h3>";
    }
}
?>
