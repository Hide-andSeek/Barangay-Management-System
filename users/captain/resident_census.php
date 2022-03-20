<?php
require 'db/conn.php';
include('announcement_includes/functions.php');
include('db/census.php')
?>
<?php session_start();



if (!isset($_SESSION["type"])) {
	header("location: officials.php");
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
<?php $random_num = '';
$random_num = rand(100000, 9999); ?>
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

	<link rel="stylesheet" href="css/admincompviewdet.css">

	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">

	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Resident Census </title>


	<style>
		* {
			font-size: 13px;
			font-family: "Poppins", sans-serif;
		}

		.modal {
			display: none;
			position: absolute;
			z-index: 9999;
			padding-top: 50px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.6);
			/* Black w/ opacity */
		}

		/* Modal Content (image) */
		.modal-content {
			display: absolute;
			margin: auto;
			max-width: 700px;
			width: 70%;
		}

		/* Add Animation */
		.modal-content,
		#caption {
			-webkit-animation-name: zoom;
			-webkit-animation-duration: 0.6s;
			animation-name: zoom;
			animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
			from {
				-webkit-transform: scale(0)
			}

			to {
				-webkit-transform: scale(1)
			}
		}

		@keyframes zoom {
			from {
				transform: scale(0)
			}

			to {
				transform: scale(1)
			}
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

		.widthinpuut {
			width: 90%;
		}

		.submtbtn:hover {
			opacity: 0.8;
		}

		.inpselect {
			width: 87%;
		}

		.col {
			margin-bottom: 5px;
		}

		.inpuselect {
			width: 94%
		}

		.inputselect {
			width: 97%;
		}

		.btnwidth {
			width: 99%;
		}

		.hoverback:hover {
			background: orange;
			border-radius: 70%;
		}
		.topright{float: right}
		.warningmess{color:red; font-size: 9px;}
		.label-danger {
		background-color: #d9534f;
		}
		.label-danger[href]:hover,
		.label-danger[href]:focus {
		background-color: #c9302c;
		}

		.label {
		display: inline;
		padding: .2em .6em .3em;
		font-size: 100%;
		font-weight: bold;
		line-height: 1;
		color: #fff;
		text-align: center;
		white-space: nowrap;
		vertical-align: baseline;
		border-radius: .25em;
		}
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
				$sql_query = "SELECT id, householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year
		FROM census 
		ORDER BY id DESC";
			} else {
				$sql_query = "SELECT id, householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year
				FROM census
				WHERE householdid LIKE ? 
				ORDER BY id DESC";
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
					$data['id'],
					$data['householdid'],
					$data['no_of_people'],
					$data['addpeople'],
					$data['house'],
					$data['lastname'],
					$data['firstname'],
					$data['middlename'],
					$data['suffix'],
					$data['gender'],
					$data['maritalstatus'],
					$data['dateofbirth'],
					$data['placeofbirth'],
					$data['houseno'],
					$data['street'],
					$data['barangay'],
					$data['city'],
					$data['contactnumber'],
					$data['seniorcitizen'],
					$data['employeed'],
					$data['occupation'],
					$data['voter'],
					$data['registered_year']
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
				$sql_query = "SELECT id, householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year
				FROM census
				ORDER BY id DESC LIMIT ?, ?";
			} else {
				$sql_query = "SELECT id, householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year
				FROM census 
				WHERE householdid LIKE ? 
				ORDER BY id DESC LIMIT ?, ?";
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
					$data['id'],
					$data['householdid'],
					$data['no_of_people'],
					$data['addpeople'],
					$data['house'],
					$data['lastname'],
					$data['firstname'],
					$data['middlename'],
					$data['suffix'],
					$data['gender'],
					$data['maritalstatus'],
					$data['dateofbirth'],
					$data['placeofbirth'],
					$data['houseno'],
					$data['street'],
					$data['barangay'],
					$data['city'],
					$data['contactnumber'],
					$data['seniorcitizen'],
					$data['employeed'],
					$data['occupation'],
					$data['voter'],
					$data['registered_year']
				);
				// for paging purpose
				$total_records_paging = $total_records;
			}

			// if no data on database show "No Reservation is Available"
			if ($total_records_paging == 0) {
				echo "
			<h3 style='text-align: center; margin-top: 5%;'>Data Not Shown!</h3>
			<div class='alert alert-warning cattxtbox'>
				<h6> Unfortunately, the page you were looking for could not be found. It may be temporarily unavailable, moved or no longer exists </h6>
				<div style='display: flex; justify-content: center; align-items: center; margin-top: 25px;'>
					<img style='opacity: 0.8;' src='../img/inmaintenance.png'/>
				</div>
			</div>
			<div style='text-align: center; margin-top: 5%'>
				<a href='barangayidapproval.php' class='viewbtn1' style='float: left;width: 40%; margin-left: 60px;' title='Visit?'><< Wanna visit <strong> approval page?</strong></a>
				<a href='barangayiddeny.php' class='viewbtn1' style='float: right; width: 40%; margin-right: 60px;' title='Visit?'>Wanna visit <strong> denied request page? >></strong></a>
			</div>
			";
			?>

			<?php
				// otherwise, show data
			} else {
				$row_number = $from + 1;
			?>
				<div style="text-align: center;">
					<hr>
					<h5>Census</h5>
					<hr />
				</div>
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

			
				<div class="col-md-12">
					<table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px; text-align: center;">
						<thead>
							<tr class="t_head">
								<th width="15%" style="text-align: center;">House ID</th>
								<th width="15%" style="text-align: center;">Name</th>
								<th width="15%" style="text-align: center;">Birthday</th>
								<th width="15%" style="text-align: center;">Place of Birth</th>
								<th width="15%" style="text-align: center;">Address</th>
								<th width="15%" style="text-align: center;"></th>
							</tr>
						</thead>
						<?php
						while ($stmt_paging->fetch()) { ?>
							<tbody>
								<tr class="table-row">
									<td><input type="hidden" name="<?php echo $data['id']; ?>"><?php echo $data['householdid']; ?></td>
									<td><?php echo $data['firstname']; ?> <?php echo $data['middlename']; ?> <?php echo $data['lastname']; ?></td>
									<td><?php echo $data['dateofbirth']; ?></td>
									<td><?php echo $data['placeofbirth']; ?></td>
									<td><?php echo $data['houseno']; ?> <?php echo $data['street']; ?> <?php echo $data['barangay']; ?> <?php echo $data['city']; ?></td>

									<td>
										<a style="text-decoration: none; width: 110px; height:30px;" class="form-control generate viewbtn button" href="resident_census_add_family_members.php?id=<?php echo $data['householdid']; ?>" target="_blank"> <span>  Family</span></a>
									</td>

								</tr>
							</tbody>
					<?php
						}
					}
					?>
					</table>

				</div>
				<div class="col-md-12 pagination">
					<h4 class="page">
						<?php
						// for pagination purpose
						$function->doPages($offset, 'barangayid_approvedpage.php', '', $total_records, $keyword);
						?>
					</h4>
				</div>
		</div>
		<div id="content" class="container col-md-12">
		<?php echo isset($error['censuss']) ? $error['censuss'] : '';?>
				<div id="London" class="w3-container city" style="margin-top: 50px;">
					<form class="form-signin" action="" method="POST" name="myform">
						<hr>
						<br>
						<fieldset>
						<div class="row align-items-start">
							<div class="information col">
                                <label class="employee-label">Household ID:</label>
                                <input type="number" class="form-control inputtext widthinpuut"  name="householdid" placeholder="Number of People" value="<?php echo $random_num; ?>" readonly>
                            </div>

							<div class="information col">
                                <label class="employee-label">Number of People (In House) <i class="required-field">*</i></label>
                                <input type="number" class="form-control inputtext widthinpuut"  name="no_of_people" placeholder="Number of People" onKeyPress="if(this.value.length==2) return false;">
								<label class="employee-label warningmess"><?php echo isset($error['no_of_people']) ? $error['no_of_people'] : '';?></label>
                            </div>
							<div class="information col">
                                        <label class="employee-label">People staying in your house? <i class="required-field">*</i></label><br>
                                        <select class="form-control inputtext widthinpuut" name="addpeople" id="gender" >
                                            <option disabled>- Select -</option>
                                            <option value="others">Children, related or unrelated, such as newborn babies, grandchildren, or foster children</option>
                                            <option value="relatives">Relatives</option>
                                            <option value="nonrelatives">Nonrelatives</option>
                                            <option value="nonadditional">No additional people</option>
                                        </select>
										<label class="employee-label warningmess"><?php echo isset($error['addpeople']) ? $error['addpeople'] : '';?></label>
                                    </div>
                                    <div class="information col">
                                        <label class="employee-label">In this house, apartment, Are you? <i class="required-field">*</i></label><br>
                                        <select class="form-control inputtext widthinpuut" name="house" id="house" >
                                            <option disabled>- Select -</option>
                                            <option value="Owner">Owner</option>
                                            <option value="Tenant">Tenant</option>
                                        </select>
										<label class="employee-label warningmess"><?php echo isset($error['house']) ? $error['house'] : '';?></label>
                                    </div>
						</div>
						<br>

						<hr>	
						<div style="text-align: center;">
						<h5></h5>
						</div>
							<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Last name: <i class="required-field">*</i></label>
											<input type="text" class="form-control inputtext widthinp" name="lastname" placeholder="Last Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
											<label class="employee-label warningmess"><?php echo isset($error['lastname']) ? $error['lastname'] : '';?></label>
										</div>
										<div class="information col">
											<label class="employee-label">First name: <i class="required-field">*</i></label>
											<input type="text" class="form-control inputtext widthinp" name="firstname" placeholder="First Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
											<label class="employee-label warningmess"><?php echo isset($error['firstname']) ? $error['firstname'] : '';?></label>
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
											<label class="employee-label">Sex: <i class="required-field">*</i></label>
											<select class="form-control inputtext inpselect" name="gender">
												<option disabled>- Select -</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
											<label class="employee-label warningmess"><?php echo isset($error['gender']) ? $error['gender'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Status: <i class="required-field">*</i></label>
											<select name="maritalstatus" class="form-control inputtext inpselect" >
												<option disabled>- Select -</option>
												<option value="single">Single</option>
												<option value="married">Married</option>
												<option value="widowed">Widowed</option>
												<option value="divorced">Divorced</option>
											</select>
											<label class="employee-label warningmess"><?php echo isset($error['maritalstatus']) ? $error['maritalstatus'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Birthday: <i class="required-field">*</i></label>
											<input type="date" class="form-control inputtext inpselect" name="dateofbirth" placeholder="Date Of Birth">
											<label class="employee-label warningmess"><?php echo isset($error['dateofbirth']) ? $error['dateofbirth'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Place of Birth: <i class="required-field">*</i></label>
											<input type="text" class="form-control inputtext inpselect" name="placeofbirth" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Place Of Birth">
											<label class="employee-label warningmess"><?php echo isset($error['placeofbirth']) ? $error['placeofbirth'] : '';?></label>
										</div>
							
									</div>
									<div class="row align-items-start">	
										<div class="information col">
											<label class="employee-label">House no: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect"  type="number" Placeholder="House#" name="houseno">
											<label class="employee-label warningmess"><?php echo isset($error['houseno']) ? $error['houseno'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Street: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Street" name="street">
											<label class="employee-label warningmess"><?php echo isset($error['street']) ? $error['street'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Barangay: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Barangay" name="barangay">
											<label class="employee-label warningmess"><?php echo isset($error['barangay']) ? $error['barangay'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Lungsod/City: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect"  type="text" Placeholder="Lungsod/City" name="city">
											<label class="employee-label warningmess"><?php echo isset($error['city']) ? $error['city'] : '';?></label>
										</div>

									</div>
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Mobile no:</label><br>
											<input type="number" Placeholder="Mobile no." name="contactnumber" class="form-control inputtext inpuselect" onKeyPress="if(this.value.length==11) return false;" >
											<label class="employee-label warningmess"><?php echo isset($error['contactnumber']) ? $error['contactnumber'] : '';?></label>
										</div>
										
										<div class="information col">
											<label class="employee-label">Senior Citizen: <i class="required-field">*</i></label>
											<select class="form-control inputtext inpuselect" name="seniorcitizen" >
												<option disabled>- Select -</option>
												<option value="Yes">Yes</option>
												<option value="No">No</option>
											</select>
											<label class="employee-label warningmess"><?php echo isset($error['seniorcitizen']) ? $error['seniorcitizen'] : '';?></label>
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
								<label class="employee-label">Currently Employed (if yes, please specify Occupation) <i class="required-field">*</i></label><br>
								<select class="form-control inputtext inpuselect" name="employeed" >
									<option disabled>- Select -</option>
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
								<label class="employee-label warningmess"><?php echo isset($error['employeed']) ? $error['employeed'] : '';?></label>
								<br>
								<input type="text" Placeholder="Occupation (Optional)" name="occupation" class="form-control inputtext inpuselect"  >
							</div>

								<div class="information col">
									<label class="employee-label">Registered Voter (If yes, please specify year registration): <i class="required-field">*</i></label><br>
									<select class="form-control inputtext inpuselect" name="voter"  id="voter"  onchange="enabledisabletext()">
										<option disabled>- Select -</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
									<label class="employee-label warningmess"><?php echo isset($error['voter']) ? $error['voter'] : '';?></label>
									<br> 
									<input type="text" class="form-control inputtext inpuselect" Placeholder="Registered Year (Optional)" id="registered_year" name="registered_year" >
								</div>
						</div>
						<br>
                        <hr>
						<br>
						<div class="row align-items-start" style="margin-left: 16px;">
							<div class="information col">
								<button type="submit" name="submitcensus" class="font-sizee form-control btnmargin button btnwidth"><i class="icon-save icon-large"></i><span> Submit</span> </button>
							</div>
						</div>
					</form>
				</div>
			<br>
			<br>
			<br>

	</section>
	
	<!-- <script>
		function enabledisabletext()
		{
		if(document.myform.voter.value=='yes')
		{
		document.myform.registered_year.disabled=true;
		// document.myform.mytext2.disabled=false;
		}
		if(document.myform.voter.value=='no')
		{
		document.myform.registered_year.disabled=false;
		// document.myform.mytext2.disabled=true;
		}
		}
	</script> -->
	<script src="resident-js/barangay.js"></script>
	
</body>

</html>