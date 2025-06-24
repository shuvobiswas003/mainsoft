<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account'){
    header("location: login.php");
    exit;
}

// Include necessary files
include 'inc/header.php';
include 'inc/topheader.php';
include 'inc/leftmenu.php';
?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Row Div Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Student Registration</h3>
                        </div>
                        <!-- 1st Form Start -->
                        <div class="panel-body">
                            <?php
                            require "../interdb.php";
                            $uniqid = $_REQUEST['uniqid'];
                            ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="classnumber">Select Class Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="classnumber" required>
                                            <?php
                                            $sel_query = "SELECT DISTINCT classnumber, classname FROM student WHERE uniqid='$uniqid';";
                                            $result = mysqli_query($link, $sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['classnumber']}'>{$row['classname']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="secgroupname">Select Section Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="secgroupname" required>
                                            <?php
                                            $sel_query = "SELECT DISTINCT secgroup FROM student WHERE uniqid='$uniqid';";
                                            $result = mysqli_query($link, $sel_query);
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['secgroup']}'>{$row['secgroup']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="uniqid">Student ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="uniqid" value="<?php echo $uniqid; ?>" readonly>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Verify Student">
                            </form>
                        </div>
                        <!-- 1st Form End -->

                        <!-- 2nd Form Start -->
                        <div class="panel-body">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $classnumber = $_POST['classnumber'];
                                $secgroupname = $_POST['secgroupname'];
                                $uniqid = $_POST['uniqid'];

                                $sel_query = "SELECT * FROM student WHERE uniqid='$uniqid'";
                                $result = mysqli_query($link, $sel_query);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <!-- Print School Info Start -->
                            <?php
                            $sel_query2 = "SELECT * FROM schoolinfo";
                            $result2 = mysqli_query($link, $sel_query2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h1 style="font-size: 50px;color: black;"><?php echo $row2['schoolname']; ?></h1>
                                        <h1 style="font-size: 20px;"><?php echo $row2['schooladdress']; ?></h1>
                                        <h1 style="font-size: 20px;"><?php echo $row2['website']; ?></h1>
                                    </center>
                                </div>
                            </div>
                            <?php } ?>
                            <center><h2 style="color: green;">Online Registration</h2></center>
                            <!-- Print School Info End -->

                            <!-- Print Student Info Start -->
                            <div class="col-md-12">
                                <center>
                                    <h2>Student Information</h2>
                                    <img src="../img/student/<?php echo $row['imgname']; ?>" alt="" style="height: 150px;width:150px;border-radius: 50%;"><br>
                                    <h4>
                                        <?php echo $row['name']; ?><br>
                                        <?php echo $row['classname']; ?> (<?php echo $row['classnumber']; ?>) <br>
                                        Roll: <?php echo $row['roll']; ?><br>
                                        Section: <?php echo $row['secgroup']; ?>
                                    </h4>
                                </center>
                            </div>
                            <!-- Print Student Info End -->

                            <form action="addsturegdata.php" method="POST">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="classnumber">Select Class Number</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="classnumber" value="<?php echo $classnumber; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="secgroupname">Select Section Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="secgroupname" value="<?php echo $secgroupname; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="roll">Select Roll</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="roll" value="<?php echo $row['roll']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="uniqid">Select UniqID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="uniqid" value="<?php echo $uniqid; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                        <center>
                                            <h3>Subject Choice List</h3>
                                        </center>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Subject Code</th>
                                                    <th>Subject Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sel_query = "SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND (subcode=101 OR subcode=102 OR subcode=107 OR subcode=108 OR subcode=275)";
                                                $result = mysqli_query($link, $sel_query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="subcode[]" value="<?php echo $row['subcode']; ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="subname[]" value="<?php echo $row['subname']; ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <select name="substatus[]" class="form-control">
                                                            <option value="1">Mandatory Subject</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <th colspan="3"><center>Compulsory/Group Subject</center></th>
                                                </tr>
                                                <?php
                                                for ($i = 1; $i <= 3; $i++) {
                                                    echo "<tr><td colspan='3'><center><h3>Group Subject: $i</h3></center></td></tr>";
                                                    for ($j = 0; $j < 2; $j++) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="subcode[]" required>
                                                            <option value="">Select First</option>
                                                            <?php
                                                            $sel_query = "SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode NOT IN(101,102,107,108,275)";
                                                            $result = mysqli_query($link, $sel_query);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='{$row['subcode']}'>{$row['subname']} ({$row['subcode']})</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="subname[]" required>
                                                            <option value="">Select First</option>
                                                            <?php
                                                            $sel_query = "SELECT * FROM subject WHERE classnumber='$classnumber' AND secgroup='$secgroupname' AND subcode NOT IN(101,102,107,108,275)";
                                                            $result = mysqli_query($link, $sel_query);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='{$row['subname']}'>{$row['subname']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="substatus[]" required>
                                                            <option value="1">Mandatory Subject</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </center>
                                    </div>
                                </div>
                            </form>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- 2nd Form End -->
                    </div>
                </div>
            </div>
            <!-- Row Div End -->
        </div>
        <!-- Container Div End -->
    </div>
    <!-- Content Div End -->
</div>
<?php include 'inc/footer.php'; ?>
