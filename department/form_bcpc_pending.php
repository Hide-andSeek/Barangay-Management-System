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
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> BCPC Dashboard </title>
	 
	 
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

		button.view_approvebtn{width: 150px;}
		button.view_approvebtn:hover{color: green; background: orange;}

		
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
			  <a class="side_bar" href="bcpcdashboard.php">
				  <i class='bx bx-category-alt dash'></i>
				  <span class="links_name">Dashboard</span>
				</a>
				 <span class="tooltip">Dashboard</span>
			  </li>
			  
			  <li>
			   <a class="side_bar" href="bcpc_ongoing.php">
				 <i class='bx bx-user-voice ongoing'></i>
				 <span class="links_name">Ongoing Case</span>
			   </a>
			   <span class="tooltip">Ongoing Case</span>
			 </li>


			 <li>
			   <a class="side_bar" href="bcpc_closed.php">
				 <i class='bx bx-user-check closed'></i>
				 <span class="links_name">Closed Case</span>
			   </a>
			   <span class="tooltip">Closed Cased</span>
			 </li>

			 <li>
			   <a class="side_bar" href="bcpc_total.php">
				 <i class='bx bx-group total'></i>
				 <span class="links_name">Total Complaints</span>
			   </a>
			   <span class="tooltip">Total Complaints</span>
			 </li>
			  
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="img/1.jpeg">
				   <div class="name_job">
				   		<div class="job"><strong><?php echo $user;?></strong></div>
						<div class="job" id="">User Type: <?php echo $dept; ?></div>
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
						<h5>Pending Case
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			  
			  <form action="user.php" method="POST">
				<div class="search_content">
                        <label>Search: 
                            <input type="text" class="r_search" name="keyword">
							<button type="button" name="search"><i class="bx bx-search"></i></button>
                        </label>
                </div> 
			  </form>
			  
			  <div class="reg_table">
						<table class="content-table table_indigency"  id="table">
						
							<?php
							include "db/conn.php";
							include "db/user.php";
							
							$mquery = "SELECT * FROM admin_complaints";
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
									<th>Department</th>
									<th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data2) 
							{
							?>
								<tr class="table-row">
									<td><?php echo $data2 ['blotterID']; ?></td>
									<td><?php echo $data2 ['complainant']; ?></td>
									<td><?php echo $data2 ['c_age']; ?></td>
									<td><?php echo $data2 ['c_gender']; ?></td>
									<td><?php echo $data2 ['c_address']; ?></td>
									<td><?php echo $data2 ['incident_add']; ?></td>
									<td><?php echo $data2 ['violators']; ?></td>
									<td><?php echo $data2 ['v_age']; ?></td>
									<td><?php echo $data2 ['v_gender']; ?></td>
									<td><?php echo $data2 ['v_rel']; ?></td>
									<td><?php echo $data2 ['v_address']; ?></td>
									<td><?php echo $data2 ['witness']; ?></td>
									<td><?php echo $data2 ['ex_complaints']; ?></td>
									<td><?php echo $data2 ['dept']; ?></td>
									<td><button class="view_approvebtn">Process</button></td>
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