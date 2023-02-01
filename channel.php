<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	require('topbar.php');
} else {
    require('topbar-loggedin.php');
}
session_abort();?>
<!-- build the channel view page -->
<?php
// get the channel id

if (isset($_GET['id'])) {
    $channel_id = $_GET['id'];
} else {
    die("Channel not found");
}

// get the channel details
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

$sql = "SELECT id, channel_name, join_date, verified, channel_pfp, subscribers, views FROM channels WHERE id = '$channel_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //make a youtube style channel row
        echo "<div class='container'>
        <div class='channel-row'>
        <div class='channel-row-left'>
            <img src='".$row['channel_pfp']."' alt='channel pfp' width='100' height='100'>
           
        </div>
        <div class='channel-row-center'>
        <h1>".$row['channel_name']."</h1>
            
        ";
        if ($row['verified'] == 1) {
            echo '<i class="bi bi-check-circle-fill bs-gray verified-tag"></i>';
        }

       echo "<br><p class='channel-sub-count'>" .$row['subscribers']." Subscribers</p>
        </div>
        <div class='channel-row-right'>
            <button type='button' class='btn btn-primary btn-sm'>Subscribe</button>
        </div>
    </div>
    </div>";
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);

    }
    $sql2 = "SELECT id, channel_id, video_name, views, date_uploaded FROM videos WHERE channel_id = '$channel_id'";
    $result2 = $conn2->query($sql2);
    if ($result2->num_rows > 0) {
        // output data of each row
        while($row = $result2->fetch_assoc()) {
            echo "<a href='../../watch?v=".$row['id']."'><div class='card-search' style='width: 18rem;'>
            <img src='https://images.darksmp.com/".$row['id']."/thumb.png' class='card-img-top' alt='video thumbnail'>
            <br>
            <div class='card-body'>
              <h5 class='card-title'>".$row['video_name']."</h5>
              </div>
              <div class='card-alt-title'>
                <p class='card-text'>".$row['views']."</p>
              
              </div></div></a>";
           
        }
    } else {
        echo "0 results";
    }
} 



}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>
</html>