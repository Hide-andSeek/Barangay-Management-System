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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">
    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">                                                                                                                   
</head>

<body onload="startTime()" id="home">
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
                            <a>
                                <span style="float: right;">
                                    <label>Date Today: </label>
                                    <span id="date"><?php echo date('l, F j, Y'); ?></span>
                                </span>
                                <br>
                                <span style="float: right;">
                                    <label>Time:</label>
                                    <span id="clock"></span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>

    <!-- Slider -->
    <section id="slider">
      <div id="myCarousel-one" class="carousel slide">

            <div class="carousel-inner">
                <div class="item active"> 
                
                    <div class="carousel-caption wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro-text">
                                    <h1 class="intro-lead-in animated bounceInRight u-description">Commonwealth</h1>
                                    <h2 class="intro-heading animated bounceInLeft u-description">Barangay Official</h2>
                                </div>
                                s
                            </div>
                        </div>
                    </div>
                    <img class="munisipyo" src="resident-img/backgrounds/commonwealth_2.jpg" alt="slider-image"/>
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
			 	<!-- <h5>Put some description right here!</h5> -->
                 <h1>
                     <blockquote>
                     <em> (Put some description right here!) </em>
                     <em> (Put some description right here!) </em>
                    </blockquote>
                 </h1>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-content">
			  <div id="formatValidatorName" >
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">						
										<div id="Login" class="login_container form">
												<div class="information">
													<input class="inputtext control-label" id="username" name ="username" type="text"  placeholder="Username"><i class="bx bx-user-circle" style="margin-left: -50px; cursor: pointer;"></i>
												</div>
												
												<div class="information">
													<input class="inputpass control-label" id="user_no" name="user_no" type="password"  placeholder="Password"><i class="bx bx-show" id="togglePassword" style="margin-left: -50px; cursor: pointer;"></i>
												</div>
											   
												<div class="information">   
													<button type="submit" id="officiallog" name="officiallog" value="Login" class="log_button sign_in">
														Login
													</button>  
												</div>
										</div> 	
									</form>
					</div>
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
					For any inquiries, please Email us and visit our Facebook Page 
                </p>
				<p class="footer-text">
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
				const password = document.querySelector('#user_no');
				
				togglePassword.addEventListener('click', function (e) {
					// toggle the type attribute
					const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
					password.setAttribute('type', type);
					// toggle the eye slash icon
					this.classList.toggle('fa-eye-slash');
				});

            /* Navbar ClockDate */
                function startTime() {
                    var today = new Date();
                    var hr = today.getHours();
                    var min = today.getMinutes();
                    var sec = today.getSeconds();
                    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
                    hr = (hr == 0) ? 12 : hr;
                    hr = (hr > 12) ? hr - 12 : hr;
                    //Add a zero in front of numbers<10
                    hr = checkTime(hr);
                    min = checkTime(min);
                    sec = checkTime(sec);
                    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
                    
                    var time = setTimeout(function(){ startTime() }, 500);
                }
                function checkTime(i) {
                    if (i < 10) {
                        i = "0" + i;
                    }
                    return i;
                }
    </script>
</body>

</html>

