<?php

require_once 'connect.php';
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die;
}


$data = json_decode($_GET['obj']);

$username = $data->user;
$id = $data -> with;

// $username="ishu";
// $id=110;


$sql="select `ishu_chat_".$username."`.*, ishu_users.UserID from ishu_users INNER JOIN `ishu_chat_".$username."` ON ishu_users.Username=`ishu_chat_".$username."`.chatwith where ishu_users.UserID=".$id."";

// echo $sql;

// $stmt = $conn->prepare("select ishu_chat_?.*,  ishu_users.UserID from ishu_users INNER JOIN ishu_chat_? ON ishu_users.Username=ishu_chat_?.chatwith where ishu_users.UserID=?");

// $stmt->bind_param("sssi", $username,$username,$username, $id);
// $stmt->execute();
// $result = $stmt->get_result();





$result=$conn->query($sql);


$tosend1=array();


if($result->num_rows > 0){


    while($row = $result->fetch_assoc()) {


         $str1->sent=$row['isto'];
         $str1->msg=$row['text'];
         $str=json_encode($str1);

        array_push($tosend1,$str);
      
    }

}

$res="res";

$tosend->res=$tosend1;

echo json_encode($tosend);

// json_encode($str)

// echo "1";



?>