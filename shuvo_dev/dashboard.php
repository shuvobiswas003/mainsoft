<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account") {
    header("location: login.php");
    exit;
}
?>
<?php include 'inc/header.php'?>
<?php include 'inc/topheader.php'?>
<?php include 'inc/leftmenu.php'?>

<style>
    /* Custom Styles for Dashboard */
    .dashboard-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border: none;
        margin-bottom: 25px;
        overflow: hidden;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    .card-icon {
        font-size: 36px;
        padding: 20px;
        border-radius: 50%;
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }
    .card-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }
    .card-text {
        color: #7f8c8d;
        margin-bottom: 20px;
    }
    .action-btn {
        border-radius: 50px;
        padding: 8px 20px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    .welcome-header {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 4px 20px rgba(106,17,203,0.15);
    }
    .welcome-text {
        font-size: 18px;
        opacity: 0.9;
    }
    .stats-card {
        border-left: 4px solid;
        border-radius: 8px;
    }
    @media (max-width: 768px) {
        .welcome-header {
            text-align: center;
        }
        .card-icon {
            width: 60px;
            height: 60px;
            font-size: 28px;
        }
    }
</style>

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            
            <!-- Welcome Header -->
            <div class="row">
                <div class="col-12">
                    <div class="welcome-header">
                        <h3>Welcome back, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</h3>
                        <p class="welcome-text">Here's what's happening with your system today.</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="dashboard-card card">
                        <div class="card-body text-center">
                            <div class="card-icon bg-danger bg-soft">
                                <i class="ti-settings text-danger"></i>
                            </div>
                            <h4 class="card-title">Database Config</h4>
                            <p class="card-text">Configure your database connection settings</p>
                            <a href="db_setup.php" class="btn btn-outline-danger action-btn">Configure</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="dashboard-card card">
                        <div class="card-body text-center">
                            <div class="card-icon bg-success bg-soft">
                                <i class="ti-reload text-success"></i>
                            </div>
                            <h4 class="card-title">Restore Database</h4>
                            <p class="card-text">Restore your system from a backup file</p>
                            <a href="restore_db.php" target="_blank" class="btn btn-outline-success action-btn">Restore Now</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="dashboard-card card">
                        <div class="card-body text-center">
                            <div class="card-icon bg-primary bg-soft">
                                <i class="ti-lock text-primary"></i>
                            </div>
                            <h4 class="card-title">SSL Config</h4>
                            <p class="card-text">Manage your SSL certificate and security</p>
                            <a href="ssl_config.php" class="btn btn-outline-primary action-btn">Configure</a>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->
    </div> <!-- content -->
</div>

<?php include'inc/footer.php'?>