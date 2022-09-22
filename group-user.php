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

$x = file("blockip.txt");
$choke = array_search($ipaddress, $x);
if ($ipaddress === $x[$choke]) {
	header("location: block.php");
}

if (!isset($_SESSION['username'])) {
$_SESSION["error"] = "username กับ email หรือ password ไม่ตรงกัน";
echo "<script>location.replace('login.php');</script>";
}

$file = file_get_contents('user_db.json');
$data = json_decode($file);

for ($i=0; $i<count($data); $i++) {
if (empty($data[$i]->username)) {
unset ($data[$i]);
}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="theme-color" content="#2F2F2F">
  	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.min.js"></script>
  <title></title>
</head>
<body>
	
<script type="text/javascript">
        $(document).ready(function() {
          $("#button").click(function(button) {
              $.get("ajax.php", {
               open:$("#user").val() }, function(open) {
                       $("#search").html(open);
                      }                 
                    );          
                }); 
            });
        </script>


<div class="box">
<a href="profile.php" class="fa fa-users"> สมาชิกทั้งหมด <?php if (isset($data)) { echo count($data); }?>คน</a>
</div>
<br>
<br>
<br>
<div class="box-size">
  <br>
  <input type="text" name="user" id="user" placeholder="ค้นหาผู้ใช้">
  <button type="button" name="login" id="button" class="fa fa-search-plus"></button>
  <br><br><br>
</div>
<div class="search" id="search">

</div>


<div class="user-box">
<div class="user">
	
<?php

$file = file_get_contents('user_db.json');
$data = json_decode($file);

$file_1 = file_get_contents('admin/user-admin.json');
$data_1 = json_decode($file_1);
	
for ($i=0; $i<count($data); $i++) {
	if ($_SESSION['username'] === $data_1[0]->username) {
		if ($_SESSION['password'] === $data_1[0]->password) {
			if (isset($data[$i]->username)) {
				if (isset($data[$i]->email)) {
	        echo '<br><img src=" image/'. $data[$i]->img . '"><a style="border-left: none;" class="fa fa-user-o"> ' . $data[$i]->username . '</a><br><br><a class="fa fa-envelope-o"> ' . $data[$i]->email . '</a><br><br><a style="margin-left: 55px;" class="fa fa-eye"> ' . $data[$i]->password . '</a><br><br><form method="GET" action="rm_user.php"><input type="hidden" name="name" value="'.$i.'"><input class="button" name="button" type="submit" value="ลบผู้ใช้"></form><p class="sadx1">.</p><br>';
	  }
	}
 }
}  else {
	if (isset($data[$i]->username)) {
		if (isset($data[$i]->email)) {
	  echo '<br><img src=" image/'. $data[$i]->img . '"><a style="border-left: none;" class="fa fa-user-o"> ' . $data[$i]->username . '</a><a class="fa fa-envelope-o"> ' . $data[$i]->email . '</a><br><br><p class="sadx1">.</p><br>';
	 }
	}
 }
}
?>
          
</div>
</div>
<style>
* {
  margin: 0;
  background: black;
}
.box {
  background: black;
  padding: 20px;
  border-bottom: 1px solid #393939;
  position: fixed;
  width: 100%;
}
 .box a {
    color: #FFFFFF;
    font-size: 20px;
    text-decoration: none;
  }
    .box-size {
    border-bottom: 1px solid #474747;
  }
  .box-size input {
    padding: 15px;
    float: left;
    width: 300px;
    margin-left: 10px;
    border: 2px solid #232323;
    background: #2B2B2C;
    color: #00FF4C;
  }
  .box-size input:hover {
    background: #FFFFFF;
    color: #5E5E5E;
    transition-duration: 1s;
  }
  .box-size button {
    float: left;
    color: #FFFFFF;
    padding: 15px;
    background: #333333;
    border: 2px solid #1D1D1D;
    border-bottom-right-radius: 10px;
  }
  .box-size button:hover {
    background: #FFFFFF;
    transition-duration: 1s;
    color: #000000;
  }
  .user {
    margin-left: 10px;
 }
  
  .user img {
    width: 50px;
    height: 50px;
    border-radius: 150px;
    border: 2px solid #414141;
    float: left;    
  }
  
  .user a {
    color: #FFFFFF;
    padding: 10px;
    float: left;
    word-wrap: break-word;
  }
  
  .user-box .sadx1 {
    padding: 7px;
    border-bottom: 1px solid #3E3E3E;
    color: none;
  }
  
    .error {
    background: #FA4D4D;
    border: 4px solid #FF3B3B;
    padding: 10px;
    border-radius: 5px;
    color: #EEEEEE;
    text-align: center;
  }
  
  .search {
  background: #101010;
  color: #EEEEEE;
}

.searchx {
  background: #03CAFF;
  border: 2px solid #03CAFF;
  color: #FFFFFF;
  width: auto;
  padding: 10px;
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
