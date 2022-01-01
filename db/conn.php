<?php 
	//Data Source Name
	try{
		$db = new PDO("mysql:host=mysql5046.site4now.net;dbname=db_a7d59c_combrgy;chartset=utf8","a7d59c_combrgy","ecajucom143");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "Error!: " . $e->getMessage();
	   die();
    }

	//Do not remove this
	// try{
	// 	$db = new PDO("mysql:host=localhost;dbname=barangaydb;chartset=utf8","root","wxBO7bxynu2DQhKD");
	// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $e) {
    //    return "Error!: " . $e->getMessage();
	//    die();
    // }
?>