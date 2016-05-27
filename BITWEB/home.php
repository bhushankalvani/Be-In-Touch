<?php
  session_start();
  header('Cache-Control: no-cache, must-revalidate');
  if(!isset($_SESSION["login"])){
    header("Location: index.php");
  }  
?>
<script>
  function Accesschecker() {
    window.location.assign("home.php?p=Server")
  }
</script>
<?php
   if(!isset($_GET["p"]))
        {
            echo "<script>Accesschecker();</script>";
            //echo "BeInTouch";
        }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
  <link rel="shortcut icon" href="images/bitouch.png" type="image/png">
	<meta name="veiwport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/background.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">


	<style type="text/css">
  [class*="col-md-12"]{
      height:50px;
      padding-top:1%;
  }
  [class*="col-md-8"]{
      height:50px;
      padding-top:1%;
      background:rgba(206,212,214,0.8);
      border-radius:7px;
      border-bottom:1px solid black;
      border-right:none;
      border-top:none;
      border-left:none;
      margin-top: 2px;
      margin-bottom:2px;
      
  }
  #contentDiv{
    max-height: auto;
    height: 509px;
    overflow-y: scroll;
    border-right:1px solid black;
    border-bottom-left-radius:10px;
  }
  .search-col{
    border-radius: 50px;
     }
  .searchDiv{
    border-bottom:1px solid black;
    border-top-left-radius:10px;
    border-top-right-radius:10px; 
  }
  #search_bar{
      border-radius:7px; 
      width: 70%;
      vertical-align: middle;
  }
  .icon-class{
    height:70%;
    width: auto;
  }
  .video-div{
    height: 230px;
    max-height: 230px;
  }
  .ret-div{
    background-color:transparent;
  }
  
	</style>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/jquery.min.js"></script>
  <script >
      $('#home-form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          e.preventDefault();
          return false;
        }
        });
  </script>		

</head>

<body>
<form name="home_form" id="home-form">
<!-- Navbar fixed top -->
<div class="navbar navbar-default navbar-fixed-top" >
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
<div class="col-md-10 searchdiv">
    <div class="navbar-form"> 
        <div class="col-md-12 search-col">Search&nbsp;:&nbsp;
          <input type="text" class="form-control" placeholder="Search" name="search" id="search_bar" onkeyup="SearchText();"/>

        </div>
    </div>
</div>

<!--Main Content Panel-->
	<div class="col-md-10" id="contentDiv">
  <script>    var searchTxt = "123";
              function SearchText(){
                var val =document.getElementById("search_bar").value; 
                if(val!= ""){
                  searchTxt = document.getElementById("search_bar").value;
                  console.log(searchTxt);
                }    
              }
              
</script>

  <?php 
    error_reporting(E_ERROR | E_PARSE);

     $ara=explode("/",$_GET["p"]);
     $ara=preg_grep('/^\s*\z/', $ara, PREG_GREP_INVERT);
     $rcounter=0;
     ?>
        
    <?php
     if($ara[count($ara)-1]!== "Server")
     {
         $newpath;
         
         $last;
          foreach ($ara as $key => $r) 
            { 
                if($rcounter===(count($ara)-1))
                {
                      break;   
                }
                else{
                    $rcounter++;
                    $last=$r;
                }
            
             
                $newpath=$newpath.$r."/";
                
                
            } 
          
        
        
        
        echo "<br><div class='col-md-6 ret-div'><a class='btn btn-default' href='home.php?p=".$newpath."&name=".$last."'><img src='images/return.png' style='height:4%; width:auto;'/>Return</a></div><br>";
         }
        ?>
    
     <?php
        $directory="Server/";
            if(isset($_GET["p"]))
            {
                $directory=$_GET["p"]."/";
                
            }
                
            //$files = array();
          // echo $searchText;

    foreach (scandir($directory) as $file) {
        $ffile=$file;
        $file= strtoupper($file);
    
       
        $ful=explode(".",$file);
        $count_num=count($ful);
        $ful[1]=$ful[$count_num-1];

    if('.' === $file) 
    { continue; }

    elseif('..' === $file) 
    { continue; }

    elseif($ful[1]==="JPG"||$ful[1]==="JPEG")
     {      
         $file=  strtoupper($file);
         echo "<br><div class=' col-md-10'><a href='".$directory.$ffile."'><img class='col-md-4' src='".$directory.$ffile."' ></a></div>";
         $ful[1]=0;
         $ful[0]=0;
            
     }
     elseif($ful[1]==="PNG"||$ful[1]==="png")
     {     
         $file=  strtoupper($file);
         echo "<br><div class=' col-md-10'><a href='".$directory.$ffile."'><img class='col-md-4' src='".$directory.$ffile."' ></a></div>";
         $ful[1]=0;
         $ful[0]=0;
            
     }
     elseif($ful[1]==="PDF"||$ful[1]==="PDF")
     {     
         $file=  strtoupper($file);
         echo "<br><div class=' col-md-8'><img class='icon-class' src='images/pdf-icon.png'/>&nbsp;<a href='".$directory.$ffile."'>".$file."</a></div>";
         $ful[1]=0;
         $ful[0]=0;
            
     }
      elseif($ful[1]==="mp3"||$ful[1]==="MP3")
     {      
         $file=  strtoupper($file);
         echo '<br><div class="col-md-8"><img class="icon-class" src="images/mp3-icon.png"/>&nbsp;'.$file.'&nbsp;&nbsp; <audio controls style="float:right">
         <source src="'.$directory.$ffile.'" type="audio/mpeg">
         Your browser does not support the audio element.
         </audio></div>';
         $ful[1]=0;
         $ful[0]=0;
            
     }
       elseif($ful[1]==="mp4"||$ful[1]==="MP4")
     {      
         $file=  strtoupper($file);
         echo '<br><div class="col-md-8 video-div">'.$file.'<br><video controls style="float:left" height="200" width="330">
         <source src="'.$directory.$ffile.'" type="video/mp4">
         Your browser does not support the video element.
         </video>
         </div>';
         $ful[1]=0;
         $ful[0]=0;
            
     }
      elseif($ful[1]==="zip"||$ful[1]==="ZIP")
     {      
         $file=  strtoupper($file);
        echo "<br><div class=' col-md-8'><img class='icon-class' src='images/zip-icon.png'/>&nbsp;<a  href='".$directory.$ffile."' >".$ffile."</a></div>";
            
     }
            
      elseif(true === is_dir($directory.$file))
     {      
         $file=  strtoupper($file);
        echo "<br><div class=' col-md-8' id='folder'><img class='icon-class' src='images/folder-icon.png'/>&nbsp;<a  href='home.php?p=".$directory.$ffile."' id='folder-link'  style='background-color: transparent;'>".$file."</a></div>";
       
            
     }
     elseif ( true === is_file($directory.$file)) {
         
         echo "<br><div class=' col-md-8'><img class='icon-class' src='images/file-icon.png'/>&nbsp;<a  href='".$directory.$ffile."' >".$file."</a></div>";
         continue;
     }
     
     else{
         
        $file=  strtoupper($file);
        echo "<br><div class=' col-md-8'><img class='icon-class' src='images/file-icon.png'/>&nbsp;<a  href='".$directory.$ffile."' >".$file."</a></div>";
        }
     }   
    ?>
            
        
  
  </div>

<!--Sidebar Navigation Panel-->
	<div class="col-md-2 navbar navbar-fixed-right" >
  <ul class="nav nav-pills nav-stacked" style="text-align:left; border-radius:10px;">
    <li><a href="home.php"><img src="images/home-icon.png" class="rightPanel-icon"/>&nbsp;Home</a></li>
      <li><ul class="nav nav-pills nav-stacked">
          <li><a data-toggle="modal" data-target="#CreateModal" href="#"><img src="images/folder-add.png" class="rightPanel-icon"/>&nbsp;Create Folder</a></li>
          <li><a data-toggle="modal" data-target="#RemoveModal" href="#"><img src="images/folder-delete.png" class="rightPanel-icon"/>&nbsp;Delete Folder</a></li>
          <li><a data-toggle="modal" data-target="#uploadFModal" href="#"><img src="images/file-add.png" class="rightPanel-icon"/>&nbsp;Upload File</a></li>
          <li><a data-toggle="modal" data-target="#deleteFModal" href="#"><img src="images/file-delete.png" class="rightPanel-icon"/>&nbsp;Delete File</a></li>
        </ul></li>
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

<!--Modals for creating and deleting File and Folders-->

<!--Creating a Directory-->
<div class="modal modal" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <form id="createDirForm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Directory</h4>
      </div>
      <div class="modal-body">
         <div class="row"> <div class="col-md-12">
         <label class="label label-primary" style="font-size:90%; word-wrap: normal;">Path:
          <?php 
                //$directory="Server/";
                if(isset($_GET["p"]))
                {
                    $directory=$_GET["p"]."/";
                    
                }
                echo $directory;?>
          </label></div>
          </div>

          <div class="row" style="background-color: rgba(135,137,139,0.7); border-radius: 50px;"><div class="col-md-12"><div class="col-md-4" style="text-align: center;padding: 1%; background-color: transparent;">
          New Directory:</div><input type="text" class=" form-control" placeholder="Directory Name" id="dir-name" style="width:65%;" required="true"/></div>
          </div>
          
          <div class="row"><div class="col-md-12" style="padding:1%;"><label class="label label-info" style="font-size:90%; word-wrap: normal;">Note: The directory will be created at the path shown here, which is open in the Home Page.</label></div>
          </div>
          
      </div>
      <div class="modal-footer">
        
        <button id="cDirBtn" type="button" class="btn btn-primary">Create</button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  var path = "<?php echo $_GET['p']?>" ;
  //alert(path);
    $("#cDirBtn").click(function(){
      var dirName = document.getElementById("dir-name").value;
        alert(dirName);
        $.ajax({ url:"dir-functions.php?dirName="+dirName+"&function=mkDir&path="+path, success: function(result){
          //alert(result);
          if(result == "true"){
            alert('Directory Successfully Created.');
            //window.location("home.php");
          }
          else{
            alert('Failed to create directory or Directory name already exists.');
          }
        }
        });
    })
</script>

<!--Removing a Directory-->
<div class="modal modal" id="RemoveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Remove Directory</h4>
      </div>
      <div class="modal-body">
         <div class="row"> <div class="col-md-12"><label class="label label-primary" style="font-size:90%; word-wrap: normal;">Path:
          <?php 
                $directory="Server/";
                if(isset($_GET["p"]))
                {
                    $directory=$_GET["p"]."/";
                    
                }
                echo $directory;?>
          </label></div>
          </div>

          <div class="row" style="background-color: rgba(135,137,139,0.7); border-radius: 50px;"><div class="col-md-12"><div class="col-md-4" style="text-align: center;padding: 1%; background-color: transparent;">Directory:</div><input type="text" class=" form-control" placeholder="Directory Name" id="rmdir-name" style="width:65%;"/></div>
          </div>
          
          <div class="row"><div class="col-md-12" style="padding:1%;"><label class="label label-info" style="font-size:90%; word-wrap: normal;">Note: The directory will be removed at the path shown here, which is open in the Home Page.</label></div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button id="rmDirBtn" type="button" class="btn btn-primary">Remove</button>
      </div>
    </div>
  </div>
</div>
<script>
  var path = "<?php echo $_GET['p']?>" ;
  //alert(path);
    $("#rmDirBtn").click(function(){
      var dirName = document.getElementById("rmdir-name").value;
        alert(dirName);
        $.ajax({ url:"dir-functions.php?dirName="+dirName+"&function=rmDir&path="+path, success: function(result){
          //alert(result);
          if(result == "true"){
            alert('Directory Successfully Removed.');
            //window.location("home.php");
          }
          else{
            alert('Failed to remove directory or Directory does not exist.');
          }
        }
        });
    })  
</script>

<!--Adding a File-->
<div class="modal modal" id="uploadFModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload File</h4>
      </div>
      <div class="modal-body">
         <div class="row"> <div class="col-md-12"><label class="label label-primary" style="font-size:90%; word-wrap: normal;">Path:
          <?php 
                $directory="Server/";
                if(isset($_GET["p"]))
                {
                    $directory=$_GET["p"]."/";
                    
                }
                echo $directory;?>
          </label></div>
          </div>
          <form method="GET">
          <div class="row" style="background-color: rgba(135,137,139,0.7); border-radius: 50px;"><div class="col-md-12"><div class="col-md-4" style="text-align: center;padding: 1%; background-color: transparent;">File:</div><input type="file" class=" form-control" placeholder="File Name" id="addfile-name" style="width:65%;"/></div>
          </div>
          
          <div class="row" ><div class="col-md-12" style="padding:1%;"><label class="label label-info" style="font-size:90%; word-wrap: normal;">Note: The file will be added at the path shown here, which is open in the Home Page.</label></div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button id="addFileBtn" type="button" class="btn btn-primary">Upload</button>
          
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  var path = "<?php echo $_GET['p']?>" ;
  //alert(path);
    $("#addFileBtn").click(function(){
      var dirName = document.getElementById("addfile-name").value;
        alert(dirName);
        $.ajax({ url:"dir-functions.php?dirName="+dirName+"&function=UpFile&path="+path, success: function(result){
          //alert(result);
          if(result == "true"){
            alert('File successfully uploaded.');
            //window.location("home.php");
          }
          else{
            alert('Failed to upload file or File already exists.');
          }
        }
        });
    })  
</script>

<!--Deleting a File-->
<div class="modal modal" id="deleteFModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete File</h4>
      </div>
      <div class="modal-body">
         <div class="row"> <div class="col-md-12"><label class="label label-primary" style="font-size:90%; word-wrap: normal;">Path:
          <?php 
                $directory="Server/";
                if(isset($_GET["p"]))
                {
                    $directory=$_GET["p"]."/";
                    
                }
                echo $directory;?>
          </label></div>
          </div>

          <div class="row" style="background-color: rgba(135,137,139,0.7); border-radius: 50px;"><div class="col-md-12"><div class="col-md-4" style="text-align: center;padding: 1%; background-color: transparent;">File:</div><input type="text" class=" form-control" placeholder="File Name" id="rmfile-name" style="width:65%;"/></div>
          </div>
          
          <div class="row" ><div class="col-md-12" style="padding:1%;"><label class="label label-info" style="font-size:90%; word-wrap: normal;">Note: The file will be removed at the path shown here, which is open in the Home Page.</label></div>
          </div>
          
      </div>
      <div class="modal-footer">
        <button id="rmFileBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
  var path = "<?php echo $_GET['p']?>" ;
  //alert(path);
    $("#rmFileBtn").click(function(){
      var dirName = document.getElementById("rmfile-name").value;
        alert(dirName);
        $.ajax({ url:"dir-functions.php?dirName="+dirName+"&function=rmFile&path="+path, success: function(result){
          //alert(result);
          if(result == "true"){
            alert('File successfully removed.');
            //window.location("home.php");
          }
          else{
            alert('Failed to remove file or File doesn\'t exist.');
          }
        }
        });
    })
</script>

<!--*************************************************-->







    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>

</form>
</body>
</html>

