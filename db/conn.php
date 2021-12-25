<?php 
	//Data Source Name
	$dbHost = "phpmyadmin-c009.cloudclusters.net";
	$dbUsername = "BMS";
	$dbPassword = "betagroup";
	$dbName = "commonwealthdb";
	try{
		$db = new PDO($dbHost, $dbUsername, $dbPassword, $dbName );
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
    }
?>