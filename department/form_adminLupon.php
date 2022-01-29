<?php
session_start();

if(!isset($_SESSION["type"]))
{
    header("location: 0index.php");
}
require '../db/conn.php';
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
    <link rel="stylesheet" href="../css/styles.css">
	
	<!--Font Styles-->
	<link rel="icon" type="image/png" href="../img/Brgy-Commonwealth.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&display=swap" rel="stylesheet">
	
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title> Admin Complaints </title>
	 
	 
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
		span.topright{text-align: right; padding:8px 16px;font-size: 25px;}
		.topright:hover {text-align: right;color: red; cursor: pointer;padding:8px 16px;}
		.processbtn:hover{background: orange;}
		.inputele{pointer-events: none; outline: 1px solid orange;}
		.displayflex{display: flex;}
		.approvebtn:hover{background: orange;}
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
				 <i class='bx bx-user-circle lupon'></i>
				 <span class="links_name">Lupon</span>
			   </a>
			   <span class="tooltip">Lupon</span>
			 </li>
			 
			 <li>
			   <a class="side_bar" href="compAdmin_BPSO.php">
				 <i class='bx bx-user bpso'></i>
				 <span class="links_name">BPSO</span>
			   </a>
			   <span class="tooltip">BPSO</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_Vawc.php">
				 <i class='bx bx-user-check vawc'></i>
				 <span class="links_name">VAWC</span>
			   </a>
			   <span class="tooltip">VAWC</span>
			 </li>

			 <li>
			   <a class="side_bar" href="compAdmin_BCPC.php">
				 <i class='bx bx-user-pin bcpc'></i>
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
											
			 
			 <li class="profile">
				 <div class="profile-details">
				   <img class="profile_pic" src="../img/1.jpeg">
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
						<h5>Ongoing Case
						<a href="#" class="circle">
							 <img src="../img/dt.png" >
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

									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='block'"><i class="bx bx-edit"></i>View Details</button></td>
									<td><button class="form-control btn-info" data-toggle="modal" style="font-size: 13px; width: 100px;z-index: 100;" onclick="document.getElementById('id2').style.display='block'"><i class="bx bx-edit"></i>Reply</button></td>
								</tr>	
							
								<div id="process_<?php echo $data['blotter_id']; ?>" class="employeemanagement-modal modal">
											
											<div class="modal-contentemployee animate displayflex" >
												<form method="POST" action="process.php?blotter_id=<?php echo $data['blotter_id'];?>">
												
													

												<div id="Complainant">
																<h5 style="text-align: center;">Complainant</h5>
																<hr>
															
																<div class="information col">
																	<label class="employee-label"> Complainant's ID </label>
																	<input class="form-control inputtext inputele"  id="blotter_id" name ="blotter_id" type="text" value="<?php echo $data['blotter_id'];?>">
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Complainant's  name </label>
																	
																	<input class="form-control inputtext inputele" id="n_complainant" name ="n_complainant" type="text" value="<?php echo $data['n_complainant'];?>">
																</div>
															

																
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Age </label>
																		<?php echo isset($error['comp_age']) ? $error['comp_age'] : '';?>
																		<input class="form-control inputtext inputele" id="comp_age" name ="comp_age" type="text" value="<?php echo $data['comp_age'];?>"> 
																	</div>
																	
																	<div class="information col">
																		<label class="employee-label"> Complainant's  Gender </label> 
												
																		<input class="form-control inputtext inputele" id="comp_gender" name ="comp_gender" type="text" value="<?php echo $data['comp_gender'];?>"> 
																	</div>	
															
																		<div class="information col">
																			<label class="employee-label">Complainant's  Address </label>
																			<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																			<input  class="form-control inputtext inputele" id="comp_address" name ="comp_address" type="text"  
																			value="<?php echo $data['comp_address']; ?>"> 
																		</div>
																	
																	
																		<div class="information col">
																			<label class="employee-label">Incident Address </label>
																			<input class="form-control inputtext inputele" id="" name ="" type="text"  value="<?php echo $data['inci_address']; ?>"> 
																		</div>
															</div>
														
															<div id="Violator" >
															<h5 style="text-align: center;">Violator</h5>

															<hr>
															<div class="information col">
																<label class="employee-label"> Violator's name </label>
																<input class="form-control inputtext inputele" id="n_violator" name ="n_violator" type="text" value="<?php echo $data['n_violator']; ?>">
															</div>

															
																<div class="information col">
																	<label class="employee-label">Violator's Age </label>
																	<input class="form-control inputtext lname  inputele" id="employee_lname" name ="employee_lname" type="text"  placeholder="Last Name" value="<?php echo $data['violator_age']; ?>"> 
																</div>
																
																<div class="information col">
																	<label class="employee-label"> Violator's Gender </label> 
																	<input class="form-control inputtext fname  inputele" id="violator_gender" name ="violator_gender" type="text"
																	value="<?php echo $data['violator_gender']; ?>"> 
																</div>


															<div class="information">
																<label class="employee-label"> Relationship </label>
																<input class="form-control inputtext fname inputele" id="relationship" name ="relationship" type="text" value="<?php echo $data['relationship']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Violator's Address </label>
																<?php echo isset($error['comp_address']) ? $error['comp_address'] : '';?>
																<input  class="form-control inputtext control-label address inputele" id="violator_address" name ="violator_address" type="text" value="<?php echo $data['violator_address']; ?>"> 
															</div>

															<div class="information col">
																<label class="employee-label"> Witnesses </label>
																<input class="form-control inputtext inputele" id="witnesses" name ="witnesses" type="text" value="<?php echo $data['witnesses']; ?>">
															</div>

															<div class="information col">
																<label class="employee-label"> Complaints </label>
																<textarea name="complaints" class="form-control inputtext inputele " id="complaints" ><?php echo $data['complaints']; ?></textarea>
															</div>
															</div>
															
															<div id="Approval" >
															<span onclick="document.getElementById('process_<?php echo $data['blotter_id']; ?>').style.display='none'" class="topright">&times;</span>
															
																
																<div class="information col">
																	<label class="employee-label"> Department </label>
																	<select class="form-control inputtext control-label" style="padding: 0px 0px 0px 
																	5px; " id="department" name="department">
																		<option disabled>--Select--</option>
																		<option value="BCPC">BCPC</option>
																		<option value="VAWC">VAWC</option>
																		<option value="LUPON">LUPON</option>
																		
																		<option value="BPSO">BPSO</option>
																		
																		<option style="color: red;" value="DENY">DENY</option>
																	</select>
																</div>
																
																<div class="information">
																	<label class="employee-label ">Approval Date </label>
																	<input type="date" class="form-control inputtext control-label" id="approvedate" name="approvedate">
																</div>

																<div class="information col">
																<label class="employee-label"> Approved By </label>
																<input class="form-control inputtext control-label" id="" name ="" type="text" onkeyup="var start = this.selectionStart; var end = this.selectionEnd;this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);"> 
															</div>
																<div class="information">   
																<button type="submit" id="approvebtn" name="approvebtn" value="empBtn" class="inputtext submtbtn approvebtn"><i class="bx bx-check"></i>Approve
																</button>  
															</div>
															</div>
										                	</div>
													</form>
												</div>
											</div>
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

																				<input required type="number" class="form-control textarea" id="contact_no"
																				name="contact_no"placeholder="Contact no.">

																			</div>
																			<div class="col-lg-12">

																				<textarea name="msg" class="form-control textarea" id="message" placeholder="Text Message">Hello good evening < Name >, we received your Barangay ID Request. You are now in Step 2, wait for the confirmation of Barangay. Please be guided accordingly! Thank you 
																				-From Barangay Commonwealth</textarea>
																				<small id="messageHelp" class="form-text text-muted">160 characters remaining.</small>



																			</div>
																			<div class="col-lg-12">

																				<button type="submit" name="sendSms" id="form-submit" class="filled-button"><i class="bx bx-send"></i>Send Message</button>

																			</div>
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
	</body>
</html>