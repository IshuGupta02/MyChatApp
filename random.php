<!DOCTYPE html>
<html>
<head>
    <title>Insert Image in MySql using PHP</title>
</head>
<body>
<?php

require_once 'connect.php';

$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    // $con = mysqli_connect('localhost','root','','admin') or die('Unable To connect');
    $sql = "insert into images (imagesrc) values(?)";

    $stmt = mysqli_prepare($conn,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly UPloaded';
    }else{
        $msg = 'Error uploading image';
    }
}

$sql1="select * from images";

$result=$conn->query($sql1);

if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	//   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	$img=base64_encode($row["imagesrc"]);

	// echo $name.$user.$gender.$mail.$phone.$about;

	}
} else {
	echo "0 results";
}



// $img=base64_encode($row['PICTURE']);
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>

	<img alt="105x105" class="img-responsive" src="data:image/jpg;charset=utf8;base64,<?php echo $img ?>">
</body>
</html>