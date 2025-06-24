<?php
require '../interdb.php';

$classnumber = $_POST['classnumber'] ?? '';
$secgroup = $_POST['secgroup'] ?? '';
$sex = $_POST['sex'] ?? '';
$roll_start = $_POST['roll_start'] ?? '';
$roll_end = $_POST['roll_end'] ?? '';

$where = [];

if ($classnumber !== '') {
  $where[] = "classnumber = '" . mysqli_real_escape_string($link, $classnumber) . "'";
}
if ($secgroup !== '') {
  $where[] = "secgroup = '" . mysqli_real_escape_string($link, $secgroup) . "'";
}
if ($sex !== '') {
  $where[] = "sex = '" . mysqli_real_escape_string($link, $sex) . "'";
}
if ($roll_start !== '') {
  $where[] = "roll >= " . intval($roll_start);
}
if ($roll_end !== '') {
  $where[] = "roll <= " . intval($roll_end);
}

$sql = "SELECT id, name, classnumber, secgroup, roll FROM student";
if ($where) {
  $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY roll ASC";

$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  echo "<div class='student-item' data-id='{$row['id']}' data-name='" . htmlspecialchars($row['name']) . "' data-class='{$row['classnumber']}' data-section='" . htmlspecialchars($row['secgroup']) . "' data-roll='{$row['roll']}'>";
  echo "Roll {$row['roll']}: {$row['name']} ({$row['classnumber']} - {$row['secgroup']})";
  echo "</div>";
}
