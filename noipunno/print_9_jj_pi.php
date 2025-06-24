<?php
$c=$_REQUEST['c'];
$s=$_REQUEST['s'];
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
        
        #markicon{
             width:10px;
            height:10px;
            float:left;
            margin-left:2px;
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
                                <h1>বিষয়ঃ ইতিহাস ও সামাজিক বিজ্ঞান</h1>
                                <h1>পরিশিষ্ট ৫ শিক্ষার্থীর PI রেকর্ড সংরক্ষণ ছক(Class: <?php echo $c?> Section:  <?php echo $s?>)</h1>
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
								<th style="width: 60px">
									রোল
								</th>
								<th style="width: 300px;">
									শিক্ষার্থীর নাম
								</th>
								<th style="width: 100px;">
									০৫.০৯.০২.০১
								</th>
								
								<th style="width: 100px;">
									০৫.০৯.০২.০২
								</th>

                                <th style="width: 100px;">
                                   ০৫.০৯.০৬.০১
                                </th>

                                <th style="width: 100px;">
                                    ০৫.০৯.০১.০১
                                </th>
								
								<th style="width: 100px;">
									০৫.০৯.০১.০৩
								</th>

                                <th style="width: 100px;">
                                    ০৫.০৯.০১.০২
                                </th>

                                <th style="width: 100px;">
                                    ০৫.০৯.০২.০৪
                                </th>

                                <th style="width: 100px;">
                                    ০৫.০৯.০৪.০২
                                </th>

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
                            
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                           
                            

                            
                            </tr>
                            <?php $count++; } ?>

                            <tr style="height: 40px">
                                <td></td>
                                <td></td>

                               <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                            </tr>

                            <tr style="height: 40px">
                                <td></td>
                                <td></td>

                               <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                            </tr>

                            <tr style="height: 40px">
                                <td></td>
                                <td></td>

                                <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>
                            <td>
                                <img src="../img/markicon/sb.png" id='markicon'>
                                <img src="../img/markicon/cb.png" id='markicon'>
                                <img src="../img/markicon/tb.png" id='markicon'>
                            </td>

                            </tr>

                           

                            
                        </tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
