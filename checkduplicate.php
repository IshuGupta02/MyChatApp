<?php

require_once 'connect.php';

$data = json_decode(file_get_contents("php://input"));

$username = $data->user;

$sql="SELECT * from ishu_users where Username=\"".$username."\"";

$result=$conn->query($sql);

if ($result->num_rows > 0) {
    echo "false";

}
else{
    echo "true";


}

?>