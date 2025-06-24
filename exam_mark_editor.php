<?php include 'interdb.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Exam Mark Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h3 class="mb-4">Search Student Exam Marks</h3>

<form method="POST" class="row g-3 mb-4">
    <div class="col-md-2">
        <input type="number" name="classnumber" class="form-control" placeholder="Class Number" required>
    </div>
    <div class="col-md-2">
        <input type="text" name="secgroupname" class="form-control" placeholder="Section/Group" required>
    </div>
    <div class="col-md-2">
        <input type="number" name="examid" class="form-control" placeholder="Exam ID" required>
    </div>
    <div class="col-md-2">
        <input type="number" name="roll" class="form-control" placeholder="Roll Number" required>
    </div>
    <div class="col-md-2">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
    </div>
</form>

<?php
// Handle update
if (isset($_POST['update_mark'])) {
    $id = $_POST['id'];
    $cq = $_POST['cq'];
    $mcq = $_POST['mcq'];
    $practical = $_POST['practical'];
    $lettergrade = $_POST['lettergrade'];
    $letterpoint = $_POST['letterpoint'];

    $sql = "UPDATE exammark SET 
                cq='$cq', 
                mcq='$mcq', 
                practical='$practical', 
                lettergrade='$lettergrade', 
                letterpoint='$letterpoint' 
            WHERE id='$id'";
    
    if (mysqli_query($link, $sql)) {
        echo "<div class='alert alert-success'>Mark updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to update: " . mysqli_error($link) . "</div>";
    }
}

// Handle delete
if (isset($_POST['delete_mark'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM exammark WHERE id='$id'";
    if (mysqli_query($link, $sql)) {
        echo "<div class='alert alert-success'>Mark deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to delete: " . mysqli_error($link) . "</div>";
    }
}

// Handle search
if (isset($_POST['search'])) {
    $classnumber = $_POST['classnumber'];
    $secgroupname = $_POST['secgroupname'];
    $examid = $_POST['examid'];
    $roll = $_POST['roll'];

    $sql = "SELECT * FROM exammark 
            WHERE classnumber='$classnumber' 
              AND secgroupname='$secgroupname' 
              AND examid='$examid' 
              AND roll='$roll'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<form method='POST'><table class='table table-bordered'>
                <thead class='table-dark'>
                    <tr>
                        <th>Subject</th>
                        <th>Sub Code</th>
                        <th>CQ</th>
                        <th>MCQ</th>
                        <th>Practical</th>
                        <th>Letter Grade</th>
                        <th>Letter Point</th>
                        <th>Action</th>
                    </tr>
                </thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <td><?= htmlspecialchars($row['subname']) ?></td>
                    <td><?= $row['subcode'] ?></td>
                    <td><input type="number" name="cq" value="<?= $row['cq'] ?>" class="form-control" required></td>
                    <td><input type="number" name="mcq" value="<?= $row['mcq'] ?>" class="form-control" required></td>
                    <td><input type="number" name="practical" value="<?= $row['practical'] ?>" class="form-control" required></td>
                    <td><input type="text" name="lettergrade" value="<?= $row['lettergrade'] ?>" class="form-control" required></td>
                    <td><input type="text" name="letterpoint" value="<?= $row['letterpoint'] ?>" class="form-control" required></td>
                    <td>
                        <button type="submit" name="update_mark" class="btn btn-sm btn-success mb-1">Update</button>
                        <button type="submit" name="delete_mark" class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?');">Delete</button>
                    </td>
                </form>
            </tr>
            <?php
        }

        echo "</tbody></table></form>";
    } else {
        echo "<div class='alert alert-warning'>No exam records found for this student.</div>";
    }
}
?>

</body>
</html>
