<?php
session_start();

if (!isset($_SESSION['username'])) {
$_SESSION["error"] = "username กับ email หรือ password ไม่ตรงกัน";
echo "<script>location.replace('login.php');</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="theme-color" content="#2F2F2F">
  <title>reset</title>
</head>

<body>

<div class="box">
 <a href="profile.php" style="font-weight: 900; color: white; text-decoration: none;" class="fa fa-mail-reply"> เปลี่ยนรหัสผ่าน</a>
</div>

<?php
if (isset($_SESSION["error"])) {
   echo "<div class='error'>";
   echo $_SESSION["error"]; unset($_SESSION["error"]);
   echo "</div>";
}
if (isset($_SESSION["success"])) {
	echo "<div class='success'>";
    echo $_SESSION["success"]; unset($_SESSION["success"]);
    echo "</div>";
}
?>
	
<div class="home">
<div class="box-2">
  <p style="font-weight: 900; font-size: 17px;" class="fa fa-key"> เปลี่ยนรหัสผ่าน</p>
  <br>
  <br>
  <form action="reset-password.php" method="post">
  <input type="text" name="password" placeholder="รหัสผ่านใหม่">
  <br>
  <br>
  <input type="text" name="password_2" placeholder="รหัสผ่านยืนยัน">
  <br>
  <br>
  <button type="submit" name="reset-password">เปลี่ยนรหัสผ่าน</button>
  </form>
</div>
</div>


<style>
.box-2 {
  font-weight: 900;
  text-align: center;
  color: #FAFAFF;
  background: #3C3D3F;
  padding: 20px;
  width: 330px;
  margin: auto;
  border-radius: 5px;
}
.home {
  margin-top: 50%;
}
.box-2 input {
  width: 300px;
  padding: 10px;
  background: #333333;
  border: 2px solid #202020;
  border-radius: 5px;
  color: #BEBEBE
}
.box-2 input:hover {
  background: #D3D3D3;
  color: #000000;
}
.box-2 button {
  width: 327px;
  padding: 10px;
  background: #2E2E2E;
  border: 2px solid #393939;
  border-radius: 5px;
  color: #919191;
  transition-duration: 1.5s;
}
.box-2 button:hover {
  background: #FFFFFF;
  border: 2px solid #FFFFFF;
  color: #000000;
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
   body {
     background: #838383;
   }
   * {
     margin: 0;
     padding: 0;
   }
   .box {
     background: #2F2F30;
     color: #FFFFFF;
     padding: 20px;
   }
  .img {
    height: 150px;
    width: 150px;
    border-radius: 100px;
    border: 4px solid #00FF36;
  }
  .error {
  background: #FF6262;
  padding: 10px;
  border-radius: 5px;
  color: white;
  border: 2px solid #FF5959;
}

.success {
  background: #11CF1B;
  padding: 10px;
  border-radius: 5px;
  color: white;
  border: 2px solid #07D912;
}

</style>

</body>

</html>
