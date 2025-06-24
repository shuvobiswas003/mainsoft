<?php

// Initialize the session

session_start();

 

// Check if the user is logged in, if not then redirect him to login page

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

                <h3 class="panel-title">Upload Exam Routine</h3>

            </div>

            <div class="panel-body">



<?php





    if($_SERVER['REQUEST_METHOD'] == 'POST'){

?>

<table class="table table-bordered">

<thead>
    <tr>
        <th>EXID</th>
        <th>Class</th>
        <th>Section/Group</th>
        <th>Sub Code</th>
        <th>Sub Name</th>
        <th>Exam Date</th>
        <th>Exam Time</th>
        <th>Align</th>
    </tr>
</thead>
<tbody>

<?php

          

    require "interdb.php";

    $file = $_FILES['file']['tmp_name'];

    $handle = fopen($file, "r");

    $c = 0;

    while(($filesop = fgetcsv($handle, 1000, ",")) !== false){

       

    $exid=$filesop[0];

    $class=$filesop[1];

    $sec=$filesop[2];

    $subcode=$filesop[3];

    $subname=$filesop[4];
    

    $examdate=$filesop[5];
    $exdate=date("Y-m-d", strtotime($examdate));
    $extime=$filesop[6];
    $align=$filesop[7];
    $active=1;
    $uexid=$exid.$class.$subcode.$sec;
    if($c>0){

?>




<?php

   
//insert to database
require "interdb.php";
       $sql ="INSERT INTO examroutine(exid,class,cgroup,subcode,subname,examdate,align,uexid,active,examtime) VALUES ('$exid','$class','$sec','$subcode','$subname','$exdate','$align','$uexid','$active','$extime') ON DUPLICATE KEY UPDATE examdate='$exdate',examtime='$extime',align='$align',subname='$subname',subcode='$subcode',active='$active'"; 
        if(mysqli_query($link, $sql)){
            echo "<span style='color:green;font-size:25px;'>Record Inserted Successfully</span><br>";
    } else{
    echo "<h3 style='color:red'>Already Added This Subject On Exam Rroutine</h3>";
    }
    mysqli_close($link);
    echo"<h3><a href='examroutineview.php?classnumber=".$class."&secgroupname=".$sec."'>View Routine</a></h3>";

}

    

    $c = $c + 1;

           }//ending while loop



      
          if($sql2){

               echo "<h3 style='color:green;'>Upload Success On Student</h3>";

             } 

         else

         {

            echo "<h3 style='color:Red;'>Unable To UPDATE Student</h3>";

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
                    <th>EXID</th>
                    <th>Class</th>
                    <th>Section/Group</th>
                    <th>Sub Code</th>
                    <th>Sub Name</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Align</th>
                </tr>
            </thead>

            </table>

            <br><br><br>

            </div>



            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">



            

              <div class="form-group">

                    <label class="col-md-3 control-label" for="Cust-name">Upload Exam Routine</label>

                    <div class="col-md-7">

                        <input type="file" name="file" id="file" class="form-control">

                    </div>

                </div>

                

                <input type="submit" class="btn btn-primary" Value="Upload Routine">

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