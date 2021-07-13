<?php
	session_start();
	$_SESSION = [];
	session_unset();
	session_destroy();
	header("Location: https://onestepfootwear.com/login.php");
	exit;
?>