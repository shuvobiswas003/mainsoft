
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id=$_POST['id'];
    $stu_card = $_POST['stu_card'];
    $stu_id = $_POST['stu_id'];

    $sdate = $_POST['sdate'];
    $pdate=date("Y-m-d", strtotime($sdate));

    $memorial_no = $_POST['memorial_no'];
    $village = $_POST['village'];
    $post = $_POST['post'];
    $ps = $_POST['ps'];
    $ds = $_POST['ds'];
    
    require "../interdb.php";

    // Insert into protyon table
    $sql = "INSERT INTO protyon (id,stu_card, stu_id, pdate, memorial_no, village, post, ps, ds) 
            VALUES ('$id','$stu_card', '$stu_id', '$pdate', '$memorial_no', '$village', '$post', '$ps', '$ds')
            ON DUPLICATE KEY UPDATE 
            stu_card = VALUES(stu_card), stu_id = VALUES(stu_id), pdate = VALUES(pdate),
            memorial_no = VALUES(memorial_no), village = VALUES(village), post = VALUES(post),
            ps = VALUES(ps), ds = VALUES(ds)";

    if (mysqli_query($link, $sql)) {
        echo "<h3 style='color:green;'>Protyon Added Added</h3>";
    } else {
        echo "<h3 style='color:red;'>Failed to Add Protyon</h3>";
    }


     // Insert into stuaddressbangla table
    $sql2 = "INSERT INTO stuaddressbangla (stuid,village, post, ps, ds) 
            VALUES ('$stu_id','$village', '$post', '$ps', '$ds')
            ON DUPLICATE KEY UPDATE 
            village = VALUES(village),
            post = VALUES(post), ps = VALUES(ps), ds = VALUES(ds)";


    if (mysqli_query($link, $sql2)) {
        echo "<h3 style='color:green;'>Address Added/Updated</h3>";
    } else {
        echo "<h3 style='color:red;'>Failed to Add Address</h3>";
    }

    echo "<h1 style='color:green'>";
    echo "<a href='print/print_protyn.php?id=".$id."'>Print Protyon</a>";
    echo "</h1>";
}
?>
