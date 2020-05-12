<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Add/Remove Problem</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
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
$line = $firstnumber." ".$secondnumber." ".$sum."\n";
if (isset ($_POST['add_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($sum)){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Incomplete problem information, please fill all fields and try again.</div>
		_END;
		header("refresh:3; url=add_remove_addition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) !== false){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Problem already exists in problem set.</div>
		_END;
		header("refresh:3; url=add_remove_addition.php");
	}
	//check to see if the numbers actually equal the sum
	elseif ($firstnumber + $secondnumber != $sum) {
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: $firstnumber + $secondnumber does not equal $sum.</div>
		_END;
		header("refresh:3; url=add_remove_addition.php");
	}
	else {
		//add the line to the contents of the file
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Success!</div>
		_END;
		$fileContents .= $line;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
		header("refresh:3; url= welcome.php");
	}
}
elseif (isset($_POST['remove_problem'])){
	if ($firstnumber =="" or $secondnumber == "" or !isset($sum)){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Incomplete problem information, please fill all fields and try again.</div>
		_END;
		header("refresh:3; url= add_remove_addition.php");
	}
	//if we get here, that means that all fields are entered
	elseif (strpos($fileContents, ($line)) == false){
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Error: Problem does not exist in problem set, please try again.</div>
		_END;
	}
	//if we get
	else {
		echo <<<_END
			<br><br><br><br><br><br><br><br><br>
			<div class="center_text">Successfully removed problem!</div>
		_END;
		//get rid of the line
		//$line=$firstnumber." ".$secondnumber." ".$sum;
		//echo "<br>".$fileContents;
		$replace = "";
		$fileContents = str_replace($line, $replace, $fileContents);
		//echo "<br>".$fileContents;
		//overwrite the old file
		file_put_contents($fileName, $fileContents);
		header("refresh:3; url= welcome.php");
	}

}
?>
</body>
</html>
