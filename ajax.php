<?php
session_start();
$input = $_GET['open'];
$file = file_get_contents('user_db.json');
$data = json_decode($file);



if (!empty($input)) {
	$filex = file_get_contents('admin/user-admin.json');
    $datax = json_decode($filex);
    echo "<p class='searchx'>สิ่งคล้าย $input</p>";
for ($i=0;$i<count($data); $i++) {
if (str_starts_with($data[$i]->username , $input)) {
if ($_SESSION['username'] === $datax[0]->username) {
  if ($_SESSION['password'] === $datax[0]->password) {
	echo '<br><img style="
    width: 50px;
    height: 50px;
    border-radius: 150px;
    border: 2px solid #414141;
    float: left;" src=" image/'. $data[$i]->img . '"><a style="border-left: none;background: #101010;padding: 10px;" class="fa fa-user-o"> ' . $data[$i]->username . '</a><br><a style="background: #101010;padding: 10px;" class="fa fa-envelope-o"> ' . $data[$i]->email . '</a><br><a style="background: #101010;padding: 10px;margin-left: 55px;" class="fa fa-eye"> ' . $data[$i]->password . '</a><br><p style="
    border-bottom: 1px solid #3E3E3E;
    background: #101010;
    color: #101010">.</p><br>';
 } 
} else {
echo '<br><img style="
    width: 50px;
    height: 50px;
    border-radius: 150px;
    border: 2px solid #414141;
    float: left;" src=" image/'. $data[$i]->img . '"><a style="border-left: none;background: #101010;padding: 10px;" class="fa fa-user-o"> ' . $data[$i]->username . '</a><br><a style="background: #101010;padding: 10px;" class="fa fa-envelope-o"> ' . $data[$i]->email . '</a><br><p style="
    border-bottom: 1px solid #3E3E3E;
    background: #101010;
    color: #101010">.</p><br>';
    }
}
}
} else {
	echo '<br><p class="error">กรุณากรองชื่อผู้ใช้</p>';
}
?>