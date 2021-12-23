<?php session_start();
if(!isset($_SESSION["employee_no"])){
	header("location: form_barangayclearance.php");
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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Barangay Clearance </title>
	 
	 
	 <style>
	.preview{font-size:13px; padding-left:50px; inline-block: none;}
		.previewbtn{width: 350px; height: 90px; margin: 25px; width: calc(100% - 125px); transition: all 0.5s ease; } 
		.preview_txtbx{width: 350px; margin-bottom: 15px;}
		
		.respersonal_inf{border-radius: 5px; user-select:none; background:#b5f5c6; padding: 50px 50px 50px 50px}
		.personal_inf{padding-bottom: 5px;}
		.viewdetail{user-select: auto}
		
		.w3-section{margin-top:16px!important;margin-bottom:16px!important}
		.w3-light-grey,.w3-hover-light-grey:hover{color:#000!important;background-color:#f1f1f1!important}
		
		.w3-button:hover{color:#000!important;background-color:#ccc!important; width:100%;}
		.w3-block{display:block;width:100%}
		.w3-hide{display:none!important}
		.w3-show{display:block!important}
		 p.content{width: 450px; height: 300px;}
		 
		 
		 
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
			  
			 <li>
			   <a class="side_bar" href="sms.php">
				 <i class='bx bx-mail-send sms'></i>
				 <span class="links_name">SMS</span>
			   </a>
			   <span class="tooltip">SMS</span>
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
					 <div><?php echo $_SESSION["employee_no"];?></div>
					 <div class="job" id="">Employee</div>
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
						<h5>Barangay Clearance
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			  <div class="reg_table">
						<table class="content-table"  id="table">
						
							<?php
							include "db/conn.php";
							include "db/users.php";
							
							$miquery = "SELECT * FROM businesspermit";
							$countnu = $db->query($miquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Date</th>
									<th>Selection</th>
									<th>Owner's name</th>
									<th>Business Name</th>
									<th>Business Address</th>
									<th>Contact no</th>
								</tr>                       
							</thead>
							<?php
							foreach($countnu as $data1) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data1 ['dateissued']; ?></td>
									<td><?php echo $data1 ['selection']; ?></td>
									<td><?php echo $data1 ['ownername']; ?></td>
									<td><?php echo $data1 ['businessname']; ?></td>
									<td><?php echo $data1 ['businessaddress']; ?></td>
									<td><?php echo $data1 ['contact']; ?></td>
								</tr>	
							<?php
							}
							?>
						</table>
							<!--
								<input type="button" id="tst" value="ok" onclick="fnselect()"/>
						     -->
						</div>
			</section>
	</body>
</html>