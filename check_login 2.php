
<?php
require_once 'files.php';
require_once 'config.php';
require_once 'logic.php';
echo "<pre>";
 /*names of two input: username and password*/
// foreach($_POST as $key => $val){
//     echo "$key:$val\n";
// }

//CONSTANTS
$bad = 0;
$correct_login = 1;
$bad_username = 2;
$bad_password = 3;
$bad_account_type = 4;

extract($_POST);

#USER WANTS TO LOGIN
if (isset($_POST['login'])) {
			# Login button was clicked
			//1: can login 2: user does not exist  3: invaild password
			// echo "username: ".$username."\n";
			// echo "password: ".$password."\n";
			// echo "account type: ".$account_type."\n";

			#If username or password doesn't exist, automatically set $re to 2 or 3
			if ($username == ""){
				$re = $bad_username;
			}
			elseif($password == ""){
				$re = $bad_password;
			}
			elseif(!isset($account_type)){
				$re = $bad_account_type;
			}
			else{
				$re = checkLogin($username, $password, $account_type);
			}

			if($re===$correct_login){
				/*Redirect browser*/
				my_session_start();
				$_SESSION['username'] = $username;
				#$all_user = get_user_info(USERFILE, USERFILEKEY);
				$_SESSION['user_type'] = $account_type;
				header("Location: welcome.php?user=$username");

			}else{
				echo "Invalid username, password, or login type";

				/*Redirect to login.php after 5 seconds*/
			  header("refresh:3; url=login.php"); //Uncomment to redirect to login page after 5 seconds.
			}



}
#USER WANTS TO CREATE ACCOUNT
elseif (isset($_POST['create_account'])) {
			# Create Account button was clicked
			$all_users = get_user_info(USERFILE);

			#If username or password doesn't exist, automatically set $re to 2 or 3
			if ($username == "" or $password == "" or !isset($account_type)){
				echo "Incomplete information entered, try again.";

				/*Redirect to login.php after 5 seconds*/
				header("refresh:3; url=login.php"); //Uncomment to redirect to login page after 5 seconds.
			}
			//all info was entered, check if username is already taken
			elseif(array_key_exists($username, $all_users)){
				echo "Username already exists.";

					/*Redirect to login.php after 5 seconds*/
				header("refresh:3; url=login.php"); //Uncomment to redirect to login page after 5 seconds.
			}
			//username doesn't exist! proceed to make account.
			else{
				$new_account = array($username, $password, $account_type);
				save_data(USERFILE, $new_account);
				my_session_start();
				$_SESSION['username'] = $username;
				// $all_user = get_user_info(USERFILE, USERFILEKEY);
				$_SESSION['user_type'] = $account_type;
				header("Location: welcome.php?user=$username");

			}
	}
	#USER WANTS TO DELETE ACCOUNT
	elseif (isset($_POST['delete_account'])) {
		echo "Delete this account!!";
	}


/**
*Returns 1: can login
*		 		 2: user does not exist
*		 		 3: invaild password
*/
function checkLogin($name, $pw, $type){
	$correct_login = 1;
	$bad_username = 2;
	$bad_password = 3;
	$bad_account_type = 4;

	$all_user = get_user_info(USERFILE);

		if (array_key_exists($name, $all_user)){
			//user exists
			$correct_password = $all_user[$name]['password'];
			if ($pw == $correct_password){
				//correct password
				$correct_type = rtrim($all_user[$name]['type']);
				if ($type == $correct_type){
					//correct account type (teacher or student)
					return $correct_login;
				}
				else{
					//wrong account type
					return $bad_account_type;
				}
			}
			else{
				//wrong password
				return $bad_password;
			}
		}
		else{
			//user doesn't exist
			return $bad_username;
		}

}

?>
