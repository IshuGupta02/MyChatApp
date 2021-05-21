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

        print_r($_FILES["fileToUpload"]);



        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $target_file1 = $target_dir . $username.".".$imageFileType;

        if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                }
        }

        if (file_exists($target_file1)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

       

        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file1)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
                echo "Sorry, there was an error uploading your file.";
        }
        }

        


        $sql="update ishu_users SET Name=\"".$new_name."\", Username=\"".$new_username."\"".", Gender=\"".$new_gender."\", Email=\"".$new_mail."\", Phone=\"".$new_phone."\", About=\"".$new_about."\", profile=\"yes\", images=\"".$target_file1."\"  WHERE Username=\"".$username."\" and Password=\"".$pass."\"";
    

        echo $sql;

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