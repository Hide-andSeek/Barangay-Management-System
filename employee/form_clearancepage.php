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

	<!--Font Styles-->
	<link rel="icon" type="/image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Pending: Barangay Clearance </title>

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
		.viewbtn{width: 45px; height: 35px;}
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
						<h5>Barangay Clearance
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
		$sql_query = "SELECT clearance_id, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status
				FROM barangayclearance WHERE clearance_status = 'Pending'
				ORDER BY clearance_id DESC";
	}else{
		$sql_query = "SELECT clearance_id, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status
				FROM barangayclearance
				WHERE full_name LIKE ? 
				ORDER BY clearance_id DESC";
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
		$stmt->bind_result($data['clearance_id'], 
				$data['full_name'],
				$data['age'],
				$data['status'],
				$data['nationality'],
				$data['address'],
				$data['contactno'],
				$data['emailadd'],
				$data['purpose'],
				$data['date_issued'],
				$data['ctc_no'],
				$data['issued_at'],
				$data['precint_no'],
				$data['clearanceid_image'],
				$data['clearance_status']
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
		$sql_query = "SELECT clearance_id, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status
				FROM barangayclearance WHERE clearance_status = 'Pending'
				ORDER BY clearance_id DESC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT clearance_id, full_name, age, status, nationality, address,contactno, emailadd, purpose,date_issued, ctc_no, issued_at, precint_no, clearanceid_image, clearance_status
				FROM barangayclearance 
				WHERE full_name LIKE ? 
				ORDER BY clearance_id DESC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['clearance_id'], 
				$data['full_name'],
				$data['age'],
				$data['status'],
				$data['nationality'],
				$data['address'],
				$data['contactno'],
				$data['emailadd'],
				$data['purpose'],
				$data['date_issued'],
				$data['ctc_no'],
				$data['issued_at'],
				$data['precint_no'],
				$data['clearanceid_image'],
				$data['clearance_status']
				);
		// for paging purpose
		$total_records_paging = $total_records; 
	}

	// if no data on database show "No Reservation is Available"
	if($total_records_paging == 0){
		echo "
		<h1 style='text-align: center;'>404 Not Found</h1>
		<div class='alert alert-warning cattxtbox'>
			<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
		</div>";
	?>

	<?php 
		// otherwise, show data
		}else{
			$row_number = $from + 1;
	?>
		<div style="text-align: center;">
			<hr>
			<h5>Pending: Barangay Clearance</h5>
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
									<div>
										<label style="font-size: 14px;">Approved: </label>
										<button class="btn btn-success viewbtn" onclick="window.location.href='clearanceapproval.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>
									</div>
									<div>
										<label style="font-size: 14px;">Deny: </label>
										<button class="btn btn-danger viewbtn" onclick="window.location.href='barangayiddeny.php'"><i class="bx bx-xs bx-checkbox-checked" style="font-size: 20px;"></i> </button>	
									</div>
								</div>
							</div>						
<!-- end of search form -->
							
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Clearance ID</th>
										<th width="5%">Fullname</th>
										<th width="5%">Age</th>
										<th width="5%">Status</th>
										<th width="5">Address</th>
										<th width="15%">Contact No</th>
										<th width="5%">Email</th>
										<th width="10%">Purpose</th>
										<!-- <th width="5%">Identification Card</th> -->
										<th width="5%">Date Issued</th>
										<th width="5%">Certificate Status</th>
										<th width="5%">Action</th>
										<th width="5%">View Details</th>
										<th width="5%">Message</th>
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['clearance_id']; ?></td>
									<td><?php echo $data ['full_name']; ?></td>
									<td><?php echo $data ['age']; ?></td>
									<td><?php echo $data ['status']; ?></td>
									<td><?php echo $data ['address']?></td>
									<td><?php echo $data ['contactno']; ?></td>
									<td><?php echo $data ['emailadd']; ?></td>
									<td><?php echo $data ['purpose']; ?></td>
									<td><?php echo $data ['date_issued']; ?></td>
									<!-- <td><img src="../img/fileupload_barangayid/<?php echo $data['id_image']; ?>" width="210" height="100"></td> -->
									<td><input type="text" class="tblinput inpwidth" style="background-color: #e1edeb;color: #4CAF50; border: 1px solid #4CAF50; border-radius: 20px;" value="<?php echo $data ['clearance_status']; ?>"></td>

									<td><button class="view_approvebtn">Mark as Done</button></td>
									
									<td><button class="view_approvebtn" onclick="location.href='clearanceviewdet.php?id=<?php echo $data['clearance_id'];?>'">View Details</button></td>
									
									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
							<!-- Edit Category -->
							<div id="formatValidatorName" >
								<div id="edit/<?php echo $data['barangay_id']; ?>" class="edit-modal modal" >
										<div class="modal-contentedit animate">	
										<span  onclick="document.getElementById('edit/<?php echo $data['barangay_id']; ?>').style.display='none'" class="topright">&times;</span>
										<br>
										<br>
										<h4 style="text-align: center;"><br> Edit Category </h4>
										<?php echo isset($error['update_category']) ? $error['update_category'] : '';?>
										<hr />
										<form method="post" action="" enctype="multipart/form-data">
											<span>
												<input type="text" style="outline: 1px solid orange;" class="form-control cattxtbox " name="category_name" value="<?php echo $data['fname']; ?>"/>
												<?php echo isset($error['category_name']) ? $error['category_name'] : '';?>
											</span>
											<input type="file" class="form-control fileimg" name="category_image" id="category_image" />
											<?php echo isset($error['category_image']) ? $error['category_image'] : '';?>

											<span class="imgup">
												<img  src="upload/category/<?php echo $data['category_image']; ?>" width="260" height="170"/>
											</span>
											<input type="submit" class="btn-primary btn submitbtn" value="Update" name="btnEdit"/>
										</form>
										</div>
								</div>
							</div>
					</div>
							<div class="col-md-12 pagination">
								<h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'clearance_page.php', '', $total_records, $keyword);
									?>
								</h4>
							</div>
	</div>
							<div class="separator"></div>
</div>     
			
			</section>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</body>
</html>