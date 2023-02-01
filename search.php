
<?php
$servername = "localhost";
$username = "youtube";
$password = "password";
$dbname = "wolftube";

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	require('topbar.php');
} else {
    require('topbar-loggedin.php');
}
session_abort();



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, channel_id, video_uri, video_thumbnail_URL, video_name FROM videos WHERE video_name LIKE '%".$_GET['query']."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //make a youtube style video card
        echo "<a href='watch.php?v=".$row['id']."' class=''><div class='card-search' style='width: 18rem;'>
        <img src='".$row['video_thumbnail_URL']."' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-search-title'>".$row['video_name']."</h5>
          ";
       
$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

$sql2 = "SELECT id, channel_name, join_date, verified, channel_pfp FROM channels WHERE id = '".$row['channel_id']."'";

$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        
        //make a div element to contain channel PFP username and verified tag
        echo "<br><div class='channel-info'>";
        echo "<img src='".$row['channel_pfp']."' class='channel-pfp'>";
        echo "<div class='channel-name'>".$row['channel_name']."</div>";
        if($row['verified'] == 1){
            echo '<div class="verified-tag"><i class="bi bi-check-circle-fill"></i></div>';
        }
        echo "</div> </div></a>";
       
    }
} else {
    echo "0 results";
}
$conn2->close();
    }
} else {
    echo "0 results";
}
















$conn->close();

?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="WolfTube">
        <meta name="keywords" content="WolfTube, YouTube, Video">
        <meta name="author" content="DarkWolfie">
        <title>WolfTube</title>
        <link rel="stylesheet" type="text/css" href="css/search.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    </html>





