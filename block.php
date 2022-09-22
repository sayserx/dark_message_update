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
if ($ipaddress !== $x[$choke]) {
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>block</title>
</head>
<body>
  
    <div class="block">
    <h1>Error (block ip)</h1>
    <p>IP <?php echo $ipaddress; ?> ของคุณถูกบล็อก</p>
  </div>
<style>
body {
  background: black;
  margin-top: 60%;
}
  .block {
    background-image: url(background/img13.jpeg);
    padding: 50px;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 5px;
  }
  .block h1 {
    color: #FFFFFF;
    font-size: 30px;
    border-bottom:4px solid #FF05AE;
    width: 250px;
  }
  .block p {
   color: #FFFFFF;
   font-size: 20px;
  }
</style>
</body>
</html>
