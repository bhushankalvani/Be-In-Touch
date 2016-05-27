<?php
	//Data that is received from the application using POST Method
	$enroll = $_POST['enrollment'];
	$dirName = $_POST['filename'];
	$path = $_POST['path'];


	//Database Connectivity and manipulation
		//username and password for connecting to database.
			$server = "localhost";
			$user = "root";
			$pass = "";
			$database = "bitouch";
		 //Creating Connection
			$db_handle = mysql_connect($server,$user,$pass);
			$db_found = mysql_select_db($database,$db_handle);
			
			if($db_found){
				//$uname = quote_smart($uname,$db_handle);
				//$pword = quote_smart($pword,$db_handle);
				$sql = "INSERT INTO subscription (enrollmentNo,directory,dir_path) VALUES (".$enroll.",".$dirName.",".$path.")";

				if(mysql_query($sql)){
					
				}

				mysql_close($db_handle);				
			}
			else{
				$errorMessage = "Error Logging on";
			}
		}
?>