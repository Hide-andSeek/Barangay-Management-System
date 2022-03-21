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
    .body {
      background: #ebebeb
    }

    .navnav {
      background: #35363A;
      opacity: 0.9;
    }

    .container {
      padding: 50px 50px 50px 50px;
    }

    .contact_block-text {
      width: 100%
    }

    .cntctbtn {
      margin-bottom: 15px;
    }

    .send-message {
      margin-top: 15px;
      margin-bottom: 20px;
      margin-bottom: 20px;
    }
    a.createacc {
            text-decoration: none;
            color: white;
        }
  </style>
</head>

<body onload=display_ct() id="contact" class="body">


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
          <a class="navbar-brand logo-top page-scroll" href="index.php">
            <img class="brgy-logo" src="resident-img/Brgy-Commonwealth.png" alt="logo">
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
  <div id="formatValidatorName">
    <div id="id01" class="modal">
      <div class="modal-content animate">
        <span onclick="document.getElementById('id01').style.display='none'" class="topright">&times;</span>

        <span class="imgcontainer">
          <label>
            <img class="logcomm" src="resident-img/Brgy-Commonwealth_1.png" alt="">
          </label>
        </span>

        <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <div id="Login" class="login_container form">
            <div class="information">
              <input class="inputtext control-label" id="email" name="email" type="text" placeholder="Email">
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
              <button class="log_button gmail" onclick="window.location.href= 'resident_=--account_registration.php'">
                <a class="createacc" href="resident_account_registration.php">Create Account</a>
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
              <br>
              <br>
              <p style="text-align: justify; font-size: 16px;"><strong>Barangay Commonwealth</strong> is located along the Commonwealth Avenue with an estimated population of 213,229 determined by the 2020 census. This represented 7.20% of the total population of Quezon City. A population that is considered to be one of the largest in the Quezon City. </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Contact Official Section-->
    <section id="contact_officials">
      <div class="container-fluid wrapper">
        <div class="w3-bar w3-black">
          <button class="form-control cntctbtn" onclick="openContact('Contact1')" style="border: none; font-size: 19px;">In case of emergency hotlines</button>
          <!-- <button class="form-control cntctbtn" onclick="openContact('Contact2')">Contact2</button>
      <button class="form-control cntctbtn" onclick="openContact('Contact3')">Contact3</button> -->
        </div>
        <div id="myCarousel-three" class="carousel-testimonials slide">
          <!-- Wrapper for Slides -->
          <div class="carousel-inner">
            <div class="carousel-inner">
              <div class="item active">
                <div class="contactlist" id="Contact1">
                  <div class="col-md-6 col-sm-6 ">
                    <div class="block-text contact_block-text">
                      <span>
                        <h5><i class="fa fa-location-arrow fa_icon"></i> Emergency 911</h5>
                      </span>
                      <span>
                        <h4 class="contact_officials_text">
                          <i class="fa fa-mobile-phone fa_icon"></i>(02) 925-9111/ +63966-5000-299 [Globe]
                        </h4>
                      </span>
                      <p class="contact_officials_author"><strong>NCR Region</strong></p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="block-text contact_block-text">
                      <span>
                        <h5><i class="fa fa-location-arrow fa_icon"></i> Bureau of Fire Protection</h5>
                      </span>
                      <span>
                        <h5 class="contact_officials_text">
                          <i class="fa fa-mobile-phone fa_icon"></i> (02) 426-0219 / (02) 426-3812 / (02)426-0246
                        </h5>
                      </span>
                      <p class="contact_officials_author"><strong>NCR Region</strong></p>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="block-text contact_block-text">
                      <span>
                        <h5><i class="fa fa-location-arrow fa_icon"></i> Philippine National Police</h5>
                      </span>
                      <span>
                        <h5 class="contact_officials_text">
                          <i class="fa fa-mobile-phone fa_icon"></i> (02) 722-0650/ +63917-847-5757
                        </h5>
                      </span>
                      <p class="contact_officials_author"><strong>NCR Region</strong></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="contactlist" id="Contact2" style="display:none">
                <div class="col-md-6 col-sm-6 ">
                  <div class="block-text contact_block-text">
                    <span>
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 2nd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 2nd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 2nd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 2nd Ave. Katuparan Street</h5>
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
              <div class="contactlist" id="Contact3" style="display:none">
                <div class="col-md-6 col-sm-6 ">
                  <div class="block-text contact_block-text">
                    <span>
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 3rd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 3rd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 3rd Ave. Katuparan Street</h5>
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
                      <h5><i class="fa fa-location-arrow fa_icon"></i> 3rd Ave. Katuparan Street</h5>
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
        <div class="row" style="background: #ebebeb; padding: 20px 20px 20px 20px;">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Contact Us</h2>

            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="username" type="text" class="form-control" id="name" placeholder="Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" placeholder="Your email" required="">
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
                      <button type="submit" id="form-submit" name="contactusbtn" class="filled-button form-control">Send Message</button>
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
        <p class="footer_dt">
          <span id="date-time"></span>
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