<?php session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
?>

<?php
	$user = '';

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
?>

<?php
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/the
	mes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="../css/styles.css">

	<!--Customize-->

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Dashboard:  Request Document </title>
	 
	 
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
		 i.ikon{color: red;}

		.w3borderbot{ border-bottom-left-radius: 15px;  border-bottom-right-radius: 15px; margin-bottom: 20px;}
	 </style>
   </head>
	<body>
		<!-- Side Navigation Bar-->
		   <div class="sidebar">
			<div class="logo-details">
			    <img class="brgy_icon" src="../img/Brgy-Commonwealth.png" alt=""/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
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
				<a class="side_bar" href="barangayid.php">
				   <i class='bx bx-id-card id'></i>
				  <span class="links_name">Barangay ID</span>
				</a>
				 <span class="tooltip">Barangay ID</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="barangayclearance.php">
				   <i class='bx bx-receipt clearance'></i>
				  <span class="links_name">Barangay Clearance</span>
				</a>
				 <span class="tooltip">Barangay Clearance</span>
			  </li>
			  
			  <li>
				<a class="side_bar" href="certificateofindigency.php">
				   <i class='bx bx-file indigency'></i>
				  <span class="links_name">Certificate of Indigency</span>
				</a>
				 <span class="tooltip">Certificate of Indigency</span>
			  </li>			  
			  
			  <li>
				<a class="side_bar" href="businesspermit.php">
				   <i class='bx bx-news permit'></i>
				  <span class="links_name">Business Permit</span>
				</a>
				 <span class="tooltip">Business Permit</span>
			  </li>
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
				   </div>
				 </div>
				 <a href="../emplogout.php">
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
						<h5>Document Request Dashboard
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>

			  			
	<div>
			<div  style="margin-left: 15px;font-size:14px;">
				<h4> Pending Request </h4>
			</div>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter ">
				<div class="w3-container w3-teal w3-padding-16 w3borderbot">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
					<div class="w3-right">
					<?php 
						require '../db/conn.php';
						$query = "SELECT resident_id FROM accreg_resident ORDER BY resident_id";
						$query_run = $db->query($query);
						$pdoexecute = $query_run->rowCount();

						echo "<h3>$pdoexecute</h3>"
						?>
					</div>
					<div class="w3-clear"></div>
					<h4>Total of Residents</h4>
				</div>
			</div>
		
			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';

					$query = "SELECT barangay_id FROM barangayid ORDER BY barangay_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
		
				</div>
				<div class="w3-clear"></div>
				<h4>Barangay ID (Request)</h4>
			</div>
			</div>
	
			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Certificate of Indigency</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-text-white w3-padding-16 w3borderbot">
				<div class="w3-left"><i class="bx bxs-bell-ring w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT clearance_id FROM barangayclearance ORDER BY clearance_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
				?>
				</div>
				<div class="w3-clear"></div>
				<h4>Barangay Clearance</h4>
			</div>
			</div>
		</div>
			<span style="text-align: center;">
				<h3>Welcome to Document Request Department! <?php echo $user;?></h3>
			</span>

		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16" w3borderbot>
				<div class="w3-left"><i class="bx bx-checkbox-checked fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Barangay ID</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-text-white w3-padding-16">
				<div class="w3-left"><i class="bx bx-checkbox-checked w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT clearance_id FROM barangayclearance ORDER BY clearance_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Clearance</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="bx bx-checkbox-checked fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
					$query = "SELECT resident_id FROM accreg_resident ORDER BY resident_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Indigency</h4>
			</div>
			</div>
			<div class="w3-quarter">
			<div class="w3-container w3-red w3-text-white w3-padding-16">
				<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require '../db/conn.php';
 
					$query = "SELECT clearance_id FROM barangayclearance ORDER BY clearance_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Approved Clearance</h4>
			</div>
			</div>

	</div>		
			</section>
			<script href="test.js"></script>
	</body>
</html>