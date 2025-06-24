<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Insert Class Teacher Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Class Teacher</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="class">Select Class:</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="class" name="classnumber" required>
                                            <option value="">Select a class</option>
                                            <?php
                                            require "interdb.php";
                                            // Query the database to get distinct class values
                                            $classQuery = "SELECT DISTINCT classnumber FROM student ORDER BY classnumber";
                                            $classResult = mysqli_query($link, $classQuery);
                                            while ($classRow = mysqli_fetch_assoc($classResult)) {
                                                $classValue = $classRow['classnumber'];
                                                echo "<option value='$classValue'>Class $classValue</option>";
                                            }
                                            mysqli_free_result($classResult);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="secgroup">Select Section/Group:</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="secgroup" name="secgroupname" required>
                                            <option value="">Select a section group</option>
                                            <?php
                                            // Query the database to get distinct secgroup values
                                            $secgroupQuery = "SELECT DISTINCT secgroup FROM student ORDER BY secgroup";
                                            $secgroupResult = mysqli_query($link, $secgroupQuery);
                                            while ($secgroupRow = mysqli_fetch_assoc($secgroupResult)) {
                                                $secgroupValue = $secgroupRow['secgroup'];
                                                echo "<option value='$secgroupValue'>$secgroupValue</option>";
                                            }
                                            mysqli_free_result($secgroupResult);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Teacher</label>
                                    <div class="col-md-9">
                                        <select name="tid" class="form-control" required>
                                            <option value="" disabled selected>Select Teacher</option>
                                            <?php
                                            require_once "interdb.php";
                                            $teacher_query = "SELECT id, name FROM teacherlogin";
                                            $teacher_result = mysqli_query($link, $teacher_query);
                                            while ($teacher = mysqli_fetch_assoc($teacher_result)) {
                                                echo '<option value="' . $teacher['id'] . '">' . $teacher['id'] . ' - ' . $teacher['name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-left">
                                        <button type="submit" name="add_class_teacher" class="btn btn-primary">Add Class Teacher</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_class_teacher'])) {
                                $classnumber = $_POST['classnumber'];
                                $secgroupname = $_POST['secgroupname'];
                                $tid = $_POST['tid'];

                                $insert_query = "INSERT INTO classteacher (classnumber, secgroupname, tid) VALUES ('$classnumber', '$secgroupname', '$tid')";
                                if (mysqli_query($link, $insert_query)) {
                                    echo '<div class="alert alert-success">Class Teacher added successfully.</div>';
                                } else {
                                    echo '<div class="alert alert-danger">Error: ' . mysqli_error($link) . '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Class Teachers Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">View Class Teachers</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Class</th>
                                        <th>Group</th>
                                        <th>Teacher ID</th>
                                        <th>Teacher Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $view_query = "SELECT ct.id, ct.classnumber, ct.secgroupname, ct.tid, tl.name AS teacher_name FROM classteacher ct JOIN teacherlogin tl ON ct.tid = tl.id";
                                    $view_result = mysqli_query($link, $view_query);
                                    while ($row = mysqli_fetch_assoc($view_result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['classnumber'] . '</td>';
                                        echo '<td>' . $row['secgroupname'] . '</td>';
                                        echo '<td>' . $row['tid'] . '</td>';
                                        echo '<td>' . $row['teacher_name'] . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'inc/footer.php'?>
