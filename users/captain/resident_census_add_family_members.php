<?php session_start();

if (!isset($_SESSION["type"])) {
	header("location: officials.php");
}
require 'db/conn.php';
include('announcement_includes/functions.php');
include('db/census.php')
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
	<link rel="stylesheet" href="css/admincompviewdet.css">

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
					<h5>Resident Census > Add Family Members
						<a href="#" class="circle">
							<img src="img/dt.png">
						</a>
					</h5>
				</div>
			</div>
		</section>
		<div id="content" class="container col-md-12">
			<?php
        if(isset($_GET['id'])){
            $ID = $_GET['id'];
        }else{
            $ID = "";
        }

        // create array variable to store data from database
        $data = array();

        // get all data from menu table and category table
        $sql_query = "SELECT id, householdid,no_of_people, addpeople, house, lastname, firstname, middlename, suffix, gender, maritalstatus, dateofbirth, placeofbirth, houseno, street, barangay, city, contactnumber, seniorcitizen, employeed, occupation, voter, registered_year, date_added, time_added
                FROM census
                WHERE householdid = ?";

        $stmt = $connect->stmt_init();
        if($stmt->prepare($sql_query)) {	
            // Bind your variables to replace the ?s
            $stmt->bind_param('s', $ID);
            // Execute query
            $stmt->execute();
            // store result 
            $stmt->store_result();
            $stmt->bind_result($data1['id'], 
					$data1['householdid'],
					$data1['no_of_people'],
					$data1['addpeople'],
					$data1['house'],
					$data1['lastname'],
					$data1['firstname'],
					$data1['middlename'],
					$data1['suffix'],
					$data1['gender'],
					$data1['maritalstatus'],
					$data1['dateofbirth'],
					$data1['placeofbirth'],
					$data1['houseno'],
					$data1['street'],
					$data1['barangay'],
					$data1['city'],
					$data1['contactnumber'],
					$data1['seniorcitizen'],
					$data1['employeed'],
					$data1['occupation'],
					$data1['voter'],
					$data1['registered_year'],
					$data1['date_added'],
					$data1['time_added']
                    );
            $stmt->fetch();
            $stmt->close();
        }

        ?>
		</div>

        
        </div>
        <br>
		<div style="text-align: center;">
			<hr>
			<h5>Family Members</h5>
			<hr>
		</div>
		<br>
        <div style="float: right; margin-right: 20px;">
            <a href="residentcensus.php">
                <img src="img/back.png" title="Back?" class="hoverback" style="width: 50px; height: 50; cursor: pointer;" alt="Back?">
            </a>
        </div>
		<br>
        <br>
		<div id="content" class="container col-md-12">
				<div id="London" class="w3-container city" style="margin-top: 50px;">
                
                <div class="col-md-12">
				<table id="viewdetails" style="margin-bottom: 30px; margin-top: 30px;">
						
						<?php	
                            if (isset($_GET['id'])) {
                            $ID = $_GET['id'];
                            } else {
                                $ID = "";
                            }
                
                            // create array variable to store data from database
                            $data = array();	

							$mquery = "SELECT * FROM census_fam_members WHERE householdid = $ID ORDER BY id DESC";
							$countemployee = $db->query($mquery)
						?>
						
							<thead>
								<tr>
                                    <th width="8%" style="text-align:center;">Household ID</th>
                                    <th width="15%" style="text-align:center;">Name</th>
                                    <th width="15%" style="text-align:center;">Violator's Name</td>
                                    <th width="15%" style="text-align:center;">Working</th>
                                    <th width="15%" style="text-align:center;">Date Added</th>
                                    <th width="15%" style="text-align:center;">Time Added</th>
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
                            <tbody>
                                <tr>
                                        <td style="text-align:center;"><?php echo $data['householdid']; ?></td>
                                        <td style="text-align:center;"><?php echo $data['firstname']; ?> <?php echo $data['middlename']; ?> <?php echo $data['lastname']; ?></td>
                                        <td style="text-align:center;"><?php echo $data['houseno']; ?> <?php echo $data['street']; ?> <?php echo $data['barangay']; ?> <?php echo $data['city']; ?></td>
                                        <td style="text-align:center;"><?php echo $data['employeed'] ?></td>
                                        <td style="text-align:center;"><?php echo $data['date_added']; ?></td>
                                        <td style="text-align:center;"><?php echo $data['time_added']; ?></td>
                                </tr>	
							</tbody>
							<?php
							}
							?>
						
						</table>
					<form class="form-signin" action="" method="POST">
						<hr>
						<br>
						
						<fieldset>
						<div class="row align-items-start">
							<div class="information col">
                                <label class="employee-label">Household ID:</label>
                                <input type="number" class="form-control inputtext widthinpuut"  name="householdid" placeholder="Number of People" value="<?php echo $data1['householdid']; ?>" readonly>
                            </div>

							<div class="information col">
                                <label class="employee-label">Number of People (In House) <i class="required-field">*</i></label>
                                <input type="number" class="form-control inputtext widthinpuut"  name="no_of_people" placeholder="Number of People" value="<?php echo $data1['no_of_people']; ?>" onKeyPress="if(this.value.length==2) return false;" readonly>
								<label class="employee-label warningmess"><?php echo isset($error['no_of_people']) ? $error['no_of_people'] : '';?></label>
                            </div>
							<div class="information col">
                                        <label class="employee-label">Is there any additional people staying in<i class="required-field">*</i></label><br>
                                        <select class="form-control inputtext widthinpuut" name="addpeople">
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
                                        <select class="form-control inputtext widthinpuut" name="house">
                                            <option disabled>- Select -</option>
                                            <option value="owner">Owner</option>
                                            <option value="tenant">Tenant</option>
                                        </select>
										<label class="employee-label warningmess"><?php echo isset($error['house']) ? $error['house'] : '';?></label>
                                    </div>
						</div>

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
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
											<label class="employee-label warningmess"><?php echo isset($error['gender']) ? $error['gender'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Status: <i class="required-field">*</i></label>
											<select name="maritalstatus" class="form-control inputtext inpselect">
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
											<input class="form-control inputtext inpselect"  type="number" Placeholder="House#" name="houseno" value="<?php echo $data1['houseno']; ?>">
											<label class="employee-label warningmess"><?php echo isset($error['houseno']) ? $error['houseno'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Street: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect" value="<?php echo $data1['street']; ?>" type="text" Placeholder="Street" name="street">
											<label class="employee-label warningmess"><?php echo isset($error['street']) ? $error['street'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Barangay: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect" value="<?php echo $data1['barangay']; ?>"  type="text" Placeholder="Barangay" name="barangay">
											<label class="employee-label warningmess"><?php echo isset($error['barangay']) ? $error['barangay'] : '';?></label>
										</div>

										<div class="information col">
											<label class="employee-label">Lungsod/City: <i class="required-field">*</i></label><br>
											<input class="form-control inputtext inpselect" value="<?php echo $data1['city']; ?>" type="text" Placeholder="Lungsod/City" name="city" >
											<label class="employee-label warningmess"><?php echo isset($error['city']) ? $error['city'] : '';?></label>
										</div>

									</div>
									<div class="row align-items-start">
										<div class="information col">
											<label class="employee-label">Mobile no:</label><br>
											<input type="number" Placeholder="(Optional)" name="contactnumber" class="form-control inputtext inpuselect" onKeyPress="if(this.value.length==11) return false;" >
										</div>
										
										<div class="information col">
											<label class="employee-label">Senior Citizen: <i class="required-field">*</i></label>
											<select class="form-control inputtext inpuselect" name="seniorcitizen" required>
												<option disabled>- Select -</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
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
								<select class="form-control inputtext inpuselect" name="employeed">
									<option disabled>- Select -</option>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<label class="employee-label warningmess"><?php echo isset($error['employeed']) ? $error['employeed'] : '';?></label>
								<br>
								<input type="text" Placeholder="Occupation (Optional)" name="occupation" class="form-control inputtext inpuselect"  >
							</div>

								<div class="information col">
									<label class="employee-label">Registered Voter (If yes, please specify year registration): <i class="required-field">*</i></label><br>
									<select class="form-control inputtext inpuselect" name="voter">
										<option disabled>- Select -</option>
										<option value="yes">Yes</option>
										<option value="no">No</option>
									</select>
									<label class="employee-label warningmess"><?php echo isset($error['voter']) ? $error['voter'] : '';?></label>
									<br> 
									<input type="text" class="form-control inputtext inpuselect" Placeholder="Registered Year (Optional)" name="registered_year" >
								</div>
						</div>
						<br>
                        <hr>
						<br>
						<div class="row align-items-start" style="margin-left: 16px;">
							<div class="information col">
								<button type="submit" name="addfammember" class="font-sizee form-control btnmargin button btnwidth"><i class="icon-save icon-large"></i><span> Submit</span> </button>
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