<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require 'db/conn.php';
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
	$dept = '';

	if(isset($_SESSION['type'])){
		$dept = $_SESSION['type'];
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">

	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Lupon Dashboard </title>
	 
	 
	 <style>
		
	 </style>
   </head>
   <style>
	   html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
div.a{
  text-align: justify;
}

html,
	body,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: "Roboto", sans-serif
	}

	div.a {
		text-align: justify;
	}

	.modal {
		display: none;
		position: absolute;
		z-index: 9999;
		padding-top: 50px;
		/* Location of the box */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.6);
		/* Black w/ opacity */
	}

	/* Modal Content (image) */
	.modal-content {
		display: absolute;
		margin: auto;
		max-width: 700px;
		width: 60%;
	}


	/* Add Animation */
	.modal-content,
	#caption {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {
			-webkit-transform: scale(0)
		}

		to {
			-webkit-transform: scale(1)
		}
	}

	@keyframes zoom {
		from {
			transform: scale(0)
		}

		to {
			transform: scale(1)
		}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 25px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	.emailwidth {
		width: 95%;
	}

	.main-content {
		display: flex;
	}

	.main-content-email {
		padding: 20px;
	}

	span.topright {
		text-align: right;
		padding: 8px 24px;
		font-size: 25px;
	}

	.topright:hover {
		color: red;
		cursor: pointer;
		float: right;
		padding: 8px 24px;
	}
	   </style>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="lupon_mediation.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			 <li>
			   <a class="side_bar" href="lupon_printdocs2.php">
				 <i class='fa fa-print'></i>
				 <span class="links_name">Print Document</span>
			   </a>
			   <span class="tooltip">Print Document</span>
			 </li>
			   

			<!--Setting Section-->
			 <li>
			   <a class="side_bar" href="settings.php">
				 <i class='bx bx-cog' ></i>
				 <span class="links_name">Setting</span>
			   </a>
			   <span class="tooltip">Setting</span>
			 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id=""><?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="emplogout.php">
					<i class='bx bx-log-out d_log_out' id="log_out" ></i>
				 </a>
			 </li>
			</ul>
		  </div>
		  <!-- Middle Section -->
		  <section class="home-section">
			<!-- Top Section -->
			<div style="float: right;">
			<button style="background: none; padding: 0;" onclick="document.getElementById('eemail').style.display='block'">
				<img src="img/gmail.png" title="Send a message" class="hoverback" style="margin-left: 10px; width: 40px; height: 40px; cursor: pointer;" alt="Gmail">
			</button>
		</div>
		<br>
		<br>

		<!--Modal form for Login-->
		<div id="formatValidatorName">
			<div id="eemail" class="modal">
				<div class="modal-content animate">
					<span onclick="document.getElementById('eemail').style.display='none'" class="topright">&times;</span>,
					<form method="POST" action="" class="body" enctype="multipart/form-data">
						<div class="main-content-email">

							<div class="main-content main-content1">
								<div class="information col">
									<p> Fullname: </p>
									<input class="form-control emailwidth" id="fullname" name="fullname"  type="text" placeholder="Enter Fullname">
								</div>

								<div class="information col">
									<p> To: </p>
									<input required class="form-control emailwidth" id="email" name="email" style="width:100%"  type="text" placeholder="Enter Email Address">
								</div>
							</div>
							<div class="main-content">
								<div class="information col">
									<p>Subject: </p>
									<input required class="form-control" style="width: 100%" id="subject" name="subject" type="text" placeholder="Subject">
								</div>


								<div class="information col">
                                    <p>Attachment: </p>
                                    <input class="form-control emailwidth" style="background: white;" id="fileattach" name="fileattach" type="file" value=""> 
                                </div>
							</div>

							<div class="information col">
								<p>Body: </p>
								<textarea name="message" id="message" class="form-control inputtext" rows="32" placeholder="Your message">sample sample sample</textarea>
								<script type="text/javascript" src="announcement_css/js/ckeditor/ckeditor.js"></script>
								<script type="text/javascript">
									CKEDITOR.replace('message');
								</script>
							</div>

							<input class="form-control" style="width: 100%" id="gmail" name="gmail" type="hidden" value="sent" placeholder="gmail">

							<input class="form-control" style="width: 100%" id="admincomp_id" name="admincomp_id" type="hidden" value="<?php echo $data['admincomp_id']; ?>" placeholder="gmail">

							<div class="sendi">
								<button name="luponsendemail" class="form-control viewbtn" style="margin-top: 10px; width: 100%; cursor: pointer;"><span class="glyphicon glyphicon-envelope"></span> Send <i class="bx bx-send"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
									
			<div align= "center" style= "background-color: black;width:100%; height:660px;">
<embed style= "width: 80%; height: 100%" src = "upload/SINUMPAANG SALAYSAY.pdf" type="application/pdf"></embed>
</div>
												
													
											
	</body>
</html>