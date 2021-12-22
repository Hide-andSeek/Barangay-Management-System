<?php
	session_start();
	session_destroy();
	header("location: 0index.php");
?>