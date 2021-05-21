<?php

require_once 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=$_POST['username'];
    $pass=$_POST['password'];

    $sql="INSERT INTO ishu_users(Username,Password, profile) VALUES(\"".$username."\",\"".$pass."\", \"no\")";

    $result=$conn->query($sql);

    $sql1="CREATE TABLE ishu_chat_".$username."(  id int PRIMARY KEY AUTO_INCREMENT, text varchar(10000), isto int, chatwith varchar(100))";

    $result1=$conn->query($sql1);


    // echo $sql1;

    
    $cookie_name1 = "username";
    $cookie_value1 = $username;
    setcookie($cookie_name1, $cookie_value1);

    $cookie_name2 = "password";
    $cookie_value2 = $pass;
    setcookie($cookie_name2, $cookie_value2);

    $cookie_name3 = "remember";
    $cookie_value3 = "0";
    setcookie($cookie_name3, $cookie_value3);




    echo "<script>location.href='profile.php'</script>";  


}



?>


