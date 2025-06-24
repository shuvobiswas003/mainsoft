<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "account") {
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
        <div class="container">
            <!-- Raw Div Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Make Payment</h3>
                        </div>

                        <!-- 2nd Form Part Start -->
                        <div class="panel-body">
                            <?php
                            require "../interdb.php";

                            $uniqid = $_REQUEST['stuid'];
                            ?>

                            <div class="col-md-12">
                                <table class="table">
                                    <tbody>
                                        <?php
                                        $sel_query3 = "SELECT * FROM student WHERE uniqid= '$uniqid'";
                                        $result3 = mysqli_query($link, $sel_query3);
                                        while ($row3 = mysqli_fetch_assoc($result3)) {
                                        ?>
                                            <tr>
                                                <td colspan="2">
                                                    <center>
                                                        <!-- Img Start -->
                                                        <?php
                                                        $imgsl = $row3["imgname"];
                                                        if ($imgsl == "IMG_0.png" OR $imgsl == "") {
                                                        ?>
                                                            <img src="../img/student/<?php echo $row3['classnumber']; ?>/<?php echo $row3['roll']; ?>.jpg" style="height: 130px;">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="../img/student/<?php echo $row3['imgname']; ?>" style="height: 130px;">
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- Img End -->
                                                    </center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td><?php echo $row3['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td><?php echo $row3['classnumber']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Section/Group:</td>
                                                <td><?php echo $row3['secgroup']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <table class="table table-striped table-bordered" id="multiSlip">
                                    <thead>
                                        <tr>
                                            <th>Author Name</th>
                                            <th>Book Name</th>
                                            <th>Barcode</th>
                                            <th>Date of Issue</th>
                                            <th>Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sel_query4 = "SELECT author_name, book_name, date_of_issue, return_date,book_barcode FROM library_book_issue WHERE student_id= '$uniqid'";
                                        $result4 = mysqli_query($link, $sel_query4);
                                        while ($row4 = mysqli_fetch_assoc($result4)) {
                                            $return_date = $row4['return_date'];
                                            if ($return_date == '0000-00-00' || $return_date == NULL) {
                                                $return_date = 'Not Returned';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo $row4['author_name']; ?></td>
                                                <td><?php echo $row4['book_name']; ?></td>
                                                <td><?php echo $row4['book_barcode']; ?></td>
                                                <td><?php echo $row4['date_of_issue']; ?></td>
                                                <td><?php echo $return_date; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- 2nd Form Part End -->
                    </div>
                </div>
            </div> <!-- End Row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>

<?php include 'inc/footer.php'?>
