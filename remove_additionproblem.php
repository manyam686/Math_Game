<style>
	#welcome{
		margin: 0px 0px 0px 10px;
	}

</style>

<?php
	require_once 'menu_bar.php';
	$user = $_SESSION["username"];
	echo <<<_END
	<div id="welcome">
	Welcome to remove an addition problem, $user
	<br>Remove a problem here:
	</div>
	_END;

?>
