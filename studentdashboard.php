<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title with breadcrumb -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Student Management</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#">Students</a></li>
                                        <li class="breadcrumb-item active">View Students</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-users"></i> Student List
                                            <div class="pull-right">
                                                
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table id="studentTable" class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr class="bg-primary">
                                                                <th class="text-center">#</th>
                                                                <th>Student ID</th>
                                                                <th>Name</th>
                                                                <th>Group</th>
                                                                <th>Gender</th>
                                                                <th>Mobile</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $classnumber = $_REQUEST['classnumber'];
                                                            require "interdb.php";
                                                            $count = 1;
                                                            $sel_query = "SELECT * FROM student WHERE classnumber = $classnumber ORDER BY roll ASC;";
                                                            $result = mysqli_query($link, $sel_query);
                                                            
                                                            if(mysqli_num_rows($result) > 0) {
                                                                while($row = mysqli_fetch_assoc($result)) { ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $row["roll"]; ?></td>
                                                                    <td><?php echo $row["uniqid"]; ?></td>
                                                                    <td><?php echo $row["name"]; ?></td>
                                                                    <td><?php echo $row["secgroup"]; ?></td>
                                                                    <td><?php echo $row["sex"]; ?></td>
                                                                    <td><?php echo $row["mobile"]; ?></td>
                                                                    <td class="text-center actions">
                                                                        <div class="btn-group btn-group-sm">
                                                                            <a href="studentedit.php?id=<?php echo $row['id'];?>" class="btn btn-primary" data-toggle="tooltip" title="Edit">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                            <a href="studentphotoedit.php?id=<?php echo $row['id'];?>" class="btn btn-info" data-toggle="tooltip" title="Update Photo">
                                                                                <i class="fa fa-camera"></i>
                                                                            </a>
                                                                            <a href="studentprofile.php?id=<?php echo $row['id'];?>" class="btn btn-success" data-toggle="tooltip" title="View Profile">
                                                                                <i class="fa fa-user"></i>
                                                                            </a>
                                                                            <a href="studentdel.php?id=<?php echo $row['id'];?>&classnumber=<?php echo $row['classnumber'];?>&uniqid=<?php echo $row['uniqid'];?>" 
                                                                               class="btn btn-danger" 
                                                                               data-toggle="tooltip" 
                                                                               title="Delete"
                                                                               onclick="return confirm('Are you sure you want to delete this student?');">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php $count++; }
                                                            } else { ?>
                                                                <tr>
                                                                    <td colspan="7" class="text-center text-danger">No students found in this class</td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Total Students: <?php echo $count-1; ?></strong>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

<?php include 'inc/footer.php' ?>

<!-- Additional JavaScript for enhanced functionality -->
<script>
$(document).ready(function() {
    // Initialize DataTable with responsive extension
    $('#studentTable').DataTable({
        responsive: true,
        "language": {
            "search": "Filter:",
            "lengthMenu": "Show _MENU_ students per page",
            "zeroRecords": "No matching students found",
            "info": "Showing _START_ to _END_ of _TOTAL_ students",
            "infoEmpty": "No students available",
            "infoFiltered": "(filtered from _MAX_ total students)"
        },
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "columnDefs": [
            { "orderable": false, "targets": 6 } // Disable sorting for actions column
        ]
    });
    
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
    
    // Make table rows clickable (optional)
    $('#studentTable tbody tr').click(function() {
        var href = $(this).find("a.btn-success").attr("href");
        if(href) {
            window.location = href;
        }
    });
});
</script>

<style>
/* Custom CSS for better mobile experience */
.panel {
    border-radius: 0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.panel-heading {
    border-radius: 0 !important;
}

.table-responsive {
    overflow-x: auto;
    min-height: 0.01%;
}

@media (max-width: 768px) {
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #ddd;
    }
    
    .btn-group-sm > .btn {
        padding: 3px 6px;
        font-size: 12px;
    }
    
    .panel-footer .btn {
        margin-bottom: 5px;
    }
}

.actions .btn {
    margin: 0 2px;
}

#studentTable tbody tr:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}

.page-title-box {
    padding: 20px 0;
    margin-bottom: 20px;
    background-color: #f9f9f9;
    border-bottom: 1px solid #eee;
}
</style>