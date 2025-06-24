<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect them to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'account') {
    header("location: login.php");
    exit;
}

require "../interdb.php";
?>

<?php include 'inc/header.php' ?>
<?php include 'inc/topheader.php' ?>
<?php include 'inc/leftmenu.php' ?>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Class</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Student</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="secgroup">Raw Text</label>
                                    <textarea name="raw_data" class="form-control" rows="20" cols="100" placeholder="Paste your raw data here..." required></textarea><br>
                                </div>

                                <input type="submit" class="btn btn-primary" Value="Add Student">
                            </form>
                            <br><br>

                            <!-- Section View Part Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve raw data from form submission
    $classnumber = 12;
    $classname="Class Twelve";// Assuming class number is always 12
    $raw_data = $_POST['raw_data'];

    // Split data into blocks based on the backtick (`) character
    $blocks = explode('`', trim($raw_data));

    // Array to store the extracted entries
    $entries = [];

    foreach ($blocks as $block) {
        $lines = explode("\n", trim($block));

        // Prepare the extracted data as associative arrays
        $entry = [
            "SL.No." => array_shift($lines),
            "Candidate's Name" => array_shift($lines),
            "Father's Name" => array_shift($lines),
            "Mother's Name" => array_shift($lines),
            "Section" => array_shift($lines),
            "Roll" => array_shift($lines),
            "Gender" => array_shift($lines),
            "Group" => array_shift($lines),
            "Shift" => array_shift($lines),
            "Version" => array_shift($lines),
            "Subjects" => implode(' ', array_slice($lines, 0, 4)), // Main subjects
            "Opt. Sub" => implode(' ', array_slice($lines, 4, 2)), // Optional subjects
            "Pass Year" => $lines[6],
            "Roll No" => $lines[7],
            "Board" => $lines[8],
            "RegNo" => $lines[9]
        ];

        $entries[] = $entry;
    }

    // Output extracted entries
    echo "<h2>Processed Entries</h2>";
    foreach ($entries as $entry) {
        ?>
        <center>
            <img src="../img/student/12/<?php echo intval($entry['Roll']); ?>.jpg" height="200px" />
        </center>
        <?php
        echo "<h3>Entry {$entry['SL.No.']}</h3>";
        echo "<p><strong>Candidate's Name:</strong> {$entry["Candidate's Name"]}</p>";
        echo "<p><strong>Father's Name:</strong> {$entry["Father's Name"]}</p>";
        echo "<p><strong>Mother's Name:</strong> {$entry["Mother's Name"]}</p>";
        echo "<p><strong>Section:</strong> {$entry["Section"]}</p>";
        echo "<p><strong>Roll Number:</strong> {$entry["Roll"]}</p>";
        echo "<p><strong>Gender:</strong> {$entry["Gender"]}</p>";
        echo "<p><strong>Group:</strong> {$entry["Group"]}</p>";
        echo "<p><strong>Shift:</strong> {$entry["Shift"]}</p>";
        echo "<p><strong>Version:</strong> {$entry["Version"]}</p>";
        echo "<p><strong>Subjects:</strong> {$entry["Subjects"]}</p>";
        echo "<p><strong>Optional Subjects:</strong> {$entry["Opt. Sub"]}</p>";
        echo "<p><strong>Pass Year:</strong> {$entry["Pass Year"]}</p>";
        echo "<p><strong>Roll No:</strong> {$entry["Roll No"]}</p>";
        echo "<p><strong>Board:</strong> {$entry["Board"]}</p>";
        echo "<p><strong>Registration Number:</strong> {$entry["RegNo"]}</p>";

        // Process and store the student information in the database
        $secgroupname = trim($entry["Group"]);
        $roll = intval($entry["Roll"]);
        $name = $entry["Candidate's Name"];
        $fname = $entry["Father's Name"];
        $mname = $entry["Mother's Name"];
        $sex = $entry["Gender"];
        $dob = "2000-01-01";  // Default date of birth
        $uniqid = $classnumber . $secgroupname . $roll;
        $imgname = "12/" . $roll . '.jpg';

        // Insert student data into the `student` table
        $sql = "INSERT INTO student (classnumber, classname, secgroup, roll, name, fname, mname, nameb, fnameb, mnameb, dob, birthid, fnid, mnid, address, mobile, uniqid, sex, imgname) 
                VALUES ('$classnumber', '$classname', '$secgroupname', '$roll', '$name', '$fname', '$mname', 'Not Available', 'Not Available', 'Not Available', '$dob', '0', '0', '0', 'Not Available', 'Not Available', '$uniqid', '$sex', '$imgname') 
                ON DUPLICATE KEY UPDATE 
                classnumber=VALUES(classnumber), 
                classname=VALUES(classname), 
                secgroup=VALUES(secgroup), 
                roll=VALUES(roll), 
                name=VALUES(name), 
                fname=VALUES(fname), 
                mname=VALUES(mname), 
                sex=VALUES(sex), 
                imgname=VALUES(imgname)";
        mysqli_query($link, $sql);

        // Insert subjects and optional subjects
        $subcodes = explode(' ', $entry["Subjects"]);
        foreach ($subcodes as $subcode) {
            $subnamen = "";  // Find the subject name based on the code
            $substatusn = '1';
            $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;
            mysqli_query($link, "INSERT INTO sturegsubject (classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                 VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$subcode', '$subnamen', '$substatusn', '$unisubstatus') 
                                 ON DUPLICATE KEY UPDATE substatus='$substatusn'");
        }

        $opt_subcodes = explode(' ', $entry["Opt. Sub"]);
        foreach ($opt_subcodes as $subcode) {
            $subnamen = "";  // Find the subject name based on the code
            $substatusn = '4';
            $unisubstatus = $classnumber . $secgroupname . $roll . $subcode;
            mysqli_query($link, "INSERT INTO sturegsubject (classnumber, secgroupname, roll, uniqid, subcode, subname, substatus, unisubstatus) 
                                 VALUES ('$classnumber', '$secgroupname', '$roll', '$uniqid', '$subcode', '$subnamen', '$substatusn', '$unisubstatus') 
                                 ON DUPLICATE KEY UPDATE substatus='$substatusn'");
        }
    }
}
?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section View Part END -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->       
    </div> <!-- content -->
<?php include 'inc/footer.php' ?>
