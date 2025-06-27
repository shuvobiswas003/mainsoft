<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$gradecode = $_REQUEST['gradecode'];
$conn = null; // Initialize connection variable

// Database connection
require "interdb.php";
$conn = $link; // Assign to connection variable

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $gradecode = $_POST['gradecode'];
    $markfrom = $_POST['markfrom'];
    $markupto = $_POST['markupto'];
    $lettergrade = $_POST['lettergrade'];
    
    // Calculate letter point
    $lpoint = match($lettergrade) {
        'A+' => 5,
        'A' => 4,
        'A-' => 3.5,
        'B' => 3,
        'C' => 2,
        'D' => 1,
        'F' => 0,
        default => 0
    };
    
    $uni = $gradecode.$lettergrade;

    try {
        $sql = "INSERT INTO grademark(gradecode,markfrom,markupto,lettergrade,letterpoint,uni) 
                VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisds", $gradecode, $markfrom, $markupto, $lettergrade, $lpoint, $uni);
        
        if($stmt->execute()){
            $success = "Grade mark added successfully!";
        } else {
            $error = "Error adding grade mark!";
        }
    } catch(mysqli_sql_exception $e) {
        $error = "Grade mark already exists or invalid data!";
    }
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

<div class="content-page">
    <div class="content">
        <div class="container-fluid"> <!-- Changed to container-fluid for better mobile -->
            
            <!-- Page Title -->
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="page-title">
                        <i class="fa fa-star text-primary"></i> Grade Marks for <?php echo htmlspecialchars($gradecode); ?>
                    </h4>
                </div>
            </div>

            <!-- Add Grade Form -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-primary">
                            <h3 class="panel-title text-white">Add Grade Mark</h3>
                        </div>
                        <div class="panel-body">
                            <?php if(isset($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                            <?php endif; ?>
                            <?php if(isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            
                            <form method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Grade Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="gradecode" 
                                               value="<?php echo htmlspecialchars($gradecode); ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mark Range</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="number" name="markfrom" class="form-control" 
                                                       placeholder="From" required>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="number" name="markupto" class="form-control" 
                                                       placeholder="To" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Letter Grade</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="lettergrade" required>
                                            <option value="A+">A+</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Add Grade Mark
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grade Marks Table -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-primary">
                            <h3 class="panel-title text-white">Existing Grade Marks</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive"> <!-- Added for mobile -->
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>Mark From</th>
                                            <th>Mark To</th>
                                            <th>Grade</th>
                                            <th>Points</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM grademark WHERE gradecode=? ORDER BY markfrom DESC";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param("s", $gradecode);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        
                                        while($row = $result->fetch_assoc()):
                                            $grade_class = [
                                                'A+' => 'success',
                                                'A' => 'success',
                                                'A-' => 'info',
                                                'B' => 'info',
                                                'C' => 'warning',
                                                'D' => 'warning',
                                                'F' => 'danger'
                                            ][$row['lettergrade'] ?? 'default'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['markfrom']; ?></td>
                                            <td><?php echo $row['markupto']; ?></td>
                                            <td>
                                                <span class="label label-<?php echo $grade_class; ?>">
                                                    <?php echo $row['lettergrade']; ?>
                                                </span>
                                            </td>
                                            <td><?php echo $row['letterpoint']; ?></td>
                                            <td>
                                                <a href="deletemarkongrade.php?id=<?php echo $row['id']; ?>&gradecode=<?php echo $row['gradecode']; ?>" 
                                                   class="btn btn-xs btn-danger" 
                                                   onclick="return confirm('Delete this grade mark?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
// Close database connection
if($conn) $conn->close();
include 'inc/footer.php';
?>