<?php
//header("location: login.php");
session_start();
if (isset($_POST["login"])){
$username = $_POST["user"];
$password = $_POST["pass"];
$password_2 = $_POST["pass_2"];
$file = file_get_contents('user_db.json');
$data = json_decode($file);

for ($i=0; $i<count($data);$i++) {
$username_json = $data[$i]->username;
$email_json = $data[$i]->email;
$password_json = $data[$i]->password;
$img_json = $data[$i]->img;

if ($password === $password_2) {
 if ($username === $username_json) {
	if ($password === $password_json) {
	    $_SESSION["username"] = $username_json;
	    $_SESSION["email"] = $email_json;
	    $_SESSION["password"] = $password_json;
	    $_SESSION["image-x"] = $img_json;
	    header("location: message.php");
	}
} else {
	if ($username === $email_json) {
		if ($password === $password_json) {
	        $_SESSION["username"] = $username_json;
	        $_SESSION["email"] = $email_json;
	        $_SESSION["password"] = $password_json;
	       $_SESSION["image-x"] = $img_json;
	       header("location: message.php");
    }
  } else {
	header("location: message.php");
}
} 
} else {
	$_SESSION["error"] = "รหัสเเละรหัสยืนยันไม่ตรงกัน";
    header("location: login.php");
}


}


}
?>