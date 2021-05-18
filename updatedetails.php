<?php

        require_once 'connect.php';
        echo "entered";

        $conn = new mysqli($servername, $username, $password, $db);

        

        //Check connection
        if ($conn->connect_error) {
        die;
        }

        $new_name=$_POST['name'];
        $new_username=$_POST['username'];
        $new_gender=$_POST['gender'];
        $new_mail=$_POST['mail'];
        $new_phone=$_POST['phone'];
        $new_about=$_POST['about'];

        $username_name="username";
        $password_name="password";
        $remember_name="remember";

        $username=$_COOKIE[$username_name];
        $pass=$_COOKIE[$password_name];
        $rem=$_COOKIE[$remember_name];

        $sql="update users SET Name=\"".$new_name."\", Username=\"".$new_username."\"".", Gender=\"".$new_gender."\", Email=\"".$new_mail."\", Phone=\"".$new_phone."\", About=\"".$new_about."\" WHERE Username=\"".$username."\" and Password=\"".$pass."\"";

        // echo $sql;

        $result=$conn->query($sql);

        $cookie_name1 = "username";
        $cookie_value1 = $new_username;
        setcookie($cookie_name1, $cookie_value1);

        $cookie_name3 = "remember";
        $cookie_value3 = "0";
        setcookie($cookie_name3, $cookie_value3);


        // echo $sql;

        // print_r($result);

        echo "<script>location.href='profile.php'</script>";
        // echo "updated";


?>