<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher") {
    header("location: login.php");
    exit;
}

// Include database connection
require 'interdb.php';

// Fetch classes and sections from student table
$sqlClassesSections = "SELECT DISTINCT classnumber, secgroup FROM student ORDER BY classnumber, secgroup";
$resultClassesSections = $link->query($sqlClassesSections);

$classesSections = [];
if ($resultClassesSections->num_rows > 0) {
    while ($row = $resultClassesSections->fetch_assoc()) {
        $classesSections[] = [
            'classnumber' => $row['classnumber'],
            'secgroup' => $row['secgroup']
        ];
    }
}

// Initialize report arrays
$attendanceReport = [];
$percentageReport = [];

// Current date
$currentDate = date('Y-m-d');
$currentDateFormatted = date('F j, Y');

// Get data for charts
$chartLabels = [];
$presentData = [];
$absentData = [];
$percentageData = [];

foreach ($classesSections as $cs) {
    $classSectionLabel = "Class {$cs['classnumber']}-{$cs['secgroup']}";
    $chartLabels[] = $classSectionLabel;
    
    // Get total number of students in the class and section
    $sqlTotalStudents = "
        SELECT COUNT(*) AS total_students
        FROM student
        WHERE classnumber = '{$cs['classnumber']}'
        AND secgroup = '{$cs['secgroup']}'
    ";
    $resultTotal = $link->query($sqlTotalStudents);
    $totalStudents = $resultTotal->fetch_assoc()['total_students'];
    
    // Get number of present students
    $sqlPresentStudents = "
        SELECT COUNT(DISTINCT a.stuid) AS present_count
        FROM stuattdancedata a
        JOIN student s ON s.uniqid = a.stuid
        WHERE s.classnumber = '{$cs['classnumber']}'
        AND s.secgroup = '{$cs['secgroup']}'
        AND a.adate = '{$currentDate}'
        AND a.cinoutid = 1
    ";
    $resultPresent = $link->query($sqlPresentStudents);
    $presentCount = $resultPresent->fetch_assoc()['present_count'];

    // Calculate absent students
    $absentCount = $totalStudents - $presentCount;

    // Store the report
    $attendanceReport["{$cs['classnumber']}-{$cs['secgroup']}"] = [
        'total_students' => $totalStudents,
        'present_count' => $presentCount,
        'absent_count' => $absentCount
    ];
    
    $presentData[] = $presentCount;
    $absentData[] = $absentCount;

    // Calculate present percentage
    $presentPercentage = $totalStudents > 0 ? ($presentCount / $totalStudents) * 100 : 0;
    $percentageReport["{$cs['classnumber']}-{$cs['secgroup']}"] = $presentPercentage;
    $percentageData[] = round($presentPercentage, 2);
}

// Close connection
$link->close();
?>

<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

<div class="content-page">
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Attendance Dashboard</h4>
                        <div class="pull-right">
                            <div class="badge badge-success" style="padding: 10px 15px;">
                                <i class="fa fa-calendar"></i> <?php echo $currentDateFormatted; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <!-- Welcome Panel -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Welcome, <?php echo htmlspecialchars($_SESSION["teachername"]); ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-muted">View and analyze today's attendance data across all classes and sections.</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right">
                                        <span class="label label-info" style="font-size: 16px; padding: 8px 12px;">
                                            <i class="fa fa-group"></i> <?php echo count($classesSections); ?> Classes/Sections
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Widgets -->
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo array_sum(array_column($attendanceReport, 'total_students')); ?></div>
                                    <div>Total Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-color panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo array_sum(array_column($attendanceReport, 'present_count')); ?></div>
                                    <div>Present Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-color panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-exclamation-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo array_sum(array_column($attendanceReport, 'absent_count')); ?></div>
                                    <div>Absent Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-color panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-percent fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
                                            $total = count($percentageData) > 0 ? array_sum($percentageData) / count($percentageData) : 0;
                                            echo number_format($total, 1); 
                                        ?>%
                                    </div>
                                    <div>Avg Attendance</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Attendance Overview</h3>
                        </div>
                        <div class="panel-body">
                            <canvas id="attendanceBarChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Attendance Distribution</h3>
                        </div>
                        <div class="panel-body">
                            <canvas id="percentageDoughnutChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Tables -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Class-wise Attendance Summary</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Total</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Attendance %</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($classesSections as $index => $cs): 
                                            $key = "{$cs['classnumber']}-{$cs['secgroup']}";
                                            $report = $attendanceReport[$key];
                                            $percentage = $percentageReport[$key];
                                            $progressClass = $percentage >= 90 ? 'progress-bar progress-bar-success' : 
                                                           ($percentage >= 75 ? 'progress-bar progress-bar-primary' : 
                                                           ($percentage >= 50 ? 'progress-bar progress-bar-warning' : 'progress-bar progress-bar-danger'));
                                            $status = $percentage >= 90 ? 'Excellent' : 
                                                     ($percentage >= 75 ? 'Good' : 
                                                     ($percentage >= 50 ? 'Fair' : 'Poor'));
                                            $badgeClass = $percentage >= 90 ? 'label-success' : 
                                                         ($percentage >= 75 ? 'label-primary' : 
                                                         ($percentage >= 50 ? 'label-warning' : 'label-danger'));
                                        ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td>Class <?php echo htmlspecialchars($cs['classnumber']); ?></td>
                                                <td><?php echo htmlspecialchars($cs['secgroup']); ?></td>
                                                <td><?php echo $report['total_students']; ?></td>
                                                <td><?php echo $report['present_count']; ?></td>
                                                <td><?php echo $report['absent_count']; ?></td>
                                                <td>
                                                    <div class="progress progress-sm m-b-0">
                                                        <div class="<?php echo $progressClass; ?>" role="progressbar" 
                                                             style="width: <?php echo $percentage; ?>%;" 
                                                             aria-valuenow="<?php echo $percentage; ?>" 
                                                             aria-valuemin="0" 
                                                             aria-valuemax="100">
                                                            <span class="sr-only"><?php echo number_format($percentage, 1); ?>%</span>
                                                        </div>
                                                    </div>
                                                    <small class="text-muted"><?php echo number_format($percentage, 1); ?>%</small>
                                                </td>
                                                <td><span class="label <?php echo $badgeClass; ?>"><?php echo $status; ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Performing Classes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-trophy"></i> Top Performing Classes</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                            // Sort classes by percentage
                            $sortedClasses = [];
                            foreach ($classesSections as $cs) {
                                $key = "{$cs['classnumber']}-{$cs['secgroup']}";
                                $sortedClasses[$key] = $percentageReport[$key];
                            }
                            arsort($sortedClasses);
                            $topClasses = array_slice($sortedClasses, 0, 5, true);
                            ?>
                            
                            <div class="list-group">
                                <?php $rank = 1; foreach ($topClasses as $classKey => $percentage): 
                                    list($class, $section) = explode('-', $classKey);
                                    $badgeClass = $percentage >= 90 ? 'badge-success' : 
                                                 ($percentage >= 75 ? 'badge-primary' : 
                                                 ($percentage >= 50 ? 'badge-warning' : 'badge-danger'));
                                ?>
                                    <a href="#" class="list-group-item">
                                        <span class="badge <?php echo $badgeClass; ?>"><?php echo number_format($percentage, 1); ?>%</span>
                                        <h4 class="list-group-item-heading">
                                            <span class="label label-inverse"><?php echo $rank++; ?></span> 
                                            Class <?php echo htmlspecialchars($class); ?> - Section <?php echo htmlspecialchars($section); ?>
                                        </h4>
                                        <p class="list-group-item-text">
                                            <div class="progress progress-sm m-b-0">
                                                <div class="progress-bar progress-bar-success" role="progressbar" 
                                                     style="width: <?php echo $percentage; ?>%;" 
                                                     aria-valuenow="<?php echo $percentage; ?>" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                        </p>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-exclamation-triangle"></i> Classes Needing Attention</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                            asort($sortedClasses);
                            $bottomClasses = array_slice($sortedClasses, 0, 5, true);
                            ?>
                            
                            <div class="list-group">
                                <?php $rank = 1; foreach ($bottomClasses as $classKey => $percentage): 
                                    list($class, $section) = explode('-', $classKey);
                                    $badgeClass = $percentage >= 90 ? 'badge-success' : 
                                                 ($percentage >= 75 ? 'badge-primary' : 
                                                 ($percentage >= 50 ? 'badge-warning' : 'badge-danger'));
                                ?>
                                    <a href="#" class="list-group-item">
                                        <span class="badge <?php echo $badgeClass; ?>"><?php echo number_format($percentage, 1); ?>%</span>
                                        <h4 class="list-group-item-heading">
                                            <span class="label label-inverse"><?php echo $rank++; ?></span> 
                                            Class <?php echo htmlspecialchars($class); ?> - Section <?php echo htmlspecialchars($section); ?>
                                        </h4>
                                        <p class="list-group-item-text">
                                            <div class="progress progress-sm m-b-0">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" 
                                                     style="width: <?php echo $percentage; ?>%;" 
                                                     aria-valuenow="<?php echo $percentage; ?>" 
                                                     aria-valuemin="0" 
                                                     aria-valuemax="100">
                                                </div>
                                            </div>
                                        </p>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->

    <?php include 'inc/footer.php' ?>

    <script>
    // Attendance Bar Chart
    var attendanceBarCtx = document.getElementById('attendanceBarChart').getContext('2d');
    var attendanceBarChart = new Chart(attendanceBarCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($chartLabels); ?>,
            datasets: [
                {
                    label: 'Present',
                    backgroundColor: '#2ecc71',
                    data: <?php echo json_encode($presentData); ?>,
                },
                {
                    label: 'Absent',
                    backgroundColor: '#e74c3c',
                    data: <?php echo json_encode($absentData); ?>,
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                position: 'top',
            },
            tooltips: {
                mode: 'index',
                intersect: false
            }
        }
    });

    // Percentage Doughnut Chart
    var percentageDoughnutCtx = document.getElementById('percentageDoughnutChart').getContext('2d');
    var percentageDoughnutChart = new Chart(percentageDoughnutCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($chartLabels); ?>,
            datasets: [{
                data: <?php echo json_encode($percentageData); ?>,
                backgroundColor: [
                    '#3498db', '#9b59b6', '#1abc9c', '#f1c40f', '#e67e22',
                    '#34495e', '#16a085', '#27ae60', '#2980b9', '#8e44ad'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index] || '';
                        var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return label + ': ' + value + '%';
                    }
                }
            },
            cutoutPercentage: 70
        }
    });
    </script>