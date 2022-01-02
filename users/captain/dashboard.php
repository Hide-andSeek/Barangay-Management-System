
<?php session_start();
if(!isset($_SESSION["official_name"])){
	header("location: users/captain/dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn
	.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Employee Management </title>
	 
   </head>
	<body>																
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar" href="captaindashboard.php">
						<i class='bx bx-category-alt'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

			  <li>
			  <a class="side_bar" href="adminmanagement.php">
				  <i class='bx bx-user-circle'></i>
				  <span class="links_name">Admin Management</span>
				</a>
				 <span class="tooltip">Admin Management</span>
			  </li>	

				<li>
				  <a class="side_bar" href="employeemanagement.php">
					  <i class='bx bx-group'></i>
					  <span class="links_name">Employee Management</span>
					</a>
					 <span class="tooltip">Employee Management</span>
				  </li>	
				  
				  <li>
				 <a class="side_bar" href="brgyofficialsmanagement.php">
					  <i class='bx bxs-user-detail'></i>
					  <span class="links_name">Brgy Official Management</span>
					</a>
					 <span class="tooltip">Brgy Official Management</span>
				</li>

				<li>
				 <a class="side_bar" href="residentcensus.php">
					  <i class='bx bxs-user-detail'></i>
					  <span class="links_name">Resident Census</span>
					</a>
					 <span class="tooltip">Resident Census</span>
				</li>

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
				    
					 <div>Employee</div>
					 <div class="job" id="">Employee</div>
				   </div>
				 </div>
				 <a href="captainlogout.php">
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
	</body>
</html>