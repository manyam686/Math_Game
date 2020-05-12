<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<?php

	session_start();
	$user = $_SESSION["username"];

	require_once('menu_bar.php');
	?>

    <br><br><br>
    <div class="center_text">That is correct!</div>
	<br>

    <?php
	echo <<<_END
    <form action="nrplaygame.php" method="post" id="form_id" class="center_text">
    	<input type="submit" name="next_problem" id="button" class="center_image" value="Next Problem" />
    </form>
    _END;
    ?>
</body>
</html>
