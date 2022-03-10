<?php
	session_start();

	if(!isset($_SESSION["type"])){
		header("location: 0index.php");
	}
	require_once 'db/conn.php';

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

		<title> Lupon Dashboard </title>

		<style>
			.content-table thead tr{
				text-align: left !important;
			}
			.content-table tbody tr{
				text-align: left !important;
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
				<li class="active">
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
				<li>
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
			<div>
				<div class="w3-row-padding">
					<div class="w3-quarter">
						<div class="w3-container w3-red w3-padding-16">
							<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
							<div class="w3-right">
								<?php 
									require 'db/conn.php';
									$sql = "
										SELECT 
											ac.`admincomp_id`
										FROM admin_complaints ac
										LEFT JOIN luponCases lc USING(admincomp_id)
										WHERE ac.`dept` = 'LUPON' AND lc.`admincomp_id` IS NULL
										ORDER BY ac.`app_date` ASC;
									";
									$stmt = $db->query($sql);
									$stmt->execute();
									$total = $stmt->rowCount();

									echo "<h3>$total</h3>";
								?>
							</div>
							<div class="w3-clear"></div>
							<a href= "lupon_ongoing.php">Awaiting Schedule</a>
						</div>
					</div>
					<div class="w3-quarter">
						<div class="w3-container w3-red w3-padding-16">
							<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
							<div class="w3-right">
								<?php 
									require 'db/conn.php';
									$sql = "
										SELECT 
											lc.`admincomp_id`
										FROM luponCases lc
										JOIN admin_complaints ac USING(admincomp_id)
										JOIN luponStatus ls USING(statusID)
										JOIN hearingPersonnels hp USING(personnelID)
										WHERE statusID = 1
										ORDER BY lc.`hearingDate` ASC;
									";
									$stmt = $db->query($sql);
									$stmt->execute();
									$total = $stmt->rowCount();

									echo "<h3>$total</h3>";
								?>
							</div>
							<div class="w3-clear"></div>
							<a href= "lupon_ongoing.php">Upcoming Hearing</a>
						</div>
					</div>
					<div class="w3-quarter">
						<div class="w3-container w3-orange w3-text-white w3-padding-16 ">
							<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
							<div class="w3-right">
								<?php 
									require 'db/conn.php';
									$sql = "
										SELECT 
											lc.`admincomp_id`
										FROM luponCases lc
										JOIN admin_complaints ac USING(admincomp_id)
										JOIN luponStatus ls USING(statusID)
										JOIN hearingPersonnels hp USING(personnelID)
										WHERE statusID = 2
										ORDER BY lc.`hearingDate` ASC;
									";
									$stmt = $db->query($sql);
									$stmt->execute();
									$total = $stmt->rowCount();

									echo "<h3>$total</h3>";
								?>
								</div>
							<div class="w3-clear"></div>
							<a href= "lupon_active.php">Active Cases</a>
						</div>
					</div>
					<div class="w3-quarter">
						<div class="w3-container w3-blue w3-padding-16">
							<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
							<div class="w3-right">
								<?php 
									require 'db/conn.php';
									$sql = "
										SELECT 
											lc.`admincomp_id`
										FROM luponCases lc
										JOIN admin_complaints ac USING(admincomp_id)
										JOIN luponStatus ls USING(statusID)
										JOIN hearingPersonnels hp USING(personnelID)
										WHERE statusID = 4
										ORDER BY ac.`admincomp_id` ASC;
									";
									$stmt = $db->query($sql);
									$stmt->execute();
									$total = $stmt->rowCount();

									echo "<h3>$total</h3>";
								?>
							</div>
							<div class="w3-clear"></div>
							<a href= "lupon_settled.php">Settled</a>
						</div>
					</div>
					<div class="w3-quarter">
						<div class="w3-container w3-teal w3-padding-16"  >
							<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
							<div class="w3-right"> 
								<?php 
									require 'db/conn.php';
									$sql = "
										SELECT 
											lc.`admincomp_id`
										FROM luponCases lc
										JOIN admin_complaints ac USING(admincomp_id)
										JOIN luponStatus ls USING(statusID)
										JOIN hearingPersonnels hp USING(personnelID)
										WHERE statusID = 3
										ORDER BY ac.`admincomp_id` ASC;
									";
									$stmt = $db->query($sql);
									$stmt->execute();
									$total = $stmt->rowCount();

									echo "<h3>$total</h3>";
								?>
							</div>
							<div class="w3-clear"></div>
							<a href= "lupon_mediation.php">Not Settled </a>
						</div>
					</div>
				</div>
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
							<th>Status</th>
							<th>Action</th>
						</tr>                       
					</thead>
					<tbody>
						<?php
							$sql = "
								SELECT
									ac.`admincomp_id`,
									ac.`n_complainant`,
									ac.`n_violator`,
									ac.`app_date`,
									ac.`complaints`,
									IFNULL(ls.`status`, 'awaiting schedule') AS `status`
								FROM admin_complaints ac
								LEFT JOIN luponCases lc USING(admincomp_id)
								LEFT JOIN luponStatus ls USING(statusID)
								WHERE ac.`dept` = 'LUPON'
								ORDER BY ac.`admincomp_id` DESC;
							";
							$stmt = $db->prepare($sql);
							$stmt->execute();
							if($stmt->rowCount() > 0){
								while($row = $stmt->fetch()){
						?>
						<tr class="table-row">
							<td class="text-center"><?php echo $row['admincomp_id']; ?></td>
							<td><?php echo ucwords($row['n_complainant']); ?></td>
							<td><?php echo ucwords($row['n_violator']); ?></td>
							<td><?php echo date("F d, Y", strtotime($row['app_date'])); ?></td>
							<td><?php echo mb_strimwidth($row['complaints'], 0, 50, "..."); ?></td>
							<td><?php echo strtoupper($row['status']); ?></td>
							<td class="text-end">
								<a href="lupon_caseDetails.php?id=<?php echo $row['admincomp_id']; ?>" class="btn btn-info btn-sm">View Details</a>
							</td>	
						</tr>
						<?php }} ?>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>			
					
					