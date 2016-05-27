<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(!isset($_GET["p"]))
        {
            echo "<script>Accesschecker();</script>";
            //echo "BeInTouch";
        }
    
    $ara=explode("/",$_GET["p"]);
    $ara=preg_grep('/^\s*\z/', $ara, PREG_GREP_INVERT);
    $rcounter=0;

	
    //$directory = "Server";
    if(isset($_GET["p"])){
        $directory=$_GET["p"]."/";
    }

	$fileArray = array();  

	foreach (scandir($directory) as $file) {
		$ffile = $file;
		$file = strtoupper($file);

		$ful = explode(".",$file);
		$count_num=count($ful);
        $ful[1]=$ful[$count_num-1];
        
        if('.' === $file) 
        	{ continue; }

        elseif('..' === $file) 
        	{ continue; }
        
        elseif(true === is_dir($directory.$file)){
            $fileArray[] = ['path' => $directory.$ffile , 
                'filename' => $file ,
                'is_dir' => "true"];
        }
        else{
            
            $fileArray[] = ['path' => $directory.$ffile , 
                'filename' => $file ,
                'is_dir' => "false"];
        }       
    }
 usort($fileArray,function($a,$b) {return strnatcasecmp($a['filename'],$b['filename']);});
 echo json_encode($fileArray);
?>