<?php
require "interdb.php";

// Get parameters from POST request
$className = isset($_POST['class']) ? $_POST['class'] : '';
$section = isset($_POST['section']) ? $_POST['section'] : '';
$filterType = isset($_POST['filter_type']) ? $_POST['filter_type'] : '';
$filterValue = isset($_POST['filter_value']) ? $_POST['filter_value'] : '';

// Build base query using correct column names from your table structure
$query = "SELECT id, roll as studentid, name as studentname, sex, religion, dob, 
          TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age, 
          fname, mname, birthid, fnid, mnid, address, mobile, uniqid, imgname, addmission_id
          FROM student 
          WHERE classname = ? AND secgroup = ?";

// Add filter conditions based on the filter type
if ($filterType === 'gender') {
    $query .= " AND sex = ?";
} elseif ($filterType === 'religion') {
    if ($filterValue === 'Other') {
        $query .= " AND (religion IS NULL OR religion NOT IN ('Islam', 'Hindu', 'Christianity', 'Buddhism'))";
    } else {
        $query .= " AND religion = ?";
    }
} elseif ($filterType === 'age') {
    if ($filterValue == '18') {
        $query .= " AND TIMESTAMPDIFF(YEAR, dob, CURDATE()) >= ?";
    } else {
        $query .= " AND TIMESTAMPDIFF(YEAR, dob, CURDATE()) = ?";
    }
}

$query .= " ORDER BY name ASC"; // Changed to use 'name' column instead of 'studentname'

// Prepare and execute the query
$stmt = $link->prepare($query);

if ($filterType === 'gender' || ($filterType === 'religion' && $filterValue !== 'Other') || $filterType === 'age') {
    $stmt->bind_param("sss", $className, $section, $filterValue);
} else {
    $stmt->bind_param("ss", $className, $section);
}

$stmt->execute();
$result = $stmt->get_result();

// Display the results
if ($result->num_rows > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered table-striped table-hover">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Roll</th>';
    echo '<th>Name</th>';
    echo '<th>Father</th>';
    echo '<th>Mother</th>';
    echo '<th>Gender</th>';
    echo '<th>Religion</th>';
    echo '<th>Age</th>';
    echo '<th>Birth ID</th>';
    echo '<th>Address</th>';
    echo '<th>Mobile</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['studentid']) . '</td>';
        echo '<td>' . htmlspecialchars($row['studentname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['fname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['mname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['sex']) . '</td>';
        echo '<td>' . (empty($row['religion']) ? 'N/A' : htmlspecialchars($row['religion'])) . '</td>';
        echo '<td>' . htmlspecialchars($row['age']) . '</td>';
        echo '<td>' . htmlspecialchars($row['birthid']) . '</td>';
        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
        echo '<td>' . htmlspecialchars($row['mobile']) . '</td>';
        echo '<td>';
        echo '<a href="edit_student.php?id=' . $row['id'] . '" target="_blank" class="btn btn-sm btn-primary">';
        echo '<i class="fa fa-edit"></i> Edit';
        echo '</a>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<div class="alert alert-info">No students found matching the criteria.</div>';
}

$stmt->close();
$link->close();
?>