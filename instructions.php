<?php session_start();
if(!isset($_SESSION['email'])){
	header("location: resident-defaultpage.php");
}
?>
<?php
	$user = '';

	if(isset($_SESSION['email'])){
		$user = $_SESSION['email'];
	}
?>

<?php 

include "db/conn.php";
include "db/documents.php";
include "db/user.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Instruction - Documents</title>

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

    <link rel="stylesheet" href="residentcss/animate.css">

	<style>
				/* 9.0 -- Resident Default Page -- */
		.documentbtn{font-size: 15px;width: 200px; height: 100px; padding: 40px 40px 40px 40px; margin-bottom: 25px}
		.documentbtn:hover{background-color: gray;color: white;}
		.document_section{margin-top: 105px;margin-left: 35px; margin-right: 35px;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.document-section{margin-top:16px!important;margin-bottom:16px!important}
		.document-light-grey,.document-hover-light-grey:hover{border-top-right-radius: 20px;border-top-left-radius: 20px; border-bottom-right-radius: 20px;border-bottom-left-radius: 20px; color:#000!important;}

		.bgcolor{background-color:#ccc!important; }
		.document-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.document-block{display:block;width:100%}
		.document-hide{display:none!important}
		.document-show{display:block!important}
		p.content{width: 450px; height: 300px;}

		

		.detailid{padding-top: 50px; color: #19c410;}
		.form-text-desc{font-size: 10px;margin: 3px 3px; color:black;}

		.animatem{position:relative;animation:animatetop 0.5s}@keyframes animatetop{from{top:-450px;opacity:0} to{top:0;opacity:1}}}
		.modal-header{padding:15px; border-bottom:1px solid #e5e5e5; background: red;}
		.modalcontent-notif{height: 230px; width: 450px;}
		.modal-footer{padding:15px;text-align:right;border-top:1px solid #e5e5e5}

		.instruction{height: 150px; width: 150px; background-color:#f1f1f1!important; border-radius: 50%; display: inline-block; position: auto; margin-left: 15px}
		

		.logdropbtn {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		}

		.logdropdown {
		display: inline-block;
		}

		.logdropdown-content {
		display: none;
		position: absolute;
		background-color: gray;
		min-width: 260px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.logdropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
		}

		.logdropdown-content a:hover {background-color: #f1f1f1;}

		.logdropdown:hover .logdropdown-content {
		display: block;
		}

        /* Button */
        .btns-group {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        }

        .btn {
        padding: 0.75rem;
        display: block;
        text-decoration: none;
        background-color: var(--primary-color);
        color: #f3f3f3;
        text-align: center;
        border-radius: 0.25rem;
        cursor: pointer;
        transition: 0.3s;
        }
        .btn:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--primary-color);
        }

        .left_userpersonal_info{display: flex;}

		@media only screen and (max-width: 700px) {
		.left_userpersonal_info {
			display: none;
		}
		}

		@media only screen and (max-width: 500px) {
		.left_userpersonal_info {
			display: none;
		}
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button{
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number]{
			-moz-appearance: textfield;
		}
		.left_userpersonal_info1{margin-bottom: 30px;}
        .reminder{background: #FCF8F2; padding: 20px 20px 20px 20px;}
        .reminder-heading{color: #EEA236}
        .blockqoute-color{border-left-color: #EEA236;}
	</style>
</head>

<body onload="display_ct()" id="#documents">
    

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
                    <a class="navbar-brand logo-top page-scroll" href="resident-defaultpage.php">
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
						<li>
                            <a class="page-scroll" href="#reqdocu">Services</a>
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
	
        	<!--Document Section-->
<div class="document_section">
	<section>
        <h2>Request Document</h2>
        <p><a href="residentreqdocu.php">Home </a><strong>>> Request Document</strong></p>
        <hr>
        <blockquote class="blockqoute-color">
            <p class="reminder"><label class="reminder-heading">Reminder/ Paalala: </label> Upon requesting your document, please expect around 5 to 15 minutes waiting time. <em>(Tagalog Translation)</em>. Sa paghiling ng iyong dokumento, mangyaring asahan ang humigit-kumulang 5 hanggang 15 minutong oras ng paghihintay.
            </p>
            
        </blockquote>
    <fieldset class="left_userpersonal_info">
																<div>
                                                                    <p>
                                                                    <strong>Published on:<em> February 1, 2022 (3 mins read) </em></strong>
                                                                    </p>
																	<label>Tagalog Translation - Sundin ang mga sumusunod, sa pag proseso ng dokumento</label>
																	<ol style="padding: 15px 15px 15px 15px">
																		<li>Siguraduhin na ang iyong impormasyon ay tugma.</li>
																		<li>Kuhanan ng litrato ang harap at likod ng iyong ID. Siguraduhin na ang iyong Scanned Photo ay malinaw at nababasa.</li>
																		<li>Lagyan ng pangalan ang iyong file. Halimbawa <strong style="color: red">DICARPIOLEONARDO - BarangayID.jpeg </strong></li>
																		<li>I-save ang iyong file sa <strong style="color: red">jpeg, png at jpg </strong> format.</li>
																		<li>Antayin ang abiso ng Barangay. Para sa iba pang katanungan bisitahin ang aming website <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
																	</ol>
																	<label>Listahan ng mga ipapasang dokumento para sa <a href="residentreqdocu.php#barangayid"> (Barangay ID, Certificate of Indigency, Barangay Clearance at Business Permit)</a></label>
																		<ol style="padding: 15px 15px 15px 15px">
																		<li>Valid ID (Likod at harap ng iyong ID)- Ito ay magsisilbing kumpirmasyon ng iyong pagkakakilanlan</li>
                                                                        <li>2 by 2 Picture para sa (Barangay ID at Barangay Clearance)</li>
																	</ol>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <a href="residentreqdocu.php">
                                                                        <p style="float: left;"><i class="bx bx-skip-previous"></i> Back</p>
                                                                    </a>
                                                                    <br>
																	</div>
                                                                    
																	<div>
                                                                    <br>
                                                                    <br>
																	<label>English Translation - Please follow the process of document</label>
																	<ol style="padding: 15px 15px 15px 15px">
																		<li>Make sure your information is accurate and precise. Do not submit expired IDs.</em></strong></li>
																		<li>Take a photo of your ID (Front and Back). Please make sure your Scanned Photo is clear and easy to read.</li>
																		<li>Put your name inline with your file. Example <strong style="color: red">DICARPIOLEONARDO - BarangayID.jpeg </strong>  </li>
																		<li>Save your file in <strong style="color: red">png, jpeg, and jpg </strong> format.</li>
																		<li>Please wait for the announcement of Barangay. For more inquiry visit our webpage. <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
																	</ol>
																	<label>List of documents to be submitted for <a href="residentreqdocu.php#barangayid"> (Barangay ID, Certificate of Indigency, Barangay Clearance and Business Permit)</a></label>
																		<ol style="padding: 15px 15px 15px 15px">
																		<li>Valid ID (Front and Back Portion of your ID)- This will serve as confirmation of your Identity</li>
                                                                        <li>2x2 Picture for Barangay ID and Barangay Clearance</li>
																	</ol>
                                                                    <br>
                                                                    <br>
                                                                    <a href="onlineblotter.php">
																	    <p style="float: right;">Online Blottering <i class="bx bx-skip-next"></i></p>
                                                                    </a>
                                                                    <br>
																	</div>
																
														</fieldset>
    </section>
    </div>
    <br>

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
   <!-- Accordion -->
  <script src="js/resident.js"></script>
  <script src="https://use.fontawesome.com/f7721642f4.js"></script>
</body>
</html>