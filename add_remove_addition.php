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
        font-weight: 800;
        font-Size: 50px;
    }

    </style>
    <br><br><br><br><br><br><br>
  <form action="add_remove_addition_DB.php" method="post" id="arinfo">
    <h2>Add/Remove Addition Problem</h2>
    <br>
    <tag1 class="label">First Number:</tag1>
    <input type="number" name="firstnumber" id="textbox" placeholder="x" />
    <br/><br/>

    <tag2 class="label">Second Number:</tag2>
    <input type="number" name="secondnumber" id="textbox" placeholder="x" /><br/><br/>

    <tag3 class="label">Sum:</tag3>
    <input type="number" name = "sum" id = "textbox" placeholder="x"/><br/><br/>

    <input type="submit" name="add_problem" id="button" value="Add Problem" />
    <input type="submit" name="remove_problem" id="button" value="Remove Problem" />

  </form>
</body>
</html>
