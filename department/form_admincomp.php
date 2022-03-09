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
			  <a class="side_bar nav-button nav-active" href="compAdmin_dashboard.php">
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
			  
			 <li class="profile">
				 <div class="profile-details">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						   <div class="job" id=""><?php echo $dept; ?>|| Online</div>
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
						<h5>Dashboard
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			 <br> 
			 
	 <div style="margin-top: 0;">
			<div class="w3-quarter w3padd ">
				<a href="compAdmin_Lupon.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
						<?php 
							require '../db/conn.php';

							$query = "SELECT * FROM admin_complaints Where dept='LUPON' ORDER BY admincomp_id";
							$query_run = $db->query($query);
							$pdoexecute = $query_run->rowCount();

							echo "<h3>$pdoexecute</h3>"
							
							?>
						</div>
						<div class="w3-clear"></div>
						<h4>LUPON</h4>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd ">
				<a href="compAdmin_BPSO.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
					<?php 
						require '../db/conn.php';

						$query = "SELECT * FROM admin_complaints WHERE dept = 'BPSO' ORDER BY admincomp_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
			
					</div>
					<div class="w3-clear"></div>
					<h4>BPSO</h4>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd ">
				<a href="compAdmin_Vawc.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
						<?php 
							require '../db/conn.php';
		
							$query = "SELECT * FROM admin_complaints WHERE dept = 'VAWC' ORDER BY admincomp_id";
							$query_run = $db->query($query);
							$pdoexecute = $query_run->rowCount();

							echo "<h3>$pdoexecute</h3>"
							?>
						
						</div>
						<div class="w3-clear"></div>
						<h4>VAWC</h4>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd">
				<a href="#">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<?php 
								require '../db/conn.php';
			
								$query = "SELECT * FROM admin_complaints WHERE dept = 'BCPC' ORDER BY admincomp_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h3>$pdoexecute</h3>"
								?>
							
							</div>
							<div class="w3-clear"></div>
							<h4>BCPC</h4>
					</div>
				</a>
			</div>
		

			<div class="w3-quarter">
				<a href="compAdmin_approved.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<?php 
								require '../db/conn.php';
			
								$query = "SELECT admincomp_id FROM admin_complaints ORDER BY admincomp_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h3>$pdoexecute</h3>"
								?>
							
							</div>
							<div class="w3-clear"></div>
							<h4>Approve</h4>
					</div>
				</a>
			</div>

			<div class="w3-quarter">
				<a href="compAdmin_denied.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<?php 
								require '../db/conn.php';
			
								$query = "SELECT * FROM blotterdb WHERE status = 'Deny' ORDER BY blotter_id";
								$query_run = $db->query($query); 
								$pdoexecute = $query_run->rowCount();

								echo "<h3>$pdoexecute</h3>"
								?>
							
							</div>
							<div class="w3-clear"></div>
							<h4>Deny</h4>
					</div>
				</a>
			</div>
	</div>
			<div id="content" class="container col-md-12" style="margin-top: 230px;">
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
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, blotterid_image, complaints, status
				FROM blotterdb WHERE status = 'Pending'
				ORDER BY blotter_id ASC";
	}else{
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, blotterid_image, complaints, status
				FROM blotterdb
				WHERE n_complainant LIKE ? 
				ORDER BY blotter_id ASC";
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
		$stmt->bind_result($data['blotter_id'], 
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
				$data['blotterid_image'],
				$data['complaints'],
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
		$sql_query = "SELECT  blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, blotterid_image, complaints, status
				FROM blotterdb WHERE status = 'Pending'
				ORDER BY blotter_id ASC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, blotterid_image, complaints, status
				FROM blotterdb 
				WHERE n_complainant LIKE ? 
				ORDER BY blotter_id ASC LIMIT ?, ?";
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
		$stmt_paging->bind_result($data['blotter_id'], 
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
				$data['blotterid_image'],
				$data['complaints'],
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
			<h6  style='margin-top: -7px;'> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
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


<!-- Search -->
							<div class="search_content" >
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
										<th width="15%">Blotter ID</th>
										<th width="15%">Name of Complainant</th>
										<th width="15%">Age</th>
										<th width="15%">Gender</th>
										<th width="15">Address</th>
										<th width="15%">Incident Address</th>
										<th width="15%">Contact No</th>
										<th width="15%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
								<tr class="table-row">
									<td><?php echo $data ['blotter_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_dashdetails.php?id=<?php echo $data['blotter_id'];?>'">View Details</button></td>
									
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
								<h4 class="page">
									<?php 
										// for pagination purpose
										$function->doPages($offset, 'compAdmin_dashpage.php', '', $total_records, $keyword);
									?>
								</h4>
							</div>
							<!-- <button class="button" style="vertical-align:middle"><span>Hover </span></button> -->
	</div>
							<div class="separator"></div>
</div>     
				</div>
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