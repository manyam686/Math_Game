<?php
    define("FILENAME","subtractionDB.txt");
    define("POINTS_TO_WIN",4);

    $icecream_images = array();
    $icecream_images[]="icecream0.png";
    $icecream_images[]="icecream1.png";
    $icecream_images[]="icecream2.png";
    $icecream_images[]="icecream3.png";
    $icecream_images[]="icecream4.png";


    $icecream_height = array();
    $icecream_height[] = 100;
    $icecream_height[] = 150;
    $icecream_height[] = 180;
    $icecream_height[] = 190;
    $icecream_height[] = 210;


    global $num_probs;
    global $current_answer;
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
        $number1 = $problems[$prob_num][0];
        $number2 = $problems[$prob_num][1];
        global $current_answer;
        $current_answer = $problems[$prob_num][2];
        return $number1." - ".$number2." = ";
    }
?>
