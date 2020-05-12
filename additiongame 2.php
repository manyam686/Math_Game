<?php
    define("FILENAME","additionDB.txt");
    define("POINTS_TO_WIN",10);

    $burger_images = array();
    $burger_images[]="goodburger00.png";
    $burger_images[]="goodburger01.png";
    $burger_images[]="goodburger02.png";
    $burger_images[]="goodburger03.png";
    $burger_images[]="goodburger04.png";
    $burger_images[]="goodburger05.png";
    $burger_images[]="goodburger06.png";
    $burger_images[]="goodburger07.png";
    $burger_images[]="goodburger08.png";
    $burger_images[]="goodburger09.png";
    $burger_images[]="goodburger10.png";

    $burger_height = array();
    $burger_width = array();
    $burger_width[]=307;
    $burger_height[] = 70;
    $burger_width[]=310;
    $burger_height[] = 100;
    $burger_width[]=348;
    $burger_height[] = 150;
    $burger_width[]=348;
    $burger_height[] = 160;
    $burger_width[]=340;
    $burger_height[] = 190;
    $burger_width[]=342;
    $burger_height[] = 220;
    $burger_width[]=343;
    $burger_height[] = 269;
    $burger_width[]=344;
    $burger_height[] = 283;
    $burger_width[]=345;
    $burger_height[] = 301;
    $burger_width[]=346;
    $burger_height[] = 315;
    $burger_width[]=348;
    $burger_height[] = 348;



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
        return $number1." + ".$number2." = ";
    }
?>
