<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<?php
	require_once('menu_bar.php');
	?>
	<br><br><br>
	<div class="center_text">That is correct! You have earned the next couple fries!</div>
	<?php
	require_once('nrgame.php');
	session_start();
    $current_image = $_SESSION['fry_image'];
	echo <<<_END
	<br><br>
	<img class="center_image" src=$fries_images[$current_image] width=150 height=200>
	<br>
	<form action="nrplaygame.php" method="post" id="form_id" class="center_text">
		<input type="submit" name="next_problem" id="button" class="center_image" value="Next Problem">
	</form>
	_END;
	?>
</body>
</html>
