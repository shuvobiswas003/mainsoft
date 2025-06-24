<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    
    <style type="text/css">
    .container{
        width:1600px;
        margin:0 auto;
    }
    .leftpart{
        float:left;
        width:32%;
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
$stuid=$_POST['stuid'];
$iid=$_POST['id'];

    ?>
<?php
require "../interdb.php";
//getting Student data
$count1=1;
$sel_query1="Select * from student where uniqid='$stuid';";
$result1 = mysqli_query($link,$sel_query1);
while($row1 = mysqli_fetch_assoc($result1)) {

?>
    <div class="container">
            


<!--Start Single part Right Side-->
            <div class="leftpart">
                <div class="invoice_border">
                    <center><h5>Student Copy</h5></center>
                    <center><h2 style="margin-top:-10px; font-size:30px;">
                <?php
                
                $count2=1;
                $sel_query2="Select * from schoolinfo";
                $result2 = mysqli_query($link,$sel_query2);
                while($row2 = mysqli_fetch_assoc($result2)) {
            ?>
            <?php echo $row2['schoolname']?>

            <?php $count2++; } ?>
                    </h2></center>
                    
                    <table>

                    <tr><td>
                    <h3 style="margin-left:20px; font-size:23px;">Student Name: <?php echo $row1['name'];?> </h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Class: <?php echo $row1['classnumber'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Roll: <?php echo $row1['roll'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Section: <?php echo $row1['secgroup'];?></p></h3>
                    <h3 style="margin-left:20px; font-size:20px;margin-top:-20px;"><p>Mobile: <?php echo $row1['mobile'];?></p></h3>
                    <td>
                    <td><b><h3>Date: <?php echo date('Y-m-d');?></h3></b></td>
                    </tr>
                    </table>
                    <table border="1" style="border-collapse:collapse;font-size:20px; text-align:center; margin-left:20px;">
                        <tr>
                            <th>
                            Status
                            </th>
                            
                        </tr>
<?php
$totaldue = 0;
$totalamount = 0;
$totalpay = 0;

for ($i = 0; $i < count($iid); $i++) {
    $idn = $iid[$i];
    $count = 1;
    $sel_query = "SELECT * FROM studentpayment WHERE id = $idn;";
    $result = mysqli_query($link, $sel_query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Your HTML table row here
    ?>
        <tr>
            <th><h3>Deleted Successfully</h3></th>
        </tr>
        <?php
    echo $puniid=$row['puniid'];
// Delete query
$delete_query = "DELETE FROM studentpayment WHERE id = '$idn';";
$delete_query2 = "DELETE FROM invoicetrx WHERE iid = '$puniid';";
        
        // Execute the update query
        mysqli_query($link, $delete_query);
        mysqli_query($link, $delete_query2);

        $count1++;
    }
}
?>
</table>
                    
                    
                </div>
                <?php $count++; } ?>
            </div><!--Ending Single part Right Side-->
            
    </div>
    
</body>
</html>
