<?php session_start();
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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!--Customize-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Dashboard:  Request Document </title>
	 
	 
	 <style>
		div.align-box{padding-top: 23px; display: flex; align-item: center;}
		.box-report{
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;

		}
		
		 i.menu{color: #fff}
		 i.id{color: #a809b0}
		 i.clearance{color: #1cb009}
		 i.sms{color: #478eff}
		 i.blotter-com{color: #9e0202}
		 i.indigency{color: #0218bd}
		 i.permit{color: #e0149c}
		 i.ikon{color: red;}

		.w3borderbot{ margin-bottom: 20px; background: #71b280;} 

		.notification {
		color: white;
		text-decoration: none;
		position: relative;
		display: inline-block;
		border-radius: 2px;
		color: black;
		width: 95%;
		}

		.opac{opacity: 0.5;}

		.notification .badge {
		position: absolute;
		top: -10px;
		right: -10px;
		padding: 5px 10px;
		border-radius: 50%;
		background-color: #ff4f4f;
		color: white;
		font-size: 14px;
		}
		.w3top{margin-top: -30px;}
		.announcement-modal, .edit-modal, .delete-modal, .addannouncement-modal{
            display: none; 
            position: absolute; 
            z-index: 999; 
            left: 0;
            top: 30;
            width: 100%; 
            height: 100%; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 5px; 
        }
		
		.modal-contentannouncement, .modal-contentaddannouncement{
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
		    height: 32%;
            width: 37%;
            border-radius: 5px;
        }

		.modal-contentaddannouncement{
			margin-top: 30%;
			width: 70%;
			height: 43%;
		}

		.modal-contentdelete{height: 32%; }
		.modal-contentedit{height: 68%;  overflow-x: hidden;}

		.inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 14px;
			height: 35px;
			width: 94%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}	
		input.edit, input.del{width: 80;}
		
		.closebtn{margin-right: 15px; font-stretch: expanded;}
		.closebtn:hover{color:red; }
		.description{ height: 50px; font-size: 13px;}

		.addannounce{margin-top: 340px; margin-left: 25px; font-size: 13px;}
		.fileupload{font-size: 13px; margin-left: 15px;}
		.pagination{margin-top: 32%}
		.page{margin-left: 15px; }
		span.topright{margin-left: -50px; text-align: right; font-size: 25px;}
		.topright:hover {text-align: right;color: red; cursor: pointer;}

		.submitbtn, .cattxtbox, .refreshbtn, .fileimg{
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
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

		.transact{margin-left: 65%; }
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
			  <a class="side_bar" href="dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  <li>
				<a class="side_bar" href="barangayid.php">
				   <i class='bx bx-id-card id'></i>
				  <span class="links_name">Barangay ID</span>
				</a>
				 <span class="tooltip">Barangay ID</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="barangayclearance.php">
				   <i class='bx bx-receipt clearance'></i>
				  <span class="links_name">Barangay Clearance</span>
				</a>
				 <span class="tooltip">Barangay Clearance</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="certificateofindigency.php">
				   <i class='bx bx-file indigency'></i>
				  <span class="links_name">Certificate of Indigency</span>
				</a>
				 <span class="tooltip">Certificate of Indigency</span>
			  </li>			  
			  
			  <li>
				<a class="side_bar" href="businesspermit.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Business Permit</span>
				</a>
				 <span class="tooltip">Business Permit</span>
			  </li>
			  <li>
				<a class="side_bar" href="dummy.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Dummy</span>
				</a>
				 <span class="tooltip">Dummy</span>
			  </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
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
						<h5>Document Request Dashboard
						<a href="#" class="circle">
								
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>

			  			
	<div>
		<div class="w3-row-padding w3-margin-bottom">
		
			<div class="w3-quarter">
			<a href="barangayid.php" class="notification">
			<div class="w3-container w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					$query = "SELECT * FROM barangayid WHERE status = 'Pending' ORDER BY barangay_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h1 class='badge'>$pdoexecute</h1>"
					?>
		
				</div>
				<div class="w3-clear"></div>
				<h4>Barangay ID (Request)</h4>
			</div>
			</a>
			</div>
		
			<div class="w3-quarter">
			<a href="certificateofindigency.php" class="notification">
			<div class="w3-container w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					
					$query = "SELECT indigency_id FROM certificateindigency WHERE status = 'Pending' ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3 class='badge'>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Certificate of Indigency</h4>
				
			</div>
			</a>
			</div>

			<div class="w3-quarter">
			<a href="barangayclearance.php" class="notification">
			<div class="w3-container w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT * FROM barangayclearance WHERE clearance_status = 'Pending' ORDER BY clearance_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3 class='badge'>$pdoexecute</h3>"
				?>
				</div>
				<div class="w3-clear"></div>
				<h4>Barangay Clearance</h4>
			</div>
			</a>
			</div>

			<div class="w3-quarter">
			<a href="businesspermit.php" class="notification">
			<div class="w3-container w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					$query = "SELECT * FROM businesspermit WHERE status = 'Pending' ORDER BY businesspermit_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3 class='badge'>$pdoexecute</h3>"
					?>
		
				</div>
				<div class="w3-clear"></div>
				<h4>Business Permit (Req)</h4>
			</div>
			</a>
			</div>
		</div>
			<!-- <span style="text-align: center;">
				<h3>Welcome to Document Request Department! <?php echo $user;?></h3>
			</span> -->

		<!-- <div class="w3-row-padding w3-margin-bottom w3top">
			<div class="w3-quarter">
			<a href="barangayidapproval.php" class="notification">
				<div class="w3-container w3borderbot w3-padding-16" w3borderbot>
					<div class="w3-left"><i class="bx bx-checkbox-checked fa-fw w3-xxxlarge opac"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT * FROM barangayid WHERE status = 'Approved' ORDER BY barangay_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>Approved Barangay ID</h4>
				</div>
			</a>
			</div>
			
			<div class="w3-quarter">
			<a href="indigencyapproval.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-checkbox-checked w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency WHERE status = 'Approved' ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Indigency</h4>
			</div>
			</a>
			</div>
			
			<div class="w3-quarter">
			<a href="clearanceapproval.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-checkbox-checked fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					$query = "SELECT * FROM approved_clearance WHERE clearance_status = 'Done' ORDER BY approved_clearanceids";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Clearance</h4>
			</div>
			<a>
			</div>
						
			<div class="w3-quarter">
			<a href="businesspermitapproval.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-checkbox-checked fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT * FROM businesspermit WHERE status = 'Approved' ORDER BY businesspermit_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Permit</h4>
			</div>
			<a>
			</div>
			
	</div>		 -->
	<!-- <div class="w3-row-padding w3-margin-bottom w3top">
			<div class="w3-quarter">
			<a href="barangayiddeny.php" class="notification">
				<div class="w3-container w3borderbot w3-padding-16" w3borderbot>
					<div class="w3-left"><i class="bx bx-x-circle fa-fw w3-xxxlarge opac"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT * FROM barangayid WHERE status = 'Deny' ORDER BY barangay_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>Denied Barangay ID</h4>
				</div>
			</a>
			</div>
			
			<div class="w3-quarter">
			<a href="indigencydenied.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-x-circle w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency WHERE status = 'Deny' ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Denied Indigency</h4>
			</div>
			</a>
			</div>
			
			<div class="w3-quarter">
			<a href="clearancedenied.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-x-circle fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					$query = "SELECT * FROM barangayclearance WHERE clearance_status = 'Deny' ORDER BY clearance_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>Denied Clearance</h4>
			</div>
			<a>
			</div>
						
			<div class="w3-quarter">
			<a href="businesspermitdenied.php" class="notification">
			<div class="w3-container w3borderbot w3-padding-16">
				<div class="w3-left"><i class="bx bx-x-circle fa-fw w3-xxxlarge opac"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT * FROM businesspermit WHERE status = 'Deny' ORDER BY businesspermit_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Denied Permit</h4>
			</div>
			<a>
			</div>
			 -->
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
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid WHERE status = 'Pending'
					ORDER BY barangay_id ASC";
		}else{
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid
					WHERE fname LIKE ? 
					ORDER BY barangay_id ASC";
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
			$stmt->bind_result($data['barangay_id'], 
					$data['fname'],
					$data['mname'],
					$data['lname'],
					$data['address'],
					$data['birthday'],
					$data['placeofbirth'],
					$data['contact_no'],
					$data['emailadd'],
					$data['guardianname'],
					$data['emrgncycontact'],
					$data['reladdress'],
					$data['dateissue'],
					$data['status'],
					$data['id_image']
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
			$sql_query = "SELECT  barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid WHERE status = 'Pending'
					ORDER BY barangay_id ASC LIMIT ?, ?";
		}else{
			$sql_query = "SELECT barangay_id, fname, mname, lname, address, birthday,placeofbirth, contact_no, emailadd,guardianname, emrgncycontact, reladdress, dateissue, status, id_image
					FROM barangayid 
					WHERE fname LIKE ? 
					ORDER BY barangay_id ASC LIMIT ?, ?";
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
			$stmt_paging->bind_result($data['barangay_id'], 
					$data['fname'],
					$data['mname'],
					$data['lname'],
					$data['address'],
					$data['birthday'],
					$data['placeofbirth'],
					$data['contact_no'],
					$data['emailadd'],
					$data['guardianname'],
					$data['emrgncycontact'],
					$data['reladdress'],
					$data['dateissue'],
					$data['status'],
					$data['id_image']
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

	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>
		<div style="text-align: center;">
			<hr style="height: 5px;">
			<h5>Transaction History</h5>
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
							</div>						
<!-- end of search form -->
							
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">ID No</th>
										<th width="5%">First name</th>
										<th width="5%">Middle name</th>
										<th width="5%">Last Name</th>
										<th width="5">Contact No.</th>
										<th width="15%">Address</th>
										<th width="5%">Date of Request</th>
										<th width="5%">Facilitated By:</th>
										<th width="5%">Details</th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['barangay_id']; ?></td>
									<td><?php echo $data ['fname']; ?></td>
									<td><?php echo $data ['mname']; ?></td>
									<td><?php echo $data ['lname']; ?></td>
									<td><?php echo $data ['contact_no']?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['dateissue']; ?></td>
									<td>ELIONORE CAJUCOM</td>
									
									<td><button class="view_approvebtn" onclick="location.href='barangayidviewdetails.php?id=<?php echo $data['barangay_id'];?>'">View Details</button></td>
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
										$function->doPages($offset, 'barangayid_page.php', '', $total_records, $keyword);
									?>
								</h4>
								<!-- <div class="transact">
									<label style="font-size: 14px;">Transaction History: </label>
									<button class="btn btn-danger viewbtn" onclick="window.location.href='barangayiddeny.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>	
								</div> -->
							</div>
							
	</div>
							<div class="separator"></div>
</div>     
	</div>		
			</section>
			<script href="test.js"></script>
	</body>
</html>