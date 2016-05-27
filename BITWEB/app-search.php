<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$filename = $_GET['keyword'];
$directory = "Server";

function recurse($directory,$filename){
    
    $fileArray = array();
    $dirArray = array();
    $finalArray = array();

    foreach (scandir($directory) as $file) {
        $ffile = $file;
        $file = strtoupper($file);

        if($file !== '.' && $file !== '..'){
        // if('.' === $file) 
        //     { continue; }

        // elseif('..' === $file) 
        //     { continue; }
        
            if(true === is_file($directory."/".$file)){
                if(strpos(strtolower($file), strtolower($filename)) !== false){ //&& $file !== null){
                    $fileArray[] = ['path' => $directory."/".$ffile , 
                        'filename' => $file ,
                        'is_dir' => "false"];
                }
                //recurse($directory."/".$ffile,$filename);
            }
            elseif(true === is_dir($directory."/".$file)){
                if(strpos(strtolower($file), strtolower($filename)) !== false){ //&& $file !== null){
                   $dirArray[] = ['path' => $directory."/".$ffile , 
                       'filename' => $file ,
                       'is_dir' => "true"];
                }
                recurse($directory."/".$ffile,$filename);
            }
        }       
    }
 //usort($fileArray,function($a,$b) {return strnatcasecmp($a['filename'],$b['filename']);})
    $finalArray['dir'] = $dirArray;
    $finalArray['file'] = $fileArray;
 echo json_encode($fileArray);
}

//Function call
recurse($directory,$filename);
?>