<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert and Update Shift Timings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Insert or Update Shift Timings</h2>

        <?php
        // Include database configuration file
        require_once 'dbconfig.php';

        // Initialize variables
        $clock_in_start_time = $clock_in_end_time = $clock_out_start_time = $clock_out_end_time = "";
        $update = false;
        $id = 0;

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $clock_in_start_time = $_POST['clock_in_start_time'];
            $clock_in_end_time = $_POST['clock_in_end_time'];
            $clock_out_start_time = $_POST['clock_out_start_time'];
            $clock_out_end_time = $_POST['clock_out_end_time'];

            if (isset($_POST['update'])) {
                // Update existing record
                $id = $_POST['id'];
                $sql = "UPDATE att_time_table SET clock_in_start_time='$clock_in_start_time', clock_in_end_time='$clock_in_end_time', clock_out_start_time='$clock_out_start_time', clock_out_end_time='$clock_out_end_time' WHERE id=$id";

                if (mysqli_query($link, $sql)) {
                    echo '<div class="alert alert-success" role="alert">Shift timing updated successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . mysqli_error($link) . '</div>';
                }
            } else {
                // Insert new record
                $sql = "INSERT INTO att_time_table (clock_in_start_time, clock_in_end_time, clock_out_start_time, clock_out_end_time) VALUES ('$clock_in_start_time', '$clock_in_end_time', '$clock_out_start_time', '$clock_out_end_time')";

                if (mysqli_query($link, $sql)) {
                    echo '<div class="alert alert-success" role="alert">New shift timing inserted successfully</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error: ' . $sql . '<br>' . mysqli_error($link) . '</div>';
                }
            }
        }

        // Handle edit button click
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $result = mysqli_query($link, "SELECT * FROM att_time_table WHERE id=$id");

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $clock_in_start_time = $row['clock_in_start_time'];
                $clock_in_end_time = $row['clock_in_end_time'];
                $clock_out_start_time = $row['clock_out_start_time'];
                $clock_out_end_time = $row['clock_out_end_time'];
                $update = true;
            }
        }
        ?>

        <form method="POST" action="" class="mb-5">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="clock_in_start_time">Clock In Start Time (HH:MM:SS):</label>
                <input type="time" class="form-control" id="clock_in_start_time" name="clock_in_start_time" value="<?php echo $clock_in_start_time; ?>" required>
            </div>

            <div class="form-group">
                <label for="clock_in_end_time">Clock In End Time (HH:MM:SS):</label>
                <input type="time" class="form-control" id="clock_in_end_time" name="clock_in_end_time" value="<?php echo $clock_in_end_time; ?>" required>
            </div>

            <div class="form-group">
                <label for="clock_out_start_time">Clock Out Start Time (HH:MM:SS):</label>
                <input type="time" class="form-control" id="clock_out_start_time" name="clock_out_start_time" value="<?php echo $clock_out_start_time; ?>" required>
            </div>

            <div class="form-group">
                <label for="clock_out_end_time">Clock Out End Time (HH:MM:SS):</label>
                <input type="time" class="form-control" id="clock_out_end_time" name="clock_out_end_time" value="<?php echo $clock_out_end_time; ?>" required>
            </div>

            <?php if ($update): ?>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            <?php endif; ?>
        </form>

        <h2>All Shift Timings</h2>
        <div id="allShifts">
            <?php 
            // Fetch all shift timings
            $sql = "SELECT * FROM att_time_table";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-bordered">';
                echo '<thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Clock In Start Time</th>
                            <th>Clock In End Time</th>
                            <th>Clock Out Start Time</th>
                            <th>Clock Out End Time</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>';
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['clock_in_start_time'] . "</td>
                            <td>" . $row['clock_in_end_time'] . "</td>
                            <td>" . $row['clock_out_start_time'] . "</td>
                            <td>" . $row['clock_out_end_time'] . "</td>
                            <td>" . $row['created_at'] . "</td>
                            <td>
                                <a href='time_table_assign.php?edit=" . $row['id'] . "' class='btn btn-info btn-sm'>Edit</a>
                            </td>
                          </tr>";
                }
                echo '</tbody></table>';
            } else {
                echo '<div class="alert alert-info" role="alert">No results found</div>';
            }

            // Close connection
            mysqli_close($link);
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
