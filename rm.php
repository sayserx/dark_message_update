<?php
header("location: message.php");

$data = file_get_contents('message.json');
$data = json_decode($data);
$number = $_GET["name"];


if (isset($data[$number]->bot)) {
	unset ($data[$number]->bot->username);
	unset ($data[$number]->bot->profile);
	unset ($data[$number]->bot->message); 
	unset ($data[$number]->bot);
}
if (isset($data[$number]->bot_profile)) {
	unset($data[$number]->bot_profile->username);
	unset($data[$number]->bot_profile->profile);
	unset($data[$number]->bot_profile->image);
	unset($data[$number]->bot_profile->username_user);
	unset($data[$number]->bot_profile->email_user);
	unset($data[$number]->bot_profile->backgroud);
	unset($data[$number]->bot_profile->color);
	unset ($data[$number]->bot_profile);
} 
if (isset($data[$number]->portfolio)) {
	unset ($data[$number]->portfolio->username);
	unset ($data[$number]->portfolio->profile);
	unset ($data[$number]->portfolio->image);
	unset ($data[$number]->portfolio);
} else {
	unset($data[$number]->username);
    unset($data[$number]->password);
    unset($data[$number]->message);
    unset($data[$number]->profile);
}

$json = json_encode ($data, JSON_PRETTY_PRINT);
file_put_contents("message.json", $json);
