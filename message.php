<?php
session_start();

if (!isset($_SESSION['username'])) {
$_SESSION["error"] = "username กับ email หรือ password ไม่ตรงกัน";
echo "<script>location.replace('login.php');</script>";
}



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
}

$file = file_get_contents('ip-user.json');
$data = json_decode($file);
array_push($data,array(
"username"=>$_SESSION['username'],
"profile"=> $_SESSION["image-x"],
"ip"=>$ipaddress,
"port"=>$_SERVER["REMOTE_PORT"]
));
$json = json_encode ($data, JSON_PRETTY_PRINT);
file_put_contents('ip-user.json', $json);


$x = file("blockip.txt");
$choke = array_search($ipaddress, $x);
if ($ipaddress === $x[$choke]) {
	header("location: block.php");
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
  <meta name="theme-color" content="#2F2F2F">
  <script>location.href = "#ees";</script>
  <title></title>
</head>
<body>

<div class="menu">
  <a style="float: left" class="fa fa-comments-o"> หน้าส่งข้อความ</a>
  <a href="profile.php" style="font-size: 27px; float: right" class="fa fa-gear fa-spin"></a>
  <br>
</div>
<br><br><br>
<div class="box-message">
 
 <?php

$file = file_get_contents('message.json');
$data = json_decode($file);

$file_admin = file_get_contents('./admin/user-admin.json');
$data_admin = json_decode($file_admin);


for ($i=0; $i<count($data); $i++) {
	
	
if (isset($data[$i]->bot)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->bot->profile . '"> <p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; margin-top: -50px;word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->bot->username . ' <br> <p style="font-size: 20px; padding-left: 50px;word-wrap: break-word;">' . $data[$i]->bot->message . '</p></p>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบข้อความ"></form>';
          }
     }
   }
}


if (isset($data[$i]->bot_profile)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->bot_profile->profile . '"><p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->bot_profile->username . '<p></p><br><img style="width: 300px;height: 150px; border-radius: 15px; padding-left: 10px" src="background/' . $data[$i]->bot_profile->backgroud . '"><img style="width: 70;height: 70px; position: absolute; margin-top: -130px; margin-left: 120px; border-radius: 150px; border: 4px solid ' . $data[$i]->bot_profile->color . '"src="image/' . $data[$i]->bot_profile->image . '"><p style="margin-top: -50px; text-align: center; font-weight: 900; margin-left: 35px;">' . $data[$i]->bot_profile->username_user . '</p><br>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบข้อความ"></form>';
          }
     }
   }
}


if (isset($data[$i]->portfolio)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" bot/' . $data[$i]->portfolio->profile . '"><p class="fa fa-star" style="font-size: 20px;padding: 10px;padding-left: 10px; word-wrap: break-word; color: #FCFF00; font-weight: 900;">' . $data[$i]->portfolio->username . '<p></p><br><img style="width: 300px;height: auto;border-radius: 10px;margin-left: 10px;" src="admin/' . $data[$i]->portfolio->image . '"></p></p><br>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบข้อความ"></form>';
          }
     }
   }
}

if (isset($data[$i]->profile)) {
if (isset($data[$i]->username)) {


if (isset($data[$i]->message)) {
if (str_starts_with($data[$i]->message , "https://")) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;font-weight: 900;"> ' . $data[$i]->username . ' <br> <a href=" ' . $data[$i]->message . ' " style="font-size: 20px;word-wrap: break-word;color: #5AD5FF"> ' . $data[$i]->message . '</a></p>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบลิ้งค์"></form>';
          }
     }
   }
 }
}


if (isset($data[$i]->message)) {
	if (!str_starts_with($data[$i]->message , "https://")) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;font-weight: 900;"> ' . $data[$i]->username . ' <br> <p style="font-size: 20px;padding-left: 50px; word-wrap: break-word;"> ' . $data[$i]->message . '</p></p>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบข้อความ"></form>';
          }
     }
   }
  }
}

if (isset($data[$i]->emoji)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 30px; padding-left: 50px; padding-top: -40px;word-wrap: break-word;">  ' . $data[$i]->emoji . '</p><br>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบอีโมจิ"></form>';
          }
     }
   }
}

if (isset($data[$i]->image)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;"><img style="width: auto;height: 200px; border-radius: 5px" src="image/' . $data[$i]->image . '"></p><br>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบรูปภาพ"></form>';
          }
     }
   }
}


if (isset($data[$i]->video)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;"><video style="border-radius: 5px;width: 300px; height: 400px; padding: 10px;"  controls><source src="video/' . $data[$i]->video . '" type="video/mp4"></p><br>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบวีดีโอ"></form>';
          }
     }
   }
}

if (isset($data[$i]->download)) {
	echo '<br><img style="width: 40px;height: 40px; border-radius: 150px;float: left;"  src=" ' . 'image/' . $data[$i]->profile  . ' "><p style="font-size: 20px;padding-left: 50px; padding-top: 0px;word-wrap: break-word;font-weight: 900;"> ' . $data[$i]->username . '<br><br><div class="download"><img src="websize/file.png"><h1>' .  $data[$i]->download . '</h1><p>ขนาด ' . $data[$i]->size . '</p><br><a href="./download_sayser/' . $data[$i]->download . '" download=""><button>download file</button></a><br></div>';
	if (isset($data_admin)) {
		if ($_SESSION['username'] === $data_admin[0]->username) {
			if ($_SESSION['password'] === $data_admin[0]->password) {
                echo '<form method="GET" action="rm.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบไฟล์"></form>';
          }
     }
   }
}

}
}
}


?>
 
 
</div>



<h1 id="ees"></h1>
<br><br><br><br><br><br><br>


<div class="navbar">
    <div class="dropdown-content" id="myDropdown">
      <a style="
      background: #1D1D1D;
      color: #FFFFFF;
      text-align: center;
      border-top-left-radius: 10px;
      ">โปรดเลือกวิธีส่ง</a>
      <form action="request.php" method="post" enctype="multipart/form-data">
      <label for="imgx"><li style=" float: none;  color: black;  padding: 12px 16px;  text-decoration: none;  display: block;  background-color: #f9f9f9;" class="fa fa-file-photo-o"> รูปเเละวีดีโอ</li></label>
      <input  style="display: none; visibility: none;" name="image" id="imgx" type="file">
      <label for="download"><li style=" float: none;  color: black;  padding: 12px 16px;  text-decoration: none;  display: block;  background-color: #f9f9f9;" class="fa fa-file-text"> ส่งเเบบโหลด</li></label>
      <input  style="display: none; visibility: none;" name="download" id="download" type="file">
      <br>
      <button style="background: #1CCD1C;border: 2px solid #1CCD1C;color: #FFFFFF;padding: 10px;border-radius: 5px;float: right;" type="submit" class="fa fa-send-o" name="button"> ส่งรูป</button>
</form>
      <button style="
background: #FF5E5E;
border: 2px solid #FF5E5E;
color: #FFFFFF;
padding: 10px;
border-radius: 5px;
float: left;" type="submit" class="fa fa-close"> ยกเลิก</button>
      <br>
    </div>
    <div class="message">
    <label for="filex"><li style="color: white; font-size: 20px; padding: 10px;float: left;" class="fa fa-file-image-o">  </li></label>
  <button  style="display: none; visibility: none;" id="filex" class="dropbtn" onclick="myFunction()"></button>
      <form action="request.php" method="post" enctype="multipart/form-data">
      <input type="text" class="inputx" name="message" placeholder="message...">
      <button class="fa fa-send-o" type="submit" name="button"></button>
      </form>
  </div>
  </div>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
<style>

body {
    background: #000000;
    font-family: Arial, Helvetica, sans-serif;
    width: 70%;
  }
  * {
    margin: 0;
  }
  .menu {
    background: #000000;
    padding: 20px;
    font-family: Arial, Helvetica, sans-serif;
    border-bottom: 1px solid #3D3D3D;
    position: fixed;
    width: 90%;
  }
  .menu a {
    color: #E3E3E3;
    font-weight: 900; 
    font-size: 22px;
    transition-duration: 1s;
    text-decoration: none;
  }
  .menu a:hover {
    color: #00A7FF;
  }
 
.message {
 position:fixed;
 left:0px;
 bottom:0px;
 width:100%;
 background: #000000;
 padding: 10px;
 text-align: center;
 margin-left: -15px;
 border: 1px solid #474747;
}

.box-message {
  margin-left: 5px;
  color: #E0E0E0
}

.inputx {
  width: 250px;
  padding: 15px;
  background: #292929;
  border: 2px solid #222222;
  color: #D7E2E7;
  border-bottom-right-radius: 10px;
  transition-duration: 1s;
}

.inputx:hover {
  background: #F8F8F8;
  color: #353535;
}


.message button {
  padding: 14px;
  background: #5C5C5C;
  color: #FFFFFF;
  border: #00A7FF;
  border-right: 4px solid #5A5A5A;
  border-bottom-right-radius: 10px;
  font-size: 17px;
  transition-duration: 1s;
}

.message button:hover {
  background: #23B3FF;
  border-right: 4px solid #00A7FF;
  color: #0076FF;
}

  .admin .px {
    margin-top: -150px;
    color: #FFFFFF;
    text-align: left;
    color: #00FF00;
    text-shadow: 0 0 1em #00B8FF;
    font-weight: 900;
    font-size: 10px;
    padding-left: 10px;
  }
  .admin .facebook {
    color: #00BEFF;
    font-size: 10px;
    padding: 10px;
    text-shadow: 0 0 1em #00B8FF;
  }
  .admin .url-facebook {
    font-size: 5px;
    color: #FFFFFF;
  }
  .admin .youtube {
    font-size: 10px;
    color: #FF3007;
    padding: 10px;
    margin-top: -20px;
    text-shadow: 0 0 1em #FF684A;
  }
  .admin .url-youtube {
    color: #FFFFFF;
    font-size: 5px;
  }
  
.dropdown {
  float: left;
  overflow: hidden;
  background: #000000;
  padding: 10px;
}


.dropdown-content {
  display: none;
  position: absolute;
  margin-top: -100%;
  margin-left: 5%;
  background-color: rgba(255, 255, 255, 0.4);
  min-width: 300px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border-radius: 5px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  background-color: #f9f9f9;
}

.dropdown-content input {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  background-color: #f9f9f9;
}

.download {
    background: #292929;
    color: #FFFFFF;
    padding: 5px;
    width: 270px;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 5px;
    border: 2px solid #363636;
  }
  .download h1 {
    font-size: 15px;
  }
  .download img {
    height: 50px;
    float: left;
    padding: 10px;
    border-radius: 20px;
  }
  .download button {
    background: #4F4F4F;
    border: 2px solid #7D7D7D;
    color: #FFFFFF;
    padding: 7px;
  
  }

.dropdown-content a:hover {
  background-color: #ddd;
}

.boxking {
	backdrop-filter: blur(10px);
	background-color: rgba(255, 255, 255, 0.4);
}

.show {
  display: block;
}

.button {
	background: #E15252;
    border: 2px solid #FE5656;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-left: 50px;
}

</style>


</body>
</html>