<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    <div class="login">
        <h2> LOGIN </h2>
        <form class="innerform innerform1" action="loginphp.php" method="post">
            <label for="user_login">USERNAME</label>
            <input type="text" name="user" id="user_login">

            <label for="pass_login">PASSWORD</label>
            <input type="password" name="pass" id="pass_login">

            <input type="checkbox" name="checkbox_rem" id="remember" value="1">
            <label for="remember">Remember Me</label>

            <!-- <button onclick="login()" id="loginUser">LOGIN</button> -->
            <button id="loginUser">LOGIN</button>

        </form>
        <!-- <button id="loginUser">LOGIN</button> -->        

    </div>

    <div class="signup">
        <h2>CREATE AN ACCOUNT</h2>
        <form class="innerform innerform2"  method="post" action="signup.php"  id="signupform" onsubmit="event.preventDefault();check();">

            <label for="user_signup">USERNAME</label>
            <input type="text" name="username" id="user_signup">

            <label for="pass_signup">PASSWORD</label>
            <input type="password" name="password" id="pass_signup">

            <label for="pass_login2">CONFIRM PASSWORD</label>
            <input type="password" name="confirm_pass" id="pass_signup2">

            <button id="signupuser" type="submit">CREATE AN ACCOUNT</button>

        </form>

    </div>


    <?php
        require_once 'connect.php';

        $username_name="username";
        $password_name="password";
        $remember_name="remember";



        if(!isset($_COOKIE[$username_name])) {
          
            
        } else {

            $username=$_COOKIE[$username_name];
            $pass=$_COOKIE[$password_name];
            $rem=$_COOKIE[$remember_name];

            if($rem=="1"){
                echo "<script> document.getElementById(\"user_login\").value=\"".$username."\";</script>";
            

                echo "<script> document.getElementById(\"pass_login\").value=\"".$pass."\";</script>";

            }

            // echo "<script>document.getElementById(\"loginUser\").click();</script>";

            
        }
      
        ?>


    
</body>

<script src="check_reg.js">
</script>

</html>