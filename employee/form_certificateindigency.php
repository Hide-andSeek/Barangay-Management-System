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
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<link rel="stylesheet" href="../css/design.css">
	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Pending: Barangay Indigency </title>

	 <style>
		*{font-size: 13px;}
		 .home-section{
			min-height: 95vh;
			}

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
		.transact{margin-left: 75%; margin-right: 5%;}
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
				<a class="side_bar nav-button nav-active" href="certificateofindigency.php">
				   <i class='bx bx-file indigency'></i>
				  <span class="links_name">Certificate of Indigency</span>
				</a>
				 <span class="tooltip">Certificate of Indigency</span>
			  </li>			  
			  
			  <li>
				<a class="side_bar nav-button" href="businesspermit.php">
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
						<h5>Barangay Indigency >> Pending Request
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
		$sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, date_issue, indigencyid_image, indigencyfilechoice, status 
				FROM certificateindigency WHERE status = 'Pending'
				ORDER BY indigency_id ASC";
	}else{
		$sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, date_issue, indigencyid_image, indigencyfilechoice, status 
				FROM certificateindigency
				WHERE fullname LIKE ?
				ORDER BY indigency_id ASC";
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
		$stmt->bind_result($data['indigency_id'], 
				$data['fullname'],
				$data['address'],
				$data['purpose'],
				$data['contactnum'],
				$data['emailaddress'],
				$data['date_issue'],
				$data['indigencyid_image'],
				$data['indigencyfilechoice'],
				$data['status']
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
		$sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, date_issue, indigencyid_image, indigencyfilechoice, status 
				FROM certificateindigency WHERE status = 'Pending'
				ORDER BY indigency_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT indigency_id, fullname, address, purpose, contactnum, emailaddress, date_issue, indigencyid_image, indigencyfilechoice, status 
				FROM certificateindigency 
				WHERE fullname LIKE ?
				ORDER BY indigency_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['indigency_id'], 
				$data['fullname'],
				$data['address'],
				$data['purpose'],
				$data['contactnum'],
				$data['emailaddress'],
				$data['date_issue'],
				$data['indigencyid_image'],
				$data['indigencyfilechoice'],
				$data['status']
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
			<div style='text-align: center; margin-top: 5%'>
			<a href='indigencyapproval.php' class='viewbtn1' style='float: left;width: 40%; margin-left: 60px;' title='Visit?'><< Wanna visit <strong> approval page?</strong></a>
			<a href='indigencydenied.php' class='viewbtn1' style='float: right; width: 40%; margin-right: 60px;' title='Visit?'>Wanna visit <strong> denied request page? >></strong></a>
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
			<h5>Pending: Barangay Indigency</h5>
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
									<div style="margin-right: 10px;">
										<button class="btn btn-success viewbtn" onclick="window.location.href='indigencyapproval.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> Approved</button>
									</div>
									<div>
										<button class="btn btn-danger viewbtn" onclick="window.location.href='indigencydenied.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> Denied</button>	
									</div>
								</div>
							</div>						
<!-- end of search form -->
							
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Indigency ID</th>
										<th width="15%">Fullname</th>
										<th width="5%">Address</th>
										<th width="15%">Purpose</th>
										<th width="5">Contact</th>
										<th width="10%">Date Issued</th>
										<!-- <th width="5%">Identification Card</th> -->
										<th width="5%">Status</th>
										<th width="5%">View Details</th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['indigency_id']; ?></td>
									<td><?php echo $data ['fullname']; ?></td>
									<td><?php echo $data ['address']; ?></td>
									<td><?php echo $data ['purpose']; ?></td>
									<td><?php echo $data ['contactnum']?></td>
									<td><?php echo date("F d, Y", strtotime($data ['date_issue'])); ?></td>
									<td><input type="text" class="tblinput inpwidth" style="background-color: #e1edeb;color: #4CAF50; border: 1px solid #4CAF50; border-radius: 20px;" value="<?php echo $data ['status']; ?>"></td>
									<!-- <td><img src="../img/fileupload_indigency/<?php echo $data['indigencyid_image']; ?>" width="210" height="100"></td> -->
									
									<td><button class="view_approvebtn" onclick="location.href='indigencyviewdet.php?id=<?php echo $data['indigency_id'];?>'">View Details</button></td>			
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
										$function->doPages($offset, 'indigencypage.php', '', $total_records, $keyword);
									?>
								</h4>
								<div class="transact">
									<button class="btn bg-olive viewbtn" onclick="window.location.href='indigency_transaction_history.php'"><i class="bx bx-xs bx-folder-open" style="font-size: 20px;"></i> Transaction History </button>
								</div>
							</div>
	</div>
							<div class="separator"></div>
</div>     
			
			</section>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</body>
</html>