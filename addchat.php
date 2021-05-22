<?php
require_once 'connect.php';
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die;
}

$data = json_decode(file_get_contents("php://input"));

$from=$data->from;
$to=$data->to;
$msg=$data->msg;

$fromusername=$from;

$stmt = $conn->prepare("SELECT * FROM ishu_users where UserID=?");

$stmt->bind_param("i", $to);
$stmt->execute();
$result = $stmt->get_result();

// $sql="SELECT * from ishu_users where UserID=".$to."";

// $result=$conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tousername=$row['Username'];  
        
    }
    
    
}
else{
    
}

$query1="INSERT INTO `ishu_chat_". $fromusername."`";

$value1=1;

$stmt1 = $conn->prepare("$query1(text, isto, chatwith) values (?, ?, ?)");
$stmt1->bind_param("sis",$msg,$value1,$tousername );
$stmt1->execute();


// $sql1="INSERT INTO ishu_chat_".$fromusername."(text, isto, chatwith) values(\"".$msg."\", 1, \"".$tousername."\")";

// $result1=$conn->query($sql1);

$query2="INSERT INTO `ishu_chat_". $tousername."`";
$value2=0;

$stmt2 = $conn->prepare("$query2(text, isto, chatwith) values (?, ?, ?)");
$stmt2->bind_param("sis",$msg,$value2,$fromusername );
$stmt2->execute();



// $sql2="INSERT INTO ishu_chat_".$tousername."(text, isto, chatwith) values(\"".$msg."\", 0, \"".$fromusername."\")";

// $result2=$conn->query($sql2);

echo "1";



?>