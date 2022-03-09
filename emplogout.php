<?php
	session_start();
	unset($_SESSION['type']);
	
	if(session_destroy())
	{
		header("Location: 0index.php");
	}
	
?>