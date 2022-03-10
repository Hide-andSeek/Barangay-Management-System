<?php
session_start();
include('../announcement_includes/functions.php');
require '../db/conn.php';

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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> VAWC Ongoing Case </title>
	 
	 
	 <style>
		div.align-box {
			padding-top: 23px;
			display: flex;
			align-items: center;
		}

		.box-report {
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;
		}

		* {
			font-size: 13px;
		}

		a {
			text-decoration: none;
		}

		.addannounce {
			margin-top: 340px;
			margin-left: 25px;
			font-size: 13px;
		}

		.fileupload {
			font-size: 13px;
			margin-left: 15px;
		}

		.pagination {
			margin-top: 32%
		}

		.page {
			margin-left: 15px;
		}
	 </style>
   </head>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">VAWC Department</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar nav-button" href="vawcdashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar nav-button nav-active" href="vawc_ongoing.php">
				 <i class='bx bx-user-circle ongoing'></i>
				 <span class="links_name">Ongoing Case</span>
			   </a>
			   <span class="tooltip">Ongoing Case</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="vawc_closed.php">
				 <i class='bx bx-user-check closed'></i>
				 <span class="links_name">Closed Case</span>
			   </a>
			   <span class="tooltip">Closed Cased</span>
			 </li>

			 <li>
			   <a class="side_bar nav-button" href="vawc_total.php">
				 <i class='bx bx-user-pin total'></i>
				 <span class="links_name">Total Cases</span>
			   </a>
			   <span class="tooltip">Total Cases</span>
			 </li>	
			 
			 <li class="profile">
				 <div class="profile-details">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> | Online</div>
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
						<h5>Ongoing Case
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  <div id="content" class="container col-md-12" style="margin-top: 50px;">
			<?php
			// create object of functions class
			$function = new functions;

			// create array variable to store data from database
			$data = array();

			if (isset($_GET['keyword'])) {
				// check value of keyword variable
				$keyword = $function->sanitize($_GET['keyword']);
				$bind_keyword = "%" . $keyword . "%";
			} else {
				$keyword = "";
				$bind_keyword = $keyword;
			}

			if (empty($keyword)) {
				$sql_query = "SELECT  admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image, gmail, sms
				FROM admin_complaints WHERE dept = 'VAWC' AND status='Ongoing'
				ORDER BY admincomp_id ASC";
			} else {
				$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image, gmail, sms
				FROM admin_complaints
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC";
			}


			$stmt = $connect->stmt_init();
			if ($stmt->prepare($sql_query)) {
				// Bind your variables to replace the ?s
				if (!empty($keyword)) {
					$stmt->bind_param('s', $bind_keyword);
				}
				// Execute query
				$stmt->execute();
				// store result 
				$stmt->store_result();
				$stmt->bind_result(
					$data['admincomp_id'],
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
					$data['blotterid_image'],
					$data['gmail'],
					$data['sms']
				);
				// get total records
				$total_records = $stmt->num_rows;
			}

			// check page parameter
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = 1;
			}

			// number of data that will be display per page		
			$offset = 50;

			//lets calculate the LIMIT for SQL, and save it $from
			if ($page) {
				$from 	= ($page * $offset) - $offset;
			} else {
				//if nothing was given in page request, lets load the first page
				$from = 0;
			}

			if (empty($keyword)) {
				$sql_query = "SELECT admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image, gmail, sms
				FROM admin_complaints WHERE dept = 'VAWC' AND status='Ongoing'
				ORDER BY admincomp_id ASC LIMIT ?, ?";
			} else {
				$sql_query = "SELECT a admincomp_id, n_complainant, comp_age, comp_gender, comp_address, inci_address,contactno, n_violator, violator_age,violator_gender, relationship, violator_address, witnesses, complaints, dept, app_date, app_by, blotterid_image, gmail, sms
				FROM admin_complaints 
				WHERE n_complainant LIKE ? 
				ORDER BY admincomp_id ASC LIMIT ?, ?";
			}

			$stmt_paging = $connect->stmt_init();
			if ($stmt_paging->prepare($sql_query)) {
				// Bind your variables to replace the ?s
				if (empty($keyword)) {
					$stmt_paging->bind_param('ss', $from, $offset);
				} else {
					$stmt_paging->bind_param('sss', $bind_keyword, $from, $offset);
				}
				// Execute query
				$stmt_paging->execute();
				// store result 
				$stmt_paging->store_result();
				$stmt_paging->bind_result(
					$data['admincomp_id'],
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
					$data['blotterid_image'],
					$data['gmail'],
					$data['sms']
				);
				// for paging purpose
				$total_records_paging = $total_records;
			}

			// if no data on database show "No Reservation is Available"
			if ($total_records_paging == 0) {
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
			} else {
				$row_number = $from + 1;
			?>


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
								<th width="15%">Blotter ID</th>
								<th width="15%">Name of Complainant</th>
								<th width="15%">Age</th>
								<th width="15%">Gender</th>
								<th width="15">Address</th>
								<th width="15%">Incident Address</th>
								<th width="15%">Contact No</th>
								<th width="15%">View Details</th>
							</tr>
						</thead>
						<?php
						while ($stmt_paging->fetch()) { ?>
							<tbody>
								<tr class="table-row">
									<td><?php echo $data['admincomp_id']; ?></td>
									<td><?php echo $data['n_complainant']; ?></td>
									<td><?php echo $data['comp_age']; ?></td>
									<td><?php echo $data['comp_gender']; ?></td>
									<td><?php echo $data['comp_address'] ?></td>
									<td><?php echo $data['inci_address']; ?></td>
									<td><?php echo $data['contactno']; ?></td>

									<td><button class="view_approvebtn" onclick="location.href='vawc_ongoing_viewdetails.php?id=<?php echo $data['admincomp_id']; ?>'">View Details</button></td>

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
					
				</div>
				<!-- <button class="button" style="vertical-align:middle"><span>Hover </span></button> -->
		</div>
		<div class="separator"></div>
		</div>
				
			</section>
	</body>
</html>