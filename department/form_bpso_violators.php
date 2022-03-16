<?php
session_start();
include('announcement_includes/functions.php');
require 'db/conn.php';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admincompviewdet.css">
    <link rel="stylesheet" href="announcement_css/custom.css">

    <!--Font Styles-->
    <link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       div.align-box {
			padding-top: 23px;
			display: flex;
			align-items: center;
		}

		.box-report {
			width: 300px;
			font-size: 14px;
			border: 4px solid #7dc748;
			padding: 30px;
			margin: 10px;
			border-radius: 5px;
			align-items: center;
		}

		* {
			font-size: 13px;
		}

		a {
			text-decoration: none;
		}

		.addannounce {
			margin-top: 340px;
			margin-left: 25px;
			font-size: 13px;
		}

		.fileupload {
			font-size: 13px;
			margin-left: 15px;
		}

		.pagination {
			margin-top: 32%
		}

		.page {
			margin-left: 15px;
		}
    </style>
     <title> BPSO Dashboard </title>

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
			   <a class="side_bar" href="bpso_newcases.php">
				 <i class='fas fa-briefcase'></i>
				 <span class="links_name">New Cases</span>
			   </a>
			   <span class="tooltip">New Cases</span>
			 </li>

			 <li>
			   <a class="side_bar" href="bpso_violators.php">
				 <i class='fas fa-user-check'></i>
				 <span class="links_name">Blotter Cases</span>
			   </a>
			   <span class="tooltip">Blotter Cases</span>
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
						<h5>BPSO BLOTTER CASES
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
			 			<!-- Search -->
			<div class="search_content">
				<form action="" class="list_header" method="get">
					<div>
						Search: 
						<input type="text" class="r_search" name="search" placeholder="Case No. / Complainant's Name" value="<?php echo (isset($_GET["search"])) ? htmlentities($_GET["search"]) : ""; ?>">
						<button type="submit" class="btn btn-primary" value="Search"><i class="bx bx-search-alt"></i></button>
					</div>	
				</form>
			</div>
			<!-- Table -->
			<div class="reg_table emp_tbl">
				<table class="content-table">
					<thead>
						<tr class="t_head">
							<th>Case No.</th>
							<th>Complainant</th>
							<th>Accused</th>
							<th>Date and Time</th>
							<th>Complaint</th>
							<th>Personnel</th>
							<th>Status</th>
							<th>Action</th>
						</tr>                 
					</thead>
					<tbody>
						<?php
							if(isset($_GET["search"]) && !empty($_GET["search"])){
								$search = htmlspecialchars($_GET["search"]);
								$sql = "
									SELECT 
										ac.`admincomp_id`,
										ac.`n_complainant`,
										ac.`n_violator`,
										ac.`app_date`,
										ac.`complaints`,
										ls.`statusID`,
										ls.`status`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 4 AND ac.`admincomp_id` LIKE ?
									OR ls.`statusID` = 4 AND ac.`n_complainant` LIKE ?
									ORDER BY ac.`admincomp_id` DESC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute(["%$search%","%$search%"]);
							}else{
								$sql = "
									SELECT 
										ac.`admincomp_id`,
										ac.`n_complainant`,
										ac.`n_violator`,
										ac.`app_date`,
										ac.`complaints`,
										ls.`statusID`,
										ls.`status`,
										hp.`personnelID`,
										hp.fullname
									FROM luponCases lc
									JOIN admin_complaints ac USING(admincomp_id)
									JOIN luponStatus ls USING(statusID)
									JOIN hearingPersonnels hp USING(personnelID)
									WHERE ls.`statusID` = 4
									ORDER BY ac.`admincomp_id` DESC;
								";
								$stmt = $db->prepare($sql);
								$stmt->execute();
							}
							if($stmt->rowCount() > 0){
								while($row = $stmt->fetch()){
						?>
						<tr class="table-row" data-id="<?php echo $row['admincomp_id']; ?>">
							<td class="text-center"><?php echo $row['admincomp_id']; ?></td>
							<td><?php echo ucwords($row['n_complainant']); ?></td>
							<td><?php echo ucwords($row['n_violator']); ?></td>
							<td><?php echo date("F d, Y", strtotime($row['app_date'])); ?></td>
							<td><?php echo mb_strimwidth($row['complaints'], 0, 50, "..."); ?></td>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo strtoupper($row['status']); ?></td>
							<td class="text-end">
								<a href="bpso_viewrecords.php?id=<?php echo $row['admincomp_id']; ?>" class="btn btn-info btn-sm">View Details</a>
							</td>	
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="8" class="text-center text-muted">No records to show</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</section>
    

    </body>

</html>