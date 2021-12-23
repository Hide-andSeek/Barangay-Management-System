<?php session_start();
if(!isset($_SESSION['email'])){
	header("location: resident-defaultpage.php");
}
?>

<?php 
include "db/conn.php";
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
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="residentcss/animate.css">

	<style>
		
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
							<a style="color: green" class="page-scroll" href="#"><div></div></a>
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
		<div class="document-light-grey document-section">
			<button onclick="myFunction('hidedocument')" style="border-top-right-radius: 20px;border-top-left-radius: 20px;" class="document-button document-block documentbtn form-control documentbtn">
				<i class="bx bx-id-card"></i>
					Barangay ID</button>
						<div id="hidedocument" class="document-hide">
								<div class="preview">
										<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="firstname">First Name:<i class="red">*</i> </label>
																	<input required type="text" class="form-control form-text" id="firstname" name="fname">
																</div><br>
																
																<div class="form-group">
																	<label for="middlename">Middle Name:</label>
																	<input required type="text" placeholder="(Optional)" class="form-control form-text" id="middlename" name="mname">
																</div><br>
																
																<div class="form-group">
																	<label for="lastname">Last Name:<i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="lastname" name="lname">
																</div><br>
																
																
																 <div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="address" name="address">
																</div></br>
																
																<div class="form-group">
																		<label for="birthday">Birthday: <i class="red">*</i></label>
																		<input type="date" class="form-control form-text" id="birthday" name="birthday">
																</div><br>
																
																<div class="form-group">
																	<label for="pob">Place of Birth: </label><i class="red">*</i>
																	<input required type="text" class="form-control form-text" id="pob" name="placeofbirth">
																</div><br>
															</fieldset>
														</div>
													
													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>In Case of Emergency</legend>
																<div class="form-group">
																	<label for="guardianname">Guardian's Name:<i class="red">*</i> </label>
																	<input required type="text" class="form-control form-text" id="guardianname" name="guardianname">
																</div><br>
																
																<div class="form-group">
																	<label for="emrgncycontact">Emergency Contact No.: <i class="red">*</i></label>
																	<input type="number" min="12" class="form-control number form-text" id="emrgncycontact" name="emrgncycontact">
																</div><br>
																
																<div class="form-group">
																	<label for="reladdress">Address: <i class="red">*</i></label>
																	<input required type="text" class="form-control form-text" id="reladdress" name="reladdress">
																</div><br>
																
																<div class="form-group">
																	<label>Date Issued: <i class="red">*</i></label>
																	<input type="date" class="form-control form-text" id="dateissued" name="dateissued">
																</div><br>
																
														</fieldset>
													</div>`
												</section>
													<button type="submit" name="brgyidbtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
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
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
																<!--
																<div class="form-group">
																	<label for="purpose">Attach ID: <i class="red">*</i></label>
																	<input required type="file" class="form-control form-text" id="id_type" name="id_type">
																</div></br>
																-->
																<div class="form-group" style="visibility: hidden;">
																	<label for="date_issue">Date Issued: </label>
																	<input required type="date" class="form-control form-text" id="date_issue" name="date_issue">
																</div><br>
															</fieldset>
														</div>
												</section>
													<button type="submit" name="indigencybtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
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
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
											  <section class="userpersonal_form">
														<div class="left_userpersonal_info">
															<fieldset class="field_set">
																<legend>Personal Information</legend>
																<div class="form-group">
																	<label for="full_name">Full Name: </label>
																	<input required type="text" class="form-control form-text clearance" id="full_name" name="full_name" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
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
																	<label for="citizenship">Citizenship: </label>
																	<input required type="text" class="form-control form-text" id="citizenship" name="citizenship" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;			this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);">
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
																		<input type="date" class="form-control form-text" id="date_issued" name="date_issued">
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

													<div class="right_userpersonal_info">
														<fieldset class="field_set">
																<legend>File Upload</legend>

																<div class="form-group">
																	<label for="purpose">ID Type: </label>
																	<input type="text" class="form-control form-text" id="purpose" name="purpose">
																</div><br>

												</section>
													<button type="submit" name="permitbtn" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Submit</button>
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

</body>
</html>