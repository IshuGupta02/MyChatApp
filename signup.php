<?php
echo "<p>Hello World</p>";
// ini_set('display_errors', 1);

print_r($_POST);

$data=JSON.parse($_POST);

$name=$data['name'];
$email=$data['user'];
$password=$data['password'];

$con = mysqli_connect('localhost','myChat','myChatPass1@','myChat');

mysqli_select_db($con,"myChat");


?>


