<?php
session_start();
include("../db/conn.php");
include("../db/user.php");
include('../announcement_includes/functions.php');
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
	<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/design.css">
	<link rel="stylesheet" href="../css/ionicons.min.css">

	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Storage Funds: Accounting Dept. </title>


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
			width: 84%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
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

		.viewbtn {
			width: 45px;
			height: 35px;
		}

		.cattxtbox {
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
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

		.w3bord {
			border: 2px solid white;
		}

		.w3borderbot {
			border-bottom-left-radius: 15px;
			border-bottom-right-radius: 15px;
			margin-left: 15px;
		}

		.w3bordertop {
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
		}

		.w3-quarter {
			width: 40%;
		}

		a {
			text-decoration: none;
		}

		.more-info:hover {
			color: orange;
		}

		.bg-green {
			border-radius: 15px;
		}
	</style>
</head>

<body>

	<!-- Side Navigation Bar-->
	<div class="sidebar">
		<div class="logo-details">
			<img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt="" />
			<div class="logo_name">Accounting Department</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button" href="accounting_dashboard.php">
					<i class='bx bx-category-alt dash'></i>
					<span class="links_name">Dashboard</span>
				</a>
				<span class="tooltip">Dashboard</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="accounting_attendance_list.php">
					<i class='bx bx-calendar-check ongoing'></i>
					<span class="links_name">Attendance List</span>
				</a>
				<span class="tooltip">Attendance List</span>
			</li>

			<li>
				<a class="side_bar nav-button " href="accounting_salary.php">
					<i class='fa fa-users salary'></i>
					<span class="links_name">Employee Salary</span>
				</a>
				<span class="tooltip">Employee Salary</span>
			</li>

			<li>
				<a class="side_bar nav-button nav-active" href="accounting_funds.php">
					<i class='bx bx-coin-stack budget'></i>
					<span class="links_name">Storage Funds</span>
				</a>
				<span class="tooltip">Storage Funds</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="accounting_payroll.php">
					<i class='fa fa-money payroll'></i>
					<span class="links_name">Payroll</span>
				</a>
				<span class="tooltip">Payroll</span>
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
					<h5>Storage Funds
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

		<div style="display: flex; justify-content: center; align-items: center; margin-top: 100px; margin-left: 100px;" id="content">

			<div class="w3-row-padding w3-margin-bottom">
				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="fa fa-area-chart fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<h3>₱ <?php echo $project_total_amount; ?></h3>
						</div>
						<div class="w3-clear"></div>

						<div style="text-align: center;">
							<h4>Project Budget</h4>
						</div>
						<br>
						<a href="accounting_project_budget.php" class="small-box-footer more-info clickable">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								Visit this Page <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="fa fa-wrench fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<h3>₱ <?php echo $equip_total_amount; ?></h3>
						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Equipment Expenses</h4>
						</div>
						<br>
						<a href="accounting_equipment.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								Visit this Page <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="fa fa-money fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<h3>₱ <?php echo $payment_amount; ?></h3>
						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Income</h4>
						</div>

						<br>
						<a href="accounting_income.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								Visit this Page <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="bx bx-coin-stack fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<h3>
								₱ <?php $total_summary = $total_amount - ($project_total_amount + $equip_total_amount + $payroll_total_amount);

									echo $total_summary  + $payment_amount;
									?>
							</h3>
						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Total Funds</h4>
						</div>

						<br>
						<a href="accounting_total_funds.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								Visit this Page <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

	</section>
</body>


</html>