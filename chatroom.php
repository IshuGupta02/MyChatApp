<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="chatroomcss.css">
    
    
</head>
<body >

    <div class="otheroptions">
        <form action="logout.php" method="post" class="redirect">
            <button id="logout" type="submit" class="goto">LOGOUT</button>
        
        </form>

        <form action="profile.php" method="post" class="redirect">
            <button id="profile" class="goto" type="submit">GO TO PROFILE PAGE!</button>
        
        </form>


    </div>

    <div class="chat">
        <?php
            require_once 'connect.php';

            $conn = new mysqli($servername, $username, $password, $db);

            //Check connection
            if ($conn->connect_error) {
                echo "<div class=\"output\">SORRY! COULD NOT LOAD CHATROOM!</div>";
                die;
            }

            $username_name="username";
            $password_name="password";
            $remember_name="remember";

            $username=$_COOKIE[$username_name];
            $pass=$_COOKIE[$password_name];
            $rem=$_COOKIE[$remember_name];



            $stmt = $conn->prepare("SELECT * FROM ishu_users where Username=? AND Password=?");

            $stmt->bind_param("ss", $username,$pass);
            $stmt->execute();
            $result = $stmt->get_result();


            // $sql="SELECT * from ishu_users where Username=\"".$username."\""." AND ". "Password=\"".$pass."\"";
            
            // $result=$conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $profile=$row['profile'];
                    $req="yes";
                
                    if($profile!==$req){
                        echo "<div class=\"output\">YOUR PROFILE IS NOT COMPLETED. PLEASE COMPLETE YOUR PROFILE FIRST.</div>";
                        die;

                    }
                    else{
                        echo "<div class=\"output\">WELCOME TO YOUR CHATROOM!</div>";


                    }

                }
            }
            else{
                echo "<div class=\"output\">SORRY! COULD NOT LOAD CHATROOM!</div>";
                die;
            }

            ?>

        <div class="chatroom">
          

        <?php
            


            echo "<div class='allusers'>";


            $sql1="SELECT * from ishu_users";
            $result1=$conn->query($sql1);

            if ($result1->num_rows > 0) {
                // echo "entered1";
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
                    // echo "entered";

                    // echo "<div class='users'>";
                    echo "<div class='users' id=\"".$row1["UserID"]."\" onclick=\"funct('".$row1["UserID"]."')\">";
                    echo $row1['Username'];
                    echo "</div>";
                
                }
            }
            else{
                echo "<div class=\"users\">NO USERS FOUND</div>";
                die;
            }

            echo "</div>";

            ?>

      

            <div class="chatbox">
                <div class="msgs" id="msgs">
                
                </div>

                <div class="chatboxbottom">
                    <input type="text" id="entermsg">
                    <button id="send" onclick="addmsg()">SEND</button>
                </div>
       
            </div>

        </div>

    </div>

    
</body>
<script src="chatroomscript.js"></script>


</html>