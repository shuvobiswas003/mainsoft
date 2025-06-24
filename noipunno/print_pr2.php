<?php
require '../interdb.php';
$c=$_POST['classnumber'];
$s=$_REQUEST['secgroupname'];
$sub_code=$_POST['sub_code'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PR2</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
	<style>
        table {
            border-collapse: collapse;
            font-size: 10px;
            width: 100%;
        }
        th, td {
            border: 1px solid black !important;
            padding: 5px;
            text-align: center;
        }
       
        @media print {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }
            body {
                margin: 0;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            table {
                width: 100%;
                border: 1px solid black;
            }
            th, td, #ro_th {
                border: 1px solid black !important;
            }
            .container {
                width: 100%;
            }
            .header_part, .table_part {
                width: 100%;
            }
        }
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="header_part">
               
                <!--Print School Info Start-->
                <?php
                        require "../interdb.php";
                        $count2=1;
                        $sel_query2="Select * from schoolinfo";
                        $result2 = mysqli_query($link,$sel_query2);
                        while($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <h1 style="font-size: 50px;color: black;">
                                    <?php echo $row2['schoolname']?>
                                </h1>
                                <h1>ষান্মাসিক সামষ্টিক মূল্যায়ন-2024</h1>
                                <h1>বিষয়ঃ
                                    <?php 
                                     $sel_query="Select * from subject WHERE classnumber='$c' AND secgroup='$s'AND subcode='$sub_code';";
                                    $result = mysqli_query($link,$sel_query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo $row['subname'];
                                    }
                                    ?>
                                </h1>
                                <h1>পরিশিষ্ট ২ পর্যবেক্ষণ রেকর্ড ছক(Class: <?php echo $c?> Section:  <?php echo $s?>)</h1>
                            </center>
                        </div>
                    </div>
                    
                    <?php $count2++; } ?>
                <!--Print School Info END-->            
                </div>
				<div class="table_part">
					<br>
					<br>
					<table style="" class="table">
						<thead>
							<tr>
								<th rowspan="2" style="width: 60px">
									রোল
								</th>
								<th rowspan="2" style="width: 300px;">
									শিক্ষার্থীর নাম
								</th>
                                <?php
                                $count=1;
                                $sel_query="Select * from noipunno_pr2 WHERE classnumber='$c' AND subject_code='$sub_code';";
                                $result = mysqli_query($link,$sel_query);
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>

								<th colspan="3" style="width: 200px;">
									<?php echo $row['heading_name']?>
								</th>
								<?php $count++; } ?> 
							
							</tr>
							<tr>
                                <?php
                                $all_td="0";
                                $count=1;
                                $sel_query="Select * from noipunno_pr2 WHERE classnumber='$c' AND subject_code='$sub_code';";
                                $result = mysqli_query($link,$sel_query);
                                $row_count = mysqli_num_rows($result);
                                $all_td=$row_count;
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
								<th id="ro_th">চেষ্টা</th>
								<th id="ro_th">আংশিক</th>
								<th id="ro_th">কার্যকরী</th>
                                <?php $count++; } ?> 
							</tr>
						</thead>

                        <tbody>
                            <?php
                            
                            $count=1;
                            $sel_query="Select * from student where classnumber='$c'AND secgroup='$s' ORDER BY roll ASC";
                            $result = mysqli_query($link,$sel_query);
                            while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                            <td><?php echo $row['roll']?></td>
                            <td><?php echo $row['name']?></td>
                            <?php
                            for ($i=0; $i < $all_td; $i++) { 
                               echo '<td></td>';
                               echo '<td></td>';
                               echo '<td></td>';
                            }
                            ?>
                            
                            </tr>
                            <?php $count++; } ?>
                          


                            <?php
                            for ($i=0; $i < 5; $i++) { 
                            ?>
                             <tr style="height: 40px">
                                <td></td>
                                <td></td>
                                 <?php
                                for ($j=0; $j < $all_td; $j++) { 
                                   echo '<td></td>';
                                   echo '<td></td>';
                                   echo '<td></td>';
                                }
                                ?>
                            </tr>

                            <?php
                            }
                            ?>
                          

                        </tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
