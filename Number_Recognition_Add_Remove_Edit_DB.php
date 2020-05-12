<?php
require_once "menu_bar.php";
echo "<pre>";
$fileName = "number_recognition_DB.txt";
$myFilePath="./".$fileName;
$myFile = fopen(getcwd()."/".$fileName, "a+");
$fileContents = file_get_contents($myFilePath, NULL);

//variable $myFile holds the addition database


extract($_POST);
$number=$_POST['number'];
$digit=$_POST['digit'];
$place=strtolower($_POST['place']);
$line = "".$number." ".$digit." ".$place."\n";
if (isset ($_POST['add_problem'])){
	if ($number =="" or $digit == "" or !isset($place)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) !== false){
		echo "Problem already exists in problem set!";
	}
	//if we get
	else {
		//add the line to the contents of the file
		echo "success";
		//echo $fileContents."<br>"."past";
		$fileContents = $fileContents.$line;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);

	}
}
elseif (isset($_POST['remove_problem'])){
	if ($number =="" or $digit == "" or !isset($place)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) == false){
		echo "Problem does not exist in problem set, please try again.";
	}
	//if we get
	else {
		echo "successfully removed problem";
		//get rid of the line
		$fileContents = str_replace($line, "", $fileContents);
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
	}

}

?>
