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
    <div class="center_text">That is incorrect.</div>
    <?php
        //get info passed by last page
        // function prepare_query_string(){
        //         $re = [];
        //         $query_array = explode("&", $_SERVER["QUERY_STRING"]);
        //         if(!empty($query_array[0])){
        //             foreach ($query_array as $key => $value) {
        //                 $temp = explode("=", $value);
        //                 $re[$temp[0]] = $temp[1];
        //         }
        //     }
        //     return $re;
        // }
        $info = prepare_query_string();
        //print correct answer
        $answer = $info['correct_answer'];
        echo <<<_END
            <div class="center_text">The correct answer is $answer.</div>
            <br>
        _END;
    ?>
    <form action="additionplaygame.php" method="post" id="form_id" class="center_text">
    	<input type="submit" name="next_problem" id="button" value="Next Problem" />
    </form>
</body>
</html>
