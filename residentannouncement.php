<?php session_start();
include "db/conn.php";
include "db/user.php";

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
    <link rel="stylesheet" href="resident-css/resident.css">
	
	<!-- Icon -->
	<link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

    <!-- Custom Fonts -->

   <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet" type="text/css">
   
   <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom Animations -->

    <link rel="stylesheet" href="resident-css/animate.css">
	
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
                            <a class="page-scroll" href="resident-defaultpage.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="residentannouncement.php">Announcement</a>
                        </li>
                          <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Services</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="residentreqdocu.php#barangayid">Barangay ID</a>
                              <a class="page-scroll" href="residentreqdocu.php#permit">Business Permit</a>
                              <a class="page-scroll" href="residentreqdocu.php#indigency">Certificate of Indigency</a>
                              <a class="page-scroll" href="residentreqdocu.php#clearance">Barangay Clearance</a>
                              <a class="page-scroll" href="residentreqdocu.php#blotter">Blotter</a>
                            </span>
                          </li>
                          <li>
                              <a class="page-scroll" href="residentcontactus.php">Contact Us</a>
                          </li>
                          <li class="logdropdown">
                            <a style="color: green" class="page-scroll logout" href="javascript:void(0)">Email address</a>
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

    <main>
  <div class="sep_announcement">
    <h2>Announcement</h2>
    <span>
      <a href="resident-defaultpage.php">Home</a><label> >> <label><a>Announcement</a>
    </span>
        <h4>Resize the browser window to see the effect.</h4>

       
          <?php
										include ('db/conn.php');
										include ('db/captain.php');

										$stmt = $db->prepare('SELECT * from announcement');
										$stmt->execute();
										$imagelist = $stmt->fetchAll();
											if (count($imagelist) > 0) {
												foreach ($imagelist as $image) {
										?>
												 <div class="responsive">
                              <div class="gallery">
																		<img class="announcement_item col-md-6" src="<?=$image['announcement_image']?>" title="<?=$image['announcement_imgname'] ?>" >

																		<a href="#">
																			<div class="desc"><?=$image ['description']?></div>
																		</a>
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

        <div class="clearfix"></div>

        
    </div>
    </main>

  
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

</body>
</html>