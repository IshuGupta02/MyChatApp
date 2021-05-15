<?php

$servername = "localhost";
$username = "myChat";
$password = "myChatPass1@";
// $password="ishu02@A";
$db="myChat";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully\n";


$sql="SELECT Name FROM users";

echo $sql."\n";
$result = $conn->query($sql);

// echo $result;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Name: " . $row["Name"]."\n";
    }
} else {
    echo "0 results\n";
}

$name="hello";

$sql="INSERT INTO users(Name) values("."\"".$name."\"".")";
print_r($sql);
$result = $conn->query($sql);
print_r($result);


  

?>