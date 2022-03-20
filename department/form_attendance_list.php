<?php
session_start();
include("../db/conn.php");
include("../db/user.php");
include('../announcement_includes/functions.php');
include("../db/accounting.php");

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
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">

	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Attendance List: Accounting Dept. </title>


	<style>
		* {
			font-size: 13px;
			font-family: "Poppins", sans-serif;
		}

		.employeemanagement-modal {
			display: none;
			position: absolute;
			z-index: 999;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgb(0, 0, 0);
			background-color: rgba(0, 0, 0, 0.4);
			padding-top: 5px;

		}


		.modal-contentemployee {
			padding-top: 1%;
			background-color: #fefefe;
			margin: 5% auto 2% auto;
			border: 1px solid #888;
			height: 75%;
			width: 52%;

		}

		.inputtext,
		.inputpass {
			font-size: 13px;
			height: 35px;
			width: 94%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		.employee-label {
			font-size: 13px;
		}

		.employee-label {
			margin-left: 20px;
		}

		.widthinp {
			width: 87%;
		}

		.submtbtn:hover {
			opacity: 0.8;
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
				<a class="side_bar nav-button nav-active" href="accounting_attendance_list.php">
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
					<h5>Attendance List
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>

		<div class="reg_table" style="margin-top: 70px; margin-left: 30px; margin-right: 30px;">
			<hr>
			<h5 style="text-align: center;">Attendance: Working Hours</h5>
			<hr>
			<table class="content-table table_indigency" id="table">

				<?php
				include "../db/conn.php";
				include "../db/user.php";

			

				$query = $db->query("SELECT * FROM usersdb inner join users_activity on  users_activity.user_id=usersdb.user_id inner join user_activityout on user_activityout.user_id=usersdb.user_id where usersdb.user_id AND user_status = 'Pending' AND timelog_status = 'Pending' AND timeout_status = 'Pending' ORDER BY usersdb.user_id DESC");
				?>

				<thead>
					<tr class="t_head">
						<th width="15%">Employee ID</th>
						<th width="15%">Fullname</th>
						<th width="15%">User type</th>
						<th width="15%">Department</th>
						<th width="15%">Time In</th>
						<th width="15%">Time Out</th>
						<th width="15%">Status</th>
						<!-- <th width="15%"></th> -->
						<th width="15%"></th>
					</tr>
				</thead>
				<?php
				while($data = $query->fetch())
				{
					$user_id = $data['user_id'];
					$username = $data['username'];
					$user_fname = $data['user_fname'];
					$user_mname = $data['user_mname'];
					$user_lname = $data['user_lname'];
					$user_type = $data['user_type'];
					$department = $data['department'];
					$status = $data['status'];
					$time_out = $data['time_out'];
					$time_loged = $data['time_loged'];				
				?>
					<tbody>
						<tr class="table-row" >
							<td><?php echo $data['user_id']; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['user_type']; ?></td>
							<td><?php echo $data['department']; ?></td>
							<td><?php echo $data['time_loged']; ?></td>
							<td><?php echo $data['time_out']; ?></td>
							<td><?php echo $data['status']; ?></td>

							<!-- <td><button class="form-control btn-info processbtn" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('check_<?php echo $data['user_id']; ?>').style.display='block'"><i class="bx bx-edit"></i>View</button></td> -->

							<td><button class="view_approvebtn" onclick="location.href='accounting_attendance_list_view.php?id=<?php echo $data['user_id']; ?>'">Add Working Hrs</button></td>
						</tr>
					</tbody>
					<div id="check_<?php echo $data['user_id']; ?>" class="employeemanagement-modal modal">
						<div class="modal-contentemployee animate">
							<form method="POST" action="">
								<div style="float: right;">
									<span onclick="document.getElementById('check_<?php echo $data['user_id']; ?>').style.display='none'" class="topright" style="font-size: 18px;">&times;</span>
								</div>
								<div id="London" class="w3-container city" style="margin-top: 50px;">
									<h5 style="text-align: center;">Personal Information</h5>
									<br>
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Employee ID:</label>
											<input required class="form-control inputtext widthinp" type="text" name="user_id" value="<?php echo $data['user_id']; ?>" readonly>
										</div>

										<div class="information col">
											<label class="employee-label">Name:</label>
											<input required class="form-control inputtext widthinp" type="text" value="<?php echo $data['user_fname']; ?> <?php echo $data['user_mname']; ?> <?php echo $data['user_lname']; ?>" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" style="text-transform: uppercase;" name="employee_name" readonly>
										</div>

									</div>
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label"> User Type </label>
											<input required class="form-control inputtext widthinp" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" value="<?php echo $data['user_type']; ?>" name="user_type" readonly>
										</div>

										<div class="information col">
											<label class="employee-label"> Department </label>
											<input required class="form-control inputtext widthinp" type="text" placeholder="Address" value="<?php echo $data['department']; ?>" name="department" readonly>
										</div>
									</div>

									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label"> Time In </label>
											<input required class="form-control inputtext widthinp" type="text" value="Null" name="time_in" placeholder="Time in" readonly>
										</div>

										<div class="information col">
											<label class="employee-label"> Time Out </label>
											<input required class="form-control inputtext widthinp" type="text" placeholder="Time out" name="time_out"  value="Null" readonly>
										</div>
									</div>

									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label"> Facilitated by: </label>
											<input class="form-control inputtext widthinp" type="text" placeholder="Facilated By" name="facilitated_by" value="<?php echo $user; ?>" readonly>
										</div>

										<div class="information col">
											<label class="employee-label"> Date: </label>
											<input class="form-control inputtext widthinp " type="text" placeholder="Added On" name="date_logged" value="Null" readonly>
										</div>
									</div>

									<div class="information col">
										<label class="employee-label"> Working Hours </label>
										<!-- <select class="form-control inputtext departmnt control-label" style="padding: 0px 0px 0px 5px; " id="working_hours" name="working_hours">
											<option disabled>--Select--</option>
											<option value="1 Hour">1 Hour</option>
											<option value="2 Hours">2 Hours</option>
											<option value="3 Hours">3 Hours</option>
											<option value="4 Hours">4 Hours</option>
											<option value="5 Hours">5 Hours</option>
											<option value="6 Hours">6 Hours</option>
											<option value="7 Hours">7 Hours</option>
											<option value="8 Hours">8 Hours</option>
										</select> -->
										<input type="number" class="form-control inputtext" name="working_hours" id="working_hours" placeholder="Please do specify Working Hours" onKeyPress="if(this.value.length==2) return false;">
									</div>
									<button type="submit" id="savebtnworkinghrs" name="savebtnworkinghrs" class="inputtext submtbtn">
										<i class="bx bx-save"></i> Save
									</button>
								</div>
						</div>


					</div>
					</form>
		</div>
		</div>

	<?php
				}
	?>
	</table>
	</div>
	</div>
	</div>
	</section>
</body>

</html>