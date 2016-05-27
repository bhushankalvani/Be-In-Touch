<?php
    $dirName = $_GET["dirName"];
    $function = $_GET["function"];
    $path = $_GET["path"];
    $result;
	//echo "<script>alert(".$dirName.");</script>"l

	switch ($function) {
		//Add a directory 
		case "mkDir":
		    if(!file_exists($path."/".$dirName)){
		    	mkdir($path."/".$dirName,0777,true);
		        echo "true";
		    }
		    else{
		    	echo "false";
		    }
		break;
		// Remove a directory
		case "rmDir":
			foreach(glob($path."/".$dirName."/*" as $file)){
				if(is_dir($file)) rmdir($file);
				else unlink($file);
			} rmdir($path."/".$dirName);
			echo "true";
		break;
		//Upload a file
		case "UpFile":
			$target_file = $path . basename($_FILES['fileUpload']['name']);
			if(file_exists($path."/".$target_file)){ 
				echo "false";
				$uploadOk = 0;
			}else{
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION)
				if(isset($_GET["submit"])){
					$check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
					if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}
				if($uploadOk == 0){
					echo "false";
				} else{ 
					if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$target_file)){
						echo "true"; }
					else{ echo "false"; }
				}
			}
		break;
		case "rmFile":
			if(file_exists($path."/".$dirName)){
				if(is_file($path."/".$dirName)){
					unlink($path."/".$dirName);
					echo "true";
				}
			} else{ echo "false"; }
		break;
		default:
			
			break;
	}
	
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "false";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "false";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>