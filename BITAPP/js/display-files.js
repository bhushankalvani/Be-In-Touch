var flag=0;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                var FileArray = new Array();
            FileArray= JSON.parse(xmlhttp.responseText);
            
            FileArray.forEach(displayFn);
            
        function displayFn(){
            document.getElementById("content").innerhtml = "Path: "+FileArray["path"]+"<br>FileName: "+FileArray["fileName"];
        }
            }
        }
            xmlhttp.open("GET","http://localhost:8082/BITWEB/app-listFiles.php",true);
            xmlhttp.send();        
