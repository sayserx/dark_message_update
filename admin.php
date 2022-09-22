<?php
session_start();
if (!isset($_SESSION['username'])) {
echo "<script>location.replace('login.php');</script>";
}

if (isset($_SESSION['username'])) {
	$file = file_get_contents('admin/user-admin.json');
    $data = json_decode($file);
	if ($data[0]->username !== $_SESSION['username']) {
		if ($data[0]->password !== $_SESSION['password']) {
		echo "<script>location.replace('message.php');</script>";
	}
  }
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
  <title></title>
</head>
<body>

<div class="server">
  <a href="profile.php" style="text-decoration: none; color: #FFFFFF" class="fa fa-tasks"> เซิฟเวอร์</a>
  <p>.</p>
</div>

<?php
 if (isset($_SESSION["search"])) {
 	echo '<div class="win">' . $_SESSION["search"] . '</div><br>';
     unset($_SESSION["search"]);
 }
 ?>
 
<div class="search">
<form action="search.php" method="post">
  <input class="ipx" name="ip" placeholder="IPที่จะบล็อก" required>
  <button name="search" class="fa fa-search-plus"></button>
</form>
</div>


<br>
<br>

<div class="info">
  <center><p style="background: #00B8FF; border: 2px solid #00B8FF; ">ข้อมูลเซิฟเวอร์</p></center>
  <p>Host: <?php echo $_SERVER["SERVER_NAME"]; ?></p>
  <p>IP: <?php echo $_SERVER["HTTP_HOST"]; ?></p>
  <p>Port: <?php echo $_SERVER["SERVER_PORT"]; ?></p>
  <p>Request: <?php echo $_SERVER["REQUEST_METHOD"]; ?> </p>
  <p>User-agent: <?php echo $_SERVER["HTTP_USER_AGENT"]; ?> </p>
  <p>SOFTWARE: <?php echo $_SERVER["SERVER_SOFTWARE"]; ?></p>
</div>

<br>

<p style="background: #D80303; border: 2px solid #D80310" class="userxmenu">IP ที่ถูกบล็อก</p>
<div style="height: 200px;" class="attax">
<?php
$block = file("blockip.txt");
for ($i=0; $i<count($block); $i++) {
echo '<p class="ip">' . $block[$i] . '</p>';
}
?>
</div>


<br>
<p class="userxmenu">คนในเข้าเว็บ</p>
<div class="box-user">
<?php
$file = file_get_contents('ip-user.json');
$data = json_decode($file);
for ($i=0; $i<count($data); $i++) {
echo '<div class="user"><img style="height: 40px;width: 40px;border-radius: 150px;float: left;margin-top: -10px;font-size: 10px;" src="image/' . $data[$i]->profile . '"><a style="margin-left: 20px;color: #FFFFFF;font-size: 10px;">' . $data[$i]->username . '</a><a style="margin-left: 10px;color: #FFFFFF;font-size: 10px;">' . $data[$i]->ip . '</a><a style="margin-left: 10px;color: #FFFFFF;font-size: 10px;">' . $data[$i]->port . '</a></div>';
}
?>
</div>


<br>



  <p style="background: #FF0700;
  border: 2px solid #FF0700;
  font-size: 10px
  " class="userxmenu"> คนนอกเข้าเว็บ</p>
  <div class="attax">
 <?php
$file = file_get_contents('ip-out.json');
$data = json_decode($file);
for ($i=0; $i<count($data); $i++) {
  echo '<p class="ip">' . $data[$i]->ip . ':' . $data[$i]->port . '</p>';
  }
  ?>
</div>

<br>
<div class="top">
  <p>Dark-Developer.com</p>
</div>


<style>
  * {
    margin: 0;
  }
  body {
    margin: 0;
    padding: 0;
    background: #000000;
    font-family: Arial, Helvetica, sans-serif;
  }
  .server {
    background: black;
    color: #E0E0E0;
    padding: 20px;
  }
  .server a {
   font-weight: 900;
   font-size: 20px;
  }
  .server p {
    border-bottom: 2px solid #6E6E6E;
    color: #000000;
  }
  .info p {
    font-size: 10px;
    font-family: Arial, Helvetica, sans-serif;
     border: 2px solid #232323;
     background: #2B2B2C;
    padding: 10px;
    color: #FFFFFF;
  }
  .userxmenu {
    background: #04B208;
    color: #FFFFFF;
    border: 2px solid #04B208;
    padding: 10px;
    font-size: 10px;
    text-align: center;
 }
 .user {
   background: #FFFEFE;
   padding: 15px;
   background: #000000;
   border-bottom: 2px solid #535353;
 }
.ip {
  color: #FFFFFF;
  border: 2px solid #232323;
  padding: 10px;
  font-size: 10px;
  background: #2B2B2C;
}

.box-user {
  overflow: auto;
  height: 250px;
  border: 2px solid #232323;
  background: #2B2B2C;
}

.attax {
  overflow: auto;
  height: 250px;
}

.memberx {
  background: #AD00FF;
  color: #FFFFFF;
  padding: 10px;
}

.top {
    color: #DAD8D8;
    text-align: center;
    background: black;
    padding: 20px;
    font-weight: 900;
    margin-left: -15px;
    font-size: 10px;
    border-top: 2px solid #D5D5D5;
  }

.members {
  background: #494949;
  padding: 10px;
  color: #FFFFFF;
}

  .ipx {
 padding: 15px;
 float: left;
 width: 300px;
 margin-left: 10px;
 border: 2px solid #232323;
 background: #2B2B2C;
 color: #979797;
 font-size: 12px;
  }
  .ip:hover {
    background: #FFFFFF;
    color: #5E5E5E;
    transition-duration: 1s;
  }
  .ipx:hover {
    background: #FFFFFF;
    color: #5E5E5E;
    transition-duration: 1s;
  }
  .search button {
    float: left;
    color: #FFFFFF;
    padding: 15px;
    background: #333333;
    border: 2px solid #1D1D1D;
    border-bottom-right-radius: 10px;
  }
  
  
.win {
 background: #26BF24;
 color: #FFFFFF;
 text-align: center;
 padding: 10px;
 font-size: 10px;
 width: 350px;
 border-radius: 5px;
 margin: auto;
}


</style>

</body>
</html>
