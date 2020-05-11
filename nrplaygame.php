<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
//pick and print a problem, record correct answer
require_once('nrgame.php');
require_once('menu_bar.php');
$current_problem = pick_problem();



//get user response and redirect to nrcheckanswer.php
//user name, type, date, numAttempted, numCorrect, gamesWon
require_once 'config.php';
require_once 'files.php';
$user = $_SESSION["username"];
$userType = $_SESSION["user_type"];
if (isset($_GET['startGame'])){
	add_new_progress_info(PROGRESSFILE,$user,$userType);
}

echo <<<_END
	<br><br><br>
	<div class="center_text">
		$current_problem
	</div>
	<br>
	<form action="nrcheckanswer.php?method=1&answer=$current_answer&username=$user" method="post" class="center_text">
    	<input type="submit" name="hundreds" id="hundreds" value="hundreds" />
		<input type="submit" name="tens" id="tens" value="tens" />
		<input type="submit" name="ones" id="ones" value="ones" />
	</form>
_END;
?>
</body>
</html>
