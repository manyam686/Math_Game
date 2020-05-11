<?php
	/******File Handling*******/
	$key_arr = array("username", "password", "type");
	$key_arr_progress = array("username", "type", "date", "numAttempted","numCorrect", "numWon");


	/*Write $data to $filename*/
	function save_data($filename, $data){
		$str = join(" ", $data)."\n";

		//$myfile = fopen("DB/$filename", "w") or die("Failed to create files");
		/*Append data to $filename*/
		/*More fopen modes on page 149*/
		$myfile = fopen($filename, "a") or die("Failed to create files");


		fwrite($myfile, $str) or die("Could not write to file");

		fclose($myfile);
	}


	function update_file($file, $data){
		//override
		$myfile = fopen($file, "w") or die("Failed to create files");
		$str = "";
		foreach ($data as $key => $value) {
			$str .= join(" ", $value);
		}

		fwrite($myfile, $str) or die("Could not write to file");

		fclose($myfile);
	}

	/***Reading from a file: fgets**/
	function get_user_info($filename){
		global $key_arr;

		$myfile = fopen($filename, "r") or die("File does not exist");

		/*could use fread()*/
		while($line=fgets($myfile)){
			//Convert to array by " "
			$res = explode(" ", $line);
			$new_res = [];
			//Replace keys in $res
			for($i = 0; $i<count($key_arr); $i++){
				$new_res[$key_arr[$i]] = $res[$i];
			}

			$info_arr[$res[0]] = $new_res;
			//Destory local variable $new_res
			unset($new_res);
			unset($res);
		}

		fclose($myfile);
		return $info_arr;
	}

	function add_new_progress_info($filename,$username,$userType){
	require_once "config.php";
	$date = date("Y-m-d");
	// echo "<br>Our username: ".$username;
	// echo "<br>Our date: ".$date;
	$myfile = fopen($filename, "a+") or die("File does not exist");
	$full_file_content = file_get_contents($filename);
	$entry_content = explode(";", $full_file_content);
	// echo "<br>entry_content: ";
	// print_r($entry_content);
	$entryExists = false;
	$count = count($entry_content);
	// echo "<br>count: ".$count;
	for ($entry=0; $entry < count($entry_content)-1; $entry++) {
		$single_entry = explode(" ", $entry_content[$entry]);
		#check if first element of name is newline (ascii=10). if so, chop it off!
		$ascii = ord($single_entry[0]);
		if ($ascii == 10){
			$this_username = substr($single_entry[0], 1);
		}
		else{
			$this_username = $single_entry[0];
		}
		#compare username and date
		$user_comp = strcmp($this_username,$username);
		if($user_comp == 0){
			$date_comp = strcmp($single_entry[2],$date);
			if($date_comp == 0){
				$entryExists = true;
				break;
			}
		}
	}
	if ($entryExists == false){
		$array = array($username, $userType, $date, 0, 0, 0);
		$str = implode(" ", $array);
		$str = $str.";";
		fwrite($myfile, $str);
	}
	fclose($myfile);
}

function increment_num_probs_attempted($filename,$username){
	require_once "config.php";
	$date = date("Y-m-d");
	$myfile = fopen($filename, "a+") or die("File does not exist");
	$content = file_get_contents($filename);
	$entries_content = explode(";", $content);
	$return_content = "";
	for($i=0; $i < count($entries_content)-1; $i++) {
		$single_entry = explode(" ", $entries_content[$i]);
		#check if first element of name is newline (ascii=10). if so, chop it off!
		$ascii = ord($single_entry[0]);
		if ($ascii == 10){
			$this_username = substr($single_entry[0], 1);
		}
		else{
			$this_username = $single_entry[0];
		}
		if($this_username == $username){
			if($single_entry[2] == $date){
				$single_entry[3]++;
			}
		}
		$return_content = $return_content.implode(" ", $single_entry).";";
	}
	file_put_contents($filename, $return_content);
	fclose($myfile);
}

function increment_num_probs_correct($filename,$username){
	require_once "config.php";
	$date = date("Y-m-d");
	$myfile = fopen($filename, "a+") or die("File does not exist");
	$content = file_get_contents($filename);
	$entries_content = explode(";", $content);
	$return_content = "";
	for($i=0; $i < count($entries_content)-1; $i++) {
		$single_entry = explode(" ", $entries_content[$i]);
		#check if first element of name is newline (ascii=10). if so, chop it off!
		$ascii = ord($single_entry[0]);
		if ($ascii == 10){
			$this_username = substr($single_entry[0], 1);
		}
		else{
			$this_username = $single_entry[0];
		}
		if($this_username == $username){
			if($single_entry[2] == $date){
				$single_entry[4]++;
			}
		}
		$return_content = $return_content.implode(" ", $single_entry).";";
	}
	file_put_contents($filename, $return_content);
	fclose($myfile);
}

function increment_num_games_won($filename,$username){
	require_once "config.php";
	$date = date("Y-m-d");
	$myfile = fopen($filename, "a+") or die("File does not exist");
	$content = file_get_contents($filename);
	$entries_content = explode(";", $content);
	$return_content = "";
	for($i=0; $i < count($entries_content)-1; $i++) {
		$single_entry = explode(" ", $entries_content[$i]);
		#check if first element of name is newline (ascii=10). if so, chop it off!
		$ascii = ord($single_entry[0]);
		if ($ascii == 10){
			$this_username = substr($single_entry[0], 1);
		}
		else{
			$this_username = $single_entry[0];
		}
		if($this_username == $username){
			if($single_entry[2] == $date){
				$single_entry[5]++;
			}
		}
		$return_content = $return_content.implode(" ", $single_entry).";";
	}
	file_put_contents($filename, $return_content);
	fclose($myfile);
}


	/*****Copy a file*****/
	/*$file2_name = "DB/useer_copy.txt";
	if(!copy($file_name, $file2_name)){
		echo "Could not copy file";
	}else{
		echo "Copy $file_name to $file2_name";
	}*/


	/*Question: How should we update use.txt file;*/
	/***Delete a file***/
  	//echo unlink($file_name)? "Delete file $file_name" : "Could not delete file $file_name";


?>
