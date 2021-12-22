<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <title>Signup Form</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet" type="text/css">

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">

</head>



<body onload="myFunction_1(), onload=display_ct()" id="signupform">
    <div id="loading"></div>
    <!-- HEADER -->
    <header id="header">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid top-nav">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-top page-scroll" href="#header">
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
                            <a class="page-scroll" href="resident-defaultpage.html">News</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#signupform">Request Document </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
	
	
    <!-- Slider -->
			<div class="carousel-inner">
                <div class="item active"> 
                    <img class="munisipyo" src="resident-img/backgrounds/sunset.jpg" alt="slider-image"/>
                </div>
                <div class="item">
                    <img class="coconut" src="resident-img/backgrounds/buildings.jpg" alt="slider-image"/>
                </div>   
            </div>
	
				  <form>
					  <section class="userpersonal_form">
							
								<div class="left_userpersonal_info">
									<fieldset class="field_set">
										<legend>Personal Information</legend>
										<div class="form-group">
											<label for="firstname">First Name:<i class="red">*</i> </label>
											<input required type="text" class="form-control form-text" id="firstname" name="firstname" required>
										</div></br>
										
										<div class="form-group">
											<label for="middlename">Middle Name:</label>
											<input required type="text" placeholder="(Optional)" class="form-control form-text" id="middlename" name="middlename">
										</div></br>
										
										<div class="form-group">
											<label for="lastname">Last Name:<i class="red">*</i></label>
											<input required type="text" class="form-control form-text" id="lastname" name="lastname" required>
										</div></br>
										
										
										 <div class="form-group">
											<label for="age">Age:<i class="red">*</i></label>
											<input required type="text" class="form-control form-text" id="age" name="age">
										</div></br>
										
										 <div class="form-group">
											<label for="gender">Gender:<i class="red">*</i></label>
											<select class="form-control form-text" id="gender" name="gender">
											   <option disabled class="form-text">-- Select --</option>
												<option>Male</option>
												<option>Female</option>
											</select>       
										</div></br>
										
										<div class="form-group">
												<label for="dob">Date of Birth:<i class="red">*</i></label>
												<input type="date" class="form-control form-text" id="dob" name="dob">
										</div></br>

									</fieldset>
								</div>
							
							<div class="right_userpersonal_info">
								<fieldset class="field_set">
										<legend>Other Information</legend>
										<div class="form-group">
											<label for="civilstatus">Civil Status:<i class="red">*</i></label>
											<select class="form-control form-text" id="civilstatus" name="civilstatus">
											   <option disabled class="form-text">-- Select --</option>
												<option>Single</option>
												<option>Married</option>
												<option>Widowed</option>
												<option>Separated</option>
												<option>Divorce</option>
											</select>
										</div></br>
										<div class="form-group">
											<label for="lastname">Address:<i class="red">*</i></label>
											<input required type="text" class="form-control form-text" id="lastname" name="lastname" required>
										</div></br>
										<div class="form-group">
												<label for="contactno">Contact Number:<i class="red">*</i></label>
												<input type="number" min="12" class="form-control number form-text" id="contactno"
												aria-describedby="phonehelp" name="contactno">
										</div></br>
										
										<div class="form-group">
											   <label for="emergencyno">Emergency Number:<i class="red">*</i></label>
											   <input type="number" min="12" class="form-control number form-text" id="emergencyno"
											   aria-describedby="phonehelp" name="emergencyno">
										</div></br>
										
										<div class="form-group">
											<label for="idtype">ID Type:<i class="red">*</i></label>
											<select class="form-control form-text" id="idtype" name="idtype">
												<option disabled class="form-text">-- Select --</option>
												<option class="form-text">Barangay ID</option>
												<option class="form-text">Company ID</option>
											</select>
										</div></br>
										<div class="form-group">
											<label for="file">Attach ID:<i class="red">*</i></label>
											<input required type="file" class="form-control form-text" id="file" name="file" required>
										</div></br>
										<div class="form-group">
											<label for="file">Document You are requesting:<i class="red">*</i></label>
											<select class="form-control form-text" id="document" name="document">
												<option disabled class="form-text">-- Select --</option>
												<option class="form-text">Barangay ID</option>
												<option class="form-text">Certificate of Residency</option>
												<option class="form-text">Certificate of Indigency</option>
											</select>
										</div></br>
										<div class="form-group">
											<label for="purpose">Purpose:<i class="red">*</i></label>
											<textarea class="form-control form-text" id="purpose" name="purpose" required>
											</textarea>
										</div></br>
									
								</fieldset>
							</div>
							
						</section>
						
							<button type="submit" name="submit" class="btn btn-primary btn-block"><i class='bx bx-save'></i> Save</button>
				  </form> 


   
    <!-- Footer -->
    <footer>
        <div class="container-fluid wrapper">
            <div class="col-lg-12 footer-info">
                <p class="footer-text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                </p>
                <p>
                   <span class="footer_dt" id="date-time"></span>
                </p>
            </div>
           
            <div class="col-sm-12 col-md-12 col-lg-12 copyright-bottom">
                <span class="copyright">
                    Copyright &copy; Barangay Commonwealth Hall - 2021 Created By 
                    <a href="http://betaencorp" target="_blank">Beta Encorp</a>
                </span>
            </div>

            <div class="footer-text">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
    </footer>
	
    <!-- Scroll-up -->
    <div class="scroll-up">
        <a href="#header" class="page-scroll"><i class="fa fa-angle-up"></i></a>
    </div>
    <div id="theme-settings">
        <div id="settings-button">
        </div>
        <div class="color">
            <span class="settings-title">Theme color selector</span>
            <ul class="gradients">
                <li>
                    <div class="gradient1">
                    </div>
                </li>
                <li>
                    <div class="gradient2">
                    </div>
                </li>
                <li>
                    <div class="gradient3">
                    </div>
                </li>
                <li>
                    <div class="gradient4">
                    </div>
                </li>
                <li>
                    <div class="gradient5">
                    </div>
                </li>
                <li>
                    <div class="gradient6">
                    </div>
                </li>
                <li>
                    <div class="gradient7">
                    </div>
                </li>
                <li>
                    <div class="gradient8">
                    </div>
                </li>
            </ul>
        </div>
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

    <script>
    $(function () { $("input").not("[type=submit]").jqBootstrapValidation(); } );</script>

</body>

</html>