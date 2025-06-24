<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.0/cropper.min.css" />

    <style>
        body {
            background: linear-gradient(to right, #f0f4f7, #d9e8f5);
            font-family: Arial, sans-serif;
            padding-top: 40px;
        }
        .card {
            margin: 0 auto;
            max-width: 900px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: none;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 26px;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        .form-control, .form-control-file, {
            border: 1px solid #ced4da;
        }
        .btn-primary {
            border-radius: 10px;
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .d-none {
            display: none !important;
        }
        .is-invalid {
    border-color: red; /* Change the border color to red for invalid fields */
}

          /* Custom styles for a colorful navbar */
        .navbar {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient color */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important; /* White color for the brand */
        }
        .nav-link, .btn-custom {
            color: white !important; /* White color for links */
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
        }
        .btn-custom {
            background-color: #ff6f61; /* Flush pink color */
            border-radius: 30px; /* Rounded corners */
            padding: 10px 20px; /* More padding for buttons */
            margin-left: 10px; /* Consistent left margin */
        }
        .btn-custom:hover {
            background-color: #ff4f3b; /* Darker shade on hover */
            transform: scale(1.05); /* Slightly increase size on hover */
        }
        .nav-item {
            margin-right: 10px; /* Space between nav items */
        }
    </style>

 
</head>
<body>
<!-- School Info Start -->
<?php
    require "../interdb.php";
    $sel_query2 = "SELECT * FROM schoolinfo";
    $result2 = mysqli_query($link, $sel_query2);
    $schoolName = '';
    while ($row2 = mysqli_fetch_assoc($result2)) {
    $schoolName = $row2['schoolname'];
?>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <img src="../img/lego.png?<?php echo time()?>" alt="School Logo" style="height: 120px; width: 120px;">
            <h1 class="mt-3"><?php echo $row2['schoolname'] ?></h1>
        </div>
    </div>
<?php } ?>
<?php include "inc/top_nav.php";?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Student Admission Form
        </div>
        <div class="card-body">
            <form action="search_payslip.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" target="_blank">
            <!-- Step 1 -->
                <div id="step-1">
                    <h4 class="text-center mb-4">Download Pay Slip</h4>

                   
                <!-- Current Roll Field (Displayed when "Old" is selected) -->
                <div class="form-group" id="current_roll_group">
                <label for="current_roll">Enter Bith ID Number</label>
                <input type="number" class="form-control" id="current_roll" name="birth_id" placeholder="Enter Birth ID Number:">
                </div>


                <div class="text-center">

                <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function nextStep(step) {
    // Get the current step element
    const currentStep = document.getElementById("step-" + (step - 1));
    const requiredFields = currentStep.querySelectorAll("[required]");

    // Check if all required fields are filled
    let allFilled = true;
    requiredFields.forEach(field => {
        if (field.offsetParent === null) return; // Skip hidden fields
        if (!field.value.trim()) {
            allFilled = false;
            field.classList.add("is-invalid");
        } else {
            field.classList.remove("is-invalid");
        }
    });

    if (allFilled) {
        currentStep.classList.add("d-none");
        document.getElementById("step-" + step).classList.remove("d-none");
    } else {
        alert("Please fill all required fields.");
    }
}

function previousStep(step) {
    const currentStep = document.getElementById("step-" + (step + 1));
    currentStep.classList.add("d-none");
    document.getElementById("step-" + step).classList.remove("d-none");
}
</script>
<script>
function setDesiredClass() {
    var currentClass = parseInt(document.getElementById("current_class").value);
    var desiredClass = document.getElementById("desired_class");

    // Clear all existing options
    desiredClass.innerHTML = "";

    if (!isNaN(currentClass)) {
        // Option for the next class
        var optionNext = document.createElement("option");
        optionNext.value = currentClass + 1;
        optionNext.text = "Class " + (currentClass + 1 === 0 ? "KG" : currentClass + 1);
        desiredClass.add(optionNext);

        // Option for the same class
        var optionSame = document.createElement("option");
        optionSame.value = currentClass;
        optionSame.text = "Class " + (currentClass === -1 ? "Nursery" : currentClass === 0 ? "KG" : currentClass);
        desiredClass.add(optionSame);
    }
}
</script>

<script>
    // PHP school name variable passed to JavaScript
    var schoolName = "<?php echo addslashes($schoolName); ?>";

    function toggleCurrentRollAndSchool() {
        var admissionType = document.getElementById("add_type").value;
        var currentRollGroup = document.getElementById("current_roll_group");
        var runningSchoolName = document.getElementById("running_school_name");

        // Show or hide Current Roll field
        currentRollGroup.style.display = admissionType === "Old" ? "block" : "none";

        // Auto-fill Running School Name if "Old" is selected
        if (admissionType === "Old") {
            runningSchoolName.value = schoolName;
        } else {
            runningSchoolName.value = ""; // Clear if "New" is selected
        }
    }

    
</script>
<script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = "block"; // Show the preview
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = "none"; // Hide the preview if no file selected
            }
        }
    </script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
