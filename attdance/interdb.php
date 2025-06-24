<?php
	$link = mysqli_connect("localhost", "root", "", "sch_main");
	if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
?>