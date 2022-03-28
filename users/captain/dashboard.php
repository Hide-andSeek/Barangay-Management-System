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
	<script src="resident-js/sweetalert.min.js"></script>
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	<link rel="stylesheet" href="css/preloader.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Dashboard: Barangay Official </title>

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

		.slideshow-container {
			max-width: 1000px;
			position: relative;
			margin: auto;
		}

		/* Next & previous buttons */
		.prev,
		.next {
			cursor: pointer;
			position: absolute;
			top: 65%;
			width: auto;
			padding: 16px;
			margin-top: -22px;
			color: white;
			font-weight: bold;
			font-size: 18px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
		}

		/* Position the "next button" to the right */
		.next {
			right: 0;
			border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover,
		.next:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}

		/* Caption text */
		.text {
			color: #f2f2f2;
			font-size: 15px;
			padding: 8px 12px;
			position: absolute;
			bottom: 8px;
			width: 100%;
			text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
			cursor: pointer;
			height: 10px;
			width: 10px;
			margin: 0 2px;
			background-color: #bbb;
			border-radius: 50%;
			display: inline-block;
			transition: background-color 0.6s ease;
		}

		.active,
		.dot:hover {
			background-color: #717171;
		}

		/* Fading animation */
		.fade {
			-webkit-animation-name: fade;
			-webkit-animation-duration: 1.5s;
			animation-name: fade;
			animation-duration: 1.5s;
		}

		@-webkit-keyframes fade {
			from {
				opacity: .4
			}

			to {
				opacity: 1
			}
		}

		@keyframes fade {
			from {
				opacity: .4
			}

			to {
				opacity: 1
			}
		}

		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {

			.prev,
			.next,
			.text {
				font-size: 11px
			}
		}
	</style>
</head>

<body>
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
	<!-- <script>
        swal("Welcome to:","Barangay Commonwealth: Barangay Official Dashboard");
    </script> -->
	<!-- Side Navigation Bar-->
	<div class="sidebar captain_sidebar myDIV">
		<div class="logo-details">
			<img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="Brgy Commonwealth Logo" />
			<div class="logo_name">Barangay Captain</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button nav-active" href="captaindashboard.php">
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
				<a class="side_bar nav-button" href="barangay_official_visit_page.php">
					<i class='bx bx-log-in'></i>
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
					<h5>Barangay Official Dashboard
						<a href="#" class="circle">
							<img src="img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

		<div class="w3-row-padding w3-margin-bottom" style="margin-top: 30px; margin-left: 50px; margin-right: 50px">
			<div class="w3-quarter w3padd ">
				<div class="w3-container w3-padding-16 w3borderbot bg-green">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php

						$query = "SELECT user_id FROM usersdb WHERE user_type = 'Administrator' ORDER BY user_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"

						?>
					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>ADMIN</h4>
					</div>
					<br>
					<a href="accounting_funds.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>

			<div class="w3-quarter w3padd ">
				<div class="w3-container w3-padding-16 w3borderbot bg-green">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php

						$query = "SELECT user_id FROM usersdb WHERE user_type = 'Regular Employee' ORDER BY user_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>

					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>EMPLOYEE</h4>
					</div>
					<br>
					<a href="accounting_funds.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>

			<div class="w3-quarter w3padd ">
				<div class="w3-container w3-padding-16 w3borderbot bg-green">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php

						$query = "SELECT user_id FROM usersdb WHERE user_type = 'Official' ORDER BY user_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>

					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>OFFICIALS</h4>
					</div>
					<br>
					<a href="accounting_funds.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>

			<div class="w3-quarter w3padd" style="margin-bottom: 30px;">
				<div class="w3-container w3borderbot w3-text-white w3-padding-16 bg-green">
					<div class="w3-left"><i class="fa fa-users w3-xxxlarge" style="color: #0000001A;"></i></div>
					<div class="w3-right">
						<?php

						$query = "SELECT user_id FROM usersdb WHERE user_type = 'Contractual Employee' ORDER BY user_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"


						?>
					</div>
					<div class="w3-clear"></div>
					<div style="text-align: center;">
						<h4>CON. EMPLOYEE</h4>
					</div>
					<br>
					<a href="accounting_funds.php" class="small-box-footer more-info">
						<div style="text-align: center; background: #0000001A; padding: 3px 0">
							More info <i class="fa fa-arrow-circle-right"></i>
						</div>
					</a>
				</div>
			</div>
			<br>
			<!-- <label> Accounting Department: </label>
			<div style="display: flex; justify-content: center; align-items: center;margin-left: -50px;">
				<div id="piechart" style="width: 40%; height: 300px; margin-right: 30px;"></div>
				<div id="columnchart_material" style="width: 36%; height: 300px;"></div>
			</div>
			<br>
			<div style="display: flex; justify-content: center; align-items: center;margin-left: -50px;">
				<div id="donutchart" style="width: 40%; height: 300px; margin-right: 30px; "></div>
				<div id="donutchart1" style="width: 36%; height: 300px;"></div>
			</div>
			<br> -->



			<div class="slideshow-container">

				<div class="mySlides">
					<div style="text-align: center;">
						<label style="font-size: 15px;">Accounting Department</label>
					</div>
					<br>
					<div style="display: flex; justify-content: center; align-items: center; margin-left: -50px;">
						<div id="piechart" style="width: 40%; height: 250px;  margin-left: 40px; margin-right: 30px;"></div>
						<div id="columnchart_material" style="width: 40%; height: 250px;"></div>
					</div>
				</div>

				<div class="mySlides">
					<div style="text-align: center;">
						<label style="font-size: 15px;">Resident Census</label>
					</div>
					<br>
					<div style="display: flex; justify-content: center; align-items: center; margin-left: -50px;">
						<div id="donutchart" style="width: 40%; height: 250px; margin-left: 40px; margin-right: 30px; "></div>
						<div id="donutchart1" style="width: 40%; height: 250px;"></div>
					</div>
				</div>
<!--Doc Request-->
				<div class="mySlides">
					<div style="text-align: center;">
						<label style="font-size: 15px;">Account/ Request Document</label>
					</div>
					<br>
					<div style="display: flex; justify-content: center; align-items: center; margin-left: -50px;">
						<div id="chart_div" style="width: 40%; height: 250px; margin-left: 40px; margin-right: 30px;"></div>
						<div id="donut_single" style="width: 40%; height: 250px;"></div>
					</div>
				</div>

				<div class="mySlides">
					<div style="text-align: center;">
						<label style="font-size: 15px;">Employment/ No. of Voters</label>
					</div>
					<br>
					<div style="display: flex; justify-content: center; align-items: center; margin-left: -50px;">
						<div id="div_chart" style="width: 40%; height: 250px; margin-left: 40px; margin-right: 30px;"></div>
						<div id="single_donut" style="width: 40%; height: 250px;"></div>
					</div>
				</div>

				<div class="mySlides">
					<div style="text-align: center;">
						<label style="font-size: 15px;">Residential/ Senior Citizen </label>
					</div>
					<br>
					<div style="display: flex; justify-content: center; align-items: center; margin-left: -50px;">
						<div id="diva_chart" style="width: 40%; height: 250px; margin-left: 40px; margin-right: 30px;"></div>
						<div id="double_donut" style="width: 40%; height: 250px;"></div>
					</div>
				</div>

				<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				<a class="next" onclick="plusSlides(1)">&#10095;</a>

			</div>
			<br>
			<br>
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
				<span class="dot" onclick="currentSlide(4)"></span>
				<span class="dot" onclick="currentSlide(5)"></span>
			</div>
			<br>
			<br>
			<!-- <div style="display: flex; justify-content: center; align-items: center;">
			<img src="img/organization.jpg" alt="" style="height: 1200px; width: 900px;">
			</div>
			<br>
			<br> -->
	</section>

</body>

<!-- Scripts Section-->
<script src="resident-js/barangay.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Budget', 'Amount'],
			<?php
			$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM budget');

			while ($row = mysqli_fetch_array($result)) {
				$project_total_amount = $row['amount'];
			?>	['Total Funds', <?php echo $total_amount; ?>],
				['Project Budget', <?php echo $project_total_amount; ?>],
				['Equipment Budget', <?php echo $equip_total_amount; ?>],
				['Income', <?php echo $payment_amount; ?>],
				['Payroll', <?php echo $payroll_total_amount; ?>]
			<?php
			}
			?>
		]);

		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			title: 'Total Funds %'
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['bar']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Date', 'CurrentFunds', 'Total Expenses', 'Income'],
			['As of today', <?php $total_summary = $total_amount - ($project_total_amount + $equip_total_amount + $payroll_total_amount);
							echo $total_summary  + $payment_amount; ?>, <?php echo $project_total_amount + $equip_total_amount + $payroll_total_amount; ?>, <?php echo $payment_amount ?>]
		]);

		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			title: 'Computation: Total Funds'
		};

		var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

		chart.draw(data, google.charts.Bar.convertOptions(options));
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Title', 'Census'],
			['Resident', <?php echo $no_householdid ?>],
			['Family', <?php echo $fam_noid ?>]
		]);

		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			title: 'Population',
			pieHole: 0.4,
			'width': 420,
			'height': 250
			// colors: ['#e0440e', '#e6693e']
		};


		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	}
</script>

<script>
	google.charts.load("current", {
		packages: ["corechart"]
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Title', 'Census'],
			['Male', <?php echo $no_gender_male; ?>],
			['Female', <?php echo $no_gender_female / 2; ?>]
		]);

		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			title: 'Gender',
			'width': 420,
			'height': 250
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
		chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Effort', 'Amount given'],
			['Barangay ID', <?php echo $total_brgyid_request; ?>],
			['Business Permit', <?php echo $total_no_bpermit_request; ?>],
			['Barangay Clearance', <?php echo $total_no_clearance_request; ?>],
			['Indigency', <?php echo $total_no_indigency_request; ?>]
		]);

		var options = {
			pieHole: 0.5,
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Total of Approve Document (Request)',
			'width': 420,
			'height': 250
		};

		var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
		chart.draw(data, options);
	}
</script>

<script>
	// Load the Visualization API and the piechart package.
	google.charts.load('current', {
		'packages': ['corechart']
	});

	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table, 
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'User');
		data.addRows([
			['Account of Resident', <?php echo $no_resident; ?>],
			['Account of Employee', <?php echo $no_employee; ?>]
		]);

		// Set chart options
		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Account Registered',
			'width': 420,
			'height': 250
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
</script>

// Voters 
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Title', 'Number'],
			['Voter', <?php echo $total_voters; ?>],
			['Not Voter', <?php echo $total_voters_no; ?>]
		]);

		var options = {
			pieHole: 0.5,
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Total of Voters',
			'width': 420,
			'height': 250
		};

		var chart = new google.visualization.PieChart(document.getElementById('single_donut'));
		chart.draw(data, options);
	}
</script>

<script>
	// Load the Visualization API and the piechart package.
	google.charts.load('current', {
		'packages': ['corechart']
	});

	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table, 
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Topping');
		data.addColumn('number', 'User');
		data.addRows([
			['Employeed', <?php echo $no_employeed; ?>],
			['Not Employeed', <?php echo $no_unemployeed; ?>]
		]);

		// Set chart options
		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Number of Employeed and Not Employeed',
			'width': 420,
			'height': 250
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('div_chart'));
		chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Title', 'Number'],
			['Senior Citizen', <?php echo $yes_seniorcitizen; ?>],
			['Below Age 60', <?php echo $no_seniorcitizen; ?>]
		]);

		var options = {
			pieHole: 0.5,
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Total of Senior Citizen',
			'width': 420,
			'height': 250
		};

		var chart = new google.visualization.PieChart(document.getElementById('double_donut'));
		chart.draw(data, options);
	}
</script>

<script>
	// Load the Visualization API and the piechart package.
	google.charts.load('current', {
		'packages': ['corechart']
	});

	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	// Callback that creates and populates a data table, 
	// instantiates the pie chart, passes in the data and
	// draws it.
	function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'People');
		data.addColumn('number', 'User');
		data.addRows([
			['Owner', <?php echo $owner_house; ?>],
			['Tenant', <?php echo $tenant_house; ?>]
		]);

		// Set chart options
		var options = {
			pieSliceTextStyle: {
				color: 'black',
			},
			'title': 'Residential',
			'width': 420,
			'height': 250
		};

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.PieChart(document.getElementById('diva_chart'));
		chart.draw(data, options);
	}
</script>

<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
	}
</script>
<script src="js/jquery.min.js"></script>
<script src="js/preloader.js"></script>

</html>