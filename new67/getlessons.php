<?
require "../interdb.php";
$subcode = $_POST['categoryId'];
// Retrieve the subcategories for the selected category from the database
$sql10="Select * from lesson where classnumber='$classnumber' AND secgroupname='$secgroupname' AND subcode='$subcode' ORDER BY chapterno ASC,lno ASC;";
$result10 = mysqli_query($link,$sql10);
$options = "<option value=''>Select Subcategory</option>";
while ($row10 = mysqli_fetch_assoc($result10)) {
echo "<option>".$row10['lno']."</option>"; 
}

?>