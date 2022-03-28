<?php session_start();

if (!isset($_SESSION["type"])) {
	header("location: officials.php");
}
require 'db/conn.php';
include('db/barcharts.php');
include('db/accounting_computation.php')
?>

<?php
$user = '';

if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
}
?>

<?php
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
	<link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
	<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&family=Signika&display=swap" rel="stylesheet">

	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Visit Page </title>

	<style>
		* {
			font-family: "Poppins", sans-serif;
		}

		/* #home-section{background: url('resident-img/backgrounds/Brgy-Commonwealth.jpg')} */

		.w3padd,
		.w3point {
			margin-bottom: 5px;
		}

		.w3back {
			background: #04AA6D
		}

		.w3point:hover {
			cursor: pointer;
			background: orange;
			color: green
		}

		.w3bord {
			border: 2px solid white;
		}

		.w3borderbot {
			border-bottom-left-radius: 15px;
			border-bottom-right-radius: 15px;
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
		}

		.w3bordertop {
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
		}
	</style>
</head>

<body onload="display_ct()">
	<!-- Side Navigation Bar-->
	<div class="sidebar captain_sidebar myDIV">
		<div class="logo-details">
			<img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="Brgy Commonwealth Logo" />
			<div class="logo_name">Barangay Captain</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button " href="captaindashboard.php">
					<i class='bx bx-category-alt dash'></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="contactmodule.php">
					<i class='bx bx-user-circle admin'></i>
					<span class="links_name">Contacts</span>
				</a>
				<span class="tooltip">Contacts</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="usermanagement.php">
					<i class='bx bx-group employee'></i>
					<span class="links_name">User Management</span>
				</a>
				<span class="tooltip">User Management</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="residentcensus.php">
					<i class='bx bxs-group census'></i>
					<span class="links_name">Resident Census</span>
				</a>
				<span class="tooltip">Resident Census</span>
			</li>
            
			<li>
				<a class="side_bar nav-button" href="postannouncement.php">
					<i class='bx bx-news iannouncement'></i>
					<span class="links_name">Post Announcement</span>
				</a>
				<span class="tooltip">Post Announcement</span>
			</li>

            <li>
				<a class="side_bar nav-button nav-active" href="barangay_official_visit_page.php">
					<i class='bx bx-log-in iannouncement'></i>
					<span class="links_name">Visit Department</span>
				</a>
				<span class="tooltip">Visit Department</span>
			</li>

			<li class="profile">
				<div class="profile-details">
					<div class="name_job">
						<div class="job"><strong><?php echo $user; ?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> || Online </div>
					</div>
				</div>
				<a href="officiallogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out"></i>
				</a>
			</li>
		</ul>
	</div>

	<!-- Middle Section -->
	<section class="home-section" id="home-section">

		<!-- Top Section -->
		<section class="top-section">
			<div class="top-content">

				<div>
					<h5>Visit Department
						<a href="#" class="circle">
							<img src="img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

        <fieldset>
				<legend>Department</legend>
				<div class="w3-quarter w3padd ">
					<a href="includes/accounting_dashboard.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>ACCOUNTING</h3>
							</div>
						</div>
					</a>
				</div>

				<div class="w3-quarter w3padd ">
					<a href="bpso.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>BPSO</h3>
							</div>
						</div>
					</a>
				</div>

				<div class="w3-quarter w3padd ">
					<a href="includes/dashboard.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>DOC REQ</h3>
							</div>
						</div>
					</a>
				</div>

				<div class="w3-quarter w3padd">
					<a href="includes/compAdmin_dashboard.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>COMPLAINTS</h3>
							</div>
						</div>
					</a>
				</div>


				<div class="w3-quarter">
					<a href="includes/compAdmin_dashboard.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>BCPC</h3>
							</div>
						</div>
					</a>
				</div>

				<div class="w3-quarter">
					<a href="includes/vawcdashboard.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>VAWC</h3>
							</div>
						</div>
					</a>
				</div>

				<div class="w3-quarter">
					<a href="lupon.php">
						<div class="w3-container w3bord w3back w3point w3borderbot">
							<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
							<div class="w3-right">
								<h3>LUPON</h3>
							</div>
						</div>
					</a>
				</div>
			</fieldset>


			<div style="display: flex; justify-content: center; align-items: center;margin-left: -50px;">
				<div id="piechart" style="width: 40%; height: 300px; margin-right: 30px;"></div>
				<div id="columnchart_material" style="width: 36%; height: 300px;"></div>
			</div>
	</section>

</body>

<!-- Scripts Section-->
<script src="resident-js/barangay.js"></script>

</html>