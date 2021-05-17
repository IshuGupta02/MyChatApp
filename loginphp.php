<?php

require_once 'connect.php';


// echo $name."  ".$pass." ";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=$_POST['user'];
    $pass=$_POST['pass'];
    $rem=$_POST['checkbox_rem'];
   
    $sql="SELECT * from users where Username=\"".$username."\""." AND ". "Password=\"".$pass."\"";
    // echo $sql;
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {

        $cookie_name1 = "username";
        $cookie_value1 = $username;
        setcookie($cookie_name1, $cookie_value1);

        $cookie_name2 = "password";
        $cookie_value2 = $pass;
        setcookie($cookie_name2, $cookie_value2);

        $cookie_name3 = "remember";

        if(!empty($rem)){       
            $cookie_value3 = "1";
            setcookie($cookie_name3, $cookie_value3);

        }
        else{
            $cookie_value3 = "0";
            setcookie($cookie_name3, $cookie_value3);

        }



        echo "<script>location.href='chatroom.php'</script>";

    } else {
        echo "<script>location.href='login.php'</script>";

    }

}

?>