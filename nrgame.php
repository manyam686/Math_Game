<?php
    define("FILENAME","number_recognition_DB.txt");
    define("POINTS_TO_WIN",5);

    global $num_probs;
    global $current_answer;

    $fries_images = array();
    $fries_images[] = "fries0.png";
    $fries_images[] = "fries1.png";
    $fries_images[] = "fries2.png";
    $fries_images[] = "fries3.png";
    $fries_images[] = "fries4.png";
    $fries_images[] = "fries5.png";

    //get problems from file and store in array
    function get_problems(){
        global $num_probs;
        $num_probs=0;
        $file = fopen(FILENAME,"r") or die ("Unable to open file");
        while(!feof($file)){
            $line = fgets($file);
            $info = explode(" ",$line);
            $problems[]=$info;
            $num_probs++;
        }
        fclose($file);
        return $problems;
    }

    //pick a problem and print it
    function pick_problem(){
        global $num_probs;
        $problems = get_problems();
        $prob_num = rand(1,$num_probs)-1;
        $number = $problems[$prob_num][0];
        $digit = $problems[$prob_num][1];
        global $current_answer;
        $current_answer = $problems[$prob_num][2];
        return "For the number ".$number.", what place is the ".$digit." in?";
    }
?>
