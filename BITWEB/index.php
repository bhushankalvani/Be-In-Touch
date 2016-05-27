<!--Script for DB Connection and Checking-->
<?php
	session_start();
	session_unset();
	session_destroy();
	header('Cache-Control: no-cache, must-revalidate');
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

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$uname = $_POST['login_id'];
			$pword = $_POST['password'];

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
				if($result){
					if ($num_rows > 0) {
						session_start();
						$_SESSION["login"] = "$uname";
						$_SESSION["name"] = $name['name'];
						header ("Location: home.php");
					}
					else{
						$errorMessage = "Wrong Username or Password!";
						session_start();
						$_SESSION["login"] = "";
						//header ("Location: index.php");

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

<html>
<head>
	<meta charset="utf-8">
	<title>Be In Touch</title>
	<link rel="shortcut icon" href="images/bitouch.png" type="image/png">
	<meta name="veiwport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">

			

</head>
<body>
<form name="index_form" method="POST" action="index.php">
<!--Login page Content-->
<div class="container" style="margin-top:70px;">
	
<!-- Login form-->

	<div class="login" style="text-align:center;">
		
<center>
	<img class="main_logo" src="images/BITLOGO.jpg" class="img-responsive center-block" alt="Chania"  class="img-rounded"  width="400" height="180">

 	<div class="panel panel-default" style="width:30%;">
  					
  						<div class="panel-body" style="text-align : center;">
    					Log In Credentials<br><br>
    					<div class="form-group">
    				<!--	<label for="inputEmail">Email</label>-->
    					<input type="text" class="form-control" name="login_id" id="login_id" placeholder="ID"  maxlength="20" required="true"> 
					  	<br>
					<!--  	<label for="inputPassword">Password</label> -->
					  	<input type="password" class="form-control" name="password" id="pwd" placeholder="Password"  maxlength="16" required="true"> 
					  	</div>
					  	<div style="color:red;"><?PHP print $errorMessage;?></div> 
					  		
					  	<div class="btn-group" role="group" aria-label="...">
					  		<button onclick="#" type="submit" class="btn btn-primary">Log In</button>
			  			</div> <hr style="border-color:#D8D8D8; width:200px;"> 
		  			
		  			<a href="#" style="font-size:80%; border-right:1px solid blue;">Sign Up&nbsp;</a>
			  		<a href="#" style="font-size:80%; ">Forgotten Password?</a>
			  		</div>
			  	</div>
</center>	
	</div>

</div>


<footer>
  		<div style="text-align: center;"><p>copyright @ beintouch</p></div>
</footer>
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
</form>

</body>
</html>