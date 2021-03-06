<?php
session_start();
include "../db/conn.php";
include "../db/user.php";
include "../db/documents.php";
include('../announcement_includes/functions.php'); 


if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
?>

<?php
	$dept = '';

	if(isset($_SESSION['type'])){
		$dept = $_SESSION['type'];
	}

	if(isset($_POST['btnverify'])){

		$payment_status	= $_POST['payment_status'];
		$document_id = $_POST['document_id'];
	
		$sql = "UPDATE payments SET payment_status = 'Paid' WHERE document_id = $document_id";
	
		if (mysqli_query($connect, $sql)) {
			$_SESSION['status'] ="Verified Successfully";
			$_SESSION['status_code'] ="success";
		} else {
			$_SESSION['status'] ="Oh there's an Error";
			$_SESSION['status_code'] ="errpr";
		}
	}
	
	if(isset($_POST['btnverify'])){

		$payment_stat	= $_POST['payment_stat'];
		$approved_bpermitid = $_POST['approved_bpermitid'];
	
		$sql = "UPDATE approved_bpermits SET payment_stat = 'Paid' WHERE approved_bpermitid = $approved_bpermitid";
	
		if (mysqli_query($connect, $sql)) {
		} else {
		  echo "Error updating record: " . mysqli_error($connect);
		}
	}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/documentprint_styles.css">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<script src="../resident-js/sweetalert.min.js"></script>
	
	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Approved: Business Permit </title>

	 <style>
		 *{font-size: 13px;}
		 .home-section{
			min-height: 95vh;
			}
		

		.addannounce{margin-top: 340px; margin-left: 25px; font-size: 13px;}
		.fileupload{font-size: 13px; margin-left: 15px;}
		.pagination{margin-top: 32%}
		.page{margin-left: 15px; }
		span.topright{margin-left: -50px; text-align: right; font-size: 25px;}
		.topright:hover {text-align: right;color: red; cursor: pointer;}

	  	.submitbtn, .cattxtbox, .refreshbtn, .fileimg{
			font-size: 14px;
			height: 35px;
			width: 84%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.errormsg, .del{color: #d8000c; background: #ffbaba; border-radius: 5px;}
		.edit{width: 40%; color: #9f6000; background: #feef83; margin-bottom: 5px; border-radius: 5px;}
		.del{width: 40%;}
		.select__select{margin-top: -32px; padding-left: 180px;}

		.bcircle:hover{color: black}
		.imgup{display: flex; justify-content: center; align-items: center;  padding: 5px 5px 5px 5px; margin-left: 20px; margin-right: 25px; }
		.btnwidth{width: 70%; margin-bottom: 5px;}
		.announcedesc{margin-left: 20px;}
		.btnmargin{margin-bottom: 5px;}
		.hoverbtn:hover{background: orange;}
		.btnwidths{width: 40%}
		.descriptionStyle{overflow:auto; resize:none;}
		.addcat{background: #B6B4B4; border: 2px solid gray; height: 40px;}
		.tblinput{background: none; border: none; user-select: none; text-align: center;pointer-events: none;}
		.viewbtn{width: 65px; height: 35px; background-color: #008CBA;color: white;  }
		.viewbtn:hover{ background-color: white; color: black; border: 1px solid #008CBA;}

	.preview{font-size:13px; padding-left:50px; inline-block: none;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.preview_txtbx{width: 350px; margin-bottom: 15px;}
		
		.respersonal_inf{border-radius: 5px; user-select:none; background:#b5f5c6; padding: 50px 50px 50px 50px}
		.personal_inf{padding-bottom: 5px;}
		.viewdetail{user-select: auto}
		
		.w3-section{margin-top:16px!important;margin-bottom:16px!important}
		.w3-light-grey,.w3-hover-light-grey:hover{color:#000!important;background-color:#f1f1f1!important}
		
		.w3-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.w3-block{display:block;width:100%}
		.w3-hide{display:none!important}
		.w3-show{display:block!important}
		 p.content{width: 450px; height: 300px;}
		 
		p.center_description{line-height: 0.2;}
		div.side_information{line-height: 0.1;}
		.offic{font-size:13px;}
		
		.documentbtn{font-size: 15px;width: 250px; height: 40px; padding: 12px 12px 12px 12px; }
		.documentbtn:hover{background-color: gray;color: white;}
	
		.document-section{padding-left: 390px; margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{color:#000!important; background-color:#f1f1f1!important;}
		
		.document-button:hover{color:#000!important;background-color:orange!important; width:85%;}
		.document-block{display:block;width:85%}
		.document-hide{display:none!important; max-height: 300px; overflow-y: scroll; width:85%;}
		.document-show{display:block!important}
		.inp{border: none; }
		.borderb{border-bottom: 1px solid black}
		.replybtn{ width: 110px; background-color: white;color: black;border: 1px solid #555555;}
		.replybtn:hover{background-color: #555555;color: white;}
		
	 </style>
   </head>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar nav-button" href="dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  <li>
				<a class="side_bar nav-button" href="barangayid.php">
				   <i class='bx bx-id-card id'></i>
				  <span class="links_name">Barangay ID</span>
				</a>
				 <span class="tooltip">Barangay ID</span>
			  </li>
			  
			  <li>
				<a class="side_bar nav-button" href="barangayclearance.php">
				   <i class='bx bx-receipt clearance'></i>
				  <span class="links_name">Barangay Clearance</span>
				</a>
				 <span class="tooltip">Barangay Clearance</span>
			  </li>
			  
			  <li>
				<a class="side_bar nav-button" href="certificateofindigency.php">
				   <i class='bx bx-file indigency'></i>
				  <span class="links_name">Certificate of Indigency</span>
				</a>
				 <span class="tooltip">Certificate of Indigency</span>
			  </li>			  
			  
			  <li>
				<a class="side_bar nav-button nav-active" href="businesspermit.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Business Permit</span>
				</a>
				 <span class="tooltip">Business Permit</span>
			  </li>

			  <li>
				<a class="side_bar nav-button" href="payment_history.php">
				   <i class='bx bx-data payment'></i>
				  <span class="links_name">Payment History</span>
				</a>
				 <span class="tooltip">Payment History</span>
			  </li>

				<li class="profile">
					<div class="profile-details">
					<div class="name_job">
						<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> || Online </div>
					</div>
					</div>
					<a href="../emplogout.php">
						<i class='bx bx-log-out d_log_out' id="log_out" ></i>
					</a>
				</li>
			</ul>
		  </div>
		  
																						<!-- Middle Section -->
		  <section class="home-section">
																						<!-- Top Section -->
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>Business Permit >> Approved Request
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  <div id="content" class="container col-md-12">
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
		$sql_query = "SELECT approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, bpermitid_type, permitfilechoice, approvedby, app_date, status, email_status, payment_stat
				FROM approved_bpermits WHERE status = 'Approved'
				ORDER BY approved_bpermitid ASC";
	}else{
		$sql_query = "SELECT approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, bpermitid_type, permitfilechoice, approvedby, app_date, status, email_status, payment_stat
				FROM approved_bpermits
				WHERE fullname LIKE ? 
				ORDER BY approved_bpermitid ASC";
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
		$stmt->bind_result($data['approved_bpermitid'], 
				$data['dateissued'],
				$data['selection'],
				$data['fullname'],
				$data['contactno'],
				$data['businessname'],
				$data['businessaddress'],
				$data['plateno'],
				$data['email_add'],
				$data['businessid_image'],
				$data['bpermitid_type'],
				$data['permitfilechoice'],
				$data['approvedby'],
				$data['app_date'],
				$data['status'],
				$data['email_status'],
				$data['payment_stat']
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
	$offset = 50;
					
	//lets calculate the LIMIT for SQL, and save it $from
	if ($page){
		$from 	= ($page * $offset) - $offset;
	}else{
		//if nothing was given in page request, lets load the first page
		$from = 0;	
	}	
	
	if(empty($keyword)){
		$sql_query = "SELECT approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, bpermitid_type, permitfilechoice, approvedby, app_date, status,email_status, payment_stat
		FROM approved_bpermits WHERE status = 'Approved'
				ORDER BY approved_bpermitid ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT approved_bpermitid, dateissued, selection, fullname, contactno, businessname, businessaddress, plateno, email_add, businessid_image, bpermitid_type, permitfilechoice, approvedby, app_date, status,email_status, payment_stat
				FROM approved_bpermits 
				WHERE fullname LIKE ? 
				ORDER BY approved_bpermitid ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['approved_bpermitid'], 
				$data['dateissued'],
				$data['selection'],
				$data['fullname'],
				$data['contactno'],
				$data['businessname'],
				$data['businessaddress'],
				$data['plateno'],
				$data['email_add'],
				$data['businessid_image'],
				$data['bpermitid_type'],
				$data['permitfilechoice'],
				$data['approvedby'],
				$data['app_date'],
				$data['status'],
				$data['email_status'],
				$data['payment_stat']
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
			<div style='display: flex; justify-content: center; align-items: center; margin-left: 90px; margin-top: 25px;'>
				<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
			</div>
		</div>";
	?>

	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>
		<div style="text-align: center;">
			<hr>
			<h5>Approved: Business Permit</h5>
			<hr /> 
		</div>
<!-- Search -->
							<div class="search_content">
								<form class="list_header" method="get">
									<label>
										Search: 
										<input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
										<button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
									</label>
								</form>
								<div style="display: flex;" class="mrgn document-section select__select">
									<!-- <div>
										<button style="" class="btn btn-success viewbtn" onclick="window.location.href='barangayclearance.php'"></i> Back</button>
									</div> -->
									<div style="float: right;">
										<a href="businesspermit.php">
											<img src="../img/back.png" title="Back?" class="hoverback" style="width: 45px; height: 45px;margin-left: -50px; cursor: pointer;" alt="Back?">
										</a>
									</div>
								</div>
							</div>						
<!-- end of search form -->
							
					<div class="col-md-12">
							<table class="content-table" id="table">
								<thead>
									<tr class="t_head">
										<th width="5%"> Permit ID</th>
										<th width="5%">Date Issued</th>
										<th width="5%">Selection</th>
										<th width="5%">Full name</th>
										<th width="10%">Contact no</th>
										<!-- <th width="5%">Identification Card</th> -->
										<th width="5%">Business name</th>
										<th width="5%">Business Address</th>
										<th width="5%">Plate no</th>
										<th width="5%">Email Status	</th>
										<!-- <th width="5%">ID Picture</th> -->
										<th width="5%"></th>
										<th width="5%"></th>
										<th width="5%"></th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['approved_bpermitid']; ?></td>
									<td><?php echo date("F d, Y", strtotime($data ['dateissued'])); ?></td>
									<td><?php echo $data ['selection']; ?></td>
									<td><?php echo $data ['fullname']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									<td><?php echo $data ['businessname']; ?></td>
									<td><?php echo $data ['businessaddress']; ?></td>
									<td><?php echo $data ['plateno']; ?></td>
									<td><?php echo $data ['email_status']; ?></td>

									<td><input type="text" class="tblinput inpwidth" style="background-color: #e1edeb;color: #4CAF50; border: 1px solid #4CAF50; border-radius: 20px; width: 80px; padding:3px; border: 1px solid gray;" value="<?php echo $data ['payment_stat']; ?>"></td>
									
									<td>
										<a style="text-decoration: none; width: 110px; height:30px;" class="form-control generate viewbtn" href="print_permit.php?id=<?php echo $data['approved_bpermitid'];?>" target="_blank"><i style="color: black;" class="bx bxs-printer" ></i> Print PDF</a>
									</td>

									<td>
									<a style="text-decoration: none; width: 110px; border-radius: 20px;  height:100%" class="viewbtn form-control" href="bpermit_payment.php?id=<?php echo $data['approved_bpermitid'];?>" target="_blank"><i style="color: black;" class="bx bxs-data" ></i> Payment</a>
									</td>
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
					</div>
							<div class="col-md-12 pagination">
								<h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'businesspermitapproval_page.php', '', $total_records, $keyword);
									?>
								</h4>
							</div>
	</div>
							<div class="separator"></div>
</div>    

<div id="content" class="container col-md-12">
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
		$sql_query = "SELECT document_id, fullname, contact_no, reference_no, document_type, payment_status, payment_method
				FROM payments WHERE payment_status = 'Approval' AND document_type = 'Business Permit'
				ORDER BY document_id ASC";
	}else{
		$sql_query = "SELECT document_id, fullname, contact_no, reference_no, document_type, payment_status, payment_method
				FROM payments
				WHERE fname LIKE ? 
				ORDER BY document_id ASC";
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
		$stmt->bind_result($data['document_id'], 
					$data['fullname'],
					$data['contact_no'],
					$data['reference_no'],
					$data['document_type'],
					$data['payment_status'],
					$data['payment_method']
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
	$offset = 50;
					
	//lets calculate the LIMIT for SQL, and save it $from
	if ($page){
		$from 	= ($page * $offset) - $offset;
	}else{
		//if nothing was given in page request, lets load the first page
		$from = 0;	
	}	
	
	if(empty($keyword)){
		$sql_query = "SELECT document_id, fullname, contact_no, reference_no, document_type, payment_status, payment_method
				FROM payments WHERE payment_status = 'Approval' AND document_type = 'Business Permit'
				ORDER BY document_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT document_id, fullname, contact_no, reference_no, document_type, payment_status, payment_method
				FROM payments
				WHERE fullname LIKE ? 
				ORDER BY document_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['document_id'], 
					$data['fullname'],
					$data['contact_no'],
					$data['reference_no'],
					$data['document_type'],
					$data['payment_status'],
					$data['payment_method']
					
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
			";
	?>

	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>
		<div style="text-align: center;">
			<hr>
			<h5>Payment: Business Permit</h5>
			<hr /> 
		</div>
<!-- Search -->
							<div class="search_content">
								<form class="list_header" method="get">
									<label>
										Search: 
										<input type="text" class=" r_search" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>" />
										<button type="submit" class="btn btn-primary" name="btnSearch" value="Search"><i class="bx bx-search-alt"></i></button>
									</label>
								</form>
								<div style="display: flex;" class="mrgn document-section select__select">
									<!-- <div>
										<button style="" class="btn btn-success viewbtn" onclick="window.location.href='barangayclearance.php'"></i> Back</button>
									</div> -->
								</div>
							</div>						
<!-- end of search form -->
							
					<div class="col-md-12">
							<table class="content-table" id="table">
								<thead>
									<tr class="t_head">
										<th width="5%">Permit ID</th>
										<th width="15%">Fullname</th>
										<th width="5%">Contact no</th>
										<th width="15%">Reference No</th>
										<th width="5%">Payment Method</th>
										<th width="5%"></th>
										<th width="5%"></th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><strong><?php echo $data ['document_id']; ?></strong></td>
									<td><?php echo $data ['fullname']; ?></td>
									<td><?php echo $data ['contact_no']; ?></td>
									<td><strong><?php echo $data ['reference_no']; ?></strong></td>
									<td><?php echo $data ['payment_method']?></td>
									<td>
									<form method="POST" action="">
										<input name="payment_status" id="payment_status" value="Paid" type="hidden">

										<input name="document_id" id="document_id" value="<?php echo $data ['document_id']; ?>" type="hidden">

										<input name="approved_bpermitid" id="approved_bpermitid" value="<?php echo $data ['document_id']; ?>" type="hidden">


										<input name="payment_stat" id="payment_stat" value="Paid" type="hidden">

										<button style="text-decoration: none; width: 90px; height:30px;" class="form-control generate viewbtn verify" name="btnverify"><i class="bx bx-check-shield veri" style="font-weight: 600"></i> Verify</button>
									</td>
									</form>
									<td>
									<a style="text-decoration: none; width: 100%; height:100%; border-radius: 5px; border: 1px solid gray;" class="viewbtn form-control" href="clearance_resubmit.php?id=<?php echo $data['document_id'];?>" target="_blank"> Resubmit</a>
									</td>
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
					</div>
							<div class="col-md-12 pagination">
								<h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'businesspermitapproval_page.php', '', $total_records, $keyword);
									?>
								</h4>
								
							</div>
	</div>
	<?php
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
        ?>
        <script>
            swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "You can now print the document",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok Done!",
            });
        </script>
        <?php
        unset($_SESSION['status']);
        }
        ?>
</section>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			<script>
				function myFunction(hidedocument) {
				var x = document.getElementById(hidedocument);
					if (x.className.indexOf("document-show") == -1) {
					x.className += " document-show";
					} else { 
						x.className = x.className.replace(" document-show", "");
					}
				}
			</script>
	</body>
</html>