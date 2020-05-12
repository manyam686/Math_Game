<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <?php
    require_once("menu_bar.php");
    ?>
    <br><br><br>
    <div class="center_text">That is correct! You have earned the next piece of your ice cream!</div>
    <?php
    require_once("subtractiongame.php");
    session_start();
    $current_image = $_SESSION['burger_image_sub'];
    echo <<<_END
    <br>
    <img class="center_image" src=$icecream_images[$current_image] width=100 height=$icecream_height[$current_image]>
    <br>
    <form action="subtractionplaygame.php" method="post" id="form_id" class:"center_text">
        <input type="submit" name="next_problem" id="button" class="center_image" value="Next Problem">
    </form>
    _END;
    ?>
</body>
</html>
