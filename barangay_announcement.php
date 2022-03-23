<?php session_start();
include "db/conn.php";
include "db/user.php";

?>
<?php
$user = '';

if (isset($_SESSION['email'])) {
  $user = $_SESSION['email'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Barangay Programs - Barangay Commonwealth QC.</title>

  <!-- Bootstrap Core CSS -->

  <link href="resident-css/bootstrap.css" rel="stylesheet">

  <!-- Custom CSS -->

  <link rel="stylesheet" href="resident-css/style.css">
  <link rel="stylesheet" href="resident-css/resident.css">
  <link rel="stylesheet" href="css/preloader.css">
  <!-- Icon -->
  <link rel="icon" type="image/png" href="./resident-img/Brgy-Commonwealth.png">

  <!-- Custom Fonts -->

  <link href="resident-css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet" type="text/css">

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

    .sep_announcement {
      margin-top: 95px;
      margin-bottom: 75px;
    }

    img.spot {
      margin-left: 45px;
    }

    .announce_item {
      padding: 25px 25px 25px 25px;
    }

    ul.newslatest_postnav {
      list-style-type: none;
    }

    a.login {
      cursor: pointer;
    }

    @media screen and (max-width: 720px) {
      .logdropdown-content {
        position: relative;
      }
    }

    @media screen and (max-width: 800px) {
      .logdropdown-content {
        position: relative;
      }
    }

    @media screen and (max-width: 995px) {
      .logdropdown-content {
        position: relative;
      }
    }
  </style>
</head>

<body class="body">
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

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
                <a class="page-scroll" href="barangay_announcement.php">Barangay Announcement</a>
                <a class="page-scroll" href="#">Barangay Seminar/ Course</a>
                <a class="page-scroll" href="health_related.php">Health Related</a>
                <a class="page-scroll" href="barangayprograms.php">Barangay Programs</a>
                <a class="page-scroll" href="sanguniang_kabataan.php">Sangunian Kabataan</a>
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

            <!-- <div>
              <a href="#" class="fp">Forgot password?</a>
            </div> -->
            <div class="information">
              <button type="submit" id="logbtn" name="logbtn" value="signin" class="log_button sign_in">
                Sign in
              </button>
              <p style="text-align: center;">You do not have account yet? <a href="resident_account_registration.php">Register</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <div class="row announce_item">
    <div class="col-lg-8 col-md-8 col-sm-8 first-section">
      <div class="col-md-12">
        <div class="section-heading">

          <?php
          include('db/conn.php');
          include('db/captain.php');
          //Here we are fetching Category ID: 20; Which is equal to Vaccine Category
          $stmt = $db->prepare("SELECT * FROM announcement_category WHERE cid = '25'");
          $stmt->execute();
          $imagelist = $stmt->fetchAll();
          if (count($imagelist) > 0) {
            foreach ($imagelist as $data) {
          ?>
              <h3 id="news_section"><?php echo $data['category_name']; ?> Announcement Section</h3>
              <span>
                <a href="resident-defaultpage.php">Home</a><label> >> <label><a><?php echo $data['category_name']; ?></a>
              </span>
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
      <?php
      include('db/conn.php');
      include('db/captain.php');
      //Here we are fetching Category ID: 20; Which is equal to Vaccine Category
      $stmt = $db->prepare("SELECT * FROM tbl_announcement WHERE cat_id = '25'");
      $stmt->execute();
      $imagelist = $stmt->fetchAll();
      if (count($imagelist) > 0) {
        foreach ($imagelist as $image) {
      ?>
          <div class="announcement-item">
            <div class="announcementsingle_item"> <a href="#"><img src="upload/<?php echo $image['announcement_image']; ?>" width="85%" height="60%"></a>
              <div>
                <h4><?php echo $image['announcement_heading']; ?></h4>
                <p>Date Posted: <?php echo $image['announcement_date']; ?></p>
              </div>
              <div style="text-align: justify">
                <p>
                  <?php echo $image['announcement_description']; ?>
                </p>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "<div class='errormessage'>
                      <i class='bx bx-error'></i>
                      No Barangay Program Post yet!
					  </div>";
      }
      ?>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="newslatest_post section-heading">
        <h3><span>Related post</span></h3>
        <?php
        include('db/conn.php');
        include('db/captain.php');
        //Here we are fetching Category ID: 20; Which is equal to Vaccine Category
        $stmt = $db->prepare("SELECT * FROM announcement_category");
        $stmt->execute();
        $sidelist = $stmt->fetchAll();
        if (count($sidelist) > 0) {
          foreach ($sidelist as $list) {
        ?>
            <div class="newslatest_post_container">
              <ul class="newslatest_postnav">
                <li>
                  <div class="media"> <a href="#" class="media-left"> <img alt="" src="upload/category/<?php echo $list['category_image']; ?>" width="70" height="70"> </a>
                    <div class="media-body"> <a href="#" class="catg_title"><?php echo $list['category_name']; ?></a></div>
                  </div>
                </li>
              </ul>
            </div>
        <?php
          }
        } else {
          echo "<div class='errormessage'>
                      <i class='bx bx-error'></i>
                      No Barangay Progroms Post yet!
					  </div>";
        }
        ?>
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

  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/preloader.js"></script>
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
</body>

</html>