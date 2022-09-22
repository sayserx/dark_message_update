<?php
session_start();
header("location: password.php");

if (isset($_POST["reset-password"])) {
$open = "user_db.json";
$file = file_get_contents($open);
$data = json_decode($file);
$password = $_POST["password"];
$reset = $_POST["password_2"];
$username_user = $_SESSION["username"];
$password_user = $_SESSION["password"];


if ($password === $reset) {
	for ($i=0; $i<count($data); $i++) {
		if ($data[$i]->username === $username_user) {
			if ($data[$i]->password === $password_user) {
			$data[$i]->password = $reset;
			$_SESSION["password"] = $data[$i]->password;
			}
		}
	}
	$json = json_encode ($data, JSON_PRETTY_PRINT);
    file_put_contents($open, $json);
    $_SESSION["success"] = "เปลี่ยนรหัสเป็น " . $password_user . " สําเร็จ";
} else {
		$_SESSION["error"] = "รหัสผ่านไม่ตรงกับรหัสผ่านยืนยัน";
		header("location: password.php");
}
 	
}