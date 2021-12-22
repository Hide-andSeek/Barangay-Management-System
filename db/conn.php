<?php 
	//Data Source Name
	try{
		$db = new PDO("mysql:host=localhost;dbname=barangaydb;chartset=utf8","root","wxBO7bxynu2DQhKD");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
    }
	
	//$host = "localhost";
	//$user	= "root";
	//$password = "";
	//$dbname = "dbname";
	
	//$dsn or db = "mysql:host=$host, dbname=$dbname";
	
	//$pdo = new PDO($dsn, $user, $password);
?>