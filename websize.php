<?php
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
  <title>เกี่ยวกับเว็บไซต์</title>
</head>
<body>


<div class="menu">
<a href="profile.php" class="fa fa-handshake-o"> เกี่ยวกับเว็บไซต์</a>
</div>

<br><br>
<div class="box">
  <br>
  <img class="x" src="websize/1.jpeg">
  <p>สวัสดีครับผม อันนี้คือเว็บของDeveloper sayser ไว้เป็นโปรเจ็คใช้กันนะครับผม ก็จะใช้php + ajax + html + css + jsonมีระบบต่างๆนะครับ</p>
  <br>
  <h1>Rester (ระบบสมัครสมาชิก)</h1>
  <br>
  <img class="rester" src="websize/rester.jpeg">
  <p >กรอกข้อมูลต่างๆนะครับ ละก็อัพรูป</p>
  <br>
  <h1 style="background: #CC38FF">login (เข้าสู่ระบบ)</h1>
  <br>
  <img class="rester" src="websize/login.jpeg">
  <br>
  <p>ละก็กรอก ข้อมูลusername password เเละตรงusername สามารถ ใช้emailได้นะครับ</p>
  <br>
  <h1 style="background: #26FF6C">พอเข้าสู่ระบบเเล้วก็จะเจอหน้าmessage(ส่งข้อความ)</h1>
  <br>
  <img class="rester" src="websize/set.jpeg">
  <p>ตามนี้ครับ ตรงรูปไขขวงก็จะเป็นตั้งค่า ละส่งข้อความกับส่งข้อมูลวีดีโอ(mp4)</p>
  <br>
  <h1 style="background: #FF00AD">การใช้คําสั่งบอท</h1>
  <img class="rester" src="websize/bot.jpeg">
  <img class="rester" src="websize/admin.jpeg">
  <p>สามารถใช้คําสั่ง$helpเพื่อคําสั่งต่างๆนะครับเเต่เว็บข้อความจะไม่realtimeก็คือต้องรีเว็บตลอดเมื่อกดส่งในอนาคตอาจจะพัฒนาใช้soketให้realtimeนะครับก็$profileคําสั่งโปรไฟล์ครับ ก็จะ ramdom border,background เสมอครับผม </p>
  <br>
  <h1>การใช้https ในเว็บ</h1>
  <br>
  <img class="rester" src="websize/http.jpeg">
  <p>การพิมพ์ลิ้งเว็บก็จะlinkให้เเต่ใช้ได้โดยเฉพราะhttps</p>
  <br>
  <h1 style="background: #FF5038">setting(ตั้งค่า)</h1>
  <br>
  <img class="rester" src="websize/sett.jpg">
  <p>
  1.สามารถเปลี่ยนโปรไฟล์ได้ชั่วคราวครับ
  2.ดูข้อมูลต่างๆครับเเละถ้าจะกดรหัสผ่านก็กดเปิดรหัสดู
  3.ดูผู้ใช้ทั้งหมดเเละสามารถค้นหาได้เเบบrealtime ครับใช้ ajax ไม่ต้องรีหน้าเว็บเวลาค้นหา</p>
  <br>
  <h1>ดูผู้ใช้ทั้งหมด</h1>
  <br>
  <img class="rester" src="websize/se.jpeg">
  <p>สามารถค้นหาผู้ใช้เเบบrealtimeได้นะครับเเบบที่บอกไว้ข้อบน</p>
  <br>
  <h1 style="background: #FF4F4F" >ออกระบบ</h1>
  <br>
  <img class="logout" src="websize/logout.jpeg">
  <p>ออกระบบได้เลย</p>
  <br>
  <h1 style="background: #434343">กลับหน้าโปรไฟล์</h1>
  <img class="rester" src="websize/back.jpeg">
  <p>กดตรงนี้เพื่อกลับหน้าprofile</p>
  <br>
  <br>
</div>

<div class="top">
  <p>Dark-developer.com</p>
</div>

<style>
 * {
  margin: 0; 
 }
 
 body {
  background: black; 
  font-family: Arial, Helvetica, sans-serif;
 }
 .menu {
   background: #000000; 
   padding: 20px;
   border-bottom: 2px solid #2C2C2C;
   position: fixed;
   width: 90%;
}
.menu a {
  font-size: 20px;
  text-decoration: none;
  color: #FFFFFF;
}

.box {
  text-align: center;
  margin: auto;
}

.box .x {
  height: 200px;
  width: auto;
  border-radius: 10px;
}

.box p {
  font-weight: 900;
  color: #FFFFFF;
  text-align: left;
  font-family: Arial, Helvetica, sans-serif;
  width: 300px;
  margin: auto;
  font-size: 15px;
}
.box h1 {
  color: #FFFFFF;
  font-size: 20px; 
  background: #00CBFF;
  width: 250px;
  padding: 10px;
  border-radius: 10px;
  margin: auto;
}

.box .rester {
  height: 400px;
  border-radius: 10px;
}


.logout {
  width: 300px;
  height: 100px;
}

.top {
  color: #DAD8D8;
  text-align: center;
  position: fixed;
  left: 0px;
  bottom: 0px;
  width: 100%;
  background: black;
  padding: 20px;
  font-weight: 900;
  margin-left: -10px;
}

</style>


</body>
</html>
