<?php
require "interdb.php"; // your DB connection with $link

// Add Period
if (isset($_POST['add_period'])) {
    $period_name = mysqli_real_escape_string($link, $_POST['period_name']);
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $query = "INSERT INTO class_periods (period_name, start_time, end_time) VALUES ('$period_name', '$start_time', '$end_time')";
    mysqli_query($link, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Edit Period
if (isset($_POST['edit_period'])) {
    $id = (int)$_POST['id'];
    $period_name = mysqli_real_escape_string($link, $_POST['period_name']);
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $query = "UPDATE class_periods SET period_name='$period_name', start_time='$start_time', end_time='$end_time' WHERE id=$id";
    mysqli_query($link, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Delete Period
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM class_periods WHERE id=$id";
    mysqli_query($link, $query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch all periods
$result = mysqli_query($link, "SELECT * FROM class_periods ORDER BY start_time ASC");
$periods = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Class Period Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    body {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        min-height: 100vh;
    }
    .card {
        border-radius: 1rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }
    .card-header {
        background: #ff6a00;
        background: linear-gradient(45deg, #ff6a00, #ee0979);
        color: white;
        font-weight: 700;
        font-size: 1.4rem;
        border-radius: 1rem 1rem 0 0;
        letter-spacing: 1px;
        text-align:center;
    }
    .btn-success {
        background: #28a745;
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .btn-success:hover {
        background: #218838;
    }
    .btn-primary {
        background: #007bff;
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .btn-primary:hover {
        background: #0056b3;
    }
    .btn-danger {
        background: #dc3545;
        border: none;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .btn-danger:hover {
        background: #a71d2a;
    }
    table.table {
        background: white;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    table.table thead {
        background: #ff6a00;
        background: linear-gradient(45deg, #ff6a00, #ee0979);
        color: white;
    }
    table.table tbody tr:hover {
        background: #ffe6f0;
        cursor: pointer;
        transition: background 0.3s;
    }
    /* Responsive - horizontal scroll on small devices */
    .table-responsive {
        overflow-x: auto;
    }
    /* Cards for mobile */
    @media (max-width: 575.98px) {
        table.table {
            display: none;
        }
        .period-card {
            background: white;
            margin-bottom: 1rem;
            border-radius: 1rem;
            padding: 1rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .period-card h5 {
            color: #ee0979;
            font-weight: 700;
        }
        .period-info {
            font-weight: 600;
            margin: 0.25rem 0;
        }
        .period-actions button,
        .period-actions a {
            margin-right: 0.5rem;
            margin-top: 0.5rem;
        }
    }
</style>
</head>
<body>

<div class="container py-5">
    <div class="card">
        <div class="card-header">
            📚 Class Period Management
        </div>
        <div class="card-body">
            <!-- Add Period Form -->
            <form method="POST" class="row g-3 mb-4">
                <div class="col-md-4 col-12">
                    <input type="text" name="period_name" class="form-control form-control-lg" placeholder="Period Name (e.g., 1st)" required />
                </div>
                <div class="col-md-3 col-6">
                    <input type="time" name="start_time" class="form-control form-control-lg" required />
                </div>
                <div class="col-md-3 col-6">
                    <input type="time" name="end_time" class="form-control form-control-lg" required />
                </div>
                <div class="col-md-2 col-12 d-grid">
                    <button type="submit" name="add_period" class="btn btn-success btn-lg">➕ Add Period</button>
                </div>
            </form>

            <!-- Table for md+ screens -->
            <div class="table-responsive d-none d-sm-block">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Period Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($periods as $index => $p): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($p['period_name']) ?></td>
                                <td><?= $p['start_time'] ?></td>
                                <td><?= $p['end_time'] ?></td>
                                <td>
                                    <!-- Edit button triggers modal, no form submission here -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id'] ?>">✏️ Edit</button>

                                    <!-- Delete is normal link -->
                                    <a href="?delete=<?= $p['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">🗑️ Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Cards for xs screens -->
            <div class="d-block d-sm-none">
                <?php foreach ($periods as $index => $p): ?>
                    <div class="period-card">
                        <h5><?= htmlspecialchars($p['period_name']) ?></h5>
                        <p class="period-info">Start: <strong><?= $p['start_time'] ?></strong></p>
                        <p class="period-info">End: <strong><?= $p['end_time'] ?></strong></p>
                        <div class="period-actions">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id'] ?>">✏️ Edit</button>
                            <a href="?delete=<?= $p['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">🗑️ Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- All Edit Modals placed OUTSIDE table and loop, after content to avoid nesting issues -->
<?php foreach ($periods as $p): ?>
<div class="modal fade" id="editModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $p['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" class="modal-content">
            <div class="modal-header" style="background: #87CEEB; color: #fff;">
                <h5 class="modal-title" id="editModalLabel<?= $p['id'] ?>">Edit Period</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <input type="hidden" name="id" value="<?= $p['id'] ?>" />
                <div class="mb-3">
                    <label class="form-label">Period Name</label>
                    <input type="text" name="period_name" class="form-control" value="<?= htmlspecialchars($p['period_name']) ?>" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time" name="start_time" class="form-control" value="<?= $p['start_time'] ?>" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">End Time</label>
                    <input type="time" name="end_time" class="form-control" value="<?= $p['end_time'] ?>" required />
                </div>
            </div>
            <div class="modal-footer" style="background: #ff6a00;">
                <button type="submit" name="edit_period" class="btn btn-white fw-bold" style="color:#fff;">💾 Save Changes</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
