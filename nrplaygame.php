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
session_start();
$user = $_SESSION["username"];
$userType = $_SESSION["user_type"];
if (isset($_GET['startGame'])){
	add_new_progress_info(PROGRESSFILE,$user,$userType);
}
if(!isset($_SESSION['fry_image'])){
	$_SESSION['fry_image']=0;
}
$current_image = $_SESSION['fry_image'];

echo <<<_END
	<br><br><br>
	<div class="center_text">
		$current_problem
	</div>
	<br>
	<form action="nrcheckanswer.php?method=1&answer=$current_answer&username=$user" method="post" class="center_text">
    	<input type="submit" name="hundreds" id="button" value="hundreds" />
		<input type="submit" name="tens" id="button" value="tens" />
		<input type="submit" name="ones" id="button" value="ones" />
	</form>
	<br>
	<img src=$fries_images[$current_image] width=150 height=200 class="center_image">
_END;
?>
</body>
</html>
