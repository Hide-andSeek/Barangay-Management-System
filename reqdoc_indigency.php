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
include "db/reqdocument.php";
include "db/documents.php";
include "db/user.php";

$f = "resources/indigency_visit.php";
if(!file_exists($f)){
	touch($f);
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,0) ;
	fclose ($handle);
}
?>
<?php
	$visitt = '';

	$handle = fopen($f, "r");
	$counter = ( int ) fread ($handle,20) ;
	fclose ($handle) ;
					
	if(!isset($_POST["indigencybtn"])){
	$counter++ ;
	}
					
	$visitt = "<label style='color: gray; font-size: 13px; opacity: 0.6'><em>Viewed: ".$counter." times </em></label>";
	$handle =  fopen($f, "w" ) ;
	fwrite($handle,$counter) ;
	fclose ($handle) ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Certificate of Indigency</title>

    <!-- Bootstrap Core CSS -->

    <link href="resident-css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="resident-css/style.css">
	<link rel="stylesheet" href="qr_code/css.css">
	
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

		

		.detailid{font-size: 11px;  color: black; font-weight: 600}
		.form-text-desc{font-size: 14px;margin: 3px 3px; color:black;}

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
		.button {
		display: absolute;
		border-radius: 4px;
		background-color: #008CBA;
		border: none;
		color: #FFFFFF;
		width: 90%;
		transition: all 0.5s;
		cursor: pointer;
		}

		.button span {
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
		}

		.button span:after {
		content: '\2714';
		position: absolute;
		opacity: 0;
		top: 0;
		right: -20px;
		transition: 0.5s;
		}

		.button:hover span {
		padding-right: 25px;
		}

		.button:hover span:after {
		opacity: 1;
		right: 0;
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
		.linkpath:hover{color: orange;}
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
						<li class="logdropdown">
                            <a class="page-scroll logout" href="javascript:void(0)">Services</a>
                            <span class="logdropdown-content">
							  <a class="page-scroll" href="reqdoc_barangayid.php">Barangay ID</a>
							  <a class="page-scroll" href="reqdoc_bpermit.php">Business Permit</a>
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
								<a class="page-scroll" href="resident_logout.php"><i class="bx bx-log-out"></i> Logout</a>
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
        <h2>Certificate of Indigency</h2>
        <p>
			<a href="resident-defaultpage.php">Home </a>>> <a href="reqdoc_barangayid.php">Barangay ID</a> >> <a href="reqdoc_bpermit.php">Business Permit</a>>> <a href="reqdoc_indigency.php"><strong>Certificate of Indigency</strong></a>
		</p>
		<div>
		<a href="reqdoc_bpermit.php">
            <p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i> <strong> Business Permit </strong></p>
    	</a>
        <a href="reqdoc_clearance.php">
			<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Barangay Clearance </strong><i class="bx bx-skip-next"></i></p>
        </a>
		<br>
        <br>
		</div>
		<?php echo isset($error['add_brgyindigency']) ? $error['add_brgyindigency'] : '';?>
        <blockquote class="blockqoute-color">
            <p class="reminder"><label class="reminder-heading">Reminder/ Tagubilin: </label> Upon requesting your document, please expect around 5 to 15 minutes waiting time. Sa paghiling ng iyong dokumento, asahan ang humigit-kumulang 5 hanggang 15 minutong oras ng paghihintay. Punan ang impormasyon sa ibaba. Ang iyong impormasyon ay lalabas sa dokumento na iyong hinihiling. Pakisuri muna bago ito isumite. Upang maiwasan ang typographical error (misspelled names).</p> <?php echo $visitt ;?>
        </blockquote>
    <fieldset class="left_userpersonal_info">
																<div>
																	<label>Tagalog Translation - Sundin ang mga sumusunod, sa pag proseso ng dokumento</label>
																	<ol style="padding: 15px 15px 15px 15px">
																		<li>Siguraduhin na ang iyong impormasyon ay tugma. Huwag magsumite ng mga expired na ID.</li>
																		<li>Kuhanan ng litrato ang harap at likod ng iyong ID. Siguraduhin na ang iyong Scanned Photo ay malinaw at nababasa. </li>
																		<!-- <li>Lagyan ng pangalan ang iyong file. Halimbawa <strong style="color: black">DICARPIOLEONARDO - BarangayID.docx </strong></li> -->
																		<li>I-save ang iyong file sa <strong style="color: black">docx </strong> format.</li>
																		<li>Antayin ang abiso ng Barangay. Para sa iba pang katanungan bisitahin ang aming website <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
																	</ol>
																	<label>Listahan ng mga ipapasang dokumento <a href="reqdoc_barangayid.php#barangayid"> (Barangay ID)</a></label>
																		<ol style="padding: 15px 15px 15px 15px">
																		<li>Valid ID (Likod at harap ng iyong ID)- Ito ay magsisilbing kumpirmasyon ng iyong pagkakakilanlan</li>
																		<li>Larawan: 2x2 ID Picture (Nakunan sa loob ng nakalipas na taon) </li>
																	</ol>
                                                                    <br>
                                                                    
                                                                   
																	</div>
                                                                    
																	<div>
																	<label>English Translation - Please follow the process of document</label>
																	<ol style="padding: 15px 15px 15px 15px">
																		<li>Make sure your information is accurate and precise. Do not submit expired IDs.</em></strong></li>
																		<li>Take a photo of your ID (Front and Back). Please make sure your Scanned Photo is clear and easy to read.</li>
																		<!-- <li>Put your name inline with your file. Example <strong style="color: black">DICARPIOLEONARDO - BarangayID.docx </strong>  </li> -->
																		<li>Save your file in <strong style="color: black">docx</strong> format.</li>
																		<li>Please wait for the announcement of Barangay. For more inquiry visit our webpage. <a style="cursor: pointer;" href="residentcontactus.php" target="_blank">see more</a></li>
																	</ol>
																	<label>List of documents to be submitted  <a href="reqdoc_barangayid.php#barangayid"> (Barangay ID)</a></label>
																		<ol style="padding: 15px 15px 15px 15px">
																		<li>Valid ID (Front and Back Portion of your ID)- This will serve as confirmation of your Identity</li>
																		<li>Photo: 2x2 ID Picture (Taken within the a year ago) </li>
																	</ol>
                                                                    <!-- <a href="">
																	    <p style="float: right;">Online Blottering <i class="bx bx-skip-next"></i></p>
                                                                    </a> -->
																	
														</fieldset>
														<br>
														<br>
												<form method="POST" enctype="multipart/form-data" action="">
                                                            <hr>
															    <h5 style="text-align: center;" id="barangayid">Personal Information</h5>
														    <hr>
															<div class="left_userpersonal_info left_userpersonal_info1">
																
                                                            <div class="form-group">
																	<label for="fullname">Full Name: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="fullname" name="fullname" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" placeholder="Please write your Full name">
																	<?php echo isset($error['fullname']) ? $error['fullname'] : '';?>
																</div><br>
																
																 <div class="form-group">
																	<label for="address">Address: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="address" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" name="address" placeholder="#Blk No. Street City/Town">
																	<?php echo isset($error['address']) ? $error['address'] : '';?>
																</div></br>
												
																 <div class="form-group">
																	<label for="purpose">Purpose: <i class="red">*</i></label>
																	<input type="text" class="form-control form-text" id="purpose" name="purpose" placeholder="Ex. Scholarship Requirement" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" >
																	<?php echo isset($error['purpose']) ? $error['purpose'] : '';?>
																</div></br>

																<div class="form-group">
																	<label for="contactno">Contact No.: <i class="red">*</i></label>
																	<input type="number" class="form-control number form-text" id="contactnum" name="contactnum" onKeyPress="if(this.value.length==11) return false;" placeholder="Ex. 09123456789">
																	<?php echo isset($error['contactnum']) ? $error['contactnum'] : '';?>
																</div><br>	
															</div>	
															<div class="left_userpersonal_info left_userpersonal_info1">

                                                            <div class="form-group">
																	<label>Email Address: <i class="red">*</i></label>
																	<input type="email" class="form-control form-text form-text-desc" id="emailaddress" name="emailaddress" placeholder="example@gmail.com">
																	<?php echo isset($error['emailaddress']) ? $error['emailaddress'] : '';?>
																</div><br>

																

																<div class="form-group">
																	<label for="date_issue">Date Requested: <i class="red">*</i></label>
																	<input type="date" class="form-control form-text" id="date_issued" name="date_issue">
																	<?php echo isset($error['date_issue']) ? $error['date_issue'] : '';?>
																</div><br>

																<div class="form-group">
																	<label for="file">Attach Document <i class="red">*</i></label>
																	<input type='file' name='indigencyid_image' class="form-control form-text" aria-details="indigencyid_image"/>
																	
                                                                    <i aria-details="indigencyid_image" class="detailid"><label> please attach the right format (.docx) <?php echo isset($error['indigencyid_image']) ? $error['indigencyid_image'] : '';?></label></i>
																</div>

																<div class="form-group">
																	<label>Document type, please choose<i class="red">*</i></label>
																	<select class="form-control" name="indigencyfilechoice" aria-details="indigencyfilechoice">
																		<option disabled>--Select--</option>
																		<option value="Hardcopy">Hardcopy</option>
																		<option value="Softcopy">Softcopy</option>
																		<option value="Both">Both</option>
																	</select>
                                                                    <i aria-details="indigencyfilechoice" class="detailid"><label> What type of document you want to receive?</label></i>
																</div><br>
															</div>
													<br>
													<br>
													<div style="display: flex; justify-content: center; align-items: center;">
														<button class="button form-control" name="indigencybtn"><span>Submit </span>
													</button>
													</div>
												</div>
											</div>
                                            <br>
                                            <br>
											
                                            <a href="reqdoc_bpermit.php">
                                                <p class="linkpath" style="float: left; margin-left: 20px;"><i class="bx bx-skip-previous"></i><strong> Business Permit</strong></p>
                                            </a>
                                            <a href="reqdoc_clearance.php">
												<p class="linkpath" style="float: right; margin-right: 20px;"><strong> Barangay Clearance </strong><i class="bx bx-skip-next"></i></p>
                                            </a>
                                            <br>
                                            <br>
                                            <br>
							</form>
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
	<script src="resident-js/barangay.js"></script>
	<script src="https://use.fontawesome.com/f7721642f4.js"></script>
	<script>
		document.querySelector("#date_issued").valueAsDate = new Date();
	</script>
</body>
</html>