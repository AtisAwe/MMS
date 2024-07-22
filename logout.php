<?php
	include "config.php";
	unset($_SESSION["user"]);
	if(session_destroy()) {
	header("Location:login.php");
	}
?>