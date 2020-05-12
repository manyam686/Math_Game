<?php

require_once('subtractiongame.php');
require_once('config.php');
require_once('files.php');
//get info passed by last page
$arr = prepare_query_string();
//if correct method, check answer
if($arr['method']==1){
    check_answer($arr['answer'], $arr['username']);
}

//check answer and redirect appropriately
function check_answer($right_answer, $username){
    session_start();

      increment_num_probs_attempted(SUBPROGRESSFILE, $username);
    //increase total question count by 1
    if(isset($_SESSION['sub_total'])){
        $_SESSION['sub_total']++;
    }
    else{
        $_SESSION['sub_total']=1;
    }
    //extract user answer
    $user_answer= $_POST["digitplace"];
    if($user_answer==$right_answer){
      increment_num_probs_correct(SUBPROGRESSFILE, $username);
    //increase correct question count by 1
        if(isset($_SESSION['sub_correct'])){
            $_SESSION['sub_correct']++;
        }
        else{
            $_SESSION['sub_correct']=1;
        }
        $_SESSION['burger_image_sub']++;
    //go to correct answer page if haven't won, or to win screen if have

        if($_SESSION['sub_correct']<POINTS_TO_WIN){
            header("Location: subtraction_right_answer.php");
        }
        else{
          increment_num_games_won(SUBPROGRESSFILE, $username);
            header("Location: subtraction_won_game.php");
        }

    }
    else{
    //go to incorrect answer page
        header("Location: subtraction_wrong_answer.php?correct_answer=$right_answer");
    }
}

//get info passed by last page
function prepare_query_string(){
		$re = [];
		$query_array = explode("&", $_SERVER["QUERY_STRING"]);
		if(!empty($query_array[0])){
			foreach ($query_array as $key => $value) {
				$temp = explode("=", $value);
				$re[$temp[0]] = $temp[1];
		}
	}
	return $re;
}
?>
