<?php 
	ob_start(); 
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="testcss/font-awesome.min.css">
        <link rel="stylesheet" href="testcss/bootstrap.min.css">
        <link rel="stylesheet" href="testcss/custom.css">
        <title>Simple News Publishing System</title>
        <style>
            .login{
              margin-top: 12%;
              margin-left: 2%;
            }
            .login h1{
              padding-bottom: 40px;
            }

        </style>
    </head>

    <body>
    	<div id="container">
			<?php include('testincludes/login_form.php');?>
	        <?php include('testincludes/footer.php');?>
    	</div>

    <script src="testcss/js/bootstrap.min.js"></script>
    </body>
</html>