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
// $id=105;

$sql="select ishu_chat_".$username.".*, ishu_users.UserID from ishu_users INNER JOIN ishu_chat_".$username." ON ishu_users.Username=ishu_chat_".$username.".chatwith where ishu_users.UserID=".$id."";

$result=$conn->query($sql);

// print_r($result);
$tosend1=array();
// $sent="sent";
// $msg="msg";

if($result->num_rows > 0){

    // $i=0;

    while($row = $result->fetch_assoc()) {
        // //  $str={

        // //     // $myObj->name = "John";
        // //      $sent:$row['isto'],
        // //      $msg:$row['text']
        // //  }

         $str1->sent=$row['isto'];
         $str1->msg=$row['text'];
         $str=json_encode($str1);

        // print_r($str);



        // $tosend1[i]=$str;

        // $value=$i;
        // $tosend1[$i]=$row['text'];
        // array_push($tosend1,$row['text'] );
        // array_push($tosend1, );

        array_push($tosend1,$str);
        // print_r($tosend1);

        // $i=$i+1;
         
    }

}

$res="res";

// $tosend={
//     $res:$tosend1
// }
// print_r($tosend1);
$tosend->res=$tosend1;

echo json_encode($tosend);

// json_encode($str)

// echo "1";



?>