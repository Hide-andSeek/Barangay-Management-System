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
			  <a class="side_bar" href="     ">
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
						<h5>BARANGAY PUBLIC SAFETY OFFICER (BPSO)
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
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';

					$query = "SELECT resident_id FROM accreg_resident ORDER BY resident_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					
					?>
				</div>
				<div class="w3-clear"></div>
				<h4>Active</h4>
			</div>
			</div>

			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-padding-16">
				<div class="w3-left"><i class="fa fa-users fa-fw w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';

					$query = "SELECT barangay_id FROM barangayid ORDER BY barangay_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
		
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
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Not Settled</h4>
			</div>
			</div>
			<div class="w3-quarter">
			<div class="w3-container w3-teal w3-text-white w3-padding-16">
				<div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
				<div class="w3-right">
				<?php 
					require 'db/conn.php';
 
					$query = "SELECT indigency_id FROM certificateindigency ORDER BY indigency_id";
					$query_run = $db->query($query);
					$pdoexecute = $query_run->rowCount();

					echo "<h3>$pdoexecute</h3>"
					?>
				
				</div>
				<div class="w3-clear"></div>
				<h4>Overall Cases</h4>
			</div>
			</div>
		</div>
	</div>


	<div class="reg_table emp_tbl">
						<table class="content-table">
						
						<?php
						include "db/conn.php";
	                    include "db/user.php";
							
						$mquery = "SELECT * FROM admin_complaints";
						$countemployee = $db->query($mquery)
						?>

							<thead>
								<tr class="t_head">
									<th>Case No.</th>
									<th>Complainant</th>
									<th>Age</th>
									<th>Address</th>
									<th>Incident Address</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Violator</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Witnesses</th>
                                    <th>Complaints</th>
									<th>Department</th>
                                    <th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countemployee as $data) 
							{
							?>
							<tr class="table-row">
									<td><?php echo $data ['admincomp_id']; ?></td>
									<td><?php echo $data ['n_complainant']; ?></td>
									<td><?php echo $data ['comp_age']; ?></td>
									<td><?php echo $data ['comp_address']; ?></td>
									<td><?php echo $data ['inci_address']; ?></td>
									<td><?php echo $data ['contactno']; ?></td>
                                    <td><?php echo $data ['bemailadd']; ?></td>
                                    <td><?php echo $data ['n_violator']; ?></td>
                                    <td><?php echo $data ['violator_age']; ?></td>
                                    <td><?php echo $data ['violator_address']; ?></td>
                                    <td><?php echo $data ['witnesses']; ?></td>
                                    <td><?php echo $data ['complaints']; ?></td>
									<td><?php echo $data ['dept']; ?></td>
									<td>
									<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Process</button>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

	

	<div class="container">
				<div class="row">
						<div class="col-md-8">
							<h4 class="container">  </h4> 
	              </div>
	              </div> 
				<form class="w3-container" method="POST">
					<div class="">
						<div class="col-md-6">
							<label><b>Complainant</b></label>
							<input type="text" name="Complainant" class="form-control" placeholder="Enter Name" required>
					</div>
					<div class="col-md-6">
							<label>Accused</label>
							<input type="text" name="Accussed" class="form-control" placeholder="Enter Name" required>
					</div>
					</div>
					<div class="row">
					<div class="col-md-6">
							<label>Address</label>
							<input type="text" name="Address" class="form-control" placeholder="Enter address" required>
					</div>
					</div>

					<div class="row">
					<div class="col-md-6">
							<label>Contact</label>
							<input type="text" name="ContactNo" class="form-control" placeholder="Enter contact" required>
					</div>
					</div>
					
					<div class="row">
					<div class="col-md-6">
							<label>Complaints</label>
							<input type="text" name="Complaint" class="form-control" placeholder="Enter complaints" required>
					</div>
					</div>

					<div class="row">
					<div class="col-md-6">
							
							
					</div>
					</div>
				</form>

	<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
	<input type="submit" name="insert" class="btn btn-success"></button>
	  <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
	  
	</div>

  </div>
</div>
</div>
									</td>	

								</tr>
							
							<?php
							}
							?>
						</table>
			
			</section>
	</body>
</html>