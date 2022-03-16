<?php
session_start();
include("../db/conn.php");
include("../db/user.php");
include('../announcement_includes/functions.php');


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



<?php
if(isset($_GET['operation'])){
	$x = $_GET['working_hours'];
	$y = $_GET['rate'];
	$op = $_GET['operation'];
	
	switch($op){
	   case 'pro' : $result= $x * $y;
	    break; 
	}
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

	<link rel="stylesheet" href="../announcement_css/custom.css">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Employee Salary: Accounting Dept. </title>


	<style>
		* {
			font-size: 13px;
			font-family: "Poppins" , sans-serif;
		}

		.inputtext, .inputpass {
			font-size: 13px;
			height: 35px;
			width: 94%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		.employee-label{font-size: 13px;}
		.employee-label{margin-left: 20px;}
		.widthinp{width: 87%;}
		.submtbtn:hover{opacity: 0.8;}
		.cattxtbox{
			font-size: 14px;
			height: 35px;
			width: 100%;
			padding: 10px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			text-align: center;
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
				<a class="side_bar nav-button nav-active" href="accounting_salary.php">
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
					<h5>Employee Salary
						<a href="#" class="circle">
							<img src="../img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>
		<div id="content" class="container col-md-12" style="margin-top: 100px;">
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
				$sql_query = "SELECT workinghrs_id, user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added, status
				FROM  working_hours WHERE status = 'Pending'
				ORDER BY workinghrs_id DESC";
			} else {
				$sql_query = "SELECT workinghrs_id, user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added, status
				FROM working_hours
				WHERE employee_name LIKE ? 
				ORDER BY workinghrs_id DESC";
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
					$data['workinghrs_id'],
					$data['user_id'],
					$data['employee_name'],
					$data['user_type'],
					$data['department'],
					$data['time_in'],
					$data['time_out'],
					$data['facilitated_by'],
					$data['date_logged'],
					$data['working_hours'],
					$data['date_added'],
					$data['time_added'],
					$data['status']
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
				$sql_query = "SELECT workinghrs_id, user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added, status
				FROM working_hours WHERE status='Pending'
				ORDER BY workinghrs_id DESC LIMIT ?, ?";
			} else {
				$sql_query = "SELECT workinghrs_id, user_id, employee_name, user_type, department, time_in, time_out, facilitated_by, date_logged, working_hours, date_added, time_added, status
				FROM working_hours 
				WHERE employee_name LIKE ? 
				ORDER BY workinghrs_id DESC LIMIT ?, ?";
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
					$data['workinghrs_id'],
					$data['user_id'],
					$data['employee_name'],
					$data['user_type'],
					$data['department'],
					$data['time_in'],
					$data['time_out'],
					$data['facilitated_by'],
					$data['date_logged'],
					$data['working_hours'],
					$data['date_added'],
					$data['time_added'],
					$data['status']
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

				<hr>
				<div style="text-align: center;">
					<h5>Salary</h5>
				</div>
				<hr>
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
					<table class="content-table table_indigency" id="table">
						<thead>
							<tr class="t_head">
								<th width="15%">Employee ID</th>
								<th width="15%">Name</th>
								<th width="15%">User type</th>
								<th width="15%">Department</th>
								<th width="15%">Facilitated by</th>
								<th width="15%">Time In</th>
								<th width="15%">Time Out</th>
								<th width="15%"></th>
							</tr>
						</thead>
						<?php
						while ($stmt_paging->fetch()) { ?>
							<tbody>
								<tr class="table-row">
									<input type="hidden" value="<?php echo $data ['workinghrs_id']; ?>">
									<td><?php echo $data ['user_id']; ?></td>
									<td><?php echo $data ['employee_name']; ?></td>
									<td><?php echo $data ['user_type']; ?></td>
									<td><?php echo $data ['department']; ?></td>
									<td><?php echo $data ['facilitated_by']; ?></td>
									
									<td><?php echo $data ['time_in']; ?></td>
									<td><?php echo $data ['time_out']; ?></td>
					
									<td><button class="view_approvebtn" onclick="location.href='accounting_salary_view.php?id=<?php echo $data['workinghrs_id']; ?>'">View Details</button></td>
								</tr>
							</tbody>
							

													
											</div>
					<?php
						}
					}
					?>
					</table>

				</div>
				<!-- <div class="col-md-12 pagination">
					<h4 class="page">
						<?php
						$function->doPages($offset, 'compAdmin_dashpage.php', '', $total_records, $keyword);
						?>
					</h4>
				</div> -->
		</div>
		<div class="separator"></div>
		</div>
	</section>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>