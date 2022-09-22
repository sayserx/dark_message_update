<?php
session_start();

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
}

$file = file_get_contents('ip-out.json');
$data = json_decode($file);
array_push($data,array(
"ip"=>$ipaddress,
"port"=>$_SERVER["REMOTE_PORT"]
));
$json = json_encode ($data, JSON_PRETTY_PRINT);
file_put_contents('ip-out.json', $json);

$x = file("blockip.txt");
$choke = array_search($ipaddress, $x);
if ($ipaddress === $x[$choke]) {
	header("location: block.php");
	exit(0);
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
	
  <div class="home">
  	<br>
  	<?php if (isset($_SESSION["error_rester"])) : ?>
		<div class="error" role="alert">
				<?php echo $_SESSION["error_rester"]; unset($_SESSION["error_rester"]);?>
			</div>
		<?php endif ?>
    <br>
 <div class="logo">
   <img class="img1" src="1200px-Font_Awesome_5_solid_user-secret.svg.png">
 </div>
 <br>
 <form action="requset_db.php" method="post" enctype="multipart/form-data">
 <div class="login">
  <p class="profile">
    <input class="upload" type="file" name="file"></p>
  <br>
  <input class="user" type="text" name="user" placeholder="username" required>
   <br>
   <p></p>
     <input class="user" type="text" name="email" placeholder="email" required>
   <br>
   <p></p>
   <input class="user" type="password" name="pass" placeholder="password" required>
   <br>
   <p></p>
   <input class="user" type="password" name="pass_2" placeholder="confirm password" required>
   <br>
   <p></p>
   <button type="submit" name="button" class="button">login</button>
 </div>
   <p style="font-size: 15px; color: #FFFFFF">Do you have an account? <a style="color: #00E0FF" href="login.php">login</a></p>
  </div>
  </form>
<style>
body {
  margin-top: 25%;
  background: #C0C0C0;
}
.img1 {
  height: 100px;
  transition-duration: 1.5s;
  width: 100px;
  border-radius: 150px;
  padding: 15px;
  background: #FFFFFF;
}

.home {
  text-align: center;
  margin: auto;
  background: #3C3D3F;
  height: auto;
  width: 360px;
  padding: 15px;
  border-radius: 5px;
}

.error {
  background: #FF6262;
  padding: 10px;
  border-radius: 5px;
  color: white;
  border: 2px solid #FF5959;
}

.user {
  width: 300px;
  padding: 10px;
  background: #2C2C2D;
  border: 1px solid #000000;
  border-radius: 2px;
  color: #23CF35;
  transition-duration: 1.5s;
}

.upload {
  color: #808081;
  width: 300px;
}

.profile {
  background: #2C2C2D;
  border: 1px solid #000000;
  border-radius: 2px;
  color: #A2A2A2;
  width: 310px;
  text-align: center;
  margin: auto;
  padding: 5px;
}

.logo {
  transition-duration: 1.5s;
}
.logo:hover {
  border: 2px solid #ED3838;
  text-align: center;
  margin: auto;
  padding: 15px;
  transition-duration: 1.5s;
  margin-top: -20px;
  width: 140px;
  border-radius: 150px;
}

.user:hover {
  background: #FFFFFF;
  transition-duration: 1.5s;
  color: #575757;
}
.button {
  width: 320px;
  padding: 12px;
  color: #BABABA;
  background: #272727;
  border: 2px solid #343434;
  border-radius: 3px;
  transition-duration: 1.5s;
}
.button:hover {
  margin-top: -10px;
  transition-duration: 1.5s;
  background: #FCFFF9;
  color: #000000;
  border-bottom: 2px solid #000000;
}
</style>
</body>
</html>
