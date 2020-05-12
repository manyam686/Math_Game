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
	Welcome to view student progress, $user
	<br>Here is the progress of all students: <br><br>
	</div>
	_END;

	teacher_get_progress();

?>
