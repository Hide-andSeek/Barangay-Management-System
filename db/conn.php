<?php 
	//Data Source Name
	
	try{
		$db = new PDO("mysql:host=localhost;dbname=barangaydb;chartset=utf8","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
	   die();
    }
?>