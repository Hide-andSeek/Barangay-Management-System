<?php session_start();
if(!isset($_SESSION['email'])){
	header("location: resident-defaultpage.php");
}
?>
<?php
	$user = '';

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
	}
?>

<?php 

include "db/conn.php";
include "db/documents.php";
include "db/user.php";

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
        .progressbar {
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

        .progress {
        background-color: var(--primary-color);
        width: 0%;
        transition: 0.3s;
        }

        .progress-step {
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

        .progress-step::after {
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

        /* Form */
        .form {
        width: clamp(320px, 30%, 430px);
        margin: 0 auto;
        border-radius: 0.35rem;
        padding: 1.5rem;
        }

        .form-step {
        display: none;
        transform-origin: top;
        animation: animate 0.5s;
        }

        .form-step-active {
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
		.reminder{background: #FCF8F2; padding: 20px 20px 20px 20px;}
        .reminder-heading{color: #EEA236}
        .blockqoute-color{border-left-color: #EEA236;}
		#fade { transition: all 1s; }
 
		/* (B) HIDE */
		#fade.hide {
		visibility: hidden;
		opacity: 0;
		height: 0; /* OPTIONAL */
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
								<a class="page-scroll" href="resident_logout.php">Logout</a>
								<a href="#">View Profile</a>
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
		<!-- <blockquote class="blockqoute-color">
			<p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label>Upon requesting your document, please fill out the information below. (Your information will reflect to documents you are requesting. <strong> Kindly check first before submitting,</strong> in order to avoid typo error).
			</p>
			<a value="Toggle" onclick="toggle()"> Show Tagalog Translation</a> <br> <span id="fade">Sa paghiling ng iyong dokumento, mangyaring punan ang impormasyon sa ibaba. (Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago isumite. Upang maiwasan ang typo error).</span>
		</blockquote> -->
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument')" style="border-top-right-radius: 20px;border-top-left-radius: 20px;"  id="barangayid" class="document-button document-block documentbtn form-control documentbtn bgcolor">
			<h5><i class="bx bx-id-card"></i>
					Barangay ID</h5></button>
						<div id="hidedocument" class="document-hide">
								<div class="preview">
										<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
										<div class="right_userpersonal_info">
											    <!-- Progress bar -->
												<div class="progressbar">
												<div class="progress" id="progress"></div>
											
												<div
												class="progress-step progress-step-active"
												data-title="Information"
												></div>
												<div class="progress-step" data-title="Contact"></div>
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
																	<input required type="text" class="form-control form-text form-text-desc" id="fname" name="fname" placeholder="First Name">
																</div><br/><br/>
																							
																<div class="form-group">
																	<label for="middlename">Middle Name:</label>
																	<input type="text" placeholder="(Optional)" class="form-control form-text form-text-desc" id="mname" name="mname" placeholder="Middle Name">
																</div><br><br/>
																							
																<div class="form-group">
																	<label for="lastname">Last Name:<i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="lname" name="lname" placeholder="Last Name">
																</div><br><br/>
																							
																<div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="address" name="address">
																</div></br><br/>
															</div>	
															<div class="left_userpersonal_info left_userpersonal_info1">						
																<div class="form-group">
																	<label for="birthday">Birthday: <i class="red">*</i></label>
																	<input type="date"  class="form-control form-text form-text-desc" id="birthday" name="birthday">
																</div><br><br/>
																							
																<div class="form-group">
																	<label for="pob">Place of Birth: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="placeofbirth" name="placeofbirth">
																</div><br><br/>
																							
																<div class="form-group">
																	<label for="contact_no">Contact No.: <i class="red">*</i></label>
																	<input type="tel" inputmode="numeric" class="form-control number form-text form-text-desc" id="contact_no" placeholder="Ex. 09123456789" name="contact_no" onKeyPress="if(this.value.length==11) return false;">
																</div><br><br/>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" placeholder="example@gmail.com" id="emailadd" name="emailadd">
																</div><br/><br/>
																
															</div>
														</fieldset>
													</div> <br>
												<a class="btn btn-next width-50 ml-auto" type="submit">Next</a>
												</div>
											</div>

											<div class="form-step">
											<fieldset class="field_set">
													<legend style="text-align: center;">In Case of Emergency</legend>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group">
															<label for="guardianname">Guardian's Name:<i class="red">*</i> </label>
															<input required type="text" class="form-control form-text form-text-desc" id="guardianname" name="guardianname">
														</div><br>
																							
														<div class="form-group">
															<label for="emrgncycontact">Emergency Contact No.: <i class="red">*</i></label>
															<input type="number" class="form-control number form-text form-text-desc" id="emrgncycontact" name="emrgncycontact" onKeyPress="if(this.value.length==11) return false;">
														</div><br>
																							
														<div class="form-group">
															<label for="reladdress">Address: <i class="red">*</i></label>
															<input required type="text" class="form-control form-text form-text-desc" id="reladdress" name="reladdress" placeholder="# Street City/Town">
														</div><br>
																							
														<div class="form-group">
															<label>Date Issued: <i class="red">*</i></label>
															<input type="date" class="form-control form-text form-text-desc" id="dateissue" name="dateissue">
														</div><br>
													</div>
													<div class="left_userpersonal_info left_userpersonal_info1">
														<div class="form-group ">
															<label for="file">Attach Your Files: <i class="red">*</i></label>
															<input required type='file' class="form-control" name='files[]' />
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
												<label>Kindly check your information first: Before submitting (Just to avoid typo error)</label>
												<div class="btns-group">
												<a class="btn btn-prev">Previous</a>
												<input type="submit" name="brgyidbtn" value="Submit" class="btn" />
												</div>
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
							<form method="POST" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on">
												<section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend style="text-align: center;">For Business</legend>
																<div class="left_userpersonal_info left_userpersonal_info1">

																	<div class="form-group">
																		<label for="ownername">First Name: <i class="red">*</i></label>
																		<input required type="text" class="form-control form-text" id="firstname" name="firstname" placeholder="Please write your First name" >
																	</div><br>
																	
																	<div class="form-group">
																		<label for="ownername">Middle Name: </label>
																		<input required type="text" class="form-control form-text" id="middlename" name="middlename" placeholder="Please write your Middle name">
																	</div><br>

																	<div class="form-group">
																		<label for="ownername">Last Name: <i class="red">*</i></label>
																		<input required type="text" class="form-control form-text" id="ownername" name="ownername" placeholder="Please write your Lastname" >
																	</div><br>

																	<div class="form-group">
																		<label for="contactno">Contact No.: <i class="red">*</i></label>
																		<input type="number" class="form-control number form-text" id="contactno" name="contactno" placeholder="Ex. 09123456789" onKeyPress="if(this.value.length==11) return false;">
																	</div><br>
																</div>
																<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label for="businessname">Business Name: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="businessname" name="businessname" placeholder="Your Business Name">
																</div><br>	
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="businessaddress" name="businessaddress" placeholder="Your Business Address">
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno">
																</div><br>
																
																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd" placeholder="example@gmail.com">
																</div><br>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label for="dateissued">Date issued: <i class="red">*</i></label>
																	<input required type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Files <i class="red">*</i></label>
																	<input type='file' name='files[]' class="form-control form-text" required/>
																</div>
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
																	<input required type="text" class="form-control form-text" id="fullname" name="fullname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div><br>
																
																 <div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="address" name="address">
																</div></br>
												
																 <div class="form-group">
																	<label for="purpose">Purpose: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="purpose" name="purpose">
																</div></br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;">
																</div><br>
															</div>
															<div class="left_userpersonal_info left_userpersonal_info1">
																<div class="form-group">
																	<label for="date_issue">Date Issued: <i class="red">*</i></label>
																	<input required type="date" class="form-control form-text" id="date_issue" name="date_issue">
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach your files here: </label>
																	<input type='file' name='files[]'/>
																</div>
																
																<div class="form-group">
																	<input required type="hidden" class="form-control form-text" id="" name="">
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
								<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="full_name">Full Name: </label>
																	<input required type="text" class="form-control form-text clearance" id="full_name" name="full_name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div><br>
																
																<div class="form-group">
																	<label for="age">Age: </label>
																	<input required type="number" class="form-control form-text age" id="age" name="age" >
																</div><br>

																<div class="form-group">
																	<label>Status: </label>
																	<select class="form-control" name="status">
																		<option disabled>--Select--</option>
																		<option value="SINGLE">SINGLE</option>
																		<option value="MARRIED">MARRIED</option>
																		<option value="WIDOWED">WIDOWED</option>
																	</select>
																</div><br>

																 <div class="form-group">
																	<label for="nationality">Nationality: </label>
																	<input required type="text" class="form-control form-text" id="nationality" name="nationality" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div></br>
																
																<div class="form-group">
																	<label for="address">Address: </label>
																	<input required type="text" class="form-control form-text" id="address" name="address" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div><br>	
																
																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;">
																</div><br>

																<div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailadd" name="emailadd">
																</div><br>
															</fieldset>
														</div>
													
													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>Other Information</legend>

																<div class="form-group">
																	<label for="purpose">Purpose: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="purpose" name="purpose" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
																</div><br>

																<div class="form-group">
																		<label for="date_issued">Date Issued: </label>
																		<input type="date" class="form-control form-text" id="date_issued" name="date_issued" >
																</div><br>

																<div class="form-group">
																	<label for="emrgncycontact">CTC No.: </label>
																	<input type="number" min="12" class="form-control number form-text" id="ctc_no" name="ctc_no">
																</div><br>

																<div class="form-group">
																	<label for="issued_at">Issued at: </label>
																	<input type="text" min="12" class="form-control form-text" id="issued_at" name="issued_at">
																</div><br>

																<div class="form-group">
																	<label for="precint_no">Precint No.: </label>
																	<input type="number" min="12" class="form-control number form-text" id="precint_no" name="precint_no">
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Front ID: </label>
																	<input type='file' name='files[]'/>
																</div>
																
														</fieldset>
													</div>

												</section>
													<button type="submit" name="clearancebtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
										  
							</div>
						</div>
				</div>
				<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument4')" style="border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;" id="blotter" class="document-button document-block documentbtn form-control documentbtn bgcolor">
				<h5><i class="bx bx-receipt"></i>
					Online Blottering</h5></button>
						<div id="hidedocument4" class="document-hide">
							<div class="preview">
							<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="n_complainant">Name of Complainant: </label>
																	<input required type="text" class="form-control form-text" id="n_complainant" name="n_complainant">
																</div><br>
																
																<div class="form-group">
																	<label for="comp_age">Age: </label>
																	<input required type="number" class="form-control form-text age" id="comp_age" name="comp_age" >
																</div><br>

																<div class="form-group">
																	<label>Gender: </label>
																	<select class="form-control" name="comp_gender">
																		<option disabled>--Select--</option>
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																</div><br>
																
																<div class="form-group">
																	<label for="comp_address">Address: </label>
																	<input required type="text" class="form-control form-text" id="comp_address" name="comp_address">
																</div><br>	

																<div class="form-group">
																	<label for="inci_address">Incident Address: </label>
																	<input required type="text" class="form-control form-text" id="inci_address" name="inci_address">
																</div><br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno" onKeyPress="if(this.value.length==11) return false;">
																</div><br>
															</fieldset>
														</div>
													
													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>Other Information</legend>

																<div class="form-group">
																	<label for="n_violator">Name of Violator: </label>
																	<input required type="text" class="form-control form-text" id="n_violator" name="n_violator">
																</div><br>

																<div class="form-group">
																	<label for="violator_age">Age: </label>
																	<input required type="number" class="form-control form-text age" id="violator_age" name="violator_age" >
																</div><br>

																<div class="form-group">
																	<label>Gender: </label>
																	<select class="form-control" name="violator_gender">
																		<option disabled>--Select--</option>
																		<option value="Male">Male</option>
																		<option value="Female">Female</option>
																	</select>
																</div><br>

																<div class="form-group">
																	<label for="relationship">Relationship: </label>
																	<select class="form-control" name="relationship">
																		<option disabled>--Select--</option>
																		<option value="Relative/Family">Relative/Family</option>
																		<option value="Others">Others</option>
																	</select>
																</div><br>

																<div class="form-group">
																	<label for="violator_address">Address: </label>
																	<input required type="text" class="form-control form-text" id="violator_address" name="violator_address">
																</div><br>
														</fieldset>
														<div>
																<div class="form-group">
																	<label for="witnesses">Witnesses: </label>
																	<input required type="text" class="form-control form-text" id="witnesses" name="witnesses">
																</div><br>

																<div class="form-group">
																	<label for="complaints">Complaints: </label>
																	<textarea name="complaints" id="complaints" cols="30" rows="10" class="form-group"></textarea>
																</div><br>
														</div>
														<div>
																
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
																</div><br>
																<div class="form-group">
																	<label for="file">Attach Valid ID: <i class="red">*</i></label>
																	<input type='file' name='files[]' required/>
																</div>
														</div>
													
												</section>
													<button type="submit" name="blotterbtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
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
				function toggle () {
				document.getElementById("fade").classList.toggle("hide");
				} 
			</script>
</body>
</html>