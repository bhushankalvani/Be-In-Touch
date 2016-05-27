<?php
  session_start();
  header('Cache-Control: no-cache, must-revalidate');
  if(!isset($_SESSION["login"])){
    header("Location: index.php");
  }
  /*<script>
    function Accesschecker() {
    window.location.assign("home.php?p=Server/")
}</script>*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel</title>
  <link rel="shortcut icon" href="images/bitouch.png" type="image/png">
	<meta name="veiwport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style type="text/css">
	[class*="col-md"] {
    	border:1px solid black;
    	background: #eee;
    	margin-bottom: 10px;
	}

  .col-md-2{
      background-color: transparent;
      padding:8px;
  }

  #contentDiv{
    max-height: auto;
    height: 500px;

  }

  .searchdiv{
      background-color: transparent;
      
  }

  #search_bar{
      border-radius:7px;
      max-width: 400%; 
      width: 300%;
  }
  

	</style>

  <script type="text/javascript">
   // function searchDir(){


     // }

    
  </script>		

</head>
<body>
<!-- Navbar fixed top -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
 	    <div class="navbar-brand">Be In Touch</div>
    </div>

  <div class="navbar-collapse collapse">
  
      <!-- Left nav -->
      <ul class="nav navbar-nav">
      </ul>
  
      <!-- Right nav -->

      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
       <!--Log-Out Dropdown-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $_SESSION["name"];?> &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="logout.php">Log Out</a></li>

          </ul>


        </li>
        

      </ul>
    </div>
    <!--/.nav-collapse -->

  </div>
  <!--/.container -->
</div>
<!-- Navbar fixed top -->


<div class="container" style="margin-top:70px;">

<div class="row">
<div class="col-md-10 searchdiv">

    <div class="navbar-form " role="search"> <i class="fa fa-search"></i> Search &nbsp; &nbsp; &nbsp;
        <div class="input-group"> 
          <input type="text" class="form-control" placeholder="Search" name="search" id="search_bar">
                  <!--<div class="input-group-btn">
                  <button class="btn btn-default" style="background: #2C3544;" type="submit" ><img src="images/search-icon.png" style="width:5%; height:auto;"></button>
                  </div>-->
        </div>
    </div>
</div>

<!--Main Content Panel-->
	<div class="col-md-10" id="contentDiv">
  Content Div
  </div>

<!--Sidebar Navigation Panel-->
	<div class="col-md-2 navbar navbar-fixed-right" style="border-radius:10px;">
  <ul class="nav nav-pills nav-stacked" style="text-align:left;">
      
      <li><a href="home.php"><i class="fa fa-home"></i> &nbsp;Home</a></li>
      <li><a href="#">Menu 1</a></li>
      <li><a href="about.php"><i class="fa fa-users"></i> &nbsp;About Us</a></li>
  </ul>
  </div>

</div>


<footer class="row">
  		<div class="col-md-12" style="text-align:center;"><p>copyright @ beintouch</p></div>
</footer>
</div>
	
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>  

		

</body>
</html>