<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add/Remove Problem</title>

	</head>
<body>
	<?php
    require_once "menu_bar.php";
    ?>
	<form action="Number_Recognition_Add_Remove_Edit_DB.php" method="post" id="form_id">
		<h2>Add/Remove Number Recognition Problem</h2>

		Full Number:
		<input type="number" name="number" id="number" placeholder="xxx" />
		<br/><br/>

		Digit:
		<input type="number" name="digit" id="digit" placeholder="x" /><br/><br/>

		Place:
		<input type="radio" name="place" id="One" value="Ones">
		<label for="ones">Ones</label>
		<input type="radio" name="place" id="Tens"  value="Tens">
		<label for="Tens">Tens</label>
		<input type="radio" name="place" id="Hundreds"  value="Hundreds">
		<label for="Hundreds">Hundreds</label><br><br>

		<input type="submit" name="add_problem" id="add_problem" value="Add Problem" />
		<input type="submit" name="remove_problem" id="remove_problem" value="Remove Problem" />

	</form>

</body>
</html>
