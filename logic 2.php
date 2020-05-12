<?php
	//Skip waring message
	error_reporting(E_ERROR | E_PARSE);
	$query = prepare_query_string();
	if(isset($query["method"])){
		$method = $query["method"];
		switch ($method) {
			case '1':
				//Logout
				destroy_session();
				go_to_login();
				break;
			default:
				break;
		}
	}
	/*Destroy session when log out*/
	function destroy_session(){
		my_session_start();
		//$_SESSION = array();
		//setcookie(session_name, '', time()- 30*24*60, '/');

		//Remove all seesion variable equal to $_SESSION = array();
		session_unset();
		//Destory the session
		session_destroy();
	}



	function go_to_login(){
		header("Location: ./login.php");
	}
   function prepare_query_string(){
		//echo $_SERVER['QUERY_STRING'];
		$re = [];
		$query_array = explode("&", $_SERVER["QUERY_STRING"]);
		//Add: if there is data pass to logic.php
		if(!empty($query_array[0])){
			foreach ($query_array as $key => $value) {
				$temp = explode("=", $value);
				$re[$temp[0]] = $temp[1];
		}
	}
		return $re;
	}


   /*Starts a session if no session is started*/
	function my_session_start(){
		if(session_status() !== PHP_SESSION_ACTIVE){
			session_start();
		}
	}
?>
