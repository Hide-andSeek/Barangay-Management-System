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
$f = "resources/clearance_visit.php";
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

if (!isset($_POST["clearancebtn"])) {
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

	<title>Barangay Clearance</title>

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
			padding-bottom: 45px;
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

		.autocomplete {
			position: relative;
			display: inline-block;
		}

		.autocomplete-items {
			position: absolute;
			border: 1px solid #d4d4d4;
			border-bottom: none;
			border-top: none;
			z-index: 99;
			/*position the autocomplete items to be the same width as the container:*/
			top: 100%;
			left: 0;
			right: 0;
			padding-top: 30px;
			padding-left: 15px;
		}

		.autocomplete-items div {
			padding: 10px;
			cursor: pointer;
			background-color: #fff;
			border-bottom: 1px solid #d4d4d4;
		}

		/*when hovering an item:*/
		.autocomplete-items div:hover {
			background-color: #e9e9e9;
		}

		/*when navigating through the items using the arrow keys:*/
		.autocomplete-active {
			background-color: DodgerBlue !important;
			color: #ffffff;
		}

		@media screen and (max-width: 800px) {
			.logdropdown-content {
				position: relative;
			}
		}

		@media screen and (max-width: 600px) {
			.logdropdown-content {
				position: relative;
			}
		}
	</style>
</head>

<body onload="display_ct()" id="#documents">


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
								<a class="page-scroll" href="reqdoc_barangayid.php" onclick="dstry()">Barangay ID</a>
								<a class="page-scroll" href="reqdoc_bpermit_new.php" onclick="dstry()">Business Permit</a>
								<a class="page-scroll" href="reqdoc_indigency.php" onclick="dstry()">Certificate of Indigency</a>
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

									<?php echo $roww['email'] ?></a>
							<?php
							}
							?>
							<span class="logdropdown-content">
								<a class="page-scroll" href="resident_logout.php"><i class="bx bx-log-out"></i> Logout</a>
								<a href="resident_viewprofile.php">View Profile</a>
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
			<h2>Barangay Clearance</h2>
			<p>
				<a href="resident-defaultpage.php" onclick="dstry()">Home </a>>> <a href="reqdoc_barangayid.php" onclick="dstry()">Barangay ID</a> >> <a href="reqdoc_bpermit.php" onclick="dstry()">Business Permit</a>>> <a href="reqdoc_indigency.php" onclick="dstry()">Certificate of Indigency</a>>><a><strong> Barangay Clearance</strong></a>
			</p>
			<div>
				<a href="reqdoc_indigency.php" onclick="dstry()">
					<p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i> <strong> Certificate of Indigency </strong></p>
				</a>
				<a href="reqdoc_blotter.php" onclick="dstry()">
					<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Online Blotter </strong><i class="bx bx-skip-next"></i></p>
				</a>
				<br>
				<br>
			</div>

			<div style="text-align: center;">
				<?php echo isset($error['add_brgyclearance']) ? $error['add_brgyclearance'] : ''; ?>
				<?php echo isset($error['full_name']) ? $error['full_name'] : ''; ?>
				<?php echo isset($error['age']) ? $error['age'] : ''; ?>
				<?php echo isset($error['status']) ? $error['status'] : ''; ?>
				<?php echo isset($error['nationality']) ? $error['nationality'] : ''; ?>
				<?php echo isset($error['address']) ? $error['address'] : ''; ?>
				<?php echo isset($error['contactno']) ? $error['contactno'] : ''; ?>
				<?php echo isset($error['emailadd']) ? $error['emailadd'] : ''; ?>
				<?php echo isset($error['clearanceid_image']) ? $error['clearanceid_image'] : ''; ?>
				<?php echo isset($error['purpose']) ? $error['purpose'] : ''; ?>
				<?php echo isset($error['date_issued']) ? $error['date_issued'] : ''; ?>
			</div>
			<blockquote class="blockqoute-color; ">
				<p class="reminder" style="text-align: justify;"><label class="reminder-heading">Reminder/ Tagubilin: </label> Upon requesting your document, please expect around 5 to 15 minutes waiting time. Fill out the information below. Your information will appear in the document you request. Please check before submitting, to avoid typographical errors (misspelled names).<em><strong>Tagalog Translation.</strong> Sa paghiling ng iyong dokumento, asahan ang humigit-kumulang 5 hanggang 15 minutong oras ng paghihintay. Punan ang impormasyon sa ibaba. Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago ito isumite. Upang maiwasan ang typographical error (misspelled names).</em></p> <?php echo $visitt; ?>
			</blockquote>
			<fieldset class="left_userpersonal_info">
				<div>
					<label>Tagalog Translation - Sundin ang mga sumusunod, sa pag proseso ng dokumento</label>
					<ol style="padding: 15px 15px 15px 15px; text-align: justify;">
						<li>Siguraduhin na ang iyong impormasyon ay tugma. Huwag magsumite ng mga expired na ID.</li>
						<li>Kuhanan ng litrato ang harap at likod ng iyong ID. Siguraduhin na ang iyong Scanned Photo ay malinaw at nababasa. </li>
						<li>Pakilagay ang iyong email address. Ito ay magsisilbing kasangkapan para sa pagpapadala ng mensahe at softcopy ng iyong Barangay Clearance</li>
						<li>I-save ang iyong file sa <strong style="color: black">docx </strong> format.</li>
						<li>Antayin ang abiso ng Barangay. Para sa iba pang katanungan bisitahin ang aming website <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
					</ol>
					<label>Listahan ng mga ipapasang dokumento <a href="reqdoc_barangayid.php#barangayid"> (Barangay Clearance)</a></label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Valid ID (Likod at harap ng iyong ID)- Ito ay magsisilbing kumpirmasyon ng iyong pagkakakilanlan</li>
						<li>Larawan: 2x2 ID Picture (Nakunan sa loob ng nakalipas na taon) </li>
					</ol>
					<br>


				</div>

				<div>
					<label>English Translation - Please follow the process of document</label>
					<ol style="padding: 15px 15px 15px 15px; text-align: justify;">
						<li>Make sure your information is accurate and precise. Do not submit expired IDs.</em></strong></li>
						<li>Take a photo of your ID (Front and Back). Please make sure your Scanned Photo is clear and easy to read.</li>
						<li>Place your email address. This will serve as a tool for sending a message and softcopy of your Barangay Clearance</li>
						<li>Save your file in <strong style="color: black">docx</strong> format.</li>
						<li>Please wait for the announcement of Barangay. For more inquiry visit our webpage. <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
					</ol>
					<label>List of documents to be submitted <a href="reqdoc_barangayid.php#barangayid"> (Barangay Clearance)</a></label>
					<ol style="padding: 15px 15px 15px 15px">
						<li>Valid ID (Front and Back Portion of your ID)- This will serve as confirmation of your Identity</li>
						<li>Photo: 2x2 ID Picture (Taken within a year ago) </li>
					</ol>
			</fieldset>
			<br>
			<br>
			<form method="POST" autocomplete="off" enctype="multipart/form-data" action="">
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
					<div class="form-group selec">
						<label for="full_name">Full Name: <i class="red">*</i></label>
						<input type="text" class="form-control form-text clearance auto-save" id="full_name" name="full_name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Your fullname" title="This must be capitalize">
						<?php echo isset($error['full_name']) ? $error['full_name'] : ''; ?>
					</div>

					<div class="form-group selec">
						<label for="age">Age: <i class="red">*</i></label>
						<input type="number" class="form-control form-text age auto-save" id="age" name="age" placeholder="Your age">
						<?php echo isset($error['age']) ? $error['age'] : ''; ?>
					</div>

					<div class="form-group">
						<label>Status: <i class="red">*</i></label>
						<select class="form-control auto-save" name="status">
							<option disabled>--Select--</option>
							<option value="SINGLE">SINGLE</option>
							<option value="MARRIED">MARRIED</option>
							<option value="WIDOWED">WIDOWED</option>
						</select>
						<?php echo isset($error['status']) ? $error['status'] : ''; ?>
					</div>

					<div class="form-group autocomplete selec">
						<label for="nationality">Nationality: <i class="red">*</i></label>
						<input type="text" class="form-control form-text auto-save" name="nationality" id="myInput" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Ex. FILIPINO" title="This must be capitalize">
						<?php echo isset($error['nationality']) ? $error['nationality'] : ''; ?>
					</div>
				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">

					<div class="form-group selec">
						<label for="address">Address: <i class="red">*</i></label>
						<input type="text" class="form-control form-text auto-save" id="address" name="address" placeholder="#Blk No. Street City/Town" title="Required Address" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
						<?php echo isset($error['address']) ? $error['address'] : ''; ?>
					</div>

					<div class="form-group selec">
						<label for="contactno">Contact No.: <i class="red">*</i></label>
						<input type="number" class="form-control number form-text auto-save" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789" title="Place your active Contact #">
						<?php echo isset($error['contactno']) ? $error['contactno'] : ''; ?>
					</div>

					<div class="form-group selec">
						<label>Email Address: <i class="red">*</i></label>
						<input type="email" class="form-control form-text form-text-desc auto-save" id="emailadd" name="emailadd" placeholder="example@gmail.com" pattern="^.*@gmail\.com$" title="This should be @gmail.com">
						<?php echo isset($error['emailadd']) ? $error['emailadd'] : ''; ?>
					</div>

					<div class="form-group selec">
						<label for="file">Attach Document: <i class="red">*</i></label>
						<input type='file' name='clearanceid_image' class="form-control  form-text" aria-details="clearanceid_image" />

						<i aria-details="clearanceid_image" class="detailid"><label>please attach VALID ID and 2x2 PICTURE in the right format (.docx) <?php echo isset($error['clearanceid_image']) ? $error['clearanceid_image'] : ''; ?></label></i>
					</div>
					<br>
				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">

					<div class="form-group">
						<label>ID type, please choose<i class="red">*</i></label>
						<select class="form-control form-text auto-save" style="font-size: 12px;" name="clearanceid_type" id="clearanceid_type">
							<option disabled>--Select--</option>
							<option value="SSS">SSS</option>
							<option value="PhilHealth">PhilHealth</option>
							<option value="Passport">Passport</option>
							<option value="National ID">National ID</option>
							<option value="Pag-ibig ID">Pag-ibig ID</option>
							<option value="School ID">School ID</option>
						</select>
					</div>

					<div class="form-group">
						<label>Document type, Please choose<i class="red">*</i></label>
						<select class="form-control form-text " name="filechoice" aria-details="filechoice">
							<option disabled>--Select--</option>
							<option value="Both" selected>Both</option>
							<option value="Hardcopy">Hardcopy</option>
							<option value="Softcopy">Softcopy</option>
						</select>
						<i aria-details="filechoice" class="detailid"><label> What type of document you want to receive?</label></i>
					</div>

				</div>
				<br>
				<hr>
				<h5 style="text-align: center;">Other Information</h5>
				<hr>
				<div class="left_userpersonal_info left_userpersonal_info1">
					<div class="form-group selec">
						<label for="purpose">Purpose: <i class="red">*</i></label>
						<input type="text" class="form-control form-text auto-save" id="purpose" name="purpose" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Ex. PERSONAL IDENTIFICATION">
						<?php echo isset($error['purpose']) ? $error['purpose'] : ''; ?>
					</div>


					<div class="form-group">
						<label for="emrgncycontact">CTC No.: </label>
						<input type="number" min="12" class="form-control number form-text auto-save" id="ctc_no" name="ctc_no" placeholder="(Optional)" title="Place your CTC no. If you have any">
					</div>

					<div class="form-group  selec">
						<label for="issued_at">Issued at: </label>
						<input type="text" min="12" class="form-control form-text" name="issued_at" placeholder="(Optional)" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;	this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">

					</div>

					<div class="form-group">
						<label for="precint_no">Precint No.: </label>
						<input type="text" min="12" class="form-control number form-text auto-save" id="precint_no" name="precint_no" placeholder="(Optional)" title="Place your Precint no. If you have any" onKeyPress="if(this.value.length==5) return false;" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;	this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
					</div>
				</div>
				<div class="left_userpersonal_info left_userpersonal_info1">
					<div class="form-group">
						<label for="date_issued">Date Requested: <i class="red">*</i></label>
						<input type="date" class="form-control form-text usersel" id="date_issued" name="date_issued" readonly>
						<?php echo isset($error['date_issued']) ? $error['date_issued'] : ''; ?>
					</div>
				</div>
	</div>
	<br>

	<div style="display: flex; justify-content: center; align-items: center;">
		<button class="button form-control" name="clearancebtn"><span>Submit </span>
		</button>
	</div>
	</div>
	</div>
	<br>
	<br>

	<a href="reqdoc_indigency.php" onclick="dstry()">
		<p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i><strong> Certificate of Indigency</strong></p>
	</a>
	<a href="reqdoc_blotter.php" onclick="dstry()">
		<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Online Blotter </strong><i class="bx bx-skip-next"></i></p>
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
	<script>
		function autocomplete(inp, arr) {
			/*the autocomplete function takes two arguments,
			the text field element and an array of possible autocompleted values:*/
			var currentFocus;
			/*execute a function when someone writes in the text field:*/
			inp.addEventListener("input", function(e) {
				var a, b, i, val = this.value;
				/*close any already open lists of autocompleted values*/
				closeAllLists();
				if (!val) {
					return false;
				}
				currentFocus = -1;
				/*create a DIV element that will contain the items (values):*/
				a = document.createElement("DIV");
				a.setAttribute("id", this.id + "autocomplete-list");
				a.setAttribute("class", "autocomplete-items");
				/*append the DIV element as a child of the autocomplete container:*/
				this.parentNode.appendChild(a);
				/*for each item in the array...*/
				for (i = 0; i < arr.length; i++) {
					/*check if the item starts with the same letters as the text field value:*/
					if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
						/*create a DIV element for each matching element:*/
						b = document.createElement("DIV");
						/*make the matching letters bold:*/
						b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
						b.innerHTML += arr[i].substr(val.length);
						/*insert a input field that will hold the current array item's value:*/
						b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
						/*execute a function when someone clicks on the item value (DIV element):*/
						b.addEventListener("click", function(e) {
							/*insert the value for the autocomplete text field:*/
							inp.value = this.getElementsByTagName("input")[0].value;
							/*close the list of autocompleted values,
							(or any other open lists of autocompleted values:*/
							closeAllLists();
						});
						a.appendChild(b);
					}
				}
			});
			/*execute a function presses a key on the keyboard:*/
			inp.addEventListener("keydown", function(e) {
				var x = document.getElementById(this.id + "autocomplete-list");
				if (x) x = x.getElementsByTagName("div");
				if (e.keyCode == 40) {
					/*If the arrow DOWN key is pressed,
					increase the currentFocus variable:*/
					currentFocus++;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 38) { //up
					/*If the arrow UP key is pressed,
					decrease the currentFocus variable:*/
					currentFocus--;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 13) {
					/*If the ENTER key is pressed, prevent the form from being submitted,*/
					e.preventDefault();
					if (currentFocus > -1) {
						/*and simulate a click on the "active" item:*/
						if (x) x[currentFocus].click();
					}
				}
			});

			function addActive(x) {
				/*a function to classify an item as "active":*/
				if (!x) return false;
				/*start by removing the "active" class on all items:*/
				removeActive(x);
				if (currentFocus >= x.length) currentFocus = 0;
				if (currentFocus < 0) currentFocus = (x.length - 1);
				/*add class "autocomplete-active":*/
				x[currentFocus].classList.add("autocomplete-active");
			}

			function removeActive(x) {
				/*a function to remove the "active" class from all autocomplete items:*/
				for (var i = 0; i < x.length; i++) {
					x[i].classList.remove("autocomplete-active");
				}
			}

			function closeAllLists(elmnt) {
				/*close all autocomplete lists in the document,
				except the one passed as an argument:*/
				var x = document.getElementsByClassName("autocomplete-items");
				for (var i = 0; i < x.length; i++) {
					if (elmnt != x[i] && elmnt != inp) {
						x[i].parentNode.removeChild(x[i]);
					}
				}
			}
			/*execute a function when someone clicks in the document:*/
			document.addEventListener("click", function(e) {
				closeAllLists(e.target);
			});
		}

		/*An array containing all the country names in the world:*/
		var countries = ["FILIPINO"];

		/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
		autocomplete(document.getElementById("myInput"), countries);
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