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
				<div class="logo_name">Lupon Department</div>
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
				<li class="active">
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

				<li class="profile">
					<div class="profile-details">
						<div class="name_job">
							<div class="job"><strong><?php echo $user;?></strong></div>
							<div class="job" id=""><?php echo $dept; ?> | Online</div>
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
				<table class="content-table">
					<thead>
						<tr class="t_head">
							<th width="5%" style="text-align: center">Case No.</th>
							<th width="5%" style="text-align: center">Complainant</th>
							<th width="5%" style="text-align: center">Accused</th>
							<th width="5%" style="text-align: center">Hearing Date and Time</th>
							<th width="5%" style="text-align: center">Personnel</th>
							<th width="5%" style="text-align: center">Action</th>
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
										lc.`hearingDate`,
										lc.`hearingTime`,
										ls.`statusID`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 1 AND ac.`admincomp_id` LIKE ?
									OR ls.`statusID` = 1 AND ac.`n_complainant` LIKE ?
									ORDER BY lc.`hearingDate` ASC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute(["%$search%", "%$search%"]);
							}else{
								$sql = "
									SELECT 
										ac.`admincomp_id`,
										ac.`n_complainant`,
										ac.`n_violator`,
										lc.`hearingDate`,
										lc.`hearingTime`,
										ls.`statusID`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 1
									ORDER BY lc.`hearingDate` ASC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute();
							}
							if($stmt->rowCount() > 0){
								while($row = $stmt->fetch()){
						?>
						<tr class="table-row" data-id="<?php echo $row['admincomp_id']; ?>">
							<td class="text-center"><?php echo $row['admincomp_id']; ?></td>
							<td class="text-center"><?php echo ucwords($row['n_complainant']); ?></td>
							<td class="text-center"><?php echo ucwords($row['n_violator']); ?></td>
							<td class="text-center"><?php echo date("F d, Y", strtotime($row['hearingDate']))." ".date("h:i a", strtotime($row['hearingTime'])); ?></td>
							<td class="text-center"><?php echo $row['fullname']; ?></td>
							<td class="text-end">
								<form action="db/lupon.php" method="post" id="form-setActive">
									<input type="hidden" name="complaintID" value="<?php echo $row['admincomp_id']; ?>">
									<input type="hidden" name="setAsActive">
									<a href="lupon_upcoming_hearing_details.php?id=<?php echo $row['admincomp_id']; ?>" class="btn btn-info btn-sm">View Details</a>
									<button name="setAsActive" class="btn btn-primary btn-sm setAsActive">Set as Active</button>
								</form>
							</td>	
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="6" class="text-center text-muted">No records to show</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

		</section>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".setAsActive").click(function(e){
					var form = $("#form-setActive");
					var btn = $(this);
					e.preventDefault();
					Swal.fire({
						title: 'Set it Active?',
						text: "Once it activated, it will be moved to active cases!",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Continue'
					}).then((result) => {
						if (result.isConfirmed) {
							$(btn).prop("disabled", true);
							$(form).unbind("submit").submit();
						}
					})
				});
			});
		</script>
	</body>
</html>			
					
					