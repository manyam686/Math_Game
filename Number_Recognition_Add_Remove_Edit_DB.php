<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Add/Remove Problem</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
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
$line = $number." ".$digit." ".$place."\n";
if (isset ($_POST['add_problem'])){
	if ($number =="" or $digit == "" or !isset($place)){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Incomplete problem information, please fill all fields and try again.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) !== false){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Problem already exists in problem set.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get
	elseif (strlen($number) > 3){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Length of number must be less than four digits.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	elseif (strlen($number) == 3){
		if($place == "ones" && $digit !== $number[2]){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
		if($place == "tens" && $digit !== $number[1]){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
		if($place == "hundreds" && $digit !== $number[0]){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
	}
	elseif (strlen($number) == 2){
		if($place == "hundreds"){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
		if($place == "ones" && $digit !== $number[1]){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
		if($place == "tens" && $digit !== $number[0]){
			echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Solution incorrect.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
		}
	}
	else {
		//add the line to the contents of the file
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Success!</div>
		_END;
		//echo $fileContents."<br>"."past";
		$fileContents = $fileContents.$line;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
		header("refresh:3; url= welcome.php");

	}
}
elseif (isset($_POST['remove_problem'])){
	if ($number =="" or $digit == "" or !isset($place)){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Incomplete problem information, please fill all fields and try again.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) == false){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Problem does not exist in problem set, please try again.</div>
		_END;
		header("refresh:3; url=add_remove_problem_number_recognition.php");
	}
	//if we get
	else {
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Successfully removed problem!</div>
		_END;
		//get rid of the line
		$fileContents = str_replace($line, "", $fileContents);
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
		header("refresh:3; url= welcome.php");
	}

}

?>
