<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
require_once("menu_bar.php");
require_once("additiongame.php");
session_start();
$current_image = $_SESSION['burger_image'];
unset($_SESSION['add_correct']);
unset($_SESSION['burger_image']);
unset($_SESSION['add_total']);
echo <<<_END
    <br><br><br>
    <div class="center_text">You won!</div>
    <br>
    <img class="center_image" src=$burger_images[$current_image] width=$burger_width[$current_image] height=$burger_height[$current_image] >
    <br>
_END;
?>

<meta http-equiv="refresh" content="3;url=addition.php?user=$_SESSION[username]"/>

</body>
</html>
