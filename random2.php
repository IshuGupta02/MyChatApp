<?php

$username="ishu";
$id=1;


$sql="select ishu_chat_".$username.".*, ishu_users.UserID from ishu_users INNER JOIN ishu_chat_".$username." ON ishu_users.Username=ishu_chat_".$username.".chatwith where ishu_users.UserID=".$id;

echo $sql;
 
 
 ?>