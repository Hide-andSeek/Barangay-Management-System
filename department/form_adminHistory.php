<?php
session_start();
include ("../db/conn.php");
include ("../db/user.php");
include('../announcement_includes/functions.php'); 
include "../db/viewdetinsert.php";
include('../send_email.php');


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
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	<link rel="stylesheet" href="../css/design.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Complaints Dashboard </title>
	 
	 <style>
		*{font-size: 13px;}
		a{text-decoration: none;}

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
		.cattxtbox{
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
		}
		.w3-quarter{margin-bottom: 10px;}

		.w3back{background: #04AA6D}
		.w3point:hover{cursor: pointer; background: orange; color: green}
		.w3bord{border: 2px solid white;}
		.w3borderbot{ border-bottom-left-radius: 15px;  border-bottom-right-radius: 15px; margin-left: 15px;}
		.w3bordertop{border-top-left-radius: 15px;  border-top-right-radius: 15px;}

		/* .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
} */
	 </style>
   </head>
	<body onload="display_ct()">
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar nav-button " href="compAdmin_dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar nav-button" href="compAdmin_Lupon.php">
				 <i class='bx bx-user-circle lupon'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar nav-button" href="compAdmin_BPSO.php">
				 <i class='bx bx-user bpso'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check vawc'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin bcpc'></i>
				 <span class="links_name">BCPC</span>
			   </a>
			   <span class="tooltip">BCPC</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button nav-active" href=".php">
				 <i class='bx bx-user-pin bcpc'></i>
				 <span class="links_name">Transaction History</span>
			   </a>
			   <span class="tooltip">Transaction History</span>
			 </li>
			  
			 <li class="profile">
				 <div class="profile-details">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						   <div class="job" id=""><?php echo $dept; ?>| Online</div>
				   </div>
				 </div>
				 <a href="emplogout.php">
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
						<h5>Transaction History
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'LUPON'
				ORDER BY admincomp_id ASC";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC";
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
		$stmt->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'LUPON'
				ORDER BY admincomp_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints 
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
			<hr />
			<h5>Lupon</h5>
			<hr /> 
		</div>

					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Blotter ID</th>
										<th width="5%">Name of Complainant</th>
										<th width="5%">Age</th>
										<th width="5%">Gender</th>
										<th width="5">Address</th>
										<th width="15%">Incident Address</th>
										<th width="5%">Contact No</th>
										<th width="5%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['admincomp_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_Lupondetails.php?id=<?php echo $data['admincomp_id'];?>'">View Details</button></td>
									
									<!-- <td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td> -->
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
						
					</div>
							<div class="col-md-12 pagination">
								<!-- <h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'compAdmin_Luponpage.php', '', $total_records, $keyword);
									?>
								</h4> -->
							</div>
	</div>
							
</div>     
				</div>
				
				
                 
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'BPSO'
				ORDER BY admincomp_id ASC";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC";
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
		$stmt->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'BPSO'
				ORDER BY admincomp_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints 
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
			<hr />
			<h5>BPSO</h5>
			<hr /> 
		</div>

				
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Blotter ID</th>
										<th width="5%">Name of Complainant</th>
										<th width="5%">Age</th>
										<th width="5%">Gender</th>
										<th width="5">Address</th>
										<th width="15%">Incident Address</th>
										<th width="5%">Contact No</th>
										<th width="5%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['admincomp_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_BPSOdetails.php?id=<?php echo $data['admincomp_id'];?>'">View Details</button></td>
									
									<!-- <td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td> -->
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
						
					</div>
							<div class="col-md-12 pagination">
								<!-- <h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'compAdmin_BPSOpage.php', '', $total_records, $keyword);
									?>
								</h4> -->
							</div>
	</div>
							<div class="separator"></div>
</div>     



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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'VAWC'
				ORDER BY admincomp_id ASC";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC";
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
		$stmt->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'VAWC'
				ORDER BY admincomp_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints 
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
			<hr />
			<h5>VAWC</h5>
			<hr /> 
		</div>

				
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Blotter ID</th>
										<th width="5%">Name of Complainant</th>
										<th width="5%">Age</th>
										<th width="5%">Gender</th>
										<th width="5">Address</th>
										<th width="15%">Incident Address</th>
										<th width="5%">Contact No</th>
										<th width="5%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['admincomp_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_Vawcdetails.php?id=<?php echo $data['admincomp_id'];?>'">View Details</button></td>
									
									<!-- <td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td> -->
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
						
					</div>
							<div class="col-md-12 pagination">
								<!-- <h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'compAdmin_Vawcpage.php', '', $total_records, $keyword);
									?>
								</h4> -->
							</div>
	</div>
							<div class="separator"></div>
</div>     
				</div>


                
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'BCPC'
				ORDER BY admincomp_id ASC";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC";
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
		$stmt->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints WHERE dept = 'BCPC'
				ORDER BY admincomp_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image
				FROM admin_complaints 
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['admincomp_id'], 
				$data['n_complainant'],
				$data['comp_age'],
				$data['comp_gender'],
				$data['comp_address'],
				$data['inci_address'],
				$data['contactno'],
				$data['n_violator'],
				$data['violator_age'],
				$data['violator_gender'],
				$data['relationship'],
				$data['violator_address'],
				$data['witnesses'],
				$data['complaints'],
				$data['dept'],
				$data['app_date'],
				$data['app_by'],
				$data['blotterid_image']
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
			<hr />
			<h5>BCPC</h5>
			<hr /> 
		</div>

				
					<div class="col-md-12">
							<table class="content-table">
								<thead>
									<tr class="t_head">
										<th width="5%">Blotter ID</th>
										<th width="5%">Name of Complainant</th>
										<th width="5%">Age</th>
										<th width="5%">Gender</th>
										<th width="5">Address</th>
										<th width="15%">Incident Address</th>
										<th width="5%">Contact No</th>
										<th width="5%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['admincomp_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_BCPCdetails.php?id=<?php echo $data['admincomp_id'];?>'">View Details</button></td>
									
									<!-- <td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td> -->
				
								</tr>	
								</tbody>
								<?php 
								} 
							}
						?>
							</table>
						
					</div>
							<div class="col-md-12 pagination">
								<!-- <h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'compAdmin_BCPCpage.php', '', $total_records, $keyword);
									?>
								</h4> -->
							</div>
	</div>
							<div class="separator"></div>
</div>     
				</div>
			</section>
			<script src="../bootstrap/jquery.min.js"></script>
			<script src="../bootstrap/js/bootstrap.min.js"></script>
			
			<script>
				document.querySelector("#approvedate").valueAsDate = new Date();

			</script>
	</body>
</html>