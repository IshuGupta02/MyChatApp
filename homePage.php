<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homeStyle.css">
    <script type="text/javascript" src="homeJS.js"></script>

</head>
<body>

    <h1>
        WELCOME TO MyChat!
    </h1>


    <div class="complete">

        <div class="signup">
            <h2> SIGNUP </h2>
            <form action="" class="innerform">
                <label for="name_signup"> YOUR NAME</label>
                <input type="text" name="" id="name_signup">

                <label for="user_signup">USERNAME</label>
                <input type="text" name="" id="user_signup">

                <label for="pass_signup">PASSWORD</label>
                <input type="password" name="" id="pass_signup">

                <label for="confirm_pass">CONFIRM PASSWORD</label>
                <input type="password" name="" id="confirm_pass">

                <button onclick="createAcc()">CREATE ACCOUNT</button>
                


            </form>


        </div>

        <div class="login">
            <h2> LOGIN </h2>
            <form action="" class="innerform">
                <label for="">USERNAME</label>
                <input type="text" name="" id="user_login">

                <label for="pass_login">PASSWORD</label>
                <input type="password" name="" id="pass_login">

                <input type="checkbox" name="" id="remember">
                <label for="remember">Remember Me</label>

                <button onclick="login()">LOGIN</button>

            </form>

        </div>


    </div>
    
</body>
</html>