<?php 
session_start();

include "db/conn.php";
include "db/reqdocument.php";
include "db/documents.php";
include "db/user.php";


// // set time for session timeout
// $currentTime = time() + 25200;
// $expired = 3600;

if(!isset($_SESSION['email'])){
	header("location: resident-defaultpage.php");
}

// // if current time is more than session timeout back to login page
// if($currentTime > $_SESSION['timeout']){
// 	session_destroy();
// 	header("location:index.php");
// }

// // destroy previous session timeout and create new one
// unset($_SESSION['timeout']);
// $_SESSION['timeout'] = $currentTime + $expired;
?>
<?php
	$user = '';

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resident - Documents</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="residentcss/animate.css">

	<style>
				/* 9.0 -- Resident Default Page -- */
		.documentbtn{font-size: 15px;width: 20%; height: 20px; padding: 35px 35px 35px 35px; margin-bottom: 15px}
		.documentbtn:hover{background-color: gray;color: white;}
		.document_section{margin-top: 105px;margin-left: 35px; margin-right: 35px;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.document-section{margin-top:16px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{border-top-right-radius: 20px;border-top-left-radius: 20px; border-bottom-right-radius: 20px;border-bottom-left-radius: 20px; color:#000!important;}

		.bgcolor{background-color:#ccc!important; }
		.document-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.document-block{display:block;width:100%}
		.document-hide{display:none!important}
		.document-show{display:block!important}
		p.content{width: 420px; height: 300px;}

		.detailid{padding-top: 50px; color: #19c410;}
		.form-text-desc{font-size: 10px;margin: 3px 3px; color:black;}

		.animatem{position:relative;animation:animatetop 0.5s}@keyframes animatetop{from{top:-450px;opacity:0} to{top:0;opacity:1}}}
		.modal-header{padding:15px; border-bottom:1px solid #e5e5e5; background: red;}
		.modalcontent-notif{height: 230px; width: 450px;}
		.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}
		.instruction{height: 150px; width: 150px; background-color:#f1f1f1!important; border-radius: 50%; display: inline-block; position: auto; margin-left: 15px}
		

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
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.logdropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
		}

		.logdropdown-content a:hover {background-color: #f1f1f1;}

		.logdropdown:hover .logdropdown-content {
		display: block;
		}

		div.processgallery {
		border: 1px solid #ccc;
		}

		div.processgallery:hover {
		border: 1px solid #777;
		}

		div.processgallery img {
		width: 100%;
		height: auto;
		}

		div.description {
		padding: 15px;
		text-align: center;
		}

	

		.process {
		padding: 0 6px;
		float: left;
		width: 24.99999%;
		}

		@media only screen and (max-width: 700px) {
		.process {
			width: 49.99999%;
			margin: 6px 0;
		}
		}

		@media only screen and (max-width: 500px) {
		.process {
			width: 100%;
		}
		}

		.clearfix:after {
		content: "";
		display: table;
		clear: both;
		}

		:root {
        --primary-color: rgb(11, 78, 179);
        }

        /* Global Stylings */
        label {
        display: block;
        margin-bottom: 0.5rem;
        }

        input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        }
  

        .ml-auto {
        margin-left: auto;
        }

        .text-center {
        text-align: center;
        }

        /* Progressbar */
        .progressbar, .progressbar0, .progressbar1{
        position: relative;
        display: flex;
        justify-content: space-between;
        counter-reset: step;
        margin: 2rem 0 4rem;
        }

        .progressbar::before,
        .progress {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }
		.progressbar0::before,
        .progress0 {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }
		.progressbar1::before,
        .progress1 {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
        }

        .progress, .progress0, .progress1{
        background-color: var(--primary-color);
        width: 0%;
        transition: 0.3s;
        }

        .progress-step, .progress-step0, .progress-step1{
        width: 2.1875rem;
        height: 2.1875rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .progress-step::before {
        counter-increment: step;
        content: counter(step);
        }

		.progress-step0::before {
        counter-increment: step;
        content: counter(step);
        }

		.progress-step1::before {
        counter-increment: step;
        content: counter(step);
        }

        .progress-step::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }
		.progress-step0::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }
		.progress-step1::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.5rem);
        font-size: 0.85rem;
        color: #666;
        }

        .progress-step-active {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }

		.progress-step-active0 {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }
		.progress-step-active1 {
        background-color: var(--primary-color);
        color: #f3f3f3;
        }


        /* Form 
        .form, .form0 {
        width: clamp(320px, 30%, 430px);
        margin: 0 auto;
        border-radius: 0.35rem;
        padding: 1.5rem;
        }*/

        .form-step, .form-step0, .form-step1 {
        display: none;
        transform-origin: top;
        animation: animate 0.5s;
        }

        .form-step-active, .form-step-active0, .form-step-active1 {
        display: block;
        }

        .input-group {
        margin: 2rem 0;
        }

        @keyframes animate {
        from {
            transform: scale(1, 0);
            opacity: 0;
        }
        to {
            transform: scale(1, 1);
            opacity: 1;
        }
        }

        /* Button */
        .btns-group, .btns-group0, .btns-group1 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        }

        .btn, .btn0, .btn1 {
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
		.btn0:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }
		.btn1:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

        .left_userpersonal_info{display: flex;}

		@media only screen and (max-width: 700px) {
		.left_userpersonal_info {
			display: none;
			inline
		}
		}

		@media only screen and (max-width: 500px) {
		.left_userpersonal_info {
			display: none;
		}
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button{
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number]{
			-moz-appearance: textfield;
		}
		.left_userpersonal_info1{margin-bottom: 30px;}
		.imgback{width: 60%; height: 60%;}
		.reminder{background: #FCF8F2; padding: 5px 5px 5px 5px;}
        .reminder-heading{color: #EEA236}
        .blockqoute-color{border-left-color: #EEA236;}
		#fade { transition: all 1s; }
 
		/* (B) HIDE */
		#fade.hide {
		visibility: hidden;
		opacity: 0;
		height: 0; /* OPTIONAL */
		}

		.flexi{display: flex;}
		.hideinp{pointer-events: none;}
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
                    <a class="navbar-brand logo-top page-scroll" href="resident-defaultpage.php">
                            <img class="brgy-logo"  src="resident-img/Brgy-Commonwealth.png" alt="logo">
                    </a>
                </div>

                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden nav-buttons">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="resident-defaultpage.php">Home</a>
                        </li>
						<li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Announcement</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="residentacademic.php">Academic Related</a>
                              <a class="page-scroll" href="#">Barangay Funds</a>
                              <a class="page-scroll" href="residentannouncement.php">Latest Announcement</a>
                              <a class="page-scroll" href="residentvaccine.php">Vaccine</a>
                              <a class="page-scroll" href="residentbrgyprogram.php">Barangay Programs</a>
                            </span>
                        </li>
						<li>
                            <a class="page-scroll" href="#reqdocu">Services</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="residentcontactus.php">Contact Us</a>
                        </li>
                        <li class="logdropdown">
							<a class="page-scroll logout" href="javascript:void(0)"><?php echo $user; ?></a>
							<span class="logdropdown-content">
								<a class="page-scroll" href="resident_logout.php"><i class="bx bx-log-out"></i> Logout</a>
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
		<h2>Request Document</h2>
		<label>Read the Instruction -> <a href="instructions.php">Here </a></label>
		<?php echo isset($error['add_barangayid']) ? $error['add_barangayid'] : '';?>
		<?php echo isset($error['add_brgypermit']) ? $error['add_brgypermit'] : '';?>
		<?php echo isset($error['add_brgycertificate']) ? $error['add_brgycertificate'] : '';?>
		<?php echo isset($error['add_brgyindigency']) ? $error['add_brgyindigency'] : '';?>
		<?php echo isset($error['add_brgyclearance']) ? $error['add_brgyclearance'] : '';?>
		<?php echo isset($error['add_blotter']) ? $error['add_blotter'] : '';?>
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument')" style="border-top-right-radius: 20px;border-top-left-radius: 20px;"  id="barangayid" class="document-button document-block documentbtn form-control documentbtn bgcolor">
			<h5><i class="bx bx-id-card"></i>
					Barangay ID</h5></button>
						<div id="hidedocument" class="document-hide">
								<div class="preview">
										<form method="POST" enctype="multipart/form-data" action="">
										<div class="right_userpersonal_info">
												
											    <!-- Progress bar -->
												<div class="progressbar">
												<div class="progress" id="progress"></div>
											
												<div
												class="progress-step progress-step-active"
												data-title="Personal Information"
												></div>
												<div class="progress-step" data-title="Emergency Contact Information"></div>
												<div class="progress-step" data-title="Submission"></div>
											</div>
											
											<!-- Steps -->
											<div class="form-step form-step-active">
												<div class="input-group">
												<div >
														<fieldset class="field_set">
															<legend style="text-align: center;">Personal Information</legend>
														
															<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label for="firstname">First Name:<i class="red">*</i> </label>
																	<input type="text" class="form-control form-text form-text-desc" id="fname" name="fname" placeholder="Please write your First name">
																	<?php echo isset($error['fname']) ? $error['fname'] : '';?>			
																</div><br/><br/>
																				
																<div class="form-group">
																	<label for="middlename">Middle Name:</label>
																	<input type="text" placeholder="(Optional)" class="form-control form-text form-text-desc" id="mname" name="mname" placeholder="Please write your Middle Name">
																</div><br><br/>
																
																							
																<div class="form-group">
																	<label for="lastname">Last Name:<i class="red">*</i></label>
																	<input type="text" class="form-control form-text form-text-desc" id="lname" name="lname" placeholder="Please write your Last Name">
																	<?php echo isset($error['lname']) ? $error['lname'] : '';?>	
																</div><br><br/>
							
																<div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text form-text-desc" id="address" name="address" placeholder="#Blk No. Street City/Town">
																	<?php echo isset($error['address']) ? $error['address'] : '';?>	
																</div></br><br/>
																
															</div>	
															<div class="left_userpersonal_info left_userpersonal_info1">

																<div class="form-group">
																	<label for="birthday">Birthday: <i class="red">*</i></label>
																	<input type="date"  class="form-control form-text form-text-desc" id="birthday" name="birthday">
																	<?php echo isset($error['birthday']) ? $error['birthday'] : '';?>	
																</div><br><br/>
																							
																<div class="form-group">
																	<label for="pob">Place of Birth: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text form-text-desc" id="placeofbirth" name="placeofbirth" placeholder="Please write your Place of Birth">
																	<?php echo isset($error['placeofbirth']) ? $error['placeofbirth'] : '';?>	
																</div><br><br/>

																<div class="form-group">
																	<label for="precintno">Precint no: <i class="red">*</i></label>
																	<input type="number"  class="form-control form-text form-text-desc" id="precintno" name="precintno">
																</div><br><br/>	

																<div class="form-group">
																	<label for="contact_no">Contact No.: <i class="red">*</i></label>
																	<input type="number" inputmode="numeric" class="form-control number form-text form-text-desc" id="contact_no" name="contact_no" placeholder="Ex. 09123456789"  onKeyPress="if(this.value.length==11) return false;">
																	<?php echo isset($error['contact_no']) ? $error['contact_no'] : '';?>
																</div><br><br/>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" placeholder="example@gmail.com" id="emailadd" name="emailadd">
																	<?php echo isset($error['emailadd']) ? $error['emailadd'] : '';?>
																</div><br/><br/>
															</div>
														</fieldset>
													</div> <br>
												<a class="btn btn-next width-50 ml-auto">Next</a>
												</div>
											</div>

											<div class="form-step">
											<fieldset class="field_set">
													<legend style="text-align: center;">In Case of Emergency</legend>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="guardianname">Guardian's Name:<i class="red">*</i> </label>
															<input type="text" class="form-control form-text form-text-desc" id="guardianname" name="guardianname" placeholder="Ex. Your Relative">
															<?php echo isset($error['guardianname']) ? $error['guardianname'] : '';?>	
														</div><br>
														

														<div class="form-group">
															<label for="emrgncycontact">Emergency Contact No.: <i class="red">*</i></label>
															<input type="number" class="form-control number form-text form-text-desc" id="emrgncycontact" name="emrgncycontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789">
															<?php echo isset($error['emrgncycontact']) ? $error['emrgncycontact'] : '';?>	
														</div><br>
														

														<div class="form-group">
															<label for="reladdress">Address: <i class="red">*</i></label>
															<input type="text" class="form-control form-text form-text-desc" id="reladdress" name="reladdress" placeholder="#Blk No. Street City/Town">
															<?php echo isset($error['reladdress']) ? $error['reladdress'] : '';?>	
														</div><br>
														
																							
														<div class="form-group">
															<label>Date Issued: <i class="red">*</i></label>
															<input type="date" class="form-control form-text form-text-desc" id="dateissue" name="dateissue">
															<?php echo isset($error['dateissue']) ? $error['dateissue'] : '';?>
														</div><br>
														
													</div>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group ">
															<label for="file">Attach Your Files: <i class="red">*</i></label>
															<input type='file' class="form-control" name='id_image' id="id_image"/>
															<?php echo isset($error['id_image']) ? $error['id_image'] : '';?>
														</div><br>
														<div class="form-group">
															<label>Document type, please choose<i class="red">*</i></label>
															<select class="form-control" name="brgyidfilechoice" id="brgyidfilechoice">
																<option disabled>--Select--</option>
																<option value="Hardcopy">Hardcopy</option>
																<option value="Softcopy">Softcopy</option>
																<option value="Both">Both</option>
															</select>
														</div><br>
													</div>
													
													</fieldset>
													<br>
												<div class="btns-group">
												<a class="btn btn-prev">Previous</a>
												<a class="btn btn-next">Next</a>
												</div>
											</div>
											<!-- <div class="form-step">
												<fieldset class="field_set">
												<legend style="text-align: center;">Files</legend>
												<div class="left_userpersonal_info left_userpersonal_info1">
													<div>
														
														<div class="form-group">
															<label>Status: </label>
															<select class="form-control" name="status">
																<option disabled>--Select--</option>
																<option value="SINGLE">SINGLE</option>
																<option value="MARRIED">MARRIED</option>
															</select>
														</div><br>
													</div>
													<div style="text-align: center;">
														<div class="form-group">
															<label>GCash QR Code</label>
															<img width="120" height="120" src="resident-img/barcode_1.png" alt="">
															<label >Scan to Pay</label>
														</div>
													</div>
													</div>
													<br>
													<div class="btns-group">
													<a class="btn btn-prev">Previous</a>
													<a class="btn btn-next">Next</a>
													</div>
												</fieldset>
											</div> -->
											<div class="form-step">
												<fieldset class="field_set">
													<legend style="text-align: center;">Submission</legend>
													<blockquote class="blockqoute-color">
														<p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label> Your information will display to documents you are requesting. <strong> Kindly check first before submitting,</strong> just to avoid typographical error like (misspelled names).
														</p>
														<!-- <a value="Toggle" onclick="toggle()"> Show Tagalog Translation</a> <br> <span id="fade">Sa paghiling ng iyong dokumento, mangyaring punan ang impormasyon sa ibaba. (Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago isumite. Upang maiwasan ang typo error).</span> -->
													</blockquote>
														<div class="form-group">
															<input type="hidden" class="form-control form-text form-text-desc" id="status" name="status" value="Pending">
														</div><br>
													<div class="btns-group">
													<a class="btn btn-prev">Previous</a>
													<input type="submit" name="brgyidbtn" value="Submit" class="btn" />
													</div>
												</fieldset>
											</div>
											</form>
								</div>
						</div>
		</div>

	<!-- 1.0 Drop Button with content -->			
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument1')" id="permit" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Business Permit</h5></button>
						<div id="hidedocument1" class="document-hide">
							<div class="preview">
							<form method="POST" enctype="multipart/form-data"  action="" autocomplete="on">
												<section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend style="text-align: center;">For Business</legend>
																
																<div class="left_userpersonal_info left_userpersonal_info1">
																	<div class="form-group">
																		<label for="dateissued">Date issued: <i class="red">*</i></label>
																		<input type="date" class="form-control form-text" id="dateissued" name="dateissued">
																		<?php echo isset($error['dateissued']) ? $error['dateissued'] : '';?>
																	</div><br>
																	
																	<div class="form-group">
																		<label>First Name: <i class="red">*</i></label>
																		<input type="text" class="form-control form-text" id="fullname" name="fullname" placeholder="Please write your First name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																		<?php echo isset($error['fullname']) ? $error['fullname'] : '';?>
																	</div><br>
																	<div class="form-group">
																		<label for="contactno">Contact No.: <i class="red">*</i></label>
																		<input type="number" class="form-control number form-text" id="contactno" name="contactno" placeholder="Ex. 09123456789" onKeyPress="if(this.value.length==11) return false;">
																		<?php echo isset($error['contactno']) ? $error['contactno'] : '';?>
																	</div><br>

																	<div class="form-group">
																		<label for="businessname">Business Name: <i class="red">*</i></label>
																		<input type="text" class="form-control form-text" id="businessname" name="businessname" placeholder="Your Business Name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																		<?php echo isset($error['businessname']) ? $error['businessname'] : '';?>
																	</div><br>	
																</div>
																<div class="left_userpersonal_info left_userpersonal_info1">
																
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="businessaddress" name="businessaddress" placeholder="Your Business Address" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['businessaddress']) ? $error['businessaddress'] : '';?>
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno" placeholder="Your Business Plate No.">
																	<?php echo isset($error['plateno']) ? $error['plateno'] : '';?>
																</div><br>
																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="email_add" name="email_add" placeholder="example@gmail.com">
																	<?php echo isset($error['email_add']) ? $error['email_add'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Files <i class="red">*</i></label>
																	<input type='file' name='businessid_image' class="form-control form-text"/>
																	<?php echo isset($error['businessid_image']) ? $error['businessid_image'] : '';?>
																</div>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label>Document type, please choose<i class="red">*</i></label>
																	<select class="form-control" name="permitfilechoice">
																		<option disabled>--Select--</option>
																		<option value="Hardcopy">Hardcopy</option>
																		<option value="Softcopy">Softcopy</option>
																		<option value="Both">Both</option>
																	</select>
																</div><br>

																<div class="form-group">
																	<input type="hidden" class="form-control form-text form-text-desc" id="status" name="status" value="Pending">
																</div><br>
															</div>
															</fieldset>
														</div>
												</section>
													<button type="submit" name="permitBtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument2')" id="indigency" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bxs-file"></i>
					Certificate of Indigency</h5></button>
						<div id="hidedocument2" class="document-hide">
							<div class="preview">
									<form method="POST" enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend style="text-align: center;">Personal Information</legend>
																<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label for="fullname">Full Name: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="fullname" name="fullname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Please write your Full name">
																	<?php echo isset($error['fullname']) ? $error['fullname'] : '';?>
																</div><br>
																
																 <div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="address" name="address" placeholder="#Blk No. Street City/Town">
																	<?php echo isset($error['address']) ? $error['address'] : '';?>
																</div></br>
												
																 <div class="form-group">
																	<label for="purpose">Purpose: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="purpose" name="purpose" placeholder="Ex. Scholarship Requirement">
																	<?php echo isset($error['purpose']) ? $error['purpose'] : '';?>
																</div></br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactnum" name="contactnum" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789">
																	<?php echo isset($error['contactnum']) ? $error['contactnum'] : '';?>
																</div><br>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">					
																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailaddress" name="emailaddress" placeholder="example@gmail.com">
																	<?php echo isset($error['emailaddress']) ? $error['emailaddress'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="id_type">ID Type: </label>
																		<select class="form-control form-text" name="id_type">
																			<option disabled>--Select--</option>
																			<option value="Barangay ID">Barangay ID</option>
																			<option value="SSS">SSS</option>
																			<option value="PhilHealth">PhilHealth</option>
																			<option value="Passport ID">Passport ID</option>
																			<option value="Barangay Clearance">Barangay Clearance</option>
																		</select>
																	<?php echo isset($error['id_type']) ? $error['id_type'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="date_issue">Date Issued: <i class="red">*</i></label>
																	<input type="date" class="form-control form-text" id="date_issue" name="date_issue">
																	<?php echo isset($error['date_issue']) ? $error['date_issue'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="file">Attach your files here: <i class="red">*</i></label>
																	<input type='file' name='indigencyid_image'/>
																	<?php echo isset($error['indigencyid_image']) ? $error['indigencyid_image'] : '';?>
																</div>
																
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">	
																<div class="form-group">
																	<label>Document type, please choose<i class="red">*</i></label>
																	<select class="form-control" name="indigencyfilechoice">
																		<option disabled>--Select--</option>
																		<option value="Hardcopy">Hardcopy</option>
																		<option value="Softcopy">Softcopy</option>
																		<option value="Both">Both</option>
																	</select>
																</div><br>
																<div class="form-group">
																	<input type="hidden" class="form-control form-text form-text-desc" id="status" name="status" value="Pending">
																</div><br>
															</div>
															</fieldset>
														</div>
												</section>
													<button type="submit" name="indigencybtn" class="btn btn-primary btn-block" id="indigencybtn"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument3')" id="clearance"  class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-copy"></i>
					Barangay Clearance</h5></button>
						<div id="hidedocument3" class="document-hide">
							<div class="preview">
							<form method="POST" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="right_userpersonal_info">
											    <!-- Progress bar -->
												<div class="progressbar1">
												<div class="progress1" id="progress1"></div>
											
												<div
												class="progress-step1 progress-step-active1"
												data-title="Personal Information"
												></div>
												<div class="progress-step1" data-title="Other Information"></div>
												<div class="progress-step1" data-title="Submission"></div>
											</div>

											<!-- Steps -->
											<div class="form-step1 form-step-active1">
												<div class="input-group">
												<div>
														<fieldset class="field_set">
															<legend style="text-align: center;">Personal Information</legend>
															<blockquote class="blockqoute-color">
																<p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label> Please fill out the information below. 
																</p>
																<!-- <a value="Toggle" onclick="toggle()"> Show Tagalog Translation</a> <br> <span id="fade">Sa paghiling ng iyong dokumento, mangyaring punan ang impormasyon sa ibaba. (Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago isumite. Upang maiwasan ang typo error).</span> -->
															</blockquote>
															<div class="left_userpersonal_info left_userpersonal_info1">
															<div class="form-group">
																	<label for="full_name">Full Name: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text clearance" id="full_name" name="full_name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Please Specify your Fullname" title="This must be capitalize">
																	<?php echo isset($error['full_name']) ? $error['full_name'] : '';?>
																</div><br>
																
																<div class="form-group">
																	<label for="age">Age: <i class="red">*</i></label>
																	<input type="number" class="form-control form-text age" id="age" name="age" placeholder="Your age">
																	<?php echo isset($error['age']) ? $error['age'] : '';?>
																</div><br>

																<div class="form-group">
																	<label>Status: <i class="red">*</i></label>
																	<select class="form-control" name="status">
																		<option disabled>--Select--</option>
																		<option value="SINGLE">SINGLE</option>
																		<option value="MARRIED">MARRIED</option>
																		<option value="WIDOWED">WIDOWED</option>
																	</select>
																	<?php echo isset($error['status']) ? $error['status'] : '';?>
																</div><br>

																 <div class="form-group">
																	<label for="nationality">Nationality: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="nationality" name="nationality" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Filipino" title="This must be capitalize">
																	<?php echo isset($error['nationality']) ? $error['nationality'] : '';?>
																</div></br>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">						
															<div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="address" name="address" placeholder="#Blk No. Street City/Town" title="Required Address">
																	<?php echo isset($error['address']) ? $error['address'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789">
																	<?php echo isset($error['contactno']) ? $error['contactno'] : '';?>
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd" placeholder="example@gmail.com">
																	<?php echo isset($error['emailadd']) ? $error['emailadd'] : '';?>
																</div><br>
																
															</div>
														</fieldset>
													</div> <br>
												<a class="btn1 btn-next1 width-50 ml-auto" type="submit">Next</a>
												</div>
											</div>

											<div class="form-step1">
											<fieldset class="field_set">
													<legend style="text-align: center;">Other Information</legend>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="purpose">Purpose: <i class="red">*</i></label>
															<input type="text" class="form-control form-text" id="purpose" name="purpose" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Ex. PERSONAL IDENTIFICATION">
															<?php echo isset($error['purpose']) ? $error['purpose'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="date_issued">Date Issued: <i class="red">*</i></label>
															<input type="date" class="form-control form-text" id="date_issued" name="date_issued">
															<?php echo isset($error['date_issued']) ? $error['date_issued'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="emrgncycontact">CTC No.: </label>
															<input type="number" min="12" class="form-control number form-text" id="ctc_no" name="ctc_no" placeholder="This is optional." title="Place your Precint no. If you have any">
														</div><br>

														<div class="form-group">
															<label for="issued_at">Issued at: </label>
															<input type="text" min="12" class="form-control form-text" id="issued_at" name="issued_at" placeholder="#Blk No. Street City/Town" value="Barangay Commonwealth">
															<?php echo isset($error['issued_at']) ? $error['issued_at'] : '';?>
														</div><br>
													</div>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="precint_no">Precint No.: </label>
															<input type="number" min="12" class="form-control number form-text" id="precint_no" name="precint_no" placeholder="This is optional." title="Place your Precint no. If you have any">
														</div><br>
													</div>
													</fieldset>
													<br>
												<div class="btns-group1">
												<a class="btn1 btn-prev1">Previous</a>
												<a class="btn1 btn-next1">Next</a>
												</div>
											</div>
											<!-- <div class="form-step">
												<fieldset class="field_set">
												<legend style="text-align: center;">Files</legend>
												<div class="left_userpersonal_info left_userpersonal_info1">
													<div>
														
														<div class="form-group">
															<label>Status: </label>
															<select class="form-control" name="status">
																<option disabled>--Select--</option>
																<option value="SINGLE">SINGLE</option>
																<option value="MARRIED">MARRIED</option>
															</select>
														</div><br>
													</div>
													<div style="text-align: center;">
														<div class="form-group">
															<label>GCash QR Code</label>
															<img width="120" height="120" src="resident-img/barcode_1.png" alt="">
															<label >Scan to Pay</label>
														</div>
													</div>
													</div>
													<br>
													<div class="btns-group">
													<a class="btn btn-prev">Previous</a>
													<a class="btn btn-next">Next</a>
													</div>
												</fieldset>
											</div> -->
											<div class="form-step1">
											<!-- <label>Kindly check your information first: Before submitting (Just to avoid typo error)</label> -->
											<fieldset class="field_set">
													<legend style="text-align: center;">Submission</legend>
													<blockquote class="blockqoute-color">
														<p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label> Your information will display to documents you are requesting. <strong> Kindly check first before submitting,</strong> just to avoid typographical error like (misspelled names).
														</p>
														<!-- <a value="Toggle" onclick="toggle()"> Show Tagalog Translation</a> <br> <span id="fade">Sa paghiling ng iyong dokumento, mangyaring punan ang impormasyon sa ibaba. (Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago isumite. Upang maiwasan ang typo error).</span> -->
													</blockquote>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="file">Attach Your Files: <i class="red">*</i></label>
															<input type='file' name='clearanceid_image' multiple/>
															<?php echo isset($error['clearanceid_image']) ? $error['clearanceid_image'] : '';?>
														</div>

														<div class="form-group">
																	<label>Document type, Please choose<i class="red">*</i></label>
																	<select class="form-control" name="filechoice">
																		<option disabled>--Select--</option>
																		<option value="Hardcopy">Hardcopy</option>
																		<option value="Softcopy">Softcopy</option>
																		<option value="Both">Both</option>
																	</select>
																	<?php echo isset($error['filechoice']) ? $error['filechoice'] : '';?>
														</div><br>

														<div class="form-group">
															<input type="hidden" class="form-control form-text form-text-desc" id="clearance_status" name="clearance_status" value="Pending">
															<?php echo isset($error['clearance_status']) ? $error['clearance_status'] : '';?>
														</div><br>
														
													</div>
													<div class="btns-group1">
													<a class="btn1 btn-prev1">Previous</a>
													<input type="submit" name="clearancebtn" value="Submit" class="btn1" />
													</div>
												</fieldset>
											</div>
											</form>		  
							</div>
						</div>
				</div>
				<?php echo isset($error['blotterid_image']) ? $error['blotterid_image'] : '';?>
				<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument4')" style="border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;" id="blotter" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Online Blottering</h5></button>
						<div id="hidedocument4" class="document-hide">
							<div class="preview">
							<form method="POST" enctype="multipart/form-data" action="">
										<div class="right_userpersonal_info">
											    <!-- Progress bar -->
												<div class="progressbar0">
												<div class="progress0" id="progress0"></div>
											
												<div
												class="progress-step0 progress-step-active0"
												data-title="Complainant's Information"
												></div>
												<div class="progress-step0" data-title="Violator's Information"></div>
												<div class="progress-step0" data-title="Submission"></div>
											</div>

											<!-- Steps -->
											<div class="form-step0 form-step-active0">
												<div class="input-group">
												<div >
														<fieldset class="field_set">
															<legend style="text-align: center;">Complainant's Information</legend>
															<div class="left_userpersonal_info left_userpersonal_info1">
															<div class="form-group">
																	<label for="n_complainant">Name of Complainant: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="n_complainant" name="n_complainant" placeholder="Please Specify your Fullname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['n_complainant']) ? $error['n_complainant'] : '';?>
																</div><br>
																
																<div class="form-group">
																	<label for="comp_age">Age: <i class="red">*</i></label>
																	<input type="number" class="form-control form-text age" id="comp_age" name="comp_age" placeholder="Your Age">
																	<?php echo isset($error['comp_age']) ? $error['comp_age'] : '';?>
																</div><br>

																<div class="form-group">
																	<label>Gender: <i class="red">*</i></label>
																	<select class="form-control" name="comp_gender">
																		<option disabled>--Select--</option>
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																	<?php echo isset($error['comp_gender']) ? $error['comp_gender'] : '';?>
																</div><br>
																
																<div class="form-group">
																	<label for="comp_address">Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="comp_address" name="comp_address" placeholder="#Blk No. Street City/Town" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																</div><br>	
															</div>	
															<div class="left_userpersonal_info left_userpersonal_info1">						
															<div class="form-group">
																	<label for="inci_address">Incident Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="inci_address" name="inci_address" placeholder="#Blk No. Street City/Town" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['inci_address']) ? $error['inci_address'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['contactno']) ? $error['contactno'] : '';?>
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="bemailadd" name="bemailadd" placeholder="example@gmail.com">
																	<?php echo isset($error['bemailadd']) ? $error['bemailadd'] : '';?>
																</div><br>
																
															</div>
														</fieldset>
													</div> <br>
												<a class="btn0 btn-next0 width-50 ml-auto" type="submit">Next</a>
												</div>
											</div>

											<div class="form-step0">
											<fieldset class="field_set">
													<legend style="text-align: center;">Violator's Information</legend>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="n_violator">Name of Violator: <i class="red">*</i></label>
															<input type="text" class="form-control form-text" id="n_violator" name="n_violator" placeholder="You can specify multiple names here" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
															<?php echo isset($error['n_violator']) ? $error['n_violator'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="violator_age">Age: <i class="red">*</i></label>
															<input type="number" class="form-control form-text age" id="violator_age" name="violator_age" placeholder="Violator's Age">
															<?php echo isset($error['violator_age']) ? $error['violator_age'] : '';?>
														</div><br>

														<div class="form-group">
															<label>Gender: <i class="red">*</i></label>
															<select class="form-control" name="violator_gender">
																<option disabled>--Select--</option>
																<option value="Male">Male</option>
																<option value="Female">Female</option>
															</select>
															<?php echo isset($error['violator_gender']) ? $error['violator_gender'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="relationship">Relationship: <i class="red">*</i></label>
															<select class="form-control" name="relationship">
																<option disabled>--Select--</option>
																<option value="Relative/Family">Relative/Family</option>
																<option value="Others">Others</option>
															</select>
															<?php echo isset($error['relationship']) ? $error['relationship'] : '';?>
														</div><br>

													</div>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="violator_address">Address: <i class="red">*</i></label>
															<input type="text" class="form-control form-text" id="violator_address" name="violator_address" placeholder="#Blk No. Street City/Town" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
															<?php echo isset($error['violator_address']) ? $error['violator_address'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="witnesses">Witnesses: <i class="red">*</i></label>
															<input type="text" class="form-control form-text" id="witnesses" name="witnesses" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
															<?php echo isset($error['witnesses']) ? $error['witnesses'] : '';?>
														</div><br>

														<div class="form-group">
															<label for="complaints">Complaints: <i class="red">*</i></label>
															<textarea name="complaints" id="complaints" cols="38" placeholder="Your Concerns"></textarea>
															<?php echo isset($error['complaints']) ? $error['complaints'] : '';?>
														</div><br>

														
													</div>
													</fieldset>
													<br>
												<div class="btns-group0">
												<a class="btn0 btn-prev0">Previous</a>
												<a class="btn0 btn-next0">Next</a>
												</div>
											</div>
											<!-- <div class="form-step">
												<fieldset class="field_set">
												<legend style="text-align: center;">Files</legend>
												<div class="left_userpersonal_info left_userpersonal_info1">
													<div>
														
														<div class="form-group">
															<label>Status: </label>
															<select class="form-control" name="status">
																<option disabled>--Select--</option>
																<option value="SINGLE">SINGLE</option>
																<option value="MARRIED">MARRIED</option>
															</select>
														</div><br>
													</div>
													<div style="text-align: center;">
														<div class="form-group">
															<label>GCash QR Code</label>
															<img width="120" height="120" src="resident-img/barcode_1.png" alt="">
															<label >Scan to Pay</label>
														</div>
													</div>
													</div>
													<br>
													<div class="btns-group">
													<a class="btn btn-prev">Previous</a>
													<a class="btn btn-next">Next</a>
													</div>
												</fieldset>
											</div> -->
											<div class="form-step0">
											<!-- <label>Kindly check your information first: Before submitting (Just to avoid typo error)</label> -->
											<fieldset class="field_set">
												<legend style="text-align: center;">Submission</legend>
												<!-- <blockquote class="blockqoute-color">
													<p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label><strong> Kindly check first before submitting,</strong> in order to avoid typographical error.
													</p>
													<a value="Toggle" onclick="toggle()"> Show Tagalog Translation</a> <br> <span id="fade">Sa paghiling ng iyong dokumento, mangyaring punan ang impormasyon sa ibaba. (Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago isumite. Upang maiwasan ang typo error).</span>
												</blockquote> -->
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="file">Attach Files Here: <i class="red">*</i></label>
															<input type='file' name='blotterid_image'/>
														</div>

														<div class="form-group">
															<label for="id_type">ID Type: </label>
																<select class="form-control form-text" name="id_type">
																	<option disabled>--Select--</option>
																	<option value="Barangay ID">Barangay ID</option>
																	<option value="SSS">SSS</option>
																	<option value="PhilHealth">PhilHealth</option>
																	<option value="Passport ID">Passport ID</option>
																	<option value="Barangay Clearance">Barangay Clearance</option>
																</select>
															<?php echo isset($error['id_type']) ? $error['id_type'] : '';?>
														</div><br>
													</div>
													<div class="form-group">
															<input type="hidden" class="form-control form-text" id="status" name="status" value="Pending">
														</div><br>
												</fieldset>
												<div class="btns-group0">
													<a class="btn0 btn-prev0">Previous</a>
													<input type="submit" name="blotterbtn" value="Submit" class="btn0" />
												</div>
											</div>
											</form>
							</div>
						</div>
				</div>
	</section>
</div>

   <!-- Footer -->
   <footer>
        <div class="container-fluid wrapper">
            <div class="col-lg-12 footer-info">
                <p class="footer_dt">
				    <span  id="date-time"></span>
                </p>
                <p class="footer-text">
					For any inquiries, please Email us and visit our Facebook Page 
                </p>
				<p class="footer-text">
                    <a href="https://mail.google.com/mail/barangaycommonwealth0@gmail.com" target="_blank"> <i style="font-size: 20px;" class="fa fa-google" title="https://mail.google.com/mail/barangaycommonwealth0@gmail.com"></i></a>
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
   <!-- Accordion -->
  <script src="js/resident.js"></script>
  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
			<script>
				 document.querySelector("#date_issued").valueAsDate = new Date();
				 document.querySelector("#date_issue").valueAsDate = new Date();
				 document.querySelector("#dateissue").valueAsDate = new Date();
				 document.querySelector("#dateissued").valueAsDate = new Date();
			</script>
			<script>
				// For progress bar
				const prevBtns = document.querySelectorAll(".btn-prev");
				const nextBtns = document.querySelectorAll(".btn-next");
				const progress = document.getElementById("progress");
				const formSteps = document.querySelectorAll(".form-step");
				const progressSteps = document.querySelectorAll(".progress-step");

				let formStepsNum = 0;

				nextBtns.forEach((btn) => {
				btn.addEventListener("click", () => {
					formStepsNum++;
					updateFormSteps();
					updateProgressbar();
					});
				});

				prevBtns.forEach((btn) => {
				btn.addEventListener("click", () => {
					formStepsNum--;
					updateFormSteps();
					updateProgressbar();
					});
				});

				function updateFormSteps() {
				formSteps.forEach((formStep) => {
					formStep.classList.contains("form-step-active") &&
					formStep.classList.remove("form-step-active");
				});

				formSteps[formStepsNum].classList.add("form-step-active");
				}

				function updateProgressbar() {
				progressSteps.forEach((progressStep, idx) => {
					if (idx < formStepsNum + 1) {
					progressStep.classList.add("progress-step-active");
					} else {
					progressStep.classList.remove("progress-step-active");
					}
				});

				const progressActive = document.querySelectorAll(".progress-step-active");

				progress.style.width =
					((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
				}

			</script>
			<script>
				// 
				const prevBtns0 = document.querySelectorAll(".btn-prev0");
				const nextBtns0 = document.querySelectorAll(".btn-next0");
				const progress0 = document.getElementById("progress0");
				const formSteps0 = document.querySelectorAll(".form-step0");
				const progressSteps0 = document.querySelectorAll(".progress-step0");

				let formStepsNum0 = 0;

				nextBtns0.forEach((btn0) => {
				btn0.addEventListener("click", () => {
					formStepsNum0++;
					updateFormSteps0();
					updateProgressbar0();
					});
				});

				prevBtns0.forEach((btn0) => {
				btn0.addEventListener("click", () => {
					formStepsNum0--;
					updateFormSteps0();
					updateProgressbar0();
					});
				});

				function updateFormSteps0() {
				formSteps0.forEach((formStep) => {
					formStep.classList.contains("form-step-active0") &&
					formStep.classList.remove("form-step-active0");
				});

				formSteps0[formStepsNum0].classList.add("form-step-active0");
				}

				function updateProgressbar0() {
				progressSteps0.forEach((progressStep, idx) => {
					if (idx < formStepsNum0 + 1) {
					progressStep.classList.add("progress-step-active0");
					} else {
					progressStep.classList.remove("progress-step-active0");
					}
				});

				const progressActive0 = document.querySelectorAll(".progress-step-active0");

				progress0.style.width =
					((progressActive0.length - 1) / (progressSteps0.length - 1)) * 100 + "%";
				}
			</script>
			<script>
				// 
				const prevBtns1 = document.querySelectorAll(".btn-prev1");
				const nextBtns1 = document.querySelectorAll(".btn-next1");
				const progress1 = document.getElementById("progress1");
				const formSteps1 = document.querySelectorAll(".form-step1");
				const progressSteps1 = document.querySelectorAll(".progress-step1");

				let formStepsNum1 = 0;

				nextBtns1.forEach((btn1) => {
				btn1.addEventListener("click", () => {
					formStepsNum1++;
					updateFormSteps1();
					updateProgressbar1();
					});
				});

				prevBtns1.forEach((btn1) => {
				btn1.addEventListener("click", () => {
					formStepsNum1--;
					updateFormSteps1();
					updateProgressbar1();
					});
				});

				function updateFormSteps1() {
				formSteps1.forEach((formStep) => {
					formStep.classList.contains("form-step-active1") &&
					formStep.classList.remove("form-step-active1");
				});

				formSteps1[formStepsNum1].classList.add("form-step-active1");
				}

				function updateProgressbar1() {
				progressSteps1.forEach((progressStep, idx) => {
					if (idx < formStepsNum1 + 1) {
					progressStep.classList.add("progress-step-active1");
					} else {
					progressStep.classList.remove("progress-step-active1");
					}
				});

				const progressActive1 = document.querySelectorAll(".progress-step-active1");

				progress1.style.width =
					((progressActive1.length - 1) / (progressSteps1.length - 1)) * 100 + "%";
				}
			</script>
			<script>
				function toggle () {
				document.getElementById("fade").classList.toggle("hide");
				} 
			</script>
</body>
</html>