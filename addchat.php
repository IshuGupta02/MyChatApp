<?php
require_once 'connect.php';
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die;
}

$data = json_decode(file_get_contents("php://input"));

$from=$data->from;
$to=$data->to;
$msg=$data->msg;

$fromusername=$from;

$sql="SELECT * from ishu_users where UserID=".$to."";

$result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tousername=$row['Username'];  
        
    }
    
      

}
else{
    
}


$sql1="INSERT INTO ishu_chat_".$fromusername."(text, isto, chatwith) values(\"".$msg."\", 1, \"".$tousername."\")";

$result1=$conn->query($sql1);


$sql2="INSERT INTO ishu_chat_".$tousername."(text, isto, chatwith) values(\"".$msg."\", 0, \"".$fromusername."\")";

$result2=$conn->query($sql2);

echo "1";



?>