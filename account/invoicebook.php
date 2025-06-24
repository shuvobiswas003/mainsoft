<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    
    <style type="text/css">
    .container{
    width:725px;
    margin:0 auto;
    }
    .leftpart{
        float:left;
        width:100;
        margin-left: 10px;
    }
    
        .invoice_border{
            border:3px solid black;
            min-height:1100px;
        }
        #cash{
            padding:10px 20px 10px 20px;
            border: 2px solid Black;
            border-radius:10px;
            font-size:20px;
            font-wight:600;
        }
    
    </style>
</head>
<body>
   <?php
    $classnumber=$_REQUEST['classnumber'];
    $secgroupname=$_REQUEST['secgroupname'];
    require "../interdb.php";
    ?>
<?php
require "../interdb.php";
//getting Student data
$count1=1;
$sel_query1="Select * from student WHERE classnumber='$classnumber' AND secgroup='$secgroupname';";
$result1 = mysqli_query($link,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) {
$stuid=$row1['uniqid'];
?>
    <div class="container">
            <div class="leftpart">
                <div class="invoice_border">
        
                    <center><h2 style="margin-top:0px; font-size:30px;">
                <?php
                
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
                    </h2></center>
                    <center><span id="cash">Invoice Book</span></center>
                    
                    <table>

                    <tr><td>
                    <h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
                    <td>
                    
                    </tr>
                    </table>
                    <table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
                        <tr>
                            <th>
                            Barcode
                            </th>
                            <th style="width:300px;">Description</th>
                            <th style="width:50px;">Total</th>
                            <th style="width:50px;">Pay</th>
                        </tr>
<?php
$totaldue=0;
$totalamount=0;
$totalpay=0;

$count=1;
$sel_query="Select * from studentpayment where stuid='$stuid';";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) {

?>
    <tr>
        <th>
<span style="">
<center>
<?php
    require '../barcode/vendor/autoload.php';
    $data=$row['puniid'];
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data, $generator::TYPE_CODE_128,1,30)) . '" style="padding: 10px">';
?>
</center>
</span>
        </th>

        <td>
            <?php 
            $pcatid= $row['pcatid'];
            $sel_query10="SELECT * FROM paycat WHERE id='$pcatid' ";
        $result10 = mysqli_query($link,$sel_query10);
        while($row10 = mysqli_fetch_assoc($result10)) {
            echo $lettergrade=$row10['pcatname'];
        }
            ?>
         </td>
         
        <td><?php echo $row['total'];?></td>
        <td><?php echo $row['totalpay'];?></td>

        <?php
        $totaldue=$totaldue+$row['due'];
        $totalamount=$totalamount+$row['total'];
        $totalpay=$totalpay+$row['totalpay'];
        ?>
    </tr>
<?php 
$count++; } 
?>                 

</table>
                    <h3 style="margin-left:20px;">In Total: <?php echo $totalamount;?> Tk Only</h3>
                    <h3 style="margin-left:20px;">Total Pay: <?php echo $totalpay;?> Tk Only</h3>
                    <h3 style="margin-left:20px;">Due Amount: <?php echo $totaldue;?> Tk Only</h3>
                    <center>
                    
                    </center>
                </div>
                
            </div><!--Ending Single part Left Side-->
<?php 
$count1++; } 
?>

</body>
</html>
