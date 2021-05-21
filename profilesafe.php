<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="profilecss.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
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

        $sql="SELECT * from ishu_users where Username=\"".$username."\""." AND ". "Password=\"".$pass."\"";

        $result=$conn->query($sql);

        // $output_dir = "images/";




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
            $image=$row["images"];

            // $image="images/Screenshot from 2021-04-22 09-46-01.png";


            // echo $name.$user.$gender.$mail.$phone.$about;

            }
        } else {
            echo "PLEASE LOGIN";
        }


    ?>

    <div class="otheroptions">
        <form action="logout.php" method="post" class="redirect">
            <button id="logout" class="goto">LOGOUT</button>
        
        </form>

        <form action="chatroom.php" method="post" class="redirect">
            <button id="chatroom" class="goto">GO TO CHATROOM</button>
        
        </form>

    </div>


    <div class="profile">
        <h2>YOUR PROFILE:</h2>
    
        <form action="updatedetails.php" method="post"  class="updateform" id="updateform" onsubmit="event.preventDefault(); check();" enctype="multipart/form-data">

            <div class="entry" id="imagediv"> 
                <label for="profileimg" class="labelname">YOUR PROFILE IMAGE:</label>
                <img src="<?php echo $image?>" alt="" id="profileimage" class="profileimg">
                <input type="file" name="fileToUpload" id="fileToUpload">

            </div>
        
            
        
            <div class="entry">
                <label for="name" class="labelname">NAME: </label>
                <input type="text" id="name" name="name" class="inputele" value="<?php echo $name;?>" onkeyup="checkname()">
                <label for="" class="err" id="err_name"></label>
            </div>
            
            
            <div class="entry">
                <label for="username" class="labelname">USERNAME: </label>
                <input type="text" class="inputele" id="username" name="username" value="<?php echo $user;?>" onkeyup="checkusername()">
                <label for="" class="err" id="err_username"></label>
            </div>
            

            <div class="entry">
                <label for="gender" class="labelname">GENDER: </label>
                <input type="text" class="inputele" id="gender" name="gender" value="<?php echo $gender;?>" onkeyup="checkgender()">
                <label for="" class="err" id="err_gender"></label>
            </div>
            

            <div class="entry">       
                <label for="mail" class="labelname">EMAIL: </label>
                <input type="email" class="inputele" name="mail" id="mail" value="<?php echo $mail;?>" onkeyup="checkemail()">
                <label for="" class="err" id="err_mail"></label>
            </div>


            <div class="entry">        
                <label for="phone" class="labelname">PHONE NUMBER: </label>
                <input type="text" class="inputele" id="phone" name="phone" value="<?php echo $phone;?>" onkeyup="checkphone()">
                <label for="" class="err" id="err_phone"></label>
            </div>


            <div class="entry">
                <label for="about" class="labelname">ABOUT ME: </label>
                <input type="text" class="inputele" id="about" name="about" value="<?php echo $about;?>" onkeyup="checkabout()">
                <label for="" class="err" id="err_about"></label>     
            </div>
            
            
            <button id="updatebtn" type="submit" >UPDATE DETAILS</button>
            <!-- <button id="signupuser" type="submit">CREATE AN ACCOUNT</button> -->

            <label for="" id="submitSuccess"></label>
        
        
        </form>

    </div>
    
</body>

<script src="profilejs1.js"></script>



</html>