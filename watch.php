<?php 
$hostname = "localhost";
$username = "youtube";
$password = "password";
$dbname = "wolftube";

$video_id = $_GET['v'];

    
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                
                $conn2 = new mysqli($hostname, $username, $password, $dbname);
                if ($conn2->connect_error) {
                    die("Connection failed: " . $conn2->connect_error);
                }
                $sql2 = "UPDATE `videos`  SET `views` = `views` + 1 WHERE id = '".$row['id']."'";
                $result2 = $conn2->query($sql2);
                $conn2->close();

        }
    } else {
      http_response_code(404);
        die("<h1>Video not found</h1>");
    }
    




?>






<!DOCTYPE html>
<html>
<head>
<title>WolfTube</title>
<meta name="description" content="WolfTube">
<meta name="keywords" content="WolfTube, YouTube, Video">
<meta name="author" content="DarkWolfie">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="css/video.js.css" rel="stylesheet" />
</head>
<body>
  
    <?php session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	require('topbar.php');
} else {
    require('topbar-loggedin.php');
}
session_abort();

print_r($_GET);?>
   
  <div class="video-container-padding">
    <video id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="852"
    height="480"
    style=""
    poster="<?php  
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                print($row['video_thumbnail_URL']);
                
            

        }
    } else {
        die("<h1>Video not found</h1>");
    }
    $conn->close();
     ?>"
    data-setup="{}"
   ><<source src="<?php  
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                
                print($row['video_uri']);
            

        }
    } else {
        die("<h1>Video not found</h1>");
    }
    $conn->close();
     ?>" type="video/mp4" /></video><script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    </div>
    <div class="video-info">
        <h1><?php
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                
                print($row['video_name']);
            

        }
    } else {
        die("<h1>Video not found</h1>");
    } 
    $conn->close();
     ?></h1>
     <div class="views-date">
        <h2>
           <?php 
        $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                
               $views = number_format($row['views'], 0, '.', ',');
               print($views);
            

        }
    } else {
        die("<h1>Views not avaiable</h1>");
    }
    $conn->close();
      ?> views  <i class="bi bi-dot"></i>   <?php 
      $conn = new mysqli($hostname, $username, $password, $dbname); 
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM videos WHERE id = '$video_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
                
              
          $date = date_create($row['date_uploaded']);
          print(date_format($date, 'm/d/Y'));
            

        }
      }
        ?>
      </h2>
    </div>
   </div>
    

      <script src="node_modules\videojs-replay\dist\videojs-replay.js"></script>
      <script src="node_modules\videojs-chromecast\dist\videojs-chromecast.js"></script>
<script>
  var player = videojs('my-video');
 
  player.replayButton();
  player.chromecast();
</script> 
        
       

</div>
</body>
</html>