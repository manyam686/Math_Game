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
    <div class="center_text">That is correct! You have earned the next piece of your burger!</div>
    <?php
    require_once("additiongame.php");
    session_start();
    $current_image = $_SESSION['burger_image'];
    echo <<<_END
    <br><br>
    <img class="center_image" src=$burger_images[$current_image] width=$burger_width[$current_image] height=$burger_height[$current_image] >
    <br>
    <form action="additionplaygame.php" method="post" id="form_id" class:"center_text">
        <input type="submit" name="next_problem" id="button" class="center_image" value="Next Problem">
    </form>
    _END;
    ?>
</body>
</html>
