<?php

require_once 'connect.php';
$username = $_REQUEST["q"];

$sql="SELECT * from users where Username=\"".$username."\"";

$result=$conn->query($sql);

if ($result->num_rows > 0) {
    echo "true";

}
else{
    echo "false";


}



?>