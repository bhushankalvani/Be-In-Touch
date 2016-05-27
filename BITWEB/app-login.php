<?php
	session_start();
	session_unset();
	session_destroy();
	header('Cache-Control: no-cache, must-revalidate');
	//$JsonArray;
		//basic login variables set
		$uname = "";
		$pword = "";
		$errorMessage = "";
		//Prevent and escape SQLInjection
		function quote_smart($value, $handle) {

   		if (get_magic_quotes_gpc()) {
       		$value = stripslashes($value);
   		}

   		if (!is_numeric($value)) {
       		$value = "'" . mysql_real_escape_string($value, $handle) . "'";
   		}
   			return $value;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'GET'){
			$uname = $_GET['id'];
			$pword = $_GET['pwd'];

			$uname = htmlspecialchars($uname);
			$pword = htmlspecialchars($pword);

		//username and password for connecting to database.
			$server = "localhost";
			$user = "root";
			$pass = "";
			$database = "bitouch";
		 //Creating Connection
			$db_handle = mysql_connect($server,$user,$pass);
			$db_found = mysql_select_db($database,$db_handle);
			
			if($db_found){
				$uname = quote_smart($uname,$db_handle);
				$pword = quote_smart($pword,$db_handle);
				$sql = "SELECT * FROM faculty WHERE BINARY FacID = BINARY $uname AND BINARY password = BINARY $pword";
				$result = mysql_query($sql);
				$name = mysql_fetch_assoc($result);
				$num_rows = mysql_num_rows($result);
				$success = array();
				if($result){
					if ($num_rows > 0) {
						session_start();
						$_SESSION["login"] = "$uname";
						$_SESSION["name"] = $name['name'];
						$success = array('result' => true , 'uname' => $_SESSION["name"]);
						echo json_encode($success);
					}
					else{
						$errorMessage = "Wrong Username or Password!";
						session_start();
						$_SESSION["login"] = "";
						$success =  array('result' => false);
						echo json_encode($success);
					}
				}
				else{
						$errorMessage = "Error Logging on";
				}
				mysql_close($db_handle);
			}
			else{
				$errorMessage = "Error Logging on";
			}
		}
?>