<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php
	$startroll=10;
	$endroll=30;

	$colbench=4;
	$numberrow=5;

	for ($i=1; $i <=$colbench ; $i++) {
		?>
		<table>
			<?php
			$tablestartroll=$startroll;
			$tableendroll=$startroll+($numberrow*2);
			$startroll=$tableendroll;
			$tablecountervar=$tablestartroll+$numberrow;
			for ($j=1; $j<=$numberrow; $j++) { 
			?>
			<tr>
				<?php 
				while ($tablestartroll<$tablecountervar) {
					?>
					<div class="left" style="float:left;">
						<?php echo $tablestartroll;?>
					</div>
					<div class="right" style="float:left;padding-left: 20px;">
						<?php echo $tablestartroll+$numberrow;?>
					</div>
					<?php
					echo "<br>";
					$tablestartroll++;
				}
				?>
			</tr>
			<?php } ?>
		</table>
		<br>
	<?php } ?>

	
	
</body>
</html>