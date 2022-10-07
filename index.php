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
</head>
<body>
    <div class="topbar">
        <div class="topbar-left">
            <a href="index.php"><img src="images/logo.png" alt="WolfTube" width="124" height="32"></a>
        </div>
       
        <div class="topbar-center">
            <form action="search.php" method="GET">
                <input type="text" name="query">
                <input type="submit" value="Search" width=>
            </form>
        </div>
        <div class="topbar-right">
            <a href="upload.php">Upload</a>
            <a href="login.php">Login</a>
    </div>
</body>
</html>
