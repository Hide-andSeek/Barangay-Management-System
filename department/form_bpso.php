<?php
session_start();
include "announcement_includes/functions.php";
require 'db/conn.php';

if (!isset($_SESSION["type"])) {
	header("location: 0index.php");
}

$user = '';
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}

$dept = '';

if (isset($_SESSION['type'])) {
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
	<script src="resident-js/sweetalert.min.js"></script>
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

	<title> BPSO Dashboard </title>

	<style>
		* {
			font-size: 13px;
		}

		a {
			text-decoration: none;
		}

		.pagination {
			margin-top: 32%
		}

		.page {
			margin-left: 15px;
		}

		.content-table thead tr {
			text-align: left !important;
		}

		.content-table tbody tr {
			text-align: left !important;
		}
	</style>
</head>

<body>
	<script>
		swal("Welcome to:", "Barangay Commonwealth: BPSO Department");
	</script>
	<!-- Side Navigation Bar-->
	<div class="sidebar">
		<div class="logo-details">
			<img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="" />
			<div class="logo_name">BPSO Department</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li class="active">
				<a class="side_bar" href="bpso.php">
					<i class='bx bx-grid-alt dash'></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a class="side_bar" href="bpso_newCases.php">
					<i class='fas fa-briefcase'></i>
					<span class="links_name">New Cases</span>
				</a>
				<span class="tooltip">New Cases</span>
			</li>
			<li>
				<a class="side_bar" href="bpso_blotterCases.php">
					<i class='fas fa-user-check'></i>
					<span class="links_name">Blotter Cases</span>
				</a>
				<span class="tooltip">Blotter Cases</span>
			</li>
			<li>
				<a class="side_bar" href="bpso_deniedCases.php">
					<i class='fas fa-user-minus'></i>
					<span class="links_name">Denied Cases</span>
				</a>
				<span class="tooltip">Denied Cases</span>
			</li>
			<li class="profile">
				<div class="profile-details">
					<div class="name_job">
						<div class="job"><strong><?php echo $user; ?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> | Online</div>
					</div>
				</div>
				<a href="emplogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out"></i>
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
					<h5>BARANGAY PUBLIC SAFETY OFFICER (BPSO) <a href="#" class="circle"><img src="img/dt.png"></a></h5>
				</div>
			</div>
		</section>
		<br>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="fa fa-briefcase fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php
						$sql = "
								SELECT 
									ac.`admincomp_id`,
									ac.`n_violator`,
									ac.`violator_age`,
									ac.`violator_gender`,
									ac.`violator_address`,
									ac.`inci_address`,
									ac.`complaints`,
									ac.`app_date`
								FROM admin_complaints ac
								LEFT JOIN bpsoCases bc USING(admincomp_id)
								WHERE dept = 'BPSO' AND STATUS = 'Pending' AND bc.`admincomp_id` IS NULL
								ORDER BY ac.`app_date` DESC;
							";
						$stmt = $db->prepare($sql);
						$stmt->execute();
						$total = $stmt->rowCount();

						echo "<h3>{$total}</h3>";
						?>
					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>New Cases</h4>
					</div>
					<br>
					<a href="bpso_newCases.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>
			<div class="w3-quarter">
				<div class="w3-container w3-blue w3-padding-16">
					<div class="w3-left"><i class="fa fa-user-check fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php
						$sql = "
								SELECT
									ac.`admincomp_id`,
									ac.`n_violator`,
									ac.`violator_age`,
									ac.`violator_gender`,
									ac.`violator_address`,
									ac.`inci_address`,
									ac.`complaints`,
									ac.`app_date`
								FROM bpsoCases bc
								JOIN admin_complaints ac USING(admincomp_id)
								WHERE bc.`isDenied` = 0
								ORDER BY ac.`app_date` DESC;
							";
						$stmt = $db->prepare($sql);
						$stmt->execute();
						$total = $stmt->rowCount();

						echo "<h3>{$total}</h3>";
						?>
					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>Blottler Cases</h4>
					</div>
					<br>
					<a href="bpso_blotterCases.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>
			<div class="w3-quarter">
				<div class="w3-container w3-red w3-padding-16">
					<div class="w3-left"><i class="fa fa-user-minus fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php
						$sql = "
								SELECT
									ac.`admincomp_id`,
									ac.`n_violator`,
									ac.`violator_age`,
									ac.`violator_gender`,
									ac.`violator_address`,
									ac.`inci_address`,
									ac.`complaints`,
									ac.`app_date`
								FROM bpsoCases bc
								JOIN admin_complaints ac USING(admincomp_id)
								WHERE bc.`isDenied` = 1
								ORDER BY ac.`app_date` DESC;
							";
						$stmt = $db->prepare($sql);
						$stmt->execute();
						$total = $stmt->rowCount();

						echo "<h3>{$total}</h3>";
						?>
					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>Denied Cases</h4>
					</div>
					<br>
					<a href="bpso_deniedCases.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div id="content" class="container col-md-12" style="margin-top: 50px;">
			<!-- Search -->
			<div class="search_content">
				<form class="list_header" method="get">
					<label>
						Search:
						<input type="text" class=" r_search" name="search" placeholder="Blotter ID / Name" value="<?php echo isset($_GET['search']) ? htmlentities($_GET['search']) : "" ?>" />
						<button type="submit" class="btn btn-primary"><i class="bx bx-search-alt"></i></button>
					</label>
				</form>
			</div>
			<!-- ===== Table ===== -->
			<div class="col-md-12">
				<table class="content-table">
					<thead>
						<tr class="t_head">
							<th width="5%" style="text-align: center">Blotter ID</th>
							<th width="5%" style="text-align: center">Name of Violator</th>
							<th width="5%" style="text-align: center">Age</th>
							<th width="5%" style="text-align: center">Gender</th>
							<th width="5%" style="text-align: center">Address</th>
							<th width="5%" style="text-align: center">Incident Address</th>
							<th width="5%" style="text-align: center">Complaint</th>
							<th width="5%" style="text-align: center">Status</th>
							<th width="5%" style="text-align: center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_GET["search"]) && !empty($_GET["search"])) {
							$search = $_GET["search"];
							$sql = "
										SELECT 
											ac.`admincomp_id`,
											ac.`n_violator`,
											ac.`violator_age`,
											ac.`violator_gender`,
											ac.`violator_address`,
											ac.`inci_address`,
											ac.`complaints`,
											ac.`app_date`,
											bc.`isDenied`
										FROM admin_complaints ac
										LEFT JOIN bpsoCases bc USING(admincomp_id)
										WHERE ac.`dept` = 'BPSO' AND ac.`admincomp_id` LIKE ?
										OR ac.`dept` = 'BPSO' AND ac.`n_violator` LIKE ?
										ORDER BY ac.`app_date` DESC;
									";
							$stmt = $db->prepare($sql);
							$stmt->execute(["%$search%", "%$search%"]);
						} else {
							$sql = "
										SELECT 
											ac.`admincomp_id`,
											ac.`n_violator`,
											ac.`violator_age`,
											ac.`violator_gender`,
											ac.`violator_address`,
											ac.`inci_address`,
											ac.`complaints`,
											ac.`app_date`,
											bc.`isDenied`
										FROM admin_complaints ac
										LEFT JOIN bpsoCases bc USING(admincomp_id)
										WHERE ac.`dept` = 'BPSO'
										ORDER BY ac.`app_date` DESC;
									";
							$stmt = $db->prepare($sql);
							$stmt->execute();
						}

						if ($stmt->rowCount() > 0) {
							while ($row = $stmt->fetch()) {
						?>
								<tr class="table-row">
									<td class="text-center"><?php echo $row['admincomp_id']; ?></td>
									<td class="text-center"><?php echo ucwords($row['n_violator']); ?></td>
									<td class="text-center"><?php echo $row['violator_age']; ?></td>
									<td class="text-center"><?php echo ucwords($row['violator_gender']); ?></td>
									<td class="text-center"><?php echo ucwords($row['violator_address']); ?></td>
									<td class="text-center"><?php echo ucwords($row['inci_address']); ?></td>
									<td class="text-center"><?php echo mb_strimwidth($row['complaints'], 0, 50, "..."); ?></td>
									<td>
										<?php
										if ($row['isDenied'] == "") {
											echo "New Case";
										} else {
											echo ($row['isDenied'] == 0) ? "Blotter Case" : "Denied Case";
										}
										?>
									</td>
									<td>
										<a href="bpso_caseDetails.php?id=<?php echo $row['admincomp_id']; ?>" class="btn btn-info btn-sm">View Details</a>
									</td>
								</tr>
							<?php }
						} else { ?>
							<tr>
								<td colspan="8" class="text-center text-muted">No records to show</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-12 pagination"></div>
		</div>
		<div class="separator"></div>
	</section>
</body>

</html>