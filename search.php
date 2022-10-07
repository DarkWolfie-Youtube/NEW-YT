
<?php
$servername = "localhost";
$username = "youtube";
$password = "password";
$dbname = "wolftube";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, channel_id, video_uri, video_thumbnail_URL FROM videos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>  id: ". $row["id"]. ' - channel_id: <div id="id_channel"> '. $row["channel_id"]. " </div> - video_uri: " . $row["video_uri"] . " - video_thumbnail_URL: " . $row["video_thumbnail_URL"] . "<br>";
       
    }
} else {
    echo "0 results";
}

$conn->close();
$conn2 = new mysqli($servername, $username, $password, channels);
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
$sql2 = "SELECT id, channel_name, join_date, verified, channel_pfp FROM channels" ;
?>
<!DOCTYPE html>
