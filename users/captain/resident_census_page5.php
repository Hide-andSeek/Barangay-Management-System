<?php session_start();

if (!isset($_SESSION["type"])) {
	header("location: officials.php");
}
require 'db/conn.php';
include('announcement_includes/functions.php');
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
	<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
	<link rel="stylesheet" href="css/styles.css">
	<script src="resident-js/sweetalert.min.js"></script>
	<link rel="stylesheet" href="announcement_css/custom.css">
	<link rel="stylesheet" href="css/accounting.css">
	<script src="resident-js/sweetalert.min.js"></script>
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Resident Census </title>


	<style>
		* {
			font-size: 13px;
			font-family: "Poppins", sans-serif;
		}

		.inputtext,
		.inputpass {
			font-size: 13px;

			width: 98%;
		
			margin: 4px 18px;
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
		.widthinpuut{width: 90%;}

		.submtbtn:hover {
			opacity: 0.8;
		}
		.inpselect{width: 87%;}
		.col{margin-bottom: 5px;}
		.inpuselect{width: 94%}
		.inputselect{width: 97%;}
		.btnwidth{width: 99%;}
	</style>
</head>

<body onload="display_ct()">
	<!-- Side Navigation Bar-->
	<div class="sidebar captain_sidebar myDIV">
		<div class="logo-details">
			<img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="" />
			<div class="logo_name">Barangay Captain</div>
			<i class='bx bx-menu menu' id="btn"></i>
		</div>
		<ul class="nav-list">
			<li>
				<a class="side_bar nav-button" href="captaindashboard.php">
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
				<a class="side_bar nav-button nav-active" href="residentcensus.php">
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

			<li class="profile">
				<div class="profile-details">
					<div class="name_job" style="font-size: 13px;">
						<div><strong><?php echo $user; ?></strong></div>
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
	<section class="home-section">
		<!-- Top Section -->
		<section class="top-section">
			<div class="top-content">
				<div>
					<h5>Resident Census
						<a href="#" class="circle">
							<img src="img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>
		<div id="content" class="container col-md-12">
				<div id="London" class="w3-container city" style="margin-top: 50px;">
					<form class="form-signin" method="POST">
                        <h5 style="margin-left: 20px;">Add Family Member 5</h5>
						<div style="text-align: center;">
                        
						<h5>Census: Household/ Personal Information</h5>
						</div>
						<hr>
						<br>
						<?php $random_num = ''; $random_num = rand(100000, 9999); ?> 
						<fieldset>
						<div class="row align-items-start">
							<div class="information col">
                                <label class="employee-label">Household ID: </label>
                                <input type="number" class="form-control inputtext widthinp"  name="householdid" onKeyPress="if(this.value.length==8) return false;" value="<?php echo $random_num ?>" readonly>
                            </div>

							<div class="information col">
                                <label class="employee-label">Number of People (In House)</label>
                                <input type="number" class="form-control inputtext widthinp"  name="no_of_people" placeholder="Number of People" onKeyPress="if(this.value.length==2) return false;">
                            </div>
							<div class="information col">
                                        <label class="employee-label">People are staying in this house are</label><br>
                                        <select class="form-control inputtext widthinp" name="addpeople" id="gender">
                                            <option selected disabled>- Select -</option>
                                            <option value="others">Children, related or unrelated, such as newborn babies, grandchildren, or foster children</option>
                                            <option value="relatives">Relatives</option>
                                            <option value="nonrelatives">Nonrelatives</option>
                                            <option value="nonadditional">No additional people</option>
                                        </select>
                                    </div>
                                    <div class="information col">
                                        <label class="employee-label">Do you own or rent this house?</label><br>
                                        <select class="form-control inputtext widthinp" name="house" id="gender">
                                            <option selected disabled>- Select -</option>
                                            <option value="owner">Owner</option>
                                            <option value="tenant">Tenant</option>
                                        </select>
                                    </div>
						</div>
						<br>

						<hr>	
						<div style="text-align: center;">
						<h5></h5>
						</div>
							<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Last name:</label>
											<input type="text" class="form-control inputtext widthinp" name="lastname" placeholder="Last Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
										</div>
										<div class="information col">
											<label class="employee-label">First name:</label>
											<input type="text" class="form-control inputtext widthinp" name="firstname" placeholder="First Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
										</div>
									
										<div class="information col">
											<label class="employee-label">Middle name:</label>
											<input type="text" class="form-control inputtext widthinp" name="middlename" placeholder="(Optional)" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
										</div>

										<div class="information col">
											<label class="employee-label">Suffix:</label>
											<input type="text" class="form-control inputtext widthinp" name="suffix" placeholder="Ex. Jr/Sr." onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" onKeyPress="if(this.value.length==2) return false;">
										</div>
									</div>
									
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Sex:</label>
											<select class="form-control inputtext inpselect" name="gender">
												<option selected disabled>- Select -</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>

										<div class="information col">
											<label class="employee-label">Status:</label>
											<select name="maritalstatus" class="form-control inputtext inpselect">
												<option selected disabled>- Select -</option>
												<option value="single">Single</option>
												<option value="married">Married</option>
												<option value="widowed">Widowed</option>
												<option value="divorced">Divorced</option>
											</select>
										</div>

										<div class="information col">
											<label class="employee-label">Birthday:</label>
											<input type="date" class="form-control inputtext inpselect" name="dateofbirth" placeholder="Date Of Birth">
										</div>

										<div class="information col">
											<label class="employee-label">Place of Birth:</label>
											<input type="text" class="form-control inputtext inpselect" name="placeofbirth" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Place Of Birth">
										</div>
							
									</div>
									<div class="row align-items-start">	
										<div class="information col">
											<label class="employee-label">House no:</label><br>
											<input class="form-control inputtext inpselect"  type="number" Placeholder="House#" name="houseno" onKeyPress="if(this.value.length==3) return false;">
										</div>

										<div class="information col">
											<label class="employee-label">Street:</label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Street" name="street">
										</div>

										<div class="information col">
											<label class="employee-label">Barangay:</label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Barangay" name="barangay">
										</div>

										<div class="information col">
											<label class="employee-label">Lungsod/City:</label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Lungsod/City" name="city">
										</div>

									</div>
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Mobile no:</label><br>
											<input type="number" Placeholder="Mobile no." name="contactnumber" class="form-control inputtext inpuselect" onKeyPress="if(this.value.length==11) return false;">
										</div>
										
										<div class="information col">
											<label class="employee-label">Senior Citizen:</label>
											<select class="form-control inputtext inpuselect" name="seniorcitizen">
												<option selected disabled>- Select -</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
									</div>
						</fieldset>
						</div>
				<br>
					<!-- <div style="text-align: center;">
						<img src="img/clover.png" style="opacity: 0.7;" width="18px" height="18px">
					</div> -->
				<hr>
						<div class="row align-items-start">
							<div class="information col">
								<label class="employee-label">Currently Employed (if yes, please specify Occupation)</label><br>
								<select class="form-control inputtext inpuselect" name="employeed">
									<option disabled selected>- Select -</option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<br>
								<input type="text" Placeholder="Occupation (Optional)" name="occupation" class="form-control inputtext inpuselect" >
							</div>

								<div class="information col">
									<label class="employee-label">Registered Voter (If yes, please specify year registration):</label><br>
									<select class="form-control inputtext inpuselect" name="voter">
										<option disabled selected>- Select -</option>
										<option value="yes">Yes</option>
										<option value="no">No</option>
									</select>
									<br> 
									<input type="text" class="form-control inputtext inpuselect" placeholder="Registered Year (Optional)" name="registered_year">
								</div>
						</div>
                        <br>
                        <hr>
						<br>
						<div class="row align-items-start" style="margin-left: 16px;">
							<div class="information col">
								<button type="submit" name="submitcensus" class="font-sizee form-control btnmargin button btnwidth" style="margin-bottom: 10px;" name="save"><i class="icon-save icon-large"></i><span> Save</span> </button>

								<a class="btn btn-success btnwidth" name="proceed" href="resident_census_page_6.php" style="margin-bottom: 10px;"><i class="icon-save icon-large"></i> Proceed </a>
								<br>
                                <br>
                                <br>
								<label><.. / Page 1 / Page 2 / Page 3 / Page 4 / <strong> Page 5 </strong></label>
							</div>
						</div>
					</form>
				</div>
				
			<br>
			<br>
			<br>
	</section>
	<script src="resident-js/barangay.js"></script>
</body>

</html>