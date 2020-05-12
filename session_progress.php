<style>
	#welcome{
		margin: 0px 0px 0px 10px;
	}
</style>

<?php
	require_once 'menu_bar.php';
	require_once 'files.php';
	$user = $_SESSION["username"];
	echo <<<_END
	<div id="welcome">
	Welcome to session progress, $user
	<br>Here is your progress so far this session:<br><br>
	</div>
	_END;

	student_get_progress($user);

?>
