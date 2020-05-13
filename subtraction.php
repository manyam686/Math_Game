<style>
	#welcome{
		margin: 0px 0px 0px 10px;
	}
	#button{
		display: inline-block;
		background-color: #236AB9;
		margin-left: 10px;
	}
</style>

<?php
	require_once 'menu_bar.php';
	$user = $_SESSION["username"];
	echo <<<_END
	<div id="welcome">
	<br>Welcome to subtraction game, $user
	<br><br>Here are the rules:
	<br>A subtraction problem will appear on the screen.
	<br>Enter in the correct difference and you will get a question right, building the first part of your ice cream!
	<br>Get ten question right to complete your delicious food!
	<br><br>
	</div>
	_END;

	echo <<<_END
			<li id = "button">
					<a href="./subtractionplaygame.php?user=$_SESSION[username]" class="link">Play!</a>
			</li>
			</li>
			<br>
	_END;

	if($_SESSION['user_type'] == "teacher"){
			echo <<<_END
			<br><br>
			<li id="button">
					<a href="./add_remove_subtraction.php?user=$_SESSION[username]" class="link">Add or Remove a Problem</a>
			</li>
			_END;
	}
?>
