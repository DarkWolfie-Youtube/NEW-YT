<?php
session_start();

if ($_GET['user']===""){
    echo "bad";
} else {
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['user'] = $_GET['user'];
    header('location: ../');
}
?>