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
			  <a class="side_bar" href="lupon.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			 <li>
			   <a class="side_bar" href="lupon_printdocs.php">
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
			
									
										<div id="indigency_file" style="display: auto; ">
    <br>
									<section class="barangay_indigency">
										<div style="padding-top: 15px; width: 965px;  height: 344px;">
											<div style="display: flex;">
												<img style="float: left; width: 130px; height: 125px; margin-left: 35px;" src="resident-img/Quezon_City1.png">
													<div style="margin-left: 120px;">
														<p class="center_description" style="font-size: 17px; padding-left: 75px;">REPUBLIKA NG PILIPINAS</p>
														<p class="center_description" style="font-size: 20px; font-weight: 600; padding-left: -25px; color: black;">TANGGAPAN NG PUNONG BARANGAY</p>
														<p class="center_description" style=" font-size: 17px; padding-left: 35px; padding-bottom: 15px; ">BARANGAY COMMONWEALTH</p>
														<p class="center_description" style="font-size: 17px; margin-left: 35px;margin-top: -15px;">DISTRITO II, LUNGSOD QUEZON</p>
														<p class="center_description" style="font-size: 20px; font-weight: 600; padding-left: -5px; color: black;">OFFICE OF THE LUPONG TAGAPAMAYAPA</p>
														
														
													</div>
												<img style=" display: flex; float: right; width: 130px; height: 145px; margin-left: 135px; " class="commonwealthlogo" src="resident-img/Brgy-Commonwealth_1.png">
												
											</div>
											<div>
										</div>
									

					  <div>
 
  <h6 class="employee-label"><input type="text" name=""> <label style="padding-left: 650px;"><b>Barangay Case No:</b><input style="width: 30%; padding-left: 15px;"></label></h6>
  <h6 class="employee-label"><label for="fname"><b>Complainant/s</b></label> <label style="padding-left: 625px;"><b>FOR:</b><input style="width: 50%; padding-left: 15px;"></label></h6>
<h6 class="employee-label"><b><p> Versus </p></b></h6>
  <h6 class="employee-label"><input type="text"><br></h6>
  <h6 class="employee-label"><label for="fname"><b>Respondent/s</b></label><br></h6>

  
</div> 

          <h5 class="w3-text-black" ><b><center> SUMMON </center></b></h5>
          
<div class="center_description">

           <center><p  style="word-spacing:10px;">You are hereby summoned to appear before me in person together with your <br>witnesses on the <input class="employee-label" style="width: 25%; padding-left: 15px;" type="text" width="auto" placeholder="Month"> day of <input class="employee-label" style="width: 10%; padding-left: 15px;" type="text" width="auto" placeholder="Day"> at <br><label class="employee-label"> about <input class="" style="width: 10%; padding-left: 15px;" type="text" id="full_name" name="full_name" width="auto" placeholder="Time"> then and there to answer to a complainant made before me, copy which is here to attached for mediation/concillation  on your disputes with the complainant.</br></p></center>
        
     <center>  <p class="employee-label"; style="word-spacing:10px;">You are hereby warned that your refusal or will full in obedience to this summons will entitle the complainant/s to proceed directly against you upon in court/government office where you may barred from filing any counterclaim arising said complainant.</p></center>

     <center><p> FAIL NOT or else face punishment as for contempt of court.</p></center>
     <br>
     <center><h6> This <input type="text"> day of <input type="text" name=""></h6></center>
     <h6 class="employee-label"> <b>CEFERINO "CRIS" C. CRISOSTOMO </b><label style="padding-left: 430px;"><b> MANUEL A. CO </b></label></h6>
     <h7 class="employee-label"> Barangay/Lupon Secretary<label style="padding-left: 430px;"> Punong Barangay/Lupon Chairman </label></h7>
	 <p><center>OFFICE'S RETURN</center></p>
    <h6 class="employee-label"> <label style="padding-left: 650px;"><b>Barangay Case No:</b><input style="width: 30%; padding-left: 15px;"></label></h6>
    <h6 class="employee-label"> <label style="padding-left: 740px;"><b>For:</b><input style="width: 30%; padding-left: 15px;"></label></h6>

    <center><p style="word-spacing: 10px;"> I serve this summons upon respondent's <input type="text" style="width: 20%;"> on the <br><br>
    <input type="text" style="width: 20%;"> day of <input type="text" style="width: 30%;"> <br><br> SCHEDULE OF HEARING<input type="text" style="width: 20%;">  </p></center>

    <h6 class="employee-label" ><input style="width: 20%;"><label style="padding-left: 440px;"></label><input type="text" width="30%; "><br><label class="employee-label"> Respondent/s </label><label style="padding-left: 530px;"> Complainant/s </label></h6>
    </div>
	
			
											<div>
												
												
													<div  style="position: inherit; margin-top: -1300px;">
														
														
														
													</div>
											</div>
						<break>
												
													
											
	</body>
</html>