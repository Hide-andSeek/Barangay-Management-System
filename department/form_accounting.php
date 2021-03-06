<?php
session_start();
include("../db/conn.php");
include("../db/user.php");
include('../announcement_includes/functions.php');
include("../db/accounting_computation.php");


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
	<script src="../resident-js/sweetalert.min.js"></script>
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Dashboard: Accounting Department </title>


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
        swal("Welcome to:","Barangay Commonwealth: Accounting Department");
    </script>
	<!-- Side Navigation Bar-->
	<div class="sidebar">
		<div class="logo-details">
			<img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt="" />
			<div class="logo_name">Accounting Department</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button  nav-active" href="accounting_dashboard.php">
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
				<a class="side_bar nav-button" href="accounting_salary.php">
					<i class='fa fa-users salary'></i>
					<span class="links_name">Employee Salary</span>
				</a>
				<span class="tooltip">Employee Salary</span>
			</li>

			<li>
				<a class="side_bar nav-button" href="accounting_funds.php">
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

			<li>
				<a class="side_bar nav-button" href="accounting_transaction_history.php">
					<i class='fa fa-money payroll'></i>
					<span class="links_name">Transaction History</span>
				</a>
				<span class="tooltip">Transaction History</span>
			</li>

			<li class="profile">
				<div class="profile-details">
					<div class="name_job">
						<div class="job"><strong><?php echo $user; ?></strong></div>
						<span class="job" id=""><?php echo $dept; ?> | Online</span>
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
					<h5>Accounting Department
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

		<br>

		<div>
			<div class="w3-row-padding w3-margin-bottom" style="margin-left: 50px; margin-right: 50px;">
				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="bx bx-pie-chart-alt-2 fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<h3>
								??? <?php $total_summary = $total_amount - ($project_total_amount + $equip_total_amount + $payroll_total_amount);

								echo $total_summary  + $payment_amount;
								?>
							</h3>
						</div>
						<div class="w3-clear"></div>

						<div style="text-align: center;">
							<h4>Total Funds</h4>
						</div>
						<br>
						<a href="accounting_funds.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								More info <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="bx bx-coin-stack fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<?php
							$equip_total_amount = '';

							$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM equip_budget');
							?>
							<?php
								while ($row = mysqli_fetch_array($result)) {
									$equip_total_amount = $row['amount'];
							?>
							<h3>??? <?php echo $equip_total_amount;?></h3>
							<?php
								}
							?>
						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Total Expenses</h4>
						</div>
						<br>
						<a href="accounting_equipment.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								More info <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<?php
							$sql = "SELECT * FROM usersdb";
							$query = $connect->query($sql);

							echo "<h3>" . $query->num_rows . "</h3>";
							?>
						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Total Employee</h4>
						</div>

						<br>
						<a href=".php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								More info <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>

				<div class="w3-quarter">
					<div class="w3-container w3-padding-16 bg-green">
						<div class="w3-left"><i class="bx bx-coin fa-fw w3-xxxlarge" style="color: #0000001A;"></i></div>
						<div class="w3-right">
							<?php
							$payment_amount = '';

							$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM payments WHERE payment_status = "Paid"');
							?>
							<?php
							while ($row = mysqli_fetch_array($result)) {
								$payment_amount = $row['amount'];
							?>
								<h3>??? <?php echo $payment_amount; ?></h3>
							<?php
							}
							?>

						</div>
						<div class="w3-clear"></div>
						<div style="text-align: center;">
							<h4>Income</h4>
						</div>

						<br>
						<a href="accounting_income.php" class="small-box-footer more-info">
							<div style="text-align: center; background: #0000001A; padding: 3px 0">
								More info <i class="fa fa-arrow-circle-right"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div style="display: flex; justify-content: center; align-items: center;margin-left: -50px;">
			<div id="piechart" style="width: 40%; height: 300px; margin-right: 30px;"></div>
			<div id="columnchart_material" style="width: 36%; height: 300px;"></div>
		</div>
		<br>
		<br>
		
		

	</section>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Budget', 'Amount'],
		  <?php
			$result = mysqli_query($connect, 'SELECT SUM(amount) AS amount FROM budget');

			while ($row = mysqli_fetch_array($result)) {
			$project_total_amount = $row['amount'];
		  ?>
          ['Total Funds', <?php echo $total_amount; ?>],
          ['Project Budget', <?php echo $project_total_amount; ?>],
		  ['Equipment Budget', <?php echo $equip_total_amount; ?>],
          ['Income', <?php echo $payment_amount; ?>],
		  ['Payroll', <?php echo $payroll_total_amount; ?>]
		  <?php
			} 
		  ?>
        ]);

        var options = {
          title: 'Percentage %'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['bar']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Date', 'Current Funds', 'Total Expenses', 'Income'],
			['As of today', <?php $total_summary = $total_amount - ($project_total_amount + $equip_total_amount + $payroll_total_amount); echo $total_summary  + $payment_amount;?>, <?php echo $project_total_amount + $equip_total_amount + $payroll_total_amount; ?>, <?php echo $payment_amount ?>]
			]);

			var options = {
			chart: {
				title: 'Computation: Total Funds',
				subtitle: 'Current Funds, Total Expenses, and Income: Today',
			}
			};

			var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

			chart.draw(data, google.charts.Bar.convertOptions(options));
		}
		</script>
</html>