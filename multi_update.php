<?php
session_start();
require 'interdb.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Class number to name mapping
$classMap = [
    -1 => 'Nursery',
    0 => 'KG',
    1 => 'Class One',
    2 => 'Class Two',
    3 => 'Class Three',
    4 => 'Class Four',
    5 => 'Class Five',
    6 => 'Class Six',
    7 => 'Class Seven',
    8 => 'Class Eight',
    9 => 'Class Nine',
    10 => 'Class Ten',
    11 => 'Class Eleven',
    12 => 'Class Twelve'
];

// Get distinct classes from database
$classes_query = "SELECT DISTINCT classnumber FROM student ORDER BY classnumber";
$classes_result = $link->query($classes_query);

// Get distinct sections from database
$sections_query = "SELECT DISTINCT secgroup FROM student ORDER BY secgroup";
$sections_result = $link->query($sections_query);

// Available columns for update (excluding id and uniqid)
$updatable_columns = [
    'name' => 'Name (English)',
    'fname' => 'Father\'s Name (English)',
    'mname' => 'Mother\'s Name (English)',
    'nameb' => 'Name (Bengali)',
    'fnameb' => 'Father\'s Name (Bengali)',
    'mnameb' => 'Mother\'s Name (Bengali)',
    'sex' => 'Gender',
    'religion' => 'Religion',
    'birthid' => 'Birth ID',
    'dob' => 'Date of Birth',
    'fnid' => 'Father\'s NID',
    'mnid' => 'Mother\'s NID',
    'classnumber' => 'Class Number',
    'classname' => 'Class Name',
    'secgroup' => 'Section',
    'roll' => 'Roll Number',
    'address' => 'Address',
    'mobile' => 'Mobile Number',
    'imgname' => 'Profile Picture',
    'class_group' => 'Class Group'
];

// Process form submission for step 1
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['step']) && $_POST['step'] == '1') {
    $selected_class = isset($_POST['classnumber']) ? intval($_POST['classnumber']) : 0;
    $selected_section = isset($_POST['secgroup']) ? mysqli_real_escape_string($link, $_POST['secgroup']) : '';
    $selected_columns = isset($_POST['columns']) ? $_POST['columns'] : [];
    
    // Validate at least one column is selected
    if (empty($selected_columns)) {
        $status = "<div class='alert alert-danger'>Please select at least one column to update.</div>";
    } else {
        // Store selections in session for next step
        $_SESSION['multi_update'] = [
            'classnumber' => $selected_class,
            'secgroup' => $selected_section,
            'columns' => $selected_columns
        ];
        
        // Redirect to step 2
        header("Location: multi_update.php?step=2");
        exit;
    }
}

// Process form submission for step 2 (final update)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['step']) && $_POST['step'] == '2' && isset($_SESSION['multi_update'])) {
    $update_data = $_POST['update'];
    $config = $_SESSION['multi_update'];
    
    // Begin transaction
    $link->begin_transaction();
    
    try {
        foreach ($update_data as $id => $values) {
            $id = intval($id);
            $set_clauses = [];
            $params = [];
            $types = '';
            
            // First get current student data (we'll need this for payment updates)
            $current_query = "SELECT uniqid, name, classnumber, secgroup, roll FROM student WHERE id = ?";
            $current_stmt = $link->prepare($current_query);
            $current_stmt->bind_param("i", $id);
            $current_stmt->execute();
            $current_result = $current_stmt->get_result();
            $current_row = $current_result->fetch_assoc();
            $current_stmt->close();
            
            $old_uniqid = $current_row['uniqid'];
            $old_name = $current_row['name'];
            $old_classnumber = $current_row['classnumber'];
            $old_secgroup = $current_row['secgroup'];
            $old_roll = $current_row['roll'];
            
            // Build SET clauses and parameters for each selected column
            foreach ($config['columns'] as $column) {
                if (isset($values[$column])) {
                    $set_clauses[] = "$column = ?";
                    
                    // Special handling for classnumber to update classname
                    if ($column == 'classnumber') {
                        $classnumber = intval($values[$column]);
                        $set_clauses[] = "classname = ?";
                        $params[] = $classMap[$classnumber];
                        $types .= 's';
                    }
                    
                    // Add the parameter value
                    $params[] = $values[$column];
                    $types .= 's'; // Default to string type
                }
            }
            
            // Determine new values for fields that affect uniqid
            $new_classnumber = $old_classnumber;
            $new_secgroup = $old_secgroup;
            $new_roll = $old_roll;
            $new_name = $old_name;
            
            if (in_array('classnumber', $config['columns']) && isset($values['classnumber'])) {
                $new_classnumber = intval($values['classnumber']);
            }
            if (in_array('secgroup', $config['columns']) && isset($values['secgroup'])) {
                $new_secgroup = mysqli_real_escape_string($link, $values['secgroup']);
            }
            if (in_array('roll', $config['columns']) && isset($values['roll'])) {
                $new_roll = intval($values['roll']);
            }
            if (in_array('name', $config['columns']) && isset($values['name'])) {
                $new_name = mysqli_real_escape_string($link, $values['name']);
            }
            
            $new_uniqid = $new_classnumber . $new_secgroup . $new_roll;
            $set_clauses[] = "uniqid = ?";
            $params[] = $new_uniqid;
            $types .= 's';
            
            // Prepare and execute the student update query
            if (!empty($set_clauses)) {
                $sql = "UPDATE student SET " . implode(', ', $set_clauses) . " WHERE id = ?";
                $params[] = $id;
                $types .= 'i';
                
                $stmt = $link->prepare($sql);
                if (!$stmt) {
                    throw new Exception("Prepare failed: " . $link->error);
                }
                
                $stmt->bind_param($types, ...$params);
                if (!$stmt->execute()) {
                    throw new Exception("Update failed for student ID $id: " . $stmt->error);
                }
                $stmt->close();
            }
            
            // Update studentpayment table if any relevant fields changed
            if ($old_uniqid != $new_uniqid || $old_name != $new_name || $old_secgroup != $new_secgroup || $old_roll != $new_roll) {
                
                // Update studentpayment table with direct SQL
$update_payment_sql = "
    UPDATE studentpayment SET 
        secgroupname = '$new_secgroup', 
        roll = $new_roll, 
        stuname = '$new_name',
        stuid = '$new_uniqid'
    WHERE stuid = '$old_uniqid'
";

if (!$link->query($update_payment_sql)) {
    throw new Exception("Payment update failed: " . $link->error);
}

                
                // If uniqid changed, update puniid in studentpayment and iid in invoicetrx
                if ($old_uniqid != $new_uniqid) {
                    // Get all payment records with their pcatid
                    $payment_query = "SELECT id, pcatid, puniid FROM studentpayment WHERE stuid = ?";
                    $payment_stmt = $link->prepare($payment_query);
                    if (!$payment_stmt) {
                        throw new Exception("Payment query prepare failed: " . $link->error);
                    }
                    $payment_stmt->bind_param("s", $new_uniqid);
                    if (!$payment_stmt->execute()) {
                        throw new Exception("Payment query failed: " . $payment_stmt->error);
                    }
                    $payment_result = $payment_stmt->get_result();
                    
                    while ($payment_row = $payment_result->fetch_assoc()) {
                        $payment_id = $payment_row['id'];
                        $pcatid = $payment_row['pcatid'];
                        $old_puniid = $payment_row['puniid'];
                        $new_puniid = $pcatid . $new_uniqid; // Format: pcatid + stuid
                        
                        // Update puniid in studentpayment
                        $update_puniid_sql = "UPDATE studentpayment SET puniid = ? WHERE id = ?";
                        $update_puniid_stmt = $link->prepare($update_puniid_sql);
                        if (!$update_puniid_stmt) {
                            throw new Exception("Puniid update prepare failed: " . $link->error);
                        }
                        $update_puniid_stmt->bind_param("si", $new_puniid, $payment_id);
                        if (!$update_puniid_stmt->execute()) {
                            throw new Exception("Puniid update failed: " . $update_puniid_stmt->error);
                        }
                        $update_puniid_stmt->close();
                        
                        // Update corresponding record in invoicetrx
                        if (!empty($old_puniid)) {
                            $update_invoice_sql = "UPDATE invoicetrx SET iid = ? WHERE iid = ?";
                            $update_invoice_stmt = $link->prepare($update_invoice_sql);
                            if (!$update_invoice_stmt) {
                                throw new Exception("Invoice update prepare failed: " . $link->error);
                            }
                            $update_invoice_stmt->bind_param("ss", $new_puniid, $old_puniid);
                            if (!$update_invoice_stmt->execute()) {
                                throw new Exception("Invoice update failed: " . $update_invoice_stmt->error);
                            }
                            $update_invoice_stmt->close();
                        }
                    }
                    $payment_stmt->close();
                }
            }
        }
        
        // Commit transaction
        $link->commit();
        
        $status = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success!</strong> Students and all related records updated successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        unset($_SESSION['multi_update']); // Clear session data
    } catch (Exception $e) {
        $link->rollback();
        $status = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Error!</strong> " . $e->getMessage() . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}

// Display step 2 if in session
$current_step = isset($_GET['step']) ? intval($_GET['step']) : 1;
if ($current_step == 2 && !isset($_SESSION['multi_update'])) {
    $current_step = 1;
    $status = "<div class='alert alert-warning'>Your session expired. Please start again.</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Student Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .column-checkbox {
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 10px;
            min-width: 150px;
        }
        .student-table th {
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Multiple Student Update</h2>
        
        <?php if (isset($status)) echo $status; ?>
        
        <?php if ($current_step == 1): ?>
        <!-- Step 1: Select Class, Section, and Columns -->
        <form method="post" action="multi_update.php">
            <input type="hidden" name="step" value="1">
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="classnumber" class="form-label">Class</label>
                    <select class="form-select" id="classnumber" name="classnumber" required>
                        <option value="">Select Class</option>
                        <?php while ($class = $classes_result->fetch_assoc()): ?>
                            <option value="<?= $class['classnumber'] ?>">
                                <?= $classMap[$class['classnumber']] ?? 'Class ' . $class['classnumber'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="secgroup" class="form-label">Section</label>
                    <select class="form-select" id="secgroup" name="secgroup" required>
                        <option value="">Select Section</option>
                        <?php while ($section = $sections_result->fetch_assoc()): ?>
                            <option value="<?= $section['secgroup'] ?>"><?= $section['secgroup'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">Select Columns to Update</div>
                <div class="card-body">
                    <?php foreach ($updatable_columns as $col => $label): ?>
                        <div class="form-check column-checkbox">
                            <input class="form-check-input" type="checkbox" name="columns[]" value="<?= $col ?>" id="col_<?= $col ?>">
                            <label class="form-check-label" for="col_<?= $col ?>">
                                <?= $label ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
        <?php elseif ($current_step == 2): ?>
        <!-- Step 2: Edit Student Data -->
        <?php
        $config = $_SESSION['multi_update'];
        $query = "SELECT * FROM student WHERE classnumber = ? AND secgroup = ? ORDER BY roll";
        $stmt = $link->prepare($query);
        $stmt->bind_param("is", $config['classnumber'], $config['secgroup']);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        
        <form method="post" action="multi_update.php">
            <input type="hidden" name="step" value="2">
            
            <div class="alert alert-info mb-3">
                You are updating <?= $result->num_rows ?> students in 
                <?= $classMap[$config['classnumber']] ?? 'Class ' . $config['classnumber'] ?> - 
                Section <?= $config['secgroup'] ?>. 
                Editing columns: <?= implode(', ', array_map(function($col) use ($updatable_columns) { 
                    return $updatable_columns[$col]; 
                }, $config['columns'])) ?>.
            </div>
            
            <div class="table-responsive student-table" style="max-height: 70vh; overflow-y: auto;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <?php foreach ($config['columns'] as $col): ?>
                                <th><?= $updatable_columns[$col] ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($student = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $student['roll'] ?></td>
                                <td><?= $student['name'] ?></td>
                                <?php foreach ($config['columns'] as $col): ?>
                                    <td>
                                        <?php if ($col == 'sex'): ?>
                                            <select name="update[<?= $student['id'] ?>][<?= $col ?>]" class="form-control form-control-sm">
                                                <option value="Male" <?= $student[$col] == 'Male' ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= $student[$col] == 'Female' ? 'selected' : '' ?>>Female</option>
                                                <option value="Other" <?= $student[$col] == 'Other' ? 'selected' : '' ?>>Other</option>
                                            </select>
                                        <?php elseif ($col == 'classnumber'): ?>
                                            <select name="update[<?= $student['id'] ?>][<?= $col ?>]" class="form-control form-control-sm">
                                                <?php foreach ($classMap as $num => $name): ?>
                                                    <option value="<?= $num ?>" <?= $student[$col] == $num ? 'selected' : '' ?>>
                                                        <?= $name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php elseif ($col == 'dob'): ?>
                                            <input type="date" name="update[<?= $student['id'] ?>][<?= $col ?>]" 
                                                   value="<?= $student[$col] ?>" class="form-control form-control-sm">
                                        <?php else: ?>
                                            <input type="text" name="update[<?= $student['id'] ?>][<?= $col ?>]" 
                                                   value="<?= htmlspecialchars($student[$col]) ?>" class="form-control form-control-sm">
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update All Students</button>
                <a href="multi_update.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>