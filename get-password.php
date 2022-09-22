<?php
session_start();
if (isset($_POST["get"])) {
	$_SESSION["get-key"] = $_SESSION["password"];
	header("location: profile.php");
}