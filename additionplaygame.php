<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php

require_once("menu_bar.php");
require_once('additiongame.php');
$current_problem = pick_problem();


require_once 'config.php';
require_once 'files.php';
$user = $_SESSION["username"];
$userType = $_SESSION["user_type"];

session_start();
if(!isset($_SESSION['burger_image'])){
	$_SESSION['burger_image']=0;
	add_new_progress_info(ADDPROGRESSFILE,$user,$userType);
}
$current_image = $_SESSION['burger_image'];

//get user response and redirect to additioncheckanswer.php
echo <<<_END
	<br><br><br>
	<div class="center_text" id="math_problem">
		$current_problem
	</div>
	<form action="additioncheckanswer.php?method=1&answer=$current_answer&username=$user" method="post" class="center_text">
			<input type="text" id="textbox" name="digitplace">
    	<input type="submit" id="button">
	</form>
	<br>
	<img src=$burger_images[$current_image] width=$burger_width[$current_image] height=$burger_height[$current_image] class="center_image">
_END;
?>
</body>
</html>
