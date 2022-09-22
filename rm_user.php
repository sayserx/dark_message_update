<?php
header("location: group-user.php");

$data = file_get_contents('user_db.json');
$data = json_decode($data);
$number = $_GET["name"];
unset($data[$number]->username);
unset($data[$number]->email);
unset($data[$number]->password);
unset($data[$number]->img);
$json = json_encode ($data, JSON_PRETTY_PRINT);
file_put_contents("user_db.json", $json);
