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
				<a class="side_bar nav-button nav-active" href="resident_census_household.php">
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
                            <hr>	
                            <div style="text-align: center;">
                            <h5>Census: Personal Information</h5>
                            </div>
                            <br>
                            <br>
                            
                            <fieldset>
                                <div class="row align-items-start">
                                    <div class="information col">
                                        <label class="employee-label">Number of People (In House)</label>
                                        <input type="text" class="form-control inputtext inpselect"  name="no_of_people" placeholder="Number of People">
                                    </div>
                                    <div class="information col">
                                        <label class="employee-label">2. Were there any additional people staying on your house?</label><br>
                                        <select class="form-control inputtext inpselect" name="addpeople" id="gender" required>
                                            <option selected>- Select -</option>
                                            <option value="others">Children, related or unrelated, such as newborn babies, grandchildren, or foster children</option>
                                            <option value="relatives">Relatives</option>
                                            <option value="nonrelatives">Nonrelatives</option>
                                            <option value="nonadditional">No additional people</option>
                                        </select>
                                    </div>
                                    <div class="information col">
                                        <label class="employee-label">2. In this house, apartment, Are you?</label><br>
                                        <select class="form-control inputtext inpselect" name="house" id="gender" required>
                                            <option  selected>- Select -</option>
                                            <option value="owner">Owner</option>
                                            <option value="tenant">Tenant</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            </div>
                        </form>
                    </div>
            </div>
			<hr>
	</section>

    <form action="" class="form-signin" method="POST">
    <h2 class="text text-center"> CENSUS FORM </h2>
    <label for="">1. How many people were living or staying in this house, apartment</label>

                    <div class="col-small-3">
                    <input type="text" class="input-block-level"  name="no_of_people" placeholder="Number of People">
                    </div>

                    <div class="col-small-3">
                    <label for="">2. Were there any additional people staying on your house?</label><br>
                    <select class="col-small-9" name="addpeople" id="gender" required>
                    <option value="" selected>- Select -</option>
                    <option value="others">Children, related or unrelated, such as newborn babies, grandchildren, or foster children</option>
                    <option value="relatives">Relatives</option>
                    <option value="nonrelatives">Nonrelatives</option>
                    <option value="nonadditional">No additional people</option>
                    </select>
                    </div>

                    <div class="col-small-3">
                    <label for="">2. In this house, apartment, Are you?</label><br>
                    <select class="col-small-9" name="house" id="gender" required>
                    <option value="" selected>- Select -</option>
                    <option value="owner">Owner</option>
                    <option value="tenant">Tenant</option>
                    </select>
                    </div>


                    <div class="col-small-3">
                    <label for="">3. What is your contact number?</label><br>
                    <input type="text" Placeholder= "Contact number" name="contactnumber" required>
                    </div>




<br>
<br>
<button type="submit" class="btn btn-success" name="save"><i class="icon-save icon-large"></i> Save </button>	
<button class="btn btn-success" name="proceed"><i class="icon-save icon-large"></i> Proceed </button>	
</div>
	<script src="resident-js/barangay.js"></script>
</body>

</html>