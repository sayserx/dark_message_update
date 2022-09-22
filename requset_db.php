<?php
session_start();
//header("location: login.php");

if (isset($_POST["button"])) {
$username = $_POST["user"];
$email = $_POST["email"];
$password = $_POST["pass"];
$password_2 = $_POST["pass_2"];
$image = $_FILES["file"]["name"];
$file = file_get_contents('user_db.json');
$data = json_decode($file);

if ($password === $password_2) {
if (str_starts_with($_FILES["file"]["type"] , 'image')) {
if (move_uploaded_file($_FILES["file"]["tmp_name"], "image/".$_FILES["file"]["name"])) {
array_push($data, array(
"username"=> $username,
"email"=>$email,
"password"=>$password,
"img"=>$image
));
$json = json_encode ($data , JSON_PRETTY_PRINT);
file_put_contents('user_db.json', $json);
header("location: login.php");
}
} else {
	$_SESSION["error_rester"] = "โปรดอัพรูปเป็นรูปภาพ (image)";
	header("location: index.php");
} 
} else {
	$_SESSION["error_rester"] = "รหัสกับรหัสยืนยันไม่ตรงกัน";
	header("location: index.php");
}
}



?>