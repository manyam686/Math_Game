<?php
require_once("menu_bar.php");
echo "<pre>";
$fileName = "subtractionDB.txt";
$myFilePath="./".$fileName;
$myFile = fopen(getcwd()."/".$fileName, "a+");
$fileContents = file_get_contents($myFilePath, NULL);

//variable $myFile holds the addition database


extract($_POST);
$firstnumber=$_POST['firstnumber'];
$secondnumber=$_POST['secondnumber'];
$difference=$_POST['difference'];

$line = "".$firstnumber." ".$secondnumber." ".$difference;
if (isset ($_POST['add_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($difference)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url=add_remove_subtraction.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) !== false){
		echo "Problem already exists in problem set!";
		header("refresh:3; url=add_remove_subtraction.php");
	}
	//all fields entered, but result is negative
	elseif ($firstnumber - $secondnumber < 0) {
		echo "Sorry, only problems with a positive result are allowed.";
		header("refresh:3; url=add_remove_subtraction.php");
	}
	//all fields entered, but number1-number2 != difference
	elseif ($firstnumber - $secondnumber != $difference){
		echo "Error: ".$firstnumber." - ".$secondnumber." does not equal ".$difference.".";
		header("refresh:3; url=add_remove_subtraction.php");
	}
	else{
		//add the line to the contents of the file
		echo "Success!";
		$fileContents .= $line."\n";;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
	}
}
elseif (isset($_POST['remove_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($difference)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url= add_remove_subtraction.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) == false){
		echo "Problem does not exist in problem set, please try again.";
		header("refresh:3; url=add_remove_subtraction.php");
	}
	//if we get here, we should remove it.
	else {
		echo "successfully removed a problem";
		//get rid of the line
		$replace = "";
		$fileContents = str_replace($line, $replace, $fileContents);
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
	}

}








?>
