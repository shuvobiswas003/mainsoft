<!DOCTYPE html>
<html>
<head>
    <title>Search Student Payments</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .big-text {
            font-size: 1.25rem; /* Larger text */
        }
        .table-responsive {
            font-size: 1.25rem; /* Larger text */
        }
    </style>
</head>
<body class="container mt-5">

<h2 class="mb-4 big-text">Search Student Payments</h2>

<form method="post" action="" class="mb-5">
    <div class="form-group">
        <label for="roll" class="big-text">Student Roll:</label>
        <input type="text" class="form-control big-text" id="roll" name="roll">
    </div>
    <div class="form-group">
        <label for="classnumber" class="big-text">Class Number:</label>
        <input type="text" class="form-control big-text" id="classnumber" name="classnumber">
    </div>
    <div class="form-group">
        <label for="secgroupname" class="big-text">Sec Group Name:</label>
        <input type="text" class="form-control big-text" id="secgroupname" name="secgroupname">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Search</button>
</form>



<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
