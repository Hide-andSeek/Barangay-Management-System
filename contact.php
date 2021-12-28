<?php session_start();
include "db/conn.php";
include "db/users.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us - Barangay Commonwealth QC.</title>

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

    <link rel="stylesheet" href="resident-css/animate.css">
	
	<style>
		.body{background: #ebebeb}
		.navnav{background:#35363A; opacity: 0.9;}
		
	</style>
</head>

<body onload=display_ct() id="contact" class="body">
    

    <header id="header">
         <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navnav">
            <div class="container-fluid top-nav" >
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo-top page-scroll" href="index.php">
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
                            <a class="page-scroll" href="index.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="announcement.php">Announcement</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact Us</a>
                        </li>
                        <li>
                            <a class="page-scroll b_login" onclick="document.getElementById('id01').style.display='block'" href="#login">Login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

    </header>

    <!--Modal form for Login-->
<div id="formatValidatorName" >
          <div id="id01" class="modal">
                <div class="modal-content animate " >
                    <span class="imgcontainer">
                      <label>
                          <img src="resident-img/Brgy-Commonwealth_1.png" alt="">
                      </label>
                    </span>
                    
					
                    <div class="form-bar">
                        <button class="form-bar-item form-button tablink form-active log_in" onclick="openForm(event.preventDefault(),'Login')">Login</button>
                        <button class="form-bar-item form-button tablink create_account" onclick="openForm(event.preventDefault(),'CreateAcc')">Create Account</button>
                      </div>
					  
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div id="Login" class="login_container form">

              <div class="information">
								  <input required class="inputtext" type="text" name="uname" placeholder="Username" >
							</div>

								<div class="information">
									<input required class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Email"> 
								</div>

								<div class="information">
									<input required class="inputpass c_password" type="password" id="password" placeholder="Password" name="password">   
								</div>
							   
								<div>
									<a href="#" class="fp">Forgot password?</a>
								</div>
								<div class="information">   
									<button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
										Sign in
									</button>  
									<div>
										<button class="log_button gmail">
											<i class="fa fa-google"></i>  Sign with Gmail
										</button>
									</div>
								</div>
						</div> 	
					</form>
<!-- Create an Account-->
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div id="CreateAcc" class="login_container form" style="display: none;">
							<div class="information">
								<input required class="inputtext" type="text" name="uname" placeholder="Username" >
							</div>
							
							<div class="information">
								<input required class="inputtext" type="email" id="" name ="email" placeholder="Email" >
							</div>
							
							<div class="information controls">
								<input required class="inputpass" type="password" id="" name ="password" placeholder="Password">
							</div>

							<div class="guidelines">
              <input type="checkbox" value="yes" id="policy" name="policy">
								I agree to the collection and use of the data that I have provided to Barangay Commonwealth for the purpose of using their services. I understand that the collection and use of this data, which included personal information and sensitive personal information shall be accordance with the <a href="https://www.privacy.gov.ph/data-privacy-act#11" target="_blank">Data Privacy Act of 2012</a> and the <a href="">Privacy and Policy</a> of Barangay Commonwealth Hall.
								<span class="checkmark"></span>	
							</div>
							<div class="information">   
								<button type="submit" name="regbtn" class="log_button sign_in getstarted popup_mess">
									Get Started
								</button>  
							</div>
						</div>
					</form>
              </div>
        </div>
    </div>

 
 
 <div class="contactus_content">
  <div class="find-us">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
		<h2>Map</h2>
          <div id="map" style="margin-top: 30px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.273526067959!2d121.0861187150456!3d14.69711778974107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ba0d1e186d73%3A0x575e861aa5cfcd55!2sBarangay%20Commonwealth%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1637581521007!5m2!1sen!2sph" width="100%" height="350" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-md-4">
          <div class="left-content">
            <h2>Barangay Commonwealth</h2>
            <p>Barangay Commonwealth is located along the Commonwealth Avenue with an estimated population of 213,229 determined by the 2020 census. This represented 7.20% of the total population of Quezon City. A population that is considered to be one of the largest in the Quezon City. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact Official Section-->
  <section id="contact_officials">
    <div class="container-fluid wrapper">
        <div id="myCarousel-three" class="carousel-testimonials slide" data-ride="carousel">
            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-md-6 col-sm-6">
                            <div class="block-text contact_block-text">
                                <span>
                                  <h5><i class="fa fa-location-arrow fa_icon"></i> Commonwealth Ave. Katuparan Street</h5>
                                </span>
                                <span>
                                  <h5 class="contact_officials_text">                                  
								  <i class="fa fa-mobile-phone fa_icon"></i> 8932-2395 / 8283-9695 / 8951-8466
								  </h5>
                                </span>
                                <p class="contact_officials_author"><strong>Manuel A. Co</strong>, Punong Barangay</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="block-text contact_block-text">
                              <span>
                                <h5><i class="fa fa-location-arrow fa_icon"></i> Commonwealth Ave. Katuparan Street</h5>
                              </span>
                              <span>
                                <h5 class="contact_officials_text">                                  
								<i class="fa fa-mobile-phone fa_icon"></i> 8932-2395 / 8283-9695 / 8951-8466
								</h5>
                              </span>
                              <p class="contact_officials_author"><strong>Manuel A. Co</strong>, Punong Barangay</p>
                          </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-6 col-sm-6">
                            <div class="block-text contact_block-text">
                              <span>
                                <h5><i class="fa fa-location-arrow fa_icon"></i> Commonwealth Ave. Katuparan St</h5>
                              </span>
                              <span>
                                <h5 class="contact_officials_text">                                  
								<i class="fa fa-mobile-phone fa_icon"></i> 8932-2395 / 8283-9695 / 8951-8466
								</h5>
                              </span>
                              <p class="contact_officials_author"><strong>Manuel A. Co</strong>, Punong Barangay</p>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="block-text contact_block-text">
                              <span>
                                <h5><i class="fa fa-location-arrow fa_icon"></i> Commonwealth Ave. Katuparan St</h5>
                              </span>
                              <span>
                                <h5 class="contact_officials_text">                                  
								<i class="fa fa-mobile-phone fa_icon"></i> 8932-2395 / 8283-9695 / 8951-8466
								</h5>
                              </span>
                              <p class="contact_officials_author"><strong>Manuel A. Co</strong>, Punong Barangay</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <div class="send-message">
    <div class="container">
      <div class="row" style="background: #ebebeb">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Contact Us</h2>
			<span>
				<a>Home</a><label> >> <label><a>Contact Us</a>
			</span>
          </div>
        </div>
        <div class="col-md-8">
          <div class="contact-form">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <h3 class="accordion">
		      	Let us know how we can help you! Send us a message.
          </h3>   
        </div>
      </div>
    </div>
  </div>
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
                <span class="copyright">
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
  
  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
  
  <script src="resident-js/accordions.js"></script>

</body>
</html>