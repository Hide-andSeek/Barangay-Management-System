<?php 
	//Data Source Name
	try{
		$db = new PDO("mysql:host=mysql5046.site4now.net;dbname=db_a7d59c_combrgy;chartset=utf8","a7d59c_combrgy","ecajucom143");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
	   die();
    }
?>