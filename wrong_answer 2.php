<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <?php
  require_once('menu_bar.php');
  ?>
  <br><br><br>
  <div class="center_text">That is incorrect.</div>
    <?php
        //get info passed by last page

        $info = prepare_query_string();

        //print correct answer
        $answer = $info['correct_answer'];
        echo <<<_END
            <div class="center_text">The correct answer is $answer.</div>
            <br>
        _END;
    ?>
    <form action="nrplaygame.php" method="post">
    	<input type="submit" name="next_problem" id="button" class="center_image" value="Next Problem" />
    </form>
</body>
</html>
