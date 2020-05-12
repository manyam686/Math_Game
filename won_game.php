<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<?php
require_once 'menu_bar.php';
require_once("additiongame.php");
session_start();
$current_image = $_SESSION['fry_image'];
unset($_SESSION['correct']);
unset($_SESSION['fry_image']);
unset($_SESSION['total']);
echo <<<_END
    <br><br><br>
    <div class="center_text">You won!</div>
    <br>
    <img class="center_image" src=$fries_images[$current_image] width=150 height=200 >
    <br>
_END;
?>


<meta http-equiv="refresh" content="3;url=number_recognition.php?user=$_SESSION[username]"/>


</body>
</html>
