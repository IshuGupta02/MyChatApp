<?php


require_once 'connect.php';

$username=$_POST['user'];
$pass=$_POST['pass'];
echo $name."  ".$pass." ";

if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    $sql="SELECT * from users where Username=\"".$username."\""." AND ". "Password=\"".$pass."\"";
    echo $sql;
    $result=$conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>location.href='profile.php'</script>";
    } else {
        echo "<script>location.href='login.php'</script>";

    }

}


?>