<?php
  session_start();
  header('Cache-Control: no-cache, must-revalidate');
  if(!isset($_SESSION["login"])){
  	header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>About Us</title>
	<link rel="shortcut icon" href="images/bitouch.png" type="image/png">
	
  <meta name="veiwport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/background.css">
 
	
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
	<style type="text/css">
  
	#contentDiv{
    	max-height: auto;
    	height: 540px;
      border-right: 1px solid black;
      border-radius: 10px;
  	}
    [class*="col-md-6"]{
      background-color: transparent;
    }
  .rightPanel-icon{
    height: 27px;
    width: auto;
  }
  

	</style>

</head>
<body>
<form>
<!-- Navbar fixed top -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
 	    <div class="navbar-brand">Be In Touch</div>
    </div>
  <div class="navbar-collapse collapse">
  
      <!-- Left nav -->
      <ul class="nav navbar-nav">
      </ul>
  
      <!-- Right nav -->
      <ul class="nav navbar-nav navbar-right">
      
        <li>
       <!--Log-Out Dropdown-->
          <a>Hello,&nbsp;<?php print $_SESSION["name"];?>&nbsp;<!--<span class="caret"></span>--></a>
          <!--<ul class="dropdown-menu dropdown-menu-right">
            <li><a href="logout.php">Log Out</a></li>
          </ul> -->
        </li>
        <li><a href="logout.php">Log Out </a></li>

      </ul>


        
    </div>
    <!--/.nav-collapse -->

  </div>
  <!--/.container -->
</div>
<!-- Navbar fixed top -->


<div class="container content-container">

<div class="row">


<!--Main Content Panel-->
<div class="col-md-10" id="contentDiv">
	
	<!--Left panel : BIT Logo-->
	<div class="col-md-6" style="height:540px; display:flex; align-items:center; justify-content:center;"> 
		<img src="images/BITLOGO.jpg" style="width:100%; height:auto; border-radius:10px;">
	</div> 


	<!--Right panel : Developer Info.-->
	<div class="col-md-6" style="height:500px; text-align:center; padding-top:10%;">
		<div class="col-md-12" style="border-radius: 50px;"><h2>Developers</h2> </div><br>
		
		<div class="col-md-6"><br>
			<img src="images/bhushan.jpg" style="border-radius: 100px; box-shadow: 5px 5px 10px #888888;"> <br> 
			<br> <h4>Bhushan Kalvani</h4>
		</div>

		<div class="col-md-6"> <br>
			<img src="images/kval.jpg" style="border-radius: 100px; box-shadow: 5px 5px 10px #888888;"> <br>
			<br> <h4>Keval Chudasama</h4>
		</div>

		 
	</div>
</div>

<!--Sidebar Navigation Panel-->
	<div class="col-md-2 navbar navbar-fixed-right" >
  <ul class="nav nav-pills nav-stacked" style="text-align:left; border-radius:10px;">
    <li><a href="home.php"><img src="images/home-icon.png" class="rightPanel-icon"/>&nbsp;Home</a></li>
    <li><a href="about.php"><img src="images/aboutUs-icon.png" class="rightPanel-icon"/>&nbsp;About Us</a></li>
  </ul>
  </div>

</div>
</div>

<div class="row">
    <div class="container-fluid" >
        <div class="footer text-center" >
             <p>copyright @ beintouch</p>
        </div>
    </div>
</div>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
</form>
</body>
</html>