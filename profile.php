<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php

        require_once 'connect.php';

        $conn = new mysqli($servername, $username, $password, $db);

        //Check connection
        if ($conn->connect_error) {
        die;
        }

        $username_name="username";
        $password_name="password";
        $remember_name="remember";

        $username=$_COOKIE[$username_name];
        $pass=$_COOKIE[$password_name];
        $rem=$_COOKIE[$remember_name];

        $sql="SELECT * from users where Username=\"".$username."\""." AND ". "Password=\"".$pass."\"";
        
        $result=$conn->query($sql);




        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            $name=$row["Name"];
            $user=$row["Username"];
            $gender=$row["Gender"];
            $mail=$row["Email"];
            $phone=$row["Phone"];
            $about=$row["About"];

            // echo $name.$user.$gender.$mail.$phone.$about;

            }
        } else {
            echo "0 results";
        }


        ?>

    <form action="updatedetails.php" method="post">
        <label for="name">NAME: </label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>">
        
        <label for="username">USERNAME: </label>
        <input type="text" id="username" name="username" value="<?php echo $user;?>">
        
        <label for="gender">GENDER: </label>
        <input type="text" id="gender" name="gender" value="<?php echo $gender;?>">
        
        <label for="mail">EMAIL: </label>
        <input type="email" name="mail" id="mail" value="<?php echo $mail;?>">
        
        <label for="phone">PHONE NUMBER: </label>
        <input type="text" id="phone" name="phone" value="<?php echo $phone;?>">
        
        <label for="about">ABOUT ME: </label>
        <input type="text" id="about" name="about" value="<?php echo $about;?>">     

        <button type="submit" method="post">UPDATE DETAILS</button>
    
    
    </form>

    <form action="logout.php" method="post">
        <button id="logout">LOGOUT</button>
    
    </form>

    <form action="chatroom.php" method="post">
        <button id="logout">GO TO CHATROOM</button>
    
    </form>
    
</body>



</html>