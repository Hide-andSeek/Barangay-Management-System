<?php
require('timezone.php');
require "db/conn.php";
include "db/reqdocument.php";
include "db/documents.php";
include "db/user.php";


function start_session()
{
	$_SESSION['email'] = '';
	session_start();
	if (empty($_SESSION['email'])) {
		header("Location:index.php");
		exit();
	}
}
echo start_session();
function db_query()
{
	global $db;
	$stmt = $db->prepare("SELECT * FROM accreg_resident where resident_id=:uid");
	if ($stmt->execute(['uid' => $_SESSION['email']])) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$count = $stmt->rowcount();
	}
}
echo db_query();
?>

<?php

$f = "resources/barangayid_visit.php";
if (!file_exists($f)) {
	touch($f);
	$handle =  fopen($f, "w");
	fwrite($handle, 0);
	fclose($handle);
}
?>
<?php
$visitt = '';

$handle = fopen($f, "r");
$counter = (int) fread($handle, 20);
fclose($handle);

if (!isset($_POST["brgyidbtn"])) {
	$counter++;
}

$visitt = "<label style='color: gray; font-size: 13px; opacity: 0.6'><em>Viewed: " . $counter . " times </em></label>";
$handle =  fopen($f, "w");
fwrite($handle, $counter);
fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Barangay ID</title>

	<!-- Bootstrap Core CSS -->

	<link href="resident-css/bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->

	<link rel="stylesheet" href="resident-css/style.css">
	<link rel="stylesheet" href="qr_code/css.css">

	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

	<!-- Custom Fonts -->

	<link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/preloader.css">
	<!-- Custom Animations -->

	<link rel="stylesheet" href="residentcss/animate.css">

	<style>
		/* 9.0 -- Resident Default Page -- */
		.documentbtn {
			font-size: 15px;
			width: 200px;
			height: 100px;
			padding: 40px 40px 40px 40px;
			margin-bottom: 25px
		}

		.documentbtn:hover {
			background-color: gray;
			color: white;
		}

		.document_section {
			margin-top: 105px;
			margin-left: 35px;
			margin-right: 35px;
		}

		.previewbtn {
			width: 350px;
			height: 90px;
			margin: 25px;
			width: calc(100% - 125px);
			transition: all 0.5s ease;
		}

		.document-section {
			margin-top: 16px !important;
			margin-bottom: 16px !important
		}

		.document-light-grey,
		.document-hover-light-grey:hover {
			border-top-right-radius: 20px;
			border-top-left-radius: 20px;
			border-bottom-right-radius: 20px;
			border-bottom-left-radius: 20px;
			color: #000 !important;
		}

		.bgcolor {
			background-color: #ccc !important;
		}

		.document-button:hover {
			color: #000 !important;
			background-color: #ccc !important;
			width: 100%;
		}

		.document-block {
			display: block;
			width: 100%
		}

		.document-hide {
			display: none !important
		}

		.document-show {
			display: block !important
		}

		p.content {
			width: 450px;
			height: 300px;
		}



		.detailid {
			font-size: 11px;
			color: black;
			font-weight: 600
		}

		.form-text-desc {
			font-size: 14px;
			margin: 3px 3px;
			color: black;
		}

		.animatem {
			position: relative;
			animation: animatetop 0.5s
		}

		@keyframes animatetop {
			from {
				top: -450px;
				opacity: 0
			}

			to {
				top: 0;
				opacity: 1
			}
		}

		.modal-header {
			padding: 15px;
			border-bottom: 1px solid #e5e5e5;
			background: red;
		}

		.modalcontent-notif {
			height: 230px;
			width: 450px;
		}

		.modal-footer {
			padding: 15px;
			text-align: right;
			border-top: 1px solid #e5e5e5
		}

		.instruction {
			height: 150px;
			width: 150px;
			background-color: #f1f1f1 !important;
			border-radius: 50%;
			display: inline-block;
			position: auto;
			margin-left: 15px
		}


		.logdropbtn {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.logdropdown {
			display: inline-block;
		}

		.logdropdown-content {
			display: none;
			position: absolute;
			background-color: gray;
			min-width: 260px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		}

		.logdropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.logdropdown-content a:hover {
			background-color: #f1f1f1;
		}

		.logdropdown:hover .logdropdown-content {
			display: block;
		}

		/* Button */
		.btns-group {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 1.5rem;
		}

		.btn {
			padding: 0.75rem;
			display: block;
			text-decoration: none;
			background-color: var(--primary-color);
			color: #f3f3f3;
			text-align: center;
			border-radius: 0.25rem;
			cursor: pointer;
			transition: 0.3s;
		}

		.btn:hover {
			box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
		}

		.left_userpersonal_info {
			display: flex;
		}

		@media only screen and (max-width: 700px) {
			.left_userpersonal_info {
				display: block;
			}

			.form-group {
				margin-bottom: 35px;
				margin-left: 15px;
			}

			input {
				width: 100%;
				padding: 5px;
			}
		}

		.form-text {
			width: 100%;
			padding: 5px;
		}

		.selec {
			padding-bottom: 50px;
		}

		@media only screen and (max-width: 500px) {
			.left_userpersonal_info {
				display: block;
			}

			.form-group {
				margin-bottom: 35px;
				margin-left: 15px;
			}

			input {
				width: 100;
				padding: 5px;
			}
		}

		.form-text {
			width: 100%;
			padding: 5px;
		}

		.selec {
			padding-bottom: 50px;
		}

		.button {
			display: absolute;
			border-radius: 4px;
			background-color: #008CBA;

			border: none;
			color: #FFFFFF;
			width: 90%;
			transition: all 0.5s;
			cursor: pointer;
		}

		.button span {
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
		}

		.button span:after {
			content: '\2714';
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}

		.button:hover span {
			padding-right: 25px;
		}

		.button:hover span:after {
			opacity: 1;
			right: 0;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
		}

		.left_userpersonal_info1 {
			margin-bottom: 30px;
		}

		.reminder {
			background: #FCF8F2;
			padding: 20px 20px 20px 20px;
		}

		.reminder-heading {
			color: #EEA236
		}

		.blockqoute-color {
			border-left-color: #EEA236;
		}

		.linkpath:hover {
			color: orange;
		}

		.usersel {
			pointer-events: none;
			border: 1px solid orange
		}

		.containter-messnotif {
			text-align: center;
		}

		span.messnotif {
			padding-bottom: 10px;
		}

		.cattxtbox {
			margin-bottom: 10px;
		}

		@media screen and (max-width: 800px) {
            .logdropdown-content {
                position: relative;
            }
        }
		@media screen and (max-width: 600px) {
        .logdropdown-content {position: relative;}
        }
	</style>
</head>

<body onload=display_ct() id="#documents">
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>


	<header id="header">
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top navnav">
			<div class="container-fluid top-nav">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo-top page-scroll" href="resident-defaultpage.php" onclick="dstry()">
						<img class="brgy-logo" src="resident-img/Brgy-Commonwealth.png" alt="logo">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden nav-buttons">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="resident-defaultpage.php" onclick="dstry()">Home</a>
						</li>
						<li class="logdropdown">
							<a class="page-scroll logout" href="javascript:void(0)">Announcement</a>
							<span class="logdropdown-content">
								<a class="page-scroll" href="residentacademic.php" onclick="dstry()">Academic Related</a>
								<a class="page-scroll" href="residentannouncement.php" onclick="dstry()">Latest Announcement</a>
								<a class="page-scroll" href="resident_barangay_seminar.php" onclick="dstry()">Barangay Seminar</a>
								<a class="page-scroll" href="resident_health_related.php" onclick="dstry()">Health Related</a>
								<a class="page-scroll" href="residentbrgyprogram.php" onclick="dstry()">Barangay Programs</a>
								<a class="page-scroll" href="resident_sangguniang_kabataan.php" onclick="dstry()">Sangunian Kabataan</a>
							</span>
						</li>
						<li class="logdropdown">
							<a class="page-scroll logout" href="javascript:void(0)">Services</a>
							<span class="logdropdown-content">
								<a class="page-scroll" href="reqdoc_bpermit_new.php" onclick="dstry()">Business Permit</a>
								<a class="page-scroll" href="reqdoc_indigency.php" onclick="dstry()">Certificate of Indigency</a>
								<a class="page-scroll" href="reqdoc_clearance.php" onclick="dstry()">Barangay Clearance</a>
								<a class="page-scroll" href="reqdoc_blotter.php" onclick="dstry()">Blotter</a>
							</span>
						</li>
						<li>
							<a class="page-scroll" href="residentcontactus.php" onclick="dstry()">Contact Us</a>
						</li>
						<li class="logdropdown">
							<?php
							$id = $_SESSION['email'];
							$query = $db->query("SELECT * FROM accreg_resident where resident_id='$id'");
							while ($roww = $query->fetch()) {
								$resident_id = $roww['resident_id'];
							?>
								<a class="page-scroll logout" href="javascript:void(0)">

									<?php echo $roww['email'] ?>

								</a>
							<?php
							}
							?>
							<span class="logdropdown-content">
								<a class="page-scroll" href="resident_logout.php" onclick="dstry()"><i class="bx bx-log-out"></i> Logout</a>
								<a href="resident_viewprofile.php" onclick="dstry()">View Profile</a>
							</span>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
	</header>

	<!--Document Section-->
	<div class="document_section">
		<section>
			<h2>Barangay ID</h2>
			<p>
				<a href="resident-defaultpage.php" onclick="dstry()">Home </a>>> <a href="reqdoc_bpermit.php" onclick="dstry()"><strong> Barangay ID </strong></a>
			</p>
			<div>
				<a href="resident-defaultpage.php" onclick="dstry()">
					<p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i> <strong> Home </strong></p>
				</a>
				<a href="reqdoc_bpermit.php" onclick="dstry()">
					<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Business Permit </strong><i class="bx bx-skip-next"></i></p>
				</a>
				<br>
			</div>

			<?php echo isset($error['add_barangayid']) ? $error['add_barangayid'] : ''; ?>
			<div class="containter-messnotif">
				<div style="margin-top: 20px;">
					<span class="messnotif"><?php echo isset($error['fname']) ? $error['fname'] : ''; ?> </span>
					<span class="messnotif"><?php echo isset($error['lname']) ? $error['lname'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['address']) ? $error['address'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['birthday']) ? $error['birthday'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['placeofbirth']) ? $error['placeofbirth'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['contact_no']) ? $error['contact_no'] : ''; ?></span>
				</div>
				<div>
					<span class="messnotif"><?php echo isset($error['id_image']) ? $error['id_image'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['emailadd']) ? $error['emailadd'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['dateissue']) ? $error['dateissue'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['guardianname']) ? $error['guardianname'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['emrgncycontact']) ? $error['emrgncycontact'] : ''; ?></span>
					<span class="messnotif"><?php echo isset($error['reladdress']) ? $error['reladdress'] : ''; ?></span>
				</div>
			</div>

			<blockquote class="blockqoute-color">
				<p class="reminder"><label class="reminder-heading">Reminder/ Tagubilin: </label> Upon requesting your document, please expect around 5 to 15 minutes waiting time. Sa paghiling ng iyong dokumento, asahan ang humigit-kumulang 5 hanggang 15 minutong oras ng paghihintay. Punan ang impormasyon sa ibaba. Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago ito isumite. Upang maiwasan ang typographical error (misspelled names).</p> <?php echo $visitt; ?>
			</blockquote>
			<fieldset class="left_userpersonal_info">
				<div>
					<label>Tagalog Translation - Sundin ang mga sumusunod, sa pag proseso ng dokumento</label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Siguraduhin na ang iyong impormasyon ay tugma. Huwag magsumite ng mga expired na ID.</li>
						<li>Kuhanan ng litrato ang harap at likod ng iyong ID. Siguraduhin na ang iyong Scanned Photo ay malinaw at nababasa. </li>
						<!-- <li>Lagyan ng pangalan ang iyong file. Halimbawa <strong style="color: black">DICARPIOLEONARDO - BarangayID.docx </strong></li> -->
						<li>I-save ang iyong file sa <strong style="color: black">docx </strong> format.</li>
						<li>Antayin ang abiso ng Barangay. Para sa iba pang katanungan bisitahin ang aming website <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
					</ol>
					<label>Listahan ng mga ipapasang dokumento <a href="reqdoc_barangayid.php#barangayid"> (Barangay ID)</a></label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Valid ID (Likod at harap ng iyong ID)- Ito ay magsisilbing kumpirmasyon ng iyong pagkakakilanlan</li>
						<li>Larawan: 2x2 ID Picture (Nakunan sa loob ng nakalipas na 1 taon) </li>
					</ol>
					<br>


				</div>

				<div>
					<label>English Translation - Please follow the process of document</label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Make sure your information is accurate and precise. Do not submit expired IDs.</em></strong></li>
						<li>Take a photo of your ID (Front and Back). Please make sure your Scanned Photo is clear and easy to read.</li>
						<!-- <li>Put your name inline with your file. Example <strong style="color: black">DICARPIOLEONARDO - BarangayID.docx </strong>  </li> -->
						<li>Save your file in <strong style="color: black">docx</strong> format.</li>
						<li>Please wait for the announcement of Barangay. For more inquiry visit our webpage. <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
					</ol>
					<label>List of documents to be submitted <a href="reqdoc_barangayid.php#barangayid"> (Barangay ID)</a></label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Valid ID (Front and Back Portion of your ID)- This will serve as confirmation of your Identity</li>
						<li>Photo: 2x2 ID Picture (Taken within the last 1 year ago) </li>
					</ol>
					<!-- <a href="">
																	    <p style="float: right;">Online Blottering <i class="bx bx-skip-next"></i></p>
                                                                    </a> -->

			</fieldset>
			<br>
			<br>
			<form method="POST" enctype="multipart/form-data" autocomplete="on" id="removeval" action="">
				<hr>
				<h5 style="text-align: center;" id="barangayid">Personal Information</h5>
				<hr>
				<div class="left_userpersonal_info left_userpersonal_info1">

					<?php
					$id = $_SESSION['email'];
					$query = $db->query("SELECT * FROM accreg_resident where resident_id='$id'");
					while ($roww = $query->fetch()) {
						$resident_id = $roww['resident_id'];
					?>
						<input type="hidden" value="<?php echo $roww['resident_id'] ?>" name="resident_id">
					<?php
					}
					?>
					<div class="form-group lname">
						<label for="fname">First Name:<i class="red">*</i> </label>
						<input type="text" class="form-control form-text form-text-desc auto-save" name="fname" placeholder="Your First name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['fname']) ? $error['fname'] : ''; ?>
					</div><br />

					<div class="form-group mname">
						<label for="mname">Middle Name:</label>
						<input type="text" placeholder="(Optional)" class="form-control form-text form-text-desc auto-save" id="mname" name="mname" autocomplete="mname" placeholder="Please write your Middle Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
					</div>

					<div class="form-group">
						<label for="lname">Last Name:<i class="red">*</i></label>
						<input type="text" class="form-control form-text form-text-desc auto-save" id="lname" name="lname" placeholder="Your Last name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['lname']) ? $error['lname'] : ''; ?>
					</div><br>

					<div class="form-group">
						<label for="address">Address: <i class="red">*</i></label>
						<input type="text" class="form-control form-text form-text-desc auto-save" id="address" name="address" placeholder="#Blk No. Street City/Town" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['address']) ? $error['address'] : ''; ?>
					</div><br>

				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">

					<div class="form-group">
						<label for="birthday">Birthday: <i class="red">*</i></label>
						<input type="date" class="form-control form-text form-text-desc auto-save" id="birthday" name="birthday">
						<?php echo isset($error['birthday']) ? $error['birthday'] : ''; ?>
					</div><br>

					<div class="form-group">
						<label for="placeofbirth">Place of Birth: <i class="red">*</i></label>
						<input type="text" class="form-control form-text form-text-desc auto-save" id="placeofbirth" name="placeofbirth" placeholder="Please write your Place of Birth" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['placeofbirth']) ? $error['placeofbirth'] : ''; ?>
					</div><br>

					<div class="form-group">
						<label for="precintno">Precint no: </label>
						<input type="text" class="form-control form-text form-text-desc auto-save" id="precintno" name="precintno" placeholder="(Optional)" onKeyPress="if(this.value.length==5) return false;" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;	this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
					</div>

					<div class="form-group">
						<label for="contact_no">Contact No.: <i class="red">*</i></label>
						<input type="number" inputmode="numeric" class="form-control number form-text form-text-desc auto-save" autocomplete="contact_no" id="contact_no" name="contact_no" placeholder="Ex. 09123456789" onKeyPress="if(this.value.length==11) return false;">
						<?php echo isset($error['contact_no']) ? $error['contact_no'] : ''; ?>
					</div><br>
				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">
					<div class="form-group">
						<label for="emailadd">Email Address: <i class="red">*</i></label>
						<input type="email" autocomplete="off" class="form-control form-text form-text-desc auto-save" placeholder="example@gmail.com" id="emailadd" name="emailadd" pattern="^.*@gmail\.com$" title="This should be @gmail.com">
						<?php echo isset($error['emailadd']) ? $error['emailadd'] : ''; ?>
					</div><br />

					<div class="form-group">
						<label>ID type, please choose<i class="red">*</i></label>
						<select class="form-control auto-save" style="font-size: 12px;" name="barangayid_type" id="barangayid_type">
							<option disabled>--Select--</option>
							<option value="SSS">SSS</option>
							<option value="PhilHealth">PhilHealth</option>
							<option value="Passport">Passport</option>
							<option value="National ID">National ID</option>
							<option value="Pag-ibig ID">Pag-ibig ID</option>
							<option value="School ID">School ID</option>
						</select>

					</div>

					<div class="form-group ">
						<label for="file">Attach Document: <i class="red">*</i></label>
						<input type='file' style="margin: 3px 3px;font-size: 12px;" class="form-control " name='id_image' id="id_image" aria-details="id_image" />

						<i aria-details="id_image" class="detailid"><label> please attach VALID ID and 2x2 PICTURE in the right format (.docx) <?php echo isset($error['id_image']) ? $error['id_image'] : ''; ?></label></i>
					</div><br>

					<div class="form-group">
						<label>Date Requested: <i class="red">*</i></label>
						<input type="date" class="form-control form-text form-text-desc" id="date_issued" name="dateissue" readonly>
						<?php echo isset($error['dateissue']) ? $error['dateissue'] : ''; ?>
					</div>


				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">
					<div class="form-group">
						<label>Document type, please choose<i class="red">*</i></label>
						<select class="form-control auto-save" style="font-size: 12px;" name="brgyidfilechoice" id="brgyidfilechoice" aria-details="brgyidfilechoice">
							<option disabled>--Select--</option>
							<option value="Both">Both</option>
							<option value="Hardcopy">Hardcopy</option>
							<option value="Softcopy">Softcopy</option>
						</select>
						<i aria-details="brgyidfilechoice" class="detailid"><label> What type of document you want to receive?</label></i>
					</div>
				</div>
				<br>
				<hr>
				<h5 style="text-align: center;">In Case of Emergency</h5>
				<hr>
				<div class="left_userpersonal_info left_userpersonal_info1">
					<div class="form-group">
						<label for="guardianname">Guardian's Name:<i class="red">*</i> </label>
						<input type="text" class="form-control form-text form-text-desc auto-save" autocomplete="on" id="guardianname" name="guardianname" placeholder="Ex. Your Relative" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['guardianname']) ? $error['guardianname'] : ''; ?>
					</div><br>


					<div class="form-group">
						<label for="emrgncycontact">Emergency Contact No.: <i class="red">*</i></label>
						<input type="number" class="form-control number form-text form-text-desc auto-save" id="emrgncycontact" name="emrgncycontact" autocomplete="on" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789">
						<?php echo isset($error['emrgncycontact']) ? $error['emrgncycontact'] : ''; ?>
					</div><br>


					<div class="form-group">
						<label for="reladdress">Address: <i class="red">*</i></label>
						<input type="text" class="form-control form-text form-text-desc auto-save" id="reladdress" name="reladdress" autocomplete="on" placeholder="#Blk No. Street City/Town" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['reladdress']) ? $error['reladdress'] : ''; ?>
					</div><br>



				</div>
	</div>
	<br>
	<div style="display: flex; justify-content: center; align-items: center;">
		<button class="button form-control" name="brgyidbtn"><span>Submit </span>
		</button>

	</div>
	</div>
	</div>
	<br>
	<br>

	<a href="resident-defaultpage.php" onclick="dstry()">
		<p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i><strong> Home</strong></p>
	</a>
	<a href="reqdoc_bpermit.php" onclick="dstry()">
		<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Business Permit </strong><i class="bx bx-skip-next"></i></p>
	</a>
	<br>
	<br>
	<br>
	</form>
	</section>
	</div>
	<br>

	<!-- Footer -->
	<footer>
		<div class="container-fluid wrapper">
			<div class="col-lg-12 footer-info">
				<p class="footer_dt">
					<span id="date-time"></span>
				</p>
				<p class="footer-text">
					For any inquiries, please Email us and visit our Facebook Page
				</p>
				<p class="footer-text">
					
                    <a href="https://mail.google.com/mail/barangaycommonwealth01@gmail.com" target="_blank">barangaycommonwealth0@gmail.com</a>
					<br>
					<a href="https://facebook.com//barangay.commonwealth.3551" target="_blank"> <i style="font-size: 20px;" class="fa fa-facebook" title="https://facebook.com//barangay.commonwealth.3551"></i></a>
				</p>
				<div class="footer-text">
					<a>Terms of Service</a> |
					<a>Privacy and Policy</a>
				</div>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
				<span class="copyright">
					Copyright &copy; Barangay Commonwealth - 2022 Created By
					<a href="http://comm-bms.com/index.php" target="_blank">Beta Group</a>
				</span>
			</div>
		</div>
	</footer>

	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#header" class="page-scroll"><i class="bx bx-arrow-to-top"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/preloader.js"></script>
	<script src="resident-js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="resident-js/bootstrap.min.js"></script>
	<!-- Color Settings script -->
	<script src="resident-js/settings-script.js"></script>
	<!-- Plugin JavaScript -->
	<script src="resident-js/jquery.easing.min.js"></script>
	<!-- Contact Form JavaScript -->
	<script src="resident-js/jqBootstrapValidation.js"></script>
	<!-- SmoothScroll script -->
	<script src="resident-js/smoothscroll.js"></script>
	<!-- Custom Theme JavaScript -->
	<script src="resident-js/barangay.js"></script>
	<!-- Isotope -->
	<script src="resident-js/jquery.isotope.min.js"></script>
	<script src="https://use.fontawesome.com/f7721642f4.js"></script>
	<script>
		document.querySelector("#date_issued").valueAsDate = new Date();
	</script>
	<script src="resident-js/savy.min.js"></script>
	<script src="resident-js/jquery-3.2.1.min.js"></script>
	<script src="resident-js/savy.js"></script>
	<script>
		//$('.auto-save').savy('load') --> can be used without callback
		$('.auto-save').savy('load', function() {
			console.log("All data from savy are loaded");
		});

		function dstry() {
			//$('.auto-save').savy('destroy') --> can be used without callback
			$('.auto-save').savy('destroy', function() {
				console.log("All data from savy are Destroyed");
				window.location.reload();
			});
		}
	</script>
</body>

</html>