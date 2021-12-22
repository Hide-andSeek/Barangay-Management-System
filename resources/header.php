
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

     <title> Sample- <?php echo $title ?></title>
	 
	 
	 <style>
	 
	
	 </style>
   </head>
	<body>
																							<!-- Side Navigation Bar-->
		  <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu' id="btn" style="color: white" ></i>
			</div>
			<ul class="nav-list">
			  <li>
			  <a class="side_bar" href="dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			   <li>
				<a class="side_bar" href="gmail.php">
				  <i class='bx bxs-user-account' style="color: #a809b0"></i>
				  <span class="links_name">Resident Accounts</span>
				</a>
				 <span class="tooltip">Resident Accounts</span>
			  </li>
			  <li>
				<a class="side_bar" href="requestdocument.php">
				   <i class='bx bxs-user-detail' style="color: #1cb009"></i>
				  <span class="links_name">Request Documents</span>
				</a>
				 <span class="tooltip">Request Documents</span>
			  </li>
			 
			 <li>
			   <a class="side_bar" href="sms.php">
				 <i class='bx bx-message-rounded-detail' style="color: #478eff" ></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
			 </li>
			 
			  <li>
				<a class="side_bar" href="blotter.php">
				   <i class='bx bxs-bell-ring' style="color: #9e0202" ></i>
				  <span class="links_name">Blotter/Complain</span>
				</a>
				 <span class="tooltip">Blotter/Complain</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="announcement.php">
				   <i class='bx bxs-megaphone' style="color: #0218bd" ></i>
				  <span class="links_name">Announcement<span>
				</a>
				 <span class="tooltip">Announcement</span>
			  </li>
			 
			 
			 <!--
			Gawin natin to pag natapos na yung ibang forms.
			May isa tayo form na kung saan siya yung mag m-momonitor kung 
			sino yung nag facilitate ng documents. Parang history ganun. 
			Nakainclude kung anong oras nag login, yung activity na ginawa
			ni admin.
			 
			  <li>
			   <a class="side_bar" href="logs.php">
				 <i class='bx bx-copy-alt' ></i>
				 <span class="links_name">Logs</span>
			   </a>
			   <span class="tooltip">Logs</span>
			 </li>
			 -->
															
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
					 <div class="name" id="">Admin name</div>
					 <div class="job" id="">Administrator</div>
				   </div>
				 </div>
				 <a href="admin-default-page.php">
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
						<h5>Dashboard
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