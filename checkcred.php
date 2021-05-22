<?php

require_once 'connect.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->user;
$password = $data->pass;


$stmt = $conn->prepare("SELECT * FROM ishu_users where Username=? and Password=?");

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();



// $sql="SELECT * from ishu_users where Username=\"".$username."\" and Password=\"".$password."\"";

// $result=$conn->query($sql);

if ($result->num_rows > 0) {
    echo "true";

}
else{
    echo "false";


}

?>