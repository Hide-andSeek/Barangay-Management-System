<?php
	// start session
	session_start();
	
	// set time for session timeout
	$currentTime = time() + 25200;
	$expired = 3600;
	
	// if session not set go to login page
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	
	// if current time is more than session timeout back to login page
	if($currentTime > $_SESSION['timeout']){
		session_destroy();
		header("location:testindex.php");
	}
	
	// destroy previous session timeout and create new one
	unset($_SESSION['timeout']);
	$_SESSION['timeout'] = $currentTime + $expired;
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="testcss/font-awesome.min.css">
        <link rel="stylesheet" href="testcss/bootstrap.css">
        <link rel="stylesheet" href="testcss/custom.css">
        <title>Simple News Publishing System</title>
    </head>
    <body>
    	<div id="container">
    		<?php include('testincludes/menubar.php'); ?>
    		<?php include('testincludes/category_table.php'); ?>
			<?php include('testincludes/footer.php'); ?>
    	</div>

    <script src="testcss/js/jquery.min.js"></script>
    <script src="testcss/js/bootstrap.min.js"></script>	
    </body>
</html>