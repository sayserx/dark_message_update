<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("location: index.php");
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
  <meta name="theme-color" content="black">
  <title>set</title>
</head>
<body>

<div class="back">
 <a style="font-weight: 900;" class="fa fa-cog">    ตั้งค่าผู้ใช้</a>
</div>
<div class="box2">
<div class="box">
  <br>
  <br>
  <br>
  <br>
  <br>
 <form action="profile-image.php" method="post" enctype="multipart/form-data">
  <img class="img" src="<?php echo 'image/' . $_SESSION["image-x"]; ?>">
  <label for="filex" style="color: white; position: absolute; margin-left: 140px;font-size: 20px;margin-top: 50px;padding: 10px" class="fa fa-plus-circle"></label>
  <input id="filex" style="display: none; visibility: none;" type="file" name="image_2" required>
</div>
<br>
<br>
<br>
<br>
<br>
  <button type="submit" class="fa fa-upload" name="upload"> เปลี่ยนรูปภาพ</button>
   </form>
   <br>
   <br>
  <div style="
    font-size: 17px;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: 900;
    margin-left: 10px;" class="x">
<p class="fa fa-user"> <?php if (isset($_SESSION["username"])) { echo $_SESSION["username"]; } ?></p>
    <br>
  <p class="fa fa-envelope"> <?php if (isset($_SESSION["email"])) { echo $_SESSION["email"]; } ?></p>
    <br>
 
<?php
if (isset($_SESSION["get-key"])) {
	echo "<div class='fa fa-eye-slash'>";
	echo " " . $_SESSION["get-key"];
	echo "</div>";
	unset($_SESSION["get-key"]);
} else {
	echo "<p class='fa fa-eye-slash'> ******</p>";
}
 ?></div>

<br>
</div>

<div class="menu">
<label>
  <form action="get-password.php" method="post">
  <button style="
  background: #252525;
  color: white;
  border: 2px solid #252525;
  width: 94.5%;
  padding: 10px;
  margin-left: 10px;
  float: left;
  text-align: left;
  " class="fa fa-eye-slash" type="submit" name="get"> ดูรหัสผ่าน</button>
  </form>
  </label>
   <br>
   <a  href="group-user.php" class="fa fa-users"> ดูผู้ใช้ทั้งหมด</a>
   <br>
  <a  href="password.php" class="fa fa-key"> เปลี่ยนรหัสผ่าน</a>
  <br>
  <a href="websize.php" class="fa fa-handshake-o"> เกี่ยวกับเว็บไซต์</a>
  <br>
  <a href="message.php" class="fa fa-comment"> ไปหน้าส่งข้อความ</a>
<?php
if (isset($_SESSION["username"])) {
	$filex = file_get_contents('admin/user-admin.json');
    $datax = json_decode($filex);
	if ($_SESSION['username'] === $datax[0]->username) {
     if ($_SESSION['password'] === $datax[0]->password) {
         echo '<a href="admin.php" class="fa fa-street-view"> ข้อมูลเซิฟเวอร์</a>';
         }
   }
}
?>
  <br>
  <form action="logout.php" method="post">
  <button style="
  background: #FF5858;
  color: white;
  border: 2px solid #FF5858;
  width: 94.5%;
  padding: 10px;
  margin-left: 10px;
  float: left;
  text-align: left;
  " class="fa fa-sign-out" type="submit" name="logout"> ออกระบบ</button>
  </form>
</div>
<br>
<br>
<br>
	<br>
<br>
<br>
<div class="top">
  <p>Dark-Developer.com</p>
</div>

<style>
  body {
    background: black;
    font-family: Arial, Helvetica, sans-serif;
  }
  * {
    margin: 0;
  }
  .img {
    height: 130px;
    width: 130px;
    border-radius: 150px;
    position: absolute;
    margin-top: -50px;
    margin-left: 10px;
    border: 4px solid black;
    background: black;
  }
  .box {
    background-image: url("background/img1.jpeg");
  }
  .box p {
    color: #FFFFFF;
    font-size: 15px; 
    margin-left: 150px;
    font-weight: 900;
    border-left: 4px solid #000000;
    padding: 2px;
  }
  .back {
    font-size: 17px;
    color: #DDDEE7;
    padding: 20px;
    background: black;
  }
  .box2 {
    background: black;
  }
  .box2 button {
    background: #0CD900;
    color: white;
    border: 2px solid #29D71F;
    padding: 10px;
    border-radius: 5px;
    width: 200px;
    margin-left: 10px;
  }
  .menu a {
    color: #FFFFFF;
    padding: 15px;
    width: 87%;
    margin-left: 10px;
    background: #252525;
    text-decoration: none;
  }
  .menu a:hover {
    background: #191919;
  }
  .top {
    color: #DAD8D8;
    text-align: center;
    position:fixed;
    left:0px;
    bottom:0px;
    width:100%;
    background: black;
    padding: 20px;
    font-weight: 900;
    margin-left: -15px;
  }
</style>
</body>
</html>
