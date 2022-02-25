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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/captain.css">
	
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> BPSO Dashboard </title>
	 
	 
	 <style>
		div.align-box{padding-top: 23px; display: flex; align-item: center;}
		.box-report{
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;

		}
		
		 i.menu{color: #fff}
			 i.id{color: #a809b0}
			 i.clearance{color: #1cb009}
			 i.sms{color: #478eff}
			 i.blotter-com{color: #9e0202}
			 i.indigency{color: #0218bd}
			 i.permit{color: #e0149c}
	 </style>
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
			  <a class="side_bar" href="bpso.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>

              <li>
			   <a class="side_bar" href="bpso_violators.php">
				 <i class='bx bx-error'></i>
				 <span class="links_name">Violations</span>
			   </a>
			   <span class="tooltip">Violations</span>
			 </li>
			 <li>
			   <a class="side_bar" href="bpso_patrols.php">
				 <i class='bx bx-walk'></i>
				 <span class="links_name">Night Patrol</span>
			   </a>
			   <span class="tooltip">Night Patrol</span>
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
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>NIGHT PATROL (RONDA'S)
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>

			  <div class="w3-container">
			
<button onclick="myFunction('Demo1')" class="w3-button w3-block w3-black w3-left-align">Patrol Duties</button>
<div id="Demo1" class="w3-hide w3-animate-zoom">
  <a href="#" class="w3-button w3-block w3-left-align">Monday</a>
  <a href="#" class="w3-button w3-block w3-left-align">Tuesday</a>
  <a href="#" class="w3-button w3-block w3-left-align">Wednesday</a>
  <a href="#" class="w3-button w3-block w3-left-align">Thursday</a>
  <a href="#" class="w3-button w3-block w3-left-align">Friday</a>
  <a href="#" class="w3-button w3-block w3-left-align">Saturday</a>
  </div>
</div>

<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>



			  <fieldset>
	<legend>SCHEDULE LIST</legend>
			<div class="w3-quarter w3padd ">
				<a href="includes/compAdmin_dashboard.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>MONDAY</h3>
						</div>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd ">
				<a href="bpso.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>TUESDAY</h3>
						</div>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd ">
				<a href="includes/dashboard.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>WEDNESDAY</h3>
						</div>
					</div>
				</a>
			</div>

			<div class="w3-quarter w3padd">
				<a href="includes/compAdmin_dashboard.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>THURSDAY</h3>
						</div>
					</div>
				</a>
			</div>
		

			<div class="w3-quarter">
				<a href="">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>FRIDAY</h3>
						</div>
					</div>
				</a>
			</div>

			<div class="w3-quarter">
				<a href="includes/vawcdashboard.php">
					<div class="w3-container w3bord w3back w3point w3borderbot">
						<div class="w3-left"><i class="bx bx-building-house fa-fw w3-xxxlarge" style="color: yellow;"></i></div>
						<div class="w3-right">
							<h3>SATURDAY</h3>
						</div>
					</div>
				</a>
			</div>
		</fieldset>



			  
				
					
					
			
		
			
			</section>
	</body>
</html>