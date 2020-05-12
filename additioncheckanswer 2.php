<?php

require_once('additiongame.php');
//get info passed by last page
$arr = prepare_query_string();
//if correct method, check answer
if($arr['method']==1){
    check_answer($arr['answer']);
}

//check answer and redirect appropriately
function check_answer($right_answer){
    session_start();
    //increase total question count by 1
    if(isset($_SESSION['add_total'])){
        $_SESSION['add_total']++;
    }
    else{
        $_SESSION['add_total']=1;
    }
    //extract user answer
    $user_answer= $_POST["digitplace"];
    if($user_answer==$right_answer){
    //increase correct question count by 1
        if(isset($_SESSION['add_correct'])){
            $_SESSION['add_correct']++;
        }
        else{
            $_SESSION['add_correct']=1;
        }
        $_SESSION['burger_image']++;
    //go to correct answer page if haven't won, or to win screen if have

        if($_SESSION['add_correct']<POINTS_TO_WIN){
            header("Location: addition_right_answer.php");
        }
        else{
            header("Location: addition_won_game.php");
        }

    }
    else{
    //go to incorrect answer page
        header("Location: addition_wrong_answer.php?correct_answer=$right_answer");
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
