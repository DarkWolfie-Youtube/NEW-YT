
<?php
$servername = "localhost";
$username = "youtube";
$password = "password";
$dbname = "wolftube";
print_r($_GET);
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
        echo "<br>  id: ". $row["id"]. ' - channel_id:  '. $row["channel_id"]. "  - video_uri: " . $row["video_uri"] . " - video_thumbnail_URL: " . $row["video_thumbnail_URL"] . "<br>";
       print_r($row);
       setcookie("ID", $row['channel_id'], time() + (86400 * 30), "/");
    }
} else {
    echo "0 results";
}
$row = $result->fetch_assoc();


$conn2 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

$sql2 = "SELECT id, channel_name, join_date, verified, channel_pfp FROM channels WHERE id = '".$_COOKIE['ID']."'";

$result2 = $conn2->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo "<br>  id: ". $row["id"]. " - channel_name:  ". $row["channel_name"]. " - join_date: " . $row["join_date"] . " - verified: " . $row["verified"] . " - channel_pfp: " . $row["channel_pfp"] . "<br>";
       
    }
} else {
    echo "0 results";
}












$conn->close();
$conn2->close();
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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>
    </html>





