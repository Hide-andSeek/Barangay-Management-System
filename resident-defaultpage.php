<?php session_start();
if(!isset($_SESSION['email'])){
	header("location: resident-defaultpage.php");
}
?>

<?php 
include "db/conn.php";
include "db/documents.php";
include "db/users.php";

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
	<link rel="stylesheet" href="resident-css/resident.css">
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="residentcss/animate.css">

	<style>
				/* 9.0 -- Resident Default Page -- */
		.documentbtn{font-size: 15px;width: 200px; height: 100px; padding: 40px 40px 40px 40px; margin-bottom: 25px}
		.documentbtn:hover{background-color: gray;color: white;}
		.document_section{margin-top: 105px;margin-left: 35px; margin-right: 35px;}

		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.document-section{margin-top:16px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{border-top-right-radius: 20px;border-top-left-radius: 20px; border-bottom-right-radius: 20px;border-bottom-left-radius: 20px; color:#000!important;background-color:#f1f1f1!important}

		.document-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.document-block{display:block;width:100%}
		.document-hide{display:none!important}
		.document-show{display:block!important}
		p.content{width: 450px; height: 300px;}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button{
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number]{
			-moz-appearance: textfield;
		}

		.detailid{padding-top: 50px; color: red;}
		.form-text-desc{font-size: 10px;margin: 3px 3px; color:black;}

		.animatem{position:relative;animation:animatetop 0.5s}@keyframes animatetop{from{top:-450px;opacity:0} to{top:0;opacity:1}}}
		.modal-header{padding:15px; border-bottom:1px solid #e5e5e5; background: red;}
		.modalcontent-notif{height: 230px; width: 450px;}
		.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}
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
                            <a class="page-scroll" href="#documents">Documents</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="logout.php">Logout</a>
                        </li>
						<li>
							<a style="color: green" class="page-scroll" href="#"></a>
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

		<!-- Instructions: For request document!-->
		<h1 style="width: 550px; height: 350px;">Request Documet Instructions</h1>

		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument')" style="border-top-right-radius: 20px;border-top-left-radius: 20px;" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bx-id-card"></i>
					Barangay ID</button>
						<div id="hidedocument" class="document-hide">
								<div class="preview">
										<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="firstname">First Name:<i class="red">*</i> </label>
																	<input required type="text" class="form-control form-text form-text-desc" id="fname" name="fname">
																</div><br/>
																
																<div class="form-group">
																	<label for="middlename">Middle Name:</label>
																	<input type="text" placeholder="(Optional)" class="form-control form-text form-text-desc" id="mname" name="mname">
																	<!--
																	<i aria-details="detail-id" class="detailid">This field is optional</i>
																	-->
																</div><br>
																
																<div class="form-group">
																	<label for="lastname">Last Name:<i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="lname" name="lname">
																</div><br>
																
																
																 <div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="address" name="address">
																</div></br>
																
																<div class="form-group">
																		<label for="birthday">Birthday: <i class="red">*</i></label>
																		<input type="date" class="form-control form-text form-text-desc" id="birthday" name="birthday">
																</div><br>
																
																<div class="form-group">
																	<label for="pob">Place of Birth: </label><i class="red">*</i>
																	<input required type="text" class="form-control form-text form-text-desc" id="placeofbirth" name="placeofbirth">
																</div><br>
															</fieldset>
														</div>
													
													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>In Case of Emergency</legend>
																<div class="form-group">
																	<label for="guardianname">Guardian's Name:<i class="red">*</i> </label>
																	<input required type="text" class="form-control form-text form-text-desc" id="guardianname" name="guardianname">
																</div><br>
																
																<div class="form-group">
																	<label for="emrgncycontact">Emergency Contact No.: <i class="red">*</i></label>
																	<input type="number" min="12" class="form-control number form-text form-text-desc" id="emrgncycontact" name="emrgncycontact">
																</div><br>
																
																<div class="form-group">
																	<label for="reladdress">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text form-text-desc" id="reladdress" name="reladdress">
																</div><br>
																
																<div class="form-group">
																	<label>Date Issued: <i class="red">*</i></label>
																	<input type="date" class="form-control form-text form-text-desc" id="dateissue" name="dateissue">
																</div><br>
																
														</fieldset>
													</div>`
												</section>
												<form  method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
													<a class="btn btn-primary btn-block"
													onclick="document.getElementById('id01').style.display='block'" data-toggle="modal" data-target="savebtn"><i class='bx bx-save'></i> Submit</a>

												<div id="formatValidatorName" >
													<div id="id01" class="modal">
															<div class="modal-content animatem modalcontent-notif">

																<div class="modal-header">
																	<h4 class="modal-title">Warning!</h4>
																</div>
																<div class="modal-body">
																	<p>Are you sure you want to submit this form? Click  button below to proceed</p>

																	<div class="modal-footer">
               															 <button type="submit" class="btn btn-default" type="brgyidbtn" data-toggle="modal" data-target="savebtn">Ok</button>
																	</div>
																</div>
															</div>
																
														</div>
													</div>
												<form>
										  </form> 
								</div>
						</div>
		</div>
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument1')" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bx-receipt"></i>
					Business Permit</button>
						<div id="hidedocument1" class="document-hide">
							<div class="preview">
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>For Business</legend>
																<div class="form-group">
																	<label for="dateissued">Date: </label>
																	<input required type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>
																
																<div class="form-group">
																	<label for="selection">Please Select:</label>
																	<span>
																		Renewal <input required type="radio" value="renewal" id="renewal" name="selection">
																		New <input required type="radio" value="new"  id="new" name="selection">
																	</span>
																</div><br>
																
																<div class="form-group">
																	<label for="ownername">Owner's Name: </label>
																	<input required type="text" class="form-control form-text" id="ownername" name="ownername" placeholder="Please write your Full name">
																</div><br>
																
																<div class="form-group">
																	<label for="businessname">Business Name: </label>
																	<input required type="text" class="form-control form-text" id="businessname" name="businessname">
																</div><br>	
																
																 <div class="form-group">
																	<label for="businessaddress">Business Address: </label>
																	<input required type="text" class="form-control form-text" id="businessaddress" name="businessaddress">
																</div></br>
																
																<div class="form-group">
																	<label for="plateno">Plate No.: </label>
																	<input type="number" class="form-control number form-text" id="plateno" name="plateno">
																</div><br>
																
																<div class="form-group">
																	<label for="contactno">Contact No.: </label>
																	<input type="number" class="form-control number form-text" id="contactno" name="contactno">
																</div><br>
															</fieldset>
														</div>
												</section>
													<button type="submit" name="permitBtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
							</div>
						</div>
		</div>
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument2')" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bxs-file"></i>
					Certificate of Indigency</button>
						<div id="hidedocument2" class="document-hide">
							<div class="preview">
									<form method="POST" enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="fullname">Full Name: </label>
																	<input required type="text" class="form-control form-text" id="fullname" name="fullname">
																</div><br>
																
																 <div class="form-group">
																	<label for="address">Address: </label>
																	<input required type="text" class="form-control form-text" id="address" name="address">
																</div></br>
												
																 <div class="form-group">
																	<label for="purpose">Purpose: </label>
																	<input required type="text" class="form-control form-text" id="purpose" name="purpose">
																</div></br>
													
																<div class="form-group">
																	<label for="date_issue">Date Issued: </label>
																	<input required type="date" class="form-control form-text" id="date_issue" name="date_issue">
																</div><br>

																<div>
																<input class="custom-file-input" type='file' name='files[]'/>
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
			<button onclick="myFunction('hidedocument3')" style="border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bx-copy"></i>
					Barangay Clearance</button>
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
															</fieldset>
														</div>
													
													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>Other Information</legend>

																<div class="form-group">
																	<label for="purpose">Purpose: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="purpose" name="purpose" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
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
																
														</fieldset>
													</div>

												</section>
													<button type="submit" name="clearancebtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
										  </form> 
										  
							</div>
						</div>
				</div>
				<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument4')" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bx-receipt"></i>
					Online Blottering</button>
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
																		<option value="Relative">Relative</option>
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
													
												</section>

													<button type="submit" name="clearancebtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
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
                <p class="footer-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <p>
                  <span class="footer_dt" id="date-time"></span>
                </p>
            </div>
           
            <div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
                <span class="copyright" >
                    Copyright &copy; Barangay Commonwealth Hall - 2021 Created By 
                    <a href="http://betaencorp" target="_blank">Beta Encorp</a>
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

			<script>
				 document.querySelector("#date_issued").valueAsDate = new Date();
				 document.querySelector("#date_issue").valueAsDate = new Date();
				 document.querySelector("#dateissue").valueAsDate = new Date();
				 document.querySelector("#dateissued").valueAsDate = new Date();
			</script>
</body>
</html>