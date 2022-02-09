<?php
session_start();

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

<?php
	include ("../db/conn.php");
	include ("../db/user.php");
	include('../announcement_includes/functions.php'); 

	
<<<<<<< HEAD
=======
		$blotterID = $_POST['blotterID'];
		$complainant = $_POST['complainant'];
		$c_age = $_POST['c_age'];
		$c_gender = $_POST['c_gender'];
		$c_address = $_POST['c_address'];
		$incident_add = $_POST['incident_add'];
		$violators = $_POST['violators'];
		$v_age = $_POST['v_age'];
		$v_gender = $_POST['v_gender'];
		$v_rel = $_POST['v_rel'];
		$v_address = $_POST['v_address'];
		$witness = $_POST['witness'];
		$ex_complaints = $_POST['ex_complaints'];
		$dept = $_POST['dept'];
		$app_date = $_POST['app_date'];
		$status = $_POST['status'];
		$app_by = $_POST['app_by'];

		// $stmt = $db->prepare("INSERT INTO admin_complaints(blotterID, complainant, c_age, c_gender, c_address, incident_add, violators, v_age, v_gender, v_rel, v_address, witness, ex_complaints, dept, app_date, app_by) SELECT  blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address, n_violator, violator_age, violator_gender, relationship, violator_address, witnesses, complaints, id_type, id_name, id_image FROM blotterdb");

		// $stmt = $db->prepare("DELETE FROM blotterdb WHERE blotter_id = blotter_id");
			
			$stmt = $db->prepare("INSERT INTO admin_complaints (blotterID, complainant, c_age, c_gender, c_address, incident_add, violators, v_age, v_gender, v_rel, v_address, witness, ex_complaints, dept, app_date, app_by) VALUES (:blotterID, :complainant, :c_age, :c_gender, :c_address, :incident_add, :violators, :v_age, :v_gender, :v_rel, :v_address, :witness, :ex_complaints, :dept, :app_date, :app_by)");
	
			$stmt->bindParam(':blotterID', $blotterID);
			$stmt->bindParam(':complainant', $complainant);
			$stmt->bindParam(':c_age', $c_age);
			$stmt->bindParam(':c_gender', $c_gender);
			$stmt->bindParam(':c_address', $c_address);
			$stmt->bindParam(':incident_add', $incident_add);
			$stmt->bindParam(':violators', $violators);
			$stmt->bindParam(':v_age', $v_age);
			$stmt->bindParam(':v_gender', $v_gender);
			$stmt->bindParam(':v_rel', $v_rel);
			$stmt->bindParam(':v_address', $v_address);
			$stmt->bindParam(':witness', $witness);
			$stmt->bindParam(':ex_complaints', $ex_complaints);
			$stmt->bindParam(':dept', $dept);
			$stmt->bindParam(':app_date', $app_date);
			$stmt->bindParam(':app_by', $app_by);


				
		if($stmt->execute()){
			echo "<script>
					alert('Successfully added!');
					window.location.href='compAdmin_dashboard.php';
				 </script>";
		}else{
			echo '<script>
					alert("An error occured")
				</script>';
		}	
	}
>>>>>>> b2b077d2ae4859e2c93a98e25f81e8db883d1887
	?>


	<!-- <?php
	//  if(isset($_POST['approvebtn'])){
	// 	$stmt = $db->prepare("UPDATE blotterdb SET status ='Done' WHERE blotter_id = :blotter_id");
		 
	?>  -->

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
		 .home-section{
			min-height: 95vh;''
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
		.viewbtn{width: 45px; height: 35px;}
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
			  <a class="side_bar" href="compAdmin_dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar" href="compAdmin_Lupon.php">
				 <i class='bx bx-user-circle lupon'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar" href="compAdmin_BPSO.php">
				 <i class='bx bx-user bpso'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check vawc'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin bcpc'></i>
				 <span class="links_name">BCPC</span>
			   </a>
			   <span class="tooltip">BCPC</span>
			 </li>
			  
			 <li>
			   <a class="side_bar" href="vawc_sms.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
			 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
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
			 
	 <div>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="bx bxs-building fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';

					$query = "SELECT * FROM admin_complaints Where dept='LUPON' ORDER BY blotterID";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>LUPON</h4>
			</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="bx bxs-building fa-fw w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';

						$query = "SELECT * FROM admin_complaints Where dept='BPSO' ORDER BY blotterID";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
			
					</div>
					<div class="w3-clear"></div>
					<h4>BPSO</h4>
				</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="bx bxs-building fa-fw w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT * FROM admin_complaints Where dept='VAWC' ORDER BY blotterID";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>VAWC</h4>
				</div>
			</div>
			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-text-white w3-padding-16">
					<div class="w3-left"><i class="bx bxs-building w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
	
						$query = "SELECT * FROM admin_complaints Where dept='BCPC' ORDER BY blotterID";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
					
					</div>
					<div class="w3-clear"></div>
					<h4>BCPC</h4>
				</div>
			</div>

			<br>
			<br>
			<br>
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
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status
				FROM blotterdb WHERE status = 'Pending'
				ORDER BY blotter_id DESC";
	}else{
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status
				FROM blotterdb
				WHERE n_complainant LIKE ? 
				ORDER BY blotter_id DESC";
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
				$data['complaints'],
				$data['id_type'],
				$data['blotterid_image'],
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
	$offset = 5;
					
	//lets calculate the LIMIT for SQL, and save it $from
	if ($page){
		$from 	= ($page * $offset) - $offset;
	}else{
		//if nothing was given in page request, lets load the first page
		$from = 0;	
	}	
	
	if(empty($keyword)){
		$sql_query = "SELECT  blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status
				FROM blotterdb WHERE status = 'Pending'
				ORDER BY blotter_id DESC LIMIT ?, ?";
	}else{
		$sql_query = "SELECT blotter_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, id_type, blotterid_image, status
				FROM blotterdb 
				WHERE n_complainant LIKE ? 
				ORDER BY blotter_id DESC LIMIT ?, ?";
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
				$data['complaints'],
				$data['id_type'],
				$data['blotterid_image'],
				$data['status']
				);
		// for paging purpose
		$total_records_paging = $total_records; 
	}

<<<<<<< HEAD
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

			<h5>Admin Complaints</h5>
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
										<th width="5%">Blotter ID</th>
										<th width="5%">Name of Complainant</th>
										<th width="5%">Age</th>
										<th width="5%">Gender</th>
										<th width="5">Address</th>
										<th width="15%">Incident Address</th>
										<th width="5%">Contact No</th>
										<th width="5%">Status</th>
										<th width="5%">Action</th>
										<th width="5%">View Details</th>
										<!-- <th width="5%">Message</th> -->
									</tr>
								</thead>
							<?php 
								while ($stmt_paging->fetch()){ ?>
								<tbody>
=======
                    unset($_SESSION['message']);
                }
            ?>
						<table class="content-table table_indigency"  id="table">
						
							<?php
							$mquery = $db->prepare("SELECT * FROM blotterdb WHERE status='Pending' ORDER BY blotter_id ASC");
							$mquery ->execute();
							$countn = $mquery->fetchAll();
							?>
							<thead>
								<tr class="t_head">
									<th>Complaint ID</th>
									<th>Fullname</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Address</th>
									<th>Incident Address</th>
									<th>Name of violaters</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Relationship</th>
									<th>Address</th>
									<th>Witnesses</th>
									<th>Complaints</th>
									<th>ID Type</th>
									<th>ID Image</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data) 
							{
							?>
>>>>>>> b2b077d2ae4859e2c93a98e25f81e8db883d1887
								<tr class="table-row">
									<td><?php echo $data ['blotter_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
									<td><input type="text" class="tblinput inpwidth" style="background-color: #e1edeb;color: #4CAF50; border: 1px solid #4CAF50; border-radius: 20px;" value="<?php echo $data ['status']; ?>"></td>

									<td><button class="view_approvebtn">Mark as Done</button></td>
									
									<td><button class="view_approvebtn" onclick="location.href='compAdmin_dashdetails.php?id=<?php echo $data['blotter_id'];?>'">View Details</button></td>
									
									<!-- <td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td> -->
				
								</tr>	
<<<<<<< HEAD
								</tbody>
								<?php 
								} 
=======
						
										<div id="process_<?php echo $data['blotter_id']; ?>" class="employeemanagement-modal modal">
											
													<div class="modal-contentemployee animate displayflex">
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														
															
															<div>
															<div class="information col">
																	<label class="employee-label"> Valid ID </label>
																	<img src="upload/<?php echo $data['id_image']?>" width="90" height="90" title="<?=$data['id_name'] ?>" name="id_image"/>

																</div>
															</div>
															<div id="Complainant">
																<h5 style="text-align: center;">Complainant</h5>
																<hr>
															
																<div class="information col">
																	<label class="employee-label"> Complainant's ID </label>
																	<input class="form-control inputtext inputele"  id="blotterID" name ="blotterID" type="text" value="<?php echo $data['blotter_id'];?>">
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Complainant's  name </label>
																	
																	<input class="form-control inputtext inputele" id="complainant" name ="complainant" type="text" value="<?php echo $data['n_complainant'];?>">
																</div>
															

																
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Age </label>
																		<?php echo isset($error['comp_age']) ? $error['comp_age'] : '';?>
																		<input class="form-control inputtext inputele" id="c_age" name ="c_age" type="text" value="<?php echo $data['comp_age'];?>"> 
																	</div>
																	
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Gender </label> 
												
																		<input class="form-control inputtext inputele" id="c_gender" name ="c_gender" type="text" value="<?php echo $data['comp_gender'];?>"> 
																	</div>	
															
																		<div class="information col">
																			<label class="employee-label">Complainant's  Address </label>
																			<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																			<input  class="form-control inputtext inputele" id="c_address" name ="c_address" type="text"  
																			value="<?php echo $data['comp_address']; ?>"> 
																		</div>
																	
																	
																		<div class="information col">
																			<label class="employee-label">Incident Address </label>
																			<input class="form-control inputtext inputele" id="incident_add" name ="incident_add" type="text"  value="<?php echo $data['inci_address']; ?>"> 
																		</div>
															</div>
														
															<div id="Violator" >
															<h5 style="text-align: center;">Violator</h5>

															<hr>
															<div class="information col">
																<label class="employee-label"> Violator's name </label>
																<input class="form-control inputtext inputele" id="violators" name ="violators" type="text" value="<?php echo $data['n_violator']; ?>">
															</div>

															
																<div class="information col">
																	<label class="employee-label">Violator's Age </label>
																	<input class="form-control inputtext lname  inputele" id="v_age" name ="v_age" type="text"  placeholder="Last Name" value="<?php echo $data['violator_age']; ?>"> 
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Violator's Gender </label> 
																	<input class="form-control inputtext fname  inputele" id="v_gender" name ="v_gender" type="text"
																	value="<?php echo $data['violator_gender']; ?>"> 
																</div>


															<div class="information">
																<label class="employee-label"> Relationship </label>
																<input class="form-control inputtext fname inputele" id="v_rel" name ="v_rel" type="text" value="<?php echo $data['relationship']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Violator's Address </label>
																<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																<input  class="form-control inputtext control-label address inputele" id="v_address" name ="v_address" type="text" value="<?php echo $data['violator_address']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Witnesses </label>
																<input class="form-control inputtext inputele" id="witness" name ="witness" type="text" value="<?php echo $data['witnesses']; ?>">
															</div>

															<div class="information col">
																<label class="employee-label"> Complaints </label>
																<textarea name="ex_complaints" class="form-control inputtext " id="ex_complaints" ><?php echo $data['complaints']; ?></textarea>
															</div>
															</div>
															
															<div id="Approval" >
															<span onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='none'" class="topright">&times;</span>
															
																
																<div class="information col">
																	<label class="employee-label"> Department </label>
																	<select class="form-control inputtext control-label" style="padding: 0px 0px 0px 
																	5px; " id="dept" name="dept">
																		<option disabled>--Select--</option>
																		<option value="BCPC">BCPC</option>
																		<option value="VAWC">VAWC</option>
																		<option value="LUPON">LUPON</option>
																		
																		<option value="BPSO">BPSO</option>
																		
																		<option style="color: red;" value="DENY">DENY</option>
																	</select>
																</div>
																
																<div class="information">
																	<label class="employee-label ">Approval Date </label>
																	<input type="date" class="form-control inputtext control-label" id="approvedate" name="app_date">
																</div>

																<div class="information col">
																<label class="employee-label"> Approved By </label>
																<input class="form-control inputtext control-label" id="app_by" value="<?php echo $user; ?>" name ="app_by" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
															</div>
																<div class="form-group">
																<input required type="hidden" class="form-control form-text form-text-desc" id="status" name="status" value="Done">
																</div>
																<br>

																<div class="information">   
																<button type="submit" id="approvebtn" name="approvebtn" value="empBtn" class="inputtext submtbtn approvebtn"><i class="bx bx-check"></i>Approve
																
															</button>  
															</div>

															
															<div class="information">   
																<button type="submit" id="donebtn" name="donebtn" value="empBtn" class="inputtext submtbtn donebtn"><i class="bx bx-check"></i>DONE
															</button> 
															</div>
										                	</div>
													</form>
												</div>
											</div>					
							<?php
>>>>>>> b2b077d2ae4859e2c93a98e25f81e8db883d1887
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