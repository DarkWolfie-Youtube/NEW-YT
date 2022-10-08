<?php


?>




<html>
<head>
<title>WolfTube</title>
<meta name="description" content="WolfTube">
<meta name="keywords" content="WolfTube, YouTube, Video">
<meta name="author" content="DarkWolfie">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="topbar">
        <div class="topbar-left">
            <a href="index.php"><img src="images/logo.png" alt="WolfTube" width="124" height="32"></a>
        </div>
       
        <div class="topbar-center">
            <form action="search.php" method="GET">
                <input type="text" name="query" width="510" height="30"> 
                <input type="submit" value="Search">   
            </form>
        </div>
        <div class="topbar-right">
            <a href="upload.php"><button type="button" class="btn btn-primary btn-sm">Upload</button></a>
            <a href="login.php"><button type="button" class="btn btn-primary btn-sm">Sign In</button></a>
            
    </div>
    
</div>
</body>
</html>
