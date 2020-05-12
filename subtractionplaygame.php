<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php

require_once("menu_bar.php");
require_once('subtractiongame.php');
$current_problem = pick_problem();


require_once 'config.php';
require_once 'files.php';
$user = $_SESSION["username"];
$userType = $_SESSION["user_type"];

session_start();
if(!isset($_SESSION['burger_image_sub'])){
	$_SESSION['burger_image_sub']=0;
	add_new_progress_info(SUBPROGRESSFILE,$user,$userType);
}
$current_image = $_SESSION['burger_image_sub'];

//get user response and redirect to additioncheckanswer.php
echo <<<_END
	<br><br><br>
	<div class="center_text">
		$current_problem
	</div>
	<form action="subtractioncheckanswer.php?method=1&answer=$current_answer&username=$user" method="post" class="center_text">
    	<input type="text" id="textbox" name="digitplace">
    	<input type="submit" id="button">
	</form>
	<br>
	<img src=$icecream_images[$current_image] class="center_image" width=100 height=$icecream_height[$current_image]>
_END;
?>
</body>
</html>
