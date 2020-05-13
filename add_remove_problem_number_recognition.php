<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add/Remove Problem</title>
	 <link rel="stylesheet" type="text/css" href="styles.css">
	</head>
<body>
	<?php
    require_once "menu_bar.php";
    ?>

	<style type="text/css">
    #arinfo{
        text-align: center;
		display: block;
		background-color: #236AB9;
		padding: 20px;
		width: 700px;
		margin-left: auto;
		margin-right: auto;
    }
    .label{
        font-family: Rockwell;
        font-size: 25px;
    }
    h2{
        font-family: Rockwell;
        font-Size: 50px;
		font-weight: 800;
    }
	</style>
	<br><br><br><br><br><br>
	<form action="Number_Recognition_Add_Remove_Edit_DB.php" method="post" id="arinfo">
		<h2>Add/Remove<br>Number Recognition Problem</h2>
		<br>
		<tag1 class="label">Full Number:</tag1>
		<input type="number" name="number" id="textbox" placeholder="xxx" />
		<br/><br/>

		<tag2 class="label">Digit:</tag2>
		<input type="number" name="digit" id="textbox" placeholder="x" /><br/><br/>

		<tag3 class="label">Place:</tag3>
		<input type="radio" name="place" id="checkbox"  value="Hundreds">
		<label for="Hundreds" class="label">Hundreds</label>
		<input type="radio" name="place" id="checkbox"  value="Tens">
		<label for="Tens" class="label">Tens</label>
		<input type="radio" name="place" id="checkbox" value="Ones">
		<label for="ones" class="label">Ones</label>
		<br><br>

		<input type="submit" name="add_problem" id="button" value="Add Problem" />
		<input type="submit" name="remove_problem" id="button" value="Remove Problem" />

	</form>

</body>
</html>
