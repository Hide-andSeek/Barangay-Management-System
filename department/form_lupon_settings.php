<?php
	session_start();

	if(!isset($_SESSION["type"])){
		header("location: 0index.php");
	}
	require 'db/conn.php';

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
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

		<title> Lupon Settings </title>

		<style>
			.table-personnel{
				border: 1px solid gray;
				border-collapse: collapse;
				width: 100%;
				height: 80px !important;
				max-height: 80px !important;
				border-radius: 5px 5px 0 0;
				overflow: scroll;
			}
			.table-personnel thead{
				background: #04AA6D;
			}
			.table-personnel thead tr{
				background: #04AA6D;
			}
			.table-personnel thead tr th{
				padding: 20px 10px;
				color: #fff;
			}
			.table-personnel tr,
			.table-personnel tr th,
			.table-personnel tr td{
				border: 1px solid #dddddd;
			}
			.table-personnel tr td{
				max-width:100%;
				padding: 10px;
			}
			.w3-modal-content{
				width: 600px !important;
			}
			.form-group {
				padding: 0;
				height: auto;
				width: auto;
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
				<li class="active">
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
			<br><br>
			<div class="container">
				<div class="row mb-5">
					<div class="col-lg-12 mb-3">
						<button class="btn btn-primary btn-sm addPersonnel"><i class="fa fa-plus"></i> Add Personnel</button>
					</div>
					<div class="col-lg-12">
						<table class="table-personnel">
							<thead>
								<tr>
									<th>Personnel Name</th>
									<th>Day Available</th>
									<th>Action</th>
								</tr>                 
							</thead>
							<tbody>
								<?php 
									$sql = "SELECT * FROM hearingPersonnels ORDER BY personnelID DESC;";
									$stmt = $db->prepare($sql);
									$stmt->execute();
									if($stmt->rowCount() > 0){
										while($row = $stmt->fetch()){
											$dayAvailable = "";
											if($row['dayAvailable'] == 0 ){
												$dayAvailable = "monday";
											}else if($row['dayAvailable'] == 1 ){
												$dayAvailable = "tuesday";
											}else if($row['dayAvailable'] == 2 ){
												$dayAvailable = "wednesday";
											}else if($row['dayAvailable'] == 3 ){
												$dayAvailable = "thursday";
											}else if($row['dayAvailable'] == 4 ){
												$dayAvailable = "friday";
											}else if($row['dayAvailable'] == 5 ){
												$dayAvailable = "saturday";
											}
								?>
								<tr data-id="<?php echo $row['personnelID']; ?>">
									<td><?php echo ucwords($row['fullname']); ?></td>
									<td><?php echo strtoupper($dayAvailable); ?></td>
									<td>
										<button class="btn btn-primary btn-sm editPersonnel"><i class="fa fa-pencil"></i> Edit</button>
									</td>
								</tr>
								<?php }}else{ ?>
								<tr>
									<td colspan="3" class="text-center text-muted">No records to show</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<!-- Personnel Modal -->
						<div id="modalPersonnel" class="w3-modal">
							<div class="w3-modal-content w3-animate-top">
								<header class="w3-container w3-teal">
									<span onclick="document.getElementById('id01').style.display='none'"
									class="w3-button w3-display-topright closeModal">&times;</span>
									<h2>Data Entry</h2>
								</header>
								<div class="w3-container p-3">
									<form action="db/lupon.php" method="post" id="form-personnel">
										<input type="hidden" name="personnelID" class="form-control personnelID" id="personnelID" value="">
										<div class="form-group mb-3">
											<label for="fullname">Fullname:</label>
											<input type="text" class="form-control" name="fullname" id="fullname" required>
										</div>
										<div class="form-group mb-3">
											<label for="dayAvailable">Available Day:</label>
											<select class="form-control" name="dayAvailable" id="dayAvailable" required>
												<option value="">--</option>
												<option value="0">Monday</option>
												<option value="1">Tuesday</option>
												<option value="2">Wednesday</option>
												<option value="3">Thursday</option>
												<option value="4">Friday</option>
												<option value="5">Saturday</option>
											</select>
										</div>
										<div class="text-end">
											<button class="btn btn-primary btn-sm" name="savePersonnel">Save</button>
											<button type="button" class="btn btn-secondary btn-sm closeModal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>
			$(document).ready(function(){
				$(".addPersonnel").click(function(){
					$("#modalPersonnel").css("display", "block");
					$("#personnelID").val("");
					$("#fullname").val("");
					$("#dayAvailable option:selected").removeAttr("selected");
					$("#fullname").focus();
				});
				$(".editPersonnel").click(function(){
					var personnelID = $(this).closest("tr").data("id");
					$("#modalPersonnel").css("display", "block");
					$.ajax({
						url: "db/lupon.php",
						type: "post",
						dataType: "json",
						data: {
							fetchPersonnels: 1,
							personnelID: personnelID,
						}, success: function(data){
							console.log(data);
							$("#personnelID").val(data.personnelID);
							$("#fullname").val(data.fullname);
							$("#dayAvailable").val(data.dayAvailable);
							$("#fullname").focus();
						}, error: function(){
							alert("There was a problem loading the data. Please refresh the page.");
						}
					});
				});
				$(".closeModal").click(function(){
					$("#modalPersonnel").css("display", "none");
					$("#form-personnel").trigger("reset");
				});
				$("#form-personnel").on("submit", function(){
					$(this).find(".savePersonnel").prop('disabled', true);
				});
			});
		</script>
	</body>
</html>			
					
					