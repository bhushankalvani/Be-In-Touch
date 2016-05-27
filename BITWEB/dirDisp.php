<html><head>


<?php 
       // include("style.php");
    // error_reporting(E_ERROR | E_PARSE);
        if(!isset($_GET["p"]))
        {
            echo "<script>Accesschecker();</script>";
            //echo "BeInTouch";
        }
        
?>

<style>
         [class*="col-md"]{
            border: 1px solid black;
            height: 100px;
            width: 300px;
            text-align: left;
            vertical-align: middle;
            margin-left: 2%;

         }

         
        img{
            max-height: 200px;
            max-width: 250px;
            height: 100%;
            width: auto;

            
        }
        a.foldername{
            display: block;
            height: 100%;
            width: 100%;
            
            text-transform: capitalize;
            font-weight: bold;
            font-family: tahoma;
            font-size: 15px;

            padding-top: 30%;
            
            
        }
        
       
    </style>
</head>
<body>
    

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>  
    </body>
    </html>