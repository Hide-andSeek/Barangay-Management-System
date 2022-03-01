<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require 'db/conn.php';
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
			  <a class="side_bar" href="     ">
				  <i class='bx bx-grid-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  <li>
			   <a class="side_bar" href="lupon_tagapamayapa.php">
				 <i class='fas fa-user-clock'></i>
				 <span class="links_name">Tagapamayapa</span>
			   </a>
			   <span class="tooltip">Tagapamayapa</span>
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
			  <section class="top-section">
				  <div class="top-content">
					<div>
						<h5>OFFICE OF THE LUPONG TAGAPAMAYAPA
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			    <br>
				
			  <div>
			
<div>
		<div class="w3-row-padding w3-margin-bottom">
			<div class="w3-quarter">
			<div class="w3-container w3-red w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';

					$query = "SELECT CaseId FROM hearing ORDER BY CaseId";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
					<a href= "lupon_ongoing.php">
				</div>
				
				<div class="w3-clear"></div>
				<h4>Upcoming Hearing</h4>
				
			</div>
			</div>
			<div class="w3-quarter">
			<div class="w3-container w3-orange w3-text-white w3-padding-16">
				<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';
 
					$query = "SELECT CaseNo FROM lupondb ORDER BY CaseNo";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
<a href= "lupon_active.php">				
				</div>
				<div class="w3-clear"></div>
				<h4>Active</h4>
			</div>
			</div>
			
			<div class="w3-quarter">
			<div class="w3-container w3-blue w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';

					$query = "SELECT CaseId FROM settled ORDER BY CaseId";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
		          <a href= "lupon_settled.php">
				 </div>
				<div class="w3-clear"></div>
				<h4>Settled</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';
 
					$query = "SELECT CaseId FROM mediation ORDER BY CaseId";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				<a href= "lupon_mediation.php">
				</div>
				<div class="w3-clear"></div>
				<h4>Mediation</h4>
			</div>
			</div>
		</div>
	</div>


	

	<div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
						include "db/conn.php";
	                    include "db/user.php";
							
						$mquery = "SELECT * FROM lupondb";
						$countemployee = $db->query($mquery)
						?>

							<thead>
								<tr class="t_head">
									<th>Case No.</th>
									<th>Complainant</th>
									<th>Accussed</th>
									<th>Address</th>
									<th>Time And Date:</th>
									<th>Contact No.</th>
									<th>Complaints:</th>
									<th>Status</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['CaseNo']; ?></td>
									<td><?php echo $data ['Complainant']; ?></td>
									<td><?php echo $data ['Accussed']; ?></td>
									<td><?php echo $data ['Address']; ?></td>
									<td><?php echo $data ['DateandTime']; ?></td>
									<td><?php echo $data ['ContactNo']; ?></td>
									<td><?php echo $data ['Complaint']; ?></td>
									<td>Active</td>
									<td>
										<button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;"><i class="fa fa-check-circle"></i>Done</button>
										<button class="form-control btn-danger" style="font-size: 13px; width: 100px;"><i class="fa fa-ban"></i>Deny</button>
									</td>	
								</tr>
							
							<?php
							}
							?>
						</table>

				
					
	
			
			</section>
	</body>
</html>			
					
					