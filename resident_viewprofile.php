<?php session_start();
include "db/conn.php";
include "db/user.php";

?>
<?php
	$user = '';

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
	}
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
    <link rel="stylesheet" href="resident-css/resident.css">
	
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
		.contact_block-text{width:100%}
    .cntctbtn{margin-bottom: 15px;}
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
                        <li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Services</a>
                            <span class="logdropdown-content">
                              <a class="page-scroll" href="reqdoc_barangayid.php">Barangay ID</a>
                              <a class="page-scroll" href="reqdoc_bpermit.php">Business Permit</a>
                              <a class="page-scroll" href="reqdoc_.indigency.php">Certificate of Indigency</a>
                              <a class="page-scroll" href="reqdoc_clearance.php">Barangay Clearance</a>
                              <a class="page-scroll" href="reqdoc_blotter.php">Blotter</a>
                            </span>
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
  
  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
  
  <script src="resident-js/accordions.js"></script>
  <script>
    function openContact(contactName) {
      var i;
      var x = document.getElementsByClassName("contactlist");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      document.getElementById(contactName).style.display = "block";  
    }
  </script>

</body>
</html>