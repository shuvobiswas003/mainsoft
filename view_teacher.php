<?php
require "interdb.php";

// Check if teacher_id is provided and valid
$teacher_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($teacher_id <= 0) {
    die('Invalid teacher ID');
}

// Use prepared statement to prevent SQL injection
$query = "SELECT * FROM teacher WHERE id = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $teacher_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the query was successful and teacher exists
if (!$result || mysqli_num_rows($result) == 0) {
    die('Teacher not found');
}

// Fetch the data for the teacher
$teacher = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Teacher Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .profile-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .profile-details {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .detail-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .school-header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .print-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- School Info Header -->
        <?php
        $sel_query2 = "SELECT * FROM schoolinfo LIMIT 1";
        $result2 = mysqli_query($link, $sel_query2);
        if ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
        <div class="school-header text-center mb-4">
            <h1 class="display-4"><?php echo htmlspecialchars($row2['schoolname']); ?></h1>
            <p class="lead mb-1"><?php echo htmlspecialchars($row2['schooladdress']); ?></p>
            <p class="mb-0"><?php echo htmlspecialchars($row2['website']); ?></p>
        </div>
        <?php } ?>

        <!-- Teacher Profile Card -->
        <div class="profile-header text-center">
            <h2 class="mb-4"><i class="bi bi-person-badge me-2"></i>Teacher Profile</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 text-center mb-4">
                <?php 
                $imagePath = "img/" . (empty($teacher['image']) ? 'default_profile.jpg' : $teacher['image']);
                if (!file_exists($imagePath)) {
                    $imagePath = "img/default_profile.jpg";
                }
                ?>
                <img src="<?php echo $imagePath; ?>" alt="Teacher Photo" class="profile-img mb-3">
                <h3 class="mt-3"><?php echo htmlspecialchars($teacher['name']); ?></h3>
                <h5 class="text-muted"><?php echo htmlspecialchars($teacher['degnation']); ?></h5>
            </div>

            <div class="col-md-8">
                <div class="profile-details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <h5><i class="bi bi-person-vcard me-2"></i>Teacher ID</h5>
                                <p><?php echo htmlspecialchars($teacher['id']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-person me-2"></i>Father's Name</h5>
                                <p><?php echo htmlspecialchars($teacher['tfname']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-person me-2"></i>Mother's Name</h5>
                                <p><?php echo htmlspecialchars($teacher['tmname']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-calendar-date me-2"></i>Date of Birth</h5>
                                <p><?php echo htmlspecialchars($teacher['tdob']); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <h5><i class="bi bi-mortarboard me-2"></i>Highest Degree</h5>
                                <p><?php echo htmlspecialchars($teacher['leatestdegree']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-telephone me-2"></i>Mobile Number</h5>
                                <p><?php echo htmlspecialchars($teacher['mob']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-award me-2"></i>Teacher SL Index</h5>
                                <p><?php echo htmlspecialchars($teacher['teachersl']); ?></p>
                            </div>
                            <div class="detail-item">
                                <h5><i class="bi bi-calendar-check me-2"></i>Join Date</h5>
                                <p><?php echo htmlspecialchars($teacher['joindate']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center print-button">
            <button onclick="window.print()" class="btn btn-primary">
                <i class="bi bi-printer me-2"></i>Print Profile
            </button>
            <a href="addteacher.php" class="btn btn-secondary ms-2">
                <i class="bi bi-arrow-left me-2"></i>Back to Teacher List
            </a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Print styling
        document.addEventListener("DOMContentLoaded", function() {
            const printButton = document.querySelector('button[onclick="window.print()"]');
            printButton.addEventListener('click', function() {
                setTimeout(function() {
                    window.close();
                }, 1000);
            });
        });
    </script>
</body>
</html>