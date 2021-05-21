<?php

require_once 'connect.php';
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die;
}


$data = json_decode($_GET['obj']);

$username = $data->user;
$id = $data -> with;

$sql="select ishu_chat_".$username.".*, ishu_users.UserID from ishu_users INNER JOIN ishu_chat_".$username." ON ishu_users.Username=ishu_chat_".$username.".chatwith where ishu_users.UserID=".$id."";

$result=$conn->query($sql);

$tosend1=array();
// $sent="sent";
// $msg="msg";

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()) {
        //  $str={

        //     // $myObj->name = "John";
        //      $sent:$row['isto'],
        //      $msg:$row['text']
        //  }

         $str->sent=$row['isto'];
         $str->msg=$row['text'];

         array_push($tosend1,$str);
         
    }

}

$res="res";

// $tosend={
//     $res:$tosend1
// }

$tosend->res=$tosend1;

echo json_encode($tosend);

// json_encode($str)

// echo "1";



?>