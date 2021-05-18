<?php

require_once 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=$_POST['username'];
    $pass=$_POST['password'];

    $sql="INSERT INTO users(Username,Password) VALUES(\"".$username."\",\"".$pass."\")";

    $result=$conn->query($sql);

    // echo $sql;

    
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


