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
<!-- School Info END -->
<div class="container">
    <div class="card">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="Cust-name">Chose Bris BD HTML</label>
        <div class="col-md-9">
           <input type="file" name="bris_file" required="1">
        </div>
    </div>
    
    <input type="submit" class="btn btn-primary" Value="Get Data">
</form>
</div>
</div>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){


$file = $_FILES['bris_file']['tmp_name'];
$handle = fopen($file, "r");

// Read the content of the file into a string
$contents = fread($handle, filesize($file));

// Remove HTML tags
$cleanedContent = strip_tags($contents);

$fullstring=$cleanedContent;
$fullstring = str_replace(array("\r", "\n"), ' ', $fullstring);
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

// BRIS QR
$brisqr = "NOT-Available"; // Example default value

// Student Part (English)
$name = get_string_between($fullstring, 'Registered Person Name', 'জন্মস্থান');
$name = trim($name) ?: "No Data ON BRIS BD";

$fname = get_string_between($fullstring, "Father's Name", 'পিতার জাতীয়তা');
$fname = trim($fname) ?: "No Data ON BRIS BD";

$mname = get_string_between($fullstring, "Mother's Name", 'মাতার জাতীয়তা');
$mname = trim($mname) ?: "No Data ON BRIS BD";

// Student Part (Bangla)
$nameb = get_string_between($fullstring, "নিবন্ধিত ব্যক্তির নাম", "Registered Person Name");
$nameb = trim($nameb);

$fnameb = get_string_between($fullstring, "পিতার নাম", "Father's Name");
$fnameb = trim($fnameb);

$mnameb = get_string_between($fullstring, "মাতার নাম", "Mother's Name");
$mnameb = trim($mnameb);

// Gender
$gender = strpos($fullstring, "FEMALE") === false ? "MALE" : "FEMALE";

// National Data Section
$arrayName = explode("Sex", $fullstring);
$bdata = trim($arrayName[1]);
$data = explode(" ", $bdata);
$birthid = $data[35] ?? '';

$date = $data[0] ?? '';
$month = $data[1] ?? '';
$year = $data[2] ?? '';
$daten = $date . "-" . $month . "-" . $year;
$dob = date("Y-m-d", strtotime($daten));

// NID Numbers
$fnid = 0; // Default value for Father's NID
$mnid = 0; // Default value for Mother's NID


$address = get_string_between($fullstring, "Place of Birth", "মাতার");
$address = trim($address);

$address_bangla = get_string_between($fullstring, "জন্মস্থান", "Place of Birth");
$address_bangla = trim($address_bangla);
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Student Admission Form
        </div>
        <div class="card-body">
            <form action="submit_admission.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <!-- Step 1 -->
                <div id="step-1">
                    <h4 class="text-center mb-4">Step 1: Admission Class</h4>

                    <!-- Admission Type -->
    <div class="form-row">
        <label for="add_type">Admission Type</label>
        <select name="add_type" id="add_type" class="form-control" required onchange="toggleCurrentRollAndSchool()">
            <option value="">Select Type</option>
            <option value="New">New</option>
            <option value="Old">Old</option>
        </select>
    </div>

    <!-- Current Roll Field (Displayed when "Old" is selected) -->
    <div class="form-group" id="current_roll_group" style="display: none;">
        <label for="current_roll">Current Roll</label>
        <input type="number" class="form-control" id="current_roll" name="current_roll" placeholder="Enter Current Roll">
    </div>

    <!-- Current and Desired Class Fields -->
    <div class="form-row">
        <div class="col-md-6 form-group">
            <label for="current_class">Current Class</label>
            <select class="form-control" id="current_class" name="current_class" required onchange="setDesiredClass()">
                <option value="">Select Class</option>
                <option value="-1">Nursery</option>
                <option value="0">KG</option>
                <option value="1">Class 1</option>
                <option value="2">Class 2</option>
                <option value="3">Class 3</option>
                <option value="4">Class 4</option>
                <option value="5">Class 5</option>
                <option value="6">Class 6</option>
                <option value="7">Class 7</option>
                <option value="8">Class 8</option>
                <option value="9">Class 9</option>
                <option value="10">Class 10</option>
                <option value="11">Class 11</option>
                <option value="12">Class 12</option>
            </select>
        </div>
        <div class="col-md-6 form-group">
            <label for="desired_class">Desired Class</label>
            <select class="form-control" id="desired_class" name="desired_class" required>
                <option value="">Select Desired Class</option>
                <option value="-1">Nursery</option>
                <option value="0">KG</option>
                <option value="1">Class 1</option>
                <option value="2">Class 2</option>
                <option value="3">Class 3</option>
                <option value="4">Class 4</option>
                <option value="5">Class 5</option>
                <option value="6">Class 6</option>
                <option value="7">Class 7</option>
                <option value="8">Class 8</option>
                <option value="9">Class 9</option>
                <option value="10">Class 10</option>
                <option value="11">Class 11</option>
                <option value="12">Class 12</option>
            </select>
        </div>
    </div>

    <!-- Running School Name -->
    <div class="form-group">
        <label for="running_school_name">Running School Name</label>
        <input type="text" class="form-control" id="running_school_name" name="running_school_name" required>
    </div>
                    
                    <div class="text-center">
                         <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                    </div>
                </div>
       

                <!-- Step 2 -->
                <div id="step-2" class="d-none">
                    <h4 class="text-center mb-4">Step 2: Student Information</h4>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="student_name_eng">Student Name (English)</label>
                        <input type="text" class="form-control" id="student_name_eng" name="student_name_eng" value="<?php echo $name?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="student_name_bn">Student Name (বাংলা)</label>
                        <input type="text" class="form-control" id="student_name_bn" name="student_name_bn" value="<?php echo $nameb?>" required >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="father_name_eng">Father's Name (English)</label>
                        <input type="text" class="form-control" id="father_name_eng" name="father_name_eng" value="<?php echo $fname?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="father_name_bn">Father's Name (বাংলা)</label>
                        <input type="text" class="form-control" id="father_name_bn" name="father_name_bn" value="<?php echo $fnameb?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="mother_name_eng">Mother's Name (English)</label>
                        <input type="text" class="form-control" id="mother_name_eng" name="mother_name_eng" value="<?php echo $mname?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="mother_name_bn">Mother's Name (বাংলা)</label>
                        <input type="text" class="form-control" id="mother_name_bn" name="mother_name_bn" value="<?php echo $mnameb?>" required>
                    </div>
                </div>
                 <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="father_phone">Father's NID Number</label>
                        <input type="tel" class="form-control" id="father_nid" name="father_nid" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="mother_phone">Mother's NID Number</label>
                        <input type="tel" class="form-control" id="mother_nid" name="mother_nid" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="father_phone">Father's Phone</label>
                        <input type="tel" class="form-control" id="father_phone" name="father_phone" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="mother_phone">Mother's Phone</label>
                        <input type="tel" class="form-control" id="mother_phone" name="mother_phone" required>
                    </div>
                </div>
                <div class="form-row">
    <div class="col-md-6 form-group">
        <label for="father_occupation">Father's Occupation</label>
        <select class="form-control" id="father_occupation" name="father_occupation" required>
            <option value="">Select Occupation</option>
            <option value="Government Employee">Government Employee</option>
            <option value="Non Government Employee">Non Government Employee</option>
            <option value="Businessman">Businessman</option>
            <option value="Self-Employed">Self-Employed</option> <!-- Added -->
            <option value="Engineer">Engineer</option>
            <option value="Doctor">Doctor</option>
            <option value="Teacher">Teacher</option>
            <option value="Farmer">Farmer</option>
            <option value="Police Officer">Police Officer</option>
            <option value="Lawyer">Lawyer</option>
            <option value="Driver">Driver</option>
            <option value="Electrician">Electrician</option>
            <option value="Laborer">Laborer</option>
            <option value="Accountant">Accountant</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="col-md-6 form-group">
        <label for="mother_occupation">Mother's Occupation</label>
        <select class="form-control" id="mother_occupation" name="mother_occupation" required>
            <option value="">Select Occupation</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Government Employee">Government Employee</option>
            <option value="Non Government Employee">Non Government Employee</option>
            <option value="Self-Employed">Self-Employed</option> <!-- Added -->
            <option value="Teacher">Teacher</option>
            <option value="Doctor">Doctor</option>
            <option value="Engineer">Engineer</option>
            <option value="Businesswoman">Businesswoman</option>
            <option value="Police Officer">Police Officer</option>
            <option value="Nurse">Nurse</option>
            <option value="Farmer">Farmer</option>
            <option value="Accountant">Accountant</option>
            <option value="Other">Other</option>
        </select>
    </div>
</div>

                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="birth_id">Birth ID Number</label>
                        <input type="text" class="form-control" id="birth_id" name="birth_id" required value="<?php echo $birthid?>">
                    </div>
                </div>
                <!-- Additional fields continued in two-column layout -->
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" id="sex" name="sex" required>
                            <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                       <div class="form-group">
                        <label for="religion">Religion</label>
                        <select class="form-control" id="religion" name="religion" required>
                            <option value="">Select Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Christianity">Christianity</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Other">Other</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                    </div>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="Bangladeshi" readonly>
                    </div>
                </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" onclick="previousStep(1)">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                    </div>

                </div>


 <div id="step-3" class="d-none">
    <h4 class="text-center mb-4">Step 3: Address Information</h4>

    <div class="form-group">
        <label for="present_address_eng">Present Address (English)</label>
        <input type="text" class="form-control" id="present_address_eng" name="present_address_eng" required value="<?php echo $address;?>">
    </div>
    <div class="form-group">
        <label for="present_address_bn">Present Address (বাংলা)</label>
        <input type="text" class="form-control" id="present_address_bn" name="present_address_bn" required value="<?php echo $address_bangla;?>">
    </div>
    <div class="form-group">
        <label for="permanent_address_eng">Permanent Address (English)</label>
        <input type="text" class="form-control" id="permanent_address_eng" name="permanent_address_eng" required value="<?php echo $address;?>">
    </div>
    <div class="form-group">
        <label for="permanent_address_bn">Permanent Address (বাংলা)</label>
        <input type="text" class="form-control" id="permanent_address_bn" name="permanent_address_bn" required value="<?php echo $address_bangla;?>">
    </div>
    
    <div class="text-center">
    <button type="button" class="btn btn-primary" onclick="previousStep(2)">Previous</button>
    <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next</button>
</div>
</div>

<!-- Step 4 -->
    <div id="step-4" class="d-none">
        <h4 class="text-center mb-4">Step 4: Document Attachments</h4>

         <!-- Student Picture Attachment -->
        <div class="form-group">
            <label for="student_picture">Attach Student Picture</label>
            <input type="file" class="form-control-file" id="student_picture" name="student_picture" accept="image/*" 
                onchange="handleFileChange(event, 'student_picture_preview')">
            <img id="student_picture_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Student Picture Preview">
        </div>

        <!-- Birth ID Attachment -->
        <div class="form-group">
            <label for="birth_id_attachment">Attach Birth ID</label>
            <input type="file" class="form-control-file" id="birth_id_attachment" name="birth_id_attachment" accept="image/*" 
                onchange="handleFileChange(event, 'birth_id_preview')">
            <img id="birth_id_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Birth ID Preview">
        </div>

        <!-- Father's Picture Attachment -->
        <div class="form-group">
            <label for="father_picture">Attach Father's Picture</label>
            <input type="file" class="form-control-file" id="father_picture" name="father_picture" accept="image/*" 
                onchange="handleFileChange(event, 'father_picture_preview')">
            <img id="father_picture_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Father's Picture Preview">
        </div>

        <!-- Father's NID Attachment -->
        <div class="form-group">
            <label for="father_nid_attachment">Attach Father's NID</label>
            <input type="file" class="form-control-file" id="father_nid_attachment" name="father_nid_attachment" accept="image/*" 
                onchange="handleFileChange(event, 'father_nid_preview')">
            <img id="father_nid_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Father's NID Preview">
        </div>

        <!-- Mother's Picture Attachment -->
        <div class="form-group">
            <label for="mother_picture">Attach Mother's Picture</label>
            <input type="file" class="form-control-file" id="mother_picture" name="mother_picture" accept="image/*" 
                onchange="handleFileChange(event, 'mother_picture_preview')">
            <img id="mother_picture_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Mother's Picture Preview">
        </div>

        <!-- Mother's NID Attachment -->
        <div class="form-group">
            <label for="mother_nid_attachment">Attach Mother's NID</label>
            <input type="file" class="form-control-file" id="mother_nid_attachment" name="mother_nid_attachment" accept="image/*" 
                onchange="handleFileChange(event, 'mother_nid_preview')">
            <img id="mother_nid_preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;" alt="Mother's NID Preview">
        </div>
   
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="previousStep(3)">Previous</button>
            <button type="submit" class="btn btn-primary">Submit Admission Form</button>
        </div>
    </div>




            </form>
        </div>
    </div>
</div>
<!--Ending Container Div-->
<?php }?>
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
<!-- JavaScript -->
    <script>
        // Store selected files to check for duplicates
        const selectedFiles = new Set();

        function preventDuplicateFiles(event) {
            const input = event.target;
            const file = input.files[0];

            if (file) {
                // Create a unique identifier for the file (name + size)
                const fileIdentifier = `${file.name}_${file.size}`;

                // Check if this file was already uploaded
                if (selectedFiles.has(fileIdentifier)) {
                    alert("This file has already been uploaded. Please select a different file.");
                    input.value = ""; // Clear the file input
                    return false; // Stop further processing
                }

                // Add the file identifier to the Set
                selectedFiles.add(fileIdentifier);
            }

            return true; // Allow further processing
        }

        function handleFileChange(event, previewId) {
            // First check for duplicate files
            if (preventDuplicateFiles(event)) {
                // If no duplicate, proceed to show the preview
                previewImage(event, previewId);
            } else {
                // If duplicate, clear the preview as well
                const preview = document.getElementById(previewId);
                preview.style.display = "none";
                preview.src = "";
            }
        }

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

</body>
</html>
