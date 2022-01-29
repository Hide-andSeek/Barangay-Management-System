<?php session_start();

include "db/conn.php";
include "db/user.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    

    <title>Home - Barangay Commonwealth QC.</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
    <link rel="stylesheet" href="resident-css/resident.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">
	
	<style>
            .guidelines{font-size: 11px; color: #808080; padding-left: 25px; padding-right:25px; text-align: justify; padding-bottom: 15px;}
            button.getstarted{margin-bottom: 55px;}
            .blotter {margin-top: 15px;}
            .colu{margin: 15px 15px 15px 15px; background-color: black;}
            
            .section {
                padding: 20px 20px;
            }

            section#services {
                background-image: url(resident-img/backgrounds/services-bg.jpg);
                background-position: center;
                background-size: cover;
            }

            section#services .section-subheading {
                color:#fff !important;
            }

            section h2.section-heading {
                font-size: 40px;
                margin-top: 0;
                text-align: center;
                text-transform: uppercase !important;
                color: #058BCE;
                
            }

            section h3.section-subheading {
                font-size: 13px;
                line-height: 26px;
                text-transform: none;
                text-align: center;
                font-weight: 400;
                margin-bottom: 47px;
                margin-top: 20px !important;
                color: #222222;
            }


            a.filled-button {
                text-decoration: none;
                font-size: 14px;
                font-weight: 300;
                border-radius: 5px;
                transition: all 0.3s;
                cursor: pointer;
            }

            a.filled-button:hover {
                background: #7cfa66d7;
                color: #fff;
            }


            @media all and (min-width:768px) {
                section {
                    padding: 80px 0;
                }
                
            }

            @media all and (max-width:480px) {
                section h2.section-heading {
                    font-size: 25px;
                    margin-top: 0;
                    text-align: center;
                    text-transform: uppercase !important;
                    color: #058BCE;
                }
                
                section h3.section-subheading {
                    font-size: 14px;
                    line-height: 26px;
                    font-family: 'Montserrat', sans-serif;
                    text-transform: none;
                    text-align: center;
                    font-weight: 400;
                    margin-bottom: 47px;
                    margin-top: 15px !important;
                    color: #000;
                }
                .u-description{
                    display: none;
                }
            }

            .radius{
                border-radius: 20px;
            }



            .services_1 {
                background-size: cover;
                padding: 20px 0px;
            }

            .services_1 .service-item1 {
                text-align: center;

            }

            .services_1 .service-item1 .icon {
                background-color: #f7f7f7;
                padding: 40px;

            }

            .services_1 .service-item1 .icon i {
                width: 80px;
                height: 80px;
                text-align: center;
                line-height: 80px;
                background-color: #1ADA93;
                color: #fff;
                font-size: 32px;
            }

            .services_1 .service-item1 .down-content1 {
                background-color: white;
                /* background-color: #04AA6D; */
                /* background-color: #1ADA93; */
                padding: 20px 10px;
                
            }

            .services_1 .service-item1 .down-content1 h4 {
                font-size: 17px;
                color: black;
                margin-bottom: 20px;
                
            }

            .services_1 .service-item1 .down-content1 p {
                margin-bottom: 25px;
            }

            .service{color: white;}

            .announcement_item, .news_item{display: block; margin-left: auto; margin-right: auto; width: 50%; float: center;}
            .announce, .news{display: flex; justify-content: center; align-items: center;}
            .news{margin-top: 15px;}
            .see_announcement, .see_news{margin-left: 20px;border: none; padding: 15px 32px; text-align: center; font-size: 16px; margin: 4px 2px; cursor: pointer; -webkit-transition-duration: 0.2s;}
            .block-text{background-color: #d1d1d1;}
            .see_announcement:hover, .see_news:hover{box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 8px 25px 0 rgba(0,0,0,0.10)}

            .news_heading{color: black; text-align: justify;}
            .news_heading:hover{color: blue; text-decoration: none;}
            div.announce{background-color: white; margin-top: 15px; float: center;}
            .pic{background-color: gray; margin: 50px 50px 50px 50px}

            /*-- Mobile Device --*/

            @media all and (max-width: 700px){
                .services_1 .service-item1 .icon i {
                    width: 100px;
                    height: 100px;
                }
            }

            @media all and (max-width: 1200px){
                .service-item1{
                    padding-bottom: 20px;
                }
            }

            a.login{cursor:pointer;};
            .center{text-align: center;}
	</style>

</head>

<body onload="display_ct()" id="home">
    <!-- HEADER -->

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
                            <a class="page-scroll" href="#home">Home</a>
                        </li>
                        <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Announcement</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="academic-related.php">Academic Related</a>
                              <a class="page-scroll" href="#">Barangay Funds</a>
                              <a class="page-scroll" href="#">Latest Announcement</a>
                              <a class="page-scroll" href="vaccine.php">Vaccine</a>
                              <a class="page-scroll" href="barangayprograms.php">Barangay Programs</a>
                            </span>
                        </li>
                        <li>
                            <a class="page-scroll" href="contact.php">Contact Us</a>
                        </li>
                        <li>
                            <a class="page-scroll login" onclick="document.getElementById('id01').style.display='block'">Login</a>
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
                <div class="modal-content animate">
                    <span onclick="document.getElementById('id01').style.display='none'" class="topright">&times;</span>	
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
									<input class="inputtext control-label" id="email" name ="email" type="text"  placeholder="Email">
                                    
								</div>
								
								<div class="information">
									<input class="inputpass c_password" type="password" id="logpassword" placeholder="Password" name="password"> 
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
								<input required class="inputtext" type="email" name="email" placeholder="Email" >
							</div>
							<div class="information controls">
								<input required class="inputpass" type="password" name="password" placeholder="Password">
							</div>

							<div class="guidelines">
								<input type="checkbox" value="Yes" id="policy" name="policy" required>
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

    <!-- Slider -->
    <section id="slider">
      <div id="myCarousel-one" class="carousel slide">

       <ol class="carousel-indicators">
            <li data-target="#myCarousel-one" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel-one" data-slide-to="1"></li>
        </ol>

            <div class="carousel-inner">
                <div class="item active"> 
                
                    <div class="carousel-caption wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInRight u-description">Barangay Commonwealth</h1>
                                    <h2 class="intro-heading animated bounceInLeft u-description">Barangay Management</h2>
                                    <p class="intro-paragraph animated bounceInRight"> </p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp radius service_size">Services</a>
                            </div>
                        </div>
                    </div>
                    <img class="munisipyo" src="resident-img/backgrounds/commonwealth_1.jpg" alt="slider-image"/>
                </div>
               
                <div class="item"> 
                
                    <div class="carousel-caption wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInRight u-description">Barangay Commonwealth Hall</h1>
                                    <h2 class="intro-heading animated bounceInLeft u-description">Barangay Services</h2>
                                    <p class="intro-paragraph animated bounceInRight"> </p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp radius service_size">Services</a>
                            </div>
                        </div>
                    </div>
                    <img class="munisipyo" src="resident-img/backgrounds/commonwealth.jpg" alt="slider-image"/>
                
                </div>				
            </div>
        </div>
    </section>

    <!-- Mission and Vision -->
    <div class="best-features about-features">
        <div class="mv_container">
          <div class="row">
            
            <div class="col-md-6">
              <div class="right-content">
                <h3 class="mv_heading section-heading ">Misyon</h3>
                <p class="mv_content section-subheading "><blockquote class="section-subheading">Upang maglingkod ng lubusan sa barangay sa paghahatid ng serbisyo sa pagsulong ng kagalingan na may pantay na pagtingin at kasiguruhan ng daynamiko, maunlad at payapang pamayanan.</blockquote></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-content">
                <h3 class="mv_heading section-heading ">Adhikain</h3>
                <p class="mv_content section-subheading"><blockquote class="section-subheading">Upang makabuo ng isang pamayanang binigkis ng layunin para sa mabuting buhay sa diwa ng pagkakaisa, paninindigan ng paglilingkod sa kapwa na may paggalang sa dignidad at karangalan ng iba, na ginagabayan ng higit sa lahat ng pagmamahal sa diyos at bayan.</blockquote></p>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- Services Section -->
    <section id="services">
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <h2 class="section-heading service">Services</h2>
                </div>
            </div>
        </div>
			
			<div class="services_1">
				  <div class="container">
					<div class="row">
					  <div class="col-md-2">
					  <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="bx bx-id-card"></i>
						  </div>
						  <div class="down-content1">
							<h4>Barangay ID</h4>
						  </div>
						</div>
						</a>
					  </div>
					  <div class="col-md-2">
					  <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="bx bx-receipt bx_icon"></i>
						  </div>
						  <div class="down-content1">
							<h4>Barangay Clearance</h4>
						  </div>
						</div>
						</a>
					  </div>
					  <div class="col-md-2">
					  <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="bx bxs-file"></i>
						  </div>
						  <div class="down-content1">
							<h4>Certificate of Indigency</h4>
						  </div>
						</div>
						</a>
					  </div>
					  <div class="col-md-2">
					    <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="bx bx-message-rounded"></i>
						  </div>
						  <div class="down-content1">
							<h4>Online Blotter</h4>
						  </div>
						</div>
						</a>
					  </div>
					  <div class="col-md-2">
					    <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="bx bx-copy"></i>
						  </div>
						  <div class="down-content1">
							<h4>Business Permit</h4>
						  </div>
						</div>
						</a>
					  </div>
					  <div class="col-md-2">
					    <a class="filled-button" onclick="document.getElementById('id01').style.display='block'">
						<div class="service-item1">
						  <div class="icon">
							<i class="fa fa-gear"></i>
						  </div>
						  <div class="down-content1">
							<h4>Instructions</h4>
						  </div>
						</div>
						</a>
					  </div>
					</div>
				  </div>
				</div>
</section>
   
<!--      
     <section id="news_and_announcement">
        <div class="container-fluid wrapper">
            <div class="row">
                <div class="col-sm-8 col-lg-12 text-left">
                    <h2 class="section-heading a_c">Announcement</h2>
                </div>
            </div>
            <div id="myCarousel-three" class="carousel-testimonials" data-ride="carousel">
           
                <div class="carousel-inner">
                        
                                    <?php
										include ('db/conn.php');
										include ('db/captain.php');

										$stmt = $db->prepare('SELECT * from tbl_announcement');
										$stmt->execute();
										$imagelist = $stmt->fetchAll();
											if (count($imagelist) > 0) {
												foreach ($imagelist as $image) {
										?>
													<div class="item active">
														<div class="col-md-4 col-sm-6 announce">
															<div class="block-text">
                                                                        <a class="news_heading" href="announcement.php">
                                                                            <img class="announcement_item col-md-6" src="upload/<?php echo $image['announcement_image']; ?>" style="width:300px; height:200px">

                                                                            <strong><h3 class="announcement_entry_text"><?php echo $image['announcement_heading']; ?></h3></strong>
																		</a>
															</div>
														</div>
													</div>
										<?php
														}
											} else {
											echo "<div class='errormessage'>
                                                    <i class='bx bx-error'></i>
                                                    No announcement yet!
                                                 </div>";
										}
										?> 

						</div>
					</div>
				</div>			

			<div class="announce">
				<button class="see_announcement" onclick="document.location='announcement.php'" >See announcements</button>
			</div>	
	</section > -->

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
    <!-- <div id="theme-settings">
        <div id="settings-button">
			<img src="resident-img/options.png"></img>
        </div>
        <div class="color">
            <span class="settings-title">Theme color selector</span>
            <ul class="gradients">
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
    </div> -->
   
   <!-- Color Settings script -->
   <script src="resident-js/settings-script.js"></script>
    <!-- jQuery -->
    <script src="resident-js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="resident-js/bootstrap.min.js"></script>
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
    <script type="text/javascript" async src="//l.getsitecontrol.com/d7o5309w.js"></script>
    <script>
		document.querySelector('.button').onclick = function(){
			var password = document.querySelector('.password').value,
				confirmpass = document.querySelector('.confirmpass').value;
				
				if(password == ""){
					alert("Field cannot be empty.");
				}
				else if(password != confirmpass){
					alert("Password didn't match try again.");
					return false
				}
				else if(password == confirmpass){
					alert("Password match.");
				}
				return true
		}

        const togglePassword = document.querySelector('#togglePassword');
				const password = document.querySelector('#logpassword');
				
				togglePassword.addEventListener('click', function (e) {
					// toggle the type attribute
					const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
					password.setAttribute('type', type);
					// toggle the eye slash icon
					this.classList.toggle('fa-eye-slash');
				});
    </script>
	

</body>

</html>

