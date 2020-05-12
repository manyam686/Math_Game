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
  <form action="add_remove_addition_DB.php" method="post" id="form_id">
    <h2>Add/Remove Addition Problem</h2>

    First Number:
    <input type="number" name="firstnumber" id="firstnumber" placeholder="x" />
    <br/><br/>

    Second Number:
    <input type="number" name="secondnumber" id="secondnumber" placeholder="x" /><br/><br/>

    Sum:
    <input type="number" name = "sum" id = "sum" placeholder="x"/><br/><br/>

    <input type="submit" name="add_problem" id="add_problem" value="Add Problem" />
    <input type="submit" name="remove_problem" id="remove_problem" value="Remove Problem" />

  </form>
</body>
</html>
