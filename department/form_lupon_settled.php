<?php
	session_start();

	if(!isset($_SESSION["type"])){
		header("location: 0index.php");
	}
	require 'db/conn.php';

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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
		<link rel="stylesheet" href="css/styles.css">

		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--Font Styles-->
		<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
		<!-- Boxicons CDN Link -->
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/captain.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title> Lupon Case Details </title>

		<style>
			.content-table thead tr{
				text-align: left !important;
			}
			.content-table tbody tr{
				text-align: left !important;
			}
			.r_search{
				padding: 0 10px;
				width: 250px;
			}
		</style>
	</head>
	<body>
		<!-- Side Navigation Bar-->
		<div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar" href="lupon.php">
						<i class='bx bx-grid-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					<span class="tooltip">Dashboard</span>
				</li>
				<li>
					<a class="side_bar" href="lupon_awaiting_schedule.php">
						<i class='fas fa-calendar-day'></i>
						<span class="links_name">Awaiting Schedule</span>
					</a>
					<span class="tooltip">Awaiting Schedule</span>
				</li>
				<li>
					<a class="side_bar" href="lupon_upcoming_hearings.php">
						<i class='fas fa-user-clock'></i>
						<span class="links_name">Upcoming Hearings</span>
					</a>
					<span class="tooltip">Upcoming Hearing</span>
				</li>
				<li>
					<a class="side_bar" href="lupon_active_cases.php">
						<i class='fas fa-briefcase'></i>
						<span class="links_name">Active Cases</span>
					</a>
					<span class="tooltip">Active Cases</span>
				</li>
				<li class="active">
					<a class="side_bar" href="lupon_settled.php">
						<i class='fas fa-user-check'></i>
						<span class="links_name">Settled Cases</span>
					</a>
					<span class="tooltip">Settled Cases</span>
				</li>
				<li>
					<a class="side_bar" href="lupon_not_settled.php">
						<i class='fas fa-user-minus'></i>
						<span class="links_name">Not Settled</span>
					</a>
					<span class="tooltip">Not Settled</span>
				</li>
				<!--Setting Section-->
				<li>
					<a class="side_bar" href="lupon_settings.php">
						<i class='bx bx-cog' ></i>
						<span class="links_name">Setting</span>
					</a>
					<span class="tooltip">Setting</span>
				</li>
				<li class="profile">
					<div class="profile-details">
						<img class="profile_pic" src="img/1.jpeg">
						<div class="name_job">
							<div class="job"><strong><?php echo $user;?></strong></div>
							<div class="job" id=""><?php echo $dept; ?></div>
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
						<h5>OFFICE OF THE LUPONG TAGAPAMAYAPA
							<a href="#" class="circle"><img src="img/dt.png"></a>
					    </h5>	  
					</div>
				</div>
			</section>
			<br>
			<!-- Search -->
			<div class="search_content">
				<form action="" class="list_header" method="get">
					<div>
						Search: 
						<input type="text" class="r_search" name="search" placeholder="Case No. / Complainant's Name" value="<?php echo (isset($_GET["search"])) ? htmlentities($_GET["search"]) : ""; ?>">
						<button type="submit" class="btn btn-primary" value="Search"><i class="bx bx-search-alt"></i></button>
					</div>	
				</form>
			</div>
			<!-- Table -->
			<div class="reg_table emp_tbl">
				<table class="content-table">
					<thead>
						<tr class="t_head">
							<th>Case No.</th>
							<th>Complainant</th>
							<th>Accused</th>
							<th>Date and Time</th>
							<th>Complaint</th>
							<th>Personnel</th>
							<th>Status</th>
							<th>Action</th>
						</tr>                 
					</thead>
					<tbody>
						<?php
							if(isset($_GET["search"]) && !empty($_GET["search"])){
								$search = htmlspecialchars($_GET["search"]);
								$sql = "
									SELECT 
										ac.`admincomp_id`,
										ac.`n_complainant`,
										ac.`n_violator`,
										ac.`app_date`,
										ac.`complaints`,
										ls.`statusID`,
										ls.`status`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 4 AND ac.`admincomp_id` LIKE ?
									OR ls.`statusID` = 4 AND ac.`n_complainant` LIKE ?
									ORDER BY ac.`admincomp_id` DESC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute(["%$search%","%$search%"]);
							}else{
								$sql = "
									SELECT 
										ac.`admincomp_id`,
										ac.`n_complainant`,
										ac.`n_violator`,
										ac.`app_date`,
										ac.`complaints`,
										ls.`statusID`,
										ls.`status`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 4
									ORDER BY ac.`admincomp_id` DESC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute();
							}
							if($stmt->rowCount() > 0){
								while($row = $stmt->fetch()){
						?>
						<tr class="table-row" data-id="<?php echo $row['admincomp_id']; ?>">
							<td class="text-center"><?php echo $row['admincomp_id']; ?></td>
							<td><?php echo ucwords($row['n_complainant']); ?></td>
							<td><?php echo ucwords($row['n_violator']); ?></td>
							<td><?php echo date("F d, Y", strtotime($row['app_date'])); ?></td>
							<td><?php echo mb_strimwidth($row['complaints'], 0, 50, "..."); ?></td>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo strtoupper($row['status']); ?></td>
							<td class="text-end">
								<a href="lupon_caseDetails.php?id=<?php echo $row['admincomp_id']; ?>" class="btn btn-info btn-sm">View Details</a>
							</td>	
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="8" class="text-center text-muted">No records to show</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>			
					
					