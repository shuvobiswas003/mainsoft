<?php

// Initialize the session

session_start();

 

// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== "teacher"){

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



                        <!-- Page-Title -->

                        <div class="row">

                            <div class="col-sm-12">

                                <h4 class="pull-left page-title">Upload</h4>

                            </div>

                        </div>



<div class="row">

    <div class="col-md-12">

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Upload Student File</h3>

            </div>

            <div class="panel-body">



<?php





    if($_SERVER['REQUEST_METHOD'] == 'POST'){

?>

<table class="table table-bordered">

<thead>

    <tr>
    <th>SL</th>
    <th>Class</th>
    <th>Roll</th>
    <th>Student ID</th>
    <th>Name</th>
    <th>RFID</th>

    </tr>

</thead>

<tbody>

<?php

          

    require "interdb.php";

    $file = $_FILES['file']['tmp_name'];

    $handle = fopen($file, "r");

    $c = 0;

    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){

       

    $class=$filesop[0];

    $roll=$filesop[1];
    if($c>0){
    $sec;
    $name;
    $sel_query="SELECT * FROM student WHERE classnumber='$class' AND roll='$roll'";
        $result = mysqli_query($link,$sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $sec=$row['secgroup'];
            $name=$row['name'];
        }

    $stuid=$class.$sec.$roll;
    $rfid=$filesop[2];
    $rfid=intval($rfid);

    

?>

<tr>
    <td><?php echo $c;?></td>
    <td><?php echo $class;?></td>
    <td><?php echo $roll;?></td>
    <td><?php echo $stuid;?></td>
    <td><?php echo $name;?></td>
    <td><?php echo $rfid;?></td>
</tr>



<?php

   

    //insert to database

    

    $sql ="INSERT into rfid(stuid,rfid) VALUES ('$stuid','$rfid') ON DUPLICATE KEY UPDATE stuid='$stuid',rfid='$rfid'";

    $stmt = mysqli_prepare($link,$sql);

    mysqli_stmt_execute($stmt);

    

}

    $c = $c + 1;

           }//ending while loop



        if($sql){

               echo "<h3 style='color:green;'>Upload Success Fully</h3>";

             } 

         else

         {

            echo "<h3 style='color:Red;'>Unable To Upload. Please Cheak File Format</h3>";

          }



    }

?>

</tbody>

</table>

        <div class="col-md-12">

            <center>

                <caption><h3>Sample Excel Sheet format</h3></caption>

            </center>

            <table class="table table-bordered">

                <thead>

                    <tr>

                    <tr>

                    <th>Class</th>

                    <th>Roll</th>

                    <th>RFID</th>

                    </tr>

                </thead>

            </table>

            <br><br><br>

            </div>



            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">



            

              <div class="form-group">

                    <label class="col-md-3 control-label" for="Cust-name">Upload RFID</label>

                    <div class="col-md-7">

                        <input type="file" name="file" id="file" class="form-control">

                    </div>

                </div>

                

                <input type="submit" class="btn btn-primary" Value="Upload RFID">

            </form>

            <br>

            <br>







        </div><!--End of panel Body-->

    

    </div>

</div>



                            

</div> <!-- End Row -->

</div> <!-- container -->       

</div> <!-- content -->

<?php include'inc/footer.php'?>