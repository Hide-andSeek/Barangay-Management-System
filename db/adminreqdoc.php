<?php 
	// create object of functions class
	$function = new functions;
		
	// create array variable to store data from database
	$data = array();
	
	if(isset($_GET['keyword'])){	
		// check value of keyword variable
		$keyword = $function->sanitize($_GET['keyword']);
		$bind_keyword = "%".$keyword."%";
	}else{
		$keyword = "";
		$bind_keyword = $keyword;
	}
		
	if(empty($keyword)){
		$sql_query = "SELECT app_brgyid, fullname, contact_no, reference_no, payment_status, payment_method,added_on
				FROM payment_brgyid WHERE payment_status = 'For Approval'
				ORDER BY app_brgyid ASC";
	}else{
		$sql_query = "SELECT app_brgyid, fullname, contact_no, reference_no, payment_status, payment_method,added_on
				FROM payment_brgyid
				WHERE fname LIKE ? 
				ORDER BY app_brgyid ASC";
	}
	
	
	$stmt = $connect->stmt_init();
	if($stmt->prepare($sql_query)) {	
		// Bind your variables to replace the ?s
		if(!empty($keyword)){
			$stmt->bind_param('s', $bind_keyword);
		}
		// Execute query
		$stmt->execute();
		// store result 
		$stmt->store_result();
		$stmt->bind_result($data['app_brgyid'], 
					$data['fullname'],
					$data['contact_no'],
					$data['reference_no'],
					$data['payment_status'],
					$data['payment_method'],
					$data['added_on']
				);
		// get total records
		$total_records = $stmt->num_rows;
	}
		
	// check page parameter
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
					
	// number of data that will be display per page		
	$offset = 5;
					
	//lets calculate the LIMIT for SQL, and save it $from
	if ($page){
		$from 	= ($page * $offset) - $offset;
	}else{
		//if nothing was given in page request, lets load the first page
		$from = 0;	
	}	
	
	if(empty($keyword)){
		$sql_query = "SELECT app_brgyid, fullname, contact_no, reference_no, payment_status, payment_method,added_on
				FROM payment_brgyid WHERE payment_status = 'For Approval'
				ORDER BY app_brgyid ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT app_brgyid, fullname, contact_no, reference_no, payment_status, payment_method,added_on
				FROM payment_brgyid 
				WHERE fullname LIKE ? 
				ORDER BY app_brgyid ASC LIMIT ?, ?";
	}
	
	$stmt_paging = $connect->stmt_init();
	if($stmt_paging ->prepare($sql_query)) {
		// Bind your variables to replace the ?s
		if(empty($keyword)){
			$stmt_paging ->bind_param('ss', $from, $offset);
		}else{
			$stmt_paging ->bind_param('sss', $bind_keyword, $from, $offset);
		}
		// Execute query
		$stmt_paging ->execute();
		// store result 
		$stmt_paging ->store_result();
		$stmt_paging->bind_result($data['app_brgyid'], 
					$data['fullname'],
					$data['contact_no'],
					$data['reference_no'],
					$data['payment_status'],
					$data['payment_method'],
					$data['added_on']
					
				);
		// for paging purpose
		$total_records_paging = $total_records; 
	}

	// if no data on database show "No Reservation is Available"
	if($total_records_paging == 0){
		echo "
			<h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
			<div class='alert alert-warning cattxtbox'>
				<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
				<div style='display: flex; justify-content: center; align-items: center; margin-top: 25px;'>
					<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
				</div>
			</div>
			<div style='text-align: center; margin-top: 5%'>
				<a href='barangayidapproval.php' class='viewbtn1' style='float: left;width: 40%; margin-left: 60px;' title='Visit?'><< Wanna visit <strong> approval page?</strong></a>
				<a href='barangayiddeny.php' class='viewbtn1' style='float: right; width: 40%; margin-right: 60px;' title='Visit?'>Wanna visit <strong> denied request page? >></strong></a>
			</div>
			";
	?>