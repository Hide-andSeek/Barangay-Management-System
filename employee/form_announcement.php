<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Announcement </title>
	 
   </head>
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
			  <a class="side_bar" href="employee/dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  <li>
				<a class="side_bar" href="employee/requestdocument.php">
				   <i class='bx bxs-user-detail reqdoc'></i>
				  <span class="links_name">Request Documents</span>
				</a>
				 <span class="tooltip">Request Documents</span>
			  </li>
			 
			 <li>
			   <a class="side_bar" href="employee/sms.php">
				 <i class='bx bx-message-rounded-detail sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
			 </li>
			 
			  <li>
				<a class="side_bar" href="employee/blotter.php">
				   <i class='bx bxs-bell-ring blotter-com'></i>
				  <span class="links_name">Blotter/Complain</span>
				</a>
				 <span class="tooltip">Blotter/Complain</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="employee/announcement.php">
				   <i class='bx bxs-megaphone announcement'></i>
				  <span class="links_name">Announcement<span>
				</a>
				 <span class="tooltip">Announcement</span>
			  </li>
			 
															
																						<!--Setting Section-->
			 <li>
			   <a class="side_bar" href="employee/settings.php">
				 <i class='bx bx-cog' ></i>
				 <span class="links_name">Setting</span>
			   </a>
			   <span class="tooltip">Setting</span>
			 </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
					 <div class="name" id="">Admin name</div>
					 <div class="job" id="">Administrator</div>
				   </div>
				 </div>
				 <a href="employee/employee-login.php">
					<i class='bx bx-log-out d_log_out' id="log_out" ></i>
				 </a>
			 </li>
			</ul>
		  </div>
		  
																						<!-- Middle Section -->
		  <section class="home-section">
																						<!-- Top Section -->
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>Announcement
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			</section>
			<script href="test.js"></script>
	</body>
</html>