<?php session_start();

if(!isset($_SESSION["type"]))
{
    header("location: officials.php");
}
require 'db/conn.php';
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

     <title> Contact Module </title>
	 
	 <style>
         *{font-size: 13px;}
         .employeemanagement-modal{
			display: none; 
			position: absolute; 
			z-index: 999; 
			left: 0;
			top: 0;
			width: 100%; 
			height: 125%; 
			background-color: rgb(0,0,0); 
			background-color: rgba(0,0,0,0.4); 
			padding-top: 5px; 
		}


		.modal-contentemployee {
			padding-top: 1%;
			background-color: #fefefe;
			margin: 5% auto 2% auto;
			border: 1px solid #888;
			height: 82%;
			width: 72%; 
		
		}

		.inputtext, .inputpass {
			font-size: 14px;
			height: 35px;
			width: 84%;
			padding: 10px 10px;
			margin: 4px 25px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
	 </style>
   </head>
	<body onload="display_ct()">																
		<!-- Side Navigation Bar-->
		   <div class="sidebar captain_sidebar myDIV">
			<div class="logo-details">
			    <img class="brgy_icon" src="img/Brgy-Commonwealth.png" alt="Brgy Commonwealth Logo"/>
				<div class="logo_name">Barangay Commonwealth</div>
				<i class='bx bx-menu menu' id="btn"></i>
			</div>
			<ul class="nav-list">
				<li>
					<a class="side_bar btnhover btnhover activehover" href="captaindashboard.php">
						<i class='bx bx-category-alt dash'></i>
						<span class="links_name">Dashboard</span>
					</a>
					 <span class="tooltip">Dashboard</span>
			 	</li>

				 <li>
					<a class="side_bar btnhover" href="contactmodule.php">
						<i class='bx bx-user-circle admin'></i>
						<span class="links_name">Contacts</span>
					</a>
					<span class="tooltip">Contacts</span>
			  	</li>	

				  <li>
				  <a class="side_bar btnhover" href="usermanagement.php">
					  <i class='bx bx-group employee'></i>
					  <span class="links_name">User Management</span>
					</a>
					 <span class="tooltip">User Management</span>
				  </li>

					<li>
					<a class="side_bar btnhover" href="residentcensus.php">
						<i class='bx bxs-group census'></i>
						<span class="links_name">Resident Census</span>
						</a>
						<span class="tooltip">Resident Census</span>
					</li>

					<li>
					<a class="side_bar btnhover" href="postannouncement.php">
						<i class='bx bx-news iannouncement'></i>
						<span class="links_name">Post Announcement</span>
						</a>
						<span class="tooltip">Post Announcement</span>
					</li>
			 
					<li class="profile">
						<div class="profile-details">
						<img class="profile_pic" >
						<div class="name_job" style="font-size: 13px;">
							<div><strong><?php echo $user;?></strong></div>
							<div class="job" id="">User Type: <?php echo $dept; ?></div>
							</div>
						</div>
						<a href="officiallogout.php">
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
						<h5>Contacts
						<a href="#" class="circle">
							 <img src="img/dt.png" >
					    </a>
					    </h5>	  
					</div>
				  </div>
			  </section>
            
            <div style="text-align: center;">
            <hr>
                <h5>    
                    Concerns from Contact Us Page
                </h5>
            <hr>
            </div>
            
                    <div class="reg_table">
                        <table class="content-table"  id="table">
							<?php
							include "db/conn.php";
							include "db/users.php";
							
							$mquery = "SELECT * FROM contactustbl";
							$countn = $db->query($mquery);
							?>
							<thead>
								<tr>
									<th>User ID</th>
									<th>Fullname</th>
									<th>Email Address</th>
									<th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
								</tr>                       
							</thead>
							<?php
							foreach($countn as $data2) 
							{
							?>
								<tr class="table-row">
                                    <td><?php echo $data2 ['id']; ?></td>
									<td><?php echo $data2 ['username']; ?></td>
									<td><?php echo $data2 ['email']; ?></td>
									<td><?php echo $data2 ['subject']; ?></td>
									<td><?php echo $data2 ['message']; ?></td>
									<td>
                                        <input class="btn btn-primary btnwidth" type="button" onclick="location.href='contactreply.php?id=<?php echo $data2['id'];?>'" value="Reply">
                                    </td>
												
								</tr>	
                                <div id="reply_<?php echo $data2['id']; ?>" class="employeemanagement-modal modal">
											
                                            <div class="modal-contentemployee animate displayflex">
                                                <form method="POST" action="">
                                                
                                                    <div class="information col">
                                                        <label class="employee-label"> Fullname: </label>
                                                                        
                                                        <input class="form-control inputtext inputele" id="username" name ="username" type="text" value="<?php echo $data2['username'];?>">
                                                    </div> 
                                                    <div class="information col">
                                                        <label class="employee-label"> Email: </label>
                                                                        
                                                        <input class="form-control inputtext inputele" id="email" name ="email" type="text" value="<?php echo $data2['email'];?>">
                                                    </div> 
                                                    <div class="information col">
                                                        <label>Announcement Description :</label>
                                                        <textarea name="message" id="message" class="form-control" rows="16"><?php echo $data2['message']; ?></textarea>
                                                    </div> 
                                                </form>
                                        </div>
                                    </div>
                            
							<?php
							}
							?>
						</table>
			</div>
			</section>
			<script src="resident-js/barangay.js"></script>
	</body>
</html>