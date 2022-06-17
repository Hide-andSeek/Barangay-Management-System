<?php
session_start();
include "../db/conn.php";
include "../db/user.php";
include "../db/documents.php";
include('../db/accounting_computation.php');


if (!isset($_SESSION["type"])) {
	header("location: 0index.php");
}
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
	<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/design.css">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<script src="../resident-js/sweetalert.min.js"></script>
	<!--Customize-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Dashboard: Request Document </title>


	<style>
		* {
			font-size: 13px;
			font-family: "Poppins", sans-serif;
		}

		.home-section {
			min-height: 95vh;
		}

		div.align-box {
			padding-top: 23px;
			display: flex;
			align-item: center;
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



		.w3borderbot {
			margin-bottom: 20px;
			background: #04AA6D;
			border-bottom-left-radius: 15px;
			border-bottom-right-radius: 15px;
			margin-left: 15px;
		}

		.notification {
			color: white;
			text-decoration: none;
			position: relative;
			display: inline-block;
			border-radius: 2px;
			color: black;
			width: 95%;
		}

		.w3borderbot:hover {
			cursor: pointer;
			background: orange;
			color: white
		}

		.opac {
			opacity: 0.5;
		}

		.notification .badge {
			position: absolute;
			top: -10px;
			right: -10px;
			padding: 5px 10px;
			border-radius: 50%;
			background-color: #ff4f4f;
			color: white;
			font-size: 14px;
		}

		.w3top {
			margin-top: -30px;
		}

		input.edit,
		input.del {
			width: 80;
		}

		.closebtn {
			margin-right: 15px;
			font-stretch: expanded;
		}

		.closebtn:hover {
			color: red;
		}

		.description {
			height: 50px;
			font-size: 13px;
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

		span.topright {
			margin-left: -50px;
			text-align: right;
			font-size: 25px;
		}

		.topright:hover {
			text-align: right;
			color: red;
			cursor: pointer;
		}

		.submitbtn,
		.cattxtbox,
		.refreshbtn,
		.fileimg {
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
		}

		.errormsg,
		.del {
			color: #d8000c;
			background: #ffbaba;
			border-radius: 5px;
		}

		.edit {
			width: 40%;
			color: #9f6000;
			background: #feef83;
			margin-bottom: 5px;
			border-radius: 5px;
		}

		.del {
			width: 40%;
		}

		.select__select {
			margin-top: -32px;
			padding-left: 180px;
		}

		.bcircle:hover {
			color: black
		}

		.imgup {
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 5px 5px 5px 5px;
			margin-left: 20px;
			margin-right: 25px;
		}

		.btnwidth {
			width: 70%;
			margin-bottom: 5px;
		}

		.announcedesc {
			margin-left: 20px;
		}

		.btnmargin {
			margin-bottom: 5px;
		}

		.hoverbtn:hover {
			background: orange;
		}

		.btnwidths {
			width: 40%
		}

		.descriptionStyle {
			overflow: auto;
			resize: none;
		}

		.addcat {
			background: #B6B4B4;
			border: 2px solid gray;
			height: 40px;
		}

		.tblinput {
			background: none;
			border: none;
			user-select: none;
			text-align: center;
			pointer-events: none;
		}

		.transact {
			margin-left: 65%;
		}

		.w3-quarter {
			margin-bottom: 10px;
		}

		.w3back {
			background: #04AA6D
		}

		.w3point:hover {
			cursor: pointer;
			background: orange;
			color: green
		}

		.piechart{
            display: none; 
            position: fixed; 
            width: 100%; 
            height: 100%; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 5px;
        }
	</style>
</head>

<body>
	<script>
        swal("Welcome to:","Barangay Commonwealth: Request Document Department");
    </script>
	<!-- Side Navigation Bar-->
	<div class="sidebar">
		<div class="logo-details">
			<img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt="" />
			<div class="logo_name">Barangay Commonwealth</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button nav-active" href="dashboard.php">
					<i class='bx bx-grid-alt dash'></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>
			<li>
				<a class="side_bar nav-button" href="barangayid.php">
					<i class='bx bx-id-card id'></i>
					<span class="links_name">Barangay ID</span>
				</a>
				<span class="tooltip">Barangay ID</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="barangayclearance.php">
					<i class='bx bx-receipt clearance'></i>
					<span class="links_name">Barangay Clearance</span>
				</a>
				<span class="tooltip">Barangay Clearance</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="certificateofindigency.php">
					<i class='bx bx-file indigency'></i>
					<span class="links_name">Certificate of Indigency</span>
				</a>
				<span class="tooltip">Certificate of Indigency</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="businesspermit.php">
					<i class='bx bx-news permit'></i>
					<span class="links_name">Business Permit</span>
				</a>
				<span class="tooltip">Business Permit</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="payment_history.php">
					<i class='bx bx-data payment'></i>
					<span class="links_name">Payment History</span>
				</a>
				<span class="tooltip">Payment History</span>
			</li>

			<li class="profile">
				<div class="profile-details">

					<div class="name_job">
						<div class="job"><strong><?php echo $user; ?></strong></div>
						<div class="job" id=""><?php echo $dept; ?> || Online </div>
					</div>
				</div>
				<a href="../emplogout.php">
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
					<h5>Document Request Dashboard
						<a href="#" class="circle">

							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>


		<div>
			<div class="w3-row-padding w3-margin-bottom">

				<div class="w3-quarter">
					<a href="barangayid.php" class="notification">
						<div class="w3-container w3-padding-16 w3borderbot bg-green">
							<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
							<div class="w3-right">
								<?php
								require '../db/conn.php';
								$query = "SELECT * FROM barangayid WHERE status = 'Pending' ORDER BY barangay_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h1 class='badge'>$pdoexecute</h1>"
								?>

							</div>
							<div class="w3-clear"></div>
							<div style="text-align: center;">
								<h4>Barangay ID (Request)</h4>
							</div>
							<a href="barangayid.php" class="small-box-footer more-info">
								<div style="text-align: center; background: #0000001A; padding: 3px 0">
									More info <i class="fa fa-arrow-circle-right"></i>
								</div>
							</a>
						</div>
					</a>
				</div>

				<div class="w3-quarter">
					<a href="certificateofindigency.php" class="notification">
						<div class="w3-container w3-padding-16 w3borderbot bg-green">
							<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
							<div class="w3-right">
								<?php
								require '../db/conn.php';

								$query = "SELECT indigency_id FROM certificateindigency WHERE status = 'Pending' ORDER BY indigency_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h3 class='badge'>$pdoexecute</h3>"
								?>

							</div>
							<div class="w3-clear"></div>
							<div style="text-align:center;">
								<h4>Indigency</h4>
							</div>
							
							<a href="certificateofindigency.php" class="small-box-footer more-info">
								<div style="text-align: center; background: #0000001A; padding: 3px 0">
									More info <i class="fa fa-arrow-circle-right"></i>
								</div>
							</a>
						</div>
					</a>
				</div>

				<div class="w3-quarter">
					<a href="barangayclearance.php" class="notification">
						<div class="w3-container w3-padding-16 w3borderbot bg-green">
							<div class="w3-left"><i class="bx bxs-bell-ring w3-xxxlarge" style="color: #0000001A;"></i></div>
							<div class="w3-right">
								<?php
								require '../db/conn.php';

								$query = "SELECT * FROM barangayclearance WHERE clearance_status = 'Pending' ORDER BY clearance_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h3 class='badge'>$pdoexecute</h3>"
								?>
							</div>
							<div class="w3-clear"></div>
							<div style="text-align:center;">
								<h4>Barangay Clearance</h4>
							</div>
							
							<a href="barangayclearance.php" class="small-box-footer more-info">
								<div style="text-align: center; background: #0000001A; padding: 3px 0">
									More info <i class="fa fa-arrow-circle-right"></i>
								</div>
							</a>
						</div>
					</a>
				</div>

				<div class="w3-quarter">
					<a href="businesspermit.php" class="notification">
						<div class="w3-container w3-padding-16 w3borderbot bg-green">
							<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
							<div class="w3-right">
								<?php
								require '../db/conn.php';
								$query = "SELECT * FROM businesspermit WHERE status = 'Pending' ORDER BY businesspermit_id";
								$query_run = $db->query($query);
								$pdoexecute = $query_run->rowCount();

								echo "<h3 class='badge'>$pdoexecute</h3>"
								?>

							</div>
							<div class="w3-clear"></div>
							
							<div style="text-align:center;">
								<h4>Business Permit (Req)</h4>
							</div>
							<a href="businesspermit.php" class="small-box-footer more-info">
								<div style="text-align: center; background: #0000001A; padding: 3px 0">
									More info <i class="fa fa-arrow-circle-right"></i>
								</div>
							</a>
						</div>
					</a>
				</div>
			</div>
			<div style="display: flex; justify-content: center; align-items: center;margin-left: -50px;">
				<div id="donut_single" style="width: 40%; height: 250px;  margin-left: 40px; margin-right: 30px;"></div>
				<div id="piechart" style="width: 40%; height: 250px; margin-right: 30px;"></div>
			</div>
			<!-- <div style="display: flex; justify-content: center; align-items: center;">
				<div id="chart_div" style="width: 900px; height: 500px;"></div>
			</div> -->
		</div>
	</section>
	<script href="test.js"></script>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {
		'packages': ['corechart']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var data = google.visualization.arrayToDataTable([
			['Effort', 'Amount given'],
			['Barangay ID: <?php echo $total_brgyid_request; ?>', <?php echo $total_brgyid_request; ?>],
			['Business Permit: <?php echo $total_no_bpermit_request; ?>', <?php echo $total_no_bpermit_request; ?>],
			['Barangay Clearance: <?php echo $total_no_clearance_request; ?>', <?php echo $total_no_clearance_request; ?>],
			['Indigency: <?php echo $total_no_indigency_request; ?>', <?php echo $total_no_indigency_request; ?>]
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

    <!-- <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Business Permit', 'Barangay ID', 'Barangay Clearance', 'Indigency'],
          ['<?= $total_request_bpermit_date;?>',  165,      938,         522, 545]
        ]);

        var options = {
          title : 'Monthly Total of Document Re	quest',
          vAxis: {title: 'Request'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script> -->
	<script>
		  document.getElementById('chart_div').outerHTML = '<a href="' + chart.getImageURI() + '">Printable version</a>';
	</script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Document Name', 'Amount'],

		  ['Barangay ID: <?php echo $total_request_barangayid; ?>', <?php echo $total_request_barangayid; ?>],
          ['Business Permit: <?php echo $total_request_bpermits; ?>', <?php echo $total_request_bpermits; ?>],
          ['Barangay Clearance: <?php echo $total_request_clearance; ?>', <?php echo $total_request_clearance; ?>],
		  ['Indigency: <?php echo $total_request_indigency; ?>', <?php echo $total_request_indigency; ?>]

        ]);

        var options = {
          title: 'Total Request'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</html>