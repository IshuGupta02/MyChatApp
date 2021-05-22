<?php

require_once 'connect.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->user;

// $sql="SELECT * from ishu_users where Username=\"".$username."\"";

// $result=$conn->query($sql);


$stmt = $conn->prepare("SELECT * FROM ishu_users where Username=?");

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "false";

}
else{
    echo "true";


}

?>