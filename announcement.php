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

    <title>Announcement - Barangay Commonwealth QC.</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">
	
	<style>
		.body{background: #ebebeb}
		.navnav{background:#35363A; opacity: 0.9;}
		.sep_announcement{margin-top: 95px; margin-bottom: 75px;}
		img.spot{margin-left: 45px;}
		.announce_item{padding: 25px 25px 25px 25px;}
		ul.newslatest_postnav{list-style-type: none;}

	</style>
</head>

<body onload=display_ct() class="body">
    

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
                            <a class="page-scroll" href="#news_section">Announcement</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="contact.php">Contact Us</a>
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
								<input required class="inputpass" type="password" id="" name ="password"" placeholder="Password">
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

 
 
 <div class="sep_announcement">
 <!-- News section-->
  <section>
    <div class="row announce_item" >
      <div class="col-lg-8 col-md-8 col-sm-8 first-section">

	  <div class="col-md-12">
          <div class="section-heading">
			<h2 id="news_section">Announcement Section</h2>
			<span>
				<a href="index.php">Home</a><label> >> <label><a>Announcement</a>
			</span>
          </div>
        </div>
        <div class="announcement-item">
          <div class="announcementsingle_item"> <a href="#"><img class="spot" src="resident-img/backgrounds/spot.jpg" alt=""></a>
            <div>
              <h2><a href="#">Announcement Entry 1: Barangay Commonwealth Hall</a></h2>
              <p>covid-19 public advisory: on the announcement of community quarantine</p>
            </div>
			<div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>
			</div>
          </div>
        </div>
      </div>
	  
	  
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="newslatest_post section-heading">
          <h2><span>Latest post</span></h2>
          <div class="newslatest_post_container">
            <ul class="newslatest_postnav">
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
	  <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="newslatest_post section-heading">
          <h2><span>Latest post</span></h2>
          <div class="newslatest_post_container">
            <ul class="newslatest_postnav">
              <li>
                <div class="media"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
 
</div>

 <div class="sep_announcement">
 <!-- News section-->
  <section>
    <div class="row announce_item" >
      <div class="col-lg-8 col-md-8 col-sm-8 first-section">

	  <div class="col-md-12">
          <div class="section-heading">
			<h2 id="news_section">News Section</h2>
			<span>
				<a href="index.php">Home</a><label> >> <label><a>News</a>
			</span>
          </div>
        </div>
        <div class="announcement-item">
          <div class="announcementsingle_item"> <a href="#"><img class="spot" src="resident-img/backgrounds/spot.jpg" alt=""></a>
            <div>
              <h2><a href="#">News Entry 1: Barangay Commonwealth Hall</a></h2>
              <p>covid-19 public advisory: on the announcement of community quarantine</p>
            </div>
			<div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>
			</div>
          </div>
        </div>
      </div>
	  
	  
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="newslatest_post section-heading">
          <h2><span>Latest post</span></h2>
          <div class="newslatest_post_container">
            <ul class="newslatest_postnav">
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class=""> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>

                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
	  <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="newslatest_post section-heading">
          <h2><span>Latest post</span></h2>
          <div class="newslatest_post_container">
            <ul class="newslatest_postnav">
              <li>
                <div class="media"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="#" class="media-left"> <img alt="" src="resident-img/news/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="#" class="catg_title"> Put description right here</a> </div>
                </div>
              </li>
            </ul>
          </div>
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
  
  <script src="resident-js/accordions.js"></script>

</body>
</html>