<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Math Game</title>
	</head>
<body>
<style>
	#welcome{
		margin: 0px 0px 0px 10px;
		text-align: center;
		font-size: 50px;
	}
</style>
<?php
	require_once 'menu_bar.php';
	require_once 'logic.php';

	my_session_start();

	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];

		echo <<<_END
		<div id="welcome">
			<br><br>
			Welcome to Burger Math, $username
			<br>
			<img src="goodburger10.png">
		<div>
		_END;

	}


?>



</body>
</html>
