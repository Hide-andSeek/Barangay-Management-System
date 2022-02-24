<?php 
	//Data Source Name
	try{
		$db = new PDO("mysql:host=mysql5046.site4now.net;dbname=db_a7d59c_combrgy;chartset=utf8","a7d59c_combrgy","ecajucom143");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       return "<h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
				<div class='alert alert-warning cattxtbox'>
					<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
					<div style='display: flex; justify-content: center; align-items: center; margin-left: 90px; margin-top: 25px;'>
						<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
					</div>
				</div>" . $e->getMessage();
	   die();
    }
	
	$connect = new mysqli("mysql5046.site4now.net","a7d59c_combrgy","ecajucom143","db_a7d59c_combrgy");

	// Check connection
	if ($connect -> connect_errno) {
		echo "
		<h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
		<div class='alert alert-warning cattxtbox'>
			<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
			<div style='display: flex; justify-content: center; align-items: center; margin-left: 90px; margin-top: 25px;'>
				<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
			</div>
		</div>". $connect -> connect_error;
	exit();
	}

?>
