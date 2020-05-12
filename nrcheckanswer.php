<?php

require_once('nrgame.php');
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

    increment_num_probs_attempted(PROGRESSFILE, $username);
    if(isset($_SESSION['total'])){
        $_SESSION['total']++;
    }
    else{
        $_SESSION['total']=1;
    }
    //extract user answer
    extract($_POST);
    if(isset($_POST['hundreds'])){
        $user_answer = "hundreds";
    }
    elseif(isset($_POST['tens'])){
        $user_answer = "tens";
    }
    else{
        $user_answer="ones";
    }
    if($user_answer==$right_answer){
      increment_num_probs_correct(PROGRESSFILE, $username);
    //increase correct question count by 1
        if(isset($_SESSION['correct'])){
            $_SESSION['correct']++;
        }
        else{
            $_SESSION['correct']=1;
        }
        $_SESSION['fry_image']++;
    //go to correct answer page if haven't won, or to win screen if have

        if($_SESSION['correct']<POINTS_TO_WIN){
            header("Location: right_answer.php");
        }
        else{
            $_SESSION['correct']=0; //reset to zero once game ends
            increment_num_games_won(PROGRESSFILE, $username);
            header("Location: won_game.php");
        }

    }
    else{
      //TODO update database: num_wrong_answers++
    //go to incorrect answer page
        header("Location: wrong_answer.php?correct_answer=$right_answer");
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
