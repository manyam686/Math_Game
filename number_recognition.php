<style>
	#welcome{
		margin: 0px 0px 0px 10px;
	}
	#button{
		display: inline-block;
	}
</style>

<?php
	require_once 'menu_bar.php';
	$user = $_SESSION["username"];
	echo <<<_END
	<div id="welcome">
	Welcome to number recognition game, $user
	<br><br>Here are the rules:
	<br>A question will appear on the screen that will ask you to pick which place a specific digit is located within a number. Select the correct answer. Get five questions right to win the game!
	</div>
	_END;
//href="./nrplaygame.php?user=$_SESSION[username]"
	echo <<<_END
			<li id = "button">
					<a  href="./nrplaygame.php?user=$_SESSION[username]&startGame=true" class="link">Play!</a>
			</li>
			</li>
			<br>
	_END;



	if($_SESSION['user_type'] == "teacher"){
			echo <<<_END
			<li id ="button">
					<a href="./add_remove_problem_number_recognition.php?user=$_SESSION[username]" class="link">Add or Remove a Problem</a>
			</li>
			_END;
	}
?>
