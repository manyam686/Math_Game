<?php
require_once("menu_bar.php");
echo "<pre>";
$fileName = "additionDB.txt";
$myFilePath="./".$fileName;
$myFile = fopen(getcwd()."/".$fileName, "a+");
$fileContents = file_get_contents($myFilePath, NULL);

//variable $myFile holds the addition database


extract($_POST);
$firstnumber=$_POST['firstnumber'];
$secondnumber=$_POST['secondnumber'];
$sum=$_POST['sum'];
$line = "".$firstnumber." ".$secondnumber." ".$sum."\n";
if (isset ($_POST['add_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($sum)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url=add_remove_addition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) !== false){
		echo "Problem already exists in problem set!";
		header("refresh:3; url=add_remove_addition.php");
	}
	//check to see if the numbers actually equal the sum
	elseif ($firstnumber + $secondnumber != $sum) {
		echo "Error: ".$firstnumber." + ".$secondnumber." does not equal ".$sum.".";
		header("refresh:3; url=add_remove_addition.php");
	}
	else {
		//add the line to the contents of the file
		echo "Success!";
		$fileContents .= $line;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
	}
}
elseif (isset($_POST['remove_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($sum)){
		echo "Incomplete problem information, please fill all fields and try again.";
		header("refresh:3; url= add_remove_addition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) == false){
		echo "Problem does not exist in problem set, please try again.";
	}
	//if we get
	else {
		echo "successfully removed problem";
		//get rid of the line
		//$line=$firstnumber." ".$secondnumber." ".$sum;
		//echo "<br>".$fileContents;
		$replace = "";
		$fileContents = str_replace($line, $replace, $fileContents);
		//echo "<br>".$fileContents;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
	}

}








?>
