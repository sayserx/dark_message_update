<?php
session_start();
if (isset($_POST["logout"])) {
	unset($_SESSION['username']);
	echo "<script>location.replace('index.php');</script>";
}