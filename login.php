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

            <input type="checkbox" name="" id="remember">
            <label for="remember">Remember Me</label>

            <!-- <button onclick="login()" id="loginUser">LOGIN</button> -->
            <button id="loginUser">LOGIN</button>

        </form>
        <!-- <button id="loginUser">LOGIN</button> -->

    </div>
    
</body>
</html>