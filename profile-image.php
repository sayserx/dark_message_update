<?php
session_start();
header("location: profile.php");

if (isset($_POST["upload"])) {
$open = "user_db.json";
$file = file_get_contents($open);
$data = json_decode($file);

$username = $_SESSION["username"];
$password = $_SESSION["password"];

if (str_starts_with($_FILES["image_2"]["type"] , 'image')) {
if (move_uploaded_file($_FILES["image_2"]["tmp_name"], "image/".$_FILES["image_2"]["name"])) {
for ($i=0; $i<count($data); $i++) {
	if ($data[$i]->username === $username) {
		if ($data[$i]->password === $password) {
			$data[$i]->img = $_FILES["image_2"]["name"];
			$_SESSION["image-x"] = $_FILES["image_2"]["name"];
			}
	}
}
$json = json_encode ($data, JSON_PRETTY_PRINT);
file_put_contents($open, $json);
header("location: profile.php");
}
}

}