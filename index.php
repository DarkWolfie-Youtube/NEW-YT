<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	require('topbar.php');
} else {
    require('topbar-loggedin.php');
}
session_abort();


?>





<div class="video-recommended-container">
    <div class="row">
        <div class="col">
<?php

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	
}

$servername = "localhost";
$username = "youtubea";
$password = "password";
$dbname = "wolftube";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, channel_id, video_uri, video_thumbnail_URL, video_name FROM videos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //make a youtube style video card
        echo "<div class='card' style='display: inline-block;max-width: 400px; background-color: black;'><a href='watch?v=".$row['id']."' class=''>
        <div class='card-search'>
        <img src='https://images.darksmp.com/".$row['id']."/thumb.png' class='card-img-top' alt='wooo' width='320' height='240'>
        <div class='card-body'>
        <h5 class='card-search-title' style='font-size: 24px;'>".$row['video_name']."</h5>
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
        echo "<div class='channel-name'><a href='/channel?id=".$row['id']."'>".$row['channel_name']."</a></div>";
        if($row['verified'] == 1){
            echo '<div class="verified-tag"><i class="bi bi-check-circle-fill"></i></div>';
        }
        echo "</div></div></div></a></div>";
       
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
</div>
</div>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.17.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.17.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyD8p2wy9ftIXyYE_vj2xYKdkqQBc3K8e_I",
    authDomain: "wolftube-6e83a.firebaseapp.com",
    projectId: "wolftube-6e83a",
    storageBucket: "wolftube-6e83a.appspot.com",
    messagingSenderId: "352393340794",
    appId: "1:352393340794:web:054ad922ff6fee004a98c3",
    measurementId: "G-YXEMK6MPD7"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
</body>
</html>
