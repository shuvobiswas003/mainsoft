<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'teacher'){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>WelCome To Your School</title>

        <!-- Base Css Files -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="../css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="../css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="../css/waves-effect.css" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="../assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../assets/morris/morris.css">
        <!-- DataTables -->
        <link href="../assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="../css/helper.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />

        <style>
        /* Add custom styles here */
        .clock {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .calendar {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }
        .month-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .day {
            height: 100px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .today {
            background-color: #007bff;
            color: #fff;
        }
    </style>

        
        <link href="../assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="../assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="../assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../js/modernizr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

       
        
    </head>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <marquee behavior="slow" direction="left">
                                    <h1>Welcome to Digital School Management System</h1>

                                </marquee>
                            </div>
                        </div>
                        

<div class="row">
    <div class="col-md-12">
        <div class="panel-heading">
            <h3 class="panel-title">Teacher Subject</h3>
        </div>
        
<table class="table table-bordered">
    <tr>
        <th>Class Number</th>
        <th>Section/Group</th>
        <th>Sub Code</th>
        <th>Sub Name</th>
    </tr>
    <?php
    $tid = $_SESSION["id"]; // Teacher ID from session

    // Query to get subjects assigned to the teacher
    $query = "
        SELECT 
            st.classnumber, 
            st.secgroup AS secgroupname, 
            st.subcode, 
            s.subname 
        FROM subjectteacher st 
        JOIN subject s 
        ON st.subcode = s.subcode 
           AND st.classnumber = s.classnumber 
           AND st.secgroup = s.secgroup
        WHERE st.tid = '$tid'
        GROUP BY st.classnumber, st.secgroup, st.subcode
        ORDER BY st.classnumber, st.secgroup, st.subcode;
    ";

    $result = $link->query($query);

    // Check for query results
    if ($result->num_rows > 0) {
        // Loop through each row and display the data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["classnumber"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["secgroupname"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["subcode"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["subname"]) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }
    ?>
</table>


    </div>    
</div> 

<!--Class Chart Report-->                        
<div class="row">
    <?php
require "../interdb.php";
    ?>
    <div class="col-md-6">
        <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Student Report Class- Wise</h3>
        </div>
        
    <table class="table table-bordered">
    <tr>
        <th>Class Name</th>
        <th>Number of Students</th>
    </tr>
    <?php
    // Query to count students by class
    $countQuery = "SELECT classname, COUNT(*) as student_count FROM student GROUP BY classname ORDER BY classnumber ASC;";
    $countResult = $link->query($countQuery);

    // Loop through the count result and display the data
    while ($countRow = $countResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $countRow["classname"] . "</td>";
        echo "<td>" . $countRow["student_count"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</div>
</div>

    <div class="col-md-6">
    <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Student Chart(Class-Wise)</h3>
        </div>
        <div class="panel-body">
            <canvas id="studentBarChart" style="height: 300px;"></canvas>
        </div>
    </div>

</div>
</div><!-- End row-->
<!--Class Chart Report END--> 


<!--Male Female Chart Report-->                        
<div class="row">
    <?php
require "../interdb.php";
    ?>
    <div class="col-md-6">
        <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Male and Female Student Counts</h3>
        </div>
    <?php
    // Query to count male students
$maleQuery = "SELECT COUNT(*) as male_count FROM student WHERE UPPER(sex) = 'MALE';";
$maleResult = $link->query($maleQuery);
$maleCount = $maleResult->fetch_assoc()["male_count"];

// Query to count female students
$femaleQuery = "SELECT COUNT(*) as female_count FROM student WHERE UPPER(sex) = 'FEMALE';";
$femaleResult = $link->query($femaleQuery);
$femaleCount = $femaleResult->fetch_assoc()["female_count"];
    ?>    
<table class="table table-bordered">
    <tr>
        <th>Gender</th>
        <th>Number of Students</th>
    </tr>
    <tr>
        <td>Male</td>
        <td><?php echo $maleCount; ?></td>
    </tr>
    <tr>
        <td>Female</td>
        <td><?php echo $femaleCount; ?></td>
    </tr>
</table>
</div>
</div>

<div class="col-md-6">
    <div class="panel panel-border panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Student Gender Pie Chart</h3>
    </div>
    <div class="panel-body">
        <canvas id="genderPieChart" style="height: 300px;"></canvas>
    </div>
</div>
</div>

</div><!-- End row-->


<div class="row">
    <div class="col-md-12">
    <div class="panel panel-border panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Student Gender Pie Chart</h3>
    </div>
    <div class="panel-body">
        <canvas id="barChart" ></canvas>
    </div>
</div>
</div>
</div>


<!--Class Chart Report-->                        
<div class="row">
    <?php
require "../interdb.php";
    ?>
    <div class="col-md-12">
        <div class="panel panel-border panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Student Report Class- Wise</h3>
        </div>
        
    <table class="table table-bordered">
    <tr>
        <th>Class(Section)</th>
        <th>Number of Students</th>
    </tr>
    <?php
$countQuery3 = "SELECT classname, secgroup, COUNT(*) as student_count 
               FROM student 
               GROUP BY classname, secgroup 
               ORDER BY classnumber ASC, secgroup ASC;";
$countResult3 = $link->query($countQuery3);

// Loop through the count result and display the data
while ($countRow3 = $countResult3->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $countRow3["classname"] . " - " . $countRow3["secgroup"] . "</td>";
    echo "<td>" . $countRow3["student_count"] . "</td>";
    echo "</tr>";
}
    ?>
</table>
</div>
</div>

    
</div><!-- End row-->
<!--Class Chart Report END--> 

<div class="row">

    <div class="col-md-3">
    <a href="full_backup.php" target="_blank">
    <button class="btn btn-primary">
        Generate Full Backup
    </button>
    </a>
    </div>
</div>



                      


                    </div> <!-- container -->
                               
                </div> <!-- content -->


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/waves.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../assets/jquery-detectmobile/detect.js"></script>
        <script src="../assets/fastclick/fastclick.js"></script>
        <script src="../assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="../assets/jquery-blockui/jquery.blockUI.js"></script>
        <!-- sweet alerts -->
        <script src="../assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="../assets/sweet-alert/sweet-alert.init.js"></script>
         <!-- flot Chart -->
        <script src="../assets/flot-chart/jquery.flot.js"></script>
        <script src="../assets/flot-chart/jquery.flot.time.js"></script>
        <script src="../assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="../assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="../assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="../assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="../assets/flot-chart/jquery.flot.crosshair.js"></script>
         <!-- Counter-up -->
        <script src="../assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="../assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

        <!-- CUSTOM JS -->
        <script src="../js/jquery.app.js"></script>

        <script src="../assets/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/select2/select2.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../assets/jquery-multi-select/jquery.quicksearch.js"></script>
    
        <script src="../assets/select2/select2.min.js" type="text/javascript"></script>

        <!-- Dashboard -->
        <script src="../js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="../js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="../js/jquery.todo.js"></script>
        <!--Morris Chart-->
        <script src="../assets/morris/morris.min.js"></script>
        <script src="../assets/morris/raphael.min.js"></script>
        <script src="../assets/morris/morris.init.js"></script>


        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
<script>
<?php
$countResult = $link->query($countQuery);
if (!$countResult) {
    die("Error in SQL query: " . $link->error);
}
?>
    // Get the PHP data from your query and store it in a JavaScript array
    var classData = <?php echo json_encode($countResult->fetch_all(MYSQLI_ASSOC)); ?>;

    // Extract class names and student counts from the PHP data
    var classNames = classData.map(function(item) {
        return item.classname;
    });
    var studentCounts = classData.map(function(item) {
        return item.student_count;
    });

    // Create a bar chart
    var ctx = document.getElementById('studentBarChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: classNames, // X-axis labels
            datasets: [{
                label: 'Number of Students',
                data: studentCounts, // Y-axis data
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Bar color
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    // Create a pie chart
var pieCtx = document.getElementById('genderPieChart').getContext('2d');
var pieChart = new Chart(pieCtx, {
    type: 'pie',
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
            backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)']
        }]
    }
});

</script>

<script>
<?php
$sql = "SELECT classnumber, sex, COUNT(*) AS count FROM student GROUP BY classnumber, sex ORDER BY classnumber";
$result = $link->query($sql);
?>
<?php
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['classnumber']][$row['sex']] = $row['count'];
}
?>
var ctx = document.getElementById('barChart').getContext('2d');
var data = <?php echo json_encode($data); ?>;
var classNumbers = Object.keys(data);

var datasets = [];
var sexLabels = Object.keys(data[classNumbers[0]]);

sexLabels.forEach(function(sex) {
    var dataset = {
        label: sex,
        data: [],
        backgroundColor: getRandomColor(),
    };

    classNumbers.forEach(function(classNumber) {
        dataset.data.push(data[classNumber][sex] || 0);
    });

    datasets.push(dataset);
});

var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: classNumbers,
        datasets: datasets,
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
</script>

<script>
    $('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'addEventButton',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  defaultDate: '<?php echo date('d-M-Y')?>',
  navLinks: true,
  editable: true,
  eventLimit: true,
  events: [{
      title: 'Simple static event',
      start: '2018-11-16',
      description: 'Super cool event'
    },

  ],
  customButtons: {
    addEventButton: {
      text: 'Add new event',
      click: function () {
        var dateStr = prompt('Enter date in YYYY-MM-DD format');
        var date = moment(dateStr);

        if (date.isValid()) {
          $('#calendar').fullCalendar('renderEvent', {
            title: 'Dynamic event',
            start: date,
            allDay: true
          });
        } else {
          alert('Invalid Date');
        }

      }
    }
  },
  dayClick: function (date, jsEvent, view) {
    var date = moment(date);

    if (date.isValid()) {
      $('#calendar').fullCalendar('renderEvent', {
        title: 'Dynamic event from date click',
        start: date,
        allDay: true
      });
    } else {
      alert('Invalid');
    }
  },
});

</script>
        
 <script>
        // JavaScript for the running clock
        function updateClock() {
            const clockDisplay = document.getElementById("clockDisplay");
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, "0");
            const minutes = now.getMinutes().toString().padStart(2, "0");
            const seconds = now.getSeconds().toString().padStart(2, "0");
            clockDisplay.textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateClock, 1000); // Update the clock every second

        // JavaScript for the dynamic calendar
        // (Use the previous example for calendar functionality)

        // Initial calendar rendering code...
    </script>
        

    </body>
</html>