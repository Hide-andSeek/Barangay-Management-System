<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
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
    <link rel="stylesheet" href="../css/styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Complaints Dashboard </title>
	 
	 
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

			 .employeemanagement-modal{
			display: none; 
			position: absolute; 
			z-index: 999; 
			left: 0;
			top: 0;
			width: 100%; 
			height: 120%; 
			background-color: rgb(0,0,0); 
			background-color: rgba(0,0,0,0.4); 
			padding-top: 5px; 
			
		}


		.modal-contentemployee {
			font-family: 'Montserrat', sans-serif;
			padding-top: 1%;
			background-color: #fefefe;
			margin: 5% auto 2% auto;
			border: 1px solid #888;
			height: 78%;
			width: 48%; 
		
		}

		.inputtext, .inputpass {
			font-family: 'Montserrat', sans-serif;
			font-size: 14px;
			height: 35px;
			width: 94%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		.employee-label{margin-left: 26px;}

		.submtbtn{
			height: 40px;
		}
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
			  <a class="side_bar" href="compAdmin_dashboard.php">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar" href="compAdmin_Lupon.php">
				 <i class='bx bx-user-circle'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar" href="compAdmin_BPSO.php">
				 <i class='bx bx-user'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin'></i>
				 <span class="links_name">BCPC</span>
			   </a>
			   <span class="tooltip">BCPC</span>
			 </li>
			  
			 <li>
			   <a class="side_bar" href="vawc_sms.php">
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
				   <img class="profile_pic" src="../img/1.jpeg">
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
						<h5>Dashboard
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			 <br> 
			 
	 <div>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
			<div class="w3-container w3-red w3-padding-16">
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
				<h4>LUPON</h4>
			</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-blue w3-padding-16">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
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
					<h4>BPSO</h4>
				</div>
			</div>

			<div class="w3-quarter">
				<div class="w3-container w3-teal w3-padding-16">
					<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
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
					<h4>VAWC</h4>
				</div>
			</div>
			<div class="w3-quarter">
				<div class="w3-container w3-orange w3-text-white w3-padding-16">
					<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
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
					<h4>BCPC</h4>
				</div>
			</div>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<h5>All Complaints</h5>
			<div class="reg_table">
						<table class="content-table table_indigency"  id="table">
						
							<?php
							include "../db/conn.php";
							include "../db/user.php";
							
							$mquery = "SELECT * FROM blotterdb";
							$countn = $db->query($mquery);
							
							?>

							<thead>
								<tr class="t_head">
									<th>Complaint ID</th>
									<th>Fullname</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Address</th>
									<th>Incident Address</th>
									<th>Name of violaters</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Relationship</th>
									<th>Address</th>
									<th>Witnesses</th>
									<th>Complaints</th>
									<th>Valid ID</th>
									<th>View Details</th>
									<th>Message</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data ['blotter_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_gender']; ?></td>
									<td><?php echo $data ['comp_address']; ?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['n_violator']; ?></td>
									<td><?php echo $data ['violator_age']; ?></td>
									<td><?php echo $data ['violator_gender']; ?></td>
									<td><?php echo $data ['relationship']; ?></td>
									<td><?php echo $data ['violator_address']; ?></td>
									<td><?php echo $data ['witnesses']; ?></td>
									<td><?php echo $data ['complaints']; ?></td>
									<td><a class="view_approvebtn">Valid Id</a></td>

									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('lupon').style.display='block'"><i class="bx bx-edit"></i>Edit</button></td>
									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
								</tr>	
							
								<div id="id2" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('id2').style.display='none'" class="topright">&times;</span>

														
														<div class="send-message">
																<div class="container">
																<div class="row">
																	<div class="col-md-8">
																	<div class="contact-form">
																	<div class="section-heading">
																		<h4>Send a Message</h4>
																	</div>
																		<form id="contact" action="" method="post">
																		<div class="row">
																			<div class="col-lg-12 col-md-12 col-sm-12">
																			<fieldset class="sms-section">
																				<input required type="number" class="form-control textarea" id="contact_no"
																				name="contact_no"placeholder="Contact no.">
																			</fieldset>
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<textarea name="msg" class="form-control textarea" id="message" placeholder="Text Message">Hello good evening < Name >, we received your Barangay ID Request. You are now in Step 2, wait for the confirmation of Barangay. Please be guided accordingly! Thank you 
																				-From Barangay Commonwealth</textarea>
																				<small id="messageHelp" class="form-text text-muted">160 characters remaining.</small>
																				
																			</fieldset>
																			
																			</div>
																			<div class="col-lg-12">
																			<fieldset >
																				<button type="submit" name="sendSms" id="form-submit" class="filled-button"><i class="bx bx-send"></i>Send Message</button>
																			</fieldset>
																			</div>
																		</div>
																		</form>
																	</div>
																	</div>
																</div>
																</div>
															</div>
															</div> 	
														</form>
												</div>
											</div>

											<div id="lupon" class="employeemanagement-modal modal" >
													<div class="modal-contentemployee animate" >
														<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
														<span onclick="document.getElementById('lupon').style.display='none'" class="topright">&times;</span>

														
		
														</form>
												</div>
											</div>
							
							<?php
							}
							?>
						</table>
				</div>
		</div>
	</div>
				
			</section>
	</body>
</html>