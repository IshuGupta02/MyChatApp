<?php
$servername = "localhost";
$username = "myChat";
$password = "myChatPass1@";
// $password="ishu02@A";
$db="myChat";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die;
}


?>