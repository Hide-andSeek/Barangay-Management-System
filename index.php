<?php 
session_start();
require_once "db/conn.php";
include ('db/user.php');
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

            .section-subheading{text-align: justify;}

            @media only screen and (max-width: 455px) {
                *{font-family: "Poppins" , sans-serif;}
                img.munisipyo{height: 690px;}
                h3.mv_content_heading{font-size: 18px; }
                blockqoute.mv_content_subheading{font-size: 13px; }
                .section-subheading{text-align: justify; font-size: 16px;}
                .service-item1{padding: 30px;}
           
                .modal-content{ height:400px;width: 370px; font-size: 14px;}
                img.logcomm{width: 110px; height: 110px;}
                button.create_account, button.log_in{width: 40%; font-size: 13px;}
            }

            @media only screen and (max-width: 720px) {
                section {
                    padding: 80px 0;
                }

                .services_1 {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                
                .services_1 .service-item1 .icon i {
                    width: 100px;
                    height: 100px;
                }
                h1.subscripthead{font-size: 30px;}
                .subscript{visibility: hidden;}
                .service{font-size: 14px;}
            }
            
            @media only screen and (max-width: 1445px) {
                section {
                    padding: 80px 0;
                }
                .slider{margin-top: -100px}
                img.munisipyo{width: 1440px; height: 490px;}
            }

            @media only screen and (max-width: 1685px) {
                section {
                    padding: 80px 0;
                }
                
                img.munisipyo{width: 1685px; height: 490px;}
            }

            /* @media only screen and (max-width: 1945px;) {
                section {
                    padding: 80px 0;
                }
                h3.mv_content_heading{font-size: 50px}
                
                img.munisipyo{width: 1920px; height: 1080px;}

                section.slider{margin: 20px;}
            } */

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
            a.createacc{text-decoration: none; color: white;}
            /*-- Mobile Device --*/

           
            @media all and (max-width: 1200px){
                .service-item1{
                    padding-bottom: 20px;
                }
            }

            a.login{cursor:pointer;};
            .center{text-align: center;}

            span.topright{
			display: flex;
			float: right;
			padding:8px 24px;
			font-size: 25px;
            }
            .topright:hover {
                color: red;
                cursor: pointer;
                float: right;
                padding:8px 24px;
            }
            
          
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
                              <a class="page-scroll" href="barangayfunds.php">Barangay Funds</a>
                              <a class="page-scroll" href="latestannouncement.php">Latest Announcement</a>
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
                            <img class="logcomm" src="resident-img/Brgy-Commonwealth_1.png" alt="">
					    </label>
                    </span>
        

					  
					<form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            					
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
								    <button class="log_button gmail" onclick="window.location.href= 'resident_account_registration.php'">
                                    <a class="createacc" href="resident_account_registration.php">Create Account</a>

									</button>
                                    
								</div>
						</div> 	
					</form>
              </div>
        </div>
    </div>

    <!-- Slider -->
    <section id="slider" class="slider">
      <div id="myCarousel-one" class="carousel slide">

            <div class="carousel-inner">
                <div class="item active"> 
                
                    <div class="carousel-caption wrapper wrapper_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInRight u-description subscripthead">Barangay Commonwealth</h1>
                                    <h2 class="intro-heading animated bounceInLeft u-description subscript">Barangay Management</h2>
                                    <p class="intro-paragraph animated bounceInRight"> </p>
                                </div>
                                <a href="#services" class="page-scroll btn btn-xl slider-button animated bounceInUp radius service_size">Services</a>
                            </div>
                        </div>
                    </div>
                    <img class="munisipyo" src="resident-img/backgrounds/commonwealth_1.jpg" alt="slider-image"/>
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
                <h4 class="mv_heading section-heading mv_content_heading">Misyon</h4>
                <p class="mv_content section-subheading mv_content_subheading"><blockquote class="section-subheading">Upang maglingkod ng lubusan sa barangay sa paghahatid ng serbisyo sa pagsulong ng kagalingan na may pantay na pagtingin at kasiguruhan ng daynamiko, maunlad at payapang pamayanan.</blockquote></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-content">
                <h4 class="mv_heading section-heading mv_content_heading">Adhikain</h4>
                <p class="mv_content section-subheading mv_content_subheading"><blockquote class="section-subheading">Upang makabuo ng isang pamayanang binigkis ng layunin para sa mabuting buhay sa diwa ng pagkakaisa, paninindigan ng paglilingkod sa kapwa na may paggalang sa dignidad at karangalan ng iba, na ginagabayan ng higit sa lahat ng pagmamahal sa diyos at bayan.</blockquote></p>
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
					  <div class="col-md-3">
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
					  <div class="col-md-3">
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
                    
                    <a href="https://mail.google.com/mail/barangaycommonwealth0@gmail.com" target="_blank">barangaycommonwealth0@gmail.com</a>
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
    <script>
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

