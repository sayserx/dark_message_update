<?php
session_start();
header("location: admin.php");
if (!empty($_POST["ip"])) {
	if (!str_starts_with($_POST["ip"] , ' ')) {
if (isset($_POST["search"])) {
	$ip_x = $_POST["ip"];
	$open = fopen("blockip.txt", 'a');
	$ip = "\n" . $ip_x;
    $ip = str_replace(' ', '', $ip);
    fwrite($open, $ip);
    $_SESSION["search"] = "บล็อกIP (" . $ip_x . ") สําเร็จ";
    header("location: admin.php");
    }
 }
}
?>